(function(g, f, K) {
    var V;
    function F(a, b) {
        return function() {
            try {
                return a.apply(this, arguments)
            } catch (c) {
                oa(c, b)
            }
        }
    }
    function oa(a, b) {
        if (0.01 > Math.random())
            try {
                (new X).log("jserrs", fa, a.message, b, x.href, L, "string" == typeof a.stack && a.stack.replace(/\n/g, "\\n"))
            } catch (c) {
                var d = ["cp: " + b, a.name + ": " + a.message, "debug: " + L, "code: " + fa, "stack: " + a.stack];
                (new Image).src = "//an.yandex.ru/jserr/101500?cnt-class=100&errmsg=" + encodeURIComponent(d.join("; ").replace(/\r?\n/g, "\\n"))
            }
    }
    function w() {
        for (var a = {}, b = "hash host hostname href pathname port protocol search".split(" "),
                 c = b.length, d = c; d--;)
            a[b[d]] = "";
        try {
            for (var e = g.location, d = c; d--;) {
                var I = b[d];
                a[I] = "" + e[I]
            }
        } catch (f) {
            x && (a = x)
        }
        return a
    }
    function kb(a) {
        return a ? ("" + a).replace(/^\s+/, "").replace(/\s+$/, "") : ""
    }
    function ga(a) {
        return - 1 !== ("" + g.navigator.userAgent).toLowerCase().search(a)
    }
    function pa(a, b) {
        if (!a ||!b)
            return !1;
        for (var c = [], d = 0; d < b.length; d++)
            c.push(b[d].replace(/\^/g, "\\^").replace(/\$/g, "\\$").replace(/\./g, "\\.").replace(/\[/g, "\\[").replace(/\]/g, "\\]").replace(/\|/g, "\\|").replace(/\(/g, "\\(").replace(/\)/g,
                "\\)").replace(/\?/g, "\\?").replace(/\*/g, "\\*").replace(/\+/g, "\\+").replace(/\{/g, "\\{").replace(/\}/g, "\\}"));
        return RegExp("\\.(" + c.join("|") + ")$", "i").test(a)
    }
    function Ka(a) {
        a = a.target || a.srcElement;
        if (!a)
            return !1;
        3 == a.nodeType && (a = a.parentNode);
        for (var b = a.nodeName.toString().toLowerCase(); a.parentNode && a.parentNode.nodeName && ("a" != b && "area" != b ||!a.href);)
            a = a.parentNode, b = a.nodeName.toString().toLowerCase();
        return a.href ? a : !1
    }
    function La(a, b) {
        return (a ? a.replace(/^www\./, "") : "") == (b ? b.replace(/^www\./,
                "") : "")
    }
    function Ma(a, b) {
        function c(a) {
            a = a.split(":");
            a = a[1] || "";
            a = a.replace(/^\/*/, "").replace(/^www\./, "");
            return a.split("/")[0]
        }
        return a && b ? c(a) == c(b) : a || b?!1 : !0
    }
    function qa() {
        var a = g.performance || g.webkitPerformance, b = [];
        if (a = a && a.timing) {
            var c = a.navigationStart;
            if (c)
                for (b = [a.domainLookupEnd - a.domainLookupStart, a.connectEnd - a.connectStart, a.responseStart - a.requestStart, a.responseEnd - a.responseStart, a.fetchStart - c, a.redirectEnd - a.redirectStart, a.redirectCount], b.push(a.domInteractive && a.domLoading ?
                a.domInteractive - a.domLoading : null), b.push(a.domContentLoadedEventStart && a.domContentLoadedEventEnd ? a.domContentLoadedEventEnd - a.domContentLoadedEventStart : null), b.push(a.domComplete ? a.domComplete - c : null), b.push(a.loadEventStart ? a.loadEventStart - c : null), b.push(a.loadEventStart && a.loadEventEnd ? a.loadEventEnd - a.loadEventStart : null), b.push(a.domContentLoadedEventStart ? a.domContentLoadedEventStart - c : null), a = 0; a < b.length; a++)
                    c = b[a], null !== c && (0 > c || 36E5 < c) && (b[a] = null)
        }
        return b
    }
    function Na(a) {
        var b = [],
            c = a._lastPerformanceTiming, d = qa();
        if (c)
            for (var e = 0, g = c.length; e < g; e++)
                null === d[e] ? b.push(d[e]) : b.push(c[e] === d[e] ? "" : d[e]);
        else
            b = d;
        a._lastPerformanceTiming = d;
        return b.join(",")
    }
    function Oa() {
        var a;
        if ("object" == typeof g.chrome && g.chrome.loadTimes) {
            if (a = g.chrome.loadTimes(), a.requestTime && a.firstPaintTime)
                return ~~(1E3 * (a.firstPaintTime - a.requestTime))
        } else if (g.performance && g.performance.timing && (a = g.performance.timing, a.navigationStart && a.msFirstPaint))
            return a.msFirstPaint - a.navigationStart;
        return null
    }
    function Pa(a) {
        var b = f.referrer || "";
        if (RegExp("^https?://" + x.host + "/").test(b))
            return !1;
        for (var c = a.patterns, d = 0; d < c.length; d++)
            if (b.match(RegExp(c[d], "i"))) {
                var e = a.params || [];
                if (e.length)
                    for (var g = Q((RegExp.$1 || "").replace(/\+/g, "%20")), p = 0; p < e.length; p++) {
                        if (g == Q(e[p]))
                            return !0
                    } else
                    return !0
            }
        return !1
    }
    function ra(a, b) {
        var c=!1;
        if (a && "string" != typeof a && a.length)
            for (var d = 0; d < a.length; d++) {
                var e = a[d].selector, g = a[d].text, p = e.charAt(0), e = e.slice(1);
                if ("#" == p) {
                    if (p = f.getElementById(e))
                        c=!0, b && R.unshift([p,
                            p.innerHTML]), p.innerHTML = g
                } else if ("." == p)
                    for (p = l.getElementsByClassName(e), e = 0; e < p.length; e++) {
                        var c=!0, h = p[e], k = g;
                        b && R.unshift([h, h.innerHTML]);
                        h.innerHTML = k
                    }
            }
        return c
    }
    function sa() {
        for (var a = 0; a < R.length; a++)
            R[a][0].innerHTML = R[a][1]
    }
    function Qa(a, b) {
        var c, d, e = "", g;
        a = a && a.replace(/^\?/, "");
        b = b && b.replace(/^#/, "") || "";
        if (a)
            for (d = a.split("&"), c = 0; c < d.length; c++)
                g = d[c].split("="), "_openstat" === g[0] && (e = g[1]);
        var f = b.split("?");
        for (c = 0; c < f.length; c++) {
            var h = f[c].split("&");
            for (d = 0; d < h.length; d++)
                g =
                    h[d].split("="), "_openstat" === g[0] && (e = g[1])
        }
        e && (e =- 1 < e.indexOf(";") ? Q(e) : Ra(e.replace(/[-*_]/g, function(a) {
            return {
                    "*": "+",
                    "-": "/",
                    _: "="
                }
                    [a] || a
        })));
        return e && (c = e.split(";"), 4 == c.length) ? {
            service: c[0],
            campaign: c[1],
            ad: c[2],
            source: c[3]
        } : null
    }
    function Q(a) {
        try {
            return decodeURIComponent(a)
        } catch (b) {
            return ""
        }
    }
    function Ra(a) {
        for (; a.length%4;)
            a += "=";
        var b, c, d, e, g, f = 0, h = "";
        do {
            b = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(f++));
            c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(f++));
            e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(f++));
            g = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".indexOf(a.charAt(f++));
            if (0 > b || 0 > c || 0 > e || 0 > g)
                return null;
            d = b<<18 | c<<12 | e<<6 | g;
            b = d>>16 & 255;
            c = d>>8 & 255;
            d&=255;
            h = 64 == e ? h + String.fromCharCode(b) : 64 == g ? h + String.fromCharCode(b, c) : h + String.fromCharCode(b, c, d)
        }
        while (f < a.length);
        a = h;
        e = "";
        for (b = h = f = g = 0; g < a.length;)
            f = a.charCodeAt(g), 128 > f ? (e += String.fromCharCode(f), g++) : 191 < f && 224 > f ? (h = a.charCodeAt(g +
            1), e += String.fromCharCode((f & 31)<<6 | h & 63), g += 2) : (h = a.charCodeAt(g + 1), b = a.charCodeAt(g + 2), e += String.fromCharCode((f & 15)<<12 | (h & 63)<<6 | b & 63), g += 3);
        return e
    }
    function ta(a) {
        try {
            delete g[a]
        } catch (b) {
            g[a] = K
        }
    }
    function ua(a) {
        var b = f.createElement("script");
        b.type = "text/javascript";
        b.async=!0;
        b.src = a;
        try {
            var c = f.getElementsByTagName("html")[0];
            f.getElementsByTagName("head")[0] || c.appendChild(f.createElement("head"));
            var d = f.getElementsByTagName("head")[0];
            d.insertBefore(b, d.firstChild)
        } catch (e) {}
    }
    function Sa(a,
                b, c, d, e, I) {
        function p(a) {
            var b = (new Date).getTime();
            a && b < a && (Ta += a - b + P);
            h.setTimeout(function() {
                p(b)
            }, P, "timeCorrector")
        }
        function S() {
            var a = (new Date).getTime() + Ta;
            a < Ua && (a = Ua + P / 2);
            return Ua = a
        }
        function r() {
            return Math.round((S() - jb) / O)
        }
        function s(a, b) {
            b = Math.max(0, Math.min(b, 65535));
            h.mergeArrays(a, [b>>8, b & 255])
        }
        function q(a, b) {
            h.mergeArrays(a, [b & 255])
        }
        function m(a, b) {
            for (b = Math.max(0, b | 0); 127 < b;)
                h.mergeArrays(a, [b & 127 | 128]), b>>=7;
            h.mergeArrays(a, [b])
        }
        function u(a, b) {
            255 < b.length && (b = b.substr(0, 255));
            h.mergeArrays(a, [b.length]);
            for (var c = 0; c < b.length; c++)
                s(a, b.charCodeAt(c))
        }
        function t(a, b) {
            m(a, b.length);
            for (var c = 0; c < b.length; c++)
                m(a, b.charCodeAt(c))
        }
        function x(a, b, c, d, e, g) {
            for (; c && (!c.offsetWidth ||!c.offsetHeight);)
                c = l.getElementParent(c);
            if (!c)
                return null;
            var f = c[A];
            if (!f || 0 > f)
                return null;
            var h = {
                mousemove: X,
                click: Ia,
                dblclick: Ja,
                mousedown: fa,
                mouseup: Ga,
                touch: na
            }
                [b];
            if (!h)
                return null;
            var p = l.getElementXY(c);
            c = [];
            q(c, h);
            m(c, a);
            m(c, f);
            m(c, Math.max(0, d[0] - p[0]));
            m(c, Math.max(0, d[1] - p[1]));
            /^mouse(up|down)|click$/.test(b) &&
            (a = e || g, q(c, 2 > a ? Ka : a == (e ? 2 : 4) ? Ma : La));
            return c
        }
        function C(a, b, c, d) {
            b = b[A];
            if (!b || 0 > b)
                return null;
            var e = [];
            q(e, Ha);
            m(e, a);
            m(e, b);
            m(e, c[0]);
            m(e, c[1]);
            q(e, 0);
            q(e, 0);
            q(e, d);
            return e
        }
        function D(a, b) {
            var c = [];
            q(c, da);
            m(c, a);
            m(c, b[0]);
            m(c, b[1]);
            return c
        }
        function H(a, b, c) {
            var d = [];
            c = c[A];
            if (!c || 0 > c)
                return null;
            q(d, ea);
            m(d, a);
            m(d, b[0]);
            m(d, b[1]);
            m(d, c);
            return d
        }
        function E(a, b, c) {
            var d = [];
            q(d, Ea);
            m(d, a);
            m(d, b[0]);
            m(d, b[1]);
            m(d, c[0]);
            m(d, c[1]);
            return d
        }
        function B(a, b, c, d) {
            var e = [];
            q(e, ga);
            m(e, a);
            s(e, b);
            q(e,
                c);
            a = d[A];
            if (!a || 0 > a)
                a = 0;
            m(e, a);
            return e
        }
        function U(a, b) {
            var c, d;
            0 == b.length ? d = c = "" : 100 >= b.length ? (c = b, d = "") : 200 >= b.length ? (c = b.substr(0, 100), d = b.substr(100)) : (c = b.substr(0, 97), d = b.substr(b.length - 97));
            var e = [];
            q(e, Fa);
            m(e, a);
            t(e, c);
            t(e, d);
            return e
        }
        function y(a) {
            var b = [];
            q(b, ua);
            m(b, a);
            return b
        }
        function $(a) {
            var b = [];
            q(b, pa);
            m(b, a);
            return b
        }
        function M(a) {
            var b = [];
            q(b, qa);
            m(b, a);
            return b
        }
        function Cb(a, b) {
            var c = [];
            q(c, ra);
            m(c, a);
            m(c, b[A]);
            return c
        }
        function Db(a, b) {
            var c = [];
            q(c, sa);
            m(c, a);
            m(c, b[A]);
            return c
        }
        function aa(a, b, c) {
            var d = [];
            q(d, ta);
            m(d, a);
            m(d, b[A]);
            u(d, String(c));
            return d
        }
        function Y(a) {
            var b = a[A];
            if (!b || 0 > b ||!/^INPUT|SELECT|TEXTAREA$/.test(a.nodeName) ||!a.form || l.classNameExists(a.form, "-metrika-noform"))
                return null;
            var c = l.getFormNumber(a.form);
            if (0 > c)
                return null;
            var d;
            d = "INPUT" == a.nodeName ? {
                text: 0,
                color: 0,
                date: 0,
                datetime: 0,
                "datetime-local": 0,
                email: 0,
                number: 0,
                range: 0,
                search: 0,
                tel: 0,
                time: 0,
                url: 0,
                month: 0,
                week: 0,
                password: 2,
                radio: 3,
                checkbox: 4,
                file: 6,
                image: 7
            }
                [a.type] : {
                SELECT: 1,
                TEXTAREA: 5
            }
                [a.nodeName];
            if ("number" != typeof d)
                return null;
            for (var e =- 1, g = a.form.elements, f = g.length, h = 0, p = 0; h < f; h++)
                if (g[h].name == a.name) {
                    if (g[h] == a) {
                        e = p;
                        break
                    }
                    p++
                }
            if (0 > e)
                return null;
            g = [];
            q(g, ja);
            m(g, b);
            m(g, c);
            m(g, d);
            t(g, a.name || "");
            m(g, e);
            return g
        }
        function N(a, b) {
            var c = l.getFormNumber(b);
            if (0 > c)
                return null;
            for (var d = b.elements, e = d.length, g = [], f = 0; f < e; f++)
                if (!l.isEmptyField(d[f])) {
                    var p = d[f][A];
                    p && 0 < p && h.mergeArrays(g, [p])
                }
            d = [];
            q(d, ma);
            m(d, a);
            m(d, c);
            m(d, g.length);
            for (c = 0; c < g.length; c++)
                m(d, g[c]);
            return d
        }
        function v() {
            var a =
                [];
            q(a, oa);
            return a
        }
        function n(a, b, c) {
            a = a.apply(g, b);
            ca.append(a, c)
        }
        function z(a) {
            if (a[A])
                a: {
                    var b = r(), c = a[A];
                    if (0 < c) {
                        var d = [];
                        a = l.getElementRegion(a);
                        var e = va[c], g = a[0] + "x" + a[1], f = a[2] + "x" + a[3];
                        g != e.pos && (e.pos = g, q(d, ka), m(d, b), m(d, c), m(d, a[0]), m(d, a[1]));
                        f != e.size && (e.size = f, q(d, la), m(d, b), m(d, c), m(d, a[2]), m(d, a[3]));
                        if (d.length) {
                            a = d;
                            break a
                        }
                    }
                    a = null
                } else {
                (c = l.getElementParent(a)) && z(c);
                a[A] = Va;
                va[Va] = {};
                Va++;
                if (a.nodeName)
                    if (c =+ a[A], !isFinite(c) || 0 >= c)
                        b = null;
                    else {
                        var d = Qa, e = 0, h = l.getElementParent(a),
                            g = h && h[A] ? h[A]: 0;
                        0 > g && (g = 0);
                        var f = a.nodeName.toUpperCase(), p = ib[f];
                        p || (d|=Na);
                        var I = l.getElementNeighborPosition(a);
                        I || (d|=Oa);
                        var v = l.getElementRegion(a);
                        (h = h ? l.getElementRegion(h) : null) && v[0] == h[0] && v[1] == h[1] && v[2] == h[2] && v[3] == h[3] && (d|=lb);
                        va[c].pos = v[0] + "x" + v[1];
                        va[c].size = v[2] + "x" + v[3];
                        a.id && "string" == typeof a.id && (d|=mb);
                        (h = l.calcTextChecksum(a)) && (d|=Pa);
                        var k = l.calcAttribChecksum(a);
                        k && (e|=Ra);
                        var n;
                        b:
                        {
                            n = l.getElementChildren(l.getElementParent(a), a.tagName);
                            for (var S = 0; S < n.length; S++)
                                if ((!n[S].id ||
                                    "string" != typeof n[S].id) && l.calcAttribChecksum(n[S]) == k && l.calcTextChecksum(n[S]) == h) {
                                    n=!0;
                                    break b
                                }
                            n=!1
                        }
                        n && (d|=nb, b = l.calcChildrenChecksum(a));
                        n = [];
                        q(n, W);
                        m(n, c);
                        q(n, d);
                        m(n, g);
                        p ? q(n, p) : u(n, f);
                        I && m(n, I);
                        d & lb || (m(n, v[0]), m(n, v[1]), m(n, v[2]), m(n, v[3]));
                        d & mb && u(n, a.id);
                        h && s(n, h);
                        d & nb && s(n, b);
                        q(n, e);
                        k && s(n, k);
                        b = n
                    } else
                    a[A] =- 1, b = null;
                ca.append(b, void 0);
                a = Y(a)
            }
            ca.append(a, void 0)
        }
        function J(a) {
            var b = G.getTarget(a);
            if (b && "SCROLLBAR" != b.nodeName) {
                if (b && /^INPUT|SELECT|TEXTAREA|BUTTON$/.test(b.tagName))
                    if (b[A])
                        z(b);
                    else {
                        var c = b.form;
                        if (c)
                            for (var c = c.elements, d = c.length, e = 0; e < d; e++)
                                /^INPUT | SELECT | TEXTAREA | BUTTON$ / .test(c[e].tagName)&&!c[e][A] && z(c[e]);
                        else
                            z(b)
                    } else
                    z(b);
                n(x, [r(), a.type, b, G.getPos(a), a.which, a.button])
            }
        }
        function wa(a) {
            J(a);
            a: {
                var b, c;
                g.getSelection ? (a = g.getSelection(), b = a.toString(), c = a.anchorNode) : f.selection && f.selection.createRange && (a = f.selection.createRange(), b = a.text, c = a.parentElement());
                if ("string" == typeof b) {
                    try {
                        for (; c && 1 != c.nodeType;)
                            c = c.parentNode
                    } catch (d) {
                        break a
                    }
                    c && Wa(c) || c && (/(?:^|\s)-metrika-nokeys(?:\s|$)/.test(c.className) ||
                    l.getElementsByClassName("-metrika-nokeys", c).length) || b == Xa || (Xa = b, n(U, [r(), b]))
                }
            }
        }
        function ob(a) {
            var b = S(), c = b - pb;
            if (!(c < ba)) {
                var d = G.getPos(a), e = Za[0] - d[0], g = Za[1] - d[1], e = e * e + g * g;
                0 >= e || 16 > e && 100 > c || 20 > c && 256 > e || (pb = b, Za = d, J(a))
            }
        }
        function xa() {
            var a = l.getDocumentScroll(), b = S();
            b - qb < ba || 10 > Math.abs(a[0] - $a[0]) && 10 > Math.abs(a[1] - $a[1]) || (qb = b, $a = a, n(D, [r(), a]))
        }
        function rb(a) {
            a = G.getTarget(a);
            var b = Math.random(), c = [a.scrollLeft, a.scrollTop];
            if (a.localId) {
                if (b = ab[a.localId], !b || 10 > Math.abs(c[0] - b[0]) &&
                    10 > Math.abs(c[1] - b[1]))
                    return
            } else {
                for (; ab[b];)
                    b = Math.random();
                a.localId = b
            }
            ab[a.localId] = c;
            a !== f && (z(a), n(H, [r(), c, a]))
        }
        function bb() {
            n(E, [r(), l.getViewportSize(), l.getDocumentSize()])
        }
        function ya() {
            n(v, [], !0)
        }
        function sb(a) {
            return (a.shiftKey ? tb : 0) | (a.ctrlKey ? cb : 0) | (a.altKey ? ub : 0) | (a.metaKey ? Sa : 0) | (a.ctrlKey || a.altKey ? za : 0)
        }
        function Wa(a) {
            return "INPUT" == a.tagName ? "password" == a.type || a.name && vb.test(a.name) || a.id && vb.test(a.id) : !1
        }
        function wb(a, b, c) {
            a = G.getTarget(a);
            Wa(a) || /(?:^|\s)-metrika-nokeys(?:\s|$)/.test(a.className) ||
            (z(a), n(B, [r(), b, c, a]))
        }
        function xb(a) {
            var b = a.keyCode, c = sb(a);
            if ({
                    3: 1,
                    8: 1,
                    9: 1,
                    13: 1,
                    16: 1,
                    17: 1,
                    18: 1,
                    19: 1,
                    20: 1,
                    27: 1,
                    33: 1,
                    34: 1,
                    35: 1,
                    36: 1,
                    37: 1,
                    38: 1,
                    39: 1,
                    40: 1,
                    45: 1,
                    46: 1,
                    91: 1,
                    92: 1,
                    93: 1,
                    106: 1,
                    110: 1,
                    111: 1,
                    144: 1,
                    145: 1
                }
                    [b] || 112 <= b && 123 >= b || 96 <= b && 105 >= b || c & za)
                19 == b && (c&~za) == cb && (b = 144), wb(a, b, c | za), db=!1, h.setTimeout(function() {
                    db=!0
                }, 1), 67 == b && c & cb&&!(c & ub || c & tb) && eb()
        }
        function yb(a) {
            db&&!fb && 0 !== a.which && (wb(a, a.charCode || a.keyCode, sb(a)), fb=!0, h.setTimeout(function() {
                fb=!1
            }, 1))
        }
        function eb() {
            gb || (gb=!0,
            Xa && n(y, [r()]), h.setTimeout(function() {
                gb=!1
            }, 1))
        }
        function hb() {
            ha || (ha=!0, n($, [r()]))
        }
        function ia() {
            ha && (ha=!1, n(M, [r()]))
        }
        function zb(a) {
            (!ha || a&&!a.fromElement) && hb()
        }
        function Ab(a) {
            a&&!a.toElement && ia()
        }
        function Aa(a) {
            if ((a = G.getTarget(a)) && /^INPUT|SELECT|TEXTAREA|BUTTON$/.test(a.tagName)) {
                if (a[A])
                    z(a);
                else {
                    var b = a.form;
                    if (b)
                        for (var b = b.elements, c = b.length, d = 0; d < c; d++)
                            /^INPUT | SELECT | TEXTAREA | BUTTON$ / .test(b[d].tagName)&&!b[d][A] && z(b[d]);
                    else
                        z(a)
                }
                n(Cb, [r(), a])
            }
        }
        function K(a) {
            (a = G.getTarget(a)) &&
            /^INPUT|SELECT|TEXTAREA|BUTTON$/.test(a.tagName) && (z(a), n(Db, [r(), a]))
        }
        function V(a) {
            a = G.getTarget(a);
            if (!(Wa(a) || a && /(?:^|\s)-metrika-nokeys(?:\s|$)/.test(a.className)) && a && /^INPUT|SELECT|TEXTAREA$/.test(a.tagName)) {
                var b = /^(checkbox|radio)$/.test(a.type) ? a.checked: a.value;
                z(a);
                n(aa, [r(), a, b])
            }
        }
        function Q(a) {
            a = G.getTarget(a);
            if (!l.classNameExists(a, "-metrika-noform") && "FORM" == a.nodeName) {
                for (var b = a.elements, c = 0; c < b.length; c++)
                    l.isEmptyField(b[c]) || z(b[c]);
                n(N, [r(), a], !0)
            }
        }
        function R(a) {
            xa();
            if (a.touches &&
                a.touches.length) {
                var b = G.getTarget(a);
                L = typeof b + " - " + String(b);
                if (b && b != f) {
                    z(b);
                    for (var c = 0; c < a.touches.length; c++)
                        n(x, [r(), "touch", b, [a.touches[c].pageX, a.touches[c].pageY], 0, 0])
                }
            }
        }
        function Z(a) {
            var b = G.getTarget(a);
            if (b) {
                var c;
                "wheel" == a.type ? c = 0 < a.deltaY ? 1 : 0 > a.deltaY ? 2 : 0 : "mousewheel" == a.type && (c = 0 < a.wheelDelta ? 2 : 0 > a.wheelDelta ? 1 : 0);
                c && (z(b), n(C, [r(), b, G.getPos(a), c]))
            }
        }
        function T(a) {
            (a = G.getTarget(a)) && "BODY" == a.tagName && ca.append([], !0)
        }
        var ca = new Bb({
                protocol: a,
                counterId: b,
                counterType: c,
                meta: {
                    url: w().href,
                    hitId: e,
                    timezone: Ba,
                    timestamp: Ca
                }
            }), P = 20, O = 50, ba = 10, W = 1, X = 2, da = 3, ea = 16, fa = 4, ga = 5, ja = 7, ka = 9, la = 10, ma = 11, na = 12, oa = 13, pa = 14, qa = 15, ra = 17, sa = 18, ta = 19, ua = 27, Ea = 28, Fa = 29, Ga = 30, Ha = 31, Ia = 32, Ja = 33, Ka = 1, La = 2, Ma = 4, nb = 1, Na = 2, Oa = 4, lb = 8, Pa = 16, mb = 32, Qa = 64, Ra = 2, ub = 1, tb = 2, cb = 4, Sa = 8, za = 16, ib = {
                A: 1,
                ABBR: 2,
                ACRONYM: 3,
                ADDRESS: 4,
                APPLET: 5,
                AREA: 6,
                B: 7,
                BASE: 8,
                BASEFONT: 9,
                BDO: 10,
                BIG: 11,
                BLOCKQUOTE: 12,
                BODY: 13,
                BR: 14,
                BUTTON: 15,
                CAPTION: 16,
                CENTER: 17,
                CITE: 18,
                CODE: 19,
                COL: 20,
                COLGROUP: 21,
                DD: 22,
                DEL: 23,
                DFN: 24,
                DIR: 25,
                DIV: 26,
                DL: 27,
                DT: 28,
                EM: 29,
                FIELDSET: 30,
                FONT: 31,
                FORM: 32,
                FRAME: 33,
                FRAMESET: 34,
                H1: 35,
                H2: 36,
                H3: 37,
                H4: 38,
                H5: 39,
                H6: 40,
                HEAD: 41,
                HR: 42,
                HTML: 43,
                I: 44,
                IFRAME: 45,
                IMG: 46,
                INPUT: 47,
                INS: 48,
                ISINDEX: 49,
                KBD: 50,
                LABEL: 51,
                LEGEND: 52,
                LI: 53,
                LINK: 54,
                MAP: 55,
                MENU: 56,
                META: 57,
                NOFRAMES: 58,
                NOSCRIPT: 59,
                OBJECT: 60,
                OL: 61,
                OPTGROUP: 62,
                OPTION: 63,
                P: 64,
                PARAM: 65,
                PRE: 66,
                Q: 67,
                S: 68,
                SAMP: 69,
                SCRIPT: 70,
                SELECT: 71,
                SMALL: 72,
                SPAN: 73,
                STRIKE: 74,
                STRONG: 75,
                STYLE: 76,
                SUB: 77,
                SUP: 78,
                TABLE: 79,
                TBODY: 80,
                TD: 81,
                TEXTAREA: 82,
                TFOOT: 83,
                TH: 84,
                THEAD: 85,
                TITLE: 86,
                TR: 87,
                TT: 88,
                U: 89,
                UL: 90,
                VAR: 91,
                NOINDEX: 100
            },
            Ta = 0;
        p(0);
        var Ua = 0, Va = 1, pb = 0, Za = [0, 0], qb = 0, $a = [0, 0], ab = {}, vb = /^(password|passwd|pswd)$/, db=!0, fb=!1, Xa = "", gb=!1, ha=!0, jb = S(), A = "metrikaId_" + Math.random(), va = {}, Da = ":submit" + Math.random();
        if ("MetrikaPlayer" != g.name) {
            k.on(f, "mousemove", ob);
            k.on(f, "click,dblclick,mousedown", J);
            k.on(f, "mouseup", wa);
            k.on(g, "scroll", xa);
            if ("onmousewheel"in f)
                k.on(f, "mousewheel", Z);
            else
                k.on(f, "wheel", Z);
            k.on(g, "beforeunload", ya);
            if (!Eb)
                k.on(g, "unload", ya);
            k.on(g, "resize", bb);
            k.on(f, "keydown", xb);
            k.on(f, "keypress", yb);
            k.on(f,
                "copy", eb);
            k.on(f, "touchmove,touchstart", R);
            if (f.body)
                k.on(f, "mouseleave", T);
            f.attachEvent&&!g.opera ? (k.on(f, "focusin", zb), k.on(f, "focusout", Ab)) : (k.on(g, "focus", hb), k.on(g, "blur", ia), k.on(f, "blur", ia));
            f.addEventListener ? (k.on(f, "scroll", rb), k.on(f, "focus", Aa), k.on(f, "blur", K), k.on(f, "change", V), k.on(f, "submit", Q)) : f.attachEvent && (k.on(f, "focusin", Aa), k.on(f, "focusout", K), function() {
                for (var a = f.getElementsByTagName("form"), b = 0; b < a.length; b++) {
                    for (var c = a[b].getElementsByTagName("*"), d = 0; d < c.length; d++)
                        if (/^INPUT|SELECT|TEXTAREA$/.test(c[d].tagName))
                            k.on(c[d],
                                "change", V);
                    k.on(a[b], "submit", Q)
                }
            }());
            (function() {
                var a = f.getElementsByTagName("form");
                if (a.length)
                    for (var b = 0; b < a.length; b++) {
                        var c = a[b].submit;
                        if ("function" == typeof c || "object" == typeof c && /^\s*function submit\(\)/.test(String(c)))
                            a[b][Da] = c, a[b].submit = function() {
                                Q({
                                    target: this
                                });
                                return this[Da]()
                            }
                    }
            })();
            "0:0" != l.getDocumentScroll().join(":") && xa();
            bb();
            I.uploadPage = F(function(d) {
                if ("function" == typeof g.toStaticHTML&&-1 < g.toStaticHTML.toString().indexOf("NoScript"))
                    return !1;
                var h = f.documentElement;
                if (h && 19E4 < ("" + h.innerHTML).length)
                    return !1;
                var p = g.XMLHttpRequest ? new g.XMLHttpRequest: new ActiveXObject("Msxml2.XMLHTTP"), v = l.getDocumentCharset(), I = "text/html" + (v ? ";charset=" + v : ""), n = new Fb({
                    protocol: a,
                    counterId: b,
                    counterType: c
                });
                if ("html" == d)
                    return d = RegExp("<script [^>]*?//mc\\.yandex\\.ru/watch/.*?\x3c/script>", "gi"), n.sendContent(l.getDocumentHTML().replace(d, ""), I, e, Ba, Ca), !0;
                p && (p.open("get", w().href, !0), p.onreadystatechange = F(function() {
                    if (4 == p.readyState) {
                        var a = p.getResponseHeader("content-type");
                        v&&-1 === a.indexOf("charset=") && (a = I);
                        n.sendContent(p.responseText, a, e, Ba, Ca)
                    }
                }, "updatePage.1"), p.overrideMimeType && v && p.overrideMimeType(I), p.send(null));
                return !0
            }, "uploadPage")
        }
        return {
            start: function() {
                ca.activate()
            },
            stop: function() {
                ca.clear();
                k.un(f, "mousemove", ob);
                k.un(f, "click,dblclick,mousedown", J);
                k.un(f, "mouseup", wa);
                k.un(f, "mousewheel,wheel", Z);
                k.un(g, "scroll", xa);
                k.un(g, "beforeunload", ya);
                k.un(g, "unload", ya);
                k.un(g, "resize", bb);
                k.un(f, "keydown", xb);
                k.un(f, "keypress", yb);
                k.un(f, "copy", eb);
                k.un(f, "touchmove,touchstart", R);
                f.body && k.un(f, "mouseleave", T);
                k.un(f, "focusin", zb);
                k.un(f, "focusout", Ab);
                k.un(g, "focus", hb);
                k.un(g, "blur", ia);
                k.un(f, "blur", ia);
                f.removeEventListener ? (k.un(f, "scroll", rb), k.un(f, "focus", Aa), k.un(f, "blur", K), k.un(f, "change", V), k.un(f, "submit", Q)) : f.detachEvent && (k.un(f, "focusin", Aa), k.un(f, "focusout", K), function() {
                    for (var a = f.getElementsByTagName("form"), b = 0; b < a.length; b++) {
                        for (var c = a[b].getElementsByTagName("*"), d = 0; d < c.length; d++)
                            /^INPUT | SELECT | TEXTAREA$ / .test(c[d].tagName) &&
                            k.un(c[d], "change", V);
                        k.un(a[b], "submit", Q)
                    }
                }());
                (function() {
                    for (var a = f.getElementsByTagName("form"), b = 0; b < a.length; b++)
                        a[b][Da] && (a[b].submit = a[b][Da])
                })()
            },
            uploadPages: function(a, b) {
                function c() {
                    k.un(f, "DOMContentLoaded", c);
                    k.un(g, "load", c);
                    for (var d = a.split(/\n/), e = w().href, h = /regexp:/, p = 0; p < d.length; p++) {
                        var v = d[p];
                        if (v)
                            if (h.test(v)) {
                                v = kb(v.replace(h, ""));
                                try {
                                    var n = RegExp(v)
                                } catch (m) {}
                                if (n && n.test(e)) {
                                    I.uploadPage(b);
                                    break
                                }
                            } else if ( - 1 !== e.indexOf(v)) {
                                I.uploadPage(b);
                                break
                            }
                    }
                }
                "complete" == f.readyState ?
                    c() : (k.on(f, "DOMContentLoaded", c), k.on(g, "load", c))
            }
        }
    }
    var ib=!1, L = "", Eb=!ga(/webkit/) && ga(/gecko/), l = {
            getDocumentCharset: function() {
                return ("" + (f.characterSet || f.charset || "")).toLowerCase()
            },
            getDocumentHTML: function() {
                var a = "", b = "", a = f.documentElement, c = a.outerHTML;
                if (c)
                    a = c;
                else {
                    for (var c = a.attributes, d = "", e = 0; e < c.length; e++) {
                        var g = c[e];
                        g && (d += " " + g.name + '="' + (g.value || "") + '"')
                    }
                    a = "<html" + d + ">" + a.innerHTML + "</html>"
                }(c = f.doctype) && (b = "<!DOCTYPE " + c.name + (c.publicId ? ' PUBLIC "' + c.publicId + '"' : "") + (c.systemId ?
                ' "' + c.systemId + '"' : "") + ">\n");
                return b + a
            },
            getRootElement: function() {
                var a = f.documentElement;
                return "CSS1Compat" == f.compatMode ? a : f.body || a
            },
            getViewportSize: function() {
                var a = l.getRootElement();
                return [a.clientWidth, a.clientHeight]
            },
            getDocumentSize: function() {
                var a = l.getRootElement(), b = l.getViewportSize();
                return [Math.max(a.scrollWidth, b[0]), Math.max(a.scrollHeight, b[1])]
            },
            getDocumentScroll: function() {
                return [g.pageXOffset || f.documentElement && f.documentElement.scrollLeft || f.body && f.body.scrollLeft || 0, g.pageYOffset ||
                f.documentElement && f.documentElement.scrollTop || f.body && f.body.scrollTop || 0]
            },
            getElementXY: function(a) {
                if (!a.ownerDocument || "PARAM" == a.tagName || a == f.body || a == f.documentElement)
                    return [0, 0];
                if (a.getBoundingClientRect) {
                    a = a.getBoundingClientRect();
                    var b = l.getDocumentScroll();
                    return [Math.round(a.left + b[0]), Math.round(a.top + b[1])]
                }
                for (var c = b = 0; a;)
                    b += a.offsetLeft, c += a.offsetTop, a = a.offsetParent;
                return [b, c]
            },
            getElementParent: function(a) {
                return a == f.documentElement ? null : a == f.body ? f.documentElement : a.parentNode
            }
        },
        h = {
            isArray: function(a) {
                return "function" == typeof Array.isArray ? Array.isArray(a) : "[object Array]" == Object.prototype.toString.call(a)
            },
            mergeArrays: function(a) {
                for (var b = 1; b < arguments.length; b++)
                    if (h.isArray(arguments[b]))
                        for (var c = 0; c < arguments[b].length; c++)
                            a[a.length] = arguments[b][c];
                return a
            }
        };
    l.getElementChildren = function(a, b) {
        var c = [];
        if (a) {
            var d = a.childNodes;
            if (d)
                for (var e = 0, g = d.length; e < g; e++) {
                    var f = d[e];
                    "INPUT" == f.nodeName && f.type && "hidden" == f.type.toLocaleLowerCase() || b && f.nodeName != b || h.mergeArrays(c,
                        [f])
                }
        }
        return c
    };
    l.getElementNeighborPosition = function(a) {
        var b = l.getElementParent(a);
        if (b)
            for (var c = 0, d = 0; d < b.childNodes.length; d++)
                if (a.nodeName == b.childNodes[d].nodeName) {
                    if (a == b.childNodes[d])
                        return c;
                    c++
                }
        return 0
    };
    l.getElementSize = function(a) {
        return a == f.body || a == f.documentElement ? l.getDocumentSize() : [a.offsetWidth, a.offsetHeight]
    };
    l.getElementRegion = function(a) {
        var b = l.getElementXY(a);
        a = l.getElementSize(a);
        return [b[0], b[1], a[0], a[1]]
    };
    h.fletcher = function(a) {
        for (var b = a.length, c = 0, d = 255, e = 255; b;) {
            var g =
                21 < b ? 21: b, b = b - g;
            do {
                var f = "string" == typeof a ? a.charCodeAt(c): a[c];
                c++;
                if (255 < f)
                    var h = f>>8, f = f & 255, f = f^h;
                d += f;
                e += d
            }
            while (--g);
            d = (d & 255) + (d>>8);
            e = (e & 255) + (e>>8)
        }
        a = (d & 255) + (d>>8)<<8 | (e & 255) + (e>>8);
        return 65535 == a ? 0 : a
    };
    l.calcTextChecksum = function(a) {
        var b = "";
        a = a.childNodes;
        for (var c = 0, d = a.length; c < d; c++)
            a[c] && 3 == a[c].nodeType && (b += a[c].nodeValue);
        return h.fletcher(b.replace(/[\u0000-\u0020]+/g, ""))
    };
    l.calcAttribChecksum = function(a) {
        var b = "", c = "width height align title alt name".split(" ");
        "IMG" == a.tagName &&
        (b += a.src.toLowerCase());
        "A" == a.tagName && (b += a.href.toLowerCase());
        for (var b = b + String(a.className || "").toLowerCase(), d = 0; d < c.length; d++)
            a.getAttribute && (b += String(a.getAttribute(c[d]) || "").toLowerCase());
        return h.fletcher(b.replace(/[\u0000-\u0020]+/g, ""))
    };
    l.calcChildrenChecksum = function(a) {
        return h.fletcher((a.innerHTML || "").replace(/(<[^>]*>|[\u0000-\u0020])/g, ""))
    };
    l.getFormNumber = function(a) {
        for (var b = f.getElementsByTagName("form"), c = 0, d = b.length; c < d; c++)
            if (b[c] == a)
                return c;
        return - 1
    };
    l.classNameExists =
        function(a, b) {
            return RegExp("(?:^|\\s)" + b + "(?:\\s|$)").test(a.className)
        };
    l.isEmptyField = function(a) {
        return "INPUT" == a.nodeName && "submit" != a.type && "image" != a.type && "hidden" != a.type ? "radio" == a.type || "checkbox" == a.type?!a.checked : !a.value : "TEXTAREA" == a.nodeName?!a.value : "SELECT" == a.nodeName ? 0 > a.selectedIndex : !0
    };
    l.getElementsByClassName = function(a, b) {
        b = b || f;
        for (var c = b.getElementsByTagName("*"), d = [], e = 0; e < c.length; e++)
            l.classNameExists(c[e], a) && d.push(c[e]);
        return d
    };
    l.getDocumentTitle = function() {
        var a =
            f.title;
        "string" != typeof a && (a = (a = f.getElementsByTagName("title")) && a.length ? a[0].innerHTML : "");
        return a
    };
    var G = {
        getPos: function(a) {
            var b = l.getRootElement(), c = l.getDocumentScroll();
            return [a.pageX || a.clientX + c[0] - (b.clientLeft || 0) || 0, a.pageY || a.clientY + c[1] - (b.clientTop || 0) || 0]
        },
        getTarget: function(a) {
            a = a.target || a.srcElement;
            L = typeof a + " - " + String(a);
            !a.ownerDocument && a.documentElement && (a = a.documentElement);
            return a
        },
        getMouseButton: function(a) {
            return a.which || a.button == K ? a.which : a.button & 1 ? 1 : a.button &
            2 ? 3 : a.button & 4 ? 2 : 0
        }
    };
    h.mixin = function(a) {
        for (var b = 1; b < arguments.length; b++)
            if (arguments[b]) {
                for (var c in arguments[b])
                    arguments[b].hasOwnProperty(c) && (a[c] = arguments[b][c]);
                arguments[b].hasOwnProperty("toString") && (a.toString = arguments[b].toString)
            }
        return a
    };
    var H = function(a) {
        a = a || {};
        h.mixin(this, a);
        this._initComponent()
    };
    H.prototype._initComponent = function() {};
    H.inherit = function(a) {
        a = a || {};
        var b = "function" == typeof this ? this: Object;
        a.hasOwnProperty("constructor") || (a.constructor = function() {
            b.apply(this,
                arguments)
        });
        var c = function() {};
        c.prototype = b.prototype;
        a.constructor.prototype = new c;
        h.mixin(a.constructor.prototype, a);
        a.constructor.prototype.constructor = a.constructor;
        a.constructor.superclass = b.prototype;
        a.constructor.inherit = H.inherit;
        return a.constructor
    };
    var k = H.inherit({
        _initComponent: function() {
            k.superclass._initComponent.apply(this, arguments);
            this._listeners = []
        },
        on: function(a, b, c, d, e) {
            e = 5 > arguments.length?!0 : !!e;
            for (var f = b.split(","), h = 0; h < f.length; h++) {
                var k = f[h], l = F(function(a) {
                    c.call(d ||
                    this, a || g.event)
                }, "on" + k);
                this._listeners[this._listeners.length] = [a, k, c, d, e, l];
                a.addEventListener ? a.addEventListener(k, l, e) : a.attachEvent && a.attachEvent("on" + k, l)
            }
        },
        un: function(a, b, c, d, e) {
            e = 5 > arguments.length?!0 : !!e;
            for (var g = b.split(","), f = 0; f < g.length; f++)
                for (var h = g[f], k = 0; k < this._listeners.length; k++) {
                    var l = this._listeners[k];
                    if (l[0] == a && l[1] == h && l[2] == c && l[3] == d && l[4] == e) {
                        this._listeners.splice(k, 1);
                        this._removeListener(a, h, l[5], e);
                        return
                    }
                }
        },
        unAll: function() {
            for (var a = 0; a < this._listeners.length; a++) {
                var b =
                    this._listeners[a];
                this._removeListener(b[0], b[1], b[5], b[4])
            }
            this._listeners.length = 0
        },
        _removeListener: function(a, b, c, d) {
            a.removeEventListener ? a.removeEventListener(b, c, d) : a.detachEvent && a.detachEvent("on" + b, c)
        }
    });
    k.on = function(a, b, c, d, e) {
        k._instance || (k._instance = new k);
        k._instance.on.apply(k._instance, arguments)
    };
    k.un = function(a, b, c, d, e) {
        k._instance && k._instance.un.apply(k._instance, arguments)
    };
    V = null;
    h.toJSON = function(a) {
        if (a === K)
            return "";
        if (null === a)
            return "null";
        switch (a.constructor) {
            case Boolean:
                return a.toString();
            case Number:
                return isFinite(a) ? a.toString() : "null";
            case String:
                return '"' + a.replace(/\\/g, "\\\\").replace(/"/g, '\\"').replace(/\n/g, "\\n").replace(/\r/g, "\\r") + '"';
            case Array:
                for (var b = [], c = 0, d = a.length; c < d; c++)
                    b[b.length] = h.toJSON(a[c]);
                return "[" + b.join(",") + "]";
            case Object:
                b = [];
                for (c in a)
                    a.hasOwnProperty(c) && a[c] !== K && (b[b.length] = h.toJSON(c) + ":" + h.toJSON(a[c]));
                return "{" + b.join(",") + "}";
            default:
                return "null"
        }
    };
    var aa = H.inherit({
        counterId: "",
        _initComponent: function() {
            aa.superclass._initComponent.apply(this,
                arguments);
            this._ls = null;
            try {
                this._ls = g.localStorage
            } catch (a) {}
        },
        set: function(a, b) {
            if (this.isEnabled())
                try {
                    !b || b && h.isArray(b)&&!b.length ? this.remove(a) : this._ls.setItem(this._getLsKey(a), h.toJSON(b))
                } catch (c) {}
        },
        get: function(a) {
            if (this.isEnabled())
                try {
                    return JSON.parse(this._ls.getItem(this._getLsKey(a)))
                } catch (b) {}
            return null
        },
        remove: function(a) {
            if (this.isEnabled())
                try {
                    this._ls.removeItem(this._getLsKey(a))
                } catch (b) {}
        },
        isEnabled: function() {
            return this._ls && g.JSON && "object" == typeof this._ls && "object" ==
                typeof g.JSON
        },
        getStorageId: function() {
            var a = this.get("lsid");
            a || (a = Math.round(Math.random() * new Date), this.set("lsid", a));
            return a
        },
        clearStorageId: function() {
            this.remove("lsid")
        },
        _getLsKey: function(a) {
            return "_ym" + this.counterId + "_" + a
        }
    }), Z = H.inherit({
        counterId: "",
        onlyCurrentDomain: !1,
        skipPrefix: !1,
        _initComponent: function() {
            Z.superclass._initComponent.apply(this, arguments);
            this._domain = null;
            if (!this.onlyCurrentDomain)
                for (var a = x.host.split("."), b = 2; ;)
                    if (b <= a.length) {
                        if (this._domain = "." + a.slice( - b).join("."),
                                b++, this.isEnabled())
                            break
                    } else {
                        this._domain = null;
                        break
                    }
        },
        create: function(a, b, c) {
            a = [this._prepareName(a) + "=" + encodeURIComponent(b)];
            c && (b = new Date, b.setTime(b.getTime() + 6E4 * c), a.push("expires=" + b.toGMTString()));
            this._domain && a.push("domain=" + this._domain);
            a.push("path=/");
            try {
                f.cookie = a.join(";")
            } catch (d) {}
        },
        read: function(a) {
            try {
                var b = f.cookie
            } catch (c) {}
            return b && b.match(RegExp("(?:^|;\\s*)" + this._prepareName(a) + "=([^;]*)")) ? decodeURIComponent(RegExp.$1) : null
        },
        erase: function(a) {
            this.create(a, "",
                - 1)
        },
        isEnabled: function() {
            this.create("metrika_enabled", "1", 60);
            var a=!!this.read("metrika_enabled");
            this.erase("metrika_enabled");
            return a
        },
        _prepareName: function(a) {
            return (this.skipPrefix ? "" : "_ym_") + a + (this.counterId ? "_" + this.counterId : "")
        }
    });
    Z.isEnabled = function() {
        return (new Z({
            onlyCurrentDomain: !0
        })).isEnabled()
    };
    var t = H.inherit({
        transports: [],
        postParams: [],
        send: function(a, b, c, d) {
            c = c || function() {};
            (function I(g) {
                if (g < this.transports.length)
                    try {
                        var f = new this.transports[g]({
                            postParams: this.postParams
                        });
                        f.request(a, b, function(a, b) {
                            a ? c.call(d, b) : I.call(this, g + 1)
                        }, this)
                    } catch (h) {
                        oa(h, "send by " + (f && f.id)), I.call(this, g + 1)
                    }
            }).call(this, 0)
        }
    }), ja = {
        stringify: function(a) {
            var b = [], c;
            for (c in a)
                if (a.hasOwnProperty(c)) {
                    var d = a[c];
                    if (h.isArray(d))
                        for (var e = 0; e < d.length; e++)
                            b.push(encodeURIComponent(c) + "=" + encodeURIComponent(String(d[e])));
                    else
                        b.push(encodeURIComponent(c) + "=" + encodeURIComponent(String(d)))
                }
            return b.join("&")
        }
    };
    h.forEachKey = function(a, b, c) {
        for (var d in a)
            a.hasOwnProperty(d) && b.call(c, d, a[d],
                a)
    };
    h.inArray = function(a, b) {
        for (var c = 0; c < a.length; c++)
            if (a[c] == b)
                return !0;
        return !1
    };
    var C = H.inherit({
        postParams: [],
        _buildUrl: function(a, b) {
            return a + ( - 1 < a.indexOf("?") ? "&" : "?") + ja.stringify(b)
        },
        _splitParams: function(a) {
            var b = {}, c = {};
            h.forEachKey(a, function(a, e) {
                h.inArray(this.postParams, a) ? c[a] = e : b[a] = e
            }, this);
            return {
                get: b,
                post: c
            }
        }
    });
    C.inherit({
        id: "beacon",
        request: function(a, b, c, d) {
            "function" == typeof D.sendBeacon ? (b = this._splitParams(b), c.call(d, D.sendBeacon(this._buildUrl(a, b.get), ja.stringify(b.post)))) :
                c.call(d, !1)
        }
    });
    h.getNativeFunction = function(a, b) {
        b = b || g;
        var c = b.constructor && b.constructor.prototype && b.constructor.prototype[a] || b[a];
        return "apply"in c ? function() {
            return c.apply(b, arguments)
        } : c
    };
    h.setTimeout = function(a, b, c) {
        return h.getNativeFunction("setTimeout")(F(a, c || "setTimeout"), b)
    };
    var B = C.inherit({
        id: "XHR",
        request: function(a, b, c, d) {
            if (/[^a-z0-9.:-]/.test(x.host) && g.opera && "function" == typeof g.opera.version) {
                var e = g.opera.version();
                if ("string" == typeof e && "12" == e.split(".")[0])
                    return c.call(d,
                        !1)
            }
            if (g.XMLHttpRequest) {
                var f = new XMLHttpRequest;
                if ("withCredentials"in f) {
                    b = this._splitParams(b);
                    a = this._buildUrl(a, b.get);
                    try {
                        f.open("POST", a, !0)
                    } catch (p) {
                        return c.call(d, !1)
                    }
                    f.withCredentials=!0;
                    f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    f.send(ja.stringify(b.post));
                    (function() {
                        4 == f.readyState ? c.call(d, 200 == f.status) : h.setTimeout(arguments.callee, 50, "TransportXHR.request")
                    })();
                    return
                }
            }
            c.call(d, !1)
        }
    });
    h.random = function(a, b) {
        2 > arguments.length && (b = a, a = 0);
        1 > arguments.length &&
        (b = 1073741824);
        return Math.floor(Math.random() * (b - a)) + a
    };
    var T = C.inherit({
        id: "form",
        enctype: "application/x-www-form-urlencoded",
        htmlfileOnly: !1,
        _initComponent: function() {
            T.superclass._initComponent.apply(this, arguments);
            "_htmlfile"in T.prototype || (T.prototype._htmlfile = this._createHtmlfile());
            this._doc = this._htmlfile || (this.htmlfileOnly ? null : f)
        },
        request: function(a, b, c, d) {
            var e = this._doc;
            if (!e)
                return c.call(d, !1);
            b = this._splitParams(b);
            var g = "ifr" + h.random(), f = e.createElement("div");
            f.style.position =
                "absolute";
            f.style.left = "-99999px";
            f.style.top = "-99999px";
            var k = ['<iframe name="', g, '"></iframe>', '<form action="', this._buildUrl(a, b.get), '" method="post" target="', g, '" enctype="', this.enctype, '">'];
            h.forEachKey(b.post, function(a) {
                h.mergeArrays(k, ['<input type="hidden" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="', a, '"/>'])
            });
            h.mergeArrays(k, ["</form>"]);
            f.innerHTML = k.join("");
            e.body.appendChild(f);
            var l = f.getElementsByTagName("form")[0];
            h.forEachKey(b.post,
                function(a, b) {
                    l[a].value = b
                });
            l.submit();
            h.setTimeout(function() {
                e.body.removeChild(f)
            }, 1E4, "TransportForm.request.2");
            return c.call(d, !0)
        },
        _createHtmlfile: function() {
            try {
                if (g.ActiveXObject) {
                    var a = new ActiveXObject("htmlfile");
                    a.open();
                    a.write("<html><body></body></html>");
                    a.close();
                    return a
                }
            } catch (b) {}
            return null
        }
    }), P = T.inherit({
        id: "htmlfile",
        htmlfileOnly: !0
    }), E = C.inherit({
        id: "img",
        request: function(a, b, c, d) {
            a = this._buildUrl(a, b);
            b = f.createElement("img");
            b.onload = F(function() {
                c.call(d, !0)
            }, "TransportImage.request");
            b.onerror = F(function() {
                c.call(d, !1)
            }, "TransportImage.request");
            b.src = a
        }
    });
    h.defer = function(a, b, c, d, e) {
        return h.setTimeout(function() {
            a.apply(c, d || [])
        }, b, e)
    };
    var U = t.inherit({
        protocol: "",
        host: "mc.yandex.ru",
        resource: "",
        counterId: "",
        counterType: 0,
        retry: !1,
        transports: [B, E, P],
        _initComponent: function() {
            U.superclass._initComponent.apply(this, arguments);
            this.retry && (this._storage = new aa)
        },
        send: function(a, b, c, d) {
            var e = this._registerRequest(a, b);
            this._sendSavedRequest(e, a, b, c, d)
        },
        _sendSavedRequest: function(a,
                                    b, c, d, e) {
            var f = g.Ya._metrika.firstReqStatus;
            if ("process" == f)
                g.Ya._metrika.firstReqCallbacks = h.mergeArrays(g.Ya._metrika.firstReqCallbacks || [], [[this, arguments]]);
            else {
                f || (g.Ya._metrika.firstReqStatus = "process");
                f = {};
                this.counterType && (f["cnt-class"] = this.counterType);
                h.mixin(f, b);
                c.st = Math.round((new Date).getTime() / 1E3);
                var k = [this.protocol, "//", this.host, "/" + this.resource + "/" + this.counterId].join(""), l = [];
                c && (h.forEachKey(c, function(a, b) {
                    "t" != a && h.mergeArrays(l, [a, b])
                }), c.t && h.mergeArrays(l, ["t",
                    c.t]));
                l.length && (f["browser-info"] = l.join(":"));
                return U.superclass.send.call(this, k, f, function() {
                    g.Ya._metrika.firstReqStatus = "complete";
                    this._unregisterRequest(a);
                    var b = g.Ya._metrika.firstReqCallbacks;
                    g.Ya._metrika.firstReqCallbacks = null;
                    if (b)
                        for (var c = 0; c < b.length; c++)
                            b[c][0]._sendSavedRequest.apply(b[c][0], b[c][1]);
                    d && d.apply(e, arguments)
                }, this)
            }
        },
        _isRetryEnabled: function() {
            return this.retry && this._storage && this._storage.isEnabled()
        },
        _registerRequest: function(a, b) {
            if (this._isRetryEnabled()) {
                b.rqnl =
                    b.rqnl || 0;
                b.rqnl++;
                for (var c = this._storage.get("retryReqs") || {}, d = 1; c[d];)
                    d++;
                c[d] = {
                    protocol: this.protocol,
                    host: this.host,
                    resource: this.resource,
                    counterId: this.counterId,
                    counterType: this.counterType,
                    postParams: this.postParams,
                    params: a,
                    browserInfo: b,
                    ghid: Ya._globalMetrikaHitId,
                    time: + new Date
                };
                this._storage.set("retryReqs", c);
                return d
            }
        },
        _unregisterRequest: function(a) {
            if (a && this._isRetryEnabled()) {
                var b = this._storage.get("retryReqs") || {};
                b[a] && (delete b[a], this._storage.set("retryReqs", b))
            }
        }
    });
    U.retransmit =
        function() {
            var a = new aa, b = a.get("retryReqs") || {};
            a.remove("retryReqs");
            h.forEachKey(b, function(a, b) {
                g.Ya._metrika.firstReqStatus || (g.Ya._metrika.firstReqStatus = "complete");
                b.ghid && b.ghid != Ya._globalMetrikaHitId && b.time && b.time + 864E5>+new Date && 2 >= b.browserInfo.rqnl && (new U({
                    protocol: b.protocol,
                    host: b.host,
                    resource: b.resource,
                    counterId: b.counterId,
                    counterType: b.counterType,
                    postParams: b.postParams || [],
                    retry: !0
                })).send(b.params, b.browserInfo)
            })
        };
    var O = {
        abc: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
        tail: "+/=",
        tailSafe: "*-_",
        encode: function(a, b) {
            for (var c = (O.abc + (b ? O.tailSafe : O.tail)).split(""), d = a.length, e = [], g = d - d%3, f, k = 0; k < g; k += 3)
                f = (a[k]<<16) + (a[k + 1]<<8) + a[k + 2], h.mergeArrays(e, [c[f>>18 & 63], c[f>>12 & 63], c[f>>6 & 63], c[f & 63]]);
            switch (d - g) {
                case 1:
                    f = a[g]<<4;
                    h.mergeArrays(e, [c[f>>6 & 63], c[f & 63], c[64], c[64]]);
                    break;
                case 2:
                    f = (a[g]<<10) + (a[g + 1]<<2), h.mergeArrays(e, [c[f>>12 & 63], c[f>>6 & 63], c[f & 63], c[64]])
            }
            return e.join("")
        }
    }, jb = {
        encode: function(a) {
            for (var b = [], c = 0, d = a.length; c < d; c++) {
                var e = a.charCodeAt(c);
                128 > e ? b.push(e) : (127 < e && 2048 > e ? b.push(e>>6 | 192) : (b.push(e>>12 | 224), b.push(e>>6 & 63 | 128)), b.push(e & 63 | 128))
            }
            return b
        }
    }, Fb = U.inherit({
        resource: "webvisor",
        transports: [B, T],
        postParams: ["wv-data"],
        sendContent: function(a, b, c, d, e, f, g) {
            if (!a)
                return !1;
            - 1 < a.indexOf("\r") && (a = a.replace(/\r\n/g, "\n"));
            a = {
                "wv-type": 1,
                "page-url": w().href,
                "wv-hit": c,
                "wv-data": O.encode(jb.encode(a))
            };
            return 245E3 < a["wv-data"].length?!1 : this.send(a, {
                z: d,
                i: e,
                pct: b || ""
            }, f, g)
        }
    });
    h.throttle = function(a, b, c, d) {
        var e, f, g;
        return function() {
            f =
                arguments;
            g = this;
            e || function() {
                e = null;
                f && (a.apply(c || g, f), f = null, e = h.setTimeout(arguments.callee, b, d))
            }()
        }
    };
    var Ea = H.inherit({
        storage: null,
        storageKey: "dataBuffer",
        maxBufferSize: 255,
        flushTimeout: 1E4,
        active: !0,
        meta: null,
        onFlush: function() {},
        onFlushCtx: null,
        bufferExpireTime: 864E5,
        _initComponent: function() {
            Ea.superclass._initComponent.apply(this, arguments);
            this._data = [];
            this._packetNumber = 0;
            this._flushTID = null;
            this._saveToStorageThrottled = h.throttle(this._saveToStorage, 300, this, "DataBuffer._saveToStorage");
            if (this.storage) {
                var a = this.storage.get(this.storageKey);
                a && a.data && a.meta && a.time && a.time + this.bufferExpireTime>+new Date && this.onFlush.call(this.onFlushCtx || this, a.data, a.meta, a.pnum);
                this.clear()
            }
        },
        append: function(a, b) {
            h.mergeArrays(this._data, a);
            this._saveToStorageThrottled();
            this.active && ((b || this._data.length >= this.maxBufferSize) && this._flush(), this._flushTID || (this._flushTID = h.defer(this._flush, this.flushTimeout, this, [], "DataBuffer._flush")))
        },
        activate: function() {
            this.active || (this.active =
                !0, this.append([]))
        },
        clear: function() {
            this._data.length = 0;
            this._flushTID = null;
            this.storage && this.storage.remove(this.storageKey)
        },
        _flush: function() {
            this.onFlush.call(this.onFlushCtx || this, this._data, this.meta, this._packetNumber);
            this._packetNumber++;
            this.clear()
        },
        _saveToStorage: function() {
            this.storage && this._data.length && this.storage.set(this.storageKey, {
                data: this._data,
                meta: this.meta,
                pnum: this._packetNumber,
                time: + new Date
            })
        }
    });
    h.trim = function(a, b) {
        a = String(a).replace(/^\s+|\s+$/g, "");
        b && a.length >
        b && (a = a.substr(0, b));
        return a
    };
    var u = {
        _jScriptVersion: 0,
        getJScriptVersion: function() {
            u._jScriptVersion || (u._jScriptVersion = (new Function("return /*@cc_on @_jscript_version @*/;"))());
            return u._jScriptVersion
        },
        _silverlightVersion: "",
        getSilverlightVersion: function() {
            if (!u._silverlightVersion)
                if (g.ActiveXObject)
                    try {
                        var a = new ActiveXObject("AgControl.AgControl"), b = function(a, b, c, d) {
                            for (; a.isVersionSupported(b[0] + "." + b[1] + "." + b[2] + "." + b[3]);)
                                b[c] += d;
                            b[c] -= d
                        }, c = [1, 0, 0, 0];
                        b(a, c, 0, 1);
                        b(a, c, 1, 1);
                        b(a, c, 2, 1E4);
                        b(a, c, 2, 1E3);
                        b(a, c, 2, 100);
                        b(a, c, 2, 10);
                        b(a, c, 2, 1);
                        b(a, c, 3, 1);
                        u._silverlightVersion = c.join(".")
                    } catch (d) {} else if (a = g.navigator, a = a.plugins && a.plugins["Silverlight Plug-In"])
                    u._silverlightVersion = a.description;
            return u._silverlightVersion || ""
        },
        _flashVersion: 0,
        getFlashVersion: function() {
            if (!u._flashVersion) {
                var a = g.navigator;
                if ("undefined" != typeof a.plugins && "object" == typeof a.plugins["Shockwave Flash"]) {
                    var b = a.plugins["Shockwave Flash"], c = b.version;
                    if ((b = b.description) || c)
                        if (a = a.mimeTypes, "undefined" ==
                            typeof a ||!a["application/x-shockwave-flash"] || a["application/x-shockwave-flash"].enabledPlugin)
                            c ? u._flashVersion = c : b && (u._flashVersion = b.replace(/([a-zA-Z]|\s)+/, "").replace(/(\s+r|\s+b[0-9]+)/, "."))
                } else if ("undefined" != typeof g.ActiveXObject)
                    try {
                        if (c = new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))
                            if (b = c.GetVariable("$version"))
                                u._flashVersion = b.split(" ")[1].replace(/,/g, ".").replace(/[^.\d]/g, "")
                    } catch (d) {}
            }
            return u._flashVersion
        },
        getLanguage: function() {
            return (g.navigator && (D.language || D.browserLanguage) ||
            "").toLowerCase()
        },
        getJavaEnabled: function() {
            try {
                return D.javaEnabled()
            } catch (a) {
                return !1
            }
        }
    };
    h.fnv32a = function(a) {
        for (var b = 2166136261, c = 0, d = a.length; c < d; ++c)
            b^=a.charCodeAt(c), b += (b<<1) + (b<<4) + (b<<7) + (b<<8) + (b<<24);
        return b>>>0
    };
    u.getFingerPrint = function() {
        var a = [];
        if (D.plugins && D.plugins.length)
            for (var b = 0; b < D.plugins.length; b++) {
                var c = D.plugins[b];
                h.mergeArrays(a, [c.name, c.version, c.description, c.filename])
            }
        if (D.mimeTypes && D.mimeTypes.length)
            for (b = 0; b < D.mimeTypes.length; b++)
                c = D.mimeTypes[b], h.mergeArrays(a,
                    [c.type, c.description, c.suffixes]);
        return h.fnv32a(a.join(";")) + "01"
    };
    var ba = U.inherit({
        hitId: 0,
        trackHash: !1,
        trimParams: !1,
        webvisor: !1,
        counter: null,
        counterNum: 0,
        resource: "watch",
        retry: !0,
        postParams: ["site-info"],
        _initComponent: function() {
            ba.superclass._initComponent.apply(this, arguments);
            this._trackHash = this.trackHash
        },
        setTrackHash: function(a) {
            this._trackHash = a
        },
        sendHit: function(a, b, c, d, e) {
            this._hitExt(a, b, c, d, {
                ut: e,
                ar: !0,
                saveRef: !0
            })
        },
        sendPrerenderHit: function(a, b, c) {
            this._hitExt(a, b, c, null, {
                ar: !0,
                pq: !0
            })
        },
        sendAjaxHit: function(a, b, c, d) {
            this._hitExt(a, b, c, null, d)
        },
        sendParams: function(a) {
            this._hitExt(w().href, "", "", a, {
                ar: !0,
                pa: !0,
                onlyData: !0
            })
        },
        sendGoal: function(a, b) {
            if (!/[\/&=?#]/.test(a)) {
                var c = a ? "goal://" + w().hostname + "/" + encodeURIComponent(a): w().href, d = l.getDocumentTitle(), e = a ? w().href: f.referrer;
                this._hitExt(c, d, e, b, {
                    ar: !0
                })
            }
        },
        sendClickLink: function(a, b, c) {
            this._hitExt(a, b, w().href, null, c)
        },
        sendExtLink: function(a, b, c, d) {
            this._hitExt(a, "", w().href, d, {
                ar: !0,
                ln: !0,
                ut: ka
            })
        },
        sendFileUpload: function(a,
                                 b, c, d) {
            this._hitExt(a, "", w().href, d, {
                ar: !0,
                ln: !0,
                dl: !0
            })
        },
        sendNotBounce: function(a) {
            this._hitExt(w().href, "", "", null, {
                cl: a,
                ar: !0,
                nb: !0,
                onlyData: !0
            })
        },
        sendVideoAction: function(a, b, c, d) {
            this._hitExt(c, d || "", "", null, {
                ar: !0,
                va: a,
                vt: + b
            })
        },
        sendSocialClick: function(a, b, c) {
            this._hitExt(c || w().href, "", "", null, {
                ar: !0,
                sn: h.trim(a, 64),
                sa: h.trim(b, 64)
            })
        },
        _hitExt: function(a, b, c, d, e, f, k, l, r, s) {
            function q(a, b) {
                b && (m[a] = b)
            }
            e = e || {};
            f = f || {};
            if ("MetrikaPlayer" != g.name) {
                c = "undefined" != typeof c ? c : V;
                var m = {};
                e.ar&&!e.onlyData &&
                (c = this._prepareHitUrl(c), a = this._prepareHitUrl(a));
                q("page-ref", h.trim(c, la));
                q("page-url", h.trim(a, la));
                - 1 != w().hostname.search(/(?:^|\.)(?:ya|yandex|narod|narod2)\.(?:\w+|com\.\w+)$/) ? q("ut", ka) : "undefined" != typeof e.ut && q("ut", h.trim(e.ut, Gb));
                if (d)
                    if (a = h.toJSON(d), this.trimParams && a.length > Hb)
                        var u=!0;
                    else
                        q("site-info", a);
                e.saveRef && (V = c);
                h.mixin(f, this._getTechInfo(b, e, this.counterId, k, l, this._trackHash, this.hitId, this.webvisor, this.counter));
                this.send(m, f, function() {
                    u && (new ba({
                        protocol: this.protocol,
                        counterType: this.counterType,
                        counterId: this.counterId,
                        hitId: this.hitId,
                        trackHash: this.trackHash,
                        webvisor: this.webvisor,
                        counterNum: this.counterNum,
                        counter: this.counter
                    })).sendParams(d);
                    r && r.apply(s, arguments)
                }, this)
            }
        },
        _prepareHitUrl: function(a) {
            var b = w(), c = b.host, b = b.href;
            if (!a)
                return b;
            if ( - 1 != a.search(/^\w+:\/\//))
                return a;
            var d = a.charAt(0);
            if ("?" == d)
                return d = b.search(/\?/), - 1 == d ? b + a : b.substr(0, d) + a;
            if ("#" == d)
                return d = b.search(/#/), - 1 == d ? b + a : b.substr(0, d) + a;
            if ("/" == d) {
                if (d = b.search(c), - 1 != d)
                    return b.substr(0,
                            d + c.length) + a
            } else
                return c = b.split("/"), c[c.length - 1] = a, c.join("/");
            return a
        },
        _getTechInfo: function(a, b, c, d, e, f, k, t, r) {
            function s(a, b) {
                a && b && (m[a] = b)
            }
            function q(a) {
                b[a] && s(a, "1")
            }
            b = b || {};
            var m = {};
            d = d || N.getTimestamp();
            e = e || N.getTimezone();
            s("j", u.getJavaEnabled() ? "1" : "");
            W && s("s", W.width + "x" + W.height + "x" + (W.colorDepth || W.pixelDepth));
            g.devicePixelRatio && s("sk", g.devicePixelRatio);
            s("f", u.getFlashVersion());
            s("l", u.getSilverlightVersion());
            s("fpr", u.getFingerPrint());
            s("cn", this.counterNum);
            if (!b.pa) {
                var w =
                    l.getViewportSize();
                s("w", w[0] + "x" + w[1])
            }
            s("z", e);
            s("i", d);
            s("et", Math.round((new Date).getTime() / 1E3));
            s("en", l.getDocumentCharset());
            s("v", fa);
            s("c", D.cookieEnabled ? "1" : "");
            s("jv", u.getJScriptVersion());
            s("la", u.getLanguage());
            f && s("wh", "1");
            e = "ar ln dl ad nb pa pq".split(" ");
            for (d = 0; d < e.length; d++)
                q(e[d]);
            e = ["va", "vt", "sn", "sa", "he"];
            b.nb && e.push("cl");
            for (d = 0; d < e.length; d++)
                f = e[d], s(f, b[f]);
            c = new aa({
                counterId: c
            });
            c.isEnabled() && (d = c.getStorageId(), (e = c.get("reqNum")) ? e++ : e = 1, c.set("reqNum",
                e), c.get("reqNum") == e ? (s("ls", d), s("rqn", e)) : (c.remove("reqNum"), c.clearStorageId(), 1 < e && (s("ls", d), s("rqn", 0))));
            s("rn", h.random());
            s("hid", k);
            s("ds", Na(r));
            r._firstPaint || (r._firstPaint = Oa(), s("fp", r._firstPaint));
            if (t) {
                g.name || (g.name = Math.round(65535 * Math.random()));
                if (k =+ g.name)
                    0 > k && (k*=-1), k%=65535;
                s("wn", k || h.fletcher(g.name));
                try {
                    g.history && s("hl", String(g.history.length))
                } catch (x) {}
            }
            a = "undefined" == typeof a ? (a = l.getDocumentTitle()) ? h.trim(a, Fa) : "" : h.trim(a, Fa);
            s("t", a);
            return m
        }
    });
    h.array2Props =
        function(a) {
            for (var b = a.length, c = {}, d = c, e = 0; e < b - 1; e++) {
                var f = a[e];
                d[f] = {};
                e < b - 2 && (d = d[f])
            }
            d[f] = a[b - 1];
            return c
        };
    var X = H.inherit({
        sampling: 1,
        counterId: 26302566,
        _initComponent: function() {
            X.superclass._initComponent.apply(this, arguments);
            this._sender = new ba({
                counterId: this.counterId,
                retry: !1,
                counter: {}
            })
        },
        log: function() {
            this.logParams(h.array2Props(arguments))
        },
        logParams: function(a) {
            Math.random() < this.sampling && this._sender.sendHit(x.href, "", "", a)
        }
    }), Ib = U.inherit({
        resource: "webvisor",
        retry: !0,
        postParams: ["wv-data"],
        sendPacket: function(a, b, c, d, e, f, k, l) {
            if (!a ||!a.length)
                return !1;
            var u = O.encode(a, !0);
            0 == u.indexOf("AAAAAAAAADw") && g.Error && "string" == typeof Error().stack && (new X({
                sampling: 0.1
            })).log("bad visor packet 5", 1);
            a = {
                rn: h.random(),
                "page-url": b,
                wmode: 0,
                "wv-type": 0,
                "wv-hit": c,
                "wv-part": d + 1,
                "wv-check": h.fletcher(a),
                "wv-data": u
            };
            return this.send(a, {
                z: e,
                i: f
            }, k, l)
        }
    }), Bb = Ea.inherit({
        protocol: "",
        counterId: "",
        counterType: "",
        meta: null,
        maxBufferSize: 7500,
        flushTimeout: 3E4,
        storageKey: "visorbuff",
        active: !1,
        _initComponent: function() {
            this.storage =
                new aa({
                    counterId: this.counterId
                });
            this._sender = new Ib({
                protocol: this.protocol,
                counterId: this.counterId,
                counterType: this.counterType
            });
            Bb.superclass._initComponent.apply(this, arguments)
        },
        onFlush: function(a, b, c) {
            this._sender.sendPacket(a, b.url, b.hitId, c, b.timezone, b.timestamp)
        }
    });
    h.clearTimeout = function(a) {
        return h.getNativeFunction("clearTimeout")(a)
    };
    u.isIE = function() {
        return 5.8 >= u.getJScriptVersion()
    };
    var da = {
        log: function() {
            g.console && console.log && ( - 1 < x.href.indexOf("_ym_debug=1") || g._ym_debug) &&
            console.log.apply(console, arguments)
        }
    }, Jb = U.inherit({
        resource: "clmap",
        retry: !0,
        transports: [E],
        sendClick: function(a, b, c, d) {
            this.send({
                "page-url": a,
                "pointer-click": b
            }, {}, c, d)
        }
    }), Kb = H.inherit({
        filter: null,
        ignoreTags: [],
        quota: 0,
        isTrackHash: !1,
        protocol: "",
        counterId: 0,
        counterType: 0,
        startTime: 0,
        MAX_LEN_PATH: 128,
        TIMEOUT_CLICK: 50,
        TIMEOUT_SAME_CLICKS: 1E3,
        DELTA_SAME_CLICKS: 2,
        tags: "A B BIG BODY BUTTON DD DIV DL DT EM FIELDSET FORM H1 H2 H3 H4 H5 H6 HR I IMG INPUT LI OL P PRE SELECT SMALL SPAN STRONG SUB SUP TABLE TBODY TD TEXTAREA TFOOT TH THEAD TR U UL ABBR AREA BLOCKQUOTE CAPTION CENTER CITE CODE CANVAS DFN EMBED FONT INS KBD LEGEND LABEL MAP OBJECT Q S SAMP STRIKE TT ARTICLE AUDIO ASIDE FOOTER HEADER MENU METER NAV PROGRESS SECTION TIME VIDEO NOINDEX NOBR MAIN".split(" "),
        _initComponent: function() {
            this._lastClick = null;
            this.hasQuota=!!this.quota;
            this._quota = this.quota;
            this._ignoreTags = [];
            if (this.ignoreTags)
                for (var a = 0; a < this.ignoreTags.length; a++)
                    this.ignoreTags[a] && h.mergeArrays(this._ignoreTags, [String(this.ignoreTags[a]).toUpperCase()]);
            this._cacheTags = {};
            for (var a = 59, b = String.fromCharCode, c = 0; c < this.tags.length; c++)
                this._cacheTags[this.tags[c]] = b(a), b(a), a++;
            this._sender = new Jb({
                protocol: this.protocol,
                counterId: this.counterId,
                counterType: this.counterType
            });
            this._start =
                !1;
            this.start()
        },
        destroy: function() {
            this.stop()
        },
        start: function() {
            if (!this._start)
                k.on(f, "click", this._handler, this);
            this._start=!0
        },
        stop: function() {
            this._start && k.un(f, "click", this._handler, this);
            this._start=!1
        },
        setTrackHash: function(a) {
            this.isTrackHash = a
        },
        _handler: function(a) {
            L = 1;
            a = {
                el: G.getTarget(a),
                pos: G.getPos(a),
                button: G.getMouseButton(a),
                time: + new Date
            };
            L = 2;
            if (this._isTrackingClick(a)) {
                L = 3;
                var b = l.getElementSize(a.el), c = l.getElementXY(a.el), b = ["rn", h.random(), "x", Math.floor(65535 * (a.pos[0] -
                c[0]) / (b[0] || 1)), "y", Math.floor(65535 * (a.pos[1] - c[1]) / (b[1] || 1)), "t", Math.floor((a.time - this.startTime) / 100), "p", this._getElPath(a.el)];
                L = 4;
                c = w().href;
                this.isTrackHash ? h.mergeArrays(b, ["wh", "1"]) : c = c.split("#")[0];
                L = 5;
                this._sender.sendClick(h.trim(c, la), b.join(":"));
                this._lastClick = a
            }
            L = 6
        },
        _isTrackingClick: function(a) {
            if (g.ymDisabledClickmap || "MetrikaPlayer" == g.name)
                return !1;
            var b = a.el.tagName;
            if ((2 == a.button || 3 == a.button) && "A" != b || this.filter&&!this.filter(a.el, b))
                return !1;
            for (var c = 0; c < this._ignoreTags.length; c++)
                if (this._ignoreTags[c] ==
                    b)
                    return !1;
            for (b = a.el; b;) {
                if (l.classNameExists(b, "ym-clickmap-ignore"))
                    return !1;
                b = b.parentNode
            }
            if (this._lastClick) {
                if (a.time - this._lastClick.time < this.TIMEOUT_CLICK)
                    return !1;
                var b = Math.abs(this._lastClick.pos[0] - a.pos[0]), c = Math.abs(this._lastClick.pos[1] - a.pos[1]), d = a.time - this._lastClick.time;
                if (this._lastClick.el == a.el && b < this.DELTA_SAME_CLICKS && c < this.DELTA_SAME_CLICKS && d < this.TIMEOUT_SAME_CLICKS)
                    return !1
            }
            if (this.hasQuota) {
                if (!this._quota)
                    return !1;
                this._quota--
            }
            return !0
        },
        _getElPath: function(a) {
            for (var b =
                ""; a && a.parentNode && "BODY" != a.tagName && "HTML" != a.tagName;)
                b += this._cacheTags[a.tagName] || "*", b += l.getElementNeighborPosition(a) || "", a = a.parentNode;
            return h.trim(b, this.MAX_LEN_PATH)
        }
    }), Ga = H.inherit({
        _initComponent: function() {
            Ga.superclass._initComponent.apply(this, arguments);
            this._executedMsgs = {};
            k.on(g, "message", this.RemoteControl__onMessage, this)
        },
        RemoteControl__onMessage: function(a) {
            try {
                var b = a.origin
            } catch (c) {}
            if (b && /^https?:\/\/(.*?\.)?(metr(i(ca?|ka))?|analytics|metrika-(dev|test|ps)(\.haze)?)\.yandex\.(ru|ua|by|kz|com(\.tr)?)(:\d+)?$/.test(b)) {
                try {
                    var d =
                        (new Function("return " + a.data))()
                } catch (e) {}
                d && d.id && d.code&&!this._executedMsgs[d.id] && (this._executedMsgs[d.id]=!0, (new Function("evt", d.code))(a))
            }
        }
    }), N = {};
    h.pad = function(a) {
        return (10 > a ? "0" : "") + a
    };
    N.getTimestamp = function() {
        for (var a = new Date, a = [a.getFullYear(), a.getMonth() + 1, a.getDate(), a.getHours(), a.getMinutes(), a.getSeconds()], b = "", c = 0; c < a.length; c++)
            b += h.pad(a[c]);
        return b
    };
    N.getTimezone = function() {
        return - (new Date).getTimezoneOffset()
    };
    var Ha = H.inherit({
        counter: null,
        _initComponent: function() {
            Ha.superclass._initComponent.apply(this,
                arguments);
            if (g.dataLayer && "function" == typeof g.dataLayer.push) {
                var a = this;
                a._send(g.dataLayer);
                var b = g.dataLayer.push;
                g.dataLayer.push = function() {
                    a._send([].slice.call(arguments, 0));
                    b.apply(this, arguments)
                }
            }
        },
        _send: function(a) {
            for (var b = [], c = 0; c < a.length; c++)
                a[c].ecommerce && (b[b.length] = a[c].ecommerce);
            b.length && this.counter.params({
                __ym: {
                    ecommerce: b
                }
            })
        }
    }), t = C.inherit({
        id: "script",
        request: function(a, b, c, d) {
            var e = "_ymjsp" + h.random(), k = f.createElement("script");
            g[e] = F(function(a) {
                try {
                    delete g[e]
                } catch (b) {
                    g[e] =
                        K
                }
                c.call(d, !0, a);
                k.parentNode && k.parentNode.removeChild(k)
            }, "transport.script");
            k.type = "text/javascript";
            k.src = this._buildUrl(a, h.mixin({
                wmode: 5,
                callback: e
            }, b));
            a = f.getElementsByTagName("head")[0];
            a.insertBefore(k, a.firstChild);
            return !0
        }
    }), Lb = ba.inherit({
        transports: [t],
        trimParams: !0,
        sendHit: function(a, b, c, d, e, f, g, h, k, l, q) {
            var m = {};
            f && (m.vc = f);
            g && (m.pr = 1);
            this._hitExt(a, b, c, d, e, m, h, k, l, q)
        }
    }), R = [];
    g.Ya = g.Ya || {};
    Ya._metrika = Ya._metrika || {};
    Ya._metrika.counters = Ya._metrika.counters || {};
    Ya._metrika.hitParam =
        Ya._metrika.hitParam || {};
    Ya._metrika.counterNum = Ya._metrika.counterNum || 0;
    Ya._globalMetrikaHitId = h.random();
    var x = w(), Ba = N.getTimezone(), Ca = N.getTimestamp(), D = g.navigator, W = g.screen, $ = "https:" == x.protocol ? "https:": "http:", fa = "ver628".slice(3), Gb = 64, la = u.isIE() ? 512: 2048, Hb = u.isIE() ? 512: 2048, Fa = u.isIE() ? 100: 400, ka = "noindex", Ia = 50, Mb = 15E3, Ja = RegExp("\\.(3gp|7z|aac|ac3|acs|ai|avi|ape|apk|asf|bmp|bz2|cab|cdr|crc32|css|csv|cue|divx|dmg|djvu?|doc(x|m|b)?|emf|eps|exe|flac?|flv|iso|swf|gif|t?gz|jpe?g?|js|m3u8?|m4a|mp(3|4|e?g?)|m4v|md5|mkv|mov|msi|ods|og(g|m|v)|pdf|phps|png|ppt(x|m|b)?|psd|rar|rss|rtf|sea|sfv|sit|sha1|svg|tar|tif?f|torrent|ts|txt|vob|wave?|wma|wmv|wmf|webm|xls(x|m|b)?|xpi|g?zip)$",
        "i"), Nb =+ new Date, ma, ea;
    g.Ya.Metrika = function(a, b, c, d) {
        var e = this;
        return F(function() {
            function t(v) {
                var n=!1;
                if (Ya._metrika.hitParam[B]) {
                    if (1 != c || Ya._metrika.counters[B])
                        return !1;
                    n=!0
                }
                Ya._metrika.counters[B] = e;
                Ya._metrika.hitParam[B] = 1;
                e._webvisor=!d && (y && y.webvisor || ib);
                e._directCampaign = y && y.directCampaign;
                y && y.trackHash && D(!0);
                if (!d&&!n) {
                    e.replacePhones();
                    var z = new Z({
                        counterId: a
                    }), J = z.read("visorc");
                    "b" != J && "w" != J && (J = "");
                    if (!z.isEnabled() || ga("opera mini"))
                        J = "b";
                    ma =+ new Date;
                    var n = new Lb({
                        protocol: $,
                        counterType: c,
                        counterId: a,
                        trackHash: Y,
                        hitId: E,
                        webvisor: e._webvisor,
                        counter: e,
                        counterNum: T
                    }), q = {
                        ut: K,
                        he: y?~~y.httpError: 0,
                        ad: 1 == c && g.Ya && g.Ya.Direct,
                        saveRef: !0
                    };
                    da.log("PageView. Counter " + a + ". URL: " + x.href + ". Referer: " + f.referrer, ". Params: ", b);
                    n.sendHit(x.href, l.getDocumentTitle(), f.referrer, b, q, J, v, Ca, Ba, function(a) {
                        ea || (ea =+ new Date);
                        a = a || {};
                        var b = a.webvisor || {};
                        if (N) {
                            var c =+ b.recp;
                            if (!isFinite(c) || 0 > c || 1 < c)
                                J = "w";
                            J || (J = E%1E4 / 1E4 < c ? "w" : "b");
                            z.create("visorc", J, 30);
                            "w" == J ? (N.start(), c = b.arch_type,
                            (b = b.urls) && c && N.uploadPages(b, c)) : N.stop()
                        }
                        b = a.mp2;
                        a = e;
                        z.erase("mp2_substs");
                        if (b) {
                            b:
                                if ((c = b.conditions) && c.length)
                                    for (var d = 0; d < c.length; d++) {
                                        var v;
                                        if ("ref" == c[d].type)
                                            v = Pa(c[d]);
                                        else if (v = "adv" == c[d].type) {
                                            var n = c[d], l = Ya._metrika.counter._directCampaign, m = n.ServiceNamePattern, p = n.RefererPattern;
                                            v = l ? n.direct_orders : n.direct_camp;
                                            var s = f.referrer, q = x.search, q = q && q.replace(/^\?/, ""), u = {};
                                            if (q)
                                                for (var q = q.split("&"), t = 0; t < q.length; t++) {
                                                    var r = q[t].split("=");
                                                    u[Q(r[0])] = Q(r[1])
                                                }
                                            for (var q = Qa(x.search,
                                                x.hash), t = {}, r = ["source", "medium", "campaign", "term", "content"], w = 0; w < r.length; w++)
                                                u["utm_" + r[w]] && (t[r[w]] = u["utm_" + r[w]]);
                                            w = l ? "direct.yandex.ru" : q && q.service || t.source;
                                            r=!1;
                                            if (!r && m && m.length)
                                                for (var y = 0; y < m.length; y++)
                                                    if (RegExp(m[y], "i").test(w)) {
                                                        r=!0;
                                                        break
                                                    }
                                            if (!r && p && p.length)
                                                for (m = 0; m < p.length; m++)
                                                    if (RegExp(p[m], "i").test(s)) {
                                                        r=!0;
                                                        break
                                                    }
                                            !r && n.google_adwords && u.gclid && (r=!0);
                                            !r && n.yandex_direct && u.yclid && (r=!0);
                                            if (r && v && v.length && (r=!1, n = l || q && q.campaign || t && t.campaign))
                                                for (l = 0; l < v.length; l++)
                                                    if (v[l] ==
                                                        n) {
                                                        r=!0;
                                                        break
                                                    }
                                            v = r
                                        }
                                        if (v) {
                                            c[d].track_id && z.create("mp2_track", c[d].track_id, 43200);
                                            break b
                                        }
                                    }
                            c = z.read("mp2_track");
                            b = b.substs && b.substs[c];
                            c && b ? (z.create("mp2_substs", h.toJSON(b)), b = ra(b), a.params("__ym", b ? "mp_trackid" : "mp_trackid_bad", c)) : sa()
                        } else
                            sa();
                        k.on(g, "load", e.replacePhones, e);
                        e._inited=!0
                    })
                }
                C();
                y && (y.enableAll ? (p(!0), s(!0), m()) : (y.clickmap && s(y.clickmap), y.trackLinks && p(y.trackLinks), y.accurateTrackBounce && m(y.accurateTrackBounce), y.ad && ad()), (y.useDataLayer || 0.01 > Math.random()) && new Ha({
                    counter: e
                }));
                e._webvisor && (N = new Sa($, a, c, y, E, e))
            }
            function p(a) {
                var b = {
                    delay: Ia
                };
                switch (typeof a) {
                    case "string":
                        b.on=!0;
                        break;
                    case "object":
                        b.on=!0;
                        b.delay = "number" != typeof a.delay ? Ia : a.delay;
                        break;
                    case "boolean":
                        b.on = a;
                        break;
                    default:
                        return
                }
                e._trackLinks = b
            }
            function C() {
                p(!1);
                k.on(f, "click", function(a) {
                    e._trackLinks.on && r(a)
                })
            }
            function r(a) {
                var b = Ka(a);
                if (b) {
                    var c=!1, d = "" + b.href, f = d ? d.split(/\?/)[0] : "", h = function(a) {
                        var c = kb(b.innerHTML.replace(/<\/?[^>]+>/gi, ""));
                        M.sendClickLink(d, d == c ? "" : c, a)
                    }, k = function() {
                        var c;
                        var d = b.target;
                        c=!1;
                        b.hostname ? (d && "_self" != d && "_top" != d && "_parent" != d || (c=!0), (d = a.shiftKey || a.ctrlKey || a.altKey) || a.modifiers && g.Event && (d = a.modifiers & g.Event.CONTROL_MASK || a.modifiers & g.Event.SHIFT_MASK || a.modifiers & g.Event.ALT_MASK), c = c&&!d) : c=!1;
                        return c ? e._trackLinks.delay : 0
                    };
                    if (Ja.test(f) || Ja.test(d) || pa(d, O) || pa(f, O))
                        c=!0;
                    var m = l.classNameExists(b, "ym-disable-tracklink"), f = l.classNameExists(b, "ym-external-link");
                    m || (m = {
                        ln: !0,
                        dl: c
                    }, f ? (m.delay = k(), h(m)) : La(w().hostname, b.hostname) ? c && (m.ln =
                        !1, m.delay = k(), h(m)) : d&&-1 != d.search(/^ *(data|javascript):/i) || (m.ut = ka, m.delay = k(), h(m)))
                }
            }
            function s(b) {
                "undefined" == typeof b && (b=!0);
                !0 === b && (b = {});
                e._clickmap && e._clickmap.destroy();
                b && (e._clickmap = new Kb({
                    filter: b.filter,
                    ignoreTags: b.ignoreTags,
                    quota: b.quota,
                    isTrackHash: b.isTrackHash,
                    protocol: L,
                    counterId: a,
                    counterType: c,
                    startTime: Nb
                }))
            }
            function q(a, b) {
                function c() {
                    if (!y) {
                        w && h.clearTimeout(w);
                        var d = b, e;
                        e = r ? s : s + + new Date - t;
                        d -= e;
                        0 > d && (d = 0);
                        w = h.setTimeout(function() {
                            y=!0;
                            m(!1);
                            a()
                        }, d, "trackUserTime")
                    }
                }
                function d() {
                    r = p = q=!0;
                    s+=+new Date - t;
                    t =+ new Date;
                    c()
                }
                function e() {
                    p || q || (s = 0);
                    t =+ new Date;
                    p = q=!0;
                    r=!1;
                    c()
                }
                function l() {
                    q || (p=!0, r=!1, q=!0, c())
                }
                function m(a) {
                    for (var b = 0; b < x.length; b += 3)
                        if (a)
                            k.on(x[b], x[b + 1], x[b + 2]);
                        else
                            k.un(x[b], x[b + 1], x[b + 2])
                }
                var p=!1, q=!1, r=!0, s = 0, t =+ new Date, w = null, y=!1;
                if (u.isIE())
                    h.setTimeout(a, b, "trackUserTime");
                else {
                    var x = [g, "blur", d, g, "focus", e, f, "click", l, f, "mousemove", l, f, "keydown", l, f, "scroll", l];
                    m(!0);
                    c()
                }
            }
            function m(b) {
                "number" != typeof b && (b = Mb);
                if (!e._isAccurateTrackBounce) {
                    e._isAccurateTrackBounce =
                        !0;
                    var c = new aa({
                        counterId: a
                    }), d = c.get("lastHit");
                    c.set("lastHit", + new Date);
                    ((c = c.get("lastHit")) && (!d || d < c - 18E5) ||!Ma(f.referrer, w().href) || 0.1 > Math.random()) && q(function() {
                        e.notBounce()
                    }, b)
                }
            }
            function G(a) {
                function b() {
                    var a = w().hash.split("#")[1];
                    if ("undefined" == typeof a)
                        return !1;
                    var c = a.indexOf("?");
                    0 < c && (a = a.substring(0, c));
                    return a
                }
                var c = b();
                (function wa() {
                    var d = b();
                    d !== c && (a(), c = d);
                    W = h.setTimeout(wa, 200, "trackHash")
                })()
            }
            function D(a) {
                if (!1 === a)
                    Y && ("onhashchange"in g ? k.un(g, "hashchange", H) :
                        h.clearTimeout(W), Y=!1);
                else if (a = H, !Y) {
                    if ("onhashchange"in g)
                        k.on(g, "hashchange", a);
                    else
                        G(a);
                    Y=!0
                }
                M.setTrackHash(Y);
                e._trackHash = Y
            }
            function H() {
                R = V = P;
                var a = {
                    ut: K,
                    ad: 1 == c && g.Ya && g.Ya.Direct,
                    wh: !0,
                    saveRef: !0
                };
                M.sendAjaxHit(w().href, l.getDocumentTitle(), R, a);
                P = w().href
            }
            var E = Math.round(1073741824 * Math.random()), B, K = "", L = $, P = V = x.href, R = "", y;
            Ya._metrika.counter || (Ya._metrika.counter = e);
            "object" == typeof a && (y = a, d = a.defer, K = a.ut, c = a.type, b = a.params, L = a.onlyHttps ? "https:" : $, a = a.id);
            a = a || 0;
            /^\d+$/.test(a) ||
            (a = 0);
            c = c || 0;
            B = a + ":" + c;
            if (Ya._metrika.counters[B])
                return Ya._metrika.counters[B];
            Ya._metrika.counterNum++;
            var T = Ya._metrika.counterNum;
            U.retransmit();
            var M = new ba({
                protocol: L,
                counterType: c,
                counterId: a,
                hitId: E,
                counter: e,
                counterNum: T
            }), N;
            e.replacePhones = F(function() {
                try {
                    var b = (new Z({
                        counterId: a
                    })).read("mp2_substs");
                    if (b) {
                        var c = (new Function("return " + b))();
                        c && ra(c, !0)
                    }
                } catch (d) {}
            }, "counter.replacePhones");
            e.reachGoal = F(function(b, c) {
                da.log("Reach goal. Counter: " + a + ". Goal id: " + b + ". Params: ", c);
                M.sendGoal(b, c);
                return !0
            }, "counter.reachGoal");
            e.trackLinks = F(function(a) {
                p(a)
            }, "counter.trackLinks");
            e.hit = F(function(b, c, d, e, f) {
                b && (da.log("PageView. Counter " + a + ". URL: " + b + ". Referer: " + d + ". Params: ", e), M.sendHit(b, c, d, e, f))
            }, "counter.hit");
            e.params = F(function(b) {
                b && (1 < arguments.length && (b = h.array2Props(arguments)), da.log("User params. Counter " + a + ". Params: ", b), M.sendParams(b))
            }, "counter.params");
            e.file = F(function(a, b, c, d) {
                a && M.sendFileUpload(a, b, c, d)
            }, "counter.file");
            e.extLink = F(function(a,
                                   b, c, d) {
                a && M.sendExtLink(a, b, c, d)
            }, "counter.extLink");
            e.notBounce = F(function() {
                var a = 0;
                ma && ea && (a = ea - ma);
                M.sendNotBounce(a)
            }, "counter.notBounce");
            var O = [];
            e.addFileExtension = function(a) {
                "string" == typeof a ? O.push(a) : O = O.concat(a)
            };
            e.clickmap = function(a) {
                s(a)
            };
            e.accurateTrackBounce = function(a) {
                m(a)
            };
            var W = null, Y=!1;
            e.trackHash = function(a) {
                D(a)
            };
            e.video = F(function(a, b, c, d) {
                var e = ["end", "play", "pause", "seek"];
                if (a && c) {
                    a:
                    {
                        for (var f = 0, g = e.length; f < g; f += 1)
                            if (a === e[f]) {
                                e = f;
                                break a
                            }
                        e =- 1
                    }
                    - 1 !== e && M.sendVideoAction(a,
                        b, c, d)
                }
            }, "counter.video");
            e.social = F(function(a, b, c) {
                a && b && M.sendSocialClick(a, b, c)
            }, "counter.social");
            e.enableAll = function() {
                p(!0);
                s(!0);
                m()
            };
            e.uploadPage = function() {};
            e._performanceTiming = qa;
            if (a)
                if ("prerender" == f.webkitVisibilityState) {
                    M.sendPrerenderHit(x.href, l.getDocumentTitle(), f.referrer);
                    var X = function() {
                        "prerender" != f.webkitVisibilityState && (k.un(f, "webkitvisibilitychange", X), t(!0))
                    };
                    k.on(f, "webkitvisibilitychange", X)
                } else
                    t(!1)
        }, "init")()
    };
    if (g.performance && "function" == typeof performance.getEntries) {
        C =
        {
            2343947156: 1,
            1996539654: 1,
            2065498185: 1,
            823651274: 1,
            1417229093: 1,
            138396985: 1
        };
        B = performance.getEntries();
        P = {};
        for (t = 0; t < B.length; t++) {
            var E = B[t], na = E.name.replace(/^https?:\/\//, "").split("?")[0], Ob = h.fnv32a(na);
            C[Ob]&&!P[na] && 0 < E.duration && (P[na] = {
                dns: Math.round(E.domainLookupEnd - E.domainLookupStart),
                tcp: Math.round(E.connectEnd - E.connectStart),
                duration: Math.round(E.duration),
                response: Math.round(E.responseEnd - E.requestStart),
                pages: x.href
            })
        }(new X({
            sampling: 1E-4
        })).logParams({
                timings8: P
            })
    }
    g.Ya._metrika.remoteCtrlInited ||
    (g.Ya._metrika.remoteCtrlInited=!0, new Ga);
    g.Ya.Metrika.counters = function() {
        var a = [];
        h.forEachKey(g.Ya._metrika.counters, function(b, c) {
            var d = b.split(":");
            a.push({
                id: + d[0],
                type: + d[1],
                accurateTrackBounce: c._isAccurateTrackBounce,
                clickmap: c._clickmap && c._clickmap._start,
                oldCode: !!g.ya_cid,
                trackHash: !!c._trackHash,
                trackLinks: c._trackLinks && c._trackLinks.on,
                webvisor: !!c._webvisor
            })
        });
        return a
    };
    g.ya_cid && new Ya.Metrika(g.ya_cid, g.ya_params, g.ya_class);
    g.ya_cid&&!g.ya_hit && (g.ya_hit = function(a, b) {
        Ya._metrika.counter &&
        Ya._metrika.counter.reachGoal(a, b)
    });
    t = g.yandex_metrika_callback;
    C = g.yandex_metrika_callbacks;
    "function" == typeof t && t();
    if ("object" == typeof C)
        for (t = 0; t < C.length; t++)
            if (B = C[t])
                C[t] = null, B();
    ta("yandex_metrika_callback");
    ta("yandex_metrika_callbacks");
    C = ["link", "click", "scroll", "res"];
    for (t = 0; t < C.length; t++)
        if (B = C[t] + "map", - 1 != x.href.search("ym_playback=" + B)) {
            ua($ + "//metrika.yandex.ru/js/" + B + "/_loader.js");
            break
        }
    g.Ya.Metrika.informer = function(a) {
        var b=!!Ya.Metrika._informer;
        Ya.Metrika._informer = a;
        b ||
        ua($ + "//mc.yandex.ru/metrika/informer.js")
    };
    (function() {
        var a = function() {
            var a = f.getElementsByTagName("body")[0], b = f.createElement("iframe");
            b.src = "http://awaps.yandex.ru/0/2153/0.htm?ad=165746&pl=93829&rnd=" + h.random();
            b.setAttribute("style", "position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden;visibility:hidden");
            a.appendChild(b);
            h.setTimeout(function() {
                b.parentNode && b.parentNode.removeChild(b)
            }, 1E4, "ad")
        }, b = function() {
            g.removeEventListener("load", b, !1);
            a()
        }, c = g.performance;
        h.random(200) ||
        Ya._metrika.isAd || (Ya._metrika.isAd=!0, "http:" == $ && "object" == typeof c && g.addEventListener && (c.timing && c.timing.loadEventStart ? a() : g.addEventListener("load", b, !1)))
    })()
})(this, this.document);


