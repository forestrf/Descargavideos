console.log("Changed kraken");

var KRAKEN = KRAKEN || {};
! function(e) {
    function t(e, t) {
		console.log("t(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t || (t = "players"), KRAKEN[t][e].config || (KRAKEN[t][e].config = {}), KRAKEN[t][e].config.key || (KRAKEN[t][e].config.key = KRAKEN.config.key), KRAKEN[t][e].config.thumbnailMethod || (KRAKEN[t][e].config.thumbnailMethod = KRAKEN.config.thumbnailMethod), KRAKEN[t][e].config.multipleImages || (KRAKEN[t][e].config.multipleImages = KRAKEN.config.multipleImages), KRAKEN[t][e].config.animateDelayTime || (KRAKEN[t][e].config.animateDelayTime = KRAKEN.config.animateDelayTime), KRAKEN[t][e].config.animateTransitionTime || (KRAKEN[t][e].config.animateTransitionTime = KRAKEN.config.animateTransitionTime), KRAKEN[t][e].config.autoRegister || (KRAKEN[t][e].config.autoRegister = KRAKEN.config.autoRegister), KRAKEN[t][e].config.flags || (KRAKEN[t][e].config.flags = {}), "players" == [t] && (KRAKEN[t][e].config.runtime = "html5")
    }

    function n() {
        k();
        for (var e = null, t = document.getElementsByTagName("script"), n = 0, r = t.length; r > n; n++) {
            var o = t[n],
                a = o.getAttribute("data-kraken-config");
            a && "" !== a && (e = JSON.parse(a), KRAKEN.setConfig(e))
        }
        if (e && e.manualKraken === !0);
        else if (e && e.customKraken) {
            var l = document.createElement("script");
            l.src = KRAKEN.urls.base + "code/custom/?k=" + (e.customKraken !== !0 ? e.customKraken : top.location.host) + "&" + Date.now(), l.id = "kraken_custom_config";
            var s = document.getElementsByTagName("head")[0];
            s.appendChild(l)
        } else i()
    }

    function i() {
        r(), setTimeout(o, 0), setTimeout(a, 0)
    }

    function r() {
        var t = document.querySelector("body");
        e.MutationObserver = e.MutationObserver || e.WebKitMutationObserver || e.MozMutationObserver;
        var n = new MutationObserver(function(e) {
                e.forEach(function(e) {
                    ("childList" == e.type || "attributes" === e.type && "class" === e.attributeName) && (setTimeout(o, 0), setTimeout(a, 0))
                })
            }),
            i = {
                attributes: !0,
                childList: !0,
                characterData: !0,
                subtree: !0
            };
        n.observe(t, i)
    }

    function o() {
        if (KRAKEN.config.autoDetection)
            for (var e in KRAKEN.config.autoDetection)
                for (var n = KRAKEN.config.autoDetection[e], i = n.selector, r = n.validateSelector, o = document.querySelectorAll(i), a = 0, l = o.length; l > a; a++) {
                    var s = o[a],
                        c = !0;
                    if (r && "" !== r) {
                        var u = s.querySelector(r);
                        u || (c = !1)
                    }
                    if (c) {
                        var d = s.getAttribute("id");
                        if (n.getPlayerId && (d = n.getPlayerId(s, d)), d && !KRAKEN.players[d]) {
                            KRAKEN.config.debug && x(d);
                            var f = null;
                            if (n.getPlayerObj && (f = n.getPlayerObj(s, d)), f) {
                                if (KRAKEN.players[d] || (KRAKEN.players[d] = {}), KRAKEN.players[d].solution = e, KRAKEN.players[d].playerObj = f, !KRAKEN.funcs.isMobile() && f.getConfig() && f.getConfig().autostart) {
                                    KRAKEN.config.debug && x("Detected auto play. Registering and returning."), b();
                                    var K = f.getPlaylistItem(0).mcpProviderId;
                                    return K || (K = f.getPlaylistItem(0).fwassetid), void m(KRAKEN.config.key, K)
                                }
                                KRAKEN.players[d].playerDOM = document.getElementById(d), KRAKEN.players[d].posterObj = null, t(d), N(d), n.buildPoster && n.buildPoster(s, d, f), n.attachPlayerEvents && n.attachPlayerEvents(s, d, f)
                            }
                        }
                    }
                }
    }

    function a() {
        if (KRAKEN.config.customDetection)
            for (var e in KRAKEN.config.customDetection)
                for (var t = KRAKEN.config.customDetection[e], n = t.selector, i = t.validateSelector, r = t.readyTrigger, o = document.querySelectorAll(n), a = 0, s = o.length; s > a; a++) {
                    var c = o[a],
                        u = !0;
                    if (i && "" !== i) {
                        var d = c.querySelector(i);
                        d || (u = !1)
                    }
                    var f = !0;
                    if (r && "" !== r) {
                        f = !1;
                        var K = c.querySelector(r);
                        K && "" !== K && (f = !0)
                    }
                    if (u && f && !c.getAttribute("krakenized")) {
                        c.setAttribute("krakenized", "true");
                        var g = t.getMediaId ? t.getMediaId(e, c) : "";
                        g && l(e, c, g)
                    }
                }
    }

    function l(n, i, r) {
		console.log("l(" + n + ", " + i + ", " + r + ")");
		console.log(n);
		console.log(i);
		console.log(r);
		
        var o = KRAKEN.config.customDetection[n],
            a = {};
        "string" == typeof r ? a.mediaid = r : (a = r, a.mediaid && (r = a.mediaid)), r && !KRAKEN.placeholders[r] && (KRAKEN.placeholders[r] || (KRAKEN.placeholders[r] = {}), KRAKEN.placeholders[r].customConfig = n, KRAKEN.placeholders[r].currentClip = a, KRAKEN.placeholders[r].selectorObj = i, KRAKEN.placeholders[r].playerObj = o.getPlayerObj ? o.getPlayerObj(i, r) : null, KRAKEN.placeholders[r].videoObj = o.getVideoObj ? o.getVideoObj(i, r) : null, KRAKEN.placeholders[r].posterObj = o.getPosterObj ? o.getPosterObj(i, r) : null, KRAKEN.placeholders[r].posterObj && h(KRAKEN.placeholders[r].posterObj, "kraken_placeholder_poster"), KRAKEN.placeholders[r].clickObj = o.getClickObj ? o.getClickObj(i, r) : KRAKEN.placeholders[r].posterObj, C("click", KRAKEN.placeholders[r].clickObj, function() {
            o.doOverlayClick && o.doOverlayClick(i, r), p(r, "placeholders")
        }), t(r, "placeholders"), R(r, "placeholders"), o.playerListener && e.addEventListener("message", function(e) {
            o.playerListener(r, e)
        }), o.attachPlayerEvents && o.attachPlayerEvents(i, r))
    }

    function s(e, t, n) {
		console.log("s(" + e + ", " + t + ", " + n + ")");
		console.log(e);
		console.log(t);
		console.log(n);
		
        KRAKEN.config.debug && x("krakenBuildPoster: " + e);
        var i = KRAKEN.players[e];
        if (KRAKEN.config.autoDetection && KRAKEN.config.autoDetection[i.solution]) {
            var r = KRAKEN.config.autoDetection[i.solution],
                o = r.getMediaIdKey ? r.getMediaIdKey() : null;
            i.currentClip = r.getCurrentClip ? r.getCurrentClip(i, t) : null, i.posterObj = r.getPosterObj ? r.getPosterObj(i, e) : null, i.currentClip.mediaid = i.playerObj.getPlaylistItem(0).mcpProviderId, i.currentClip.mediaid || (i.currentClip.mediaid = i.playerObj.getPlaylistItem(0).fwassetid), i.currentClip = c(i.currentClip, o), KRAKEN.config.debug && x("Rationalised clip:"), KRAKEN.config.debug && x(i.currentClip), R(e)
        }
    }

    function c(e, t) {
		console.log("c(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        var n = JSON.parse(JSON.stringify(e));
        return (!n.video_url || n.video_url && "" === n.video_url) && (n.url && (n.video_url = n.url), n.file && (n.video_url = n.file), n.sources && n.sources[0] && n.sources[0].file && (n.video_url = n.sources[0].file)), n.video_url && 0 === n.video_url.indexOf("//") && (n.video_url = self.location.protocol + n.video_url), n.video_url && 0 === n.video_url.indexOf("/") && (n.video_url = self.location.protocol + "//" + self.location.host + n.video_url), (!n.thumbnail_url || n.thumbnail_url && "" === n.thumbnail_url) && (n.thumbnail_image && (n.thumbnail_url = n.thumbnail_image), n.defaultThumbnailUrl && (n.thumbnail_url = n.defaultThumbnailUrl), n.poster && (n.thumbnail_url = n.poster), n.image && (n.thumbnail_url = n.image)), n.thumbnail_url && 0 === n.thumbnail_url.indexOf("//") && (n.thumbnail_url = self.location.protocol + n.thumbnail_url), n.thumbnail_url && 0 === n.thumbnail_url.indexOf("/") && (n.thumbnail_url = self.location.protocol + "//" + self.location.host + n.thumbnail_url), (!n.title || n.title && "" === n.title) && (n.title = document.title, "" === n.title && (n.title = n.video_url)), (!n.description || n.description && "" === n.description) && (n.description = n.video_url), n.mediaid || (t && n[t] && (n.mediaid = n[t]), (!n.mediaid || n.mediaid && "" === n.mediaid) && (KRAKEN.config.debug && x("krakenRationaliseClip: No media id - using thumbnail: " + n.thumbnail_url), n.mediaid = KRAKEN.funcs.MD5(n.thumbnail_url))), (!n.external_id || n.external_id && "" === n.external_id) && (n.external_id = n.mediaid), n
    }

    function u(e, t, n, i, r, o) {
		console.log("u(" + e + ", " + t + ", " + n + ", " + i + ", " + r + ", " + o + ")");
		console.log(e);
		console.log(t);
		console.log(n);
		console.log(i);
		console.log(r);
		console.log(o);
		
        KRAKEN.config.debug && x("krakenCreateOverlay: " + e);
        var a = "",
            l = "",
            s = KRAKEN[t][e].currentClip;
        s && s.thumbnail_url && "" !== s.thumbnail_url ? l = s.thumbnail_url : KRAKEN[t][e].videoObj && (l = KRAKEN[t][e].videoObj.getAttribute("poster")), l && "" !== l && (a = "background-image:url(" + l + ");"), n.style.position = "relative";
        var c = document.createElement("div");
        c.setAttribute("id", "kraken_" + e + "_overlay"), "players" === t ? c.setAttribute("class", "kraken_" + e + "_poster") : c.setAttribute("class", "kraken_placeholder_poster");
        var u = "right:0;";
        r && (u = "width:" + r + ";");
        var f = "bottom:0;";
        return o && (f = "height:" + o + ";"), c.setAttribute("style", "position:absolute;" + (i ? "pointer-events:none;" : "") + "top:0;left:0;" + u + f + "z-index:" + KRAKEN.config.overlayZIndex + ";cursor:pointer;" + a), c.innerHTML = KRAKEN.config.playIconOverride ? KRAKEN.config.playIconOverride : '<span class="kraken_play_button" style="pointer-events:none;position:absolute;display:inline-block;background:url(' + KRAKEN.config.playIconImg + ") no-repeat center;background-size:cover;" + KRAKEN.config.playIconStyle + '"></span>', n.appendChild(c), "players" === t && C("click", c, function() {
            d(e, t)
        }), c
    }

    function d(e, t) {
		console.log("d(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        KRAKEN.config.debug && x("krakenOverlayClick: " + e), t || (t = "players");
        var n = KRAKEN[t][e];
        if (f(e, t), KRAKEN.config.autoDetection && KRAKEN.config.autoDetection[n.solution]) {
            var i = KRAKEN.config.autoDetection[n.solution];
            i.doOverlayClick && i.doOverlayClick(n)
        }
    }

    function f(e, t) {
		console.log("f(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        var n = KRAKEN[t][e];
        n.posterObj.style.display = "none"
    }

    function K(e, t) {
		console.log("K(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        KRAKEN.config.debug && x("krakenMultiImages: " + e), t || (t = "players");
        var n = KRAKEN[t][e];
        if (n) {
            var i = n.config;
            i && "animate" == i.multipleImages && n.posterObj && (i.flags.krakenAnimate = !0, g(e, t))
        }
    }

    function g(e, t) {
		console.log("g(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        KRAKEN.config.debug && x("krakenNextPoster: " + e), t || (t = "players");
        var n = KRAKEN[t][e];
        if (n) {
            var i = n.config;
            if (i.flags.krakenAnimate === !0) {
                var r = n.currentClip;
                if (r.usingKraken === !0) {
                    var o = r.kraken.current,
                        a = r.kraken.images[o];
                    n.posterObj && (n.posterObj.style.backgroundImage = "url(" + a + ")", r.kraken.images.length > 1 && setTimeout(function() {
                        g(e, t)
                    }, 1e3 * parseInt(i.animateDelayTime, 10))), o++, o >= r.kraken.images.length && (o = 0), r.kraken.current = o
                }
            }
        }
    }

    function p(e, t) {
		console.log("p(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t || (t = "players"), KRAKEN.config.debug && x("krakenRegisterClick: " + e);
        var n = KRAKEN[t][e],
            i = n.config;
        i.flags.krakenAnimate = !1, "players" === t && n.posterObj && (n.posterObj.style.backgroundImage = "none", n.posterObj.style.backgroundColor = "transparent");
        var r = n.currentClip;
        if (r.usingKraken === !0 && r.clickedOnce !== !0) {
            r.clickedOnce = !0;
            var o = r.mediaid,
                a = i.key;
            if (KRAKEN.config.debug && x(a + ":" + o), a && "" !== a && o && "" !== o) {
                var l = r.kraken.current,
                    s = r.kraken.images[l],
                    c = "key=" + a + "&external_id=" + o + "&image=" + encodeURIComponent(s);
                KRAKEN.urls.referrer && (c += "&referrer=" + encodeURIComponent(KRAKEN.urls.referrer));
                var u = {};
                u["Content-type"] = "application/x-www-form-urlencoded", j(KRAKEN.urls.visualClick, function(e, t, n) {
                    200 == t || 204 == t ? KRAKEN.config.debug && x("Kraken click: success: " + t) : KRAKEN.config.debug && x("Kraken click: failed: " + t)
                }, !1, u, c)
            }
        }
    }

    function m(e, t) {
		console.log("m(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        if (KRAKEN.config.debug && x("Recording Auto play: " + e + " : " + t), e && "" !== e && t && "" !== t) {
            var n = KRAKEN.urls.visualGet + "?external_id=" + t + "&key=" + e + "&type=autoplay";
            KRAKEN.urls.referrer && (n += "&referrer=" + encodeURIComponent(KRAKEN.urls.referrer)), _(n, function() {
                KRAKEN.config.debug && x("Recording autoplay: " + n)
            }, !1)
        }
    }

    function R(e, t) {
		console.log("R(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t || (t = "players"), KRAKEN.config.debug && x("krakenLoadImages: " + e);
        var n = KRAKEN[t][e],
            i = n.config,
            r = n.currentClip.mediaid,
            o = i.key;
        if (KRAKEN.config.debug && x(o + ":" + r), o && "" !== o && r && "" !== r) {
            var a = KRAKEN.urls.visualGet + "?external_id=" + r + "&key=" + o;
            KRAKEN.urls.referrer && (a += "&referrer=" + encodeURIComponent(KRAKEN.urls.referrer)), _(a, function(r, o, a) {
                if (200 == o) {
                    n.config.flags.krakenStatus = "registered";
                    var l = JSON.parse(a);
                    n.currentClip.kraken = {}, n.currentClip.kraken.original = n.currentClip.thumbnail_url, n.currentClip.kraken.images = [];
                    var s = null,
                        c = 0;
                    if (l.images) {
                        for (var u = l.images.length, d = 0, f = u; f > d; d++) {
                            var g = new Image;
                            g.src = l.images[d].image, n.currentClip.kraken.images.push(l.images[d].image)
                        }
                        var p = i.multipleImages;
                        "random" === p && (c = Math.round(Math.random() * (u - 1))), s = l.images[c].image
                    } else s = l.image, n.currentClip.kraken.images.push(s);
                    n.currentClip.kraken.current = c, n.currentClip.kraken.thumbnail = s, n.currentClip.usingKraken = !0, n.posterObj.style.backgroundImage = "url(" + n.currentClip.kraken.thumbnail + ")", n.posterObj.style.backgroundColor = "#000", setTimeout(function() {
                        h(n.posterObj, "kraken_animate_poster")
                    }, 500), K(e, t), A(e, t)
                } else {
                    if ("404" == o)
                        if ("placeholders" === t && n.customConfig) {
                            var m = KRAKEN.config.customDetection[n.customConfig];
                            KRAKEN.config.debug && x("Should krakenAutoRegister?"), KRAKEN.config.debug && x(m), m.autoRegister === !0 && y(e, t)
                        } else "players" === t && (KRAKEN.config.debug && x("Should krakenAutoRegister?"), KRAKEN.config.debug && x(i), i.autoRegister === !0 && y(e, t));
                    E(e, t), n.config.flags.krakenStatus = "unregistered"
                }
            }, !0)
        } else E(e, t)
    }

    function A(e, t) {
		console.log("A(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t || (t = "players"), KRAKEN.config.debug && x("krakenIsReady: " + e);
        var n = null,
            i = KRAKEN[t][e];
        i && ("players" === t ? KRAKEN.config.autoDetection && KRAKEN.config.autoDetection[i.solution] && (n = KRAKEN.config.autoDetection[i.solution]) : KRAKEN.config.customDetection && KRAKEN.config.customDetection[i.customConfig] && (n = KRAKEN.config.customDetection[i.customConfig]), n && n.doKrakenReady && n.doKrakenReady(i)), b()
    }

    function E(e, t) {
		console.log("E(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t || (t = "players"), KRAKEN.config.debug && x("krakenNotAvailable: " + e);
        var n = null,
            i = KRAKEN[t][e];
        i && ("players" === t ? KRAKEN.config.autoDetection && KRAKEN.config.autoDetection[i.solution] && (n = KRAKEN.config.autoDetection[i.solution]) : KRAKEN.config.customDetection && KRAKEN.config.customDetection[i.customConfig] && (n = KRAKEN.config.customDetection[i.customConfig])), n && n.doKrakenUnavailable && n.doKrakenUnavailable(i, e), b()
    }

    function b() {
		console.log("b(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        KRAKEN.config.debug && x("krakenRemoveInitStyles");
        var e = document.getElementById("kraken_init_styles");
        e && (e.innerHTML = "")
    }

    function y(e, t) {
		console.log("y(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        for (var n = KRAKEN[t][e].config.key, i = KRAKEN[t][e].currentClip, r = !0, o = ["external_id", "video_url", "thumbnail_url", "title", "description"], a = {}, l = 0, s = o.length; s > l; l++) {
            var c = o[l];
            i[c] ? a[c] = i[c] : r = !1
        }
        if (a.key = n, r) {
            KRAKEN.config.debug && x("Auto-registering:"), KRAKEN.config.debug && x(a);
            var u = "&d=" + encodeURIComponent(JSON.stringify(a));
            a.status = "requested";
            var d = {};
            d["Content-type"] = "application/x-www-form-urlencoded", KRAKEN.funcs.postURL(KRAKEN.urls.publishVideo, function(e, t, n) {
                console.info(e, t, n), 200 == t ? KRAKEN.config.debug && x("Registration Request SUCCESS!") : KRAKEN.config.debug && x(t + ": Registration Request FAILED!")
            }, !1, d, u)
        } else KRAKEN.config.debug && x("Can't auto reg:"), KRAKEN.config.debug && x(a), KRAKEN[t][e].config.flags.krakenStatus = "deferred_register"
    }

    function v(e, t) {
		console.log("v(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        var n = document.createElement("style");
        n.setAttribute("type", "text/css"), n.setAttribute("id", e), document.getElementsByTagName("head")[0].appendChild(n), n.styleSheet ? n.styleSheet.cssText = t : n.innerHTML = t
    }

    function k() {
        KRAKEN.config.debug && x("krakenInitStyles");
        var e = document.getElementById("kraken_init_styles");
        if (!e) {
            var t = KRAKEN.styles && KRAKEN.styles.init ? KRAKEN.styles.init.join("") : "";
            v("kraken_init_styles", t)
        }
    }

    function N(e) {
		console.log("N(" + e + ")");
		console.log(e);
		
        KRAKEN.config.debug && x("krakenStyles: " + e);
        var t = "";
        t += ".kraken_" + e + "_poster{", t += KRAKEN.styles && KRAKEN.styles.poster ? KRAKEN.styles.poster.join("") : "", t += "}", t += ".kraken_" + e + "_poster.kraken_animate_poster{";
        for (var n = 0, i = KRAKEN.styles.prefixes.length; i > n; n++) t += KRAKEN.styles.prefixes[n] + "transition: background-image " + KRAKEN.config.animateTransitionTime + "s;";
        t += "}", v("kraken_" + e.toLowerCase(), t)
    }

    function h(e, t) {
		console.log("h(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        if (e) {
            var n = e.getAttribute("class");
            n && "" !== n ? (n = " " + n + " ", -1 == n.indexOf(" " + t + " ") && (n += t, " " == n.substring(0, 1) && (n = n.substring(1)), e.setAttribute("class", n))) : (n = t, e.setAttribute("class", n))
        }
    }

    function C(e, t, n, i) {
		console.log("C(" + e + ", " + t + ", " + n + ", " + i + ")");
		console.log(e);
		console.log(t);
		console.log(n);
		console.log(i);
		
        if (t)
            if (t.addEventListener) t.addEventListener(e, function(e) {
                n(e, i)
            }, !1);
            else if (t.attachEvent) t.attachEvent("on" + e, function(e) {
            n(e, i)
        });
        else {
            var r = t["on" + e];
            r && "function" == typeof r ? t["on" + e] = function(e) {
                r && r(e), n(e, i)
            } : t["on" + e] = function(e) {
                n(e, i)
            }
        }
    }

    function O(e, t) {
		console.log("O(" + e + ", " + t + ")");
		console.log(e);
		console.log(t);
		
        t.parentNode.insertBefore(e, t.nextSibling)
    }

    function _(t, n, i, r) {
		console.log("_(" + t + ", " + n + ", " + i + ", " + r + ")");
		console.log(t);
		console.log(n);
		console.log(i);
		console.log(r);
		
        var o;
        if (w(t) && e.XDomainRequest) {
            o = new e.XDomainRequest, o.ontimeout = o.onprogress = function() {}, o.timeout = 5e3;
            try {
                o.open("GET", t, !i);
                for (var a in r) o.setRequestHeader(a, r[a]);
                o.onload = function() {
                    n(t, o.status, o.responseText)
                }, o.send(null)
            } catch (l) {
                x("KRAKEN: Failed XDomainRequest: " + l + ": " + t)
            }
        } else {
            o = e.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
            try {
                o.overrideMimeType && o.overrideMimeType("text/plain"), o.open("GET", t, !i);
                for (var s in r) o.setRequestHeader(s, r[s]);
                o.onreadystatechange = function() {
                    4 === o.readyState && (200 == o.status || 204 == o.status ? n(t, o.status, o.responseText) : (n(t, o.status, o.responseText), x("KRAKEN: Failed XMLHttpRequest: " + o.status)))
                }, o.send(null)
            } catch (l) {
                x("KRAKEN: Failed XMLHttpRequest: " + l + ": " + t)
            }
        }
    }

    function j(t, n, i, r, o) {
		console.log("_(" + t + ", " + n + ", " + i + ", " + r + ", " + o + ")");
		console.log(t);
		console.log(n);
		console.log(i);
		console.log(r);
		console.log(o);
		
        var a;
        if (w(t) && e.XDomainRequest) {
            a = new e.XDomainRequest, a.ontimeout = a.onprogress = function() {}, a.timeout = 5e3;
            try {
                a.open("POST", t, !i);
                for (var l in r) a.setRequestHeader(l, r[l]);
                a.onload = function() {
                    n(t, a.status, a.responseText)
                }, a.send(null)
            } catch (s) {
                x("KRAKEN: Failed XDomainRequest: " + s + ": " + t)
            }
        } else {
            a = e.XMLHttpRequest ? new XMLHttpRequest : new ActiveXObject("Microsoft.XMLHTTP");
            try {
                a.open("POST", t, !i);
                for (var c in r) a.setRequestHeader(c, r[c]);
                a.onreadystatechange = function() {
                    4 === a.readyState && (n(t, a.status, a.responseText), 200 != a.status && 204 != a.status && x("KRAKEN: Failed XMLHttpRequest: " + a.status))
                }, a.send(o)
            } catch (s) {
                x("KRAKEN: Failed XMLHttpRequest: " + s + ": " + t)
            }
        }
    }

    function w(e) {
        return e && e.indexOf("://") >= 0 && e.split("/")[2] != self.location.href.split("/")[2]
    }

    function x(t) {
        e.console && console.info(t)
    }

    function I(e) {
		console.log("I(" + e + ")");
		console.log(e);
		
        function t(e, t) {
            return e << t | e >>> 32 - t
        }

        function n(e, t) {
            var n, i, r, o, a;
            return r = 2147483648 & e, o = 2147483648 & t, n = 1073741824 & e, i = 1073741824 & t, a = (1073741823 & e) + (1073741823 & t), n & i ? 2147483648 ^ a ^ r ^ o : n | i ? 1073741824 & a ? 3221225472 ^ a ^ r ^ o : 1073741824 ^ a ^ r ^ o : a ^ r ^ o
        }

        function i(e, t, n) {
            return e & t | ~e & n
        }

        function r(e, t, n) {
            return e & n | t & ~n
        }

        function o(e, t, n) {
            return e ^ t ^ n
        }

        function a(e, t, n) {
            return t ^ (e | ~n)
        }

        function l(e, r, o, a, l, s, c) {
            return e = n(e, n(n(i(r, o, a), l), c)), n(t(e, s), r)
        }

        function s(e, i, o, a, l, s, c) {
            return e = n(e, n(n(r(i, o, a), l), c)), n(t(e, s), i)
        }

        function c(e, i, r, a, l, s, c) {
            return e = n(e, n(n(o(i, r, a), l), c)), n(t(e, s), i)
        }

        function u(e, i, r, o, l, s, c) {
            return e = n(e, n(n(a(i, r, o), l), c)), n(t(e, s), i)
        }

        function d(e) {
            for (var t, n = e.length, i = n + 8, r = (i - i % 64) / 64, o = 16 * (r + 1), a = Array(o - 1), l = 0, s = 0; n > s;) t = (s - s % 4) / 4, l = s % 4 * 8, a[t] = a[t] | e.charCodeAt(s) << l, s++;
            return t = (s - s % 4) / 4, l = s % 4 * 8, a[t] = a[t] | 128 << l, a[o - 2] = n << 3, a[o - 1] = n >>> 29, a
        }

        function f(e) {
            var t, n, i = "",
                r = "";
            for (n = 0; 3 >= n; n++) t = e >>> 8 * n & 255, r = "0" + t.toString(16), i += r.substr(r.length - 2, 2);
            return i
        }

        function K(e) {
            e = e.replace(/\r\n/g, "\n");
            for (var t = "", n = 0; n < e.length; n++) {
                var i = e.charCodeAt(n);
                128 > i ? t += String.fromCharCode(i) : i > 127 && 2048 > i ? (t += String.fromCharCode(i >> 6 | 192), t += String.fromCharCode(63 & i | 128)) : (t += String.fromCharCode(i >> 12 | 224), t += String.fromCharCode(i >> 6 & 63 | 128), t += String.fromCharCode(63 & i | 128))
            }
            return t
        }
        var g, p, m, R, A, E, b, y, v, k = Array(),
            N = 7,
            h = 12,
            C = 17,
            O = 22,
            _ = 5,
            j = 9,
            w = 14,
            x = 20,
            I = 4,
            S = 11,
            T = 16,
            D = 23,
            M = 6,
            P = 10,
            q = 15,
            L = 21;
        for (e = K(e), k = d(e), E = 1732584193, b = 4023233417, y = 2562383102, v = 271733878, g = 0; g < k.length; g += 16) p = E, m = b, R = y, A = v, E = l(E, b, y, v, k[g + 0], N, 3614090360), v = l(v, E, b, y, k[g + 1], h, 3905402710), y = l(y, v, E, b, k[g + 2], C, 606105819), b = l(b, y, v, E, k[g + 3], O, 3250441966), E = l(E, b, y, v, k[g + 4], N, 4118548399), v = l(v, E, b, y, k[g + 5], h, 1200080426), y = l(y, v, E, b, k[g + 6], C, 2821735955), b = l(b, y, v, E, k[g + 7], O, 4249261313), E = l(E, b, y, v, k[g + 8], N, 1770035416), v = l(v, E, b, y, k[g + 9], h, 2336552879), y = l(y, v, E, b, k[g + 10], C, 4294925233), b = l(b, y, v, E, k[g + 11], O, 2304563134), E = l(E, b, y, v, k[g + 12], N, 1804603682), v = l(v, E, b, y, k[g + 13], h, 4254626195), y = l(y, v, E, b, k[g + 14], C, 2792965006), b = l(b, y, v, E, k[g + 15], O, 1236535329), E = s(E, b, y, v, k[g + 1], _, 4129170786), v = s(v, E, b, y, k[g + 6], j, 3225465664), y = s(y, v, E, b, k[g + 11], w, 643717713), b = s(b, y, v, E, k[g + 0], x, 3921069994), E = s(E, b, y, v, k[g + 5], _, 3593408605), v = s(v, E, b, y, k[g + 10], j, 38016083), y = s(y, v, E, b, k[g + 15], w, 3634488961), b = s(b, y, v, E, k[g + 4], x, 3889429448), E = s(E, b, y, v, k[g + 9], _, 568446438), v = s(v, E, b, y, k[g + 14], j, 3275163606), y = s(y, v, E, b, k[g + 3], w, 4107603335), b = s(b, y, v, E, k[g + 8], x, 1163531501), E = s(E, b, y, v, k[g + 13], _, 2850285829), v = s(v, E, b, y, k[g + 2], j, 4243563512), y = s(y, v, E, b, k[g + 7], w, 1735328473), b = s(b, y, v, E, k[g + 12], x, 2368359562), E = c(E, b, y, v, k[g + 5], I, 4294588738), v = c(v, E, b, y, k[g + 8], S, 2272392833), y = c(y, v, E, b, k[g + 11], T, 1839030562), b = c(b, y, v, E, k[g + 14], D, 4259657740), E = c(E, b, y, v, k[g + 1], I, 2763975236), v = c(v, E, b, y, k[g + 4], S, 1272893353), y = c(y, v, E, b, k[g + 7], T, 4139469664), b = c(b, y, v, E, k[g + 10], D, 3200236656), E = c(E, b, y, v, k[g + 13], I, 681279174), v = c(v, E, b, y, k[g + 0], S, 3936430074), y = c(y, v, E, b, k[g + 3], T, 3572445317), b = c(b, y, v, E, k[g + 6], D, 76029189), E = c(E, b, y, v, k[g + 9], I, 3654602809), v = c(v, E, b, y, k[g + 12], S, 3873151461), y = c(y, v, E, b, k[g + 15], T, 530742520), b = c(b, y, v, E, k[g + 2], D, 3299628645), E = u(E, b, y, v, k[g + 0], M, 4096336452), v = u(v, E, b, y, k[g + 7], P, 1126891415), y = u(y, v, E, b, k[g + 14], q, 2878612391), b = u(b, y, v, E, k[g + 5], L, 4237533241), E = u(E, b, y, v, k[g + 12], M, 1700485571), v = u(v, E, b, y, k[g + 3], P, 2399980690), y = u(y, v, E, b, k[g + 10], q, 4293915773), b = u(b, y, v, E, k[g + 1], L, 2240044497), E = u(E, b, y, v, k[g + 8], M, 1873313359), v = u(v, E, b, y, k[g + 15], P, 4264355552), y = u(y, v, E, b, k[g + 6], q, 2734768916), b = u(b, y, v, E, k[g + 13], L, 1309151649), E = u(E, b, y, v, k[g + 4], M, 4149444226), v = u(v, E, b, y, k[g + 11], P, 3174756917), y = u(y, v, E, b, k[g + 2], q, 718787259), b = u(b, y, v, E, k[g + 9], L, 3951481745), E = n(E, p), b = n(b, m), y = n(y, R), v = n(v, A);
        var z = f(E) + f(b) + f(y) + f(v);
		console.log("z.toLowerCase() = " + z.toLowerCase());
        return z.toLowerCase()
    }
    if (KRAKEN.info || (KRAKEN.info = {
            version: "20160815"
        }), KRAKEN.urls || (KRAKEN.urls = {
            referrer: parent !== e ? document.referrer : document.location.href,
            base: "//dst.infinigraph.com/kraken/js/",
            visualGet: "https://dst.infinigraph.com/kraken/v1/visual",
            visualClick: "https://dst.infinigraph.com/kraken/v1/visual/click",
            publishVideo: "//api.infinigraph.com/v1/register/"
        }), KRAKEN.styles || (KRAKEN.styles = {
            init: [".jw-video,.jw-media,.jw-preview,", "video.vjs-tech,.vjs-poster,", ".oo-state-screen-poster", "{", "visibility : hidden !important;", "}"],
            poster: ["background-size:100% 100%!important;", "background-repeat:no-repeat;", "background-position:center;"],
            prefixes: ["-ms-", "-o-", "-moz-", "-webkit-", ""]
        }), KRAKEN.players || (KRAKEN.players = {}), KRAKEN.placeholders || (KRAKEN.placeholders = {}), KRAKEN.config || (KRAKEN.config = {
            debug: !1,
            autoDetection: {
                jw7: {
                    selector: ".jwplayer.jw-reset",
                    getPlayerObj: function(e, t) {
                        return jwplayer(t)
                    },
                    buildPoster: function(e, t, n) {
                        s(t)
                    },
                    attachPlayerEvents: function(e, t, n) {
                        setTimeout(function(e) {
                            n.onPlay(function() {
                                p(e)
                            })
                        }(t), 0)
                    },
                    getCurrentClip: function(e, t) {
                        var n = e.playerObj;
                        return n.getPlaylistItem()
                    },
                    getPosterObj: function(e, t) {
                        var n = null,
                            i = e.playerDOM;
                        return "overlay" === e.config.thumbnailMethod ? n = u(t, "players", i) : (n = i.querySelector(".jw-preview"), h(n, "kraken_" + t + "_poster")), n
                    },
                    doOverlayClick: function(e) {
                        e.playerObj.play(!0)
                    }
                },
                jw6: {
                    selector: ".jwplayer",
                    getPlayerObj: function(e, t) {
                        return jwplayer(t)
                    },
                    buildPoster: function(e, t, n) {
                        setTimeout(function(e) {
                            KRAKEN.players[e].config.runtime = n.getRenderingMode(), "flash" === KRAKEN.players[e].config.runtime ? n.onReady(function() {
                                s(e)
                            }) : setTimeout(function() {
                                s(e)
                            }, 500)
                        }(t), 0)
                    },
                    attachPlayerEvents: function(e, t, n) {
                        setTimeout(function(e) {
                            n.onPlay(function() {
                                p(e)
                            })
                        }(t), 0)
                    },
                    getCurrentClip: function(e, t) {
                        var n = e.playerObj;
                        return n.getPlaylistItem()
                    },
                    getPosterObj: function(e, t) {
                        var n = null,
                            i = e.playerDOM;
                        return "overlay" === e.config.thumbnailMethod || "flash" === e.config.runtime ? n = u(t, "players", i) : (n = i.querySelector(".jwpreview"), h(n, "kraken_" + t + "_poster")), n
                    },
                    doOverlayClick: function(e) {
                        e.playerObj.play(!0)
                    }
                }
            },
            customDetection: {
                jw7iframe: {
                    selector: "iframe[src*='jwplatform.com/players']",
                    validateSelector: "",
                    autoRegister: !0,
                    getMediaId: function(e, t) {
                        var n = t.src,
                            i = n.substring(0, n.lastIndexOf(".")) + ".js";
                        KRAKEN.funcs.getURL(i, function(n, i, r) {
                            if (200 === i) {
                                var o = ".setup({",
                                    a = r.lastIndexOf(o),
                                    l = "});",
                                    s = r.indexOf(l, a),
                                    c = r.substring(a + (o.length - 1), s + 1),
                                    u = JSON.parse(c),
                                    d = u.playlist;
                                if ("string" != typeof d) {
                                    var f = d[0],
                                        K = KRAKEN.funcs.getClip(f);
                                    K.mediaid && KRAKEN.funcs.customBuild(e, t, K)
                                }
                            } else console.info("Error: " + i)
                        })
                    },
                    getPlayerObj: function(e, t) {
                        return e
                    },
                    getPosterObj: function(e, t) {
                        var n = e.parentNode,
                            i = !1;
                        return u(t, "placeholders", n, i, e.offsetWidth + "px", e.offsetHeight + "px")
                    },
                    doOverlayClick: function(e, t) {
                        var n = KRAKEN.placeholders[t];
                        n.posterObj.style.display = "none", e.contentWindow.postMessage("play", "*")
                    }
                }
            },
            thumbnailMethod: "integrated",
            multipleImages: "animate",
            animateDelayTime: 4,
            animateTransitionTime: 2,
            autoRegister: !1,
            playIconOverride: null,
            playIconStyle: "width:90px;height:90px;top:50%;left:50%;margin-left:-45px;margin-top:-45px;opacity:0.7;",
            overlayZIndex: "999999"
        }), KRAKEN.funcs || (KRAKEN.funcs = {
            setConfig: function(e, t) {
                var n = KRAKEN.config;
                t && (KRAKEN.players[t] || (KRAKEN.players[t] = {}), KRAKEN.players[t].config || (KRAKEN.players[t].config = {}), n = KRAKEN.players[t].config);
                for (var i in e) "function" != typeof e[i] && (n[i] = "true" === e[i] ? !0 : "false" === e[i] ? !1 : e[i])
            },
            bcheck: function(e) {
                var t = navigator.userAgent.toLowerCase();
                return null !== t.match(e)
            },
            isIOS: function(e) {
                return e ? KRAKEN.funcs.bcheck(RegExp("iP(hone|ad|od).+\\sOS\\s" + e, "i")) : KRAKEN.funcs.bcheck(/iP(hone|ad|od)/i)
            },
            isIPad: function(e) {
                return e ? KRAKEN.funcs.bcheck(RegExp("iP(ad).+\\sOS\\s" + e, "i")) : KRAKEN.funcs.bcheck(/iP(ad)/i)
            },
            isSafari: function() {
                return KRAKEN.funcs.bcheck(/safari/i) && !KRAKEN.funcs.bcheck(/chrome/i) && !KRAKEN.funcs.bcheck(/chromium/i) && !KRAKEN.funcs.bcheck(/android/i)
            },
            isMobile: function() {
                var t = !1;
                return function(e) {
                    (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(e) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e.substr(0, 4))) && (t = !0)
                }(navigator.userAgent || navigator.vendor || e.opera), t
            },
            isAndroid: function(e, t) {
                return t && KRAKEN.funcs.bcheck(/chrome\/[123456789]/i) && !KRAKEN.funcs.bcheck(/chrome\/18/) ? !1 : e ? (KRAKEN.funcs.isInt(e) && !/\./.test(e) && (e = "" + e + "."), KRAKEN.funcs.bcheck(RegExp("Android\\s*" + e, "i"))) : KRAKEN.funcs.bcheck(/Android/i)
            },
            krakenize: i,
            MD5: I,
            insertAfter: O,
            checkCustom: a,
            customBuild: l,
            register: y,
            getURL: _,
            postURL: j,
            visualClick: p,
            getClip: c,
            createOverlay: u,
            hideOverlay: f
        }), KRAKEN.setConfig = KRAKEN.funcs.setConfig, document.body) n();
    else {
        var S = "callee";
        document.page_ready_flag = !1, document.addEventListener ? document.addEventListener("DOMContentLoaded", function() {
            document.removeEventListener("DOMContentLoaded", arguments[S], !1), n()
        }, !1) : document.attachEvent && (document.attachEvent("onreadystatechange", function() {
            "complete" === document.readyState && (document.detachEvent("onreadystatechange", arguments[S]), n())
        }), document.documentElement.doScroll && e == e.top && function() {
            if (!document.page_ready_flag) {
                try {
                    document.documentElement.doScroll("left")
                } catch (e) {
                    return void setTimeout(arguments[S], 0)
                }
                n()
            }
        }())
    }
}(window);