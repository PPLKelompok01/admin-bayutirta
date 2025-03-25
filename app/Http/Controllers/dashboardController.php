<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Layanan;
use App\Models\Reservasi;

class dashboardController extends Controller
{
    //
    public function dashboard()
    {
        $belum_dikonfirmasi = Reservasi::where('status','=','Belum Dikonfirmasi')->count();
        // $ditolak = Reservasi::where('status','=','pending')->count();
        $diterima = Reservasi::where('status','=','Diterima')->count();
        $total = Reservasi::all()->count();
        $reservasi = Reservasi::orderBy('created_at', 'DESC')->take(5)->get();
        $chart = Reservasi::selectRaw('id_layanan, count(id_reservasi) as total')->groupBy('id_layanan')->get();
        // dd($chart);
        $total_layanan = array();
        foreach ($chart as $x) {
            $layanan = Layanan::where('id_layanan','=',$x->id_layanan)->first();
            $nama_layanan[]=$layanan->nama_layanan;
            $total_layanan[]=$x->total;
        }
        // dd($chart);
        foreach ($reservasi as $item) {
            $layanan = Layanan::where('id_layanan','=',$item->id_layanan)->first();
            $item['nama_layanan']=$layanan->nama_layanan;
        }
        return view("dashboard.dashboard",[
            'belum_dikonfirmasi'=>$belum_dikonfirmasi,
            'diterima'=>$diterima,
            'total'=>$total,
            'reservasi'=>$reservasi,
            'nama_layanan'=>$nama_layanan,
            'total_layanan'=>$total_layanan
        ]);
    }
}