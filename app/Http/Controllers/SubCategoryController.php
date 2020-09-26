<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

     /*
    @Author Robil Sharma
    @Date 1 Sept 2020
    */
    private $subcategory;

    public function __construct()
    {
        $this->subcategory = new SubCategory();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_subcategory_data()
    {
        $query = SubCategory::join('categories','sub_categories.category_id','=','categories.id')->select('sub_categories.id','sub_category_name','sub_categories.is_active','category_name');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new SubCategory();
        $categorys = Category::select('id','category_name')->latest()->get();
        return view('admin.subcategory.create',compact('data','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->subcategory->create_subcategory($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Sub-Category Added Successfully !!');
            return redirect()->route('subcategory.index');
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
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SubCategory::find($id);
        $categorys = Category::select('id','category_name')->latest()->get();
        return view('admin.subcategory.edit',compact('data','id','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->subcategory->update_subcategory($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Sub-Category Updated Successfully !!');
            return redirect()->route('subcategory.index');
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
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data = SubCategory::find($id);
            $data->delete();
            Session::flash('success','Sub-Category Deleted Successfully !!');
            return redirect()->route('subcategory.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'category_id'=>'required',
            'sub_category_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
