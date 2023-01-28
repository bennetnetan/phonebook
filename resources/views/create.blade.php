@extends('layouts.app')

@section('content')
<div class="wrapper mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-10 text-white    " >
            <div class="card border-primary bg-dark">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">
                    <i class="fas fa-address-card "></i> Create Phonebook Record
                </h4>
                <p class="card-body">

                    <form action="" method="POST" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="col-6">
                            <div class="form-group">
                                <label for="First Name" class="form-label">First name</label>
                                <input type="text" name="fname" id="" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Last Name" class="form-label">Last name</label>
                                <input type="text" name="lname" id="" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Phone number" class="form-label">Phone Number</label>
                                <input type="phone" name="phone" id="" class="form-control" minlength="11" maxlength="13" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Address" class="form-label">Address</label>
                                <input type="address" name="address" id="" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="Photo" class="form-label">Photo</label>
                                <input type="file" name="photo" id="" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="info" class="form-label">Info</label>
                                <textarea name="info" id="" rows="2" class="form-control" value="{{ old('name') }}"></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="First Name" class="form-label">Category</label>
                                <select name="category" id="" class="form-select">
                                    <option value="1">Family</option>
                                    <option value="2">Friends</option>
                                    <option value="3">Work</option>
                                    <option value="4">Classmate</option>
                                    <option value="5">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-12 mt-4">
                            <button type="submit" name="submit" class="btn btn-outline-success">
                                <i class="fas fa-save    "></i> Save
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
