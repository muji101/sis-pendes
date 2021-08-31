<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Sinau</title>
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/bootstrap.css') }}">

    <link rel="shortcut icon" href="{{ asset('/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/app.css') }}">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="{{ asset('/images/logo.png') }}" height="60" class=''>
                                <h2 class="fw-bold">Login SIS-PENDES</h2>
                                {{-- <p>Please sign in to continue to Sinau.</p> --}}
                            </div>
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ url('/authenticate') }}">
                                @csrf
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Email</label>
                                    <div class="position-relative">
                                        <input type="email" name="email" class="form-control" id="name" value="{{ old('email') }}" required>
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                        {{-- @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class='float-end'>
                                                <small>Forgot password?</small>
                                            </a>
                                        @endif --}}
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-start">
                                        <input type="checkbox" id="checkbox1" class='form-check-input'>
                                        <label for="checkbox1">Remember me</label>
                                    </div>
                                    <div class="float-end">
                                        {{-- <a href="{{ route('register') }}">Don't have an account?</a> --}}
                                        {{-- <a href="#">Don't have an account?</a> --}}
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Submit</button>
                                </div>
                            </form>
                            {{-- <div class="divider">
                                <div class="divider-text">OR</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i>
                                        Facebook</button>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i>
                                        Github</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('dist/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('dist/assets/js/app.js') }}"></script>

    <script src="{{ asset('dist/assets/js/main.js') }}"></script>
</body>

</html>