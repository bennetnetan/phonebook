@extends('layouts.app')

@section('content')
<div class="wrapper mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-11 text-white">
            <h3 class=" text-center"><i class="fas fa-address-card "></i> Phonebook Records</h3>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form name="f1" action="{{ route('search') }}" method="post" class="input-group form-inline my-2 my-lg-0">
                        @csrf
                            <input class="form-control mr-sm-2 rounded" type="string" placeholder="Search by phone number, email or name" aria-label="Search"  aria-describedby="search-addon" maxlength="255" minlength="3" name="query" required/>
                            <button class="btn btn-outline-success my-2 my-sm-0 rounded" type="submit">Search <i class="fas fa-search    "></i></button>
                    </form>
                </div>
            </div>
            <br>
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <strong> <i class="fa fa-user-circle" aria-hidden="true"></i> {{ session('message') }}</strong>
                </div>
            @endif
            @if (session()->has('message1'))
                <div class="alert alert-danger" role="alert">
                    <strong> <i class="fa fa-user-circle" aria-hidden="true"></i> {{ session('message1') }}</strong>
                </div>
            @endif
            <br>
            <div class="d-flex mx-auto">
                {{-- Create Record --}}
                <a href="{{ route('home') }}" class="btn btn-success"><i class="fas fa-home    "></i> Home </a>

                {{-- Create Record --}}
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Create Record </a>
            </div>
            <br><br>
        </div>
        <div class="col-md-11">
            <form name="f2" action="{{ route('deleteMulti') }}" method="post" class="form-inline">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="">

                {{-- Delete --}}
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-user-alt-slash    "></i> Delete multiple Contacts
                </button>

                <br><br>
                <h3 class="text-warning">Search Results</h3>
                <hr class="text-danger">

                @if (count($results))
                    <table class="table table-responsive table-dark table-hover text-white" data-toggle="table" data-checkbox="true">
                        <thead class="text-warning">
                            <th data-field="state" data-checkbox="true">#</th>
                            {{-- <th>Image</th> --}}
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            {{-- <th>Address</th>
                            <th>Category</th>
                            <th>Info</th> --}}
                            <th>Options</th>
                        </thead>
                        <tbody>
                            <tr>
                                    @foreach ($results as $contact)
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="items[]" id="" value="{{ $contact->id }}">
                                                </label>
                                            </div>
                                        </td>


                                        {{-- <td>
                                            <img src="{{ $contact->image }}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Picture here" height="6em" width="6em">
                                        </td> --}}
                                        <td>{{ $contact->fName }} {{ $contact->lName }}</td>
                                        <td>{{ $contact->phoneNumber  }}</td>
                                        <td>{{ $contact->email }}</td>
                                        {{-- <td>{{ _('Kalimoni - Kenyatta Road') }}</td>
                                        <td>{{ _('Friend') }}</td>
                                        <td>{{ _('He is my best friend. His birthday is on DD-MM-YYYY') }}</td> --}}
                                        <td>
                                            <form action=""></form>
                                            <form id="f3" action="{{ route('see') }}" method="post" class="d-inline-block">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                                {{-- See --}}
                                                <button type="submit" class="btn btn-outline-info">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </form>

                                            <form name="f4" action="{{ route('ed') }}" method="post" class="d-inline-block">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                                {{-- Edit --}}
                                                <button href="{{ route('ed') }}" type="submit" class="btn btn-outline-primary">
                                                    <i class="fas fa-edit    "></i> Edit
                                                </button>
                                            </form>

                                            <form name="f5" action="{{ route('delete') }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $contact->id }}">
                                                {{-- Delete --}}
                                                <button type="submit" class="btn btn-outline-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>


                                        </td>

                            </tr>
                                @endforeach
                            {{-- @else
                                <td colspan="5">No data available</td>
                            @endif --}}
                        </tbody>
                    </table>
                @else
                <div class="mx-auto justify-content-center">
                    <h3 class="text-danger text-center">No data available</h3>
                </div>
                @endif
        </form>
            {!! $results->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
<script>
$("#f3").submit(function(event) {
    event.preventDefault();
    // Do something else instead of submitting the form
});
</script>
@endsection
