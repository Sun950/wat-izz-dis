<?php

namespace BTest\Http\Controllers;

include (app_path().'/model/Question.php');

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use DB;
use Session;
use View;

class searchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search($string)
    {
        $content = file_get_contents('http://www.imdb.com/xml/find?json=1&q=' . $string);

        $json = json_decode($content);

        print('<div id="content">');

        if( array_key_exists('title_exact', $json) ){
            $exact = $json->{'title_exact'};
            foreach ($exact as $elt)
            {
                print("<a value='". $elt->{'id'}) ."'>" . $elt->{'title'} . " - " . $elt->{'title_description'} . "</a><br>";
            }
        }

        print('<br><br>');

        if( array_key_exists('title_approx', $json) ){
            $exact = $json->{'title_approx'};
            foreach ($exact as $elt)
            {
                print("<a value='". $elt->{'id'}) ."'>" . $elt->{'title'} . " - " . $elt->{'title_description'} . "</a><br>";
            }
        }

        /*print('<br><br>');

        if( array_key_exists('title_popular', $json) ){
            $exact = $json->{'title_popular'};
            foreach ($exact as $elt)
            {
                print("<a value='". $elt->{'id'}) ."'>" . $elt->{'title'} . " " . $elt->{'title_description'} . "</a><br>";
            }
        }*/
        print('</div>');
        return "";
    }
}