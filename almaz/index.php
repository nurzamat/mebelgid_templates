<?php
include_once '../content/header.php';
/*  getting the name of directory

getcwd();
or
dirname(__FILE__);
or (PHP5)
basename(__DIR__)
or
$parent = basename(dirname($_SERVER['PHP_SELF']));
*/

$parent = basename(__DIR__);

$queryAds = "SELECT a.ID as id, a.title, a.catalog, a.cat, a.subcat, a.text, a.name, a.city, a.email, a.phone1, a.phone2, a.style,
a.carcase, a.facade, a.tabletop, a.priceIs, a.price, a.pricecurrency, a.pricefor, a.color, a.material, a.manufacturer,
a.length, a.height, a.width, a.shipment, a.feature, a.createddate, a.status, a.statusChangeDate, a.type, a.upholstery,
a.mechanism, a.foundation, a.enablecomments, a.idUser, u.user_login, u.user_pass, u.user_nicename, u.user_email, u.user_phone,
u.user_registered, u.user_city, u.user_status, u.user_salonname, u.user_salondomen, u.user_salonstatus FROM advertisements AS a LEFT JOIN users as u ON a.idUser = u.ID WHERE u.user_salondomen = '$parent'";

$query1 = $queryAds." AND a.catalog='1'";
$query2 = $queryAds." AND a.catalog='2'";
$query3 = $queryAds." AND a.catalog='3'";
$query4 = $queryAds." AND a.catalog='4'";
$query5 = $queryAds." AND a.catalog='5'";

$records1 = mysql_num_rows(queryMysql($query1));
$records2 = mysql_num_rows(queryMysql($query2));
$records3 = mysql_num_rows(queryMysql($query3));
$records4 = mysql_num_rows(queryMysql($query4));
$records5 = mysql_num_rows(queryMysql($query5));

//paging
$num_rec_per_page = 25;
$advsQ = queryMysql($queryAds);
$total_records = mysql_num_rows($advsQ);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page);

