<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\TradeName;
use Illuminate\Http\Request;

class TradeNameController extends Controller
{
    private $tradeName;

    public function __construct()
    {
        $this->tradeName = new TradeName();
    }

    public function index()
    {
        return view('admin.tradename.index');
    }

    public function get_tradename_data()
    {
        $query = TradeName::select('id','trade_name','is_active');
        return datatables($query)->make(true);
    }
    
    public function create()
    {
        $data = new TradeName();
        return view('admin.tradename.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->tradeName->create_tradeName($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Trade Name Added Successfully !!');
            return redirect()->route('tradename.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function edit($id)
    {
        $data = TradeName::find($id);
        return view('admin.tradename.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->tradeName->update_tradeName($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Trade Name Updated Successfully !!');
            return redirect()->route('tradename.index');
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
            $data = TradeName::find($id);
            $data->delete();
            Session::flash('success','Trade Name Deleted Successfully !!');
            return redirect()->route('tradename.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'trade_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
