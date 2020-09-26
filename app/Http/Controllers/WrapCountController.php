<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\WrapCount;
use Illuminate\Http\Request;

class WrapCountController extends Controller
{
    /*
    @Author Robil Sharma
    @Date 1 Sept 2020
    */
    private $category;

    public function __construct()
    {
        $this->wrapCount = new WrapCount();
    }

    public function index()
    {
        return view('admin.wrapCount.index');
    }

    public function get_wrap_data()
    {
        $query = WrapCount::select('id','wrap_count','is_active');
        return datatables($query)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new WrapCount();
        return view('admin.wrapCount.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->wrapCount->create_wrap($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Wrap Added Successfully !!');
            return redirect()->route('wrapCount.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = WrapCount::find($id);
        return view('admin.wrapCount.edit',compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->wrapCount->update_wrap($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Wrap Updated Successfully !!');
            return redirect()->route('wrapCount.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = WrapCount::find($id);
            $data->delete();
            Session::flash('success','Wrap Deleted Successfully !!');
            return redirect()->route('wrapCount.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'wrap_count'=>'required',
            'is_active'=>'required',
        ]);
    }
}
