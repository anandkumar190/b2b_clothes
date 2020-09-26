<?php

namespace App;

use DB;
use File;
use App\ProductQuantityPrice;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

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

    public function store_product($data)
    {
        $product_data = $data;
        $image_1 = $data['image_1'];
        $image_2 = $data['image_2'];
        $image_3 = $data['image_3'];
        $response = array();
        unset($data['quantity'],$data['price'],$data['price_id']);
        try{
            $data['slug_title'] = Str::slug($data['title'], '-');
            $product = Product::create($data);
            foreach($product_data['quantity'] as $key => $value )
            {
                $productPrice['product_id'] = $product->id;
                $productPrice['quantity_id'] = $value;
                $productPrice['price'] = $product_data['price'][$key];
                ProductQuantityPrice::create($productPrice);
            }
            unset($product->image_1,$product->image_2,$product->image_3);
            $id = $product->id;
            // Uploading image and making folder
            $this->uploadPic($image_1,$image_2,$image_3,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function update_product($data,$id)
    {
        $product_data = $data;
        $image_1 = $data['old_image_1'];
        $image_2 = $data['old_image_2'];
        $image_3 = $data['old_image_3'];
        $data['old_image_1'] = 0;
        $data['old_image_2'] = 0;
        $data['old_image_3'] = 0;
        $imageValue = Product::select('image_1','image_2','image_3','id')->find($id);
        if(!empty($data['image_1']))
        {
            $path = public_path()."/images/product/".$id.'/'.$imageValue->image_1;
            File::delete($path);
            $image_1 = $data['image_1'];
        }
        if(!empty($data['image_2']))
        {
            $path = public_path()."/images/product/".$id.'/'.$imageValue->image_2;
            File::delete($path);
            $image_2 = $data['image_2'];
        }
        if(!empty($data['image_3']))
        {
            $path = public_path()."/images/product/".$id.'/'.$imageValue->image_3;
            File::delete($path);
            $image_3 = $data['image_3'];
        }
        unset($data['quantity'],$data['price'],$data['price_id']);
        try{
            $data['slug_title'] = Str::slug($data['title'], '-');
            $product = DB::table('products')->where('id',$id)->update($data);
            foreach($product_data['quantity'] as $key => $value )
            {
                $id = $product_data['price_id'][$key];
                $price = $product_data['price'][$key];
                ProductQuantityPrice::where('id',$id)->update(['price'=>$price]);
            }
            $this->uploadPic($image_1,$image_2,$image_3,$id);
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }

    public function uploadPic($image_1,$image_2,$image_3,$id)
    {
        // Uploading image and making folder
        if(!is_string($image_1))
        {
            $product_image_1 = uniqid().$image_1->getClientOriginalName();
            $destination_path = public_path("images/product/".$id);
            $image_1->move($destination_path,$product_image_1);
            DB::table('products')->where('id',$id)->update(['image_1'=>$product_image_1]);
        }
        else
        {
            DB::table('products')->where('id',$id)->update(['image_1'=>$image_1]);
        }

        // Uploading image and making folder
        if(!is_string($image_2))
        {
        $product_image_2 = uniqid().$image_2->getClientOriginalName();
        $destination_path = public_path("images/product/".$id);
        $image_2->move($destination_path,$product_image_2);
        DB::table('products')->where('id',$id)->update(['image_2'=>$product_image_2]);
        }
        else
        {
            DB::table('products')->where('id',$id)->update(['image_2'=>$image_2]);
        }

        // Uploading image and making folder
        if(!is_string($image_3))
        {
            $product_image_3 = uniqid().$image_3->getClientOriginalName();
            $destination_path = public_path("images/product/".$id);
            $image_3->move($destination_path,$product_image_3);
            DB::table('products')->where('id',$id)->update(['image_3'=>$product_image_3]);
        }
        else
        {
            DB::table('products')->where('id',$id)->update(['image_3'=>$image_3]);
        }
        
    }
}
