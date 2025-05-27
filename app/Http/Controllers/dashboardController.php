<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Layanan;
use App\Models\Reservasi;

class dashboardController extends Controller
{
    //
    public function dashboard()
    {
        $belum_dikonfirmasi = Reservasi::where('status','=','Belum Dikonfirmasi')->count();
        $butuh_dikonfirmasi = Reservasi::where('status','=','Belum Dikonfirmasi')->get();
        // $ditolak = Reservasi::where('status','=','pending')->count();
        $diterima = Reservasi::where('status','=','Diterima')->count();
        $ditolak = Reservasi::where('status','=','Ditolak')->count();
        $total = Reservasi::all()->count();
        $reservasi = Reservasi::orderBy('created_at', 'DESC')->take(5)->get();
        $chart = Reservasi::where('reservasis.created_at', '>=', Carbon::now()->subDays(30))
            ->join('layanans', 'reservasis.id_layanan', '=', 'layanans.id_layanan')
            ->selectRaw('layanans.nama_layanan, count(reservasis.id_reservasi) as total')
            ->groupBy('layanans.nama_layanan')
            ->orderByDesc('total')
            ->get();
        // dd($chart);
        $nama_layanan = [];
        $total_layanan = [];

        foreach ($chart as $row) {
            $nama_layanan[] = $row->nama_layanan;
            $total_layanan[] = $row->total;
        }

        // dd($chart);
        foreach ($reservasi as $item) {
            $layanan = Layanan::where('id_layanan','=',$item->id_layanan)->first();
            $item['nama_layanan']=$layanan->nama_layanan;
        }

        foreach ($butuh_dikonfirmasi as $item) {
            $layanan = Layanan::where('id_layanan','=',$item->id_layanan)->first();
            $item['nama_layanan']=$layanan->nama_layanan;
        }
        
        return view("dashboard.dashboard",[
            'belum_dikonfirmasi'=>$belum_dikonfirmasi,
            'butuh_dikonfirmasi'=>$butuh_dikonfirmasi,
            'diterima'=>$diterima,
            'ditolak'=>$ditolak,
            'total'=>$total,
            'reservasi'=>$reservasi,
            'nama_layanan'=>$nama_layanan,
            'total_layanan'=>$total_layanan
        ]);
    }
}