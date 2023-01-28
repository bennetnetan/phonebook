@extends('layouts.app')

@section('content')
<div class="wrapper mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-11 text-white">
            <h3><i class="fas fa-address-card "></i> Phonebook Records</h3>

            <br>
            @if (session()->has('message'))
            <div class="alert alert-primary" role="alert">
                <strong> <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ session('message') }}</strong>
            </div>
        @endif
            <br>

            {{-- Create Record --}}

            <a href="{{ route('create') }}" class="btn btn-primary">Create Record <i class="fa fa-user-plus" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-11">
            <table class="table table-responsive table-inverse text-white">
                <thead>
                    <th>#</th>
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
                            @foreach ($contacts as $contact)
                                <td>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue">
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
                                    <form action="{{ route('see') }}" method="post">@csrf<input type="hidden" name="id" value="{{ $contact->id }}"><button type="submit" class="btn btn-outline-info"><i class="fa fa-eye" aria-hidden="true"></i> View</button></form>
                                    {{-- <a href="{{ route('see', $contact->id) }}" class="btn btn-outline-info">

                                    </a> --}}

                                    <a href="{{ route('edit') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit    "></i> Edit
                                    </a>
                                    <a href="" class="btn btn-outline-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </a>
                                </td>

                    </tr>
                        @endforeach
                    {{-- @else
                        <td colspan="5">No data available</td>
                    @endif --}}
                </tbody>
            </table>
            {!! $contacts->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection
