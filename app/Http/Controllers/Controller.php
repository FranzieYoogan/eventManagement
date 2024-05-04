<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $request) {

        $userName = $request->input('userName');
        $userPassword = $request->input('userPassword');

        $manager = DB::select("select * from manager where managerName = '$userName' and managerPassword = '$userPassword' ");

        if($manager) {

            $session = session(['admin' => $userName]);

            return view('dashboard', ['session' => $session]);

        }
        

    }

    public function logout(Request $request) {

        $request->session()->forget('admin');

        return view('welcome');

    }
}
