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

            return redirect()->to('http://127.0.0.1:8000/dashboard');;

        } else {

            $error = true;

            return view('welcome', ['error' => $error]);

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
        $eventPrivate = strtolower($request->input('eventPrivate'));
        $eventImage = $request->file('eventImage')->store('uploads', 'public');

  

        if($eventPrivate == "sim" || $eventPrivate == "nao" || $eventPrivate == "não") {

            DB::insert("insert into eventStuff (eventName, eventDate, eventCity, eventPrivate, eventDescription, eventImg) values ('$eventName','$eventDate', '$eventCity', '$eventPrivate','$eventDescription', '$eventImage')");

            $ok = true;
            return view('createevent', ['ok' => $ok]);

        } else {

            $error = true;

            return view('createevent', ['error' => $error]);

        }
      


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

    public function allEvents() {

        $allEvents = DB::select('select * from eventStuff');

        if($allEvents) {
            return view('allevents', ['allEvents' => $allEvents]);

        } else {

            $error = true;
            return view('allevents', ['error' => $error]);
        }
        
   

    }
}
