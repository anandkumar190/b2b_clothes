<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Finish;
use Illuminate\Http\Request;

class FinishController extends Controller
{
    private $finish;

    public function __construct()
    {
        $this->finish = new Finish();
    }

    public function index()
    {
        return view('admin.finishes.index');
    }

    public function get_finish_data()
    {
        $query = Finish::select('id','finish_name','is_active');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Finish();
        return view('admin.finishes.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->finish->create_finish($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Finish Added Successfully !!');
            return redirect()->route('finish.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Finish::find($id);
        return view('admin.finishes.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->finish->update_finish($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Finish Updated Successfully !!');
            return redirect()->route('finish.index');
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
            $data = Finish::find($id);
            $data->delete();
            Session::flash('success','Finish Deleted Successfully !!');
            return redirect()->route('finish.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'finish_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
