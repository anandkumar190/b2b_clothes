<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Weave extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'is_active' => 0
    ];

    public function getIsActiveAttribute($attribute)
    {
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions()
    {
       return [
            1 => 'Active',
            0 => 'Inactive'
        ];
    }

    public function create_weave($data)
    {
        $response = array();
        try{
            $category = Weave::create($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {
            $response['status'] = '2';
        }
        return $response;
    }

    public function update_weave($data,$id)
    {
        $response = array();
        try{
            $category = DB::table('weaves')->where('id',$id)->update($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {
            $response['status'] = '2';
        }
        return $response;
    }
}
