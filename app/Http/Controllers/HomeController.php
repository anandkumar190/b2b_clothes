<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Country;
use App\States;
use App\City;
use App\User;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   private $user;

   public function __construct()
   {
       $this->user = new User();
   }

   public function seller_login()
   {
       $type = '1';
       return view('seller.login',compact('type'));
   }

   public function seller_register()
   {
       $type = '2';
       $countries = Country::select('id','name','phonecode')->get();
       return view('seller.register',compact('type','countries'));
   }

   public function register_seller()
   { 
        $data = request()->validate([
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'contact'=>'required',
            'password'=>'required',
        ]);
        
        $seller =  request()->validate([
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zip'=>'required',
            'company_name'=>'required',
        ]);
        
        $seller['pan_number'] = request()->pan_number;
        $seller['gst_number'] = request()->gst_number;
        $seller['gst_file'] = request()->gst_file;
        $seller['pan_file'] = request()->pan_file;
        $seller['currency'] = request()->currency;
        $seller['logo'] = request()->logo;
        $response = $this->user->register_seller($data,$seller);
        if($response['status'] == '1')
        {
            Session::flash('success','Your Registration is successful, Account is in verfication process. Once, account get approved you will get notification email');
            return back();
        }
        else
        {
            return back();
        }
   }

   public function login_seller(Request $request)
   {
        $credentials = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_active' => 1
        );
        if (Auth::attempt($credentials)) {
            if(Auth::user()->user_type == '1')
            {
                return redirect()->route('admin_index');
            }
            else if(Auth::user()->user_type == '2')
            {
                if(Auth::user()->is_blocked == '0')
                {
                    return redirect()->route('seller_dashboard');
                }
                else
                {
                    return redirect()->route('blocked');
                }
            }
        }
        else
        {
            Session::flash('success','Wrong Credentials');
            return back();
        }
   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

   public function checkDuplicate()
    {
        $column = request()->column_name;
        $value = request()->value;

        $status = $this->user->checkDuplicate($column,$value);
        return $status;
    }

    public function findState()
    {
        $country = request()->val;
        $states = States::select('name','id')->where('country_id',$country)->get();
        $country = Country::select('phonecode')->where('id',$country)->first();
        if(count($states) > 0)
        {
            echo '<select name="state" id="state" class="state form-control" onchange="getCity(this.value)"><option value="" selected disabled="true">Select</option>';
            foreach ($states as $key => $value)
            {
                echo '<option value='.$value->id.'>'.$value->name.'</option>';
            }
            echo '</select>';
        }
        else
        {
            echo '<select name="state" id="state" class="state form-control"><option value="" selected disabled="true">Select</option><option value="" disabled>No State Found</option></select>';
        }
    }

    public function findPhoneCode()
    {
        $country = request()->val;
        $countries = Country::select('phonecode')->where('id',$country)->first();
        return $countries->phonecode;
    }

    public function findCity()
    {
        $country = request()->val;
        $cities = City::select('name','id')->where('state_id',$country)->get();
        if(count($cities) > 0)
        {
            echo '<select name="city" id="city" class="city form-control"><option value="" selected disabled="true">Select</option>';
            foreach ($cities as $key => $value)
            {
                echo '<option value='.$value->id.'>'.$value->name.'</option>';
            }
            echo '</select>';
        }
        else
        {
            echo '<select name="city" id="city" class="city form-control"><option value="" selected disabled="true">Select</option><option value="" disabled>No City Found</option></select>';
        }
    }
}
