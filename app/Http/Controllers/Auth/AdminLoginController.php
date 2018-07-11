<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct() {
      $this->middleware('guest:admin');
    }

    public function username()
{
    return 'username';
}

    public function showLoginForm() {
      return View('admin-login');
    }

    public function login(Request $request) {
      $this->validate($request, [
          'usernid' => 'required|size:13',
          'password' => 'required|min:3',
      ]);

      if (Auth::guard('admin')->attempt(['usernid' => $request->usernid, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->withInput($request->only('usernid', 'remember'));
    }

    public function registration() {
      return view('admin-registration');
    }

    public function store() {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email||string',
        'password' => 'required|string|min:3|confirmed',
      ]);

      $adminuser = new Admin;
    }
}
