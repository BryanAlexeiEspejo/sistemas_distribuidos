<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = (new User)->setConnection('pgsql')->create([
                'username' => $request->username,
                'email' => $request->email,
                'password_hash' => Hash::make($request->password),
                'salt' => '',
                'status_id' => 1,
                'email_verified' => false,
                'phone' => null,
                'phone_verified' => false,
                'mfa_enabled' => false,
                'mfa_secret' => null,
                'locale' => 'es-ES',
                'timezone' => 'UTC',
                'last_login' => null,
                'failed_login_attempts' => 0,
                'created_by' => null,
                'updated_by' => null,
            ]);

            Auth::login($user);
            return redirect()->route('home');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al registrar: ' . $e->getMessage()]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
