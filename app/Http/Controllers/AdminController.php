<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Category;
use App\SubCategory;
use App\BlendContent;
use App\Color;
use App\Country;
use App\Finish;
use App\Price;
use App\TradeName;
use App\Weave;
use App\Certificate;
use App\BlockUsers;
use App\Product;
use App\WeftCount;
use App\WrapCount;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $blockUser;

    public function __construct()
    {
        $this->blockUser = new BlockUsers;
    }

    public function adminIndex()
    {
        $category = Category::count();
        $subcategory = SubCategory::count();
        $subcategory = SubCategory::count();
        $blendContent = BlendContent::count();
        $color = Color::count();
        $country = Country::count();
        $finish = Finish::count();
        $tradeName = TradeName::count();
        $price = Price::count();
        $weave = Weave::count();
        $certificate = Certificate::count();
        $product = Product::where('is_active',1)->count();
        $seller = User::where('user_type','=','2')->count();
        $WeftCount = WeftCount::count();
        $WrapCount = WrapCount::count();
        return view('admin.index',compact('category','subcategory','seller','blendContent','color','country','finish','tradeName','price','weave','certificate','product','WeftCount','WrapCount'));
    }

    public function seller_listing()
    {
        return view('admin.seller_listing');
    }

    public function block_seller($id)
    {
        $reason = request()->reason;
        $response = $this->blockUser->block($reason,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Seller Blocked Successfully !!');
            return redirect()->route('seller_listing');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }
}
