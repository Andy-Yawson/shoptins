<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\LogProduct;
use App\Manufacture;
use App\MoreImage;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addProduct(){
        $category = Category::all();
        $manufacture = Manufacture::all();
        return view('components.admin.add_product',['category'=>$category,
                         'manufacture'=>$manufacture]);
    }

    public function viewProduct(){
        $product = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->get();
        return view('components.admin.view_product',
            ['product' => $product]);
    }

    public function insertProduct(Request $request){

        $this->validate($request,[
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('product_image');
        $new_name = uniqid(rand()) . "." . $image->getClientOriginalExtension();
        $image->move(public_path("images/product_images"),$new_name);
//        $path = $_SERVER["DOCUMENT_ROOT"] . "/images/product_images";
//        $image->move($path,$new_name);

        if($request->publication_status == null){
            $ps = 0;
        }else{
            $ps = 1;
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->product_name = $request->product_name;
        $product->product_short_description = $request->product_short_desc;
        $product->product_long_description = $request->product_long_desc;
        $product->product_price = $request->product_price;
        $product->product_image = $new_name;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_colour;
        $product->publication_status = $ps;
        $product->stock = 1;
        $product->feature = 0;
        $product->rating = 0;
        $product->product_del = $request->product_del;
        $product->slug = Str::slug($request->product_name);
        $product->feature = $request->featured == null ? 0 : 1;
        $product->save();


        /*MoreImage::create([
            'product_id' => $product->id,
            'image' => $new_name
        ]);*/

        return redirect(route('admin.add.product'))
            ->with('status','New product added successfully and available in stock');
    }

    public function activeProduct($id){
        Product::where('product_id','=',$id)
            ->update(['publication_status' => 1]);

        LogProduct::create([
            'product_id' => $id,
            'product_status' => 1,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))
            ->with('status','Product activated successfully');
    }

    public function unactiveProduct($id){
        Product::where('product_id','=',$id)
            ->update(['publication_status' => 0]);

        LogProduct::create([
            'product_id' => $id,
            'product_status' => 2,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))
            ->with('status','Product unactivated successfully');
    }

    public function deleteProduct($id){
        DB::delete("DELETE FROM tbl_products WHERE product_id = ? ",[$id]);

        LogProduct::create([
            'product_id' => $id,
            'product_status' => 3,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))->with('status','Product deleted successfully');
    }


    public function activeStock($id){
        Product::where('product_id','=',$id)
            ->update(['stock' => 1]);

        LogProduct::create([
            'product_id' => $id,
            'product_status' => 4,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))
            ->with('status','Product now available in stock');
    }

    public function unactiveStock($id){
        Product::where('product_id','=',$id)
            ->update(['stock' => 0]);

        LogProduct::create([
            'product_id' => $id,
            'product_status' => 5,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))
            ->with('status','Product removed from stock');
    }

    public function editProduct($product_id){
        $product = Product::where([
            'product_id'=>$product_id
        ])->first();
        $category = Category::all();
        $manufacture = Manufacture::all();
        $moreImages = MoreImage::where('product_id',$product_id)->get();

        return view('components.admin.edit_product',['product'=>$product,
            'category'=>$category,'manufacture'=>$manufacture,'moreImages'=>$moreImages]);
    }

    public function updateProduct(Request $request){
        $category_id = $request->category_id == 0 ? $request->cat_id : $request->category_id;
        $manufacture_id = $request->manufacture_id == 0 ? $request->man_id : $request->manufacture_id;
        $feat = $request->feature == null ? 0 : 1;
        Product::where('product_id','=',$request->product_id)
            ->update(['product_name' => $request->product_name,
                    'product_short_description' => $request->product_short_description,
                    'product_long_description' => $request->product_long_description,
                    'product_price' => $request->product_price,
                    'product_del' => $request->product_del,
                    'category_id' =>$category_id,
                    'manufacture_id' => $manufacture_id,
                    'feature' => $feat]);

        LogProduct::create([
            'product_id' => $request->product_id,
            'product_status' => 6,
            'admin_id' => Auth::user()->id
        ]);

        return redirect(route('admin.view.product'))
            ->with('status','Product is successfully updated');
    }

    public function addMoreImages(Request $request){

        if ($request->hasFile('more_images')){
            foreach ($request->file('more_images') as $image){
                $new_name = uniqid(rand()) . "." . $image->getClientOriginalExtension();
                MoreImage::create([
                    'product_id' => $request->product_id,
                    'image' => $new_name
                ]);
                $image->move(public_path("images/product_images/more/"),$new_name);
            }
            return redirect(route('admin.view.product'))
                ->with('status','Your images have being uploaded successfully');
        }else{
            return redirect(route('admin.edit.product',$request->product_id))
                ->with('images','Please select an image or more');
        }

    }


    public function deleteProductImage($id){

        DB::delete("DELETE FROM tbl_more_images WHERE id = ? ",[$id]);
        return redirect(route('admin.view.product'))->with('status','Product Image deleted successfully');
    }
}
