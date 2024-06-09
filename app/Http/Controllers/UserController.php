<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/landingpage');
        }
    }
    public function register(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Use bcrypt for hashing
        ]);

        $user->save();

        return redirect('/landingpage'); // Redirect to a page of your choice
    }
    function adminlogin(Request $req)
    {
        $user= Admin::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/dashboard');
        }
    }
    public function index()
    {
        $users = User::all();
        return view('adminusers', compact('users'));
    }


// Method to delete a user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('adminusers.index')->with('success', 'User deleted successfully');
    }
}
