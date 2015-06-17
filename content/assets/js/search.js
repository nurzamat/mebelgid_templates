$(document).ready(
    function()
    {
        var rootState =
        {
            el: 'root',
            title : $('title').text(),
            url : window.location.href
        };

        // управляем сменой тайтлов и урлов
        var historyWriter = function(state)
        {
            History.pushState({'el': state.el}, state.title, state.url);
        };

        History.Adapter.bind(window, 'statechange', function()
        {
            var State = History.getState();

//            console.log(State.cleanUrl + ' --- ' + rootState.url);

            $("body").css("cursor", "wait");

            $.get(
                State.cleanUrl,
                {},
                function(data)
                {
                    title = $(data).find("#title");
                    $("title").text(title.text());

                    $("#searchContainer").replaceWith(data);

                    $("body").css("cursor", "auto");

                    document.location.hash = '#subheaderWide';
                }
            );

        });

        function searchClick(a)
        {
            var state = {
                el: 'search',
                title: a.text(),
                url: a.attr("href")
            };

            historyWriter(state);
        }

        function formUpdate()
        {
            data = $("#searchFilterForm").serialize();

            var state = {
                el: 'search',
                title: 'Поиск...',
                url: $("#searchFilterForm").attr("action") + "?" + data
            };

            historyWriter(state);
        }

        $('.layout').on('click', '.searchFilterRow1 .flink', function(){
            var a = $(this);

            liToggle(a.parent());

            searchClick(a);

            return false;
        });

        $('.layout').on('click', '.searchFilterRow2 .flink', function(){
            var a = $(this);

            liToggle(a.parent());

            searchClick(a);

            return false;
        });

        $('.layout').on('click', '.searchFilterRow3 .flink', function(){
            var a = $(this);

            liToggle(a.parent());

            val = a.attr("data-val");
            selectId = a.parents("ul").attr("data-id");

            if(a.parent().hasClass('active'))
            {
                $("#" + selectId).val(val);
            }
            else
            {
                $("#" + selectId).val(null);
            }

            formUpdate();

            return false;
        });

        $('.layout').on('click', '#sorts a', function(){
            var a = $(this);

            searchClick(a);

            return false;
        });

        $('.layout').on('click', '.pages a, #ctrls a', function(){
            var a = $(this);

            searchClick(a);

            return false;
        });

        $('.layout').on('submit', '#searchFilterForm', function()
        {
            formUpdate();

            return false;
        });

        function liToggle(li) {

            li.siblings().each( function(){

                if ( $(this).hasClass('active') ) {
                    $(this).removeClass('active');
                }

            });

            li.toggleClass('active');

        };
    });