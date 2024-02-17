<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller{
    public function index(){
        $data['title'] = 'Aplikasi Web Gallery Noval';
        $data['description'] = 'Aplikasi ini dibuat dengan tujuan menyelesaikan tugas uji kompetensi keahlian di SMKN 2 Bandar Lampung';
        
        return view('index', compact('data'));
    }

    public function registrasi(){
        $data['title'] = 'Aplikasi Web Gallery Noval - Registrasi User';
        $data['description'] = 'Aplikasi ini dibuat dengan tujuan menyelesaikan tugas uji kompetensi keahlian di SMKN 2 Bandar Lampung';

        return view('registrasi', compact('data'));
    }

    public function login(){
        $data['title'] = 'Aplikasi Web Gallery Noval - Login User';
        $data['description'] = 'Aplikasi ini dibuat dengan tujuan menyelesaikan tugas uji kompetensi keahlian di SMKN 2 Bandar Lampung';

        return view('login', compact('data'));
    }

    public function post_registrasi(Request $request): RedirectResponse{
        $request->validate([
            'username' => 'required|unique:users',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3'
        ]);

        $data = $request->all();
        $data['is_admin'] = '0';
        // $data['password'] = Hash::make($data['password']);
        // $check = User::create($data);
        $check = $this->create($data);

        return redirect("login")->withSuccess('Anda Berhasil Melakukan Registrasi');
    }

    public function post_login(Request $request): RedirectResponse{
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3'
        ]);

        $credentials = $request->only('username','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/')->withSuccess('Selamat anda Berhasil Login');
        }else{
            return redirect('login')->withError('Maaf, username / password anda salah');
        }
    }

    public function post_logout(Request $request): RedirectResponse{
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('login');
    }

    public function create(array $data){
        return User::create([
            'username' => $data['username'],
            'nama_lengkap' => $data['nama_lengkap'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}