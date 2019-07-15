<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addCategory(){
        return view('components.admin.add_category');
    }

    public function viewCategory(){
        $categories = Category::all();
        return view('components.admin.view_category',
            ['categories' => $categories]);
    }

    public function insertCategory(Request $request){
        $this->validate($request,[
            'category_name' => 'required|min:3',
            'category_desc' => 'required|min:6'
        ]);
        $ps = '';
        if($request->publication_status == null){
            $ps = 0;
        }else{
            $ps = 1;
        }

        Category::create([
            'category_name' => $request->category_name,
            'category_description' => $request->category_desc,
            'publication_status' => $ps,
        ]);

        return redirect(route('admin.add.category'))
            ->with('status','Category created successfully');
    }

    public function activeCategory($id){
        Category::where('category_id','=',$id)
            ->update(['publication_status' => 1]);

        return redirect(route('admin.view.category'))
            ->with('status','Category activated successfully');
    }

    public function unactiveCategory($id){
        Category::where('category_id','=',$id)
            ->update(['publication_status' => 0]);

        return redirect(route('admin.view.category'))
            ->with('status','Category unactivated successfully');
    }

    public function editCategory($id){

        $category = Category::where([
            'category_id'=>$id
        ])->get();
       return view('components.admin.edit_category',['category'=>$category]);
    }

    public function updateCategory(Request $request){

        Category::where('category_id','=',$request->category_id)
            ->update(['category_name' => $request->category_name,
                    'category_description' => $request->category_desc]);

        return redirect(route('admin.view.category'))
            ->with('status','Category updated successfully');
    }

    public function deleteCategory($id){
        DB::delete("DELETE FROM tbl_category WHERE category_id = ? ",[$id]);
        return redirect(route('admin.view.category'))->with('status','Category deleted successfully');
    }

}
