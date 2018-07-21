<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Hash;

class UserController extends BaseController
{

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $this->validate($request, 
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'Vui lòng nhập tên hiển thị',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không hợp lệ',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất  ký tự'
            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save())
            return redirect()->back()->with('success', 'Your profile has been changed');
        return redirect()->back()->with('error', 'Your profile has not been changed.');
    }

}
