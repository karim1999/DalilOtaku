<?php

namespace App\Http\Controllers;

use App\Source;
use App\SourceType;
use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    //
    public function index(){
        $twitter_sources= SourceType::findOrFail(3)->sources;
        $items= array();
        foreach ($twitter_sources as $source){
            $item= Twitter::getUserTimeline(['screen_name' => $source->link, "tweet_mode"=> "extended", 'count' => 5, 'format' => 'object']);
            $items= array_merge($items, $item);
        }
        $data= [
            "items" =>  $items,
            "twitter_sources" => $twitter_sources
        ];

        return view("news", $data);
    }
    public function twitter($id){
        $twitter_sources= SourceType::findOrFail(3)->sources;
        $source= Source::findOrFail($id);
        $items= Twitter::getUserTimeline(['screen_name' => $source->link, "tweet_mode"=> "extended", 'count' => 10, 'format' => 'object']);
        $data= [
            "items" =>  $items,
            "twitter_sources" => $twitter_sources
        ];

        return view("news", $data);

    }
}
