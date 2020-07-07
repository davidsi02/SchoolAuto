<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

use App\User;

use Session;

use App\Http\Controllers\Controller;

class CSVController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
       $siswa = User::all();
       return view('import', ['siswa'=>$siswa]);
    }


    public function import_excel(Request $request)
  	{
  		$this->validate($request, [
  			'file' => 'required|mimes:csv,xls,xlsx'
  		]);

  		$file = $request->file('file');

  		$nama_file = rand().$file->getClientOriginalName();

  		$file->move('file_siswa',$nama_file);

  		// import data
  		Excel::import(new ImportUsers, public_path('/file_siswa/'.$nama_file));

  		// notifikasi dengan session
  		Session::flash('sukses','Data Siswa Berhasil Diimport!');

  		// alihkan halaman kembali
  		return redirect('/import-export');
  	}

}
