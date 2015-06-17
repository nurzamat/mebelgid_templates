<?php
include_once '../content/header.php';
$parent = basename(__DIR__);

$c = "";
$cat = "";
$subcat = "";
//kitchen
$style = "";
$facade = "";
$tabletop = "";
//soft
//$description = "";
$upholstery = "";
$mechanism = "";
//living
$type = "";
//$facade = "";

$query = "SELECT a.ID as id, a.title, a.catalog, a.cat, a.subcat, a.text, a.name, a.city, a.email, a.phone1, a.phone2, a.style,
a.carcase, a.facade, a.tabletop, a.priceIs, a.price, a.pricecurrency, a.pricefor, a.color, a.material, a.manufacturer,
a.length, a.height, a.width, a.shipment, a.feature, a.createddate, a.status, a.statusChangeDate, a.type, a.upholstery,
a.mechanism, a.foundation, a.enablecomments, a.idUser, u.user_login, u.user_pass, u.user_nicename, u.user_email, u.user_phone,
u.user_registered, u.user_city, u.user_status, u.user_salonname, u.user_salondomen, u.user_salonstatus FROM advertisements AS a LEFT JOIN users as u ON a.idUser = u.ID WHERE u.user_salondomen = '$parent'";

$query1 = $query." AND a.catalog='1'";
$query2 = $query." AND a.catalog='2'";
$query3 = $query." AND a.catalog='3'";
$query4 = $query." AND a.catalog='4'";
$query5 = $query." AND a.catalog='5'";

$records1 = mysql_num_rows(queryMysql($query1));
$records2 = mysql_num_rows(queryMysql($query2));
$records3 = mysql_num_rows(queryMysql($query3));
$records4 = mysql_num_rows(queryMysql($query4));
$records5 = mysql_num_rows(queryMysql($query5));

if($records1 > 0)
{
    $kitchenQ = $query1." AND a.cat='kitchen'";
    $softQ = $query1." AND a.cat='soft'";
    $livingQ = $query1." AND a.cat='living'";
    $bedroomsQ = $query1." AND a.cat='bedrooms'";
    $childrenQ = $query1." AND a.cat='children'";
    $bathroomQ = $query1." AND a.cat='bathroom'";
    $gardenQ = $query1." AND a.cat='garden'";

    $recordsKitchen = mysql_num_rows(queryMysql($kitchenQ));
    $recordsSoft = mysql_num_rows(queryMysql($softQ));
    $recordsLiving = mysql_num_rows(queryMysql($livingQ));
    $recordsBedrooms = mysql_num_rows(queryMysql($bedroomsQ));
    $recordsChildren = mysql_num_rows(queryMysql($childrenQ));
    $recordsBathroom = mysql_num_rows(queryMysql($bathroomQ));
    $recordsGarden = mysql_num_rows(queryMysql($gardenQ));

    if($recordsKitchen > 0)
    {
        $setsQ = $kitchenQ." AND a.subcat='sets'";
        $groupsQ = $kitchenQ." AND a.subcat='groups'";
        $cornersQ = $kitchenQ." AND a.subcat='corners'";
        $tablesQ = $kitchenQ." AND a.subcat='tables'";
        $chairsQ = $kitchenQ." AND a.subcat='chairs'";
        $sinksQ = $kitchenQ." AND a.subcat='sinks'";
        $otherQ = $kitchenQ." AND a.subcat='other'";

        $kitchenSets = mysql_num_rows(queryMysql($setsQ));
        $kitchenGroups = mysql_num_rows(queryMysql($groupsQ));
        $kitchenCorners = mysql_num_rows(queryMysql($cornersQ));
        $kitchenTables = mysql_num_rows(queryMysql($tablesQ));
        $kitchenChairs = mysql_num_rows(queryMysql($chairsQ));
        $kitchenSinks = mysql_num_rows(queryMysql($sinksQ));
        $kitchenOther = mysql_num_rows(queryMysql($otherQ));
    }
    if($recordsSoft > 0)
    {
        $sofasQ = $softQ." AND a.subcat='sofas'";
        $armchairsQ = $softQ." AND a.subcat='armchairs'";
        $couchesQ = $softQ." AND a.subcat='couches'";
        $puffsQ = $softQ." AND a.subcat='puffs'";

        $softSofas = mysql_num_rows(queryMysql($sofasQ));
        $softArmchairs = mysql_num_rows(queryMysql($armchairsQ));
        $softCouches = mysql_num_rows(queryMysql($couchesQ));
        $softPuffs = mysql_num_rows(queryMysql($puffsQ));
    }
    if($recordsLiving > 0)
    {
        $wallsQ = $livingQ." AND a.subcat='walls'";
        $hallsQ = $livingQ." AND a.subcat='halls'";
        $cupboardsQ = $livingQ." AND a.subcat='cupboards'";
        $officesQ = $livingQ." AND a.subcat='offices'";
        $tablesQ = $livingQ." AND a.subcat='tables'";
        $chairsQ = $livingQ." AND a.subcat='chairs'";
        $tallboysQ = $livingQ." AND a.subcat='tallboys'";
        $coffee_tablesQ = $livingQ." AND a.subcat='coffee_tables'";
        $braidedQ = $livingQ." AND a.subcat='braided'";

        $livingWalls = mysql_num_rows(queryMysql($wallsQ));
        $livingHalls = mysql_num_rows(queryMysql($hallsQ));
        $livingCupboards = mysql_num_rows(queryMysql($cupboardsQ));
        $livingOffices = mysql_num_rows(queryMysql($officesQ));
        $livingTables = mysql_num_rows(queryMysql($tablesQ));
        $livingChairs = mysql_num_rows(queryMysql($chairsQ));
        $livingTallboys = mysql_num_rows(queryMysql($tallboysQ));
        $livingCoffee_tables = mysql_num_rows(queryMysql($coffee_tablesQ));
        $livingBraided = mysql_num_rows(queryMysql($braidedQ));

    }
    if($recordsBedrooms > 0)
    {
        $bedsQ = $bedroomsQ." AND a.subcat='beds'";
        $setsQ = $bedroomsQ." AND a.subcat='sets'";
        $mattressesQ = $bedroomsQ." AND a.subcat='mattresses'";
        $mattresses_padQ = $bedroomsQ." AND a.subcat='mattresses_pad'";
        $foundationQ = $bedroomsQ." AND a.subcat='foundation'";
        $blanketQ = $bedroomsQ." AND a.subcat='blanket'";
        $pillowQ = $bedroomsQ." AND a.subcat='pillow'";
        $shawlQ = $bedroomsQ." AND a.subcat='shawl'";

        $bedroomsBeds = mysql_num_rows(queryMysql($bedsQ));
        $bedroomsSets = mysql_num_rows(queryMysql($setsQ));
        $bedroomsMattresses = mysql_num_rows(queryMysql($mattressesQ));
        $bedroomsMattresses_pad = mysql_num_rows(queryMysql($mattresses_padQ));
        $bedroomsFoundation = mysql_num_rows(queryMysql($foundationQ));
        $bedroomsBlanket = mysql_num_rows(queryMysql($blanketQ));
        $bedroomsPillow = mysql_num_rows(queryMysql($pillowQ));
        $bedroomsShawl = mysql_num_rows(queryMysql($shawlQ));
    }
    if($recordsChildren > 0)
    {
        $setsQ = $childrenQ." AND a.subcat='sets'";
        $modulesQ = $childrenQ." AND a.subcat='modules'";
        $manegesQ = $childrenQ." AND a.subcat='maneges'";
        $softQ = $childrenQ." AND a.subcat='soft'";
        $bedsQ = $childrenQ." AND a.subcat='beds'";
        $two_tierQ = $childrenQ." AND a.subcat='two_tier'";
        $tablesQ = $childrenQ." AND a.subcat='tables'";
        $comp_tablesQ = $childrenQ." AND a.subcat='comp_tables'";
        $wardrobeQ = $childrenQ." AND a.subcat='wardrobe'";

        $childrenSets = mysql_num_rows(queryMysql($setsQ));
        $childrenModules = mysql_num_rows(queryMysql($modulesQ));
        $childrenManeges = mysql_num_rows(queryMysql($manegesQ));
        $childrenSoft = mysql_num_rows(queryMysql($softQ));
        $childrenBeds = mysql_num_rows(queryMysql($bedsQ));
        $childrenTwo_tier = mysql_num_rows(queryMysql($two_tierQ));
        $childrenTables = mysql_num_rows(queryMysql($tablesQ));
        $childrenComp_tables = mysql_num_rows(queryMysql($comp_tablesQ));
        $childrenWardrobe = mysql_num_rows(queryMysql($wardrobeQ));

    }
    if($recordsBathroom > 0)
    {

    }
    if($recordsGarden > 0)
    {

    }

}
if($records2 > 0)
{

}
if($records3 > 0)
{

}
if($records4 > 0)
{

}
if($records5 > 0)
{

}

