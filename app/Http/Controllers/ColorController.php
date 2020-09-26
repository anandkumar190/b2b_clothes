<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $color;

    public function __construct()
    {
        $this->color = new Color();
    }

    public function index()
    {
        return view('admin.color.index');
    }

    public function get_color_data()
    {
        $query = Color::select('id','color_name','color_pick','is_active');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Color();
        return view('admin.color.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->color->create_color($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Color Added Successfully !!');
            return redirect()->route('color.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Color::find($id);
        return view('admin.color.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->color->update_color($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Color Updated Successfully !!');
            return redirect()->route('color.index');
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
            $data = Color::find($id);
            $data->delete();
            Session::flash('success','Finish Deleted Successfully !!');
            return redirect()->route('color.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'color_name'=>'required',
            'color_pick'=>'required',
            'is_active'=>'required',
        ]);
    }
}
