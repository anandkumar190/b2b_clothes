<?php

namespace App\Http\Controllers;

use Auth;
use App\Weave;
use App\Category;
use App\Color;
use App\Finish;
use App\Price;
use App\TradeName;
use App\BlendContent;
use App\Product;
use App\Certificate;
use App\WeftCount;
use App\WrapCount;
use App\Country;
use App\Seller;
use App\Quantity;
use App\ProductQuantityPrice;
use Session;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        return view('seller.product.index');
    }

    public function get_product_data()
    {
        $query = Product::select('products.id','category_name','title','image_1')
                        ->join('categories', 'products.category', '=', 'categories.id')->where('products.created_by',Auth::user()->id);
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Product();
        $product_price = new ProductQuantityPrice();
        $weaves = Weave::select('id','weave_name')->where('is_active',1)->get();
        $finishes = Finish::select('id','finish_name')->where('is_active',1)->get();
        $tadeNames = TradeName::select('id','trade_name')->where('is_active',1)->get();
        $categories = Category::select('id','category_name')->where('is_active',1)->get();
        $blendContents = BlendContent::select('id','blend_content_name')->where('is_active',1)->get();
        $colors = Color::select('id','color_name')->where('is_active',1)->get();
        $certificaties = Certificate::select('id','certificate_name')->where('is_active',1)->get();
        $WeftCounts = WeftCount::select('id','weft_count')->where('is_active',1)->get();
        $WrapCounts = WrapCount::select('id','wrap_count')->where('is_active',1)->get();
        $countries = Country::select('id','name')->get();
        $quantities = Quantity::select('quantity','id')->get();
        $SellerCountry = Seller::select('country','currency')->where('user_id',Auth::user()->id)->first();
        return view('seller.product.create',compact('data','weaves','finishes','tadeNames','categories','blendContents','colors','certificaties','WeftCounts','WrapCounts','countries','SellerCountry','quantities','product_price'));
    }

    
    public function store()
    {
        $data = Validator::make(request()->all(),[
            'title'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'weave'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'gsm'=>'required',
            'trade_name'=>'required',
            'finish'=>'required',
            'image_1'=>'required',
            'image_2'=>'required',
            'image_3'=>'required',
            'color_1'=>'required',
            'color_2'=>'sometimes|required',
            'color_3'=>'sometimes|required',
            'color_4'=>'sometimes|required',
            'color_5'=>'sometimes|required',
            'color_6'=>'sometimes|required',
            'blend_1'=>'required',
            'blend_2'=>'sometimes|required',
            'blend_3'=>'sometimes|required',
            'blend_4'=>'sometimes|required',
            'blend_4'=>'sometimes|required',
            'wrap_count_A'=>'required',
            'wrap_count_B'=>'sometimes|required',
            'wrap_count_C'=>'sometimes|required',
            'weft_count_A'=>'required',
            'weft_count_B'=>'sometimes|required',
            'weft_count_C'=>'sometimes|required',
            'reed'=>'required',
            'pick'=>'required',
            'width_inch'=>'required',
            'width_cm'=>'required',
            'percentage_1'=>'required',
            'meter'=>'required',
            'yard'=>'required',
            'moq'=>'required',
            'insception'=>'required',
            'test'=>'required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->all();
        }
        $data['created_by'] = Auth::user()->id;
        $response = $this->product->store_product($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Product Added Successfully !!');
            return redirect()->route('product.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Product::find($id);
        $product_price = ProductQuantityPrice::where('product_id',$id)->select('id','price')->get();
        $weaves = Weave::select('id','weave_name')->where('is_active',1)->get();
        $finishes = Finish::select('id','finish_name')->where('is_active',1)->get();
        $tadeNames = TradeName::select('id','trade_name')->where('is_active',1)->get();
        $categories = Category::select('id','category_name')->where('is_active',1)->get();
        $blendContents = BlendContent::select('id','blend_content_name')->where('is_active',1)->get();
        $colors = Color::select('id','color_name')->where('is_active',1)->get();
        $certificaties = Certificate::select('id','certificate_name')->where('is_active',1)->get();
        $WeftCounts = WeftCount::select('id','weft_count')->where('is_active',1)->get();
        $WrapCounts = WrapCount::select('id','wrap_count')->where('is_active',1)->get();
        $countries = Country::select('id','name')->get();
        $quantities = Quantity::select('quantity','id')->get();
        $SellerCountry = Seller::select('country')->where('user_id',Auth::user()->id)->first();
        return view('seller.product.edit',compact('weaves','finishes','tadeNames','categories','blendContents','colors','certificaties','data','id','WeftCounts','WrapCounts','countries','SellerCountry','quantities','product_price'));
    }
    
    public function update($id)
    {
        $data = Validator::make(request()->all(),[
            'title'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'weave'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'gsm'=>'required',
            'trade_name'=>'required',
            'finish'=>'required',
            'image_1'=>'sometimes|required',
            'image_2'=>'sometimes|required',
            'image_3'=>'sometimes|required',
            'color_1'=>'required',
            'color_2'=>'sometimes|required',
            'color_3'=>'sometimes|required',
            'color_4'=>'sometimes|required',
            'color_5'=>'sometimes|required',
            'color_6'=>'sometimes|required',
            'blend_1'=>'required',
            'blend_2'=>'sometimes|required',
            'blend_3'=>'sometimes|required',
            'blend_4'=>'sometimes|required',
            'wrap_count_A'=>'required',
            'wrap_count_B'=>'sometimes|required',
            'wrap_count_C'=>'sometimes|required',
            'weft_count_A'=>'required',
            'weft_count_B'=>'sometimes|required',
            'weft_count_C'=>'sometimes|required',
            'reed'=>'required',
            'pick'=>'required',
            'width_inch'=>'required',
            'width_cm'=>'required',
            'percentage_1'=>'required',
            'meter'=>'required',
            'yard'=>'required',
            'moq'=>'required',
            'insception'=>'required',
            'test'=>'required',
            'old_image_1'=>'sometimes|required',
            'old_image_2'=>'sometimes|required',
            'old_image_3'=>'sometimes|required',
        ]);
        if($data->fails())
        {
            return redirect()->back()->withErrors($data)->withInput();
        }
        else
        {
            $data = request()->except(['_method','_token']);
        }
        $data['created_by'] = Auth::user()->id;
        $response = $this->product->update_product($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Product Updated Successfully !!');
            return redirect()->route('product.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $data = Product::find($id);
            $data->delete();
            ProductQuantityPrice::where('product_id',$id)->delete();
            Session::flash('success','Product Deleted Successfully !!');
            return redirect()->route('product.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }
}
