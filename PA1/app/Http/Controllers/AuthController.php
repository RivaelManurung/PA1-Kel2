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
		return view('auth/register');
	}

		public function registerSimpan(Request $request)
	{
		Validator::make($request->all(), [
			'nama' => 'required|min:5|max:20',
			'alamat' =>'required',
			'username' =>'required|unique:users',
			'nomorhp' =>'required',
			'email' =>'required|unique:users|email:rfc,dns',
			'password' => 'required|min:8|max:16',
		])->validate();

		User::create([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'username' => $request->username,
			'nomorhp' => $request->nomorhp,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role_id' => '2'
		]);

		return redirect()->route('login');
	}

	public function login()
	{
		return view('auth/login');
	}

	public function loginAksi(Request $request)
	{
		Validator::make($request->all(), [
			'email' => 'required|email',
			'password' => 'required'
		])->validate();

		if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
			throw ValidationException::withMessages([
				'email' => trans('auth.failed')
			]);
		}

		$request->session()->regenerate();

		return redirect()->route('Beranda');
	}

	public function logout(Request $request)
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		return redirect('/');
	}
}
