<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }
    public function loginProcess(Request $request){

        $urse = $request->get('urse');
        $pass= $request->get('pass');


        try {
            $admin = Users::where('name',$urse)->where('password',$pass)->firstOrFail();

            $request->session()->put('id',$admin->id);
            $request->session()->put('name', $admin->name);
            $request->session()->put('level', $admin->level==1);

            return Redirect::route('dashboard');


        }
        catch (Exception $e) {

            return Redirect::route('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
        // if(Auth::attempt(['name' => $urse, 'password' => $pass])){

        //     return Redirect::route('dashboard');


        // }
        // else{

        //     return Redirect::route('login')->with('error', 'Sai tài khoản hoặc mật khẩu');
        // }
    }

        public function logout(Request $request){
            $request->session()->flush();
            return Redirect::route('login');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
