<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
    <title>Настройки личного кабинета &mdash; Mebel.kz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="assets/css/undohtml.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="assets/css/print.css?t=1346827624" media="print" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css?t=1417593679" media="screen" rel="stylesheet" type="text/css" /><script type="text/javascript" src="assets/js/jquery-1.7.2.min.js"></script>
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
                <li style="border-right: 1px solid #CCCCCC; margin-left: 0; padding: 0.5em 0.7em;"><strong><?=$user?></strong></li><li class="submenu-item current">Настройки</li>
                <li style="float: right; margin: 0 2em 0 0"><a href="logout.php" class="no-visited" style="color: #c00; position:relative; ">Выйти <img src="assets/images/exit.png" style="position: absolute; right: -20px; bottom: 0;" /></a></li>
            </ul>
        </div>
    </div>

    <ul id="menuList">
        <li class="submenu-item"><a href="my.php" class="no-visited">Мои объявления</a></li>
        <li class="submenu-item"><a href="mySalon.php" class="no-visited">Мой салон</a></li>
    </ul>
    <br class="clear"/>
    <h2 id="headline">Настройки</h2>
    <div class="col-center">

        <form action="settings.php" method="post" class="addForm">
            <input type="hidden" name="action" value="save-pass"/>
            <table class="form table" style="width: auto">
                <tr>
                    <td class="valmiddle">Как вас зовут?</td>
                    <td><input type="text" class="textInput" size="40" name="name" value="<?=$nicename?>" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="button" id="enter" value="Сохранить имя" />
                    </td>
                </tr>
                <tr>
                    <td class="valmiddle">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="valmiddle">Старый пароль</td>
                    <td><input type="password" class="textInput" size="40" name="password" value="" /></td>
                </tr>
                <tr>
                    <td class="valmiddle">Новый пароль</td>
                    <td><input type="password" class="textInput" size="40" name="new_password" value="" /></td>
                </tr>
                <tr>
                    <td class="valmiddle">Еще раз новый пароль</td>
                    <td>
                        <input type="password" class="textInput" size="40" name="new_password_confirm" value="" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="button" id="enter" value="Изменить пароль" />
                    </td>
                </tr>
            </table>
        </form>

    </div>

    <hr style="border: none; border-bottom: 1px solid #ccc" />
</div>
</body>
</html>