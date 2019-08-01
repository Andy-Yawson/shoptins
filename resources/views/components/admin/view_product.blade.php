@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Products</h4>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Category</th>
                                <th>Manufacture</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Category</th>
                                <th>Manufacture</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td>{{$item->product_name}}</td>
                                    <td align="center"><img src="{{asset('images/product_images/'.$item->product_image)}}" height="90px" width="90px"></td>
                                    <td>&#8373;{{$item->product_price}}</td>
                                    <td>{{$item->category_name}}</td>
                                    <td>{{$item->manufacture_name}}</td>
                                    <td>
                                        @if($item->publication_status == 0)
                                            <button class="btn btn-danger">Inactive</button>
                                        @else
                                            <button class="btn btn-success">Active</button>
                                        @endif
                                        @if($item->stock == 0)
                                            <button class="btn btn-danger">Out Of Stock</button>
                                        @else
                                            <button class="btn btn-success">In Stock</button>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($item->publication_status == 0)
                                            <a title="make product active" href="{{route('admin.active.product',$item->product_id)}}"><i class="fa fa-thumbs-up fa-2x" style="color: green"></i></a>
                                        @else
                                            <a title="make product inactive" href="{{route('admin.unactive.product',$item->product_id)}}"><i class="fa fa-thumbs-o-down fa-2x" style="color: red"></i></a>
                                        @endif
                                        @if($item->stock == 0)
                                            <a title="In stock" href="{{route('admin.active.stock',$item->product_id)}}"><i class="fa fa-unlock fa-2x" style="color: green"></i></a>
                                        @else
                                            <a title="Out of stock" href="{{route('admin.unactive.stock',$item->product_id)}}"><i class="fa fa-lock fa-2x" style="color: red"></i></a>
                                        @endif
                                        <a title="Delete Product" href="{{route('admin.delete.product',$item->product_id)}}"><i class="fa fa-trash-o fa-2x"></i></a>
                                        <a title="Edit Product" href="{{route('admin.edit.product',$item->product_id)}}"><i class="fa fa-edit fa-2x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection