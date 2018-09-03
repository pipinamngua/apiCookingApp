<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isUser(Request $request)
    {
        $username = $request->userName;
        $password = $request->password;

        $user = Account::where('user_name', '=', $username)
                        ->where('password', '=', $password)
                        ->get();

        if ($user->isNotEmpty()) {
            return response()->json($user);
        } else {
            $error['error'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
            return response()->json($error);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();

        $user = Account::where('user_name', '=', $data['user_name'])
                        ->get();

        if ($user->isEmpty()) {
            if (Account::create($data)) {
                $currentUser = Account::where('user_name', '=', $data['user_name'])
                        ->get();
                
                return response()->json([
                    'user' => $currentUser,
                    'result' => true,
                ]);
            }
        } else {
            $data['result'] = false;
            $data['error'] = 'Tài khoản đã tồn tại';
            return response()->json($data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $user = Account::find($request->id);

        if ($user) {
            $user->password = $request->newPassword;

            $user->save();

            $response['result'] = true;
            $response['newPassword'] = $request->newPassword;

            return response()->json($response);
        } else {
            $response['result'] = false;
            $response['error'] = 'Đổi mật khẩu thất bại';

            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
