var _openstat = _openstat || [];
(function() {
    var O = "$Rev: 4336 $", q = "openstat.net", i = "openstat", b = _openstat, h = "rating.openstat.ru", d = "Openstat", G = "openstat.net";
    function B(ah) {
        var ag = 2147483647, ab = 36, ad = 1, af = 26, Y = 38, ac = 700, ae = 72, W = 128, am = "-", V = /[^\x20-\x7E]/, S = /[\x2E\u3002\uFF0E\uFF61]/g, X = ab - ad, ak = Math.floor, aj = String.fromCharCode;
        function al(aq, ao) {
            var ap = aq.length;
            var an = [];
            while (ap--) {
                an[ap] = ao(aq[ap])
            }
            return an
        }
        function U(an, ao) {
            an = an.replace(S, ".");
            var ap = an.split(".");
            return al(ap, ao).join(".")
        }
        function aa(aq) {
            var ap = [], ao = 0, ar = aq.length, at, an;
            while (ao < ar) {
                at = aq.charCodeAt(ao++);
                if (at >= 55296 && at <= 56319 && ao < ar) {
                    an = aq.charCodeAt(ao++);
                    if ((an & 64512) == 56320) {
                        ap.push(((at & 1023)<<10) + (an & 1023) + 65536)
                    } else {
                        ap.push(at);
                        ao--
                    }
                } else {
                    ap.push(at)
                }
            }
            return ap
        }
        function ai(ao, an) {
            return ao + 22 + 75 * (ao < 26) - ((an != 0)<<5)
        }
        function T(aq, ao, ap) {
            var an = 0;
            aq = ap ? ak(aq / ac) : aq>>1;
            aq += ak(aq / ao);
            for (; aq > X * af>>1; an += ab) {
                aq = ak(aq / X)
            }
            return ak(an + (X + 1) * aq / (aq + Y))
        }
        function Z(aA) {
            var aq, aC, ax, ao, ay, aw, ar, an, av, aE, aB, ap = [], au, at, aD, az;
            aA = aa(aA);
            au = aA.length;
            aq = W;
            aC = 0;
            ay = ae;
            for (aw = 0; aw < au; ++aw) {
                aB = aA[aw];
                if (aB < 128) {
                    ap.push(aj(aB))
                }
            }
            ax = ao = ap.length;
            if (ao) {
                ap.push(am)
            }
            while (ax < au) {
                for (ar = ag, aw = 0; aw < au; ++aw) {
                    aB = aA[aw];
                    if (aB >= aq && aB < ar) {
                        ar = aB
                    }
                }
                at = ax + 1;
                if (ar - aq > ak((ag - aC) / at)) {
                    throw RangeError()
                }
                aC += (ar - aq) * at;
                aq = ar;
                for (aw = 0; aw < au; ++aw) {
                    aB = aA[aw];
                    if (aB < aq&&++aC > ag) {
                        throw RangeError()
                    }
                    if (aB == aq) {
                        for (an = aC, av = ab; ; av += ab) {
                            aE = av <= ay ? ad : (av >= ay + af ? af : av - ay);
                            if (an < aE) {
                                break
                            }
                            az = an - aE;
                            aD = ab - aE;
                            ap.push(aj(ai(aE + az%aD, 0)));
                            an = ak(az / aD)
                        }
                        ap.push(aj(ai(an, 0)));
                        ay = T(aC, at, ax == ao);
                        aC = 0;
                        ++ax
                    }
                }
                ++aC;
                ++aq
            }
            return ap.join("")
        }
        return U(ah, function(an) {
            return V.test(an) ? "xn--" + Z(an) : an
        })
    }
    function r(T) {
        if (j(T)) {
            return false
        }
        var S;
        if (T.counter == 1) {
            S = window.location.hostname.toLowerCase().replace(/^www\./, "");
            try {
                S = B(S)
            } catch (U) {}
        } else {
            S = T.counter
        }
        o("//" + q + "/s/" + S + ".js");
        return true
    }
    function Q(U, T) {
        if (T) {
            for (var S in T) {
                U[S] = T[S]
            }
        }
        D(U);
        u(U);
        n(U);
        U.plugins.push({
            action: "plugin",
            fn: l
        });
        U.plugins.push({
            action: "plugin",
            fn: e
        });
        U.plugins.push({
            action: "plugin",
            fn: g
        });
        U.plugins.push({
            action: "plugin",
            fn: M
        });
        N(U);
        return true
    }
    function j(S) {
        if (b.seen[S.counter]) {
            return true
        }
        b.seen[S.counter] = true;
        return false
    }
    function D(V) {
        var Y = document;
        var Z = navigator;
        var S = window;
        var U = screen;
        V._cookie = 1;
        if (!Y.cookie) {
            Y.cookie = i + "_test=1; path=/";
            V._cookie = Y.cookie ? 1 : 0
        }
        if (parent != S) {
            try {
                V._referrer = parent.document.referrer || ""
            } catch (X) {}
        }
        if (V._referrer || V._referrer == "") {
            V._frame_referrer = Y.referrer || ""
        } else {
            V._referrer = Y.referrer || ""
        }
        V._location = S.location.href;
        V._title = Y.title;
        V._o_location = V._i_location = V._location;
        V._o_referer = V._i_referer = V._referer;
        V._o_title = V._i_title = V._title;
        V._frame = (parent.frames && parent.frames.length > 0) ? 1 : 0;
        V._flash = "";
        if (Z.plugins && Z.plugins["Shockwave Flash"]) {
            V._flash = Z.plugins["Shockwave Flash"].description.split(" ")[2]
        } else {
            if (S.ActiveXObject) {
                for (var T = 10; T >= 2; T--) {
                    try {
                        var W = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + T);
                        if (W) {
                            V._flash = T + ".0";
                            break
                        }
                    } catch (X) {}
                }
            }
        }
        if (U.colorDepth) {
            V._color_depth = U.colorDepth
        } else {
            if (U.pixelDepth) {
                V._color_depth = U.pixelDepth
            }
        }
        if (U.width && U.height) {
            V._screen = U.width + "x" + U.height
        }
        V._java_enabled = (Z.javaEnabled() ? "Y" : "N");
        V._html5 = c();
        V._part = H(V);
        V._protocol = Y.location.protocol;
        V._url_base = ((V._protocol == "https:") ? "https://" : "http://") + q;
        if (V.group) {
            V._url = V._url_base + "/c/" + V.group
        } else {
            V._url = V._url_base + "/cnt"
        }
        V._url += "?cid=" + V.counter
    }
    function c() {
        var T = "", U, S;
        S=!!window.HTMLCanvasElement;
        T += S ? "1" : "0";
        S = (navigator && navigator.geolocation);
        T += S ? "1" : "0";
        S = false;
        try {
            S = window.localStorage
        } catch (U) {}
        T += S ? "1" : "0";
        S=!!window.HTMLVideoElement;
        T += S ? "1" : "0";
        S=!!window.HTMLAudioElement;
        T += S ? "1" : "0";
        S=!!window.performance;
        T += S ? "1" : "0";
        return T
    }
    function N(S) {
        var T = S.queue = S.queue || [];
        T.opts = S;
        T.push = K;
        T.process = t;
        T.fn = L;
        T.push()
    }
    function n(S) {
        var T = S.plugins = S.plugins || [];
        T.push = K;
        T.process = t;
        T.fn = function(U) {
            return f(S, U)
        }
    }
    function L(T) {
        var S = this.opts;
        if (S.plugins.length > 0) {
            return false
        }
        if (typeof(T) == "string") {
            T = {
                url: T
            }
        }
        if (T.action == "data") {
            return A(S, T)
        } else {
            return s(S, T)
        }
    }
    function A(T, S) {
        T._part = H(T, S);
        T.pagelevel = 6;
        E(T, 1);
        return true
    }
    function f(U, T) {
        var V, W, S;
        if (T.fn) {
            return T.fn(U, T)
        }
        S = T.plugin;
        V = b.plugins[S] = b.plugins[S] || {};
        if (V.loaded) {
            return V.fn(U, T)
        }
        if (!V.loading) {
            V.loading = true;
            W = T.src || "//" + q + "/plugins/" + S + ".js";
            o(W)
        }
        return false
    }
    function s(U, T) {
        var S;
        if (!T ||!T.url) {
            return true
        }
        if (T.url.charAt(0) == "/") {
            T.url = document.location.protocol + "//" + document.location.host + T.url
        }
        if (T.referrer && T.referrer.charAt(0) == "/") {
            T.referrer = document.location.protocol + "//" + document.location.host + T.referrer
        }
        U._referrer = T.referrer || U._o_location;
        U._title = T.title || U._o_title;
        U._location = T.url;
        U._part = H(U, T);
        U._o_location = U._location;
        U._o_title = U._title;
        U.pagelevel = S;
        E(U, 0);
        return true
    }
    function l(T) {
        var S;
        T._location = T._i_location;
        T._referer = T._i_referer;
        T._title = T._i_title;
        T._part = H(T);
        T.pagelevel = S;
        E(T, 0);
        return true
    }
    function H(V, U) {
        var T, W, S;
        U = U || {};
        T = U.part || V.part;
        if (T) {
            T = T.replace(/^\s+/, "").replace(/\s+$/, "")
        }
        if (V.vars) {
            W = {};
            for (S in V.vars) {
                W[S] = V.vars[S]
            }
        }
        if (U.vars) {
            W = W || {};
            for (S in U.vars) {
                W[S] = U.vars[S]
            }
        }
        if (W && T) {
            W.part = T
        }
        if (W) {
            return I(W)
        }
        return T
    }
    function w(T, S, U) {
        var V = ((typeof(T.pagelevel) != "undefined") ? "&p=" + T.pagelevel : "") + "&c=" + T._cookie + "&fr=" + T._frame + "&fl=" + x(T._flash) + "&px=" + T._color_depth + "&wh=" + T._screen + "&j=" + T._java_enabled + "&t=" + (new Date()).getTimezoneOffset() + "&h5=" + T._html5;
        if (!T.skip_url) {
            V += "&pg=" + x(k(T._location, 2048 / U)) + "&r=" + x(k(T._referrer, 2048 / U));
            if (T._frame_referrer) {
                V += "&r1=" + x(k(T._frame_referrer, 2048 / U))
            }
            if (!S && U < 2) {
                V += "&title=" + x(k(T._title))
            }
        }
        if (T._part) {
            V += "&partname=" + x(T._part)
        }
        return V
    }
    function P(T, U) {
        var V, S;
        V = "&p=" + T.pagelevel + "&pg=" + x(k(T._location, 2048 / U));
        for (S in T._performance) {
            V += "&p" + S + "=" + T._performance[S]
        }
        return V
    }
    function E(X, U, S) {
        var V, Y, T, W = /(?:^|\.)sputnik\.ru$/;
        for (V = 1; V < 4; V++) {
            if (S) {
                Y = P(X, V)
            } else {
                Y = w(X, U, V)
            }
            if (Y.length < 1800) {
                break
            }
        }
        T = new Image();
        T.src = X._url + Y + "&rn=" + Math.random();
        if (X.nosync || U || S || window.location.hostname.match(W)) {
            T.onload = function() {
                return
            }
        } else {
            T.onload = function() {
                var ab = ["f", "b", "r"], aa, Z;
                for (aa = 0; aa < ab.length; aa++) {
                    if (!X["nosync_" + ab[aa]]) {
                        Z = new Image();
                        Z.src = X._url_base + "/sync/" + ab[aa] + ".gif";
                        Z.onload = function() {
                            return
                        }
                    }
                }
            }
        }
    }
    function u(V) {
        var T, S, U;
        if (typeof(V.image) == "undefined" && typeof(V.image_url) == "undefined") {
            return
        }
        T = document.getElementById(i + V.counter);
        if (!T) {
            if (typeof(V._onload_set) == "undefined") {
                V._onload_set = true;
                a(window, "load", function() {
                    u(V)
                })
            }
            return
        }
        if (typeof(V.image_url) == "undefined") {
            if (V.image < 1000) {
                V.image_url = "://" + G + "../images/" + V.image + ".gif";
                if (V.color) {
                    V.image_url += "?tc=" + V.color
                }
            } else {
                V.image_url = "://" + G + "/digits?cid=" + V.counter + "&ls=0&ln=" + V.image;
                if (V.color) {
                    V.image_url += "&tc=" + V.color
                }
            }
        }
        if (V.image_url.substring(0, 1) == ":") {
            V.image_url = "http" + (("https:" == V._protocol) ? "s" : "") + V.image_url
        }
        S = document.createElement("a");
        S.target = "_blank";
        S.href = "http://" + h + "/site/" + V.counter;
        U = document.createElement("img");
        U.alt = d;
        U.border = 0;
        U.src = V.image_url;
        S.appendChild(U);
        T.appendChild(S)
    }
    function e(S) {
        if (S.track_links == "none") {
            S.track_links = null
        }
        if (S.track_links || S.track_class) {
            a(window, "load", function() {
                J(S, S._url)
            })
        }
        return true
    }
    function J(U, S) {
        var T = (navigator.appVersion.indexOf("MSIE")!=-1) ? "click": "mousedown";
        a(document.body, T, function(V) {
            if (!V) {
                V = window.event
            }
            v(V, U, S)
        })
    }
    function v(Y, W, U) {
        var V;
        if (Y.target) {
            V = Y.target
        } else {
            if (Y.srcElement) {
                V = Y.srcElement
            }
        }
        if (V.nodeType == 3) {
            V = V.parentNode
        }
        var X = V.tagName.toString().toLowerCase();
        while (V.parentNode && V.parentNode.tagName && ((X != "a" && X != "area") ||!V.href)) {
            V = V.parentNode;
            X = V.tagName.toString().toLowerCase()
        }
        if (!V.href) {
            return
        }
        if (W.track_class) {
            var S = V.className.split("s");
            for (var T = 0; T < S.length; T++) {
                if (S[T] == W.track_class) {
                    W._referrer = document.location.href;
                    W._location = V.href;
                    W.pagelevel = 3;
                    E(W, 1);
                    return
                }
            }
        }
        if (!W.track_links || (W.track_links == "ext" && window.location.hostname == V.hostname)) {
            return
        }
        W._referrer = document.location.href;
        W._location = V.href;
        W.pagelevel = 3;
        E(W, 1)
    }
    function g(S) {
        if (window.performance && window.performance.timing) {
            a(window, "load", function() {
                setTimeout(function() {
                    R(S)
                }, 0)
            })
        }
        return true
    }
    function R(U) {
        var V = window.performance.timing, T = V.navigationStart, S;
        U._performance = {
            ues: V.unloadEventStart,
            uee: V.unloadEventEnd,
            rds: V.redirectStart,
            rde: V.redirectEnd,
            fs: V.fetchStart,
            dls: V.domainLookupStart,
            dle: V.domainLookupEnd,
            cs: V.connectStart,
            ce: V.connectEnd,
            rqs: V.requestStart,
            rss: V.responseStart,
            rse: V.responseEnd,
            dl: V.domLoading,
            di: V.domInteractive,
            dcs: V.domContentLoadedEventStart,
            dce: V.domContentLoadedEventEnd,
            dc: V.domComplete,
            les: V.loadEventStart,
            lee: V.loadEventEnd
        };
        for (S in U._performance) {
            if (U._performance[S] > 0) {
                U._performance[S] -= T
            } else {
                delete U._performance[S]
            }
        }
        U._location = U._i_location;
        U.pagelevel = 7;
        E(U, 1, 1)
    }
    function M(af) {
        var ak = 1, S = 2, al = 3, Y = 1, ah = 2, ag = 3, aj = false, ai = (function() {
            var ao = {};
            return {
                listen: function(ap, aq) {
                    if (!ao[ap]) {
                        ao[ap] = []
                    }
                    ao[ap].push(aq)
                },
                trigger: function(ap, ar, at) {
                    if (ao[ap]) {
                        for (var aq = 0; aq < ao[ap].length; aq++) {
                            ao[ap][aq](ar, at)
                        }
                    }
                }
            }
        })(), W = (function() {
            var ap = [], ao = function(ax, ar, aC, au) {
                au = au || {};
                var at, aB = [aC], av = au.interval || 1000, aq = au.intervalStep || 500, aA = au.maxTries || 15, az = 0, ay = function() {
                    az++;
                    at = null;
                    clearTimeout(at);
                    if (ar in ax) {
                        aw()
                    } else {
                        if (!aA || az < aA) {
                            at = setTimeout(ay, av);
                            av += aq
                        }
                    }
                }, aw = function() {
                    while (aB.length) {
                        aB.shift()(ax[ar])
                    }
                };
                ay();
                return {
                    obj: ax,
                    prop: ar,
                    addCallback: function(aD) {
                        aB.push(aD);
                        if (!at) {
                            aw()
                        }
                    }
                }
            };
            return function(au, aw, av, at) {
                var aq;
                for (var ar = 0; ar < ap.length; ar++) {
                    if (ap[ar].obj === au && ap[ar].prop === aw) {
                        aq = ap[ar];
                        aq.addCallback(av);
                        break
                    }
                }
                if (!aq) {
                    aq = ao.apply(null, arguments)
                }
            }
        })(), ad = {
            click: function() {
                ac(document, "mousedown", {
                    release: function(ap, aq) {
                        var ao;
                        if (!ap.target) {
                            return
                        }
                        z(af, "click", {
                            target: ab(ap.target),
                            type: ap.type,
                            num: aq.num
                        });
                        if (ao = X(ap.target, "href")) {
                            ai.trigger("clickLink", ap, {
                                href: ao
                            })
                        }
                    },
                    timeout: 200
                })
            },
            scroll: function() {
                ac(document, "scroll", {
                    step: function(aq, ar) {
                        var ao = aa(), ap;
                        if (!isNaN(ar.scrollTop)) {
                            ap = ao - ar.scrollTop;
                            ar[ap > 0 ? "down": "up"] = true
                        }
                        ar.distance = (ar.distance || 0) + Math.abs(ap || 0);
                        ar.scrollTop = ao
                    },
                    release: function(ao, ap) {
                        if (ap.duration > 50 && ap.distance > 10) {
                            z(af, "scroll", {
                                duration: ap.duration,
                                type: ap.down ? ap.up ? al: ak: ap.up ? S: undefined,
                                distance: ap.distance
                            })
                        }
                        ap.scrollTop = ap.distance = ap.up = ap.down = undefined
                    },
                    timeout: 500
                })
            },
            mousemove: function() {
                ac(document, "mousemove", {
                    step: function(ap, aq) {
                        var ao;
                        ap = ap || window.event;
                        if (isNaN(ap.clientX) || isNaN(ap.clientY)) {
                            return
                        }
                        ao = [ap.clientX, ap.clientY];
                        if (aq.point) {
                            aq.distance = (aq.distance || 0) + U(ao, aq.point)
                        }
                        aq.point = ao
                    },
                    release: function(ao, ap) {
                        if (ap.duration > 50 && ap.distance > 50) {
                            z(af, "mousemove", {
                                duration: ap.duration,
                                distance: ap.distance
                            });
                            ap.point = ap.distance = undefined
                        }
                    },
                    timeout: 500
                })
            },
            resize: function() {
                ac(window, "resize", {
                    release: function(ao, ap) {
                        z(af, "resize", {
                            duration: ap.duration
                        })
                    },
                    timeout: 500
                })
            },
            keypress: function() {
                ac(document, "keyup", {
                    step: function(ap, aq) {
                        var ao = ap.keyCode || ap.which;
                        aq[(ao < 48 || (ao > 90 && (ao < 96 || ao > 105))) ? "func": "chars"] = true
                    },
                    release: function(ao, ap) {
                        z(af, "keypress", {
                            duration: ap.duration,
                            num: ap.num,
                            type: ap.chars ? ap.func ? ag: Y: ap.func ? ah: undefined
                        });
                        ap.chars = null;
                        ap.func = null
                    },
                    timeout: 500
                })
            },
            focus: function() {
                ac(document, "focus", {
                    selector: "input,textarea,select",
                    release: function(ao) {
                        z(af, "focus", {
                            target: ab(ao.target || ao.srcElement)
                        })
                    }
                })
            },
            change: function() {
                ac(document, "change", {
                    selector: "input,textarea,select",
                    release: function(ao) {
                        z(af, "change", {
                            target: ab(ao.target || ao.srcElement)
                        })
                    }
                })
            },
            submit: function() {
                ac(document, "submit", {
                    selector: "form",
                    live: false,
                    release: function(ao) {
                        z(af, "submit", {
                            target: ab(ao.target || ao.srcElement)
                        })
                    }
                })
            },
            textselect: function() {
                var ao;
                ac(document, "mousedown keydown", {
                    release: function(ap, aq) {
                        ao = V()
                    }
                });
                ac(document, "mouseup keyup", {
                    release: function(aq, ar) {
                        var ap;
                        if ((ap = V()) && (!ao || ao != ap)) {
                            z(af, "textselect")
                        }
                    }
                })
            },
            clipboard: function() {
                ac(document, "copy cut", {
                    release: function() {
                        z(af, "copy")
                    }
                });
                ac(document, "paste", {
                    release: function() {
                        z(af, "paste")
                    }
                })
            },
            twitter: function() {
                var ao = /^https?:\/\/(?:www\.)?twitter\.com(?:.*)\/tweet/i;
                ai.listen("clickLink", function(ap, aq) {
                    if (aq.href.match(ao)) {
                        z(af, "twitter_tweet")
                    }
                });
                W(window, "twttr", function(ap) {
                    if (!ap.ready) {
                        return
                    }
                    ap.ready(function(aq) {
                        aq.events.bind("click", function() {
                            z(af, "twitter_click")
                        });
                        aq.events.bind("tweet", function() {
                            z(af, "twitter_tweet")
                        })
                    })
                })
            },
            facebook: function() {
                var ao = /^https?:\/\/(?:www\.)?facebook\.com(?:.*)\/share/i;
                ai.listen("clickLink", function(ap, aq) {
                    if (aq.href.match(ao)) {
                        z(af, "facebook_share")
                    }
                });
                W(window, "FB", function(ap) {
                    if (!ap.Event ||!ap.Event.subscribe) {
                        return
                    }
                    ap.Event.subscribe("edge.create", function() {
                        z(af, "facebook_like")
                    });
                    ap.Event.subscribe("xfbml.render", function() {
                        ac(document, "mouseover", {
                            selector: "iframe",
                            release: function(aq) {
                                var ar;
                                if (aq.target && (ar = X(aq.target, "src")) && ar.match(ao)) {
                                    z(af, "facebook_share")
                                }
                            }
                        })
                    })
                })
            },
            vkontakte: function() {
                var ao = /^https?:\/\/vk\.(?:com|ru)\/share\./i;
                ai.listen("clickLink", function(ap, aq) {
                    if (aq.href.match(ao)) {
                        z(af, "vkontakte_share")
                    }
                });
                W(window, "VK", function(ap) {
                    if (!ap ||!ap.Observer ||!ap.Observer.subscribe) {
                        return
                    }
                    ap.Observer.subscribe("widgets.like.liked", function() {
                        z(af, "vkontakte_like")
                    })
                })
            }
        }, Z = (window.jQuery && window.jQuery.fn && window.jQuery.fn.jquery && parseInt(window.jQuery.fn.jquery.toString().split(".").slice(0, 2).join("")) >= 17) ? window.jQuery: null, ae = window.performance || {}, T = function() {
            return ae.now ? ae.now() : new Date().getTime()
        };
        function ac(ar, ap, aq) {
            if (aq && aq.selector&&!aj && document.readyState != "complete") {
                a(window, "load", function() {
                    aj = true;
                    ac(ar, ap, aq)
                });
                return
            }
            var au;
            aq = aq || {};
            aq.d = aq.d || {};
            if (Z && aq.jquery !== false) {
                if (aq.selector) {
                    if (aq.live === false) {
                        Z(ar).find(aq.selector).on(ap, at)
                    } else {
                        Z(ar).on(ap, aq.selector, at)
                    }
                } else {
                    Z(ar).on(ap, at)
                }
            } else {
                au = ap.split(" ");
                if (aq.selector&&!(ar = am(ar, aq.selector))) {
                    return
                }
                while (au.length) {
                    ao(ar, au.shift(), !!aq.selector)
                }
            }
            function ao(aw, av, ay) {
                if (ay) {
                    for (var ax = 0; ax < aw.length; ax++) {
                        ao(aw[ax], av)
                    }
                    return
                }
                a(aw, av, at)
            }
            function at(av) {
                if (aq.timeout) {
                    clearTimeout(aq.d.timer);
                    if (!aq.d.start) {
                        aq.begin && aq.begin(aq.d)
                    }
                    aq.d.start = aq.d.start || T();
                    aq.d.num = (aq.d.num || 0) + 1;
                    aq.d.finish = T();
                    aq.d.timer = setTimeout(function() {
                        aq.d.duration = aq.d.finish - aq.d.start;
                        aq.release && aq.release(av, aq.d);
                        aq.d.start = null;
                        aq.d.finish = null;
                        aq.d.num = null
                    }, aq.timeout);
                    aq.step && aq.step(av, aq.d)
                } else {
                    aq.release && aq.release(av, aq.d)
                }
            }
        }
        function ab(ap) {
            var aq = ap.nodeName.toLocaleLowerCase(), ao = [aq];
            if ((aq == "input" || aq == "button") && ap.type) {
                ao.push(":", ap.type)
            }
            return ao.join("")
        }
        function aa() {
            return (typeof window.pageYOffset != "undefined") ? window.pageYOffset : (document.documentElement.clientHeight ? document.documentElement : document.body).scrollTop
        }
        function U(ap, ao) {
            return Math.round(Math.sqrt(Math.pow(ap[1] - ao[1], 2) + Math.pow(ap[0] - ao[0], 2)))
        }
        function am(av, ao) {
            var ar, aq, au, ap = (arguments.callee.cache || (arguments.callee.cache = {}));
            if (ap[ao] && ap[ao].node === av) {
                return ap[ao].res
            }
            if (av.querySelectorAll) {
                au = av.querySelectorAll(ao)
            } else {
                if (av.getElementsByTagName) {
                    ar = ao.split(",");
                    au = [];
                    while (ar.length) {
                        aq = av.getElementsByTagName(ar.shift());
                        for (var at = 0; at < aq.length; at++) {
                            au.push(aq[at])
                        }
                    }
                }
            }
            ap[ao] = {
                node: av,
                res: au
            };
            return au
        }
        function V() {
            var ao = "";
            if (typeof window.getSelection != "undefined") {
                ao = window.getSelection().toString()
            } else {
                if (typeof document.selection != "undefined" && document.selection.type == "Text") {
                    ao = document.selection.createRange().text
                }
            }
            return ao
        }
        function X(ap, ao) {
            return ap.getAttribute ? ap.getAttribute(ao) : ap[ao]
        }
        if (typeof(af.behavior) == "undefined") {
            af.behavior = true
        }
        if (af.behavior) {
            for (var an in ad) {
                if (ad.hasOwnProperty(an)) {
                    ad[an]()
                }
            }
            af.$ = Z
        }
        return true
    }
    function C() {
        var T = new Date().getTime(), S = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(V) {
            var U = (T + Math.random() * 16)%16 | 0;
            T = Math.floor(T / 16);
            return (V == "x" ? U : (U & 3 | 8)).toString(16)
        });
        return S
    }
    function m(T, S, V, U) {
        var W = "&p=8&pg=" + x(k(T._i_location, 2048 / U)) + "&pvid=" + T.pageview_id + "&name=" + S;
        if (V) {
            if (V.duration) {
                V.duration = Math.round(V.duration)
            }
            W += "&data=" + x(window.JSON && window.JSON.stringify ? window.JSON.stringify(V) : T.$ ? T.$.toJSON(V) : "")
        }
        return W
    }
    function z(V, T, W) {
        var U, X, S;
        if (!V.pageview_id) {
            V.pageview_id = C()
        }
        for (U = 1; U < 4; U++) {
            X = m(V, T, W, U);
            if (X.length < 1800) {
                break
            }
        }
        S = new Image();
        S.src = V._url + X + "&rn=" + Math.random();
        S.onload = function() {
            return
        }
    }
    function a(U, S, T) {
        if (U.addEventListener) {
            U.addEventListener(S, T, false)
        } else {
            if (U.attachEvent) {
                U.attachEvent("on" + S, T)
            }
        }
    }
    function k(T, S) {
        if (!T) {
            return T
        }
        if (!S) {
            S = 250
        }
        if (T.length > S) {
            var U = T.indexOf("?");
            if (U!=-1) {
                T = T.slice(0, U)
            }
        }
        if (T.length > S) {
            T = T.substring(0, S)
        }
        return T
    }
    function x(V) {
        if (typeof(encodeURIComponent) == "function") {
            return encodeURIComponent(V)
        }
        var W = "";
        var T = V.length;
        for (var U = 0; U < T; U++) {
            var S = V.charCodeAt(U);
            if (S < 128) {
                W += escape(V.charAt(U));
                continue
            }
            S = S.toString(16);
            W += "%u" + p(S.toUpperCase(), 4, "0")
        }
        return W
    }
    function p(X, S, W) {
        var V = X.length;
        if (V >= S) {
            return X
        }
        var U = S - V;
        for (var T = 0; T < U; T++) {
            X = W + X
        }
        return X
    }
    function I(T) {
        var S, V, W = [], U, Y, X = {};
        switch (typeof(T)) {
            case"number":
            case"boolean":
            case"null":
                return isFinite(T) ? String(T) : "null";
            case"string":
                V = "";
                for (U = 0; U < T.length; U++) {
                    Y = T.charAt(U);
                    if (Y < " " || Y == ":" || Y == "\\") {
                        Y = Y.charCodeAt(0).toString(16);
                        V += "\\x" + p(Y, 2, "0")
                    } else {
                        V += Y
                    }
                }
                return V;
            case"object":
                if (!T) {
                    return "null"
                }
                for (S in T) {
                    if (T[S] !== X[S]) {
                        V = I(T[S]);
                        if (V) {
                            W[W.length] = I(S) + ":" + V
                        }
                    }
                }
                return ":" + W.join(":");
            default:
                return ""
        }
    }
    function o(W) {
        var V = document, U = document.location.protocol, S, T;
        S = V.createElement("script");
        S.async = true;
        S.type = "text/javascript";
        S.src = ("https:" == U ? "https:" : "http:") + W;
        T = V.getElementsByTagName("script")[0];
        T.parentNode.insertBefore(S, T)
    }
    function K() {
        var S;
        for (S = 0; S < arguments.length; S++) {
            this[this.length] = arguments[S]
        }
        this.process()
    }
    function t() {
        var T, S, U;
        for (T = 0; T < this.length; T++) {
            if (!this.fn(this[T])) {
                break
            }
        }
        for (S = 0; T < this.length; S++, T++) {
            this[S] = this[T]
        }
        this.length = S;
        if (this.fnpost) {
            this.fnpost()
        }
    }
    function y() {
        var S = b;
        if (S.plugins) {
            return
        }
        S.plugins = {};
        S.seen = {};
        S.loading = {};
        S.counters = [];
        S.push = K;
        S.process = t;
        S.fn = function(T) {
            if (T.action == "plugin.loaded") {
                this.plugins[T.plugin].loaded = true;
                this.plugins[T.plugin].fn = T.fn
            }
            if (T.action == "counter") {
                if (r(T)) {
                    this.loading[T.counter] = T
                }
            }
            if (T.action == "cfg") {
                if (Q(this.loading[T.cid], T.data)) {
                    this.counters[this.counters.length] = this.loading[T.cid]
                }
            }
            return true
        };
        S.fnpost = function() {
            var T, U;
            for (T = 0; T < this.counters.length; T++) {
                U = this.counters[T];
                U.plugins.push();
                U.queue.push()
            }
            return true
        };
        S.push()
    }
    function F() {
        var S = window[i];
        while (S) {
            S.action = "counter";
            b.push(S);
            S = S.next
        }
        window[i] = S
    }
    y();
    F()
})();

