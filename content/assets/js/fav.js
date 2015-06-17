var Favorites = new function() {
    // days to store cookie
    this.days = 30;
    this.currentActiveDiv = null;

    // cookie functions - taken from quirksmode.org/...
    this.createCookie = function(name, value, days) {
        if(days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            var expires = "; expires="+date.toGMTString();
        } else {
            var expires = "";
        }

        document.cookie = name+"="+value+expires+"; path=/";
    }

    this.readCookie = function(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');

        for(var i = 0, ic = ca.length; i < ic; ++ i) {
            var c = ca[i];

            while(c.charAt(0) == ' ')
                c = c.substring(1, c.length);

            if(c.indexOf(nameEQ) == 0)
                return c.substring(nameEQ.length, c.length);
        }

        return '';
    }

    this.eraseCookie = function(name) {
        this.createCookie(name,"",-1);
    }

    // initializing script - take cookie string and splits it into objects list
    this.list = [];

    var list = decodeURIComponent(this.readCookie('fav_list'));

    if(list) {
        var THIS = this;
        $.each(list.split(','), function(key, value) {
            if(value === null || isNaN(1 * value)) {
                return;
            }
            THIS.list.push(1 * value);
        });
    }

    // inserts toggle link, marked as active if it is presented in the list
    this.link = function(id) {
        var THIS = this;
        if($.inArray(id, this.list) != -1)
        {
            return $("<a href=\"#\" id=\"fav_" + id + "\" class=\"a-fav a-fav-active\">Убрать из избранного</a>").bind("click", function() {
                THIS.linkClick(this, id);
                return false;
            });
        }
        else
        {
            return $("<a href=\"#\" id=\"fav_" + id + "\" class=\"a-fav\">Отложить в избранное</a>").bind("click", function() {
                THIS.linkClick(this, id);
                return false;
            });
        }
    }

    // inserts toggle link, marked as active if it is presented in the list
    this.linkList = function(id) {
        var THIS = this;
        return $("<a href=\"#\" id=\"fav_list_" + id + "\""+ ($.inArray(id, this.list) != -1 ? ' class="list-a-fav list-a-fav-active"' : ' class="list-a-fav"') + "></a>").bind("click", function() {
            THIS.linkClick(this, id);
            return false;
        });
    }

    // listener - observes for link CLICK events
    this.linkClick = function(link, id) {
        if($.inArray(id, this.list) == -1) {
            this.addEntry(id);
            $("#fav_" + id).addClass("a-fav-active");
            $("#fav_" + id).text("Убрать из избранного");
            $("#fav_list_" + id).addClass("list-a-fav-active");
        } else {
            this.removeEntry(id);
            $("#fav_" + id).removeClass("a-fav-active");
            $("#fav_" + id).text("Отложить в избранное");
            $("#fav_list_" + id).removeClass("list-a-fav-active");
        }
    }

    // adds entry to the list and cookie
    this.addEntry = function(id) {
        this.list.push(id);
        this.updateCookie();

        Favorites.totalShow(this.list.length > 0);
    }

    // removes entry from the list and cookie
    this.removeEntry = function(id) {
        if((pos = $.inArray(id, this.list)) == -1) {
            return;
        }
        this.list.splice(pos, 1);
        this.updateCookie();

        Favorites.totalShow(this.list.length >= 1);
    }

    // serializes the list values and writes it to cookie
    this.updateCookie = function() {
        this.createCookie("fav_list", this.list.join(','), this.days);
    }

    // displays link with number of selected entries
    this.totalLinkRef = null;
    this.totalLink = function(href) {

        if(this.totalLinkRef) {
            this.totalLinkRef.remove();
        }

        var link = $("<a id=\"total_link_ref\" href=\"" + href + "\" class=\"fav_total no-visited\">" + this.generateLinkText(this.list.length) + "</a> <small class=\"gray\">" + this.list.length + "</small>");
        return this.totalLinkRef = link;
    }

    // display span with number of selected entries
    this.totalSpan = function(prefix, postfix) {

        if(this.totalLinkRef) {
            this.totalLinkRef.remove();
        }

        var link = $((prefix !== undefined ? prefix : '') + "<span class=\"fav_total\" id=\"total_link_ref\">" + this.generateLinkText(this.list.length) + "</span>" + (postfix !== undefined ? postfix : ''));
        return this.totalLinkRef = link;
    }

    // generates text "You've got XX selected ads"
    this.generateLinkText = function(total) {

        if(!total) {
            return 'Избранных нет';
        }

        var mod10 = total % 10;
        var mod100 = total % 100;

        if(mod10 == 1 && mod100 != 11) {
            suff1 = 'ое';
            suff2 = 'е';
        } else if(mod10 >= 2 && mod10 <= 4 && (mod100 < 12 || mod100 > 14)) {
            suff1 = 'ых';
            suff2 = 'я';
        } else {
            suff1 = 'ых';
            suff2 = 'й';
        }

        return "Избранное";
    }

    this.favBlock = null;

    this.favUrl = null;

    this.setBlockData = function(block, url) {
        this.favBlock = block;
        this.favUrl = url;
    }

    this.isFavPage = null;

    this.setFavPage = function (favPage) {
        this.isFavPage = favPage;
    }

    this.totalShow = function(isLink) {

        if(this.isFavPage) {
            isLink = 0;
        }

        this.favBlock.children(".fav_total").detach();
        this.favBlock.prepend(isLink && this.list.length ? this.totalLink(this.favUrl) : this.totalSpan());

        if(this.list.length < 1) {
            this.favBlock.children(".fav_icons:eq(0)").empty();
        }

        this.updateIcons();
    }

    this.updateIcons = function() {

        //this.favBlock.children(".fav_icons:eq(0)").load("/ajax/fav-ad-icons");
    }

}