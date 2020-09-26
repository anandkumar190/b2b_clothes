<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Quantity;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    /*
    @Author Robil Sharma
    @Date 1 Sept 2020
    */
    private $quantity;

    public function __construct()
    {
        $this->quantity = new Quantity();
    }

    public function index()
    {
        return view('admin.quantity.index');
    }

    public function get_quantity_data()
    {
        $query = Quantity::select('id','quantity','is_active');
        return datatables($query)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Quantity();
        return view('admin.quantity.create',compact('data'));
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
        $response = $this->quantity->create_quantity($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Quantity Added Successfully !!');
            return redirect()->route('quantity.index');
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
        $data = Quantity::find($id);
        return view('admin.quantity.edit',compact('data','id'));
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
        $response = $this->quantity->update_quantity($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Quantity Updated Successfully !!');
            return redirect()->route('quantity.index');
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
            $data = Quantity::find($id);
            $data->delete();
            Session::flash('success','Quantity Deleted Successfully !!');
            return redirect()->route('quantity.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'quantity'=>'required',
            'is_active'=>'required',
        ]);
    }
}
