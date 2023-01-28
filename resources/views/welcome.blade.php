@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-dark text-white border-white">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body mx-auto">
                    {{-- https://materializecss.com/icons.html --}}

                    <br>
                    <h3>
                        <i class="fa fa-address-book" aria-hidden="true"></i> Phonebook
                    </h3>

                    <a href="{{ route('home') }}" class="btn btn-light inline">
                        <i class="fa fa-home" aria-hidden="true"></i> Home
                    </a>
                    <br>
                    <br>

                    <a href="{{ route('login') }}" class="btn btn-success">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary">
                        <i class="fa fa-registered" aria-hidden="true"></i> Register
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
