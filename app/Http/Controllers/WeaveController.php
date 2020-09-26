<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\Weave;
use Illuminate\Http\Request;

class WeaveController extends Controller
{

    private $weave;

    public function __construct()
    {
        $this->weave = new Weave();
    }

    public function index()
    {
        return view('admin.weave.index');
    }

    public function get_weave_data()
    {
        $query = Weave::select('id','weave_name','is_active');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Weave();
        return view('admin.weave.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->weave->create_weave($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Weave Added Successfully !!');
            return redirect()->route('weave.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Weave::find($id);
        return view('admin.weave.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->weave->update_weave($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Weave Updated Successfully !!');
            return redirect()->route('weave.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function destroy($id)
    {
        try{
            $data = Weave::find($id);
            $data->delete();
            Session::flash('success','Weave Deleted Successfully !!');
            return redirect()->route('weave.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'weave_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
