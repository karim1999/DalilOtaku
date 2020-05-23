<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(){
        $data= [];
        $from= strtotime('saturday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["saturday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('sunday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["sunday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('monday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["monday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('tuesday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["tuesday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('wednesday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["wednesday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('thursday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["thursday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('friday this week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["friday"]= Anime::whereBetween("airing_at", [$from, $to])->get();

//        return $data;
        return view("calendar", $data);
    }
}
