<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    private $certificate;

    public function __construct()
    {
        $this->certificate = new Certificate();
    }

    public function index()
    {
        return view('admin.certificate.index');
    }

    public function get_certificate_data()
    {
        $query = Certificate::select('id','certificate_name','is_active');
        return datatables($query)->make(true);
    }

    public function create()
    {
        $data = new Certificate();
        return view('admin.certificate.create',compact('data'));
    }

    public function store()
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->certificate->create_certificate($data);
        if($response['status'] == '1')
        {
            Session::flash('success','Certificate Added Successfully !!');
            return redirect()->route('certificate.index');
        }
        else
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    
    public function edit($id)
    {
        $data = Certificate::find($id);
        return view('admin.certificate.edit',compact('data','id'));
    }


    public function update($id)
    {
        $data = $this->requestData();
        $data['created_by'] = Auth::user()->id;
        $response = $this->certificate->update_certificate($data,$id);
        if($response['status'] == '1')
        {
            Session::flash('success','Certificate Updated Successfully !!');
            return redirect()->route('certificate.index');
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
            $data = Certificate::find($id);
            $data->delete();
            Session::flash('success','Certificate Deleted Successfully !!');
            return redirect()->route('certificate.index');
        }catch(\Exception $e)
        {
            Session::flash('danger','Something went wrong !!');
            return back();
        }
    }

    public function requestData()
    {
        return request()->validate([
            'certificate_name'=>'required',
            'is_active'=>'required',
        ]);
    }
}
