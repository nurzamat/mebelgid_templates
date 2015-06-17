var seoHrefs;

$(document).ready(function() {
    ;
    /* var seoContent = {
     "23642e39b937198b4151e23d8d5a548b":"PGEgaHJlZj0iaHR0cDovL21ldHJpa2EueWFuZGV4LnJ1L3N0YXQvP2lkPTE2OTE0ODcmYW1wO2Zyb209aW5mb3JtZXIiCnRhcmdldD0iX2JsYW5rIiByZWw9Im5vZm9sbG93Ij48aW1nIHNyYz0iLy9icy55YW5kZXgucnUvaW5mb3JtZXIvMTY5MTQ4Ny8zXzFfRkZGRkZGRkZfRUZFRkVGRkZfMF9wYWdldmlld3MiCnN0eWxlPSJ3aWR0aDo4OHB4OyBoZWlnaHQ6MzFweDsgYm9yZGVyOjA7IiBhbHQ9ItCv0L3QtNC10LrRgS7QnNC10YLRgNC40LrQsCIgdGl0bGU9ItCv0L3QtNC10LrRgS7QnNC10YLRgNC40LrQsDog0LTQsNC90L3Ri9C1INC30LAg0YHQtdCz0L7QtNC90Y8gKNC/0YDQvtGB0LzQvtGC0YDRiywg0LLQuNC30LjRgtGLINC4INGD0L3QuNC60LDQu9GM0L3Ri9C1INC/0L7RgdC10YLQuNGC0LXQu9C4KSIgb25jbGljaz0idHJ5e1lhLk1ldHJpa2EuaW5mb3JtZXIoe2k6dGhpcyxpZDoxNjkxNDg3LGxhbmc6J3J1J30pO3JldHVybiBmYWxzZX1jYXRjaChlKXt9Ii8+PC9hPg==",
     };*/

    $('[hashstring]').each(function() {
        var key = $(this).attr("hashstring");

        if ($(this).attr("hashtype") == 'href') {
            $(this).attr('href', Base64.decode(seoHrefs[key]));
        }
        /*else{
         var content = Base64.decode(seoContent[key]);
         $(this).replaceWith(content);
         }*/

    });
    $(document).trigger( "renderpage.finish");
});

