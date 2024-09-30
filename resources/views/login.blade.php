@extends('layout')
@section('content')

<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card border border-light-subtle rounded-3 shadow-sm">
                <div class="card-header py-3 border-0">
                    <div class="text-center">
                        <h2>QUIZ LOGIN</h2>
                    </div>
                </div>
                <div class="card-body p-3 p-md-4 p-xl-4">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('signin')}}">
                        @csrf
                        <div class="form-group mt-2 mb-2">
                            <label class="mb-1" for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email"
                                aria-describedby="emailHelp" placeholder="Enter email" required>
                            <span class="text-danger error-text email_error" style="color: red"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="mb-1">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <span class="text-danger error-text password_error" style="color: red"></span>
                        </div>
                        <div class="text-center mt-5 d-grid col-6 mx-auto">
                            <button type="submit" id="button_submit" class="btn btn-dark">LogIn</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        Don't have an account? <a href="{{route('sign-up')}}" class="text-dark">Create One</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection