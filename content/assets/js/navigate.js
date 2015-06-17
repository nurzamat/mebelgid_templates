document.onkeydown = NavigateThrough;

function NavigateThrough (event)
{
    if (!document.getElementById) return;

    if (window.event) event = window.event;

    if (event.ctrlKey)
    {
        var link = null;
        var href = null;
        switch (event.keyCode ? event.keyCode : event.which ? event.which : null)
        {
            case 0x27:
                link = NavigateGetHref('next');
                break;
            case 0x25:
                link = NavigateGetHref('prev');
                break;
            case 0x26:
                link = NavigateGetHref('up');
                break;
            case 0x28:
                link = NavigateGetHref('down');
                break;
            case 0x24:
                href = '/';
                break;
        }

        if (link) document.location = link;
        if (href) document.location = href;
    }
}

function NavigateGetHref(el)
{
    var links = document.getElementsByTagName('link');

    for(i=0; i < links.length; i++)
    {
        if(links[i].getAttribute('rel') == el)
        {
            return links[i].getAttribute('href');
        }
    }

    return null;
}