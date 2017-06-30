<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\googleSearchModel;
use Ixudra\Curl\Facades\Curl;
require_once 'simple_html_dom.php';

class googleSearchController extends Controller
{
    public function index()
    {
        $response = file_get_html('https://meta.wikimedia.org/wiki/List_of_Wikipedias');
        $language = $response->find('table.sortable tr td');
        //dd($language[]->nodes[0]->attr['title']=='w:English language');
        return view('index',compact('language'));
    }
    public function welcome()
    {
        $langcode = substr($_GET['language'],strpos($_GET['language'],'-')+1);
        $language = substr($_GET['language'],0,strpos($_GET['language'],'-'));
        $response = file_get_html('https://'.$langcode.'.wikipedia.org');
        $featured_article = $response->find('div.mw-parser-output p b a',0);
        $link = $featured_article->attr['href'];
        $title = $featured_article->attr['title'];
        $article_count='';
        $text= $response->find('a');
        foreach($text as $text1)
            if(is_numeric(substr($text1->plaintext,0,1)))
                if(is_numeric(substr($text1->plaintext,sizeof($text1->plaintext)-2)))
                    $article_count = $text1->plaintext;
        /*$feature_picture = $response->find('img',3);
        dd($feature_picture);
        $feature_picture = substr($feature_picture[0]->attr['src'],2);*/
        return view('welcome',compact('link','title','article_count','language','langcode'));
    }
}
