<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        // return $request->all();
        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        if (empty($email)){
            return redirect()->route('login')->with('status', 'error')->with('message', 'E-mail Harus Diisi');
        }
        if (empty($password)){
            return redirect()->route('login')->with('status', 'error')->with('message', 'Password Harus Diisi');
        }
        $users = Users::where('email', $email)->first();

        if (!empty($users)) {
            $data = [
                'email' => $users->email,
                'password' => $password,
                // 'level_user' => $users->level_user = 'Admin'
            ];

            if (Auth::attempt($data)) {
                // dd($users);
                return redirect()->route('dashboard')->with('status', 'success')->with('message', 'Selamat Datang ' . $users->nama_lengkap);
            } else {
                return redirect()->route('login')->with('status', 'error')->with('message', 'Akun Tidak Terdaftar Pada Sistem');
            }
        } else {
            return redirect()->route('login')->with('status', 'error')->with('message', 'Akun Tidak Terdaftar Pada Sistem');
        }
    }
    public function logout()
    {
        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('userDashboard')->with('status', 'success')->with('message', 'Anda Berhasil Logout');
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function create(Request $request)
    {
        // return request()->all();
        //Pengecekan
        $email = $request->email;
        $nama_lengkap = $request->nama_lengkap;
        $username = $request->username;
        $no_telp = $request->no_telp;
        $password = $request->password;

        if(empty($email)) {
            return back()->withInput()->with('status', 'error')->with('message', 'E-mail Harus Diisi!');
        }
        if(empty($nama_lengkap)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Nama Harus Diisi!');
        }
        if(empty($username)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Username Harus Diisi!');
        }
        if(empty($no_telp)) {
            return back()->withInput()->with('status', 'error')->with('message', 'No Telephone Harus Diisi!');
        }
        if(empty($password)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Password Harus Diisi!');
        }

        $cek_email = Users::where('email', $email)->first();
        $cek_no_telp = Users::where('no_telp', $no_telp)->first();
        $cek_username = Users::where('username', $username)->first();

        if(!empty($cek_email)) {
            return back()->withInput()->with('status', 'error')->with('message', 'E-mail Sudah Terdaftar Pada Sistem');
        }
        if(!empty($cek_no_telp)) {
            return back()->withInput()->with('status', 'error')->with('message', 'No Telephone Sudah Terdaftar Pada Sistem');
        }
        if(!empty($cek_username)) {
            return back()->withInput()->with('status', 'error')->with('message', 'Username Sudah Terdaftar Pada Sistem');
        }

        //Simpan
        $users = new Users();
        $users->email = $email;
        $users->nama_lengkap = $nama_lengkap;
        $users->username = $username;
        $users->no_telp = $no_telp;
        $users->password = Hash::make($password);
        $users->level_user = 'Pengguna';
        $users->save();

        if ($users) {
            return redirect()->route('login')->with('status', 'success')->with('message', 'Anda Berhasil Register');
        } else  {
            return back()->withInput()->with('status', 'error')->with('message', 'Gagal Register');
        }

    }
}
