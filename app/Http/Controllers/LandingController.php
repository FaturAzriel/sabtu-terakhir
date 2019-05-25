<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Ava;


class LandingController extends Controller
{


    // UNTUK VIEW

    public function myabout()
    {
        $about = DB::table('about')->get();
        return view('myabout',['about' =>$about]);
    }
   
    public function berhasillowongan()  
    {
        return view('berhasillowongan');
    }
    
    public function message()
    {
        return view('message');
    }
    
    public function semuapelanggan()
    {
        $semuapelanggan = DB::table('pesanan')->get();
        return view('semuapelanggan',['pesanan' =>$semuapelanggan]);
    }
    
    public function semuapelamar()
    {
        $semuapelamar = DB::table('lowongankerja')->get();
        return view('semuapelamar',['lowongankerja' =>$semuapelamar]);
    }
    
    public function lowongankerja()
    {
        $lowongankerja = DB::table('lowongankerja')->get();
        return view('lowongankerja',['lowongankerja' =>$lowongankerja]);
    }
    
    public function pesanan()
    {
        $pesanan = DB::table('pesanan')->get();
        return view('sertifikat',['pesanan' =>$pesanan]);
    }
    
    public function tampillowongan($id)
    {
        $tampillowongan = DB::table('lowongankerja')->where('id',$id)->get();
        return view('pelamar',['lowongankerja' =>$tampillowongan]);
    }
    
    public function sertifikat()
    {
        $detail = DB::table('detail')->get();
        $sertifikaat = DB::table('sertifikaat')->get();
        return view ('sertifikat',['detail' =>$detail,
        'sertifikaat' =>$sertifikaat
        ]);
    }
    
    public function kerjasama()
    {
        $kerjasama = DB::table('kerjasama')->get();
        return view('/awal',['kerjasama' =>$kerjasama]);
    }
    
    // UNTUK TAMBAH DATA

    public function tambahlowongan()
    {
        // Manggil view lowongankerja
        return view('lowongankerja');
    }
    
    public function tambahpesanan()
    {
        // Manggil view halaman sertifikat
        return view('sertifikat');
    }


    // UNTUK STORE DATA
    public function storelowongan(Request $request)
    {
        $file = $request->file('avatar');
            $nama_file = time()."_".$file->getClientOriginalName();
    
                      // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file);

        // Tambah data ke table lowongankerja
        DB::table('lowongankerja')->insert([
            'namalengkap' => $request->namalengkap,
            'namapanggilan' => $request->namapanggilan,
            'keahlian' => $request->keahlian,
            'ava' => $nama_file,
            'ttl' => $request->ttl,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'kota' => $request->kota,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'kelulusan' => $request->lulus,
            'ditempatkan' => $request->tempat,
            'tekanan' => $request->tekanan,
            'sertifikat' => $request->sertifikat,
            'sertifikasi' => $request->ikutsertifikasi
            ]); 
            

            
    
            // Ava::create([
            //     'ava' => $nama_file,
            // ]);
            
        // Alihkan kehalaman service
        return redirect('/berhasillowongan');
    }
    public function storepesanan(Request $request)
    {
        // Tambah data ke table pesanan
        $berhasil = DB::table('pesanan')->insert([
            'daya' => $request->daya,
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat
            ]);         
        // Alihkan kehalaman service
        if ($berhasil) {
            echo "<script> alert('Pesanan Berhasil di kirim! Tunggu tim kami datang ke tempat anda!') </script>";
            echo "<script> location='/sertifikat' </script>";
        }
    }








    public function uploadava(){
		$lowongankerja = Ava::get();
		return view('lowongankerja',['lowongankerja' => $lowongankerja]);
	}




	// public function proses_uploadava(Request $request){
	// 	// $this->validate($request, [
	// 	// 	'ava' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
	// 	// ]);

	// 	// menyimpan data file yang diupload ke variabel $file
	// 	$file = $request->avatar('ava');

	// 	$nama_file = time()."_".$file->getClientOriginalName();

    //   	        // isi dengan nama folder tempat kemana file diupload
	// 	$tujuan_upload = 'data_file';
	// 	$file->move($tujuan_upload,$nama_file);

	// 	Ava::create([
	// 		'ava' => $nama_file,
	// 	]);

	// 	return redirect()->back();
	// 	}

}