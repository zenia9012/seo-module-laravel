@extends('seo::layouts.layout')

@section('content')

    <div>
        <div class="w-25 m-auto">
            <form class="form-signin" method="POST" action="{{ route('seo-login.login') }}">

                @csrf
                <div class="text-center mb-4">
                    <h1 class="h3 my-5 font-weight-normal">Login form</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                           autofocus="" autocomplete="off" name="email">
                    <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required
                           autocomplete="off" name="password">
                    <label for="inputPassword">Password</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center">© {{ \Carbon\Carbon::today()->year }}</p>
            </form>
        </div>
    </div>


@endsection('content')



