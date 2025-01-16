<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $data = User::get();
        return view('admin.user-list', compact('data'));
    }

    public function addUser() {
        return view('admin.add-user');
    }

    public function saveUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'nik' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => 'required',
        ]);

        $name = $request->name;
        $nik = $request->nik;
        $email = $request->email;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->nik = $nik;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return redirect()->back()->with('success', 'User Added Successfully');
    }

    public function deleteUser($id) {
        User::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    public function verifUser($id) {
        User::where('id', '=', $id)->update([
            'is_verified' => 1
        ]);
        return redirect()->back()->with('success', 'User Verificated Successfully');
    }
    public function verifiedUser() {
        $data = User::get();
        return view('admin.verif-list', compact('data'));
    }
    public function editProfil(Request $request){
        $editan = $request->all();
        unset($editan['_token']);
        foreach($editan as $key => $value){
            if($value!=null){
                User::where('id', Auth::id())->update([
                    $key => $value
                ]);
            }
        }
        // dump($editan);
        // dump($request);
        if($request->password!=null){
            $password = bcrypt($request->password);
            User::where('id', Auth::id())->update([
                'password' => $password
            ]);
        }
        return redirect()->route('profil')->with('success', 'Data profil anda telah diperbarui.');
    }
}
