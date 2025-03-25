<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function penjualan() {
        $penjualan = Penjualan::all();
        return view('penjualan.penjualan', [
            'penjualan' => $penjualan
        ]);
    }

    public function editPenjualan() {
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
            'stok' => 'required',
            'deskripsi' => 'required'
        ]);

        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            $file->move(public_path('images/penjualan'), $filename);
            $post = new Penjualan([
                'judul' => $validatedData['judul'],
                'harga' => $validatedData['harga'],
                'Kategori' => $validatedData['kategori'],
                'stok' => $validatedData['stok'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' => $filename,
                'created_at' => now()
            ]);
        }else{
            $post = new Penjualan([
                'judul' => $validatedData['judul'],
                'harga' => $validatedData['harga'],
                'Kategori' => $validatedData['kategori'],
                'stok' => $validatedData['stok'],
                'deskripsi' => $validatedData['deskripsi'],
                'foto' =>'kodak ultramax.jpg',
                'created_at' => now()
            ]);
        }

        $post->save();
        return redirect('penjualan');
    }

    public function edit(Request $request, string $id)
    {
        //dd($id);
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'harga' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required'
        ]);

        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            $file->move(public_path('images/penjualan'), $filename);
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

    public function deletePenjualan(string $id)
    {
        Penjualan::where('id_penjualan', '=', $id)->delete();
        return redirect('penjualan');
    }
}
