<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addSlider(){
        return view('components.admin.add_slider');
    }

    public function viewSlider(){
        $slider = Slider::all();
        return view('components.admin.view_slider',['slider' => $slider]);
    }

    public function insertSlider(Request $request){

        $this->validate($request,[
            'slider_name' => 'required|min:3',
            'slider_desc' => 'required|min:6',
            'slider_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('slider_image');
        $new_name = uniqid(rand()) . "." . $image->getClientOriginalExtension();
        $image->move(public_path("images/slider_images"),$new_name);
        /*$path = $_SERVER["DOCUMENT_ROOT"] . "/images/slider_images";
        $image->move($path,$new_name);*/

        $ps = '';
        if($request->publication_status == null){
            $ps = 0;
        }else{
            $ps = 1;
        }

        Slider::create([
            'slider_name' => $request->slider_name,
            'slider_description' => $request->slider_desc,
            'publication_status' => $ps,
            'slider_image' => $new_name
        ]);

        return redirect(route('admin.add.slider'))
            ->with('status','Slider created successfully');
    }

    public function activeSlider($id){
        Slider::where('slider_id','=',$id)
            ->update(['publication_status' => 1]);

        return redirect(route('admin.view.slider'))
            ->with('status','Slider activated successfully');
    }

    public function unactiveSlider($id){
        Slider::where('slider_id','=',$id)
            ->update(['publication_status' => 0]);

        return redirect(route('admin.view.slider'))
            ->with('status','Slider unactivated successfully');
    }

    public function deleteSlider($id){
        DB::delete("DELETE FROM tbl_sliders WHERE slider_id = ? ",[$id]);
        return redirect(route('admin.view.slider'))->with('status','Slider deleted successfully');
    }
}
