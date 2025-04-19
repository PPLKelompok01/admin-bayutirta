<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\KonsultasiData;
use Illuminate\Support\Facades\Session;

class KonsultasiController extends Controller
{
    public function konsultasi(Request $request)
{
    $status = $request->get('status', 'Semua');
    $kategori = $request->get('kategori', 'Semua');

    $data = KonsultasiData::getAllData();

    $data = array_filter($data, function ($item) use ($status, $kategori) {
        $matchStatus = $status === 'Semua' || $item['status'] === $status;
        $matchKategori = $kategori === 'Semua' || $item['kategori'] === $kategori;
        return $matchStatus && $matchKategori;
    });

    return view('konsultasi.konsultasi', [
        'konsultasi' => $data,
        'selectedStatus' => $status,
        'selectedKategori' => $kategori
    ]);
}


    public function getDetail($id)
    {
        $konsultasi = KonsultasiData::getById((int)$id);
        return response()->json($konsultasi);
    }

    public function sendReply(Request $request, $id)
    {
        $message = $request->input('message');
        if (empty($message)) {
            return response()->json(['success' => false, 'message' => 'Pesan balasan tidak boleh kosong']);
        }

        $consultations = KonsultasiData::getAllData();
        
        foreach ($consultations as &$consultation) {
            if ($consultation['id'] == $id) {
                $consultation['status'] = 'Sudah Dibalas';
                $consultation['balasan'] = $message;
                break;
            }
        }
    
        Session::put('consultations', $consultations);
        
        return response()->json(['success' => true, 'message' => 'Balasan berhasil dikirim']);
    }
    
    public function resetStatus($id)
{
    $data = Session::get('consultations', KonsultasiData::getAllData());
    foreach ($data as &$item) {
        if ($item['id'] == $id) {
            $item['status'] = 'Belum Dibalas';
            $item['balasan'] = null;
            break;
        }
    }
    Session::put('consultations', $data);
    return redirect()->back()->with('success', 'Status berhasil direset');
}

} 