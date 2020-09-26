<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class WrapCount extends Model
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

    public function create_wrap($data)
    {
        $response = array();
        try{
            $category = WrapCount::create($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {
            $response['status'] = '2';
        }
        return $response;
    }

    public function update_wrap($data,$id)
    {
        $response = array();
        try{
            $category = DB::table('wrap_counts')->where('id',$id)->update($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {
            $response['status'] = '2';
        }
        return $response;
    }
}
