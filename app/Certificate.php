<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
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

    public function create_certificate($data)
    {
        $response = array();
        try{
            $category = Certificate::create($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {

            $response['status'] = '2';
        }
        return $response;
    }

    public function update_certificate($data,$id)
    {
        $response = array();
        try{
            $category = DB::table('certificates')->where('id',$id)->update($data);
            $response['status'] = '1';
        }catch(\Exception $e)
        {
            $response['status'] = '2';
        }
        return $response;
    }
}
