<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pelanggan;

use App\Exports\PelangganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
	public function index()
	{
		$semuapelanggan = Pelanggan::all();
		return view('semuapelanggan',['semuapelanggan'=>$semuapelanggan]);
	}

	public function export_excel()
	{
		return Excel::download(new PelangganExport, 'pelanggan.xlsx');
	}
}