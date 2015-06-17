function updatePrice(price)
{

    var saving = $(price).next("span");
    if(!saving.is("span"))
    {
        saving = $("<span><br/><img src=\"../images/loading.gif\" align=\"absmiddle\" />&nbsp;Сохраняю...</span>");
    }
    else
    {
        saving.html("<span><br/><img src=\"../images/loading.gif\" align=\"absmiddle\" />&nbsp;Сохраняю...</span>");
    }

    $(price).attr("disabled", "disabled");
    $(price).closest("form").append(saving);
    $.get(
        $(price).closest("form").attr("action"),
        {price: $(price).val()},
        function(data)
        {
            if(data.result == 'error')
            {
                alert('При обновлении произошла ошибка. Попробуйте еще раз позже.');
            }

            $(price).attr("disabled", false);
            saving.html("<br/><span style=\"color: green\">Сохранено</span>");
        },
        'json');
}

$(document).ready(
    function()
    {
        $(".myPrice").focusout(function()
        {
            updatePrice($(this));
        });

        $(".priceUpdate").submit(function()
        {
            var price = $(this).find(".myPrice");

            updatePrice(price);

            return false;
        });

        $(".delAd").click(function()
        {
            var THIS = $(this);

            var isArchiveLink = THIS.is(".delAdArchive");

            if(!confirm(isArchiveLink ? "Вы действительно хотите отправить объявление в архив?\nПозднее его можно восстановить, салонам — бесплатно, простым пользователям — за деньги." : "Вы действительно хотите удалить объявление?\nОно будет удалено навсегда.")) {
                return false;
            }

            var loading = $('<span><img src="../images/loading.gif" align="absmiddle" style="margin:0; float: none;" /> ' + (isArchiveLink ? 'архивирую' : 'удаляю' ) + '...</span>');
            THIS.closest('small').append(loading);
            THIS.hide();

            $.get(
                THIS.attr("href"),
                {ajax: '1'},
                function(data)
                {
                    if(data.result != 'error')
                    {
                        loading.html(isArchiveLink ? 'в&nbsp;архиве' : 'удалено');
                        var container = THIS.closest('tr');
                        container.css({"opacity" : ".3"});

                        container.find('input').attr('disabled', 'disabled');
                        container.find('a').click(function() {return false;});
                    }
                    else
                    {
                        alert('При удалении произошла ошибка. Попробуйте еще раз позже.');
                        loading.hide();
                        THIS.show();
                    }
                },
                'json');

            return false;
        });

        $(".recover").click(function()
        {
            var THIS = $(this);

            if(!confirm("Вы действительно хотите восстановить объявление?"))
                return false;

            var loading = $('<span><img src="../images/loading.gif" align="absmiddle" style="margin:0; float: none;" /> восстановление...</span>');
            THIS.closest('small').append(loading);
            THIS.hide();

            $.get(
                THIS.attr("href"),
                {ajax: '1'},
                function(data)
                {
                    if(data.result != 'error')
                    {
                        loading.text('восстановлено');
                        var container = THIS.closest('tr');
                        container.find('input').attr('disabled', 'disabled');
                        container.find('a').click(function() {return false;});
                    }
                    else
                    {
                        alert('При восстановлении произошла ошибка. Попробуйте еще раз позже.');
                        loading.hide();
                        THIS.show();
                    }
                },
                'json');

            return false;
        });
    }
);