<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    public function index(){
        $data= [];
        $from= strtotime('saturday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["saturday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('sunday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["sunday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('monday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["monday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('tuesday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["tuesday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('wednesday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["wednesday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('thursday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["thursday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

        $from= strtotime('friday next week');
        $to= strtotime(date('Y-m-d', $from) . ' + 1 days');
        $data["friday"]= Anime::active()->whereBetween("airing_at", [$from, $to])->get();

//        return $data;
        return view("calendar", $data);
    }
}
