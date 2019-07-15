@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Edit Category</h5>
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
                                <form method="post" action="{{route('admin.update.category')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group"><label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" value="{{$category[0]->category_name}}" name="category_name">
                                        <small id="emailHelp" class="form-text text-muted">Category is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category Description</label>
                                        <textarea class="form-control" rows="6" name="category_desc">{{$category[0]->category_description}}
                                        </textarea>
                                    </div>

                                    <input type="hidden" value="{{$category[0]->category_id}}" name="category_id">

                                    <button type="submit" class="btn btn-primary">Update Category</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
