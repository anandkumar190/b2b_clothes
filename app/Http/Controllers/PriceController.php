<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /*
    @Author Robil Sharma
    @Date 4 Sept 2020
    */

    private $price;

    public function __construct()
    {
        $this->price = new Price();
    }

    public function index()
    {
        return view('admin.price.index');
    }

    public function get_price_data()
    {
        $query = Price::select('id','price_name','price_rate','is_active');
        return datatables($query)->make(true);
    }
    
    public function create()
    {
        $data = new Price();
        return view('admin.price.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->price->create_price($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Price Added Successfully !!');
            return redirect()->route('price.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function edit($id)
    {
        $data = Price::find($id);
        return view('admin.price.edit',compact('data','id'));
    }

    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->price->update_price($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Price Updated Successfully !!');
            return redirect()->route('price.index');
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
            $data = Price::find($id);
            $data->delete();
            Session::flash('success','Price Deleted Successfully !!');
            return redirect()->route('price.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'price_name'=>'required',
            'price_rate'=>'required',
            'is_active'=>'required',
        ]);
    }
}
