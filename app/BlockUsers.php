<?php

namespace App;

use DB;
use App\User;
use App\Events\UserBlocked;
use Illuminate\Database\Eloquent\Model;

class BlockUsers extends Model
{
    protected $guarded = [];

    public function block($reason,$id)
    {
        $data = [
            'reason' => $reason,
            'user_id' =>  $id,
        ];
        $response = array();
        try
        {
            DB::table('users')->where('id',$id)->update(['is_blocked'=>'1']);
            BlockUsers::create($data);
            $user = User::select('display_name','email')->where('id',$id)->first();
            event(new UserBlocked($user));
            $response['status'] = 1;
        }catch(\Exception $e)
        {
            dd($e);
            $response['status'] = 2;
        }
        return $response;
    }
}
