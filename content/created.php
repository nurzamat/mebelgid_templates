<?php
include_once 'header.php';

$current_page = "created";

if (isset($_GET['id']))
{
    $id = $_GET['id'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MebelGid</title>
    <meta name="description" content="Путеводитель мебели по Бишкеку" />
    <meta name="keywords" content="MebelGid" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/bee28be882eea735de94a061a6bf1b28_1429528089.css" />
    <link rel="stylesheet" type="text/css" href="css/c75faf8efb186c9fe21955957b238d75_1429528198.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/54b530786bfaad6f6b0b47127b3eb8bf_1429528194.css" media="print" />
    <script type="text/javascript" src="js/7306e16e41b7ffe6ec31f4c9d92f7b02_1429528198.js"></script>
    <link rel="canonical" href="http://www.mebelgid.kg/" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="css/02575c53fc10f8807d8b5cb009e8b505_1429528194.css" media="all" />
    <![endif]-->
    <!--[if lt IE 7]>
    <script type="text/javascript" src="js/7126137572f32ac969e3b5fb4e18227d_1429528198.js"></script>
    <![endif]-->

    <script type="text/javascript">
        //<![CDATA[
        Mage.Cookies.path     = '/';
        Mage.Cookies.domain   = '.mebelgid.kg';
        //]]>
    </script>

    <script type="text/javascript">
        //<![CDATA[
        optionalZipCountries = ["HK","IE","MO","PA"];
        //]]>
    </script>
    <!-- BEGIN GOOGLE ANALYTICS CODEs -->
    <script type="text/javascript">
        //<![CDATA[
        var _gaq = _gaq || [];

        _gaq.push(['_setAccount', 'UA-9324681-3']);

        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        //]]>
    </script>
    <!-- END GOOGLE ANALYTICS CODE -->

    <!-- Magic Zoom Plus Magento module version v4.9.17 [v1.4.7:v4.5.30] -->
    <link type="text/css" href="css/magiczoomplus.css" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="js/magiczoomplus.js"></script>
    <script type="text/javascript">
        MagicZoomPlus.options = {
            'caption-source':'span',
            'zoom-width':'300',
            'zoom-height':'300',
            'zoom-position':'inner',
            'zoom-align':'top',
            'zoom-distance':15,
            'expand-size':'fit-screen',
            'expand-position':'center',
            'expand-align':'screen',
            'expand-effect':'back',
            'restore-effect':'linear',
            'expand-speed':500,
            'restore-speed':500,
            'expand-trigger':'click',
            'expand-trigger-delay':200,
            'restore-trigger':'auto',
            'keep-thumbnail':true,
            'opacity':50,
            'opacity-reverse':false,
            'zoom-fade':true,
            'zoom-window-effect':'shadow',
            'zoom-fade-in-speed':200,
            'zoom-fade-out-speed':200,
            'fps':25,
            'smoothing':true,
            'smoothing-speed':40,
            'pan-zoom':true,
            'selectors-change':'click',
            'selectors-class':'',
            'preload-selectors-small':true,
            'preload-selectors-big':false,
            'selectors-effect':'dissolve',
            'selectors-effect-speed':400,
            'selectors-mouseover-delay':60,
            'initialize-on':'load',
            'click-to-activate':false,
            'click-to-deactivate':false,
            'show-loading':true,
            'loading-msg':'Loading zoom...',
            'loading-opacity':75,
            'loading-position-x':-1,
            'loading-position-y':-1,
            'entire-image':false,
            'show-title':false,
            'caption-width':300,
            'caption-height':300,
            'caption-position':'bottom',
            'caption-speed':250,
            'right-click':'false',
            'background-opacity':30,
            'background-color':'#000000',
            'background-speed':200,
            'buttons':'show',
            'buttons-display':'previous, next, close',
            'buttons-position':'auto',
            'always-show-zoom':false,
            'drag-mode':false,
            'move-on-click':true,
            'x':-1,
            'y':-1,
            'preserve-position':false,
            'fit-zoom-window':true,
            'slideshow-effect':'dissolve',
            'slideshow-loop':true,
            'slideshow-speed':800,
            'z-index':10001,
            'keyboard':true,
            'keyboard-ctrl':false,
            'hint':true,
            'hint-text':'Zoom',
            'hint-position':'tl',
            'hint-opacity':75,
            'disable-expand':false,
            'disable-zoom':false
        }
    </script>
    <script type="text/javascript">//<![CDATA[
        var Translator = new Translate([]);
        //]]></script>	<script type="text/javascript" src="js/tws_350.js"></script>
    <script type="text/javascript" src="js/trustseal.js"></script>
</head>
<body class=" cms-index-index cms-home">
<div class="wrapper">
    <div class="page">
        <? include('head.php');?>
        <div class="page-title">
            <h1>Спасибо, ваше объявление подано!</h1>
        </div>
         <div class="content">
             <p style="margin-bottom: .7em;">После проверки модератором ваше объявление будет опубликовано на сайте по&nbsp;адресу <a href="show.php?type=goods&id=<?=$id?>">http://mebelgid.kg/show.php?id=<?=$id?></a>.</p>
             <p style="margin-bottom: .7em;">А&nbsp;пока ждете, <a href="addNew.php">подайте еще объявление</a> или посмотрите, что нового <a href="index.php">на&nbsp;главной странице</a>.</p>
             <br style="clear: both" /><br/><br/>
         </div>
        <? include('footer.php');?>
        <script type="text/javascript">
            //<![CDATA[
            Enterprise.Wishlist.list = [];
            if (!Enterprise.Wishlist.url) {
                Enterprise.Wishlist.url = {};
            }
            Enterprise.Wishlist.url.create = 'https://www.mebelgid.kg/wishlist/index/createwishlist/';
            Enterprise.Wishlist.canCreate = false;
            //]]>
        </script>
        <script src="js/performance.js" type="text/javascript"></script>
        <script type="text/javascript">
            try{
                if(document.getElementById('search_mini_form'))
                {
                    var links = document.links;
                    for (i = 0; i < links.length; i++) {
                        if (links[i].href.search('/customer/account/login/') != -1) {
                            jQuery(links[i]).addClass('popUpLoginControl');
                        }
                        if (links[i].href.search('/wishlist/') != -1) {
                            jQuery(links[i]).addClass('popUpLoginControl');
                        }
                        if (links[i].href.search('/customer/account/') != -1) {
                            jQuery(links[i]).addClass('popUpLoginControl');
                        }
                    }
                }
                if(document.getElementById('product_comparison')){
                    var links = document.links;
                    for (i = 0; i < links.length; i++) {
                        if (links[i].href.search('/wishlist/') != -1) {
                            jQuery(links[i]).addClass('popUpLoginControl');
                        }
                    }
                }
                if(document.getElementById("checkout-step-login"))
                {
                    $$('.col-1 .buttons-set').each(function(e) {
                        e.insert({bottom: '<div id="multilogin"> <button type="button" class="button popUpLoginControl" style="" title="Social Login" name="headerboxLink1" id="headerboxLink1"><span><span>Social Login</span></span></button></div>'});
                    });
                }
                var list = $$('li.onestepcheckout-login-link');
                if(list.length > 0){
                    list.each(function(element){
                        element.insert({bottom: '</br><div id="multilogin"> <button type="button" class="button popUpLoginControl" style="" title="Social Login" name="headerboxLink1" id="headerboxLink1"><span><span>Social Login</span></span></button></div>'});
                    });
                }
            }catch(exception)
            { alert(exception);}
        </script>
        <script type="text/javascript">
            Event.observe(window, 'load', function() {

                if(document.getElementById('magestore-sociallogin-popup-email') !=null && document.getElementById('magestore-sociallogin-popup-pass')!=null)
                {
                    var options = {
                        email: document.getElementById('magestore-sociallogin-popup-email').value,
                        pass : document.getElementById('magestore-sociallogin-popup-pass').value,
                        login_url  : "http://www.mebelgid.kg/sociallogin/popup/login",
                        send_pass_url : "http://www.mebelgid.kg/sociallogin/popup/sendPass",
                        create_url : "http://www.mebelgid.kg/sociallogin/popup/createAcc"
                    };
                    Login = new LoginPopup(options);
                }
            });
        </script>
        <script type="text/javascript">
            //<![CDATA[
            var currentSiteSessionId = '401316f67225422587b657ba0145d95f';
            var previousSessionId = getCookie('previousSessionId');
            var hosts = ['http://www.mebelgid.kg/'];
            if(currentSiteSessionId != previousSessionId)
            {
                var date = new Date( new Date().getTime() + 3600*1000 );
                document.cookie="previousSessionId="+currentSiteSessionId+"; path=/; expires="+date.toUTCString();
                setSessionForAllStores();
            }
            //]]>
        </script>
        <!-- ESI END [head.non.cached.part] -->
    </div>
</div>
<!-- Start Tracking Codes -->
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5P8HHB"; height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5P8HHB');</script>
<!-- End Google Tag Manager -->
</body>
</html>

