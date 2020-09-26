<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\User;
use Hash;
use App\Seller;
use App\DeclineReason;
use App\SubCategory;
use App\Price;
use App\Product;
use App\Country;
use App\States;
use App\City;
use App\Exceptions;
use App\Events\SellerApproved;
use App\Events\SellerDeclined;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->seller = new Seller();
    }

    public function dashboard()
    {
        $product = Product::where('is_active',1)->where('created_by',Auth::user()->id)->count();
        $seller  = Seller::select('user_id','logo')->where('user_id',Auth::user()->id)->first();
        return view('seller.dashboard',compact('product','seller'));
    }

    public function get_seller_listing()
    {
        $query = User::select('id','display_name','email','contact','is_active')->where('user_type','=','2');
        return datatables($query)->make(true);
    }

    public function seller_data($id)
    {
        $data = User::select('users.id as user_id','f_name','l_name','email','contact','address','city','state','country','zip','company_name','pan_number','gst_number','logo','is_active','countries.name as countryname','states.name as statename','cities.name as cityname')
            ->join('sellers', 'users.id', '=', 'sellers.user_id')
                ->join('countries','sellers.country','=','countries.id')
                    ->join('states','sellers.state','=','states.id')
                        ->join('cities','sellers.city','=','cities.id')
                             ->where('users.id',$id)->first();
        
        return view('admin.seller_profile',compact('data','id'));
    }

    public function update_seller($id)
    {
        $value = request()->value;
        $reason = request()->reason;
        $type = "success";
        $message = "Seller Approved Successfully";
        try{
            DB::table('users')->where('id',$id)->update(['is_active'=>$value]);
            $user = User::select('display_name','email')->where('id',$id)->first();
            if($value == '1')
            {
                event(new SellerApproved($user));
            }
            if($value == '2')
            {
                $type = "danger";
                $message = "Seller Decline Successfully";
                try{
                    $data = [
                        'user_id'=>$id,
                        'reason'=>$reason,
                    ];
                    $Decline = new DeclineReason();
                    $Decline->fill($data);
                    $Decline->save();
                    event(new SellerDeclined($user));
                }catch(\Exception $e)
                {
                    Session::flash('danger','Something went wrong !!');
                    return back();
                }
            }
            Session::flash($type,$message);
            return redirect()->route('seller_listing');
        }catch(\Exception $e)
        {
            $exception['module_name'] = 'Seller Approve';
            $exception['exception_error'] = $e->getMessage();
            Exceptions::create($exception);
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $countries = Country::select('id','name')->get();
        $cities = City::select('id','name')->get();
        $states = States::select('id','name')->get();
        $data = User::select('users.id as user_id','f_name','l_name','email','contact','address','city','state','country','zip','company_name','pan_number','gst_number','logo','is_active','countries.name as countryname','states.name as statename','cities.name as cityname')
            ->join('sellers', 'users.id', '=', 'sellers.user_id')
                ->join('countries','sellers.country','=','countries.id')
                    ->join('states','sellers.state','=','states.id')
                        ->join('cities','sellers.city','=','cities.id')
                             ->where('users.id',$id)->first();
        return view('seller.profile',compact('data','id','countries','cities','states'));
    }

    public function findSubcategory()
    {
        $val = request()->category_id;
        $sub_category = SubCategory::select('sub_category_name','id')->where('id',$val)->get();
        if(count($sub_category) > 0)
        {
            echo '<select name="sub_category" id="sub_category" class="form-control"><option value="" selected disabled="true">Select</option>';
            foreach ($sub_category as $key => $value)
            {
                echo '<option value='.$value->id.'>'.$value->sub_category_name.'</option>';
            }
            echo '</select>';
        }
        else
        {
            echo '<select name="sub_category" id="sub_category" class="form-control"><option value="" selected disabled="true">Select</option><option value="" disabled>No Sub-Cateogry Found</option></select>';
        }
    }

    public function calculateAmount()
    {
        $response = array();
        $val = request()->ruppe;
        $usd = Price::select('price_rate')->where('price_name','=','USD')->first();
        $euro = Price::select('price_rate')->where('price_name','=','EURO')->first();
        $response['usd'] = $val*$usd->price_rate;
        $response['euro'] = $val*$euro->price_rate;
        return $response;
    }

    public function blocked()
    {
        return view('seller.block');
    }

    public function update_profile($id)
    {
        $data = request()->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required',
            'contact'=>'required',
        ]);
        $seller =  request()->except(['_token','f_name','l_name','email','contact']);
        $response = $this->seller->update_seller($id,$data,$seller);
        if($response['status'] == '1')
        {
            Session::flash('success','Your Profile has been updated');
            return back();
        }
        else
        {
            return back();
        }
    }

    public function change_password($id)
    {
        $id = base64_decode($id);
        return view('seller.change_password',compact('id'));
    }

    public function update_password($id)
    {
        $id = base64_decode($id);
        $password = User::select('password')->where('id',$id)->first();
        $old_password = request()->old_password;
        if(Hash::check($old_password,$password->password))
        {
            $new_password = Hash::make(request()->new_password);
            try
            {
                User::where('id',$id)->update(['password'=>$new_password]);
                Session::flash('success','Password Updated Successfully !!');
                return back();
            }
            catch(\Exception $e)
            {
                Session::flash('danger','Something went wrong !!');
                return back();
            }
            User::where('id',$id)->update(['password'=>$new_password]);
        }
        else
        {
           Session::flash("danger","Old Password didn't match !!");
           return back();
        }
    }
}
