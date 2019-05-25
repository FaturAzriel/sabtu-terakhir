<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Gambar;

class UploadController extends Controller
{
    // AGAR HARUS LOGIN
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function upload(){
		$kerjasama = Gambar::get();
		return view('tambahkerjasama',['kerjasama' => $kerjasama]);
	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
			'gambar' => $nama_file,
			'namagambar' => $request->keterangan,
		]);

		return redirect()->back();
		}
	


    public function hapus($id)
    {
        // Menghapus data service berdasarkan id
        DB::table('kerjasama')->where('id',$id)->delete();

        // Alihkan data ke halaman service
        return redirect('/tambahkerjasama');
    }
}