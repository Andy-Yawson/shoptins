@extends('user.master')
@section('content')

    <!-- ========================= SECTION INTRO ========================= -->
    <section class="section-intro text-white text-center">
        <div class="container d-flex flex-column mt-5 mb-5">
            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <article class="card-body">
                            <h4 class="card-title mb-4 mt-1 black">Sign in</h4>
                            {{--<p>
                                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i> &nbsp; Login via Twitter</a>
                                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> &nbsp; Login via facebook</a>
                            </p>
                            <hr>--}}
                            <form method="post" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-icon">
                                    <i class="fa fa-user"></i>
                                    <input name="email" class="form-control" placeholder="Email or login email"
                                           type="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div> <!-- form-group// -->
                                <div class="form-group input-icon">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control" placeholder="******" type="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div> <!-- form-group// -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"> Login </button>
                                        </div> <!-- form-group// -->
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a class="small" href="#">Forgot password?</a>
                                    </div>
                                </div> <!-- .row// -->
                            </form>
                        </article>
                    </div> <!-- card.// -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <article class="card-body">
                            <h4 class="card-title mb-4 mt-1 black">Sign Up</h4>
                            <form method="post" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col form-group">
                                        <input type="text" class="form-control" placeholder="First Name"
                                        name="first_name">
                                    </div>
                                    <div class="col form-group">
                                        <input type="text" class="form-control" placeholder="Last Name"
                                        name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Address"
                                    name="email">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Phone Number"
                                    name="phone" min="1">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Enter Password"
                                    name="password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Confirm Password"
                                    name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                                </div> <!-- form-group// -->
                                <small class="text-muted">By clicking the 'Register' button,
                                    you confirm that you accept our <br> <a href="{{ route('user.terms') }}">Terms of use and Privacy Policy</a>.</small>
                            </form>
                        </article>
                    </div> <!-- card.// -->
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= SECTION INTRO END// ========================= -->
@endsection