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
use URL;

class searchController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function search($string)
    {
        $content = file_get_contents('https://v2.sg.media-imdb.com/suggests/' . $string[0] . '/' . $string . '.json');

        $pos = strpos($content, '(');
        $content = substr($content, $pos + 1);
        $content = rtrim($content, ')');

        $json = json_decode($content);

        echo '<div id="navbar-suggestionsearch">';

        if( array_key_exists('d', $json) ){
            $exact = $json->{'d'};
            foreach ($exact as $elt)
            {
                if (!strpos($elt->{'id'}, 'tt')) {
                    ?>
                    <a href="<?php echo URL::to('/play/' . $elt->{'id'}); ?>" class="poster highlighted">
                        <img src="<?php if (array_key_exists('i', $elt)) echo $elt->{'i'}[0]; ?>"
                             style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40"
                             height="54">
                        <div class="suggestionlabel">
                        <span class="title">
                            <?php echo $elt->{'l'}; ?>
                        </span>
                            <span class="extra"><?php if (array_key_exists('y', $elt)) echo $elt->{'y'}; ?></span>
                            <div class="detail"><?php if (array_key_exists('q', $elt)) echo $elt->{'q'}; ?></div>
                        </div>
                    </a>
                    <?php
                }
            }
        }
        print('</div>');
        return "";
    }

    public function search_select($string, $question_number)
    {
        $content = file_get_contents('https://v2.sg.media-imdb.com/suggests/' . $string[0] . '/' . $string . '.json');

        $pos = strpos($content, '(');
        $content = substr($content, $pos + 1);
        $content = rtrim($content, ')');

        $json = json_decode($content);

        echo '<div id="navbar-suggestionsearch" style="left: 140px; top: 38px; width: 534px;">';

        if( array_key_exists('d', $json) ){
            $exact = $json->{'d'};
            foreach ($exact as $elt)
            {
                if (!strpos($elt->{'id'}, 'tt')) {
                    ?>
                    <a href="javascript:fill_answer( '<?php echo $elt->{'id'}; ?>' , <?php echo $question_number; ?>)" class="poster highlighted">
                        <img src="<?php if (array_key_exists('i', $elt)) echo $elt->{'i'}[0]; ?>"
                             style="background:url('http://i.media-imdb.com/images/mobile/film-40x54.png')" width="40"
                             height="54">
                        <div class="suggestionlabel">
                        <span class="title">
                            <?php echo $elt->{'l'}; ?>
                        </span>
                            <span class="extra"><?php if (array_key_exists('y', $elt)) echo $elt->{'y'}; ?></span>
                            <div class="detail"><?php if (array_key_exists('q', $elt)) echo $elt->{'q'}; ?></div>
                        </div>
                    </a>
                    <?php
                }
            }
        }
        print('</div>');
        return "";
    }
}