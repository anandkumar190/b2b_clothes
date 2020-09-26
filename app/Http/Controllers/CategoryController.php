<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
    @Author Robil Sharma
    @Date 1 Sept 2020
    */
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        return view('admin.category.index');
    }

    public function get_category_data()
    {
        $query = Category::select('id','category_name','is_active');
        return datatables($query)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Category();
        return view('admin.category.create',compact('data'));
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
        $response = $this->category->create_category($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Category Added Successfully !!');
            return redirect()->route('category.index');
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
        $data = Category::find($id);
        return view('admin.category.edit',compact('data','id'));
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
        $response = $this->category->update_category($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Category Updated Successfully !!');
            return redirect()->route('category.index');
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
            $data = Category::find($id);
            $data->delete();
            Session::flash('success','Category Deleted Successfully !!');
            return redirect()->route('category.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'category_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
