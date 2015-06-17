<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>Mebel.kz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="assets/css/undohtml.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/css/print.css?t=1346827624" media="print" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css?t=1417593679" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
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
        <li class="submenu-item"><a href="my.php" class="no-visited">Мои объявления</a></li>
        <li class="submenu-item current"><a href="mySalon.php" class="no-visited">Мой салон</a></li>
    </ul>
    <br class="clear"/>
    <?
    if($error != "")
    {
        echo "<div class='content-block'><div class='msg-err text-content'>$error</div></div>";
    }
    if($error == "" && $user_obj->user_status == 1)
    {
        echo "<div class='content-block'><div class='msg-err text-content'>Ваша заявка на модерации.</div></div>";
    }
    ?>
    <br class="clear"/>
    <?
    if($user_obj->user_status == 0 || $user_obj->user_status == 1)
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
                                <input type="text" value=".mebelgid.kg" class="textInput" size="10" />
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
                            <td><input class="button" type="submit" name="send" value="Отправить заявку" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    <?}
    if($user_obj->user_status == 2)
    {?>
        <div class="table whySalon" style="width: 700px">
            <h3 class="purple">Вашa страница салона: <a href="../<?=$user_obj->user_salondomen?>">mebelgid.kg/<?=$user_obj->user_salondomen?></a></h3>
            <br/><br/>
            <small><input class="button" type="button" value="Редактировать салон" onclick="$('#form_news').hide(); $('#form').slideDown(); return false;" />&nbsp;&nbsp;<input class="button" type="button" value="Добавить новость" onclick="$('#form').hide(); $('#form_news').slideDown(); return false;" /></small>
            <div id="form" style="display: none">
                <form action="mySalon.php" method="post" class="addForm" enctype="multipart/form-data">
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
                            <td class="valmiddle">Логотип</td>
                            <td><input type='file' name='image' size='14' maxlength='32' />
                            </td>
                        </tr>
                        <tr>
                            <td class="valmiddle">Домен</td>
                            <td><input type="text" name="salondomen" disabled="true" value="<?=$user_obj->user_salondomen?>" class="textInput" size="18" />
                                <input type="text" disabled="true" value=".mebelgid.kg" class="textInput" size="10" />
                            </td>
                        </tr>
                        <tr>
                            <td class="name">О салоне</td>
                            <td>
                                <textarea name="salon_info" class="textInput" cols="50" rows="5"><?=$user_obj->user_saloninfo?></textarea>
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
                            <td class="valmiddle">Адрес салона</td>
                            <td><input type="text" name="salon_address" value="<?=$user_obj->user_address?>" class="textInput" size="30" />
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
                            <td><input class="button" type="submit" name="update_salon" value="Сохранить" /></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="form_news" style="display: none">
                <form action="mySalon.php" method="post" class="addForm" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td class="valmiddle">Фотография</td>
                            <td><input type="file" id="file" name="file"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="valmiddle">Заголовок</td>
                            <td><input type="text" name="title" value="" class="textInput" size="50" />
                            </td>
                        </tr>
                        <tr>
                            <td class="name">Текст</td>
                            <td>
                                <textarea name="text" class="textInput" cols="70" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input class="button" type="submit" name="add_news" value="Добавить" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    <?}?>
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