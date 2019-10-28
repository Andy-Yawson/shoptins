@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
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
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Edit Product</h5>
                            <div class="mT-30">
                                <form method="post" action="{{route('admin.update.product')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group"><label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" value="{{$product->product_name}}" name="product_name">
                                        <small id="emailHelp" class="form-text text-muted">Product Name is always unique</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Short Description</label>
                                        <textarea class="form-control" rows="6" name="product_short_description" id="editor2">
                                            {{$product->product_short_description}}
                                        </textarea>
                                        <script> CKEDITOR.replace( 'editor2' ); </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Long Description</label>
                                        <textarea class="form-control" rows="6" name="product_long_description" id="editor1">
                                            {{$product->product_long_description}}
                                        </textarea>
                                        <script> CKEDITOR.replace( 'editor1' ); </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Price</label>
                                        <input type="text" class="form-control" rows="6" name="product_price" value="{{$product->product_price}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Percentage Off Discount</label>
                                        <input type="text" class="form-control" rows="6" name="product_del" value="{{$product->product_del}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Link</label>
                                        <input type="text" class="form-control" name="product_url" value="{{$product->url}}">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Product Category</label>
                                            <select name="category_id" class="form-control">
                                                <option selected="selected" value="0">Choose...</option>
                                                @foreach($category as $one)
                                                    <option value="{{$one->category_id}}">{{$one->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted">Leave here empty if you don't want to update</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Manufacturer</label>
                                            <select name="manufacture_id" class="form-control">
                                                <option selected="selected" value="0">Choose...</option>
                                                @foreach($manufacture as $one)
                                                    <option value="{{$one->manufacture_id}}">{{$one->manufacture_name}}</option>
                                                @endforeach
                                            </select>
                                            <small id="emailHelp" class="form-text text-muted">Leave here empty if you don't want to update</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                            @if($product->feature == 1)
                                                <input type="checkbox" id="inputCall2" name="feature" class="peer" value="1" checked>
                                            @else
                                                <input type="checkbox" id="inputCall2" name="feature" class="peer" value="1">
                                            @endif
                                            <label for="inputCall2" class="peers peer-greed js-sb ai-c">
                                                <span class="peer peer-greed">Featured Product</span>
                                            </label>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{$product->product_id}}" name="product_id">
                                    <input type="hidden" value="{{$product->category_id}}" name="cat_id">
                                    <input type="hidden" value="{{$product->manufacture_id}}" name="man_id">

                                    <button type="submit" class="btn btn-primary">Update Product</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="masonry-item col-md-6">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd">
                            <h5 class="c-grey-900">Add More Images To Product</h5>
                            @if($errors->all())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </div>
                            @endif
                            @if (session('images'))
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    {{ session('images') }}
                                </div>
                            @endif
                            <div class="mT-30">
                                <form method="post" action="{{route('admin.add.more.images')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group"><label for="exampleInputEmail1">Product Images</label>
                                        <input type="file" class="form-control" name="more_images[]" multiple>
                                        <small id="emailHelp" class="form-text text-muted">
                                            You can select multiple images for this product by holding control key
                                        </small>
                                    </div>

                                    <input type="hidden" value="{{$product->product_id}}" name="product_id">

                                    <button type="submit" class="btn btn-primary">Upload Product Images</button>

                                </form>
                            </div>
                            <hr>
                            <br>
                            @if(count($moreImages) > 0)
                                @foreach($moreImages as $images)
                                    <div style="display: inline-block;border-right: 1px dashed #4c4c4c;padding-right:14px">
                                        <img src="{{asset('images/product_images/more/'.$images->image)}}" width="100px" height="100px">
                                        <a href="{{route('admin.delete.image',$images->id)}}">
                                            <i class="fa fa-trash-o fa-2x" style="color: red"></i>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <h4>There is only one image for this product. You can add more</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
