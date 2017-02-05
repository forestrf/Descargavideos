console.log("Script replaced"); // REPLACED

/**
 * @license
 * Video.js 5.12.6 <http://videojs.com/>
 * Copyright Brightcove, Inc. <https://www.brightcove.com/>
 * Available under Apache License Version 2.0
 * <https://github.com/videojs/video.js/blob/master/LICENSE>
 *
 * Includes vtt.js <https://github.com/mozilla/vtt.js>
 * Available under Apache License Version 2.0
 * <https://github.com/mozilla/vtt.js/blob/master/LICENSE>
 */
/**
 * Copyright 2013 vtt.js Contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/*! Swig v1.4.2 | https://paularmstrong.github.com/swig | @license https://github.com/paularmstrong/swig/blob/master/LICENSE */
/*! DateZ (c) 2011 Tomo Universalis | @license https://github.com/TomoUniversalis/DateZ/blob/master/LISENCE */
/*
DateZ is licensed under the MIT License:
Copyright (c) 2011 Tomo Universalis (http://tomouniversalis.com)
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
/*!
 * Makes a string safe for a regular expression.
 * @param  {string} str
 * @return {string}
 * @private
 */
/*!
 * Loop over the source, split via the tag/var/comment regular expression splitter.
 * Send each chunk to the appropriate parser.
 */
/*!
 * Export methods publicly
 */
// Copyright Joyent, Inc. and other Node contributors.
//
// Permission is hereby granted, free of charge, to any person obtaining a
// copy of this software and associated documentation files (the
// "Software"), to deal in the Software without restriction, including
// without limitation the rights to use, copy, modify, merge, publish,
// distribute, sublicense, and/or sell copies of the Software, and to permit
// persons to whom the Software is furnished to do so, subject to the
// following conditions:
//
// The above copyright notice and this permission notice shall be included
// in all copies or substantial portions of the Software.
//
// THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
// OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
// MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
// NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
// DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
// OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE
// USE OR OTHER DEALINGS IN THE SOFTWARE.
/*!
 * Detectizr v2.0.0
 * http://barisaydinoglu.github.com/Detectizr/
 *
 * Written by Baris Aydinoglu (http://baris.aydinoglu.info) - Copyright 2012
 * Released under the MIT license
 *
 * Date: 2014-03-21
 */
// Console-polyfill. MIT license.
/**
 * @license RequireJS text 2.0.12 Copyright (c) 2010-2014, The Dojo Foundation All Rights Reserved.
 * Available via the MIT or new BSD license.
 * see: http://github.com/requirejs/text for details
 */
! function() {
    ! function(e) {
        if ("object" == typeof exports && "undefined" != typeof module) module.exports = e();
        else if ("function" == typeof define && define.amd) define("vendor/videojs/video", [], e);
        else {
            var t;
            t = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this, t.videojs = e()
        }
    }(function() {
        var e;
        return function t(e, n, r) {
            function o(s, a) {
                if (!n[s]) {
                    if (!e[s]) {
                        var l = "function" == typeof require && require;
                        if (!a && l) return l(s, !0);
                        if (i) return i(s, !0);
                        var u = new Error("Cannot find module '" + s + "'");
                        throw u.code = "MODULE_NOT_FOUND", u
                    }
                    var c = n[s] = {
                        exports: {}
                    };
                    e[s][0].call(c.exports, function(t) {
                        var n = e[s][1][t];
                        return o(n ? n : t)
                    }, c, c.exports, t, e, n, r)
                }
                return n[s].exports
            }
            for (var i = "function" == typeof require && require, s = 0; s < r.length; s++) o(r[s]);
            return o
        }({
            1: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(2),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            return o(this, t), i(this, e.call(this, n, r))
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-big-play-button"
                        }, t.prototype.handleClick = function() {
                            this.player_.play()
                        }, t
                    }(l["default"]);
                p.prototype.controlText_ = "Play Video", c["default"].registerComponent("BigPlayButton", p), n["default"] = p
            }, {
                2: 2,
                5: 5
            }],
            2: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(3),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = e(85),
                    d = r(p),
                    f = e(136),
                    h = r(f),
                    y = function(e) {
                        function t(n, r) {
                            return o(this, t), i(this, e.call(this, n, r))
                        }
                        return s(t, e), t.prototype.createEl = function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "button",
                                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                            t = (0, h["default"])({
                                className: this.buildCSSClass()
                            }, t), "button" !== e && (d["default"].warn("Creating a Button with an HTML element of " + e + " is deprecated; use ClickableComponent instead."), t = (0, h["default"])({
                                tabIndex: 0
                            }, t), n = (0, h["default"])({
                                role: "button"
                            }, n)), n = (0, h["default"])({
                                type: "button",
                                "aria-live": "polite"
                            }, n);
                            var r = c["default"].prototype.createEl.call(this, e, t, n);
                            return this.createControlTextEl(r), r
                        }, t.prototype.addChild = function(e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                n = this.constructor.name;
                            return d["default"].warn("Adding an actionable (user controllable) child to a Button (" + n + ") is not supported; use a ClickableComponent instead."), c["default"].prototype.addChild.call(this, e, t)
                        }, t.prototype.handleKeyPress = function(t) {
                            32 !== t.which && 13 !== t.which && e.prototype.handleKeyPress.call(this, t)
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("Button", y), n["default"] = y
            }, {
                136: 136,
                3: 3,
                5: 5,
                85: 85
            }],
            3: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(81),
                    f = r(d),
                    h = e(82),
                    y = r(h),
                    v = e(85),
                    m = o(v),
                    g = e(92),
                    b = o(g),
                    _ = e(136),
                    w = o(_),
                    C = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.emitTapEvents(), o.on("tap", o.handleClick), o.on("click", o.handleClick), o.on("focus", o.handleFocus), o.on("blur", o.handleBlur), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "div",
                                n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                            n = (0, w["default"])({
                                className: this.buildCSSClass(),
                                tabIndex: 0
                            }, n), "button" === t && m["default"].error("Creating a ClickableComponent with an HTML element of " + t + " is not supported; use a Button instead."), r = (0, w["default"])({
                                role: "button",
                                "aria-live": "polite"
                            }, r);
                            var o = e.prototype.createEl.call(this, t, n, r);
                            return this.createControlTextEl(o), o
                        }, t.prototype.createControlTextEl = function(e) {
                            return this.controlTextEl_ = p.createEl("span", {
                                className: "vjs-control-text"
                            }), e && e.appendChild(this.controlTextEl_), this.controlText(this.controlText_, e), this.controlTextEl_
                        }, t.prototype.controlText = function(e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : this.el();
                            if (!e) return this.controlText_ || "Need Text";
                            var n = this.localize(e);
                            return this.controlText_ = e, this.controlTextEl_.innerHTML = n, t.setAttribute("title", n), this
                        }, t.prototype.buildCSSClass = function() {
                            return "vjs-control vjs-button " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.addChild = function(t) {
                            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            return e.prototype.addChild.call(this, t, n)
                        }, t.prototype.enable = function() {
                            return this.removeClass("vjs-disabled"), this.el_.setAttribute("aria-disabled", "false"), this
                        }, t.prototype.disable = function() {
                            return this.addClass("vjs-disabled"), this.el_.setAttribute("aria-disabled", "true"), this
                        }, t.prototype.handleClick = function() {}, t.prototype.handleFocus = function() {
                            f.on(b["default"], "keydown", y.bind(this, this.handleKeyPress))
                        }, t.prototype.handleKeyPress = function(t) {
                            32 === t.which || 13 === t.which ? (t.preventDefault(), this.handleClick(t)) : e.prototype.handleKeyPress && e.prototype.handleKeyPress.call(this, t)
                        }, t.prototype.handleBlur = function() {
                            f.off(b["default"], "keydown", y.bind(this, this.handleKeyPress))
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("ClickableComponent", C), n["default"] = C
            }, {
                136: 136,
                5: 5,
                80: 80,
                81: 81,
                82: 82,
                85: 85,
                92: 92
            }],
            4: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(2),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.controlText(r && r.controlText || s.localize("Close")), s
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-close-button " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleClick = function() {
                            this.trigger({
                                type: "close",
                                bubbles: !1
                            })
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("CloseButton", p), n["default"] = p
            }, {
                2: 2,
                5: 5
            }],
            5: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }
                n.__esModule = !0;
                var s = e(93),
                    a = o(s),
                    l = e(80),
                    u = r(l),
                    c = e(82),
                    p = r(c),
                    d = e(84),
                    f = r(d),
                    h = e(81),
                    y = r(h),
                    v = e(85),
                    m = o(v),
                    g = e(89),
                    b = o(g),
                    _ = e(86),
                    w = o(_),
                    C = function() {
                        function e(t, n, r) {
                            if (i(this, e), !t && this.play ? this.player_ = t = this : this.player_ = t, this.options_ = (0, w["default"])({}, this.options_), n = this.options_ = (0, w["default"])(this.options_, n), this.id_ = n.id || n.el && n.el.id, !this.id_) {
                                var o = t && t.id && t.id() || "no_player";
                                this.id_ = o + "_component_" + f.newGUID()
                            }
                            this.name_ = n.name || null, n.el ? this.el_ = n.el : n.createEl !== !1 && (this.el_ = this.createEl()), this.children_ = [], this.childIndex_ = {}, this.childNameIndex_ = {}, n.initChildren !== !1 && this.initChildren(), this.ready(r), n.reportTouchActivity !== !1 && this.enableTouchActivity()
                        }
                        return e.prototype.dispose = function() {
                            if (this.trigger({
                                    type: "dispose",
                                    bubbles: !1
                                }), this.children_)
                                for (var e = this.children_.length - 1; e >= 0; e--) this.children_[e].dispose && this.children_[e].dispose();
                            this.children_ = null, this.childIndex_ = null, this.childNameIndex_ = null, this.off(), this.el_.parentNode && this.el_.parentNode.removeChild(this.el_), u.removeElData(this.el_), this.el_ = null
                        }, e.prototype.player = function() {
                            return this.player_
                        }, e.prototype.options = function(e) {
                            return m["default"].warn("this.options() has been deprecated and will be moved to the constructor in 6.0"), e ? (this.options_ = (0, w["default"])(this.options_, e), this.options_) : this.options_
                        }, e.prototype.el = function() {
                            return this.el_
                        }, e.prototype.createEl = function(e, t, n) {
                            return u.createEl(e, t, n)
                        }, e.prototype.localize = function(e) {
                            var t = this.player_.language && this.player_.language(),
                                n = this.player_.languages && this.player_.languages();
                            if (!t || !n) return e;
                            var r = n[t];
                            if (r && r[e]) return r[e];
                            var o = t.split("-")[0],
                                i = n[o];
                            return i && i[e] ? i[e] : e
                        }, e.prototype.contentEl = function() {
                            return this.contentEl_ || this.el_
                        }, e.prototype.id = function() {
                            return this.id_
                        }, e.prototype.name = function() {
                            return this.name_
                        }, e.prototype.children = function() {
                            return this.children_
                        }, e.prototype.getChildById = function(e) {
                            return this.childIndex_[e]
                        }, e.prototype.getChild = function(e) {
                            return this.childNameIndex_[e]
                        }, e.prototype.addChild = function(t) {
                            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : this.children_.length,
                                o = void 0,
                                i = void 0;
                            if ("string" == typeof t) {
                                i = t, n || (n = {}), n === !0 && (m["default"].warn("Initializing a child component with `true` is deprecated. Children should be defined in an array when possible, but if necessary use an object instead of `true`."), n = {});
                                var s = n.componentClass || (0, b["default"])(i);
                                n.name = i;
                                var a = e.getComponent(s);
                                if (!a) throw new Error("Component " + s + " does not exist");
                                if ("function" != typeof a) return null;
                                o = new a(this.player_ || this, n)
                            } else o = t;
                            if (this.children_.splice(r, 0, o), "function" == typeof o.id && (this.childIndex_[o.id()] = o), i = i || o.name && o.name(), i && (this.childNameIndex_[i] = o), "function" == typeof o.el && o.el()) {
                                var l = this.contentEl().children,
                                    u = l[r] || null;
                                this.contentEl().insertBefore(o.el(), u)
                            }
                            return o
                        }, e.prototype.removeChild = function(e) {
                            if ("string" == typeof e && (e = this.getChild(e)), e && this.children_) {
                                for (var t = !1, n = this.children_.length - 1; n >= 0; n--)
                                    if (this.children_[n] === e) {
                                        t = !0, this.children_.splice(n, 1);
                                        break
                                    }
                                if (t) {
                                    this.childIndex_[e.id()] = null, this.childNameIndex_[e.name()] = null;
                                    var r = e.el();
                                    r && r.parentNode === this.contentEl() && this.contentEl().removeChild(e.el())
                                }
                            }
                        }, e.prototype.initChildren = function() {
                            var t = this,
                                n = this.options_.children;
                            n && ! function() {
                                var r = t.options_,
                                    o = function(e) {
                                        var n = e.name,
                                            o = e.opts;
                                        if (void 0 !== r[n] && (o = r[n]), o !== !1) {
                                            o === !0 && (o = {}), o.playerOptions = t.options_.playerOptions;
                                            var i = t.addChild(n, o);
                                            i && (t[n] = i)
                                        }
                                    },
                                    i = void 0,
                                    s = e.getComponent("Tech");
                                i = Array.isArray(n) ? n : Object.keys(n), i.concat(Object.keys(t.options_).filter(function(e) {
                                    return !i.some(function(t) {
                                        return "string" == typeof t ? e === t : e === t.name
                                    })
                                })).map(function(e) {
                                    var r = void 0,
                                        o = void 0;
                                    return "string" == typeof e ? (r = e, o = n[r] || t.options_[r] || {}) : (r = e.name, o = e), {
                                        name: r,
                                        opts: o
                                    }
                                }).filter(function(t) {
                                    var n = e.getComponent(t.opts.componentClass || (0, b["default"])(t.name));
                                    return n && !s.isTech(n)
                                }).forEach(o)
                            }()
                        }, e.prototype.buildCSSClass = function() {
                            return ""
                        }, e.prototype.on = function(e, t, n) {
                            var r = this;
                            return "string" == typeof e || Array.isArray(e) ? y.on(this.el_, e, p.bind(this, t)) : ! function() {
                                var o = e,
                                    i = t,
                                    s = p.bind(r, n),
                                    a = function() {
                                        return r.off(o, i, s)
                                    };
                                a.guid = s.guid, r.on("dispose", a);
                                var l = function() {
                                    return r.off("dispose", a)
                                };
                                l.guid = s.guid, e.nodeName ? (y.on(o, i, s), y.on(o, "dispose", l)) : "function" == typeof e.on && (o.on(i, s), o.on("dispose", l))
                            }(), this
                        }, e.prototype.off = function(e, t, n) {
                            if (!e || "string" == typeof e || Array.isArray(e)) y.off(this.el_, e, t);
                            else {
                                var r = e,
                                    o = t,
                                    i = p.bind(this, n);
                                this.off("dispose", i), e.nodeName ? (y.off(r, o, i), y.off(r, "dispose", i)) : (r.off(o, i), r.off("dispose", i))
                            }
                            return this
                        }, e.prototype.one = function(e, t, n) {
                            var r = this,
                                o = arguments;
                            return "string" == typeof e || Array.isArray(e) ? y.one(this.el_, e, p.bind(this, t)) : ! function() {
                                var i = e,
                                    s = t,
                                    a = p.bind(r, n),
                                    l = function u() {
                                        r.off(i, s, u), a.apply(null, o)
                                    };
                                l.guid = a.guid, r.on(i, s, l)
                            }(), this
                        }, e.prototype.trigger = function(e, t) {
                            return y.trigger(this.el_, e, t), this
                        }, e.prototype.ready = function(e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : !1;
                            return e && (this.isReady_ ? t ? e.call(this) : this.setTimeout(e, 1) : (this.readyQueue_ = this.readyQueue_ || [], this.readyQueue_.push(e))), this
                        }, e.prototype.triggerReady = function() {
                            this.isReady_ = !0, this.setTimeout(function() {
                                var e = this.readyQueue_;
                                this.readyQueue_ = [], e && e.length > 0 && e.forEach(function(e) {
                                    e.call(this)
                                }, this), this.trigger("ready")
                            }, 1)
                        }, e.prototype.$ = function(e, t) {
                            return u.$(e, t || this.contentEl())
                        }, e.prototype.$$ = function(e, t) {
                            return u.$$(e, t || this.contentEl())
                        }, e.prototype.hasClass = function(e) {
                            return u.hasElClass(this.el_, e)
                        }, e.prototype.addClass = function(e) {
                            return u.addElClass(this.el_, e), this
                        }, e.prototype.removeClass = function(e) {
                            return u.removeElClass(this.el_, e), this
                        }, e.prototype.toggleClass = function(e, t) {
                            return u.toggleElClass(this.el_, e, t), this
                        }, e.prototype.show = function() {
                            return this.removeClass("vjs-hidden"), this
                        }, e.prototype.hide = function() {
                            return this.addClass("vjs-hidden"), this
                        }, e.prototype.lockShowing = function() {
                            return this.addClass("vjs-lock-showing"), this
                        }, e.prototype.unlockShowing = function() {
                            return this.removeClass("vjs-lock-showing"), this
                        }, e.prototype.width = function(e, t) {
                            return this.dimension("width", e, t)
                        }, e.prototype.height = function(e, t) {
                            return this.dimension("height", e, t)
                        }, e.prototype.dimensions = function(e, t) {
                            return this.width(e, !0).height(t)
                        }, e.prototype.dimension = function(e, t, n) {
                            if (void 0 !== t) return (null === t || t !== t) && (t = 0), -1 !== ("" + t).indexOf("%") || -1 !== ("" + t).indexOf("px") ? this.el_.style[e] = t : "auto" === t ? this.el_.style[e] = "" : this.el_.style[e] = t + "px", n || this.trigger("resize"), this;
                            if (!this.el_) return 0;
                            var r = this.el_.style[e],
                                o = r.indexOf("px");
                            return -1 !== o ? parseInt(r.slice(0, o), 10) : parseInt(this.el_["offset" + (0, b["default"])(e)], 10)
                        }, e.prototype.currentDimension = function(e) {
                            var t = 0;
                            if ("width" !== e && "height" !== e) throw new Error("currentDimension only accepts width or height value");
                            if ("function" == typeof a["default"].getComputedStyle) {
                                var n = a["default"].getComputedStyle(this.el_);
                                t = n.getPropertyValue(e) || n[e]
                            } else if (this.el_.currentStyle) {
                                var r = "offset" + (0, b["default"])(e);
                                t = this.el_[r]
                            }
                            return t = parseFloat(t)
                        }, e.prototype.currentDimensions = function() {
                            return {
                                width: this.currentDimension("width"),
                                height: this.currentDimension("height")
                            }
                        }, e.prototype.currentWidth = function() {
                            return this.currentDimension("width")
                        }, e.prototype.currentHeight = function() {
                            return this.currentDimension("height")
                        }, e.prototype.emitTapEvents = function() {
                            var e = 0,
                                t = null,
                                n = 10,
                                r = 200,
                                o = void 0;
                            this.on("touchstart", function(n) {
                                1 === n.touches.length && (t = {
                                    pageX: n.touches[0].pageX,
                                    pageY: n.touches[0].pageY
                                }, e = (new Date).getTime(), o = !0)
                            }), this.on("touchmove", function(e) {
                                if (e.touches.length > 1) o = !1;
                                else if (t) {
                                    var r = e.touches[0].pageX - t.pageX,
                                        i = e.touches[0].pageY - t.pageY,
                                        s = Math.sqrt(r * r + i * i);
                                    s > n && (o = !1)
                                }
                            });
                            var i = function() {
                                o = !1
                            };
                            this.on("touchleave", i), this.on("touchcancel", i), this.on("touchend", function(n) {
                                if (t = null, o === !0) {
                                    var i = (new Date).getTime() - e;
                                    r > i && (n.preventDefault(), this.trigger("tap"))
                                }
                            })
                        }, e.prototype.enableTouchActivity = function() {
                            if (this.player() && this.player().reportUserActivity) {
                                var e = p.bind(this.player(), this.player().reportUserActivity),
                                    t = void 0;
                                this.on("touchstart", function() {
                                    e(), this.clearInterval(t), t = this.setInterval(e, 250)
                                });
                                var n = function(n) {
                                    e(), this.clearInterval(t)
                                };
                                this.on("touchmove", e), this.on("touchend", n), this.on("touchcancel", n)
                            }
                        }, e.prototype.setTimeout = function(e, t) {
                            e = p.bind(this, e);
                            var n = a["default"].setTimeout(e, t),
                                r = function() {
                                    this.clearTimeout(n)
                                };
                            return r.guid = "vjs-timeout-" + n, this.on("dispose", r), n
                        }, e.prototype.clearTimeout = function(e) {
                            a["default"].clearTimeout(e);
                            var t = function() {};
                            return t.guid = "vjs-timeout-" + e, this.off("dispose", t), e
                        }, e.prototype.setInterval = function(e, t) {
                            e = p.bind(this, e);
                            var n = a["default"].setInterval(e, t),
                                r = function() {
                                    this.clearInterval(n)
                                };
                            return r.guid = "vjs-interval-" + n, this.on("dispose", r), n
                        }, e.prototype.clearInterval = function(e) {
                            a["default"].clearInterval(e);
                            var t = function() {};
                            return t.guid = "vjs-interval-" + e, this.off("dispose", t), e
                        }, e.registerComponent = function(t, n) {
                            return e.components_ || (e.components_ = {}), e.components_[t] = n, n
                        }, e.getComponent = function(t) {
                            return e.components_ && e.components_[t] ? e.components_[t] : a["default"] && a["default"].videojs && a["default"].videojs[t] ? (m["default"].warn("The " + t + " component was added to the videojs object when it should be registered using videojs.registerComponent(name, component)"), a["default"].videojs[t]) : void 0
                        }, e.extend = function(t) {
                            t = t || {}, m["default"].warn("Component.extend({}) has been deprecated, use videojs.extend(Component, {}) instead");
                            var n = t.init || t.init || this.prototype.init || this.prototype.init || function() {},
                                r = function() {
                                    n.apply(this, arguments)
                                };
                            r.prototype = Object.create(this.prototype), r.prototype.constructor = r, r.extend = e.extend;
                            for (var o in t) t.hasOwnProperty(o) && (r.prototype[o] = t[o]);
                            return r
                        }, e
                    }();
                C.registerComponent("Component", C), n["default"] = C
            }, {
                80: 80,
                81: 81,
                82: 82,
                84: 84,
                85: 85,
                86: 86,
                89: 89,
                93: 93
            }],
            6: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(36),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = e(7),
                    d = r(p),
                    f = function(e) {
                        function t(n) {
                            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            o(this, t), r.tracks = n.audioTracks && n.audioTracks();
                            var s = i(this, e.call(this, n, r));
                            return s.el_.setAttribute("aria-label", "Audio Menu"), s
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-audio-button " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.createItems = function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                                t = this.player_.audioTracks && this.player_.audioTracks();
                            if (!t) return e;
                            for (var n = 0; n < t.length; n++) {
                                var r = t[n];
                                e.push(new d["default"](this.player_, {
                                    track: r,
                                    selectable: !0
                                }))
                            }
                            return e
                        }, t
                    }(l["default"]);
                f.prototype.controlText_ = "Audio Track", c["default"].registerComponent("AudioTrackButton", f), n["default"] = f
            }, {
                36: 36,
                5: 5,
                7: 7
            }],
            7: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(48),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = r.track,
                                a = n.audioTracks();
                            r.label = o.label || o.language || "Unknown", r.selected = o.enabled;
                            var l = s(this, e.call(this, n, r));
                            return l.track = o, a && ! function() {
                                var e = f.bind(l, l.handleTracksChange);
                                a.addEventListener("change", e), l.on("dispose", function() {
                                    a.removeEventListener("change", e)
                                })
                            }(), l
                        }
                        return a(t, e), t.prototype.handleClick = function(t) {
                            var n = this.player_.audioTracks();
                            if (e.prototype.handleClick.call(this, t), n)
                                for (var r = 0; r < n.length; r++) {
                                    var o = n[r];
                                    o.enabled = o === this.track
                                }
                        }, t.prototype.handleTracksChange = function(e) {
                            this.selected(this.track.enabled)
                        }, t
                    }(u["default"]);
                p["default"].registerComponent("AudioTrackMenuItem", h), n["default"] = h
            }, {
                48: 48,
                5: 5,
                82: 82
            }],
            8: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a);
                e(12), e(32), e(33), e(35), e(34), e(10), e(18), e(9), e(38), e(40), e(11), e(25), e(27), e(29), e(24), e(6), e(13), e(21);
                var u = function(e) {
                    function t() {
                        return o(this, t), i(this, e.apply(this, arguments))
                    }
                    return s(t, e), t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-control-bar",
                            dir: "ltr"
                        }, {
                            role: "group"
                        })
                    }, t
                }(l["default"]);
                u.prototype.options_ = {
                    children: ["playToggle", "volumeMenuButton", "currentTimeDisplay", "timeDivider", "durationDisplay", "progressControl", "liveDisplay", "remainingTimeDisplay", "customControlSpacer", "playbackRateMenuButton", "chaptersButton", "descriptionsButton", "subtitlesButton", "captionsButton", "audioTrackButton", "fullscreenToggle"]
                }, l["default"].registerComponent("ControlBar", u), n["default"] = u
            }, {
                10: 10,
                11: 11,
                12: 12,
                13: 13,
                18: 18,
                21: 21,
                24: 24,
                25: 25,
                27: 27,
                29: 29,
                32: 32,
                33: 33,
                34: 34,
                35: 35,
                38: 38,
                40: 40,
                5: 5,
                6: 6,
                9: 9
            }],
            9: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(2),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.on(n, "fullscreenchange", s.handleFullscreenChange), s
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-fullscreen-control " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleFullscreenChange = function() {
                            this.player_.isFullscreen() ? this.controlText("Non-Fullscreen") : this.controlText("Fullscreen")
                        }, t.prototype.handleClick = function() {
                            this.player_.isFullscreen() ? this.player_.exitFullscreen() : this.player_.requestFullscreen()
                        }, t
                    }(l["default"]);
                p.prototype.controlText_ = "Fullscreen", c["default"].registerComponent("FullscreenToggle", p), n["default"] = p
            }, {
                2: 2,
                5: 5
            }],
            10: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.updateShowing(), o.on(o.player(), "durationchange", o.updateShowing), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, "div", {
                                className: "vjs-live-control vjs-control"
                            });
                            return this.contentEl_ = p.createEl("div", {
                                className: "vjs-live-display",
                                innerHTML: '<span class="vjs-control-text">' + this.localize("Stream Type") + "</span>" + this.localize("LIVE")
                            }, {
                                "aria-live": "off"
                            }), t.appendChild(this.contentEl_), t
                        }, t.prototype.updateShowing = function() {
                            this.player().duration() === 1 / 0 ? this.show() : this.hide()
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("LiveDisplay", d), n["default"] = d
            }, {
                5: 5,
                80: 80
            }],
            11: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(2),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(80),
                    f = r(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.on(n, "volumechange", o.update), n.tech_ && n.tech_.featuresVolumeControl === !1 && o.addClass("vjs-hidden"), o.on(n, "loadstart", function() {
                                this.update(), n.tech_.featuresVolumeControl === !1 ? this.addClass("vjs-hidden") : this.removeClass("vjs-hidden")
                            }), o
                        }
                        return a(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-mute-control " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleClick = function() {
                            this.player_.muted(this.player_.muted() ? !1 : !0)
                        }, t.prototype.update = function() {
                            var e = this.player_.volume(),
                                t = 3;
                            0 === e || this.player_.muted() ? t = 0 : .33 > e ? t = 1 : .67 > e && (t = 2);
                            var n = this.player_.muted() ? "Unmute" : "Mute";
                            this.controlText() !== n && this.controlText(n);
                            for (var r = 0; 4 > r; r++) f.removeElClass(this.el_, "vjs-vol-" + r);
                            f.addElClass(this.el_, "vjs-vol-" + t)
                        }, t
                    }(u["default"]);
                h.prototype.controlText_ = "Mute", p["default"].registerComponent("MuteToggle", h), n["default"] = h
            }, {
                2: 2,
                5: 5,
                80: 80
            }],
            12: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(2),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.on(n, "play", s.handlePlay), s.on(n, "pause", s.handlePause), s
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-play-control " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleClick = function() {
                            this.player_.paused() ? this.player_.play() : this.player_.pause()
                        }, t.prototype.handlePlay = function() {
                            this.removeClass("vjs-paused"), this.addClass("vjs-playing"), this.controlText("Pause")
                        }, t.prototype.handlePause = function() {
                            this.removeClass("vjs-playing"), this.addClass("vjs-paused"), this.controlText("Play")
                        }, t
                    }(l["default"]);
                p.prototype.controlText_ = "Play", c["default"].registerComponent("PlayToggle", p), n["default"] = p
            }, {
                2: 2,
                5: 5
            }],
            13: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(47),
                    u = o(l),
                    c = e(49),
                    p = o(c),
                    d = e(14),
                    f = o(d),
                    h = e(5),
                    y = o(h),
                    v = e(80),
                    m = r(v),
                    g = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.updateVisibility(), o.updateLabel(), o.on(n, "loadstart", o.updateVisibility), o.on(n, "ratechange", o.updateLabel), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this);
                            return this.labelEl_ = m.createEl("div", {
                                className: "vjs-playback-rate-value",
                                innerHTML: 1
                            }), t.appendChild(this.labelEl_), t
                        }, t.prototype.buildCSSClass = function() {
                            return "vjs-playback-rate " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.createMenu = function() {
                            var e = new p["default"](this.player()),
                                t = this.playbackRates();
                            if (t)
                                for (var n = t.length - 1; n >= 0; n--) e.addChild(new f["default"](this.player(), {
                                    rate: t[n] + "x"
                                }));
                            return e
                        }, t.prototype.updateARIAAttributes = function() {
                            this.el().setAttribute("aria-valuenow", this.player().playbackRate())
                        }, t.prototype.handleClick = function() {
                            for (var e = this.player().playbackRate(), t = this.playbackRates(), n = t[0], r = 0; r < t.length; r++)
                                if (t[r] > e) {
                                    n = t[r];
                                    break
                                }
                            this.player().playbackRate(n)
                        }, t.prototype.playbackRates = function() {
                            return this.options_.playbackRates || this.options_.playerOptions && this.options_.playerOptions.playbackRates
                        }, t.prototype.playbackRateSupported = function() {
                            return this.player().tech_ && this.player().tech_.featuresPlaybackRate && this.playbackRates() && this.playbackRates().length > 0
                        }, t.prototype.updateVisibility = function() {
                            this.playbackRateSupported() ? this.removeClass("vjs-hidden") : this.addClass("vjs-hidden")
                        }, t.prototype.updateLabel = function() {
                            this.playbackRateSupported() && (this.labelEl_.innerHTML = this.player().playbackRate() + "x")
                        }, t
                    }(u["default"]);
                g.prototype.controlText_ = "Playback Rate", y["default"].registerComponent("PlaybackRateMenuButton", g), n["default"] = g
            }, {
                14: 14,
                47: 47,
                49: 49,
                5: 5,
                80: 80
            }],
            14: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(48),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = r.rate,
                                a = parseFloat(s, 10);
                            r.label = s, r.selected = 1 === a;
                            var l = i(this, e.call(this, n, r));
                            return l.label = s, l.rate = a, l.on(n, "ratechange", l.update), l
                        }
                        return s(t, e), t.prototype.handleClick = function() {
                            e.prototype.handleClick.call(this), this.player().playbackRate(this.rate)
                        }, t.prototype.update = function() {
                            this.selected(this.player().playbackRate() === this.rate)
                        }, t
                    }(l["default"]);
                p.prototype.contentElType = "button", c["default"].registerComponent("PlaybackRateMenuItem", p), n["default"] = p
            }, {
                48: 48,
                5: 5
            }],
            15: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.partEls_ = [], o.on(n, "progress", o.update), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-load-progress",
                                innerHTML: '<span class="vjs-control-text"><span>' + this.localize("Loaded") + "</span>: 0%</span>"
                            })
                        }, t.prototype.update = function() {
                            var e = this.player_.buffered(),
                                t = this.player_.duration(),
                                n = this.player_.bufferedEnd(),
                                r = this.partEls_,
                                o = function(e, t) {
                                    var n = e / t || 0;
                                    return 100 * (n >= 1 ? 1 : n) + "%"
                                };
                            this.el_.style.width = o(n, t);
                            for (var i = 0; i < e.length; i++) {
                                var s = e.start(i),
                                    a = e.end(i),
                                    l = r[i];
                                l || (l = this.el_.appendChild(p.createEl()), r[i] = l), l.style.left = o(s, n), l.style.width = o(a - s, n)
                            }
                            for (var u = r.length; u > e.length; u--) this.el_.removeChild(r[u - 1]);
                            r.length = e.length
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("LoadProgressBar", d), n["default"] = d
            }, {
                5: 5,
                80: 80
            }],
            16: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(93),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(80),
                    f = r(d),
                    h = e(82),
                    y = r(h),
                    v = e(83),
                    m = o(v),
                    g = e(98),
                    b = o(g),
                    _ = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return r.playerOptions && r.playerOptions.controlBar && r.playerOptions.controlBar.progressControl && r.playerOptions.controlBar.progressControl.keepTooltipsInside && (o.keepTooltipsInside = r.playerOptions.controlBar.progressControl.keepTooltipsInside), o.keepTooltipsInside && (o.tooltip = f.createEl("div", {
                                className: "vjs-time-tooltip"
                            }), o.el().appendChild(o.tooltip), o.addClass("vjs-keep-tooltips-inside")), o.update(0, 0), n.on("ready", function() {
                                o.on(n.controlBar.progressControl.el(), "mousemove", (0, b["default"])(y.bind(o, o.handleMouseMove), 25))
                            }), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-mouse-display"
                            })
                        }, t.prototype.handleMouseMove = function(e) {
                            var t = this.player_.duration(),
                                n = this.calculateDistance(e) * t,
                                r = e.pageX - f.findElPosition(this.el().parentNode).left;
                            this.update(n, r)
                        }, t.prototype.update = function(e, t) {
                            var n = (0, m["default"])(e, this.player_.duration());
                            if (this.el().setAttribute("data-current-time", n), this.keepTooltipsInside) {
                                var r = this.clampPosition_(t),
                                    o = t - r + 1,
                                    i = parseFloat(u["default"].getComputedStyle(this.tooltip).width),
                                    s = i / 2;
                                this.tooltip.innerHTML = n, this.tooltip.style.right = "-" + (s - o) + "px"
                            }
                        }, t.prototype.calculateDistance = function(e) {
                            return f.getPointerPosition(this.el().parentNode, e).x
                        }, t.prototype.clampPosition_ = function(e) {
                            if (!this.keepTooltipsInside) return e;
                            var t = parseFloat(u["default"].getComputedStyle(this.player().el()).width),
                                n = parseFloat(u["default"].getComputedStyle(this.tooltip).width),
                                r = n / 2,
                                o = e;
                            return r > e ? o = Math.ceil(r) : e > t - r && (o = Math.floor(t - r)), o
                        }, t
                    }(p["default"]);
                p["default"].registerComponent("MouseTimeDisplay", _), n["default"] = _
            }, {
                5: 5,
                80: 80,
                82: 82,
                83: 83,
                93: 93,
                98: 98
            }],
            17: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(82),
                    p = r(c),
                    d = e(83),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.updateDataAttr(), o.on(n, "timeupdate", o.updateDataAttr), n.ready(p.bind(o, o.updateDataAttr)), r.playerOptions && r.playerOptions.controlBar && r.playerOptions.controlBar.progressControl && r.playerOptions.controlBar.progressControl.keepTooltipsInside && (o.keepTooltipsInside = r.playerOptions.controlBar.progressControl.keepTooltipsInside), o.keepTooltipsInside && o.addClass("vjs-keep-tooltips-inside"), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-play-progress vjs-slider-bar",
                                innerHTML: '<span class="vjs-control-text"><span>' + this.localize("Progress") + "</span>: 0%</span>"
                            })
                        }, t.prototype.updateDataAttr = function() {
                            var e = this.player_.scrubbing() ? this.player_.getCache().currentTime : this.player_.currentTime();
                            this.el_.setAttribute("data-current-time", (0, f["default"])(e, this.player_.duration()))
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("PlayProgressBar", h), n["default"] = h
            }, {
                5: 5,
                82: 82,
                83: 83
            }],
            18: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a);
                e(19), e(16);
                var u = function(e) {
                    function t() {
                        return o(this, t), i(this, e.apply(this, arguments))
                    }
                    return s(t, e), t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-progress-control vjs-control"
                        })
                    }, t
                }(l["default"]);
                u.prototype.options_ = {
                    children: ["seekBar"]
                }, l["default"].registerComponent("ProgressControl", u), n["default"] = u
            }, {
                16: 16,
                19: 19,
                5: 5
            }],
            19: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(93),
                    u = o(l),
                    c = e(57),
                    p = o(c),
                    d = e(5),
                    f = o(d),
                    h = e(82),
                    y = r(h),
                    v = e(83),
                    m = o(v);
                e(15), e(17), e(20);
                var g = function(e) {
                    function t(n, r) {
                        i(this, t);
                        var o = s(this, e.call(this, n, r));
                        return o.on(n, "timeupdate", o.updateProgress), o.on(n, "ended", o.updateProgress), n.ready(y.bind(o, o.updateProgress)), r.playerOptions && r.playerOptions.controlBar && r.playerOptions.controlBar.progressControl && r.playerOptions.controlBar.progressControl.keepTooltipsInside && (o.keepTooltipsInside = r.playerOptions.controlBar.progressControl.keepTooltipsInside), o.keepTooltipsInside && (o.tooltipProgressBar = o.addChild("TooltipProgressBar")), o
                    }
                    return a(t, e), t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-progress-holder"
                        }, {
                            "aria-label": "progress bar"
                        })
                    }, t.prototype.updateProgress = function() {
                        if (this.updateAriaAttributes(this.el_), this.keepTooltipsInside) {
                            this.updateAriaAttributes(this.tooltipProgressBar.el_), this.tooltipProgressBar.el_.style.width = this.bar.el_.style.width;
                            var e = parseFloat(u["default"].getComputedStyle(this.player().el()).width),
                                t = parseFloat(u["default"].getComputedStyle(this.tooltipProgressBar.tooltip).width),
                                n = this.tooltipProgressBar.el().style;
                            n.maxWidth = Math.floor(e - t / 2) + "px", n.minWidth = Math.ceil(t / 2) + "px", n.right = "-" + t / 2 + "px"
                        }
                    }, t.prototype.updateAriaAttributes = function(e) {
                        var t = this.player_.scrubbing() ? this.player_.getCache().currentTime : this.player_.currentTime();
                        e.setAttribute("aria-valuenow", (100 * this.getPercent()).toFixed(2)), e.setAttribute("aria-valuetext", (0, m["default"])(t, this.player_.duration()))
                    }, t.prototype.getPercent = function() {
                        var e = this.player_.currentTime() / this.player_.duration();
                        return e >= 1 ? 1 : e
                    }, t.prototype.handleMouseDown = function(t) {
                        e.prototype.handleMouseDown.call(this, t), this.player_.scrubbing(!0), this.videoWasPlaying = !this.player_.paused(), this.player_.pause()
                    }, t.prototype.handleMouseMove = function(e) {
                        var t = this.calculateDistance(e) * this.player_.duration();
                        t === this.player_.duration() && (t -= .1), this.player_.currentTime(t)
                    }, t.prototype.handleMouseUp = function(t) {
                        e.prototype.handleMouseUp.call(this, t), this.player_.scrubbing(!1), this.videoWasPlaying && this.player_.play()
                    }, t.prototype.stepForward = function() {
                        this.player_.currentTime(this.player_.currentTime() + 5)
                    }, t.prototype.stepBack = function() {
                        this.player_.currentTime(this.player_.currentTime() - 5)
                    }, t
                }(p["default"]);
                g.prototype.options_ = {
                    children: ["loadProgressBar", "mouseTimeDisplay", "playProgressBar"],
                    barName: "playProgressBar"
                }, g.prototype.playerEvent = "timeupdate", f["default"].registerComponent("SeekBar", g), n["default"] = g
            }, {
                15: 15,
                17: 17,
                20: 20,
                5: 5,
                57: 57,
                82: 82,
                83: 83,
                93: 93
            }],
            20: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(82),
                    p = r(c),
                    d = e(83),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.updateDataAttr(), o.on(n, "timeupdate", o.updateDataAttr), n.ready(p.bind(o, o.updateDataAttr)), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, "div", {
                                className: "vjs-tooltip-progress-bar vjs-slider-bar",
                                innerHTML: '<div class="vjs-time-tooltip"></div>\n        <span class="vjs-control-text"><span>' + this.localize("Progress") + "</span>: 0%</span>"
                            });
                            return this.tooltip = t.querySelector(".vjs-time-tooltip"), t
                        }, t.prototype.updateDataAttr = function() {
                            var e = this.player_.scrubbing() ? this.player_.getCache().currentTime : this.player_.currentTime(),
                                t = (0, f["default"])(e, this.player_.duration());
                            this.el_.setAttribute("data-current-time", t), this.tooltip.innerHTML = t
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("TooltipProgressBar", h), n["default"] = h
            }, {
                5: 5,
                82: 82,
                83: 83
            }],
            21: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(22),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t() {
                            return o(this, t), i(this, e.apply(this, arguments))
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-custom-control-spacer " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, {
                                className: this.buildCSSClass()
                            });
                            return t.innerHTML = "&nbsp;", t
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("CustomControlSpacer", p), n["default"] = p
            }, {
                22: 22,
                5: 5
            }],
            22: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = function(e) {
                        function t() {
                            return o(this, t), i(this, e.apply(this, arguments))
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-spacer " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: this.buildCSSClass()
                            })
                        }, t
                    }(l["default"]);
                l["default"].registerComponent("Spacer", u), n["default"] = u
            }, {
                5: 5
            }],
            23: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(31),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t), r.track = {
                                player: n,
                                kind: r.kind,
                                label: r.kind + " settings",
                                selectable: !1,
                                "default": !1,
                                mode: "disabled"
                            }, r.selectable = !1;
                            var s = i(this, e.call(this, n, r));
                            return s.addClass("vjs-texttrack-settings"), s.controlText(", opens " + r.kind + " settings dialog"), s
                        }
                        return s(t, e), t.prototype.handleClick = function() {
                            this.player().getChild("textTrackSettings").show(), this.player().getChild("textTrackSettings").el_.focus()
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("CaptionSettingsMenuItem", p), n["default"] = p
            }, {
                31: 31,
                5: 5
            }],
            24: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(30),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = e(23),
                    d = r(p),
                    f = function(e) {
                        function t(n, r, s) {
                            o(this, t);
                            var a = i(this, e.call(this, n, r, s));
                            return a.el_.setAttribute("aria-label", "Captions Menu"), a
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-captions-button " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.update = function() {
                            var t = 2;
                            e.prototype.update.call(this), this.player().tech_ && this.player().tech_.featuresNativeTextTracks && (t = 1), this.items && this.items.length > t ? this.show() : this.hide()
                        }, t.prototype.createItems = function() {
                            var t = [];
                            return this.player().tech_ && this.player().tech_.featuresNativeTextTracks || t.push(new d["default"](this.player_, {
                                kind: this.kind_
                            })), e.prototype.createItems.call(this, t)
                        }, t
                    }(l["default"]);
                f.prototype.kind_ = "captions", f.prototype.controlText_ = "Captions", c["default"].registerComponent("CaptionsButton", f), n["default"] = f
            }, {
                23: 23,
                30: 30,
                5: 5
            }],
            25: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(30),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(31),
                    f = o(d),
                    h = e(26),
                    y = o(h),
                    v = e(49),
                    m = o(v),
                    g = e(80),
                    b = r(g),
                    _ = e(89),
                    w = o(_),
                    C = function(e) {
                        function t(n, r, o) {
                            i(this, t);
                            var a = s(this, e.call(this, n, r, o));
                            return a.el_.setAttribute("aria-label", "Chapters Menu"), a
                        }
                        return a(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-chapters-button " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.createItems = function() {
                            var e = [],
                                t = this.player_.textTracks();
                            if (!t) return e;
                            for (var n = 0; n < t.length; n++) {
                                var r = t[n];
                                r.kind === this.kind_ && e.push(new f["default"](this.player_, {
                                    track: r
                                }))
                            }
                            return e
                        }, t.prototype.createMenu = function() {
                            for (var e = this, t = this.player_.textTracks() || [], n = void 0, r = this.items || [], o = t.length - 1; o >= 0; o--) {
                                var i = t[o];
                                if (i.kind === this.kind_) {
                                    n = i;
                                    break
                                }
                            }
                            var s = this.menu;
                            if (void 0 === s) {
                                s = new m["default"](this.player_);
                                var a = b.createEl("li", {
                                    className: "vjs-menu-title",
                                    innerHTML: (0, w["default"])(this.kind_),
                                    tabIndex: -1
                                });
                                s.children_.unshift(a), b.insertElFirst(a, s.contentEl())
                            } else r.forEach(function(e) {
                                return s.removeChild(e)
                            }), r = [];
                            if (n && (null === n.cues || void 0 === n.cues)) {
                                n.mode = "hidden";
                                var l = this.player_.remoteTextTrackEls().getTrackElementByTrack_(n);
                                l && l.addEventListener("load", function(t) {
                                    return e.update()
                                })
                            }
                            if (n && n.cues && n.cues.length > 0)
                                for (var u = n.cues, c = 0, p = u.length; p > c; c++) {
                                    var d = u[c],
                                        f = new y["default"](this.player_, {
                                            cue: d,
                                            track: n
                                        });
                                    r.push(f), s.addChild(f)
                                }
                            return r.length > 0 && this.show(), this.items = r, s
                        }, t
                    }(u["default"]);
                C.prototype.kind_ = "chapters", C.prototype.controlText_ = "Chapters", p["default"].registerComponent("ChaptersButton", C), n["default"] = C
            }, {
                26: 26,
                30: 30,
                31: 31,
                49: 49,
                5: 5,
                80: 80,
                89: 89
            }],
            26: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(48),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = r.track,
                                a = r.cue,
                                l = n.currentTime();
                            r.label = a.text, r.selected = a.startTime <= l && l < a.endTime;
                            var u = s(this, e.call(this, n, r));
                            return u.track = o, u.cue = a, o.addEventListener("cuechange", f.bind(u, u.update)), u
                        }
                        return a(t, e), t.prototype.handleClick = function() {
                            e.prototype.handleClick.call(this), this.player_.currentTime(this.cue.startTime), this.update(this.cue.startTime)
                        }, t.prototype.update = function() {
                            var e = this.cue,
                                t = this.player_.currentTime();
                            this.selected(e.startTime <= t && t < e.endTime)
                        }, t
                    }(u["default"]);
                p["default"].registerComponent("ChaptersTrackMenuItem", h), n["default"] = h
            }, {
                48: 48,
                5: 5,
                82: 82
            }],
            27: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(30),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = function(e) {
                        function t(n, r, o) {
                            i(this, t);
                            var a = s(this, e.call(this, n, r, o));
                            a.el_.setAttribute("aria-label", "Descriptions Menu");
                            var l = n.textTracks();
                            return l && ! function() {
                                var e = f.bind(a, a.handleTracksChange);
                                l.addEventListener("change", e), a.on("dispose", function() {
                                    l.removeEventListener("change", e)
                                })
                            }(), a
                        }
                        return a(t, e), t.prototype.handleTracksChange = function(e) {
                            for (var t = this.player().textTracks(), n = !1, r = 0, o = t.length; o > r; r++) {
                                var i = t[r];
                                if (i.kind !== this.kind_ && "showing" === i.mode) {
                                    n = !0;
                                    break
                                }
                            }
                            n ? this.disable() : this.enable()
                        }, t.prototype.buildCSSClass = function() {
                            return "vjs-descriptions-button " + e.prototype.buildCSSClass.call(this)
                        }, t
                    }(u["default"]);
                h.prototype.kind_ = "descriptions", h.prototype.controlText_ = "Descriptions", p["default"].registerComponent("DescriptionsButton", h), n["default"] = h
            }, {
                30: 30,
                5: 5,
                82: 82
            }],
            28: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(31),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r) {
                            o(this, t), r.track = {
                                player: n,
                                kind: r.kind,
                                label: r.kind + " off",
                                "default": !1,
                                mode: "disabled"
                            }, r.selectable = !0;
                            var s = i(this, e.call(this, n, r));
                            return s.selected(!0), s
                        }
                        return s(t, e), t.prototype.handleTracksChange = function(e) {
                            for (var t = this.player().textTracks(), n = !0, r = 0, o = t.length; o > r; r++) {
                                var i = t[r];
                                if (i.kind === this.track.kind && "showing" === i.mode) {
                                    n = !1;
                                    break
                                }
                            }
                            this.selected(n)
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("OffTextTrackMenuItem", p), n["default"] = p
            }, {
                31: 31,
                5: 5
            }],
            29: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(30),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n, r, s) {
                            o(this, t);
                            var a = i(this, e.call(this, n, r, s));
                            return a.el_.setAttribute("aria-label", "Subtitles Menu"), a
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-subtitles-button " + e.prototype.buildCSSClass.call(this)
                        }, t
                    }(l["default"]);
                p.prototype.kind_ = "subtitles", p.prototype.controlText_ = "Subtitles", c["default"].registerComponent("SubtitlesButton", p), n["default"] = p
            }, {
                30: 30,
                5: 5
            }],
            30: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(36),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = e(31),
                    d = r(p),
                    f = e(28),
                    h = r(f),
                    y = function(e) {
                        function t(n) {
                            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            return o(this, t), r.tracks = n.textTracks(), i(this, e.call(this, n, r))
                        }
                        return s(t, e), t.prototype.createItems = function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                            e.push(new h["default"](this.player_, {
                                kind: this.kind_
                            }));
                            var t = this.player_.textTracks();
                            if (!t) return e;
                            for (var n = 0; n < t.length; n++) {
                                var r = t[n];
                                r.kind === this.kind_ && e.push(new d["default"](this.player_, {
                                    track: r,
                                    selectable: !0
                                }))
                            }
                            return e
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("TextTrackButton", y), n["default"] = y
            }, {
                28: 28,
                31: 31,
                36: 36,
                5: 5
            }],
            31: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    u = e(48),
                    c = o(u),
                    p = e(5),
                    d = o(p),
                    f = e(82),
                    h = r(f),
                    y = e(93),
                    v = o(y),
                    m = e(92),
                    g = o(m),
                    b = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = r.track,
                                a = n.textTracks();
                            r.label = o.label || o.language || "Unknown", r.selected = o["default"] || "showing" === o.mode;
                            var u = s(this, e.call(this, n, r));
                            return u.track = o, a && ! function() {
                                var e = h.bind(u, u.handleTracksChange);
                                a.addEventListener("change", e), u.on("dispose", function() {
                                    a.removeEventListener("change", e)
                                })
                            }(), a && void 0 === a.onchange && ! function() {
                                var e = void 0;
                                u.on(["tap", "click"], function() {
                                    if ("object" !== l(v["default"].Event)) try {
                                        e = new v["default"].Event("change")
                                    } catch (t) {}
                                    e || (e = g["default"].createEvent("Event"), e.initEvent("change", !0, !0)), a.dispatchEvent(e)
                                })
                            }(), u
                        }
                        return a(t, e), t.prototype.handleClick = function(t) {
                            var n = this.track.kind,
                                r = this.player_.textTracks();
                            if (e.prototype.handleClick.call(this, t), r)
                                for (var o = 0; o < r.length; o++) {
                                    var i = r[o];
                                    i.kind === n && (i === this.track ? i.mode = "showing" : i.mode = "disabled")
                                }
                        }, t.prototype.handleTracksChange = function(e) {
                            this.selected("showing" === this.track.mode)
                        }, t
                    }(c["default"]);
                d["default"].registerComponent("TextTrackMenuItem", b), n["default"] = b
            }, {
                48: 48,
                5: 5,
                82: 82,
                92: 92,
                93: 93
            }],
            32: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(83),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.on(n, "timeupdate", o.updateContent), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, "div", {
                                className: "vjs-current-time vjs-time-control vjs-control"
                            });
                            return this.contentEl_ = p.createEl("div", {
                                className: "vjs-current-time-display",
                                innerHTML: '<span class="vjs-control-text">Current Time </span>0:00'
                            }, {
                                "aria-live": "off"
                            }), t.appendChild(this.contentEl_), t
                        }, t.prototype.updateContent = function() {
                            var e = this.player_.scrubbing() ? this.player_.getCache().currentTime : this.player_.currentTime(),
                                t = this.localize("Current Time"),
                                n = (0, f["default"])(e, this.player_.duration());
                            n !== this.formattedTime_ && (this.formattedTime_ = n, this.contentEl_.innerHTML = '<span class="vjs-control-text">' + t + "</span> " + n)
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("CurrentTimeDisplay", h), n["default"] = h
            }, {
                5: 5,
                80: 80,
                83: 83
            }],
            33: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(83),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.on(n, "durationchange", o.updateContent), o.on(n, "timeupdate", o.updateContent), o.on(n, "loadedmetadata", o.updateContent), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, "div", {
                                className: "vjs-duration vjs-time-control vjs-control"
                            });
                            return this.contentEl_ = p.createEl("div", {
                                className: "vjs-duration-display",
                                innerHTML: '<span class="vjs-control-text">' + this.localize("Duration Time") + "</span> 0:00"
                            }, {
                                "aria-live": "off"
                            }), t.appendChild(this.contentEl_), t
                        }, t.prototype.updateContent = function() {
                            var e = this.player_.duration();
                            if (e && this.duration_ !== e) {
                                this.duration_ = e;
                                var t = this.localize("Duration Time"),
                                    n = (0, f["default"])(e);
                                this.contentEl_.innerHTML = '<span class="vjs-control-text">' + t + "</span> " + n
                            }
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("DurationDisplay", h), n["default"] = h
            }, {
                5: 5,
                80: 80,
                83: 83
            }],
            34: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(83),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.on(n, "timeupdate", o.updateContent), o.on(n, "durationchange", o.updateContent), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = e.prototype.createEl.call(this, "div", {
                                className: "vjs-remaining-time vjs-time-control vjs-control"
                            });
                            return this.contentEl_ = p.createEl("div", {
                                className: "vjs-remaining-time-display",
                                innerHTML: '<span class="vjs-control-text">' + this.localize("Remaining Time") + "</span> -0:00"
                            }, {
                                "aria-live": "off"
                            }), t.appendChild(this.contentEl_), t
                        }, t.prototype.updateContent = function() {
                            if (this.player_.duration()) {
                                var e = this.localize("Remaining Time"),
                                    t = (0, f["default"])(this.player_.remainingTime());
                                t !== this.formattedTime_ && (this.formattedTime_ = t, this.contentEl_.innerHTML = '<span class="vjs-control-text">' + e + "</span> -" + t)
                            }
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("RemainingTimeDisplay", h), n["default"] = h
            }, {
                5: 5,
                80: 80,
                83: 83
            }],
            35: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = function(e) {
                        function t() {
                            return o(this, t), i(this, e.apply(this, arguments))
                        }
                        return s(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-time-control vjs-time-divider",
                                innerHTML: "<div><span>/</span></div>"
                            })
                        }, t
                    }(l["default"]);
                l["default"].registerComponent("TimeDivider", u), n["default"] = u
            }, {
                5: 5
            }],
            36: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(47),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = r.tracks,
                                a = s(this, e.call(this, n, r));
                            if (a.items.length <= 1 && a.hide(), !o) return s(a);
                            var l = f.bind(a, a.update);
                            return o.addEventListener("removetrack", l), o.addEventListener("addtrack", l), a.player_.on("dispose", function() {
                                o.removeEventListener("removetrack", l), o.removeEventListener("addtrack", l)
                            }), a
                        }
                        return a(t, e), t
                    }(u["default"]);
                p["default"].registerComponent("TrackButton", h), n["default"] = h
            }, {
                47: 47,
                5: 5,
                82: 82
            }],
            37: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(57),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d);
                e(39);
                var h = function(e) {
                    function t(n, r) {
                        i(this, t);
                        var o = s(this, e.call(this, n, r));
                        return o.on(n, "volumechange", o.updateARIAAttributes), n.ready(f.bind(o, o.updateARIAAttributes)), o
                    }
                    return a(t, e), t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-bar vjs-slider-bar"
                        }, {
                            "aria-label": "volume level"
                        })
                    }, t.prototype.handleMouseMove = function(e) {
                        this.checkMuted(), this.player_.volume(this.calculateDistance(e))
                    }, t.prototype.checkMuted = function() {
                        this.player_.muted() && this.player_.muted(!1)
                    }, t.prototype.getPercent = function() {
                        return this.player_.muted() ? 0 : this.player_.volume()
                    }, t.prototype.stepForward = function() {
                        this.checkMuted(), this.player_.volume(this.player_.volume() + .1)
                    }, t.prototype.stepBack = function() {
                        this.checkMuted(), this.player_.volume(this.player_.volume() - .1)
                    }, t.prototype.updateARIAAttributes = function() {
                        var e = (100 * this.player_.volume()).toFixed(2);
                        this.el_.setAttribute("aria-valuenow", e), this.el_.setAttribute("aria-valuetext", e + "%")
                    }, t
                }(u["default"]);
                h.prototype.options_ = {
                    children: ["volumeLevel"],
                    barName: "volumeLevel"
                }, h.prototype.playerEvent = "volumechange", p["default"].registerComponent("VolumeBar", h), n["default"] = h
            }, {
                39: 39,
                5: 5,
                57: 57,
                82: 82
            }],
            38: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a);
                e(37);
                var u = function(e) {
                    function t(n, r) {
                        o(this, t);
                        var s = i(this, e.call(this, n, r));
                        return n.tech_ && n.tech_.featuresVolumeControl === !1 && s.addClass("vjs-hidden"), s.on(n, "loadstart", function() {
                            n.tech_.featuresVolumeControl === !1 ? this.addClass("vjs-hidden") : this.removeClass("vjs-hidden")
                        }), s
                    }
                    return s(t, e), t.prototype.createEl = function() {
                        return e.prototype.createEl.call(this, "div", {
                            className: "vjs-volume-control vjs-control"
                        })
                    }, t
                }(l["default"]);
                u.prototype.options_ = {
                    children: ["volumeBar"]
                }, l["default"].registerComponent("VolumeControl", u), n["default"] = u
            }, {
                37: 37,
                5: 5
            }],
            39: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = function(e) {
                        function t() {
                            return o(this, t), i(this, e.apply(this, arguments))
                        }
                        return s(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-volume-level",
                                innerHTML: '<span class="vjs-control-text"></span>'
                            })
                        }, t
                    }(l["default"]);
                l["default"].registerComponent("VolumeLevel", u), n["default"] = u
            }, {
                5: 5
            }],
            40: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(82),
                    u = o(l),
                    c = e(5),
                    p = r(c),
                    d = e(54),
                    f = r(d),
                    h = e(53),
                    y = r(h),
                    v = e(11),
                    m = r(v),
                    g = e(37),
                    b = r(g),
                    _ = function(e) {
                        function t(n) {
                            function r() {
                                n.tech_ && n.tech_.featuresVolumeControl === !1 ? this.addClass("vjs-hidden") : this.removeClass("vjs-hidden")
                            }
                            var o = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            i(this, t), void 0 === o.inline && (o.inline = !0), void 0 === o.vertical && (o.inline ? o.vertical = !1 : o.vertical = !0), o.volumeBar = o.volumeBar || {}, o.volumeBar.vertical = !!o.vertical;
                            var a = s(this, e.call(this, n, o));
                            return a.on(n, "volumechange", a.volumeUpdate), a.on(n, "loadstart", a.volumeUpdate), r.call(a), a.on(n, "loadstart", r), a.on(a.volumeBar, ["slideractive", "focus"], function() {
                                this.addClass("vjs-slider-active")
                            }), a.on(a.volumeBar, ["sliderinactive", "blur"], function() {
                                this.removeClass("vjs-slider-active")
                            }), a.on(a.volumeBar, ["focus"], function() {
                                this.addClass("vjs-lock-showing")
                            }), a.on(a.volumeBar, ["blur"], function() {
                                this.removeClass("vjs-lock-showing")
                            }), a
                        }
                        return a(t, e), t.prototype.buildCSSClass = function() {
                            var t = "";
                            return t = this.options_.vertical ? "vjs-volume-menu-button-vertical" : "vjs-volume-menu-button-horizontal", "vjs-volume-menu-button " + e.prototype.buildCSSClass.call(this) + " " + t
                        }, t.prototype.createPopup = function() {
                            var e = new f["default"](this.player_, {
                                    contentElType: "div"
                                }),
                                t = new b["default"](this.player_, this.options_.volumeBar);
                            return e.addChild(t), this.menuContent = e, this.volumeBar = t, this.attachVolumeBarEvents(), e
                        }, t.prototype.handleClick = function() {
                            m["default"].prototype.handleClick.call(this), e.prototype.handleClick.call(this)
                        }, t.prototype.attachVolumeBarEvents = function() {
                            this.menuContent.on(["mousedown", "touchdown"], u.bind(this, this.handleMouseDown))
                        }, t.prototype.handleMouseDown = function(e) {
                            this.on(["mousemove", "touchmove"], u.bind(this.volumeBar, this.volumeBar.handleMouseMove)), this.on(this.el_.ownerDocument, ["mouseup", "touchend"], this.handleMouseUp)
                        }, t.prototype.handleMouseUp = function(e) {
                            this.off(["mousemove", "touchmove"], u.bind(this.volumeBar, this.volumeBar.handleMouseMove))
                        }, t
                    }(y["default"]);
                _.prototype.volumeUpdate = m["default"].prototype.update, _.prototype.controlText_ = "Mute", p["default"].registerComponent("VolumeMenuButton", _), n["default"] = _
            }, {
                11: 11,
                37: 37,
                5: 5,
                53: 53,
                54: 54,
                82: 82
            }],
            41: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = e(50),
                    c = r(u),
                    p = e(86),
                    d = r(p),
                    f = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.on(n, "error", s.open), s
                        }
                        return s(t, e), t.prototype.buildCSSClass = function() {
                            return "vjs-error-display " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.content = function() {
                            var e = this.player().error();
                            return e ? this.localize(e.message) : ""
                        }, t
                    }(c["default"]);
                f.prototype.options_ = (0, d["default"])(c["default"].prototype.options_, {
                    fillAlways: !0,
                    temporary: !1,
                    uncloseable: !0
                }), l["default"].registerComponent("ErrorDisplay", f), n["default"] = f
            }, {
                5: 5,
                50: 50,
                86: 86
            }],
            42: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }
                n.__esModule = !0;
                var o = e(81),
                    i = r(o),
                    s = function() {};
                s.prototype.allowedEvents_ = {}, s.prototype.on = function(e, t) {
                    var n = this.addEventListener;
                    this.addEventListener = function() {}, i.on(this, e, t), this.addEventListener = n
                }, s.prototype.addEventListener = s.prototype.on, s.prototype.off = function(e, t) {
                    i.off(this, e, t)
                }, s.prototype.removeEventListener = s.prototype.off, s.prototype.one = function(e, t) {
                    var n = this.addEventListener;
                    this.addEventListener = function() {}, i.one(this, e, t), this.addEventListener = n
                }, s.prototype.trigger = function(e) {
                    var t = e.type || e;
                    "string" == typeof e && (e = {
                        type: t
                    }), e = i.fixEvent(e), this.allowedEvents_[t] && this["on" + t] && this["on" + t](e), i.trigger(this, e)
                }, s.prototype.dispatchEvent = s.prototype.trigger, n["default"] = s
            }, {
                81: 81
            }],
            43: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0;
                var o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    i = e(85),
                    s = r(i),
                    a = function(e, t) {
                        if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + ("undefined" == typeof t ? "undefined" : o(t)));
                        e.prototype = Object.create(t && t.prototype, {
                            constructor: {
                                value: e,
                                enumerable: !1,
                                writable: !0,
                                configurable: !0
                            }
                        }), t && (e.super_ = t)
                    },
                    l = function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                            n = function() {
                                e.apply(this, arguments)
                            },
                            r = {};
                        "object" === ("undefined" == typeof t ? "undefined" : o(t)) ? ("function" == typeof t.init && (s["default"].warn("Constructor logic via init() is deprecated; please use constructor() instead."), t.constructor = t.init), t.constructor !== Object.prototype.constructor && (n = t.constructor), r = t) : "function" == typeof t && (n = t), a(n, e);
                        for (var i in r) r.hasOwnProperty(i) && (n.prototype[i] = r[i]);
                        return n
                    };
                n["default"] = l
            }, {
                85: 85
            }],
            44: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0;
                for (var o = e(92), i = r(o), s = {}, a = [
                        ["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenEnabled", "fullscreenchange", "fullscreenerror"],
                        ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitFullscreenEnabled", "webkitfullscreenchange", "webkitfullscreenerror"],
                        ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitCancelFullScreen", "webkitfullscreenchange", "webkitfullscreenerror"],
                        ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozFullScreenEnabled", "mozfullscreenchange", "mozfullscreenerror"],
                        ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "msFullscreenEnabled", "MSFullscreenChange", "MSFullscreenError"]
                    ], l = a[0], u = void 0, c = 0; c < a.length; c++)
                    if (a[c][1] in i["default"]) {
                        u = a[c];
                        break
                    }
                if (u)
                    for (var p = 0; p < u.length; p++) s[l[p]] = u[p];
                n["default"] = s
            }, {
                92: 92
            }],
            45: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = function(e) {
                        function t() {
                            return o(this, t), i(this, e.apply(this, arguments))
                        }
                        return s(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-loading-spinner",
                                dir: "ltr"
                            })
                        }, t
                    }(l["default"]);
                l["default"].registerComponent("LoadingSpinner", u), n["default"] = u
            }, {
                5: 5
            }],
            46: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    return e instanceof o ? e : ("number" == typeof e ? this.code = e : "string" == typeof e ? this.message = e : "object" === ("undefined" == typeof e ? "undefined" : i(e)) && ("number" == typeof e.code && (this.code = e.code), (0, a["default"])(this, e)), void(this.message || (this.message = o.defaultMessages[this.code] || "")))
                }
                n.__esModule = !0;
                var i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    s = e(136),
                    a = r(s);
                o.prototype.code = 0, o.prototype.message = "", o.prototype.status = null, o.errorTypes = ["MEDIA_ERR_CUSTOM", "MEDIA_ERR_ABORTED", "MEDIA_ERR_NETWORK", "MEDIA_ERR_DECODE", "MEDIA_ERR_SRC_NOT_SUPPORTED", "MEDIA_ERR_ENCRYPTED"], o.defaultMessages = {
                    1: "You aborted the media playback",
                    2: "A network error caused the media download to fail part-way.",
                    3: "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.",
                    4: "The media could not be loaded, either because the server or network failed or because the format is not supported.",
                    5: "The media is encrypted and we do not have the keys to decrypt it."
                };
                for (var l = 0; l < o.errorTypes.length; l++) o[o.errorTypes[l]] = l, o.prototype[o.errorTypes[l]] = l;
                n["default"] = o
            }, {
                136: 136
            }],
            47: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(3),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(49),
                    f = o(d),
                    h = e(80),
                    y = r(h),
                    v = e(82),
                    m = r(v),
                    g = e(89),
                    b = o(g),
                    _ = function(e) {
                        function t(n) {
                            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.update(), o.enabled_ = !0, o.el_.setAttribute("aria-haspopup", "true"), o.el_.setAttribute("role", "menuitem"), o.on("keydown", o.handleSubmenuKeyPress), o
                        }
                        return a(t, e), t.prototype.update = function() {
                            var e = this.createMenu();
                            this.menu && this.removeChild(this.menu), this.menu = e, this.addChild(e), this.buttonPressed_ = !1, this.el_.setAttribute("aria-expanded", "false"), this.items && 0 === this.items.length ? this.hide() : this.items && this.items.length > 1 && this.show()
                        }, t.prototype.createMenu = function() {
                            var e = new f["default"](this.player_);
                            if (this.options_.title) {
                                var t = y.createEl("li", {
                                    className: "vjs-menu-title",
                                    innerHTML: (0, b["default"])(this.options_.title),
                                    tabIndex: -1
                                });
                                e.children_.unshift(t), y.insertElFirst(t, e.contentEl())
                            }
                            if (this.items = this.createItems(), this.items)
                                for (var n = 0; n < this.items.length; n++) e.addItem(this.items[n]);
                            return e
                        }, t.prototype.createItems = function() {}, t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: this.buildCSSClass()
                            })
                        }, t.prototype.buildCSSClass = function() {
                            var t = "vjs-menu-button";
                            return t += this.options_.inline === !0 ? "-inline" : "-popup", "vjs-menu-button " + t + " " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleClick = function() {
                            this.one(this.menu.contentEl(), "mouseleave", m.bind(this, function(e) {
                                this.unpressButton(), this.el_.blur()
                            })), this.buttonPressed_ ? this.unpressButton() : this.pressButton()
                        }, t.prototype.handleKeyPress = function(t) {
                            27 === t.which || 9 === t.which ? (this.buttonPressed_ && this.unpressButton(), 9 !== t.which && t.preventDefault()) : 38 === t.which || 40 === t.which ? this.buttonPressed_ || (this.pressButton(), t.preventDefault()) : e.prototype.handleKeyPress.call(this, t)
                        }, t.prototype.handleSubmenuKeyPress = function(e) {
                            (27 === e.which || 9 === e.which) && (this.buttonPressed_ && this.unpressButton(), 9 !== e.which && e.preventDefault())
                        }, t.prototype.pressButton = function() {
                            this.enabled_ && (this.buttonPressed_ = !0, this.menu.lockShowing(), this.el_.setAttribute("aria-expanded", "true"), this.menu.focus())
                        }, t.prototype.unpressButton = function() {
                            this.enabled_ && (this.buttonPressed_ = !1, this.menu.unlockShowing(), this.el_.setAttribute("aria-expanded", "false"), this.el_.focus())
                        }, t.prototype.disable = function() {
                            return this.buttonPressed_ = !1, this.menu.unlockShowing(), this.el_.setAttribute("aria-expanded", "false"), this.enabled_ = !1, e.prototype.disable.call(this)
                        }, t.prototype.enable = function() {
                            return this.enabled_ = !0, e.prototype.enable.call(this)
                        }, t
                    }(u["default"]);
                p["default"].registerComponent("MenuButton", _), n["default"] = _
            }, {
                3: 3,
                49: 49,
                5: 5,
                80: 80,
                82: 82,
                89: 89
            }],
            48: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(3),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = e(136),
                    d = r(p),
                    f = function(e) {
                        function t(n, r) {
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.selectable = r.selectable, s.selected(r.selected), s.selectable ? s.el_.setAttribute("role", "menuitemcheckbox") : s.el_.setAttribute("role", "menuitem"), s
                        }
                        return s(t, e), t.prototype.createEl = function(t, n, r) {
                            return e.prototype.createEl.call(this, "li", (0, d["default"])({
                                className: "vjs-menu-item",
                                innerHTML: this.localize(this.options_.label),
                                tabIndex: -1
                            }, n), r)
                        }, t.prototype.handleClick = function() {
                            this.selected(!0)
                        }, t.prototype.selected = function(e) {
                            this.selectable && (e ? (this.addClass("vjs-selected"), this.el_.setAttribute("aria-checked", "true"), this.controlText(", selected")) : (this.removeClass("vjs-selected"), this.el_.setAttribute("aria-checked", "false"), this.controlText(" ")))
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("MenuItem", f), n["default"] = f
            }, {
                136: 136,
                3: 3,
                5: 5
            }],
            49: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(82),
                    f = r(d),
                    h = e(81),
                    y = r(h),
                    v = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.focusedChild_ = -1, o.on("keydown", o.handleKeyPress), o
                        }
                        return a(t, e), t.prototype.addItem = function(e) {
                            this.addChild(e), e.on("click", f.bind(this, function() {
                                this.unlockShowing()
                            }))
                        }, t.prototype.createEl = function() {
                            var t = this.options_.contentElType || "ul";
                            this.contentEl_ = p.createEl(t, {
                                className: "vjs-menu-content"
                            }), this.contentEl_.setAttribute("role", "menu");
                            var n = e.prototype.createEl.call(this, "div", {
                                append: this.contentEl_,
                                className: "vjs-menu"
                            });
                            return n.setAttribute("role", "presentation"), n.appendChild(this.contentEl_), y.on(n, "click", function(e) {
                                e.preventDefault(), e.stopImmediatePropagation()
                            }), n
                        }, t.prototype.handleKeyPress = function(e) {
                            37 === e.which || 40 === e.which ? (e.preventDefault(), this.stepForward()) : (38 === e.which || 39 === e.which) && (e.preventDefault(), this.stepBack())
                        }, t.prototype.stepForward = function() {
                            var e = 0;
                            void 0 !== this.focusedChild_ && (e = this.focusedChild_ + 1), this.focus(e)
                        }, t.prototype.stepBack = function() {
                            var e = 0;
                            void 0 !== this.focusedChild_ && (e = this.focusedChild_ - 1), this.focus(e)
                        }, t.prototype.focus = function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                                t = this.children().slice(),
                                n = t.length && t[0].className && /vjs-menu-title/.test(t[0].className);
                            n && t.shift(), t.length > 0 && (0 > e ? e = 0 : e >= t.length && (e = t.length - 1), this.focusedChild_ = e, t[e].el_.focus())
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("Menu", v), n["default"] = v
            }, {
                5: 5,
                80: 80,
                81: 81,
                82: 82
            }],
            50: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(80),
                    u = o(l),
                    c = e(82),
                    p = o(c),
                    d = e(5),
                    f = r(d),
                    h = "vjs-modal-dialog",
                    y = 27,
                    v = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.opened_ = o.hasBeenOpened_ = o.hasBeenFilled_ = !1, o.closeable(!o.options_.uncloseable), o.content(o.options_.content), o.contentEl_ = u.createEl("div", {
                                className: h + "-content"
                            }, {
                                role: "document"
                            }), o.descEl_ = u.createEl("p", {
                                className: h + "-description vjs-offscreen",
                                id: o.el().getAttribute("aria-describedby")
                            }), u.textContent(o.descEl_, o.description()), o.el_.appendChild(o.descEl_), o.el_.appendChild(o.contentEl_), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: this.buildCSSClass(),
                                tabIndex: -1
                            }, {
                                "aria-describedby": this.id() + "_description",
                                "aria-hidden": "true",
                                "aria-label": this.label(),
                                role: "dialog"
                            })
                        }, t.prototype.buildCSSClass = function() {
                            return h + " vjs-hidden " + e.prototype.buildCSSClass.call(this)
                        }, t.prototype.handleKeyPress = function(e) {
                            e.which === y && this.closeable() && this.close()
                        }, t.prototype.label = function() {
                            return this.options_.label || this.localize("Modal Window")
                        }, t.prototype.description = function() {
                            var e = this.options_.description || this.localize("This is a modal window.");
                            return this.closeable() && (e += " " + this.localize("This modal can be closed by pressing the Escape key or activating the close button.")), e
                        }, t.prototype.open = function() {
                            if (!this.opened_) {
                                var e = this.player();
                                this.trigger("beforemodalopen"), this.opened_ = !0, (this.options_.fillAlways || !this.hasBeenOpened_ && !this.hasBeenFilled_) && this.fill(), this.wasPlaying_ = !e.paused(), this.wasPlaying_ && e.pause(), this.closeable() && this.on(this.el_.ownerDocument, "keydown", p.bind(this, this.handleKeyPress)), e.controls(!1), this.show(), this.el().setAttribute("aria-hidden", "false"), this.trigger("modalopen"), this.hasBeenOpened_ = !0
                            }
                            return this
                        }, t.prototype.opened = function(e) {
                            return "boolean" == typeof e && this[e ? "open" : "close"](), this.opened_
                        }, t.prototype.close = function() {
                            if (this.opened_) {
                                var e = this.player();
                                this.trigger("beforemodalclose"), this.opened_ = !1, this.wasPlaying_ && e.play(), this.closeable() && this.off(this.el_.ownerDocument, "keydown", p.bind(this, this.handleKeyPress)), e.controls(!0), this.hide(), this.el().setAttribute("aria-hidden", "true"), this.trigger("modalclose"), this.options_.temporary && this.dispose()
                            }
                            return this
                        }, t.prototype.closeable = function n(e) {
                            if ("boolean" == typeof e) {
                                var n = this.closeable_ = !!e,
                                    t = this.getChild("closeButton");
                                if (n && !t) {
                                    var r = this.contentEl_;
                                    this.contentEl_ = this.el_, t = this.addChild("closeButton", {
                                        controlText: "Close Modal Dialog"
                                    }), this.contentEl_ = r, this.on(t, "close", this.close)
                                }!n && t && (this.off(t, "close", this.close), this.removeChild(t), t.dispose())
                            }
                            return this.closeable_
                        }, t.prototype.fill = function() {
                            return this.fillWith(this.content())
                        }, t.prototype.fillWith = function(e) {
                            var t = this.contentEl(),
                                n = t.parentNode,
                                r = t.nextSibling;
                            return this.trigger("beforemodalfill"), this.hasBeenFilled_ = !0, n.removeChild(t), this.empty(), u.insertContent(t, e), this.trigger("modalfill"), r ? n.insertBefore(t, r) : n.appendChild(t), this
                        }, t.prototype.empty = function() {
                            return this.trigger("beforemodalempty"), u.emptyEl(this.contentEl()), this.trigger("modalempty"), this
                        }, t.prototype.content = function(e) {
                            return "undefined" != typeof e && (this.content_ = e), this.content_
                        }, t
                    }(f["default"]);
                v.prototype.options_ = {
                    temporary: !0
                }, f["default"].registerComponent("ModalDialog", v), n["default"] = v
            }, {
                5: 5,
                80: 80,
                82: 82
            }],
            51: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(92),
                    p = o(c),
                    d = e(93),
                    f = o(d),
                    h = e(81),
                    y = r(h),
                    v = e(80),
                    m = r(v),
                    g = e(82),
                    b = r(g),
                    _ = e(84),
                    w = r(_),
                    C = e(78),
                    T = r(C),
                    E = e(85),
                    x = o(E),
                    O = e(89),
                    P = o(O),
                    S = e(88),
                    j = e(79),
                    k = e(87),
                    I = (r(k),
                        e(44)),
                    R = o(I),
                    M = e(46),
                    A = o(M),
                    L = e(145),
                    N = o(L),
                    B = e(136),
                    D = o(B),
                    F = e(86),
                    U = o(F),
                    H = e(69),
                    V = o(H),
                    z = e(50),
                    W = o(z),
                    q = e(62),
                    $ = o(q),
                    X = e(63),
                    G = o(X),
                    Y = e(76),
                    Z = o(Y);
                e(61), e(59), e(55), e(68), e(45), e(1), e(4), e(8), e(41), e(71), e(60);
                var K = ["progress", "abort", "suspend", "emptied", "stalled", "loadedmetadata", "loadeddata", "timeupdate", "ratechange", "volumechange", "texttrackchange"],
                    J = function(e) {
                        function t(n, r, o) {
                            if (i(this, t), n.id = n.id || "vjs_video_" + w.newGUID(), r = (0, D["default"])(t.getTagSettings(n), r), r.initChildren = !1, r.createEl = !1, r.reportTouchActivity = !1, !r.language)
                                if ("function" == typeof n.closest) {
                                    var a = n.closest("[lang]");
                                    a && (r.language = a.getAttribute("lang"))
                                } else
                                    for (var l = n; l && 1 === l.nodeType;) {
                                        if (m.getElAttributes(l).hasOwnProperty("lang")) {
                                            r.language = l.getAttribute("lang");
                                            break
                                        }
                                        l = l.parentNode
                                    }
                            var u = s(this, e.call(this, null, r, o));
                            if (!u.options_ || !u.options_.techOrder || !u.options_.techOrder.length) throw new Error("No techOrder specified. Did you overwrite videojs.options instead of just changing the properties you want to override?");
                            u.tag = n, u.tagAttributes = n && m.getElAttributes(n), u.language(u.options_.language), r.languages ? ! function() {
                                var e = {};
                                Object.getOwnPropertyNames(r.languages).forEach(function(t) {
                                    e[t.toLowerCase()] = r.languages[t]
                                }), u.languages_ = e
                            }() : u.languages_ = t.prototype.options_.languages, u.cache_ = {}, u.poster_ = r.poster || "", u.controls_ = !!r.controls, n.controls = !1, u.scrubbing_ = !1, u.el_ = u.createEl();
                            var c = (0, U["default"])(u.options_);
                            return r.plugins && ! function() {
                                var e = r.plugins;
                                Object.getOwnPropertyNames(e).forEach(function(t) {
                                    "function" == typeof this[t] ? this[t](e[t]) : x["default"].error("Unable to find plugin:", t)
                                }, u)
                            }(), u.options_.playerOptions = c, u.initChildren(), u.isAudio("audio" === n.nodeName.toLowerCase()), u.controls() ? u.addClass("vjs-controls-enabled") : u.addClass("vjs-controls-disabled"), u.el_.setAttribute("role", "region"), u.isAudio() ? u.el_.setAttribute("aria-label", "audio player") : u.el_.setAttribute("aria-label", "video player"), u.isAudio() && u.addClass("vjs-audio"), u.flexNotSupported_() && u.addClass("vjs-no-flex"), T.IS_IOS || u.addClass("vjs-workinghover"), t.players[u.id_] = u, u.userActive(!0), u.reportUserActivity(), u.listenForUserActivity_(), u.on("fullscreenchange", u.handleFullscreenChange_), u.on("stageclick", u.handleStageClick_), u
                        }
                        return a(t, e), t.prototype.dispose = function() {
                            this.trigger("dispose"), this.off("dispose"), this.styleEl_ && this.styleEl_.parentNode && this.styleEl_.parentNode.removeChild(this.styleEl_), t.players[this.id_] = null, this.tag && this.tag.player && (this.tag.player = null), this.el_ && this.el_.player && (this.el_.player = null), this.tech_ && this.tech_.dispose(), e.prototype.dispose.call(this)
                        }, t.prototype.createEl = function() {
                            var t = this.el_ = e.prototype.createEl.call(this, "div"),
                                n = this.tag;
                            n.removeAttribute("width"), n.removeAttribute("height");
                            var r = m.getElAttributes(n);
                            Object.getOwnPropertyNames(r).forEach(function(e) {
                                "class" === e ? t.className = r[e] : t.setAttribute(e, r[e])
                            }), n.playerId = n.id, n.id += "_html5_api", n.className = "vjs-tech", n.player = t.player = this, this.addClass("vjs-paused"), f["default"].VIDEOJS_NO_DYNAMIC_STYLE !== !0, this.width(this.options_.width), this.height(this.options_.height), this.fluid(this.options_.fluid), this.aspectRatio(this.options_.aspectRatio);
                            for (var o = n.getElementsByTagName("a"), i = 0; i < o.length; i++) {
                                var s = o.item(i);
                                m.addElClass(s, "vjs-hidden"), s.setAttribute("hidden", "hidden")
                            }
                            return n.initNetworkState_ = n.networkState, n.parentNode && n.parentNode.insertBefore(t, n), m.insertElFirst(n, t), this.children_.unshift(n), this.el_ = t, t
                        }, t.prototype.width = function(e) {
                            return this.dimension("width", e)
                        }, t.prototype.height = function(e) {
                            return this.dimension("height", e)
                        }, t.prototype.dimension = function(e, t) {
                            var n = e + "_";
                            if (void 0 === t) return this[n] || 0;
                            if ("" === t) this[n] = void 0;
                            else {
                                var r = parseFloat(t);
                                if (isNaN(r)) return x["default"].error('Improper value "' + t + '" supplied for for ' + e), this;
                                this[n] = r
                            }
                            return this.updateStyleEl_(), this
                        }, t.prototype.fluid = function(e) {
                            return void 0 === e ? !!this.fluid_ : (this.fluid_ = !!e, void(e ? this.addClass("vjs-fluid") : this.removeClass("vjs-fluid")))
                        }, t.prototype.aspectRatio = function(e) {
                            var t = e;
                            if (void 0 === e) return this.aspectRatio_;
                            var n = t.split("x");
                            if (n.length > 0 && (e = n[0] + ":" + n[1]), !/^\d+\:\d+$/.test(e)) throw new Error("Improper value supplied for aspect ratio. The format should be width:height, for example 16:9.");
                            this.aspectRatio_ = e, this.fluid(!0), this.updateStyleEl_()
                        }, t.prototype.updateStyleEl_ = function() {
                            if (f["default"].VIDEOJS_NO_DYNAMIC_STYLE === !0) {
                                var e = "number" == typeof this.width_ ? this.width_ : this.options_.width,
                                    t = "number" == typeof this.height_ ? this.height_ : this.options_.height,
                                    n = this.tech_ && this.tech_.el();
                                return void(n && (e >= 0 && (n.width = e), t >= 0 && (n.height = t)))
                            }
                            var r = void 0,
                                o = void 0,
                                i = void 0,
                                s = void 0;
                            i = void 0 !== this.aspectRatio_ && "auto" !== this.aspectRatio_ ? this.aspectRatio_ : this.videoWidth() ? this.videoWidth() + ":" + this.videoHeight() : "16:9";
                            var a = i.split(":"),
                                l = a[1] / a[0];
                            r = void 0 !== this.width_ ? this.width_ : void 0 !== this.height_ ? this.height_ / l : this.videoWidth() || 300, o = void 0 !== this.height_ ? this.height_ : r * l, s = /^[^a-zA-Z]/.test(this.id()) ? "dimensions-" + this.id() : this.id() + "-dimensions"
                        }, t.prototype.loadTech_ = function(e, t) {
                            var n = this;
                            this.tech_ && this.unloadTech_(), "Html5" !== e && this.tag && ($["default"].getTech("Html5").disposeMediaElement(this.tag), this.tag.player = null, this.tag = null), this.techName_ = e, this.isReady_ = !1;
                            var r = (0, D["default"])({
                                source: t,
                                nativeControlsForTouch: this.options_.nativeControlsForTouch,
                                playerId: this.id(),
                                techId: this.id() + "_" + e + "_api",
                                videoTracks: this.videoTracks_,
                                textTracks: this.textTracks_,
                                audioTracks: this.audioTracks_,
                                autoplay: this.options_.autoplay,
                                preload: this.options_.preload,
                                loop: this.options_.loop,
                                muted: this.options_.muted,
                                poster: this.poster(),
                                language: this.language(),
                                "vtt.js": this.options_["vtt.js"]
                            }, this.options_[e.toLowerCase()]);
                            this.tag && (r.tag = this.tag), t && (this.currentType_ = t.type, t.src === this.cache_.src && this.cache_.currentTime > 0 && (r.startTime = this.cache_.currentTime), this.cache_.src = t.src);
                            var o = $["default"].getTech(e);
                            o || (o = u["default"].getComponent(e)), this.tech_ = new o(r), this.tech_.ready(b.bind(this, this.handleTechReady_), !0), V["default"].jsonToTextTracks(this.textTracksJson_ || [], this.tech_), K.forEach(function(e) {
                                n.on(n.tech_, e, n["handleTech" + (0, P["default"])(e) + "_"])
                            }), this.on(this.tech_, "loadstart", this.handleTechLoadStart_), this.on(this.tech_, "waiting", this.handleTechWaiting_), this.on(this.tech_, "canplay", this.handleTechCanPlay_), this.on(this.tech_, "canplaythrough", this.handleTechCanPlayThrough_), this.on(this.tech_, "playing", this.handleTechPlaying_), this.on(this.tech_, "ended", this.handleTechEnded_), this.on(this.tech_, "seeking", this.handleTechSeeking_), this.on(this.tech_, "seeked", this.handleTechSeeked_), this.on(this.tech_, "play", this.handleTechPlay_), this.on(this.tech_, "firstplay", this.handleTechFirstPlay_), this.on(this.tech_, "pause", this.handleTechPause_), this.on(this.tech_, "durationchange", this.handleTechDurationChange_), this.on(this.tech_, "fullscreenchange", this.handleTechFullscreenChange_), this.on(this.tech_, "error", this.handleTechError_), this.on(this.tech_, "loadedmetadata", this.updateStyleEl_), this.on(this.tech_, "posterchange", this.handleTechPosterChange_), this.on(this.tech_, "textdata", this.handleTechTextData_), this.usingNativeControls(this.techGet_("controls")), this.controls() && !this.usingNativeControls() && this.addTechControlsListeners_(), this.tech_.el().parentNode === this.el() || "Html5" === e && this.tag || m.insertElFirst(this.tech_.el(), this.el()), this.tag && (this.tag.player = null, this.tag = null)
                        }, t.prototype.unloadTech_ = function() {
                            this.videoTracks_ = this.videoTracks(), this.textTracks_ = this.textTracks(), this.audioTracks_ = this.audioTracks(), this.textTracksJson_ = V["default"].textTracksToJson(this.tech_), this.isReady_ = !1, this.tech_.dispose(), this.tech_ = !1
                        }, t.prototype.tech = function(e) {
                            if (e && e.IWillNotUseThisInPlugins) return this.tech_;
                            var t = "\n      Please make sure that you are not using this inside of a plugin.\n      To disable this alert and error, please pass in an object with\n      `IWillNotUseThisInPlugins` to the `tech` method. See\n      https://github.com/videojs/video.js/issues/2617 for more info.\n    ";
                            throw f["default"].alert(t), new Error(t)
                        }, t.prototype.addTechControlsListeners_ = function() {
                            this.removeTechControlsListeners_(), this.on(this.tech_, "mousedown", this.handleTechClick_), this.on(this.tech_, "touchstart", this.handleTechTouchStart_), this.on(this.tech_, "touchmove", this.handleTechTouchMove_), this.on(this.tech_, "touchend", this.handleTechTouchEnd_), this.on(this.tech_, "tap", this.handleTechTap_)
                        }, t.prototype.removeTechControlsListeners_ = function() {
                            this.off(this.tech_, "tap", this.handleTechTap_), this.off(this.tech_, "touchstart", this.handleTechTouchStart_), this.off(this.tech_, "touchmove", this.handleTechTouchMove_), this.off(this.tech_, "touchend", this.handleTechTouchEnd_), this.off(this.tech_, "mousedown", this.handleTechClick_)
                        }, t.prototype.handleTechReady_ = function() {
                            if (this.triggerReady(), this.cache_.volume && this.techCall_("setVolume", this.cache_.volume), this.handleTechPosterChange_(), this.handleTechDurationChange_(), (this.src() || this.currentSrc()) && this.tag && this.options_.autoplay && this.paused()) {
                                try {
                                    delete this.tag.poster
                                } catch (e) {
                                    (0, x["default"])("deleting tag.poster throws in some browsers", e)
                                }
                                this.play()
                            }
                        }, t.prototype.handleTechLoadStart_ = function() {
                            this.removeClass("vjs-ended"), this.error(null), this.paused() ? (this.hasStarted(!1), this.trigger("loadstart")) : (this.trigger("loadstart"), this.trigger("firstplay"))
                        }, t.prototype.hasStarted = function(e) {
                            return void 0 !== e ? (this.hasStarted_ !== e && (this.hasStarted_ = e, e ? (this.addClass("vjs-has-started"), this.trigger("firstplay")) : this.removeClass("vjs-has-started")), this) : !!this.hasStarted_
                        }, t.prototype.handleTechPlay_ = function() {
                            this.removeClass("vjs-ended"), this.removeClass("vjs-paused"), this.addClass("vjs-playing"), this.hasStarted(!0), this.trigger("play")
                        }, t.prototype.handleTechWaiting_ = function() {
                            var e = this;
                            this.addClass("vjs-waiting"), this.trigger("waiting"), this.one("timeupdate", function() {
                                return e.removeClass("vjs-waiting")
                            })
                        }, t.prototype.handleTechCanPlay_ = function() {
                            this.removeClass("vjs-waiting"), this.trigger("canplay")
                        }, t.prototype.handleTechCanPlayThrough_ = function() {
                            this.removeClass("vjs-waiting"), this.trigger("canplaythrough")
                        }, t.prototype.handleTechPlaying_ = function() {
                            this.removeClass("vjs-waiting"), this.trigger("playing")
                        }, t.prototype.handleTechSeeking_ = function() {
                            this.addClass("vjs-seeking"), this.trigger("seeking")
                        }, t.prototype.handleTechSeeked_ = function() {
                            this.removeClass("vjs-seeking"), this.trigger("seeked")
                        }, t.prototype.handleTechFirstPlay_ = function() {
                            this.options_.starttime && this.currentTime(this.options_.starttime), this.addClass("vjs-has-started"), this.trigger("firstplay")
                        }, t.prototype.handleTechPause_ = function() {
                            this.removeClass("vjs-playing"), this.addClass("vjs-paused"), this.trigger("pause")
                        }, t.prototype.handleTechEnded_ = function() {
                            this.addClass("vjs-ended"), this.options_.loop ? (this.currentTime(0), this.play()) : this.paused() || this.pause(), this.trigger("ended")
                        }, t.prototype.handleTechDurationChange_ = function() {
                            this.duration(this.techGet_("duration"))
                        }, t.prototype.handleTechClick_ = function(e) {
                            0 === e.button && this.controls() && (this.paused() ? this.play() : this.pause())
                        }, t.prototype.handleTechTap_ = function() {
                            this.userActive(!this.userActive())
                        }, t.prototype.handleTechTouchStart_ = function() {
                            this.userWasActive = this.userActive()
                        }, t.prototype.handleTechTouchMove_ = function() {
                            this.userWasActive && this.reportUserActivity()
                        }, t.prototype.handleTechTouchEnd_ = function(e) {
                            e.preventDefault()
                        }, t.prototype.handleFullscreenChange_ = function() {
                            this.isFullscreen() ? this.addClass("vjs-fullscreen") : this.removeClass("vjs-fullscreen")
                        }, t.prototype.handleStageClick_ = function() {
                            this.reportUserActivity()
                        }, t.prototype.handleTechFullscreenChange_ = function(e, t) {
                            t && this.isFullscreen(t.isFullscreen), this.trigger("fullscreenchange")
                        }, t.prototype.handleTechError_ = function() {
                            var e = this.tech_.error();
                            this.error(e)
                        }, t.prototype.handleTechTextData_ = function() {
                            var e = null;
                            arguments.length > 1 && (e = arguments[1]), this.trigger("textdata", e)
                        }, t.prototype.getCache = function() {
                            return this.cache_
                        }, t.prototype.techCall_ = function(e, t) {
                            if (this.tech_ && !this.tech_.isReady_) this.tech_.ready(function() {
                                this[e](t)
                            }, !0);
                            else try {
                                this.tech_ && this.tech_[e](t)
                            } catch (n) {
                                throw (0, x["default"])(n), n
                            }
                        }, t.prototype.techGet_ = function(e) {
                            if (this.tech_ && this.tech_.isReady_) try {
                                return this.tech_[e]()
                            } catch (t) {
                                throw void 0 === this.tech_[e] ? (0, x["default"])("Video.js: " + e + " method not defined for " + this.techName_ + " playback technology.", t) : "TypeError" === t.name ? ((0, x["default"])("Video.js: " + e + " unavailable on " + this.techName_ + " playback technology element.", t), this.tech_.isReady_ = !1) : (0, x["default"])(t), t
                            }
                        }, t.prototype.play = function() {
                            return this.src() || this.currentSrc() ? this.techCall_("play") : this.tech_.one("loadstart", function() {
                                this.play()
                            }), this
                        }, t.prototype.pause = function() {
                            return this.techCall_("pause"), this
                        }, t.prototype.paused = function() {
                            return this.techGet_("paused") === !1 ? !1 : !0
                        }, t.prototype.scrubbing = function(e) {
                            return void 0 !== e ? (this.scrubbing_ = !!e, e ? this.addClass("vjs-scrubbing") : this.removeClass("vjs-scrubbing"), this) : this.scrubbing_
                        }, t.prototype.currentTime = function(e) {
                            return void 0 !== e ? (this.techCall_("setCurrentTime", e), this) : (this.cache_.currentTime = this.techGet_("currentTime") || 0, this.cache_.currentTime)
                        }, t.prototype.duration = function(e) {
                            return void 0 === e ? this.cache_.duration || 0 : (e = parseFloat(e) || 0, 0 > e && (e = 1 / 0), e !== this.cache_.duration && (this.cache_.duration = e, e === 1 / 0 ? this.addClass("vjs-live") : this.removeClass("vjs-live"), this.trigger("durationchange")), this)
                        }, t.prototype.remainingTime = function() {
                            return this.duration() - this.currentTime()
                        }, t.prototype.buffered = function n() {
                            var n = this.techGet_("buffered");
                            return n && n.length || (n = (0, S.createTimeRange)(0, 0)), n
                        }, t.prototype.bufferedPercent = function() {
                            return (0, j.bufferedPercent)(this.buffered(), this.duration())
                        }, t.prototype.bufferedEnd = function() {
                            var e = this.buffered(),
                                t = this.duration(),
                                n = e.end(e.length - 1);
                            return n > t && (n = t), n
                        }, t.prototype.volume = function(e) {
                            var t = void 0;
                            return void 0 !== e ? (t = Math.max(0, Math.min(1, parseFloat(e))), this.cache_.volume = t, this.techCall_("setVolume", t), this) : (t = parseFloat(this.techGet_("volume")), isNaN(t) ? 1 : t)
                        }, t.prototype.muted = function(e) {
                            return void 0 !== e ? (this.techCall_("setMuted", e), this) : this.techGet_("muted") || !1
                        }, t.prototype.supportsFullScreen = function() {
                            return this.techGet_("supportsFullScreen") || !1
                        }, t.prototype.isFullscreen = function(e) {
                            return void 0 !== e ? (this.isFullscreen_ = !!e, this) : !!this.isFullscreen_
                        }, t.prototype.requestFullscreen = function() {
                            var e = R["default"];
                            return this.isFullscreen(!0), e.requestFullscreen ? (y.on(p["default"], e.fullscreenchange, b.bind(this, function t(n) {
                                this.isFullscreen(p["default"][e.fullscreenElement]), this.isFullscreen() === !1 && y.off(p["default"], e.fullscreenchange, t), this.trigger("fullscreenchange")
                            })), this.el_[e.requestFullscreen]()) : this.tech_.supportsFullScreen() ? this.techCall_("enterFullScreen") : (this.enterFullWindow(), this.trigger("fullscreenchange")), this
                        }, t.prototype.exitFullscreen = function() {
                            var e = R["default"];
                            return this.isFullscreen(!1), e.requestFullscreen ? p["default"][e.exitFullscreen]() : this.tech_.supportsFullScreen() ? this.techCall_("exitFullScreen") : (this.exitFullWindow(), this.trigger("fullscreenchange")), this
                        }, t.prototype.enterFullWindow = function() {
                            this.isFullWindow = !0, this.docOrigOverflow = p["default"].documentElement.style.overflow, y.on(p["default"], "keydown", b.bind(this, this.fullWindowOnEscKey)), p["default"].documentElement.style.overflow = "hidden", m.addElClass(p["default"].body, "vjs-full-window"), this.trigger("enterFullWindow")
                        }, t.prototype.fullWindowOnEscKey = function(e) {
                            27 === e.keyCode && (this.isFullscreen() === !0 ? this.exitFullscreen() : this.exitFullWindow())
                        }, t.prototype.exitFullWindow = function() {
                            this.isFullWindow = !1, y.off(p["default"], "keydown", this.fullWindowOnEscKey), p["default"].documentElement.style.overflow = this.docOrigOverflow, m.removeElClass(p["default"].body, "vjs-full-window"), this.trigger("exitFullWindow")
                        }, t.prototype.canPlayType = function(e) {
                            for (var t = void 0, n = 0, r = this.options_.techOrder; n < r.length; n++) {
                                var o = (0, P["default"])(r[n]),
                                    i = $["default"].getTech(o);
                                if (i || (i = u["default"].getComponent(o)), i) {
                                    if (i.isSupported() && (t = i.canPlayType(e))) return t
                                } else x["default"].error('The "' + o + '" tech is undefined. Skipped browser support check for that tech.')
                            }
                            return ""
                        }, t.prototype.selectSource = function(e) {
                            var t = this,
                                n = this.options_.techOrder.map(P["default"]).map(function(e) {
                                    return [e, $["default"].getTech(e) || u["default"].getComponent(e)]
                                }).filter(function(e) {
                                    var t = e[0],
                                        n = e[1];
                                    return n ? n.isSupported() : (x["default"].error('The "' + t + '" tech is undefined. Skipped browser support check for that tech.'), !1)
                                }),
                                r = function(e, t, n) {
                                    var r = void 0;
                                    return e.some(function(e) {
                                        return t.some(function(t) {
                                            return r = n(e, t), r ? !0 : void 0
                                        })
                                    }), r
                                },
                                o = void 0,
                                i = function(e) {
                                    return function(t, n) {
                                        return e(n, t)
                                    }
                                },
                                s = function(e, n) {
                                    var r = e[0],
                                        o = e[1];
                                    return o.canPlaySource(n, t.options_[r.toLowerCase()]) ? {
                                        source: n,
                                        tech: r
                                    } : void 0
                                };
                            return o = this.options_.sourceOrder ? r(e, n, i(s)) : r(n, e, s), o || !1
                        }, t.prototype.src = function(e) {
                            if (void 0 === e) return this.techGet_("src");
                            var t = $["default"].getTech(this.techName_);
                            return t || (t = u["default"].getComponent(this.techName_)), Array.isArray(e) ? this.sourceList_(e) : "string" == typeof e ? this.src({
                                src: e
                            }) : e instanceof Object && (e.type && !t.canPlaySource(e, this.options_[this.techName_.toLowerCase()]) ? this.sourceList_([e]) : (this.cache_.src = e.src, this.currentType_ = e.type || "", this.ready(function() {
                                t.prototype.hasOwnProperty("setSource") ? this.techCall_("setSource", e) : this.techCall_("src", e.src), "auto" === this.options_.preload && this.load(), this.options_.autoplay && this.play()
                            }, !0))), this
                        }, t.prototype.sourceList_ = function(e) {
                            var t = this.selectSource(e);
                            t ? t.tech === this.techName_ ? this.src(t.source) : this.loadTech_(t.tech, t.source) : (this.setTimeout(function() {
                                this.error({
                                    code: 4,
                                    message: this.localize(this.options_.notSupportedMessage)
                                })
                            }, 0), this.triggerReady())
                        }, t.prototype.load = function() {
                            return this.techCall_("load"), this
                        }, t.prototype.reset = function() {
                            return this.loadTech_((0, P["default"])(this.options_.techOrder[0]), null), this.techCall_("reset"), this
                        }, t.prototype.currentSrc = function() {
                            return this.techGet_("currentSrc") || this.cache_.src || ""
                        }, t.prototype.currentType = function() {
                            return this.currentType_ || ""
                        }, t.prototype.preload = function(e) {
                            return void 0 !== e ? (this.techCall_("setPreload", e), this.options_.preload = e, this) : this.techGet_("preload")
                        }, t.prototype.autoplay = function(e) {
                            return void 0 !== e ? (this.techCall_("setAutoplay", e), this.options_.autoplay = e, this) : this.techGet_("autoplay", e)
                        }, t.prototype.loop = function(e) {
                            return void 0 !== e ? (this.techCall_("setLoop", e), this.options_.loop = e, this) : this.techGet_("loop")
                        }, t.prototype.poster = function(e) {
                            return void 0 === e ? this.poster_ : (e || (e = ""), this.poster_ = e, this.techCall_("setPoster", e), this.trigger("posterchange"), this)
                        }, t.prototype.handleTechPosterChange_ = function() {
                            !this.poster_ && this.tech_ && this.tech_.poster && (this.poster_ = this.tech_.poster() || "", this.trigger("posterchange"))
                        }, t.prototype.controls = function(e) {
                            return void 0 !== e ? (e = !!e, this.controls_ !== e && (this.controls_ = e, this.usingNativeControls() && this.techCall_("setControls", e), e ? (this.removeClass("vjs-controls-disabled"), this.addClass("vjs-controls-enabled"), this.trigger("controlsenabled"), this.usingNativeControls() || this.addTechControlsListeners_()) : (this.removeClass("vjs-controls-enabled"), this.addClass("vjs-controls-disabled"), this.trigger("controlsdisabled"), this.usingNativeControls() || this.removeTechControlsListeners_())), this) : !!this.controls_
                        }, t.prototype.usingNativeControls = function(e) {
                            return void 0 !== e ? (e = !!e, this.usingNativeControls_ !== e && (this.usingNativeControls_ = e, e ? (this.addClass("vjs-using-native-controls"), this.trigger("usingnativecontrols")) : (this.removeClass("vjs-using-native-controls"), this.trigger("usingcustomcontrols"))), this) : !!this.usingNativeControls_
                        }, t.prototype.error = function(e) {
                            return void 0 === e ? this.error_ || null : null === e ? (this.error_ = e, this.removeClass("vjs-error"), this.errorDisplay && this.errorDisplay.close(), this) : (this.error_ = new A["default"](e), this.addClass("vjs-error"), x["default"].error("(CODE:" + this.error_.code + " " + A["default"].errorTypes[this.error_.code] + ")", this.error_.message, this.error_), this.trigger("error"), this)
                        }, t.prototype.reportUserActivity = function(e) {
                            this.userActivity_ = !0
                        }, t.prototype.userActive = function(e) {
                            return void 0 !== e ? (e = !!e, e !== this.userActive_ && (this.userActive_ = e, e ? (this.userActivity_ = !0, this.removeClass("vjs-user-inactive"), this.addClass("vjs-user-active"), this.trigger("useractive")) : (this.userActivity_ = !1, this.tech_ && this.tech_.one("mousemove", function(e) {
                                e.stopPropagation(), e.preventDefault()
                            }), this.removeClass("vjs-user-active"), this.addClass("vjs-user-inactive"), this.trigger("userinactive"))), this) : this.userActive_
                        }, t.prototype.listenForUserActivity_ = function() {
                            var e = void 0,
                                t = void 0,
                                n = void 0,
                                r = b.bind(this, this.reportUserActivity),
                                o = function(e) {
                                    (e.screenX !== t || e.screenY !== n) && (t = e.screenX, n = e.screenY, r())
                                },
                                i = function() {
                                    r(), this.clearInterval(e), e = this.setInterval(r, 250)
                                },
                                s = function(t) {
                                    r(), this.clearInterval(e)
                                };
                            this.on("mousedown", i), this.on("mousemove", o), this.on("mouseup", s), this.on("keydown", r), this.on("keyup", r);
                            var a = void 0;
                            this.setInterval(function() {
                                if (this.userActivity_) {
                                    this.userActivity_ = !1, this.userActive(!0), this.clearTimeout(a);
                                    var e = this.options_.inactivityTimeout;
                                    e > 0 && (a = this.setTimeout(function() {
                                        this.userActivity_ || this.userActive(!1)
                                    }, e))
                                }
                            }, 250)
                        }, t.prototype.playbackRate = function(e) {
                            return void 0 !== e ? (this.techCall_("setPlaybackRate", e), this) : this.tech_ && this.tech_.featuresPlaybackRate ? this.techGet_("playbackRate") : 1
                        }, t.prototype.isAudio = function(e) {
                            return void 0 !== e ? (this.isAudio_ = !!e, this) : !!this.isAudio_
                        }, t.prototype.videoTracks = function() {
                            return this.tech_ ? this.tech_.videoTracks() : (this.videoTracks_ = this.videoTracks_ || new Z["default"], this.videoTracks_)
                        }, t.prototype.audioTracks = function() {
                            return this.tech_ ? this.tech_.audioTracks() : (this.audioTracks_ = this.audioTracks_ || new G["default"], this.audioTracks_)
                        }, t.prototype.textTracks = function() {
                            return this.tech_ ? this.tech_.textTracks() : void 0
                        }, t.prototype.remoteTextTracks = function() {
                            return this.tech_ ? this.tech_.remoteTextTracks() : void 0
                        }, t.prototype.remoteTextTrackEls = function() {
                            return this.tech_ ? this.tech_.remoteTextTrackEls() : void 0
                        }, t.prototype.addTextTrack = function(e, t, n) {
                            return this.tech_ ? this.tech_.addTextTrack(e, t, n) : void 0
                        }, t.prototype.addRemoteTextTrack = function(e) {
                            return this.tech_ ? this.tech_.addRemoteTextTrack(e) : void 0
                        }, t.prototype.removeRemoteTextTrack = function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.track,
                                n = void 0 === t ? arguments[0] : t;
                            return this.tech_ ? this.tech_.removeRemoteTextTrack(n) : void 0
                        }, t.prototype.videoWidth = function() {
                            return this.tech_ && this.tech_.videoWidth && this.tech_.videoWidth() || 0
                        }, t.prototype.videoHeight = function() {
                            return this.tech_ && this.tech_.videoHeight && this.tech_.videoHeight() || 0
                        }, t.prototype.language = function(e) {
                            return void 0 === e ? this.language_ : (this.language_ = String(e).toLowerCase(), this)
                        }, t.prototype.languages = function() {
                            return (0, U["default"])(t.prototype.options_.languages, this.languages_)
                        }, t.prototype.toJSON = function() {
                            var e = (0, U["default"])(this.options_),
                                t = e.tracks;
                            e.tracks = [];
                            for (var n = 0; n < t.length; n++) {
                                var r = t[n];
                                r = (0, U["default"])(r), r.player = void 0, e.tracks[n] = r
                            }
                            return e
                        }, t.prototype.createModal = function(e, t) {
                            var n = this;
                            t = t || {}, t.content = e || "";
                            var r = new W["default"](this, t);
                            return this.addChild(r), r.on("dispose", function() {
                                n.removeChild(r)
                            }), r.open()
                        }, t.getTagSettings = function(e) {
                            var t = {
                                    sources: [],
                                    tracks: []
                                },
                                n = m.getElAttributes(e),
                                r = n["data-setup"];
                            if (null !== r) {
                                var o = (0, N["default"])(r || "{}"),
                                    i = o[0],
                                    s = o[1];
                                i && x["default"].error(i), (0, D["default"])(n, s)
                            }
                            if ((0, D["default"])(t, n), e.hasChildNodes())
                                for (var a = e.childNodes, l = 0, u = a.length; u > l; l++) {
                                    var c = a[l],
                                        p = c.nodeName.toLowerCase();
                                    "source" === p ? t.sources.push(m.getElAttributes(c)) : "track" === p && t.tracks.push(m.getElAttributes(c))
                                }
                            return t
                        }, t.prototype.flexNotSupported_ = function() {
                            var e = p["default"].createElement("i");
                            return !("flexBasis" in e.style || "webkitFlexBasis" in e.style || "mozFlexBasis" in e.style || "msFlexBasis" in e.style || "msFlexOrder" in e.style)
                        }, t
                    }(u["default"]);
                J.players = {};
                var Q = f["default"].navigator;
                J.prototype.options_ = {
                    techOrder: ["html5", "flash"],
                    html5: {},
                    flash: {},
                    defaultVolume: 0,
                    inactivityTimeout: 2e3,
                    playbackRates: [],
                    children: ["mediaLoader", "posterImage", "textTrackDisplay", "loadingSpinner", "bigPlayButton", "controlBar", "errorDisplay", "textTrackSettings"],
                    language: Q && (Q.languages && Q.languages[0] || Q.userLanguage || Q.language) || "en",
                    languages: {},
                    notSupportedMessage: "No compatible source was found for this media."
                }, ["ended", "seeking", "seekable", "networkState", "readyState"].forEach(function(e) {
                    J.prototype[e] = function() {
                        return this.techGet_(e)
                    }
                }), K.forEach(function(e) {
                    J.prototype["handleTech" + (0, P["default"])(e) + "_"] = function() {
                        return this.trigger(e)
                    }
                }), u["default"].registerComponent("Player", J), n["default"] = J
            }, {
                1: 1,
                136: 136,
                145: 145,
                4: 4,
                41: 41,
                44: 44,
                45: 45,
                46: 46,
                5: 5,
                50: 50,
                55: 55,
                59: 59,
                60: 60,
                61: 61,
                62: 62,
                63: 63,
                68: 68,
                69: 69,
                71: 71,
                76: 76,
                78: 78,
                79: 79,
                8: 8,
                80: 80,
                81: 81,
                82: 82,
                84: 84,
                85: 85,
                86: 86,
                87: 87,
                88: 88,
                89: 89,
                92: 92,
                93: 93
            }],
            52: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0;
                var o = e(51),
                    i = r(o),
                    s = function(e, t) {
                        i["default"].prototype[e] = t
                    };
                n["default"] = s
            }, {
                51: 51
            }],
            53: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(3),
                    l = r(a),
                    u = e(5),
                    c = r(u),
                    p = function(e) {
                        function t(n) {
                            var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                            o(this, t);
                            var s = i(this, e.call(this, n, r));
                            return s.update(), s
                        }
                        return s(t, e), t.prototype.update = function() {
                            var e = this.createPopup();
                            this.popup && this.removeChild(this.popup), this.popup = e, this.addChild(e), this.items && 0 === this.items.length ? this.hide() : this.items && this.items.length > 1 && this.show()
                        }, t.prototype.createPopup = function() {}, t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: this.buildCSSClass()
                            })
                        }, t.prototype.buildCSSClass = function() {
                            var t = "vjs-menu-button";
                            return t += this.options_.inline === !0 ? "-inline" : "-popup", "vjs-menu-button " + t + " " + e.prototype.buildCSSClass.call(this)
                        }, t
                    }(l["default"]);
                c["default"].registerComponent("PopupButton", p), n["default"] = p
            }, {
                3: 3,
                5: 5
            }],
            54: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(82),
                    f = r(d),
                    h = e(81),
                    y = r(h),
                    v = function(e) {
                        function t() {
                            return i(this, t), s(this, e.apply(this, arguments))
                        }
                        return a(t, e), t.prototype.addItem = function(e) {
                            this.addChild(e), e.on("click", f.bind(this, function() {
                                this.unlockShowing()
                            }))
                        }, t.prototype.createEl = function() {
                            var t = this.options_.contentElType || "ul";
                            this.contentEl_ = p.createEl(t, {
                                className: "vjs-menu-content"
                            });
                            var n = e.prototype.createEl.call(this, "div", {
                                append: this.contentEl_,
                                className: "vjs-menu"
                            });
                            return n.appendChild(this.contentEl_), y.on(n, "click", function(e) {
                                e.preventDefault(), e.stopImmediatePropagation()
                            }), n
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("Popup", v), n["default"] = v
            }, {
                5: 5,
                80: 80,
                81: 81,
                82: 82
            }],
            55: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(3),
                    u = o(l),
                    c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = e(80),
                    y = r(h),
                    v = e(78),
                    m = r(v),
                    g = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.update(), n.on("posterchange", f.bind(o, o.update)), o
                        }
                        return a(t, e), t.prototype.dispose = function() {
                            this.player().off("posterchange", this.update), e.prototype.dispose.call(this)
                        }, t.prototype.createEl = function() {
                            var e = y.createEl("div", {
                                className: "vjs-poster",
                                tabIndex: -1
                            });
                            return m.BACKGROUND_SIZE_SUPPORTED || (this.fallbackImg_ = y.createEl("img"), e.appendChild(this.fallbackImg_)), e
                        }, t.prototype.update = function() {
                            var e = this.player().poster();
                            this.setSrc(e), e ? this.show() : this.hide()
                        }, t.prototype.setSrc = function(e) {
                            if (this.fallbackImg_) this.fallbackImg_.src = e;
                            else {
                                var t = "";
                                e && (t = 'url("' + e + '")'), this.el_.style.backgroundImage = t
                            }
                        }, t.prototype.handleClick = function() {
                            this.player_.paused() ? this.player_.play() : this.player_.pause()
                        }, t
                    }(u["default"]);
                p["default"].registerComponent("PosterImage", g), n["default"] = g
            }, {
                3: 3,
                5: 5,
                78: 78,
                80: 80,
                82: 82
            }],
            56: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    t && (f = t), setTimeout(h, e)
                }
                n.__esModule = !0, n.hasLoaded = n.autoSetupTimeout = n.autoSetup = void 0;
                var s = e(81),
                    a = o(s),
                    l = e(92),
                    u = r(l),
                    c = e(93),
                    p = r(c),
                    d = !1,
                    f = void 0,
                    h = function() {
                        var e = u["default"].getElementsByTagName("video"),
                            t = u["default"].getElementsByTagName("audio"),
                            n = [];
                        if (e && e.length > 0)
                            for (var r = 0, o = e.length; o > r; r++) n.push(e[r]);
                        if (t && t.length > 0)
                            for (var s = 0, a = t.length; a > s; s++) n.push(t[s]);
                        if (n && n.length > 0)
                            for (var l = 0, c = n.length; c > l; l++) {
                                var p = n[l];
                                if (!p || !p.getAttribute) {
                                    i(1);
                                    break
                                }
                                if (void 0 === p.player) {
                                    var h = p.getAttribute("data-setup");
                                    null !== h && f(p)
                                }
                            } else d || i(1)
                    };
                "complete" === u["default"].readyState ? d = !0 : a.one(p["default"], "load", function() {
                    d = !0
                });
                var y = function() {
                    return d
                };
                n.autoSetup = h, n.autoSetupTimeout = i, n.hasLoaded = y
            }, {
                81: 81,
                92: 92,
                93: 93
            }],
            57: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(5),
                    u = o(l),
                    c = e(80),
                    p = r(c),
                    d = e(136),
                    f = o(d),
                    h = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.bar = o.getChild(o.options_.barName), o.vertical(!!o.options_.vertical), o.on("mousedown", o.handleMouseDown), o.on("touchstart", o.handleMouseDown), o.on("focus", o.handleFocus), o.on("blur", o.handleBlur), o.on("click", o.handleClick), o.on(n, "controlsvisible", o.update), o.on(n, o.playerEvent, o.update), o
                        }
                        return a(t, e), t.prototype.createEl = function(t) {
                            var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                r = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                            return n.className = n.className + " vjs-slider", n = (0, f["default"])({
                                tabIndex: 0
                            }, n), r = (0, f["default"])({
                                role: "slider",
                                "aria-valuenow": 0,
                                "aria-valuemin": 0,
                                "aria-valuemax": 100,
                                tabIndex: 0
                            }, r), e.prototype.createEl.call(this, t, n, r)
                        }, t.prototype.handleMouseDown = function(e) {
                            var t = this.bar.el_.ownerDocument;
                            e.preventDefault(), p.blockTextSelection(), this.addClass("vjs-sliding"), this.trigger("slideractive"), this.on(t, "mousemove", this.handleMouseMove), this.on(t, "mouseup", this.handleMouseUp), this.on(t, "touchmove", this.handleMouseMove), this.on(t, "touchend", this.handleMouseUp), this.handleMouseMove(e)
                        }, t.prototype.handleMouseMove = function() {}, t.prototype.handleMouseUp = function() {
                            var e = this.bar.el_.ownerDocument;
                            p.unblockTextSelection(), this.removeClass("vjs-sliding"), this.trigger("sliderinactive"), this.off(e, "mousemove", this.handleMouseMove), this.off(e, "mouseup", this.handleMouseUp), this.off(e, "touchmove", this.handleMouseMove), this.off(e, "touchend", this.handleMouseUp), this.update()
                        }, t.prototype.update = function() {
                            if (this.el_) {
                                var e = this.getPercent(),
                                    t = this.bar;
                                if (t) {
                                    ("number" != typeof e || e !== e || 0 > e || e === 1 / 0) && (e = 0);
                                    var n = (100 * e).toFixed(2) + "%";
                                    this.vertical() ? t.el().style.height = n : t.el().style.width = n
                                }
                            }
                        }, t.prototype.calculateDistance = function(e) {
                            var t = p.getPointerPosition(this.el_, e);
                            return this.vertical() ? t.y : t.x
                        }, t.prototype.handleFocus = function() {
                            this.on(this.bar.el_.ownerDocument, "keydown", this.handleKeyPress)
                        }, t.prototype.handleKeyPress = function(e) {
                            37 === e.which || 40 === e.which ? (e.preventDefault(), this.stepBack()) : (38 === e.which || 39 === e.which) && (e.preventDefault(), this.stepForward())
                        }, t.prototype.handleBlur = function() {
                            this.off(this.bar.el_.ownerDocument, "keydown", this.handleKeyPress)
                        }, t.prototype.handleClick = function(e) {
                            e.stopImmediatePropagation(), e.preventDefault()
                        }, t.prototype.vertical = function(e) {
                            return void 0 === e ? this.vertical_ || !1 : (this.vertical_ = !!e, this.vertical_ ? this.addClass("vjs-slider-vertical") : this.addClass("vjs-slider-horizontal"), this)
                        }, t
                    }(u["default"]);
                u["default"].registerComponent("Slider", h), n["default"] = h
            }, {
                136: 136,
                5: 5,
                80: 80
            }],
            58: [function(e, t, n) {
                function r(e) {
                    return e.streamingFormats = {
                        "rtmp/mp4": "MP4",
                        "rtmp/flv": "FLV"
                    }, e.streamFromParts = function(e, t) {
                        return e + "&" + t
                    }, e.streamToParts = function(e) {
                        var t = {
                            connection: "",
                            stream: ""
                        };
                        if (!e) return t;
                        var n = e.search(/&(?!\w+=)/),
                            r = void 0;
                        return -1 !== n ? r = n + 1 : (n = r = e.lastIndexOf("/") + 1, 0 === n && (n = r = e.length)), t.connection = e.substring(0, n), t.stream = e.substring(r, e.length), t
                    }, e.isStreamingType = function(t) {
                        return t in e.streamingFormats
                    }, e.RTMP_RE = /^rtmp[set]?:\/\//i, e.isStreamingSrc = function(t) {
                        return e.RTMP_RE.test(t)
                    }, e.rtmpSourceHandler = {}, e.rtmpSourceHandler.canPlayType = function(t) {
                        return e.isStreamingType(t) ? "maybe" : ""
                    }, e.rtmpSourceHandler.canHandleSource = function(t, n) {
                        var r = e.rtmpSourceHandler.canPlayType(t.type);
                        return r ? r : e.isStreamingSrc(t.src) ? "maybe" : ""
                    }, e.rtmpSourceHandler.handleSource = function(t, n, r) {
                        var o = e.streamToParts(t.src);
                        n.setRtmpConnection(o.connection), n.setRtmpStream(o.stream)
                    }, e.registerSourceHandler(e.rtmpSourceHandler), e
                }
                n.__esModule = !0, n["default"] = r
            }, {}],
            59: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }

                function l(e) {
                    var t = e.charAt(0).toUpperCase() + e.slice(1);
                    P["set" + t] = function(t) {
                        return this.el_.vjs_setProperty(e, t)
                    }
                }

                function u(e) {
                    P[e] = function() {
                        return this.el_.vjs_getProperty(e)
                    }
                }
                n.__esModule = !0;
                for (var c = e(62), p = o(c), d = e(80), f = r(d), h = e(90), y = r(h), v = e(88), m = e(58), g = o(m), b = e(5), _ = o(b), w = e(93), C = o(w), T = e(136), E = o(T), x = C["default"].navigator, O = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return n.source && o.ready(function() {
                                this.setSource(n.source)
                            }, !0), n.startTime && o.ready(function() {
                                this.load(), this.play(), this.currentTime(n.startTime)
                            }, !0), C["default"].videojs = C["default"].videojs || {}, C["default"].videojs.Flash = C["default"].videojs.Flash || {}, C["default"].videojs.Flash.onReady = t.onReady, C["default"].videojs.Flash.onEvent = t.onEvent, C["default"].videojs.Flash.onError = t.onError, o.on("seeked", function() {
                                this.lastSeekTarget_ = void 0
                            }), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var e = this.options_;
                            if (!e.swf) {
                                var n = "5.1.0";
                                e.swf = "//vjs.zencdn.net/swf/" + n + "/video-js.swf"
                            }
                            var r = e.techId,
                                o = (0, E["default"])({
                                    readyFunction: "videojs.Flash.onReady",
                                    eventProxyFunction: "videojs.Flash.onEvent",
                                    errorEventProxyFunction: "videojs.Flash.onError",
                                    autoplay: e.autoplay,
                                    preload: e.preload,
                                    loop: e.loop,
                                    muted: e.muted
                                }, e.flashVars),
                                i = (0, E["default"])({
                                    wmode: "opaque",
                                    bgcolor: "#000000"
                                }, e.params),
                                s = (0, E["default"])({
                                    id: r,
                                    name: r,
                                    "class": "vjs-tech"
                                }, e.attributes);
                            return this.el_ = t.embed(e.swf, o, i, s), this.el_.tech = this, this.el_
                        }, t.prototype.play = function() {
                            this.ended() && this.setCurrentTime(0), this.el_.vjs_play()
                        }, t.prototype.pause = function() {
                            this.el_.vjs_pause()
                        }, t.prototype.src = function(e) {
                            return void 0 === e ? this.currentSrc() : this.setSrc(e)
                        }, t.prototype.setSrc = function(e) {
                            var t = this;
                            e = y.getAbsoluteURL(e), this.el_.vjs_src(e), this.autoplay() && this.setTimeout(function() {
                                return t.play()
                            }, 0)
                        }, t.prototype.seeking = function() {
                            return void 0 !== this.lastSeekTarget_
                        }, t.prototype.setCurrentTime = function(t) {
                            var n = this.seekable();
                            n.length && (t = t > n.start(0) ? t : n.start(0), t = t < n.end(n.length - 1) ? t : n.end(n.length - 1), this.lastSeekTarget_ = t, this.trigger("seeking"), this.el_.vjs_setProperty("currentTime", t), e.prototype.setCurrentTime.call(this))
                        }, t.prototype.currentTime = function(e) {
                            return this.seeking() ? this.lastSeekTarget_ || 0 : this.el_.vjs_getProperty("currentTime")
                        }, t.prototype.currentSrc = function() {
                            return this.currentSource_ ? this.currentSource_.src : this.el_.vjs_getProperty("currentSrc")
                        }, t.prototype.duration = function n() {
                            if (0 === this.readyState()) return NaN;
                            var n = this.el_.vjs_getProperty("duration");
                            return n >= 0 ? n : 1 / 0
                        }, t.prototype.load = function() {
                            this.el_.vjs_load()
                        }, t.prototype.poster = function() {
                            this.el_.vjs_getProperty("poster")
                        }, t.prototype.setPoster = function() {}, t.prototype.seekable = function() {
                            var e = this.duration();
                            return 0 === e ? (0, v.createTimeRange)() : (0, v.createTimeRange)(0, e)
                        }, t.prototype.buffered = function() {
                            var e = this.el_.vjs_getProperty("buffered");
                            return 0 === e.length ? (0, v.createTimeRange)() : (0, v.createTimeRange)(e[0][0], e[0][1])
                        }, t.prototype.supportsFullScreen = function() {
                            return !1
                        }, t.prototype.enterFullScreen = function() {
                            return !1
                        }, t
                    }(p["default"]), P = O.prototype, S = "rtmpConnection,rtmpStream,preload,defaultPlaybackRate,playbackRate,autoplay,loop,mediaGroup,controller,controls,volume,muted,defaultMuted".split(","), j = "networkState,readyState,initialTime,startOffsetTime,paused,ended,videoWidth,videoHeight".split(","), k = 0; k < S.length; k++) u(S[k]), l(S[k]);
                for (var I = 0; I < j.length; I++) u(j[I]);
                O.isSupported = function() {
                    return O.version()[0] >= 10
                }, p["default"].withSourceHandlers(O), O.nativeSourceHandler = {}, O.nativeSourceHandler.canPlayType = function(e) {
                    return e in O.formats ? "maybe" : ""
                }, O.nativeSourceHandler.canHandleSource = function(e, t) {
                    function n(e) {
                        var t = y.getFileExtension(e);
                        return t ? "video/" + t : ""
                    }
                    var r = void 0;
                    return r = e.type ? e.type.replace(/;.*/, "").toLowerCase() : n(e.src), O.nativeSourceHandler.canPlayType(r)
                }, O.nativeSourceHandler.handleSource = function(e, t, n) {
                    t.setSrc(e.src)
                }, O.nativeSourceHandler.dispose = function() {}, O.registerSourceHandler(O.nativeSourceHandler), O.formats = {
                    "video/flv": "FLV",
                    "video/x-flv": "FLV",
                    "video/mp4": "MP4",
                    "video/m4v": "MP4"
                }, O.onReady = function(e) {
                    var t = f.getEl(e),
                        n = t && t.tech;
                    n && n.el() && O.checkReady(n)
                }, O.checkReady = function(e) {
                    e.el() && (e.el().vjs_getProperty ? e.triggerReady() : this.setTimeout(function() {
                        O.checkReady(e)
                    }, 50))
                }, O.onEvent = function(e, t) {
                    var n = f.getEl(e).tech;
                    n.trigger(t, Array.prototype.slice.call(arguments, 2))
                }, O.onError = function(e, t) {
                    var n = f.getEl(e).tech;
                    return "srcnotfound" === t ? n.error(4) : void n.error("FLASH: " + t)
                }, O.version = function() {
                    var e = "0,0,0";
                    try {
                        e = new C["default"].ActiveXObject("ShockwaveFlash.ShockwaveFlash").GetVariable("$version").replace(/\D+/g, ",").match(/^,?(.+),?$/)[1]
                    } catch (t) {
                        try {
                            x.mimeTypes["application/x-shockwave-flash"].enabledPlugin && (e = (x.plugins["Shockwave Flash 2.0"] || x.plugins["Shockwave Flash"]).description.replace(/\D+/g, ",").match(/^,?(.+),?$/)[1])
                        } catch (n) {}
                    }
                    return e.split(",")
                }, O.embed = function(e, t, n, r) {
                    var o = O.getEmbedCode(e, t, n, r),
                        i = f.createEl("div", {
                            innerHTML: o
                        }).childNodes[0];
                    return i
                }, O.getEmbedCode = function(e, t, n, r) {
                    var o = '<object type="application/x-shockwave-flash" ',
                        i = "",
                        s = "",
                        a = "";
                    return t && Object.getOwnPropertyNames(t).forEach(function(e) {
                        i += e + "=" + t[e] + "&amp;"
                    }), n = (0, E["default"])({
                        movie: e,
                        flashvars: i,
                        allowScriptAccess: "always",
                        allowNetworking: "all"
                    }, n), Object.getOwnPropertyNames(n).forEach(function(e) {
                        s += '<param name="' + e + '" value="' + n[e] + '" />'
                    }), r = (0, E["default"])({
                        data: e,
                        width: "100%",
                        height: "100%"
                    }, r), Object.getOwnPropertyNames(r).forEach(function(e) {
                        a += e + '="' + r[e] + '" '
                    }), "" + o + a + ">" + s + "</object>"
                }, (0, g["default"])(O), _["default"].registerComponent("Flash", O), p["default"].registerTech("Flash", O), n["default"] = O
            }, {
                136: 136,
                5: 5,
                58: 58,
                62: 62,
                80: 80,
                88: 88,
                90: 90,
                93: 93
            }],
            60: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    return e.raw = t, e
                }

                function s(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function a(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function l(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var u = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    c = i(["Text Tracks are being loaded from another origin but the crossorigin attribute isn't used.\n            This may prevent text tracks from loading."], ["Text Tracks are being loaded from another origin but the crossorigin attribute isn't used.\n            This may prevent text tracks from loading."]),
                    p = e(62),
                    d = o(p),
                    f = e(5),
                    h = o(f),
                    y = e(80),
                    v = r(y),
                    m = e(90),
                    g = r(m),
                    b = e(82),
                    _ = r(b),
                    w = e(85),
                    C = o(w),
                    T = e(146),
                    E = o(T),
                    x = e(78),
                    O = r(x),
                    P = e(92),
                    S = o(P),
                    j = e(93),
                    k = o(j),
                    I = e(136),
                    R = o(I),
                    M = e(86),
                    A = o(M),
                    L = e(89),
                    N = o(L),
                    B = function(e) {
                        function t(n, r) {
                            s(this, t);
                            var o = a(this, e.call(this, n, r)),
                                i = n.source,
                                l = !1;
                            if (i && (o.el_.currentSrc !== i.src || n.tag && 3 === n.tag.initNetworkState_) ? o.setSource(i) : o.handleLateInit_(o.el_), o.el_.hasChildNodes()) {
                                for (var u = o.el_.childNodes, p = u.length, d = []; p--;) {
                                    var f = u[p],
                                        h = f.nodeName.toLowerCase();
                                    "track" === h && (o.featuresNativeTextTracks ? (o.remoteTextTrackEls().addTrackElement_(f), o.remoteTextTracks().addTrack_(f.track), l || o.el_.hasAttribute("crossorigin") || !g.isCrossOrigin(f.src) || (l = !0)) : d.push(f))
                                }
                                for (var y = 0; y < d.length; y++) o.el_.removeChild(d[y])
                            }
                            var v = ["audio", "video"];
                            return v.forEach(function(e) {
                                var t = o.el()[e + "Tracks"],
                                    n = o[e + "Tracks"](),
                                    r = (0, N["default"])(e);
                                o["featuresNative" + r + "Tracks"] && t && t.addEventListener && (o["handle" + r + "TrackChange_"] = function(e) {
                                    n.trigger({
                                        type: "change",
                                        target: n,
                                        currentTarget: n,
                                        srcElement: n
                                    })
                                }, o["handle" + r + "TrackAdd_"] = function(e) {
                                    return n.addTrack(e.track)
                                }, o["handle" + r + "TrackRemove_"] = function(e) {
                                    return n.removeTrack(e.track)
                                }, t.addEventListener("change", o["handle" + r + "TrackChange_"]), t.addEventListener("addtrack", o["handle" + r + "TrackAdd_"]), t.addEventListener("removetrack", o["handle" + r + "TrackRemove_"]), o["removeOld" + r + "Tracks_"] = function(e) {
                                    return o.removeOldTracks_(n, t)
                                }, o.on("loadstart", o["removeOld" + r + "Tracks_"]))
                            }), o.featuresNativeTextTracks && (l && C["default"].warn((0, E["default"])(c)), o.handleTextTrackChange_ = _.bind(o, o.handleTextTrackChange), o.handleTextTrackAdd_ = _.bind(o, o.handleTextTrackAdd), o.handleTextTrackRemove_ = _.bind(o, o.handleTextTrackRemove), o.proxyNativeTextTracks_()), (O.TOUCH_ENABLED || O.IS_IPHONE || O.IS_NATIVE_ANDROID) && n.nativeControlsForTouch === !0 && o.setControls(!0), o.proxyWebkitFullscreen_(), o.triggerReady(), o
                        }
                        return l(t, e), t.prototype.dispose = function() {
                            var n = this;
                            ["audio", "video", "text"].forEach(function(e) {
                                var t = (0, N["default"])(e),
                                    r = n.el_[e + "Tracks"];
                                r && r.removeEventListener && (r.removeEventListener("change", n["handle" + t + "TrackChange_"]), r.removeEventListener("addtrack", n["handle" + t + "TrackAdd_"]), r.removeEventListener("removetrack", n["handle" + t + "TrackRemove_"])), r && n.off("loadstart", n["removeOld" + t + "Tracks_"])
                            }), t.disposeMediaElement(this.el_), e.prototype.dispose.call(this)
                        }, t.prototype.createEl = function() {
                            var e = this.options_.tag;
                            if (!e || this.movingMediaElementInDOM === !1) {
                                if (e) {
                                    var n = e.cloneNode(!0);
                                    e.parentNode.insertBefore(n, e), t.disposeMediaElement(e), e = n
                                } else {
                                    e = S["default"].createElement("video");
                                    var r = this.options_.tag && v.getElAttributes(this.options_.tag),
                                        o = (0, A["default"])({}, r);
                                    O.TOUCH_ENABLED && this.options_.nativeControlsForTouch === !0 || delete o.controls, v.setElAttributes(e, (0, R["default"])(o, {
                                        id: this.options_.techId,
                                        "class": "vjs-tech"
                                    }))
                                }
                                e.playerId = this.options_.playerId
                            }
                            for (var i = ["autoplay", "preload", "loop", "muted"], s = i.length - 1; s >= 0; s--) {
                                var a = i[s],
                                    l = {};
                                "undefined" != typeof this.options_[a] && (l[a] = this.options_[a]), v.setElAttributes(e, l)
                            }
                            return e
                        }, t.prototype.handleLateInit_ = function(e) {
                            var t = this;
                            if (0 !== e.networkState && 3 !== e.networkState) {
                                if (0 === e.readyState) {
                                    var n = function() {
                                        var e = !1,
                                            n = function() {
                                                e = !0
                                            };
                                        t.on("loadstart", n);
                                        var r = function() {
                                            e || this.trigger("loadstart")
                                        };
                                        return t.on("loadedmetadata", r), t.ready(function() {
                                            this.off("loadstart", n), this.off("loadedmetadata", r), e || this.trigger("loadstart")
                                        }), {
                                            v: void 0
                                        }
                                    }();
                                    if ("object" === ("undefined" == typeof n ? "undefined" : u(n))) return n.v
                                }
                                var r = ["loadstart"];
                                r.push("loadedmetadata"), e.readyState >= 2 && r.push("loadeddata"), e.readyState >= 3 && r.push("canplay"), e.readyState >= 4 && r.push("canplaythrough"), this.ready(function() {
                                    r.forEach(function(e) {
                                        this.trigger(e)
                                    }, this)
                                })
                            }
                        }, t.prototype.proxyNativeTextTracks_ = function() {
                            var e = this.el().textTracks;
                            if (e) {
                                for (var t = 0; t < e.length; t++) this.textTracks().addTrack_(e[t]);
                                e.addEventListener && (e.addEventListener("change", this.handleTextTrackChange_), e.addEventListener("addtrack", this.handleTextTrackAdd_), e.addEventListener("removetrack", this.handleTextTrackRemove_)), this.on("loadstart", this.removeOldTextTracks_)
                            }
                        }, t.prototype.handleTextTrackChange = function(e) {
                            var t = this.textTracks();
                            this.textTracks().trigger({
                                type: "change",
                                target: t,
                                currentTarget: t,
                                srcElement: t
                            })
                        }, t.prototype.handleTextTrackAdd = function(e) {
                            this.textTracks().addTrack_(e.track)
                        }, t.prototype.handleTextTrackRemove = function(e) {
                            this.textTracks().removeTrack_(e.track)
                        }, t.prototype.removeOldTracks_ = function(e, t) {
                            var n = [];
                            if (t) {
                                for (var r = 0; r < e.length; r++) {
                                    for (var o = e[r], i = !1, s = 0; s < t.length; s++)
                                        if (t[s] === o) {
                                            i = !0;
                                            break
                                        }
                                    i || n.push(o)
                                }
                                for (var a = 0; a < n.length; a++) {
                                    var l = n[a];
                                    e.removeTrack_(l)
                                }
                            }
                        }, t.prototype.removeOldTextTracks_ = function() {
                            var e = this.textTracks(),
                                t = this.el().textTracks;
                            this.removeOldTracks_(e, t)
                        }, t.prototype.play = function() {
                            var e = this.el_.play();
                            void 0 !== e && "function" == typeof e.then && e.then(null, function(e) {})
                        }, t.prototype.setCurrentTime = function(e) {
                            try {
                                this.el_.currentTime = e
                            } catch (t) {
                                (0, C["default"])(t, "Video is not ready. (Video.js)")
                            }
                        }, t.prototype.duration = function() {
                            return this.el_.duration || 0
                        }, t.prototype.width = function() {
                            return this.el_.offsetWidth
                        }, t.prototype.height = function() {
                            return this.el_.offsetHeight
                        }, t.prototype.proxyWebkitFullscreen_ = function() {
                            var e = this;
                            if ("webkitDisplayingFullscreen" in this.el_) {
                                var t = function() {
                                        this.trigger("fullscreenchange", {
                                            isFullscreen: !1
                                        })
                                    },
                                    n = function() {
                                        this.one("webkitendfullscreen", t), this.trigger("fullscreenchange", {
                                            isFullscreen: !0
                                        })
                                    };
                                this.on("webkitbeginfullscreen", n), this.on("dispose", function() {
                                    e.off("webkitbeginfullscreen", n), e.off("webkitendfullscreen", t)
                                })
                            }
                        }, t.prototype.supportsFullScreen = function() {
                            if ("function" == typeof this.el_.webkitEnterFullScreen) {
                                var e = k["default"].navigator && k["default"].navigator.userAgent || "";
                                if (/Android/.test(e) || !/Chrome|Mac OS X 10.5/.test(e)) return !0
                            }
                            return !1
                        }, t.prototype.enterFullScreen = function() {
                            var e = this.el_;
                            e.paused && e.networkState <= e.HAVE_METADATA ? (this.el_.play(), this.setTimeout(function() {
                                e.pause(), e.webkitEnterFullScreen()
                            }, 0)) : e.webkitEnterFullScreen()
                        }, t.prototype.exitFullScreen = function() {
                            this.el_.webkitExitFullScreen()
                        }, t.prototype.src = function(e) {
                            return void 0 === e ? this.el_.src : void this.setSrc(e)
                        }, t.prototype.reset = function() {
                            t.resetMediaElement(this.el_)
                        }, t.prototype.currentSrc = function() {
                            return this.currentSource_ ? this.currentSource_.src : this.el_.currentSrc
                        }, t.prototype.setControls = function(e) {
                            this.el_.controls = !!e
                        }, t.prototype.addTextTrack = function(t, n, r) {
                            return this.featuresNativeTextTracks ? this.el_.addTextTrack(t, n, r) : e.prototype.addTextTrack.call(this, t, n, r)
                        }, t.prototype.addRemoteTextTrack = function() {
                            var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            if (!this.featuresNativeTextTracks) return e.prototype.addRemoteTextTrack.call(this, t);
                            var n = S["default"].createElement("track");
                            return t.kind && (n.kind = t.kind), t.label && (n.label = t.label), (t.language || t.srclang) && (n.srclang = t.language || t.srclang), t["default"] && (n["default"] = t["default"]), t.id && (n.id = t.id), t.src && (n.src = t.src), this.el().appendChild(n), this.remoteTextTrackEls().addTrackElement_(n), this.remoteTextTracks().addTrack_(n.track), n
                        }, t.prototype.removeRemoteTextTrack = function(t) {
                            if (!this.featuresNativeTextTracks) return e.prototype.removeRemoteTextTrack.call(this, t);
                            var n = this.remoteTextTrackEls().getTrackElementByTrack_(t);
                            this.remoteTextTrackEls().removeTrackElement_(n), this.remoteTextTracks().removeTrack_(t);
                            for (var r = this.$$("track"), o = r.length; o--;)(t === r[o] || t === r[o].track) && this.el().removeChild(r[o])
                        }, t
                    }(d["default"]);
                B.TEST_VID = S["default"].createElement("video");
                var D = S["default"].createElement("track");
                D.kind = "captions", D.srclang = "en", D.label = "English", B.TEST_VID.appendChild(D), B.isSupported = function() {
                    try {
                        B.TEST_VID.volume = .5
                    } catch (e) {
                        return !1
                    }
                    return !!B.TEST_VID.canPlayType
                }, B.canControlVolume = function() {
                    try {
                        var e = B.TEST_VID.volume;
                        return B.TEST_VID.volume = e / 2 + .1, e !== B.TEST_VID.volume
                    } catch (t) {
                        return !1
                    }
                }, B.canControlPlaybackRate = function() {
                    if (O.IS_ANDROID && O.IS_CHROME) return !1;
                    try {
                        var e = B.TEST_VID.playbackRate;
                        return B.TEST_VID.playbackRate = e / 2 + .1, e !== B.TEST_VID.playbackRate
                    } catch (t) {
                        return !1
                    }
                }, B.supportsNativeTextTracks = function() {
                    var e = void 0;
                    return e = !!B.TEST_VID.textTracks, e && B.TEST_VID.textTracks.length > 0 && (e = "number" != typeof B.TEST_VID.textTracks[0].mode), e && O.IS_FIREFOX && (e = !1), !e || "onremovetrack" in B.TEST_VID.textTracks || (e = !1), e
                }, B.supportsNativeVideoTracks = function() {
                    var e = !!B.TEST_VID.videoTracks;
                    return e
                }, B.supportsNativeAudioTracks = function() {
                    var e = !!B.TEST_VID.audioTracks;
                    return e
                }, B.Events = ["loadstart", "suspend", "abort", "error", "emptied", "stalled", "loadedmetadata", "loadeddata", "canplay", "canplaythrough", "playing", "waiting", "seeking", "seeked", "ended", "durationchange", "timeupdate", "progress", "play", "pause", "ratechange", "volumechange"], B.prototype.featuresVolumeControl = B.canControlVolume(), B.prototype.featuresPlaybackRate = B.canControlPlaybackRate(), B.prototype.movingMediaElementInDOM = !O.IS_IOS, B.prototype.featuresFullscreenResize = !0, B.prototype.featuresProgressEvents = !0, B.prototype.featuresTimeupdateEvents = !0, B.prototype.featuresNativeTextTracks = B.supportsNativeTextTracks(), B.prototype.featuresNativeVideoTracks = B.supportsNativeVideoTracks(), B.prototype.featuresNativeAudioTracks = B.supportsNativeAudioTracks();
                var F = void 0,
                    U = /^application\/(?:x-|vnd\.apple\.)mpegurl/i,
                    H = /^video\/mp4/i;
                B.patchCanPlayType = function() {
                    O.ANDROID_VERSION >= 4 && !O.IS_FIREFOX && (F || (F = B.TEST_VID.constructor.prototype.canPlayType), B.TEST_VID.constructor.prototype.canPlayType = function(e) {
                        return e && U.test(e) ? "maybe" : F.call(this, e)
                    }), O.IS_OLD_ANDROID && (F || (F = B.TEST_VID.constructor.prototype.canPlayType), B.TEST_VID.constructor.prototype.canPlayType = function(e) {
                        return e && H.test(e) ? "maybe" : F.call(this, e)
                    })
                }, B.unpatchCanPlayType = function() {
                    var e = B.TEST_VID.constructor.prototype.canPlayType;
                    return B.TEST_VID.constructor.prototype.canPlayType = F, F = null, e
                }, B.patchCanPlayType(), B.disposeMediaElement = function(e) {
                    if (e) {
                        for (e.parentNode && e.parentNode.removeChild(e); e.hasChildNodes();) e.removeChild(e.firstChild);
                        e.removeAttribute("src"), "function" == typeof e.load && ! function() {
                            try {
                                e.load()
                            } catch (t) {}
                        }()
                    }
                }, B.resetMediaElement = function(e) {
                    if (e) {
                        for (var t = e.querySelectorAll("source"), n = t.length; n--;) e.removeChild(t[n]);
                        e.removeAttribute("src"), "function" == typeof e.load && ! function() {
                            try {
                                e.load()
                            } catch (t) {}
                        }()
                    }
                }, ["paused", "currentTime", "buffered", "volume", "muted", "poster", "preload", "autoplay", "controls", "loop", "error", "seeking", "seekable", "ended", "defaultMuted", "playbackRate", "played", "networkState", "readyState", "videoWidth", "videoHeight"].forEach(function(e) {
                    B.prototype[e] = function() {
                        return this.el_[e]
                    }
                }), ["volume", "muted", "src", "poster", "preload", "autoplay", "loop", "playbackRate"].forEach(function(e) {
                    B.prototype["set" + (0, N["default"])(e)] = function(t) {
                        this.el_[e] = t
                    }
                }), ["pause", "load"].forEach(function(e) {
                    B.prototype[e] = function() {
                        return this.el_[e]()
                    }
                }), d["default"].withSourceHandlers(B), B.nativeSourceHandler = {}, B.nativeSourceHandler.canPlayType = function(e) {
                    try {
                        return B.TEST_VID.canPlayType(e)
                    } catch (t) {
                        return ""
                    }
                }, B.nativeSourceHandler.canHandleSource = function(e, t) {
                    if (e.type) return B.nativeSourceHandler.canPlayType(e.type);
                    if (e.src) {
                        var n = g.getFileExtension(e.src);
                        return B.nativeSourceHandler.canPlayType("video/" + n)
                    }
                    return ""
                }, B.nativeSourceHandler.handleSource = function(e, t, n) {
                    t.setSrc(e.src)
                }, B.nativeSourceHandler.dispose = function() {}, B.registerSourceHandler(B.nativeSourceHandler), h["default"].registerComponent("Html5", B), d["default"].registerTech("Html5", B), n["default"] = B
            }, {
                136: 136,
                146: 146,
                5: 5,
                62: 62,
                78: 78,
                80: 80,
                82: 82,
                85: 85,
                86: 86,
                89: 89,
                90: 90,
                92: 92,
                93: 93
            }],
            61: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function i(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function s(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var a = e(5),
                    l = r(a),
                    u = e(62),
                    c = r(u),
                    p = e(89),
                    d = r(p),
                    f = function(e) {
                        function t(n, r, s) {
                            o(this, t);
                            var a = i(this, e.call(this, n, r, s));
                            if (r.playerOptions.sources && 0 !== r.playerOptions.sources.length) n.src(r.playerOptions.sources);
                            else
                                for (var u = 0, p = r.playerOptions.techOrder; u < p.length; u++) {
                                    var f = (0, d["default"])(p[u]),
                                        h = c["default"].getTech(f);
                                    if (f || (h = l["default"].getComponent(f)), h && h.isSupported()) {
                                        n.loadTech_(f);
                                        break
                                    }
                                }
                            return a
                        }
                        return s(t, e), t
                    }(l["default"]);
                l["default"].registerComponent("MediaLoader", f), n["default"] = f
            }, {
                5: 5,
                62: 62,
                89: 89
            }],
            62: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }

                function l(e, t, n, r) {
                    var o = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : {},
                        i = e.textTracks();
                    o.kind = t, n && (o.label = n), r && (o.language = r), o.tech = e;
                    var s = new g["default"](o);
                    return i.addTrack_(s), s
                }
                n.__esModule = !0;
                var u = e(5),
                    c = o(u),
                    p = e(66),
                    d = o(p),
                    f = e(65),
                    h = o(f),
                    y = e(86),
                    v = o(y),
                    m = e(72),
                    g = o(m),
                    b = e(70),
                    _ = o(b),
                    w = e(76),
                    C = o(w),
                    T = e(63),
                    E = o(T),
                    x = e(82),
                    O = r(x),
                    P = e(85),
                    S = o(P),
                    j = e(88),
                    k = e(79),
                    I = e(46),
                    R = o(I),
                    M = e(93),
                    A = o(M),
                    L = e(92),
                    N = o(L),
                    B = function(e) {
                        function t() {
                            var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : function() {};
                            i(this, t), n.reportTouchActivity = !1;
                            var o = s(this, e.call(this, null, n, r));
                            return o.hasStarted_ = !1, o.on("playing", function() {
                                this.hasStarted_ = !0
                            }), o.on("loadstart", function() {
                                this.hasStarted_ = !1
                            }), o.textTracks_ = n.textTracks, o.videoTracks_ = n.videoTracks, o.audioTracks_ = n.audioTracks, o.featuresProgressEvents || o.manualProgressOn(), o.featuresTimeupdateEvents || o.manualTimeUpdatesOn(), (n.nativeCaptions === !1 || n.nativeTextTracks === !1) && (o.featuresNativeTextTracks = !1), o.featuresNativeTextTracks || o.on("ready", o.emulateTextTracks), o.initTextTrackListeners(), o.initTrackListeners(), o.emitTapEvents(), o
                        }
                        return a(t, e), t.prototype.manualProgressOn = function() {
                            this.on("durationchange", this.onDurationChange), this.manualProgress = !0, this.one("ready", this.trackProgress)
                        }, t.prototype.manualProgressOff = function() {
                            this.manualProgress = !1, this.stopTrackingProgress(), this.off("durationchange", this.onDurationChange)
                        }, t.prototype.trackProgress = function() {
                            this.stopTrackingProgress(), this.progressInterval = this.setInterval(O.bind(this, function() {
                                var e = this.bufferedPercent();
                                this.bufferedPercent_ !== e && this.trigger("progress"), this.bufferedPercent_ = e, 1 === e && this.stopTrackingProgress()
                            }), 500)
                        }, t.prototype.onDurationChange = function() {
                            this.duration_ = this.duration()
                        }, t.prototype.buffered = function() {
                            return (0, j.createTimeRange)(0, 0)
                        }, t.prototype.bufferedPercent = function() {
                            return (0, k.bufferedPercent)(this.buffered(), this.duration_)
                        }, t.prototype.stopTrackingProgress = function() {
                            this.clearInterval(this.progressInterval)
                        }, t.prototype.manualTimeUpdatesOn = function() {
                            this.manualTimeUpdates = !0, this.on("play", this.trackCurrentTime), this.on("pause", this.stopTrackingCurrentTime)
                        }, t.prototype.manualTimeUpdatesOff = function() {
                            this.manualTimeUpdates = !1, this.stopTrackingCurrentTime(), this.off("play", this.trackCurrentTime), this.off("pause", this.stopTrackingCurrentTime)
                        }, t.prototype.trackCurrentTime = function() {
                            this.currentTimeInterval && this.stopTrackingCurrentTime(), this.currentTimeInterval = this.setInterval(function() {
                                this.trigger({
                                    type: "timeupdate",
                                    target: this,
                                    manuallyTriggered: !0
                                })
                            }, 250)
                        }, t.prototype.stopTrackingCurrentTime = function() {
                            this.clearInterval(this.currentTimeInterval), this.trigger({
                                type: "timeupdate",
                                target: this,
                                manuallyTriggered: !0
                            })
                        }, t.prototype.dispose = function() {
                            this.clearTracks(["audio", "video", "text"]), this.manualProgress && this.manualProgressOff(), this.manualTimeUpdates && this.manualTimeUpdatesOff(), e.prototype.dispose.call(this)
                        }, t.prototype.clearTracks = function(e) {
                            var t = this;
                            e = [].concat(e), e.forEach(function(e) {
                                for (var n = t[e + "Tracks"]() || [], r = n.length; r--;) {
                                    var o = n[r];
                                    "text" === e && t.removeRemoteTextTrack(o), n.removeTrack_(o)
                                }
                            })
                        }, t.prototype.reset = function() {}, t.prototype.error = function(e) {
                            return void 0 !== e && (this.error_ = new R["default"](e), this.trigger("error")), this.error_
                        }, t.prototype.played = function() {
                            return this.hasStarted_ ? (0, j.createTimeRange)(0, 0) : (0, j.createTimeRange)()
                        }, t.prototype.setCurrentTime = function() {
                            this.manualTimeUpdates && this.trigger({
                                type: "timeupdate",
                                target: this,
                                manuallyTriggered: !0
                            })
                        }, t.prototype.initTextTrackListeners = function() {
                            var e = O.bind(this, function() {
                                    this.trigger("texttrackchange")
                                }),
                                t = this.textTracks();
                            t && (t.addEventListener("removetrack", e), t.addEventListener("addtrack", e), this.on("dispose", O.bind(this, function() {
                                t.removeEventListener("removetrack", e), t.removeEventListener("addtrack", e)
                            })))
                        }, t.prototype.initTrackListeners = function() {
                            var e = this,
                                t = ["video", "audio"];
                            t.forEach(function(t) {
                                var n = function() {
                                        e.trigger(t + "trackchange")
                                    },
                                    r = e[t + "Tracks"]();
                                r.addEventListener("removetrack", n), r.addEventListener("addtrack", n), e.on("dispose", function() {
                                    r.removeEventListener("removetrack", n), r.removeEventListener("addtrack", n)
                                })
                            })
                        }, t.prototype.emulateTextTracks = function() {
                            var e = this,
                                t = this.textTracks();
                            if (t) {
                                A["default"].WebVTT || null === this.el().parentNode || void 0 === this.el().parentNode || ! function() {
                                    var t = N["default"].createElement("script");
                                    t.src = e.options_["vtt.js"] || "https://cdn.rawgit.com/gkatsev/vtt.js/vjs-v0.12.1/dist/vtt.min.js", t.onload = function() {
                                        e.trigger("vttjsloaded")
                                    }, t.onerror = function() {
                                        e.trigger("vttjserror")
                                    }, e.on("dispose", function() {
                                        t.onload = null, t.onerror = null
                                    }), A["default"].WebVTT = !0, e.el().parentNode.appendChild(t)
                                }();
                                var n = function() {
                                        return e.trigger("texttrackchange")
                                    },
                                    r = function() {
                                        n();
                                        for (var e = 0; e < t.length; e++) {
                                            var r = t[e];
                                            r.removeEventListener("cuechange", n), "showing" === r.mode && r.addEventListener("cuechange", n)
                                        }
                                    };
                                r(), t.addEventListener("change", r), this.on("dispose", function() {
                                    t.removeEventListener("change", r)
                                })
                            }
                        }, t.prototype.videoTracks = function() {
                            return this.videoTracks_ = this.videoTracks_ || new C["default"], this.videoTracks_
                        }, t.prototype.audioTracks = function() {
                            return this.audioTracks_ = this.audioTracks_ || new E["default"], this.audioTracks_
                        }, t.prototype.textTracks = function() {
                            return this.textTracks_ = this.textTracks_ || new _["default"], this.textTracks_
                        }, t.prototype.remoteTextTracks = function() {
                            return this.remoteTextTracks_ = this.remoteTextTracks_ || new _["default"], this.remoteTextTracks_
                        }, t.prototype.remoteTextTrackEls = function() {
                            return this.remoteTextTrackEls_ = this.remoteTextTrackEls_ || new h["default"], this.remoteTextTrackEls_
                        }, t.prototype.addTextTrack = function(e, t, n) {
                            if (!e) throw new Error("TextTrack kind is required but was not provided");
                            return l(this, e, t, n)
                        }, t.prototype.addRemoteTextTrack = function(e) {
                            var t = (0, v["default"])(e, {
                                    tech: this
                                }),
                                n = new d["default"](t);
                            return this.remoteTextTrackEls().addTrackElement_(n), this.remoteTextTracks().addTrack_(n.track), this.textTracks().addTrack_(n.track), n
                        }, t.prototype.removeRemoteTextTrack = function(e) {
                            this.textTracks().removeTrack_(e);
                            var t = this.remoteTextTrackEls().getTrackElementByTrack_(e);
                            this.remoteTextTrackEls().removeTrackElement_(t), this.remoteTextTracks().removeTrack_(e)
                        }, t.prototype.setPoster = function() {}, t.prototype.canPlayType = function() {
                            return ""
                        }, t.isTech = function(e) {
                            return e.prototype instanceof t || e instanceof t || e === t
                        }, t.registerTech = function(e, n) {
                            if (t.techs_ || (t.techs_ = {}), !t.isTech(n)) throw new Error("Tech " + e + " must be a Tech");
                            return t.techs_[e] = n, n
                        }, t.getTech = function(e) {
                            return t.techs_ && t.techs_[e] ? t.techs_[e] : A["default"] && A["default"].videojs && A["default"].videojs[e] ? (S["default"].warn("The " + e + " tech was added to the videojs object when it should be registered using videojs.registerTech(name, tech)"), A["default"].videojs[e]) : void 0
                        }, t
                    }(c["default"]);
                B.prototype.textTracks_,
                    B.prototype.audioTracks_, B.prototype.videoTracks_, B.prototype.featuresVolumeControl = !0, B.prototype.featuresFullscreenResize = !1, B.prototype.featuresPlaybackRate = !1, B.prototype.featuresProgressEvents = !1, B.prototype.featuresTimeupdateEvents = !1, B.prototype.featuresNativeTextTracks = !1, B.withSourceHandlers = function(e) {
                        e.registerSourceHandler = function(t, n) {
                            var r = e.sourceHandlers;
                            r || (r = e.sourceHandlers = []), void 0 === n && (n = r.length), r.splice(n, 0, t)
                        }, e.canPlayType = function(t) {
                            for (var n = e.sourceHandlers || [], r = void 0, o = 0; o < n.length; o++)
                                if (r = n[o].canPlayType(t)) return r;
                            return ""
                        }, e.selectSourceHandler = function(t, n) {
                            for (var r = e.sourceHandlers || [], o = void 0, i = 0; i < r.length; i++)
                                if (o = r[i].canHandleSource(t, n)) return r[i];
                            return null
                        }, e.canPlaySource = function(t, n) {
                            var r = e.selectSourceHandler(t, n);
                            return r ? r.canHandleSource(t, n) : ""
                        };
                        var t = ["seekable", "duration"];
                        t.forEach(function(e) {
                            var t = this[e];
                            "function" == typeof t && (this[e] = function() {
                                return this.sourceHandler_ && this.sourceHandler_[e] ? this.sourceHandler_[e].apply(this.sourceHandler_, arguments) : t.apply(this, arguments)
                            })
                        }, e.prototype), e.prototype.setSource = function(t) {
                            var n = e.selectSourceHandler(t, this.options_);
                            return n || (e.nativeSourceHandler ? n = e.nativeSourceHandler : S["default"].error("No source hander found for the current source.")), this.disposeSourceHandler(), this.off("dispose", this.disposeSourceHandler), this.currentSource_ && (this.clearTracks(["audio", "video"]), this.currentSource_ = null), n !== e.nativeSourceHandler && (this.currentSource_ = t, this.off(this.el_, "loadstart", e.prototype.firstLoadStartListener_), this.off(this.el_, "loadstart", e.prototype.successiveLoadStartListener_), this.one(this.el_, "loadstart", e.prototype.firstLoadStartListener_)), this.sourceHandler_ = n.handleSource(t, this, this.options_), this.on("dispose", this.disposeSourceHandler), this
                        }, e.prototype.firstLoadStartListener_ = function() {
                            this.one(this.el_, "loadstart", e.prototype.successiveLoadStartListener_)
                        }, e.prototype.successiveLoadStartListener_ = function() {
                            this.currentSource_ = null, this.disposeSourceHandler(), this.one(this.el_, "loadstart", e.prototype.successiveLoadStartListener_)
                        }, e.prototype.disposeSourceHandler = function() {
                            this.sourceHandler_ && this.sourceHandler_.dispose && (this.off(this.el_, "loadstart", e.prototype.firstLoadStartListener_), this.off(this.el_, "loadstart", e.prototype.successiveLoadStartListener_), this.sourceHandler_.dispose(), this.sourceHandler_ = null)
                        }
                    }, c["default"].registerComponent("Tech", B), c["default"].registerComponent("MediaTechController", B), B.registerTech("Tech", B), n["default"] = B
            }, {
                46: 46,
                5: 5,
                63: 63,
                65: 65,
                66: 66,
                70: 70,
                72: 72,
                76: 76,
                79: 79,
                82: 82,
                85: 85,
                86: 86,
                88: 88,
                92: 92,
                93: 93
            }],
            63: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(74),
                    u = o(l),
                    c = e(78),
                    p = r(c),
                    d = e(92),
                    f = o(d),
                    h = function(e, t) {
                        for (var n = 0; n < e.length; n++) t.id !== e[n].id && (e[n].enabled = !1)
                    },
                    y = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                            i(this, t);
                            for (var a = void 0, l = o.length - 1; l >= 0; l--)
                                if (o[l].enabled) {
                                    h(o, o[l]);
                                    break
                                }
                            if (p.IS_IE8) {
                                a = f["default"].createElement("custom");
                                for (var c in u["default"].prototype) "constructor" !== c && (a[c] = u["default"].prototype[c]);
                                for (var d in t.prototype) "constructor" !== d && (a[d] = t.prototype[d])
                            }
                            return a = n = s(this, e.call(this, o, a)), a.changing_ = !1, r = a, s(n, r)
                        }
                        return a(t, e), t.prototype.addTrack_ = function(t) {
                            var n = this;
                            t.enabled && h(this, t), e.prototype.addTrack_.call(this, t), t.addEventListener && t.addEventListener("enabledchange", function() {
                                n.changing_ || (n.changing_ = !0, h(n, t), n.changing_ = !1, n.trigger("change"))
                            })
                        }, t.prototype.addTrack = function(e) {
                            this.addTrack_(e)
                        }, t.prototype.removeTrack = function(t) {
                            e.prototype.removeTrack_.call(this, t)
                        }, t
                    }(u["default"]);
                n["default"] = y
            }, {
                74: 74,
                78: 78,
                92: 92
            }],
            64: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(73),
                    u = e(75),
                    c = o(u),
                    p = e(86),
                    d = o(p),
                    f = e(78),
                    h = r(f),
                    y = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            i(this, t);
                            var a = (0, d["default"])(o, {
                                    kind: l.AudioTrackKind[o.kind] || ""
                                }),
                                u = n = s(this, e.call(this, a)),
                                c = !1;
                            if (h.IS_IE8)
                                for (var p in t.prototype) "constructor" !== p && (u[p] = t.prototype[p]);
                            return Object.defineProperty(u, "enabled", {
                                get: function() {
                                    return c
                                },
                                set: function(e) {
                                    "boolean" == typeof e && e !== c && (c = e, this.trigger("enabledchange"))
                                }
                            }), a.enabled && (u.enabled = a.enabled), u.loaded_ = !0, r = u, s(n, r)
                        }
                        return a(t, e), t
                    }(c["default"]);
                n["default"] = y
            }, {
                73: 73,
                75: 75,
                78: 78,
                86: 86
            }],
            65: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }
                n.__esModule = !0;
                var s = e(78),
                    a = o(s),
                    l = e(92),
                    u = r(l),
                    c = function() {
                        function e() {
                            var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                            i(this, e);
                            var n = this;
                            if (a.IS_IE8) {
                                n = u["default"].createElement("custom");
                                for (var r in e.prototype) "constructor" !== r && (n[r] = e.prototype[r])
                            }
                            n.trackElements_ = [], Object.defineProperty(n, "length", {
                                get: function() {
                                    return this.trackElements_.length
                                }
                            });
                            for (var o = 0, s = t.length; s > o; o++) n.addTrackElement_(t[o]);
                            return a.IS_IE8 ? n : void 0
                        }
                        return e.prototype.addTrackElement_ = function(e) {
                            this.trackElements_.push(e)
                        }, e.prototype.getTrackElementByTrack_ = function(e) {
                            for (var t = void 0, n = 0, r = this.trackElements_.length; r > n; n++)
                                if (e === this.trackElements_[n].track) {
                                    t = this.trackElements_[n];
                                    break
                                }
                            return t
                        }, e.prototype.removeTrackElement_ = function(e) {
                            for (var t = 0, n = this.trackElements_.length; n > t; t++)
                                if (e === this.trackElements_[t]) {
                                    this.trackElements_.splice(t, 1);
                                    break
                                }
                        }, e
                    }();
                n["default"] = c
            }, {
                78: 78,
                92: 92
            }],
            66: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(78),
                    u = o(l),
                    c = e(92),
                    p = r(c),
                    d = e(42),
                    f = r(d),
                    h = e(72),
                    y = r(h),
                    v = 0,
                    m = 1,
                    g = 2,
                    b = 3,
                    _ = function(e) {
                        function t() {
                            var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            i(this, t);
                            var r = s(this, e.call(this)),
                                o = void 0,
                                a = r;
                            if (u.IS_IE8) {
                                a = p["default"].createElement("custom");
                                for (var l in t.prototype) "constructor" !== l && (a[l] = t.prototype[l])
                            }
                            var c = new y["default"](n);
                            if (a.kind = c.kind, a.src = c.src, a.srclang = c.language, a.label = c.label, a["default"] = c["default"], Object.defineProperty(a, "readyState", {
                                    get: function() {
                                        return o
                                    }
                                }), Object.defineProperty(a, "track", {
                                    get: function() {
                                        return c
                                    }
                                }), o = v, c.addEventListener("loadeddata", function() {
                                    o = g, a.trigger({
                                        type: "load",
                                        target: a
                                    })
                                }), u.IS_IE8) {
                                var d;
                                return d = a, s(r, d)
                            }
                            return r
                        }
                        return a(t, e), t
                    }(f["default"]);
                _.prototype.allowedEvents_ = {
                    load: "load"
                }, _.NONE = v, _.LOADING = m, _.LOADED = g, _.ERROR = b, n["default"] = _
            }, {
                42: 42,
                72: 72,
                78: 78,
                92: 92
            }],
            67: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }
                n.__esModule = !0;
                var s = e(78),
                    a = o(s),
                    l = e(92),
                    u = r(l),
                    c = function() {
                        function e(t) {
                            i(this, e);
                            var n = this;
                            if (a.IS_IE8) {
                                n = u["default"].createElement("custom");
                                for (var r in e.prototype) "constructor" !== r && (n[r] = e.prototype[r])
                            }
                            return e.prototype.setCues_.call(n, t), Object.defineProperty(n, "length", {
                                get: function() {
                                    return this.length_
                                }
                            }), a.IS_IE8 ? n : void 0
                        }
                        return e.prototype.setCues_ = function(e) {
                            var t = this.length || 0,
                                n = 0,
                                r = e.length;
                            this.cues_ = e, this.length_ = e.length;
                            var o = function(e) {
                                "" + e in this || Object.defineProperty(this, "" + e, {
                                    get: function() {
                                        return this.cues_[e]
                                    }
                                })
                            };
                            if (r > t)
                                for (n = t; r > n; n++) o.call(this, n)
                        }, e.prototype.getCueById = function(e) {
                            for (var t = null, n = 0, r = this.length; r > n; n++) {
                                var o = this[n];
                                if (o.id === e) {
                                    t = o;
                                    break
                                }
                            }
                            return t
                        }, e
                    }();
                n["default"] = c
            }, {
                78: 78,
                92: 92
            }],
            68: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }

                function l(e, t) {
                    return "rgba(" + parseInt(e[1] + e[1], 16) + "," + parseInt(e[2] + e[2], 16) + "," + parseInt(e[3] + e[3], 16) + "," + t + ")"
                }

                function u(e, t, n) {
                    try {
                        e.style[t] = n
                    } catch (r) {
                        return
                    }
                }
                n.__esModule = !0;
                var c = e(5),
                    p = o(c),
                    d = e(82),
                    f = r(d),
                    h = e(93),
                    y = o(h),
                    v = "#222",
                    m = "#ccc",
                    g = {
                        monospace: "monospace",
                        sansSerif: "sans-serif",
                        serif: "serif",
                        monospaceSansSerif: '"Andale Mono", "Lucida Console", monospace',
                        monospaceSerif: '"Courier New", monospace',
                        proportionalSansSerif: "sans-serif",
                        proportionalSerif: "serif",
                        casual: '"Comic Sans MS", Impact, fantasy',
                        script: '"Monotype Corsiva", cursive',
                        smallcaps: '"Andale Mono", "Lucida Console", monospace, sans-serif'
                    },
                    b = function(e) {
                        function t(n, r, o) {
                            i(this, t);
                            var a = s(this, e.call(this, n, r, o));
                            return n.on("loadstart", f.bind(a, a.toggleDisplay)), n.on("texttrackchange", f.bind(a, a.updateDisplay)), n.ready(f.bind(a, function() {
                                if (n.tech_ && n.tech_.featuresNativeTextTracks) return void this.hide();
                                n.on("fullscreenchange", f.bind(this, this.updateDisplay));
                                for (var e = this.options_.playerOptions.tracks || [], t = 0; t < e.length; t++) this.player_.addRemoteTextTrack(e[t]);
                                var r = {
                                        captions: 1,
                                        subtitles: 1
                                    },
                                    o = this.player_.textTracks(),
                                    i = void 0,
                                    s = void 0;
                                if (o) {
                                    for (var a = 0; a < o.length; a++) {
                                        var l = o[a];
                                        l["default"] && ("descriptions" !== l.kind || i ? l.kind in r && !s && (s = l) : i = l)
                                    }
                                    s ? s.mode = "showing" : i && (i.mode = "showing")
                                }
                            })), a
                        }
                        return a(t, e), t.prototype.toggleDisplay = function() {
                            this.player_.tech_ && this.player_.tech_.featuresNativeTextTracks ? this.hide() : this.show()
                        }, t.prototype.createEl = function() {
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-text-track-display"
                            }, {
                                "aria-live": "assertive",
                                "aria-atomic": "true"
                            })
                        }, t.prototype.clearDisplay = function() {
                            "function" == typeof y["default"].WebVTT && y["default"].WebVTT.processCues(y["default"], [], this.el_)
                        }, t.prototype.updateDisplay = function() {
                            var e = this.player_.textTracks();
                            if (this.clearDisplay(), e) {
                                for (var t = null, n = null, r = e.length; r--;) {
                                    var o = e[r];
                                    "showing" === o.mode && ("descriptions" === o.kind ? t = o : n = o)
                                }
                                n ? this.updateForTrack(n) : t && this.updateForTrack(t)
                            }
                        }, t.prototype.updateForTrack = function(e) {
                            if ("function" == typeof y["default"].WebVTT && e.activeCues) {
                                var t;
                                t = void 0 !== this.player_.textTrackSettings ? this.player_.textTrackSettings.getValues() : {};
                                for (var n = [], r = 0; r < e.activeCues.length; r++) n.push(e.activeCues[r]);
                                y["default"].WebVTT.processCues(y["default"], n, this.el_);
                                for (var o = n.length; o--;) {
                                    var i = n[o];
                                    if (i) {
                                        var s = i.displayState;
                                        if (t.color && (s.firstChild.style.color = t.color), t.textOpacity && u(s.firstChild, "color", l(t.color || "#fff", t.textOpacity)), t.backgroundColor && (s.firstChild.style.backgroundColor = t.backgroundColor), t.backgroundOpacity && u(s.firstChild, "backgroundColor", l(t.backgroundColor || "#000", t.backgroundOpacity)), t.windowColor && (t.windowOpacity ? u(s, "backgroundColor", l(t.windowColor, t.windowOpacity)) : s.style.backgroundColor = t.windowColor), t.edgeStyle && ("dropshadow" === t.edgeStyle ? s.firstChild.style.textShadow = "2px 2px 3px " + v + ", 2px 2px 4px " + v + ", 2px 2px 5px " + v : "raised" === t.edgeStyle ? s.firstChild.style.textShadow = "1px 1px " + v + ", 2px 2px " + v + ", 3px 3px " + v : "depressed" === t.edgeStyle ? s.firstChild.style.textShadow = "1px 1px " + m + ", 0 1px " + m + ", -1px -1px " + v + ", 0 -1px " + v : "uniform" === t.edgeStyle && (s.firstChild.style.textShadow = "0 0 4px " + v + ", 0 0 4px " + v + ", 0 0 4px " + v + ", 0 0 4px " + v)), t.fontPercent && 1 !== t.fontPercent) {
                                            var a = y["default"].parseFloat(s.style.fontSize);
                                            s.style.fontSize = a * t.fontPercent + "px", s.style.height = "auto", s.style.top = "auto", s.style.bottom = "2px"
                                        }
                                        t.fontFamily && "default" !== t.fontFamily && ("small-caps" === t.fontFamily ? s.firstChild.style.fontVariant = "small-caps" : s.firstChild.style.fontFamily = g[t.fontFamily])
                                    }
                                }
                            }
                        }, t
                    }(p["default"]);
                p["default"].registerComponent("TextTrackDisplay", b), n["default"] = b
            }, {
                5: 5,
                82: 82,
                93: 93
            }],
            69: [function(e, t, n) {
                n.__esModule = !0;
                var r = function(e) {
                        var t = ["kind", "label", "language", "id", "inBandMetadataTrackDispatchType", "mode", "src"].reduce(function(t, n, r) {
                            return e[n] && (t[n] = e[n]), t
                        }, {
                            cues: e.cues && Array.prototype.map.call(e.cues, function(e) {
                                return {
                                    startTime: e.startTime,
                                    endTime: e.endTime,
                                    text: e.text,
                                    id: e.id
                                }
                            })
                        });
                        return t
                    },
                    o = function(e) {
                        var t = e.$$("track"),
                            n = Array.prototype.map.call(t, function(e) {
                                return e.track
                            }),
                            o = Array.prototype.map.call(t, function(e) {
                                var t = r(e.track);
                                return e.src && (t.src = e.src), t
                            });
                        return o.concat(Array.prototype.filter.call(e.textTracks(), function(e) {
                            return -1 === n.indexOf(e)
                        }).map(r))
                    },
                    i = function(e, t) {
                        return e.forEach(function(e) {
                            var n = t.addRemoteTextTrack(e).track;
                            !e.src && e.cues && e.cues.forEach(function(e) {
                                return n.addCue(e)
                            })
                        }), t.textTracks()
                    };
                n["default"] = {
                    textTracksToJson: o,
                    jsonToTextTracks: i,
                    trackToJson_: r
                }
            }, {}],
            70: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(74),
                    u = o(l),
                    c = e(82),
                    p = r(c),
                    d = e(78),
                    f = r(d),
                    h = e(92),
                    y = o(h),
                    v = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                            i(this, t);
                            var a = void 0;
                            if (f.IS_IE8) {
                                a = y["default"].createElement("custom");
                                for (var l in u["default"].prototype) "constructor" !== l && (a[l] = u["default"].prototype[l]);
                                for (var c in t.prototype) "constructor" !== c && (a[c] = t.prototype[c])
                            }
                            return a = n = s(this, e.call(this, o, a)), r = a, s(n, r)
                        }
                        return a(t, e), t.prototype.addTrack_ = function(t) {
                            e.prototype.addTrack_.call(this, t), t.addEventListener("modechange", p.bind(this, function() {
                                this.trigger("change")
                            }))
                        }, t.prototype.removeTrack_ = function(e) {
                            for (var t = void 0, n = 0, r = this.length; r > n; n++)
                                if (this[n] === e) {
                                    t = this[n], t.off && t.off(), this.tracks_.splice(n, 1);
                                    break
                                }
                            t && this.trigger({
                                track: t,
                                type: "removetrack"
                            })
                        }, t.prototype.getTrackById = function(e) {
                            for (var t = null, n = 0, r = this.length; r > n; n++) {
                                var o = this[n];
                                if (o.id === e) {
                                    t = o;
                                    break
                                }
                            }
                            return t
                        }, t
                    }(u["default"]);
                n["default"] = v
            }, {
                74: 74,
                78: 78,
                82: 82,
                92: 92
            }],
            71: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }

                function l(e, t, n) {
                    var r = '\n    <div role="document">\n      <div role="heading" aria-level="1" id="' + t + '" class="vjs-control-text">Captions Settings Dialog</div>\n      <div id="' + n + '" class="vjs-control-text">Beginning of dialog window. Escape will cancel and close the window.</div>\n      <div class="vjs-tracksettings">\n        <div class="vjs-tracksettings-colors">\n          <fieldset class="vjs-fg-color vjs-tracksetting">\n            <legend>Text</legend>\n            <label class="vjs-label" for="captions-foreground-color-' + e + '">Color</label>\n            <select id="captions-foreground-color-' + e + '">\n              <option value="#FFF" selected>White</option>\n              <option value="#000">Black</option>\n              <option value="#F00">Red</option>\n              <option value="#0F0">Green</option>\n              <option value="#00F">Blue</option>\n              <option value="#FF0">Yellow</option>\n              <option value="#F0F">Magenta</option>\n              <option value="#0FF">Cyan</option>\n            </select>\n            <span class="vjs-text-opacity vjs-opacity">\n              <label class="vjs-label" for="captions-foreground-opacity-' + e + '">Transparency</label>\n              <select id="captions-foreground-opacity-' + e + '">\n                <option value="1" selected>Opaque</option>\n                <option value="0.5">Semi-Opaque</option>\n              </select>\n            </span>\n          </fieldset>\n          <fieldset class="vjs-bg-color vjs-tracksetting">\n            <legend>Background</legend>\n            <label class="vjs-label" for="captions-background-color-' + e + '">Color</label>\n            <select id="captions-background-color-' + e + '">\n              <option value="#000" selected>Black</option>\n              <option value="#FFF">White</option>\n              <option value="#F00">Red</option>\n              <option value="#0F0">Green</option>\n              <option value="#00F">Blue</option>\n              <option value="#FF0">Yellow</option>\n              <option value="#F0F">Magenta</option>\n              <option value="#0FF">Cyan</option>\n            </select>\n            <span class="vjs-bg-opacity vjs-opacity">\n              <label class="vjs-label" for="captions-background-opacity-' + e + '">Transparency</label>\n              <select id="captions-background-opacity-' + e + '">\n                <option value="1" selected>Opaque</option>\n                <option value="0.5">Semi-Transparent</option>\n                <option value="0">Transparent</option>\n              </select>\n            </span>\n          </fieldset>\n          <fieldset class="window-color vjs-tracksetting">\n            <legend>Window</legend>\n            <label class="vjs-label" for="captions-window-color-' + e + '">Color</label>\n            <select id="captions-window-color-' + e + '">\n              <option value="#000" selected>Black</option>\n              <option value="#FFF">White</option>\n              <option value="#F00">Red</option>\n              <option value="#0F0">Green</option>\n              <option value="#00F">Blue</option>\n              <option value="#FF0">Yellow</option>\n              <option value="#F0F">Magenta</option>\n              <option value="#0FF">Cyan</option>\n            </select>\n            <span class="vjs-window-opacity vjs-opacity">\n              <label class="vjs-label" for="captions-window-opacity-' + e + '">Transparency</label>\n              <select id="captions-window-opacity-' + e + '">\n                <option value="0" selected>Transparent</option>\n                <option value="0.5">Semi-Transparent</option>\n                <option value="1">Opaque</option>\n              </select>\n            </span>\n          </fieldset>\n        </div> <!-- vjs-tracksettings-colors -->\n        <div class="vjs-tracksettings-font">\n          <div class="vjs-font-percent vjs-tracksetting">\n            <label class="vjs-label" for="captions-font-size-' + e + '">Font Size</label>\n            <select id="captions-font-size-' + e + '">\n              <option value="0.50">50%</option>\n              <option value="0.75">75%</option>\n              <option value="1.00" selected>100%</option>\n              <option value="1.25">125%</option>\n              <option value="1.50">150%</option>\n              <option value="1.75">175%</option>\n              <option value="2.00">200%</option>\n              <option value="3.00">300%</option>\n              <option value="4.00">400%</option>\n            </select>\n          </div>\n          <div class="vjs-edge-style vjs-tracksetting">\n            <label class="vjs-label" for="captions-edge-style-' + e + '">Text Edge Style</label>\n            <select id="captions-edge-style-' + e + '">\n              <option value="none" selected>None</option>\n              <option value="raised">Raised</option>\n              <option value="depressed">Depressed</option>\n              <option value="uniform">Uniform</option>\n              <option value="dropshadow">Dropshadow</option>\n            </select>\n          </div>\n          <div class="vjs-font-family vjs-tracksetting">\n            <label class="vjs-label" for="captions-font-family-' + e + '">Font Family</label>\n            <select id="captions-font-family-' + e + '">\n              <option value="proportionalSansSerif" selected>Proportional Sans-Serif</option>\n              <option value="monospaceSansSerif">Monospace Sans-Serif</option>\n              <option value="proportionalSerif">Proportional Serif</option>\n              <option value="monospaceSerif">Monospace Serif</option>\n              <option value="casual">Casual</option>\n              <option value="script">Script</option>\n              <option value="small-caps">Small Caps</option>\n            </select>\n          </div>\n        </div> <!-- vjs-tracksettings-font -->\n        <div class="vjs-tracksettings-controls">\n          <button class="vjs-default-button">Defaults</button>\n          <button class="vjs-done-button">Done</button>\n        </div>\n      </div> <!-- vjs-tracksettings -->\n    </div> <!--  role="document" -->\n  ';
                    return r
                }

                function u(e) {
                    var t = void 0;
                    return e.selectedOptions ? t = e.selectedOptions[0] : e.options && (t = e.options[e.options.selectedIndex]), t.value
                }

                function c(e, t) {
                    if (t) {
                        var n = void 0;
                        for (n = 0; n < e.options.length; n++) {
                            var r = e.options[n];
                            if (r.value === t) break
                        }
                        e.selectedIndex = n
                    }
                }
                n.__esModule = !0;
                var p = e(5),
                    d = o(p),
                    f = e(81),
                    h = r(f),
                    y = e(82),
                    v = r(y),
                    m = e(85),
                    g = o(m),
                    b = e(145),
                    _ = o(b),
                    w = e(93),
                    C = o(w),
                    T = function(e) {
                        function t(n, r) {
                            i(this, t);
                            var o = s(this, e.call(this, n, r));
                            return o.hide(), void 0 === r.persistTextTrackSettings && (o.options_.persistTextTrackSettings = o.options_.playerOptions.persistTextTrackSettings), h.on(o.$(".vjs-done-button"), "click", v.bind(o, function() {
                                this.saveSettings(), this.hide()
                            })), h.on(o.$(".vjs-default-button"), "click", v.bind(o, function() {
                                this.$(".vjs-fg-color > select").selectedIndex = 0, this.$(".vjs-bg-color > select").selectedIndex = 0, this.$(".window-color > select").selectedIndex = 0, this.$(".vjs-text-opacity > select").selectedIndex = 0, this.$(".vjs-bg-opacity > select").selectedIndex = 0, this.$(".vjs-window-opacity > select").selectedIndex = 0, this.$(".vjs-edge-style select").selectedIndex = 0, this.$(".vjs-font-family select").selectedIndex = 0, this.$(".vjs-font-percent select").selectedIndex = 2, this.updateDisplay()
                            })), h.on(o.$(".vjs-fg-color > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-bg-color > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".window-color > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-text-opacity > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-bg-opacity > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-window-opacity > select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-font-percent select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-edge-style select"), "change", v.bind(o, o.updateDisplay)), h.on(o.$(".vjs-font-family select"), "change", v.bind(o, o.updateDisplay)), o.options_.persistTextTrackSettings && o.restoreSettings(), o
                        }
                        return a(t, e), t.prototype.createEl = function() {
                            var t = this.id_,
                                n = "TTsettingsDialogLabel-" + t,
                                r = "TTsettingsDialogDescription-" + t;
                            return e.prototype.createEl.call(this, "div", {
                                className: "vjs-caption-settings vjs-modal-overlay",
                                innerHTML: l(t, n, r),
                                tabIndex: -1
                            }, {
                                role: "dialog",
                                "aria-labelledby": n,
                                "aria-describedby": r
                            })
                        }, t.prototype.getValues = function() {
                            var e = u(this.$(".vjs-edge-style select")),
                                t = u(this.$(".vjs-font-family select")),
                                n = u(this.$(".vjs-fg-color > select")),
                                r = u(this.$(".vjs-text-opacity > select")),
                                o = u(this.$(".vjs-bg-color > select")),
                                i = u(this.$(".vjs-bg-opacity > select")),
                                s = u(this.$(".window-color > select")),
                                a = u(this.$(".vjs-window-opacity > select")),
                                l = C["default"].parseFloat(u(this.$(".vjs-font-percent > select"))),
                                c = {
                                    fontPercent: l,
                                    fontFamily: t,
                                    textOpacity: r,
                                    windowColor: s,
                                    windowOpacity: a,
                                    backgroundOpacity: i,
                                    edgeStyle: e,
                                    color: n,
                                    backgroundColor: o
                                };
                            for (var p in c)("" === c[p] || "none" === c[p] || "fontPercent" === p && 1 === c[p]) && delete c[p];
                            return c
                        }, t.prototype.setValues = function(e) {
                            c(this.$(".vjs-edge-style select"), e.edgeStyle), c(this.$(".vjs-font-family select"), e.fontFamily), c(this.$(".vjs-fg-color > select"), e.color), c(this.$(".vjs-text-opacity > select"), e.textOpacity), c(this.$(".vjs-bg-color > select"), e.backgroundColor), c(this.$(".vjs-bg-opacity > select"), e.backgroundOpacity), c(this.$(".window-color > select"), e.windowColor), c(this.$(".vjs-window-opacity > select"), e.windowOpacity);
                            var t = e.fontPercent;
                            t && (t = t.toFixed(2)), c(this.$(".vjs-font-percent > select"), t)
                        }, t.prototype.restoreSettings = function() {
                            var e = void 0,
                                t = void 0;
                            try {
                                var n = (0, _["default"])(C["default"].localStorage.getItem("vjs-text-track-settings"));
                                e = n[0], t = n[1], e && g["default"].error(e)
                            } catch (r) {
                                g["default"].warn(r)
                            }
                            t && this.setValues(t)
                        }, t.prototype.saveSettings = function() {
                            if (this.options_.persistTextTrackSettings) {
                                var e = this.getValues();
                                try {
                                    Object.getOwnPropertyNames(e).length > 0 ? C["default"].localStorage.setItem("vjs-text-track-settings", JSON.stringify(e)) : C["default"].localStorage.removeItem("vjs-text-track-settings")
                                } catch (t) {
                                    g["default"].warn(t)
                                }
                            }
                        }, t.prototype.updateDisplay = function() {
                            var e = this.player_.getChild("textTrackDisplay");
                            e && e.updateDisplay()
                        }, t
                    }(d["default"]);
                d["default"].registerComponent("TextTrackSettings", T), n["default"] = T
            }, {
                145: 145,
                5: 5,
                81: 81,
                82: 82,
                85: 85,
                93: 93
            }],
            72: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(67),
                    u = o(l),
                    c = e(82),
                    p = r(c),
                    d = e(73),
                    f = e(85),
                    h = o(f),
                    y = e(93),
                    v = o(y),
                    m = e(75),
                    g = o(m),
                    b = e(90),
                    _ = e(147),
                    w = o(_),
                    C = e(86),
                    T = o(C),
                    E = e(78),
                    x = r(E),
                    O = function(e, t) {
                        var n = new v["default"].WebVTT.Parser(v["default"], v["default"].vttjs, v["default"].WebVTT.StringDecoder()),
                            r = [];
                        n.oncue = function(e) {
                            t.addCue(e)
                        }, n.onparsingerror = function(e) {
                            r.push(e)
                        }, n.onflush = function() {
                            t.trigger({
                                type: "loadeddata",
                                target: t
                            })
                        }, n.parse(e), r.length > 0 && (v["default"].console && v["default"].console.groupCollapsed && v["default"].console.groupCollapsed("Text Track parsing errors for " + t.src), r.forEach(function(e) {
                            return h["default"].error(e)
                        }), v["default"].console && v["default"].console.groupEnd && v["default"].console.groupEnd()), n.flush()
                    },
                    P = function(e, t) {
                        var n = {
                                uri: e
                            },
                            r = (0, b.isCrossOrigin)(e);
                        r && (n.cors = r), (0, w["default"])(n, p.bind(this, function(e, n, r) {
                            return e ? h["default"].error(e, n) : (t.loaded_ = !0, void("function" != typeof v["default"].WebVTT ? t.tech_ && ! function() {
                                var e = function() {
                                    return O(r, t)
                                };
                                t.tech_.on("vttjsloaded", e), t.tech_.on("vttjserror", function() {
                                    h["default"].error("vttjs failed to load, stopping trying to process " + t.src), t.tech_.off("vttjsloaded", e)
                                })
                            }() : O(r, t)))
                        }))
                    },
                    S = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            if (i(this, t), !o.tech) throw new Error("A tech was not provided.");
                            var a = (0, T["default"])(o, {
                                    kind: d.TextTrackKind[o.kind] || "subtitles",
                                    language: o.language || o.srclang || ""
                                }),
                                l = d.TextTrackMode[a.mode] || "disabled",
                                c = a["default"];
                            ("metadata" === a.kind || "chapters" === a.kind) && (l = "hidden");
                            var f = n = s(this, e.call(this, a));
                            if (f.tech_ = a.tech, x.IS_IE8)
                                for (var h in t.prototype) "constructor" !== h && (f[h] = t.prototype[h]);
                            f.cues_ = [], f.activeCues_ = [];
                            var y = new u["default"](f.cues_),
                                v = new u["default"](f.activeCues_),
                                m = !1,
                                g = p.bind(f, function() {
                                    this.activeCues, m && (this.trigger("cuechange"), m = !1)
                                });
                            return "disabled" !== l && f.tech_.on("timeupdate", g), Object.defineProperty(f, "default", {
                                get: function() {
                                    return c
                                },
                                set: function() {}
                            }), Object.defineProperty(f, "mode", {
                                get: function() {
                                    return l
                                },
                                set: function(e) {
                                    d.TextTrackMode[e] && (l = e, "showing" === l && this.tech_.on("timeupdate", g), this.trigger("modechange"))
                                }
                            }), Object.defineProperty(f, "cues", {
                                get: function() {
                                    return this.loaded_ ? y : null
                                },
                                set: function() {}
                            }), Object.defineProperty(f, "activeCues", {
                                get: function() {
                                    if (!this.loaded_) return null;
                                    if (0 === this.cues.length) return v;
                                    for (var e = this.tech_.currentTime(), t = [], n = 0, r = this.cues.length; r > n; n++) {
                                        var o = this.cues[n];
                                        o.startTime <= e && o.endTime >= e ? t.push(o) : o.startTime === o.endTime && o.startTime <= e && o.startTime + .5 >= e && t.push(o)
                                    }
                                    if (m = !1, t.length !== this.activeCues_.length) m = !0;
                                    else
                                        for (var i = 0; i < t.length; i++) - 1 === this.activeCues_.indexOf(t[i]) && (m = !0);
                                    return this.activeCues_ = t, v.setCues_(this.activeCues_), v
                                },
                                set: function() {}
                            }), a.src ? (f.src = a.src, P(a.src, f)) : f.loaded_ = !0, r = f, s(n, r)
                        }
                        return a(t, e), t.prototype.addCue = function(e) {
                            var t = this.tech_.textTracks();
                            if (t)
                                for (var n = 0; n < t.length; n++) t[n] !== this && t[n].removeCue(e);
                            this.cues_.push(e),
                                this.cues.setCues_(this.cues_)
                        }, t.prototype.removeCue = function(e) {
                            for (var t = !1, n = 0, r = this.cues_.length; r > n; n++) {
                                var o = this.cues_[n];
                                o === e && (this.cues_.splice(n, 1), t = !0)
                            }
                            t && this.cues.setCues_(this.cues_)
                        }, t
                    }(g["default"]);
                S.prototype.allowedEvents_ = {
                    cuechange: "cuechange"
                }, n["default"] = S
            }, {
                147: 147,
                67: 67,
                73: 73,
                75: 75,
                78: 78,
                82: 82,
                85: 85,
                86: 86,
                90: 90,
                93: 93
            }],
            73: [function(e, t, n) {
                n.__esModule = !0;
                n.VideoTrackKind = {
                    alternative: "alternative",
                    captions: "captions",
                    main: "main",
                    sign: "sign",
                    subtitles: "subtitles",
                    commentary: "commentary"
                }, n.AudioTrackKind = {
                    alternative: "alternative",
                    descriptions: "descriptions",
                    main: "main",
                    "main-desc": "main-desc",
                    translation: "translation",
                    commentary: "commentary"
                }, n.TextTrackKind = {
                    subtitles: "subtitles",
                    captions: "captions",
                    descriptions: "descriptions",
                    chapters: "chapters",
                    metadata: "metadata"
                }, n.TextTrackMode = {
                    disabled: "disabled",
                    hidden: "hidden",
                    showing: "showing"
                }
            }, {}],
            74: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(42),
                    u = o(l),
                    c = e(78),
                    p = r(c),
                    d = e(92),
                    f = o(d),
                    h = function(e) {
                        function t() {
                            var n, r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [],
                                o = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                            i(this, t);
                            var a = s(this, e.call(this));
                            if (!o && (o = a, p.IS_IE8)) {
                                o = f["default"].createElement("custom");
                                for (var l in t.prototype) "constructor" !== l && (o[l] = t.prototype[l])
                            }
                            o.tracks_ = [], Object.defineProperty(o, "length", {
                                get: function() {
                                    return this.tracks_.length
                                }
                            });
                            for (var u = 0; u < r.length; u++) o.addTrack_(r[u]);
                            return n = o, s(a, n)
                        }
                        return a(t, e), t.prototype.addTrack_ = function(e) {
                            var t = this.tracks_.length;
                            "" + t in this || Object.defineProperty(this, t, {
                                get: function() {
                                    return this.tracks_[t]
                                }
                            }), -1 === this.tracks_.indexOf(e) && (this.tracks_.push(e), this.trigger({
                                track: e,
                                type: "addtrack"
                            }))
                        }, t.prototype.removeTrack_ = function(e) {
                            for (var t = void 0, n = 0, r = this.length; r > n; n++)
                                if (this[n] === e) {
                                    t = this[n], t.off && t.off(), this.tracks_.splice(n, 1);
                                    break
                                }
                            t && this.trigger({
                                track: t,
                                type: "removetrack"
                            })
                        }, t.prototype.getTrackById = function(e) {
                            for (var t = null, n = 0, r = this.length; r > n; n++) {
                                var o = this[n];
                                if (o.id === e) {
                                    t = o;
                                    break
                                }
                            }
                            return t
                        }, t
                    }(u["default"]);
                h.prototype.allowedEvents_ = {
                    change: "change",
                    addtrack: "addtrack",
                    removetrack: "removetrack"
                };
                for (var y in h.prototype.allowedEvents_) h.prototype["on" + y] = null;
                n["default"] = h
            }, {
                42: 42,
                78: 78,
                92: 92
            }],
            75: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(78),
                    u = o(l),
                    c = e(92),
                    p = r(c),
                    d = e(84),
                    f = o(d),
                    h = e(42),
                    y = r(h),
                    v = function(e) {
                        function t() {
                            var n, r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            i(this, t);
                            var o = s(this, e.call(this)),
                                a = o;
                            if (u.IS_IE8) {
                                a = p["default"].createElement("custom");
                                for (var l in t.prototype) "constructor" !== l && (a[l] = t.prototype[l])
                            }
                            var c = {
                                    id: r.id || "vjs_track_" + f.newGUID(),
                                    kind: r.kind || "",
                                    label: r.label || "",
                                    language: r.language || ""
                                },
                                d = function(e) {
                                    Object.defineProperty(a, e, {
                                        get: function() {
                                            return c[e]
                                        },
                                        set: function() {}
                                    })
                                };
                            for (var h in c) d(h);
                            return n = a, s(o, n)
                        }
                        return a(t, e), t
                    }(y["default"]);
                n["default"] = v
            }, {
                42: 42,
                78: 78,
                84: 84,
                92: 92
            }],
            76: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(74),
                    u = o(l),
                    c = e(78),
                    p = r(c),
                    d = e(92),
                    f = o(d),
                    h = function(e, t) {
                        for (var n = 0; n < e.length; n++) t.id !== e[n].id && (e[n].selected = !1)
                    },
                    y = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [];
                            i(this, t);
                            for (var a = void 0, l = o.length - 1; l >= 0; l--)
                                if (o[l].selected) {
                                    h(o, o[l]);
                                    break
                                }
                            if (p.IS_IE8) {
                                a = f["default"].createElement("custom");
                                for (var c in u["default"].prototype) "constructor" !== c && (a[c] = u["default"].prototype[c]);
                                for (var d in t.prototype) "constructor" !== d && (a[d] = t.prototype[d])
                            }
                            return a = n = s(this, e.call(this, o, a)), a.changing_ = !1, Object.defineProperty(a, "selectedIndex", {
                                get: function() {
                                    for (var e = 0; e < this.length; e++)
                                        if (this[e].selected) return e;
                                    return -1
                                },
                                set: function() {}
                            }), r = a, s(n, r)
                        }
                        return a(t, e), t.prototype.addTrack_ = function(t) {
                            var n = this;
                            t.selected && h(this, t), e.prototype.addTrack_.call(this, t), t.addEventListener && t.addEventListener("selectedchange", function() {
                                n.changing_ || (n.changing_ = !0, h(n, t), n.changing_ = !1, n.trigger("change"))
                            })
                        }, t.prototype.addTrack = function(e) {
                            this.addTrack_(e)
                        }, t.prototype.removeTrack = function(t) {
                            e.prototype.removeTrack_.call(this, t)
                        }, t
                    }(u["default"]);
                n["default"] = y
            }, {
                74: 74,
                78: 78,
                92: 92
            }],
            77: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }

                function s(e, t) {
                    if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                    return !t || "object" != typeof t && "function" != typeof t ? e : t
                }

                function a(e, t) {
                    if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                    e.prototype = Object.create(t && t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
                }
                n.__esModule = !0;
                var l = e(73),
                    u = e(75),
                    c = o(u),
                    p = e(86),
                    d = o(p),
                    f = e(78),
                    h = r(f),
                    y = function(e) {
                        function t() {
                            var n, r, o = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                            i(this, t);
                            var a = (0, d["default"])(o, {
                                    kind: l.VideoTrackKind[o.kind] || ""
                                }),
                                u = n = s(this, e.call(this, a)),
                                c = !1;
                            if (h.IS_IE8)
                                for (var p in t.prototype) "constructor" !== p && (u[p] = t.prototype[p]);
                            return Object.defineProperty(u, "selected", {
                                get: function() {
                                    return c
                                },
                                set: function(e) {
                                    "boolean" == typeof e && e !== c && (c = e, this.trigger("selectedchange"))
                                }
                            }), a.selected && (u.selected = a.selected), r = u, s(n, r)
                        }
                        return a(t, e), t
                    }(c["default"]);
                n["default"] = y
            }, {
                73: 73,
                75: 75,
                78: 78,
                86: 86
            }],
            78: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0, n.BACKGROUND_SIZE_SUPPORTED = n.TOUCH_ENABLED = n.IE_VERSION = n.IS_IE8 = n.IS_CHROME = n.IS_EDGE = n.IS_FIREFOX = n.IS_NATIVE_ANDROID = n.IS_OLD_ANDROID = n.ANDROID_VERSION = n.IS_ANDROID = n.IOS_VERSION = n.IS_IOS = n.IS_IPOD = n.IS_IPHONE = n.IS_IPAD = void 0;
                var o = e(92),
                    i = r(o),
                    s = e(93),
                    a = r(s),
                    l = a["default"].navigator && a["default"].navigator.userAgent || "",
                    u = /AppleWebKit\/([\d.]+)/i.exec(l),
                    c = u ? parseFloat(u.pop()) : null,
                    p = n.IS_IPAD = /iPad/i.test(l),
                    d = n.IS_IPHONE = /iPhone/i.test(l) && !p,
                    f = n.IS_IPOD = /iPod/i.test(l),
                    h = (n.IS_IOS = d || p || f, n.IOS_VERSION = function() {
                        var e = l.match(/OS (\d+)_/i);
                        return e && e[1] ? e[1] : null
                    }(), n.IS_ANDROID = /Android/i.test(l)),
                    y = n.ANDROID_VERSION = function() {
                        var e = l.match(/Android (\d+)(?:\.(\d+))?(?:\.(\d+))*/i);
                        if (!e) return null;
                        var t = e[1] && parseFloat(e[1]),
                            n = e[2] && parseFloat(e[2]);
                        return t && n ? parseFloat(e[1] + "." + e[2]) : t ? t : null
                    }(),
                    v = (n.IS_OLD_ANDROID = h && /webkit/i.test(l) && 2.3 > y, n.IS_NATIVE_ANDROID = h && 5 > y && 537 > c, n.IS_FIREFOX = /Firefox/i.test(l), n.IS_EDGE = /Edge/i.test(l));
                n.IS_CHROME = !v && /Chrome/i.test(l), n.IS_IE8 = /MSIE\s8\.0/.test(l), n.IE_VERSION = function(e) {
                    return e && parseFloat(e[1])
                }(/MSIE\s(\d+)\.\d/.exec(l)), n.TOUCH_ENABLED = !!("ontouchstart" in a["default"] || a["default"].DocumentTouch && i["default"] instanceof a["default"].DocumentTouch), n.BACKGROUND_SIZE_SUPPORTED = "backgroundSize" in i["default"].createElement("video").style
            }, {
                92: 92,
                93: 93
            }],
            79: [function(e, t, n) {
                function r(e, t) {
                    var n = 0,
                        r = void 0,
                        i = void 0;
                    if (!t) return 0;
                    e && e.length || (e = (0, o.createTimeRange)(0, 0));
                    for (var s = 0; s < e.length; s++) r = e.start(s), i = e.end(s), i > t && (i = t), n += i - r;
                    return n / t
                }
                n.__esModule = !0, n.bufferedPercent = r;
                var o = e(88)
            }, {
                88: 88
            }],
            80: [function(e, t, n) {
                function r(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function o(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function i(e, t) {
                    return e.raw = t, e
                }

                function s(e) {
                    return "string" == typeof e && /\S/.test(e)
                }

                function a(e) {
                    if (/\s/.test(e)) throw new Error("class has illegal whitespace characters")
                }

                function l(e) {
                    return new RegExp("(^|\\s)" + e + "($|\\s)")
                }

                function u(e) {
                    return !!e && "object" === ("undefined" == typeof e ? "undefined" : M(e)) && 1 === e.nodeType
                }

                function c(e) {
                    return function(t, n) {
                        if (!s(t)) return N["default"][e](null);
                        s(n) && (n = N["default"].querySelector(n));
                        var r = u(n) ? n : N["default"];
                        return r[e] && r[e](t)
                    }
                }

                function p(e) {
                    return 0 === e.indexOf("#") && (e = e.slice(1)), N["default"].getElementById(e)
                }

                function d() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "div",
                        t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        r = N["default"].createElement(e);
                    return Object.getOwnPropertyNames(t).forEach(function(e) {
                        var n = t[e]; - 1 !== e.indexOf("aria-") || "role" === e || "type" === e ? (V["default"].warn((0, W["default"])(A, e, n)), r.setAttribute(e, n)) : r[e] = n
                    }), Object.getOwnPropertyNames(n).forEach(function(e) {
                        r.setAttribute(e, n[e])
                    }), r
                }

                function f(e, t) {
                    "undefined" == typeof e.textContent ? e.innerText = t : e.textContent = t
                }

                function h(e, t) {
                    t.firstChild ? t.insertBefore(e, t.firstChild) : t.appendChild(e)
                }

                function y(e) {
                    var t = e[$];
                    return t || (t = e[$] = U.newGUID()), q[t] || (q[t] = {}), q[t]
                }

                function v(e) {
                    var t = e[$];
                    return t ? !!Object.getOwnPropertyNames(q[t]).length : !1
                }

                function m(e) {
                    var t = e[$];
                    if (t) {
                        delete q[t];
                        try {
                            delete e[$]
                        } catch (n) {
                            e.removeAttribute ? e.removeAttribute($) : e[$] = null
                        }
                    }
                }

                function g(e, t) {
                    return a(t), e.classList ? e.classList.contains(t) : l(t).test(e.className)
                }

                function b(e, t) {
                    return e.classList ? e.classList.add(t) : g(e, t) || (e.className = (e.className + " " + t).trim()), e
                }

                function _(e, t) {
                    return e.classList ? e.classList.remove(t) : (a(t), e.className = e.className.split(/\s+/).filter(function(e) {
                        return e !== t
                    }).join(" ")), e
                }

                function w(e, t, n) {
                    var r = g(e, t);
                    return "function" == typeof n && (n = n(e, t)), "boolean" != typeof n && (n = !r), n !== r ? (n ? b(e, t) : _(e, t), e) : void 0
                }

                function C(e, t) {
                    Object.getOwnPropertyNames(t).forEach(function(n) {
                        var r = t[n];
                        null === r || "undefined" == typeof r || r === !1 ? e.removeAttribute(n) : e.setAttribute(n, r === !0 ? "" : r)
                    })
                }

                function T(e) {
                    var t = {},
                        n = ",autoplay,controls,loop,muted,default,";
                    if (e && e.attributes && e.attributes.length > 0)
                        for (var r = e.attributes, o = r.length - 1; o >= 0; o--) {
                            var i = r[o].name,
                                s = r[o].value;
                            ("boolean" == typeof e[i] || -1 !== n.indexOf("," + i + ",")) && (s = null !== s ? !0 : !1), t[i] = s
                        }
                    return t
                }

                function E() {
                    N["default"].body.focus(), N["default"].onselectstart = function() {
                        return !1
                    }
                }

                function x() {
                    N["default"].onselectstart = function() {
                        return !0
                    }
                }

                function O(e) {
                    var t = void 0;
                    if (e.getBoundingClientRect && e.parentNode && (t = e.getBoundingClientRect()), !t) return {
                        left: 0,
                        top: 0
                    };
                    var n = N["default"].documentElement,
                        r = N["default"].body,
                        o = n.clientLeft || r.clientLeft || 0,
                        i = D["default"].pageXOffset || r.scrollLeft,
                        s = t.left + i - o,
                        a = n.clientTop || r.clientTop || 0,
                        l = D["default"].pageYOffset || r.scrollTop,
                        u = t.top + l - a;
                    return {
                        left: Math.round(s),
                        top: Math.round(u)
                    }
                }

                function P(e, t) {
                    var n = {},
                        r = O(e),
                        o = e.offsetWidth,
                        i = e.offsetHeight,
                        s = r.top,
                        a = r.left,
                        l = t.pageY,
                        u = t.pageX;
                    return t.changedTouches && (u = t.changedTouches[0].pageX, l = t.changedTouches[0].pageY), n.y = Math.max(0, Math.min(1, (s - l + i) / i)), n.x = Math.max(0, Math.min(1, (u - a) / o)), n
                }

                function S(e) {
                    return !!e && "object" === ("undefined" == typeof e ? "undefined" : M(e)) && 3 === e.nodeType
                }

                function j(e) {
                    for (; e.firstChild;) e.removeChild(e.firstChild);
                    return e
                }

                function k(e) {
                    return "function" == typeof e && (e = e()), (Array.isArray(e) ? e : [e]).map(function(e) {
                        return "function" == typeof e && (e = e()), u(e) || S(e) ? e : "string" == typeof e && /\S/.test(e) ? N["default"].createTextNode(e) : void 0
                    }).filter(function(e) {
                        return e
                    })
                }

                function I(e, t) {
                    return k(t).forEach(function(t) {
                        return e.appendChild(t)
                    }), e
                }

                function R(e, t) {
                    return I(j(e), t)
                }
                n.__esModule = !0, n.$$ = n.$ = void 0;
                var M = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    A = i(["Setting attributes in the second argument of createEl()\n                has been deprecated. Use the third argument instead.\n                createEl(type, properties, attributes). Attempting to set ", " to ", "."], ["Setting attributes in the second argument of createEl()\n                has been deprecated. Use the third argument instead.\n                createEl(type, properties, attributes). Attempting to set ", " to ", "."]);
                n.isEl = u, n.getEl = p, n.createEl = d, n.textContent = f, n.insertElFirst = h, n.getElData = y, n.hasElData = v, n.removeElData = m, n.hasElClass = g, n.addElClass = b, n.removeElClass = _, n.toggleElClass = w, n.setElAttributes = C, n.getElAttributes = T, n.blockTextSelection = E, n.unblockTextSelection = x, n.findElPosition = O, n.getPointerPosition = P, n.isTextNode = S, n.emptyEl = j, n.normalizeContent = k, n.appendContent = I, n.insertContent = R;
                var L = e(92),
                    N = o(L),
                    B = e(93),
                    D = o(B),
                    F = e(84),
                    U = r(F),
                    H = e(85),
                    V = o(H),
                    z = e(146),
                    W = o(z),
                    q = {},
                    $ = "vdata" + (new Date).getTime();
                n.$ = c("querySelector"), n.$$ = c("querySelectorAll")
            }, {
                146: 146,
                84: 84,
                85: 85,
                92: 92,
                93: 93
            }],
            81: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e, t) {
                    var n = f.getElData(e);
                    0 === n.handlers[t].length && (delete n.handlers[t], e.removeEventListener ? e.removeEventListener(t, n.dispatcher, !1) : e.detachEvent && e.detachEvent("on" + t, n.dispatcher)), Object.getOwnPropertyNames(n.handlers).length <= 0 && (delete n.handlers, delete n.dispatcher, delete n.disabled), 0 === Object.getOwnPropertyNames(n).length && f.removeElData(e)
                }

                function s(e, t, n, r) {
                    n.forEach(function(n) {
                        e(t, n, r)
                    })
                }

                function a(e) {
                    function t() {
                        return !0
                    }

                    function n() {
                        return !1
                    }
                    return e && e.isPropagationStopped || ! function() {
                        var r = e || b["default"].event;
                        e = {};
                        for (var o in r) "layerX" !== o && "layerY" !== o && "keyLocation" !== o && "webkitMovementX" !== o && "webkitMovementY" !== o && ("returnValue" === o && r.preventDefault || (e[o] = r[o]));
                        if (e.target || (e.target = e.srcElement || w["default"]), e.relatedTarget || (e.relatedTarget = e.fromElement === e.target ? e.toElement : e.fromElement), e.preventDefault = function() {
                                r.preventDefault && r.preventDefault(), e.returnValue = !1, r.returnValue = !1, e.defaultPrevented = !0
                            }, e.defaultPrevented = !1, e.stopPropagation = function() {
                                r.stopPropagation && r.stopPropagation(), e.cancelBubble = !0, r.cancelBubble = !0, e.isPropagationStopped = t
                            }, e.isPropagationStopped = n, e.stopImmediatePropagation = function() {
                                r.stopImmediatePropagation && r.stopImmediatePropagation(), e.isImmediatePropagationStopped = t, e.stopPropagation()
                            }, e.isImmediatePropagationStopped = n, null !== e.clientX && void 0 !== e.clientX) {
                            var i = w["default"].documentElement,
                                s = w["default"].body;
                            e.pageX = e.clientX + (i && i.scrollLeft || s && s.scrollLeft || 0) - (i && i.clientLeft || s && s.clientLeft || 0), e.pageY = e.clientY + (i && i.scrollTop || s && s.scrollTop || 0) - (i && i.clientTop || s && s.clientTop || 0)
                        }
                        e.which = e.charCode || e.keyCode, null !== e.button && void 0 !== e.button && (e.button = 1 & e.button ? 0 : 4 & e.button ? 1 : 2 & e.button ? 2 : 0)
                    }(), e
                }

                function l(e, t, n) {
                    if (Array.isArray(t)) return s(l, e, t, n);
                    var r = f.getElData(e);
                    r.handlers || (r.handlers = {}), r.handlers[t] || (r.handlers[t] = []), n.guid || (n.guid = y.newGUID()), r.handlers[t].push(n), r.dispatcher || (r.disabled = !1, r.dispatcher = function(t, n) {
                        if (!r.disabled) {
                            t = a(t);
                            var o = r.handlers[t.type];
                            if (o)
                                for (var i = o.slice(0), s = 0, l = i.length; l > s && !t.isImmediatePropagationStopped(); s++) try {
                                    i[s].call(e, t, n)
                                } catch (u) {
                                    m["default"].error(u)
                                }
                        }
                    }), 1 === r.handlers[t].length && (e.addEventListener ? e.addEventListener(t, r.dispatcher, !1) : e.attachEvent && e.attachEvent("on" + t, r.dispatcher))
                }

                function u(e, t, n) {
                    if (f.hasElData(e)) {
                        var r = f.getElData(e);
                        if (r.handlers) {
                            if (Array.isArray(t)) return s(u, e, t, n);
                            var o = function(t) {
                                r.handlers[t] = [], i(e, t)
                            };
                            if (t) {
                                var a = r.handlers[t];
                                if (a) {
                                    if (!n) return void o(t);
                                    if (n.guid)
                                        for (var l = 0; l < a.length; l++) a[l].guid === n.guid && a.splice(l--, 1);
                                    i(e, t)
                                }
                            } else
                                for (var c in r.handlers) o(c)
                        }
                    }
                }

                function c(e, t, n) {
                    var r = f.hasElData(e) ? f.getElData(e) : {},
                        o = e.parentNode || e.ownerDocument;
                    if ("string" == typeof t && (t = {
                            type: t,
                            target: e
                        }), t = a(t), r.dispatcher && r.dispatcher.call(e, t, n), o && !t.isPropagationStopped() && t.bubbles === !0) c.call(null, o, t, n);
                    else if (!o && !t.defaultPrevented) {
                        var i = f.getElData(t.target);
                        t.target[t.type] && (i.disabled = !0, "function" == typeof t.target[t.type] && t.target[t.type](), i.disabled = !1)
                    }
                    return !t.defaultPrevented
                }

                function p(e, t, n) {
                    if (Array.isArray(t)) return s(p, e, t, n);
                    var r = function o() {
                        u(e, t, o), n.apply(this, arguments)
                    };
                    r.guid = n.guid = n.guid || y.newGUID(), l(e, t, r)
                }
                n.__esModule = !0, n.fixEvent = a, n.on = l, n.off = u, n.trigger = c, n.one = p;
                var d = e(80),
                    f = o(d),
                    h = e(84),
                    y = o(h),
                    v = e(85),
                    m = r(v),
                    g = e(93),
                    b = r(g),
                    _ = e(92),
                    w = r(_)
            }, {
                80: 80,
                84: 84,
                85: 85,
                92: 92,
                93: 93
            }],
            82: [function(e, t, n) {
                n.__esModule = !0, n.bind = void 0;
                var r = e(84);
                n.bind = function(e, t, n) {
                    t.guid || (t.guid = (0, r.newGUID)());
                    var o = function() {
                        return t.apply(e, arguments)
                    };
                    return o.guid = n ? n + "_" + t.guid : t.guid, o
                }
            }, {
                84: 84
            }],
            83: [function(e, t, n) {
                function r(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : e;
                    e = 0 > e ? 0 : e;
                    var n = Math.floor(e % 60),
                        r = Math.floor(e / 60 % 60),
                        o = Math.floor(e / 3600),
                        i = Math.floor(t / 60 % 60),
                        s = Math.floor(t / 3600);
                    return (isNaN(e) || e === 1 / 0) && (o = r = n = "-"), o = o > 0 || s > 0 ? o + ":" : "", r = ((o || i >= 10) && 10 > r ? "0" + r : r) + ":", n = 10 > n ? "0" + n : n, o + r + n
                }
                n.__esModule = !0, n["default"] = r
            }, {}],
            84: [function(e, t, n) {
                function r() {
                    return o++
                }
                n.__esModule = !0, n.newGUID = r;
                var o = 1
            }, {}],
            85: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0, n.logByType = void 0;
                var o = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    i = e(93),
                    s = r(i),
                    a = e(78),
                    l = void 0,
                    u = n.logByType = function(e, t) {
                        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : !!a.IE_VERSION && a.IE_VERSION < 11;
                        "log" !== e && t.unshift(e.toUpperCase() + ":"), l.history.push(t), t.unshift("VIDEOJS:");
                        var r = s["default"].console && s["default"].console[e];
                        r && (n && (t = t.map(function(e) {
                            if (e && "object" === ("undefined" == typeof e ? "undefined" : o(e)) || Array.isArray(e)) try {
                                return JSON.stringify(e)
                            } catch (t) {
                                return String(e)
                            }
                            return String(e)
                        }).join(" ")), r.apply || r(t))
                    };
                l = function() {
                    for (var e = arguments.length, t = Array(e), n = 0; e > n; n++) t[n] = arguments[n];
                    u("log", t)
                }, l.history = [], l.error = function() {
                    for (var e = arguments.length, t = Array(e), n = 0; e > n; n++) t[n] = arguments[n];
                    return u("error", t)
                }, l.warn = function() {
                    for (var e = arguments.length, t = Array(e), n = 0; e > n; n++) t[n] = arguments[n];
                    return u("warn", t)
                }, n["default"] = l
            }, {
                78: 78,
                93: 93
            }],
            86: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e) {
                    return !!e && "object" === ("undefined" == typeof e ? "undefined" : a(e)) && "[object Object]" === e.toString() && e.constructor === Object
                }

                function i(e, t) {
                    return o(t) ? o(e) ? void 0 : s(t) : t
                }

                function s() {
                    var e = Array.prototype.slice.call(arguments);
                    return e.unshift({}), e.push(i), u["default"].apply(null, e), e[0]
                }
                n.__esModule = !0;
                var a = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                    return typeof e
                } : function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                };
                n["default"] = s;
                var l = e(131),
                    u = r(l)
            }, {
                131: 131
            }],
            87: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0, n.setTextContent = n.createStyleElement = void 0;
                var o = e(92),
                    i = r(o);
                n.createStyleElement = function(e) {
                    var t = i["default"].createElement("style");
                    return t.className = e, t
                }, n.setTextContent = function(e, t) {
                    e.styleSheet ? e.styleSheet.cssText = t : e.textContent = t
                }
            }, {
                92: 92
            }],
            88: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function o(e, t, n) {
                    if (0 > t || t > n) throw new Error("Failed to execute '" + e + "' on 'TimeRanges': The index provided (" + t + ") is greater than or equal to the maximum bound (" + n + ").")
                }

                function i(e, t, n, r) {
                    return void 0 === r && (u["default"].warn("DEPRECATED: Function '" + e + "' on 'TimeRanges' called without an index argument."), r = 0), o(e, r, n.length - 1), n[r][t]
                }

                function s(e) {
                    return void 0 === e || 0 === e.length ? {
                        length: 0,
                        start: function() {
                            throw new Error("This TimeRanges object is empty")
                        },
                        end: function() {
                            throw new Error("This TimeRanges object is empty")
                        }
                    } : {
                        length: e.length,
                        start: i.bind(null, "start", 0, e),
                        end: i.bind(null, "end", 1, e)
                    }
                }

                function a(e, t) {
                    return Array.isArray(e) ? s(e) : void 0 === e || void 0 === t ? s() : s([
                        [e, t]
                    ])
                }
                n.__esModule = !0, n.createTimeRange = void 0, n.createTimeRanges = a;
                var l = e(85),
                    u = r(l);
                n.createTimeRange = a
            }, {
                85: 85
            }],
            89: [function(e, t, n) {
                function r(e) {
                    return e.charAt(0).toUpperCase() + e.slice(1)
                }
                n.__esModule = !0, n["default"] = r
            }, {}],
            90: [function(e, t, n) {
                function r(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }
                n.__esModule = !0, n.isCrossOrigin = n.getFileExtension = n.getAbsoluteURL = n.parseUrl = void 0;
                var o = e(92),
                    i = r(o),
                    s = e(93),
                    a = r(s),
                    l = n.parseUrl = function(e) {
                        var t = ["protocol", "hostname", "port", "pathname", "search", "hash", "host"],
                            n = i["default"].createElement("a");
                        n.href = e;
                        var r = "" === n.host && "file:" !== n.protocol,
                            o = void 0;
                        r && (o = i["default"].createElement("div"), o.innerHTML = '<a href="' + e + '"></a>', n = o.firstChild, o.setAttribute("style", "display:none; position:absolute;"), i["default"].body.appendChild(o));
                        for (var s = {}, a = 0; a < t.length; a++) s[t[a]] = n[t[a]];
                        return "http:" === s.protocol && (s.host = s.host.replace(/:80$/, "")), "https:" === s.protocol && (s.host = s.host.replace(/:443$/, "")), r && i["default"].body.removeChild(o), s
                    };
                n.getAbsoluteURL = function(e) {
                    if (!e.match(/^https?:\/\//)) {
                        var t = i["default"].createElement("div");
                        t.innerHTML = '<a href="' + e + '">x</a>', e = t.firstChild.href
                    }
                    return e
                }, n.getFileExtension = function(e) {
                    if ("string" == typeof e) {
                        var t = /^(\/?)([\s\S]*?)((?:\.{1,2}|[^\/]+?)(\.([^\.\/\?]+)))(?:[\/]*|[\?].*)$/i,
                            n = t.exec(e);
                        if (n) return n.pop().toLowerCase()
                    }
                    return ""
                }, n.isCrossOrigin = function(e) {
                    var t = a["default"].location,
                        n = l(e),
                        r = ":" === n.protocol ? t.protocol : n.protocol,
                        o = r + n.host !== t.protocol + t.host;
                    return o
                }
            }, {
                92: 92,
                93: 93
            }],
            91: [function(t, n, r) {
                function o(e) {
                    if (e && e.__esModule) return e;
                    var t = {};
                    if (null != e)
                        for (var n in e) Object.prototype.hasOwnProperty.call(e, n) && (t[n] = e[n]);
                    return t["default"] = e, t
                }

                function i(e) {
                    return e && e.__esModule ? e : {
                        "default": e
                    }
                }

                function s(e, t, n) {
                    var r = void 0;
                    if ("string" == typeof e) {
                        if (0 === e.indexOf("#") && (e = e.slice(1)), s.getPlayers()[e]) return t && F["default"].warn('Player "' + e + '" is already initialised. Options will not be applied.'), n && s.getPlayers()[e].ready(n), s.getPlayers()[e];
                        r = H.getEl(e)
                    } else r = e;
                    if (!r || !r.nodeName) throw new TypeError("The element or ID supplied is not valid. (videojs)");
                    return r.player || C["default"].players[r.playerId] || new C["default"](r, t, n)
                }
                r.__esModule = !0;
                var a = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    },
                    l = t(93),
                    u = i(l),
                    c = t(92),
                    p = i(c),
                    d = t(56),
                    f = o(d),
                    h = t(87),
                    y = (o(h), t(5)),
                    v = i(y),
                    m = t(42),
                    g = i(m),
                    b = t(81),
                    _ = o(b),
                    w = t(51),
                    C = i(w),
                    T = t(52),
                    E = i(T),
                    x = t(86),
                    O = i(x),
                    P = t(82),
                    S = o(P),
                    j = t(72),
                    k = i(j),
                    I = t(64),
                    R = i(I),
                    M = t(77),
                    A = i(M),
                    L = t(88),
                    N = t(83),
                    B = i(N),
                    D = t(85),
                    F = i(D),
                    U = t(80),
                    H = o(U),
                    V = t(78),
                    z = o(V),
                    W = t(90),
                    q = o(W),
                    $ = t(43),
                    X = i($),
                    G = t(131),
                    Y = i(G),
                    Z = t(147),
                    K = i(Z),
                    J = t(62),
                    Q = i(J);
                "undefined" == typeof HTMLVideoElement && u["default"].document && u["default"].document.createElement && (p["default"].createElement("video"), p["default"].createElement("audio"), p["default"].createElement("track")), u["default"].VIDEOJS_NO_DYNAMIC_STYLE !== !0, f.autoSetupTimeout(1, s), s.VERSION = "5.12.6", s.options = C["default"].prototype.options_, s.getPlayers = function() {
                    return C["default"].players
                }, s.players = C["default"].players, s.getComponent = v["default"].getComponent, s.registerComponent = function(e, t) {
                    Q["default"].isTech(t) && F["default"].warn("The " + e + " tech was registered as a component. It should instead be registered using videojs.registerTech(name, tech)"), v["default"].registerComponent.call(v["default"], e, t)
                }, s.getTech = Q["default"].getTech, s.registerTech = Q["default"].registerTech, s.browser = z, s.TOUCH_ENABLED = z.TOUCH_ENABLED, s.extend = X["default"], s.mergeOptions = O["default"], s.bind = S.bind, s.plugin = E["default"], s.addLanguage = function(e, t) {
                    var n;
                    return e = ("" + e).toLowerCase(), (0, Y["default"])(s.options.languages, (n = {}, n[e] = t, n))[e]
                }, s.log = F["default"], s.createTimeRange = s.createTimeRanges = L.createTimeRanges, s.formatTime = B["default"], s.parseUrl = q.parseUrl, s.isCrossOrigin = q.isCrossOrigin, s.EventTarget = g["default"], s.on = _.on, s.one = _.one, s.off = _.off, s.trigger = _.trigger, s.xhr = K["default"], s.TextTrack = k["default"], s.AudioTrack = R["default"], s.VideoTrack = A["default"], s.isEl = H.isEl, s.isTextNode = H.isTextNode, s.createEl = H.createEl, s.hasClass = H.hasElClass, s.addClass = H.addElClass, s.removeClass = H.removeElClass, s.toggleClass = H.toggleElClass, s.setAttributes = H.setElAttributes, s.getAttributes = H.getElAttributes, s.emptyEl = H.emptyEl, s.appendContent = H.appendContent, s.insertContent = H.insertContent, "function" == typeof e && e.amd ? e("videojs", [], function() {
                    return s
                }) : "object" === ("undefined" == typeof r ? "undefined" : a(r)) && "object" === ("undefined" == typeof n ? "undefined" : a(n)) && (n.exports = s), r["default"] = s, window.videojs = window.videojs || s
            }, {
                131: 131,
                147: 147,
                42: 42,
                43: 43,
                5: 5,
                51: 51,
                52: 52,
                56: 56,
                62: 62,
                64: 64,
                72: 72,
                77: 77,
                78: 78,
                80: 80,
                81: 81,
                82: 82,
                83: 83,
                85: 85,
                86: 86,
                87: 87,
                88: 88,
                90: 90,
                92: 92,
                93: 93
            }],
            92: [function(e, t, n) {
                (function(n) {
                    var r = "undefined" != typeof n ? n : "undefined" != typeof window ? window : {},
                        o = e(94);
                    if ("undefined" != typeof document) t.exports = document;
                    else {
                        var i = r["__GLOBAL_DOCUMENT_CACHE@4"];
                        i || (i = r["__GLOBAL_DOCUMENT_CACHE@4"] = o), t.exports = i
                    }
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
            }, {
                94: 94
            }],
            93: [function(e, t, n) {
                (function(e) {
                    "undefined" != typeof window ? t.exports = window : "undefined" != typeof e ? t.exports = e : "undefined" != typeof self ? t.exports = self : t.exports = {}
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {})
            }, {}],
            94: [function(e, t, n) {}, {}],
            95: [function(e, t, n) {
                var r = e(111),
                    o = r(Date, "now"),
                    i = o || function() {
                        return (new Date).getTime()
                    };
                t.exports = i
            }, {
                111: 111
            }],
            96: [function(e, t, n) {
                function r(e, t, n) {
                    function r() {
                        m && clearTimeout(m), f && clearTimeout(f), b = 0, f = m = g = void 0
                    }

                    function l(t, n) {
                        n && clearTimeout(n), f = m = g = void 0, t && (b = i(), h = e.apply(v, d), m || f || (d = v = void 0))
                    }

                    function u() {
                        var e = t - (i() - y);
                        0 >= e || e > t ? l(g, f) : m = setTimeout(u, e)
                    }

                    function c() {
                        l(w, m)
                    }

                    function p() {
                        if (d = arguments, y = i(), v = this, g = w && (m || !C), _ === !1) var n = C && !m;
                        else {
                            f || C || (b = y);
                            var r = _ - (y - b),
                                o = 0 >= r || r > _;
                            o ? (f && (f = clearTimeout(f)), b = y, h = e.apply(v, d)) : f || (f = setTimeout(c, r))
                        }
                        return o && m ? m = clearTimeout(m) : m || t === _ || (m = setTimeout(u, t)), n && (o = !0, h = e.apply(v, d)), !o || m || f || (d = v = void 0), h
                    }
                    var d, f, h, y, v, m, g, b = 0,
                        _ = !1,
                        w = !0;
                    if ("function" != typeof e) throw new TypeError(s);
                    if (t = 0 > t ? 0 : +t || 0, n === !0) {
                        var C = !0;
                        w = !1
                    } else o(n) && (C = !!n.leading, _ = "maxWait" in n && a(+n.maxWait || 0, t), w = "trailing" in n ? !!n.trailing : w);
                    return p.cancel = r, p
                }
                var o = e(124),
                    i = e(95),
                    s = "Expected a function",
                    a = Math.max;
                t.exports = r
            }, {
                124: 124,
                95: 95
            }],
            97: [function(e, t, n) {
                function r(e, t) {
                    if ("function" != typeof e) throw new TypeError(o);
                    return t = i(void 0 === t ? e.length - 1 : +t || 0, 0),
                        function() {
                            for (var n = arguments, r = -1, o = i(n.length - t, 0), s = Array(o); ++r < o;) s[r] = n[t + r];
                            switch (t) {
                                case 0:
                                    return e.call(this, s);
                                case 1:
                                    return e.call(this, n[0], s);
                                case 2:
                                    return e.call(this, n[0], n[1], s)
                            }
                            var a = Array(t + 1);
                            for (r = -1; ++r < t;) a[r] = n[r];
                            return a[t] = s, e.apply(this, a)
                        }
                }
                var o = "Expected a function",
                    i = Math.max;
                t.exports = r
            }, {}],
            98: [function(e, t, n) {
                function r(e, t, n) {
                    var r = !0,
                        a = !0;
                    if ("function" != typeof e) throw new TypeError(s);
                    return n === !1 ? r = !1 : i(n) && (r = "leading" in n ? !!n.leading : r, a = "trailing" in n ? !!n.trailing : a), o(e, t, {
                        leading: r,
                        maxWait: +t,
                        trailing: a
                    })
                }
                var o = e(96),
                    i = e(124),
                    s = "Expected a function";
                t.exports = r
            }, {
                124: 124,
                96: 96
            }],
            99: [function(e, t, n) {
                function r(e, t) {
                    var n = -1,
                        r = e.length;
                    for (t || (t = Array(r)); ++n < r;) t[n] = e[n];
                    return t
                }
                t.exports = r
            }, {}],
            100: [function(e, t, n) {
                function r(e, t) {
                    for (var n = -1, r = e.length; ++n < r && t(e[n], n, e) !== !1;);
                    return e
                }
                t.exports = r
            }, {}],
            101: [function(e, t, n) {
                function r(e, t, n) {
                    n || (n = {});
                    for (var r = -1, o = t.length; ++r < o;) {
                        var i = t[r];
                        n[i] = e[i]
                    }
                    return n
                }
                t.exports = r
            }, {}],
            102: [function(e, t, n) {
                var r = e(109),
                    o = r();
                t.exports = o
            }, {
                109: 109
            }],
            103: [function(e, t, n) {
                function r(e, t) {
                    return o(e, t, i)
                }
                var o = e(102),
                    i = e(130);
                t.exports = r
            }, {
                102: 102,
                130: 130
            }],
            104: [function(e, t, n) {
                function r(e, t, n, d, f) {
                    if (!l(e)) return e;
                    var h = a(t) && (s(t) || c(t)),
                        y = h ? void 0 : p(t);
                    return o(y || t, function(o, s) {
                        if (y && (s = o, o = t[s]), u(o)) d || (d = []), f || (f = []), i(e, t, s, r, n, d, f);
                        else {
                            var a = e[s],
                                l = n ? n(a, o, s, e, t) : void 0,
                                c = void 0 === l;
                            c && (l = o), void 0 === l && (!h || s in e) || !c && (l === l ? l === a : a !== a) || (e[s] = l)
                        }
                    }), e
                }
                var o = e(100),
                    i = e(105),
                    s = e(121),
                    a = e(112),
                    l = e(124),
                    u = e(117),
                    c = e(127),
                    p = e(129);
                t.exports = r
            }, {
                100: 100,
                105: 105,
                112: 112,
                117: 117,
                121: 121,
                124: 124,
                127: 127,
                129: 129
            }],
            105: [function(e, t, n) {
                function r(e, t, n, r, p, d, f) {
                    for (var h = d.length, y = t[n]; h--;)
                        if (d[h] == y) return void(e[n] = f[h]);
                    var v = e[n],
                        m = p ? p(v, y, n, e, t) : void 0,
                        g = void 0 === m;
                    g && (m = y, a(y) && (s(y) || u(y)) ? m = s(v) ? v : a(v) ? o(v) : [] : l(y) || i(y) ? m = i(v) ? c(v) : l(v) ? v : {} : g = !1), d.push(y), f.push(m), g ? e[n] = r(m, y, p, d, f) : (m === m ? m !== v : v === v) && (e[n] = m)
                }
                var o = e(99),
                    i = e(120),
                    s = e(121),
                    a = e(112),
                    l = e(125),
                    u = e(127),
                    c = e(128);
                t.exports = r
            }, {
                112: 112,
                120: 120,
                121: 121,
                125: 125,
                127: 127,
                128: 128,
                99: 99
            }],
            106: [function(e, t, n) {
                function r(e) {
                    return function(t) {
                        return null == t ? void 0 : o(t)[e]
                    }
                }
                var o = e(119);
                t.exports = r
            }, {
                119: 119
            }],
            107: [function(e, t, n) {
                function r(e, t, n) {
                    if ("function" != typeof e) return o;
                    if (void 0 === t) return e;
                    switch (n) {
                        case 1:
                            return function(n) {
                                return e.call(t, n)
                            };
                        case 3:
                            return function(n, r, o) {
                                return e.call(t, n, r, o)
                            };
                        case 4:
                            return function(n, r, o, i) {
                                return e.call(t, n, r, o, i)
                            };
                        case 5:
                            return function(n, r, o, i, s) {
                                return e.call(t, n, r, o, i, s)
                            }
                    }
                    return function() {
                        return e.apply(t, arguments)
                    }
                }
                var o = e(133);
                t.exports = r
            }, {
                133: 133
            }],
            108: [function(e, t, n) {
                function r(e) {
                    return s(function(t, n) {
                        var r = -1,
                            s = null == t ? 0 : n.length,
                            a = s > 2 ? n[s - 2] : void 0,
                            l = s > 2 ? n[2] : void 0,
                            u = s > 1 ? n[s - 1] : void 0;
                        for ("function" == typeof a ? (a = o(a, u, 5), s -= 2) : (a = "function" == typeof u ? u : void 0, s -= a ? 1 : 0), l && i(n[0], n[1], l) && (a = 3 > s ? void 0 : a, s = 1); ++r < s;) {
                            var c = n[r];
                            c && e(t, c, a)
                        }
                        return t
                    })
                }
                var o = e(107),
                    i = e(115),
                    s = e(97);
                t.exports = r
            }, {
                107: 107,
                115: 115,
                97: 97
            }],
            109: [function(e, t, n) {
                function r(e) {
                    return function(t, n, r) {
                        for (var i = o(t), s = r(t), a = s.length, l = e ? a : -1; e ? l-- : ++l < a;) {
                            var u = s[l];
                            if (n(i[u], u, i) === !1) break
                        }
                        return t
                    }
                }
                var o = e(119);
                t.exports = r
            }, {
                119: 119
            }],
            110: [function(e, t, n) {
                var r = e(106),
                    o = r("length");
                t.exports = o
            }, {
                106: 106
            }],
            111: [function(e, t, n) {
                function r(e, t) {
                    var n = null == e ? void 0 : e[t];
                    return o(n) ? n : void 0;
                }
                var o = e(123);
                t.exports = r
            }, {
                123: 123
            }],
            112: [function(e, t, n) {
                function r(e) {
                    return null != e && i(o(e))
                }
                var o = e(110),
                    i = e(116);
                t.exports = r
            }, {
                110: 110,
                116: 116
            }],
            113: [function(e, t, n) {
                var r = function() {
                    try {
                        Object({
                            toString: 0
                        } + "")
                    } catch (e) {
                        return function() {
                            return !1
                        }
                    }
                    return function(e) {
                        return "function" != typeof e.toString && "string" == typeof(e + "")
                    }
                }();
                t.exports = r
            }, {}],
            114: [function(e, t, n) {
                function r(e, t) {
                    return e = "number" == typeof e || o.test(e) ? +e : -1, t = null == t ? i : t, e > -1 && e % 1 == 0 && t > e
                }
                var o = /^\d+$/,
                    i = 9007199254740991;
                t.exports = r
            }, {}],
            115: [function(e, t, n) {
                function r(e, t, n) {
                    if (!s(n)) return !1;
                    var r = typeof t;
                    if ("number" == r ? o(n) && i(t, n.length) : "string" == r && t in n) {
                        var a = n[t];
                        return e === e ? e === a : a !== a
                    }
                    return !1
                }
                var o = e(112),
                    i = e(114),
                    s = e(124);
                t.exports = r
            }, {
                112: 112,
                114: 114,
                124: 124
            }],
            116: [function(e, t, n) {
                function r(e) {
                    return "number" == typeof e && e > -1 && e % 1 == 0 && o >= e
                }
                var o = 9007199254740991;
                t.exports = r
            }, {}],
            117: [function(e, t, n) {
                function r(e) {
                    return !!e && "object" == typeof e
                }
                t.exports = r
            }, {}],
            118: [function(e, t, n) {
                function r(e) {
                    for (var t = u(e), n = t.length, r = n && e.length, c = !!r && a(r) && (i(e) || o(e) || l(e)), d = -1, f = []; ++d < n;) {
                        var h = t[d];
                        (c && s(h, r) || p.call(e, h)) && f.push(h)
                    }
                    return f
                }
                var o = e(120),
                    i = e(121),
                    s = e(114),
                    a = e(116),
                    l = e(126),
                    u = e(130),
                    c = Object.prototype,
                    p = c.hasOwnProperty;
                t.exports = r
            }, {
                114: 114,
                116: 116,
                120: 120,
                121: 121,
                126: 126,
                130: 130
            }],
            119: [function(e, t, n) {
                function r(e) {
                    if (s.unindexedChars && i(e)) {
                        for (var t = -1, n = e.length, r = Object(e); ++t < n;) r[t] = e.charAt(t);
                        return r
                    }
                    return o(e) ? e : Object(e)
                }
                var o = e(124),
                    i = e(126),
                    s = e(132);
                t.exports = r
            }, {
                124: 124,
                126: 126,
                132: 132
            }],
            120: [function(e, t, n) {
                function r(e) {
                    return i(e) && o(e) && a.call(e, "callee") && !l.call(e, "callee")
                }
                var o = e(112),
                    i = e(117),
                    s = Object.prototype,
                    a = s.hasOwnProperty,
                    l = s.propertyIsEnumerable;
                t.exports = r
            }, {
                112: 112,
                117: 117
            }],
            121: [function(e, t, n) {
                var r = e(111),
                    o = e(116),
                    i = e(117),
                    s = "[object Array]",
                    a = Object.prototype,
                    l = a.toString,
                    u = r(Array, "isArray"),
                    c = u || function(e) {
                        return i(e) && o(e.length) && l.call(e) == s
                    };
                t.exports = c
            }, {
                111: 111,
                116: 116,
                117: 117
            }],
            122: [function(e, t, n) {
                function r(e) {
                    return o(e) && a.call(e) == i
                }
                var o = e(124),
                    i = "[object Function]",
                    s = Object.prototype,
                    a = s.toString;
                t.exports = r
            }, {
                124: 124
            }],
            123: [function(e, t, n) {
                function r(e) {
                    return null == e ? !1 : o(e) ? p.test(u.call(e)) : s(e) && (i(e) ? p : a).test(e)
                }
                var o = e(122),
                    i = e(113),
                    s = e(117),
                    a = /^\[object .+?Constructor\]$/,
                    l = Object.prototype,
                    u = Function.prototype.toString,
                    c = l.hasOwnProperty,
                    p = RegExp("^" + u.call(c).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");
                t.exports = r
            }, {
                113: 113,
                117: 117,
                122: 122
            }],
            124: [function(e, t, n) {
                function r(e) {
                    var t = typeof e;
                    return !!e && ("object" == t || "function" == t)
                }
                t.exports = r
            }, {}],
            125: [function(e, t, n) {
                function r(e) {
                    var t;
                    if (!a(e) || d.call(e) != u || s(e) || i(e) || !p.call(e, "constructor") && (t = e.constructor, "function" == typeof t && !(t instanceof t))) return !1;
                    var n;
                    return l.ownLast ? (o(e, function(e, t, r) {
                        return n = p.call(r, t), !1
                    }), n !== !1) : (o(e, function(e, t) {
                        n = t
                    }), void 0 === n || p.call(e, n))
                }
                var o = e(103),
                    i = e(120),
                    s = e(113),
                    a = e(117),
                    l = e(132),
                    u = "[object Object]",
                    c = Object.prototype,
                    p = c.hasOwnProperty,
                    d = c.toString;
                t.exports = r
            }, {
                103: 103,
                113: 113,
                117: 117,
                120: 120,
                132: 132
            }],
            126: [function(e, t, n) {
                function r(e) {
                    return "string" == typeof e || o(e) && a.call(e) == i
                }
                var o = e(117),
                    i = "[object String]",
                    s = Object.prototype,
                    a = s.toString;
                t.exports = r
            }, {
                117: 117
            }],
            127: [function(e, t, n) {
                function r(e) {
                    return i(e) && o(e.length) && !!j[I.call(e)]
                }
                var o = e(116),
                    i = e(117),
                    s = "[object Arguments]",
                    a = "[object Array]",
                    l = "[object Boolean]",
                    u = "[object Date]",
                    c = "[object Error]",
                    p = "[object Function]",
                    d = "[object Map]",
                    f = "[object Number]",
                    h = "[object Object]",
                    y = "[object RegExp]",
                    v = "[object Set]",
                    m = "[object String]",
                    g = "[object WeakMap]",
                    b = "[object ArrayBuffer]",
                    _ = "[object Float32Array]",
                    w = "[object Float64Array]",
                    C = "[object Int8Array]",
                    T = "[object Int16Array]",
                    E = "[object Int32Array]",
                    x = "[object Uint8Array]",
                    O = "[object Uint8ClampedArray]",
                    P = "[object Uint16Array]",
                    S = "[object Uint32Array]",
                    j = {};
                j[_] = j[w] = j[C] = j[T] = j[E] = j[x] = j[O] = j[P] = j[S] = !0, j[s] = j[a] = j[b] = j[l] = j[u] = j[c] = j[p] = j[d] = j[f] = j[h] = j[y] = j[v] = j[m] = j[g] = !1;
                var k = Object.prototype,
                    I = k.toString;
                t.exports = r
            }, {
                116: 116,
                117: 117
            }],
            128: [function(e, t, n) {
                function r(e) {
                    return o(e, i(e))
                }
                var o = e(101),
                    i = e(130);
                t.exports = r
            }, {
                101: 101,
                130: 130
            }],
            129: [function(e, t, n) {
                var r = e(111),
                    o = e(112),
                    i = e(124),
                    s = e(118),
                    a = e(132),
                    l = r(Object, "keys"),
                    u = l ? function(e) {
                        var t = null == e ? void 0 : e.constructor;
                        return "function" == typeof t && t.prototype === e || ("function" == typeof e ? a.enumPrototypes : o(e)) ? s(e) : i(e) ? l(e) : []
                    } : s;
                t.exports = u
            }, {
                111: 111,
                112: 112,
                118: 118,
                124: 124,
                132: 132
            }],
            130: [function(e, t, n) {
                function r(e) {
                    if (null == e) return [];
                    c(e) || (e = Object(e));
                    var t = e.length;
                    t = t && u(t) && (s(e) || i(e) || p(e)) && t || 0;
                    for (var n = e.constructor, r = -1, o = a(n) && n.prototype || E, f = o === e, h = Array(t), y = t > 0, m = d.enumErrorProps && (e === T || e instanceof Error), g = d.enumPrototypes && a(e); ++r < t;) h[r] = r + "";
                    for (var _ in e) g && "prototype" == _ || m && ("message" == _ || "name" == _) || y && l(_, t) || "constructor" == _ && (f || !O.call(e, _)) || h.push(_);
                    if (d.nonEnumShadows && e !== E) {
                        var j = e === x ? w : e === T ? v : P.call(e),
                            k = S[j] || S[b];
                        for (j == b && (o = E), t = C.length; t--;) {
                            _ = C[t];
                            var I = k[_];
                            f && I || (I ? !O.call(e, _) : e[_] === o[_]) || h.push(_)
                        }
                    }
                    return h
                }
                var o = e(100),
                    i = e(120),
                    s = e(121),
                    a = e(122),
                    l = e(114),
                    u = e(116),
                    c = e(124),
                    p = e(126),
                    d = e(132),
                    f = "[object Array]",
                    h = "[object Boolean]",
                    y = "[object Date]",
                    v = "[object Error]",
                    m = "[object Function]",
                    g = "[object Number]",
                    b = "[object Object]",
                    _ = "[object RegExp]",
                    w = "[object String]",
                    C = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"],
                    T = Error.prototype,
                    E = Object.prototype,
                    x = String.prototype,
                    O = E.hasOwnProperty,
                    P = E.toString,
                    S = {};
                S[f] = S[y] = S[g] = {
                    constructor: !0,
                    toLocaleString: !0,
                    toString: !0,
                    valueOf: !0
                }, S[h] = S[w] = {
                    constructor: !0,
                    toString: !0,
                    valueOf: !0
                }, S[v] = S[m] = S[_] = {
                    constructor: !0,
                    toString: !0
                }, S[b] = {
                    constructor: !0
                }, o(C, function(e) {
                    for (var t in S)
                        if (O.call(S, t)) {
                            var n = S[t];
                            n[e] = O.call(n, e)
                        }
                }), t.exports = r
            }, {
                100: 100,
                114: 114,
                116: 116,
                120: 120,
                121: 121,
                122: 122,
                124: 124,
                126: 126,
                132: 132
            }],
            131: [function(e, t, n) {
                var r = e(104),
                    o = e(108),
                    i = o(r);
                t.exports = i
            }, {
                104: 104,
                108: 108
            }],
            132: [function(e, t, n) {
                var r = Array.prototype,
                    o = Error.prototype,
                    i = Object.prototype,
                    s = i.propertyIsEnumerable,
                    a = r.splice,
                    l = {};
                ! function(e) {
                    var t = function() {
                            this.x = e
                        },
                        n = {
                            0: e,
                            length: e
                        },
                        r = [];
                    t.prototype = {
                        valueOf: e,
                        y: e
                    };
                    for (var i in new t) r.push(i);
                    l.enumErrorProps = s.call(o, "message") || s.call(o, "name"), l.enumPrototypes = s.call(t, "prototype"), l.nonEnumShadows = !/valueOf/.test(r), l.ownLast = "x" != r[0], l.spliceObjects = (a.call(n, 0, 1), !n[0]), l.unindexedChars = "x" [0] + Object("x")[0] != "xx"
                }(1, 0), t.exports = l
            }, {}],
            133: [function(e, t, n) {
                function r(e) {
                    return e
                }
                t.exports = r
            }, {}],
            134: [function(e, t, n) {
                var r = e(141);
                t.exports = function() {
                    if ("function" != typeof Symbol || "function" != typeof Object.getOwnPropertySymbols) return !1;
                    if ("symbol" == typeof Symbol.iterator) return !0;
                    var e = {},
                        t = Symbol("test"),
                        n = Object(t);
                    if ("string" == typeof t) return !1;
                    if ("[object Symbol]" !== Object.prototype.toString.call(t)) return !1;
                    if ("[object Symbol]" !== Object.prototype.toString.call(n)) return !1;
                    var o = 42;
                    e[t] = o;
                    for (t in e) return !1;
                    if (0 !== r(e).length) return !1;
                    if ("function" == typeof Object.keys && 0 !== Object.keys(e).length) return !1;
                    if ("function" == typeof Object.getOwnPropertyNames && 0 !== Object.getOwnPropertyNames(e).length) return !1;
                    var i = Object.getOwnPropertySymbols(e);
                    if (1 !== i.length || i[0] !== t) return !1;
                    if (!Object.prototype.propertyIsEnumerable.call(e, t)) return !1;
                    if ("function" == typeof Object.getOwnPropertyDescriptor) {
                        var s = Object.getOwnPropertyDescriptor(e, t);
                        if (s.value !== o || s.enumerable !== !0) return !1
                    }
                    return !0
                }
            }, {
                141: 141
            }],
            135: [function(e, t, n) {
                var r = e(141),
                    o = e(140),
                    i = function(e) {
                        return "undefined" != typeof e && null !== e
                    },
                    s = e(134)(),
                    a = Object,
                    l = o.call(Function.call, Array.prototype.push),
                    u = o.call(Function.call, Object.prototype.propertyIsEnumerable),
                    c = s ? Object.getOwnPropertySymbols : null;
                t.exports = function(e, t) {
                    if (!i(e)) throw new TypeError("target must be an object");
                    var n, o, p, d, f, h, y, v = a(e);
                    for (n = 1; n < arguments.length; ++n) {
                        o = a(arguments[n]), d = r(o);
                        var m = s && (Object.getOwnPropertySymbols || c);
                        if (m)
                            for (f = m(o), p = 0; p < f.length; ++p) y = f[p], u(o, y) && l(d, y);
                        for (p = 0; p < d.length; ++p) y = d[p], h = o[y], u(o, y) && (v[y] = h)
                    }
                    return v
                }
            }, {
                134: 134,
                140: 140,
                141: 141
            }],
            136: [function(e, t, n) {
                var r = e(137),
                    o = e(135),
                    i = e(143),
                    s = e(144),
                    a = i();
                r(a, {
                    implementation: o,
                    getPolyfill: i,
                    shim: s
                }), t.exports = a
            }, {
                135: 135,
                137: 137,
                143: 143,
                144: 144
            }],
            137: [function(e, t, n) {
                var r = e(141),
                    o = e(138),
                    i = "function" == typeof Symbol && "symbol" == typeof Symbol(),
                    s = Object.prototype.toString,
                    a = function(e) {
                        return "function" == typeof e && "[object Function]" === s.call(e)
                    },
                    l = function() {
                        var e = {};
                        try {
                            Object.defineProperty(e, "x", {
                                enumerable: !1,
                                value: e
                            });
                            for (var t in e) return !1;
                            return e.x === e
                        } catch (n) {
                            return !1
                        }
                    },
                    u = Object.defineProperty && l(),
                    c = function(e, t, n, r) {
                        (!(t in e) || a(r) && r()) && (u ? Object.defineProperty(e, t, {
                            configurable: !0,
                            enumerable: !1,
                            value: n,
                            writable: !0
                        }) : e[t] = n)
                    },
                    p = function(e, t) {
                        var n = arguments.length > 2 ? arguments[2] : {},
                            s = r(t);
                        i && (s = s.concat(Object.getOwnPropertySymbols(t))), o(s, function(r) {
                            c(e, r, t[r], n[r])
                        })
                    };
                p.supportsDescriptors = !!u, t.exports = p
            }, {
                138: 138,
                141: 141
            }],
            138: [function(e, t, n) {
                var r = Object.prototype.hasOwnProperty,
                    o = Object.prototype.toString;
                t.exports = function(e, t, n) {
                    if ("[object Function]" !== o.call(t)) throw new TypeError("iterator must be a function");
                    var i = e.length;
                    if (i === +i)
                        for (var s = 0; i > s; s++) t.call(n, e[s], s, e);
                    else
                        for (var a in e) r.call(e, a) && t.call(n, e[a], a, e)
                }
            }, {}],
            139: [function(e, t, n) {
                var r = "Function.prototype.bind called on incompatible ",
                    o = Array.prototype.slice,
                    i = Object.prototype.toString,
                    s = "[object Function]";
                t.exports = function(e) {
                    var t = this;
                    if ("function" != typeof t || i.call(t) !== s) throw new TypeError(r + t);
                    for (var n, a = o.call(arguments, 1), l = function() {
                            if (this instanceof n) {
                                var r = t.apply(this, a.concat(o.call(arguments)));
                                return Object(r) === r ? r : this
                            }
                            return t.apply(e, a.concat(o.call(arguments)))
                        }, u = Math.max(0, t.length - a.length), c = [], p = 0; u > p; p++) c.push("$" + p);
                    if (n = Function("binder", "return function (" + c.join(",") + "){ return binder.apply(this,arguments); }")(l), t.prototype) {
                        var d = function() {};
                        d.prototype = t.prototype, n.prototype = new d, d.prototype = null
                    }
                    return n
                }
            }, {}],
            140: [function(e, t, n) {
                var r = e(139);
                t.exports = Function.prototype.bind || r
            }, {
                139: 139
            }],
            141: [function(e, t, n) {
                var r = Object.prototype.hasOwnProperty,
                    o = Object.prototype.toString,
                    i = Array.prototype.slice,
                    s = e(142),
                    a = Object.prototype.propertyIsEnumerable,
                    l = !a.call({
                        toString: null
                    }, "toString"),
                    u = a.call(function() {}, "prototype"),
                    c = ["toString", "toLocaleString", "valueOf", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "constructor"],
                    p = function(e) {
                        var t = e.constructor;
                        return t && t.prototype === e
                    },
                    d = {
                        $console: !0,
                        $external: !0,
                        $frame: !0,
                        $frameElement: !0,
                        $frames: !0,
                        $innerHeight: !0,
                        $innerWidth: !0,
                        $outerHeight: !0,
                        $outerWidth: !0,
                        $pageXOffset: !0,
                        $pageYOffset: !0,
                        $parent: !0,
                        $scrollLeft: !0,
                        $scrollTop: !0,
                        $scrollX: !0,
                        $scrollY: !0,
                        $self: !0,
                        $webkitIndexedDB: !0,
                        $webkitStorageInfo: !0,
                        $window: !0
                    },
                    f = function() {
                        if ("undefined" == typeof window) return !1;
                        for (var e in window) try {
                            if (!d["$" + e] && r.call(window, e) && null !== window[e] && "object" == typeof window[e]) try {
                                p(window[e])
                            } catch (t) {
                                return !0
                            }
                        } catch (t) {
                            return !0
                        }
                        return !1
                    }(),
                    h = function(e) {
                        if ("undefined" == typeof window || !f) return p(e);
                        try {
                            return p(e)
                        } catch (t) {
                            return !1
                        }
                    },
                    y = function(e) {
                        var t = null !== e && "object" == typeof e,
                            n = "[object Function]" === o.call(e),
                            i = s(e),
                            a = t && "[object String]" === o.call(e),
                            p = [];
                        if (!t && !n && !i) throw new TypeError("Object.keys called on a non-object");
                        var d = u && n;
                        if (a && e.length > 0 && !r.call(e, 0))
                            for (var f = 0; f < e.length; ++f) p.push(String(f));
                        if (i && e.length > 0)
                            for (var y = 0; y < e.length; ++y) p.push(String(y));
                        else
                            for (var v in e) d && "prototype" === v || !r.call(e, v) || p.push(String(v));
                        if (l)
                            for (var m = h(e), g = 0; g < c.length; ++g) m && "constructor" === c[g] || !r.call(e, c[g]) || p.push(c[g]);
                        return p
                    };
                y.shim = function() {
                    if (Object.keys) {
                        var e = function() {
                            return 2 === (Object.keys(arguments) || "").length
                        }(1, 2);
                        if (!e) {
                            var t = Object.keys;
                            Object.keys = function(e) {
                                return t(s(e) ? i.call(e) : e)
                            }
                        }
                    } else Object.keys = y;
                    return Object.keys || y
                }, t.exports = y
            }, {
                142: 142
            }],
            142: [function(e, t, n) {
                var r = Object.prototype.toString;
                t.exports = function(e) {
                    var t = r.call(e),
                        n = "[object Arguments]" === t;
                    return n || (n = "[object Array]" !== t && null !== e && "object" == typeof e && "number" == typeof e.length && e.length >= 0 && "[object Function]" === r.call(e.callee)), n
                }
            }, {}],
            143: [function(e, t, n) {
                var r = e(135),
                    o = function() {
                        if (!Object.assign) return !1;
                        for (var e = "abcdefghijklmnopqrst", t = e.split(""), n = {}, r = 0; r < t.length; ++r) n[t[r]] = t[r];
                        var o = Object.assign({}, n),
                            i = "";
                        for (var s in o) i += s;
                        return e !== i
                    },
                    i = function() {
                        if (!Object.assign || !Object.preventExtensions) return !1;
                        var e = Object.preventExtensions({
                            1: 2
                        });
                        try {
                            Object.assign(e, "xy")
                        } catch (t) {
                            return "y" === e[1]
                        }
                        return !1
                    };
                t.exports = function() {
                    return Object.assign ? o() ? r : i() ? r : Object.assign : r
                }
            }, {
                135: 135
            }],
            144: [function(e, t, n) {
                var r = e(137),
                    o = e(143);
                t.exports = function() {
                    var e = o();
                    return r(Object, {
                        assign: e
                    }, {
                        assign: function() {
                            return Object.assign !== e
                        }
                    }), e
                }
            }, {
                137: 137,
                143: 143
            }],
            145: [function(e, t, n) {
                function r(e, t) {
                    var n, r = null;
                    try {
                        n = JSON.parse(e, t)
                    } catch (o) {
                        r = o
                    }
                    return [r, n]
                }
                t.exports = r
            }, {}],
            146: [function(e, t, n) {
                function r(e) {
                    return e.replace(/\n\r?\s*/g, "")
                }
                t.exports = function(e) {
                    for (var t = "", n = 0; n < arguments.length; n++) t += r(e[n]) + (arguments[n + 1] || "");
                    return t
                }
            }, {}],
            147: [function(e, t, n) {
                function r(e, t) {
                    for (var n = 0; n < e.length; n++) t(e[n])
                }

                function o(e) {
                    for (var t in e)
                        if (e.hasOwnProperty(t)) return !1;
                    return !0
                }

                function i(e, t, n) {
                    var r = e;
                    return p(t) ? (n = t, "string" == typeof e && (r = {
                        uri: e
                    })) : r = f(t, {
                        uri: e
                    }), r.callback = n, r
                }

                function s(e, t, n) {
                    return t = i(e, t, n), a(t)
                }

                function a(e) {
                    function t() {
                        4 === u.readyState && i()
                    }

                    function n() {
                        var e = void 0;
                        if (u.response ? e = u.response : "text" !== u.responseType && u.responseType || (e = u.responseText || u.responseXML), _) try {
                            e = JSON.parse(e)
                        } catch (t) {}
                        return e
                    }

                    function r(e) {
                        clearTimeout(h), e instanceof Error || (e = new Error("" + (e || "Unknown XMLHttpRequest Error"))), e.statusCode = 0, a(e, l)
                    }

                    function i() {
                        if (!f) {
                            var t;
                            clearTimeout(h), t = e.useXDR && void 0 === u.status ? 200 : 1223 === u.status ? 204 : u.status;
                            var r = l,
                                o = null;
                            0 !== t ? (r = {
                                body: n(),
                                statusCode: t,
                                method: v,
                                headers: {},
                                url: y,
                                rawRequest: u
                            }, u.getAllResponseHeaders && (r.headers = d(u.getAllResponseHeaders()))) : o = new Error("Internal XMLHttpRequest Error"), a(o, r, r.body)
                        }
                    }
                    var a = e.callback;
                    if ("undefined" == typeof a) throw new Error("callback argument missing");
                    a = c(a);
                    var l = {
                            body: void 0,
                            headers: {},
                            statusCode: 0,
                            method: v,
                            url: y,
                            rawRequest: u
                        },
                        u = e.xhr || null;
                    u || (u = e.cors || e.useXDR ? new s.XDomainRequest : new s.XMLHttpRequest);
                    var p, f, h, y = u.url = e.uri || e.url,
                        v = u.method = e.method || "GET",
                        m = e.body || e.data || null,
                        g = u.headers = e.headers || {},
                        b = !!e.sync,
                        _ = !1;
                    if ("json" in e && (_ = !0, g.accept || g.Accept || (g.Accept = "application/json"), "GET" !== v && "HEAD" !== v && (g["content-type"] || g["Content-Type"] || (g["Content-Type"] = "application/json"), m = JSON.stringify(e.json))), u.onreadystatechange = t, u.onload = i, u.onerror = r, u.onprogress = function() {}, u.ontimeout = r, u.open(v, y, !b, e.username, e.password), b || (u.withCredentials = !!e.withCredentials), !b && e.timeout > 0 && (h = setTimeout(function() {
                            f = !0, u.abort("timeout");
                            var e = new Error("XMLHttpRequest timeout");
                            e.code = "ETIMEDOUT", r(e)
                        }, e.timeout)), u.setRequestHeader)
                        for (p in g) g.hasOwnProperty(p) && u.setRequestHeader(p, g[p]);
                    else if (e.headers && !o(e.headers)) throw new Error("Headers cannot be set on an XDomainRequest object");
                    return "responseType" in e && (u.responseType = e.responseType), "beforeSend" in e && "function" == typeof e.beforeSend && e.beforeSend(u), u.send(m), u
                }

                function l() {}
                var u = e(93),
                    c = e(149),
                    p = e(148),
                    d = e(152),
                    f = e(153);
                t.exports = s, s.XMLHttpRequest = u.XMLHttpRequest || l, s.XDomainRequest = "withCredentials" in new s.XMLHttpRequest ? s.XMLHttpRequest : u.XDomainRequest, r(["get", "put", "post", "patch", "head", "delete"], function(e) {
                    s["delete" === e ? "del" : e] = function(t, n, r) {
                        return n = i(t, n, r), n.method = e.toUpperCase(), a(n)
                    }
                })
            }, {
                148: 148,
                149: 149,
                152: 152,
                153: 153,
                93: 93
            }],
            148: [function(e, t, n) {
                function r(e) {
                    var t = o.call(e);
                    return "[object Function]" === t || "function" == typeof e && "[object RegExp]" !== t || "undefined" != typeof window && (e === window.setTimeout || e === window.alert || e === window.confirm || e === window.prompt)
                }
                t.exports = r;
                var o = Object.prototype.toString
            }, {}],
            149: [function(e, t, n) {
                function r(e) {
                    var t = !1;
                    return function() {
                        return t ? void 0 : (t = !0, e.apply(this, arguments))
                    }
                }
                t.exports = r, r.proto = r(function() {
                    Object.defineProperty(Function.prototype, "once", {
                        value: function() {
                            return r(this)
                        },
                        configurable: !0
                    })
                })
            }, {}],
            150: [function(e, t, n) {
                function r(e, t, n) {
                    if (!a(t)) throw new TypeError("iterator must be a function");
                    arguments.length < 3 && (n = this), "[object Array]" === l.call(e) ? o(e, t, n) : "string" == typeof e ? i(e, t, n) : s(e, t, n)
                }

                function o(e, t, n) {
                    for (var r = 0, o = e.length; o > r; r++) u.call(e, r) && t.call(n, e[r], r, e)
                }

                function i(e, t, n) {
                    for (var r = 0, o = e.length; o > r; r++) t.call(n, e.charAt(r), r, e)
                }

                function s(e, t, n) {
                    for (var r in e) u.call(e, r) && t.call(n, e[r], r, e)
                }
                var a = e(148);
                t.exports = r;
                var l = Object.prototype.toString,
                    u = Object.prototype.hasOwnProperty
            }, {
                148: 148
            }],
            151: [function(e, t, n) {
                function r(e) {
                    return e.replace(/^\s*|\s*$/g, "")
                }
                n = t.exports = r, n.left = function(e) {
                    return e.replace(/^\s*/, "")
                }, n.right = function(e) {
                    return e.replace(/\s*$/, "")
                }
            }, {}],
            152: [function(e, t, n) {
                var r = e(151),
                    o = e(150),
                    i = function(e) {
                        return "[object Array]" === Object.prototype.toString.call(e)
                    };
                t.exports = function(e) {
                    if (!e) return {};
                    var t = {};
                    return o(r(e).split("\n"), function(e) {
                        var n = e.indexOf(":"),
                            o = r(e.slice(0, n)).toLowerCase(),
                            s = r(e.slice(n + 1));
                        "undefined" == typeof t[o] ? t[o] = s : i(t[o]) ? t[o].push(s) : t[o] = [t[o], s]
                    }), t
                }
            }, {
                150: 150,
                151: 151
            }],
            153: [function(e, t, n) {
                function r() {
                    for (var e = {}, t = 0; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n) o.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }
                t.exports = r;
                var o = Object.prototype.hasOwnProperty
            }, {}]
        }, {}, [91])(91)
    }),
    function(e) {
        var t = e.vttjs = {},
            n = t.VTTCue,
            r = t.VTTRegion,
            o = e.VTTCue,
            i = e.VTTRegion;
        t.shim = function() {
            t.VTTCue = n, t.VTTRegion = r
        }, t.restore = function() {
            t.VTTCue = o, t.VTTRegion = i
        }
    }(this),
    function(e, t) {
        function n(e) {
            if ("string" != typeof e) return !1;
            var t = a[e.toLowerCase()];
            return t ? e.toLowerCase() : !1
        }

        function r(e) {
            if ("string" != typeof e) return !1;
            var t = l[e.toLowerCase()];
            return t ? e.toLowerCase() : !1
        }

        function o(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var r in n) e[r] = n[r]
            }
            return e
        }

        function i(e, t, i) {
            var a = this,
                l = /MSIE\s8\.0/.test(navigator.userAgent),
                u = {};
            l ? a = document.createElement("custom") : u.enumerable = !0, a.hasBeenReset = !1;
            var c = "",
                p = !1,
                d = e,
                f = t,
                h = i,
                y = null,
                v = "",
                m = !0,
                g = "auto",
                b = "start",
                _ = 50,
                w = "middle",
                C = 50,
                T = "middle";
            return Object.defineProperty(a, "id", o({}, u, {
                get: function() {
                    return c
                },
                set: function(e) {
                    c = "" + e
                }
            })), Object.defineProperty(a, "pauseOnExit", o({}, u, {
                get: function() {
                    return p
                },
                set: function(e) {
                    p = !!e
                }
            })), Object.defineProperty(a, "startTime", o({}, u, {
                get: function() {
                    return d
                },
                set: function(e) {
                    if ("number" != typeof e) throw new TypeError("Start time must be set to a number.");
                    d = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "endTime", o({}, u, {
                get: function() {
                    return f
                },
                set: function(e) {
                    if ("number" != typeof e) throw new TypeError("End time must be set to a number.");
                    f = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "text", o({}, u, {
                get: function() {
                    return h
                },
                set: function(e) {
                    h = "" + e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "region", o({}, u, {
                get: function() {
                    return y
                },
                set: function(e) {
                    y = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "vertical", o({}, u, {
                get: function() {
                    return v
                },
                set: function(e) {
                    var t = n(e);
                    if (t === !1) throw new SyntaxError("An invalid or illegal string was specified.");
                    v = t, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "snapToLines", o({}, u, {
                get: function() {
                    return m
                },
                set: function(e) {
                    m = !!e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "line", o({}, u, {
                get: function() {
                    return g
                },
                set: function(e) {
                    if ("number" != typeof e && e !== s) throw new SyntaxError("An invalid number or illegal string was specified.");
                    g = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "lineAlign", o({}, u, {
                get: function() {
                    return b
                },
                set: function(e) {
                    var t = r(e);
                    if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                    b = t, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "position", o({}, u, {
                get: function() {
                    return _
                },
                set: function(e) {
                    if (0 > e || e > 100) throw new Error("Position must be between 0 and 100.");
                    _ = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "positionAlign", o({}, u, {
                get: function() {
                    return w
                },
                set: function(e) {
                    var t = r(e);
                    if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                    w = t, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "size", o({}, u, {
                get: function() {
                    return C
                },
                set: function(e) {
                    if (0 > e || e > 100) throw new Error("Size must be between 0 and 100.");
                    C = e, this.hasBeenReset = !0
                }
            })), Object.defineProperty(a, "align", o({}, u, {
                get: function() {
                    return T
                },
                set: function(e) {
                    var t = r(e);
                    if (!t) throw new SyntaxError("An invalid or illegal string was specified.");
                    T = t, this.hasBeenReset = !0
                }
            })), a.displayState = void 0, l ? a : void 0
        }
        var s = "auto",
            a = {
                "": !0,
                lr: !0,
                rl: !0
            },
            l = {
                start: !0,
                middle: !0,
                end: !0,
                left: !0,
                right: !0
            };
        i.prototype.getCueAsHTML = function() {
            return WebVTT.convertCueToDOMTree(window, this.text)
        }, e.VTTCue = e.VTTCue || i, t.VTTCue = i
    }(this, this.vttjs || {}),
    function(e, t) {
        function n(e) {
            if ("string" != typeof e) return !1;
            var t = i[e.toLowerCase()];
            return t ? e.toLowerCase() : !1
        }

        function r(e) {
            return "number" == typeof e && e >= 0 && 100 >= e
        }

        function o() {
            var e = 100,
                t = 3,
                o = 0,
                i = 100,
                s = 0,
                a = 100,
                l = "";
            Object.defineProperties(this, {
                width: {
                    enumerable: !0,
                    get: function() {
                        return e
                    },
                    set: function(t) {
                        if (!r(t)) throw new Error("Width must be between 0 and 100.");
                        e = t
                    }
                },
                lines: {
                    enumerable: !0,
                    get: function() {
                        return t
                    },
                    set: function(e) {
                        if ("number" != typeof e) throw new TypeError("Lines must be set to a number.");
                        t = e
                    }
                },
                regionAnchorY: {
                    enumerable: !0,
                    get: function() {
                        return i
                    },
                    set: function(e) {
                        if (!r(e)) throw new Error("RegionAnchorX must be between 0 and 100.");
                        i = e
                    }
                },
                regionAnchorX: {
                    enumerable: !0,
                    get: function() {
                        return o
                    },
                    set: function(e) {
                        if (!r(e)) throw new Error("RegionAnchorY must be between 0 and 100.");
                        o = e
                    }
                },
                viewportAnchorY: {
                    enumerable: !0,
                    get: function() {
                        return a
                    },
                    set: function(e) {
                        if (!r(e)) throw new Error("ViewportAnchorY must be between 0 and 100.");
                        a = e
                    }
                },
                viewportAnchorX: {
                    enumerable: !0,
                    get: function() {
                        return s
                    },
                    set: function(e) {
                        if (!r(e)) throw new Error("ViewportAnchorX must be between 0 and 100.");
                        s = e
                    }
                },
                scroll: {
                    enumerable: !0,
                    get: function() {
                        return l
                    },
                    set: function(e) {
                        var t = n(e);
                        if (t === !1) throw new SyntaxError("An invalid or illegal string was specified.");
                        l = t
                    }
                }
            })
        }
        var i = {
            "": !0,
            up: !0
        };
        e.VTTRegion = e.VTTRegion || o, t.VTTRegion = o
    }(this, this.vttjs || {}),
    function(e) {
        function t(e, t) {
            this.name = "ParsingError", this.code = e.code, this.message = t || e.message
        }

        function n(e) {
            function t(e, t, n, r) {
                return 3600 * (0 | e) + 60 * (0 | t) + (0 | n) + (0 | r) / 1e3
            }
            var n = e.match(/^(\d+):(\d{2})(:\d{2})?\.(\d{3})/);
            return n ? n[3] ? t(n[1], n[2], n[3].replace(":", ""), n[4]) : n[1] > 59 ? t(n[1], n[2], 0, n[4]) : t(0, n[1], n[2], n[4]) : null
        }

        function r() {
            this.values = h(null)
        }

        function o(e, t, n, r) {
            var o = r ? e.split(r) : [e];
            for (var i in o)
                if ("string" == typeof o[i]) {
                    var s = o[i].split(n);
                    if (2 === s.length) {
                        var a = s[0],
                            l = s[1];
                        t(a, l)
                    }
                }
        }

        function i(e, i, s) {
            function a() {
                var r = n(e);
                if (null === r) throw new t(t.Errors.BadTimeStamp, "Malformed timestamp: " + c);
                return e = e.replace(/^[^\sa-zA-Z-]+/, ""), r
            }

            function l(e, t) {
                var n = new r;
                o(e, function(e, t) {
                    switch (e) {
                        case "region":
                            for (var r = s.length - 1; r >= 0; r--)
                                if (s[r].id === t) {
                                    n.set(e, s[r].region);
                                    break
                                }
                            break;
                        case "vertical":
                            n.alt(e, t, ["rl", "lr"]);
                            break;
                        case "line":
                            var o = t.split(","),
                                i = o[0];
                            n.integer(e, i), n.percent(e, i) ? n.set("snapToLines", !1) : null, n.alt(e, i, ["auto"]), 2 === o.length && n.alt("lineAlign", o[1], ["start", "middle", "end"]);
                            break;
                        case "position":
                            o = t.split(","), n.percent(e, o[0]), 2 === o.length && n.alt("positionAlign", o[1], ["start", "middle", "end"]);
                            break;
                        case "size":
                            n.percent(e, t);
                            break;
                        case "align":
                            n.alt(e, t, ["start", "middle", "end", "left", "right"])
                    }
                }, /:/, /\s/), t.region = n.get("region", null), t.vertical = n.get("vertical", ""), t.line = n.get("line", "auto"), t.lineAlign = n.get("lineAlign", "start"), t.snapToLines = n.get("snapToLines", !0), t.size = n.get("size", 100), t.align = n.get("align", "middle"), t.position = n.get("position", {
                    start: 0,
                    left: 0,
                    middle: 50,
                    end: 100,
                    right: 100
                }, t.align), t.positionAlign = n.get("positionAlign", {
                    start: "start",
                    left: "start",
                    middle: "middle",
                    end: "end",
                    right: "end"
                }, t.align)
            }

            function u() {
                e = e.replace(/^\s+/, "")
            }
            var c = e;
            if (u(), i.startTime = a(), u(), "-->" !== e.substr(0, 3)) throw new t(t.Errors.BadTimeStamp, "Malformed time stamp (time stamps must be separated by '-->'): " + c);
            e = e.substr(3), u(), i.endTime = a(), u(), l(e, i)
        }

        function s(e, t) {
            function r() {
                function e(e) {
                    return t = t.substr(e.length), e
                }
                if (!t) return null;
                var n = t.match(/^([^<]*)(<[^>]+>?)?/);
                return e(n[1] ? n[1] : n[2])
            }

            function o(e) {
                return y[e]
            }

            function i(e) {
                for (; h = e.match(/&(amp|lt|gt|lrm|rlm|nbsp);/);) e = e.replace(h[0], o);
                return e
            }

            function s(e, t) {
                return !g[t.localName] || g[t.localName] === e.localName
            }

            function a(t, n) {
                var r = v[t];
                if (!r) return null;
                var o = e.document.createElement(r);
                o.localName = r;
                var i = m[t];
                return i && n && (o[i] = n.trim()), o
            }
            for (var l, u = e.document.createElement("div"), c = u, p = []; null !== (l = r());)
                if ("<" !== l[0]) c.appendChild(e.document.createTextNode(i(l)));
                else {
                    if ("/" === l[1]) {
                        p.length && p[p.length - 1] === l.substr(2).replace(">", "") && (p.pop(), c = c.parentNode);
                        continue
                    }
                    var d, f = n(l.substr(1, l.length - 2));
                    if (f) {
                        d = e.document.createProcessingInstruction("timestamp", f), c.appendChild(d);
                        continue
                    }
                    var h = l.match(/^<([^.\s\/0-9>]+)(\.[^\s\\>]+)?([^>\\]+)?(\\?)>?$/);
                    if (!h) continue;
                    if (d = a(h[1], h[3]), !d) continue;
                    if (!s(c, d)) continue;
                    h[2] && (d.className = h[2].substr(1).replace(".", " ")), p.push(h[1]), c.appendChild(d), c = d
                }
            return u
        }

        function a(e) {
            function t(e, t) {
                for (var n = t.childNodes.length - 1; n >= 0; n--) e.push(t.childNodes[n])
            }

            function n(e) {
                if (!e || !e.length) return null;
                var r = e.pop(),
                    o = r.textContent || r.innerText;
                if (o) {
                    var i = o.match(/^.*(\n|\r)/);
                    return i ? (e.length = 0, i[0]) : o
                }
                return "ruby" === r.tagName ? n(e) : r.childNodes ? (t(e, r), n(e)) : void 0
            }
            var r, o = [],
                i = "";
            if (!e || !e.childNodes) return "ltr";
            for (t(o, e); i = n(o);)
                for (var s = 0; s < i.length; s++) {
                    r = i.charCodeAt(s);
                    for (var a = 0; a < b.length; a++)
                        if (b[a] === r) return "rtl"
                }
            return "ltr"
        }

        function l(e) {
            if ("number" == typeof e.line && (e.snapToLines || e.line >= 0 && e.line <= 100)) return e.line;
            if (!e.track || !e.track.textTrackList || !e.track.textTrackList.mediaElement) return -1;
            for (var t = e.track, n = t.textTrackList, r = 0, o = 0; o < n.length && n[o] !== t; o++) "showing" === n[o].mode && r++;
            return -1 * ++r
        }

        function u() {}

        function c(e, t, n) {
            var r = /MSIE\s8\.0/.test(navigator.userAgent),
                o = "rgba(255, 255, 255, 1)",
                i = "rgba(0, 0, 0, 0.8)";
            r && (o = "rgb(255, 255, 255)", i = "rgb(0, 0, 0)"), u.call(this), this.cue = t, this.cueDiv = s(e, t.text);
            var l = {
                color: o,
                backgroundColor: i,
                position: "relative",
                left: 0,
                right: 0,
                top: 0,
                bottom: 0,
                display: "inline"
            };
            r || (l.writingMode = "" === t.vertical ? "horizontal-tb" : "lr" === t.vertical ? "vertical-lr" : "vertical-rl", l.unicodeBidi = "plaintext"), this.applyStyles(l, this.cueDiv), this.div = e.document.createElement("div"), l = {
                textAlign: "middle" === t.align ? "center" : t.align,
                font: n.font,
                whiteSpace: "pre-line",
                position: "absolute"
            }, r || (l.direction = a(this.cueDiv), l.writingMode = "" === t.vertical ? "horizontal-tb" : "lr" === t.vertical ? "vertical-lr" : "vertical-rl".stylesunicodeBidi = "plaintext"), this.applyStyles(l), this.div.appendChild(this.cueDiv);
            var c = 0;
            switch (t.positionAlign) {
                case "start":
                    c = t.position;
                    break;
                case "middle":
                    c = t.position - t.size / 2;
                    break;
                case "end":
                    c = t.position - t.size
            }
            "" === t.vertical ? this.applyStyles({
                left: this.formatStyle(c, "%"),
                width: this.formatStyle(t.size, "%")
            }) : this.applyStyles({
                top: this.formatStyle(c, "%"),
                height: this.formatStyle(t.size, "%")
            }), this.move = function(e) {
                this.applyStyles({
                    top: this.formatStyle(e.top, "px"),
                    bottom: this.formatStyle(e.bottom, "px"),
                    left: this.formatStyle(e.left, "px"),
                    right: this.formatStyle(e.right, "px"),
                    height: this.formatStyle(e.height, "px"),
                    width: this.formatStyle(e.width, "px")
                })
            }
        }

        function p(e) {
            var t, n, r, o, i = /MSIE\s8\.0/.test(navigator.userAgent);
            if (e.div) {
                n = e.div.offsetHeight, r = e.div.offsetWidth, o = e.div.offsetTop;
                var s = (s = e.div.childNodes) && (s = s[0]) && s.getClientRects && s.getClientRects();
                e = e.div.getBoundingClientRect(), t = s ? Math.max(s[0] && s[0].height || 0, e.height / s.length) : 0
            }
            this.left = e.left, this.right = e.right, this.top = e.top || o, this.height = e.height || n, this.bottom = e.bottom || o + (e.height || n), this.width = e.width || r, this.lineHeight = void 0 !== t ? t : e.lineHeight, i && !this.lineHeight && (this.lineHeight = 13)
        }

        function d(e, t, n, r) {
            function o(e, t) {
                for (var o, i = new p(e), s = 1, a = 0; a < t.length; a++) {
                    for (; e.overlapsOppositeAxis(n, t[a]) || e.within(n) && e.overlapsAny(r);) e.move(t[a]);
                    if (e.within(n)) return e;
                    var l = e.intersectPercentage(n);
                    s > l && (o = new p(e), s = l), e = new p(i)
                }
                return o || i
            }
            var i = new p(t),
                s = t.cue,
                a = l(s),
                u = [];
            if (s.snapToLines) {
                var c;
                switch (s.vertical) {
                    case "":
                        u = ["+y", "-y"], c = "height";
                        break;
                    case "rl":
                        u = ["+x", "-x"], c = "width";
                        break;
                    case "lr":
                        u = ["-x", "+x"], c = "width"
                }
                var d = i.lineHeight,
                    f = d * Math.round(a),
                    h = n[c] + d,
                    y = u[0];
                Math.abs(f) > h && (f = 0 > f ? -1 : 1, f *= Math.ceil(h / d) * d), 0 > a && (f += "" === s.vertical ? n.height : n.width, u = u.reverse()), i.move(y, f)
            } else {
                var v = i.lineHeight / n.height * 100;
                switch (s.lineAlign) {
                    case "middle":
                        a -= v / 2;
                        break;
                    case "end":
                        a -= v
                }
                switch (s.vertical) {
                    case "":
                        t.applyStyles({
                            top: t.formatStyle(a, "%")
                        });
                        break;
                    case "rl":
                        t.applyStyles({
                            left: t.formatStyle(a, "%")
                        });
                        break;
                    case "lr":
                        t.applyStyles({
                            right: t.formatStyle(a, "%")
                        })
                }
                u = ["+y", "-x", "+x", "-y"], i = new p(t)
            }
            var m = o(i, u);
            t.move(m.toCSSCompatValues(n))
        }

        function f() {}
        var h = Object.create || function() {
            function e() {}
            return function(t) {
                if (1 !== arguments.length) throw new Error("Object.create shim only accepts one parameter.");
                return e.prototype = t, new e
            }
        }();
        t.prototype = h(Error.prototype), t.prototype.constructor = t, t.Errors = {
            BadSignature: {
                code: 0,
                message: "Malformed WebVTT signature."
            },
            BadTimeStamp: {
                code: 1,
                message: "Malformed time stamp."
            }
        }, r.prototype = {
            set: function(e, t) {
                this.get(e) || "" === t || (this.values[e] = t)
            },
            get: function(e, t, n) {
                return n ? this.has(e) ? this.values[e] : t[n] : this.has(e) ? this.values[e] : t
            },
            has: function(e) {
                return e in this.values
            },
            alt: function(e, t, n) {
                for (var r = 0; r < n.length; ++r)
                    if (t === n[r]) {
                        this.set(e, t);
                        break
                    }
            },
            integer: function(e, t) {
                /^-?\d+$/.test(t) && this.set(e, parseInt(t, 10))
            },
            percent: function(e, t) {
                var n;
                return (n = t.match(/^([\d]{1,3})(\.[\d]*)?%$/)) && (t = parseFloat(t), t >= 0 && 100 >= t) ? (this.set(e, t), !0) : !1
            }
        };
        var y = {
                "&amp;": "&",
                "&lt;": "<",
                "&gt;": ">",
                "&lrm;": "‎",
                "&rlm;": "‏",
                "&nbsp;": " "
            },
            v = {
                c: "span",
                i: "i",
                b: "b",
                u: "u",
                ruby: "ruby",
                rt: "rt",
                v: "span",
                lang: "span"
            },
            m = {
                v: "title",
                lang: "lang"
            },
            g = {
                rt: "ruby"
            },
            b = [1470, 1472, 1475, 1478, 1488, 1489, 1490, 1491, 1492, 1493, 1494, 1495, 1496, 1497, 1498, 1499, 1500, 1501, 1502, 1503, 1504, 1505, 1506, 1507, 1508, 1509, 1510, 1511, 1512, 1513, 1514, 1520, 1521, 1522, 1523, 1524, 1544, 1547, 1549, 1563, 1566, 1567, 1568, 1569, 1570, 1571, 1572, 1573, 1574, 1575, 1576, 1577, 1578, 1579, 1580, 1581, 1582, 1583, 1584, 1585, 1586, 1587, 1588, 1589, 1590, 1591, 1592, 1593, 1594, 1595, 1596, 1597, 1598, 1599, 1600, 1601, 1602, 1603, 1604, 1605, 1606, 1607, 1608, 1609, 1610, 1645, 1646, 1647, 1649, 1650, 1651, 1652, 1653, 1654, 1655, 1656, 1657, 1658, 1659, 1660, 1661, 1662, 1663, 1664, 1665, 1666, 1667, 1668, 1669, 1670, 1671, 1672, 1673, 1674, 1675, 1676, 1677, 1678, 1679, 1680, 1681, 1682, 1683, 1684, 1685, 1686, 1687, 1688, 1689, 1690, 1691, 1692, 1693, 1694, 1695, 1696, 1697, 1698, 1699, 1700, 1701, 1702, 1703, 1704, 1705, 1706, 1707, 1708, 1709, 1710, 1711, 1712, 1713, 1714, 1715, 1716, 1717, 1718, 1719, 1720, 1721, 1722, 1723, 1724, 1725, 1726, 1727, 1728, 1729, 1730, 1731, 1732, 1733, 1734, 1735, 1736, 1737, 1738, 1739, 1740, 1741, 1742, 1743, 1744, 1745, 1746, 1747, 1748, 1749, 1765, 1766, 1774, 1775, 1786, 1787, 1788, 1789, 1790, 1791, 1792, 1793, 1794, 1795, 1796, 1797, 1798, 1799, 1800, 1801, 1802, 1803, 1804, 1805, 1807, 1808, 1810, 1811, 1812, 1813, 1814, 1815, 1816, 1817, 1818, 1819, 1820, 1821, 1822, 1823, 1824, 1825, 1826, 1827, 1828, 1829, 1830, 1831, 1832, 1833, 1834, 1835, 1836, 1837, 1838, 1839, 1869, 1870, 1871, 1872, 1873, 1874, 1875, 1876, 1877, 1878, 1879, 1880, 1881, 1882, 1883, 1884, 1885, 1886, 1887, 1888, 1889, 1890, 1891, 1892, 1893, 1894, 1895, 1896, 1897, 1898, 1899, 1900, 1901, 1902, 1903, 1904, 1905, 1906, 1907, 1908, 1909, 1910, 1911, 1912, 1913, 1914, 1915, 1916, 1917, 1918, 1919, 1920, 1921, 1922, 1923, 1924, 1925, 1926, 1927, 1928, 1929, 1930, 1931, 1932, 1933, 1934, 1935, 1936, 1937, 1938, 1939, 1940, 1941, 1942, 1943, 1944, 1945, 1946, 1947, 1948, 1949, 1950, 1951, 1952, 1953, 1954, 1955, 1956, 1957, 1969, 1984, 1985, 1986, 1987, 1988, 1989, 1990, 1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2e3, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026, 2036, 2037, 2042, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056, 2057, 2058, 2059, 2060, 2061, 2062, 2063, 2064, 2065, 2066, 2067, 2068, 2069, 2074, 2084, 2088, 2096, 2097, 2098, 2099, 2100, 2101, 2102, 2103, 2104, 2105, 2106, 2107, 2108, 2109, 2110, 2112, 2113, 2114, 2115, 2116, 2117, 2118, 2119, 2120, 2121, 2122, 2123, 2124, 2125, 2126, 2127, 2128, 2129, 2130, 2131, 2132, 2133, 2134, 2135, 2136, 2142, 2208, 2210, 2211, 2212, 2213, 2214, 2215, 2216, 2217, 2218, 2219, 2220, 8207, 64285, 64287, 64288, 64289, 64290, 64291, 64292, 64293, 64294, 64295, 64296, 64298, 64299, 64300, 64301, 64302, 64303, 64304, 64305, 64306, 64307, 64308, 64309, 64310, 64312, 64313, 64314, 64315, 64316, 64318, 64320, 64321, 64323, 64324, 64326, 64327, 64328, 64329, 64330, 64331, 64332, 64333, 64334, 64335, 64336, 64337, 64338, 64339, 64340, 64341, 64342, 64343, 64344, 64345, 64346, 64347, 64348, 64349, 64350, 64351, 64352, 64353, 64354, 64355, 64356, 64357, 64358, 64359, 64360, 64361, 64362, 64363, 64364, 64365, 64366, 64367, 64368, 64369, 64370, 64371, 64372, 64373, 64374, 64375, 64376, 64377, 64378, 64379, 64380, 64381, 64382, 64383, 64384, 64385, 64386, 64387, 64388, 64389, 64390, 64391, 64392, 64393, 64394, 64395, 64396, 64397, 64398, 64399, 64400, 64401, 64402, 64403, 64404, 64405, 64406, 64407, 64408, 64409, 64410, 64411, 64412, 64413, 64414, 64415, 64416, 64417, 64418, 64419, 64420, 64421, 64422, 64423, 64424, 64425, 64426, 64427, 64428, 64429, 64430, 64431, 64432, 64433, 64434, 64435, 64436, 64437, 64438, 64439, 64440, 64441, 64442, 64443, 64444, 64445, 64446, 64447, 64448, 64449, 64467, 64468, 64469, 64470, 64471, 64472, 64473, 64474, 64475, 64476, 64477, 64478, 64479, 64480, 64481, 64482, 64483, 64484, 64485, 64486, 64487, 64488, 64489, 64490, 64491, 64492, 64493, 64494, 64495, 64496, 64497, 64498, 64499, 64500, 64501, 64502, 64503, 64504, 64505, 64506, 64507, 64508, 64509, 64510, 64511, 64512, 64513, 64514, 64515, 64516, 64517, 64518, 64519, 64520, 64521, 64522, 64523, 64524, 64525, 64526, 64527, 64528, 64529, 64530, 64531, 64532, 64533, 64534, 64535, 64536, 64537, 64538, 64539, 64540, 64541, 64542, 64543, 64544, 64545, 64546, 64547, 64548, 64549, 64550, 64551, 64552, 64553, 64554, 64555, 64556, 64557, 64558, 64559, 64560, 64561, 64562, 64563, 64564, 64565, 64566, 64567, 64568, 64569, 64570, 64571, 64572, 64573, 64574, 64575, 64576, 64577, 64578, 64579, 64580, 64581, 64582, 64583, 64584, 64585, 64586, 64587, 64588, 64589, 64590, 64591, 64592, 64593, 64594, 64595, 64596, 64597, 64598, 64599, 64600, 64601, 64602, 64603, 64604, 64605, 64606, 64607, 64608, 64609, 64610, 64611, 64612, 64613, 64614, 64615, 64616, 64617, 64618, 64619, 64620, 64621, 64622, 64623, 64624, 64625, 64626, 64627, 64628, 64629, 64630, 64631, 64632, 64633, 64634, 64635, 64636, 64637, 64638, 64639, 64640, 64641, 64642, 64643, 64644, 64645, 64646, 64647, 64648, 64649, 64650, 64651, 64652, 64653, 64654, 64655, 64656, 64657, 64658, 64659, 64660, 64661, 64662, 64663, 64664, 64665, 64666, 64667, 64668, 64669, 64670, 64671, 64672, 64673, 64674, 64675, 64676, 64677, 64678, 64679, 64680, 64681, 64682, 64683, 64684, 64685, 64686, 64687, 64688, 64689, 64690, 64691, 64692, 64693, 64694, 64695, 64696, 64697, 64698, 64699, 64700, 64701, 64702, 64703, 64704, 64705, 64706, 64707, 64708, 64709, 64710, 64711, 64712, 64713, 64714, 64715, 64716, 64717, 64718, 64719, 64720, 64721, 64722, 64723, 64724, 64725, 64726, 64727, 64728, 64729, 64730, 64731, 64732, 64733, 64734, 64735, 64736, 64737, 64738, 64739, 64740, 64741, 64742, 64743, 64744, 64745, 64746, 64747, 64748, 64749, 64750, 64751, 64752, 64753, 64754, 64755, 64756, 64757, 64758, 64759, 64760, 64761, 64762, 64763, 64764, 64765, 64766, 64767, 64768, 64769, 64770, 64771, 64772, 64773, 64774, 64775, 64776, 64777, 64778, 64779, 64780, 64781, 64782, 64783, 64784, 64785, 64786, 64787, 64788, 64789, 64790, 64791, 64792, 64793, 64794, 64795, 64796, 64797, 64798, 64799, 64800, 64801, 64802, 64803, 64804, 64805, 64806, 64807, 64808, 64809, 64810, 64811, 64812, 64813, 64814, 64815, 64816, 64817, 64818, 64819, 64820, 64821, 64822, 64823, 64824, 64825, 64826, 64827, 64828, 64829, 64848, 64849, 64850, 64851, 64852, 64853, 64854, 64855, 64856, 64857, 64858, 64859, 64860, 64861, 64862, 64863, 64864, 64865, 64866, 64867, 64868, 64869, 64870, 64871, 64872, 64873, 64874, 64875, 64876, 64877, 64878, 64879, 64880, 64881, 64882, 64883, 64884, 64885, 64886, 64887, 64888, 64889, 64890, 64891, 64892, 64893, 64894, 64895, 64896, 64897, 64898, 64899, 64900, 64901, 64902, 64903, 64904, 64905, 64906, 64907, 64908, 64909, 64910, 64911, 64914, 64915, 64916, 64917, 64918, 64919, 64920, 64921, 64922, 64923, 64924, 64925, 64926, 64927, 64928, 64929, 64930, 64931, 64932, 64933, 64934, 64935, 64936, 64937, 64938, 64939, 64940, 64941, 64942, 64943, 64944, 64945, 64946, 64947, 64948, 64949, 64950, 64951, 64952, 64953, 64954, 64955, 64956, 64957, 64958, 64959, 64960, 64961, 64962, 64963, 64964, 64965, 64966, 64967, 65008, 65009, 65010, 65011, 65012, 65013, 65014, 65015, 65016, 65017, 65018, 65019, 65020, 65136, 65137, 65138, 65139, 65140, 65142, 65143, 65144, 65145, 65146, 65147, 65148, 65149, 65150, 65151, 65152, 65153, 65154, 65155, 65156, 65157, 65158, 65159, 65160, 65161, 65162, 65163, 65164, 65165, 65166, 65167, 65168, 65169, 65170, 65171, 65172, 65173, 65174, 65175, 65176, 65177, 65178, 65179, 65180, 65181, 65182, 65183, 65184, 65185, 65186, 65187, 65188, 65189, 65190, 65191, 65192, 65193, 65194, 65195, 65196, 65197, 65198, 65199, 65200, 65201, 65202, 65203, 65204, 65205, 65206, 65207, 65208, 65209, 65210, 65211, 65212, 65213, 65214, 65215, 65216, 65217, 65218, 65219, 65220, 65221, 65222, 65223, 65224, 65225, 65226, 65227, 65228, 65229, 65230, 65231, 65232, 65233, 65234, 65235, 65236, 65237, 65238, 65239, 65240, 65241, 65242, 65243, 65244, 65245, 65246, 65247, 65248, 65249, 65250, 65251, 65252, 65253, 65254, 65255, 65256, 65257, 65258, 65259, 65260, 65261, 65262, 65263, 65264, 65265, 65266, 65267, 65268, 65269, 65270, 65271, 65272, 65273, 65274, 65275, 65276, 67584, 67585, 67586, 67587, 67588, 67589, 67592, 67594, 67595, 67596, 67597, 67598, 67599, 67600, 67601, 67602, 67603, 67604, 67605, 67606, 67607, 67608, 67609, 67610, 67611, 67612, 67613, 67614, 67615, 67616, 67617, 67618, 67619, 67620, 67621, 67622, 67623, 67624, 67625, 67626, 67627, 67628, 67629, 67630, 67631, 67632, 67633, 67634, 67635, 67636, 67637, 67639, 67640, 67644, 67647, 67648, 67649, 67650, 67651, 67652, 67653, 67654, 67655, 67656, 67657, 67658, 67659, 67660, 67661, 67662, 67663, 67664, 67665, 67666, 67667, 67668, 67669, 67671, 67672, 67673, 67674, 67675, 67676, 67677, 67678, 67679, 67840, 67841, 67842, 67843, 67844, 67845, 67846, 67847, 67848, 67849, 67850, 67851, 67852, 67853, 67854, 67855, 67856, 67857, 67858, 67859, 67860, 67861, 67862, 67863, 67864, 67865, 67866, 67867, 67872, 67873, 67874, 67875, 67876, 67877, 67878, 67879, 67880, 67881, 67882, 67883, 67884, 67885, 67886, 67887, 67888, 67889, 67890, 67891, 67892, 67893, 67894, 67895, 67896, 67897, 67903, 67968, 67969, 67970, 67971, 67972, 67973, 67974, 67975, 67976, 67977, 67978, 67979, 67980, 67981, 67982, 67983, 67984, 67985, 67986, 67987, 67988, 67989, 67990, 67991, 67992, 67993, 67994, 67995, 67996, 67997, 67998, 67999, 68e3, 68001, 68002, 68003, 68004, 68005, 68006, 68007, 68008, 68009, 68010, 68011, 68012, 68013, 68014, 68015, 68016, 68017, 68018, 68019, 68020, 68021, 68022, 68023, 68030, 68031, 68096, 68112, 68113, 68114, 68115, 68117, 68118, 68119, 68121, 68122, 68123, 68124, 68125, 68126, 68127, 68128, 68129, 68130, 68131, 68132, 68133, 68134, 68135, 68136, 68137, 68138, 68139, 68140, 68141, 68142, 68143, 68144, 68145, 68146, 68147, 68160, 68161, 68162, 68163, 68164, 68165, 68166, 68167, 68176, 68177, 68178, 68179, 68180, 68181, 68182, 68183, 68184, 68192, 68193, 68194, 68195, 68196, 68197, 68198, 68199, 68200, 68201, 68202, 68203, 68204, 68205, 68206, 68207, 68208, 68209, 68210, 68211, 68212, 68213, 68214, 68215, 68216, 68217, 68218, 68219, 68220, 68221, 68222, 68223, 68352, 68353, 68354, 68355, 68356, 68357, 68358, 68359, 68360, 68361, 68362, 68363, 68364, 68365, 68366, 68367, 68368, 68369, 68370, 68371, 68372, 68373, 68374, 68375, 68376, 68377, 68378, 68379, 68380, 68381, 68382, 68383, 68384, 68385, 68386, 68387, 68388, 68389, 68390, 68391, 68392, 68393, 68394, 68395, 68396, 68397, 68398, 68399, 68400, 68401, 68402, 68403, 68404, 68405, 68416, 68417, 68418, 68419, 68420, 68421, 68422, 68423, 68424, 68425, 68426, 68427, 68428, 68429, 68430, 68431, 68432, 68433, 68434, 68435, 68436, 68437, 68440, 68441, 68442, 68443, 68444, 68445, 68446, 68447, 68448, 68449, 68450, 68451, 68452, 68453, 68454, 68455, 68456, 68457, 68458, 68459, 68460, 68461, 68462, 68463, 68464, 68465, 68466, 68472, 68473, 68474, 68475, 68476, 68477, 68478, 68479, 68608, 68609, 68610, 68611, 68612, 68613, 68614, 68615, 68616, 68617, 68618, 68619, 68620, 68621, 68622, 68623, 68624, 68625, 68626, 68627, 68628, 68629, 68630, 68631, 68632, 68633, 68634, 68635, 68636, 68637, 68638, 68639, 68640, 68641, 68642, 68643, 68644, 68645, 68646, 68647, 68648, 68649, 68650, 68651, 68652, 68653, 68654, 68655, 68656, 68657, 68658, 68659, 68660, 68661, 68662, 68663, 68664, 68665, 68666, 68667, 68668, 68669, 68670, 68671, 68672, 68673, 68674, 68675, 68676, 68677, 68678, 68679, 68680, 126464, 126465, 126466, 126467, 126469, 126470, 126471, 126472, 126473, 126474, 126475, 126476, 126477, 126478, 126479, 126480, 126481, 126482, 126483, 126484, 126485, 126486, 126487, 126488, 126489, 126490, 126491, 126492, 126493, 126494, 126495, 126497, 126498, 126500, 126503, 126505, 126506, 126507, 126508, 126509, 126510, 126511, 126512, 126513, 126514, 126516, 126517, 126518, 126519, 126521, 126523, 126530, 126535, 126537, 126539, 126541, 126542, 126543, 126545, 126546, 126548, 126551, 126553, 126555, 126557, 126559, 126561, 126562, 126564, 126567, 126568, 126569, 126570, 126572, 126573, 126574, 126575, 126576, 126577, 126578, 126580, 126581, 126582, 126583, 126585, 126586, 126587, 126588, 126590, 126592, 126593, 126594, 126595, 126596, 126597, 126598, 126599, 126600, 126601, 126603, 126604, 126605, 126606, 126607, 126608, 126609, 126610, 126611, 126612, 126613, 126614, 126615, 126616, 126617, 126618, 126619, 126625, 126626, 126627, 126629, 126630, 126631, 126632, 126633, 126635, 126636, 126637, 126638, 126639, 126640, 126641, 126642, 126643, 126644, 126645, 126646, 126647, 126648, 126649, 126650, 126651, 1114109];
        u.prototype.applyStyles = function(e, t) {
            t = t || this.div;
            for (var n in e) e.hasOwnProperty(n) && (t.style[n] = e[n])
        }, u.prototype.formatStyle = function(e, t) {
            return 0 === e ? 0 : e + t
        }, c.prototype = h(u.prototype), c.prototype.constructor = c, p.prototype.move = function(e, t) {
            switch (t = void 0 !== t ? t : this.lineHeight, e) {
                case "+x":
                    this.left += t, this.right += t;
                    break;
                case "-x":
                    this.left -= t, this.right -= t;
                    break;
                case "+y":
                    this.top += t, this.bottom += t;
                    break;
                case "-y":
                    this.top -= t, this.bottom -= t
            }
        }, p.prototype.overlaps = function(e) {
            return this.left < e.right && this.right > e.left && this.top < e.bottom && this.bottom > e.top
        }, p.prototype.overlapsAny = function(e) {
            for (var t = 0; t < e.length; t++)
                if (this.overlaps(e[t])) return !0;
            return !1
        }, p.prototype.within = function(e) {
            return this.top >= e.top && this.bottom <= e.bottom && this.left >= e.left && this.right <= e.right
        }, p.prototype.overlapsOppositeAxis = function(e, t) {
            switch (t) {
                case "+x":
                    return this.left < e.left;
                case "-x":
                    return this.right > e.right;
                case "+y":
                    return this.top < e.top;
                case "-y":
                    return this.bottom > e.bottom
            }
        }, p.prototype.intersectPercentage = function(e) {
            var t = Math.max(0, Math.min(this.right, e.right) - Math.max(this.left, e.left)),
                n = Math.max(0, Math.min(this.bottom, e.bottom) - Math.max(this.top, e.top)),
                r = t * n;
            return r / (this.height * this.width)
        }, p.prototype.toCSSCompatValues = function(e) {
            return {
                top: this.top - e.top,
                bottom: e.bottom - this.bottom,
                left: this.left - e.left,
                right: e.right - this.right,
                height: this.height,
                width: this.width
            }
        }, p.getSimpleBoxPosition = function(e) {
            var t = e.div ? e.div.offsetHeight : e.tagName ? e.offsetHeight : 0,
                n = e.div ? e.div.offsetWidth : e.tagName ? e.offsetWidth : 0,
                r = e.div ? e.div.offsetTop : e.tagName ? e.offsetTop : 0;
            e = e.div ? e.div.getBoundingClientRect() : e.tagName ? e.getBoundingClientRect() : e;
            var o = {
                left: e.left,
                right: e.right,
                top: e.top || r,
                height: e.height || t,
                bottom: e.bottom || r + (e.height || t),
                width: e.width || n
            };
            return o
        }, f.StringDecoder = function() {
            return {
                decode: function(e) {
                    if (!e) return "";
                    if ("string" != typeof e) throw new Error("Error - expected string data.");
                    return decodeURIComponent(encodeURIComponent(e))
                }
            }
        }, f.convertCueToDOMTree = function(e, t) {
            return e && t ? s(e, t) : null
        };
        var _ = .05,
            w = "sans-serif",
            C = "1.5%";
        f.processCues = function(e, t, n) {
            function r(e) {
                for (var t = 0; t < e.length; t++)
                    if (e[t].hasBeenReset || !e[t].displayState) return !0;
                return !1
            }
            if (!e || !t || !n) return null;
            for (; n.firstChild;) n.removeChild(n.firstChild);
            var o = e.document.createElement("div");
            if (o.style.position = "absolute", o.style.left = "0", o.style.right = "0", o.style.top = "0", o.style.bottom = "0", o.style.margin = C, n.appendChild(o), r(t)) {
                var i = [],
                    s = p.getSimpleBoxPosition(o),
                    a = Math.round(s.height * _ * 100) / 100,
                    l = {
                        font: a + "px " + w
                    };
                ! function() {
                    for (var n, r, a = 0; a < t.length; a++) r = t[a], n = new c(e, r, l), o.appendChild(n.div), d(e, n, s, i), r.displayState = n.div, i.push(p.getSimpleBoxPosition(n))
                }()
            } else
                for (var u = 0; u < t.length; u++) o.appendChild(t[u].displayState)
        }, f.Parser = function(e, t, n) {
            n || (n = t, t = {}), t || (t = {}), this.window = e, this.vttjs = t, this.state = "INITIAL", this.buffer = "", this.decoder = n || new TextDecoder("utf8"), this.regionList = []
        }, f.Parser.prototype = {
            reportOrThrowError: function(e) {
                if (!(e instanceof t)) throw e;
                this.onparsingerror && this.onparsingerror(e)
            },
            parse: function(e) {
                function n() {
                    for (var e = l.buffer, t = 0; t < e.length && "\r" !== e[t] && "\n" !== e[t];) ++t;
                    var n = e.substr(0, t);
                    return "\r" === e[t] && ++t, "\n" === e[t] && ++t, l.buffer = e.substr(t), n
                }

                function s(e) {
                    var t = new r;
                    if (o(e, function(e, n) {
                            switch (e) {
                                case "id":
                                    t.set(e, n);
                                    break;
                                case "width":
                                    t.percent(e, n);
                                    break;
                                case "lines":
                                    t.integer(e, n);
                                    break;
                                case "regionanchor":
                                case "viewportanchor":
                                    var o = n.split(",");
                                    if (2 !== o.length) break;
                                    var i = new r;
                                    if (i.percent("x", o[0]), i.percent("y", o[1]), !i.has("x") || !i.has("y")) break;
                                    t.set(e + "X", i.get("x")), t.set(e + "Y", i.get("y"));
                                    break;
                                case "scroll":
                                    t.alt(e, n, ["up"])
                            }
                        }, /=/, /\s/), t.has("id")) {
                        var n = new(l.vttjs.VTTRegion || l.window.VTTRegion);
                        n.width = t.get("width", 100), n.lines = t.get("lines", 3), n.regionAnchorX = t.get("regionanchorX", 0), n.regionAnchorY = t.get("regionanchorY", 100), n.viewportAnchorX = t.get("viewportanchorX", 0), n.viewportAnchorY = t.get("viewportanchorY", 100), n.scroll = t.get("scroll", ""), l.onregion && l.onregion(n), l.regionList.push({
                            id: t.get("id"),
                            region: n
                        })
                    }
                }

                function a(e) {
                    o(e, function(e, t) {
                        switch (e) {
                            case "Region":
                                s(t)
                        }
                    }, /:/)
                }
                var l = this;
                e && (l.buffer += l.decoder.decode(e, {
                    stream: !0
                }));
                try {
                    var u;
                    if ("INITIAL" === l.state) {
                        if (!/\r\n|\n/.test(l.buffer)) return this;
                        u = n();
                        var c = u.match(/^WEBVTT([ \t].*)?$/);
                        if (!c || !c[0]) throw new t(t.Errors.BadSignature);
                        l.state = "HEADER"
                    }
                    for (var p = !1; l.buffer;) {
                        if (!/\r\n|\n/.test(l.buffer)) return this;
                        switch (p ? p = !1 : u = n(), l.state) {
                            case "HEADER":
                                /:/.test(u) ? a(u) : u || (l.state = "ID");
                                continue;
                            case "NOTE":
                                u || (l.state = "ID");
                                continue;
                            case "ID":
                                if (/^NOTE($|[ \t])/.test(u)) {
                                    l.state = "NOTE";
                                    break
                                }
                                if (!u) continue;
                                if (l.cue = new(l.vttjs.VTTCue || l.window.VTTCue)(0, 0, ""), l.state = "CUE", -1 === u.indexOf("-->")) {
                                    l.cue.id = u;
                                    continue
                                }
                            case "CUE":
                                try {
                                    i(u, l.cue, l.regionList)
                                } catch (d) {
                                    l.reportOrThrowError(d), l.cue = null, l.state = "BADCUE";
                                    continue
                                }
                                l.state = "CUETEXT";
                                continue;
                            case "CUETEXT":
                                var f = -1 !== u.indexOf("-->");
                                if (!u || f && (p = !0)) {
                                    l.oncue && l.oncue(l.cue), l.cue = null, l.state = "ID";
                                    continue
                                }
                                l.cue.text && (l.cue.text += "\n"), l.cue.text += u;
                                continue;
                            case "BADCUE":
                                u || (l.state = "ID");
                                continue
                        }
                    }
                } catch (d) {
                    l.reportOrThrowError(d), "CUETEXT" === l.state && l.cue && l.oncue && l.oncue(l.cue), l.cue = null, l.state = "INITIAL" === l.state ? "BADWEBVTT" : "BADCUE"
                }
                return this
            },
            flush: function() {
                var e = this;
                try {
                    if (e.buffer += e.decoder.decode(), (e.cue || "HEADER" === e.state) && (e.buffer += "\n\n", e.parse()), "INITIAL" === e.state) throw new t(t.Errors.BadSignature)
                } catch (n) {
                    e.reportOrThrowError(n)
                }
                return e.onflush && e.onflush(), this
            }
        }, e.WebVTT = f
    }(this, this.vttjs || {}), define("rtveplayer/modules/videojs/initPlugins", ["require", "exports", "module", "vendor/jquery"], function(e, t, n) {
            "use strict";
            var r = e("vendor/jquery");
            return {
                load: function() {
                    var e = r.Deferred();
                    this.options.flash = {
                        swf: this.options.mediaConfig.rtvePlayerSwfUrl
                    };
                    var t = [this.playerLanguage(), this.videojsEnhance(), this.rtveComponents(), this.rtveMediaInfo(), this.techStats()];
                    return this.isVideo() && (t.push(this.advertisment()), t.push(this.thumbnails())), r.when.apply(this, t).then(function() {
                        this.logger.log("RtvePlayer", "initPlugins", "SETUP All promises resolved", arguments), e.resolveWith(this, [arguments])
                    }.bind(this)), e.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/playerLanguage", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";
            return {
                load: function() {
                    var n = e.Deferred();
                    return require([this.languageResources[this.options.language]], function(e) {
                        t.addLanguage(this.options.language, e), n.resolveWith(this, [e])
                    }.bind(this)), n.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/thumbnails", ["core/core_library", "vendor/jquery", "vendor/videojs/video"], function(e, t, n) {
            "use strict";

            function r(e, t) {
                return function(n) {
                    return window.getComputedStyle ? window.getComputedStyle(e, t)[n] : e.currentStyle[n]
                }
            }

            function o(e) {
                return "HTML" !== e.nodeName && "static" === r(e)("position") ? o(e.offsetParent) : e
            }

            function i(e, n) {
                var r;
                return n ? parseFloat(n) : (r = t(e).context.style.clip, "auto" !== r && "inherit" !== r && (r = r.split(/(?:\(|\))/)[1].split(/(?:,| )/), 4 === r.length) ? parseFloat(r[1]) - parseFloat(r[3]) : 0)
            }

            function s() {
                return window.pageXOffset ? {
                    x: window.pageXOffset,
                    y: window.pageYOffset
                } : {
                    x: document.documentElement.scrollLeft,
                    y: document.documentElement.scrollTop
                }
            }

            function a(e, t, n) {
                return "/resources/thumbnailer/" + h.rtvePlayer.utils.hashingThumbs(t) + "/" + t + "/L" + e + "_M" + (10 > n ? "0" + n : n) + ".jpg"
            }

            function l(e) {
                return e >= v.minPlayerWidth && e <= v.maxPlayerWidth ? v : e >= m.minPlayerWidth ? m : void 0
            }

            function u(e, t, n) {
                for (var r = {}, o = n.numCols * n.numRows, i = 0; t > i; i++)
                    for (var s = a(n.id, e, i + 1), l = 0; o > l; l++) r[10 * l + i * o * 10] = {
                        src: s,
                        style: {
                            left: 25 === o ? g[l % 5] + "px" : E[l % 10] + "px",
                            width: k + "px",
                            height: I + "px",
                            top: 25 === o ? b[Math.floor(l / 5)] + "px" : x[Math.floor(l / 10)] + "px",
                            clip: 25 === o ? "rect(" + _[Math.floor(l / 5)] + "px," + w[l % 5] + "px," + C[Math.floor(l / 5)] + "px," + T[l % 5] + "px)" : "rect(" + O[Math.floor(l / 10)] + "px," + P[l % 10] + "px," + S[Math.floor(l / 10)] + "px," + j[l % 10] + "px)"
                        }
                    };
                return r
            }

            function c() {
                var e = {};
                return e[0] = {
                    src: " ",
                    style: {
                        height: "0px",
                        left: "0px",
                        top: "0px",
                        width: "0px",
                        clip: "rect(0px,0px,0px,0px)"
                    }
                }, e
            }

            function p(e) {
                return e.id() ? "Flash" !== e.techName_ ? t("#" + e.id() + "_Html5_api").width() || t("#" + e.id() + "_html5_api").width() : t("#" + e.id() + "_Flash_api").width() : ""
            }

            function d() {
                var e = document.createElement("div");
                return e.className = "vjs-thumbnail-holder", e
            }

            function f(n, r, a) {
                function f(t) {
                    var n, r, a, l, u, c, p, d, f, h, v, g = this.controlBar.progressControl;
                    a = 0, h = s().x, v = o(g.el()).getBoundingClientRect(), p = (v.width || v.right) + h, c = t.pageX, t.changedTouches && (c = t.changedTouches[0].pageX), l = c || t.clientX + document.body.scrollLeft + document.documentElement.scrollLeft, l -= o(g.el()).getBoundingClientRect().left + h, n = Math.floor((l + w - g.el().offsetLeft) / g.width() * b);
                    for (r in m) n > r && (a = Math.max(a, r));
                    m && (u = m[a]), u && (u.src && g.thumbnails.img.src !== u.src && (g.thumbnails.img.src = u.src), u.style && g.thumbnails.img.style !== u.style && e.augment(g.thumbnails.img.style, u.style), d = i(g.thumbnails.img, u.width || m[0].width)), d ? f = d / 2 : (d = k / y.numCols, f = d / 2), l + f > p ? l -= l + f - p : f > l && (l = f), g.thumbnails.style.left = l + "px" || l, x.style.left = l + "px" || l
                }

                function v(e) {
                    O = this.controlBar.progressControl, O.thumbnails.style.left = "-1000px"
                }
                this.rtvePlayer.logger.log("RtvePlayer", "thumbnails", "INIT: thumbnails()");
                var m, g, b, _, w, C, T = {};
                h = this, n = n, b = r / 1e3, y = l(p(this)), y && 1 == a ? (_ = u(n, Math.ceil(b / y.divisorMatrix), y), m = e.augment(_, T)) : (_ = c(), m = e.augment(_, T));
                var E = d();
                g = document.createElement("img"), g.className = "vjs-thumbnail", E.appendChild(g), E.img = g, m && m[0] && e.augment(g.style, m[0].style), g.src && (g.onload = function(e) {
                    g.style.left || g.style.right || (g.style.left = -(g.naturalWidth / 2) + "px")
                }), h.on("durationchange", function(e) {
                    b = h.duration()
                });
                var x = h.controlBar.progressControl.seekBar.mouseTimeDisplay.el(),
                    O = h.controlBar.progressControl;
                O.thumbnails || (O.thumbnails = E, O.el().appendChild(O.thumbnails)),
                    function() {
                        var e, t, n; - 1 !== navigator.userAgent.toLowerCase().indexOf("android") && (e = h.controlBar.progressControl, t = function() {
                            e.addClass("fake-active")
                        }, n = function() {
                            e.removeClass("fake-active")
                        }, e.on("touchstart", t), e.on("touchend", n), e.on("touchcancel", n))
                    }(), t(".vjs-duration-display") && "object" == typeof t(".vjs-duration-display") && (C = t(".vjs-duration-display", this.player().el()).width(), w = C <= this.rtvePlayer.CONS.defaultThumbsWidth || this.rtvePlayer.isInfantil() ? 0 : C), O.on("mousemove", f.bind(h)), O.on("touchmove", f.bind(h)), O.on("mouseout", v.bind(h)), O.on("touchcancel", v.bind(h)), O.on("touchend", v.bind(h)), h.on("userinactive", v.bind(h)), this.rtvePlayer.logger.log("RtvePlayer", "thumbnails", "END: thumbnails()")
            }
            var h, y = null,
                v = {
                    id: "1",
                    numRows: 10,
                    numCols: 10,
                    maxPlayerWidth: 900,
                    minPlayerWidth: 250,
                    divisorMatrix: 990
                },
                m = {
                    id: "2",
                    numRows: 5,
                    numCols: 5,
                    maxPlayerWidth: 7200,
                    minPlayerWidth: 900,
                    divisorMatrix: 240
                },
                g = [-80, -240, -400, -560, -720],
                b = [-100, -190, -280, -370, -460],
                _ = [0, 90, 180, 270, 360],
                w = [160, 320, 480, 640, 800],
                C = [90, 180, 270, 360, 450],
                T = [0, 160, 320, 480, 640],
                E = [-40, -120, -200, -280, -360, -440, -520, -600, -680, -760],
                x = [-55, -100, -145, -190, -235, -280, -325, -370, -415, -460],
                O = [0, 45, 90, 135, 180, 225, 270, 315, 360, 405],
                P = [80, 160, 240, 320, 400, 480, 560, 640, 720, 800],
                S = [45, 90, 135, 180, 225, 270, 315, 360, 405, 450],
                j = [0, 80, 160, 240, 320, 400, 480, 560, 640, 720],
                k = 800,
                I = 450;
            return {
                load: function() {
                    var e = t.Deferred();
                    return n.plugin("thumbnails", f), e.resolveWith(this, []), e.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/advSetup", ["core/core_library", "vendor/jquery", "vendor/videojs/video"], function(e, t, n) {
            "use strict";

            function r() {
                this.vastClient({
                    timeout: this.rtvePlayer.CONS.defaultAdsOptions.timeout,
                    iosPrerollCancelTimeout: this.rtvePlayer.CONS.defaultAdsOptions.iosPrerollCancelTimeout,
                    adCancelTimeout: this.rtvePlayer.CONS.defaultAdsOptions.adCancelTimeout,
                    playAdAlways: this.rtvePlayer.CONS.defaultAdsOptions.playAdAlways,
                    adsEnabled: this.rtvePlayer.CONS.defaultAdsOptions.adsEnabled,
                    autoResize: this.rtvePlayer.CONS.defaultAdsOptions.autoResize,
                    adTagUrl: this.rtvePlayer.options.mediaConfig.adsConfig.url + (new Date).getTime()
                }), this.rtvePlayer.options.mediaConfig.assetConfig.live && this.trigger("play")
            }

            function o() {
                r.call(this), this.rtvePlayer.logger.log("RtvePlayer", "advertisment", "initAdvertisment"), this.on("vast.firstPlay", i.onPreRollFirstPlay.bind(this)), this.on("vast.adEnd", i.onPreRollEnd.bind(this)), this.on("vast.adSkip", i.onPreRollSkip.bind(this)), this.on("vast.adError", i.onPreRollError.bind(this)), this.on("vast.adsCancel", i.onPreRollCancel.bind(this))
            }
            var i = {
                onPreRollFirstPlay: function(e) {
                    this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "onPreRollFirstPlay")
                },
                onPreRollEnd: function(e) {
                    this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "onPreRollEnd"), this.trigger({
                        type: "preRollFinished"
                    })
                },
                onPreRollSkip: function(e) {
                    this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "onPreRollSkip")
                },
                onPreRollCancel: function(e) {
                    this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "onPreRollCancel", e.error)
                },
                onPreRollError: function(e) {
                    this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "onPreRollError", e.error), this.trigger({
                        type: "preRollFinished"
                    }), (303 === e.error.code || 301 === e.error.code || 402 === e.error.code || 101 === e.error.code || 400 === e.error.code) && this.trigger({
                        type: "firstplay"
                    }), "VAST Error: on VASTClient.getVASTResponse, missing ad tag URL" === e.error.message && this.trigger({
                        type: "firstplay"
                    })
                }
            };
            return {
                load: function() {
                    var e = t.Deferred();
                    return n.plugin("advertisment", o), e.resolveWith(this, []), e.promise()
                }
            }
        }),
        function t(e, n, r) {
            function o(s, a) {
                if (!n[s]) {
                    if (!e[s]) {
                        var l = "function" == typeof require && require;
                        if (!a && l) return l(s, !0);
                        if (i) return i(s, !0);
                        throw new Error("Cannot find module '" + s + "'")
                    }
                    var u = n[s] = {
                        exports: {}
                    };
                    e[s][0].call(u.exports, function(t) {
                        var n = e[s][1][t];
                        return o(n ? n : t)
                    }, u, u.exports, t, e, n, r)
                }
                return n[s].exports
            }
            for (var i = "function" == typeof require && require, s = 0; s < r.length; s++) o(r[s]);
            return o
        }({
            1: [function(e, t, n) {
                var r = e("../lib/swig");
                "function" == typeof window.define && "object" == typeof window.define.amd ? window.define("vendor/swig", function() {
                    return r
                }) : window.swig = r
            }, {
                "../lib/swig": 9
            }],
            2: [function(e, t, n) {
                var r = e("./utils"),
                    o = {
                        full: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                        abbr: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                    },
                    i = {
                        full: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                        abbr: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                        alt: {
                            "-1": "Yesterday",
                            0: "Today",
                            1: "Tomorrow"
                        }
                    };
                n.tzOffset = 0, n.DateZ = function() {
                    var e = {
                            "default": ["getUTCDate", "getUTCDay", "getUTCFullYear", "getUTCHours", "getUTCMilliseconds", "getUTCMinutes", "getUTCMonth", "getUTCSeconds", "toISOString", "toGMTString", "toUTCString", "valueOf", "getTime"],
                            z: ["getDate", "getDay", "getFullYear", "getHours", "getMilliseconds", "getMinutes", "getMonth", "getSeconds", "getYear", "toDateString", "toLocaleDateString", "toLocaleTimeString"]
                        },
                        t = this;
                    t.date = t.dateZ = arguments.length > 1 ? new Date(Date.UTC.apply(Date, arguments) + 6e4 * (new Date).getTimezoneOffset()) : 1 === arguments.length ? new Date(new Date(arguments[0])) : new Date, t.timezoneOffset = t.dateZ.getTimezoneOffset(), r.each(e.z, function(e) {
                        t[e] = function() {
                            return t.dateZ[e]()
                        }
                    }), r.each(e["default"], function(e) {
                        t[e] = function() {
                            return t.date[e]()
                        }
                    }), this.setTimezoneOffset(n.tzOffset)
                }, n.DateZ.prototype = {
                    getTimezoneOffset: function() {
                        return this.timezoneOffset
                    },
                    setTimezoneOffset: function(e) {
                        return this.timezoneOffset = e, this.dateZ = new Date(this.date.getTime() + 6e4 * this.date.getTimezoneOffset() - 6e4 * this.timezoneOffset), this
                    }
                }, n.d = function(e) {
                    return (e.getDate() < 10 ? "0" : "") + e.getDate()
                }, n.D = function(e) {
                    return i.abbr[e.getDay()]
                }, n.j = function(e) {
                    return e.getDate()
                }, n.l = function(e) {
                    return i.full[e.getDay()]
                }, n.N = function(e) {
                    var t = e.getDay();
                    return t >= 1 ? t : 7
                }, n.S = function(e) {
                    var t = e.getDate();
                    return t % 10 === 1 && 11 !== t ? "st" : t % 10 === 2 && 12 !== t ? "nd" : t % 10 === 3 && 13 !== t ? "rd" : "th"
                }, n.w = function(e) {
                    return e.getDay()
                }, n.z = function(e, t, r) {
                    var o = e.getFullYear(),
                        i = new n.DateZ(o, e.getMonth(), e.getDate(), 12, 0, 0),
                        s = new n.DateZ(o, 0, 1, 12, 0, 0);
                    return i.setTimezoneOffset(t, r), s.setTimezoneOffset(t, r), Math.round((i - s) / 864e5)
                }, n.W = function(e) {
                    var t, n = new Date(e.valueOf()),
                        r = (e.getDay() + 6) % 7;
                    return n.setDate(n.getDate() - r + 3), t = n.valueOf(), n.setMonth(0, 1), 4 !== n.getDay() && n.setMonth(0, 1 + (4 - n.getDay() + 7) % 7), 1 + Math.ceil((t - n) / 6048e5)
                }, n.F = function(e) {
                    return o.full[e.getMonth()]
                }, n.m = function(e) {
                    return (e.getMonth() < 9 ? "0" : "") + (e.getMonth() + 1)
                }, n.M = function(e) {
                    return o.abbr[e.getMonth()]
                }, n.n = function(e) {
                    return e.getMonth() + 1
                }, n.t = function(e) {
                    return 32 - new Date(e.getFullYear(), e.getMonth(), 32).getDate()
                }, n.L = function(e) {
                    return 29 === new Date(e.getFullYear(), 1, 29).getDate()
                }, n.o = function(e) {
                    var t = new Date(e.valueOf());
                    return t.setDate(t.getDate() - (e.getDay() + 6) % 7 + 3), t.getFullYear()
                }, n.Y = function(e) {
                    return e.getFullYear()
                }, n.y = function(e) {
                    return e.getFullYear().toString().substr(2)
                }, n.a = function(e) {
                    return e.getHours() < 12 ? "am" : "pm"
                }, n.A = function(e) {
                    return e.getHours() < 12 ? "AM" : "PM"
                }, n.B = function(e) {
                    var t, n = e.getUTCHours();
                    return n = 23 === n ? 0 : n + 1, t = Math.abs((60 * (60 * n + e.getUTCMinutes()) + e.getUTCSeconds()) / 86.4).toFixed(0), "000".concat(t).slice(t.length)
                }, n.g = function(e) {
                    var t = e.getHours();
                    return 0 === t ? 12 : t > 12 ? t - 12 : t
                }, n.G = function(e) {
                    return e.getHours()
                }, n.h = function(e) {
                    var t = e.getHours();
                    return (10 > t || t > 12 && 22 > t ? "0" : "") + (12 > t ? t : t - 12)
                }, n.H = function(e) {
                    var t = e.getHours();
                    return (10 > t ? "0" : "") + t
                }, n.i = function(e) {
                    var t = e.getMinutes();
                    return (10 > t ? "0" : "") + t
                }, n.s = function(e) {
                    var t = e.getSeconds();
                    return (10 > t ? "0" : "") + t
                }, n.O = function(e) {
                    var t = e.getTimezoneOffset();
                    return (0 > t ? "-" : "+") + (10 > t / 60 ? "0" : "") + Math.abs(t / 60) + "00"
                }, n.Z = function(e) {
                    return 60 * e.getTimezoneOffset()
                }, n.c = function(e) {
                    return e.toISOString()
                }, n.r = function(e) {
                    return e.toUTCString()
                }, n.U = function(e) {
                    return e.getTime() / 1e3
                }
            }, {
                "./utils": 26
            }],
            3: [function(e, t, n) {
                function r(e) {
                    var t = this,
                        n = {};
                    return o.isArray(e) ? o.map(e, function(e) {
                        return t.apply(null, arguments)
                    }) : "object" == typeof e ? (o.each(e, function(e, r) {
                        n[r] = t.apply(null, arguments)
                    }), n) : void 0
                }
                var o = e("./utils"),
                    i = e("./dateformatter");
                n.addslashes = function(e) {
                    var t = r.apply(n.addslashes, arguments);
                    return void 0 !== t ? t : e.replace(/\\/g, "\\\\").replace(/\'/g, "\\'").replace(/\"/g, '\\"')
                }, n.capitalize = function(e) {
                    var t = r.apply(n.capitalize, arguments);
                    return void 0 !== t ? t : e.toString().charAt(0).toUpperCase() + e.toString().substr(1).toLowerCase()
                }, n.date = function(e, t, n, r) {
                    var o, s = t.length,
                        a = new i.DateZ(e),
                        l = 0,
                        u = "";
                    for (n && a.setTimezoneOffset(n, r), l; s > l; l += 1) o = t.charAt(l), "\\" === o ? (l += 1, u += s > l ? t.charAt(l) : o) : u += i.hasOwnProperty(o) ? i[o](a, n, r) : o;
                    return u
                }, n["default"] = function(e, t) {
                    return "undefined" == typeof e || !e && "number" != typeof e ? t : e
                }, n.escape = function(e, t) {
                    var o, i = r.apply(n.escape, arguments),
                        s = e,
                        a = 0;
                    if (void 0 !== i) return i;
                    if ("string" != typeof e) return e;
                    switch (i = "", t) {
                        case "js":
                            for (s = s.replace(/\\/g, "\\u005C"), a; a < s.length; a += 1) o = s.charCodeAt(a), 32 > o ? (o = o.toString(16).toUpperCase(), o = o.length < 2 ? "0" + o : o, i += "\\u00" + o) : i += s[a];
                            return i.replace(/&/g, "\\u0026").replace(/</g, "\\u003C").replace(/>/g, "\\u003E").replace(/\'/g, "\\u0027").replace(/"/g, "\\u0022").replace(/\=/g, "\\u003D").replace(/-/g, "\\u002D").replace(/;/g, "\\u003B");
                        default:
                            return s.replace(/&(?!amp;|lt;|gt;|quot;|#39;)/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")
                    }
                }, n.e = n.escape, n.first = function(e) {
                    if ("object" == typeof e && !o.isArray(e)) {
                        var t = o.keys(e);
                        return e[t[0]]
                    }
                    return "string" == typeof e ? e.substr(0, 1) : e[0]
                }, n.groupBy = function(e, t) {
                    if (!o.isArray(e)) return e;
                    var n = {};
                    return o.each(e, function(e) {
                        if (e.hasOwnProperty(t)) {
                            var r = e[t];
                            o.extend({}, e);
                            delete e[t], n[r] || (n[r] = []), n[r].push(e)
                        }
                    }), n
                }, n.join = function(e, t) {
                    if (o.isArray(e)) return e.join(t);
                    if ("object" == typeof e) {
                        var n = [];
                        return o.each(e, function(e) {
                            n.push(e)
                        }), n.join(t)
                    }
                    return e
                }, n.json = function(e, t) {
                    return JSON.stringify(e, null, t || 0)
                }, n.json_encode = n.json, n.last = function(e) {
                    if ("object" == typeof e && !o.isArray(e)) {
                        var t = o.keys(e);
                        return e[t[t.length - 1]]
                    }
                    return "string" == typeof e ? e.charAt(e.length - 1) : e[e.length - 1]
                }, n.lower = function(e) {
                    var t = r.apply(n.lower, arguments);
                    return void 0 !== t ? t : e.toString().toLowerCase()
                }, n.raw = function(e) {
                    return n.safe(e)
                }, n.raw.safe = !0, n.replace = function(e, t, n, r) {
                    var o = new RegExp(t, r);
                    return e.replace(o, n)
                }, n.reverse = function(e) {
                    return n.sort(e, !0)
                }, n.safe = function(e) {
                    return e
                }, n.safe.safe = !0, n.sort = function(e, t) {
                    var n;
                    if (o.isArray(e)) n = e.sort();
                    else switch (typeof e) {
                        case "object":
                            n = o.keys(e).sort();
                            break;
                        case "string":
                            return n = e.split(""), t ? n.reverse().join("") : n.sort().join("")
                    }
                    return n && t ? n.reverse() : n || e
                }, n.striptags = function(e) {
                    var t = r.apply(n.striptags, arguments);
                    return void 0 !== t ? t : e.toString().replace(/(<([^>]+)>)/gi, "")
                }, n.title = function(e) {
                    var t = r.apply(n.title, arguments);
                    return void 0 !== t ? t : e.toString().replace(/\w\S*/g, function(e) {
                        return e.charAt(0).toUpperCase() + e.substr(1).toLowerCase()
                    })
                }, n.uniq = function(e) {
                    var t;
                    return e && o.isArray(e) ? (t = [], o.each(e, function(e) {
                        -1 === t.indexOf(e) && t.push(e)
                    }), t) : ""
                }, n.upper = function(e) {
                    var t = r.apply(n.upper, arguments);
                    return void 0 !== t ? t : e.toString().toUpperCase()
                }, n.url_encode = function(e) {
                    var t = r.apply(n.url_encode, arguments);
                    return void 0 !== t ? t : encodeURIComponent(e)
                }, n.url_decode = function(e) {
                    var t = r.apply(n.url_decode, arguments);
                    return void 0 !== t ? t : decodeURIComponent(e)
                }
            }, {
                "./dateformatter": 2,
                "./utils": 26
            }],
            4: [function(e, t, n) {
                function r(e) {
                    var t;
                    return o.some(s, function(n) {
                        return o.some(n.regex, function(r) {
                            var o, i = e.match(r);
                            if (i) return o = i[n.idx || 0].replace(/\s*$/, ""), o = n.hasOwnProperty("replace") && n.replace.hasOwnProperty(o) ? n.replace[o] : o, t = {
                                match: o,
                                type: n.type,
                                length: i[0].length
                            }, !0
                        })
                    }), t || (t = {
                        match: e,
                        type: i.UNKNOWN,
                        length: e.length
                    }), t
                }
                var o = e("./utils"),
                    i = {
                        WHITESPACE: 0,
                        STRING: 1,
                        FILTER: 2,
                        FILTEREMPTY: 3,
                        FUNCTION: 4,
                        FUNCTIONEMPTY: 5,
                        PARENOPEN: 6,
                        PARENCLOSE: 7,
                        COMMA: 8,
                        VAR: 9,
                        NUMBER: 10,
                        OPERATOR: 11,
                        BRACKETOPEN: 12,
                        BRACKETCLOSE: 13,
                        DOTKEY: 14,
                        ARRAYOPEN: 15,
                        CURLYOPEN: 17,
                        CURLYCLOSE: 18,
                        COLON: 19,
                        COMPARATOR: 20,
                        LOGIC: 21,
                        NOT: 22,
                        BOOL: 23,
                        ASSIGNMENT: 24,
                        METHODOPEN: 25,
                        UNKNOWN: 100
                    },
                    s = [{
                        type: i.WHITESPACE,
                        regex: [/^\s+/]
                    }, {
                        type: i.STRING,
                        regex: [/^""/, /^".*?[^\\]"/, /^''/, /^'.*?[^\\]'/]
                    }, {
                        type: i.FILTER,
                        regex: [/^\|\s*(\w+)\(/],
                        idx: 1
                    }, {
                        type: i.FILTEREMPTY,
                        regex: [/^\|\s*(\w+)/],
                        idx: 1
                    }, {
                        type: i.FUNCTIONEMPTY,
                        regex: [/^\s*(\w+)\(\)/],
                        idx: 1
                    }, {
                        type: i.FUNCTION,
                        regex: [/^\s*(\w+)\(/],
                        idx: 1
                    }, {
                        type: i.PARENOPEN,
                        regex: [/^\(/]
                    }, {
                        type: i.PARENCLOSE,
                        regex: [/^\)/]
                    }, {
                        type: i.COMMA,
                        regex: [/^,/]
                    }, {
                        type: i.LOGIC,
                        regex: [/^(&&|\|\|)\s*/, /^(and|or)\s+/],
                        idx: 1,
                        replace: {
                            and: "&&",
                            or: "||"
                        }
                    }, {
                        type: i.COMPARATOR,
                        regex: [/^(===|==|\!==|\!=|<=|<|>=|>|in\s|gte\s|gt\s|lte\s|lt\s)\s*/],
                        idx: 1,
                        replace: {
                            gte: ">=",
                            gt: ">",
                            lte: "<=",
                            lt: "<"
                        }
                    }, {
                        type: i.ASSIGNMENT,
                        regex: [/^(=|\+=|-=|\*=|\/=)/]
                    }, {
                        type: i.NOT,
                        regex: [/^\!\s*/, /^not\s+/],
                        replace: {
                            not: "!"
                        }
                    }, {
                        type: i.BOOL,
                        regex: [/^(true|false)\s+/, /^(true|false)$/],
                        idx: 1
                    }, {
                        type: i.VAR,
                        regex: [/^[a-zA-Z_$]\w*((\.\$?\w*)+)?/, /^[a-zA-Z_$]\w*/]
                    }, {
                        type: i.BRACKETOPEN,
                        regex: [/^\[/]
                    }, {
                        type: i.BRACKETCLOSE,
                        regex: [/^\]/]
                    }, {
                        type: i.CURLYOPEN,
                        regex: [/^\{/]
                    }, {
                        type: i.COLON,
                        regex: [/^\:/]
                    }, {
                        type: i.CURLYCLOSE,
                        regex: [/^\}/]
                    }, {
                        type: i.DOTKEY,
                        regex: [/^\.(\w+)/],
                        idx: 1
                    }, {
                        type: i.NUMBER,
                        regex: [/^[+\-]?\d+(\.\d+)?/]
                    }, {
                        type: i.OPERATOR,
                        regex: [/^(\+|\-|\/|\*|%)/]
                    }];
                n.types = i, n.read = function(e) {
                    for (var t, n, o = 0, i = []; o < e.length;) t = e.substring(o), n = r(t), o += n.length, i.push(n);
                    return i
                }
            }, {
                "./utils": 26
            }],
            5: [function(e, t, n) {
                var r = e("__browserify_process"),
                    o = e("fs"),
                    i = e("path");
                t.exports = function(e, t) {
                    var n = {};
                    return t = t || "utf8", e = e ? i.normalize(e) : null, n.resolve = function(t, n) {
                        return n = e ? e : n ? i.dirname(n) : r.cwd(), i.resolve(n, t)
                    }, n.load = function(e, r) {
                        if (!o || r && !o.readFile || !o.readFileSync) throw new Error("Unable to find file " + e + " because there is no filesystem to read from.");
                        return e = n.resolve(e), r ? void o.readFile(e, t, r) : o.readFileSync(e, t)
                    }, n
                }
            }, {
                __browserify_process: 31,
                fs: 28,
                path: 29
            }],
            6: [function(e, t, n) {
                n.fs = e("./filesystem"), n.memory = e("./memory")
            }, {
                "./filesystem": 5,
                "./memory": 7
            }],
            7: [function(e, t, n) {
                var r = e("path"),
                    o = e("../utils");
                t.exports = function(e, t) {
                    var n = {};
                    return t = t ? r.normalize(t) : null, n.resolve = function(e, n) {
                        return n = t ? t : n ? r.dirname(n) : "/", r.resolve(n, e)
                    }, n.load = function(t, n) {
                        var r, i;
                        return i = [t, t.replace(/^(\/|\\)/, "")], r = e[i[0]] || e[i[1]], r || o.throwError('Unable to find template "' + t + '".'), n ? void n(null, r) : r
                    }, n
                }
            }, {
                "../utils": 26,
                path: 29
            }],
            8: [function(e, t, n) {
                function r(e) {
                    return e.replace(/[\-\/\\\^$*+?.()|\[\]{}]/g, "\\$&")
                }

                function o(e, t, n, r, o) {
                    this.out = [], this.state = [], this.filterApplyIdx = [], this._parsers = {}, this.line = r, this.filename = o, this.filters = t, this.escape = n, this.parse = function() {
                        var t = this;
                        return t._parsers.start && t._parsers.start.call(t), i.each(e, function(n, r) {
                            var o = e[r - 1];
                            if (t.isLast = r === e.length - 1, o)
                                for (; o.type === a.WHITESPACE;) r -= 1, o = e[r - 1];
                            t.prevToken = o, t.parseToken(n)
                        }), t._parsers.end && t._parsers.end.call(t), t.escape && (t.filterApplyIdx = [0], "string" == typeof t.escape ? (t.parseToken({
                            type: a.FILTER,
                            match: "e"
                        }), t.parseToken({
                            type: a.COMMA,
                            match: ","
                        }), t.parseToken({
                            type: a.STRING,
                            match: String(n)
                        }), t.parseToken({
                            type: a.PARENCLOSE,
                            match: ")"
                        })) : t.parseToken({
                            type: a.FILTEREMPTY,
                            match: "e"
                        })), t.out
                    }
                }
                var i = e("./utils"),
                    s = e("./lexer"),
                    a = s.types,
                    l = ["break", "case", "catch", "continue", "debugger", "default", "delete", "do", "else", "finally", "for", "function", "if", "in", "instanceof", "new", "return", "switch", "this", "throw", "try", "typeof", "var", "void", "while", "with"];
                o.prototype = {
                    on: function(e, t) {
                        this._parsers[e] = t
                    },
                    parseToken: function(e) {
                        var t, n = this,
                            r = n._parsers[e.type] || n._parsers["*"],
                            o = e.match,
                            s = n.prevToken,
                            l = s ? s.type : null,
                            u = n.state.length ? n.state[n.state.length - 1] : null;
                        if (!r || "function" != typeof r || r.call(this, e)) switch (u && s && u === a.FILTER && l === a.FILTER && e.type !== a.PARENCLOSE && e.type !== a.COMMA && e.type !== a.OPERATOR && e.type !== a.FILTER && e.type !== a.FILTEREMPTY && n.out.push(", "), u && u === a.METHODOPEN && (n.state.pop(), e.type !== a.PARENCLOSE && n.out.push(", ")), e.type) {
                            case a.WHITESPACE:
                                break;
                            case a.STRING:
                                n.filterApplyIdx.push(n.out.length), n.out.push(o.replace(/\\/g, "\\\\"));
                                break;
                            case a.NUMBER:
                            case a.BOOL:
                                n.filterApplyIdx.push(n.out.length), n.out.push(o);
                                break;
                            case a.FILTER:
                                n.filters.hasOwnProperty(o) && "function" == typeof n.filters[o] || i.throwError('Invalid filter "' + o + '"', n.line, n.filename), n.escape = n.filters[o].safe ? !1 : n.escape, n.out.splice(n.filterApplyIdx[n.filterApplyIdx.length - 1], 0, '_filters["' + o + '"]('), n.state.push(e.type);
                                break;
                            case a.FILTEREMPTY:
                                n.filters.hasOwnProperty(o) && "function" == typeof n.filters[o] || i.throwError('Invalid filter "' + o + '"', n.line, n.filename), n.escape = n.filters[o].safe ? !1 : n.escape, n.out.splice(n.filterApplyIdx[n.filterApplyIdx.length - 1], 0, '_filters["' + o + '"]('), n.out.push(")");
                                break;
                            case a.FUNCTION:
                            case a.FUNCTIONEMPTY:
                                n.out.push("((typeof _ctx." + o + ' !== "undefined") ? _ctx.' + o + " : ((typeof " + o + ' !== "undefined") ? ' + o + " : _fn))("), n.escape = !1, e.type === a.FUNCTIONEMPTY ? n.out[n.out.length - 1] = n.out[n.out.length - 1] + ")" : n.state.push(e.type), n.filterApplyIdx.push(n.out.length - 1);
                                break;
                            case a.PARENOPEN:
                                n.state.push(e.type), n.filterApplyIdx.length ? (n.out.splice(n.filterApplyIdx[n.filterApplyIdx.length - 1], 0, "("), s && l === a.VAR ? (t = s.match.split(".").slice(0, -1), n.out.push(" || _fn).call(" + n.checkMatch(t)), n.state.push(a.METHODOPEN), n.escape = !1) : n.out.push(" || _fn)("), n.filterApplyIdx.push(n.out.length - 3)) : (n.out.push("("), n.filterApplyIdx.push(n.out.length - 1));
                                break;
                            case a.PARENCLOSE:
                                t = n.state.pop(), t !== a.PARENOPEN && t !== a.FUNCTION && t !== a.FILTER && i.throwError("Mismatched nesting state", n.line, n.filename), n.out.push(")"), n.filterApplyIdx.pop(), t !== a.FILTER && n.filterApplyIdx.pop();
                                break;
                            case a.COMMA:
                                u !== a.FUNCTION && u !== a.FILTER && u !== a.ARRAYOPEN && u !== a.CURLYOPEN && u !== a.PARENOPEN && u !== a.COLON && i.throwError("Unexpected comma", n.line, n.filename), u === a.COLON && n.state.pop(), n.out.push(", "), n.filterApplyIdx.pop();
                                break;
                            case a.LOGIC:
                            case a.COMPARATOR:
                                s && l !== a.COMMA && l !== e.type && l !== a.BRACKETOPEN && l !== a.CURLYOPEN && l !== a.PARENOPEN && l !== a.FUNCTION || i.throwError("Unexpected logic", n.line, n.filename), n.out.push(e.match);
                                break;
                            case a.NOT:
                                n.out.push(e.match);
                                break;
                            case a.VAR:
                                n.parseVar(e, o, u);
                                break;
                            case a.BRACKETOPEN:
                                !s || l !== a.VAR && l !== a.BRACKETCLOSE && l !== a.PARENCLOSE ? (n.state.push(a.ARRAYOPEN), n.filterApplyIdx.push(n.out.length)) : n.state.push(e.type), n.out.push("[");
                                break;
                            case a.BRACKETCLOSE:
                                t = n.state.pop(), t !== a.BRACKETOPEN && t !== a.ARRAYOPEN && i.throwError("Unexpected closing square bracket", n.line, n.filename), n.out.push("]"), n.filterApplyIdx.pop();
                                break;
                            case a.CURLYOPEN:
                                n.state.push(e.type), n.out.push("{"), n.filterApplyIdx.push(n.out.length - 1);
                                break;
                            case a.COLON:
                                u !== a.CURLYOPEN && i.throwError("Unexpected colon", n.line, n.filename), n.state.push(e.type), n.out.push(":"), n.filterApplyIdx.pop();
                                break;
                            case a.CURLYCLOSE:
                                u === a.COLON && n.state.pop(), n.state.pop() !== a.CURLYOPEN && i.throwError("Unexpected closing curly brace", n.line, n.filename), n.out.push("}"), n.filterApplyIdx.pop();
                                break;
                            case a.DOTKEY:
                                (!s || l !== a.VAR && l !== a.BRACKETCLOSE && l !== a.DOTKEY && l !== a.PARENCLOSE && l !== a.FUNCTIONEMPTY && l !== a.FILTEREMPTY && l !== a.CURLYCLOSE) && i.throwError('Unexpected key "' + o + '"', n.line, n.filename), n.out.push("." + o);
                                break;
                            case a.OPERATOR:
                                n.out.push(" " + o + " "), n.filterApplyIdx.pop()
                        }
                    },
                    parseVar: function(e, t, n) {
                        var r = this;
                        return t = t.split("."), -1 !== l.indexOf(t[0]) && i.throwError('Reserved keyword "' + t[0] + '" attempted to be used as a variable', r.line, r.filename), r.filterApplyIdx.push(r.out.length), n === a.CURLYOPEN ? (t.length > 1 && i.throwError("Unexpected dot", r.line, r.filename), void r.out.push(t[0])) : void r.out.push(r.checkMatch(t))
                    },
                    checkMatch: function(e) {
                        function t(t) {
                            var n = t + o,
                                r = e,
                                s = "";
                            return s = "(typeof " + n + ' !== "undefined" && ' + n + " !== null", i.each(r, function(e, t) {
                                0 !== t && (s += " && " + n + "." + e + " !== undefined && " + n + "." + e + " !== null", n += "." + e)
                            }), s += ")"
                        }

                        function n(n) {
                            return "(" + t(n) + " ? " + n + e.join(".") + ' : "")'
                        }
                        var r, o = e[0];
                        return r = "(" + t("_ctx.") + " ? " + n("_ctx.") + " : " + n("") + ")", "(" + r + " !== null ? " + r + ' : "" )'
                    }
                }, n.parse = function(e, t, l, u, c) {
                    function p(e, t) {
                        var n, r, a = s.read(i.strip(e));
                        return n = new o(a, c, y, t, l.filename), r = n.parse().join(""), n.state.length && i.throwError('Unable to parse "' + e + '"', t, l.filename), {
                            compile: function() {
                                return "_output += " + r + ";\n"
                            }
                        }
                    }

                    function d(t, n) {
                        var r, p, d, f, h, v, m;
                        if (i.startsWith(t, "end")) {
                            if (m = L[L.length - 1], m && m.name === t.split(/\s+/)[0].replace(/^end/, "") && m.ends) {
                                switch (m.name) {
                                    case "autoescape":
                                        y = l.autoescape;
                                        break;
                                    case "raw":
                                        F = !1
                                }
                                return void L.pop()
                            }
                            F || i.throwError('Unexpected end of tag "' + t.replace(/^end/, "") + '"', n, l.filename)
                        }
                        if (!F) {
                            switch (d = t.split(/\s+(.+)?/), f = d.shift(), u.hasOwnProperty(f) || i.throwError('Unexpected tag "' + t + '"', n, l.filename), r = s.read(i.strip(d.join(" "))), p = new o(r, c, !1, n, l.filename), h = u[f], h.parse(d[1], n, p, a, L, l, e) || i.throwError('Unexpected tag "' + f + '"', n, l.filename), p.parse(), v = p.out, f) {
                                case "autoescape":
                                    y = "false" !== v[0] ? v[0] : !1;
                                    break;
                                case "raw":
                                    F = !0
                            }
                            return {
                                block: !!u[f].block,
                                compile: h.compile,
                                args: v,
                                content: [],
                                ends: h.ends,
                                name: f
                            }
                        }
                    }

                    function f(e) {
                        return "string" == typeof e && (e = e.replace(/\s*$/, "")), e
                    }
                    t = t.replace(/\r\n/g, "\n");
                    var h, y = l.autoescape,
                        v = l.tagControls[0],
                        m = l.tagControls[1],
                        g = l.varControls[0],
                        b = l.varControls[1],
                        _ = r(v),
                        w = r(m),
                        C = r(g),
                        T = r(b),
                        E = new RegExp("^" + _ + "-?\\s*-?|-?\\s*-?" + w + "$", "g"),
                        x = new RegExp("^" + _ + "-"),
                        O = new RegExp("-" + w + "$"),
                        P = new RegExp("^" + C + "-?\\s*-?|-?\\s*-?" + T + "$", "g"),
                        S = new RegExp("^" + C + "-"),
                        j = new RegExp("-" + T + "$"),
                        k = l.cmtControls[0],
                        I = l.cmtControls[1],
                        R = "[\\s\\S]*?",
                        M = new RegExp("(" + _ + R + w + "|" + C + R + T + "|" + r(k) + R + r(I) + ")"),
                        A = 1,
                        L = [],
                        N = null,
                        B = [],
                        D = {},
                        F = !1;
                    return n.parseVariable = p, i.each(t.split(M), function(e) {
                        var t, n, r, o, s;
                        if (e) {
                            if (!F && i.startsWith(e, g) && i.endsWith(e, b)) r = S.test(e), h = j.test(e), t = p(e.replace(P, ""), A);
                            else if (i.startsWith(e, v) && i.endsWith(e, m)) r = x.test(e), h = O.test(e), t = d(e.replace(E, ""), A), t && ("extends" === t.name ? N = t.args.join("").replace(/^\'|\'$/g, "").replace(/^\"|\"$/g, "") : t.block && !L.length && (D[t.args.join("")] = t)), F && !t && (t = e);
                            else if (F || !i.startsWith(e, k) && !i.endsWith(e, I)) t = h ? e.replace(/^\s*/, "") : e, h = !1;
                            else if (i.startsWith(e, k) && i.endsWith(e, I)) return;
                            r && B.length && (o = B.pop(), "string" == typeof o ? o = f(o) : o.content && o.content.length && (s = f(o.content.pop()), o.content.push(s)), B.push(o)), t && (L.length ? L[L.length - 1].content.push(t) : B.push(t), t.name && t.ends && L.push(t), n = e.match(/\n/g), A += n ? n.length : 0)
                        }
                    }), {
                        name: l.filename,
                        parent: N,
                        tokens: B,
                        blocks: D
                    }
                }, n.compile = function(e, t, r, o) {
                    var s = "",
                        a = i.isArray(e) ? e : e.tokens;
                    return i.each(a, function(e) {
                        var i;
                        return "string" == typeof e ? void(s += '_output += "' + e.replace(/\\/g, "\\\\").replace(/\n|\r/g, "\\n").replace(/"/g, '\\"') + '";\n') : (i = e.compile(n.compile, e.args ? e.args.slice(0) : [], e.content ? e.content.slice(0) : [], t, r, o),
                            void(s += i || ""))
                    }), s
                }
            }, {
                "./lexer": 4,
                "./utils": 26
            }],
            9: [function(e, t, n) {
                function r() {
                    return ""
                }

                function o(e) {
                    if (e) {
                        if (i.each(["varControls", "tagControls", "cmtControls"], function(t) {
                                if (e.hasOwnProperty(t)) {
                                    if (!i.isArray(e[t]) || 2 !== e[t].length) throw new Error('Option "' + t + '" must be an array containing 2 different control strings.');
                                    if (e[t][0] === e[t][1]) throw new Error('Option "' + t + '" open and close controls must not be the same.');
                                    i.each(e[t], function(e, n) {
                                        if (e.length < 2) throw new Error('Option "' + t + '" ' + (n ? "open " : "close ") + 'control must be at least 2 characters. Saw "' + e + '" instead.')
                                    })
                                }
                            }), e.hasOwnProperty("cache") && e.cache && "memory" !== e.cache && (!e.cache.get || !e.cache.set)) throw new Error("Invalid cache option " + JSON.stringify(e.cache) + ' found. Expected "memory" or { get: function (key) { ... }, set: function (key, value) { ... } }.');
                        if (e.hasOwnProperty("loader") && e.loader && (!e.loader.load || !e.loader.resolve)) throw new Error("Invalid loader option " + JSON.stringify(e.loader) + " found. Expected { load: function (pathname, cb) { ... }, resolve: function (to, from) { ... } }.")
                    }
                }
                var i = e("./utils"),
                    s = e("./tags"),
                    a = e("./filters"),
                    l = e("./parser"),
                    u = e("./dateformatter"),
                    c = e("./loaders");
                n.version = "1.4.2";
                var p, d = {
                    autoescape: !0,
                    varControls: ["{{", "}}"],
                    tagControls: ["{%", "%}"],
                    cmtControls: ["{#", "#}"],
                    locals: {},
                    cache: "memory",
                    loader: c.fs()
                };
                n.setDefaults = function(e) {
                    o(e), p.options = i.extend(p.options, e)
                }, n.setDefaultTZOffset = function(e) {
                    u.tzOffset = e
                }, n.Swig = function(e) {
                    function t(e) {
                        return e && e.locals ? i.extend({}, y.options.locals, e.locals) : y.options.locals
                    }

                    function n(e) {
                        return e = e || {}, e.hasOwnProperty("cache") && !e.cache || !y.options.cache
                    }

                    function u(e, t) {
                        return n(t) ? void 0 : "memory" === y.options.cache ? y.cache[e] : y.options.cache.get(e)
                    }

                    function c(e, t, r) {
                        return n(t) ? void 0 : "memory" === y.options.cache ? void(y.cache[e] = r) : void y.options.cache.set(e, r)
                    }

                    function p(e, t) {
                        return i.map(t, function(t) {
                            var n = t.args ? t.args.join("") : "";
                            return "block" === t.name && e[n] && (t = e[n]), t.content && t.content.length && (t.content = p(e, t.content)), t
                        })
                    }

                    function f(e, t) {
                        var n = [];
                        i.each(e, function(e) {
                            n.push(e)
                        }), i.each(n.reverse(), function(e) {
                            "block" !== e.name && t.unshift(e)
                        })
                    }

                    function h(e, t) {
                        for (var n, r, o, s = e.parent, a = [], l = []; s;) {
                            if (!t || !t.filename) throw new Error('Cannot extend "' + s + '" because current template has no filename.');
                            if (n = n || t.filename, n = y.options.loader.resolve(s, n), r = u(n, t) || y.parseFile(n, i.extend({}, t, {
                                    filename: n
                                })), s = r.parent, -1 !== a.indexOf(n)) throw new Error('Illegal circular extends of "' + n + '".');
                            a.push(n), l.push(r)
                        }
                        for (o = l.length, o = l.length - 2; o >= 0; o -= 1) l[o].tokens = p(l[o].blocks, l[o + 1].tokens), f(l[o].blocks, l[o].tokens);
                        return l
                    }
                    o(e), this.options = i.extend({}, d, e || {}), this.cache = {}, this.extensions = {};
                    var y = this,
                        v = s,
                        m = a;
                    this.invalidateCache = function() {
                        "memory" === y.options.cache && (y.cache = {})
                    }, this.setFilter = function(e, t) {
                        if ("function" != typeof t) throw new Error('Filter "' + e + '" is not a valid function.');
                        m[e] = t
                    }, this.setTag = function(e, t, n, r, o) {
                        if ("function" != typeof t) throw new Error('Tag "' + e + '" parse method is not a valid function.');
                        if ("function" != typeof n) throw new Error('Tag "' + e + '" compile method is not a valid function.');
                        v[e] = {
                            parse: t,
                            compile: n,
                            ends: r || !1,
                            block: !!o
                        }
                    }, this.setExtension = function(e, t) {
                        y.extensions[e] = t
                    }, this.parse = function(e, n) {
                        o(n);
                        var r, s = t(n),
                            a = {};
                        for (r in n) n.hasOwnProperty(r) && "locals" !== r && (a[r] = n[r]);
                        return n = i.extend({}, y.options, a), n.locals = s, l.parse(this, e, n, v, m)
                    }, this.parseFile = function(e, t) {
                        var n;
                        return t || (t = {}), e = y.options.loader.resolve(e, t.resolveFrom), n = y.options.loader.load(e), t.filename || (t = i.extend({
                            filename: e
                        }, t)), y.parse(n, t)
                    }, this.precompile = function(e, t) {
                        var n, r = y.parse(e, t),
                            o = h(r, t);
                        o.length && (r.tokens = p(r.blocks, o[0].tokens), f(r.blocks, r.tokens));
                        try {
                            n = new Function("_swig", "_ctx", "_filters", "_utils", "_fn", '  var _ext = _swig.extensions,\n    _output = "";\n' + l.compile(r, o, t) + "\n  return _output;\n")
                        } catch (s) {
                            i.throwError(s, null, t.filename)
                        }
                        return {
                            tpl: n,
                            tokens: r
                        }
                    }, this.render = function(e, t) {
                        return y.compile(e, t)()
                    }, this.renderFile = function(e, t, n) {
                        return n ? void y.compileFile(e, {}, function(e, r) {
                            var o;
                            if (e) return void n(e);
                            try {
                                o = r(t)
                            } catch (i) {
                                return void n(i)
                            }
                            n(null, o)
                        }) : y.compileFile(e)(t)
                    }, this.compile = function(e, n) {
                        function o(e) {
                            var t;
                            return t = e && a ? i.extend({}, s, e) : e && !a ? e : !e && a ? s : {}, l.tpl(y, t, m, i, r)
                        }
                        var s, a, l, p = n ? n.filename : null,
                            d = p ? u(p, n) : null;
                        return d ? d : (s = t(n), a = i.keys(s).length, l = this.precompile(e, n), i.extend(o, l.tokens), p && c(p, n, o), o)
                    }, this.compileFile = function(e, t, n) {
                        var r, o;
                        return t || (t = {}), e = y.options.loader.resolve(e, t.resolveFrom), t.filename || (t = i.extend({
                            filename: e
                        }, t)), (o = u(e, t)) ? n ? void n(null, o) : o : n ? void y.options.loader.load(e, function(e, r) {
                            if (e) return void n(e);
                            var o;
                            try {
                                o = y.compile(r, t)
                            } catch (i) {
                                return void n(i)
                            }
                            n(e, o)
                        }) : (r = y.options.loader.load(e), y.compile(r, t))
                    }, this.run = function(e, n, o) {
                        var s = t({
                            locals: n
                        });
                        return o && c(o, {}, e), e(y, s, m, i, r)
                    }
                }, p = new n.Swig, n.setFilter = p.setFilter, n.setTag = p.setTag, n.setExtension = p.setExtension, n.parseFile = p.parseFile, n.precompile = p.precompile, n.compile = p.compile, n.compileFile = p.compileFile, n.render = p.render, n.renderFile = p.renderFile, n.run = p.run, n.invalidateCache = p.invalidateCache, n.loaders = c
            }, {
                "./dateformatter": 2,
                "./filters": 3,
                "./loaders": 6,
                "./parser": 8,
                "./tags": 20,
                "./utils": 26
            }],
            10: [function(e, t, n) {
                var r = e("../utils"),
                    o = ["html", "js"];
                n.compile = function(e, t, n, r, o, i) {
                    return e(n, r, o, i)
                }, n.parse = function(e, t, n, i, s, a) {
                    var l;
                    return n.on("*", function(e) {
                        return l || e.type !== i.BOOL && (e.type !== i.STRING || -1 !== o.indexOf(e.match)) ? void r.throwError('Unexpected token "' + e.match + '" in autoescape tag', t, a.filename) : (this.out.push(e.match), void(l = !0))
                    }), !0
                }, n.ends = !0
            }, {
                "../utils": 26
            }],
            11: [function(e, t, n) {
                n.compile = function(e, t, n, r, o) {
                    return e(n, r, o, t.join(""))
                }, n.parse = function(e, t, n) {
                    return n.on("*", function(e) {
                        this.out.push(e.match)
                    }), !0
                }, n.ends = !0, n.block = !0
            }, {}],
            12: [function(e, t, n) {
                n.compile = function() {
                    return "} else {\n"
                }, n.parse = function(e, t, n, r, o) {
                    return n.on("*", function(e) {
                        throw new Error('"else" tag does not accept any tokens. Found "' + e.match + '" on line ' + t + ".")
                    }), o.length && "if" === o[o.length - 1].name
                }
            }, {}],
            13: [function(e, t, n) {
                var r = e("./if").parse;
                n.compile = function(e, t) {
                    return "} else if (" + t.join(" ") + ") {\n"
                }, n.parse = function(e, t, n, o, i) {
                    var s = r(e, t, n, o, i);
                    return s && i.length && "if" === i[i.length - 1].name
                }
            }, {
                "./if": 17
            }],
            14: [function(e, t, n) {
                n.compile = function() {}, n.parse = function() {
                    return !0
                }, n.ends = !1
            }, {}],
            15: [function(e, t, n) {
                var r = e("../filters");
                n.compile = function(e, t, n, r, o, i) {
                    var s = t.shift().replace(/\($/, ""),
                        a = '(function () {\n  var _output = "";\n' + e(n, r, o, i) + "  return _output;\n})()";
                    return ")" === t[t.length - 1] && t.pop(), t = t.length ? ", " + t.join("") : "", '_output += _filters["' + s + '"](' + a + t + ");\n"
                }, n.parse = function(e, t, n, o) {
                    function i(e) {
                        if (!r.hasOwnProperty(e)) throw new Error('Filter "' + e + '" does not exist on line ' + t + ".")
                    }
                    var s;
                    return n.on(o.FUNCTION, function(e) {
                        return s ? !0 : (s = e.match.replace(/\($/, ""), i(s), this.out.push(e.match), void this.state.push(e.type))
                    }), n.on(o.VAR, function(e) {
                        return s ? !0 : (s = e.match, i(s), void this.out.push(s))
                    }), !0
                }, n.ends = !0
            }, {
                "../filters": 3
            }],
            16: [function(e, t, n) {
                var r = "_ctx.",
                    o = r + "loop";
                n.compile = function(e, t, n, i, s, a) {
                    var l, u = t.shift(),
                        c = "__k",
                        p = (r + "__loopcache" + Math.random()).replace(/\./g, "");
                    return t[0] && "," === t[0] && (t.shift(), c = u, u = t.shift()), l = t.join(""), ["(function () {\n", "  var __l = " + l + ', __len = (_utils.isArray(__l) || typeof __l === "string") ? __l.length : _utils.keys(__l).length;\n', "  if (!__l) { return; }\n", "    var " + p + " = { loop: " + o + ", " + u + ": " + r + u + ", " + c + ": " + r + c + " };\n", "    " + o + " = { first: false, index: 1, index0: 0, revindex: __len, revindex0: __len - 1, length: __len, last: false };\n", "  _utils.each(__l, function (" + u + ", " + c + ") {\n", "    " + r + u + " = " + u + ";\n", "    " + r + c + " = " + c + ";\n", "    " + o + ".key = " + c + ";\n", "    " + o + ".first = (" + o + ".index0 === 0);\n", "    " + o + ".last = (" + o + ".revindex0 === 0);\n", "    " + e(n, i, s, a), "    " + o + ".index += 1; " + o + ".index0 += 1; " + o + ".revindex -= 1; " + o + ".revindex0 -= 1;\n", "  });\n", "  " + o + " = " + p + ".loop;\n", "  " + r + u + " = " + p + "." + u + ";\n", "  " + r + c + " = " + p + "." + c + ";\n", "  " + p + " = undefined;\n", "})();\n"].join("")
                }, n.parse = function(e, t, n, r) {
                    var o, i;
                    return n.on(r.NUMBER, function(e) {
                        var n = this.state.length ? this.state[this.state.length - 1] : null;
                        if (!i || n !== r.ARRAYOPEN && n !== r.CURLYOPEN && n !== r.CURLYCLOSE && n !== r.FUNCTION && n !== r.FILTER) throw new Error('Unexpected number "' + e.match + '" on line ' + t + ".");
                        return !0
                    }), n.on(r.VAR, function(e) {
                        return i && o ? !0 : (this.out.length || (o = !0), void this.out.push(e.match))
                    }), n.on(r.COMMA, function(e) {
                        return o && this.prevToken.type === r.VAR ? void this.out.push(e.match) : !0
                    }), n.on(r.COMPARATOR, function(e) {
                        if ("in" !== e.match || !o) throw new Error('Unexpected token "' + e.match + '" on line ' + t + ".");
                        i = !0, this.filterApplyIdx.push(this.out.length)
                    }), !0
                }, n.ends = !0
            }, {}],
            17: [function(e, t, n) {
                n.compile = function(e, t, n, r, o, i) {
                    return "if (" + t.join(" ") + ") { \n" + e(n, r, o, i) + "\n}"
                }, n.parse = function(e, t, n, r) {
                    if ("undefined" == typeof e) throw new Error("No conditional statement provided on line " + t + ".");
                    return n.on(r.COMPARATOR, function(e) {
                        if (this.isLast) throw new Error('Unexpected logic "' + e.match + '" on line ' + t + ".");
                        if (this.prevToken.type === r.NOT) throw new Error('Attempted logic "not ' + e.match + '" on line ' + t + ". Use !(foo " + e.match + ") instead.");
                        this.out.push(e.match), this.filterApplyIdx.push(this.out.length)
                    }), n.on(r.NOT, function(e) {
                        if (this.isLast) throw new Error('Unexpected logic "' + e.match + '" on line ' + t + ".");
                        this.out.push(e.match)
                    }), n.on(r.BOOL, function(e) {
                        this.out.push(e.match)
                    }), n.on(r.LOGIC, function(e) {
                        if (!this.out.length || this.isLast) throw new Error('Unexpected logic "' + e.match + '" on line ' + t + ".");
                        this.out.push(e.match), this.filterApplyIdx.pop()
                    }), !0
                }, n.ends = !0
            }, {}],
            18: [function(e, t, n) {
                var r = e("../utils");
                n.compile = function(e, t) {
                    var n = t.pop(),
                        o = "_ctx." + n + ' = {};\n  var _output = "";\n',
                        i = r.map(t, function(e) {
                            return {
                                ex: new RegExp("_ctx." + e.name, "g"),
                                re: "_ctx." + n + "." + e.name
                            }
                        });
                    return r.each(t, function(e) {
                        var t = e.compiled;
                        r.each(i, function(e) {
                            t = t.replace(e.ex, e.re)
                        }), o += t
                    }), o
                }, n.parse = function(t, n, o, i, s, a, l) {
                    var u, c, p = e("../parser").compile,
                        d = {
                            resolveFrom: a.filename
                        },
                        f = r.extend({}, a, d);
                    return o.on(i.STRING, function(e) {
                        var t = this;
                        if (!u) return u = l.parseFile(e.match.replace(/^("|')|("|')$/g, ""), d).tokens, void r.each(u, function(e) {
                            var n, r = "";
                            e && "macro" === e.name && e.compile && (n = e.args[0], r += e.compile(p, e.args, e.content, [], f) + "\n", t.out.push({
                                compiled: r,
                                name: n
                            }))
                        });
                        throw new Error("Unexpected string " + e.match + " on line " + n + ".")
                    }), o.on(i.VAR, function(e) {
                        var t = this;
                        if (!u || c) throw new Error('Unexpected variable "' + e.match + '" on line ' + n + ".");
                        if ("as" !== e.match) return c = e.match, t.out.push(c), !1
                    }), !0
                }, n.block = !0
            }, {
                "../parser": 8,
                "../utils": 26
            }],
            19: [function(e, t, n) {
                var r = "ignore",
                    o = "missing",
                    i = "only";
                n.compile = function(e, t) {
                    var n = t.shift(),
                        r = t.indexOf(i),
                        s = -1 !== r ? t.splice(r, 1) : !1,
                        a = (t.pop() || "").replace(/\\/g, "\\\\"),
                        l = t[t.length - 1] === o ? t.pop() : !1,
                        u = t.join("");
                    return (l ? "  try {\n" : "") + "_output += _swig.compileFile(" + n + ', {resolveFrom: "' + a + '"})(' + (s && u ? u : u ? "_utils.extend({}, _ctx, " + u + ")" : "_ctx") + ");\n" + (l ? "} catch (e) {}\n" : "")
                }, n.parse = function(e, t, n, s, a, l) {
                    var u, c;
                    return n.on(s.STRING, function(e) {
                        return u ? !0 : (u = e.match, void this.out.push(u))
                    }), n.on(s.VAR, function(e) {
                        if (!u) return u = e.match, !0;
                        if (!c && "with" === e.match) return void(c = !0);
                        if (c && e.match === i && "with" !== this.prevToken.match) return void this.out.push(e.match);
                        if (e.match === r) return !1;
                        if (e.match === o) {
                            if (this.prevToken.match !== r) throw new Error('Unexpected token "' + o + '" on line ' + t + ".");
                            return this.out.push(e.match), !1
                        }
                        if (this.prevToken.match === r) throw new Error('Expected "' + o + '" on line ' + t + ' but found "' + e.match + '".');
                        return !0
                    }), n.on("end", function() {
                        this.out.push(l.filename || null)
                    }), !0
                }
            }, {}],
            20: [function(e, t, n) {
                n.autoescape = e("./autoescape"), n.block = e("./block"), n["else"] = e("./else"), n.elseif = e("./elseif"), n.elif = n.elseif, n["extends"] = e("./extends"), n.filter = e("./filter"), n["for"] = e("./for"), n["if"] = e("./if"), n["import"] = e("./import"), n.include = e("./include"), n.macro = e("./macro"), n.parent = e("./parent"), n.raw = e("./raw"), n.set = e("./set"), n.spaceless = e("./spaceless")
            }, {
                "./autoescape": 10,
                "./block": 11,
                "./else": 12,
                "./elseif": 13,
                "./extends": 14,
                "./filter": 15,
                "./for": 16,
                "./if": 17,
                "./import": 18,
                "./include": 19,
                "./macro": 21,
                "./parent": 22,
                "./raw": 23,
                "./set": 24,
                "./spaceless": 25
            }],
            21: [function(e, t, n) {
                n.compile = function(e, t, n, r, o, i) {
                    var s = t.shift();
                    return "_ctx." + s + " = function (" + t.join("") + ') {\n  var _output = "",\n    __ctx = _utils.extend({}, _ctx);\n  _utils.each(_ctx, function (v, k) {\n    if (["' + t.join('","') + '"].indexOf(k) !== -1) { delete _ctx[k]; }\n  });\n' + e(n, r, o, i) + "\n _ctx = _utils.extend(_ctx, __ctx);\n  return _output;\n};\n_ctx." + s + ".safe = true;\n"
                }, n.parse = function(e, t, n, r) {
                    var o;
                    return n.on(r.VAR, function(e) {
                        if (-1 !== e.match.indexOf(".")) throw new Error('Unexpected dot in macro argument "' + e.match + '" on line ' + t + ".");
                        this.out.push(e.match)
                    }), n.on(r.FUNCTION, function(e) {
                        o || (o = e.match, this.out.push(o), this.state.push(r.FUNCTION))
                    }), n.on(r.FUNCTIONEMPTY, function(e) {
                        o || (o = e.match, this.out.push(o))
                    }), n.on(r.PARENCLOSE, function() {
                        if (!this.isLast) throw new Error("Unexpected parenthesis close on line " + t + ".")
                    }), n.on(r.COMMA, function() {
                        return !0
                    }), n.on("*", function() {}), !0
                }, n.ends = !0, n.block = !0
            }, {}],
            22: [function(e, t, n) {
                n.compile = function(e, t, n, r, o, i) {
                    if (!r || !r.length) return "";
                    var s, a, l = t[0],
                        u = !0,
                        c = r.length,
                        p = 0;
                    for (p; c > p; p += 1)
                        if (s = r[p], s.blocks && s.blocks.hasOwnProperty(i) && u && l !== s.name) return a = s.blocks[i], a.compile(e, [i], a.content, r.slice(p + 1), o) + "\n"
                }, n.parse = function(e, t, n, r, o, i) {
                    return n.on("*", function(e) {
                        throw new Error('Unexpected argument "' + e.match + '" on line ' + t + ".")
                    }), n.on("end", function() {
                        this.out.push(i.filename)
                    }), !0
                }
            }, {}],
            23: [function(e, t, n) {
                n.compile = function(e, t, n, r, o, i) {
                    return e(n, r, o, i)
                }, n.parse = function(e, t, n) {
                    return n.on("*", function(e) {
                        throw new Error('Unexpected token "' + e.match + '" in raw tag on line ' + t + ".")
                    }), !0
                }, n.ends = !0
            }, {}],
            24: [function(e, t, n) {
                n.compile = function(e, t) {
                    return t.join(" ") + ";\n"
                }, n.parse = function(e, t, n, r) {
                    var o, i = "";
                    return n.on(r.VAR, function(e) {
                        return o ? void(o += "_ctx." + e.match) : n.out.length ? !0 : void(i += e.match)
                    }), n.on(r.BRACKETOPEN, function(e) {
                        return o || this.out.length ? !0 : void(o = e.match)
                    }), n.on(r.STRING, function(e) {
                        return o && !this.out.length ? void(o += e.match) : !0
                    }), n.on(r.BRACKETCLOSE, function(e) {
                        return o && !this.out.length ? (i += o + e.match, void(o = void 0)) : !0
                    }), n.on(r.DOTKEY, function(e) {
                        return o || i ? void(i += "." + e.match) : !0
                    }), n.on(r.ASSIGNMENT, function(e) {
                        if (this.out.length || !i) throw new Error('Unexpected assignment "' + e.match + '" on line ' + t + ".");
                        this.out.push("_ctx." + i), this.out.push(e.match), this.filterApplyIdx.push(this.out.length)
                    }), !0
                }, n.block = !0
            }, {}],
            25: [function(e, t, n) {
                var r = e("../utils");
                n.compile = function(e, t, n, o, i, s) {
                    function a(e) {
                        return r.map(e, function(e) {
                            return e.content || "string" != typeof e ? (e.content = a(e.content), e) : e.replace(/^\s+/, "").replace(/>\s+</g, "><").replace(/\s+$/, "")
                        })
                    }
                    return e(a(n), o, i, s)
                }, n.parse = function(e, t, n) {
                    return n.on("*", function(e) {
                        throw new Error('Unexpected token "' + e.match + '" on line ' + t + ".")
                    }), !0
                }, n.ends = !0
            }, {
                "../utils": 26
            }],
            26: [function(e, t, n) {
                var r;
                n.strip = function(e) {
                    return e.replace(/^\s+|\s+$/g, "")
                }, n.startsWith = function(e, t) {
                    return 0 === e.indexOf(t)
                }, n.endsWith = function(e, t) {
                    return -1 !== e.indexOf(t, e.length - t.length)
                }, n.each = function(e, t) {
                    var n, o;
                    if (r(e))
                        for (n = 0, o = e.length, n; o > n && t(e[n], n, e) !== !1; n += 1);
                    else
                        for (n in e)
                            if (e.hasOwnProperty(n) && t(e[n], n, e) === !1) break;
                    return e
                }, n.isArray = r = Array.hasOwnProperty("isArray") ? Array.isArray : function(e) {
                    return e ? "object" == typeof e && -1 !== Object.prototype.toString.call(e).indexOf() : !1
                }, n.some = function(e, t) {
                    var o, i, s = 0;
                    if (r(e))
                        for (i = e.length, s; i > s && !(o = t(e[s], s, e)); s += 1);
                    else n.each(e, function(n, r) {
                        return o = t(n, r, e), !o
                    });
                    return !!o
                }, n.map = function(e, t) {
                    var n, o = 0,
                        i = [];
                    if (r(e))
                        for (n = e.length, o; n > o; o += 1) i[o] = t(e[o], o);
                    else
                        for (o in e) e.hasOwnProperty(o) && (i[o] = t(e[o], o));
                    return i
                }, n.extend = function() {
                    var e, t, n = arguments,
                        r = n[0],
                        o = n.length > 1 ? Array.prototype.slice.call(n, 1) : [],
                        i = 0,
                        s = o.length;
                    for (i; s > i; i += 1) {
                        t = o[i] || {};
                        for (e in t) t.hasOwnProperty(e) && (r[e] = t[e])
                    }
                    return r
                }, n.keys = function(e) {
                    return e ? Object.keys ? Object.keys(e) : n.map(e, function(e, t) {
                        return t
                    }) : []
                }, n.throwError = function(e, t, n) {
                    throw t && (e += " on line " + t), n && (e += " in file " + n), new Error(e + ".")
                }
            }, {}],
            27: [function(e, t, n) {
                function r(e) {
                    return "[object Array]" === u.call(e)
                }

                function o(e, t) {
                    var n;
                    if (null === e) n = {
                        __proto__: null
                    };
                    else {
                        if ("object" != typeof e) throw new TypeError("typeof prototype[" + typeof e + "] != 'object'");
                        var r = function() {};
                        r.prototype = e, n = new r, n.__proto__ = e
                    }
                    return "undefined" != typeof t && Object.defineProperties && Object.defineProperties(n, t), n
                }

                function i(e) {
                    return "object" != typeof e && "function" != typeof e || null === e
                }

                function s(e) {
                    if (i(e)) throw new TypeError("Object.keys called on a non-object");
                    var t = [];
                    for (var n in e) c.call(e, n) && t.push(n);
                    return t
                }

                function a(e) {
                    if (i(e)) throw new TypeError("Object.getOwnPropertyNames called on a non-object");
                    var t = s(e);
                    return n.isArray(e) && -1 === n.indexOf(e, "length") && t.push("length"), t
                }

                function l(e, t) {
                    return {
                        value: e[t]
                    }
                }
                var u = Object.prototype.toString,
                    c = Object.prototype.hasOwnProperty;
                n.isArray = "function" == typeof Array.isArray ? Array.isArray : r, n.indexOf = function(e, t) {
                    if (e.indexOf) return e.indexOf(t);
                    for (var n = 0; n < e.length; n++)
                        if (t === e[n]) return n;
                    return -1
                }, n.filter = function(e, t) {
                    if (e.filter) return e.filter(t);
                    for (var n = [], r = 0; r < e.length; r++) t(e[r], r, e) && n.push(e[r]);
                    return n
                }, n.forEach = function(e, t, n) {
                    if (e.forEach) return e.forEach(t, n);
                    for (var r = 0; r < e.length; r++) t.call(n, e[r], r, e)
                }, n.map = function(e, t) {
                    if (e.map) return e.map(t);
                    for (var n = new Array(e.length), r = 0; r < e.length; r++) n[r] = t(e[r], r, e);
                    return n
                }, n.reduce = function(e, t, n) {
                    if (e.reduce) return e.reduce(t, n);
                    var r, o = !1;
                    2 < arguments.length && (r = n, o = !0);
                    for (var i = 0, s = e.length; s > i; ++i) e.hasOwnProperty(i) && (o ? r = t(r, e[i], i, e) : (r = e[i], o = !0));
                    return r
                }, "b" !== "ab".substr(-1) ? n.substr = function(e, t, n) {
                    return 0 > t && (t = e.length + t), e.substr(t, n)
                } : n.substr = function(e, t, n) {
                    return e.substr(t, n)
                }, n.trim = function(e) {
                    return e.trim ? e.trim() : e.replace(/^\s+|\s+$/g, "")
                }, n.bind = function() {
                    var e = Array.prototype.slice.call(arguments),
                        t = e.shift();
                    if (t.bind) return t.bind.apply(t, e);
                    var n = e.shift();
                    return function() {
                        t.apply(n, e.concat([Array.prototype.slice.call(arguments)]))
                    }
                }, n.create = "function" == typeof Object.create ? Object.create : o;
                var p = "function" == typeof Object.keys ? Object.keys : s,
                    d = "function" == typeof Object.getOwnPropertyNames ? Object.getOwnPropertyNames : a;
                if ((new Error).hasOwnProperty("description")) {
                    var f = function(e, t) {
                        return "[object Error]" === u.call(e) && (t = n.filter(t, function(e) {
                            return "description" !== e && "number" !== e && "message" !== e
                        })), t
                    };
                    n.keys = function(e) {
                        return f(e, p(e))
                    }, n.getOwnPropertyNames = function(e) {
                        return f(e, d(e))
                    }
                } else n.keys = p, n.getOwnPropertyNames = d;
                if ("function" == typeof Object.getOwnPropertyDescriptor) try {
                    Object.getOwnPropertyDescriptor({
                        a: 1
                    }, "a"), n.getOwnPropertyDescriptor = Object.getOwnPropertyDescriptor
                } catch (h) {
                    n.getOwnPropertyDescriptor = function(e, t) {
                        try {
                            return Object.getOwnPropertyDescriptor(e, t)
                        } catch (n) {
                            return l(e, t)
                        }
                    }
                } else n.getOwnPropertyDescriptor = l
            }, {}],
            28: [function(e, t, n) {}, {}],
            29: [function(e, t, n) {
                function r(e, t) {
                    for (var n = 0, r = e.length - 1; r >= 0; r--) {
                        var o = e[r];
                        "." === o ? e.splice(r, 1) : ".." === o ? (e.splice(r, 1), n++) : n && (e.splice(r, 1), n--)
                    }
                    if (t)
                        for (; n--; n) e.unshift("..");
                    return e
                }
                var o = e("__browserify_process"),
                    i = e("util"),
                    s = e("_shims"),
                    a = /^(\/?|)([\s\S]*?)((?:\.{1,2}|[^\/]+?|)(\.[^.\/]*|))(?:[\/]*)$/,
                    l = function(e) {
                        return a.exec(e).slice(1)
                    };
                n.resolve = function() {
                    for (var e = "", t = !1, n = arguments.length - 1; n >= -1 && !t; n--) {
                        var a = n >= 0 ? arguments[n] : o.cwd();
                        if (!i.isString(a)) throw new TypeError("Arguments to path.resolve must be strings");
                        a && (e = a + "/" + e, t = "/" === a.charAt(0))
                    }
                    return e = r(s.filter(e.split("/"), function(e) {
                        return !!e
                    }), !t).join("/"), (t ? "/" : "") + e || "."
                }, n.normalize = function(e) {
                    var t = n.isAbsolute(e),
                        o = "/" === s.substr(e, -1);
                    return e = r(s.filter(e.split("/"), function(e) {
                        return !!e
                    }), !t).join("/"), e || t || (e = "."), e && o && (e += "/"), (t ? "/" : "") + e
                }, n.isAbsolute = function(e) {
                    return "/" === e.charAt(0)
                }, n.join = function() {
                    var e = Array.prototype.slice.call(arguments, 0);
                    return n.normalize(s.filter(e, function(e, t) {
                        if (!i.isString(e)) throw new TypeError("Arguments to path.join must be strings");
                        return e
                    }).join("/"))
                }, n.relative = function(e, t) {
                    function r(e) {
                        for (var t = 0; t < e.length && "" === e[t]; t++);
                        for (var n = e.length - 1; n >= 0 && "" === e[n]; n--);
                        return t > n ? [] : e.slice(t, n - t + 1)
                    }
                    e = n.resolve(e).substr(1), t = n.resolve(t).substr(1);
                    for (var o = r(e.split("/")), i = r(t.split("/")), s = Math.min(o.length, i.length), a = s, l = 0; s > l; l++)
                        if (o[l] !== i[l]) {
                            a = l;
                            break
                        }
                    for (var u = [], l = a; l < o.length; l++) u.push("..");
                    return u = u.concat(i.slice(a)), u.join("/")
                }, n.sep = "/", n.delimiter = ":", n.dirname = function(e) {
                    var t = l(e),
                        n = t[0],
                        r = t[1];
                    return n || r ? (r && (r = r.substr(0, r.length - 1)), n + r) : "."
                }, n.basename = function(e, t) {
                    var n = l(e)[2];
                    return t && n.substr(-1 * t.length) === t && (n = n.substr(0, n.length - t.length)), n
                }, n.extname = function(e) {
                    return l(e)[3]
                }
            }, {
                __browserify_process: 31,
                _shims: 27,
                util: 30
            }],
            30: [function(e, t, n) {
                function r(e, t) {
                    var r = {
                        seen: [],
                        stylize: i
                    };
                    return arguments.length >= 3 && (r.depth = arguments[2]), arguments.length >= 4 && (r.colors = arguments[3]), h(t) ? r.showHidden = t : t && n._extend(r, t), _(r.showHidden) && (r.showHidden = !1), _(r.depth) && (r.depth = 2), _(r.colors) && (r.colors = !1), _(r.customInspect) && (r.customInspect = !0), r.colors && (r.stylize = o), a(r, e, r.depth)
                }

                function o(e, t) {
                    var n = r.styles[t];
                    return n ? "[" + r.colors[n][0] + "m" + e + "[" + r.colors[n][1] + "m" : e
                }

                function i(e, t) {
                    return e
                }

                function s(e) {
                    var t = {};
                    return R.forEach(e, function(e, n) {
                        t[e] = !0
                    }), t
                }

                function a(e, t, r) {
                    if (e.customInspect && t && x(t.inspect) && t.inspect !== n.inspect && (!t.constructor || t.constructor.prototype !== t)) {
                        var o = t.inspect(r);
                        return g(o) || (o = a(e, o, r)), o
                    }
                    var i = l(e, t);
                    if (i) return i;
                    var h = R.keys(t),
                        y = s(h);
                    if (e.showHidden && (h = R.getOwnPropertyNames(t)), 0 === h.length) {
                        if (x(t)) {
                            var v = t.name ? ": " + t.name : "";
                            return e.stylize("[Function" + v + "]", "special")
                        }
                        if (w(t)) return e.stylize(RegExp.prototype.toString.call(t), "regexp");
                        if (T(t)) return e.stylize(Date.prototype.toString.call(t), "date");
                        if (E(t)) return u(t)
                    }
                    var m = "",
                        b = !1,
                        _ = ["{", "}"];
                    if (f(t) && (b = !0, _ = ["[", "]"]), x(t)) {
                        var C = t.name ? ": " + t.name : "";
                        m = " [Function" + C + "]"
                    }
                    if (w(t) && (m = " " + RegExp.prototype.toString.call(t)), T(t) && (m = " " + Date.prototype.toUTCString.call(t)), E(t) && (m = " " + u(t)), 0 === h.length && (!b || 0 == t.length)) return _[0] + m + _[1];
                    if (0 > r) return w(t) ? e.stylize(RegExp.prototype.toString.call(t), "regexp") : e.stylize("[Object]", "special");
                    e.seen.push(t);
                    var O;
                    return O = b ? c(e, t, r, y, h) : h.map(function(n) {
                        return p(e, t, r, y, n, b)
                    }), e.seen.pop(), d(O, m, _)
                }

                function l(e, t) {
                    if (_(t)) return e.stylize("undefined", "undefined");
                    if (g(t)) {
                        var n = "'" + JSON.stringify(t).replace(/^"|"$/g, "").replace(/'/g, "\\'").replace(/\\"/g, '"') + "'";
                        return e.stylize(n, "string")
                    }
                    return m(t) ? e.stylize("" + t, "number") : h(t) ? e.stylize("" + t, "boolean") : y(t) ? e.stylize("null", "null") : void 0
                }

                function u(e) {
                    return "[" + Error.prototype.toString.call(e) + "]"
                }

                function c(e, t, n, r, o) {
                    for (var i = [], s = 0, a = t.length; a > s; ++s) I(t, String(s)) ? i.push(p(e, t, n, r, String(s), !0)) : i.push("");
                    return R.forEach(o, function(o) {
                        o.match(/^\d+$/) || i.push(p(e, t, n, r, o, !0))
                    }), i
                }

                function p(e, t, n, r, o, i) {
                    var s, l, u;
                    if (u = R.getOwnPropertyDescriptor(t, o) || {
                            value: t[o]
                        }, u.get ? l = u.set ? e.stylize("[Getter/Setter]", "special") : e.stylize("[Getter]", "special") : u.set && (l = e.stylize("[Setter]", "special")), I(r, o) || (s = "[" + o + "]"), l || (R.indexOf(e.seen, u.value) < 0 ? (l = y(n) ? a(e, u.value, null) : a(e, u.value, n - 1), l.indexOf("\n") > -1 && (l = i ? l.split("\n").map(function(e) {
                            return "  " + e
                        }).join("\n").substr(2) : "\n" + l.split("\n").map(function(e) {
                            return "   " + e
                        }).join("\n"))) : l = e.stylize("[Circular]", "special")), _(s)) {
                        if (i && o.match(/^\d+$/)) return l;
                        s = JSON.stringify("" + o), s.match(/^"([a-zA-Z_][a-zA-Z_0-9]*)"$/) ? (s = s.substr(1, s.length - 2), s = e.stylize(s, "name")) : (s = s.replace(/'/g, "\\'").replace(/\\"/g, '"').replace(/(^"|"$)/g, "'"), s = e.stylize(s, "string"))
                    }
                    return s + ": " + l
                }

                function d(e, t, n) {
                    var r = 0,
                        o = R.reduce(e, function(e, t) {
                            return r++, t.indexOf("\n") >= 0 && r++, e + t.replace(/\u001b\[\d\d?m/g, "").length + 1
                        }, 0);
                    return o > 60 ? n[0] + ("" === t ? "" : t + "\n ") + " " + e.join(",\n  ") + " " + n[1] : n[0] + t + " " + e.join(", ") + " " + n[1]
                }

                function f(e) {
                    return R.isArray(e)
                }

                function h(e) {
                    return "boolean" == typeof e
                }

                function y(e) {
                    return null === e
                }

                function v(e) {
                    return null == e
                }

                function m(e) {
                    return "number" == typeof e
                }

                function g(e) {
                    return "string" == typeof e
                }

                function b(e) {
                    return "symbol" == typeof e
                }

                function _(e) {
                    return void 0 === e
                }

                function w(e) {
                    return C(e) && "[object RegExp]" === S(e)
                }

                function C(e) {
                    return "object" == typeof e && e
                }

                function T(e) {
                    return C(e) && "[object Date]" === S(e)
                }

                function E(e) {
                    return C(e) && "[object Error]" === S(e)
                }

                function x(e) {
                    return "function" == typeof e
                }

                function O(e) {
                    return null === e || "boolean" == typeof e || "number" == typeof e || "string" == typeof e || "symbol" == typeof e || "undefined" == typeof e
                }

                function P(e) {
                    return e && "object" == typeof e && "function" == typeof e.copy && "function" == typeof e.fill && "function" == typeof e.binarySlice
                }

                function S(e) {
                    return Object.prototype.toString.call(e)
                }

                function j(e) {
                    return 10 > e ? "0" + e.toString(10) : e.toString(10)
                }

                function k() {
                    var e = new Date,
                        t = [j(e.getHours()), j(e.getMinutes()), j(e.getSeconds())].join(":");
                    return [e.getDate(), A[e.getMonth()], t].join(" ")
                }

                function I(e, t) {
                    return Object.prototype.hasOwnProperty.call(e, t)
                }
                var R = e("_shims"),
                    M = /%[sdj%]/g;
                n.format = function(e) {
                    if (!g(e)) {
                        for (var t = [], n = 0; n < arguments.length; n++) t.push(r(arguments[n]));
                        return t.join(" ")
                    }
                    for (var n = 1, o = arguments, i = o.length, s = String(e).replace(M, function(e) {
                            if ("%%" === e) return "%";
                            if (n >= i) return e;
                            switch (e) {
                                case "%s":
                                    return String(o[n++]);
                                case "%d":
                                    return Number(o[n++]);
                                case "%j":
                                    try {
                                        return JSON.stringify(o[n++])
                                    } catch (t) {
                                        return "[Circular]"
                                    }
                                default:
                                    return e
                            }
                        }), a = o[n]; i > n; a = o[++n]) s += y(a) || !C(a) ? " " + a : " " + r(a);
                    return s
                }, n.inspect = r, r.colors = {
                    bold: [1, 22],
                    italic: [3, 23],
                    underline: [4, 24],
                    inverse: [7, 27],
                    white: [37, 39],
                    grey: [90, 39],
                    black: [30, 39],
                    blue: [34, 39],
                    cyan: [36, 39],
                    green: [32, 39],
                    magenta: [35, 39],
                    red: [31, 39],
                    yellow: [33, 39]
                }, r.styles = {
                    special: "cyan",
                    number: "yellow",
                    "boolean": "yellow",
                    undefined: "grey",
                    "null": "bold",
                    string: "green",
                    date: "magenta",
                    regexp: "red"
                }, n.isArray = f, n.isBoolean = h, n.isNull = y, n.isNullOrUndefined = v, n.isNumber = m, n.isString = g, n.isSymbol = b, n.isUndefined = _, n.isRegExp = w, n.isObject = C, n.isDate = T, n.isError = E, n.isFunction = x, n.isPrimitive = O, n.isBuffer = P;
                var A = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                n.log = function() {
                    console.log("%s - %s", k(), n.format.apply(n, arguments))
                }, n.inherits = function(e, t) {
                    e.super_ = t, e.prototype = R.create(t.prototype, {
                        constructor: {
                            value: e,
                            enumerable: !1,
                            writable: !0,
                            configurable: !0
                        }
                    })
                }, n._extend = function(e, t) {
                    if (!t || !C(t)) return e;
                    for (var n = R.keys(t), r = n.length; r--;) e[n[r]] = t[n[r]];
                    return e
                }
            }, {
                _shims: 27
            }],
            31: [function(e, t, n) {
                var r = t.exports = {};
                r.nextTick = function() {
                    var e = "undefined" != typeof window && window.setImmediate,
                        t = "undefined" != typeof window && window.postMessage && window.addEventListener;
                    if (e) return function(e) {
                        return window.setImmediate(e)
                    };
                    if (t) {
                        var n = [];
                        return window.addEventListener("message", function(e) {
                                var t = e.source;
                                if ((t === window || null === t) && "process-tick" === e.data && (e.stopPropagation(), n.length > 0)) {
                                    var r = n.shift();
                                    r()
                                }
                            }, !0),
                            function(e) {
                                n.push(e), window.postMessage("process-tick", "*")
                            }
                    }
                    return function(e) {
                        setTimeout(e, 0)
                    }
                }(), r.title = "browser", r.browser = !0, r.env = {}, r.argv = [], r.binding = function(e) {
                    throw new Error("process.binding is not supported")
                }, r.cwd = function() {
                    return "/"
                }, r.chdir = function(e) {
                    throw new Error("process.chdir is not supported")
                }
            }, {}]
        }, {}, [1]), define("vendor/swig", function() {}), define("rtveplayer/modules/videojs/videojsEnhance", ["require", "exports", "module", "core/core_library", "vendor/jquery", "vendor/videojs/video", "vendor/swig"], function(e, t, n, r) {
            "use strict";
            var o = e("core/core_library"),
                i = e("vendor/jquery"),
                s = e("vendor/videojs/video"),
                a = e("vendor/swig");
            return {
                load: function() {
                    var t = i.Deferred(),
                        n = s.getComponent("PlayToggle");
                    n.prototype.onPlay = function() {
                        this.removeClass("vjs-paused"), this.addClass("vjs-playing"), this.el_.children[1].innerHTML = this.localize("Pause")
                    }, n.prototype.onPause = function() {
                        this.removeClass("vjs-playing"), this.addClass("vjs-paused"), this.el_.children[1].innerHTML = this.localize("Play")
                    };
                    var r = s.getComponent("Player");
                    r.prototype.addDualLanguage = function(e) {
                        var t = e && "[object Array]" === Object.prototype.toString.call(e) && e[0];
                        this.rtvePlayer.logger.log("RtvePlayer", "videojsEnhance", "Dual =", t), this.controlBar.dualButton.relatedByLang = t, this.trigger({
                            type: "dualbuttonchanged",
                            data: {
                                relatedByLang: t
                            }
                        })
                    }, r.prototype.addTextTracksCustom = function(e) {
                        if (this.resetTextTracksCustom(), e && "[object Array]" === Object.prototype.toString.call(e)) {
                            var t = this;
                            e.forEach(function(e) {
                                t.addRemoteTextTrack(e)
                            })
                        }
                        this.trigger({
                            type: "texttrackschanged",
                            data: {
                                subtitleList: e
                            }
                        })
                    }, r.prototype.resetTextTracksCustom = function() {
                        for (var e = this.textTracks(), t = e.length; t--;) this.removeRemoteTextTrack(e[t]);
                        this.trigger({
                            type: "texttracksreseted"
                        })
                    }, r.prototype.refreshTextTracksButtons = function() {
                        var e = (this.textTracks(), this.controlBar.subtitlesButton);
                        e && this.rtvePlayer.options.mediaConfig.subtitleList.length > 0 ? (e.removeChild(e.menu), e.menu = e.createMenu(), e.addChild(e.menu), e.show()) : e.hide(), this.trigger({
                            type: "texttracksrefreshed"
                        })
                    };
                    var l = s.getComponent("ErrorDisplay");
                    l.prototype.showError = function() {
                        var t = this.options_.rtvePlayer.errors.types.common;
                        e(["vendor/swig", this.options_.rtvePlayer.getErrorTemplate(t)], function(e, t) {
                            var n = e.run(t, {
                                message: this.localize(this.player().error().message)
                            });
                            this.contentEl_.innerHTML = n
                        }.bind(this))
                    }, l.prototype.content = function() {
                        this.player().error() && 4 === this.player().error().code && (this.player().rtvePlayer.sourceList.sources.length > 0 ? this.player().trigger("srcnotfound") : this.player().rtvePlayer.isVideo() && this.player().src() !== this.player().rtvePlayer.utils.sourceErrorType.video.src ? this.player().src(this.player().rtvePlayer.utils.sourceErrorType.video) : this.player().rtvePlayer.isAudio() && this.player().src() !== this.player().rtvePlayer.utils.sourceErrorType.audio.src ? this.player().src(this.player().rtvePlayer.utils.sourceErrorType.audio) : this.player().rtvePlayer.options.mediaConfig.assetConfig.live || this.player().trigger("ended"))
                    };
                    var u = s.getComponent("LoadingSpinner");
                    u.prototype.createEl = function() {
                        var t = e(this.options_.rtvePlayer.templates.spinnerBox),
                            n = a.run(t, {}),
                            r = i(n).addClass("vjs-loading-spinner").removeClass("hddn");
                        return r[0]
                    }, s.BACKGROUND_SIZE_SUPPORTED = !1, s.options.children = {
                        mediaLoader: {},
                        posterImage: {},
                        ageRangeFlyer: {
                            rtvePlayer: this
                        },
                        textTrackDisplay: {
                            rtvePlayer: this
                        },
                        loadingSpinner: {
                            rtvePlayer: this
                        },
                        bigPlayButton: {},
                        controlBar: {},
                        overlayPanel: {
                            rtvePlayer: this
                        },
                        relatedPanel: {
                            rtvePlayer: this
                        },
                        sharePanel: {
                            rtvePlayer: this
                        },
                        errorDisplay: {
                            rtvePlayer: this
                        }
                    }, this.isInfantil() ? delete s.options.children.relatedPanel : delete s.options.children.overlayPanel;
                    var c = {
                        playToggle: {},
                        currentTimeDisplay: {},
                        durationDisplay: {},
                        remainingTimeDisplay: {},
                        liveDisplay: {},
                        progressControl: {},
                        qualityButton: {
                            rtvePlayer: this
                        },
                        fullscreenToggle: {},
                        muteToggle: {},
                        volumeControl: {},
                        playbackRateMenuButton: {},
                        subtitlesButton: {},
                        captionsButton: {},
                        chaptersButton: {},
                        dualButton: {
                            rtvePlayer: this
                        },
                        shareButton: {
                            rtvePlayer: this
                        }
                    };
                    (!this.options.share || this.options.mediaConfig.assetConfig.live) && (delete c.shareButton, delete s.options.children.sharePanel), (this.options.mediaConfig.assetConfig.live || this.isAudio()) && (delete c.qualityButton, delete c.captionsButton);
                    var p = s.getComponent("ControlBar");
                    p.prototype.options_.children = c;
                    var d = s.getComponent("Flash");
                    return d.streamingFormats = o.merge(d.streamingFormats, {
                        "rtmp/mp3": "MP3"
                    }), s.options.nativeControlsForTouch = !1, t.resolveWith(this, []), t.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/rtveComponents", ["require", "exports", "module", "vendor/jquery", "vendor/videojs/video", "vendor/swig"], function(e, t, n, r) {
            "use strict";
            var o = e("vendor/jquery"),
                i = e("vendor/videojs/video");
            e("vendor/swig");
            return {
                load: function() {
                    var t = o.Deferred(),
                        n = i.getComponent("Button");
                    n.prototype.addButtonLabel = function(e, t) {
                        t = t || "span";
                        var n = (this.controlText_, document.createElement(t));
                        n.className = "vjs-button-label", n.innerHTML = e, this.el().innerHTML = "", this.el().appendChild(n)
                    };
                    var r = i.extend(n, {
                        constructor: function(e, t) {
                            n.call(this, e, t), this.rtvePlayer = t.rtvePlayer, this.relatedByLang = t.relatedByLang, this.hasRelatedByLang() || this.hide(), this.refresh(), this.on(this.player(), "dualbuttonchanged", this.refresh), this.controlText_ = this.localize("Dual")
                        },
                        buildCSSClass: function() {
                            return "vjs-dual-control vjs-control vjs-button "
                        },
                        handleClick: function() {
                            this.hasRelatedByLang() && this.rtvePlayer.player().trigger({
                                type: "dualchange",
                                data: {
                                    idAsset: this.relatedByLang.dualId
                                }
                            })
                        },
                        hasRelatedByLang: function() {
                            return "undefined" != typeof this.relatedByLang && null !== this.relatedByLang
                        },
                        refresh: function() {
                            this.rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "vjs.DualButton", "refresh", this.relatedByLang), this.hasRelatedByLang() ? (this.addButtonLabel(this.localize(this.relatedByLang.language)), this.show()) : this.hide()
                        }
                    });
                    r.prototype.controlText_ = "DualButton", i.registerComponent("DualButton", r);
                    var s = i.extend(n, {
                        constructor: function(e, t) {
                            n.call(this, e, t), this.rtvePlayer = t.rtvePlayer, this.controlText_ = this.localize("Share")
                        },
                        buildCSSClass: function() {
                            return "vjs-share-control vjs-control vjs-button ico share"
                        },
                        handleClick: function() {
                            this.player().trigger({
                                type: "sharebuttonclick"
                            })
                        }
                    });
                    s.prototype.controlText_ = "ShareButton", i.registerComponent("ShareButton", s);
                    var a = i.extend(n, {
                        constructor: function(e, t) {
                            n.call(this, e, t), this.rtvePlayer = t.rtvePlayer, this.controlText_ = this.localize("Quality")
                        },
                        buildCSSClass: function() {
                            return "vjs-quality-control vjs-control vjs-button ico resol"
                        },
                        handleClick: function() {
                            var e;
                            this.hasClass("resol") ? (e = "low", this.removeClass("resol")) : (e = "high", this.addClass("resol")), this.player().trigger({
                                type: "qualitybuttonclick",
                                data: {
                                    type: e
                                }
                            }), this.rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "Change Quality in mode =", this.rtvePlayer.usedMode)
                        }
                    });
                    a.prototype.controlText_ = "QualityButton", i.registerComponent("QualityButton", a);
                    var l = i.getComponent("MuteToggle");
                    l.prototype.update = function() {
                        var e = this.player_.volume(),
                            t = 0 === e || this.player_.muted() ? 0 : Math.round(3 * e),
                            n = this.el_.getElementsByClassName("vjs-control-text")[0].innerHTML;
                        this.player_.muted() && n !== this.localize("Unmute") ? n = this.localize("Unmute") : n !== this.localize("Mute") && (n = this.localize("Mute")), this.el_.getElementsByClassName("vjs-control-text")[0].innerHTML = n, this.el_.className = this.el_.className.replace(/vjs-vol-\d/gi, ""), i.addClass(this.el_, "vjs-vol-" + t)
                    };
                    var u = i.getComponent("Component"),
                        c = i.extend(u, {
                            rtvePlayer: null,
                            playerStatus: null,
                            panels: [],
                            constructor: function(e, t) {
                                u.call(this, e, t)
                            },
                            createEl: function() {
                                var e = u.prototype.createEl("div", {
                                        className: this.buildCSSClass()
                                    }),
                                    t = i.createEl("span", {
                                        className: "ico close",
                                        innerHTML: this.options_.rtvePlayer.utils.createFakeImg().outerHTML,
                                        onclick: function() {
                                            this.hide(), this.playerStatus && "playing" === this.playerStatus && this.player().play()
                                        }.bind(this)
                                    });
                                return t.setAttribute("alt", "cerrar"), this.closeEl = new u(this.player(), {
                                    el: t
                                }), this.contentEl = new u(this.player(), {}), e.appendChild(this.closeEl.el()), e.appendChild(this.contentEl.el()), e
                            },
                            buildCSSClass: function() {
                                return "vjs-panel-display " + u.prototype.buildCSSClass.call(this)
                            },
                            showPanel: function() {
                                this.addClass("be_on")
                            },
                            hidePanel: function() {
                                this.removeClass("be_on")
                            },
                            show: function() {
                                this.hidePanels(), this.showPanel()
                            },
                            hide: function() {
                                this.hidePanel()
                            },
                            hidePanels: function() {
                                for (var e = 0; e < this.panels.length; e++) this.panels[e].hide()
                            },
                            getClose: function() {
                                return this.closeEl
                            },
                            setContent: function(e) {
                                "undefined" != typeof e && ("object" == typeof e ? this.contentEl.el_.parentNode ? this.contentEl.el_.parentNode.replaceChild(e, this.contentEl.el_) : this.contentEl.el_.appendChild(e) : "string" == typeof e && (this.getContent().el_.innerHTML = e))
                            },
                            getContent: function() {
                                return this.contentEl
                            }
                        });
                    i.registerComponent("Panel", c);
                    var p = i.extend(c, {
                        constructor: function(e, t) {
                            c.call(this, e, t), this.on(e, "sharebuttonclick", this.onShareButtonClick), this.on(e, "rp/updateShareInfo", this.setup)
                        },
                        buildCSSClass: function() {
                            return "vjs-share-display " + c.prototype.buildCSSClass.call(this)
                        },
                        setup: function() {
                            var t = "/modulos/share/" + this.player().options_.type + "s/" + this.player().rtvePlayer.options.mediaConfig.assetConfig.id + "/" + this.player().options_.location || "portada";
                            e(["vendor/text!" + t], function(e) {
                                this.setContent(e)
                            }.bind(this), function(e) {
                                this.options_.rtvePlayer.logger.error("RtvePlayer", "rtveComponents", "/modulos/share", e), this.player().controlBar.shareButton.hide()
                            }.bind(this))
                        },
                        onShareButtonClick: function() {
                            this.options_.rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "Evento sharebuttonclick"), this.player().options_.mediaConfig.assetConfig.live || (this.player().paused() ? this.playerStatus = "paused" : this.playerStatus = "playing", this.player().pause()), this.show()
                        }
                    });
                    i.registerComponent("SharePanel", p);
                    var d = i.extend(c, {
                        constructor: function(e, t) {
                            c.call(this, e, t), o(this.el()).on("click", "li.cell", this.clickEvent.bind(this)), this.on(this.player(), "duration90reached", this.fetchRelated), this.on(this.player(), "ended", this.showRelated), this.on(this.player(), "play", this.hideRelated), this.on(this.player(), "seeking", this.hideRelated)
                        },
                        buildCSSClass: function() {
                            return "vjs-related " + c.prototype.buildCSSClass.call(this)
                        },
                        clickEvent: function(e) {
                            e.stopPropagation(), e.preventDefault();
                            var t = o("a", e.currentTarget).data("id");
                            this.trigger({
                                type: "relatedloading",
                                data: {
                                    idAsset: t
                                }
                            }), this.player().rtvePlayer.setMedia(t)
                        },
                        setup: function() {
                            this.getContent().addClass("related");
                            this.player().rtvePlayer.options.mediaConfig.related && e(["vendor/swig", this.player().rtvePlayer.templates.panels.relatedPanel], function(e, t) {
                                var n = e.run(t, {
                                    relatedsItem: this.player().rtvePlayer.options.mediaConfig.related
                                });
                                this.setContent(n), Math.round(this.player().currentTime()) >= Math.round(this.player().duration()) && this.showRelated()
                            }.bind(this))
                        },
                        fetchRelated: function() {
                            this.player().rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "RelatedPanel fetchRelated", "relatedOption=", this.player().rtvePlayer.options.related), this.player().rtvePlayer.options.related && this.player().rtvePlayer.loadRelated().then(function() {
                                this.setup()
                            }.bind(this))
                        },
                        showRelated: function() {
                            this.player().rtvePlayer.options.advPlaying === !0 || this.player().rtvePlayer.options.mediaConfig.assetConfig.live || this.player().rtvePlayer.options.related && this.contentEl.el() && (this.show(), this.player().rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "RelatedPanel showRelated")), this.player().controlBar.qualityButton.hasClass("resol") ? this.player().rtvePlayer.isHight = !0 : this.player().rtvePlayer.isHight = !1
                        },
                        hideRelated: function() {
                            this.player().rtvePlayer && (this.player().rtvePlayer.options.related || this.player().rtvePlayer.options.mediaConfig.related && 0 === this.player().rtvePlayer.options.mediaConfig.related.length) && (this.hide(), this.player().rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "RelatedPanel hideRelated"))
                        }
                    });
                    i.registerComponent("RelatedPanel", d);
                    var f = i.extend(c, {
                        constructor: function(e, t) {
                            c.call(this, e, t), this.getClose().hide(), this.on(this.player(), "play", this.onPlay), this.on(this.player(), "pause", this.onPause), this.on(this.player(), "rp/ready", this.onRtvePlayerReady)
                        },
                        buildCSSClass: function() {
                            return "vjs-overlay " + c.prototype.buildCSSClass.call(this)
                        },
                        setup: function() {
                            this.getContent().addClass("overlay"), this.setContent(this.player().rtvePlayer.options.mediaConfig.overlay)
                        },
                        onPlay: function() {
                            this.hide(), this.player().bigPlayButton.hide()
                        },
                        onPause: function() {
                            var e = this.player().seeking(),
                                t = this.player().duration() === this.player().currentTime(),
                                n = this.player().hasClass("vjs-waiting"),
                                r = null !== this.player().error();
                            e || t || n || r || (this.show(), this.player().bigPlayButton.show())
                        },
                        onRtvePlayerReady: function() {
                            this.player().rtvePlayer.logger.log("RtvePlayer", "rtveComponents", "OverlayPanel onRtvePlayerReady"), this.player().rtvePlayer.loadOverlay().then(function() {
                                this.setup()
                            }.bind(this))
                        }
                    });
                    i.registerComponent("OverlayPanel", f);
                    var h = i.extend(u, {
                        rtvePlayer: null,
                        init: function(e, t) {
                            u.call(this, e, t), this.rtvePlayer = t.rtvePlayer
                        },
                        createEl: function() {
                            var e = u.prototype.createEl("span", {
                                className: this.buildCSSClass() + (this.hasAgeRangeInfo() ? this.options_.rtvePlayer.options.mediaConfig.ageRangeInfo.ageRangeCssClass : "")
                            });
                            if (this.hasAgeRangeInfo()) {
                                var t = this.options_.rtvePlayer.utils.createFakeImg();
                                t.setAttribute("alt", this.options_.rtvePlayer.options.mediaConfig.ageRangeInfo.ageRangeDesc), this.ageRangeSpanEl = new u(this.player(), {
                                    el: t
                                }), e.innerHTML = t.outerHTML
                            }
                            return e
                        },
                        buildCSSClass: function() {
                            return "vjs-agerangeflyer-display ico redad " + u.prototype.buildCSSClass.call(this)
                        },
                        hasAgeRangeInfo: function() {
                            return this.options_.rtvePlayer.options.mediaConfig.ageRangeInfo && null !== this.options_.rtvePlayer.options.mediaConfig.ageRangeInfo.ageRangeUid
                        }
                    });
                    return i.registerComponent("AgeRangeFlyer", h), t.resolveWith(this, []), t.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/videojsStart", ["require", "exports", "module", "vendor/videojs/video", "vendor/jquery"], function(e, t, n) {
            "use strict";

            function r() {
                var e = .9 * this.duration();
                this.currentTime() > e && (this.off("timeupdate", r), this.trigger({
                    type: "duration90reached"
                }))
            }

            function o() {
                var e = this.rtvePlayer.options.mediaConfig.assetConfig.live;
                this.posterImage.addClass("ima"), this.controlBar.addClass("controlBox"), this.controlBar.playToggle.addClass("ico").addClass("play").addClass("video"), this.controlBar.playToggle.contentEl().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.playToggle.contentEl().firstChild), this.controlBar.fullscreenToggle.addClass("ico").addClass("fullsc"), this.controlBar.fullscreenToggle.contentEl().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.fullscreenToggle.contentEl().firstChild), !this.controlBar.subtitlesButton || e || this.isAudio() || (this.controlBar.subtitlesButton.addClass("ico").addClass("subts"), this.controlBar.subtitlesButton.contentEl().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.subtitlesButton.contentEl().firstChild)), this.controlBar.muteToggle.addClass("ico").addClass("audio"), this.controlBar.muteToggle.el().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.muteToggle.el().firstChild), !this.rtvePlayer.isVideo() || e || this.rtvePlayer.utils.isFLV(this.rtvePlayer.sourceList) || this.controlBar.qualityButton.el().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.qualityButton.el().firstChild), this.rtvePlayer.options.share && !e && this.controlBar.shareButton.el().insertBefore(this.rtvePlayer.utils.createFakeImg(), this.controlBar.shareButton.el().firstChild);
                var t = this.controlBar.volumeControl.volumeBar.volumeLevel;
                t.el().insertBefore(this.rtvePlayer.utils.createFakeImg(), t.el().firstChild)
            }

            function i() {
                var e = this;
                this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "Thumbnails checkURL ", this.rtvePlayer.CONS.baseThumbsUrl + this.rtvePlayer.utils.hashingThumbs(this.rtvePlayer.options.assetId) + "/" + this.rtvePlayer.options.assetId + "/L1_M01.jpg");
                var t = document.createElement("img");
                t.src = this.rtvePlayer.CONS.baseThumbsUrl + this.rtvePlayer.utils.hashingThumbs(this.rtvePlayer.options.assetId) + "/" + this.rtvePlayer.options.assetId + "/L1_M01.jpg", t.src ? (t.onload = function(t) {
                    e.thumbnails(e.rtvePlayer.options.assetId, e.rtvePlayer.options.mediaConfig.assetConfig.duration, !0), e.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "Thumbnails start for id ", e.rtvePlayer.options.assetId)
                }, t.onerror = function(t) {
                    e.thumbnails(e.rtvePlayer.options.assetId, e.rtvePlayer.options.mediaConfig.assetConfig.duration, !1), "object" == typeof t && t.status && e.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "errorThumbnails status Code", t.status)
                }) : e.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "Thumbnails No existe url ")
            }

            function s() {
                this.rtvePlayer.utils.checkIfRestrictAdvertisment(this.rtvePlayer.options) ? (this.rtvePlayer.options.advPlaying = !1, this.rtvePlayer.options.mediaConfig.assetConfig.live && this.addClass("vjs-live"), this.techStats(this.rtvePlayer.options), this.on("texttrackschanged", this.refreshTextTracksButtons), this.on("firstplay", function() {
                    this.rtvePlayer.isFirstPlay = !0
                }.bind(this)), n.videojsDynamicStuff.call(this)) : (this.on("preRollFinished", function(e) {
                    this.rtvePlayer.options.advPlaying = !1, this.rtvePlayer.options.mediaConfig.assetConfig.live && this.addClass("vjs-live"), this.techStats(this.rtvePlayer.options), this.on("texttrackschanged", this.refreshTextTracksButtons), this.on("firstplay", function() {
                        this.rtvePlayer.isFirstPlay = !0
                    }.bind(this)), n.videojsDynamicStuff.call(this)
                }), this.rtvePlayer.isVideo() && "undefined" != typeof this.rtvePlayer.options.mediaConfig.adsConfig && (this.rtvePlayer.options.mediaConfig.assetConfig.duration > this.rtvePlayer.CONS.defaultAdsOptions.adsMinDuration || this.rtvePlayer.options.mediaConfig.assetConfig.live) && !this.rtvePlayer.utils.isIE8() ? (this.advertisment(this), this.rtvePlayer.options.advPlaying = !0) : this.trigger({
                    type: "preRollFinished"
                }))
            }

            function a(e) {
                this.rtvePlayer = e, this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "this.player ID", this.id()), this.rtvePlayer.trigger("rp/player_Ready", this), this.on("srcnotfound", function() {
                    for (var e, t = 0; t < this.rtvePlayer.sourceList.sources.length; t++) this.rtvePlayer.sourceList.sources[0].src === this.currentSrc() && (e = this.rtvePlayer.sourceList.sources.splice(t, 1));
                    0 == this.rtvePlayer.sourceList.sources.length ? this.src(this.rtvePlayer.utils.sourceErrorType.video) : this.src(this.rtvePlayer.sourceList.sources)
                }.bind(this)), this.rtvePlayer.isVideo() && this.rtvePlayer.options.mediaConfig.assetConfig.live && this.rtvePlayer.utils.isDevice() ? this.one("firstplay", s.bind(this)) : s.call(this), f = this.rtvePlayer.id, o.call(this), m(this.rtvePlayer.container).off("click"), this.on(["canplay", "canplaythrough", "playing", "ended"], function() {
                    this.rtvePlayer.trigger("rp/loadingend")
                }.bind(this)), this.one(["canplay", "canplaythrough"], function() {
                    this.hasClass("vjs-playing") || (this.rtvePlayer.options.mediaConfig.assetConfig.live || (this.controlBar.durationDisplay.updateContent(), this.controlBar.remainingTimeDisplay.updateContent()), this.controlBar.playToggle.onPause())
                }.bind(this)), this.on("dualchange", this.rtvePlayer.playerEvents.onDualChange.bind(this.rtvePlayer)), this.on("dispose", function() {
                    if (this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "playerReady", "Removing z.swf", this.rtvePlayer.id), this.rtvePlayer.zSwfList) {
                        var e = this.rtvePlayer.zSwfList[this.rtvePlayer.id];
                        e && e.module.remove()
                    }
                }), this.rtvePlayer.isVideo() && !this.rtvePlayer.options.mediaConfig.assetConfig.live && this.on("qualitybuttonclick", function(e) {
                    this.rtvePlayer.sourcesUtils.toggleQuality(this.rtvePlayer, e.data.type, this.rtvePlayer.sourceList)
                }), this.on("contextmenu", function(e) {
                    e.preventDefault && e.preventDefault(), e.stopPropagation(), e.returnValue = !1
                })
            }

            function l() {
                this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "videojsDynamicStuff", "autoplay", this.options_.autoplay);
                var e = this.rtvePlayer.options.mediaConfig.assetConfig,
                    t = this;
                if (y = !1, this.rtvePlayer.trigger("rp/playerReadyDone", this), this.trigger("rp/updateShareInfo", this), 1 == this.rtvePlayer.isFirstPlay && 1 != this.rtvePlayer.utils.isRTMP(this.rtvePlayer.sourceList) && this.trigger({
                        type: "firstplay"
                    }), this.rtvePlayer.isFirstPlay = !1, !this.rtvePlayer.utils.isFLV(this.rtvePlayer.sourceList) && "Flash" !== this.techName_ || !this.hasStarted() || e.live || 1 == this.rtvePlayer.utils.isRTMP(this.rtvePlayer.sourceList) || this.trigger({
                        type: "firstplay"
                    }), !this.isAudio() && !e.live && "m3u8" !== this.rtvePlayer.utils.getExtension(this.rtvePlayer.sourceList.sources[0].src)) {
                    var n;
                    window.clearTimeout(n), this.on("stalled", function(e) {
                        n = window.setTimeout(function() {
                            t.on("progress", function(e) {
                                window.clearTimeout(n)
                            }.bind(t)), h = t.player().currentTime(), 3 === t.networkState() && (h = t.player().currentTime(), t.trigger("srcnotfound"))
                        }, 1e4)
                    }.bind(this))
                }
                document.addEventListener("rp/hls_error", function(e) {
                    t.trigger("srcnotfound")
                }.bind(this)), this.rtvePlayer.logger.log("RtvePlayer", "videojsStart", "videojsDynamicStuff", "Has MediaInfo=", !!this.rtvePlayer.options.mediaInfo, "Has CuePoints=", this.rtvePlayer.options.mediaInfo && this.rtvePlayer.options.mediaInfo.cuepoints && this.rtvePlayer.options.mediaInfo.cuepoints.data && this.rtvePlayer.options.mediaInfo.cuepoints.data.length, "Has Transcriptions=", this.rtvePlayer.options.mediaInfo && this.rtvePlayer.options.mediaInfo.transcription && this.rtvePlayer.options.mediaInfo.transcription.data && this.rtvePlayer.options.mediaInfo.transcription.data.length), this.rtveMediaInfo(this.rtvePlayer.options.mediaInfo), e.live || this.on("timeupdate", r), e.live || this.one("duration90reached", function() {
                    y === !1 && (y = !0, this.trigger({
                        type: "stop90"
                    }))
                }), this.hotkeys({
                    volumeStep: .1,
                    seekStep: 5,
                    enableMute: !0,
                    enableFullscreen: !0,
                    enableNumbers: !0,
                    enableJogStyle: !1,
                    enableSubtitle: !0,
                    alwaysCaptureHotkeys: !1,
                    customKeys: g
                }), this.language(this.rtvePlayer.options.language);
                for (var o in this.rtvePlayer.CONS.langClass) v.removeClass(this.rtvePlayer.getContainer(), this.rtvePlayer.CONS.langClass[o]);
                if (v.addClass(this.rtvePlayer.getContainer(), this.rtvePlayer.CONS.langClass[this.rtvePlayer.options.language] || this.rtvePlayer.CONS.langClass.es), this.addTextTracksCustom(this.rtvePlayer.options.mediaConfig.subtitleList), this.rtvePlayer.isInfantil() && this.addDualLanguage(this.rtvePlayer.options.mediaConfig.relatedByLang), this.rtvePlayer.isVideo() && !e.live && 0 == this.rtvePlayer.options.isGeo && i.call(this), this.rtvePlayer.isAudio() && null !== e.duration && this.duration(e.duration / 1e3), this.isAudio()) {
                    var s = this.el().getElementsByClassName("vjs-mouse-display")[0];
                    s.style.display = "none"
                }
                if (this.options_.starttime && this.one("loadeddata", function() {
                        this.currentTime() < this.options_.starttime && this.currentTime(this.options_.starttime)
                    }), this.ready(this.rtvePlayer.ready), this.trigger("rp/ready", this), f == this.rtvePlayer.id && this.rtvePlayer.zSwfList) {
                    var a = this.rtvePlayer.zSwfList[this.rtvePlayer.id];
                    a && a.module.remove()
                }
            }

            function u(e, t, n, r) {
                var o = this;
                return v(e, t, function() {
                    o.trigger("rp/playerReady", this), this.src(n), this.options.sources = n.sources, r.call(this, o)
                })
            }

            function c() {
                var e, t = m.Deferred();
                return this.logger.log("RtvePlayer", "videojsStart", "Ready for play"), this.utils.checkFlashTechOrder(this.sourceList) ? (this.logger.log("RtvePlayer", "videojsStart", "Change the Tech Order to=", this.CONS.flashTechOrder), this.options.techOrder = this.CONS.flashTechOrder) : (this.logger.log("RestoringtvePlayer", "videojsStart", "Restoring the Tech Order to=", this.CONS.defaultTechOrder), this.options.techOrder = this.CONS.defaultTechOrder), this.options.sources = this.sourceList.sources, e = this.player(), e ? (this.logger.log("RtvePlayer", "videojsStart", "this.player Using VideoJS ID"), this.options.img.normal.url && e.poster(this.options.img.normal.url), "undefined" != typeof this.sourceList.quality && "undefined" != typeof this.isHight ? this.isHight ? e.src(this.sourceList.sources) : e.src(this.sourceList.quality.preset.slice(-1)[0].response.url[0].src) : e.src(this.sourceList.sources), e.ready(function() {
                    n.videojsDynamicStuff.call(this)
                }).triggerReady()) : (this.logger.log("RtvePlayer", "videojsStart", "Instanciating VIDEOJS...", this.id), e = n.createVideoJS.call(this, this.id, this.options, this.sourceList.sources, n.playerReady)), t.resolveWith(this, []), t.promise()
            }

            function p(e, t) {
                var r = m.Deferred();
                return 401 === t || 403 === t ? (e.options.isGeo = !0, e.sourceList.sources = [], e.sourceList.sources = e.utils.getGeoResourceType(e.options.type)) : e.options.isGeo = !1, n.initModule.call(e), r.resolveWith(e, []), r.promise()
            }

            function d() {
                var e = m.Deferred();
                return this.sourceList.sources.length > 0 && this.utils.checkStatusSource.call(this, this.sourceList.sources[0].src, p.bind(this)), e.resolveWith(this, []), e.promise()
            }
            var f, h, y, v = e("vendor/videojs/video"),
                m = e("vendor/jquery"),
                n = {
                    playerReady: a,
                    videojsDynamicStuff: l,
                    createVideoJS: u,
                    initModule: c,
                    load: d
                },
                g = {
                    toggleCaption: {
                        key: function(e) {
                            return 83 === e.which
                        },
                        handler: function(e, t) {
                            if (t.enableSubtitle)
                                for (var n in e.textTracks()) {
                                    var r = e.textTracks()[n].mode();
                                    2 === r ? e.textTracks()[n].hide() : e.textTracks()[n].show()
                                }
                        }
                    },
                    setDualLangMedia: {
                        key: function(e) {
                            return e.ctrlKey && 68 === e.which
                        },
                        handler: function(e, t) {
                            e.controlBar.dualButton && e.controlBar.dualButton.trigger("click")
                        }
                    }
                };
            return n
        }), define("rtveplayer/modules/videojs/rtveMediaInfo", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";

            function n(t) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "generateMediaInfoContainer");
                var n = e.Deferred(),
                    r = this.rtvePlayer.templates.mediaInfoBox;
                return require(["vendor/swig", r], function(r, o) {
                    var i = r.run(o, {
                            item: {
                                mediaInfo: t,
                                mediaConfig: t.mediaConfig
                            }
                        }),
                        s = e(i)[0],
                        a = this.rtvePlayer.getContainer().getElementsByClassName(t.mediaConfig.mediaInfoConfig.cssClass)[0];
                    a && a.remove(), this.rtvePlayer.getContainer().appendChild(s), t.cuepoints && (t.cuepointsButton.container = s.getElementsByClassName(t.cuepoints.buttonClass)[0]), t.transcription && (t.transcriptionButton.container = s.getElementsByClassName(t.transcription.buttonClass)[0]), this.trigger({
                        type: "mediainfocontaineradded"
                    }), n.resolveWith(this, [s])
                }.bind(this)), n.promise()
            }

            function r(t, n) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "detachMediaInfo", n);
                var r = e.Deferred(),
                    o = [];
                return n ? t[n] ? o.push(t[n]) : this.trigger({
                    type: n + "changed" + j.removed
                }) : (o.push(t[S.cuepoints]), o.push(t[S.transcription])), o.length ? o.forEach(function(e) {
                    e && (e && e.$links && e.$links.each(function(e, t) {
                        t.remove()
                    }), this.trigger({
                        type: e.kind + "changed" + j.removed
                    })), r.resolveWith(this, [t])
                }.bind(this)) : r.resolveWith(this, [t]), r.promise()
            }

            function o(t, o) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "loadCuePointsContainer");
                var i = e.Deferred(),
                    s = t[o],
                    a = s.container && e("[data-config]", s.container),
                    l = a && a.length,
                    u = s.data && s.data.length;
                return l || u ? (s.$links = null, l && !u || l && l === u ? (this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "loadContainer", "loadingByHtml type=", o), i.resolveWith(this, [a])) : u && (this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "loadContainer", "loadingByJson type=", o), r.call(this, t).then(n).then(function(n) {
                    for (var r in S) t[S[r]] && (t[S[r]].container = n.getElementsByClassName(t[S[r]].cssClass)[0]);
                    var o = e("[data-config]", s.container);
                    i.resolveWith(this, [o])
                }))) : i.rejectWith(this, []), i.promise()
            }

            function i(t) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "prepareCuePoints", t.cuepoints && t.cuepoints.data && t.cuepoints.data.length);
                var n = e.Deferred();
                return o.call(this, t, t.cuepoints.kind).then(function(e) {
                    t.cuepoints.$links = e, a.call(this, t.cuepoints), this.trigger({
                        type: "cuepointschanged" + j.added
                    }), n.resolveWith(this, [])
                }.bind(this), r.bind(this, t, t.cuepoints.kind)), n.promise()
            }

            function s(t) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "prepareTranscriptions", t.transcription && t.transcription.data && t.transcription.data.length);
                var n = e.Deferred();
                return o.call(this, t, t.transcription.kind).then(function(e) {
                    t.transcription.$links = e, a.call(this, t.transcription), this.trigger({
                        type: "transcriptionchanged",
                        status: "added"
                    }), n.resolveWith(this, [])
                }.bind(this), r.bind(this, t, t.transcription.kind)), n.promise()
            }

            function a(e) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "enableLinks"), e && e.$links && e.$links.each(function(n, r) {
                    r.kind = e.kind || "", t.on(r, "click", l.bind(this, r))
                }.bind(this))
            }

            function l(t, n) {
                n.preventDefault(), this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "linkHandler type=", t.kind);
                var r = e(t).data("config"),
                    o = r && !isNaN(r.init) ? r.init : null;
                (o || 0 === o) && (this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "linkHandler", "Going to time=", o), e("p[style]", this.rtvePlayer.container).length > 0 && e("p[style]", this.rtvePlayer.container).each(function() {
                    this.removeAttribute("style")
                }), this.pause(), this.currentTime(o), this.play())
            }

            function u(e) {
                e.cuepoints ? (e.cuepoints.container = this.rtvePlayer.utils.getHTMLElement(e.cuepoints.container), e.cuepoints.kind = S.cuepoints, i.call(this, e).always(c.bind(this, e))) : (r.call(this, e, S.cuepoints), c.call(this, e))
            }

            function c(e) {
                e.transcription ? (e.transcription.container = this.rtvePlayer.utils.getHTMLElement(e.transcription.container), e.transcription.kind = S.transcription, s.call(this, e)) : r.call(this, e, S.transcription)
            }

            function p(e, n) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "cuepointsChanged status=", n.status), n.status === j.added && (t.addClass(this.rtvePlayer.getContainer(), e.hasMediaTextClass), w(e)), n.status === j.removed && (h(e), g(e), e.transcription && y(e))
            }

            function d(e, n) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "transcriptionChanged status=", n.status), n.status === j.added && (t.addClass(this.rtvePlayer.getContainer(), e.hasMediaTextClass), e.cuepoints || C(e)), n.status === j.removed && (v(e), _(e), e.cuepoints && f(e))
            }

            function f(e) {
                e.cuepoints && e.cuepoints.container && t.addClass(e.cuepoints.container, "be_on")
            }

            function h(e) {
                e.cuepoints && e.cuepoints.container && t.removeClass(e.cuepoints.container, "be_on")
            }

            function y(e) {
                e.transcription && e.transcription.container && t.addClass(e.transcription.container, "be_on")
            }

            function v(e) {
                e.transcription && e.transcription.container && t.removeClass(e.transcription.container, "be_on")
            }

            function m(e) {
                e.cuepointsButton && e.cuepointsButton.container && t.addClass(e.cuepointsButton.container, "be_on")
            }

            function g(e) {
                e.cuepointsButton && e.cuepointsButton.container && t.removeClass(e.cuepointsButton.container, "be_on")
            }

            function b(e) {
                e.transcriptionButton && e.transcriptionButton.container && t.addClass(e.transcriptionButton.container, "be_on")
            }

            function _(e) {
                e.transcriptionButton && e.transcriptionButton.container && t.removeClass(e.transcriptionButton.container, "be_on")
            }

            function w(e) {
                v(e), _(e), f(e), m(e)
            }

            function C(e) {
                h(e), g(e), y(e), b(e)
            }

            function T(e) {
                this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "setMenuButtonsEvents"), e.cuepointsButton && e.cuepointsButton.container && (t.off(e.cuepointsButton.container, "click", w.bind(this, e)), t.on(e.cuepointsButton.container, "click", w.bind(this, e))), e.transcriptionButton && e.transcriptionButton.container && (t.off(e.transcriptionButton.container, "click", C.bind(this, e)), t.on(e.transcriptionButton.container, "click", C.bind(this, e)))
            }

            function E(e) {
                var t = this.rtvePlayer.getContainer().getElementsByClassName(e.mediaConfig.mediaInfoConfig.cssClass)[0];
                t && t.remove()
            }

            function x(t) {
                var n = Math.floor(this.player().currentTime());
                if (!k || k !== n) {
                    k = n;
                    var r = this.rtvePlayer.getContainer().getElementsByClassName(t.mediaConfig.mediaInfoConfig.cssClass)[0].children[1],
                        o = e('[data-config*=":' + n + '."]', r);
                    if (o = o.length > 0 ? o : e('[data-config*=":' + n + '}"]', r), o.length > 0) {
                        if (e(".active", r).length > 0) {
                            var i = e(".active", r)[0];
                            i.removeAttribute("class")
                        }
                        o.addClass("active"), r.scrollTop = o[0].offsetTop - e("[data-config]:first", r)[0].offsetTop
                    }
                }
            }

            function O(e) {
                var t = function() {
                    this.rtvePlayer.getContainer().getElementsByClassName(e.mediaConfig.mediaInfoConfig.cssClass)[0] ? x.call(this, e) : this.off("timeupdate", t)
                };
                this.rtvePlayer.utils.isIE() || (e.cuepoints && e.transcription || this.on("timeupdate", t), this.player().on("fullscreenchange", function() {
                    this.isFullscreen() ? this.off("timeupdate", t) : this.on("timeupdate", t)
                }))
            }

            function P(e) {
                if (!e || !e.cuepoints && !e.transcription) {
                    this.rtvePlayer.logger.log("RtvePlayer", "rtveMediaInfo", "The Media hasn't Cuepoint or transcriptions");
                    var n = this.rtvePlayer.getContainer().getElementsByClassName(this.rtvePlayer.options.mediaConfig.mediaInfoConfig.cssClass)[0];
                    return n && n.remove(), t.removeClass(this.rtvePlayer.getContainer(), this.rtvePlayer.options.mediaConfig.mediaInfoConfig.hasMediaTextClass), this.trigger({
                        type: "cuepointschanged" + j.removed
                    }), void this.trigger({
                        type: "transcriptionchanged" + j.removed
                    })
                }
                var r = {
                    container: e.container || this.rtvePlayer.getContainer().getElementsByClassName(this.rtvePlayer.options.mediaConfig.mediaInfoConfig.cssClass)[0] || null,
                    cuepoints: {
                        container: e.cuepoints && e.cuepoints.container || e.cuepoints && this.rtvePlayer.getContainer().getElementsByClassName(e.cuepoints.cssClass)[0] || null
                    },
                    transcription: {
                        container: e.transcription && e.transcription.container || e.transcription && this.rtvePlayer.getContainer().getElementsByClassName(e.transcription.cssClass)[0] || null
                    },
                    cuepointsButton: {
                        container: e.cuepoints && this.rtvePlayer.getContainer().getElementsByClassName(e.cuepoints.buttonClass)[0] || null
                    },
                    transcriptionButton: {
                        container: e.transcription && this.rtvePlayer.getContainer().getElementsByClassName(e.transcription.buttonClass)[0] || null
                    },
                    mediaConfig: {
                        mediaInfoConfig: {
                            cssClass: this.rtvePlayer.options.mediaConfig.mediaInfoConfig.cssClass
                        }
                    },
                    hasMediaTextClass: this.rtvePlayer.options.mediaConfig.mediaInfoConfig.hasMediaTextClass
                };
                return e = t.mergeOptions(r, e || {}), e.container = this.rtvePlayer.utils.getHTMLElement(e.container), e.cuepointsButton.container = this.rtvePlayer.utils.getHTMLElement(e.cuepointsButton.container), e.transcriptionButton.container = this.rtvePlayer.utils.getHTMLElement(e.transcriptionButton.container), this.off("cuepointschanged", p.bind(this, e)), this.on("cuepointschanged", p.bind(this, e)), this.off("transcriptionchanged", d.bind(this, e)), this.on("transcriptionchanged", d.bind(this, e)), this.off("mediainfocontaineradded", T.bind(this, e)), this.on("mediainfocontaineradded", T.bind(this, e)), this.off("mediainfocontaineradded", O.bind(this, e)), this.on("mediainfocontaineradded", O.bind(this, e)), this.player().on("dispose", E.bind(this, e)), T.call(this, e), u.call(this, e), O.call(this, e), this
            }
            var S = {
                    cuepoints: "cuepoints",
                    transcription: "transcription"
                },
                j = {
                    added: "added",
                    removed: "removed"
                },
                k = "blank";
            return {
                load: function() {
                    var n = e.Deferred();
                    return t.plugin("rtveMediaInfo", P), n.resolveWith(this, []), n.promise()
                }
            }
        }), define("rtveplayer/modules/videojs/videojsTechStats", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";

            function n(e) {
                this.profiling = e.profiling || {}, this.profiling.bufferingConfig = videojs.mergeOptions(r, this.profiling.bufferingConfig), o.startListenResourceTimeLoad.call(this), o.startListenSourceChange.call(this), o.startListenBuffering.call(this), this.on("techstats/bufferingend", s.bufferingEnd.bind(this))
            }
            var r = {
                    bufferingAnnoyingTime: 400,
                    bufferingInterval: 100,
                    stutteringInterval: .2,
                    currentPlayerPos: 0,
                    lastPlayPos: 0,
                    bufferingRounds: 0,
                    checkBufferingProcessTime: 0
                },
                o = {
                    startListenResourceTimeLoad: function() {
                        this.one("loadstart", i.loadMedia.bind(this), !1)
                    },
                    startListenSourceChange: function() {
                        this.on("srcnotfound", i.cdnChange.bind(this), !1)
                    },
                    startListenBuffering: function() {
                        this.checkBufferingInterval = setInterval(i.checkBuffering.bind(this), this.profiling.bufferingConfig.bufferingInterval)
                    }
                },
                i = {
                    loadMedia: function() {
                        this.profiling._startLoadMedia = Date.now(), this.one("canplaythrough", i.endLoadMedia.bind(this), !1)
                    },
                    endLoadMedia: function() {
                        var e = Date.now(),
                            t = e - this.profiling._startLoadMedia;
                        this.trigger({
                            type: "techstats/mediaresourceloadtime",
                            data: {
                                time: e,
                                measuredLoadTime: t
                            }
                        })
                    },
                    cdnChange: function() {
                        var e = Date.now(),
                            t = this.src();
                        this.trigger({
                            type: "techstats/cdnchange",
                            data: {
                                time: e,
                                currentSource: t
                            }
                        })
                    },
                    checkBuffering: function(e) {
                        var t = Date.now(),
                            n = this.profiling.bufferingConfig,
                            r = this.currentTime(),
                            o = 1 / n.bufferingInterval,
                            i = n.checkBufferingProcessTime / 1e3,
                            s = o + i,
                            a = r < n.lastPlayPos + s && !this.paused();
                        if (a && (0 === n.bufferingRounds && (this.rtvePlayer.logger.log("RtvePlayer", "techStats", "techstats/bufferingstart", {
                                time: t,
                                currentPlayerPos: r
                            }), this.trigger({
                                type: "techstats/bufferingstart",
                                data: {
                                    time: t,
                                    currentPlayerPos: r
                                }
                            })), n.bufferingRounds++), !a && n.bufferingRounds > 0) {
                            var l = n.bufferingRounds * n.bufferingInterval;
                            this.rtvePlayer.logger.log("RtvePlayer", "techStats", "techstats/bufferingend", {
                                time: t,
                                currentPlayerPos: r,
                                bufferingTime: l
                            }), this.trigger({
                                type: "techstats/bufferingend",
                                data: {
                                    time: t,
                                    currentPlayerPos: r,
                                    bufferingTime: l
                                }
                            }), n.bufferingRounds = 0
                        }
                        n.lastPlayPos = r, n.checkBufferingProcessTime = Date.now() - t
                    }
                },
                s = {
                    bufferingEnd: function(e) {
                        var t = this.profiling.bufferingConfig;
                        e.data.bufferingTime >= t.bufferingAnnoyingTime && (this.rtvePlayer.logger.log("RtvePlayer", "techStats", "techstats/buffering", e.data), this.trigger({
                            type: "techstats/buffering",
                            data: e.data
                        }))
                    }
                };
            return {
                load: function() {
                    var r = e.Deferred();
                    return t.plugin("techStats", n), r.resolveWith(this, []), r.promise()
                }
            }
        }), define("vendor/videojs/lang/es", [], function() {
            return {
                Play: "Reproducción",
                Pause: "Pausa",
                "Current Time": "Tiempo reproducido",
                "Duration Time": "Duración total",
                "Remaining Time": "Tiempo restante",
                "Stream Type": "Tipo de secuencia",
                LIVE: "DIRECTO",
                Loaded: "Cargado",
                Progress: "Progreso",
                Fullscreen: "Pantalla completa",
                "Non-Fullscreen": "Pantalla no completa",
                Mute: "Silenciar",
                Unmute: "No silenciado",
                "Playback Rate": "Velocidad de reproducción",
                Subtitles: "Subtítulos",
                "subtitles off": "Sin subtítulos",
                Captions: "Subtítulos",
                "captions off": "Sin subtítulos",
                Chapters: "Capítulos",
                "You aborted the video playback": "Ha interrumpido la reproducción del vídeo.",
                "A network error caused the video download to fail part-way.": "Un error de red ha interrumpido la descarga del vídeo.",
                "The video could not be loaded, either because the server or network failed or because the format is not supported.": "No se ha podido cargar el vídeo debido a un fallo de red o del servidor o porque el formato es incompatible.",
                "The video playback was aborted due to a corruption problem or because the video used features your browser did not support.": "La reproducción de vídeo se ha interrumpido por un problema de corrupción de datos o porque el vídeo precisa funciones que su navegador no ofrece.",
                "No compatible source was found for this video.": "No se ha encontrado ninguna fuente compatible con este vídeo.",
                Share: "Compartir",
                ShareButton: "Compartir",
                Quality: "Calidad",
                QualityButton: "Calidad",
                es: "Castellano",
                en: "Inglés",
                ca: "Catalán",
                Advertisement: "Promoción",
                SkipAd: "Saltar promoción",
                SkipAdIn: "Saltar promoción en ",
                nojavascript: 'Para poder reproducir este contenido por favor habilite javascript en su navegador, y considere actualizar su navegador a uno que <a href="http://videojs.com/html5-video-support/" target="_blank">soporte HTML 5</a>',
                noflash: 'Para poder reproducir este contenido es necesario tener <br/><a href="https://get.adobe.com/es/flashplayer/?no_redirect" target="_blank">Adobe Flash Player</a><br/> instalado en su navegador.',
                despub: "El contenido se encuentra despublicado.",
                failmodetwo: "Error en modo 2.",
                failmodeone: "Error en modo 1.",
                failassetconfig: "Error al llamar al config Asset de API",
                failemissionDate: "Error al llamar al Asset de API",
                nosource: "No se ha encontrado ninguna fuente compatible con este vídeo."
            }
        }), define("vendor/videojs/lang/ca", [], function() {
            return {
                Play: "Reproducció",
                Pause: "Pausa",
                "Current Time": "Temps de reproducció",
                "Duration Time": "Durada total",
                "Remaining Time": "Temps restant",
                "Stream Type": "Tipus de seqüència",
                LIVE: "DIRECTE",
                Loaded: "Carregat",
                Progress: "Progrés",
                Fullscreen: "Pantalla completa",
                "Non-Fullscreen": "Pantalla no completa",
                Mute: "Silencieu",
                Unmute: "Sense silenciar",
                "Playback Rate": "Velocitat de reproducció",
                Subtitles: "Subtítols",
                "subtitles off": "Sense subtítols",
                Captions: "Subtítols",
                "captions off": "Sense subtítols",
                Chapters: "Capítols",
                "You aborted the video playback": "Heu interromput la reproducció del vídeo.",
                "A network error caused the video download to fail part-way.": "Un error de connexió ha interromput la descàrrega del vídeo.",
                "The video could not be loaded, either because the server or network failed or because the format is not supported.": "El vídeo no es pot descarregar, o per un error del servidor o perquè el format no és compatible.",
                "The video playback was aborted due to a corruption problem or because the video used features your browser did not support.": "La reproducció del vídeo s’ha aturat per que és defectuós o per un problema d’incompatibilitat del vostre navegador.",
                "No compatible source was found for this video.": "No s’ha trobat cap font compatible amb  aquest vídeo.",
                Share: "Compartir",
                ShareButton: "Compartir",
                Quality: "Qualitat",
                QualityButton: "Qualitat",
                es: "Castellano",
                en: "Anglès",
                ca: "Català",
                Advertisement: "Promoció",
                SkipAd: "Salta't la promoció",
                SkipAdIn: "Salta't la promoció en ",
                nojavascript: 'CA_Para poder reproducir este contenido por favor habilite javascript en su navegador, y considere actualizar su navegador a uno que <a href="http://videojs.com/html5-video-support/" target="_blank">soporte HTML 5</a>',
                noflash: 'CA_Para poder reproducir este contenido es necesario tener <br/><a href="https://get.adobe.com/es/flashplayer/?no_redirect" target="_blank">Adobe Flash Player</a><br/> instalado en su navegador.',
                despub: "CA_El contenido se encuentra despublicado.",
                failmodetwo: "CA_Error en modo 2.",
                failmodeone: "CA_Error en modo 1.",
                failassetconfig: "CA_Error al llamar al config Asset de API",
                failemissionDate: "CA_Error al llamar al Asset de API",
                nosource: "No s’ha trobat cap font compatible amb  aquest vídeo."
            }
        }), define("rtveplayer/modules/rtve/envSettings", ["require", "exports", "module", "vendor/jquery"], function(e, t, n) {
            "use strict";

            function r() {
                o || (o = this.options.mediaConfig.ztnrFlashUrl), i || (i = this.options.mediaConfig.rtvePlayerSwfUrl, i = "/js/swf/RTVEPlayer.swf"), this.options.mediaConfig.ztnrFlashUrl = a.replace(/\/js\/rtveplayer\/.*/, o), this.options.mediaConfig.ztnrFlashUrl += this.isDev() ? "?env=" + this.env : "", this.options.mediaConfig.rtvePlayerSwfUrl = a.replace(/\/js\/rtveplayer\/.*/, i)
            }
            var o, i, s = e("vendor/jquery"),
                a = e.toUrl(".");
            return {
                load: function() {
                    var e = s.Deferred();
                    return r.call(this), e.resolveWith(this, [!0]), e.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/whitelist", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred();
                    this.isDev() && (this.logger.log("RtvePlayer", "whitelist", "DEV_MODE"), t.resolveWith(this, [!0]));
                    var n = this.options.mediaConfig.whitelistUrl;
                    return this.logger.log("RtvePlayer", "whitelist", "whitelistUrl=", n), require(["vendor/text!" + n], function(n) {
                        var r = e.parseXML(n);
                        this.logger.log("RtvePlayer", "whitelist", "$whitelist=", r && r.children && r.children[0] && r.children[0].outerHTML);
                        var o, i = window.location.hostname;
                        e(r).find("domain").each(function(n, r) {
                            o = e(r).text(), this.logger.log("RtvePlayer", "whitelist", "domain=", r.outerHTML, "dominio=", o), "undefined" != typeof o && "" !== o && 0 === i.indexOf(o) && (this.logger.log("RtvePlayer", "whitelist", "Dominio Permitido=", !0), t.resolveWith(this, [!0]))
                        }.bind(this)), t.rejectWith(this, [this.errors.types.whitelist, !1])
                    }.bind(this), function() {
                        this.logger.error("RtvePlayer", "whitelist", "Fallo cargando Whitelist"), t.rejectWith(this, [this.errors.types.whitelist, !1])
                    }.bind(this)), t.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/playerFeatures", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";

            function n() {
                var t = e.Deferred();
                return require(["vendor/videojs/plugins/hls/videojs-contrib-hls"], function() {
                    this.logger.log("RtvePlayer", "playerFeatures", "loadHlsPlugin", "HLS loaded"), t.resolveWith(this, [])
                }.bind(this)), t.promise()
            }

            function r() {
                var t = e.Deferred();
                return require(["vendor/videojs/plugins/videojs.hotkeys"], function() {
                    this.logger.log("RtvePlayer", "playerFeatures", "loadHotkeys", "Hotkeys loaded"), t.resolveWith(this, [])
                }.bind(this)), t.promise()
            }

            function o() {
                var t = e.Deferred();
                return require(["vendor/videojs/plugins/videojs_5.vast.vpaid"], function() {
                    this.logger.log("RtvePlayer", "playerFeatures", "loadVastVpaid", "VastVpaid loaded"), t.resolveWith(this, [])
                }.bind(this)), t.promise()
            }
            return {
                load: function() {
                    var t = e.Deferred(),
                        i = [this.loadSubtitles(), this.initPlugins(), r.call(this)];
                    return this.isInfantil() && i.push(this.loadDualLang()), "video" === this.options.type && (this.options.mediaConfig.assetConfig.duration > this.CONS.defaultAdsOptions.adsMinDuration || null === this.options.mediaConfig.assetConfig.duration) && (i.push(this.loadAdsConfig()), i.push(o.call(this))), "m3u8" === this.utils.getExtension(this.sourceList.sources[0].src) && i.push(n.call(this)), e.when.apply(this, i).then(function(e) {
                        this.logger.log("RtvePlayer", "playerFeatures", "FEATURES All promises resolved", arguments), this.options.mediaConfig.subtitleList = e;
                        var n = Array.apply(null, arguments);
                        this.logger.log("RtvePlayer", "playerFeatures", "Vendor Plugins Loaded"), t.resolveWith(this, n)
                    }.bind(this)), t.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/renderTag", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";
            return {
                load: function() {
                    var n = e.Deferred();
                    if (this.player()) n.resolveWith(this, []);
                    else {
                        var r = this.utils.isIE8(),
                            o = this.templates[this.options.type];
                        require(["vendor/swig", o], function(o, i) {
                            var s = t.options.languages[this.options.language].nojavascript,
                                a = o.run(i, {
                                    rtveplayer: this,
                                    needSourceTags: r,
                                    nojavascriptMessage: s
                                }),
                                l = e(a)[0];
                            Array.prototype.filter.call(this.getContainer().children, function(e) {
                                return e.className.indexOf("ico") > -1 || e.className.indexOf("ima") > -1 || "A" === e.nodeName || e.className.indexOf("vjs-error-display") > -1 || e.className.indexOf("spinnBox") > -1
                            }).forEach(function(e) {
                                e.remove()
                            }), this.getContainer().insertBefore(l, this.getContainer().firstChild), n.resolveWith(this, [])
                        }.bind(this))
                    }
                    return n.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/loadAssetConfig", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred();
                    return require(["vendor/text!" + this.options.mediaConfig.configUrl], function(e) {
                        e = JSON.parse(e).page.items[0], e.advUrl = e.advUrl && -1 === e.advUrl.indexOf(".json") ? e.advUrl + ".json" : e.advUrl, this.options.mediaConfig.assetConfig = e, t.resolveWith(this, [])
                    }.bind(this), function() {
                        this.logger.error("RtvePlayer", "loadAssetConfig", "llamada a API", arguments), t.rejectWith(this, [this.errors.types.failassetconfig])
                    }.bind(this)), t.promise()
                }
            }
        }, function(e) {
            console.error("RtvePlayer", "loadAssetConfig", e)
        }), define("rtveplayer/modules/rtve/loadEmissionDate", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred(),
                        n = "/api/" + this.utils.typePlural(this.options.type) + "/" + this.options.assetId + ".json";
                    return require(["vendor/text!" + n], function(e) {
                        e = JSON.parse(e).page.items[0], e && "" !== e.dateOfEmission ? this.options.mediaConfig.assetConfig.dateOfEmission = e.dateOfEmission : this.options.mediaConfig.assetConfig.dateOfEmission = "", e && "" !== e.programRef ? this.options.mediaConfig.assetConfig.programRef = e.programRef : this.options.mediaConfig.assetConfig.programRef = null, t.resolveWith(this, [])
                    }.bind(this), function() {
                        this.logger.error("RtvePlayer", "loadEmissionDate", "llamada a API", arguments), t.rejectWith(this, [this.errors.types.failemissiondate])
                    }.bind(this)), t.promise()
                }
            }
        }, function(e) {
            console.error("RtvePlayer", "loadEmissionDate", e)
        }), define("rtveplayer/modules/rtve/loadKantar", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t, n = e.Deferred(),
                        r = this.options.mediaConfig.assetConfig.programRef;
                    return null != r ? (t = this.utils.getRelativeUrl(r), require(["vendor/text!" + t], function(e) {
                        e = JSON.parse(e).page.items[0], e && "" !== e.kantar ? this.options.mediaConfig.assetConfig.kantar = e.kantar : this.options.mediaConfig.assetConfig.kantar = null, n.resolveWith(this, [])
                    }.bind(this), function() {
                        this.logger.error("RtvePlayer", "loadKantar", "llamada a API", arguments), n.rejectWith(this, [this.errors.types.failkantar])
                    }.bind(this))) : (this.options.mediaConfig.assetConfig.kantar = null, n.resolveWith(this, [])), n.promise()
                }
            }
        }, function(e) {
            console.error("RtvePlayer", "loadKantar", e)
        }), define("rtveplayer/modules/rtve/loadAdsConfig", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred(),
                        n = this,
                        r = !n.options.mediaConfig.assetConfig.advRestricted && null !== n.options.mediaConfig.assetConfig.advUrl,
                        o = window.location.hostname;
                    if (n.isVideo() && r && !n.utils.isIE8()) {
                        var i = "http://" + o + n.options.mediaConfig.promosURL;
                        n.utils.checkStatusSource.call(n, i, function(e, n) {
                            200 === n && require(["vendor/text!" + e.options.mediaConfig.promosURL], function(n) {
                                n = n && "" !== n ? JSON.parse(n).page.items[0] : null, e.logger.log("RtvePlayer", "adsConfig", "llamada a API", e.options.mediaConfig.promosURL), e.options.mediaConfig.adsConfig = n, t.resolveWith(e, [])
                            }.bind(e), function() {
                                e.logger.error("RtvePlayer", "loadAdsConfig", "llamada a API", arguments), t.resolveWith(e, [])
                            }.bind(e)), 0 === n && (e.options.mediaConfig.adsConfig = {}, t.resolveWith(e, []))
                        }.bind(n))
                    } else this.options.mediaConfig.adsConfig = {}, t.resolveWith(this, []);
                    return t.promise()
                }
            }
        }, function(e) {
            console.error("RtvePlayer", "loadAdsConfig", e)
        }), define("rtveplayer/modules/rtve/loadSubtitles", ["vendor/jquery"], function(e) {
            "use strict";

            function t(e) {
                return e.replace(/^(?:https?:\/\/)?(?:www\.)?([^\/]+)/i, "")
            }

            function n(e, n) {
                this.logger.log("RtvePlayer", "loadSubtitles", "assembleSubtitles-PRE", "subtitlesList=", e);
                var r = [];
                return e && (e.forEach(function(e, n) {
                    if (e && e.src) {
                        var o = {
                            kind: "subtitles",
                            src: t(e.src),
                            srclang: e.lang || "es",
                            language: e.lang || "es",
                            label: e.lang || "es",
                            "default": null
                        };
                        r.push(o)
                    } else r = []
                }), this.logger.log("RtvePlayer", "loadSubtitles", "assembleSubtitles-POST", "subtitlesList=", e)), r
            }

            function r(e) {
                if (null !== e) {
                    var t = "",
                        n = e.split("/")[7],
                        r = n.split(".")[0];
                    return t = "http://www.rtve.es/servicios/subtitulos/vtt/2015/" + r + ".vtt"
                }
                return ""
            }
            return {
                load: function() {
                    var t = e.Deferred(),
                        o = this.options.mediaConfig.assetConfig,
                        i = [],
                        s = !o.sbtRestricted && null !== o.sbtFile;
                    if (this.isVideo() && s) {
                        var a = this.options.mediaConfig.subtitleRefUrl;
                        this.logger.log("RtvePlayer", "loadSubtitles", "subtitleRefUrl=", a), require(["vendor/text!" + a], function(e) {
                            e = JSON.parse(e).page.items, e[0].src = r(e[0].src), i = n.call(this, e, this.options), t.resolveWith(this, [i])
                        }.bind(this), function() {
                            this.logger.error("RtvePlayer", "loadSubtitles", "llamada a API", arguments), t.resolveWith(this, [i])
                        }.bind(this))
                    } else t.resolveWith(this, [i]);
                    return t.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/loadOverlay", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred(),
                        n = this.options.mediaConfig.overlay;
                    return n && "string" == typeof n && "" !== n ? t.resolveWith(this, []) : require(["vendor/swig", this.templates.panels.overlayPanel], function(e, n) {
                        var r = e.run(n, {
                            rtveplayer: this.options.mediaConfig.assetConfig
                        });
                        this.options.mediaConfig.overlay = r, t.resolveWith(this, [])
                    }.bind(this)), t.promise()
                }
            }
        }), define("rtveplayer/modules/rtve/loadRelated", ["vendor/jquery"], function(e) {
            "use strict";
            return {
                load: function() {
                    var t = e.Deferred();
                    return require(["vendor/text!" + this.options.mediaConfig.relacionadosRefUrl], function(e) {
                        e = JSON.parse(e).page.items, this.logger.log("RtvePlayer", "loadRelated", e), e = e.slice(0, this.options.numRelated), this.logger.log("RtvePlayer", "loadRelated Por opciones", e), this.options.mediaConfig.related = e, t.resolveWith(this, [])
                    }.bind(this), function() {
                        this.logger.error("RtvePlayer", "loadRelated", "llamada a API", arguments), this.options.mediaConfig.related = [], t.resolveWith(this, [])
                    }.bind(this)), t.promise()
                }
            }
        }), define("rtveplayer/modules/ztnr/mediaSource", ["vendor/jquery", "vendor/videojs/video"], function(e, t) {
            "use strict";
            var n = function(e, t) {
					console.log(t); // REPLACED
					console.log(this); // REPLACED
                    this.logger.log("RtvePlayer", "mediaSource", "modeOneResolved", "modeOne TRUE", "PRE-format", t), this.sourceList = this.utils.parseFormats(t), this.usedMode = "one", this.logger.log("RtvePlayer", "mediaSource", "modeOneResolved", "modeOne TRUE", "POST-format", this.sourceList), e.resolveWith(this, [])
                },
                r = function(e, t) {
					console.log(t); // REPLACED
					console.log(this); // REPLACED
                    this.logger.log("RtvePlayer", "mediaSource", "modeTwoResolved", "modeTwo TRUE", "PRE-format", t), t && (this.sourceList = this.utils.parseFormats(t), this.usedMode = "two", this.logger.log("RtvePlayer", "mediaSource", "modeTwoResolved", "modeTwo TRUE", "POST-format", this.sourceList), e.resolveWith(this, []))
                },
                o = function(e, t) {
					console.log(t); // REPLACED
					console.log(this); // REPLACED
                    if (this.logger.warn("RtvePlayer", "mediaSource", "audioSrcResolved", "modeTwo FAIL"), this.isAudio()) {
                        this.logger.log("RtvePlayer", "mediaSource", "audioSrcResolved", "getSourceFromSrc ...");
                        var n = {
                            sources: [this.options.mediaConfig.audioSource]
                        };
                        this.logger.log("RtvePlayer", "mediaSource", "audioSrcResolved", "getSourceFromSrc TRUE", "PRE-format", n), this.sourceList = this.utils.parseFormats(n), this.usedMode = "other", this.logger.log("RtvePlayer", "mediaSource", "audioSrcResolved", "getSourceFromSrc TRUE", "POST-format", this.sourceList), e.resolveWith(this, [])
                    } else {
                        this.logger.warn("RtvePlayer", "mediaSource", "audioSrcResolved", "NO sources nowhere", "Error=", t);
                        var n = {
                            sources: [{
                                src: this.rtvePlayerBox.rtvePlayer.CONS.defaultSourceMp4,
                                type: "video/mp4"
                            }]
                        };
                        this.sourceList = this.utils.parseFormats(n), e.resolveWith(this, [])
                    }
                },
                i = function(e, t) {
                    this.logger.error("RtvePlayer", "mediaSource", "mediaSourceFail", t), e.rejectWith(this, [this.errors.types.nosource])
                };
            return {
                load: function() {
                    var s = e.Deferred();
					console.log("Pre thumbnail"); // MODIFIED
					console.log(s); // MODIFIED
                    return this.isVideo() || this.isAudio() ? t.getComponent("Flash").isSupported() ? this.modeOne().then(n.bind(this, s), this.modeTwo.bind(this, s)).then(r.bind(this, s), o.bind(this, s)).fail(i.bind(this, s)) : this.modeTwo().then(r.bind(this, s), o.bind(this, s)).fail(i.bind(this, s)) : s.rejectWith(this, [this.errors.types.nosource]), this.sourcesUtils = {
                        toggleQuality: function(e, t) {
                            var n = n = e.player().currentTime(),
                                r = e.player().paused();
                            if (e.player().one("canplay", function() {
                                    e.player().currentTime(n)
                                }), "one" === e.usedMode) {
                                var o;
                                o = "low" === t ? e.sourceList.quality.preset.slice(-1)[0] : e.sourceList.quality.preset[0], e.player().src(o.response.url), r && e.player().pause()
                            } else {
                                var i = "low" === t ? e.CONS.lowQualityIdManager : e.CONS.desktopIdManager;
                                e.ztnrThumbnail(i).then(function() {
                                    e.player().src(arguments[0].sources), r && e.player().pause()
                                }, function() {
                                    console.log("No se ha podido cambiar la calidad")
                                })
                            }
                        }
                    }, s.promise()
                }
            }
        }),
        function(e) {
            "undefined" == typeof e.log && (e.log = {
                create_log: function(e) {
                    this[e] = {
                        error: function() {},
                        warn: function() {},
                        info: function() {}
                    }
                }
            }), "function" == typeof define && define.amd && define("logger/log", [], function() {
                return e.log
            })
        }(window), define("rtveplayer/modules/utils/RtveLogger", ["core/core_library", "vendor/jquery", "logger/log"], function(e, t, n) {
            "use strict";
            return {
                load: function() {
                    var e = t.Deferred();
                    return n.create_log("RtvePlayer"), this.logger = {
                        log: function() {
                            var e = Array.apply(null, arguments),
                                t = this.utils.generateBufferLog(e, this.CONS.logTypes.info);
                            this.addLog(t), n.RtvePlayer.info.apply(null, arguments)
                        }.bind(this),
                        warn: function() {
                            var e = Array.apply(null, arguments),
                                t = this.utils.generateBufferLog(e, this.CONS.logTypes.warn);
                            this.addLog(t), n.RtvePlayer.warn.apply(null, arguments)
                        }.bind(this),
                        error: function() {
                            var e = Array.apply(null, arguments),
                                t = this.utils.generateBufferLog(e, this.CONS.logTypes.error);
                            this.addLog(t), n.RtvePlayer.error.apply(null, arguments)
                        }.bind(this)
                    }, e.resolveWith(this, []), e.promise()
                }
            }
        }), define("vendor/detectizr", [], function() {
            return function(e, t, n, r) {
                function o(e, t) {
                    var n, r, i;
                    if (arguments.length > 2)
                        for (n = 1, r = arguments.length; r > n; n += 1) o(e, arguments[n]);
                    else
                        for (i in t) t.hasOwnProperty(i) && (e[i] = t[i]);
                    return e
                }

                function i(e) {
                    return g.browser.userAgent.indexOf(e) > -1
                }

                function s(e) {
                    return e.test(g.browser.userAgent)
                }

                function a(e) {
                    return e.exec(g.browser.userAgent)
                }

                function l(e) {
                    return e.replace(/^\s+|\s+$/g, "")
                }

                function u(e) {
                    return null === e || e === r ? "" : String(e).replace(/((\s|\-|\.)+[a-z0-9])/g, function(e) {
                        return e.toUpperCase().replace(/(\s|\-|\.)/g, "")
                    })
                }

                function c(e, t) {
                    var n = t || "",
                        r = 1 === e.nodeType && (e.className ? (" " + e.className + " ").replace(T, " ") : "");
                    if (r) {
                        for (; r.indexOf(" " + n + " ") >= 0;) r = r.replace(" " + n + " ", " ");
                        e.className = t ? l(r) : ""
                    }
                }

                function p(e, t, n) {
                    e && (e = u(e), t && (t = u(t), f(e + t, !0), n && f(e + t + "_" + n, !0)))
                }

                function d() {
                    e.clearTimeout(v), v = e.setTimeout(function() {
                        m = g.device.orientation, e.innerHeight > e.innerWidth ? g.device.orientation = "portrait" : g.device.orientation = "landscape", f(g.device.orientation, !0), m !== g.device.orientation && f(m, !1)
                    }, 10)
                }

                function f(e, t) {
                    e && b && (w.addAllFeaturesAsClass ? b.addTest(e, t) : (t = "function" == typeof t ? t() : t, t ? b.addTest(e, !0) : (delete b[e], c(E, e))))
                }

                function h(e, t) {
                    e.version = t;
                    var n = t.split(".");
                    n.length > 0 ? (n = n.reverse(), e.major = n.pop(), n.length > 0 ? (e.minor = n.pop(), n.length > 0 ? (n = n.reverse(), e.patch = n.join(".")) : e.patch = "0") : e.minor = "0") : e.major = "0"
                }

                function y(r) {
                    var l, c, y, v, m, T, E, x, O = this;
                    if (w = o({}, w, r || {}), w.detectDevice) {
                        for (g.device = {
                                type: "",
                                model: "",
                                orientation: ""
                            }, v = g.device, s(/googletv|smarttv|internet.tv|netcast|nettv|appletv|boxee|kylo|roku|dlnadoc|ce\-html/) ? (v.type = _[0], v.model = "smartTv") : s(/xbox|playstation.3|wii/) ? (v.type = _[0], v.model = "gameConsole") : s(/ip(a|ro)d/) ? (v.type = _[1], v.model = "ipad") : s(/tablet/) && !s(/rx-34/) || s(/folio/) ? (v.type = _[1], v.model = String(a(/playbook/) || "")) : s(/linux/) && s(/android/) && !s(/fennec|mobi|htc.magic|htcX06ht|nexus.one|sc-02b|fone.945/) ? (v.type = _[1], v.model = "android") : s(/kindle/) || s(/mac.os/) && s(/silk/) ? (v.type = _[1], v.model = "kindle") : s(/gt-p10|sc-01c|shw-m180s|sgh-t849|sch-i800|shw-m180l|sph-p100|sgh-i987|zt180|htc(.flyer|\_flyer)|sprint.atp51|viewpad7|pandigital(sprnova|nova)|ideos.s7|dell.streak.7|advent.vega|a101it|a70bht|mid7015|next2|nook/) || s(/mb511/) && s(/rutem/) ? (v.type = _[1], v.model = "android") : s(/bb10/) ? (v.type = _[1], v.model = "blackberry") : (v.model = a(/iphone|ipod|android|blackberry|opera mini|opera mobi|skyfire|maemo|windows phone|palm|iemobile|symbian|symbianos|fennec|j2me/), null !== v.model ? (v.type = _[2], v.model = String(v.model)) : (v.model = "", s(/bolt|fennec|iris|maemo|minimo|mobi|mowser|netfront|novarra|prism|rx-34|skyfire|tear|xv6875|xv6975|google.wireless.transcoder/) ? v.type = _[2] : s(/opera/) && s(/windows.nt.5/) && s(/htc|xda|mini|vario|samsung\-gt\-i8000|samsung\-sgh\-i9/) ? v.type = _[2] : s(/windows.(nt|xp|me|9)/) && !s(/phone/) || s(/win(9|.9|nt)/) || s(/\(windows 8\)/) ? v.type = _[3] : s(/macintosh|powerpc/) && !s(/silk/) ? (v.type = _[3], v.model = "mac") : s(/linux/) && s(/x11/) ? v.type = _[3] : s(/solaris|sunos|bsd/) ? v.type = _[3] : s(/bot|crawler|spider|yahoo|ia_archiver|covario-ids|findlinks|dataparksearch|larbin|mediapartners-google|ng-search|snappy|teoma|jeeves|tineye/) && !s(/mobile/) ? (v.type = _[3], v.model = "crawler") : v.type = _[2])), l = 0, c = _.length; c > l; l += 1) f(_[l], v.type === _[l]);
                        w.detectDeviceModel && f(u(v.model), !0)
                    }
                    if (w.detectScreen && (b && b.mq && (f("smallScreen", b.mq("only screen and (max-width: 480px)")), f("verySmallScreen", b.mq("only screen and (max-width: 320px)")), f("veryVerySmallScreen", b.mq("only screen and (max-width: 240px)"))), v.type === _[1] || v.type === _[2] ? (e.onresize = function(e) {
                            d(e)
                        }, d()) : (v.orientation = "landscape", f(v.orientation, !0))), w.detectOS && (g.os = {}, m = g.os, "" !== v.model && ("ipad" === v.model || "iphone" === v.model || "ipod" === v.model ? (m.name = "ios", h(m, (s(/os\s([\d_]+)/) ? RegExp.$1 : "").replace(/_/g, "."))) : "android" === v.model ? (m.name = "android", h(m, s(/android\s([\d\.]+)/) ? RegExp.$1 : "")) : "blackberry" === v.model ? (m.name = "blackberry", h(m, s(/version\/([^\s]+)/) ? RegExp.$1 : "")) : "playbook" === v.model && (m.name = "blackberry", h(m, s(/os ([^\s]+)/) ? RegExp.$1.replace(";", "") : ""))), m.name || (i("win") || i("16bit") ? (m.name = "windows", i("windows nt 6.3") ? h(m, "8.1") : i("windows nt 6.2") || s(/\(windows 8\)/) ? h(m, "8") : i("windows nt 6.1") ? h(m, "7") : i("windows nt 6.0") ? h(m, "vista") : i("windows nt 5.2") || i("windows nt 5.1") || i("windows xp") ? h(m, "xp") : i("windows nt 5.0") || i("windows 2000") ? h(m, "2k") : i("winnt") || i("windows nt") ? h(m, "nt") : i("win98") || i("windows 98") ? h(m, "98") : (i("win95") || i("windows 95")) && h(m, "95")) : i("mac") || i("darwin") ? (m.name = "mac os", i("68k") || i("68000") ? h(m, "68k") : i("ppc") || i("powerpc") ? h(m, "ppc") : i("os x") && h(m, (s(/os\sx\s([\d_]+)/) ? RegExp.$1 : "os x").replace(/_/g, "."))) : i("webtv") ? m.name = "webtv" : i("x11") || i("inux") ? m.name = "linux" : i("sunos") ? m.name = "sun" : i("irix") ? m.name = "irix" : i("freebsd") ? m.name = "freebsd" : i("bsd") && (m.name = "bsd")), m.name && (f(m.name, !0), m.major && (p(m.name, m.major), m.minor && p(m.name, m.major, m.minor))), s(/\sx64|\sx86|\swin64|\swow64|\samd64/) ? m.addressRegisterSize = "64bit" : m.addressRegisterSize = "32bit", f(m.addressRegisterSize, !0)), w.detectBrowser && (T = g.browser, s(/opera|webtv/) || !s(/msie\s([\d\w\.]+)/) && !i("trident") ? i("firefox") ? (T.engine = "gecko", T.name = "firefox", h(T, s(/firefox\/([\d\w\.]+)/) ? RegExp.$1 : "")) : i("gecko/") ? T.engine = "gecko" : i("opera") ? (T.name = "opera", T.engine = "presto", h(T, s(/version\/([\d\.]+)/) ? RegExp.$1 : s(/opera(\s|\/)([\d\.]+)/) ? RegExp.$2 : "")) : i("konqueror") ? T.name = "konqueror" : i("chrome") ? (T.engine = "webkit", T.name = "chrome", h(T, s(/chrome\/([\d\.]+)/) ? RegExp.$1 : "")) : i("iron") ? (T.engine = "webkit", T.name = "iron") : i("crios") ? (T.name = "chrome", T.engine = "webkit", h(T, s(/crios\/([\d\.]+)/) ? RegExp.$1 : "")) : i("applewebkit/") ? (T.name = "safari", T.engine = "webkit", h(T, s(/version\/([\d\.]+)/) ? RegExp.$1 : "")) : i("mozilla/") && (T.engine = "gecko") : (T.engine = "trident", T.name = "ie", !e.addEventListener && n.documentMode && 7 === n.documentMode ? h(T, "8.compat") : s(/trident.*rv[ :](\d+)\./) ? h(T, RegExp.$1) : h(T, s(/trident\/4\.0/) ? "8" : RegExp.$1)), T.name && (f(T.name, !0), T.major && (p(T.name, T.major), T.minor && p(T.name, T.major, T.minor))), f(T.engine, !0), T.language = t.userLanguage || t.language, f(T.language, !0)), w.detectPlugins) {
                        for (T.plugins = [], O.detectPlugin = function(e) {
                                var n, r, o, i = t.plugins;
                                for (c = i.length - 1; c >= 0; c--) {
                                    for (n = i[c], r = n.name + n.description, o = 0, y = e.length; y >= 0; y--) - 1 !== r.indexOf(e[y]) && (o += 1);
                                    if (o === e.length) return !0
                                }
                                return !1
                            }, O.detectObject = function(e) {
                                for (c = e.length - 1; c >= 0; c--) try {
                                    new ActiveXObject(e[c])
                                } catch (t) {}
                                return !1
                            }, l = C.length - 1; l >= 0; l--) E = C[l], x = !1, e.ActiveXObject ? x = O.detectObject(E.progIds) : t.plugins && (x = O.detectPlugin(E.substrs)), x && (T.plugins.push(E.name), f(E.name, !0));
                        t.javaEnabled() && (T.plugins.push("java"), f("java", !0))
                    }
                }
                var v, m, g = {},
                    b = e.Modernizr,
                    _ = ["tv", "tablet", "mobile", "desktop"],
                    w = {
                        addAllFeaturesAsClass: !1,
                        detectDevice: !0,
                        detectDeviceModel: !0,
                        detectScreen: !0,
                        detectOS: !0,
                        detectBrowser: !0,
                        detectPlugins: !0
                    },
                    C = [{
                        name: "adobereader",
                        substrs: ["Adobe", "Acrobat"],
                        progIds: ["AcroPDF.PDF", "PDF.PDFCtrl.5"]
                    }, {
                        name: "flash",
                        substrs: ["Shockwave Flash"],
                        progIds: ["ShockwaveFlash.ShockwaveFlash.1"]
                    }, {
                        name: "wmplayer",
                        substrs: ["Windows Media"],
                        progIds: ["wmplayer.ocx"]
                    }, {
                        name: "silverlight",
                        substrs: ["Silverlight"],
                        progIds: ["AgControl.AgControl"]
                    }, {
                        name: "quicktime",
                        substrs: ["QuickTime"],
                        progIds: ["QuickTime.QuickTime"]
                    }],
                    T = /[\t\r\n]/g,
                    E = n.documentElement;
                return g.detect = function(e) {
                    return y(e)
                }, g.init = function() {
                    g !== r && (g.browser = {
                        userAgent: (t.userAgent || t.vendor || e.opera).toLowerCase()
                    }, g.detect({
                        detectScreen: !1,
                        detectPlugins: !1
                    }))
                }, g.init(), g
            }(window, window.navigator, window.document)
        }), define("rtveplayer/modules/utils/utils", ["vendor/jquery", "vendor/detectizr"], function(e, t) {
            "use strict";
            var n = {
                    REGEX_EXT: /.*\.(\w+)/i,
                    REGEX_RTMP_PROTOCOL: /^rtmp:\/\/|rtmpe:\/\//i,
                    REGEX_FLV: /.flv/i,
                    REGEX_HLS: /.m3u8/i,
                    REGEX_CHROME: /Chrome/i,
                    REGEX_FIREFOX: /Firefox/i,
                    REGEX_EDGE: /Edge/i,
                    REGEX_ANDROID: /Android/i,
                    REGEX_IPHONE: /iPhone/i,
                    REGEX_IPAD: /iPad/i
                },
                r = (require.toUrl("."), {
                    video: {
                        src: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/3300000000000.mp4",
                        type: "video/mp4"
                    },
                    audio: {
                        src: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/3300000000000.mp4",
                        type: "audio/mp3"
                    }
                }),
                o = {
                    video: {
                        src: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/1100000000000.mp4",
                        type: "video/mp4"
                    },
                    audio: {
                        src: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/1100000000000.mp4",
                        type: "audio/mp3"
                    }
                },
                i = window.navigator.userAgent,
                s = {
                    isAndroid: function() {
                        return n.REGEX_ANDROID.test(i)
                    },
                    isFirefox: function() {
                        return n.REGEX_FIREFOX.test(i)
                    },
                    isEdge: function() {
                        return n.REGEX_EDGE.test(i)
                    },
                    isChrome: function() {
                        return !this.isEdge() && n.REGEX_CHROME.test(i)
                    },
                    isIpad: function() {
                        return n.REGEX_IPAD.test(i)
                    },
                    isIphone: function() {
                        return !this.isIpad() && n.REGEX_IPHONE.test(i)
                    }
                },
                a = {
                    mp4Type: "video/mp4",
                    mp3Type: "audio/mp3",
                    hlsType: "application/x-mpegURL",
                    m3uType: "audio/x-mpegurl",
                    dashType: "application/dash+xml",
                    rtmpType: "rtmp/mp4"
                };
            return {
                load: function() {
                    var i = e.Deferred();
                    return Date.now = Date.now || function() {
                            return +new Date
                        }, window.Element.prototype.remove || (window.Element.prototype.remove = function() {
                            this.parentElement.removeChild(this)
                        }), (!window.HTMLCollection.prototype.remove || window.NodeList.prototype.remove) && (window.NodeList.prototype.remove = window.HTMLCollection.prototype.remove = function() {
                            for (var e = this.length - 1; e >= 0; e--) this[e] && this[e].parentElement && this[e].parentElement.removeChild(this[e])
                        }), window.document.getElementsByClassName || (window.document.getElementsByClassName = function(e) {
                            return this.querySelectorAll("." + e)
                        }, window.Element.prototype.getElementsByClassName = window.document.getElementsByClassName),
                        function(e) {
                            e.console = e.console || {};
                            for (var t, n, r = e.console, o = {}, i = function() {}, s = "memory".split(","), a = "assert,clear,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profiles,profileEnd,show,table,time,timeEnd,timeline,timelineEnd,timeStamp,trace,warn".split(","); t = s.pop();) r[t] || (r[t] = o);
                            for (; n = a.pop();) "function" != typeof r[n] && (r[n] = i)
                        }("undefined" == typeof window ? this : window), this.utils = {
                            parseFormats: function(e) {
                                return e && e.sources.map(function(e) {
									console.log("url del vídeo"); // REPLACED
									console.log(e); // REPLACED
                                    if (n.REGEX_RTMP_PROTOCOL.test(e.src)) {
                                        var t = n.REGEX_EXT.exec(e.src);
                                        if (null !== t && t.length > 0) {
                                            var r = t[1],
                                                o = -1 !== e.src.indexOf(".mp4");
                                            1 == o && (e.src = e.src.replace("/resources/", "/&mp4:resources/"), e.src = e.src.replace("/mp4:resources/", "/&mp4:resources/"));
                                            var i = -1 !== e.src.indexOf(".mp3");
                                            1 == i && (e.src = e.src.replace("/resources/", "/&mp3:resources/"), e.src = e.src.replace("/mp3:resources/", "/&mp3:resources/")), r && (e.type = "rtmp/{ext}".replace("{ext}", r))
                                        }
                                    }
                                }), e
                            },
                            checkStatusSource: function(e, t) {
                                var n = this,
                                    r = new XMLHttpRequest;
                                r.onreadystatechange = function() {
                                    this.readyState == this.DONE && t(n, this.status)
                                };
                                try {
                                    r.open("HEAD", e), r.send()
                                } catch (o) {
                                    t(n, 0)
                                }
                            },
                            getRelativeUrl: function(e) {
                                return "/" + e.split("/")[3] + "/" + e.split("/")[4] + "/" + e.split("/")[5] + ".json"
                            },
                            getIEVersion: function() {
                                var e = window.navigator.userAgent,
                                    t = e.indexOf("MSIE ");
                                if (t > 0) return parseInt(e.substring(t + 5, e.indexOf(".", t)), 10);
                                var n = e.indexOf("Trident/");
                                if (n > 0) {
                                    var r = e.indexOf("rv:");
                                    return parseInt(e.substring(r + 3, e.indexOf(".", r)), 10)
                                }
                                var o = e.indexOf("Edge/");
                                return o > 0 ? parseInt(e.substring(o + 5, e.indexOf(".", o)), 10) : !1
                            },
                            checkIfWeAreInIe: function() {
                                var e = this.getIEVersion();
                                return "11" == e || "10" == e || "9" == e
                            },
                            checkForHlsFlashIe: function(e) {
                                window.navigator.userAgent;
                                return this.checkIfWeAreInIe() && "video" === e.type && e.mediaConfig.assetConfig.live
                            },
                            checkIfRestrictAdvertisment: function(e) {
                                return this.checkIfWeAreInIe() && "video" === e.type && e.mediaConfig.assetConfig.live
                            },
                            checkHlsLiveSuport: function(e) {
                                var t = !1;
                                return s.isAndroid() || s.isIpad() || s.isIphone() || "video" === e.type && e.mediaConfig.assetConfig.live && (s.isFirefox() || s.isEdge() || s.isChrome() || this.checkForHlsFlashIe(e)) && (t = !0), t
                            },
                            isDevice: function() {
                                return s.isAndroid() || s.isIpad() || s.isIphone() ? !0 : !1
                            },
                            getContentType: function(e) {
                                var t = "";
                                if ("rtmp" === this.getProtocol(e) || "rtmpe" === this.getProtocol(e)) t = a.rtmpType;
                                else switch (this.getExtension(e)) {
                                    case "mp4":
                                        t = a.mp4Type;
                                        break;
                                    case "mp3":
                                        t = a.mp3Type;
                                        break;
                                    case "m3u8":
                                        t = a.hlsType;
                                        break;
                                    case "mpd":
                                        t = a.dashType;
                                        break;
                                    case "m3u":
                                        t = a.m3uType;
                                        break;
                                    default:
                                        t = a.mp4Type
                                }
                                return t
                            },
                            checkFlashTechOrder: function(e) {
                                var t = !1;
                                return e && (t = e.sources.some(function(e) {
                                    return n.REGEX_RTMP_PROTOCOL.test(e.src) || n.REGEX_FLV.test(e.src) ? !0 : void 0
                                })), this.isIE8() ? !0 : t
                            },
                            getGeoResourceType: function(e) {
                                return "video" === e ? [r.video] : [r.audio]
                            },
                            isIE8: function() {
                                return "ie" === t.browser.name && "8" === t.browser.version
                            },
                            isIE: function() {
                                return "ie" === t.browser.name
                            },
                            regex: n,
                            sourceErrorType: o,
                            zotanerParser: function(e) {
                                return e.sources = [], "undefined" != typeof e.quality && e.quality.preset.forEach(function(t) {
                                    e.sources = e.sources.concat(t.response.url)
                                }), e
                            },
                            createFakeImg: function() {
                                var e = document.createElement("img");
                                return e.src = "data:image/gif;base64,R0lGODlhAQABAJH/AP///wAAAMDAwAAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==", e.alt = "", e
                            },
                            generateBufferLog: function(e, t) {
                                t || (t = "info");
                                try {
                                    return {
                                        type: t,
                                        date: new Date,
                                        log: JSON.stringify(e)
                                    }
                                } catch (n) {
                                    return console.error("RtvePlayer", "Unable to parse log", e), {
                                        type: t,
                                        date: new Date,
                                        log: ""
                                    }
                                }
                            },
                            getSystemInfo: function() {
                                return t
                            },
                            getHTMLElement: function(t) {
                                return t instanceof e ? t[0] : t
                            },
                            isFlash: function(e) {
                                return n.REGEX_RTMP_PROTOCOL.test(e.sources[0].src) || n.REGEX_FLV.test(e.sources[0].src) ? !0 : !1
                            },
                            isFLV: function(e) {
                                return e && e.sources.length > 0 && n.REGEX_FLV.test(e.sources[0].src) ? !0 : !1
                            },
                            isHLS: function(e) {
                                return e && e.sources.length > 0 && n.REGEX_HLS.test(e.sources[0].src) ? !0 : !1
                            },
                            isRTMP: function(e) {
                                return e && e.sources.length > 0 && n.REGEX_RTMP_PROTOCOL.test(e.sources[0].src) ? !0 : !1
                            },
                            hashingThumbs: function(e) {
                                var t = e.substr(e.length - 1, 1),
                                    n = e.substr(e.length - 2, 1),
                                    r = e.substr(e.length - 3, 1),
                                    o = e.substr(e.length - 4, 1);
                                return e.length >= 4 ? t + "/" + n + "/" + r + "/" + o : e.length >= 3 ? t + "/" + n + "/" + r + "/0" : e.length >= 2 ? t + "/" + n + "/0/0" : e.length >= 1 ? t + "/0/0/0" : "0/0/0/0"
                            },
                            getDomain: function(e) {
                                var t = "";
                                if (e) try {
                                    t = unescape(e).split("://").length >= 2 ? unescape(e).split("://")[1].split("/")[0] : ""
                                } catch (n) {
                                    t = ""
                                }
                                return t
                            },
                            getProtocol: function(e) {
                                var t = "";
                                if (e) try {
                                    t = -1 != e.indexOf(":") ? e.slice(0, e.indexOf(":")).toLowerCase() : ""
                                } catch (n) {
                                    t = ""
                                }
                                return t
                            },
                            getExtension: function(e) {
                                var t = "";
                                if (e) try {
                                    if (-1 != e.indexOf("?")) {
                                        var n = e.slice(0, e.indexOf("?"));
                                        t = n.slice(n.lastIndexOf(".") + 1)
                                    } else t = e.slice(e.lastIndexOf(".") + 1)
                                } catch (r) {
                                    t = ""
                                }
                                return t
                            },
                            typePlural: function(e) {
                                return e + "s"
                            }
                        }, i.resolveWith(this, []), i.promise()
                }
            }
        }), define("tpl/rtveplayer/ztnrFlash", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<object type="application/x-shockwave-flash" data="', i += n.e(null !== ("undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? t.ztnrFlashUrl : "" : "undefined" != typeof ztnrFlashUrl && null !== ztnrFlashUrl ? ztnrFlashUrl : "") ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? t.ztnrFlashUrl : "" : "undefined" != typeof ztnrFlashUrl && null !== ztnrFlashUrl ? ztnrFlashUrl : "" : ""), i += '" width="1" height="1" id="ztnr_modulo_', i += n.e(null !== ("undefined" != typeof t.id && null !== t.id ? "undefined" != typeof t.id && null !== t.id ? t.id : "" : "undefined" != typeof id && null !== id ? id : "") ? "undefined" != typeof t.id && null !== t.id ? "undefined" != typeof t.id && null !== t.id ? t.id : "" : "undefined" != typeof id && null !== id ? id : "" : ""), i += '" style="display:block;" >\n    <param name="movie" value="', i += n.e(null !== ("undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? t.ztnrFlashUrl : "" : "undefined" != typeof ztnrFlashUrl && null !== ztnrFlashUrl ? ztnrFlashUrl : "") ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? "undefined" != typeof t.ztnrFlashUrl && null !== t.ztnrFlashUrl ? t.ztnrFlashUrl : "" : "undefined" != typeof ztnrFlashUrl && null !== ztnrFlashUrl ? ztnrFlashUrl : "" : ""), i += '">\n    <param name="allowScriptAccess" value="always">\n    <param name="allowNetworking" value="all">\n    <param name="flashvars" value="swfReady=', i += n.e(null !== ("undefined" != typeof t.swfZtnrReady && null !== t.swfZtnrReady ? "undefined" != typeof t.swfZtnrReady && null !== t.swfZtnrReady ? t.swfZtnrReady : "" : "undefined" != typeof swfZtnrReady && null !== swfZtnrReady ? swfZtnrReady : "") ? "undefined" != typeof t.swfZtnrReady && null !== t.swfZtnrReady ? "undefined" != typeof t.swfZtnrReady && null !== t.swfZtnrReady ? t.swfZtnrReady : "" : "undefined" != typeof swfZtnrReady && null !== swfZtnrReady ? swfZtnrReady : "" : ""), i += "&swfLoaded=", i += n.e(null !== ("undefined" != typeof t.swfZtnrLoaded && null !== t.swfZtnrLoaded ? "undefined" != typeof t.swfZtnrLoaded && null !== t.swfZtnrLoaded ? t.swfZtnrLoaded : "" : "undefined" != typeof swfZtnrLoaded && null !== swfZtnrLoaded ? swfZtnrLoaded : "") ? "undefined" != typeof t.swfZtnrLoaded && null !== t.swfZtnrLoaded ? "undefined" != typeof t.swfZtnrLoaded && null !== t.swfZtnrLoaded ? t.swfZtnrLoaded : "" : "undefined" != typeof swfZtnrLoaded && null !== swfZtnrLoaded ? swfZtnrLoaded : "" : ""), i += "&swfError=", i += n.e(null !== ("undefined" != typeof t.swfZtnrError && null !== t.swfZtnrError ? "undefined" != typeof t.swfZtnrError && null !== t.swfZtnrError ? t.swfZtnrError : "" : "undefined" != typeof swfZtnrError && null !== swfZtnrError ? swfZtnrError : "") ? "undefined" != typeof t.swfZtnrError && null !== t.swfZtnrError ? "undefined" != typeof t.swfZtnrError && null !== t.swfZtnrError ? t.swfZtnrError : "" : "undefined" != typeof swfZtnrError && null !== swfZtnrError ? swfZtnrError : "" : ""), i += '">\n</object>'
            }
        }), define("tpl/rtveplayer/videoTag", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<div class="ima ', i += n.e((null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.CONS && null !== t.rtveplayer.CONS && void 0 !== t.rtveplayer.CONS.aspectRatios && null !== t.rtveplayer.CONS.aspectRatios ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.CONS && null !== t.rtveplayer.CONS && void 0 !== t.rtveplayer.CONS.aspectRatios && null !== t.rtveplayer.CONS.aspectRatios ? t.rtveplayer.CONS.aspectRatios : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.CONS && null !== rtveplayer.CONS && void 0 !== rtveplayer.CONS.aspectRatios && null !== rtveplayer.CONS.aspectRatios ? rtveplayer.CONS.aspectRatios : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.CONS && null !== t.rtveplayer.CONS && void 0 !== t.rtveplayer.CONS.aspectRatios && null !== t.rtveplayer.CONS.aspectRatios ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.CONS && null !== t.rtveplayer.CONS && void 0 !== t.rtveplayer.CONS.aspectRatios && null !== t.rtveplayer.CONS.aspectRatios ? t.rtveplayer.CONS.aspectRatios : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.CONS && null !== rtveplayer.CONS && void 0 !== rtveplayer.CONS.aspectRatios && null !== rtveplayer.CONS.aspectRatios ? rtveplayer.CONS.aspectRatios : "" : "")[null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.aspectRatio && null !== t.rtveplayer.options.aspectRatio ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.aspectRatio && null !== t.rtveplayer.options.aspectRatio ? t.rtveplayer.options.aspectRatio : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.aspectRatio && null !== rtveplayer.options.aspectRatio ? rtveplayer.options.aspectRatio : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.aspectRatio && null !== t.rtveplayer.options.aspectRatio ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.aspectRatio && null !== t.rtveplayer.options.aspectRatio ? t.rtveplayer.options.aspectRatio : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.aspectRatio && null !== rtveplayer.options.aspectRatio ? rtveplayer.options.aspectRatio : "" : ""]), i += " ", i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? t.rtveplayer.options.type : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.type && null !== rtveplayer.options.type ? rtveplayer.options.type : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? t.rtveplayer.options.type : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.type && null !== rtveplayer.options.type ? rtveplayer.options.type : "" : ""), i += 'Player">\n	<video id="', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? t.rtveplayer.id : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.id && null !== rtveplayer.id ? rtveplayer.id : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? t.rtveplayer.id : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.id && null !== rtveplayer.id ? rtveplayer.id : "" : ""), i += '" class="video-js vjs-default-skin', (null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? t.rtveplayer.options.mediaConfig.assetConfig.live : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.mediaConfig && null !== rtveplayer.options.mediaConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig && null !== rtveplayer.options.mediaConfig.assetConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig.live && null !== rtveplayer.options.mediaConfig.assetConfig.live ? rtveplayer.options.mediaConfig.assetConfig.live : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? t.rtveplayer.options.mediaConfig.assetConfig.live : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.mediaConfig && null !== rtveplayer.options.mediaConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig && null !== rtveplayer.options.mediaConfig.assetConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig.live && null !== rtveplayer.options.mediaConfig.assetConfig.live ? rtveplayer.options.mediaConfig.assetConfig.live : "" : "") && (i += " vjs-live rtve-live"), i += '" controls preload="auto" poster="', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? t.rtveplayer.options.img.normal.url : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.img && null !== rtveplayer.options.img && void 0 !== rtveplayer.options.img.normal && null !== rtveplayer.options.img.normal && void 0 !== rtveplayer.options.img.normal.url && null !== rtveplayer.options.img.normal.url ? rtveplayer.options.img.normal.url : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? t.rtveplayer.options.img.normal.url : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.img && null !== rtveplayer.options.img && void 0 !== rtveplayer.options.img.normal && null !== rtveplayer.options.img.normal && void 0 !== rtveplayer.options.img.normal.url && null !== rtveplayer.options.img.normal.url ? rtveplayer.options.img.normal.url : "" : ""), i += '" >\n	  	', (null !== ("undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? t.needSourceTags : "" : "undefined" != typeof needSourceTags && null !== needSourceTags ? needSourceTags : "") ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? t.needSourceTags : "" : "undefined" != typeof needSourceTags && null !== needSourceTags ? needSourceTags : "" : "") && (i += "\n		  	", function() {
                    var e = null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? t.rtveplayer.sourceList.sources : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.sourceList && null !== rtveplayer.sourceList && void 0 !== rtveplayer.sourceList.sources && null !== rtveplayer.sourceList.sources ? rtveplayer.sourceList.sources : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? t.rtveplayer.sourceList.sources : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.sourceList && null !== rtveplayer.sourceList && void 0 !== rtveplayer.sourceList.sources && null !== rtveplayer.sourceList.sources ? rtveplayer.sourceList.sources : "" : "",
                        o = r.isArray(e) || "string" == typeof e ? e.length : r.keys(e).length;
                    if (e) {
                        var s = {
                            loop: t.loop,
                            source: t.source,
                            __k: t.__k
                        };
                        t.loop = {
                            first: !1,
                            index: 1,
                            index0: 0,
                            revindex: o,
                            revindex0: o - 1,
                            length: o,
                            last: !1
                        }, r.each(e, function(e, r) {
                            t.source = e, t.__k = r, t.loop.key = r, t.loop.first = 0 === t.loop.index0, t.loop.last = 0 === t.loop.revindex0, i += '\n		  		<source src="', i += n.e(null !== ("undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? t.source.src : "" : "undefined" != typeof e && null !== e && void 0 !== e.src && null !== e.src ? e.src : "") ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? t.source.src : "" : "undefined" != typeof e && null !== e && void 0 !== e.src && null !== e.src ? e.src : "" : ""), i += '" type="', i += n.e(null !== ("undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? t.source.type : "" : "undefined" != typeof e && null !== e && void 0 !== e.type && null !== e.type ? e.type : "") ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? t.source.type : "" : "undefined" != typeof e && null !== e && void 0 !== e.type && null !== e.type ? e.type : "" : ""), i += '" />\n		  	', t.loop.index += 1, t.loop.index0 += 1, t.loop.revindex -= 1, t.loop.revindex0 -= 1
                        }), t.loop = s.loop, t.source = s.source, t.__k = s.__k, s = void 0
                    }
                }(), i += "\n		"), i += '\n		<p class="vjs-no-js">', i += null !== ("undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? t.nojavascriptMessage : "" : "undefined" != typeof nojavascriptMessage && null !== nojavascriptMessage ? nojavascriptMessage : "") ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? t.nojavascriptMessage : "" : "undefined" != typeof nojavascriptMessage && null !== nojavascriptMessage ? nojavascriptMessage : "" : "", i += "</p>\n	</video>\n</div>"
            }
        }), define("tpl/rtveplayer/audioTag", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<div class="ima ', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? t.rtveplayer.options.type : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.type && null !== rtveplayer.options.type ? rtveplayer.options.type : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.type && null !== t.rtveplayer.options.type ? t.rtveplayer.options.type : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.type && null !== rtveplayer.options.type ? rtveplayer.options.type : "" : ""), i += 'Player">\n	<audio id="', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? t.rtveplayer.id : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.id && null !== rtveplayer.id ? rtveplayer.id : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.id && null !== t.rtveplayer.id ? t.rtveplayer.id : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.id && null !== rtveplayer.id ? rtveplayer.id : "" : ""), i += '" class="video-js vjs-default-skin', (null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? t.rtveplayer.options.mediaConfig.assetConfig.live : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.mediaConfig && null !== rtveplayer.options.mediaConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig && null !== rtveplayer.options.mediaConfig.assetConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig.live && null !== rtveplayer.options.mediaConfig.assetConfig.live ? rtveplayer.options.mediaConfig.assetConfig.live : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.mediaConfig && null !== t.rtveplayer.options.mediaConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig && null !== t.rtveplayer.options.mediaConfig.assetConfig && void 0 !== t.rtveplayer.options.mediaConfig.assetConfig.live && null !== t.rtveplayer.options.mediaConfig.assetConfig.live ? t.rtveplayer.options.mediaConfig.assetConfig.live : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.mediaConfig && null !== rtveplayer.options.mediaConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig && null !== rtveplayer.options.mediaConfig.assetConfig && void 0 !== rtveplayer.options.mediaConfig.assetConfig.live && null !== rtveplayer.options.mediaConfig.assetConfig.live ? rtveplayer.options.mediaConfig.assetConfig.live : "" : "") && (i += " vjs-live rtve-live"), i += '" controls preload="auto" poster="', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? t.rtveplayer.options.img.normal.url : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.img && null !== rtveplayer.options.img && void 0 !== rtveplayer.options.img.normal && null !== rtveplayer.options.img.normal && void 0 !== rtveplayer.options.img.normal.url && null !== rtveplayer.options.img.normal.url ? rtveplayer.options.img.normal.url : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.options && null !== t.rtveplayer.options && void 0 !== t.rtveplayer.options.img && null !== t.rtveplayer.options.img && void 0 !== t.rtveplayer.options.img.normal && null !== t.rtveplayer.options.img.normal && void 0 !== t.rtveplayer.options.img.normal.url && null !== t.rtveplayer.options.img.normal.url ? t.rtveplayer.options.img.normal.url : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.options && null !== rtveplayer.options && void 0 !== rtveplayer.options.img && null !== rtveplayer.options.img && void 0 !== rtveplayer.options.img.normal && null !== rtveplayer.options.img.normal && void 0 !== rtveplayer.options.img.normal.url && null !== rtveplayer.options.img.normal.url ? rtveplayer.options.img.normal.url : "" : ""), i += '" >\n		', (null !== ("undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? t.needSourceTags : "" : "undefined" != typeof needSourceTags && null !== needSourceTags ? needSourceTags : "") ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? "undefined" != typeof t.needSourceTags && null !== t.needSourceTags ? t.needSourceTags : "" : "undefined" != typeof needSourceTags && null !== needSourceTags ? needSourceTags : "" : "") && (i += "\n		  	", function() {
                    var e = null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? t.rtveplayer.sourceList.sources : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.sourceList && null !== rtveplayer.sourceList && void 0 !== rtveplayer.sourceList.sources && null !== rtveplayer.sourceList.sources ? rtveplayer.sourceList.sources : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.sourceList && null !== t.rtveplayer.sourceList && void 0 !== t.rtveplayer.sourceList.sources && null !== t.rtveplayer.sourceList.sources ? t.rtveplayer.sourceList.sources : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.sourceList && null !== rtveplayer.sourceList && void 0 !== rtveplayer.sourceList.sources && null !== rtveplayer.sourceList.sources ? rtveplayer.sourceList.sources : "" : "",
                        o = r.isArray(e) || "string" == typeof e ? e.length : r.keys(e).length;
                    if (e) {
                        var s = {
                            loop: t.loop,
                            source: t.source,
                            __k: t.__k
                        };
                        t.loop = {
                            first: !1,
                            index: 1,
                            index0: 0,
                            revindex: o,
                            revindex0: o - 1,
                            length: o,
                            last: !1
                        }, r.each(e, function(e, r) {
                            t.source = e, t.__k = r, t.loop.key = r, t.loop.first = 0 === t.loop.index0, t.loop.last = 0 === t.loop.revindex0, i += '\n		  		<source src="', i += n.e(null !== ("undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? t.source.src : "" : "undefined" != typeof e && null !== e && void 0 !== e.src && null !== e.src ? e.src : "") ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.src && null !== t.source.src ? t.source.src : "" : "undefined" != typeof e && null !== e && void 0 !== e.src && null !== e.src ? e.src : "" : ""), i += "\" type='", i += n.e(null !== ("undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? t.source.type : "" : "undefined" != typeof e && null !== e && void 0 !== e.type && null !== e.type ? e.type : "") ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? "undefined" != typeof t.source && null !== t.source && void 0 !== t.source.type && null !== t.source.type ? t.source.type : "" : "undefined" != typeof e && null !== e && void 0 !== e.type && null !== e.type ? e.type : "" : ""), i += "' />\n		  	", t.loop.index += 1, t.loop.index0 += 1, t.loop.revindex -= 1, t.loop.revindex0 -= 1
                        }), t.loop = s.loop, t.source = s.source, t.__k = s.__k, s = void 0
                    }
                }(), i += "\n		"), i += '\n		<p class="vjs-no-js">', i += null !== ("undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? t.nojavascriptMessage : "" : "undefined" != typeof nojavascriptMessage && null !== nojavascriptMessage ? nojavascriptMessage : "") ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? "undefined" != typeof t.nojavascriptMessage && null !== t.nojavascriptMessage ? t.nojavascriptMessage : "" : "undefined" != typeof nojavascriptMessage && null !== nojavascriptMessage ? nojavascriptMessage : "" : "", i += "</p>\n	</audio>\n</div>"
            }
        }), define("tpl/rtveplayer/errors/general_es_debug", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<span class="ico warning"><img src="http://img.irtve.es/css/i/blank.gif" alt=""></span>\n<p>Debug Info:</p>\n<p>', i += n.safe(null !== ("undefined" != typeof t.message && null !== t.message ? "undefined" != typeof t.message && null !== t.message ? t.message : "" : "undefined" != typeof message && null !== message ? message : "") ? "undefined" != typeof t.message && null !== t.message ? "undefined" != typeof t.message && null !== t.message ? t.message : "" : "undefined" != typeof message && null !== message ? message : "" : ""), i += "</p>"
            }
        }), define("tpl/rtveplayer/errors/general_es_common", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<span class="ico warning"><img src="http://img.irtve.es/css/i/blank.gif" alt=""></span>\n<p>Lo sentimos, no hemos encontrado lo que buscabas.</p>'
            }
        }), define("tpl/rtveplayer/errors/general_ca_common", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<span class="ico warning"><img src="http://img.irtve.es/css/i/blank.gif" alt=""></span>\n<p>Ho sentim, no hem trobat el que buscaves.</p>'
            }
        }), define("tpl/rtveplayer/errors/infantil_es_common", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<span class="ico warning"><img src="http://img.irtve.es/css/i/blank.gif" alt=""></span>\n<p>¡¡Ooops!!</p>\n<p>Este episodio no está disponible actualmente...</p>\n<p>Pero puedes ver muchos más en clan.</p>'
            }
        }), define("tpl/rtveplayer/panels/overlayPanel", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<div class="txtBox">\n    <span class="pretitle">', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.programTitle && null !== t.rtveplayer.programTitle ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.programTitle && null !== t.rtveplayer.programTitle ? t.rtveplayer.programTitle : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.programTitle && null !== rtveplayer.programTitle ? rtveplayer.programTitle : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.programTitle && null !== t.rtveplayer.programTitle ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.programTitle && null !== t.rtveplayer.programTitle ? t.rtveplayer.programTitle : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.programTitle && null !== rtveplayer.programTitle ? rtveplayer.programTitle : "" : ""), i += '</span>\n    <h2><span class="maintitle">', i += n.e(null !== ("undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.title && null !== t.rtveplayer.title ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.title && null !== t.rtveplayer.title ? t.rtveplayer.title : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.title && null !== rtveplayer.title ? rtveplayer.title : "") ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.title && null !== t.rtveplayer.title ? "undefined" != typeof t.rtveplayer && null !== t.rtveplayer && void 0 !== t.rtveplayer.title && null !== t.rtveplayer.title ? t.rtveplayer.title : "" : "undefined" != typeof rtveplayer && null !== rtveplayer && void 0 !== rtveplayer.title && null !== rtveplayer.title ? rtveplayer.title : "" : ""), i += '</span></h2>\n    <span class="openInfoPlayer"></span>  \n</div>'
            }
        }), define("tpl/rtveplayer/panels/relatedPanel", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<div class="gridBox show12 slideH">  \n  <ul class="listBox">   \n    <li class="pageBox be_on">\n    	<ul>\n	    ',
                    function() {
                        var e = null !== ("undefined" != typeof t.relatedsItem && null !== t.relatedsItem ? "undefined" != typeof t.relatedsItem && null !== t.relatedsItem ? t.relatedsItem : "" : "undefined" != typeof relatedsItem && null !== relatedsItem ? relatedsItem : "") ? "undefined" != typeof t.relatedsItem && null !== t.relatedsItem ? "undefined" != typeof t.relatedsItem && null !== t.relatedsItem ? t.relatedsItem : "" : "undefined" != typeof relatedsItem && null !== relatedsItem ? relatedsItem : "" : "",
                            o = r.isArray(e) || "string" == typeof e ? e.length : r.keys(e).length;
                        if (e) {
                            var s = {
                                loop: t.loop,
                                item: t.item,
                                __k: t.__k
                            };
                            t.loop = {
                                first: !1,
                                index: 1,
                                index0: 0,
                                revindex: o,
                                revindex0: o - 1,
                                length: o,
                                last: !1
                            }, r.each(e, function(e, r) {
                                t.item = e, t.__k = r, t.loop.key = r, t.loop.first = 0 === t.loop.index0, t.loop.last = 0 === t.loop.revindex0, i += '\n	    	<li class="cell">\n	    	<a class="mod" title="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "" : ""), i += '" href="" data-id="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.id && null !== t.item.id ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.id && null !== t.item.id ? t.item.id : "" : "undefined" != typeof e && null !== e && void 0 !== e.id && null !== e.id ? e.id : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.id && null !== t.item.id ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.id && null !== t.item.id ? t.item.id : "" : "undefined" != typeof e && null !== e && void 0 !== e.id && null !== e.id ? e.id : "" : ""), i += '" data-src="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? t.item.imageSEO : "" : "undefined" != typeof e && null !== e && void 0 !== e.imageSEO && null !== e.imageSEO ? e.imageSEO : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? t.item.imageSEO : "" : "undefined" != typeof e && null !== e && void 0 !== e.imageSEO && null !== e.imageSEO ? e.imageSEO : "" : ""), i += '">\n			  <span class="ima H T f9x9">\n			    <img class="r13x9" src="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? t.item.imageSEO : "" : "undefined" != typeof e && null !== e && void 0 !== e.imageSEO && null !== e.imageSEO ? e.imageSEO : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.imageSEO && null !== t.item.imageSEO ? t.item.imageSEO : "" : "undefined" != typeof e && null !== e && void 0 !== e.imageSEO && null !== e.imageSEO ? e.imageSEO : "" : ""), i += '" title="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "" : ""), i += '" alt="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "" : ""), i += '">\n			  </span>\n			  <div class="txtBox">\n			    <span class="maintitle">', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "" : ""), i += "</span>\n			  </div>\n			</a>\n			</li>\n		", t.loop.index += 1, t.loop.index0 += 1, t.loop.revindex -= 1, t.loop.revindex0 -= 1
                            }), t.loop = s.loop, t.item = s.item, t.__k = s.__k, s = void 0
                        }
                    }(), i += "\n		</ul>\n	</li>\n  </ul>   \n</div>"
            }
        }), define("tpl/rtveplayer/panels/sharePanel", [], function() {
            return function(e, t, n, r, o) {
                var i = (e.extensions, "");
                return i += '<p>Compatir con</p>\n<ul>\n	<li><a href="https://es-es.facebook.com" target="_blank">Facebook</a></li>\n	<li><a href="https://twitter.com" target="_blank">Twitter</a></li>\n</ul>'
            }
        });
    var e = {
        core: {
            Core: "core/core_library",
            vjs: "vendor/videojs/video",
            $: "vendor/jquery"
        },
        basics: {
            initPlugins: "rtveplayer/modules/videojs/initPlugins",
            playerLanguage: "rtveplayer/modules/videojs/playerLanguage",
            thumbnails: "rtveplayer/modules/videojs/thumbnails",
            advertisment: "rtveplayer/modules/videojs/advSetup",
            videojsEnhance: "rtveplayer/modules/videojs/videojsEnhance",
            rtveComponents: "rtveplayer/modules/videojs/rtveComponents",
            videojsStart: "rtveplayer/modules/videojs/videojsStart",
            rtveMediaInfo: "rtveplayer/modules/videojs/rtveMediaInfo",
            techStats: "rtveplayer/modules/videojs/videojsTechStats",
            envSettings: "rtveplayer/modules/rtve/envSettings",
            whitelist: "rtveplayer/modules/rtve/whitelist",
            playerFeatures: "rtveplayer/modules/rtve/playerFeatures",
            renderTag: "rtveplayer/modules/rtve/renderTag",
            loadAssetConfig: "rtveplayer/modules/rtve/loadAssetConfig",
            loadEmissionDate: "rtveplayer/modules/rtve/loadEmissionDate",
            loadKantar: "rtveplayer/modules/rtve/loadKantar",
            loadAdsConfig: "rtveplayer/modules/rtve/loadAdsConfig",
            loadSubtitles: "rtveplayer/modules/rtve/loadSubtitles",
            loadOverlay: "rtveplayer/modules/rtve/loadOverlay",
            loadRelated: "rtveplayer/modules/rtve/loadRelated",
            mediaSource: "rtveplayer/modules/ztnr/mediaSource"
        },
        lazy: {
            loadDualLang: "rtveplayer/modules/rtve/loadDualLang",
            modeOne: "rtveplayer/modules/ztnr/modeOne",
            modeTwo: "rtveplayer/modules/ztnr/modeTwo",
            manager: "rtveplayer/modules/ztnr/manager",
            ztnrThumbnail: "rtveplayer/modules/ztnr/ztnrThumbnail",
            m3uParser: "rtveplayer/modules/ztnr/m3uParser"
        },
        vendors: {
            videojshls: "vendor/videojs/plugins/hls/videojs-contrib-hls",
            hotkeys: "vendor/videojs/plugins/videojs.hotkeys"
        }
    };
    define("rtveplayer/RtvePlayer", ["require", "exports", "module", "core/core_library", "vendor/videojs/video", "vendor/jquery", "rtveplayer/modules/videojs/initPlugins", "rtveplayer/modules/videojs/playerLanguage", "rtveplayer/modules/videojs/thumbnails", "rtveplayer/modules/videojs/advSetup", "rtveplayer/modules/videojs/videojsEnhance", "rtveplayer/modules/videojs/rtveComponents", "rtveplayer/modules/videojs/videojsStart", "rtveplayer/modules/videojs/rtveMediaInfo", "rtveplayer/modules/videojs/videojsTechStats", "vendor/videojs/lang/es", "vendor/videojs/lang/ca", "rtveplayer/modules/rtve/envSettings", "rtveplayer/modules/rtve/whitelist", "rtveplayer/modules/rtve/playerFeatures", "rtveplayer/modules/rtve/renderTag", "rtveplayer/modules/rtve/loadAssetConfig", "rtveplayer/modules/rtve/loadEmissionDate", "rtveplayer/modules/rtve/loadKantar", "rtveplayer/modules/rtve/loadAdsConfig", "rtveplayer/modules/rtve/loadSubtitles", "rtveplayer/modules/rtve/loadOverlay", "rtveplayer/modules/rtve/loadRelated", "rtveplayer/modules/ztnr/mediaSource", "rtveplayer/modules/utils/RtveLogger", "rtveplayer/modules/utils/utils", "tpl/rtveplayer/ztnrFlash", "tpl/rtveplayer/videoTag", "tpl/rtveplayer/audioTag", "tpl/rtveplayer/errors/general_es_debug", "tpl/rtveplayer/errors/general_es_common", "tpl/rtveplayer/errors/general_ca_common", "tpl/rtveplayer/errors/infantil_es_common", "tpl/rtveplayer/panels/overlayPanel", "tpl/rtveplayer/panels/relatedPanel", "tpl/rtveplayer/panels/sharePanel"], function(t, n, r) {
        "use strict";
        var o = t("core/core_library"),
            i = t("vendor/videojs/video"),
            s = t("vendor/jquery");
        t("rtveplayer/modules/videojs/initPlugins"), t("rtveplayer/modules/videojs/playerLanguage"), t("rtveplayer/modules/videojs/thumbnails"), t("rtveplayer/modules/videojs/advSetup"), t("rtveplayer/modules/videojs/videojsEnhance"), t("rtveplayer/modules/videojs/rtveComponents"), t("rtveplayer/modules/videojs/videojsStart"), t("rtveplayer/modules/videojs/rtveMediaInfo"), t("rtveplayer/modules/videojs/videojsTechStats"), t("vendor/videojs/lang/es"), t("vendor/videojs/lang/ca"), t("rtveplayer/modules/rtve/envSettings"), t("rtveplayer/modules/rtve/whitelist"), t("rtveplayer/modules/rtve/playerFeatures"), t("rtveplayer/modules/rtve/renderTag"), t("rtveplayer/modules/rtve/loadAssetConfig"), t("rtveplayer/modules/rtve/loadEmissionDate"), t("rtveplayer/modules/rtve/loadKantar"), t("rtveplayer/modules/rtve/loadAdsConfig"), t("rtveplayer/modules/rtve/loadSubtitles"), t("rtveplayer/modules/rtve/loadOverlay"), t("rtveplayer/modules/rtve/loadRelated"), t("rtveplayer/modules/ztnr/mediaSource"), t("rtveplayer/modules/utils/RtveLogger"), t("rtveplayer/modules/utils/utils"), t("tpl/rtveplayer/ztnrFlash"), t("tpl/rtveplayer/videoTag"), t("tpl/rtveplayer/audioTag"), t("tpl/rtveplayer/errors/general_es_debug"), t("tpl/rtveplayer/errors/general_es_common"), t("tpl/rtveplayer/errors/general_ca_common"), t("tpl/rtveplayer/errors/infantil_es_common"), t("tpl/rtveplayer/panels/overlayPanel"), t("tpl/rtveplayer/panels/relatedPanel"), t("tpl/rtveplayer/panels/sharePanel");
        var a = {
                onDualChange: function(e) {
                    this.player().pause(), this.player().trigger("waiting");
                    var t = e.data.idAsset;
                    this.trigger("dualChange", t), this.setMedia(t, this.ready), this.player().options_.starttime = this.player().currentTime()
                },
                onReady: function(e) {
                    this.logger.log("RtvePlayer", "onReady"), this.getContainer().focus(), this.trigger("rtvePlayerReady")
                },
                onLoading: function() {
                    this.logger.log("RtvePlayer", "onLoading"), this.player() && delete this.player().options_.starttime, this.spinner.show()
                },
                onLoadingEnd: function() {
                    this.logger.log("RtvePlayer", "onLoadingEnd"), this.spinner.hide(), this.player() && (this.player().hasClass("vjs-waiting") || this.player().hasClass("vjs-seeking") && (this.player().removeClass("vjs-seeking"), this.trigger("seeked")))
                }
            },
            l = o.ProJS.Class.extend({
                id: null,
                container: null,
                rtvePlayerBox: null,
                env: null,
                options: null,
                logger: null,
                errorState: null,
                spinner: null,
                events: {
                    "rp/ready": a.onReady,
                    "rp/loading": a.onLoading,
                    "rp/loadingend": a.onLoadingEnd
                },
                templates: {
                    video: "tpl/rtveplayer/videoTag",
                    audio: "tpl/rtveplayer/audioTag",
                    ztnrFlash: "tpl/rtveplayer/ztnrFlash",
                    panels: {
                        overlayPanel: "tpl/rtveplayer/panels/overlayPanel",
                        relatedPanel: "tpl/rtveplayer/panels/relatedPanel",
                        sharePanel: "tpl/rtveplayer/panels/sharePanel"
                    },
                    spinnerBox: "tpl/skeletonviews/spinner",
                    mediaInfoBox: "tpl/skeletonviews/mediaInfoBoxTpl"
                },
                languageResources: {
                    es: "vendor/videojs/lang/es",
                    ca: "vendor/videojs/lang/ca"
                },
                errors: {
                    templateBasePath: "tpl/rtveplayer/errors/",
                    defaultErrorTemplate: "general_es_debug",
                    types: {
                        common: {
                            code: "common",
                            template: "common",
                            videojsCode: 101
                        },
                        whitelist: {
                            code: "whitelist",
                            template: "common",
                            videojsCode: 102
                        },
                        geolocalized: {
                            code: "geolocalized",
                            template: "common",
                            videojsCode: 103
                        },
                        despub: {
                            code: "despub",
                            template: "common",
                            videojsCode: 104
                        },
                        nosource: {
                            code: "nosource",
                            template: "common",
                            videojsCode: 105
                        },
                        noflash: {
                            code: "noflash",
                            template: "common",
                            videojsCode: 106
                        },
                        failmodeone: {
                            code: "failmodeone",
                            template: "common",
                            videojsCode: 107
                        },
                        failmodetwo: {
                            code: "failmodetwo",
                            template: "common",
                            videojsCode: 108
                        },
                        failassetconfig: {
                            code: "failassetconfig",
                            template: "common",
                            videojsCode: 109
                        },
                        failemissiondate: {
                            code: "failemissiondate",
                            template: "common",
                            videojsCode: 110
                        },
                        failkantar: {
                            code: "failkantar",
                            template: "common",
                            videojsCode: 111
                        }
                    }
                },
                init: function(e, t, n) {
                    var r = s.Deferred();
                    return this.rtvePlayerBox = e, this.id = t, this.container = n, this.options = {}, this.setup().then(this.addSpinner).then(function() {
                        r.resolve(this)
                    }), r.promise()
                },
                setup: function() {
                    var t = s.Deferred();
                    return this.env = this.getRtvePlayerBox().env, this.CONS = this.getRtvePlayerBox().CONS, this.utils = this.getRtvePlayerBox().utils, this.logger = this.getRtvePlayerBox().logger, this.loadModule = this.getRtvePlayerBox().loadModule, this.modules = o.merge(e.basics, e.lazy), this.playerModules = e, this.playerEvents = a, Object.keys(this.modules).forEach(function(e) {
                        this[e] = this.loadModule(this.modules[e])
                    }.bind(this)), Object.keys(this.events).forEach(function(e) {
                        this.on(e, this.events[e].bind(this))
                    }.bind(this)), this.logger.log("RtvePlayer", "Setup RtvePlayer realizado"), t.resolveWith(this, []), t.promise()
                },
                run: function() {
                    this.envSettings().then(this.whitelist, this.moduleErrorHandler).then(this.loadAssetConfig, this.moduleErrorHandler).then(this.loadEmissionDate, this.moduleErrorHandler).then(this.loadKantar, this.moduleErrorHandler).then(this.mediaSource, this.moduleErrorHandler).then(this.playerFeatures, this.moduleErrorHandler).then(this.renderTag, this.moduleErrorHandler).then(this.videojsStart, this.moduleErrorHandler).fail(this.finalErrorHandler)
                },
                moduleErrorHandler: function() {
                    this.logger.error("RtvePlayer", "Fail MODULO", arguments);
                    var e = s.Deferred();
                    return e.rejectWith(this, arguments), e.promise()
                },
                finalErrorHandler: function(e, t) {
                    this.logger.error("RtvePlayer", "Fail HILO principal", arguments, e), e ? e === this.errors.types.failmodetwo && (i.getComponent("Flash").isSupported() || (e = this.errors.types.noflash)) : e = this.errors.types.common, (!this.errorState && e || t) && this.showError(e)
                },
                isDev: function() {
                    return this.env === this.CONS.envs.dev
                },
                isVideo: function() {
                    return "video" === this.options.type
                },
                isAudio: function() {
                    return "audio" === this.options.type
                },
                isPublished: function() {
                    return "ENPUB" === this.options.pubState.code
                },
                isInfantil: function() {
                    return this.options.pubDest === this.CONS.pubDests.infantil
                },
                play: function() {
                    this.player() && this.player().play()
                },
                pause: function() {
                    this.player() && this.player().pause()
                },
                dispose: function() {
                    return window.RTVE.RtvePlayerBoxFactory.dispose(this.id)
                },
                addSpinner: function() {
                    var e = s.Deferred();
                    return t(["vendor/swig", this.templates.spinnerBox], function(t, n) {
                        var r = t.run(n, {});
                        this.spinner = s(r)[0], this.spinner.show = function() {
                            s(this).removeClass("hddn")
                        }, this.spinner.hide = function() {
                            s(this).addClass("hddn")
                        }, this.getContainer().appendChild(this.spinner), e.resolveWith(this, [])
                    }.bind(this)), e.promise()
                },
                player: function() {
                    return i.getPlayers()[this.id]
                },
                getContainer: function() {
                    return this.utils.getHTMLElement(this.container)
                },
                getRtvePlayerBox: function() {
                    return this.rtvePlayerBox
                },
                getErrorTemplate: function(e) {
                    var t;
                    if (this.isDev()) t = this.errors.templateBasePath + this.errors.defaultErrorTemplate;
                    else {
                        var n = this.CONS.pubDests.infantil;
                        this.options.pubDest !== this.CONS.pubDests.infantil && (n = this.CONS.pubDests.rtve), t = this.errors.templateBasePath + n + "_" + this.options.language + "_" + e.template
                    }
                    return this.logger.log("RtvePlayer", "getErrorTemplate - this.isDev()", this.isDev(), t), t
                },
                showError: function(e) {
                    this.logger.error("RtvePlayer", "showError", e), "function" == typeof this.onDualChange && this.onLoadingEnd(), i.options.languages[this.options.language] || t([this.languageResources[this.options.language]], function(e) {
                        i.addLanguage(this.options.language, e)
                    }.bind(this)), this.errorState = e, e ? t(["vendor/swig", this.getErrorTemplate(e)], function(t, n) {
                        if (this.trigger("rp/loadingend"), this.player()) this.player().pause().error({
                            code: e.videojsCode,
                            message: e.code
                        });
                        else {
                            var r = t.run(n, {
                                    message: i.options.languages[this.options.language][e.code]
                                }),
                                o = s("." + this.options.mediaConfig.errorLayerClass, this.container);
                            o.html(r).show()
                        }
                    }.bind(this)) : this.player().relatedPanel.fetchRelated()
                },
                setMedia: function(e, n) {
                    if ("undefined" != typeof e && null !== e)
                        if (this.trigger("rp/loading"), "object" == typeof e) this.prepare(e, n);
                        else {
                            var r = e,
                                o = e.pubDest || this.options.pubDest,
                                i = e.autoplay || this.options.autoplay,
                                s = e.location || this.options.location,
                                a = this.options.related || this.options.related,
                                l = "vendor/text!/modulos/skeleton_views.json?id=" + r;
                            o && (l += "&pubDest=" + o), i && (l += "&autoplay=" + i), s && (l += "&location=" + s), a && (l += "&related=" + a), t([l], function(e) {
                                e = JSON.parse(e), this.logger.log("RtvePlayer", "skeleton_views", "Fetched new data for", e.id, e.title, e), this.prepare(e, n)
                            }.bind(this))
                        }
                },
                prepare: function(e, t) {
                    return this.logger.log("RtvePlayer", "Preparing", e), this.errorState = null, this.options = o.merge(this.options, e), this.options.assetId = e.id, this.options.id = this.id, this.ready = t, this.isPublished() ? document.createElement("video").canPlayType || i.Flash.isSupported() ? void this.run() : void this.showError(this.errors.types.noflash) : void this.showError(this.errors.types.despub)
                }
            });
        return l.mixin(o.ProJS.Observable), l.mixin(o.ProJS.Mediable), l
    }), define("rtveplayer/RtvePlayerBoxBase", ["require", "exports", "module", "core/core_library", "vendor/jquery", "rtveplayer/RtvePlayer", "vendor/videojs/video"], function(e, t, n) {
        "use strict";
        var r = e("core/core_library"),
            o = e("vendor/jquery"),
            i = e("rtveplayer/RtvePlayer"),
            s = (e("vendor/videojs/video"), r.ProJS.Class.extend({
                id: null,
                klass: null,
                container: null,
                rtvePlayer: null,
                env: null,
                pubDest: null,
                options: null,
                errorState: null,
                logger: null,
                logBuffer: null,
                defaults: {
                    playInside: !0,
                    aspectRatio: "16x9",
                    modeOneTimeout: 5e3,
                    related: !0,
                    numRelated: 12,
                    share: !0,
                    techOrder: ["html5", "flash"],
                    idManager: null
                },
                CONS: {
                    envs: {
                        dev: "development",
                        pro: "production"
                    },
                    pubDests: {
                        rtve: "general",
                        infantil: "infantil",
                        alacarta: "alacarta_videos",
                        alacarta_videos: "alacarta_videos"
                    },
                    aspectRatios: {
                        "12x9": "f12x9",
                        "16x9": "f16x9"
                    },
                    defaultIdManager: "default",
                    desktopIdManager: "banebdyede",
                    defaultIdManagerSafariMac: "amonet",
                    idManagerLiveDesktop: "apedemak",
                    hlsIdManager: "",
                    lowQualityIdManager: "anat",
                    defaultAdsOptions: {
                        adsMinDuration: 3e5,
                        timeout: 500,
                        iosPrerollCancelTimeout: 2e3,
                        adCancelTimeout: 3e3,
                        playAdAlways: !1,
                        adsEnabled: !0,
                        autoResize: !0
                    },
                    baseThumbsUrl: "http://img.irtve.es/resources/thumbnailer/",
                    defaultThumbsWidth: 65,
                    langClass: {
                        es: "lang_es",
                        ca: "lang_ca"
                    },
                    logTypes: {
                        info: "info",
                        warn: "warn",
                        error: "error"
                    },
                    defaultTechOrder: ["html5", "flash"],
                    flashTechOrder: ["flash", "html5"],
                    defaultSourceMp4: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/1100000000000.mp4",
                    geoSourceMp4: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp4/0/0/3300000000000.mp4",
                    defaultSourceMp3: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp3/0/0/1100000000000.mp3",
                    geoSourceMp3: "http://mvod.lvlt.rtve.es/resources/TE_NGVA/mp3/0/0/3300000000000.mp3"
                },
                modules: {
                    utils: "rtveplayer/modules/utils/utils",
                    rtvelogger: "rtveplayer/modules/utils/RtveLogger"
                },
                playlist: null,
                playlistDefaults: {},
                init: function(e, t, n) {
                    this.id = e, this.container = t, this.options = r.merge(this.defaults, n)
                },
                create: function() {
                    var e = o.Deferred();
                    return this.videojsExistsIn(this.container) ? this.videojsExistsIn(this.container) && !this.options.playInside ? e.resolveWith(this, []) : e.rejectWith(this, []) : this.setup().done(function() {
                        new i(this, this.id, this.container).done(function(t) {
                            this.logger.log(this.klass, "RtvePlayer instanciado"), t.options = t.getRtvePlayerBox().options, this.rtvePlayer = t, e.resolveWith(this, [])
                        }.bind(this))
                    }), e.promise()
                },
                setup: function() {
                    var e = o.Deferred();
                    return this.env = this.options.env || this.CONS.envs.pro, this.options = r.merge(this.defaults, this.options), this.options.pubDest = this.options.pubDest || this.CONS.pubDests.rtve, this.logBuffer = [], Object.keys(this.modules).forEach(function(e) {
                        this[e] = this.loadModule(this.modules[e])
                    }.bind(this)), this.utils().then(this.rtvelogger).then(function() {
                        this.logger.log(this.klass, "Setup RtvePlayerBox realizado"), e.resolveWith(this, [])
                    }), e.promise()
                },
                loadModule: function(t) {
                    return function() {
                        var n = o.Deferred();
                        return e([t], function(e, t) {
                            t.load.apply(this, e).then(function() {
                                n.resolveWith(this, arguments)
                            }, function() {
                                n.rejectWith(this, arguments)
                            })
                        }.bind(this, arguments)), n.promise()
                    }.bind(this)
                },
                getStatusReport: function() {
                    return {
                        idRtvePlayer: function() {
                            try {
                                return this.getRtvePlayer().id
                            } catch (e) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "idRtvePlayer")
                            }
                        }.apply(this),
                        idAsset: function() {
                            try {
                                return this.getRtvePlayer().options.assetId
                            } catch (e) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "idAseet")
                            }
                        }.apply(this),
                        logs: function() {
                            try {
                                return this.getLogs()
                            } catch (e) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "logs")
                            }
                        }.apply(this),
                        rtvePlayerOptions: function() {
                            try {
                                return this.getRtvePlayer().options
                            } catch (e) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "rtvePlayerOptions")
                            }
                        }.apply(this),
                        videojsOptions: function() {
                            try {
                                var e = (window.videojs || window.vjs)(this.getRtvePlayer().id).options();
                                return delete e.children, e
                            } catch (t) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "videojsOptions")
                            }
                        }.apply(this),
                        systemInfo: function() {
                            try {
                                return this.utils.getSystemInfo()
                            } catch (e) {
                                console.error(this.klass, "getStatusReport", "Unable to get", "systemInfo")
                            }
                        }.apply(this)
                    }
                },
                getLogs: function() {
                    return this.logBuffer
                },
                addLog: function(e) {
                    e && this.logBuffer.push(e)
                },
                getRtvePlayer: function() {
                    return this.rtvePlayer
                },
                videojsExistsIn: function(e) {
                    return 0 !== o(".video-js", e).length
                }
            }));
        return s.mixin(r.ProJS.Observable), s.mixin(r.ProJS.Mediable), s
    }), define("rtveplayer/RtvePlayerBox", ["require", "exports", "module", "rtveplayer/RtvePlayerBoxBase"], function(e, t, n) {
        "use strict";
        var r = e("rtveplayer/RtvePlayerBoxBase"),
            o = r.extend({
                init: function(e, t, n) {
                    this.klass = "RtvePlayerBox", this._super(e, t, n)
                }
            });
        return o
    }), define("rtveplayer/RtvePlayerQuadViewBox", ["require", "exports", "module", "core/core_library", "rtveplayer/RtvePlayerBoxBase", "rtveplayer/RtvePlayerBox"], function(e, t, n) {
        "use strict";
        var r = e("core/core_library"),
            o = (e("rtveplayer/RtvePlayerBoxBase"), e("rtveplayer/RtvePlayerBox"), []),
            i = r.ProJS.Class.extend({
                CONS: {
                    maxQuadViewChilds: 4
                },
                init: function(e, t, n) {
                    this.klass = "RtvePlayerQuadViewBox", this.id = e, this.container = t, this.options = r.merge(this.defaults, n), this.trigger("rpbqv/created", this)
                },
                addToQuadView: function(e) {
                    var t = $.Deferred(),
                        n = this;
                    if ("undefined" == typeof e || null === e) return t.rejectWith(n, []);
                    if (o.length >= n.CONS.maxQuadViewChilds) return n.trigger("rpbqv/maxquadviewchildsreached"), t.rejectWith(n, []);
                    n.trigger("rpbqv/loading");
                    var i = document.createElement("div");
                    return i.id = "quadview_child" + o.length, i.className = "quadview_child", n.container.appendChild(i), n.options = r.merge(n.options, e), RTVE.RtvePlayerBoxFactory.create(i, n.options).done(function() {
                        o[o.length] = this, n.trigger("rpbqv/addedquadviewchild", this), this.getRtvePlayer().setMedia(e, function() {
                            t.resolveWith(this, [])
                        })
                    }).fail(function() {
                        n.container.removeChild(i), n.trigger("rpbqv/failquadviewchild", e)
                    }), t.promise()
                }
            });
        return i.mixin(r.ProJS.Observable), i.mixin(r.ProJS.Mediable), i
    }), define("rtveplayer/RtvePlayerBoxFactory", ["require", "exports", "module", "commons", "core/core_library", "vendor/jquery", "rtveplayer/RtvePlayerBox", "rtveplayer/RtvePlayerQuadViewBox"], function(e, t, n) {
        "use strict";
        var r = (e("commons"), e("core/core_library")),
            o = e("vendor/jquery"),
            i = e("rtveplayer/RtvePlayerBox"),
            s = e("rtveplayer/RtvePlayerQuadViewBox"),
            a = {},
            l = {};
        window.dataLayer = window.dataLayer || [], window.dataLayer.push({
            event: "rpbf/ready"
        });
        var u = r.ProJS.Class.extend({
            init: function() {},
            create: function(e, t) {
                var n = o.Deferred(),
                    r = o(e).data("idrtveplayer"),
                    s = a[r],
                    l = this;
                return s || (r = this.generateId(), s = new i(r, e, t), s && (o(e).data("idrtveplayer", r), a[r] = s)), s || n.rejectWith(this, []), s.create().done(function() {
                    l.trigger("rpb/created", this), n.resolveWith(this, [])
                }), n.promise()
            },
            createQuadView: function(e, t) {
                var n = o.Deferred(),
                    r = o(e).data("idrtveplayerquadview"),
                    i = l[r];
                return i || (r = this.generateId(), i = new s(r, e, t), i && (o(e).data("idrtveplayerquadview", r), l[r] = i)), i || n.rejectWith(this, []), n.resolveWith(i, []), n.promise()
            },
            createOn: function(e, t) {
                return this.create(e, t)
            },
            getAll: function() {
                return a
            },
            getById: function(e) {
                return a[e]
            },
            pauseAll: function(e) {
                if (void 0 !== e) {
                    e = e.toString();
                    for (var t in a) t !== e && a[t].getRtvePlayer().pause()
                } else this.execAll("pause")
            },
            disposeAll: function() {
                this.execAll("dispose")
            },
            execAll: function(e) {
                for (var t in a) a[t].getRtvePlayer()[e](), "dispose" === e && this.dispose(t)
            },
            dispose: function(e) {
                if (void 0 === e || !a[e]) return !1;
                var t = a[e];
                try {
                    t.getRtvePlayer().player().checkBufferingInterval && clearInterval(t.getRtvePlayer().player().checkBufferingInterval), t.getRtvePlayer().player().dispose(), delete a[e], this.trigger("rpb/disposed", e)
                } catch (n) {
                    return !1
                }
            },
            generateId: function() {
                var e = Math.floor(1e10 * Math.random()).toString();
                return a[e] ? this.generateId() : e
            }
        });
        u.mixin(r.ProJS.Observable), u.mixin(r.ProJS.Mediable);
        var c = window.RTVE = window.RTVE || {};
        return c.RtvePlayerBoxFactory = c.RtvePlayerBoxFactory || new u, c.RtvePlayerBoxFactory.on("rpb/created", function(e) {
            var t = e.getRtvePlayer();
            t.on("rp/loading", function() {
                this.profiling = this.profiling || {}, this.profiling.realloadtime = Date.now()
            }.bind(t)), t.on("rp/ready", function() {
                if (this.profiling && this.profiling.realloadtime) {
                    var e = Date.now() - this.profiling.realloadtime;
                    this.trigger("techstats/realloadtime", {
                        realLoadTime: e
                    }), delete this.profiling.realloadtime
                }
            }.bind(t))
        }), c.RtvePlayerBoxFactory
    }), define("vendor/text", ["module"], function(e) {
        "use strict";
        var t, n, r, o, i, s = ["Msxml2.XMLHTTP", "Microsoft.XMLHTTP", "Msxml2.XMLHTTP.4.0"],
            a = /^\s*<\?xml(\s)+version=[\'\"](\d)*.(\d)*[\'\"](\s)*\?>/im,
            l = /<body[^>]*>\s*([\s\S]+)\s*<\/body>/im,
            u = "undefined" != typeof location && location.href,
            c = u && location.protocol && location.protocol.replace(/\:/, ""),
            p = u && location.hostname,
            d = u && (location.port || void 0),
            f = {},
            h = e.config && e.config() || {};
        return t = {
            version: "2.0.12",
            strip: function(e) {
                if (e) {
                    e = e.replace(a, "");
                    var t = e.match(l);
                    t && (e = t[1])
                } else e = "";
                return e
            },
            jsEscape: function(e) {
                return e.replace(/(['\\])/g, "\\$1").replace(/[\f]/g, "\\f").replace(/[\b]/g, "\\b").replace(/[\n]/g, "\\n").replace(/[\t]/g, "\\t").replace(/[\r]/g, "\\r").replace(/[\u2028]/g, "\\u2028").replace(/[\u2029]/g, "\\u2029")
            },
            createXhr: h.createXhr || function() {
                var e, t, n;
                if ("undefined" != typeof XMLHttpRequest) return new XMLHttpRequest;
                if ("undefined" != typeof ActiveXObject)
                    for (t = 0; 3 > t; t += 1) {
                        n = s[t];
                        try {
                            e = new ActiveXObject(n)
                        } catch (r) {}
                        if (e) {
                            s = [n];
                            break
                        }
                    }
                return e
            },
            parseName: function(e) {
                var t, n, r, o = !1,
                    i = e.indexOf("."),
                    s = 0 === e.indexOf("./") || 0 === e.indexOf("../");
                return -1 !== i && (!s || i > 1) ? (t = e.substring(0, i), n = e.substring(i + 1, e.length)) : t = e, r = n || t, i = r.indexOf("!"), -1 !== i && (o = "strip" === r.substring(i + 1), r = r.substring(0, i), n ? n = r : t = r), {
                    moduleName: t,
                    ext: n,
                    strip: o
                }
            },
            xdRegExp: /^((\w+)\:)?\/\/([^\/\\]+)/,
            useXhr: function(e, n, r, o) {
                var i, s, a, l = t.xdRegExp.exec(e);
                return l ? (i = l[2], s = l[3], s = s.split(":"), a = s[1], s = s[0], !(i && i !== n || s && s.toLowerCase() !== r.toLowerCase() || (a || s) && a !== o)) : !0
            },
            finishLoad: function(e, n, r, o) {
                r = n ? t.strip(r) : r, h.isBuild && (f[e] = r), o(r)
            },
            load: function(e, n, r, o) {
                if (o && o.isBuild && !o.inlineText) return void r();
                h.isBuild = o && o.isBuild;
                var i = t.parseName(e),
                    s = i.moduleName + (i.ext ? "." + i.ext : ""),
                    a = n.toUrl(s),
                    l = h.useXhr || t.useXhr;
                return 0 === a.indexOf("empty:") ? void r() : void(!u || l(a, c, p, d) ? t.get(a, function(n) {
                    t.finishLoad(e, i.strip, n, r)
                }, function(e) {
                    r.error && r.error(e)
                }) : n([s], function(e) {
                    t.finishLoad(i.moduleName + "." + i.ext, i.strip, e, r)
                }))
            },
            write: function(e, n, r, o) {
                if (f.hasOwnProperty(n)) {
                    var i = t.jsEscape(f[n]);
                    r.asModule(e + "!" + n, "define(function () { return '" + i + "';});\n")
                }
            },
            writeFile: function(e, n, r, o, i) {
                var s = t.parseName(n),
                    a = s.ext ? "." + s.ext : "",
                    l = s.moduleName + a,
                    u = r.toUrl(s.moduleName + a) + ".js";
                t.load(l, r, function(n) {
                    var r = function(e) {
                        return o(u, e)
                    };
                    r.asModule = function(e, t) {
                        return o.asModule(e, u, t)
                    }, t.write(e, l, r, i)
                }, i)
            }
        }, "node" === h.env || !h.env && "undefined" != typeof process && process.versions && process.versions.node && !process.versions["node-webkit"] ? (n = require.nodeRequire("fs"), t.get = function(e, t, r) {
            try {
                var o = n.readFileSync(e, "utf8");
                0 === o.indexOf("\ufeff") && (o = o.substring(1)), t(o)
            } catch (i) {
                r && r(i)
            }
        }) : "xhr" === h.env || !h.env && t.createXhr() ? t.get = function(e, n, r, o) {
            var i, s = t.createXhr();
            if (s.open("GET", e, !0), o)
                for (i in o) o.hasOwnProperty(i) && s.setRequestHeader(i.toLowerCase(), o[i]);
            h.onXhr && h.onXhr(s, e), s.onreadystatechange = function(t) {
                var o, i;
                4 === s.readyState && (o = s.status || 0, o > 399 && 600 > o ? (i = new Error(e + " HTTP status: " + o), i.xhr = s, r && r(i)) : n(s.responseText), h.onXhrComplete && h.onXhrComplete(s, e))
            }, s.send(null)
        } : "rhino" === h.env || !h.env && "undefined" != typeof Packages && "undefined" != typeof java ? t.get = function(e, t) {
            var n, r, o = "utf-8",
                i = new java.io.File(e),
                s = java.lang.System.getProperty("line.separator"),
                a = new java.io.BufferedReader(new java.io.InputStreamReader(new java.io.FileInputStream(i), o)),
                l = "";
            try {
                for (n = new java.lang.StringBuffer, r = a.readLine(), r && r.length() && 65279 === r.charAt(0) && (r = r.substring(1)), null !== r && n.append(r); null !== (r = a.readLine());) n.append(s), n.append(r);
                l = String(n.toString())
            } finally {
                a.close()
            }
            t(l)
        } : ("xpconnect" === h.env || !h.env && "undefined" != typeof Components && Components.classes && Components.interfaces) && (r = Components.classes, o = Components.interfaces, Components.utils["import"]("resource://gre/modules/FileUtils.jsm"), i = "@mozilla.org/windows-registry-key;1" in r, t.get = function(e, t) {
            var n, s, a, l = {};
            i && (e = e.replace(/\//g, "\\")), a = new FileUtils.File(e);
            try {
                n = r["@mozilla.org/network/file-input-stream;1"].createInstance(o.nsIFileInputStream), n.init(a, 1, 0, !1), s = r["@mozilla.org/intl/converter-input-stream;1"].createInstance(o.nsIConverterInputStream), s.init(n, "utf-8", n.available(), o.nsIConverterInputStream.DEFAULT_REPLACEMENT_CHARACTER), s.readString(n.available(), l), s.close(), n.close(), t(l.value)
            } catch (u) {
                throw new Error((a && a.path || "") + ": " + u)
            }
        }), t
    }), define("tpl/skeletonviews/spinner", [], function() {
        return function(e, t, n, r, o) {
            var i = (e.extensions, "");
            return i += '<div class="spinnBox hddn">\n	<div class="spinn">\n		<span class="ball01"></span>\n		<span class="ball02"></span>\n		<span class="ball03"></span>\n		<span class="ball04"></span>\n	</div>\n</div>'
        }
    }), define("tpl/skeletonviews/mediaInfoBoxTpl", [], function() {
        return function(e, t, n, r, o) {
            var i = (e.extensions, "");
            t.cuepointsBox = {};
            var i = "";
            t.cuepointsBox.paintCuepoints = function(e, o) {
                var i = "",
                    s = r.extend({}, t);
                return r.each(t, function(e, n) {
                        -1 !== ["cuepoints", ", ", "show"].indexOf(n) && delete t[n]
                    }), i += '\n\n	<span class="ico blind ', i += n.e(null !== ("undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonClass && null !== t.cuepoints.buttonClass ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonClass && null !== t.cuepoints.buttonClass ? t.cuepoints.buttonClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonClass && null !== e.buttonClass ? e.buttonClass : "") ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonClass && null !== t.cuepoints.buttonClass ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonClass && null !== t.cuepoints.buttonClass ? t.cuepoints.buttonClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonClass && null !== e.buttonClass ? e.buttonClass : "" : ""), i += " beoff ", (null !== ("undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "") ? "undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "" : "") && (i += "be_on"), i += '">\n		<img alt="" src="http://img.irtve.es/css/i/blank.gif">\n		<span>', i += n.e(null !== ("undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonLabel && null !== t.cuepoints.buttonLabel ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonLabel && null !== t.cuepoints.buttonLabel ? t.cuepoints.buttonLabel : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonLabel && null !== e.buttonLabel ? e.buttonLabel : "") ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonLabel && null !== t.cuepoints.buttonLabel ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.buttonLabel && null !== t.cuepoints.buttonLabel ? t.cuepoints.buttonLabel : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonLabel && null !== e.buttonLabel ? e.buttonLabel : "" : ""), i += '</span>\n	</span>\n	<div class="blindBox ', i += n.e(null !== ("undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.cssClass && null !== t.cuepoints.cssClass ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.cssClass && null !== t.cuepoints.cssClass ? t.cuepoints.cssClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.cssClass && null !== e.cssClass ? e.cssClass : "") ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.cssClass && null !== t.cuepoints.cssClass ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.cssClass && null !== t.cuepoints.cssClass ? t.cuepoints.cssClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.cssClass && null !== e.cssClass ? e.cssClass : "" : ""),
                    i += " ", (null !== ("undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "") ? "undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "" : "") && (i += "be_on"), i += '">		\n		<ul>\n			',
                    function() {
                        var o = null !== ("undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.data && null !== t.cuepoints.data ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.data && null !== t.cuepoints.data ? t.cuepoints.data : "" : "undefined" != typeof e && null !== e && void 0 !== e.data && null !== e.data ? e.data : "") ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.data && null !== t.cuepoints.data ? "undefined" != typeof t.cuepoints && null !== t.cuepoints && void 0 !== t.cuepoints.data && null !== t.cuepoints.data ? t.cuepoints.data : "" : "undefined" != typeof e && null !== e && void 0 !== e.data && null !== e.data ? e.data : "" : "",
                            s = r.isArray(o) || "string" == typeof o ? o.length : r.keys(o).length;
                        if (o) {
                            var a = {
                                loop: t.loop,
                                item: t.item,
                                __k: t.__k
                            };
                            t.loop = {
                                first: !1,
                                index: 1,
                                index0: 0,
                                revindex: s,
                                revindex0: s - 1,
                                length: s,
                                last: !1
                            }, r.each(o, function(e, r) {
                                t.item = e, t.__k = r, t.loop.key = r, t.loop.first = 0 === t.loop.index0, t.loop.last = 0 === t.loop.revindex0, i += '\n				<li data-config=\'{"init":', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? t.item.init : "" : "undefined" != typeof e && null !== e && void 0 !== e.init && null !== e.init ? e.init : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? t.item.init : "" : "undefined" != typeof e && null !== e && void 0 !== e.init && null !== e.init ? e.init : "" : ""), i += "}'>\n					<span>", i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.time && null !== t.item.time ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.time && null !== t.item.time ? t.item.time : "" : "undefined" != typeof e && null !== e && void 0 !== e.time && null !== e.time ? e.time : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.time && null !== t.item.time ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.time && null !== t.item.time ? t.item.time : "" : "undefined" != typeof e && null !== e && void 0 !== e.time && null !== e.time ? e.time : "" : ""), i += "</span> <span>", i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.title && null !== t.item.title ? t.item.title : "" : "undefined" != typeof e && null !== e && void 0 !== e.title && null !== e.title ? e.title : "" : ""), i += "</span>					\n				</li>\n			", t.loop.index += 1, t.loop.index0 += 1, t.loop.revindex -= 1, t.loop.revindex0 -= 1
                            }), t.loop = a.loop, t.item = a.item, t.__k = a.__k, a = void 0
                        }
                    }(), i += "\n		</ul>\n	</div>\n\n", t = r.extend(t, s), i
            }, t.cuepointsBox.paintCuepoints.safe = !0, i += "\n", t.transcriptionBox = {};
            var i = "";
            return t.transcriptionBox.paintTranscription = function(e, o) {
                var i = "",
                    s = r.extend({}, t);
                return r.each(t, function(e, n) {
                        -1 !== ["transcription", ", ", "show"].indexOf(n) && delete t[n]
                    }), i += '\n\n	<span class="ico blind ', i += n.e(null !== ("undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonClass && null !== t.transcription.buttonClass ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonClass && null !== t.transcription.buttonClass ? t.transcription.buttonClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonClass && null !== e.buttonClass ? e.buttonClass : "") ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonClass && null !== t.transcription.buttonClass ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonClass && null !== t.transcription.buttonClass ? t.transcription.buttonClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonClass && null !== e.buttonClass ? e.buttonClass : "" : ""), i += " beoff ", (null !== ("undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "") ? "undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "" : "") && (i += "be_on"), i += '">\n		<img alt="" src="http://img.irtve.es/css/i/blank.gif">\n		<span>', i += n.e(null !== ("undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonLabel && null !== t.transcription.buttonLabel ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonLabel && null !== t.transcription.buttonLabel ? t.transcription.buttonLabel : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonLabel && null !== e.buttonLabel ? e.buttonLabel : "") ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonLabel && null !== t.transcription.buttonLabel ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.buttonLabel && null !== t.transcription.buttonLabel ? t.transcription.buttonLabel : "" : "undefined" != typeof e && null !== e && void 0 !== e.buttonLabel && null !== e.buttonLabel ? e.buttonLabel : "" : ""), i += '</span>\n	</span>\n	<div class="blindBox ', i += n.e(null !== ("undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.cssClass && null !== t.transcription.cssClass ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.cssClass && null !== t.transcription.cssClass ? t.transcription.cssClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.cssClass && null !== e.cssClass ? e.cssClass : "") ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.cssClass && null !== t.transcription.cssClass ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.cssClass && null !== t.transcription.cssClass ? t.transcription.cssClass : "" : "undefined" != typeof e && null !== e && void 0 !== e.cssClass && null !== e.cssClass ? e.cssClass : "" : ""), i += " ", (null !== ("undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "") ? "undefined" != typeof t.show && null !== t.show ? "undefined" != typeof t.show && null !== t.show ? t.show : "" : "undefined" != typeof o && null !== o ? o : "" : "") && (i += "be_on"), i += '">\n		',
                    function() {
                        var o = null !== ("undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.data && null !== t.transcription.data ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.data && null !== t.transcription.data ? t.transcription.data : "" : "undefined" != typeof e && null !== e && void 0 !== e.data && null !== e.data ? e.data : "") ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.data && null !== t.transcription.data ? "undefined" != typeof t.transcription && null !== t.transcription && void 0 !== t.transcription.data && null !== t.transcription.data ? t.transcription.data : "" : "undefined" != typeof e && null !== e && void 0 !== e.data && null !== e.data ? e.data : "" : "",
                            s = r.isArray(o) || "string" == typeof o ? o.length : r.keys(o).length;
                        if (o) {
                            var a = {
                                loop: t.loop,
                                item: t.item,
                                __k: t.__k
                            };
                            t.loop = {
                                first: !1,
                                index: 1,
                                index0: 0,
                                revindex: s,
                                revindex0: s - 1,
                                length: s,
                                last: !1
                            }, r.each(o, function(e, r) {
                                t.item = e, t.__k = r, t.loop.key = r, t.loop.first = 0 === t.loop.index0, t.loop.last = 0 === t.loop.revindex0, i += '\n			<p data-config=\'{"init":', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? t.item.init : "" : "undefined" != typeof e && null !== e && void 0 !== e.init && null !== e.init ? e.init : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.init && null !== t.item.init ? t.item.init : "" : "undefined" != typeof e && null !== e && void 0 !== e.init && null !== e.init ? e.init : "" : ""), i += "}'>\n				", i += n.safe(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.text && null !== t.item.text ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.text && null !== t.item.text ? t.item.text : "" : "undefined" != typeof e && null !== e && void 0 !== e.text && null !== e.text ? e.text : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.text && null !== t.item.text ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.text && null !== t.item.text ? t.item.text : "" : "undefined" != typeof e && null !== e && void 0 !== e.text && null !== e.text ? e.text : "" : ""), i += "\n			</p>\n		", t.loop.index += 1, t.loop.index0 += 1, t.loop.revindex -= 1, t.loop.revindex0 -= 1
                            }), t.loop = a.loop, t.item = a.item, t.__k = a.__k, a = void 0
                        }
                    }(), i += "\n	</div>\n\n", t = r.extend(t, s), i
            }, t.transcriptionBox.paintTranscription.safe = !0, i += "\n\n", t.existsCuepoints = (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? t.item.mediaInfo.cuepoints : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints ? item.mediaInfo.cuepoints : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? t.item.mediaInfo.cuepoints : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints ? item.mediaInfo.cuepoints : "" : "") && (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data ? t.item.mediaInfo.cuepoints.data : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints && void 0 !== item.mediaInfo.cuepoints.data && null !== item.mediaInfo.cuepoints.data ? item.mediaInfo.cuepoints.data : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data ? t.item.mediaInfo.cuepoints.data : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints && void 0 !== item.mediaInfo.cuepoints.data && null !== item.mediaInfo.cuepoints.data ? item.mediaInfo.cuepoints.data : "" : "") && (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data && void 0 !== t.item.mediaInfo.cuepoints.data.length && null !== t.item.mediaInfo.cuepoints.data.length ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data && void 0 !== t.item.mediaInfo.cuepoints.data.length && null !== t.item.mediaInfo.cuepoints.data.length ? t.item.mediaInfo.cuepoints.data.length : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints && void 0 !== item.mediaInfo.cuepoints.data && null !== item.mediaInfo.cuepoints.data && void 0 !== item.mediaInfo.cuepoints.data.length && null !== item.mediaInfo.cuepoints.data.length ? item.mediaInfo.cuepoints.data.length : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data && void 0 !== t.item.mediaInfo.cuepoints.data.length && null !== t.item.mediaInfo.cuepoints.data.length ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints && void 0 !== t.item.mediaInfo.cuepoints.data && null !== t.item.mediaInfo.cuepoints.data && void 0 !== t.item.mediaInfo.cuepoints.data.length && null !== t.item.mediaInfo.cuepoints.data.length ? t.item.mediaInfo.cuepoints.data.length : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints && void 0 !== item.mediaInfo.cuepoints.data && null !== item.mediaInfo.cuepoints.data && void 0 !== item.mediaInfo.cuepoints.data.length && null !== item.mediaInfo.cuepoints.data.length ? item.mediaInfo.cuepoints.data.length : "" : "") > 0, i += "\n", t.existsTranscription = (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? t.item.mediaInfo.transcription : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription ? item.mediaInfo.transcription : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? t.item.mediaInfo.transcription : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription ? item.mediaInfo.transcription : "" : "") && (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data ? t.item.mediaInfo.transcription.data : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription && void 0 !== item.mediaInfo.transcription.data && null !== item.mediaInfo.transcription.data ? item.mediaInfo.transcription.data : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data ? t.item.mediaInfo.transcription.data : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription && void 0 !== item.mediaInfo.transcription.data && null !== item.mediaInfo.transcription.data ? item.mediaInfo.transcription.data : "" : "") && (null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data && void 0 !== t.item.mediaInfo.transcription.data.length && null !== t.item.mediaInfo.transcription.data.length ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data && void 0 !== t.item.mediaInfo.transcription.data.length && null !== t.item.mediaInfo.transcription.data.length ? t.item.mediaInfo.transcription.data.length : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription && void 0 !== item.mediaInfo.transcription.data && null !== item.mediaInfo.transcription.data && void 0 !== item.mediaInfo.transcription.data.length && null !== item.mediaInfo.transcription.data.length ? item.mediaInfo.transcription.data.length : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data && void 0 !== t.item.mediaInfo.transcription.data.length && null !== t.item.mediaInfo.transcription.data.length ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription && void 0 !== t.item.mediaInfo.transcription.data && null !== t.item.mediaInfo.transcription.data && void 0 !== t.item.mediaInfo.transcription.data.length && null !== t.item.mediaInfo.transcription.data.length ? t.item.mediaInfo.transcription.data.length : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription && void 0 !== item.mediaInfo.transcription.data && null !== item.mediaInfo.transcription.data && void 0 !== item.mediaInfo.transcription.data.length && null !== item.mediaInfo.transcription.data.length ? item.mediaInfo.transcription.data.length : "" : "") > 0, i += "\n\n", ((null !== ("undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "") ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "" : "") || (null !== ("undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "") ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "" : "")) && (i += "\n\n	", (null !== ("undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "") ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "" : "") && !(null !== ("undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "") ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "" : "") ? (i += "\n		", t.showCuepoints = !1, i += "\n		", t.showTranscription = !0, i += "\n	") : (i += "\n		", t.showCuepoints = !0, i += "\n		", t.showTranscription = !1, i += "\n	"), i += '\n\n\n	<div class="', i += n.e(null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaConfig && null !== t.item.mediaConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig && null !== t.item.mediaConfig.mediaInfoConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig.cssClass && null !== t.item.mediaConfig.mediaInfoConfig.cssClass ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaConfig && null !== t.item.mediaConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig && null !== t.item.mediaConfig.mediaInfoConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig.cssClass && null !== t.item.mediaConfig.mediaInfoConfig.cssClass ? t.item.mediaConfig.mediaInfoConfig.cssClass : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaConfig && null !== item.mediaConfig && void 0 !== item.mediaConfig.mediaInfoConfig && null !== item.mediaConfig.mediaInfoConfig && void 0 !== item.mediaConfig.mediaInfoConfig.cssClass && null !== item.mediaConfig.mediaInfoConfig.cssClass ? item.mediaConfig.mediaInfoConfig.cssClass : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaConfig && null !== t.item.mediaConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig && null !== t.item.mediaConfig.mediaInfoConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig.cssClass && null !== t.item.mediaConfig.mediaInfoConfig.cssClass ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaConfig && null !== t.item.mediaConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig && null !== t.item.mediaConfig.mediaInfoConfig && void 0 !== t.item.mediaConfig.mediaInfoConfig.cssClass && null !== t.item.mediaConfig.mediaInfoConfig.cssClass ? t.item.mediaConfig.mediaInfoConfig.cssClass : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaConfig && null !== item.mediaConfig && void 0 !== item.mediaConfig.mediaInfoConfig && null !== item.mediaConfig.mediaInfoConfig && void 0 !== item.mediaConfig.mediaInfoConfig.cssClass && null !== item.mediaConfig.mediaInfoConfig.cssClass ? item.mediaConfig.mediaInfoConfig.cssClass : "" : ""), i += '">\n		', (null !== ("undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "") ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? "undefined" != typeof t.existsCuepoints && null !== t.existsCuepoints ? t.existsCuepoints : "" : "undefined" != typeof existsCuepoints && null !== existsCuepoints ? existsCuepoints : "" : "") && (i += "\n			", i += ((null !== ("undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox && void 0 !== t.cuepointsBox.paintCuepoints && null !== t.cuepointsBox.paintCuepoints ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox && void 0 !== t.cuepointsBox.paintCuepoints && null !== t.cuepointsBox.paintCuepoints ? t.cuepointsBox.paintCuepoints : "" : "undefined" != typeof cuepointsBox && null !== cuepointsBox && void 0 !== cuepointsBox.paintCuepoints && null !== cuepointsBox.paintCuepoints ? cuepointsBox.paintCuepoints : "") ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox && void 0 !== t.cuepointsBox.paintCuepoints && null !== t.cuepointsBox.paintCuepoints ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox && void 0 !== t.cuepointsBox.paintCuepoints && null !== t.cuepointsBox.paintCuepoints ? t.cuepointsBox.paintCuepoints : "" : "undefined" != typeof cuepointsBox && null !== cuepointsBox && void 0 !== cuepointsBox.paintCuepoints && null !== cuepointsBox.paintCuepoints ? cuepointsBox.paintCuepoints : "" : "") || o).call(null !== ("undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox ? t.cuepointsBox : "" : "undefined" != typeof cuepointsBox && null !== cuepointsBox ? cuepointsBox : "") ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox ? "undefined" != typeof t.cuepointsBox && null !== t.cuepointsBox ? t.cuepointsBox : "" : "undefined" != typeof cuepointsBox && null !== cuepointsBox ? cuepointsBox : "" : "", null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? t.item.mediaInfo.cuepoints : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints ? item.mediaInfo.cuepoints : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.cuepoints && null !== t.item.mediaInfo.cuepoints ? t.item.mediaInfo.cuepoints : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.cuepoints && null !== item.mediaInfo.cuepoints ? item.mediaInfo.cuepoints : "" : "", null !== ("undefined" != typeof t.showCuepoints && null !== t.showCuepoints ? "undefined" != typeof t.showCuepoints && null !== t.showCuepoints ? t.showCuepoints : "" : "undefined" != typeof showCuepoints && null !== showCuepoints ? showCuepoints : "") ? "undefined" != typeof t.showCuepoints && null !== t.showCuepoints ? "undefined" != typeof t.showCuepoints && null !== t.showCuepoints ? t.showCuepoints : "" : "undefined" != typeof showCuepoints && null !== showCuepoints ? showCuepoints : "" : ""), i += "\n		"), i += "\n\n		", (null !== ("undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "") ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? "undefined" != typeof t.existsTranscription && null !== t.existsTranscription ? t.existsTranscription : "" : "undefined" != typeof existsTranscription && null !== existsTranscription ? existsTranscription : "" : "") && (i += "\n			", i += ((null !== ("undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox && void 0 !== t.transcriptionBox.paintTranscription && null !== t.transcriptionBox.paintTranscription ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox && void 0 !== t.transcriptionBox.paintTranscription && null !== t.transcriptionBox.paintTranscription ? t.transcriptionBox.paintTranscription : "" : "undefined" != typeof transcriptionBox && null !== transcriptionBox && void 0 !== transcriptionBox.paintTranscription && null !== transcriptionBox.paintTranscription ? transcriptionBox.paintTranscription : "") ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox && void 0 !== t.transcriptionBox.paintTranscription && null !== t.transcriptionBox.paintTranscription ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox && void 0 !== t.transcriptionBox.paintTranscription && null !== t.transcriptionBox.paintTranscription ? t.transcriptionBox.paintTranscription : "" : "undefined" != typeof transcriptionBox && null !== transcriptionBox && void 0 !== transcriptionBox.paintTranscription && null !== transcriptionBox.paintTranscription ? transcriptionBox.paintTranscription : "" : "") || o).call(null !== ("undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox ? t.transcriptionBox : "" : "undefined" != typeof transcriptionBox && null !== transcriptionBox ? transcriptionBox : "") ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox ? "undefined" != typeof t.transcriptionBox && null !== t.transcriptionBox ? t.transcriptionBox : "" : "undefined" != typeof transcriptionBox && null !== transcriptionBox ? transcriptionBox : "" : "", null !== ("undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? t.item.mediaInfo.transcription : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription ? item.mediaInfo.transcription : "") ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? "undefined" != typeof t.item && null !== t.item && void 0 !== t.item.mediaInfo && null !== t.item.mediaInfo && void 0 !== t.item.mediaInfo.transcription && null !== t.item.mediaInfo.transcription ? t.item.mediaInfo.transcription : "" : "undefined" != typeof item && null !== item && void 0 !== item.mediaInfo && null !== item.mediaInfo && void 0 !== item.mediaInfo.transcription && null !== item.mediaInfo.transcription ? item.mediaInfo.transcription : "" : "", null !== ("undefined" != typeof t.showTranscription && null !== t.showTranscription ? "undefined" != typeof t.showTranscription && null !== t.showTranscription ? t.showTranscription : "" : "undefined" != typeof showTranscription && null !== showTranscription ? showTranscription : "") ? "undefined" != typeof t.showTranscription && null !== t.showTranscription ? "undefined" != typeof t.showTranscription && null !== t.showTranscription ? t.showTranscription : "" : "undefined" != typeof showTranscription && null !== showTranscription ? showTranscription : "" : ""), i += "\n		"), i += "\n	</div>\n	\n"), i += "\n"
        }
    })
}();