<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; // ✅ ini sudah benar
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Lowongan;

class LowonganController extends Controller
{
    public function lowongan()
    {
        $lowongans = Lowongan::all();
        return view('lowongan.lowongan', [
            'lowongan' => $lowongans
        ]);
    }

    public function formLowongan()
    {
        return view('lowongan.formLowongan');
    }

    public function lowongandetail(string $id)
    {
        $detail = Lowongan::where('id_lowongan', '=', $id)->first();
        return view('lowongan.formLowongan', [
            'detail' => $detail,
        ]);
    }

    public function getLowongan()
    {
        $lowongans = Lowongan::all();
        return response()->json($lowongans);
    }

    public function addLowongan(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'cabang_perusahaan' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
        ]);

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/lowongan'), $filename);

            // ✅ Auto copy ke customer
            $targetDir = 'C:/Users/User/Documents/customer-bayutirta/public/images/lowongan/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            File::copy(public_path('images/lowongan/' . $filename), $targetDir . $filename);

            $post = new Lowongan([
                'judul' => $validatedData['judul'],
                'cabang_perusahaan' => $validatedData['cabang_perusahaan'],
                'posisi' => $validatedData['posisi'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => $filename,
                'created_at' => now()
            ]);
        } else {
            $post = new Lowongan([
                'judul' => $validatedData['judul'],
                'cabang_perusahaan' => $validatedData['cabang_perusahaan'],
                'posisi' => $validatedData['posisi'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => 'kodak ultramax.jpg',
                'created_at' => now()
            ]);
        }

        $post->save();
        return redirect('lowongan');
    }

    public function edit(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'cabang_perusahaan' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
        ]);

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images/lowongan'), $filename);

            // ✅ Auto copy ke customer ketika edit foto
            $targetDir = 'C:/Users/User/Documents/customer-bayutirta/public/images/lowongan/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            File::copy(public_path('images/lowongan/' . $filename), $targetDir . $filename);

            Lowongan::where('id_lowongan', '=', $id)->update([
                'foto' => $filename
            ]);
        }

        Lowongan::where('id_lowongan', '=', $id)->update([
            'judul' => $validatedData['judul'],
            'cabang_perusahaan' => $validatedData['cabang_perusahaan'],
            'posisi' => $validatedData['posisi'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        return redirect('lowongan');
    }

    public function deleteLowongan(string $id)
    {
        Lowongan::where('id_lowongan', '=', $id)->delete();
        return redirect('lowongan');
    }
}
