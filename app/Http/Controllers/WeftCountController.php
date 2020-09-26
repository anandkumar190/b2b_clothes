<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\WeftCount;
use Illuminate\Http\Request;

class WeftCountController extends Controller
{
   /*
    @Author Robil Sharma
    @Date 1 Sept 2020
    */
    private $category;

    public function __construct()
    {
        $this->weftCount = new WeftCount();
    }

    public function index()
    {
        return view('admin.weftCount.index');
    }

    public function get_weft_data()
    {
        $query = WeftCount::select('id','weft_count','is_active');
        return datatables($query)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new WeftCount();
        return view('admin.weftCount.create',compact('data'));
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
        $response = $this->weftCount->create_weft($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Weft Added Successfully !!');
            return redirect()->route('weftCount.index');
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
        return view('admin.weftCount.edit',compact('data','id'));
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
        $response = $this->weftCount->update_weft($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Weft Updated Successfully !!');
            return redirect()->route('weftCount.index');
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
            $data = WeftCount::find($id);
            $data->delete();
            Session::flash('success','Weft Deleted Successfully !!');
            return redirect()->route('weftCount.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'weft_count'=>'required',
            'is_active'=>'required',
        ]);
    }
}
