<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\KonsultasiUser;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function konsultasi(Request $request)
    {
        $status = $request->get('status', 'Semua');
        $kategori = $request->get('kategori', 'Semua');
        $search = $request->get('search', '');
        $perPage = 10;

        // Start building the query
        $query = Konsultasi::with('user');
        
        // Apply filters
        if ($status !== 'Semua') {
            $query->where('status', $status);
        }
        
        if ($kategori !== 'Semua') {
            $query->where('kategori', $kategori);
        }
        
        // Apply search if provided
        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhere('perangkat', 'like', "%{$search}%")
                ->orWhere('masalah', 'like', "%{$search}%");
            });
        }
        
        // Apply sorting
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $query->orderBy($sort, $order);
        
        // Get paginated results
        $konsultasi = $query->paginate($perPage);
        
        // Get counts for dashboard
        $totalKonsultasi = Konsultasi::count();
        $menungguCount = Konsultasi::where('status', 'menunggu')->count();
        $diprosesCount = Konsultasi::where('status', 'diproses')->count();
        $selesaiCount = Konsultasi::where('status', 'selesai')->count();

        return view('konsultasi.konsultasi', [
            'konsultasi' => $konsultasi,
            'selectedStatus' => $status,
            'selectedKategori' => $kategori,
            'totalKonsultasi' => $totalKonsultasi,
            'menungguCount' => $menungguCount,
            'diprosesCount' => $diprosesCount,
            'selesaiCount' => $selesaiCount
        ]);
    }

    public function getDetail($id)
    {
        $konsultasi = Konsultasi::with('user')->findOrFail($id);
        return response()->json($konsultasi);
    }

    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai'
        ]);
        
        $konsultasi = Konsultasi::findOrFail($id);
        $konsultasi->jawaban = $request->input('message');
        $konsultasi->status = $request->input('status');
        $konsultasi->jawaban_at = now();
        $konsultasi->save();
        
        return response()->json(['success' => true, 'message' => 'Jawaban berhasil disimpan']);
    }
} 