if (isset($_GET['c']))
{
    $c = $_GET['c'];
    $query = $query." AND a.catalog='$c'";
}

if (isset($_GET['cat']))
{
    $cat = $_GET['cat'];
    $query = $query." AND a.cat='$cat'";
}
if (isset($_GET['subcat']))
{
    $subcat = $_GET['subcat'];
    $query = $query." AND a.subcat='$subcat'";
}
if (isset($_GET['style']))
{
    $style = $_GET['style'];
    $query = $query." AND a.style='$style'";
}
if (isset($_GET['facade']))
{
    $facade = $_GET['facade'];
    $query = $query." AND a.facade='$facade'";
}
if (isset($_GET['tabletop']))
{
    $tabletop = $_GET['tabletop'];
    $query = $query." AND a.tabletop='$tabletop'";
}
if (isset($_GET['upholstery']))
{
    $upholstery = $_GET['upholstery'];
    $query = $query." AND a.upholstery='$upholstery'";
}
if (isset($_GET['mechanism']))
{
    $mechanism = $_GET['mechanism'];
    $query = $query." AND a.mechanism='$mechanism'";
}
if (isset($_GET['type']))
{
    $type = $_GET['type'];
    $query = $query." AND a.type='$type'";
}

//paging
$num_rec_per_page = 25;
$advsQ = queryMysql($query);
$total_records = mysql_num_rows($advsQ);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page);

$current_uri = $_SERVER['REQUEST_URI'];
$qc = count(explode("?", $current_uri));
if($qc == 0 || $qc == 1)
{
    $current_uri = $current_uri."?c=".$c;
}
if (isset($_GET["page"]))
{
    $page  = $_GET["page"];
    $pieces = explode("&", $current_uri);
    $current_uri = str_replace("&".$pieces[count($pieces) - 1],"", $current_uri);
} else
{
    $page = 1;
};
$start_from = ($page-1) * $num_rec_per_page;
$query = $query." LIMIT  $start_from, $num_rec_per_page";
$advsQ = queryMysql($query);
//end of paging

//user query
$queryU = "SELECT * FROM users WHERE user_salondomen='$parent'";
$user_obj = mysql_fetch_object(queryMysql($queryU));

//salons query
$queryS = "SELECT * FROM users WHERE user_status='2' AND user_city='$user_obj->user_city'";
$salon_records = mysql_num_rows(queryMysql($queryS));

