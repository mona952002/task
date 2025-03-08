<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function indexing()
    {
        //$users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }

    public function creating()
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        /*DB::table('users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password,
        ]);*/
        $user = new User;
        $user->name = $user_name;
        $user->email = $user_email;
        $user->password = $user_password;
        $user->save();
        return redirect()->back();
    }

    public function destroing($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function editing($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function updating()
    {
        $id = $_POST['id'];
        DB::table('users')->where('id', '=', $id)->update(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password']]);
        return redirect('users');
    }
}
