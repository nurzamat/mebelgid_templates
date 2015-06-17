<?php
include_once '../content/header.php';

$parent = basename(__DIR__);

//user query
$queryU = "SELECT * FROM users WHERE user_salondomen='$parent'";
$user_obj = mysql_fetch_object(queryMysql($queryU));

//salons query
$queryS = "SELECT * FROM users WHERE user_status='2' AND user_city='$user_obj->user_city'";
$salon_records = mysql_num_rows(queryMysql($queryS));

$salon_city = getCityValue($user_obj->user_city);

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    //news query
    $queryN = "SELECT * FROM news WHERE ID='$id'";
    $news_obj = mysql_fetch_object(queryMysql($queryN));
}

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
    <link href="../content/assets/css/jquery.fancybox-1.3.4.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="show.php" rel="canonical" />
    <script type="text/javascript" src="../content/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../content/assets/js/jquery.fancybox-1.3.4.pack.js"></script>
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
    <div class="salonContent">
        <div class="bread gray">
            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/index.php?city=<?=$salon_city?>" title="Главная"><span itemprop="title">Главная</span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="../content/salons.php?city=<?=$salon_city?>" title="Мебельные салоны в <?=$user_obj->user_city."е"?>"><span itemprop="title">Мебельные салоны в <?=$user_obj->user_city."е"?></span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="index.php" title="<?=$user_obj->user_salonname?>"><span itemprop="title"><?=$user_obj->user_salonname?></span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="news.php" title="Новости"><span itemprop="title">Новости</span></a></span> / <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title"><?=$news_obj->title?></span></span>
        </div>
        <div class="toCenter">
            <img src="../content/uploads/<?=$user_obj->user_login?>_150.jpg" align="absmiddle" style="margin: 0 0 1em 0"  itemprop="logo" alt="<?=$user_obj->user_salonname?>" title="<?=$user_obj->user_salonname?> | MebelGid.kg"/><h1 itemprop="name"><?=$user_obj->user_salonname?></h1>
        </div>
        <div class="toCenter">
            <ul id="salonMainMenu">
                <li><a href="index.php">Салон</a></li>
                <li><a href="goods.php">Товары</a></li>
                <li class="current">Новости</li>
            </ul>
        </div>
        <div style="width: 66.5%; padding-bottom: 30px">
            <div style="padding-top: 2em;" id="newsArticle">
                <h2><?=$news_obj->title?></h2>
                <p style="margin: 0px; height: auto;">
                    <?=$news_obj->text?>
                </p>
                <p><img src="../content/uploads/<?=$news_obj->ID?>_0_600_news.jpg"></p>
                <br class="clear"/><br/>
                <div style="float: left">
                    <small class="smaller gray"><?=$news_obj->createddate?>&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;&nbsp;42 просмотра</small>
                </div>
                <div style="float: right">
                    <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                    <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="link" data-yashareQuickServices="vkontakte,facebook,twitter,moimir,odnoklassniki"></div>
                </div>
            </div>

            <br class="clear"/>
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
        </script>
    </div>

    <script>
        $(document).ready(function() {

            $("#toClr").click(function() {

                $("#toColor").show();
                $("#toMain").hide();

                return false;
            });

            $("#toMn").click(function() {

                $("#toMain").show();
                $("#toColor").hide();

                return false;
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
                <a href="../content/write.php" rel="nofollow">Написать нам</a><br/><a href="../content/registerSalon.php" rel="nofollow">Добавить салон</a><br/>

            </td><td class="tall">                    </td>
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
<!-- 0.085999965667725 -->
</body>
</html>