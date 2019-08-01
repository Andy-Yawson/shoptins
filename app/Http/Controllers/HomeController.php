<?php

namespace App\Http\Controllers;

use App\Category;
use App\International;
use App\InternationalOrder;
use App\Manufacture;
use App\MoreImage;
use App\Product;
use App\Review;
use App\Shop;
use App\Slider;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['welcome','viewShop','show_product_by_category',
            'get_product_details','show_product_by_manufacture','contact',
                'postContact','privacyPolicy',
            'termsCondition','show_product_by_shops','userRedirect','userCallback',
                'searchQueryResults','searchQuery','home','about','internationalForm','addInternationalShopping']);
    }


    public function welcome(){
        /*$arr_ip = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
        echo "<pre>";
        var_dump($arr_ip);
        echo "</pre>";*/


        $slider = Slider::where('publication_status','=',1)->get();

        $product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.publication_status',1)
            ->orderBy('tbl_products.product_id','desc')
            ->limit(16)
            ->get();

            $featured = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.publication_status',1)
            ->where('tbl_products.feature',1)
            ->limit(8)
            ->get();

        return view('welcome',['product'=>$product,'slider'=>$slider,
                    'featured' => $featured]);
    }

    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function internationalForm(){
        return view('international.order-form');
    }

    public function addInternationalShopping(Request $request)
    {
        $this->validate($request,array(
            'link' => 'required',
            'quantity' => 'required',
            'weight' => 'required',
            'origin' => 'required',
            'destination' => 'required',
        ));

        if ($request->other == null)
            $other = "none";
        else
            $other = $request->other;

        if ($request->shopper_assist ==  null)
            $shopper_assist = 0;
        else
            $shopper_assist = 1;

        if ($request->self_shopper == null)
            $self_shopper = 0;
        else
            $self_shopper = 1;

        if ($request->address == null)
            $address = "none";
        else
            $address = $request->address;

        if (!Session::has('code')){
            $order_code = substr(sha1(time()),0,6);
            Session::put('code',$order_code);
        }
        $international = new International();
        $international->link = $request->link;
        $international->quantity = $request->quantity;
        $international->weight = $request->weight;
        $international->origin = $request->origin;
        $international->destination = $request->destination;
        $international->other = $other;
        $international->shopper_assist = $shopper_assist;
        $international->self_shopper = $self_shopper;
        $international->address = $address;
        $international->code = Session::get('code');

        $international->save();


        return redirect()->route('user.int.order')
            ->with('success','product added successfully');
    }

    public function placeInternationalOrder(){
        International::where('code',Session::get('code'))
            ->update(['user_id'=>\auth()->user()->id]);
        $code = Session::get('code');

        InternationalOrder::create([
            'order_code' => $code,
            'customer_id' => \auth()->user()->id,
            'status' => 0
        ]);

        Session::forget('code');
        return redirect()->route('user.confirm')->with('code',$code);
    }

    public function viewShop(){
        $category = Category::all();
        $product =$product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.publication_status',1)
            ->paginate(24);
        $manufacture = Manufacture::all();
        return view('shop',['category'=>$category,'product'=>$product,
            'manufacture'=>$manufacture,'categories'=>$category]);
    }

    public function show_product_by_shops($shop_id){
        $product =$product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->paginate(9);

        $category = Category::all();
        $manufacture = Manufacture::all();

        return view('shop',['category'=>$category,'product'=>$product,
            'manufacture'=>$manufacture,'categories'=>$category]);
    }

    public function show_product_by_category($category_id){
        $product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->select('tbl_products.*','tbl_category.category_name')
            ->where('tbl_category.category_id',$category_id)
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->paginate(9);
        $category = Category::all();
        $manufacture = Manufacture::all();

        return view('shop',['product'=>$product,'category'=>$category,
            'manufacture'=>$manufacture,'categories'=>$category]);
    }

    public function show_product_by_manufacture($manufacture_id){
        $category = Category::all();
        $product =$product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_manufacture.manufacture_id',$manufacture_id)
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->paginate(9);
        $manufacture = Manufacture::all();

        return view('shop',['category'=>$category,'product'=>$product,
            'manufacture'=>$manufacture,'categories'=>$category]);
    }

    public function get_product_details($product_id){

        $product =$product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.product_id',$product_id)
            ->where('tbl_products.publication_status',1)
            ->first();

        $otherProduct = DB::table('tbl_products')->where([
            ['product_id', '!=', $product_id], ['category_id','=', $product->category_id]
        ])->take(4)->inRandomOrder()->get();
        $category = Category::all();
        $reviews = Review::where('product_id','=',$product_id)->get();

        $moreImages = MoreImage::where('product_id','=',$product_id)->get();

        return view('product_details',['product'=>$product,'others'=>$otherProduct,
            'categories'=>$category,'moreImages'=>$moreImages,'reviews'=>$reviews]);
    }

    public function contact(){
        return view('contact');
    }

    public function postContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'name' => 'required|min:3',
            'message' => 'required|min:10',
            'phone' => 'required|min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'bodyMessage' => $request->message,
        );

        Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('support@shoptins.com');
            $message->subject($data['subject']);
        });

        return redirect(route('user.contact'))->with('success','Your email was sent!');
    }

    public function privacyPolicy(){
        return view('privacy');
    }

    public function termsCondition(){
        $category = Category::all();
        return view('terms',['categories'=>$category]);
    }

    public function loginView(){
        return view('auth.login');
    }

    public function searchQuery(Request $request){
        $query = $request->search_query;
        return $this->searchQueryResults($query);
    }

    public function searchQueryResults($query){

        $results =$product = DB::table('tbl_products')
            ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
            ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
            ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
            ->where('tbl_products.product_name','LIKE','%'.$query.'%')
            ->where('tbl_products.publication_status',1)
            ->limit(18)
            ->paginate(12);

        return view('search',['results'=>$results]);
    }

}
