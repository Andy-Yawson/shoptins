<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacture;
use Illuminate\Support\Facades\DB;

class ManufactureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addManufacture(){
        return view('components.admin.add_manufacture');
    }

    public function viewManufacture(){
        $manufacture = Manufacture::all();
        return view('components.admin.view_manufacture',
            ['manufacture' => $manufacture]);
    }

    public function insertManufacture(Request $request){
        $this->validate($request,[
            'manufacture_name' => 'required|min:3',
            'manufacture_desc' => 'required|min:6'
        ]);
        $ps = '';
        if($request->publication_status == null){
            $ps = 0;
        }else{
            $ps = 1;
        }

        Manufacture::create([
            'manufacture_name' => $request->manufacture_name,
            'manufacture_description' => $request->manufacture_desc,
            'publication_status' => $ps,
        ]);

        return redirect(route('admin.add.manufacture'))
            ->with('status','A manufacturer was added successfully');
    }

    public function activeManufacture($id){
        Manufacture::where('manufacture_id','=',$id)
            ->update(['publication_status' => 1]);

        return redirect(route('admin.view.manufacture'))
            ->with('status','Category activated successfully');
    }

    public function unactiveManufacture($id){
        Manufacture::where('manufacture_id','=',$id)
            ->update(['publication_status' => 0]);

        return redirect(route('admin.view.manufacture'))
            ->with('status','Category unactivated successfully');
    }

    public function editManufacture($id){

        $manufacture = Manufacture::where([
            'manufacture_id'=>$id
        ])->get();
        return view('components.admin.edit_manufacture',['manufacture'=>$manufacture]);
    }

    public function updateManufacture(Request $request){

        Manufacture::where('manufacture_id','=',$request->manufacture_id)
            ->update(['manufacture_name' => $request->manufacture_name,
                'manufacture_description' => $request->manufacture_desc]);

        return redirect(route('admin.view.manufacture'))
            ->with('status','Manufacture updated successfully');
    }

    public function deleteManufacture($id){
        DB::delete("DELETE FROM tbl_manufacture WHERE manufacture_id = ? ",[$id]);
        return redirect(route('admin.view.manufacture'))->with('status','Manufacture deleted successfully');
    }

}
