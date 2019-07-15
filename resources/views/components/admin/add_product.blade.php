@extends('components.master')
@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>

        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="bgc-white p-20 bd"><h5 class="c-grey-900">Add New Product</h5>
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
                            <div class="bgc-white p-20 bd">
                                <form enctype="multipart/form-data" method="post" action="{{route('admin.insert.product')}}">
                                    {{csrf_field()}}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Product Price</label>
                                            <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Product Category</label>
                                            <select name="category_id" class="form-control">
                                                <option selected="selected">Choose...</option>
                                                @foreach($category as $one)
                                                    <option value="{{$one->category_id}}">{{$one->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputState">Manufacturer</label>
                                            <select name="manufacture_id" class="form-control">
                                                <option selected="selected">Choose...</option>
                                                @foreach($manufacture as $one)
                                                    <option value="{{$one->manufacture_id}}">{{$one->manufacture_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Short Description</label>
                                            <textarea class="form-control" name="product_short_desc" id="editor1"></textarea>
                                            <script> CKEDITOR.replace( 'editor1' ); </script>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Long Description</label>
                                            <textarea class="form-control" name="product_long_desc" id="editor2"></textarea>
                                            <script> CKEDITOR.replace( 'editor2' ); </script>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Product Size</label>
                                            <input type="text" class="form-control" name="product_size" placeholder="Product Size">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Product Colour</label>
                                            <input type="text" class="form-control" name="product_colour" placeholder="Product Colour">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Product Percentage Off Discount</label>
                                            <input type="text" class="form-control" name="product_del" placeholder="Product % as Off Discount">
                                            <small>You must enter zero (0) if no discount percentage for now</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="fw-500">Product Image</label>
                                            <div class="">
                                                <input type="file" class="form-control bdc-grey-200 btn" name="product_image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                            <input type="checkbox" id="inputCall2" name="publication_status" class="peer" value="1">
                                            <label for="inputCall2" class="peers peer-greed js-sb ai-c">
                                                <span class="peer peer-greed">Publication Status</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