$salon_city = getCityValue($user_obj->user_city);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>MebelGid.kg</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="../content/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/content/images/app-touch-icon.png" rel="apple-touch-icon-precomposed" />
    <link href="../content/assets/css/undohtml.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/print.css?t=1346827624" media="print" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/styles.css?t=1417593679" media="screen" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/fotorama.css" media="screen" rel="stylesheet" type="text/css" />
    <!--<link href="http://almaz.mebel.kz/goods" rel="canonical" />-->
    <script type="text/javascript" src="../content/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../content/assets/js/fotorama.js"></script>
    <script type="text/javascript" src="http://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
    <script type="text/javascript" src="../content/assets/js/base64.js"></script>
    <script type="text/javascript" src="../content/assets/js/content.js"></script>
    <script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter28434501 = new Ya.Metrika({id:28434501,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") +
            "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/28434501"
                        style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>

<div class="layout salonPage">
    <div class="table noprint" style="padding-top: 1.5em; padding-bottom: 5px;">
        <div id="salonMenu">
            <div class="salonMenuItems">
                <a href="../content/index.php?city=<?=$salon_city?>" class="blackLink noBorder"><img src="../content/assets/images/slogo.png" alt="MebelGid.kg" title="на главную" id="logoInSalon" /></a>
                        <span style="position: relative">в&nbsp;<?=$user_obj->user_city."е"?> и <a href="#" id="citySelectSalon" onclick="$('#selectCitySalon').fadeIn(200);" class="blackLink blackFlink" rel="nofollow">других городах <img src="../content/assets/images/darr.gif" alt="↓" /></a>
                            <div id="selectCitySalon" style="width: 150px">
                                <ul>
                                    <li><a href="../content/index.php?city=bishkek" class="blackLink"><nobr>Бишкек</nobr></a>&nbsp;<small class="gray">7920</small></li>
                                    <li><a href="../content/index.php?city=osh" class="blackLink"><nobr>Ош</nobr></a>&nbsp;<small class="gray">7920</small></li>
                                    <li><a href="../content/index.php?city=cholponata" class="blackLink"><nobr>Чолпон-Ата</nobr></a>&nbsp;<small class="gray">7920</small></li>
                                    <li><a href="../content/index.php?city=karakol" class="blackLink"><nobr>Каракол</nobr></a>&nbsp;<small class="gray">7920</small></li>
                                </ul>
                                <strong><a class="closeCity blackLink" href="#" onclick="$(this).closest('div').hide(); return false;" style="right: 9px" rel="nofollow">&times;</a></strong>
                            </div>
                        </span>
            </div>
            <div class="salonMenuItems rightItems">
                <span class="salonMenuItem"><a href="../content/index.php?city=<?=$salon_city?>" class="blackLink">Мебель</a></span>

                <span class="salonMenuItem current"><a href="../content/salons.php?city=<?=$salon_city?>" class="blackLink">Салоны</a>&nbsp;<small class="gray smaller"><?=$salon_records?></small></span>

                <span class="salonMenuItem"><a href="../content/registerSalon.php" class="blackLink" rel="nofollow">Добавить салон</a></span>

                <span class="salonMenuItem"><a href="../content/addNew.php" class="blackLink" rel="nofollow">Подать объявление</a></span>

                <span class="salonMenuItem" style="position: relative">
                            <div class="table login" id="loginDiv" style="display: none; top: 50px; left:-250px">
                                <h2>Войти в личный кабинет</h2>
                                <form id="loginForm" action="../content/login.php" method="post" class="addForm" style="padding: 0">
                                    <table class="form">
                                        <tr>
                                            <td class="name"><nobr>Эл.&nbsp;почта</nobr></td>
                                            <td><input type="text" class="textInput" name="user" /></td>
                                        </tr>
                                        <tr>
                                            <td class="name">Пароль</td>
                                            <td><input type="password" class="textInput" name="password" /></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <input type="submit" class="button" value="Войти" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <a href="../content/register.php" class="blackLink" rel="nofollow">Зарегистрироваться</a>&nbsp;&middot;&nbsp;<a href="../content/forgot.php" class="blackLink" rel="nofollow">Забыли пароль?</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <a href="#" class="noFav noBorder" title="закрыть" onclick="$(this).closest('div').hide(); return false;" rel="nofollow">&nbsp;</a>
                            </div>
                            <a href="../content/my.php" class="blackFlink" onclick="$('#loginDiv').show(); return false;" rel="nofollow">Личный кабинет</a> <small class="gray"></small></span></div>
        </div>
    </div>
    <div id="searchContainer">
        <div class="salonContent">
            <div class="bread gray">
                <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/index.php?city=<?=$salon_city?>" title="Главная"><span itemprop="title">Главная</span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/salons.php?city=<?=$salon_city?>" title="Мебельные салоны в <?=$user_obj->user_city."е"?>"><span itemprop="title">Мебельные салоны в <?=$user_obj->user_city."е"?></span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="index.php" title="<?=$user_obj->user_salonname?>"><span itemprop="title"><?=$user_obj->user_salonname?></span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">Товары</span></span>
            </div>
            <div class="toCenter">
                <img src="../content/uploads/<?=$user_obj->user_login?>_150.jpg" align="absmiddle" style="margin: 0 0 1em 0"  itemprop="logo" alt="<?=$user_obj->user_salonname?>" title="<?=$user_obj->user_salonname?> | MebelGid.kg"/><h1 itemprop="name"><?=$user_obj->user_salonname?></h1>
            </div>
            <div class="toCenter">
                <ul id="salonMainMenu">
                    <li><a href="index.php">Салон</a></li>
                    <li class="current">Товары</li>
                    <li><a href="news.php">Новости</a></li>
                </ul>
            </div>
            <!-- start верстка формы поиска -->
            <div id="searchFilter" style="margin-top: 25px;">
                <form id="searchFilterForm" method="get" action="goods.php">
                    <?
                    if($c == "")
                    {
                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>";

                        if($records1 > 0) echo "<li><a class='flink' href='goods.php?c=1'>Мебель для дома</a> <small class='gray'>$records1</small></li>";
                        if($records2 > 0) echo "<li><a class='flink' href='goods.php?c=2'>Всё для интерьера</a> <small class='gray'>$records2</small></li>";
                        if($records3 > 0) echo "<li><a class='flink' href='goods.php?c=3'>Мебель для офиса</a> <small class='gray'>$records3</small></li>";
                        if($records4 > 0) echo "<li><a class='flink' href='goods.php?c=4'>Услуги</a> <small class='gray'>$records4</small></li>";
                        if($records5 > 0) echo "<li><a class='flink' href='goods.php?c=5'>Профильная для бизнеса</a> <small class='gray'>$records5</small></li>";

                        echo"</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                    }
                    /////////////////////////////////////////////////////////////////////////
                    if($c == "1")
                    {
                    if($records1 >0 && $cat == "" && $subcat == "")
                    {
                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>
                        <li class='active'><a class='flink' href='goods.php?c=1'>Мебель для дома</a> <small class='gray'>$records1</small></li>";

                        if($records2 > 0) echo "<li><a class='flink' href='goods.php?c=2'>Всё для интерьера</a> <small class='gray'>$records2</small></li>";
                        if($records3 > 0) echo "<li><a class='flink' href='goods.php?c=3'>Мебель для офиса</a> <small class='gray'>$records3</small></li>";
                        if($records4 > 0) echo "<li><a class='flink' href='goods.php?c=4'>Услуги</a> <small class='gray'>$records4</small></li>";
                        if($records5 > 0) echo "<li><a class='flink' href='goods.php?c=5'>Разное</a> <small class='gray'>$records5</small></li>";

                    echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";

                    if($recordsKitchen > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                    if($recordsSoft > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                    if($recordsLiving > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                    if($recordsBedrooms > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                    if($recordsChildren > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                    if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                        if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";

                        echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                    }

                    if($cat == "kitchen")
                    {
                        $sets = $groups = $corners = $tables = $chairs = $sinks = $other = "<li>";

                        if($subcat == "sets")
                        {
                            $sets = "<li class='active'>";
                        }
                        if($subcat == "groups")
                        {
                            $groups = "<li class='active'>";
                        }
                        if($subcat == "corners")
                        {
                            $corners = "<li class='active'>";
                        }
                        if($subcat == "tables")
                        {
                            $tables = "<li class='active'>";
                        }
                        if($subcat == "chairs")
                        {
                            $chairs = "<li class='active'>";
                        }
                        if($subcat == "sinks")
                        {
                            $sinks = "<li class='active'>";
                        }
                        if($subcat == "other")
                        {
                            $other = "<li class='active'>";
                        }

                       echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>
                        <li class='active'><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                        if($recordsSoft > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                        if($recordsLiving > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                        if($recordsBedrooms > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                        if($recordsChildren > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                        if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                        if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";
                    echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";
                        if($kitchenSets > 0) echo $sets."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets'>Гарнитуры</a> <small class='gray'>$kitchenSets</small></li>";
                        if($kitchenGroups > 0) echo $groups."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=groups'>Обеденные группы</a> <small class='gray'>$kitchenGroups</small></li>";
                        if($kitchenCorners > 0) echo $corners."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=corners'>Уголки</a> <small class='gray'>$kitchenCorners</small></li>";
                        if($kitchenTables > 0) echo $tables."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=tables'>Столы</a> <small class='gray'>$kitchenTables</small></li>";
                        if($kitchenChairs > 0) echo $chairs."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=chairs'>Стулья</a> <small class='gray'>$kitchenChairs</small></li>";
                        if($kitchenSinks > 0) echo $sinks."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sinks'>Мойки и смесители</a> <small class='gray'>$kitchenSinks</small></li>";
                        if($kitchenOther > 0) echo $other."<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=other'>Другое</a> <small class='gray'>$kitchenOther</small></li>";

                        if($subcat == "") echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                        if($subcat == "sets" || $subcat == "groups" || $subcat == "corners" || $subcat == "tables" || $subcat == "chairs" || $subcat == "sinks" || $subcat == "other")
                        {
                            $modern = $classic = $dsp = $mdf = $multiplex = $mdf_veneer = $wood = $glass = $metal = $t_dsp = $steel = $t_wood = $artificial_stone = $natural_stone = "<li>";
                            $get_modern = $get_classic = $get_dsp = $get_mdf = $get_multiplex = $get_mdf_veneer = $get_wood = $get_glass = $get_metal = $get_t_dsp = $get_steel = $get_t_wood = $get_artificial_stone = $get_natural_stone = "";

                            if($style == "modern")
                            {
                                $modern = "<li class='active'>";
                                $get_modern = "&style=modern";
                            }
                            if($style == "classic")
                            {
                                $classic = "<li class='active'>";
                                $get_classic = "&style=classic";
                            }
                            if($facade == "dsp")
                            {
                                $dsp = "<li class='active'>";
                                $get_dsp = "&facade=dsp";
                            }
                            if($facade == "mdf")
                            {
                                $mdf = "<li class='active'>";
                                $get_mdf = "&facade=mdf";
                            }
                            if($facade == "multiplex")
                            {
                                $multiplex = "<li class='active'>";
                                $get_multiplex = "&facade=multiplex";
                            }
                            if($facade == "mdf_veneer")
                            {
                                $mdf_veneer = "<li class='active'>";
                                $get_mdf_veneer = "&facade=mdf_veneer";
                            }
                            if($facade == "wood")
                            {
                                $wood = "<li class='active'>";
                                $get_wood = "&facade=wood";
                            }
                            if($facade == "glass")
                            {
                                $glass = "<li class='active'>";
                                $get_glass = "&facade=glass";
                            }
                            if($facade == "metal")
                            {
                                $metal = "<li class='active'>";
                                $get_metal = "&facade=metal";
                            }
                            if($tabletop == "dsp")
                            {
                                $t_dsp = "<li class='active'>";
                                $get_t_dsp = "&tabletop=dsp";
                            }
                            if($tabletop == "steel")
                            {
                                $steel = "<li class='active'>";
                                $get_steel = "&tabletop=steel";
                            }
                            if($tabletop == "wood")
                            {
                                $t_wood = "<li class='active'>";
                                $get_t_wood = "&tabletop=wood";
                            }
                            if($tabletop == "artificial_stone")
                            {
                                $artificial_stone = "<li class='active'>";
                                $get_artificial_stone = "&tabletop=artificial_stone";
                            }
                            if($tabletop == "natural_stone")
                            {
                                $natural_stone = "<li class='active'>";
                                $get_natural_stone = "&tabletop=natural_stone";
                            }
                            echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                   <span class='searchFilterTitle'>Стиль</span>
                    <ul class='searchFilterOptions'>
                        $modern<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&style=modern".$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>современный</a></li>
                        $classic<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&style=classic".$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>классический</a></li>
                    </ul>
                   <span class='searchFilterTitle'>Фасад</span>
                    <ul class='searchFilterOptions'>
                        $dsp<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=dsp".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>ДСП</a></li>
                        $mdf<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=mdf".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>МДФ</a></li>
                        $multiplex<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=multiplex".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>мультиплекс</a></li>
                        $mdf_veneer<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=mdf_veneer".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>МДФ + древесный шпон</a></li>
                        $wood<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=wood".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>дерево</a></li>
                        $glass<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=glass".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>закалённое стекло</a></li>
                        $metal<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&facade=metal".$get_modern.$get_classic.$get_t_dsp.$get_steel.$get_t_wood.$get_artificial_stone.$get_natural_stone."'>металл</a></li>
                    </ul>
                    <span class='searchFilterTitle'>Столещница</span>
                    <ul class='searchFilterOptions'>
                        $t_dsp<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&tabletop=dsp".$get_modern.$get_classic.$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal."'>ламинированная ДСП</a></li>
                        $steel<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&tabletop=steel".$get_modern.$get_classic.$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal."'>нержавеющая сталь</a></li>
                        $t_wood<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&tabletop=wood".$get_modern.$get_classic.$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal."'>дерево</a></li>
                        $artificial_stone<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&tabletop=artificial_stone".$get_modern.$get_classic.$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal."'>искусственный камень</a></li>
                        $natural_stone<a class='flink' href='goods.php?c=1&cat=kitchen&subcat=sets&tabletop=natural_stone".$get_modern.$get_classic.$get_dsp.$get_mdf.$get_multiplex.$get_mdf_veneer.$get_wood.$get_glass.$get_metal."'>натуральный камень</a></li>
                    </ul>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                        }
                    }

                    //soft

                    if($cat == "soft")
                    {
                        $sofas = $armchairs = $couches = $puffs = "<li>";

                        if($subcat == "sofas")
                        {
                            $sofas = "<li class='active'>";
                        }
                        if($subcat == "armchairs")
                        {
                            $armchairs = "<li class='active'>";
                        }
                        if($subcat == "couches")
                        {
                            $couches = "<li class='active'>";
                        }
                        if($subcat == "puffs")
                        {
                            $puffs = "<li class='active'>";
                        }

                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>";
                        if($recordsKitchen > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                        echo "<li class='active'><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                        if($recordsLiving > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                        if($recordsBedrooms > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                        if($recordsChildren > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                        if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                        if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";
                        echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";
                    if($softSofas > 0) echo $sofas."<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas'>Диваны, диван-кровати</a> <small class='gray'>$softSofas</small></li>";
                    if($softArmchairs > 0) echo $armchairs."<a class='flink' href='goods.php?c=1&cat=soft&subcat=armchairs'>Кресла, кресла-кровати</a> <small class='gray'>$softArmchairs</small></li>";
                    if($softCouches > 0) echo $couches."<a class='flink' href='goods.php?c=1&cat=soft&subcat=couches'>Кушетки, тахта, панчетта</a> <small class='gray'>$softCouches</small></li>";
                    if($softPuffs > 0) echo $puffs."<a class='flink' href='goods.php?c=1&cat=soft&subcat=puffs'>Пуфы и мешки</a> <small class='gray'>$softPuffs</small></li>";

                        if($subcat == "sofas")
                        {
                            $straight = $corner = $natural_leather = $artificial_leather = $velure = $jacquard = $microfiber = $hopsack = $flock = $chenille = $no = $book = $eurobook = $folding = $rolling = $dolphin = $accordion = "<li>";
                            $get_straight = $get_corner = $get_natural_leather = $get_artificial_leather = $get_velure = $get_jacquard = $get_microfiber = $get_hopsack = $get_flock = $get_chenille = $get_no = $get_book = $get_eurobook = $get_folding = $get_rolling = $get_dolphin = $get_accordion = "";

                            if($style == "straight")
                            {
                                $straight = "<li class='active'>";
                                $get_straight = "&style=straight";
                            }
                            if($style == "corner")
                            {
                                $corner = "<li class='active'>";
                                $get_corner = "&style=corner";
                            }
                            if($upholstery == "natural_leather")
                            {
                                $natural_leather = "<li class='active'>";
                                $get_natural_leather = "&upholstery=natural_leather";
                            }
                            if($upholstery == "artificial_leather")
                            {
                                $artificial_leather = "<li class='active'>";
                                $get_artificial_leather = "&upholstery=artificial_leather";
                            }
                            if($upholstery == "velure")
                            {
                                $velure = "<li class='active'>";
                                $get_velure = "&upholstery=velure";
                            }
                            if($upholstery == "jacquard")
                            {
                                $jacquard = "<li class='active'>";
                                $get_jacquard = "&upholstery=jacquard";
                            }
                            if($upholstery == "microfiber")
                            {
                                $microfiber = "<li class='active'>";
                                $get_microfiber = "&upholstery=microfiber";
                            }
                            if($upholstery == "hopsack")
                            {
                                $hopsack = "<li class='active'>";
                                $get_hopsack = "&upholstery=hopsack";
                            }
                            if($upholstery == "flock")
                            {
                                $flock = "<li class='active'>";
                                $get_flock = "&upholstery=flock";
                            }
                            if($upholstery == "chenille")
                            {
                                $chenille = "<li class='active'>";
                                $get_chenille = "&upholstery=chenille";
                            }

                            if($mechanism == "no")
                            {
                                $no = "<li class='active'>";
                                $get_no = "&mechanism=no";
                            }
                            if($mechanism == "book")
                            {
                                $book = "<li class='active'>";
                                $get_book = "&mechanism=book";
                            }
                            if($mechanism == "eurobook")
                            {
                                $eurobook = "<li class='active'>";
                                $get_eurobook = "&mechanism=eurobook";
                            }
                            if($mechanism == "folding")
                            {
                                $folding = "<li class='active'>";
                                $get_folding = "&mechanism=folding";
                            }
                            if($mechanism == "rolling")
                            {
                                $rolling = "<li class='active'>";
                                $get_rolling = "&mechanism=rolling";
                            }
                            if($mechanism == "dolphin")
                            {
                                $dolphin = "<li class='active'>";
                                $get_dolphin = "&mechanism=dolphin";
                            }
                            if($mechanism == "accordion")
                            {
                                $accordion = "<li class='active'>";
                                $get_accordion = "&mechanism=accordion";
                            }

                            echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                   <span class='searchFilterTitle'>Стиль</span>
                    <ul class='searchFilterOptions'>
                        $straight<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&style=straight".$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>прямой</a></li>
                        $corner<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&style=corner".$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>угловой</a></li>
                    </ul>
                   <span class='searchFilterTitle'>Обивка</span>
                    <ul class='searchFilterOptions'>
                        $natural_leather<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=natural_leather".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>натуральная кожа</a></li>
                        $artificial_leather<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=artificial_leather".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>искусственная кожа</a></li>
                        $velure<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=velure".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>велюр</a></li>
                        $jacquard<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=jacquard".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>жаккард</a></li>
                        $microfiber<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=microfiber".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>микрофибра</a></li>
                        $hopsack<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=hopsack".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>рогожка</a></li>
                        $flock<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=flock".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>флок</a></li>
                        $chenille<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&upholstery=chenille".$get_straight.$get_corner.$get_no.$get_book.$get_eurobook.$get_folding.$get_rolling.$get_dolphin.$get_accordion."'>шениль</a></li>
                    </ul>
                    <span class='searchFilterTitle'>Механизм</span>
                    <ul class='searchFilterOptions'>
                        $no<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=no".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>отсутствует</a></li>
                        $book<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=book".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>книжка</a></li>
                        $eurobook<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=eurobook".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>еврокнижка</a></li>
                        $folding<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=folding".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>раскладушка</a></li>
                        $rolling<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=rolling".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>выкатной</a></li>
                        $dolphin<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=dolphin".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>дельфин</a></li>
                        $accordion<a class='flink' href='goods.php?c=1&cat=soft&subcat=sofas&mechanism=accordion".$get_straight.$get_corner.$get_natural_leather.$get_artificial_leather.$get_velure.$get_jacquard.$get_microfiber.$get_hopsack.$get_flock.$get_chenille."'>аккордеон</a></li>
                    </ul>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                        }
                        else echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";

                    }
                    // living
                    if($cat == "living")
                    {
                        $walls = $halls = $cupboards = $offices = $tables = $chairs = $tallboys = $coffee_tables = $braided = "<li>";

                        if($subcat == "walls")
                        {
                            $walls = "<li class='active'>";
                        }
                        if($subcat == "halls")
                        {
                            $halls = "<li class='active'>";
                        }
                        if($subcat == "cupboards")
                        {
                            $cupboards = "<li class='active'>";
                        }
                        if($subcat == "offices")
                        {
                            $offices = "<li class='active'>";
                        }
                        if($subcat == "tables")
                        {
                            $tables = "<li class='active'>";
                        }
                        if($subcat == "chairs")
                        {
                            $chairs = "<li class='active'>";
                        }
                        if($subcat == "tallboys")
                        {
                            $tallboys = "<li class='active'>";
                        }
                        if($subcat == "coffee_tables")
                        {
                            $coffee_tables = "<li class='active'>";
                        }
                        if($subcat == "braided")
                        {
                            $braided = "<li class='active'>";
                        }

                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>";
                    if($recordsKitchen > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                        if($recordsSoft > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                    echo "<li class='active'><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                    if($recordsBedrooms > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                    if($recordsChildren > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                    if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                    if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";
                    echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";
                        if($livingWalls > 0) echo $walls."<a class='flink' href='goods.php?c=1&cat=living&subcat=walls'>Гостиные, витрины</a> <small class='gray'>$livingWalls</small></li>";
                        if($livingHalls > 0) echo $halls."<a class='flink' href='goods.php?c=1&cat=living&subcat=halls'>Прихожие</a> <small class='gray'>$livingHalls</small></li>";
                        if($livingCupboards > 0) echo $cupboards."<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards'>Шкафы, шкафы-купе</a> <small class='gray'>$livingCupboards</small></li>";
                        if($livingOffices > 0) echo $offices."<a class='flink' href='goods.php?c=1&cat=living&subcat=offices'>Домашние кабинеты</a> <small class='gray'>$livingOffices</small></li>";
                        if($livingTables > 0) echo $tables."<a class='flink' href='goods.php?c=1&cat=living&subcat=tables'>Столы</a> <small class='gray'>$livingTables</small></li>";
                        if($livingChairs > 0) echo $chairs."<a class='flink' href='goods.php?c=1&cat=living&subcat=chairs'>Стулья</a> <small class='gray'>$livingChairs</small></li>";
                        if($livingTallboys > 0) echo $tallboys."<a class='flink' href='goods.php?c=1&cat=living&subcat=tallboys'>Тумбы, комоды, подставки</a> <small class='gray'>$livingTallboys</small></li>";
                        if($livingCoffee_tables > 0) echo $coffee_tables."<a class='flink' href='goods.php?c=1&cat=living&subcat=coffee_tables'>Журнальные столики</a> <small class='gray'>$livingCoffee_tables</small></li>";
                        if($livingBraided > 0) echo $braided."<a class='flink' href='goods.php?c=1&cat=living&subcat=braided'>Плетеная мебель</a> <small class='gray'>$livingBraided</small></li>";

                        if($subcat == "cupboards")
                        {
                            $coupe = $opening = $no_door = $wood_veneer = $mirror = $glass = $rattan = $bamboo = $photo_printing = $leather_fur = "<li>";
                            $get_coupe = $get_opening = $get_no_door = $get_wood_veneer = $get_mirror = $get_glass = $get_rattan = $get_bamboo = $get_photo_printing = $get_leather_fur = "";

                            if($type == "coupe")
                            {
                                $coupe = "<li class='active'>";
                                $get_coupe = "&type=coupe";
                            }
                            if($type == "opening")
                            {
                                $opening = "<li class='active'>";
                                $get_opening = "&type=opening";
                            }
                            if($type == "no_door")
                            {
                                $no_door = "<li class='active'>";
                                $get_no_door = "&type=no_door";
                            }
                            if($facade == "wood_veneer")
                            {
                                $wood_veneer = "<li class='active'>";
                                $get_wood_veneer = "&facade=wood_veneer";
                            }
                            if($facade == "mirror")
                            {
                                $mirror = "<li class='active'>";
                                $get_mirror = "&facade=mirror";
                            }
                            if($facade == "glass")
                            {
                                $glass = "<li class='active'>";
                                $get_glass = "&facade=glass";
                            }
                            if($facade == "rattan")
                            {
                                $rattan = "<li class='active'>";
                                $get_rattan = "&facade=rattan";
                            }
                            if($facade == "bamboo")
                            {
                                $bamboo = "<li class='active'>";
                                $get_bamboo = "&facade=bamboo";
                            }
                            if($facade == "photo_printing")
                            {
                                $photo_printing = "<li class='active'>";
                                $get_photo_printing = "&facade=photo_printing";
                            }
                            if($facade == "leather_fur")
                            {
                                $leather_fur = "<li class='active'>";
                                $get_leather_fur = "&facade=leather_fur";
                            }
                            echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                   <span class='searchFilterTitle'>Тип шкафа</span>
                    <ul class='searchFilterOptions'>
                        $coupe<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&type=coupe".$get_wood_veneer.$get_mirror.$get_glass.$get_rattan.$get_bamboo.$get_photo_printing.$get_leather_fur."'>шкаф-купе</a></li>
                        $opening<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&type=opening".$get_wood_veneer.$get_mirror.$get_glass.$get_rattan.$get_bamboo.$get_photo_printing.$get_leather_fur."'>распашной шкаф</a></li>
                        $no_door<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&type=no_door".$get_wood_veneer.$get_mirror.$get_glass.$get_rattan.$get_bamboo.$get_photo_printing.$get_leather_fur."'>шкаф без дверей</a></li>
                    </ul>
                   <span class='searchFilterTitle'>Фасад</span>
                    <ul class='searchFilterOptions'>
                        $wood_veneer<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=wood_veneer".$get_coupe.$get_opening.$get_no_door."'>древесный шпон</a></li>
                        $mirror<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=mirror".$get_coupe.$get_opening.$get_no_door."'>зеркало</a></li>
                        $glass<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=glass".$get_coupe.$get_opening.$get_no_door."'>стекло</a></li>
                        $rattan<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=rattan".$get_coupe.$get_opening.$get_no_door."'>ротанг</a></li>
                        $bamboo<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=bamboo".$get_coupe.$get_opening.$get_no_door."'>бамбук</a></li>
                        $photo_printing<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=photo_printing".$get_coupe.$get_opening.$get_no_door."'>фотопечать, плёнки</a></li>
                        $leather_fur<a class='flink' href='goods.php?c=1&cat=living&subcat=cupboards&facade=leather_fur".$get_coupe.$get_opening.$get_no_door."'>кожа, мех</a></li>
                    </ul>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";
                        }
                        else echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";

                    }

                    // bedrooms

                    if($cat == "bedrooms")
                    {
                        $beds = $sets = $mattresses = $mattresses_pad = $foundation = $blanket = $pillow = $shawl = "<li>";

                        if($subcat == "beds")
                        {
                            $beds = "<li class='active'>";
                        }
                        if($subcat == "sets")
                        {
                            $sets = "<li class='active'>";
                        }
                        if($subcat == "mattresses")
                        {
                            $mattresses = "<li class='active'>";
                        }
                        if($subcat == "mattresses_pad")
                        {
                            $mattresses_pad = "<li class='active'>";
                        }
                        if($subcat == "foundation")
                        {
                            $foundation = "<li class='active'>";
                        }
                        if($subcat == "blanket")
                        {
                            $blanket = "<li class='active'>";
                        }
                        if($subcat == "pillow")
                        {
                            $pillow = "<li class='active'>";
                        }
                        if($subcat == "shawl")
                        {
                            $shawl = "<li class='active'>";
                        }

                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>";
                        if($recordsKitchen > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                        if($recordsSoft > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                        if($recordsLiving > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                        echo "<li class='active'><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                        if($recordsChildren > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                        if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                        if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";
                        echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";
                        if($bedroomsBeds > 0) echo $beds."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=beds'>Кровати</a> <small class='gray'>$bedroomsBeds</small></li>";
                        if($bedroomsSets > 0) echo $sets."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=sets'>Гарнитуры</a> <small class='gray'>$bedroomsSets</small></li>";
                        if($bedroomsMattresses > 0) echo $mattresses."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=mattresses'>Матрацы</a> <small class='gray'>$bedroomsMattresses</small></li>";
                        if($bedroomsMattresses_pad > 0) echo $mattresses_pad."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=mattresses_pad'>Наматрасники</a> <small class='gray'>$bedroomsMattresses_pad</small></li>";
                        if($bedroomsFoundation > 0) echo $foundation."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=foundation'>Основания для кроватей</a> <small class='gray'>$bedroomsFoundation</small></li>";
                        if($bedroomsBlanket > 0) echo $blanket."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=blanket'>Одеяла</a> <small class='gray'>$bedroomsBlanket</small></li>";
                        if($bedroomsPillow > 0) echo $pillow."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=pillow'>Подушки</a> <small class='gray'>$bedroomsPillow</small></li>";
                        if($bedroomsShawl > 0) echo $shawl."<a class='flink' href='goods.php?c=1&cat=bedrooms&subcat=shawl'>Покрывала</a> <small class='gray'>$bedroomsShawl</small></li>";
                    echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";

                    }

                    // children

                    if($cat == "children")
                    {
                        $sets = $modules = $maneges = $soft = $beds = $two_tier = $tables = $comp_tables = $wardrobe = "<li>";

                        if($subcat == "sets")
                        {
                            $sets = "<li class='active'>";
                        }
                        if($subcat == "modules")
                        {
                            $modules = "<li class='active'>";
                        }
                        if($subcat == "maneges")
                        {
                            $maneges = "<li class='active'>";
                        }
                        if($subcat == "soft")
                        {
                            $soft = "<li class='active'>";
                        }
                        if($subcat == "beds")
                        {
                            $beds = "<li class='active'>";
                        }
                        if($subcat == "two_tier")
                        {
                            $two_tier = "<li class='active'>";
                        }
                        if($subcat == "tables")
                        {
                            $tables = "<li class='active'>";
                        }
                        if($subcat == "comp_tables")
                        {
                            $comp_tables = "<li class='active'>";
                        }
                        if($subcat == "wardrobe")
                        {
                            $wardrobe = "<li class='active'>";
                        }


                        echo "<div class='searchFilterRow1'>
                    <span class='searchFilterTitle'>Я ищу мебель</span>
                    <ul class='searchFilterOptions'>";
                        if($recordsKitchen > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=kitchen'>Кухня</a> <small class='gray'>$recordsKitchen</small></li>";
                        if($recordsSoft > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=soft'>Мягкая мебель</a> <small class='gray'>$recordsSoft</small></li>";
                        if($recordsLiving > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=living'>Жилая мебель</a> <small class='gray'>$recordsLiving</small></li>";
                        if($recordsBedrooms > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bedrooms'>Спальня</a> <small class='gray'>$recordsBedrooms</small></li>";
                                                 echo "<li class='active'><a class='flink' href='goods.php?c=1&cat=children'>Детская мебель</a> <small class='gray'>$recordsChildren</small></li>";
                        if($recordsBathroom > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=bathroom'>Ванная и туалет</a> <small class='gray'>$recordsBathroom</small></li>";
                        if($recordsGarden > 0) echo "<li><a class='flink' href='goods.php?c=1&cat=garden'>Сад и дача</a> <small class='gray'>$recordsGarden</small></li>";
                        echo "</ul>
                </div>

                <div class='searchFilterRow2'>
                    <span class='searchFilterTitle'>&nbsp;</span>
                    <ul class='searchFilterOptions'>";
                        if($childrenSets > 0) echo $sets."<a class='flink' href='goods.php?c=1&cat=children&subcat=sets'>Гарнитуры</a> <small class='gray'>$childrenSets</small></li>";
                        if($childrenModules > 0) echo $modules."<a class='flink' href='goods.php?c=1&cat=children&subcat=modules'>Комбинированные модули</a> <small class='gray'>$childrenModules</small></li>";
                        if($childrenManeges > 0) echo $maneges."<a class='flink' href='goods.php?c=1&cat=children&subcat=maneges'>Манежы, манежные комнаты</a> <small class='gray'>$childrenManeges</small></li>";
                        if($childrenSoft > 0) echo $soft."<a class='flink' href='goods.php?c=1&cat=children&subcat=soft'>Мягкая мебель</a> <small class='gray'>$childrenSoft</small></li>";
                        if($childrenBeds > 0) echo $beds."<a class='flink' href='goods.php?c=1&cat=children&subcat=beds'>Кровати, комоды</a> <small class='gray'>$childrenBeds</small></li>";
                        if($childrenTwo_tier > 0) echo $two_tier."<a class='flink' href='goods.php?c=1&cat=children&subcat=two_tier'>Двухярусные кровати</a> <small class='gray'>$childrenTwo_tier</small></li>";
                        if($childrenTables > 0) echo $tables."<a class='flink' href='goods.php?c=1&cat=children&subcat=tables'>Столы, стулья</a> <small class='gray'>$childrenTables</small></li>";
                        if($childrenComp_tables > 0) echo $comp_tables."<a class='flink' href='goods.php?c=1&cat=children&subcat=comp_tables'>Компьютерные столы</a> <small class='gray'>$childrenComp_tables</small></li>";
                        if($childrenWardrobe > 0) echo $wardrobe."<a class='flink' href='goods.php?c=1&cat=children&subcat=wardrobe'>Шкафы</a> <small class='gray'>$childrenWardrobe</small></li>";
                    echo "</ul>
                </div>
                <div class='searchFilterRow3'>
                    <span class='searchFilterTitle'>Цена</span>
                    <div class='searchFilterOptions'>
                        <label style='margin-left:10px'>от <input name='a[tagData][price][l]' type='text' value='' id='a_tagData_price_l' size='10' class='onlyNums' /></label><label>до<input name='a[tagData][price][h]' type='text' value='' id='a_tagData_price_h' size='10' class='onlyNums' /> тг.</label><input class='button' type='submit' value='Найти' />
                    </div>
                </div>";

                    }

                    }
                    /////////////////////////////////////////////////////////////////////////
                    if($c == "2")
                    {

                    }
                    ?>
                </form>
            </div>
            <!-- end верстка формы поиска-->
            <div id="salonMebel" style="border: none; padding: 0">
                <h3>Найдено <?=$total_records?> товаров</h3>
                <br class="clear"/>
                <? while($adv = mysql_fetch_object($advsQ)) { ?>
                    <div class="tableGood">
                        <small class="gray listDate">26 марта</small><br/>
                        <a href="../content/show.php?type=goods&id=<?=$adv->id?>" class="imgCont noBorder"><img src="../content/uploads/<?=$adv->id?>_0_180.jpg" alt="Мягкая мебель" title="Мягкая мебель | Mebel.kz" /></a>
                        <p>&nbsp;</p>
                        <strong class="price" style="margin-right: 10px"><nobr>от&nbsp;<?=$adv->price." ".$adv->pricecurrency?>.</nobr></strong><span class="gray"><nobr></nobr></span><br/><a href="../content/show.php?type=goods&id=<?=$adv->id?>" class="link"><?=$adv->title?></a><br/><small class="gray"><?=$adv->user_salonname?></small>
                    </div>
                <? } ?>
                <div class="toCenter">
                    <p class="pages">
                        <?
                        if($total_pages > 0)
                        {
                            echo "<strong>Страницы:</strong>";
                        }
                        if($page > 1)
                        {
                            $minus = $page - 1;
                            echo "<a href='href='$current_uri&page=$minus' class='nn'>&nbsp;Предыдущая</a>";
                        }
                        $start = floor($page / 10)*10 + 1;
                        $end = $start + 10;
                        if($end > $total_pages)
                        {
                            $end = $total_pages;
                        }

                        for ($x = $start; $x < $end + 1; $x++) {
                            if($x == $page)
                            {
                                echo "<span id='cPage'><strong>$x</strong></span>";
                            }
                            else echo "<span><a href='$current_uri&page=$x'>$x</a></span>";
                        }

                        if($page < $total_pages)
                        {
                            $plus = $page + 1;
                            echo "<a href='href='$current_uri&page=$plus' class='nn'>&nbsp;Следующая</a>";
                        }
                        ?>
                    </p>
                </div>
            </div>

            <div id="salonAddresses">
                <h2 class="toCenter">Адреса и телефоны</h2>
                <div id="addressesWithMap">
                    <div style="line-height: 26px">Эл. почта: <a itemprop="email" href="mailto:<?=$user_obj->user_login?>"><?=$user_obj->user_login?></a>
                    </div>
                    <div id="writeUsBlock"><button class="writeUs button">Задать вопрос</button></div>
                    <div class="salonAddress"><span class="salonAddr hasMap" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" ><span itemprop="streetAddress"><?=$user_obj->user_address?></span></span><span><span itemprop="telephone" class="phone"><nobr><?if($user_obj->user_phone != "") echo $user_obj->user_phone;?></nobr></span itemprop="telephone">,<br/><span itemprop="telephone" class="phone"><nobr><?if($user_obj->user_phone2 != "") echo $user_obj->user_phone2;?></nobr></span itemprop="telephone">, <br/><span itemprop="telephone" class="phone"><nobr><?if($user_obj->user_phone3 != "") echo $user_obj->user_phone3;?></nobr></span itemprop="telephone"></span></div>
                </div>
                <div id="salonMap"></div>
            </div>
            <script>
                ymaps.ready(init);

                function init ()
                {
                    var myMap = new ymaps.Map("salonMap", {
                            center: [43.28035056569584, 76.96651708465653],
                            zoom: 15,
                            controls: ['zoomControl', 'fullscreenControl']
                        }),

                    // Создаем геообъект с типом геометрии "Точка".
                        myGeoObject = new ymaps.GeoObject({
                                // Описание геометрии.
                                geometry: {
                                    type: "Point",
                                    coordinates: [43.28035056569584, 76.96651708465653]
                                },
                                // Свойства.
                                properties: {
                                    // Контент метки.
                                    balloonContent: 'ул. Станиславского, 43 (быв. меховой комбинат)'
                                }
                            },
                            {
                                // Опции.
                                // Иконка метки будет растягиваться под размер ее содержимого.
                                preset: 'islands#icon',
                                iconColor: '#B25790'
                            });myMap.geoObjects.add(myGeoObject);        myMap.behaviors.disable('scrollZoom');
                }

                $(document).ready(function() {

                    $("#fader").click(function(e) {
                        var targetId = $(e.target).attr('id');
                        if(targetId === 'fader')
                        {
                            $("#fader").html(null);
                            $("#fader").hide();
                        }
                    });

                    $(".writeUs").click(function()
                    {
                        $.get(
                            '/salon/writeus-form',
                            {salonId: '2862'},
                            function(data)
                            {
                                $("#fader").html(data);
                                $("#fader").show();
                            },
                            'html'
                        );
                    });
                });
            </script>    </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".writeUs").click(function()
            {
                $.get(
                    '/salon/writeus-form',
                    {salonId: '2862'},
                    function(data)
                    {
                        $("#fader").html(data);
                        $("#fader").show();
                    },
                    'html'
                );
            });

            if($("#salonAbout").height() > '120')
            {
                var isOpen = false;

                $("#aboutContent").height(120);
                $("#aboutContent").after($('<div class="aboutFader" id="aboutFader"><a href="#" class="flink" id="aboutToggle">Развернуть описание</a></div>'));

                $("#aboutToggle").click(
                    function()
                    {
                        if(isOpen === false)
                        {
                            $("#aboutContent").height('auto');
                            $("#aboutFader").removeClass("aboutFader");
                            $(this).text("Свернуть описание");
                            isOpen = true;
                        }
                        else
                        {
                            $("#aboutContent").height(120);
                            $("#aboutFader").addClass("aboutFader");
                            $(this).text("Развернуть описание");
                            isOpen = false;
                        }

                        return false;

                    }
                );
            }

            $('#searchFilter').find('select').each(function()
            {
                var select = $(this);
                var ul = $('<ul id="' + select.attr('name') + '" data-id="' + select.attr('id') + '" />');

                $(this).children('option').each(function()
                {
                    if($(this).text() != '')
                    {
                        var a = $('<a/>');
                        a.attr({
                            'class' : 'flink',
                            'data-val' : $(this).val(),
                            "href": "#" + $(this).val()
                        });
                        a.html($(this).html());

                        var li = $('<li/>');

                        if($(this).attr("selected") == "selected")
                        {
                            li.addClass("active");
                        }

                        li.append(a);
                        ul.append(li);
                    }
                });

                select.after(ul);
                select.hide();
            });

            $('.onlyNums').on('keyup', function(){
                if (this.value.match(/[^0-9]/g)) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                }
            });
        });
    </script>
    <table id="footer">
        <tr>
            <td>
                &copy; 2007&mdash;2015 Mebel.kz
                <br/>
                <small class="gray" id="copy">
                    Любое копирование материалов разрешено при&nbsp;наличии ссылки на&nbsp;сайт mebel.kz
                </small>
            </td>
            <td class="tall">
                <img src="../content/assets/images/sofa.png" alt="" title="" /><br/>
                <a href="../content/money.php">Уголок рекламодателя</a><br/>
                <a href="../content/rules.php">Правила подачи объявлений</a>
            </td>
            <td class="tall">
                <a href="../content/write.php" rel="nofollow">Написать нам</a><br/>
                <a href="../content/registerSalon.php" rel="nofollow">Добавить салон</a><br/>
            </td><td class="tall">
            </td>
            <td class="tall counters">
                <!--Openstat-->
                <span id="openstat2316451"></span>
                <script type="text/javascript">
                    var openstat = { counter: 2316451, image: 5081, color: "c3c3c3", next: openstat };
                    (function(d, t, p) {
                        var j = d.createElement(t); j.async = true; j.type = "text/javascript";
                        j.src = ("https:" == p ? "https:" : "http:") + "//openstat.net/cnt.js";
                        var s = d.getElementsByTagName(t)[0]; s.parentNode.insertBefore(j, s);
                    })(document, "script", document.location.protocol);
                </script>
                <!--/Openstat-->
                <br/>

                <!-- ZERO.kz -->
                        <span id="_zero_55306">
                        <noscript>
                            <a href="http://zero.kz/?s=55306" target="_blank">
                                <img src="http://c.zero.kz/z.png?u=55306" width="88" height="31" alt="ZERO.kz" />
                            </a>
                        </noscript>
                        </span>

                <script type="text/javascript"><!--
                    var _zero_kz_ = _zero_kz_ || [];
                    _zero_kz_.push(["id", 55306]);
                    _zero_kz_.push(["type", 1]);

                    (function () {
                        var a = document.getElementsByTagName("script")[0],
                            s = document.createElement("script");
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = (document.location.protocol == "https:" ? "https:" : "http:")
                        + "//c.zero.kz/z.js";
                        a.parentNode.insertBefore(s, a);
                    })(); //-->
                </script>
                <!-- End ZERO.kz -->

                <!-- <a href="">Статистика по&nbsp;версии Гугл Аналитикс</a>-->
                <script type="text/javascript">
                    var _gaq = _gaq || [];
                    _gaq.push(['_setAccount', 'UA-28280673-1']);
                    _gaq.push(['_trackPageview']);
                    (function() {
                        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                    })();
                </script>

                <br/>

                <!-- Yandex.Metrika informer -->
                <a href="https://metrika.yandex.ru/stat/?id=28434501&amp;from=informer"
                   target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/28434501/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
                                                       style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:28434501,lang:'ru'});return false}catch(e){}"/></a>
                <!-- /Yandex.Metrika informer -->

            </td>
        </tr>
    </table>
</div>
<div id="fader" style="display: none">
    &nbsp;
</div>
<script type="text/javascript">
    $(document).ready(function(){
        if(window.navigator.appVersion.match(/Chrome/)) {
            jQuery('object').each(function() {
                jQuery(this).css('display', 'inline-block');
            });
        }
    });
</script>
<!-- 1.2500960826874 -->
</body>
</html>