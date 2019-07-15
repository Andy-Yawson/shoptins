@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Add New Shop Owner</h5>
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
                                <form method="post" action="{{route('admin.insert.owner')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Owner's Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Shop Owner's name" name="name">
                                        <small id="emailHelp" class="form-text text-muted">Name is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Owner's Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Shop Owner's email" name="email">
                                        <small id="emailHelp" class="form-text text-muted">Email is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPhone">Shop Owner's Phone Number</label>
                                        <input type="text" class="form-control" id="exampleInputPhone"
                                               aria-describedby="emailHelp" placeholder="Enter Shop Owner's Phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Owner's Password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Shop Owner password" name="password">
                                        <small id="emailHelp" class="form-text text-muted">
                                            Admin password include symbol and letters with number and Uppercase
                                        </small>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Shop Code</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Shop Code" name="shop_code">
                                        <small id="emailHelp" class="form-text text-muted">
                                            The code given when shop was created. This is very important
                                        </small>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-hand-o-right"></i> Create Shop Owner</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
