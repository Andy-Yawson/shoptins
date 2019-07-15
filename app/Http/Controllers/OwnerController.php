<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use App\MoreImage;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        return view('components.owner.dashboard');
    }

    public function viewProducts(){
        $product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->join('tbl_shop','tbl_products.shop_id','=','tbl_shop.shop_id')
            ->join('owners','tbl_shop.shop_code','=','owners.shop_code')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name','tbl_shop.shop_name')
            ->where('tbl_shop.shop_code','=',Auth::user()->shop_code)
            ->get();

        return view('components.owner.view_product',['products'=>$product]);
    }

    public function addProduct(){
        $category = Category::all();
        $manufacture = Manufacture::all();
        $shop = Shop::where('shop_code','=',Auth::user()->shop_code)->first();
        return view('components.owner.add_product',['category'=>$category,
            'manufacture'=>$manufacture,'shop'=>$shop]);
    }

    public function insertProduct(Request $request){
        $this->validate($request,[
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('product_image');
        $new_name = uniqid(rand()) . "." . $image->getClientOriginalExtension();
        $image->move(public_path("images/product_images"),$new_name);

        $ps = '';
        if($request->publication_status == null){
            $ps = 0;
        }else{
            $ps = 1;
        }

        Product::create([
            'category_id' => $request->category_id,
            'manufacture_id' => $request->manufacture_id,
            'shop_id' => $request->shop_id,
            'product_name' => $request->product_name,
            'product_short_description' =>clean( $request->product_short_desc),
            'product_long_description' => clean($request->product_long_desc),
            'product_price' => $request->product_price,
            'product_image' => $new_name,
            'product_size' => $request->product_size,
            'product_color' => $request->product_colour,
            'publication_status' => $ps,
            'stock' => 1,
            'feature' => 0,
            'product_del' => $request->product_del
        ]);

        return redirect(route('owner.add.product'))
            ->with('status','New product added successfully and available in stock');
    }

    public function activeProduct($id){
        Product::where('product_id','=',$id)
            ->update(['publication_status' => 1]);

        return redirect(route('owner.view.products'))
            ->with('status','Product activated successfully');
    }

    public function unactiveProduct($id){
        Product::where('product_id','=',$id)
            ->update(['publication_status' => 0]);

        return redirect(route('owner.view.products'))
            ->with('status','Product unactivated successfully');
    }

    public function deleteProduct($id){
        DB::delete("DELETE FROM tbl_products WHERE product_id = ? ",[$id]);

        return redirect(route('owner.view.products'))->with('status','Product deleted successfully');
    }

    public function activeStock($id){
        Product::where('product_id','=',$id)
            ->update(['stock' => 1]);

        return redirect(route('owner.view.products'))
            ->with('status','Product now available in stock');
    }

    public function unactiveStock($id){
        Product::where('product_id','=',$id)
            ->update(['stock' => 0]);

        return redirect(route('owner.view.products'))
            ->with('status','Product removed from stock');
    }

    public function editProduct($product_id){
        $product = Product::where([
            'product_id'=>$product_id
        ])->first();
        $category = Category::all();
        $manufacture = Manufacture::all();
        $moreImages = MoreImage::where('product_id',$product_id)->get();

        return view('components.owner.edit_product',['product'=>$product,
            'category'=>$category,'manufacture'=>$manufacture,'moreImages'=>$moreImages]);
    }

    public function updateProduct(Request $request){

        $category_id = $request->category_id == 0 ? $request->cat_id : $request->category_id;
        $manufacture_id = $request->manufacture_id == 0 ? $request->man_id : $request->manufacture_id;

        Product::where('product_id','=',$request->product_id)
            ->update(['product_name' => $request->product_name,
                'product_short_description' => clean($request->product_short_description),
                'product_long_description' => clean($request->product_long_description),
                'product_price' => $request->product_price,
                'product_del' => $request->product_del,
                'category_id' =>$category_id,
                'manufacture_id' => $manufacture_id,]);

        return redirect(route('owner.view.products'))
            ->with('status','Product is successfully updated');
    }

    public function getChangePassword(){
        return view('components.owner.edit_admin');
    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'old_password'  => 'required|min:7',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $oldPassword = $request->old_password;
        $newPassword = $request->password;

        if (Hash::check($oldPassword,$user->password)){
            request()->user()->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            request()->session()->flash('success','password changed successfully');
            return redirect(route('owner.edit.admin',$user->id));
        }else{
            request()->session()->flash('error','Make sure you enter your right old password!');
            return redirect(route('owner.edit.admin',$user->id));
        }
    }


    public function deleteProductImage($id){

        DB::delete("DELETE FROM tbl_more_images WHERE id = ? ",[$id]);

        return redirect(route('admin.view.product'))->with('status','Product Image deleted successfully');
    }


}
