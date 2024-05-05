<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function createEvent(Request $request) {

        $eventName = $request->input('eventName');
        $eventDate = $request->input('eventDate');
        $eventCity = $request->input('eventCity');
        $eventDescription = $request->input('eventDescription');
        $eventPrivate = $request->input('eventPrivate');
        $eventImage = $request->file('eventImage')->store('uploads', 'public');

        DB::insert("insert into eventStuff (eventName, eventDate, eventCity, eventPrivate, eventDescription, eventImg) values ('$eventName','$eventDate', '$eventCity', '$eventPrivate','$eventDescription', '$eventImage')");

        $ok = true;

        return view('createevent', ['ok' => $ok]);
    }

    public function search(Request $request) {

            $searchValue = $request->input('searchValue');

            $eventStuff = DB::select("select * from eventStuff where eventName = '$searchValue' ");

            if($eventStuff) {
                    

                return view('dashboard', ['eventStuff' => $eventStuff]);

            } 
            
            if(!$eventStuff) {

                $error = true;

                return view('dashboard', ['error' => $error]);

            }

    }
}
