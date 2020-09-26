<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\BlendContent;
use Illuminate\Http\Request;

class BlendContentController extends Controller
{
    private $blendContent;

    public function __construct()
    {
        $this->blendContent = new BlendContent();
    }

    public function index()
    {
        return view('admin.blendContent.index');
    }

    public function get_blendContent_data()
    {
        $query = BlendContent::select('id','blend_content_name','is_active');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new BlendContent();
        return view('admin.blendContent.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->blendContent->create_blendContent($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Blend Content Added Successfully !!');
            return redirect()->route('blendContent.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = BlendContent::find($id);
        return view('admin.blendContent.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->blendContent->update_blendContent($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Blend Content Updated Successfully !!');
            return redirect()->route('blendContent.index');
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
            $data = BlendContent::find($id);
            $data->delete();
            Session::flash('success','Finish Deleted Successfully !!');
            return redirect()->route('blendContent.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'blend_content_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
