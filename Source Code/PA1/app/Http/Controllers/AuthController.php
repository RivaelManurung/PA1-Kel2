<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function register()
	{
		// Mengembalikan tampilan (view) untuk halaman pendaftaran (register)
		return view('auth/register');
	}
	
	public function registerSimpan(Request $request)
	{
		// Validasi data yang diterima dari request
		Validator::make($request->all(), [
			'nama' => 'required|min:5|max:20',
			'alamat' =>'required',
			'username' =>'required|unique:users',
			'nomorhp' =>'required',
			'email' =>'required|unique:users|email:rfc,dns',
			'password' => 'required|min:8|max:16',
		])->validate();
	
		// Membuat instance baru dari model User dan menyimpan data yang diterima dari request
		User::create([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'username' => $request->username,
			'nomorhp' => $request->nomorhp,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role_id' => '2'
		]);
	
		// Mengarahkan pengguna ke halaman login setelah berhasil mendaftar
		return redirect()->route('login');
	}
	

	public function login()
	{
		return view('auth/login');
	}

	public function loginAksi(Request $request)
{
	// Validasi data yang diterima dari request
	Validator::make($request->all(), [
		'email' => 'required|email',
		'password' => 'required'
	])->validate();

	// Mencoba melakukan proses otentikasi pengguna dengan email dan password yang diberikan
	if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
		// Jika otentikasi gagal, lemparkan pesan validasi dengan pesan kesalahan
		throw ValidationException::withMessages([
			'email' => trans('auth.failed')
		]);
	}

	// Memperbarui session saat login berhasil
	$request->session()->regenerate();

	// Mengarahkan pengguna ke halaman Beranda setelah berhasil login
	return redirect()->route('Beranda');
}


	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		return redirect('/');
	}
}
