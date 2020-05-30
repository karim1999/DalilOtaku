<?php

namespace App\Http\Controllers;

use App\Source;
use App\SourceType;
use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Pagination\LengthAwarePaginator;
use Goutte\Client;

class NewsController extends Controller
{
    //
    private function get_sources(){
        $twitter_sources= SourceType::findOrFail(3)->sources;
        $website_sources= SourceType::findOrFail(1)->sources;
        return [
            "twitter_sources" => $twitter_sources,
            "website_sources" => $website_sources
        ];
    }
    private function crawler(){
//        $client = new Client();
//        $crawler = $client->request('GET', 'https://www.facebook.com/animelab');
//        $crawler->filter('.userContentWrapper .userContent')->each(function ($node) {
//            print $node->text()."\n";
//        });
//        $crawler = $client->request('GET', 'https://dalil-otaku.com/');
//        $crawler->filter('.en-title')->each(function ($node) {
//            print $node->text()."\n";
//        });
//        return;
    }
    public function index(){
        $twitter_sources= SourceType::findOrFail(3)->sources;
        $website_sources= SourceType::findOrFail(1)->sources;
        $items= array();
        foreach ($twitter_sources as $source){
            $item= Twitter::getUserTimeline(['screen_name' => $source->link, "tweet_mode"=> "extended", 'count' => 5, 'format' => 'object']);
            $items= array_merge($items, $item);
        }
        foreach ($website_sources as $source){
            $item= $this->get_website_data($source->link);
            $items= array_merge($items, $item);
        }
        usort($items, function($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });
        $data= $this->get_sources();
        $data["items"]= $items;

        return view("news", $data);
    }
    public function twitter($id){
        $source= Source::findOrFail($id);
        $items= Twitter::getUserTimeline(['screen_name' => $source->link, "tweet_mode"=> "extended", 'count' => 10, 'format' => 'object']);
        $data= $this->get_sources();
        $data["items"]= $items;

        return view("news", $data);

    }
    private function get_website_data($link){
        $arr= [];
        try{
            $data= simplexml_load_file($link) or die("Error: Cannot create object");
        }catch(\Exception $e){
            return [];
        }
        foreach($data->channel->item as $item){
            $item->isWebsite= true;
            $item->image=$data->channel->image->url;
            $item->full_text= (string) $item->description;
            $item->created_at= (string) $item->pubDate;
            $item->websiteLink= (string) $data->channel->link;
            $item->websiteTitle= (string) $data->channel->title;
            array_push($arr, $item);
        }
        return $arr;
    }
    public function website($id){
        $source= Source::findOrFail($id);
        $items= $this->get_website_data($source->link);

        $data= $this->get_sources();
        $data["items"]= $items;

        return view("news", $data);

    }
}
