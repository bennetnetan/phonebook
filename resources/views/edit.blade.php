@extends('layouts.app')

@section('content')
<div class="wrapper mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-10 text-white    " >
            <div class="card border-primary bg-dark">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-address-card "></i> Edit Phonebook Record
                </h4>
                <p class="card-body">

                    <form action="{{ route('update') }}" method="POST" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="" value="{{ $contacts->id }}" hidden>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="First Name" class="form-label">First name</label>
                                <input type="text" name="fname" id="" class="form-control" value="{{ $contacts->fName }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Last Name" class="form-label">Last name</label>
                                <input type="text" name="lname" id="" class="form-control" value="{{ $contacts->lName }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="" class="form-control" value="{{ $contacts->email }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Phone number" class="form-label">Phone Number</label>
                                <input type="phone" name="phone" id="" class="form-control" minlength="11" maxlength="13" value="{{ $contacts->phoneNumber }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Address" class="form-label">Address</label>
                                <input type="address" name="address" id="" class="form-control" value="{{ $contacts->address }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="First Name" class="form-label">Category</label>
                                <select name="category" id="" value="{{ $contacts->category }}" class="form-control" required>
                                    @if ( $contacts->category == 1 )
                                        <option value="1" selected>Family</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Work</option>
                                        <option value="4">Classmate</option>
                                        <option value="5">Other</option>
                                    @elseif ( $contacts->category == 2 )
                                        <option value="1">Family</option>
                                        <option value="2" selected>Friends</option>
                                        <option value="3">Work</option>
                                        <option value="4">Classmate</option>
                                        <option value="5">Other</option>
                                    @elseif ( $contacts->category == 3 )
                                        <option value="1">Family</option>
                                        <option value="2">Friends</option>
                                        <option value="3" selected>Work</option>
                                        <option value="4">Classmate</option>
                                        <option value="5">Other</option>
                                    @elseif ( $contacts->category == 4 )
                                        <option value="1">Family</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Work</option>
                                        <option value="4" selected>Classmate</option>
                                        <option value="5">Other</option>
                                    @elseif ( $contacts->category == 5 )
                                        <option value="1">Family</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Work</option>
                                        <option value="4">Classmate</option>
                                        <option value="5" selected>Other</option>
                                    @else
                                        <option value="1">Family</option>
                                        <option value="2">Friends</option>
                                        <option value="3">Work</option>
                                        <option value="4">Classmate</option>
                                        <option value="5">Other</option>
                                    @endif


                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="info" class="form-label">Info</label>
                                <textarea name="info" id="" rows="2" class="form-control">
                                    {{ $contacts->info }}
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group col-12 mt-4">
                            <button type="submit" name="submit" class="btn btn-outline-success">
                                <i class="fas fa-save    "></i> Update
                            </button>

                            <a href="{{ route('home') }}" class="btn btn-outline-danger">
                                Cancel
                            </a>
                        </div>
                    </form>

                </p>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
