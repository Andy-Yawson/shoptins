@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Add New Administrator</h5>
                            @if($errors->all())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="mT-30">
                                <form method="post" action="{{route('admin.insert.admin')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Administrator's Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter admin name" name="admin_name">
                                        <small id="emailHelp" class="form-text text-muted">Admin is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Administrator's Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter admin email" name="admin_email">
                                        <small id="emailHelp" class="form-text text-muted">Admin email is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Administrator's Level</label>
                                        <select class="form-control" name="admin_level">
                                            <option>Choose...</option>
                                            <option value="0">Super Administrator</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Shop Owner</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Administrator's Password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter admin password" name="admin_password">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Admin password include symbol and letters with number and Uppercase
                                        </small>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-hand-o-right"></i> Create Admin</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
