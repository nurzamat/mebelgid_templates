<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>Ваши объявления на сайте &mdash; Mebel.kz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="assets/css/undohtml.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/css/print.css?t=1346827624" media="print" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css?t=1417593679" media="screen" rel="stylesheet" type="text/css" /><script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="assets/js/my.js"></script>
    <script type="text/javascript" src="assets/js/jquery.phones.js?t=1424424361"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="assets/js//jquery.ui.mouse.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.position.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.sortable.min.js"></script>
    <script type="text/javascript" src="assets/js/fav.js"></script>
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


<div class="layout">
    <div class="table noprint" style="position: relative; padding-top: 1.5em; padding-bottom: 5px;">
        <div id="salonMenu">
            <ul id="menuList">
                <li style="border-right: 2px solid #ccc; margin: 0 1em 0 0; padding: 0 1em 0 0;"><a href="http://mebel.kz/almaty" class="noBorder"=><img src="assets/images/slogo.png" alt="Mebel.kz" title="на главную" /></a></li>
                <li style="border-right: 1px solid #CCCCCC; margin-left: 0; padding: 0.5em 0.7em;"><strong><?=$user?></strong></li><li class="submenu-item"><a href="settings.php" class="no-visited blackLink">Настройки</a></li>
                <li style="float: right; margin: 0 2em 0 0"><a href="logout.php" class="no-visited" style="color: #c00; position:relative; ">Выйти <img src="assets/images/exit.png" style="position: absolute; right: -20px; bottom: 0;" /></a></li>
            </ul>
        </div>
    </div>

    <ul id="menuList">
        <li class="submenu-item current">Мои объявления</li>
        <li class="submenu-item"><a href="mySalon.php" class="no-visited">Мой салон</a></li>
    </ul><br class="clear"/>
    <h2 id="headline" style="display:inline-block; margin-top:.5em">Личный кабинет <?if($user_obj->user_status == 0 || $user_obj->user_status == 1) echo $user_obj->user_nicename;
        if($user_obj->user_status == 2) echo $user_obj->user_salonname;
        ?></h2>
    <div class="toCenter">
        <a href="addNew.php" class="button" style="padding:0.4em .7em; color:#fff">Подать объявление</a>
    </div>
    <?
    if($status != "")
    {
        echo "<div class='msg-ok' style='margin-bottom: 2em; line-height: 1.6em'>
        <p><strong>Добро пожаловать в ваш личный кабинет на mebelGid.kg!</strong></p>
    </div>";
    }
    ?>
    <ul id="myTabs">
        <?
        if($tab == "" || $tab == "live")
            echo "<li id='active'>На сайте&nbsp;<small class='gray smaller'>0</small></li>
        <li><a href='my.php?tab=moderating'>У модератора</a>&nbsp;<small class='gray smaller'>1</small></li>
        <li><a href='my.php?tab=archive'>В архиве</a>&nbsp;<small class='gray smaller'>0</small></li>";

        if($tab == "moderating")
            echo "<li><a href='my.php'>На сайте</a>&nbsp;<small class='gray smaller'>0</small></li>
        <li id='active'>У модератора&nbsp;<small class='gray smaller'>1</small></li>
        <li><a href='my.php?tab=archive'>В архиве</a>&nbsp;<small class='gray smaller'>0</small></li>";

        if($tab == "archive")
            echo "<li><a href='my.php'>На сайте</a>&nbsp;<small class='gray smaller'>0</small></li>
        <li><a href='my.php?tab=moderating'>У модератора</a>&nbsp;<small class='gray smaller'>1</small></li>
        <li id='active'>В архиве&nbsp;<small class='gray smaller'>0</small></li>";
        ?>
    </ul>
    <br/>
    <div id="salonMebel">
        <table cellpadding="0" cellspacing="0" id="inSalon">
            <tr>
                <td>
                    <ul>
                        <li><a href="my.php?c=1&tab=live">Мебель для дома</a> <small class="gray">38</small></li>
                        <li><a href="my.php?c=2&tab=live">Всё для интерьера</a> <small class="gray">3</small></li>
                        <li><a href="my.php?c=3&tab=live">Мебель для офиса</a> <small class="gray">1</small></li>
                        <li><a href="my.php?c=4&tab=live">Услуги</a> <small class="gray">37</small></li>
                        <li><a href="my.php?c=5&tab=live">Профильная для бизнеса</a> <small class="gray">24</small></li>
                    </ul>
                </td>
            </tr>
        </table>
        <? while($adv = mysql_fetch_object($advsQ)) { ?>
            <div class="tableGood">
                <small class="gray listDate">26 марта</small><br/>
                <a href="show.php?type=goods&id=<?=$adv->id?>" class="imgCont noBorder"><img src="uploads/<?=$adv->id?>_0_180.jpg" alt="Мягкая мебель" title="Мягкая мебель | Mebel.kz" /></a>
                <p>&nbsp;</p>
                <strong class="price" style="margin-right: 10px"><nobr>от&nbsp;<?=$adv->price." ".$adv->pricecurrency?>.</nobr></strong><span class="gray"><nobr></nobr></span><br/><a href="show.php?type=goods&id=<?=$adv->id?>" class="link"><?=$adv->title?></a><br/><small class="gray"><?=$adv->user_salonname?></small>
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
    <div id="tableGoods">
        <br />

        <?
        if($user_obj->user_status == 0)
        {?>
            <div class="table whySalon" style="width: 700px">
                <h3 class="purple">Почему выгодно стать салоном?</h3>

                <ul>
                    <li>Объявления салонов первыми отображаются в&nbsp;результатах поиска.</li>
                    <li>Они автоматически продляются и&nbsp;поднимаются в&nbsp;списке раз в&nbsp;неделю, и&nbsp;никогда не&nbsp;уходят в&nbsp;архив.</li>
                    <li>На&nbsp;странице с&nbsp;объявлением нет чужих объявлений&nbsp;&mdash; только другие ваши.</li>
                    <li>Каждый салон получает личную страницу с&nbsp;коротким адресом типа salon.mebel.kz, логотипом, инфо-блоком и&nbsp;удобным каталогом.</li>
                    <li>Возможность перехода с&nbsp;каждого объявления на&nbsp;страницу вашего салона.</li>
                    <li>Доступ к&nbsp;редактированию любой информации на&nbsp;странице в&nbsp;любое удобное время.</li>
                </ul>

                <small class="purple">Данный сервис одинаково доступен компаниям, индивидуальным предпринимателям и&nbsp;частным лицам.</small><br/><br/>

                <small>Звоните по телефонам указанным ниже<span id="formShower"> или <input class="button" type="button" value="оставьте заявку" onclick="$('#form').slideDown(); $('#formShower').hide(); return false;" /></span></small>.
                <div id="form" style="display: none">
                    <form action="mySalon.php" method="post" class="addForm">
                        <table>
                            <tr>
                                <td class="valmiddle">Контактное лицо</td>
                                <td><input type="text" name="name" value="<?=$user_obj->user_nicename?>" class="textInput" size="30" />
                                </td>
                            </tr>
                            <tr>
                                <td class="valmiddle">Название салона</td>
                                <td><input type="text" name="salonname" value="<?=$user_obj->user_salonname?>" class="textInput" size="30" />
                                </td>
                            </tr>
                            <tr>
                                <td class="valmiddle">Домен</td>
                                <td><input type="text" name="salondomen" value="<?=$user_obj->user_salondomen?>" class="textInput" size="18" />
                                    <input type="text" disabled="true" value=".mebelgid.kg" class="textInput" size="10" />
                                </td>
                            </tr>
                            <tr>
                                <td class="valmiddle">Город</td>
                                <td>
                                    <select name="adv_city" id="adv_city" class="textInput">
                                        <option value=""></option>
                                        <option value="Бишкек" <?if ($user_obj->user_city == "Бишкек") echo "selected='selected'";?>>Бишкек</option>
                                        <option value="Ош" <?if ($user_obj->user_city == "Ош") echo "selected='selected'";?>>Ош</option>
                                        <option value="Чолпон-Ата" <?if ($user_obj->user_city == "Чолпон-Ата") echo "selected='selected'";?>>Чолпон-Ата</option>
                                        <option value="Каракол" <?if ($user_obj->user_city == "Каракол") echo "selected='selected'";?>>Каракол</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="name">Телефоны</td>
                                <td><input type="text" name="phone" value="<?=$user_obj->user_phone?>" class="textInput" size="30" />
                                </td>
                            </tr>
                            <tr>
                                <td class="name"></td>
                                <td><input type="text" name="phone2" value="<?=$user_obj->user_phone2?>" class="textInput" size="30" />
                                </td>
                            </tr>
                            <tr>
                                <td class="name"></td>
                                <td><input type="text" name="phone3" value="<?=$user_obj->user_phone3?>" class="textInput" size="30" />
                                </td>
                            </tr>
                            <tr>
                                <td class="valmiddle">Электронная почта</td>
                                <td><input type="text" name="email" disabled="true" value="<?=$user?>" class="textInput" size="30" /></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input class="button" name="send" type="submit" value="Отправить заявку" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        <?}?>
    </div>

    <div id="dark" style="display: none">&nbsp;</div>

    <script type="text/javascript">

        function showServices(link, adId)
        {
            $("#dark").show();

            $.get(
                $(link).attr("href"),
                {},
                function(data)
                {
                    $("#dark").after(data);
                    var top = $('#photo' + adId).offset().top - 114;
                    var left = $('#photo' + adId).offset().left - 30;

                    $("#light").css({top: top + 'px', left: left + 'px', display: 'block'});
                }
            );

            return false;
        }

        function showSalonServices(link)
        {
            $("#dark").show();

            $.get(
                $(link).attr("href"),
                {},
                function(data)
                {
                    $("#dark").after(data);
                    var top = $('#headline').offset().top;
                    var left = $('#headline').offset().left + 200;

                    $("#light").css({top: top + 'px', left: left + 'px', display: 'block'});
                }
            );

            return false;
        }

        $("#dark").click(function() {
            $("#light").remove();
            $("#dark").hide();
        });

        $(".serv").addClass("flink");
    </script>

    <hr style="border: none; border-bottom: 1px solid #ccc" />
</div>
</body>
</html>