$current_uri = $_SERVER['REQUEST_URI'];
$qc = count(explode("?", $current_uri));
if($qc == 0 || $qc == 1)
{
    $current_uri = $current_uri."?c=0";
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
$queryAds = $queryAds." LIMIT  $start_from, $num_rec_per_page";
$advsQ = queryMysql($queryAds);
//end of paging

//user query
$queryU = "SELECT * FROM users WHERE user_salondomen='$parent'";
$user_obj = mysql_fetch_object(queryMysql($queryU));

//salons query
$queryS = "SELECT * FROM users WHERE user_status='2' AND user_city='$user_obj->user_city'";
$salon_records = mysql_num_rows(queryMysql($queryS));

//news query
$queryN = "SELECT * FROM news WHERE idUser='$user_obj->ID'";
$newsQ = queryMysql($queryN);
$news_obj = mysql_fetch_object($newsQ);

$salon_city = getCityValue($user_obj->user_city);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title><?=$user_obj->user_salonname?> в <?=$user_obj->user_city."е"?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--<meta name="description" content="Мебель для вас — мебельный салон в Алматы. 100 объявлений: мебель для дома, мебель для офиса, услуги, разное" />
    <meta name="keywords" content="Мебель для вас, мебельный салон, Алматы" />-->
    <link href="../content/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/content/images/app-touch-icon.png" rel="apple-touch-icon-precomposed" />
    <link href="../content/assets/css/undohtml.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/print.css?t=1346827624" media="print" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/styles.css?t=1417593679" media="screen" rel="stylesheet" type="text/css" />
    <link href="../content/assets/css/fotorama.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="http://almaz.mebelgid.kg" rel="canonical" />
    <script type="text/javascript" src="../content/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../content/assets/js/fotorama.js"></script>
    <script type="text/javascript" src="../content/assets/js/navigate.js"></script>
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

    <div class="salonContent" itemscope itemtype="http://schema.org/FurnitureStore">
        <div class="bread gray">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/index.php?city=<?=$salon_city?>" title="Главная"><span itemprop="title">Главная</span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/salons.php?city=<?=$salon_city?>" title="Мебельные салоны в <?=$user_obj->user_city."е"?>"><span itemprop="title">Мебельные салоны в <?=$user_obj->user_city."е"?></span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?=$user_obj->user_salonname?></span></span>
        </div>
        <div class="toCenter">
            <img src="../content/uploads/<?=$user_obj->user_login?>_150.jpg" align="absmiddle" style="margin: 0 0 1em 0"  itemprop="logo" alt="<?=$user_obj->user_salonname?>" title="<?=$user_obj->user_salonname?> | MebelGid.kg"/><h1 itemprop="name"><?=$user_obj->user_salonname?></h1>
        </div>
        <div class="toCenter">
            <ul id="salonMainMenu">
                <li class="current">Салон</li>
                <li><a href="goods.php">Товары</a></li>
                <li><a href="news.php">Новости</a></li>
            </ul>
        </div>
        <div class="fotorama salonPhotos" data-fit="cover" data-width="100%" data-height="420" data-nav="thumbs" data-thumbheight="60" data-thumbwidth="85" data-hash="true">
            <img src="../content/slides/slide1.jpeg" title="изображение 2 | MebelGid.kg" alt="изображение 2" itemprop="photo"/>
            <img src="../content/slides/slide2.jpeg" title="изображение 3 | MebelGid.kg" alt="изображение 3" itemprop="photo"/>
            <img src="../content/slides/slide3.jpeg" title="изображение 4 | MebelGid.kg" alt="изображение 4" itemprop="photo"/>
            <img src="../content/slides/slide4.jpg" title="изображение 5 | MebelGid.kg" alt="изображение 5" itemprop="photo"/>
        </div>
        <div id="salonAboutBlock">
            <div id="salonAbout">
                <h3>О салоне</h3>
                <div id="aboutContent" itemprop="description">
                 <?=$user_obj->user_saloninfo?>
                </div>
            </div>
            <div id="salonNews">
                <h3><a href="news.php" class="blackLink">Новости</a></h3>
                <?if($news_obj != null){?>
                <strong><a href="show.php?id=<?=$news_obj->ID?>"><?=$news_obj->title?></a></strong><br/>
                <p><?=$news_obj->text?></p>
                <small class="gray"><?=$news_obj->createddate?></small>
                <?}?>
            </div>

            <div id="salonPhones">
                <h3>Телефоны</h3>
                <span class="phone"><nobr><?if($user_obj->user_phone != "") echo $user_obj->user_phone;?></nobr></span>, <br/><span class="phone"><nobr><?if($user_obj->user_phone2 != "") echo $user_obj->user_phone2;?></nobr></span>, <br/><span class="phone"><nobr><?if($user_obj->user_phone3 != "") echo $user_obj->user_phone3;?></nobr></span>
                <br/>
                <a href="#salonMap">Адреса на карте</a> <img src="../content/assets/images/map-pointer.gif" align="absmiddle" /></div>

            <div id="writeUsBtn">
                <button class="writeUs button">Задать вопрос</button>
                <br/><br/>
                <a href="#salonGraph" class="flink blackFlink small" style="color:#999 !important" onclick="showGraph(this);" rel="nofollow">Люди интересовались этим салоном <nobr>5 289 раз</nobr>.</a>

                <div class="wannaMore" style="display: none;">
                    <div id="salonGraph" style="margin: 135px auto;" class="table">
                        <div class="salonGraph"><div class="numViewInG"><strong>163</strong><br/>за неделю</div><div class="numViewInG"><strong>806</strong><br/>за месяц</div><div class="numViewInG"><strong>5 289</strong><br/>все время</div><div class="salonGraph-bar" style="right: 448px; height: 40px; bottom: 20px"><span class="salonGraph-bar-value">29</span></div><div class="salonGraph-bar" style="right: 416px; height: 40px; bottom: 20px"><span class="salonGraph-bar-value">29</span></div><div class="salonGraph-bar" style="right: 384px; height: 22px; bottom: 20px"><span class="salonGraph-bar-value">16</span></div><div class="salonGraph-bar" style="right: 352px; height: 40px; bottom: 20px"><span class="salonGraph-bar-value">29</span></div><div class="salonGraph-bar" style="right: 320px; height: 50px; bottom: 20px"><span class="salonGraph-bar-value">36</span></div><div class="salonGraph-bar" style="right: 288px; height: 40px; bottom: 20px"><span class="salonGraph-bar-value">29</span></div><div class="salonGraph-bar" style="right: 256px; height: 33px; bottom: 20px"><span class="salonGraph-bar-value">24</span></div><div class="salonGraph-bar" style="right: 224px; height: 57px; bottom: 20px"><span class="salonGraph-bar-value">41</span></div><div class="salonGraph-bar" style="right: 192px; height: 61px; bottom: 20px"><span class="salonGraph-bar-value">44</span></div><div class="salonGraph-bar" style="right: 160px; height: 37px; bottom: 20px"><span class="salonGraph-bar-value">27</span></div><div class="salonGraph-bar" style="right: 128px; height: 11px; bottom: 20px"><span class="salonGraph-bar-value">8</span></div><div class="salonGraph-bar" style="right: 96px; height: 32px; bottom: 20px"><span class="salonGraph-bar-value">23</span></div><div class="salonGraph-bar" style="right: 64px; height: 27px; bottom: 20px"><span class="salonGraph-bar-value">19</span></div><div class="salonGraph-bar" style="right: 32px; height: 46px; bottom: 20px"><span class="salonGraph-bar-value">33</span></div><div class="salonGraph-bar" style="right: 0px; height: 13px; bottom: 20px"><span class="salonGraph-bar-value">9</span></div><div class="salonGraph-tick" style="right: 448px">26.03</div><div class="salonGraph-tick" style="right: 416px">27</div><div class="salonGraph-tick" style="right: 384px">28</div><div class="salonGraph-tick" style="right: 352px">29</div><div class="salonGraph-tick" style="right: 320px">30</div><div class="salonGraph-tick" style="right: 288px">31</div><div class="salonGraph-tick" style="right: 256px">01.04</div><div class="salonGraph-tick" style="right: 224px">02</div><div class="salonGraph-tick" style="right: 192px">03</div><div class="salonGraph-tick" style="right: 160px">04</div><div class="salonGraph-tick" style="right: 128px">05</div><div class="salonGraph-tick" style="right: 96px">06</div><div class="salonGraph-tick" style="right: 64px">07</div><div class="salonGraph-tick" style="right: 32px">08</div><div class="salonGraph-tick" style="right: 0px">09</div><a href="" id="prevLink" class="flink smaller"><span>←</span> Предыдущие две недели</a><script type="text/javascript">
                                $("#prevLink").click(function()
                                {
                                    $(".salonGraph").html("<img src=\"../content/assets/images/loading.gif\" style=\"position: absolute; top: 55px; left: 245px\" />");
                                    $.get("/ajax/salonGraph/", {id: 2862, start: "2015-03-12"}, function(data) { $(".salonGraph").replaceWith(data); });
                                    return false;
                                });
                            </script></div><a href="#" class="flink" id="wannaMoreLink">Хотите больше просмотров?</a>    </div>
                </div>
                <div style="display: none; font-size: .9em" class="table orderForm">
                    <h2>Хотите больше просмотров?</h2>

                    <div id="toMain" class="toMain">
                        <div class="flinks"><span class="current">Поднять</span>&nbsp;&nbsp;или&nbsp;&nbsp;<a href="#" class="flink toClr" id="toClr">Покрасить</a></div>

                        <p>
                            Ваш салон поднимется в списке на странице салонов и будет уступать место только тем салонам, что были помещены в список после него.
                            Отправьте смс-сообщение на номер 7208 с текстом (все буквы латинские):
                        </p>
                        <div style="text-align: center"><strong>Ok ms 2862</strong><img align="absmiddle" src="../content/assets/images/sms.png">&nbsp;&nbsp;&nbsp;<strong>7208</strong></div>
                        <p>
                            Стоимость услуги 260 тенге.
                        </p>
                    </div>

                    <div id="toColor" class="toColor" style="display: none">
                        <div class="flinks"><a href="#" class="flink toMn" id="toMn">На главную</a>&nbsp;&nbsp;или&nbsp;&nbsp;<span class="current">Покрасить</span></div>

                        <p>
                            Ваш салон получит цветной фон на 30 дней при отображении в списке.
                            Отправьте одно из смс-сообщений на номер 7105 с текстом (все буквы латинские):
                        </p>
                        <table id="smsColor">

                            <tr>
                                <td></td>
                                <td><strong style="color: #fe4343">Ok rs 2862</strong></td>
                                <td rowspan="5" style="vertical-align: middle"><img src="../content/assets/images/sms-common.png" align="middle" />&nbsp;<strong>7105</strong></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><strong style="color: #db8914">Ok ys 2862</strong></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><strong style="color: #41addb">Ok bs 2862</strong></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><strong style="color: #84a92a">Ok gs 2862</strong></td>
                            </tr>

                        </table>
                        <p>
                            Стоимость услуги 100 тенге.
                        </p>
                    </div>

                    <small class="gray" id="disclaimer">
                        <p>В ответном СМС-сообщении абоненты Beeline, Kсell, Activ, Tele2, ДОС, Vegaline получат возможность скачать java-книгу с полезными советами, абоненты CDMA — ссылку для скачивания обоев.</p>
                        Услуги доступны для всех казахстанских операторов. Отправляя СМС на номера 7104, 7105, и 7109 вы соглашаетесь с <a href="" class="gray">условиями предоставления услуг</a>.
                    </small>
                    <a href="" class="noBorder closeOrderForm">&times;</a>
                </div>

                <script type="text/javascript">
                    function showGraph(link)
                    {
                        $("#fader").show();

                        graph = $(".wannaMore").clone();
                        $("#fader").html(graph.show());

                        return false;
                    }

                    $(document).ready(function()
                    {
                        $("div").on("click", "#wannaMoreLink", function()
                        {
//                $("#fader").show();
                            form = $(".orderForm").clone();
                            $("#fader").html(form.show());
                            return false;
                        });

                        $("div").on("click", ".closeOrderForm", function()
                        {
                            $("#fader").hide();
                            return false;
                        });

                        $("div").on("click", ".toClr", function() {

                            $(".toColor").show();
                            $(".toMain").hide();

                            return false;
                        });

                        $("div").on("click", ".toMn", function() {

                            $(".toMain").show();
                            $(".toColor").hide();

                            return false;
                        });

                    });
                </script>        </div>
        </div>

        <div id="salonMebel">
            <div class="toCenter">
                <h2><a href="goods.php" class="blackLink">Мебель</a></h2> <small class="gray"><?=$total_records?></small>
            </div>

            <table cellpadding="0" cellspacing="0" id="inSalon">
                <tr>
                    <td>
                        <ul>
                            <?
                            if($records1 > 0) echo "<li><a href='goods.php?c=1'>Мебель для дома</a> <small class='gray'>$records1</small></li>";
                            if($records2 > 0) echo "<li><a href='goods.php?c=2'>Всё для интерьера</a> <small class='gray'>$records2</small></li>";
                            if($records3 > 0) echo "<li><a href='goods.php?c=3'>Мебель для офиса</a> <small class='gray'>$records3</small></li>";
                            if($records4 > 0) echo "<li><a href='goods.php?c=4'>Услуги</a> <small class='gray'>$records4</small></li>";
                            if($records5 > 0) echo "<li><a href='goods.php?c=5'>Профильная для бизнеса</a> <small class='gray'>$records5</small></li>";
                            ?>
                        </ul>
                    </td>
                </tr>
            </table>
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
        </script></div>


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
        });
    </script>
    <table id="footer">
        <tr>
            <td>
                &copy; 2015 MebelGid.kg
                <br/>
                <small class="gray" id="copy">

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
<!-- 0.5946249961853 -->
</body>
</html>