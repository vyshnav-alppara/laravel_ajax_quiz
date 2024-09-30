@extends('layout')
@section('content')
<section class="bg-light py-5 py-md-5 h-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card border border-light-subtle rounded-3 shadow-sm">
                    <div class="card-header py-3 border-0">
                        <div class="text-center">
                            <h3>Sign Up</h3>
                        </div>
                    </div>
                    <div class="card-body p-3 p-md-4 p-xl-4">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form id="login_from" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-dark">Register</button>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have account? <a href="{{route('login')}}" class="text-dark">Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection