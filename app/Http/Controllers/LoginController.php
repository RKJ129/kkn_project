<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect(route('dashboard.index'));
        } else {
            return view('Login.index');
        }
    }

    public function actionLogin(LoginRequest $request) {
        if(Auth::guard('web')->attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
            return response()->json(['success' => true], 200);
        } else {
            return response()->json([
                'success' => false, 
                'message' => "Username atau Password salah!",
            ], 401);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
