<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function penjualan(Request $request)
    {
        $filterKategori = $request->query('kategori');
        if ($filterKategori) {
            $penjualan = Penjualan::where('Kategori', $filterKategori)->get();
        } else {
            $penjualan = Penjualan::all();
        }

        return view('penjualan.penjualan', [
            'penjualan' => $penjualan,
            'selectedKategori' => $filterKategori
        ]);
    }

    public function editPenjualan()
    {
        return view('penjualan.editPenjualan');
    }

    public function penjualandetail(string $id)
    {
        $detail = Penjualan::where('id_penjualan', '=', $id)->first();
        return view('penjualan.editPenjualan', [
            'detail' => $detail,
        ]);
    }

    public function getPenjualan()
    {
        $penjualan = Penjualan::all();
        return response()->json($penjualan);
    }

    public function addPenjualan(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'harga' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric|min:1',
            'deskripsi' => 'required'
        ]);

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName()[0];
            $file->move(public_path('images/penjualan'), $filename);

            // ✅ Auto copy ke customer
            $targetDir = 'C:/Users/User/Documents/customer-bayutirta/public/images/katalog/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            File::copy(public_path('images/penjualan/' . $filename), $targetDir . $filename);

            $post = new Penjualan([
                'judul' => $validatedData['judul'],
                'harga' => $validatedData['harga'],
                'Kategori' => $validatedData['kategori'],
                'stok' => $validatedData['stok'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => $filename,
                'created_at' => now()
            ]);
        } else {
            $post = new Penjualan([
                'judul' => $validatedData['judul'],
                'harga' => $validatedData['harga'],
                'Kategori' => $validatedData['kategori'],
                'stok' => $validatedData['stok'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => 'kodak ultramax.jpg',
                'created_at' => now()
            ]);
        }

        $post->save();
        return redirect('penjualan');
    }

    public function edit(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'harga' => 'required',
            'kategori' => 'required',
            'stok' => 'required|numeric|min:1',
            'deskripsi' => 'required'
        ]);

        if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
            $file = $request->file('foto');
            $filename = date('YmdHi') . $file->getClientOriginalName()[0];
            $file->move(public_path('images/penjualan'), $filename);

            // ✅ Auto copy ke customer ketika edit foto
            $targetDir = 'C:/Users/User/Documents/customer-bayutirta/public/images/katalog/';
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            File::copy(public_path('images/penjualan/' . $filename), $targetDir . $filename);

            Penjualan::where('id_penjualan', '=', $id)->update([
                'foto' => $filename
            ]);
        }

        Penjualan::where('id_penjualan', '=', $id)->update([
            'judul' => $validatedData['judul'],
            'harga' => $validatedData['harga'],
            'Kategori' => $validatedData['kategori'],
            'stok' => $validatedData['stok'],
            'deskripsi' => $validatedData['deskripsi'],
            'updated_at' => now()
        ]);

        return redirect('penjualan');
    }

    public function destroy(string $id)
    {
        Penjualan::where('id_penjualan', '=', $id)->delete();
        return redirect('penjualan')->with('success', 'Katalog berhasil dihapus.');
    }
}
