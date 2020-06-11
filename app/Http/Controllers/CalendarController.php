<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Setting;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(){
        $today= strtolower(date('l'));
//        return $today;
        $week= [
            "saturday" => "السبت",
            "sunday" => "الاحد",
            "monday" => "الاثنين",
            "tuesday" => "الثلاثاء",
            "wednesday" => "الاربعاء",
            "thursday" => "الخميس",
            "friday" => "الجمعة",
        ];
        $week[$today]= "اليوم";

        $data= [
            "settings"=> Setting::all()->keyBy("key"),
        ];
        $data["calendar"]= [];
        $from= strtotime("today");
        for ($i= 1; $i<= 7; $i++){
            $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
            $data["calendar"][$i]["animes"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();
            $data["calendar"][$i]["name"]= $week[strtolower(date('l', $from))];
            $data["calendar"][$i]["date"]= strtolower(date('Y-m-d', $from));
            $from= $to;
        }

//        return $data;
        return view("calendar", $data);
    }
}
