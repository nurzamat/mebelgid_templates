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
    <link rel="stylesheet" type="text/css" href="css/bee28be882eea735de94a061a6bf1b28_1429528089.css" />
    <link rel="stylesheet" type="text/css" href="css/c75faf8efb186c9fe21955957b238d75_1429528198.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/54b530786bfaad6f6b0b47127b3eb8bf_1429528194.css" media="print" />
    <!--<script type="text/javascript" src="js/7306e16e41b7ffe6ec31f4c9d92f7b02_1429528198.js"></script>-->
    <link rel="canonical" href="http://www.mebelgid.kg/" />
    <!--<link rel="stylesheet" type="text/css" href="css/02575c53fc10f8807d8b5cb009e8b505_1429528194.css" media="all" />-->
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
    <script src="js/jquery-1.11.1.min.js"></script>
    <style>
        .addForm
        {
            padding: 30px 0 0 0;
        }
        .addForm td
        {
            padding: 0 20px 20px 0;
            vertical-align: top;
        }
        .addForm .name { padding-top: 6px; }
        .addForm .textInput { font-size: 1em; padding: .4em; }
        .valmiddle, .phones-phone td { vertical-align: middle !important }

        .form-phones { width: 300px; }

        .gray { color:  #999 !important; }
        a.gray { border-color: #ddd }
    </style>
</head>
<body class=" cms-index-index cms-home">
<div class="wrapper">
    <div class="page">
        <? include('head.php');?>
        <p>&nbsp;</p>
        <div class="page-title">
            <h1>            Подать объявление            </h1>
        </div>
        <div class="account-create" style="width: 500px">
            <?
            if($error != "")
                echo "<div class='msg-err text-content'>Пожалуйста, заполните все обязательные поля.</div>";
            ?>
            <form action="" class="addnew-form" id="addnew-form" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="fieldset">
                    <h2 class="legend">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="required">* Обязательные поля</span></h2>
                    <ul class="form-list">
                        <li>
                            <label for="category1" class="required"><em>*</em>Рубрика</label>
                            <select id="category1" name="category1" class="textInput" onchange="showCategories(this, 1)">
                                <option value=""></option>
                                <option value="1">Мебель для дома</option>
                                <option value="3">Мебель для офиса</option>
                                <option value="5">Профильная для бизнеса</option>
                                <option value="2">Всё для интерьера</option>
                                <option value="4">Услуги</option>
                            </select>
                        </li>
                        <li>
                            <label for="title" class="required"><em>*</em>Заголовок</label>
                            <div class="input-box">
                                <input type="text" name="title" id="title" value="" class="input-text validate-email required-entry" maxlength="50" required/>
                            </div>
                        </li>
                        <li class="fields">
                            <div class="field">
                                <label for="price" class="required"><em>*</em>Цена</label>
                                <div class="input-box">
                                    <input type='text' name='price' id='price' value='' class="input-text required-entry validate-password">
                                </div>
                            </div>
                            <div class="field">
                                <label for="pricecurrency" class="required">&nbsp;</label>
                                <div class="input-box">
                                    <select name='pricecurrency' id='pricecurrency' class='textInput'>
                                        <option value='kgs'>сом</option>
                                        <option value='usd'>доллары</option>
                                        <option value='eur'>евро</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li class="fields">
                            <div class="field">
                                <label for="color">Цвет</label>
                                <div class="input-box">
                                    <input type='text' class="input-text required-entry validate-password" name='color' id='color' value='' required>
                                </div>
                            </div>
                            <div class="field">
                                <label for="material">Материал</label>
                                <div class="input-box">
                                    <input type='text' class="input-text required-entry validate-password" name='material' id='material' value=''>
                                </div>
                            </div>
                        </li>
                        <li class="fields">
                            <div class="field">
                                <label for="manufacturer">Производитель</label>
                                <div class="input-box">
                                    <input type='text' class="input-text required-entry validate-password" name='manufacturer' id='manufacturer' value=''>
                                </div>
                            </div>
                            <div class="field">
                                <label for="length">Размер</label>
                                <div class="input-box">
                                    <input type='text' class="input-text required-entry validate-password" name='length' id='length' value=''>
                                </div>
                            </div>
                        </li>
                        <li>
                            <label for="shipment">Условия доставки</label>
                            <div class="input-box">
                                <input type="text" name='shipment' id='shipment' value="" title="Name" maxlength="50" class="input-text validate-email required-entry" />
                            </div>
                        </li>
                        <li>
                            <label for="file">Фотографии</label>
                            <div class="input-box">
                                <script type="text/javascript">
                                    var abc = 0; //Declaring and defining global increement variable

                                    $(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
                                        $('#add_more').click(function() {
                                            $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                                                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}),
                                                $("<br/><br/>")
                                            ));
                                        });

//following function will executes on change event of file input to select different file
                                        $('body').on('change', '#file', function(){
                                            if (this.files && this.files[0]) {
                                                abc += 1; //increementing global variable by 1

                                                var z = abc - 1;
                                                var x = $(this).parent().find('#previewimg' + z).remove();
                                                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");

                                                var reader = new FileReader();
                                                reader.onload = imageIsLoaded;
                                                reader.readAsDataURL(this.files[0]);

                                                $(this).hide();
                                                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'assets/images/x.png', alt: 'delete'}).click(function() {
                                                    $(this).parent().parent().remove();
                                                }));
                                            }
                                        });

