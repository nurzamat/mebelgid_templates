<?php // rnfunctions.php

$dbhost  = 'localhost';    // Unlikely to require changing
$dbname  = 'allmebel'; // Modify these...
$dbuser  = 'root';     // ...variables according
$dbpass  = '';     // ...to your installation
$appname = "MebelGid"; // ...and preference

/*
$dbhost  = '176.126.165.135';    // Unlikely to require changing
$dbname  = 'user13488_ananas'; // Modify these...
$dbuser  = 'user13488_ananas';     // ...variables according
$dbpass  = 'kol0b0k';     // ...to your installation
$appname = "MebelGid"; // ...and preference
*/
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());

mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8' );
mysql_query('SET COLLATION_CONNECTION="utf8_general_ci"' );


function createTable($name, $query)
{
    if (tableExists($name))
    {
        echo "Table '$name' already exists<br />";
    }
    else
    {
        queryMysql("CREATE TABLE $name($query)");
        echo "Table '$name' created<br />";
    }
}

function tableExists($name)
{
    $result = queryMysql("SHOW TABLES LIKE '$name'");
    return mysql_num_rows($result);
}

function queryMysql($query)
{
    $result = mysql_query($query) or die(mysql_error());
    return $result;
}

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    //$var = htmlentities($var);
    $var = htmlentities($var, ENT_QUOTES, "UTF-8");
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

function showProfile($user)
{
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' border='1' align='left' />";

    $result = queryMysql("SELECT * FROM rnprofiles WHERE user='$user'");

    if (mysql_num_rows($result))
    {
        $row = mysql_fetch_row($result);
        echo stripslashes($row[1]) . "<br clear=left /><br />";
    }
}

function thumbnail_proportion($original_file_path, $max, $save_path="")
{
    $imgInfo = getimagesize($original_file_path);
    $imgExtension = "";

    switch ($imgInfo[2])
    {
        case 1:
            $imgExtension = '.gif';
            break;

        case 2:
            $imgExtension = '.jpg';
            break;

        case 3:
            $imgExtension = '.png';
            break;
    }

    if ($save_path=="") $save_path = "thumbnail".$imgExtension ;

    // Get new dimensions
    list($w, $h) = getimagesize($original_file_path);

    $tw  = $w;
    $th  = $h;

    if ($w > $h && $max < $w)
    {
        $th = $max / $w * $h;
        $tw = $max;
    }
    elseif ($h > $w && $max < $h)
    {
        $tw = $max / $h * $w;
        $th = $max;
    }
    elseif ($max < $w)
    {
        $tw = $th = $max;
    }
    // Resample
    $imageResample = imagecreatetruecolor($tw, $th);

    if ( $imgExtension == ".jpg" )
    {
        $image = imagecreatefromjpeg($original_file_path);
    }
    else if ( $imgExtension == ".gif" )
    {
        $image = imagecreatefromgif($original_file_path);
    }
    else if ( $imgExtension == ".png" )
    {
        $image = imagecreatefrompng($original_file_path);
    }

    imagecopyresampled($imageResample, $image, 0, 0, 0, 0, $tw, $th, $w, $h);

    imageconvolution($imageResample, array( // Sharpen image
        array(-1, -1, -1),
        array(-1, 16, -1),
        array(-1, -1, -1)
    ), 8, 0);

    if ( $imgExtension == ".jpg" )
        imagejpeg($imageResample, $save_path.$imgExtension);
    else if ( $imgExtension == ".gif" )
        imagegif($imageResample, $save_path.$imgExtension);
    else if ( $imgExtension == ".png" )
        imagepng($imageResample, $save_path.$imgExtension);

    imagedestroy($imageResample);
    imagedestroy($image);
}


