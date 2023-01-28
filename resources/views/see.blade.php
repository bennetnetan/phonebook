@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-6 text-white    " >
            <div class="card border-primary bg-dark d-flex align-items-center">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-address-card"></i>Phonebook Record
                </h4>
                <a href="{{ route('home') }}" class="btn btn-outline-success"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                <form action="{{ route('ed') }}" method="post" class="form-inline">
                    @csrf

                    <input type="hidden" name="id" value="{{ $contacts->id }}">
                    {{-- Edit --}}
                    <button href="{{ route('ed') }}" type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-edit    "></i> Edit
                    </button>
                </form>
                <a href="{{ route('home', $contacts->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                <div class="card-body">
                    <h5>
                        <img src="{{ url('public/Image/'.$contacts->image) }}" alt="Picture" width="250px" height="250px">
                    </h5>
                    <h6><small>Profile image</small></h6>
                    <br>
                    <strong>Name:</strong> <h5>{{ $contacts->fName }} {{ $contacts->lName }}</h5>
                    <br>
                    <strong>Email:</strong> <h5>{{ $contacts->email }}</h5>
                    <br>
                    <strong>Phone:</strong> <h5>{{ $contacts->phoneNumber }}</h5>
                    <br>
                    <strong>Address:</strong> <h5>{{ $contacts->address }}</h5>
                    <br>
                    <strong>Category:</strong>
                        <h5>
                            <?php
                                if ($contacts->category == 1) {
                                    echo('Family');
                                }elseif ($contacts->category == 1) {
                                    echo('Friends');
                                }elseif ($contacts->category == 1) {
                                    echo('Work');
                                }elseif ($contacts->category == 1) {
                                    echo('Classmate');
                                }else{
                                    echo('Other');
                                }
                            ?>
                        </h5>
                    <br>
                    <strong>Additional Information:</strong> <h5>{{ $contacts->info }}</h5>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