//To preview image
                                        function imageIsLoaded(e) {
                                            $('#previewimg' + abc).attr('src', e.target.result);
                                        };

                                        $('#upload').click(function(e) {
                                            var name = $(":file").val();
                                            if (!name)
                                            {
                                                alert("First Image Must Be Selected");
                                                e.preventDefault();
                                            }
                                        });
                                    });
                                </script>
                                <div id="filediv">
                                    <input name="file[]" type="file" id="file"/>
                                </div><br/>
                                <input type="button" id="add_more" class="button" value="+"/>
                            </div>
                        </li>
                        <li>
                            <label for="text">Текст объявления</label>
                            <div class="input-box">
                                <textarea name="text" id="text" cols="50" rows="3" class="textInput"></textarea>
                            </div>
                        </li>
                        <li>
                            <label for="name">Ваше имя</label>
                            <div class="input-box">
                                <input type="text" name="name" id="name" value="" title="Name" maxlength="50" class="input-text validate-email required-entry" />
                            </div>
                        </li>
                        <li>
                            <label for="adv_city" class="required"><em>*</em>Город</label>
                            <select name="adv_city" id="adv_city" class="textInput">
                                <option value=""></option>
                                <option value="Бишкек" <?if ($city == "Бишкек") echo "selected='selected'";?>>Бишкек</option>
                                <option value="Ош" <?if ($city == "Ош") echo "selected='selected'";?>>Ош</option>
                                <option value="Чолпон-Ата" <?if ($city == "Чолпон-Ата") echo "selected='selected'";?>>Чолпон-Ата</option>
                                <option value="Каракол" <?if ($city == "Каракол") echo "selected='selected'";?>>Каракол</option>
                            </select>
                        </li>
                        <li>
                            <label for="phone1" class="required"><em>*</em>Телефон</label>
                            <div class="input-box">
                                <input type="text" name="phone1" id="phone1" value="" title="Phone" maxlength="50" class="input-text validate-email required-entry" />
                            </div>
                        </li>
                        <li>
                            <label for="phone2">Телефон 2</label>
                            <div class="input-box">
                                <input type="text" name="phone2" id="phone2" value="" title="Phone2" maxlength="50" class="input-text validate-email required-entry" />
                            </div>
                        </li>
                        <li>
                            <label for="email" class="required"><em>*</em>Email</label>
                            <div class="input-box">
                                <input type="text" name="email" id="email" value="" title="Email" maxlength="50" class="input-text validate-email required-entry" />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="buttons-set form-buttons">
                    <input type="submit" name="submit" class="button" value="Подать объявление" id="addBtn" />
                </div>
            </form>
        </div>
    </div>
        <p>&nbsp;</p>
        <? include('footer.php');?>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function()
    {
        highlightFields();
    });

    function highlightFields()
    {
    }

    function showCategories(select, level)
    {
        $(".addedRow").remove();
        $("#addBtn").attr("disabled", false);
        $("#addBtn").val("Подать объявление");

        var subParent = 0;

        if(level == 1)
        {
            $("#category3").remove();
            $("#category2").remove();
            subParent = 0;
        }
        else if(level == 2)
        {
            $("#category3").remove();
            subParent = $("#category1").val();
        }

        if($(select).val() != "")
        {
            var loading = $('<img src="images/loading.gif" align="absmiddle" style="margin-left: 2em" />');
            $(select).after(loading);

            $.get(
                'ajax/categories.php',
                {parentId: $(select).val(),
                 level: level,
                  subParent: subParent},
                function(data)
                {
                    loading.remove();
                    if(data.length > 0)
                    {
                        $("#addBtn").attr("disabled", "disabled");
                        $("#addBtn").val("Выберите раздел");

                        var selectNew = $('<select style="margin-left: 2em;" id="category' + (level + 1) + '" name="category' + (level + 1) + '" class="textInput" onchange="showCategories(this, ' + (level + 1) + ')"><option value=""></option></select>');

                        $(data).each(function(key, value)
                        {
                            selectNew.append('<option value="' + value.id + '"' + ('' == value.id || -1 == value.id ? ' selected="selected"' : '') + '>' + value.name + '</option>')
                        });

                        $(select).after(selectNew);

                        if($(selectNew).val() != '')
                        {
                            showCategories(selectNew, level + 1);
                        }
                    }
                },
                'json');
        }
        else
        {
            $("#addBtn").attr("disabled", "disabled");
            $("#addBtn").val("Выберите раздел");
        }
    }

    function validateForm()
    {
        var category1 = document.forms["addnew-form"]["category1"].value;
        if (category1 == null || category1 == "") {
            alert("Выберите рубрику");
            return false;
        }

        var title = document.forms["addnew-form"]["title"].value;
        if (title == null || title == "") {
            alert("Заполните заголовок объявления");
            return false;
        }

        var price = document.forms["addnew-form"]["price"].value;
        if (price == null || price == "") {
            alert("Не указана цена");
            return false;
        }

        var city = document.forms["addnew-form"]["adv_city"].value;
        if (city == null || city == "") {
            alert("Укажите город");
            return false;
        }

        var phone = document.forms["addnew-form"]["phone1"].value;
        if (phone == null || phone == "") {
            alert("Укажите номер телефона");
            return false;
        }

        var email = document.forms["addnew-form"]["email"].value;
        if (email == null || email == "") {
            alert("Укажите почтовый адрес");
            return false;
        }
    }

</script>
</body>
</html>