function thumbnail_image($original_file_path, $new_width, $new_height, $save_path="")
{
    $imgInfo = getimagesize($original_file_path);
    $imgExtension = "";

    switch ($imgInfo[2])
    {
        case 1:
            $imgExtension = '.gif';
            break;

        case 2:
            $imgExtension = '.jpg';
            break;

        case 3:
            $imgExtension = '.png';
            break;
    }

    if ($save_path=="") $save_path = "thumbnail".$imgExtension ;

    // Get new dimensions
    list($width, $height) = getimagesize($original_file_path);
    // Resample
    $imageResample = imagecreatetruecolor($new_width, $new_height);

    if ( $imgExtension == ".jpg" )
    {
        $image = imagecreatefromjpeg($original_file_path);
    }
    else if ( $imgExtension == ".gif" )
    {
        $image = imagecreatefromgif($original_file_path);
    }
    else if ( $imgExtension == ".png" )
    {
        $image = imagecreatefrompng($original_file_path);
    }

    imagecopyresampled($imageResample, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    if ( $imgExtension == ".jpg" )
        imagejpeg($imageResample, $save_path.$imgExtension);
    else if ( $imgExtension == ".gif" )
        imagegif($imageResample, $save_path.$imgExtension);
    else if ( $imgExtension == ".png" )
        imagepng($imageResample, $save_path.$imgExtension);

    imagedestroy($imageResample);
    imagedestroy($image);
}

function getExtension($str) {

    $i = strrpos($str,".");
    if (!$i) { return ""; }

    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function getCityValue($str) {

    $result = "bishkek";
    if($str == "Бишкек")
        $result = "bishkek";
    if($str == "Ош")
        $result = "osh";
    if($str == "Чолпон-Ата")
        $result = "cholponata";
    if($str == "Каракол")
        $result = "karakol";

    return $result;
}

function getNamesByCats($c, $cat, $subcat)
{
    $text = "";

    if($c == "1")
    {
        if($cat == "kitchen")
        {
            $sets = "<li class=''>";
            if($subcat == "sets")
            {
                $sets = "<li class='active current-category'>";
                $text = "Гарнитуры";
            }

            $groups = "<li class=''>";
            if($subcat == "groups")
            {
                $groups = "<li class='active current-category'>";
                $text = "Обеденные группы";
            }

            $corners = "<li class=''>";
            if($subcat == "corners")
            {
                $corners = "<li class='active current-category'>";
                $text = "Уголки";
            }

            $tables = "<li class=''>";
            if($subcat == "tables")
            {
                $tables = "<li class='active current-category'>";
                $text = "Столы";
            }

            $chairs = "<li class=''>";
            if($subcat == "chairs")
            {
                $chairs = "<li class='active current-category'>";
                $text = "Стулья";
            }

            $sinks = "<li class=''>";
            if($subcat == "sinks")
            {
                $sinks = "<li class='active current-category'>";
                $text = "Мойки и смесители";
            }

            $other = "<li class=''>";
            if($subcat == "other")
            {
                $other = "<li class='active current-category'>";
                $text = "Другое";
            }


            return $text.":".$sets."<a href='category.php?c=1&cat=kitchen&subcat=sets'>Гарнитуры</a></li>".
                 $groups."<a  href='category.php?c=1&cat=kitchen&subcat=groups'>Обеденные группы</a></li>".
                 $corners."<a  href='category.php?c=1&cat=kitchen&subcat=corners'>Уголки</a></li>".
                 $tables."<a  href='category.php?c=1&cat=kitchen&subcat=tables'>Столы</a></li>".
                 $chairs."<a  href='category.php?c=1&cat=kitchen&subcat=chairs'>Стулья</a></li>".
                 $sinks."<a  href='category.php?c=1&cat=kitchen&subcat=sinks'>Мойки и смесители</a></li>".
                 $other."<a  href='category.php?c=1&cat=kitchen&subcat=other'>Другое</a></li>";
        }

        if($cat == "living")
        {
            $walls = "<li class=''>";
            if($subcat == "walls")
            {
                $walls = "<li class='active current-category'>";
                $text = "Гостиные, витрины";
            }

            $halls = "<li class=''>";
            if($subcat == "halls")
            {
                $halls = "<li class='active current-category'>";
                $text = "Прихожие";
            }

            $cupboards = "<li class=''>";
            if($subcat == "cupboards")
            {
                $cupboards = "<li class='active current-category'>";
                $text = "Шкафы, шкафы-купе";
            }

            $offices = "<li class=''>";
            if($subcat == "offices")
            {
                $offices = "<li class='active current-category'>";
                $text = "Домашние кабинеты";
            }

            $tables = "<li class=''>";
            if($subcat == "tables")
            {
                $tables = "<li class='active current-category'>";
                $text = "Столы";
            }

            $chairs = "<li class=''>";
            if($subcat == "chairs")
            {
                $chairs = "<li class='active current-category'>";
                $text = "Стулья";
            }

            $tallboys = "<li class=''>";
            if($subcat == "tallboys")
            {
                $tallboys = "<li class='active current-category'>";
                $text = "Тумбы, комоды, подставки";
            }

            $coffeetables = "<li class=''>";
            if($subcat == "coffee-tables")
            {
                $coffeetables = "<li class='active current-category'>";
                $text = "Журнальные столики";
            }

            $braided = "<li class=''>";
            if($subcat == "braided")
            {
                $braided = "<li class='active current-category'>";
                $text = "Плетеная мебель";
            }


            return $text.":".$walls."<a href='category.php?c=1&cat=living&subcat=walls'>Гостиные, витрины</a></li>".
                   $halls."<a href='category.php?c=1&cat=living&subcat=halls'>Прихожие</a></li>".
                            $cupboards."<a href='category.php?c=1&cat=living&subcat=cupboards'>Шкафы, шкафы-купе</a></li>".
                            $offices."<a href='category.php?c=1&cat=living&subcat=offices'>Домашние кабинеты</a></li>".
                            $tables."<a href='category.php?c=1&cat=living&subcat=tables'>Столы</a></li>".
                            $chairs."<a href='category.php?c=1&cat=living&subcat=chairs'>Стулья</a></li>".
                            $tallboys."<a href='category.php?c=1&cat=living&subcat=tallboys'>Тумбы, комоды, подставки</a></li>".
                            $coffeetables."<a href='category.php?c=1&cat=living&subcat=coffee-tables'>Журнальные столики</a></li>".
                            $braided."<a href='category.php?c=1&cat=living&subcat=braided'>Плетеная мебель</a></li>";
        }

        if($cat == "soft")
        {
            $sofas = "<li class=''>";
            if($subcat == "sofas")
            {
                $sofas = "<li class='active current-category'>";
                $text = "Диваны, диван-кровати";
            }

            $armchairs = "<li class=''>";
            if($subcat == "armchairs")
            {
                $armchairs = "<li class='active current-category'>";
                $text = "Кресла, кресла-кровати";
            }

            $couches = "<li class=''>";
            if($subcat == "couches")
            {
                $couches = "<li class='active current-category'>";
                $text = "Кушетка, тахта, панчетта";
            }

            $puffs = "<li class=''>";
            if($subcat == "puffs")
            {
                $puffs = "<li class='active current-category'>";
                $text = "Пуфы и мешки";
            }


            return $text.":".$sofas."<a href='category.php?c=1&cat=soft&subcat=sofas'>Диваны, диван-кровати</a></li>".
                 $armchairs."<a href='category.php?c=1&cat=soft&subcat=armchairs'>Кресла, кресла-кровати</a></li>".
                $couches."<a href='category.php?c=1&cat=soft&subcat=couches'>Кушетка, тахта, панчетта</a></li>".
                $puffs."<a href='category.php?c=1&cat=soft&subcat=puffs'>Пуфы и мешки</a></li>";
        }

        if($cat == "children")
        {
            $sets = "<li class=''>";
            if($subcat == "sets")
            {
                $sets = "<li class='active current-category'>";
                $text = "Гарнитуры";
            }

            $modules = "<li class=''>";
            if($subcat == "modules")
            {
                $modules = "<li class='active current-category'>";
                $text = "Комбинированные модули";
            }

            $maneges = "<li class=''>";
            if($subcat == "maneges")
            {
                $maneges = "<li class='active current-category'>";
                $text = "Манежы, манежные комнаты";
            }

            $soft = "<li class=''>";
            if($subcat == "soft")
            {
                $soft = "<li class='active current-category'>";
                $text = "Мягкая мебель";
            }

            $beds = "<li class=''>";
            if($subcat == "beds")
            {
                $beds = "<li class='active current-category'>";
                $text = "Кровати, комоды";
            }

            $twotier = "<li class=''>";
            if($subcat == "two-tier")
            {
                $twotier = "<li class='active current-category'>";
                $text = "Двухярусные кровати";
            }

            $tables = "<li class=''>";
            if($subcat == "tables")
            {
                $tables = "<li class='active current-category'>";
                $text = "Столы, стулья";
            }

            $cities = "<li class=''>";
            if($subcat == "cities")
            {
                $cities = "<li class='active current-category'>";
                $text = "Детские городки";
            }

            $comptables = "<li class=''>";
            if($subcat == "comp-tables")
            {
                $comptables = "<li class='active current-category'>";
                $text = "Компьютерные столы";
            }

            $wardrobe = "<li class=''>";
            if($subcat == "wardrobe")
            {
                $wardrobe = "<li class='active current-category'>";
                $text = "Шкафы";
            }


             return        $text.":".$sets."<a href='category.php?c=1&cat=children&subcat=sets'>Гарнитуры</a></li>".
                     $modules."<a href='category.php?c=1&cat=children&subcat=modules'>Комбинированные модули</a></li>".
                $maneges."<a href='category.php?c=1&cat=children&subcat=maneges'>Манежы, манежные комнаты</a></li>".
                $soft."<a href='category.php?c=1&cat=children&subcat=soft'>Мягкая мебель</a></li>".
                $beds."<a href='category.php?c=1&cat=children&subcat=beds'>Кровати, комоды</a></li>".
                $twotier."<a href='category.php?c=1&cat=children&subcat=two-tier'>Двухярусные кровати</a></li>".
                $tables."<a href='category.php?c=1&cat=children&subcat=tables'>Столы, стулья</a></li>".
                $cities."<a href='category.php?c=1&cat=children&subcat=cities'>Детские городки</a></li>".
                $comptables."<a href='category.php?c=1&cat=children&subcat=comp-tables'>Компьютерные столы</a></li>".
                $wardrobe."<a href='category.php?c=1&cat=children&subcat=wardrobe'>Шкафы</a></li>";
        }

        if($cat == "bedrooms")
        {
            $beds = "<li class=''>";
            if($subcat == "beds")
            {
                $beds = "<li class='active current-category'>";
                $text = "Кровати";
            }

            $sets = "<li class=''>";
            if($subcat == "sets")
            {
                $sets = "<li class='active current-category'>";
                $text = "Гарнитуры";
            }

            $mattresses = "<li class=''>";
            if($subcat == "mattresses")
            {
                $mattresses = "<li class='active current-category'>";
                $text = "Матрацы";
            }

            $mattresspad = "<li class=''>";
            if($subcat == "mattress-pad")
            {
                $mattresspad = "<li class='active current-category'>";
                $text = "Наматрасники";
            }

            $foundation = "<li class=''>";
            if($subcat == "foundation")
            {
                $foundation = "<li class='active current-category'>";
                $text = "Основания для кроватей";
            }

            $blanket = "<li class=''>";
            if($subcat == "blanket")
            {
                $blanket = "<li class='active current-category'>";
                $text = "Одеяла";
            }

            $pillow = "<li class=''>";
            if($subcat == "pillow")
            {
                $pillow = "<li class='active current-category'>";
                $text = "Подушки";
            }

            $shawl = "<li class=''>";
            if($subcat == "shawl")
            {
                $shawl = "<li class='active current-category'>";
                $text = "Покрывала";
            }


            return        $text.":".$beds."<a href='category.php?c=1&cat=bedrooms&subcat=beds'>Кровати</a></li>".
                           $sets."<a href='category.php?c=1&cat=bedrooms&subcat=sets'>Гарнитуры</a></li>".
                           $mattresses."<a href='category.php?c=1&cat=bedrooms&subcat=mattresses'>Матрацы</a></li>".
                           $mattresspad."<a href='category.php?c=1&cat=bedrooms&subcat=mattress-pad'>Наматрасники</a></li>".
                $foundation."<a href='category.php?c=1&cat=bedrooms&subcat=foundation'>Основания для кроватей</a></li>".
                $blanket."<a href='category.php?c=1&cat=bedrooms&subcat=blanket'>Одеяла</a></li>".
                $pillow."<a href='category.php?c=1&cat=bedrooms&subcat=pillow'>Подушки</a></li>".
                $shawl."<a href='category.php?c=1&cat=bedrooms&subcat=shawl'>Покрывала</a></li>";
        }

    }

    if($c == "2")
    {
       if($cat == "light")
       {

           $chandelier = "<li class=''>";
           if($subcat == "chandelier")
           {
               $chandelier = "<li class='active current-category'>";
               $text = "Люстры";
           }

           $onoff = "<li class=''>";
           if($subcat == "onoff")
           {
               $onoff = "<li class='active current-category'>";
               $text = "Включатели, выключатели";
           }

           $floorlamp = "<li class=''>";
           if($subcat == "floorlamp")
           {
               $floorlamp = "<li class='active current-category'>";
               $text = "Бра, торшеры итп";
           }

           $kids = "<li class=''>";
           if($subcat == "kids")
           {
               $kids = "<li class='active current-category'>";
               $text = "Детские";
           }

                return      $text.":".$chandelier."<a href='category.php?c=2&cat=light&subcat=chandelier'>Люстры</a></li>".
                            $onoff."<a href='category.php?c=2&cat=light&subcat=onoff'>Включатели, выключатели</a></li>".
                            $floorlamp."<a href='category.php?c=2&cat=light&subcat=floorlamp'>Бра, торшеры итп</a></li>".
                            $kids."<a href='category.php?c=2&cat=light&subcat=kids'>Детские</a></li>";
       }

        if($cat == "doors")
        {

            $interior = "<li class=''>";
            if($subcat == "interior")
            {
                $interior = "<li class='active current-category'>";
                $text = "Межкомнатные";
            }

            $steel_doors = "<li class=''>";
            if($subcat == "steel_doors")
            {
                $steel_doors = "<li class='active current-category'>";
                $text = "Стальные";
            }

            return $text.":".$interior."<a href='category.php?c=2&cat=doors&subcat=interior'>Межкомнатные</a></li>".
                 $steel_doors."<a href='category.php?c=2&cat=doors&subcat=steel_doors'>Стальные</a></li>";
        }

        if($cat == "kitchen")
        {

            $sets = "<li class=''>";
            if($subcat == "sets")
            {
                $sets = "<li class='active current-category'>";
                $text = "Наборы посуды";
            }

            $ceramics = "<li class=''>";
            if($subcat == "ceramics")
            {
                $ceramics = "<li class='active current-category'>";
                $text = "Фарфор";
            }

            $crystal = "<li class=''>";
            if($subcat == "crystal")
            {
                $crystal = "<li class='active current-category'>";
                $text = "Хрусталь";
            }

            $pots = "<li class=''>";
            if($subcat == "pots")
            {
                $pots = "<li class='active current-category'>";
                $text = "Кастрюли, казаны, сковороды";
            }

            $other = "<li class=''>";
            if($subcat == "other")
            {
                $other = "<li class='active current-category'>";
                $text = "Прочие интересные аксессуары";
            }

            return  $text.":".$sets."<a href='category.php?c=2&cat=kitchen&subcat=sets'>Наборы посуды</a></li>".
                $ceramics."<a href='category.php?c=2&cat=kitchen&subcat=ceramics'>Фарфор</a></li>".
                $crystal."<a href='category.php?c=2&cat=kitchen&subcat=crystal'>Хрусталь</a></li>".
                $pots."<a href='category.php?c=2&cat=kitchen&subcat=pots'>Кастрюли, казаны, сковороды</a></li>".
                $other."<a href='category.php?c=2&cat=kitchen&subcat=other'>Прочие интересные аксессуары</a></li>";
        }

        if($cat == "textile" || $cat == "jalousie" || $cat == "mats" || $cat == "fireplace" || $cat == "pictures" || $cat == "souvenir" || $cat == "clock" || $cat == "vase" || $cat == "antiques")
        {

            $textile = "<li class=''>";
            if($cat == "textile")
            {
                $textile = "<li class='active current-category'>";
                $text = "Шторы";
            }

            $jalousie = "<li class=''>";
            if($cat == "jalousie")
            {
                $jalousie = "<li class='active current-category'>";
                $text = "Жалюзи";
            }

            $mats = "<li class=''>";
            if($cat == "mats")
            {
                $mats = "<li class='active current-category'>";
                $text = "Ковры";
            }

            $fireplace = "<li class=''>";
            if($cat == "fireplace")
            {
                $fireplace = "<li class='active current-category'>";
                $text = "Камины";
            }

            $pictures = "<li class=''>";
            if($cat == "pictures")
            {
                $pictures = "<li class='active current-category'>";
                $text = "Картины, живопись";
            }

            $souvenir = "<li class=''>";
            if($cat == "souvenir")
            {
                $souvenir = "<li class='active current-category'>";
                $text = "Сувениры";
            }

            $clock = "<li class=''>";
            if($cat == "clock")
            {
                $clock = "<li class='active current-category'>";
                $text = "Часы";
            }

            $vase = "<li class=''>";
            if($cat == "vase")
            {
                $vase = "<li class='active current-category'>";
                $text = "Вазы";
            }

            $antiques = "<li class=''>";
            if($cat == "antiques")
            {
                $antiques = "<li class='active current-category'>";
                $text = "АНТИКВАРИАТ";
            }

            return  $text.":".$textile."<a href='category.php?c=2&cat=textile'>Шторы</a></li>".
                $jalousie."<a href='category.php?c=2&cat=jalousie'>Жалюзи</a></li>".
                $mats."<a href='category.php?c=2&cat=mats'>Ковры</a></li>".
                $fireplace."<a href='category.php?c=2&cat=fireplace'>Камины</a></li>".
                $pictures."<a href='category.php?c=2&cat=pictures'>Картины, живопись</a></li>".
                $souvenir."<a href='category.php?c=2&cat=souvenir'>Сувениры</a></li>".
                $clock."<a href='category.php?c=2&cat=clock'>Часы</a></li>".
                $vase."<a href='category.php?c=2&cat=vase'>Вазы</a></li>".
                $antiques."<a href='category.php?c=2&cat=antiques'>АНТИКВАРИАТ</a></li>";
        }
    }
    if($c == "3")
    {

        $boss = "<li class=''>";
        if($cat == "boss")
        {
            $boss = "<li class='active current-category'>";
            $text = "Мебель руководителю";
        }

        $staff = "<li class=''>";
        if($cat == "staff")
        {
            $staff = "<li class='active current-category'>";
            $text = "Мебель персоналу";
        }

        $chamber = "<li class=''>";
        if($cat == "chamber")
        {
            $chamber = "<li class='active current-category'>";
            $text = "Приемная";
        }

        $armchairs = "<li class=''>";
        if($cat == "armchairs")
        {
            $armchairs = "<li class='active current-category'>";
            $text = "Кресла";
        }

        $chair = "<li class=''>";
        if($cat == "chair")
        {
            $chair = "<li class='active current-category'>";
            $text = "Офисные стулья";
        }

        $tables = "<li class=''>";
        if($cat == "tables")
        {
            $tables = "<li class='active current-category'>";
            $text = "Письменные и компьютерные столы";
        }

        $boxes = "<li class=''>";
        if($cat == "boxes")
        {
            $boxes = "<li class='active current-category'>";
            $text = "Шкафы";
        }

        $safe = "<li class=''>";
        if($cat == "safe")
        {
            $safe = "<li class='active current-category'>";
            $text = "Сейфы";
        }

        $other = "<li class=''>";
        if($cat == "other")
        {
            $other = "<li class='active current-category'>";
            $text = "Прочее интересное";
        }

        return  $text.":".$boss."<a href='category.php?c=3&cat=boss'>Мебель руководителю</a></li>".
            $staff."<a href='category.php?c=3&cat=staff'>Мебель персоналу</a></li>".
            $chamber."<a href='category.php?c=3&cat=chamber'>Приемная</a></li>".
            $armchairs."<a href='category.php?c=3&cat=armchairs'>Кресла</a></li>".
            $chair."<a href='category.php?c=3&cat=chair'>Офисные стулья</a></li>".
            $tables."<a href='category.php?c=3&cat=tables'>Письменные и компьютерные столы</a></li>".
            $boxes."<a href='category.php?c=3&cat=boxes'>Шкафы</a></li>".
            $safe."<a href='category.php?c=3&cat=safe'>Сейфы</a></li>".
            $other."<a href='category.php?c=3&cat=other'>Прочее интересное</a></li>";
    }

    if($c == "4")
    {

        $design = "<li class=''>";
        if($cat == "design")
        {
            $design = "<li class='active current-category'>";
            $text = "Услуги дизайна";
        }

        $compile = "<li class=''>";
        if($cat == "compile")
        {
            $compile = "<li class='active current-category'>";
            $text = "Разборка/сборка мебели";
        }

        $ceiling = "<li class=''>";
        if($cat == "ceiling")
        {
            $ceiling = "<li class='active current-category'>";
            $text = "Установка натяжных потолков";
        }

        $repair = "<li class=''>";
        if($cat == "repair")
        {
            $repair = "<li class='active current-category'>";
            $text = "Ремонт, реставрация, чистка мебели";
        }

        $repair_room = "<li class=''>";
        if($cat == "repair_room")
        {
            $repair_room= "<li class='active current-category'>";
            $text = "Ремонт квартир";
        }

        $transport = "<li class=''>";
        if($cat == "transport")
        {
            $transport = "<li class='active current-category'>";
            $text = "Транспортные услуги";
        }

        $other = "<li class=''>";
        if($cat == "other")
        {
            $other = "<li class='active current-category'>";
            $text = "Прочее";
        }


        return $text.":".$design."<a href='category.php?c=4&cat=design'>Услуги дизайна</a></li>".
            $compile."<a href='category.php?c=4&cat=compile'>Разборка/сборка мебели</a></li>".
            $ceiling."<a href='category.php?c=4&cat=ceiling'>Установка натяжных потолков</a></li>".
            $repair."<a href='category.php?c=4&cat=repair'>Ремонт, реставрация, чистка мебели</a></li>".
            $repair_room."<a href='category.php?c=4&cat=repair_room'>Ремонт квартир</a></li>".
            $transport."<a href='category.php?c=4&cat=transport'>Транспортные услуги</a></li>".
            $other."<a href='category.php?c=4&cat=other'>Прочее</a></li>";
    }
    if($c == "5")
    {

        $fittings = "<li class=''>";
        if($cat == "fittings")
        {
            $fittings = "<li class='active current-category'>";
            $text = "Мебель";
        }

        $room = "<li class=''>";
        if($cat == "room")
        {
            $room = "<li class='active current-category'>";
            $text = "Стелажи, витрины";
        }

        $technical = "<li class=''>";
        if($cat == "technical")
        {
            $technical = "<li class='active current-category'>";
            $text = "Холодильные камеры";
        }

        $accessory = "<li class=''>";
        if($cat == "accessory")
        {
            $accessory = "<li class='active current-category'>";
            $text = "Прочие аксессуары";
        }

        $cafe = "<li class=''>";
        if($cat == "cafe")
        {
            $cafe= "<li class='active current-category'>";
            $text = "Для кафе и ресторанов";
        }

        $study = "<li class=''>";
        if($cat == "study")
        {
            $study= "<li class='active current-category'>";
            $text = "Для учебных заведений";
        }

        $medical = "<li class=''>";
        if($cat == "medical")
        {
            $medical= "<li class='active current-category'>";
            $text = "Медицинские";
        }

        $other = "<li class=''>";
        if($cat == "other")
        {
            $other = "<li class='active current-category'>";
            $text = "Прочее";
        }


                return $text.":".$fittings."<a href='category.php?c=5&cat=fittings'>Мебель</a></li>".
                    $room."<a href='category.php?c=5&cat=room'>Стелажи, витрины</a></li>".
                    $technical."<a href='category.php?c=5&cat=technical'>Холодильные камеры</a></li>".
                    $accessory."<a href='category.php?c=5&cat=accessory'>Прочие аксессуары</a></li>".
                    $cafe."<a href='category.php?c=5&cat=cafe'>Для кафе и ресторанов</a></li>".
                    $study."<a href='category.php?c=5&cat=study'>Для учебных заведений</a></li>".
                    $medical."<a href='category.php?c=5&cat=medical'>Медицинские</a></li>".
                    $other."<a href='category.php?c=5&cat=other'>Прочее</a></li>";
    }
}

function getNamesByC($c, $cat, $subcat)
{
    $c_text = "";
    $cat_text = "";
    $subcat_text = "";

    if($c == "1")
    {
        $c_text = "<li class='category102' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                     Мебель для дома
                    </li>";

        if($cat == "kitchen")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=1' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Мебель для дома</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Кухня
                        </li>";

            if($subcat == "sets")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Гарнитуры
                                </li>";
            }

            if($subcat == "groups")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Обеденные группы
                                </li>";
            }

            if($subcat == "corners")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Уголки
                                </li>";
            }

            if($subcat == "tables")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Столы
                                </li>";
            }

            if($subcat == "chairs")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Стулья
                                </li>";
            }

            if($subcat == "sinks")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Мойки и смесители
                                </li>";
            }

            if($subcat == "other")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=kitchen' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Кухня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Другое
                                </li>";
            }
        }

        if($cat == "living")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=1' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Мебель для дома</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Жилая мебель
                        </li>";

            if($subcat == "walls")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Гостиные, витрины
                                </li>";
            }

            if($subcat == "halls")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Прихожие
                                </li>";
            }

            if($subcat == "cupboards")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Шкафы, шкафы-купе
                                </li>";
            }

            if($subcat == "offices")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Домашние кабинеты
                                </li>";
            }

            if($subcat == "tables")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Столы
                                </li>";
            }

            if($subcat == "chairs")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Стулья
                                </li>";
            }

            if($subcat == "tallboys")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Тумбы, комоды, подставки
                                </li>";
            }

            if($subcat == "coffee-tables")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Журнальные столики
                                </li>";
            }


            if($subcat == "braided")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=living' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Жилая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Плетеная мебель
                                </li>";
            }
        }

        if($cat == "soft")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=1' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Мебель для дома</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Мягкая мебель
                        </li>";

            if($subcat == "sofas")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=soft' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Мягкая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Диваны, диван-кровати
                                </li>";
            }

            if($subcat == "armchairs")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=soft' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Мягкая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Кресла, кресла-кровати
                                </li>";
            }

            if($subcat == "couches")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=soft' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Мягкая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Кушетка, тахта, панчетта
                                </li>";
            }

            if($subcat == "puffs")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=soft' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Мягкая мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Пуфы и мешки
                                </li>";
            }

        }

        if($cat == "children")
        {

            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=1' title='Главная' itemprop='url'><amasty_seo itemprop='title'>Мебель для дома</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Детская мебель
                        </li>";

            if($subcat == "sets")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Гарнитуры
                                </li>";
            }

            if($subcat == "modules")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Комбинированные модули
                                </li>";
            }

            if($subcat == "maneges")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Манежы, манежные комнаты
                                </li>";
            }
            if($subcat == "soft")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Мягкая мебель
                                </li>";
            }

            if($subcat == "beds")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Кровати, комоды
                                </li>";
            }

            if($subcat == "two-tier")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Двухярусные кровати
                                </li>";
            }

            if($subcat == "tables")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Столы, стулья
                                </li>";
            }

            if($subcat == "cities")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Детские городки
                                </li>";
            }

            if($subcat == "comp-tables")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Компьютерные столы
                                </li>";
            }

            if($subcat == "wardrobe")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=children' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Детская мебель</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Шкафы
                                </li>";
            }

        }

        if($cat == "bedrooms")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=1' title='Мебель для дома' itemprop='url'><amasty_seo itemprop='title'>Мебель для дома</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Спальня
                        </li>";

            if($subcat == "beds")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Кровати
                                </li>";
            }

            if($subcat == "sets")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Гарнитуры
                                </li>";
            }

            if($subcat == "mattresses")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Матрацы
                                </li>";
            }

            if($subcat == "mattress-pad")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Наматрасники
                                </li>";
            }

            if($subcat == "foundation")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Основания для кроватей
                                </li>";
            }
            if($subcat == "blanket")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Одеяла
                                </li>";
            }

            if($subcat == "pillow")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Подушки
                                </li>";
            }

            if($subcat == "shawl")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=1&cat=bedrooms' title='Жилая мебель' itemprop='url'><amasty_seo itemprop='title'>Спальня</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Покрывала
                                </li>";
            }

        }
    }

    if($c == "2")
    {
        $c_text = "<li class='category102' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                    Все для интеръера
                    </li>";

        if($cat == "light")
        {

            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Свет
                        </li>";

            if($subcat == "chandelier")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=light' title='Свет' itemprop='url'><amasty_seo itemprop='title'>Свет</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Люстры
                                </li>";
            }

            if($subcat == "onoff")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=light' title='Свет' itemprop='url'><amasty_seo itemprop='title'>Свет</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Включатели, выключатели
                                </li>";
            }

            if($subcat == "floorlamp")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=light' title='Свет' itemprop='url'><amasty_seo itemprop='title'>Свет</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Бра, торшеры итп
                                </li>";
            }

            if($subcat == "kids")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=light' title='Свет' itemprop='url'><amasty_seo itemprop='title'>Свет</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Детские
                                </li>";
            }

        }

        if($cat == "doors")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Двери
                        </li>";
            if($subcat == "interior")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=doors' title='Двери' itemprop='url'><amasty_seo itemprop='title'>Двери</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Межкомнатные
                                </li>";
            }

            if($subcat == "steel_doors")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=doors' title='Двери' itemprop='url'><amasty_seo itemprop='title'>Двери</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Стальные
                                </li>";
            }
        }

        if($cat == "kitchen")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Для кухни
                        </li>";
            if($subcat == "sets")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=kitchen' title='Для кухни' itemprop='url'><amasty_seo itemprop='title'>Для кухни</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Наборы посуды
                                </li>";
            }

            if($subcat == "ceramics")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=kitchen' title='Для кухни' itemprop='url'><amasty_seo itemprop='title'>Для кухни</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Фарфор
                                </li>";
            }

            if($subcat == "crystal")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=kitchen' title='Для кухни' itemprop='url'><amasty_seo itemprop='title'>Для кухни</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Хрусталь
                                </li>";
            }

            if($subcat == "pots")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=kitchen' title='Для кухни' itemprop='url'><amasty_seo itemprop='title'>Для кухни</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Кастрюли, казаны, сковороды
                                </li>";
            }

            if($subcat == "other")
            {
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                             <a href='category.php?c=2&cat=kitchen' title='Для кухни' itemprop='url'><amasty_seo itemprop='title'>Для кухни</amasty_seo></a>
                             </li>";
                $subcat_text = "<li class='category187' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                                Прочие интересные аксессуары
                                </li>";
            }

        }

        if($cat == "textile" || $cat == "jalousie" || $cat == "mats" || $cat == "fireplace" || $cat == "pictures" || $cat == "souvenir" || $cat == "clock" || $cat == "vase" || $cat == "antiques")
        {

            if($cat == "textile")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Шторы
                        </li>";
            }

            if($cat == "jalousie")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Жалюзи
                        </li>";
            }

            if($cat == "mats")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Ковры
                        </li>";
            }
            if($cat == "fireplace")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Камины
                        </li>";
            }

            if($cat == "pictures")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Картины, живопись
                        </li>";
            }

            if($cat == "souvenir")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Сувениры
                        </li>";
            }

            if($cat == "clock")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Часы
                        </li>";
            }

            if($cat == "vase")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Вазы
                        </li>";
            }

            if($cat == "antiques")
            {
                $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=2' title='Все для интеръера' itemprop='url'><amasty_seo itemprop='title'>Все для интеръера</amasty_seo></a>
                        </li>";
                $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         АНТИКВАРИАТ
                        </li>";
            }
        }
    }

    if($c == "3")
    {
        $c_text = "<li class='category102' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                    Мебель для офиса
                    </li>";

        if($cat == "boss")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Мебель руководителю
                        </li>";
        }

        if($cat == "staff")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Мебель персоналу
                        </li>";
        }

        if($cat == "chamber")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Приемная
                        </li>";
        }

        if($cat == "armchairs")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Кресла
                        </li>";
        }

        if($cat == "chair")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Офисные стулья
                        </li>";
        }

        if($cat == "tables")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Письменные и компьютерные столы
                        </li>";
        }

        if($cat == "boxes")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Шкафы
                        </li>";
        }

        if($cat == "safe")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Сейфы
                        </li>";
        }

        if($cat == "other")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=3' title='Мебель для офиса' itemprop='url'><amasty_seo itemprop='title'>Мебель для офиса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Прочее интересное
                        </li>";
        }

    }


    if($c == "4")
    {
        $c_text = "<li class='category102' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                    Услуги
                    </li>";

        if($cat == "design")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Услуги дизайна
                        </li>";
        }

        if($cat == "compile")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Разборка/сборка мебели
                        </li>";
        }

        if($cat == "ceiling")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Установка натяжных потолков
                        </li>";
        }

        if($cat == "repair")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Ремонт, реставрация, чистка мебели
                        </li>";
        }

        if($cat == "repair_room")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                        Ремонт квартир
                        </li>";
        }

        if($cat == "transport")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                        Транспортные услуги
                        </li>";
        }

        if($cat == "other")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=4' title='Услуги' itemprop='url'><amasty_seo itemprop='title'>Услуги</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                        Прочее
                        </li>";
        }
    }

    if($c == "5")
    {
        $c_text = "<li class='category102' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                    Профильная для бизнеса
                    </li>";

        if($cat == "fittings")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Мебель
                        </li>";
        }

        if($cat == "room")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Стелажи, витрины
                        </li>";
        }

        if($cat == "technical")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Холодильные камеры
                        </li>";
        }

        if($cat == "accessory")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Прочие аксессуары
                        </li>";
        }

        if($cat == "cafe")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Для кафе и ресторанов
                        </li>";
        }

        if($cat == "study")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                         Для учебных заведений
                        </li>";
        }

        if($cat == "medical")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Медицинские
                        </li>";
        }

        if($cat == "other")
        {
            $c_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                       <a href='category.php?c=5' title='Профильная для бизнеса' itemprop='url'><amasty_seo itemprop='title'>Профильная для бизнеса</amasty_seo></a>
                        </li>";
            $cat_text = "<li class='home' itemscope='' itemtype='http://data-vocabulary.org/Breadcrumb'>
                          Прочее
                        </li>";
        }
    }

    return $c_text.$cat_text.$subcat_text;
}

/* Statuses
 *
 * --table users
 *
 * user_status values: 0, 1, 2;
 * user_status = 0 - default status, not salon
 * user_status = 1 - salon on moderation (заявка на салон)
 * user_status = 2 - is salon
 *               3 - inactive
 *
 * --table advertisements
 *
 * status values: 0, 1;
 * status = 0 - default status, on moderation
 * status = 1 - on site
 *
 *
 */

?>
