<?php

namespace App;

use Hash;
use App\Exceptions;
use App\Seller;
use App\Events\SellerRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getIsActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions()
    {
       return [
            1 => 'Approved',
            2 => 'Declined',
            0 => 'Inactive',
        ];
    }
    
    public function checkDuplicate($column,$value)
    {
        $exist = User::where($column,$value)->where('user_type','2')->select('id')->first();
        if($exist)
        {
            $response['status'] = 1;
        }
        else
        {
            $response['status'] = 2;
        }
        return $response;
    }

    public function register_seller($data,$seller)
    {
        $pan = '';
        $gst = '';
        $image= '';
        $response = array();
        if(!empty($seller['logo']))
        {
            $image = $seller['logo'];
        }
        if($seller['country'] == '101')
        {
            $seller['currency'] = 'INR';
        }
        if(!empty($seller['pan_file']))
        {
            $pan = $seller['pan_file'];
        }
        if(!empty($seller['gst_file']))
        {
            $gst = $seller['gst_file'];
        }
        $data['display_name'] = $data['f_name'].' '.$data['l_name'];
        $data['password'] = Hash::make($data['password']);
        $data['user_type'] = '2';
        try{
            
            $user = User::create($data);
            $id = $user->id;
            $imageResponse = $this->uploadImage($image,$pan,$gst,$id);
            $seller['user_id'] = $id;
            if(!empty($imageResponse['logo_image']))
            {

                $seller['logo'] = $imageResponse['logo_image'];
            }
            if(!empty($imageResponse['pan_file']))
            {

                $seller['pan_file'] = $imageResponse['pan_file'];
            }
            if(!empty($imageResponse['pan_file']))
            {
                $seller['gst_file'] = $imageResponse['gst_file'];
            }
            Seller::create($seller);
            event(new SellerRegistered($user));
            $response['status'] = '1';
        }catch(\Exception $e)
        { 
            dd($e);
            $exception['module_name'] = 'Seller Register';
            $exception['exception_error'] = $e->getMessage();
            Exceptions::create($exception);
            $response['status'] = '2';
        }
        return $response;
    }

    public function uploadImage($image,$pan,$gst,$id)
    {
        $seller = array();
        if(!empty($image))
        {
            $logo_image = uniqid().$image->getClientOriginalName();
            $destination_path = public_path("images/seller_logo/".$id);
            $image->move($destination_path,$logo_image);
            $seller['logo_image'] = $logo_image;
        }
        if(!empty($pan))
        {
        $pan_image = uniqid().$pan->getClientOriginalName();
        $destination_path = public_path("images/seller_pan/".$id);
        $pan->move($destination_path,$pan_image);
        $seller['pan_file'] = $pan_image;
        }

        if(!empty($gst))
        {
        $gst_image = uniqid().$gst->getClientOriginalName();
        $destination_path = public_path("images/seller_gst/".$id);
        $gst->move($destination_path,$gst_image);
        $seller['gst_file'] = $gst_image;
        }

        return $seller;
    }
}
