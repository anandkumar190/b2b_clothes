<?php

namespace App;

use DB;
use File;
use App\Exceptions;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
   protected $guarded = [];

   public function update_seller($id,$data,$seller)
   {
       $image = $seller['old_image'];
       $imageValue = Seller::select('logo')->where('user_id',$id)->first();
       $response = array();
       if(!empty($seller['logo']))
        {
            $path = public_path()."/images/seller_logo/".$id.'/'.$imageValue->logo;
            File::delete($path);
            $image = $seller['logo'];
        }
       try{
            unset($seller['old_image']);
            $data['display_name'] = $data['f_name'].' '.$data['l_name'];
            DB::table('users')->where('id',$id)->update($data);
            try{
               DB::table('sellers')->where('user_id',$id)->update($seller);
               $this->uploadPic($image,$id);
            }
            catch(\Exception $e){
               $exception['module_name'] = 'Seller Update';
               $exception['exception_error'] = $e->getMessage();
               Exceptions::create($exception);
               $response['status'] = '2';
            }
            $response['status'] = 1;
       }catch(\Exception $e)
       { 
           $exception['module_name'] = 'Seller Update';
           $exception['exception_error'] = $e->getMessage();
           Exceptions::create($exception);
           $response['status'] = '2';
       }
       return $response;
   }

   public function uploadPic($image,$id)
    {
        if(!is_string($image))
        {
            $seller = uniqid().$image->getClientOriginalName();
            $destination_path = public_path("images/seller_logo/".$id);
            $image->move($destination_path,$seller);
            DB::table('sellers')->where('user_id',$id)->update(['logo'=>$seller]);
        }
        else
        {
            DB::table('sellers')->where('user_id',$id)->update(['logo'=>$image]);
        }
    }
}
