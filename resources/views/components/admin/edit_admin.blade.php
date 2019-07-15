@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-8">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Change Password</h5>
                            @if($errors->all())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="mT-30">
                                <form method="post" action="{{route('admin.change.password')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="project-name">Old Password</label>
                                        <input type="password" class="form-control" id="project-name" name="old_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="project-name">Current Password</label>
                                        <input type="password" class="form-control" id="project-name" name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="project-name">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-info" type="submit">Change Password <i class="fa fa-spinner"></i></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
