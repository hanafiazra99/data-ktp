<?php

namespace App\Http\Controllers;

use App\Models\DataKtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataKtpController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'admin'){
            $data = DataKtp::all();
        }else{
            $data = DataKtp::where('user_id',Auth::user()->id)->get();
        }

        return view('page.index',compact('data'));
    }
    public function create(){
        return view('page.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'provinsi'=>'required',
            'kota'=>'required',
            'nik'=>'numeric|unique:data_penduduk,nik',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'pekerjaan'=>'required',
            'agama'=>'required',
            'status_perkawinan'=>'required'
        ]);
        $request['user_id'] = Auth::user()->id;
        DataKtp::create($request->all());
        return redirect()->route('ktp.index');
    }
    public function edit(DataKtp $ktp){
        return view('page.edit',compact('ktp'));
    }
    public function update(Request $request, DataKtp $ktp){
        $this->validate($request,[
            'provinsi'=>'required',
            'kota'=>'required',
            'nik'=>'numeric|unique:data_penduduk,nik',
            'nama'=>'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required|date',
            'jenis_kelamin'=>'required',
            'alamat'=>'required',
            'pekerjaan'=>'required',
            'agama'=>'required',
            'status_perkawinan'=>'required'
        ]);
        $ktp->update($request->all());
        return redirect()->route('ktp.index');
    }
    public function delete(DataKtp $ktp){
        $ktp->delete();
        return redirect()->route('ktp.index');
    }
}
