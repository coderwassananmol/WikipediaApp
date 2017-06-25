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
        $featured_article = $response->find('div#mp-tfa p a');
        $link = $featured_article[0]->attr['href'];
        $title = $featured_article[0]->attr['title'];
        $article_count = $response->find('div#articlecount a');
        $article_count = $article_count[0]->nodes[0]->_[4];
        $feature_picture = $response->find('div#mp-tfp img');
        $feature_picture = substr($feature_picture[0]->attr['src'],2);
        return view('welcome',compact('link','title','article_count','feature_picture','language','langcode'));
    }
}
