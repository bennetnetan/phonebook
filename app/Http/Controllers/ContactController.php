<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contacts')->paginate(7);
        $contacts_count = DB::table('contacts')->count();

        return view('home', compact('contacts','contacts_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {
        $contact->uid = Auth::id();
        $contact->fName = $request->input('fname');
        $contact->lName = $request->input('lname');
        $contact->email = $request->input('email');
        $contact->phoneNumber = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->info = $request->input('info');
        $contact->category = $request->input('category');

        $data = '';
        if($request->file('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data = $filename;
        }


        $contact->image = $data;
        // dd($contact->category);
        $contact->save();


        return redirect()->route('home')->with('message', 'Contact created and saved successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $contacts = Contact::find($request->id);
        // dd($contacts);
        return view('see', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $contacts = Contact::find($request->id);
        // dd($contacts);
        return view('edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact = Contact::findOrFail($request->input('id'));

        $contact->fName = $request->input('fname');
        $contact->lName = $request->input('lname');
        $contact->email = $request->input('email');
        $contact->phoneNumber = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->info = $request->input('info');
        $contact->category = $request->input('category');

        $contact->save();
        // dd($contact);

        return redirect()->route('home')->with('message', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contact = Contact::findOrFail($request->input('id'));
        $contact->delete();
        // dd($contact);

        return redirect()->route('home')->with('message1', 'Contact deleted successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroyMulti(Request $request)
    {
        $selectedRows = $request->items;

        foreach ($selectedRows as $selectedRow){
            Contact::find($selectedRow)->delete();
        }

        return redirect()->route('home')->with('message1', 'Multiple contacts deleted successfully');
    }

    public function search(Request $request){

        $query = trim(strip_tags($request->input('query')));

        $results = Contact::where('fName', 'like', "%$query%")
            ->orwhere('email', 'like', "%$query%")
            ->orWhere('address', 'like', "%$query%")
            ->orWhere('lName', 'like', "%$query%")
            ->paginate(10);

        return view('search', compact('results'));
        // dd($request);
    }
}
