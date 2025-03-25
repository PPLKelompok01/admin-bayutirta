<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Layanan;

class LayananController extends Controller
{
    public function descLayanan()
    {
        return view("layanan.descLayanan");
    }

    public function infoLayanan()
    {
        return view("layanan.infoLayanan");
    }

    public function layanandetail(string $id)
    {
        $detail = Layanan::where('id_layanan', '=', $id)->first();
        return view('layanan.infoLayanan',[
            'detail' => $detail,
        ]);
    }

    public function layanan()
    {
        $layanans = Layanan::all();
        return view("layanan.layanan", [
            'layanan' => $layanans
        ]);
    }
    public function additional()
    {
        return view("layanan.additional");
    }
    public function review()
    {
        return view("layanan.reviewLayanan");
    }
    public function qna()
    {
        return view("layanan.qna");
    }
    public function getLayanan()
    {
        $posts = Layanan::all(); // Retrieve all posts from the database
        $back = json_decode($posts);
        // return view('welcome',['inspections' => $back]);
        return response()->json($posts); // Return the data as JSON
    }

    public function addLayanan(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga_terendah' => 'required',
            'harga_tertinggi' => 'required',
            'keterangan' => 'required',
            'merk_hp' => 'required',
        ]);

        
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            // Storage::disk('public')->url($filename);
            // Storage::putFile('photos', new File('admin.bayutirta.masuk.id/public/Image'), $filename);
            // $file->storeAs('layanan', $filename, 'public'); ini buat hosting
            // $file->move('admin.bayutirta.masuk.id/public/Image' , $filename);
            $file->move(public_path('images/layanan'), $filename);
            // $request['foto']= $filename;
        }else{
            $filename = 'tidak ada';
        }

        if(isset($_POST['status'])){                       
            $status = 1;
        } else {
            $status = 0;
        }

        // Create a new Post instance with the validated data
        $post = new Layanan([
            'nama_layanan' => $validatedData['nama_layanan'],
            'harga_terendah' => $validatedData['harga_terendah'],
            'harga_tertinggi' => $validatedData['harga_tertinggi'],
            'merk_hp' => $validatedData['merk_hp'],
            'status' => $status,
            'keterangan' => $validatedData['keterangan'],
            'foto' => $filename,
            'created_at' => now()
        ]);

        $post->save(); // Save the new post to the database
        return redirect('/layanan');
        // return response()->json($post); // Return the new post as JSON
    }

    public function edit(Request $request, string $id) {
        $validatedData = $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga_terendah' => 'required',
            'harga_tertinggi' => 'required',
            'keterangan' => 'required',
            'merk_hp' => 'required',
        ]);

        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            // Storage::disk('public')->url($filename);
            // Storage::putFile('photos', new File('admin.bayutirta.masuk.id/public/Image'), $filename);
            // $file->storeAs('layanan', $filename, 'public'); buat hosting
            // $file->move('admin.bayutirta.masuk.id/public/Image' , $filename);
            $file->move(public_path('images/layanan'), $filename);
            // $request['foto']= $filename;
            Layanan::where('id_layanan', '=', $id)->update([
                'foto' => $filename
            ]);
        }

        if(isset($_POST['status'])){                       
            $status = 1;
        } else {
            $status = 0;
        }


        Layanan::where('id_layanan', '=', $id)
            ->update([
                'nama_layanan' => $validatedData['nama_layanan'],
                'harga_terendah' => $validatedData['harga_terendah'],
                'harga_tertinggi' => $validatedData['harga_tertinggi'],
                'merk_hp' => $validatedData['merk_hp'],
                'status' => $status,
                'keterangan' => $validatedData['keterangan'],
            ]);

            return redirect('/layanan');
    }

    public function deleteLayanan(string $id)
    {
        Layanan::where('id_layanan', '=', $id)->delete();

        return redirect('/layanan');
    }
}