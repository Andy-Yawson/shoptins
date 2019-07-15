@extends('components.master')

@section('content')
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">All Sliders</h4>
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
                                <th>Product Desc</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Desc</th>
                                <th>Product Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($slider as $item)
                                <tr>
                                    <td>{{$item->slider_name}}</td>
                                    <td>{{\Illuminate\Support\Str::words($item->slider_description,4,'...')}}</td>
                                    <td align="center"><img src="{{asset('images/slider_images/'.$item->slider_image)}}" height="100px" width="250px"></td>
                                    <td>
                                        @if($item->publication_status == 0)
                                            <button class="btn btn-danger">Inactive</button>
                                        @else
                                            <button class="btn btn-success">Active</button>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($item->publication_status == 0)
                                            <a href="{{route('admin.active.slider',$item->slider_id)}}"><i class="fa fa-thumbs-up fa-2x" style="color: green"></i></a>
                                        @else
                                            <a href="{{route('admin.unactive.slider',$item->slider_id)}}"><i class="fa fa-thumbs-o-down fa-2x" style="color: red"></i></a>
                                        @endif
                                        <a href="{{route('admin.delete.slider',$item->slider_id)}}"><i class="fa fa-trash-o fa-2x"></i></a>
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