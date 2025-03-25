<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Login;

class LoginController extends Controller
{

    public function login() {
        return view('login.login');
      
    }

    public function error() {
        return view('error');
    }

    public function getLogin(Request $request)
    {
        // $posts = Login::all()->where('username','=',$request['username']); // Retrieve all posts from the database
        // echo $posts[0]->password;

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validatedData)) {
            // Session::flash('login', TRUE); 
            // Session::flash('id', $posts[0]->id); 
            // Session::flash('name', $posts[0]->name); 
            $request->session()->regenerate();
            
            // echo $request->session();
            return redirect()->intended('/dashboard');

            // if (isset($input['remember'])) {
            // setcookie('id', $result['id'], time()+3600);
            // 
            
            // echo 'login sukses';
            // return redirect('/');
        }else {
            return view('login.login',[
                'msg'=>'login gagal'
            ]);
        }
        // return response()->$pos; // Return the data as JSON
    }

    
    public function logout(Request $request) {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();

    // Auth::logout();

    // request()->session()->invalidate();
    // request()->session()->regenerateToken();
 
    return redirect('/dashboard');

}

    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required'
        ]);

        // if (condition) {
        //     cek username exist
        // }

        // Create a new Post instance with the validated data
        $password = password_hash($validatedData['password'],PASSWORD_DEFAULT);

        $post = new Login([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => $password,
            'role' => 'administrator',
            'created_at' => now(),
            'last_login' => now()
        ]);

        $post->save(); // Save the new post to the database

        return response()->json($post); // Return the new post as JSON
    }
}
