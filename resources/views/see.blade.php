@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-6 text-white    " >
            <div class="card border-warning bg-dark d-flex align-items-center">
              <div class="card-body">
                <a href="{{ route('home') }}" class="btn btn-outline-success d-inline-block"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
                <form action="{{ route('ed') }}" method="post" class="d-inline-block">
                    @csrf

                    <input type="hidden" name="id" value="{{ $contacts->id }}">
                    {{-- Edit --}}
                    <button href="{{ route('ed') }}" type="submit" class="btn btn-outline-primary">
                        <i class="fas fa-edit    "></i> Edit
                    </button>
                </form>
                <a href="{{ route('home', $contacts->id) }}" class="btn btn-outline-danger d-inline-block"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                <div class="card-body">
                    <img src="{{ url('public/Image/'.$contacts->image) }}" alt="Picture" width="250px" height="250px" class="image-responsive">

                    <br><br>
                    <strong class="text-warning">Name:</strong> <h5>{{ $contacts->fName }} {{ $contacts->lName }}</h5>
                    <br>
                    <strong class="text-warning">Email:</strong> <h5>{{ $contacts->email }}</h5>
                    <br>
                    <strong class="text-warning">Phone:</strong> <h5>{{ $contacts->phoneNumber }}</h5>
                    <br>
                    <strong class="text-warning">Address:</strong> <h5>{{ $contacts->address }}</h5>
                    <br>
                    <strong class="text-warning">Category:</strong>
                        <h5>
                            <?php
                                if ($contacts->category == 1) {
                                    echo('Family');
                                }elseif ($contacts->category == 2) {
                                    echo('Friends');
                                }elseif ($contacts->category == 3) {
                                    echo('Work');
                                }elseif ($contacts->category == 4) {
                                    echo('Classmate');
                                }else{
                                    echo('Other');
                                }
                            ?>
                        </h5>
                    <br>
                    <strong class="text-warning">Additional Information:</strong> <h5>{{ $contacts->info }}</h5>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
