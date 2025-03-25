<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Artikel;

class artikelController extends Controller
{
    public function artikel() {
        $artikels = Artikel::all();
        return view ('artikel.artikel',[
            'artikel'=>$artikels
        ]);
    }
    public function editArtikel() {
        return view ('artikel.editArtikel');
    }

    public function articledetail(string $id)
    {
        $detail = Artikel::where('id_artikel', '=', $id)->first();
        return view('artikel.editArtikel',[
            'detail' => $detail,
        ]);
    }

    public function getArtikel()
    {
        $posts = Artikel::all(); // Retrieve all posts from the database
        $back = json_decode($posts);
        // return view('welcome',['inspections' => $back]);
        return response()->json($posts); // Return the data as JSON
    }
    public function addArtikel(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'nama_penulis' => 'required',
            'title_penulis' => 'required',
            'isi' => 'required'
        ]);
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            // Storage::disk('public')->url($filename);
            // Storage::putFile('photos', new File('admin.bayutirta.masuk.id/public/Image'), $filename);
            //$file->storeAs('artikel', $filename, 'public');
            //$file->move('Image/artikel' , $filename);
            $file-> move(public_path('images/artikel'), $filename);
            // $request['foto']= $filename;
            $post = new Artikel([
            'judul' => $validatedData['judul'],
            'nama_penulis' => $validatedData['nama_penulis'],
            'title_penulis' => $validatedData['title_penulis'],
            'isi' => $validatedData['isi'],
            'foto' => $filename,
            'created_at' => now()
        ]);


        }else{
            $post = new Artikel([
            'judul' => $validatedData['judul'],
            'nama_penulis' => $validatedData['nama_penulis'],
            'title_penulis' => $validatedData['title_penulis'],
            'isi' => $validatedData['isi'],
            'foto' =>'kodak ultramax.jpg',
            'created_at' => now()
        ]);
        }


        // Create a new Post instance with the validated data
         // Save the new post to the database
        $post->save();
        return redirect('artikel'); // Return the new post as JSON
    }

    public function edit(Request $request, string $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'nama_penulis' => 'required',
            'title_penulis' => 'required',
            'isi' => 'required'
        ]);
        if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])){
            $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName()[0];
            // Storage::disk('public')->url($filename);
            // Storage::putFile('photos', new File('admin.bayutirta.masuk.id/public/Image'), $filename);
            $file->storeAs('artikel', $filename, 'public');
            // $file->move('admin.bayutirta.masuk.id/public/Image' , $filename);
            //$file-> move(public_path(), $filename);
            $file-> move(public_path('images/artikel'), $filename);
            // $request['foto']= $filename;
            Artikel::where('id_artikel', '=', $id)->update([
                'foto' => $filename
            ]);
        }


        // Create a new Post instance with the validated data
        Artikel::where('id_artikel', '=', $id)->update([
            'judul' => $validatedData['judul'],
            'nama_penulis' => $validatedData['nama_penulis'],
            'title_penulis' => $validatedData['title_penulis'],
            'isi' => $validatedData['isi']
        ]);

        return redirect('artikel'); // Return the new post as JSON
    }

    public function deleteArtikel(string $id)
    {
        Artikel::where('id_artikel', '=', $id)->delete();

        return redirect('artikel');
    }
}
