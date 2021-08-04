! function(e) {
    var t = {};
    function n(s) {
        if (t[s]) return t[s].exports;
        var a = t[s] = {
            i: s,
            l: !1,
            exports: {}
        };
        return e[s].call(a.exports, a, a.exports, n), a.l = !0, a.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, s) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: s
        })
    }, n.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, n.t = function(e, t) {
        if (1 & t && (e = n(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var s = Object.create(null);
        if (n.r(s), Object.defineProperty(s, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var a in e) n.d(s, a, function(t) {
                return e[t]
            }.bind(null, a));
        return s
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 21)
}([function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = n(8);
    Object.defineProperty(t, "AllSubstringsIndexStrategy", {
        enumerable: !0,
        get: function() {
            return s.AllSubstringsIndexStrategy
        }
    });
    var a = n(9);
    Object.defineProperty(t, "ExactWordIndexStrategy", {
        enumerable: !0,
        get: function() {
            return a.ExactWordIndexStrategy
        }
    });
    var r = n(10);
    Object.defineProperty(t, "PrefixIndexStrategy", {
        enumerable: !0,
        get: function() {
            return r.PrefixIndexStrategy
        }
    })
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = n(11);
    Object.defineProperty(t, "CaseSensitiveSanitizer", {
        enumerable: !0,
        get: function() {
            return s.CaseSensitiveSanitizer
        }
    });
    var a = n(12);
    Object.defineProperty(t, "LowerCaseSanitizer", {
        enumerable: !0,
        get: function() {
            return a.LowerCaseSanitizer
        }
    })
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = n(13);
    Object.defineProperty(t, "TfIdfSearchIndex", {
        enumerable: !0,
        get: function() {
            return s.TfIdfSearchIndex
        }
    });
    var a = n(14);
    Object.defineProperty(t, "UnorderedSearchIndex", {
        enumerable: !0,
        get: function() {
            return a.UnorderedSearchIndex
        }
    })
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.default = function(e, t) {
        t = t || [];
        for (var n = e = e || {}, s = 0; s < t.length; s++)
            if (null == (n = n[t[s]])) return null;
        return n
    }
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = n(15);
    Object.defineProperty(t, "SimpleTokenizer", {
        enumerable: !0,
        get: function() {
            return s.SimpleTokenizer
        }
    });
    var a = n(16);
    Object.defineProperty(t, "StemmingTokenizer", {
        enumerable: !0,
        get: function() {
            return a.StemmingTokenizer
        }
    });
    var r = n(17);
    Object.defineProperty(t, "StopWordsTokenizer", {
        enumerable: !0,
        get: function() {
            return r.StopWordsTokenizer
        }
    })
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = t.StopWordsMap = {
        a: !0,
        able: !0,
        about: !0,
        across: !0,
        after: !0,
        all: !0,
        almost: !0,
        also: !0,
        am: !0,
        among: !0,
        an: !0,
        and: !0,
        any: !0,
        are: !0,
        as: !0,
        at: !0,
        be: !0,
        because: !0,
        been: !0,
        but: !0,
        by: !0,
        can: !0,
        cannot: !0,
        could: !0,
        dear: !0,
        did: !0,
        do: !0,
        does: !0,
        either: !0,
        else: !0,
        ever: !0,
        every: !0,
        for: !0,
        from: !0,
        get: !0,
        got: !0,
        had: !0,
        has: !0,
        have: !0,
        he: !0,
        her: !0,
        hers: !0,
        him: !0,
        his: !0,
        how: !0,
        however: !0,
        i: !0,
        if: !0,
        in: !0,
        into: !0,
        is: !0,
        it: !0,
        its: !0,
        just: !0,
        least: !0,
        let: !0,
        like: !0,
        likely: !0,
        may: !0,
        me: !0,
        might: !0,
        most: !0,
        must: !0,
        my: !0,
        neither: !0,
        no: !0,
        nor: !0,
        not: !0,
        of: !0,
        off: !0,
        often: !0,
        on: !0,
        only: !0,
        or: !0,
        other: !0,
        our: !0,
        own: !0,
        rather: !0,
        said: !0,
        say: !0,
        says: !0,
        she: !0,
        should: !0,
        since: !0,
        so: !0,
        some: !0,
        than: !0,
        that: !0,
        the: !0,
        their: !0,
        them: !0,
        then: !0,
        there: !0,
        these: !0,
        they: !0,
        this: !0,
        tis: !0,
        to: !0,
        too: !0,
        twas: !0,
        us: !0,
        wants: !0,
        was: !0,
        we: !0,
        were: !0,
        what: !0,
        when: !0,
        where: !0,
        which: !0,
        while: !0,
        who: !0,
        whom: !0,
        why: !0,
        will: !0,
        with: !0,
        would: !0,
        yet: !0,
        you: !0,
        your: !0
    };
    s.constructor = !1, s.hasOwnProperty = !1, s.isPrototypeOf = !1, s.propertyIsEnumerable = !1, s.toLocaleString = !1, s.toString = !1, s.valueOf = !1
}, function(e, t, n) {
    e.exports = function() {
        "use strict";
        (function() {
            for (var e = 0, t = ["ms", "moz", "webkit", "o"], n = 0; n < t.length && !window.requestAnimationFrame; ++n) window.requestAnimationFrame = window[t[n] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[t[n] + "CancelAnimationFrame"] || window[t[n] + "CancelRequestAnimationFrame"];
            window.requestAnimationFrame || (window.requestAnimationFrame = function(t, n) {
                var s = (new Date).getTime(),
                    a = Math.max(0, 16 - (s - e)),
                    r = window.setTimeout((function() {
                        t(s + a)
                    }), a);
                return e = s + a, r
            }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(e) {
                clearTimeout(e)
            })
        })(),
        function() {
            if ("function" == typeof window.CustomEvent) return !1;

            function e(e, t) {
                t = t || {
                    bubbles: !1,
                    cancelable: !1,
                    detail: void 0
                };
                var n = document.createEvent("CustomEvent");
                return n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail), n
            }
            e.prototype = window.Event.prototype, window.CustomEvent = e
        }(),
        function(e) {
            try {
                return new CustomEvent("test"), !1
            } catch (e) {}

            function t(t, n) {
                n = n || {
                    bubbles: !1,
                    cancelable: !1
                };
                var s = document.createEvent("MouseEvent");
                return s.initMouseEvent(t, n.bubbles, n.cancelable, e, 0, 0, 0, 0, 0, !1, !1, !1, !1, 0, null), s
            }
            t.prototype = Event.prototype, e.MouseEvent = t
        }(window);
        var e = function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            },
            t = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var s = t[n];
                        s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                    }
                }
                return function(t, n, s) {
                    return n && e(t.prototype, n), s && e(t, s), t
                }
            }(),
            n = function e(t, n, s) {
                null === t && (t = Function.prototype);
                var a = Object.getOwnPropertyDescriptor(t, n);
                if (void 0 === a) {
                    var r = Object.getPrototypeOf(t);
                    return null === r ? void 0 : e(r, n, s)
                }
                if ("value" in a) return a.value;
                var i = a.get;
                return void 0 !== i ? i.call(s) : void 0
            },
            s = function(e, t) {
                if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                return !t || "object" != typeof t && "function" != typeof t ? e : t
            },
            a = function(e, t) {
                if (Array.isArray(e)) return e;
                if (Symbol.iterator in Object(e)) return function(e, t) {
                    var n = [],
                        s = !0,
                        a = !1,
                        r = void 0;
                    try {
                        for (var i, o = e[Symbol.iterator](); !(s = (i = o.next()).done) && (n.push(i.value), !t || n.length !== t); s = !0);
                    } catch (e) {
                        a = !0, r = e
                    } finally {
                        try {
                            !s && o.return && o.return()
                        } finally {
                            if (a) throw r
                        }
                    }
                    return n
                }(e, t);
                throw new TypeError("Invalid attempt to destructure non-iterable instance")
            },
            r = function t(n, s, a, r) {
                e(this, t);
                var i = this;

                function o(e) {
                    e.stopPropagation(), document.removeEventListener("mouseup", o), document.removeEventListener("mousemove", l), i.eventBus.dispatchEvent(new CustomEvent("handleend", {
                        detail: {
                            handle: i
                        }
                    }))
                }

                function l(e) {
                    e.stopPropagation(), i.eventBus.dispatchEvent(new CustomEvent("handlemove", {
                        detail: {
                            mouseX: e.clientX,
                            mouseY: e.clientY
                        }
                    }))
                }
                this.position = n, this.constraints = s, this.cursor = a, this.eventBus = r, this.el = document.createElement("div"), this.el.className = "croppr-handle", this.el.style.cursor = a, this.el.addEventListener("mousedown", (function(e) {
                    e.stopPropagation(), document.addEventListener("mouseup", o), document.addEventListener("mousemove", l), i.eventBus.dispatchEvent(new CustomEvent("handlestart", {
                        detail: {
                            handle: i
                        }
                    }))
                }))
            },
            i = function() {
                function n(t, s, a, r) {
                    e(this, n), this.x1 = t, this.y1 = s, this.x2 = a, this.y2 = r
                }
                return t(n, [{
                    key: "set",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                            t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                            s = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null;
                        return this.x1 = null == e ? this.x1 : e, this.y1 = null == t ? this.y1 : t, this.x2 = null == n ? this.x2 : n, this.y2 = null == s ? this.y2 : s, this
                    }
                }, {
                    key: "width",
                    value: function() {
                        return Math.abs(this.x2 - this.x1)
                    }
                }, {
                    key: "height",
                    value: function() {
                        return Math.abs(this.y2 - this.y1)
                    }
                }, {
                    key: "resize",
                    value: function(e, t) {
                        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [0, 0],
                            s = this.x1 + this.width() * n[0],
                            a = this.y1 + this.height() * n[1];
                        return this.x1 = s - e * n[0], this.y1 = a - t * n[1], this.x2 = this.x1 + e, this.y2 = this.y1 + t, this
                    }
                }, {
                    key: "scale",
                    value: function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [0, 0],
                            n = this.width() * e,
                            s = this.height() * e;
                        return this.resize(n, s, t), this
                    }
                }, {
                    key: "move",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                            t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            n = this.width(),
                            s = this.height();
                        return e = null === e ? this.x1 : e, t = null === t ? this.y1 : t, this.x1 = e, this.y1 = t, this.x2 = e + n, this.y2 = t + s, this
                    }
                }, {
                    key: "getRelativePoint",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [0, 0],
                            t = this.width() * e[0],
                            n = this.height() * e[1];
                        return [t, n]
                    }
                }, {
                    key: "getAbsolutePoint",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : [0, 0],
                            t = this.x1 + this.width() * e[0],
                            n = this.y1 + this.height() * e[1];
                        return [t, n]
                    }
                }, {
                    key: "constrainToRatio",
                    value: function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [0, 0],
                            n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "height";
                        if (null !== e) {
                            switch (this.width(), this.height(), n) {
                                case "height":
                                    this.resize(this.width(), this.width() * e, t);
                                    break;
                                case "width":
                                    this.resize(1 * this.height() / e, this.height(), t);
                                    break;
                                default:
                                    this.resize(this.width(), this.width() * e, t)
                            }
                            return this
                        }
                    }
                }, {
                    key: "constrainToBoundary",
                    value: function(e, t) {
                        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [0, 0],
                            s = this.getAbsolutePoint(n),
                            r = a(s, 2),
                            i = r[0],
                            o = r[1],
                            l = i,
                            u = o,
                            c = e - i,
                            d = t - o,
                            m = -2 * n[0] + 1,
                            p = -2 * n[1] + 1,
                            h = null,
                            _ = null;
                        switch (m) {
                            case -1:
                                h = l;
                                break;
                            case 0:
                                h = 2 * Math.min(l, c);
                                break;
                            case 1:
                                h = c
                        }
                        switch (p) {
                            case -1:
                                _ = u;
                                break;
                            case 0:
                                _ = 2 * Math.min(u, d);
                                break;
                            case 1:
                                _ = d
                        }
                        if (this.width() > h) {
                            var w = h / this.width();
                            this.scale(w, n)
                        }
                        if (this.height() > _) {
                            var f = _ / this.height();
                            this.scale(f, n)
                        }
                        return this
                    }
                }, {
                    key: "constrainToSize",
                    value: function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                            t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                            n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null,
                            s = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : null,
                            a = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : [0, 0],
                            r = arguments.length > 5 && void 0 !== arguments[5] ? arguments[5] : null;
                        if (r && (r > 1 ? (e = 1 * t / r, s *= r) : r < 1 && (t = e * r, n = 1 * s / r)), e && this.width() > e) {
                            var i = e,
                                o = null === r ? this.height() : t;
                            this.resize(i, o, a)
                        }
                        if (t && this.height() > t) {
                            var l = null === r ? this.width() : e,
                                u = t;
                            this.resize(l, u, a)
                        }
                        if (n && this.width() < n) {
                            var c = n,
                                d = null === r ? this.height() : s;
                            this.resize(c, d, a)
                        }
                        if (s && this.height() < s) {
                            var m = null === r ? this.width() : n,
                                p = s;
                            this.resize(m, p, a)
                        }
                        return this
                    }
                }]), n
            }();

        function o(e) {
            e.preventDefault();
            var t = e.changedTouches[0];
            t.target.dispatchEvent(new MouseEvent({
                touchstart: "mousedown",
                touchmove: "mousemove",
                touchend: "mouseup"
            } [e.type], {
                bubbles: !0,
                cancelable: !0,
                view: window,
                clientX: t.clientX,
                clientY: t.clientY,
                screenX: t.screenX,
                screenY: t.screenY
            }))
        }
        var l = [{
            position: [0, 0],
            constraints: [1, 0, 0, 1],
            cursor: "nw-resize"
        }, {
            position: [.5, 0],
            constraints: [1, 0, 0, 0],
            cursor: "n-resize"
        }, {
            position: [1, 0],
            constraints: [1, 1, 0, 0],
            cursor: "ne-resize"
        }, {
            position: [1, .5],
            constraints: [0, 1, 0, 0],
            cursor: "e-resize"
        }, {
            position: [1, 1],
            constraints: [0, 1, 1, 0],
            cursor: "se-resize"
        }, {
            position: [.5, 1],
            constraints: [0, 0, 1, 0],
            cursor: "s-resize"
        }, {
            position: [0, 1],
            constraints: [0, 0, 1, 1],
            cursor: "sw-resize"
        }, {
            position: [0, .5],
            constraints: [0, 0, 0, 1],
            cursor: "w-resize"
        }];

        function u(e, t) {
            return Number(Math.round(e + "e" + t) + "e-" + t)
        }
        return function(a) {
            function r(t, n) {
                var a = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                return e(this, r), s(this, (r.__proto__ || Object.getPrototypeOf(r)).call(this, t, n, a))
            }
            return function(e, t) {
                if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
                e.prototype = Object.create(t && t.prototype, {
                    constructor: {
                        value: e,
                        enumerable: !1,
                        writable: !0,
                        configurable: !0
                    }
                }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
            }(r, a), t(r, [{
                key: "getValue",
                value: function(e) {
                    return n(r.prototype.__proto__ || Object.getPrototypeOf(r.prototype), "getValue", this).call(this, e)
                }
            }, {
                key: "setImage",
                value: function(e) {
                    return n(r.prototype.__proto__ || Object.getPrototypeOf(r.prototype), "setImage", this).call(this, e)
                }
            }, {
                key: "destroy",
                value: function() {
                    return n(r.prototype.__proto__ || Object.getPrototypeOf(r.prototype), "destroy", this).call(this)
                }
            }, {
                key: "moveTo",
                value: function(e, t) {
                    return this.box.move(e, t), this.redraw(), null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue()), this
                }
            }, {
                key: "resizeTo",
                value: function(e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [.5, .5];
                    return this.box.resize(e, t, n), this.redraw(), null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue()), this
                }
            }, {
                key: "scaleBy",
                value: function(e) {
                    var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : [.5, .5];
                    return this.box.scale(e, t), this.redraw(), null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue()), this
                }
            }, {
                key: "reset",
                value: function() {
                    return this.box = this.initializeBox(this.options), this.redraw(), null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue()), this
                }
            }]), r
        }(function() {
            function n(t, s) {
                var a = this,
                    r = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                if (e(this, n), this.options = n.parseOptions(s || {}), !t.nodeName && null == (t = document.querySelector(t))) throw "Unable to find element.";
                if (!t.getAttribute("src")) throw "Image src not provided.";
                this._initialized = !1, this._restore = {
                    parent: t.parentNode,
                    element: t
                }, r || (0 === t.width || 0 === t.height ? t.onload = function() {
                    a.initialize(t)
                } : this.initialize(t))
            }
            return t(n, [{
                key: "initialize",
                value: function(e) {
                    this.createDOM(e), this.options.convertToPixels(this.cropperEl), this.attachHandlerEvents(), this.attachRegionEvents(), this.attachOverlayEvents(), this.box = this.initializeBox(this.options), this.redraw(), this._initialized = !0, null !== this.options.onInitialize && this.options.onInitialize(this)
                }
            }, {
                key: "createDOM",
                value: function(e) {
                    var t;
                    this.containerEl = document.createElement("div"), this.containerEl.className = "croppr-container", this.eventBus = this.containerEl, (t = this.containerEl).addEventListener("touchstart", o), t.addEventListener("touchend", o), t.addEventListener("touchmove", o), this.cropperEl = document.createElement("div"), this.cropperEl.className = "croppr", this.imageEl = document.createElement("img"), this.imageEl.setAttribute("src", e.getAttribute("src")), this.imageEl.setAttribute("alt", e.getAttribute("alt")), this.imageEl.className = "croppr-image", this.imageClippedEl = this.imageEl.cloneNode(), this.imageClippedEl.className = "croppr-imageClipped", this.regionEl = document.createElement("div"), this.regionEl.className = "croppr-region", this.overlayEl = document.createElement("div"), this.overlayEl.className = "croppr-overlay";
                    var n = document.createElement("div");
                    n.className = "croppr-handleContainer", this.handles = [];
                    for (var s = 0; s < l.length; s++) {
                        var a = new r(l[s].position, l[s].constraints, l[s].cursor, this.eventBus);
                        this.handles.push(a), n.appendChild(a.el)
                    }
                    this.cropperEl.appendChild(this.imageEl), this.cropperEl.appendChild(this.imageClippedEl), this.cropperEl.appendChild(this.regionEl), this.cropperEl.appendChild(this.overlayEl), this.cropperEl.appendChild(n), this.containerEl.appendChild(this.cropperEl), e.parentElement.replaceChild(this.containerEl, e)
                }
            }, {
                key: "setImage",
                value: function(e) {
                    var t = this;
                    return this.imageEl.onload = function() {
                        t.box = t.initializeBox(t.options), t.redraw()
                    }, this.imageEl.src = e, this.imageClippedEl.src = e, this
                }
            }, {
                key: "destroy",
                value: function() {
                    this._restore.parent.replaceChild(this._restore.element, this.containerEl)
                }
            }, {
                key: "initializeBox",
                value: function(e) {
                    var t = e.startSize.width,
                        n = e.startSize.height,
                        s = new i(0, 0, t, n);
                    s.constrainToRatio(e.aspectRatio, [.5, .5]);
                    var a = e.minSize,
                        r = e.maxSize;
                    s.constrainToSize(r.width, r.height, a.width, a.height, [.5, .5], e.aspectRatio);
                    var o = this.cropperEl.offsetWidth,
                        l = this.cropperEl.offsetHeight;
                    s.constrainToBoundary(o, l, [.5, .5]);
                    var u = this.cropperEl.offsetWidth / 2 - s.width() / 2,
                        c = this.cropperEl.offsetHeight / 2 - s.height() / 2;
                    return s.move(u, c), s
                }
            }, {
                key: "redraw",
                value: function() {
                    var e = this,
                        t = Math.round(this.box.width()),
                        n = Math.round(this.box.height()),
                        s = Math.round(this.box.x1),
                        a = Math.round(this.box.y1),
                        r = Math.round(this.box.x2),
                        i = Math.round(this.box.y2);
                    window.requestAnimationFrame((function() {
                        e.regionEl.style.transform = "translate(" + s + "px, " + a + "px)", e.regionEl.style.width = t + "px", e.regionEl.style.height = n + "px", e.imageClippedEl.style.clip = "rect(" + a + "px, " + r + "px, " + i + "px, " + s + "px)";
                        for (var o = e.box.getAbsolutePoint([.5, .5]), l = o[0] - e.cropperEl.offsetWidth / 2 >> 31, u = o[1] - e.cropperEl.offsetHeight / 2 >> 31, c = -2 * ((l ^ u) + u + u + 4) + 8, d = 0; d < e.handles.length; d++) {
                            var m = e.handles[d],
                                p = m.el.offsetWidth,
                                h = m.el.offsetHeight,
                                _ = s + t * m.position[0] - p / 2,
                                w = a + n * m.position[1] - h / 2;
                            m.el.style.transform = "translate(" + Math.round(_) + "px, " + Math.round(w) + "px)", m.el.style.zIndex = c == d ? 5 : 4
                        }
                    }))
                }
            }, {
                key: "attachHandlerEvents",
                value: function() {
                    var e = this.eventBus;
                    e.addEventListener("handlestart", this.onHandleMoveStart.bind(this)), e.addEventListener("handlemove", this.onHandleMoveMoving.bind(this)), e.addEventListener("handleend", this.onHandleMoveEnd.bind(this))
                }
            }, {
                key: "attachRegionEvents",
                value: function() {
                    var e = this.eventBus;

                    function t(t) {
                        t.stopPropagation(), e.dispatchEvent(new CustomEvent("regionmove", {
                            detail: {
                                mouseX: t.clientX,
                                mouseY: t.clientY
                            }
                        }))
                    }

                    function n(s) {
                        s.stopPropagation(), document.removeEventListener("mouseup", n), document.removeEventListener("mousemove", t), e.dispatchEvent(new CustomEvent("regionend", {
                            detail: {
                                mouseX: s.clientX,
                                mouseY: s.clientY
                            }
                        }))
                    }
                    this.regionEl.addEventListener("mousedown", (function(s) {
                        s.stopPropagation(), document.addEventListener("mouseup", n), document.addEventListener("mousemove", t), e.dispatchEvent(new CustomEvent("regionstart", {
                            detail: {
                                mouseX: s.clientX,
                                mouseY: s.clientY
                            }
                        }))
                    })), e.addEventListener("regionstart", this.onRegionMoveStart.bind(this)), e.addEventListener("regionmove", this.onRegionMoveMoving.bind(this)), e.addEventListener("regionend", this.onRegionMoveEnd.bind(this))
                }
            }, {
                key: "attachOverlayEvents",
                value: function() {
                    var e = this,
                        t = null;

                    function n(t) {
                        t.stopPropagation(), e.eventBus.dispatchEvent(new CustomEvent("handlemove", {
                            detail: {
                                mouseX: t.clientX,
                                mouseY: t.clientY
                            }
                        }))
                    }

                    function s(a) {
                        a.stopPropagation(), document.removeEventListener("mouseup", s), document.removeEventListener("mousemove", n), 1 !== e.box.width() || 1 !== e.box.height() ? e.eventBus.dispatchEvent(new CustomEvent("handleend", {
                            detail: {
                                mouseX: a.clientX,
                                mouseY: a.clientY
                            }
                        })) : e.box = t
                    }
                    this.overlayEl.addEventListener("mousedown", (function(a) {
                        a.stopPropagation(), document.addEventListener("mouseup", s), document.addEventListener("mousemove", n);
                        var r = e.cropperEl.getBoundingClientRect(),
                            o = a.clientX - r.left,
                            l = a.clientY - r.top;
                        t = e.box, e.box = new i(o, l, o + 1, l + 1), e.eventBus.dispatchEvent(new CustomEvent("handlestart", {
                            detail: {
                                handle: e.handles[4]
                            }
                        }))
                    }))
                }
            }, {
                key: "onHandleMoveStart",
                value: function(e) {
                    var t = e.detail.handle,
                        n = [1 - t.position[0], 1 - t.position[1]],
                        s = this.box.getAbsolutePoint(n),
                        r = a(s, 2),
                        i = r[0],
                        o = r[1];
                    this.activeHandle = {
                        handle: t,
                        originPoint: n,
                        originX: i,
                        originY: o
                    }, null !== this.options.onCropStart && this.options.onCropStart(this.getValue())
                }
            }, {
                key: "onHandleMoveMoving",
                value: function(e) {
                    var t = e.detail,
                        n = t.mouseX,
                        s = t.mouseY,
                        a = this.cropperEl.getBoundingClientRect();
                    n -= a.left, s -= a.top, n < 0 ? n = 0 : n > a.width && (n = a.width), s < 0 ? s = 0 : s > a.height && (s = a.height);
                    var r = this.activeHandle.originPoint.slice(),
                        o = this.activeHandle.originX,
                        l = this.activeHandle.originY,
                        u = this.activeHandle.handle,
                        c = 1 === u.constraints[0],
                        d = 1 === u.constraints[1],
                        m = 1 === u.constraints[2],
                        p = 1 === u.constraints[3],
                        h = (p || d) && (c || m),
                        _ = p || d ? o : this.box.x1,
                        w = p || d ? o : this.box.x2,
                        f = c || m ? l : this.box.y1,
                        v = c || m ? l : this.box.y2;
                    _ = p ? n : _, w = d ? n : w, f = c ? s : f, v = m ? s : v;
                    var g = !1,
                        y = !1;
                    if ((p || d) && (g = p ? n > o : n < o), (c || m) && (y = c ? s > l : s < l), g) {
                        var b = _;
                        _ = w, w = b, r[0] = 1 - r[0]
                    }
                    if (y) {
                        var k = f;
                        f = v, v = k, r[1] = 1 - r[1]
                    }
                    var x = new i(_, f, w, v);
                    if (this.options.aspectRatio) {
                        var q = this.options.aspectRatio,
                            S = !1;
                        h ? S = s > x.y1 + q * x.width() || s < x.y2 - q * x.width() : (c || m) && (S = !0);
                        var N = S ? "width" : "height";
                        x.constrainToRatio(q, r, N)
                    }
                    var O = this.options.minSize,
                        E = this.options.maxSize;
                    x.constrainToSize(E.width, E.height, O.width, O.height, r, this.options.aspectRatio);
                    var z = this.cropperEl.offsetWidth,
                        P = this.cropperEl.offsetHeight;
                    x.constrainToBoundary(z, P, r), this.box = x, this.redraw(), null !== this.options.onCropMove && this.options.onCropMove(this.getValue())
                }
            }, {
                key: "onHandleMoveEnd",
                value: function(e) {
                    null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue())
                }
            }, {
                key: "onRegionMoveStart",
                value: function(e) {
                    var t = e.detail,
                        n = t.mouseX,
                        s = t.mouseY,
                        a = this.cropperEl.getBoundingClientRect();
                    n -= a.left, s -= a.top, this.currentMove = {
                        offsetX: n - this.box.x1,
                        offsetY: s - this.box.y1
                    }, null !== this.options.onCropStart && this.options.onCropStart(this.getValue())
                }
            }, {
                key: "onRegionMoveMoving",
                value: function(e) {
                    var t = e.detail,
                        n = t.mouseX,
                        s = t.mouseY,
                        a = this.currentMove,
                        r = a.offsetX,
                        i = a.offsetY,
                        o = this.cropperEl.getBoundingClientRect();
                    n -= o.left, s -= o.top, this.box.move(n - r, s - i), this.box.x1 < 0 && this.box.move(0, null), this.box.x2 > o.width && this.box.move(o.width - this.box.width(), null), this.box.y1 < 0 && this.box.move(null, 0), this.box.y2 > o.height && this.box.move(null, o.height - this.box.height()), this.redraw(), null !== this.options.onCropMove && this.options.onCropMove(this.getValue())
                }
            }, {
                key: "onRegionMoveEnd",
                value: function(e) {
                    null !== this.options.onCropEnd && this.options.onCropEnd(this.getValue())
                }
            }, {
                key: "getValue",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
                    if (null === e && (e = this.options.returnMode), "real" == e) {
                        var t = this.imageEl.naturalWidth,
                            n = this.imageEl.naturalHeight,
                            s = this.imageEl.getBoundingClientRect(),
                            a = s.width,
                            r = s.height,
                            i = t / a,
                            o = n / r;
                        return {
                            x: Math.round(this.box.x1 * i),
                            y: Math.round(this.box.y1 * o),
                            width: Math.round(this.box.width() * i),
                            height: Math.round(this.box.height() * o)
                        }
                    }
                    if ("ratio" == e) {
                        var l = this.imageEl.getBoundingClientRect(),
                            c = l.width,
                            d = l.height;
                        return {
                            x: u(this.box.x1 / c, 3),
                            y: u(this.box.y1 / d, 3),
                            width: u(this.box.width() / c, 3),
                            height: u(this.box.height() / d, 3)
                        }
                    }
                    if ("raw" == e) return {
                        x: Math.round(this.box.x1),
                        y: Math.round(this.box.y1),
                        width: Math.round(this.box.width()),
                        height: Math.round(this.box.height())
                    }
                }
            }], [{
                key: "parseOptions",
                value: function(e) {
                    var t = null,
                        n = {
                            width: null,
                            height: null
                        },
                        s = {
                            width: null,
                            height: null
                        },
                        a = {
                            width: 100,
                            height: 100,
                            unit: "%"
                        },
                        r = "real",
                        i = null,
                        o = null,
                        l = null,
                        u = null,
                        c = null;
                    void 0 !== e.aspectRatio && ("number" == typeof e.aspectRatio ? c = e.aspectRatio : e.aspectRatio instanceof Array && (c = e.aspectRatio[1] / e.aspectRatio[0]));
                    var d = null;
                    void 0 !== e.maxSize && null !== e.maxSize && (d = {
                        width: e.maxSize[0] || null,
                        height: e.maxSize[1] || null,
                        unit: e.maxSize[2] || "px"
                    });
                    var m = null;
                    void 0 !== e.minSize && null !== e.minSize && (m = {
                        width: e.minSize[0] || null,
                        height: e.minSize[1] || null,
                        unit: e.minSize[2] || "px"
                    });
                    var p = null;
                    void 0 !== e.startSize && null !== e.startSize && (p = {
                        width: e.startSize[0] || null,
                        height: e.startSize[1] || null,
                        unit: e.startSize[2] || "%"
                    });
                    var h = null;
                    "function" == typeof e.onInitialize && (h = e.onInitialize);
                    var _ = null;
                    "function" == typeof e.onCropStart && (_ = e.onCropStart);
                    var w = null;
                    "function" == typeof e.onCropEnd && (w = e.onCropEnd);
                    var f = null;
                    "function" == typeof e.onUpdate && (console.warn("Croppr.js: `onUpdate` is deprecated and will be removed in the next major release. Please use `onCropMove` or `onCropEnd` instead."), f = e.onUpdate), "function" == typeof e.onCropMove && (f = e.onCropMove);
                    var v = null;
                    if (void 0 !== e.returnMode) {
                        var g = e.returnMode.toLowerCase();
                        if (-1 === ["real", "ratio", "raw"].indexOf(g)) throw "Invalid return mode.";
                        v = g
                    }
                    var y = function(e, t) {
                        return null !== e ? e : t
                    };
                    return {
                        aspectRatio: y(c, t),
                        maxSize: y(d, n),
                        minSize: y(m, s),
                        startSize: y(p, a),
                        returnMode: y(v, r),
                        onInitialize: y(h, i),
                        onCropStart: y(_, o),
                        onCropMove: y(f, l),
                        onCropEnd: y(w, u),
                        convertToPixels: function(e) {
                            for (var t = e.offsetWidth, n = e.offsetHeight, s = ["maxSize", "minSize", "startSize"], a = 0; a < s.length; a++) {
                                var r = s[a];
                                null !== this[r] && ("%" == this[r].unit && (null !== this[r].width && (this[r].width = this[r].width / 100 * t), null !== this[r].height && (this[r].height = this[r].height / 100 * n)), delete this[r].unit)
                            }
                        }
                    }
                }
            }]), n
        }())
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = n(0);
    Object.defineProperty(t, "AllSubstringsIndexStrategy", {
        enumerable: !0,
        get: function() {
            return s.AllSubstringsIndexStrategy
        }
    }), Object.defineProperty(t, "ExactWordIndexStrategy", {
        enumerable: !0,
        get: function() {
            return s.ExactWordIndexStrategy
        }
    }), Object.defineProperty(t, "PrefixIndexStrategy", {
        enumerable: !0,
        get: function() {
            return s.PrefixIndexStrategy
        }
    });
    var a = n(1);
    Object.defineProperty(t, "CaseSensitiveSanitizer", {
        enumerable: !0,
        get: function() {
            return a.CaseSensitiveSanitizer
        }
    }), Object.defineProperty(t, "LowerCaseSanitizer", {
        enumerable: !0,
        get: function() {
            return a.LowerCaseSanitizer
        }
    });
    var r = n(2);
    Object.defineProperty(t, "TfIdfSearchIndex", {
        enumerable: !0,
        get: function() {
            return r.TfIdfSearchIndex
        }
    }), Object.defineProperty(t, "UnorderedSearchIndex", {
        enumerable: !0,
        get: function() {
            return r.UnorderedSearchIndex
        }
    });
    var i = n(4);
    Object.defineProperty(t, "SimpleTokenizer", {
        enumerable: !0,
        get: function() {
            return i.SimpleTokenizer
        }
    }), Object.defineProperty(t, "StemmingTokenizer", {
        enumerable: !0,
        get: function() {
            return i.StemmingTokenizer
        }
    }), Object.defineProperty(t, "StopWordsTokenizer", {
        enumerable: !0,
        get: function() {
            return i.StopWordsTokenizer
        }
    });
    var o = n(18);
    Object.defineProperty(t, "Search", {
        enumerable: !0,
        get: function() {
            return o.Search
        }
    });
    var l = n(5);
    Object.defineProperty(t, "StopWordsMap", {
        enumerable: !0,
        get: function() {
            return l.StopWordsMap
        }
    });
    var u = n(19);
    Object.defineProperty(t, "TokenHighlighter", {
        enumerable: !0,
        get: function() {
            return u.TokenHighlighter
        }
    })
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.AllSubstringsIndexStrategy = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "expandToken",
            value: function(e) {
                for (var t, n = [], s = 0, a = e.length; s < a; ++s) {
                    t = "";
                    for (var r = s; r < a; ++r) t += e.charAt(r), n.push(t)
                }
                return n
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.ExactWordIndexStrategy = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "expandToken",
            value: function(e) {
                return e ? [e] : []
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.PrefixIndexStrategy = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "expandToken",
            value: function(e) {
                for (var t = [], n = "", s = 0, a = e.length; s < a; ++s) n += e.charAt(s), t.push(n);
                return t
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.CaseSensitiveSanitizer = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "sanitize",
            value: function(e) {
                return e ? e.trim() : ""
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.LowerCaseSanitizer = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "sanitize",
            value: function(e) {
                return e ? e.toLocaleLowerCase().trim() : ""
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.TfIdfSearchIndex = void 0;
    var s, a = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        },
        r = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var s = t[n];
                    s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                }
            }
            return function(t, n, s) {
                return n && e(t.prototype, n), s && e(t, s), t
            }
        }(),
        i = n(3),
        o = (s = i) && s.__esModule ? s : {
            default: s
        };
    t.TfIdfSearchIndex = function() {
        function e(t) {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._uidFieldName = t, this._tokenToIdfCache = {}, this._tokenMap = {}
        }
        return r(e, [{
            key: "indexDocument",
            value: function(e, t, n) {
                this._tokenToIdfCache = {};
                var s, r = this._tokenMap;
                "object" !== a(r[e]) ? r[e] = s = {
                    $numDocumentOccurrences: 0,
                    $totalNumOccurrences: 1,
                    $uidMap: {}
                } : (s = r[e]).$totalNumOccurrences++;
                var i = s.$uidMap;
                "object" !== a(i[t]) ? (s.$numDocumentOccurrences++, i[t] = {
                    $document: n,
                    $numTokenOccurrences: 1
                }) : i[t].$numTokenOccurrences++
            }
        }, {
            key: "search",
            value: function(e, t) {
                for (var n = {}, s = 0, r = e.length; s < r; s++) {
                    var i = e[s],
                        o = this._tokenMap[i];
                    if (!o) return [];
                    if (0 === s)
                        for (var l = 0, u = (c = Object.keys(o.$uidMap)).length; l < u; l++) {
                            n[d = c[l]] = o.$uidMap[d].$document
                        } else {
                            var c;
                            for (l = 0, u = (c = Object.keys(n)).length; l < u; l++) {
                                var d = c[l];
                                "object" !== a(o.$uidMap[d]) && delete n[d]
                            }
                        }
                }
                var m = [];
                for (var d in n) m.push(n[d]);
                var p = this._createCalculateTfIdf();
                return m.sort((function(n, s) {
                    return p(e, s, t) - p(e, n, t)
                }))
            }
        }, {
            key: "_createCalculateIdf",
            value: function() {
                var e = this._tokenMap,
                    t = this._tokenToIdfCache;
                return function(n, s) {
                    if (!t[n]) {
                        var a = void 0 !== e[n] ? e[n].$numDocumentOccurrences : 0;
                        t[n] = 1 + Math.log(s.length / (1 + a))
                    }
                    return t[n]
                }
            }
        }, {
            key: "_createCalculateTfIdf",
            value: function() {
                var e = this._tokenMap,
                    t = this._uidFieldName,
                    n = this._createCalculateIdf();
                return function(s, a, r) {
                    for (var i = 0, l = 0, u = s.length; l < u; ++l) {
                        var c, d = s[l],
                            m = n(d, r);
                        m === 1 / 0 && (m = 0), c = t instanceof Array ? a && (0, o.default)(a, t) : a && a[t], i += (void 0 !== e[d] && void 0 !== e[d].$uidMap[c] ? e[d].$uidMap[c].$numTokenOccurrences : 0) * m
                    }
                    return i
                }
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        },
        a = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var s = t[n];
                    s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                }
            }
            return function(t, n, s) {
                return n && e(t.prototype, n), s && e(t, s), t
            }
        }();
    t.UnorderedSearchIndex = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._tokenToUidToDocumentMap = {}
        }
        return a(e, [{
            key: "indexDocument",
            value: function(e, t, n) {
                "object" !== s(this._tokenToUidToDocumentMap[e]) && (this._tokenToUidToDocumentMap[e] = {}), this._tokenToUidToDocumentMap[e][t] = n
            }
        }, {
            key: "search",
            value: function(e, t) {
                for (var n = {}, a = this._tokenToUidToDocumentMap, r = 0, i = e.length; r < i; r++) {
                    var o = a[e[r]];
                    if (!o) return [];
                    if (0 === r)
                        for (var l = 0, u = (d = Object.keys(o)).length; l < u; l++) {
                            n[c = d[l]] = o[c]
                        } else
                            for (l = 0, u = (d = Object.keys(n)).length; l < u; l++) {
                                var c = d[l];
                                "object" !== s(o[c]) && delete n[c]
                            }
                }
                var d, m = [];
                for (r = 0, u = (d = Object.keys(n)).length; r < u; r++) {
                    c = d[r];
                    m.push(n[c])
                }
                return m
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    var a = /[^a-zÐ°-ÑÑ‘0-9\-']+/i;
    t.SimpleTokenizer = function() {
        function e() {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e)
        }
        return s(e, [{
            key: "tokenize",
            value: function(e) {
                return e.split(a).filter((function(e) {
                    return e
                }))
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    var s = function() {
        function e(e, t) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n];
                s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
            }
        }
        return function(t, n, s) {
            return n && e(t.prototype, n), s && e(t, s), t
        }
    }();
    t.StemmingTokenizer = function() {
        function e(t, n) {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._stemmingFunction = t, this._tokenizer = n
        }
        return s(e, [{
            key: "tokenize",
            value: function(e) {
                return this._tokenizer.tokenize(e).map(this._stemmingFunction)
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.StopWordsTokenizer = void 0;
    var s = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var s = t[n];
                    s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                }
            }
            return function(t, n, s) {
                return n && e(t.prototype, n), s && e(t, s), t
            }
        }(),
        a = n(5);
    t.StopWordsTokenizer = function() {
        function e(t) {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._tokenizer = t
        }
        return s(e, [{
            key: "tokenize",
            value: function(e) {
                return this._tokenizer.tokenize(e).filter((function(e) {
                    return !a.StopWordsMap[e]
                }))
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.Search = void 0;
    var s, a = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var s = t[n];
                    s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                }
            }
            return function(t, n, s) {
                return n && e(t.prototype, n), s && e(t, s), t
            }
        }(),
        r = n(3),
        i = (s = r) && s.__esModule ? s : {
            default: s
        },
        o = n(0),
        l = n(1),
        u = n(2),
        c = n(4);
    t.Search = function() {
        function e(t) {
            if (function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                }(this, e), !t) throw Error("js-search requires a uid field name constructor parameter");
            this._uidFieldName = t, this._indexStrategy = new o.PrefixIndexStrategy, this._searchIndex = new u.TfIdfSearchIndex(t), this._sanitizer = new l.LowerCaseSanitizer, this._tokenizer = new c.SimpleTokenizer, this._documents = [], this._searchableFields = []
        }
        return a(e, [{
            key: "addDocument",
            value: function(e) {
                this.addDocuments([e])
            }
        }, {
            key: "addDocuments",
            value: function(e) {
                this._documents = this._documents.concat(e), this.indexDocuments_(e, this._searchableFields)
            }
        }, {
            key: "addIndex",
            value: function(e) {
                this._searchableFields.push(e), this.indexDocuments_(this._documents, [e])
            }
        }, {
            key: "search",
            value: function(e) {
                var t = this._tokenizer.tokenize(this._sanitizer.sanitize(e));
                return this._searchIndex.search(t, this._documents)
            }
        }, {
            key: "indexDocuments_",
            value: function(e, t) {
                this._initialized = !0;
                for (var n = this._indexStrategy, s = this._sanitizer, a = this._searchIndex, r = this._tokenizer, o = this._uidFieldName, l = 0, u = e.length; l < u; l++) {
                    var c, d = e[l];
                    c = o instanceof Array ? (0, i.default)(d, o) : d[o];
                    for (var m = 0, p = t.length; m < p; m++) {
                        var h, _ = t[m];
                        if (null != (h = _ instanceof Array ? (0, i.default)(d, _) : d[_]) && "string" != typeof h && h.toString && (h = h.toString()), "string" == typeof h)
                            for (var w = r.tokenize(s.sanitize(h)), f = 0, v = w.length; f < v; f++)
                                for (var g = w[f], y = n.expandToken(g), b = 0, k = y.length; b < k; b++) {
                                    var x = y[b];
                                    a.indexDocument(x, c, d)
                                }
                    }
                }
            }
        }, {
            key: "indexStrategy",
            set: function(e) {
                if (this._initialized) throw Error("IIndexStrategy cannot be set after initialization");
                this._indexStrategy = e
            },
            get: function() {
                return this._indexStrategy
            }
        }, {
            key: "sanitizer",
            set: function(e) {
                if (this._initialized) throw Error("ISanitizer cannot be set after initialization");
                this._sanitizer = e
            },
            get: function() {
                return this._sanitizer
            }
        }, {
            key: "searchIndex",
            set: function(e) {
                if (this._initialized) throw Error("ISearchIndex cannot be set after initialization");
                this._searchIndex = e
            },
            get: function() {
                return this._searchIndex
            }
        }, {
            key: "tokenizer",
            set: function(e) {
                if (this._initialized) throw Error("ITokenizer cannot be set after initialization");
                this._tokenizer = e
            },
            get: function() {
                return this._tokenizer
            }
        }]), e
    }()
}, function(e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    }), t.TokenHighlighter = void 0;
    var s = function() {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var s = t[n];
                    s.enumerable = s.enumerable || !1, s.configurable = !0, "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s)
                }
            }
            return function(t, n, s) {
                return n && e(t.prototype, n), s && e(t, s), t
            }
        }(),
        a = n(0),
        r = n(1);
    t.TokenHighlighter = function() {
        function e(t, n, s) {
            ! function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), this._indexStrategy = t || new a.PrefixIndexStrategy, this._sanitizer = n || new r.LowerCaseSanitizer, this._wrapperTagName = s || "mark"
        }
        return s(e, [{
            key: "highlight",
            value: function(e, t) {
                for (var n = this._wrapText("").length, s = Object.create(null), a = 0, r = t.length; a < r; a++)
                    for (var i = this._sanitizer.sanitize(t[a]), o = this._indexStrategy.expandToken(i), l = 0, u = o.length; l < u; l++) {
                        var c = o[l];
                        s[c] ? s[c].push(i) : s[c] = [i]
                    }
                for (var d = "", m = "", p = 0, h = (a = 0, e.length); a < h; a++) {
                    var _ = e.charAt(a);
                    " " === _ ? (d = "", m = "", p = a + 1) : (d += _, m += this._sanitizer.sanitize(_)), s[m] && s[m].indexOf(m) >= 0 && (d = this._wrapText(d), e = e.substring(0, p) + d + e.substring(a + 1), a += n, h += n)
                }
                return e
            }
        }, {
            key: "_wrapText",
            value: function(e) {
                var t = this._wrapperTagName;
                return "<" + t + ">" + e + "</" + t + ">"
            }
        }]), e
    }()
}, function(e, t, n) {}, function(e, t, n) {
    "use strict";
    n.r(t);
    const {
        createElement: s,
        render: a,
        useState: r,
        useEffect: i,
        Fragment: o
    } = wp.element, {
        select: l,
        dispatch: u
    } = wp.data;
    var c = e => {
        const [t, n] = r(!1), [a, u] = r(!1), c = l("vibebp").getToken();
        i(() => {
            n(!0)
        }, [e]);
        return s(o, null, t ? s("div", {
            className: "popup_wrapper",
            onClick: e => {
                e.preventDefault(), document.querySelector(".popup_wrapper") && e.target === document.querySelector(".popup_wrapper") && n(!1)
            }
        }, s("div", {
            className: "popup_content"
        }, s("span", {
            className: "vicon vicon-close",
            onClick: () => {
                n(!1)
            }
        }), s("h3", null, window.wplms_course_data.translations.apply_to_course), s("div", {
            className: "popup-footer"
        }, s("a", {
            className: "button is-primary",
            onClick: () => {
                u(!0), fetch(window.wplms_course_data.api_url + "/student/courseButton/applycourse", {
                    method: "post",
                    body: JSON.stringify({
                        id: e.id,
                        token: c
                    })
                }).then(e => e.json()).then(t => {
                    if (t.status) {
                        n(!1), u(!1);
                        var s = new CustomEvent("wplms_popup_applied", {
                            detail: {
                                course: e.id,
                                text: t.message
                            }
                        });
                        document.dispatchEvent(s)
                    }
                })
            }
        }, window.wplms_course_data.translations.yes), s("a", {
            className: "button is-primary",
            onClick: () => {
                n(!1)
            }
        }, window.wplms_course_data.translations.cancel)))) : "")
    };
    const {
        createElement: d,
        render: m
    } = wp.element;
    var p = e => d("div", {
        class: "lds-ellipsis"
    }, d("div", null), d("div", null), d("div", null), d("div", null));
    const {
        createElement: h,
        useState: _,
        useEffect: w,
        Fragment: f,
        render: v
    } = wp.element;
    var g = ({
        progress: e,
        size: t
    }) => {
        let n, s;
        switch (t) {
            case "xs":
                n = 10, s = 1;
                break;
            case "sm":
                n = 25, s = 2.5;
                break;
            case "med":
                n = 50, s = 5;
                break;
            case "lg":
                n = 75, s = 7.5;
                break;
            case "xl":
                n = 100, s = 10;
                break;
            default:
                n = 50, s = 5
        }
        const a = n - 2 * s,
            r = 2 * a * Math.PI,
            i = r - e / 100 * r;
        return h("div", {
            className: "react-progress-circle"
        }, h("svg", {
            height: 2 * n,
            width: 2 * n
        }, h("circle", {
            className: "ReactProgressCircle_circleBackground",
            strokeWidth: s,
            style: {
                strokeDashoffset: i
            },
            r: a,
            cx: n,
            cy: n
        }), h("circle", {
            className: "ReactProgressCircle_circle",
            strokeWidth: s,
            strokeDasharray: r + " " + r,
            style: {
                strokeDashoffset: i
            },
            r: a,
            cx: n,
            cy: n
        })))
    };
    const {
        createContext: y
    } = wp.element;
    var b = y({
        courseStatus: {},
        current_unit_key: 0,
        update: e => {}
    });
    const {
        createElement: k,
        useState: x,
        useEffect: q,
        Fragment: S,
        render: N,
        useContext: O
    } = wp.element, {
        dispatch: E,
        select: z
    } = wp.data;
    var P = e => {
        const t = O(b),
            [n, s] = x([]),
            [a, r] = x(0);
        q(() => {
            if (Array.isArray(t.courseStatus.courseitems) && t.courseStatus.courseitems.length) {
                let e = [...t.courseStatus.courseitems];
                e = t.courseStatus && t.courseStatus.filtered_items && t.courseStatus.filtered_items.length ? t.courseStatus.filtered_items : t.courseStatus.courseitems;
                let n = -1;
                e.map((e, s) => {
                    "section" == e.type ? n = s : n > -1 && t.current_unit_key == s && r(n)
                }), n < 0 && r(n), s(e)
            }
        }, [t.courseStatus.courseitems, t.current_unit_key, t.courseStatus.filtered_items]), q(() => {
            if (Array.isArray(t.courseStatus.courseitems) && t.courseStatus.courseitems.length) {
                let e = -1,
                    n = [...t.courseStatus.courseitems];
                n.map((s, a) => {
                    "section" == s.type ? (e = a, n[e].lesson_count = 0, n[e].duration = 0) : e > -1 && (n[e].duration = parseInt(n[e].duration) + parseInt(s.duration), n[e].lesson_count++, n[a].section = e, t.current_unit_key == a && r(e))
                }), e < 0 && r(e), s(n)
            }
        }, [t.courseStatus.courseitems]);
        let i = -1;
        return k(S, null, n ? k("ul", null, n.map((e, s) => {
            let o = Math.round(e.duration / 60);
            "section" == e.type && (i = s);
            let l = e.type + " " + (e.status ? "done" : "") + " " + (t.current_unit_key == s ? "active" : "") + " ";
            return "section" != e.type && a > -1 && (l += a === i ? " open_lesson" : " collapsed_lesson"), k("li", {
                className: l
            }, k("p", {
                onClick: () => {
                    ((e, n) => {
                        "section" == e.type ? r(n) : 0 != e.id && (document.querySelector(".course_status").scrollTo({
                            top: 0,
                            left: 0,
                            behavior: "smooth"
                        }), t.update({
                            index: n
                        }, "loadunit")) ,
                        setTimeout(function(){
                            if(window.innerWidth < 768){
                                jQuery(".course_content").insertAfter(".open_lesson.active");
                            }
                        },1000);
                    })(e, e.key)
                }
            }, e.icon && e.icon.length > 200 ? k("span", {
                dangerouslySetInnerHTML: {
                    __html: e.icon
                }
            }) : e.type == 'quiz' && e.icon_type == 1 ? k("img", {
                src: e.icon
            }) : e.type == 'quiz' && e.icon_type == 0 ?
            k("span", {
                className: e.icon
            }) : k("span", {
                className: e.icon
            }),k("span", {
                className: "lesson_title",
                dangerouslySetInnerHTML: {
                    __html: e.title
                }
            }), "section" == e.type ? k("span", {
                className: "lesson_infolist"
            }, null, k("span", {
                className: "lesson_count"
            }, e.lesson_count + " " + window.wplms_course_data.translations.lesson_count), k("span", {
                className: "lesson_duration"
            }, o < 180 ? o + " " + window.wplms_course_data.time_labels.minute.symbol : o > 999 ? k("span", {
                className: "vicon vicon-infinite"
            }) : Math.round(o / 60) + " " + window.wplms_course_data.time_labels.hour.symbol)) : k("span", {
                className: "lesson_duration"
            }, o >= 9999 ? k("i", {
                className: "vicon vicon-infinite"
            }) : o < 180 ? o + " " + window.wplms_course_data.time_labels.minute.symbol : Math.round(o / 60) + " " + window.wplms_course_data.time_labels.hour.symbol)), "section" == e.type ? k("i", s === a ? {
                className: "vicon vicon-minus",
                onClick: () => r(!1)
            } : {
                className: "vicon vicon-plus",
                onClick: () => r(s)
            }) : "", "section" != e.type ? "unit" === e.type ? k("div", {
                className: "unit_progress_wrapper",
                onClick: () => {
                    ((e, n) => {
                        0 == e.id || t.courseStatus.lock || e.status || t.courseStatus.unit_media_lock && (e.meta.hasOwnProperty("video") && Array.isArray(e.meta.video) && e.meta.video.length || "video" == e.unit_type) || t.update({
                            index: n
                        }, "directmarkcomplete")
                    })(e, s)
                }
            }, t.courseStatus.hasOwnProperty("lock") && t.courseStatus.lock && !t.courseStatus.courseitems[s].status && s != t.current_unit_key ? k("span", {
                className: "icon_lock"
            }) : k(g, {
                progress: n[s] && "unit" == n[s].type && n[s].hasOwnProperty("progressbar") ? n[s].progressbar : 0,
                size: "xs"
            })) : k("div", {
                className: "unit_progress_wrapper"
            }, t.courseStatus.hasOwnProperty("lock") && t.courseStatus.lock && !t.courseStatus.courseitems[s].status && s != t.current_unit_key ? k("span", {
                className: "icon_lock"
            }) : k(g, {
                progress: 100,
                size: "xs"
            })) : "")
        })) : k("div", {
            class: "message"
        }, window.wplms_course_data.translations.no_content_found))
    };
    const {
        Component: C,
        createElement: M,
        render: I,
        useState: T,
        useEffect: L,
        Fragment: j
    } = wp.element;
    var A = e => {
        const [t, n] = T(e.duration), [s, a] = T({
            d: 0,
            h: 0,
            m: 0,
            s: 0
        });
        L(() => {
            if (e.start) {
                setTimeout(() => {
                    let s = t - 1;
                    s <= -1 ? e.update(e.quiz_id, "expired") : s >= 0 && (n(s), r())
                }, 1e3)
            } else n(e.duration), r()
        }, [t, e.start, e.duration]);
        const r = () => {
            let e = {
                    ...s
                },
                n = t;
            n > 86400 ? (e.d = Math.floor(n / 86400), n -= 86400 * e.d) : e.d = 0, n > 3600 ? (e.h = Math.floor(n / 3600), n -= 3600 * e.h) : e.h = 0, n > 60 ? (e.m = Math.floor(n / 60), n -= 60 * e.m) : e.m = 0, e.s = n, a(e)
        };
        let i = 0;
        return t > -1 && (i = Math.floor((e.duration - t) / e.duration * 100), i <= 0 && (i = 1)), M("div", {
            className: "quiztimer"
        }, M("div", {
            className: "circle_timer"
        }, i ? M(g, {
            size: window.innerWidth < 480 ? "xs" : "sm",
            progress: i
        }) : "", M("span", null, M("div", {
            className: "timer_amount"
        }, s.d ? M(j, null, M("span", null, s.d), M("span",{
            className: "colon"
        }, null, ":")) : "", s.h ? M(j, null, M("span", null, s.h), M("span",{
            className: "colon"
        }, null, ":")) : "", s.m ? M(j, null, M("span", null, s.m), M("span",{
            className: "colon"
        }, null, ":")) : "", M("span", null, s.s)), M("div", {
            className: "timer_unit"
        }, s.d ? M(j, null, M("span", null, 'Days'), M("span",{
            className: "colon blur"
        }, null, ":")) : "", s.h ? M(j, null, M("span", null, "Hrs"), M("span",{
            className: "colon blur"
        }, null, ":")) : "", s.m ? M(j, null, M("span", null, 'Min'), M("span",{
            className: "colon blur"
        }, null, ":")) : "", M("span", null, 'Sec')))))
    };
    const {
        createElement: D,
        render: H,
        useState: F,
        useEffect: B,
        Fragment: R
    } = wp.element;
    var $ = e => {
        const [t, n] = F({});
        B(() => {
            n(e.question)
        }, [e.question]);
        let s = "";
        t.hasOwnProperty("marked_answer") && (s = t.marked_answer);
        let a = "";
        return t.hasOwnProperty("usercorrect") && t.show_correct_answer && (a = "question_incorrect", t.usercorrect > 0 && (a = "question_correct")), D(R, null, D("div", {
            className: "question_content",
            dangerouslySetInnerHTML: {
                __html: t && t.content ? t.content : ""
            }
        }),  J("div", {className: "question_list"},D("input", {
            type: "text",
            className: a,
            value: s,
            onChange: t => {
                let s = {
                    ...e.question
                };
                s.marked_answer = t.target.value, n(s), e.update(s, e.index, "changed")
            }
        })))
    };
    const {
        createElement: J,
        render: W,
        useState: U,
        useEffect: Y,
        Fragment: X
    } = wp.element;
    var V = e => {
        const [t, n] = U({}), [s, a] = U([]);
        Y(() => {
            if (n(e.question), e.question.hasOwnProperty("options") && e.question.options.length && Array.isArray(e.question.options)) {
                let t = [...e.question.options];
                window.wplms_course_data.question_option_rearrange && r(t), a(t)
            }
        }, [e.question.correct_indexes]);
        const r = e => {
            for (var t = e.length - 1; t > 0; t--) {
                var n = Math.floor(Math.random() * (t + 1)),
                    s = e[t];
                e[t] = e[n], e[n] = s
            }
        };
        let i = "";
        return t.hasOwnProperty("marked_answer") && (i = t.marked_answer), J(X, null, J("div", {
            className: "question_content",
            dangerouslySetInnerHTML: {
                __html: t && t.content ? t.content : ""
            }
        }), J("ul", {className: "question_list"},t.options && t.options.length ? J(X, null, (t => s.map((function(s, a) {
            let r = t.options.findIndex(e => e == s);
            return J("li", {
                className: "question_option radio " + (t.show_correct_answer && t.correct_indexes ? t.correct_indexes && t.correct_indexes.length && t.correct_indexes.includes(r) ? "question_correct" : "question_incorrect" : "") + (parseInt(t.marked_answer) === r ? ' checked_option' : '')
            }, J("input", {
                type: "radio",
                name: e.quiz_id + "_" + t.id,
                value: r,
                id: e.quiz_id + "_" + t.id + r,
                checked: parseInt(t.marked_answer) === r,
                onChange: t => {
                    let s = {
                        ...e.question
                    };
                    s.marked_answer = t.target.value, n(s), e.update(s, e.index, "changed")
                }
            }), J("label", {
                for: e.quiz_id + "_" + t.id + r,
                dangerouslySetInnerHTML: {
                    __html: s
                }
            }))
        })))(t), t.attempted ? "" : J("span", {
            className: "resetq_answer button",
            onClick: t => {
                let s = {
                    ...e.question
                };
                s.marked_answer = null, n(s), e.update(s, e.index, "changed")
            }
        }, J("i", {
            class: "vicon vicon-trash"
        }))) : ""))
    };
    const {
        createElement: Q,
        render: K,
        useState: G,
        useEffect: Z,
        Fragment: ee
    } = wp.element;
    var te = e => {
        const [t, n] = G({});
        Z(() => {
            n(e.question)
        }, [e.question]);
        const s = (t, s) => {
                let a = {
                    ...e.question
                };
                a.marked_answer && a.marked_answer.length || (a.marked_answer = []), a.marked_answer[s] = t, n(a), e.update(a, e.index, "changed")
            },
            a = (t, n) => Q(ee, null, Q("span", {
                className: t.show_correct_answer && t.correct_indexes ? t.correct_indexes && t.correct_indexes.length && t.correct_indexes.includes(n) ? "question_correct" : "question_incorrect" : ""
            }, Q("select", {
                name: e.quiz_id + "_" + t.id,
                id: e.quiz_id + "_" + t.id,
                onChange: e => {
                    s(e.target.value, n)
                }
            }, Q("option", null, window.wplms_course_data.translations.select_option), ((e, t) => e.options.map((function(n, s) {
                return e.hasOwnProperty("options_arr") && e.options_arr && e.options_arr.length && e.options_arr[t] && e.options_arr[t].length ? e.options_arr[t].includes((s + 1).toString()) || e.options_arr[t].includes(s + 1) ? Q("option", {
                    value: s,
                    selected: e.marked_answer && e.marked_answer.length && e.marked_answer[t] && parseInt(e.marked_answer[t]) === s,
                    dangerouslySetInnerHTML: {
                        __html: n
                    }
                }) : void 0 : Q("option", {
                    value: s,
                    selected: e.marked_answer && e.marked_answer.length && e.marked_answer[t] && parseInt(e.marked_answer[t]) === s,
                    dangerouslySetInnerHTML: {
                        __html: n
                    }
                })
            })))(t, n))), t.attempted ? "" : Q("span", {
                className: "resetq_answer button",
                onClick: e => {
                    s(null, n)
                }
            }, Q("i", {
                class: "vicon vicon-trash"
            })));
        return Q(ee, null, t && t.extra_content && Array.isArray(t.extra_content) ? Q("div", {
            className: "question_content"
        }, t.extra_content.map((function(e, n) {
            return Q(ee, null, Q("span", {
                className: "select_question_content",
                dangerouslySetInnerHTML: {
                    __html: e
                }
            }), t.options && t.options.length && n < t.extra_content.length - 1 ? Q(ee, null, a(t, n)) : "")
        }))) : "")
    };
    const {
        createElement: ne,
        render: se,
        useState: ae,
        useEffect: re,
        Fragment: ie
    } = wp.element;
    var oe = e => {
        const [t, n] = ae({}), [s, a] = ae([]);
        "undefined" != e.question.marked_answer && null != e.question.marked_answer || (e.question.marked_answer = []), re(() => {
            if (n(e.question), e.question.hasOwnProperty("options") && e.question.options.length && Array.isArray(e.question.options)) {
                let t = [...e.question.options];
                window.wplms_course_data.question_option_rearrange && r(t), a(t)
            }
        }, [e.question.correct_indexes]);
        const r = e => {
            for (var t = e.length - 1; t > 0; t--) {
                var n = Math.floor(Math.random() * (t + 1)),
                    s = e[t];
                e[t] = e[n], e[n] = s
            }
        };
        return ne(ie, null, ne("div", {
            className: "question_content",
            dangerouslySetInnerHTML: {
                __html: t && t.content ? t.content : ""
            }
        }),ne(ie, null, ne("ul", {
            className: "question_list",
        }, t.options && t.options.length ? ne(ie, null, (t => {
            if (s && s.length) return s.map((function(s, a) {
                let r = t.options.findIndex(e => e == s);
                return ne("li", {
                    className: "question_option checkbox " + (t.show_correct_answer && t.correct_indexes ? t.correct_indexes && t.correct_indexes.length && t.correct_indexes.includes(r) ? "question_correct" : "question_incorrect" : "") + (e.question.marked_answer && e.question.marked_answer.length && e.question.marked_answer.includes(r) ? ' checked_option' : '')
                }, ne("input", {
                    type: "checkbox",
                    name: e.quiz_id + "_" + t.id,
                    value: r,
                    id: e.quiz_id + "_" + t.id + r,
                    checked: e.question.marked_answer && e.question.marked_answer.length && e.question.marked_answer.includes(r),
                    onChange: t => {
                        let s = {
                            ...e.question
                        };
                        if (s.marked_answer.includes(r)) {
                            let e = s.marked_answer.indexOf(r);
                            e > -1 && s.marked_answer.splice(e, 1)
                        } else s.marked_answer.push(r);
                        n(s), e.update(s, e.index, "changed")
                    }
                }), ne("label", {
                    for: e.quiz_id + "_" + t.id + r,
                    dangerouslySetInnerHTML: {
                        __html: s
                    }
                }))
            }))
        })(t), t.attempted ? "" : ne("span", {
            className: "resetq_answer button",
            onClick: t => {
                let s = {
                    ...e.question
                };
                s.marked_answer = null, n(s), e.update(s, e.index, "changed")
            }
        }, ne("i", {
            class: "vicon vicon-trash"
        }))) : "")))
    };
    const {
        createElement: le,
        render: ue,
        useState: ce,
        useEffect: de,
        Fragment: me
    } = wp.element;
    var pe = e => {
        const [t, n] = ce("120"), [s, a] = ce(() => {
            let t = "";
            return e.marked_answer && e.marked_answer.length && (t = e.marked_answer[e.index]), t
        });
        de(() => {
            s.length > 15 && n(8 * s.length)
        }, [s]);
        let r = "";
        s && (r = s);
        return le(me, null, le("div", {
            className: "fillblank_area"
        }, le("input", {
            type: "text",
            value: r,
            onChange: t => {
                let n = s;
                n = t.target.value, a(n), e.update(n, e.index, "changed")
            },
            style: {
                width: t + "px"
            }
        })))
    };
    const {
        createElement: he,
        render: _e,
        useState: we,
        useEffect: fe,
        Fragment: ve
    } = wp.element;
    var ge = e => {
        const [t, n] = we({});
        fe(() => {
            n(e.question)
        }, []);
        let s = "";
        t.hasOwnProperty("marked_answer") && (s = t.marked_answer);
        const a = (s, a, r) => {
            if ("changed" == r) {
                let r = {
                    ...t
                };
                r.marked_answer && t.marked_answer.length || (r.marked_answer = []), r.marked_answer[a] = s, n(r), e.update(r, e.index, "changed")
            }
        };
        return he(ve, null, t && t.extra_content && Array.isArray(t.extra_content) ? he("div", {
            className: "question_content"
        }, t.extra_content.map((function(e, n) {
            return he(ve, null, he("span", {
                className: "select_question_content",
                dangerouslySetInnerHTML: {
                    __html: e
                }
            }), n < t.extra_content.length - 1 ? he("div", {
                className: "fillblank_area " + (t.show_correct_answer && t.correct_indexes ? t.correct_indexes && t.correct_indexes.length && t.correct_indexes.includes(n) ? "question_correct" : "question_incorrect" : "")
            }, he(pe, {
                update: a,
                index: n,
                marked_answer: t.marked_answer
            })) : "")
        }))) : "")
    };
    const {
        createElement: ye,
        render: be,
        useState: ke,
        useEffect: xe,
        Fragment: qe
    } = wp.element;
    var Se = e => {
        const [t, n] = ke([]), [s, a] = ke(!1), [r, i] = ke([]), [o, l] = ke([]), [u, c] = ke([]), [d, m] = ke([]);
        xe(() => {
            i(e.items)
        }, [e.items]);
        let p = "droppable";
        s && (p += " active");
        const h = e => {
            let t = "";
            return s === r[e] && (t = "dragging"), t
        };
        return ye("div", {
            className: p
        }, r.map((p, _) => ye("div", {
            key: _,
            onDragStart: e => {
                r[_] && a(r[_])
            },
            onDragEnd: () => {
                a(!1)
            },
            onDragOver: t => {
                t.preventDefault(), ((t, n) => {
                    if (!s) return;
                    let a = r[n];
                    if (s === a) return;
                    let o = [...r];
                    o = o.filter(e => e != s), o.splice(n, 0, s), i(o), e.update(o, "changed")
                })(0, _)
            },
            ref: e => {
                ((e, s) => {
                    if (e) {
                        let a = t;
                        a[s] || (a[s] = e), n(a)
                    }
                })(e, _)
            },
            draggable: "true",
            style: d[_],
            onTouchStart: e => {
                let n = [...u];
                t.map((e, t) => {
                    let s = e.getBoundingClientRect();
                    n[t] = s
                }), c(n), r[_] && a(r[_])
            },
            onTouchMove: e => {
                e.preventDefault();
                let t = [];
                if ("touchmove" === e.type) {
                    let n = [...d];
                    n[_] = {
                        transform: "translateY(" + Math.floor(e.touches[0].clientY - u[_].top) + "px)"
                    }, m(n), t.push(r[_]);
                    let s = [];
                    if (e.touches[0].clientY && u.map((n, a) => {
                            n.top + n.height / 2 > e.touches[0].clientY && r[a] !== r[_] && t.push(r[a]), n.bottom - n.height / 2 < e.touches[0].clientY && r[a] !== r[_] && s.push(r[a])
                        }), s.length)
                        for (let e = s.length - 1; e >= 0; e--) t.unshift(s[e]);
                    l(t)
                }
            },
            onTouchEnd: t => {
                i(o), e.update(o, "changed"), c([]), m([]), a(!1), l([])
            },
            className: h(_) + " " + (e.question.show_correct_answer && e.question.correct_indexes ? e.question.correct_indexes && e.question.correct_indexes.length && e.question.correct_indexes.includes(_) ? "question_correct" : "question_incorrect" : "")
        }, ye("div", {
            dangerouslySetInnerHTML: {
                __html: p
            }
        }))))
    };
    const {
        createElement: Ne,
        render: Oe,
        useState: Ee,
        useEffect: ze,
        Fragment: Pe
    } = wp.element;
    var Ce = e => {
        e.question.id, e.quiz_id;
        const [t, n] = Ee({}), [s, a] = Ee(!1);
        ze(() => {
            let t = e.question;
            if (!s && t && t.marked_answer && t.marked_answer.length && "undefined" != t.marked_answer) {
                let e = [];
                t.marked_answer.map((n, s) => {
                    e.push(t.original_options[parseInt(n) - 1])
                }), t.options = e, n(t), a(!0)
            }
            n(t)
        }, [t]);
        return Ne(Pe, null, Ne("div", {
            className: "question_content",
            dangerouslySetInnerHTML: {
                __html: t && t.content ? t.content : ""
            }
        }), t.options && t.options.length ? Ne(Pe, null, Ne(Se, {
            items: t.options,
            original_items: t.original_options,
            update: (s, a) => {
                if ("changed" == a) {
                    let a = t;
                    a.marked_answer = [], s.map((e, t) => {
                        let n = a.original_options.indexOf(e);
                        a.marked_answer.push(n + 1)
                    }), n(a), e.update(a, e.index, "changed")
                }
            },
            question: t
        }), t.attempted ? "" : Ne("span", {
            className: "resetq_answer button",
            onClick: s => {
                let a = {
                    ...t
                };
                a.marked_answer = null, a.options = a.original_options, n(a), e.update(a, e.index, "changed")
            }
        }, Ne("i", {
            class: "vicon vicon-trash"
        }))) : "")
    };
    const {
        createElement: Me,
        render: Ie,
        useState: Te,
        useEffect: Le,
        Fragment: je
    } = wp.element;

    function Ae(e) {
        if (null == e) return !0;
        if (void 0 === e) return !0;
        if ("number" == typeof e) return !1;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    }
    var De = e => {
        const [t, n] = Te([]), [s, a] = Te(!1), [r, i] = Te([]), [o, l] = Te(""), [u, c] = Te([]), [d, m] = Te(e.matches), [p, h] = Te([]), [_, w] = Te([]), [f, v] = Te([]), [g, y] = Te({}), [b, k] = Te([]), [x, q] = Te([]), [S, N] = Te([]), [O, E] = Te({
            x: 0,
            y: 0
        }), [z, P] = Te([]);
        Le(() => {
            let t = [...e.items];
            e.question && e.question.marked_answer && e.question.marked_answer.length && e.question.marked_answer.map(n => {
                n && "NaN" != typeof n && (t = t.filter(t => t != e.question.original_options[n - 1]))
            }), c(t);
            let n = [];
            e.question && e.question.marked_answer && e.question.marked_answer.length && e.question.marked_answer.map(e => {
                parseFloat(e) - 1 >= 0 ? n.push(e - 1) : n.push(null)
            }), N(n), e.update(!1, "reset")
        }, [e.items, e.reset]);
        let C = "droppable";
        s && (C += " active");
        const M = e => {
            let t = "";
            return s === u[e] && (t = "dragging"), t
        };
        return Me("div", {
            className: "match_playground"
        }, Me("div", {
            className: "match_options"
        }, d && d.length ? d.map((n, l) => Me("div", {
            key: l,
            className: "match_option " + (e.question.show_correct_answer && e.question.correct_indexes ? e.question.correct_indexes && e.question.correct_indexes.length && e.question.correct_indexes.includes(l) ? "question_correct" : "question_incorrect" : ""),
            onDrop: t => {
                ((t, n) => {
                    if (!s) return;
                    if (z.index === n) return;
                    let a = [...u],
                        r = [...S];
                    if (!r[n] && 0 !== r[n]) {
                        a = a.filter(e => e != s);
                        let t = e.original_items.indexOf(s);
                        d && d.length && d.map((e, t) => {
                            Ae(r[t]) && (r[t] = null)
                        }), Ae(n) || (r[n] = t), N(r), c(a), e.update(r, "changed")
                    }
                })(0, l)
            },
            onDragOver: e => {
                e.preventDefault()
            },
            ref: e => {
                ((e, t) => {
                    if (e) {
                        let n = r;
                        n[t] || (n[t] = e), i(n)
                    }
                })(e, l)
            }
        }, Me("div", {
            dangerouslySetInnerHTML: {
                __html: n
            }
        }), Me("div", {
            className: "children"
        }, e.original_items && null != S[l] && e.original_items[S[l]] ? Me("div", {
            key: "droppablediv" + l,
            draggable: "true",
            onDragStart: t => {
                e.original_items[S[l]] && (a(e.original_items[S[l]]), P({
                    index: l,
                    source: "droppablediv"
                }))
            },
            onDragEnd: () => {
                a(!1), P({})
            },
            onDragOver: e => {
                e.preventDefault()
            },
            className: M(l),
            style: x[S[l]],
            onTouchStart: n => {
                let s = [..._];
                t.map((e, t) => {
                    let n = e.getBoundingClientRect();
                    s[t] = n
                }), w(s);
                let i = [...f];
                r.map((e, t) => {
                    let n = e.getBoundingClientRect();
                    i[t] = n
                }), v(i), y(o.getBoundingClientRect()), e.original_items[S[l]] && (a(e.original_items[S[l]]), P({
                    index: l,
                    source: "droppablediv"
                })), P({})
            },
            onTouchMove: e => {
                if (e && (e.preventDefault(), "touchmove" === e.type)) {
                    let t = [...x];
                    t[S[l]] = {
                        position: "fixed",
                        top: Math.floor(e.touches[0].clientY) + "px",
                        left: Math.floor(e.touches[0].clientX) + "px"
                    }, q(t), E({
                        x: e.touches[0].clientX,
                        y: e.touches[0].clientY
                    })
                }
            },
            onTouchEnd: t => {
                let n = [...u],
                    r = [...S];
                g.top < O.y && g.top + g.height > O.y && g.left < O.x && g.left + g.width > O.x && (n.push(s), r.map((e, t) => {
                    e == S[l] && (r[t] = null)
                })), v([]), y({}), a(!1), q([]), k([]), c(n), N(r), e.update(r, "changed"), E({
                    x: 0,
                    y: 0
                })
            }
        }, Me("div", {
            dangerouslySetInnerHTML: {
                __html: e.original_items[S[l]]
            }
        })) : ""))) : ""), Me("div", {
            className: C,
            onDragOver: e => {
                e.preventDefault()
            },
            onDrop: t => {
                (t => {
                    if ("droppablediv" !== z.source) return;
                    if (!s) return;
                    let n = [...u],
                        a = [...S];
                    n.includes(s) || n.push(s), c(n), Ae(z.index) || (a[z.index] = null), N(a), e.update(a, "changed")
                })()
            },
            ref: e => {
                var t;
                (t = e) && l(t)
            }
        }, u && u.length ? u.map((s, i) => Me("div", {
            key: "draggablediv" + i,
            onDragStart: e => {
                u[i] && a(u[i]), P({})
            },
            onDragEnd: () => {
                a(!1), P({})
            },
            onDragOver: e => {
                e.preventDefault()
            },
            ref: e => {
                ((e, s) => {
                    if (e) {
                        let a = t;
                        a[s] || (a[s] = e), n(a)
                    }
                })(e, i)
            },
            draggable: "true",
            style: b[i],
            onTouchStart: e => {
                let n = [..._];
                t.map((e, t) => {
                    let s = e.getBoundingClientRect();
                    n[t] = s
                }), w(n);
                let i = [...f];
                r.map((e, t) => {
                    let n = e.getBoundingClientRect();
                    i[t] = n
                }), v(i), s && a(s), P({})
            },
            onTouchMove: e => {
                if (e.preventDefault(), "touchmove" === e.type) {
                    let t = [...b];
                    t[i] = {
                        position: "fixed",
                        top: Math.floor(e.touches[0].clientY) + "px",
                        left: Math.floor(e.touches[0].clientX) + "px"
                    }, k(t), E({
                        x: e.touches[0].clientX,
                        y: e.touches[0].clientY
                    })
                }
            },
            onTouchEnd: t => {
                k([]);
                let n = [...u],
                    r = [...S];
                f.map((t, a) => {
                    if (t.top < O.y && t.top + t.height > O.y && t.left < O.x && t.left + t.width > O.x) {
                        let t = e.original_items.indexOf(s);
                        t >= 0 && !r[a] && 0 !== r[a] && (r[a] = t, n = n.filter(e => e != s))
                    }
                }), v([]), a(!1), c(n), N(r), e.update(r, "changed"), E({
                    x: 0,
                    y: 0
                })
            },
            className: M(i)
        }, Me("div", {
            dangerouslySetInnerHTML: {
                __html: s
            }
        }))) : ""))
    };
    const {
        createElement: He,
        render: Fe,
        useState: Be,
        useEffect: Re,
        Fragment: $e
    } = wp.element;
    var Je = e => {
        e.question.id, e.quiz_id;
        const [t, n] = Be({}), [s, a] = Be(!1);
        Re(() => {
            n(e.question)
        }, [t]);
        return He($e, null, He("div", {
            className: "question_content"
        }, He("div", {
            className: "question_statement",
            dangerouslySetInnerHTML: {
                __html: t && t.extra_content && t.extra_content.statement ? t.extra_content.statement : ""
            }
        }), t.options && t.options.length && t.content.match && t.content.match.length ? He(De, {
            matches: t.extra_content.match,
            original_matches: t.extra_content.match,
            items: t.options,
            original_items: t.original_options,
            update: (s, r) => {
                if ("changed" == r) {
                    let a = {
                        ...t
                    };
                    a.marked_answer = [], s.map(e => {
                        a.marked_answer.push(parseInt(e) + 1)
                    }), n(a), e.update(a, e.index, "changed")
                }
                "reset" == r && a(!1)
            },
            reset: s,
            question: t
        }) : "", He("div", {
            className: "question_end",
            dangerouslySetInnerHTML: {
                __html: t && t.content && t.content.end ? t.content.end : ""
            }
        })), t.attempted ? "" : He("span", {
            className: "resetq_answer button",
            onClick: s => {
                a(!0);
                let r = {
                    ...t
                };
                r.marked_answer = null, r.options = r.original_options, n(r), e.update(r, e.index, "changed")
            }
        }, He("i", {
            class: "vicon vicon-trash"
        })))
    };
    const {
        createElement: We,
        render: Ue,
        useState: Ye,
        useEffect: Xe,
        Fragment: Ve
    } = wp.element;
    var Qe = e => {
        const [t, n] = Ye(e.question);
        let s = "";
        return t.hasOwnProperty("marked_answer") && (s = t.marked_answer), We(Ve, null, We("div", {
            className: "question_content",
            dangerouslySetInnerHTML: {
                __html: t && t.content ? t.content : ""
            }
        }),J("ul", {className: "question_list"}, t.options && t.options.length ? We(Ve, null, (t => t.options.map((function(s, a) {
            return We("li", {
                className: "question_option radio " + (t.show_correct_answer && t.correct_indexes ? t.correct_indexes && t.correct_indexes.length && t.correct_indexes.includes(a) ? "question_correct" : "question_incorrect" : "") + (parseInt(t.marked_answer) === a ? ' checked_option' : '')
            }, We("input", {
                type: "radio",
                name: e.quiz_id + "_" + t.id,
                value: a,
                id: e.quiz_id + "_" + t.id + a,
                checked: parseInt(t.marked_answer) === a,
                onChange: t => {
                    let s = {
                        ...e.question
                    };
                    s.marked_answer = t.target.value, n(s), e.update(s, e.index, "changed")
                }
            }), We("label", {
                for: e.quiz_id + "_" + t.id + a,
                dangerouslySetInnerHTML: {
                    __html: s
                }
            }))
        })))(t), t.attempted ? "" : We("span", {
            className: "resetq_answer button",
            onClick: t => {
                let s = {
                    ...e.question
                };
                s.marked_answer = null, n(s)
            }
        }, We("i", {
            class: "vicon vicon-trash"
        }))) : ""))
    };
    const {
        createElement: Ke,
        render: Ge,
        useState: Ze,
        useEffect: et,
        Fragment: tt
    } = wp.element;
    var nt, st, at = e => {
            const [t, n] = Ze({});
            et(() => {
                n(e.question)
            }, [e.question]);
            let s = "";
            t.hasOwnProperty("marked_answer") && (s = t.marked_answer);
            let a = "";
            return t.hasOwnProperty("usercorrect") && t.show_correct_answer && (a = "question_incorrect", t.usercorrect > 0 && (a = "question_correct")), Ke(tt, null, Ke("div", {
                className: "question_content",
                dangerouslySetInnerHTML: {
                    __html: t && t.content ? t.content : ""
                }
            }), Ke("textarea", {
                className: a,
                type: "text",
                onChange: t => {
                    let s = {
                        ...e.question
                    };
                    s.marked_answer = t.target.value, n(s), e.update(s, e.index, "changed")
                },
                value: s
            }, s))
        },
        rt = rt || function(e, t) {
            var n = {},
                s = n.lib = {},
                a = function() {},
                r = s.Base = {
                    extend: function(e) {
                        a.prototype = this;
                        var t = new a;
                        return e && t.mixIn(e), t.hasOwnProperty("init") || (t.init = function() {
                            t.$super.init.apply(this, arguments)
                        }), t.init.prototype = t, t.$super = this, t
                    },
                    create: function() {
                        var e = this.extend();
                        return e.init.apply(e, arguments), e
                    },
                    init: function() {},
                    mixIn: function(e) {
                        for (var t in e) e.hasOwnProperty(t) && (this[t] = e[t]);
                        e.hasOwnProperty("toString") && (this.toString = e.toString)
                    },
                    clone: function() {
                        return this.init.prototype.extend(this)
                    }
                },
                i = s.WordArray = r.extend({
                    init: function(e, t) {
                        e = this.words = e || [], this.sigBytes = null != t ? t : 4 * e.length
                    },
                    toString: function(e) {
                        return (e || l).stringify(this)
                    },
                    concat: function(e) {
                        var t = this.words,
                            n = e.words,
                            s = this.sigBytes;
                        if (e = e.sigBytes, this.clamp(), s % 4)
                            for (var a = 0; a < e; a++) t[s + a >>> 2] |= (n[a >>> 2] >>> 24 - a % 4 * 8 & 255) << 24 - (s + a) % 4 * 8;
                        else if (65535 < n.length)
                            for (a = 0; a < e; a += 4) t[s + a >>> 2] = n[a >>> 2];
                        else t.push.apply(t, n);
                        return this.sigBytes += e, this
                    },
                    clamp: function() {
                        var t = this.words,
                            n = this.sigBytes;
                        t[n >>> 2] &= 4294967295 << 32 - n % 4 * 8, t.length = e.ceil(n / 4)
                    },
                    clone: function() {
                        var e = r.clone.call(this);
                        return e.words = this.words.slice(0), e
                    },
                    random: function(t) {
                        for (var n = [], s = 0; s < t; s += 4) n.push(4294967296 * e.random() | 0);
                        return new i.init(n, t)
                    }
                }),
                o = n.enc = {},
                l = o.Hex = {
                    stringify: function(e) {
                        var t = e.words;
                        e = e.sigBytes;
                        for (var n = [], s = 0; s < e; s++) {
                            var a = t[s >>> 2] >>> 24 - s % 4 * 8 & 255;
                            n.push((a >>> 4).toString(16)), n.push((15 & a).toString(16))
                        }
                        return n.join("")
                    },
                    parse: function(e) {
                        for (var t = e.length, n = [], s = 0; s < t; s += 2) n[s >>> 3] |= parseInt(e.substr(s, 2), 16) << 24 - s % 8 * 4;
                        return new i.init(n, t / 2)
                    }
                },
                u = o.Latin1 = {
                    stringify: function(e) {
                        var t = e.words;
                        e = e.sigBytes;
                        for (var n = [], s = 0; s < e; s++) n.push(String.fromCharCode(t[s >>> 2] >>> 24 - s % 4 * 8 & 255));
                        return n.join("")
                    },
                    parse: function(e) {
                        for (var t = e.length, n = [], s = 0; s < t; s++) n[s >>> 2] |= (255 & e.charCodeAt(s)) << 24 - s % 4 * 8;
                        return new i.init(n, t)
                    }
                },
                c = o.Utf8 = {
                    stringify: function(e) {
                        try {
                            return decodeURIComponent(escape(u.stringify(e)))
                        } catch (e) {
                            throw Error("Malformed UTF-8 data")
                        }
                    },
                    parse: function(e) {
                        return u.parse(unescape(encodeURIComponent(e)))
                    }
                },
                d = s.BufferedBlockAlgorithm = r.extend({
                    reset: function() {
                        this._data = new i.init, this._nDataBytes = 0
                    },
                    _append: function(e) {
                        "string" == typeof e && (e = c.parse(e)), this._data.concat(e), this._nDataBytes += e.sigBytes
                    },
                    _process: function(t) {
                        var n = this._data,
                            s = n.words,
                            a = n.sigBytes,
                            r = this.blockSize,
                            o = a / (4 * r);
                        if (t = (o = t ? e.ceil(o) : e.max((0 | o) - this._minBufferSize, 0)) * r, a = e.min(4 * t, a), t) {
                            for (var l = 0; l < t; l += r) this._doProcessBlock(s, l);
                            l = s.splice(0, t), n.sigBytes -= a
                        }
                        return new i.init(l, a)
                    },
                    clone: function() {
                        var e = r.clone.call(this);
                        return e._data = this._data.clone(), e
                    },
                    _minBufferSize: 0
                });
            s.Hasher = d.extend({
                cfg: r.extend(),
                init: function(e) {
                    this.cfg = this.cfg.extend(e), this.reset()
                },
                reset: function() {
                    d.reset.call(this), this._doReset()
                },
                update: function(e) {
                    return this._append(e), this._process(), this
                },
                finalize: function(e) {
                    return e && this._append(e), this._doFinalize()
                },
                blockSize: 16,
                _createHelper: function(e) {
                    return function(t, n) {
                        return new e.init(n).finalize(t)
                    }
                },
                _createHmacHelper: function(e) {
                    return function(t, n) {
                        return new m.HMAC.init(e, n).finalize(t)
                    }
                }
            });
            var m = n.algo = {};
            return n
        }(Math);
    st = (nt = rt).lib.WordArray, nt.enc.Base64 = {
            stringify: function(e) {
                var t = e.words,
                    n = e.sigBytes,
                    s = this._map;
                e.clamp(), e = [];
                for (var a = 0; a < n; a += 3)
                    for (var r = (t[a >>> 2] >>> 24 - a % 4 * 8 & 255) << 16 | (t[a + 1 >>> 2] >>> 24 - (a + 1) % 4 * 8 & 255) << 8 | t[a + 2 >>> 2] >>> 24 - (a + 2) % 4 * 8 & 255, i = 0; 4 > i && a + .75 * i < n; i++) e.push(s.charAt(r >>> 6 * (3 - i) & 63));
                if (t = s.charAt(64))
                    for (; e.length % 4;) e.push(t);
                return e.join("")
            },
            parse: function(e) {
                var t = e.length,
                    n = this._map;
                (s = n.charAt(64)) && -1 != (s = e.indexOf(s)) && (t = s);
                for (var s = [], a = 0, r = 0; r < t; r++)
                    if (r % 4) {
                        var i = n.indexOf(e.charAt(r - 1)) << r % 4 * 2,
                            o = n.indexOf(e.charAt(r)) >>> 6 - r % 4 * 2;
                        s[a >>> 2] |= (i | o) << 24 - a % 4 * 8, a++
                    } return st.create(s, a)
            },
            _map: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
        },
        function(e) {
            function t(e, t, n, s, a, r, i) {
                return ((e = e + (t & n | ~t & s) + a + i) << r | e >>> 32 - r) + t
            }

            function n(e, t, n, s, a, r, i) {
                return ((e = e + (t & s | n & ~s) + a + i) << r | e >>> 32 - r) + t
            }

            function s(e, t, n, s, a, r, i) {
                return ((e = e + (t ^ n ^ s) + a + i) << r | e >>> 32 - r) + t
            }

            function a(e, t, n, s, a, r, i) {
                return ((e = e + (n ^ (t | ~s)) + a + i) << r | e >>> 32 - r) + t
            }
            for (var r = rt, i = (l = r.lib).WordArray, o = l.Hasher, l = r.algo, u = [], c = 0; 64 > c; c++) u[c] = 4294967296 * e.abs(e.sin(c + 1)) | 0;
            l = l.MD5 = o.extend({
                _doReset: function() {
                    this._hash = new i.init([1732584193, 4023233417, 2562383102, 271733878])
                },
                _doProcessBlock: function(e, r) {
                    for (var i = 0; 16 > i; i++) {
                        var o = e[l = r + i];
                        e[l] = 16711935 & (o << 8 | o >>> 24) | 4278255360 & (o << 24 | o >>> 8)
                    }
                    i = this._hash.words;
                    var l = e[r + 0],
                        c = (o = e[r + 1], e[r + 2]),
                        d = e[r + 3],
                        m = e[r + 4],
                        p = e[r + 5],
                        h = e[r + 6],
                        _ = e[r + 7],
                        w = e[r + 8],
                        f = e[r + 9],
                        v = e[r + 10],
                        g = e[r + 11],
                        y = e[r + 12],
                        b = e[r + 13],
                        k = e[r + 14],
                        x = e[r + 15],
                        q = t(q = i[0], O = i[1], N = i[2], S = i[3], l, 7, u[0]),
                        S = t(S, q, O, N, o, 12, u[1]),
                        N = t(N, S, q, O, c, 17, u[2]),
                        O = t(O, N, S, q, d, 22, u[3]);
                    q = t(q, O, N, S, m, 7, u[4]), S = t(S, q, O, N, p, 12, u[5]), N = t(N, S, q, O, h, 17, u[6]), O = t(O, N, S, q, _, 22, u[7]), q = t(q, O, N, S, w, 7, u[8]), S = t(S, q, O, N, f, 12, u[9]), N = t(N, S, q, O, v, 17, u[10]), O = t(O, N, S, q, g, 22, u[11]), q = t(q, O, N, S, y, 7, u[12]), S = t(S, q, O, N, b, 12, u[13]), N = t(N, S, q, O, k, 17, u[14]), q = n(q, O = t(O, N, S, q, x, 22, u[15]), N, S, o, 5, u[16]), S = n(S, q, O, N, h, 9, u[17]), N = n(N, S, q, O, g, 14, u[18]), O = n(O, N, S, q, l, 20, u[19]), q = n(q, O, N, S, p, 5, u[20]), S = n(S, q, O, N, v, 9, u[21]), N = n(N, S, q, O, x, 14, u[22]), O = n(O, N, S, q, m, 20, u[23]), q = n(q, O, N, S, f, 5, u[24]), S = n(S, q, O, N, k, 9, u[25]), N = n(N, S, q, O, d, 14, u[26]), O = n(O, N, S, q, w, 20, u[27]), q = n(q, O, N, S, b, 5, u[28]), S = n(S, q, O, N, c, 9, u[29]), N = n(N, S, q, O, _, 14, u[30]), q = s(q, O = n(O, N, S, q, y, 20, u[31]), N, S, p, 4, u[32]), S = s(S, q, O, N, w, 11, u[33]), N = s(N, S, q, O, g, 16, u[34]), O = s(O, N, S, q, k, 23, u[35]), q = s(q, O, N, S, o, 4, u[36]), S = s(S, q, O, N, m, 11, u[37]), N = s(N, S, q, O, _, 16, u[38]), O = s(O, N, S, q, v, 23, u[39]), q = s(q, O, N, S, b, 4, u[40]), S = s(S, q, O, N, l, 11, u[41]), N = s(N, S, q, O, d, 16, u[42]), O = s(O, N, S, q, h, 23, u[43]), q = s(q, O, N, S, f, 4, u[44]), S = s(S, q, O, N, y, 11, u[45]), N = s(N, S, q, O, x, 16, u[46]), q = a(q, O = s(O, N, S, q, c, 23, u[47]), N, S, l, 6, u[48]), S = a(S, q, O, N, _, 10, u[49]), N = a(N, S, q, O, k, 15, u[50]), O = a(O, N, S, q, p, 21, u[51]), q = a(q, O, N, S, y, 6, u[52]), S = a(S, q, O, N, d, 10, u[53]), N = a(N, S, q, O, v, 15, u[54]), O = a(O, N, S, q, o, 21, u[55]), q = a(q, O, N, S, w, 6, u[56]), S = a(S, q, O, N, x, 10, u[57]), N = a(N, S, q, O, h, 15, u[58]), O = a(O, N, S, q, b, 21, u[59]), q = a(q, O, N, S, m, 6, u[60]), S = a(S, q, O, N, g, 10, u[61]), N = a(N, S, q, O, c, 15, u[62]), O = a(O, N, S, q, f, 21, u[63]);
                    i[0] = i[0] + q | 0, i[1] = i[1] + O | 0, i[2] = i[2] + N | 0, i[3] = i[3] + S | 0
                },
                _doFinalize: function() {
                    var t = this._data,
                        n = t.words,
                        s = 8 * this._nDataBytes,
                        a = 8 * t.sigBytes;
                    n[a >>> 5] |= 128 << 24 - a % 32;
                    var r = e.floor(s / 4294967296);
                    for (n[15 + (a + 64 >>> 9 << 4)] = 16711935 & (r << 8 | r >>> 24) | 4278255360 & (r << 24 | r >>> 8), n[14 + (a + 64 >>> 9 << 4)] = 16711935 & (s << 8 | s >>> 24) | 4278255360 & (s << 24 | s >>> 8), t.sigBytes = 4 * (n.length + 1), this._process(), n = (t = this._hash).words, s = 0; 4 > s; s++) a = n[s], n[s] = 16711935 & (a << 8 | a >>> 24) | 4278255360 & (a << 24 | a >>> 8);
                    return t
                },
                clone: function() {
                    var e = o.clone.call(this);
                    return e._hash = this._hash.clone(), e
                }
            }), r.MD5 = o._createHelper(l), r.HmacMD5 = o._createHmacHelper(l)
        }(Math),
        function() {
            var e, t = rt,
                n = (e = t.lib).Base,
                s = e.WordArray,
                a = (e = t.algo).EvpKDF = n.extend({
                    cfg: n.extend({
                        keySize: 4,
                        hasher: e.MD5,
                        iterations: 1
                    }),
                    init: function(e) {
                        this.cfg = this.cfg.extend(e)
                    },
                    compute: function(e, t) {
                        for (var n = (o = this.cfg).hasher.create(), a = s.create(), r = a.words, i = o.keySize, o = o.iterations; r.length < i;) {
                            l && n.update(l);
                            var l = n.update(e).finalize(t);
                            n.reset();
                            for (var u = 1; u < o; u++) l = n.finalize(l), n.reset();
                            a.concat(l)
                        }
                        return a.sigBytes = 4 * i, a
                    }
                });
            t.EvpKDF = function(e, t, n) {
                return a.create(n).compute(e, t)
            }
        }(), rt.lib.Cipher || function(e) {
            var t = (p = rt).lib,
                n = t.Base,
                s = t.WordArray,
                a = t.BufferedBlockAlgorithm,
                r = p.enc.Base64,
                i = p.algo.EvpKDF,
                o = t.Cipher = a.extend({
                    cfg: n.extend(),
                    createEncryptor: function(e, t) {
                        return this.create(this._ENC_XFORM_MODE, e, t)
                    },
                    createDecryptor: function(e, t) {
                        return this.create(this._DEC_XFORM_MODE, e, t)
                    },
                    init: function(e, t, n) {
                        this.cfg = this.cfg.extend(n), this._xformMode = e, this._key = t, this.reset()
                    },
                    reset: function() {
                        a.reset.call(this), this._doReset()
                    },
                    process: function(e) {
                        return this._append(e), this._process()
                    },
                    finalize: function(e) {
                        return e && this._append(e), this._doFinalize()
                    },
                    keySize: 4,
                    ivSize: 4,
                    _ENC_XFORM_MODE: 1,
                    _DEC_XFORM_MODE: 2,
                    _createHelper: function(e) {
                        return {
                            encrypt: function(t, n, s) {
                                return ("string" == typeof n ? h : m).encrypt(e, t, n, s)
                            },
                            decrypt: function(t, n, s) {
                                return ("string" == typeof n ? h : m).decrypt(e, t, n, s)
                            }
                        }
                    }
                });
            t.StreamCipher = o.extend({
                _doFinalize: function() {
                    return this._process(!0)
                },
                blockSize: 1
            });
            var l = p.mode = {},
                u = function(e, t, n) {
                    var s = this._iv;
                    s ? this._iv = void 0 : s = this._prevBlock;
                    for (var a = 0; a < n; a++) e[t + a] ^= s[a]
                },
                c = (t.BlockCipherMode = n.extend({
                    createEncryptor: function(e, t) {
                        return this.Encryptor.create(e, t)
                    },
                    createDecryptor: function(e, t) {
                        return this.Decryptor.create(e, t)
                    },
                    init: function(e, t) {
                        this._cipher = e, this._iv = t
                    }
                })).extend();
            c.Encryptor = c.extend({
                processBlock: function(e, t) {
                    var n = this._cipher,
                        s = n.blockSize;
                    u.call(this, e, t, s), n.encryptBlock(e, t), this._prevBlock = e.slice(t, t + s)
                }
            }), c.Decryptor = c.extend({
                processBlock: function(e, t) {
                    var n = this._cipher,
                        s = n.blockSize,
                        a = e.slice(t, t + s);
                    n.decryptBlock(e, t), u.call(this, e, t, s), this._prevBlock = a
                }
            }), l = l.CBC = c, c = (p.pad = {}).Pkcs7 = {
                pad: function(e, t) {
                    for (var n, a = (n = (n = 4 * t) - e.sigBytes % n) << 24 | n << 16 | n << 8 | n, r = [], i = 0; i < n; i += 4) r.push(a);
                    n = s.create(r, n), e.concat(n)
                },
                unpad: function(e) {
                    e.sigBytes -= 255 & e.words[e.sigBytes - 1 >>> 2]
                }
            }, t.BlockCipher = o.extend({
                cfg: o.cfg.extend({
                    mode: l,
                    padding: c
                }),
                reset: function() {
                    o.reset.call(this);
                    var e = (t = this.cfg).iv,
                        t = t.mode;
                    if (this._xformMode == this._ENC_XFORM_MODE) var n = t.createEncryptor;
                    else n = t.createDecryptor, this._minBufferSize = 1;
                    this._mode = n.call(t, this, e && e.words)
                },
                _doProcessBlock: function(e, t) {
                    this._mode.processBlock(e, t)
                },
                _doFinalize: function() {
                    var e = this.cfg.padding;
                    if (this._xformMode == this._ENC_XFORM_MODE) {
                        e.pad(this._data, this.blockSize);
                        var t = this._process(!0)
                    } else t = this._process(!0), e.unpad(t);
                    return t
                },
                blockSize: 4
            });
            var d = t.CipherParams = n.extend({
                    init: function(e) {
                        this.mixIn(e)
                    },
                    toString: function(e) {
                        return (e || this.formatter).stringify(this)
                    }
                }),
                m = (l = (p.format = {}).OpenSSL = {
                    stringify: function(e) {
                        var t = e.ciphertext;
                        return ((e = e.salt) ? s.create([1398893684, 1701076831]).concat(e).concat(t) : t).toString(r)
                    },
                    parse: function(e) {
                        var t = (e = r.parse(e)).words;
                        if (1398893684 == t[0] && 1701076831 == t[1]) {
                            var n = s.create(t.slice(2, 4));
                            t.splice(0, 4), e.sigBytes -= 16
                        }
                        return d.create({
                            ciphertext: e,
                            salt: n
                        })
                    }
                }, t.SerializableCipher = n.extend({
                    cfg: n.extend({
                        format: l
                    }),
                    encrypt: function(e, t, n, s) {
                        s = this.cfg.extend(s);
                        var a = e.createEncryptor(n, s);
                        return t = a.finalize(t), a = a.cfg, d.create({
                            ciphertext: t,
                            key: n,
                            iv: a.iv,
                            algorithm: e,
                            mode: a.mode,
                            padding: a.padding,
                            blockSize: e.blockSize,
                            formatter: s.format
                        })
                    },
                    decrypt: function(e, t, n, s) {
                        return s = this.cfg.extend(s), t = this._parse(t, s.format), e.createDecryptor(n, s).finalize(t.ciphertext)
                    },
                    _parse: function(e, t) {
                        return "string" == typeof e ? t.parse(e, this) : e
                    }
                })),
                p = (p.kdf = {}).OpenSSL = {
                    execute: function(e, t, n, a) {
                        return a || (a = s.random(8)), e = i.create({
                            keySize: t + n
                        }).compute(e, a), n = s.create(e.words.slice(t), 4 * n), e.sigBytes = 4 * t, d.create({
                            key: e,
                            iv: n,
                            salt: a
                        })
                    }
                },
                h = t.PasswordBasedCipher = m.extend({
                    cfg: m.cfg.extend({
                        kdf: p
                    }),
                    encrypt: function(e, t, n, s) {
                        return n = (s = this.cfg.extend(s)).kdf.execute(n, e.keySize, e.ivSize), s.iv = n.iv, (e = m.encrypt.call(this, e, t, n.key, s)).mixIn(n), e
                    },
                    decrypt: function(e, t, n, s) {
                        return s = this.cfg.extend(s), t = this._parse(t, s.format), n = s.kdf.execute(n, e.keySize, e.ivSize, t.salt), s.iv = n.iv, m.decrypt.call(this, e, t, n.key, s)
                    }
                })
        }(),
        function() {
            for (var e = rt, t = e.lib.BlockCipher, n = e.algo, s = [], a = [], r = [], i = [], o = [], l = [], u = [], c = [], d = [], m = [], p = [], h = 0; 256 > h; h++) p[h] = 128 > h ? h << 1 : h << 1 ^ 283;
            var _ = 0,
                w = 0;
            for (h = 0; 256 > h; h++) {
                var f = (f = w ^ w << 1 ^ w << 2 ^ w << 3 ^ w << 4) >>> 8 ^ 255 & f ^ 99;
                s[_] = f, a[f] = _;
                var v = p[_],
                    g = p[v],
                    y = p[g],
                    b = 257 * p[f] ^ 16843008 * f;
                r[_] = b << 24 | b >>> 8, i[_] = b << 16 | b >>> 16, o[_] = b << 8 | b >>> 24, l[_] = b, b = 16843009 * y ^ 65537 * g ^ 257 * v ^ 16843008 * _, u[f] = b << 24 | b >>> 8, c[f] = b << 16 | b >>> 16, d[f] = b << 8 | b >>> 24, m[f] = b, _ ? (_ = v ^ p[p[p[y ^ v]]], w ^= p[p[w]]) : _ = w = 1
            }
            var k = [0, 1, 2, 4, 8, 16, 32, 64, 128, 27, 54];
            n = n.AES = t.extend({
                _doReset: function() {
                    for (var e = (n = this._key).words, t = n.sigBytes / 4, n = 4 * ((this._nRounds = t + 6) + 1), a = this._keySchedule = [], r = 0; r < n; r++)
                        if (r < t) a[r] = e[r];
                        else {
                            var i = a[r - 1];
                            r % t ? 6 < t && 4 == r % t && (i = s[i >>> 24] << 24 | s[i >>> 16 & 255] << 16 | s[i >>> 8 & 255] << 8 | s[255 & i]) : (i = s[(i = i << 8 | i >>> 24) >>> 24] << 24 | s[i >>> 16 & 255] << 16 | s[i >>> 8 & 255] << 8 | s[255 & i], i ^= k[r / t | 0] << 24), a[r] = a[r - t] ^ i
                        } for (e = this._invKeySchedule = [], t = 0; t < n; t++) r = n - t, i = t % 4 ? a[r] : a[r - 4], e[t] = 4 > t || 4 >= r ? i : u[s[i >>> 24]] ^ c[s[i >>> 16 & 255]] ^ d[s[i >>> 8 & 255]] ^ m[s[255 & i]]
                },
                encryptBlock: function(e, t) {
                    this._doCryptBlock(e, t, this._keySchedule, r, i, o, l, s)
                },
                decryptBlock: function(e, t) {
                    var n = e[t + 1];
                    e[t + 1] = e[t + 3], e[t + 3] = n, this._doCryptBlock(e, t, this._invKeySchedule, u, c, d, m, a), n = e[t + 1], e[t + 1] = e[t + 3], e[t + 3] = n
                },
                _doCryptBlock: function(e, t, n, s, a, r, i, o) {
                    for (var l = this._nRounds, u = e[t] ^ n[0], c = e[t + 1] ^ n[1], d = e[t + 2] ^ n[2], m = e[t + 3] ^ n[3], p = 4, h = 1; h < l; h++) {
                        var _ = s[u >>> 24] ^ a[c >>> 16 & 255] ^ r[d >>> 8 & 255] ^ i[255 & m] ^ n[p++],
                            w = s[c >>> 24] ^ a[d >>> 16 & 255] ^ r[m >>> 8 & 255] ^ i[255 & u] ^ n[p++],
                            f = s[d >>> 24] ^ a[m >>> 16 & 255] ^ r[u >>> 8 & 255] ^ i[255 & c] ^ n[p++];
                        m = s[m >>> 24] ^ a[u >>> 16 & 255] ^ r[c >>> 8 & 255] ^ i[255 & d] ^ n[p++], u = _, c = w, d = f
                    }
                    _ = (o[u >>> 24] << 24 | o[c >>> 16 & 255] << 16 | o[d >>> 8 & 255] << 8 | o[255 & m]) ^ n[p++], w = (o[c >>> 24] << 24 | o[d >>> 16 & 255] << 16 | o[m >>> 8 & 255] << 8 | o[255 & u]) ^ n[p++], f = (o[d >>> 24] << 24 | o[m >>> 16 & 255] << 16 | o[u >>> 8 & 255] << 8 | o[255 & c]) ^ n[p++], m = (o[m >>> 24] << 24 | o[u >>> 16 & 255] << 16 | o[c >>> 8 & 255] << 8 | o[255 & d]) ^ n[p++], e[t] = _, e[t + 1] = w, e[t + 2] = f, e[t + 3] = m
                },
                keySize: 8
            });
            e.AES = t._createHelper(n)
        }();
    var it = rt,
        ot = {
            stringify: function(e) {
                var t = {
                    ct: e.ciphertext.toString(it.enc.Base64)
                };
                return e.iv && (t.iv = e.iv.toString()), e.salt && (t.s = e.salt.toString()), JSON.stringify(t).replace(/\s/g, "")
            },
            parse: function(e) {
                var t = JSON.parse(e),
                    n = it.lib.CipherParams.create({
                        ciphertext: it.enc.Base64.parse(t.ct)
                    });
                return t.iv && (n.iv = it.enc.Hex.parse(t.iv)), t.s && (n.salt = it.enc.Hex.parse(t.s)), n
            }
        };
    var lt = e => {
        let t = "";
        if (!e.type) return t;
        if (!e.marked || "undefined" == e.marked) return t;
        switch (e.type) {
            case "truefalse":
            case "single":
            case "survey":
                t = e.options[parseInt(e.marked)];
                break;
            case "multiple":
                if (t = "", (n = e.marked.split(",")).length)
                    for (let s = 0; s < n.length; s++) t += e.options[parseInt(n[s])] + (s + 1 < n.length ? " , " : "");
                break;
            case "sort":
            case "match":
                if ((n = e.marked.split(",")).length)
                    for (let s = 0; s < n.length; s++) "undefined" !== e.original_options[parseInt(n[s]) - 1] && null != e.original_options[parseInt(n[s]) - 1] && "" != e.original_options[parseInt(n[s]) - 1] || (e.original_options[parseInt(n[s]) - 1] = "____"), t += e.original_options[parseInt(n[s]) - 1] + (s + 1 < n.length ? " , " : "");
                break;
            case "select":
                if (t = "", (n = e.marked.split("|")).length)
                    for (let s = 0; s < n.length; s++) t += e.options[parseInt(n[s])] + (s + 1 < n.length ? " , " : "");
                break;
            case "fillblank":
            case "text":
                var n;
                if (t = "", (n = e.marked.split("|")).length)
                    for (let e = 0; e < n.length; e++) t += n[e] + (e + 1 < n.length ? " , " : "");
                break;
            case "largetext":
            case "smalltext":
                t = e.marked
        }
        return t
    };
    var ut = e => {
        let t = "";
        if (!e.type) return "";
        switch (e.type) {
            case "truefalse":
                t = e.correct ? window.wplms_course_data.translations.true : window.wplms_course_data.translations.false;
                break;
            case "single":
            case "survey":
                t = e.options[parseInt(e.correct) - 1];
                break;
            case "multiple":
                if (t = "", (n = e.correct.split(",")).length)
                    for (let s = 0; s < n.length; s++) t += e.options[parseInt(n[s]) - 1] + (s + 1 < n.length ? " , " : "");
                break;
            case "sort":
            case "match":
                if (t = "", (n = e.correct.split(",")).length)
                    for (let s = 0; s < n.length; s++) t += e.original_options[parseInt(n[s]) - 1] + (s + 1 < n.length ? " , " : "");
                break;
            case "select":
                if (t = "", (n = e.correct.split("|")).length)
                    for (let s = 0; s < n.length; s++) t += e.options[parseInt(n[s]) - 1] + (s + 1 < n.length ? " , " : "");
                break;
            case "fillblank":
            case "text":
            case "largetext":
            case "smalltext":
                var n;
                if (t = "", (n = e.correct.split("|")).length)
                    for (let e = 0; e < n.length; e++) t += n[e] + (e + 1 < n.length ? " , " : "")
        }
        return t
    };

    function ct(e) {
        if (null == e) return !0;
        if (void 0 === e) return !0;
        if ("number" == typeof e) return !1;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    }
    var dt = (e, t = null, n = null, s = null, a = !0) => {
        s && (s = parseFloat(s)), n || (s = null);
        let r = 0,
            i = [],
            o = 0;
        e.user_marks = 0;
        let l = 0,
            u = null;
        ct(e.correct) || (u = JSON.parse(it.AES.decrypt(e.correct, e.key, {
            format: ot
        }).toString(it.enc.Utf8))), e.correct = u, e.marked_answer && "undefined" != e.marked_answer || (e.marked_answer = null);
        let c = e.marked_answer;
        switch (e.type) {
            case "truefalse":
                e.marked = c, e.correct = parseInt(u), c == u ? (e.user_marks = e.marks, r = 1) : e.user_marks = 0, i.push(u);
                break;
            case "single":
                e.marked = c, c == u - 1 ? (e.user_marks = e.marks, r = 1) : e.user_marks = 0, i.push(u - 1);
                break;
            case "multiple":
                ct(c) && (c = []);
                var d = c;
                e.marked = c.join(",").slice();
                var m = u.split(",");
                if (i = m, t) {
                    if (d.length)
                        for (let e = 0; e < d.length; e++) {
                            let t = d[e] + 1;
                            t = t.toString(), -1 !== m.indexOf(t) ? o++ : l++
                        }
                    r = o / m.length, e.user_marks = Math.round(e.marks * r * 100) / 100
                } else if (d.length == m.length)
                    for (let t = 0; t < d.length; t++) {
                        e.user_marks = e.marks, r = 1;
                        let n = d[t] + 1;
                        if (n = n.toString(), -1 == m.indexOf(n)) {
                            e.user_marks = 0, r = 0;
                            break
                        }
                    }
                break;
            case "match":
            case "sort":
                ct(c) && (c = []), e.marked = c.join(",").slice();
                let n = c,
                    s = u.split(","),
                    a = 0;
                if (n && n.length) {
                    for (let t = 0; t < n.length; t++) {
                        e.user_marks = e.marks, r = 1;
                        let u = "";
                        ct(n[t]) || (u = n[t].toString()), s[t] != u ? (r && (e.user_marks = 0, r = 0, a = 1), l++) : (o++, i.push(t))
                    }
                    t ? (r = o / s.length, e.user_marks = Math.round(e.marks * r * 100) / 100) : a && (e.user_marks = 0, r = 0)
                }
                break;
            case "fillblank":
                ct(c) && (c = []), c.map((e, t) => {
                    c[t] = e.toLowerCase()
                }), e.marked = c.join("|").slice(), u = u.toLowerCase();
                let p = u.split("|");
                if (e.user_marks = 0, c.length) {
                    e.user_marks = e.marks, r = 1;
                    for (let t = 0; t < c.length; t++) {
                        let n = "";
                        ct(c[t]) || (n = c[t].toString());
                        let s = [];
                        ct(p[t]) || Array.isArray(p[t]) || (s = p[t].split(",")), -1 == s.indexOf(n) ? (r && (e.user_marks = 0, r = 0), l++) : (o++, i.push(t))
                    }
                    t ? (r = o / p.length, e.user_marks = Math.round(e.marks * r * 100) / 100) : c.length !== p.length && (e.user_marks = 0, r = 0)
                }
                break;
            case "select":
                ct(c) && (c = []), e.marked = c.join("|").slice();
                let h = u.split("|");
                if (e.user_marks = 0, c && c.length) {
                    e.user_marks = e.marks, r = 1;
                    for (let t = 0; t < c.length; t++) {
                        let n = "";
                        n = (parseInt(c[t]) + 1).toString(), n != h[t] ? (r && (e.user_marks = 0, r = 0), l++) : (o++, i.push(t))
                    }
                    t ? (r = o / h.length, e.user_marks = Math.round(e.marks * r * 100) / 100) : c.length !== h.length && (e.user_marks = 0, r = 0)
                }
                break;
            case "smalltext":
            case "largetext":
                e.marked = c, c && u && c.toLowerCase() == u.toLowerCase() ? (e.user_marks = e.marks, r = 1) : e.user_marks = 0
        }
        if (!ct(c) && s && (t && l > 0 ? e.user_marks = e.user_marks - l * s : r || (e.user_marks = e.user_marks - s)), e.auto || a || (e.user_marks = 0, e.show_correct_answer = 0), i && i.length)
            for (var p = i.length - 1; p >= 0; p--) "multiple" == e.type ? i[p] = parseInt(i[p] - 1) : i[p] = parseInt(i[p]);
        return e.correct_indexes = i, e.auto && (e.usercorrect = r, e.attempted = !0), e.marked = lt(e), e.correct = ut(e), e
    };
    const {
        createElement: mt,
        render: pt,
        useState: ht,
        useEffect: _t,
        Fragment: wt,
        RawHTML: ft
    } = wp.element;
    var vt = e => {
        const [t, n] = ht({}), [s, a] = ht(!1);
        _t(() => {
            n(e.question), setTimeout(() => {
                a(!0)
            }, 200)
        }, []);
        let r = "incorrect",
            i = "checked_answer incorrect";
        return t.hasOwnProperty("user_marks") && t.user_marks && parseFloat(t.user_marks) > 0 && (r = "correct", i = "checked_answer correct"), mt(wt, null, t.show_correct_answer ? mt("div", {
            className: i
        }, mt("strong", null, window.wplms_course_data.translations.correct_answer, mt(ft, null, t.correct))) : "", mt("div", {
            className: s ? "question_wrapper loaded" : "question_wrapper"
        }, mt("div", {
            className: "result"
        }, mt("div", {
            className: r
        }, mt("span", null), mt("strong", null, t.user_marks)))))
    };
    const {
        createElement: gt,
        render: yt,
        useState: bt,
        useEffect: kt,
        Fragment: xt
    } = wp.element;
    var qt = e => {
        let t = "",
            n = "";
        return kt(() => {}, [e.question]), e.question.hasOwnProperty("show_hint") && e.question.show_hint ? (n = "question_hint_content message show", t = "question_hint show") : (e.question.show_hint = 0, n = "question_hint_content message", t = "question_hint"), gt(xt, null, e.question.hint ? gt("span", {
            className: t,
            onClick: t => {
                e.question.show_hint = !e.question.show_hint, e.update({
                    ...e.question
                }, e.index, "changed")
            }
        }) : "", e.question.hint ? gt("span", {
            className: n,
            dangerouslySetInnerHTML: {
                __html: e.question.hint
            }
        }) : "")
    };
    const {
        createElement: St,
        render: Nt,
        useState: Ot,
        useEffect: Et,
        Fragment: zt
    } = wp.element;
    var Pt = e => {
        const [t, n] = Ot({}), [s, a] = Ot([]);
        Et(() => {
            n(e.quiz), a(e.currentQuestions)
        }, [e.quiz, e.currentQuestions]);
        let r = [];
        if (t.hasOwnProperty("meta") && t.meta.hasOwnProperty("questions") && t.meta.questions && t.meta.questions.length && (r = t.meta.questions), r.length)
            if (null !== e.filter) switch (e.filter) {
                case "wrong":
                    r = r.filter(e => !e.hasOwnProperty("user_marks") || !e.user_marks || parseFloat(e.user_marks) <= 0);
                    break;
                case "correct":
                    r = r.filter(e => e.hasOwnProperty("user_marks") && e.user_marks && parseFloat(e.user_marks) > 0);
                    break;
                case "bookmarked":
                    r = r.filter(t => e.bookMarked.indexOf(t.id) > -1)
            } else r = t.meta.questions;
        return St("div", {
            className: "quiz_timeline"
        }, St("div", {
            class: t && t.meta && t.meta.questions && t.meta.questions.length >= 10 ? "timeline_wrapper question_numbers" : "timeline_wrapper"
        }, St("ul", null, t && t.meta && t.meta.questions && t.meta.questions.length ? r.map((n, r) => {
            let i = "";
            return e.bookMarked.indexOf(n.id) > -1 && (i += " bookmarked"), ("undefined" != n.marked_answer && null != n.marked_answer || Array.isArray(n.marked_answer) && n.marked_answer.length) && (i += " done", n.hasOwnProperty("attempted") && n.attempted && (n.hasOwnProperty("user_marks") && n.user_marks && parseFloat(n.user_marks) > 0 ? i += " correct" : i += " incorrect")), -1 !== s.indexOf(r) && (i += " active"), St("li", {
                className: i,
                "data-number": window.wplms_course_data.translations.question_prefix + (r + 1)
            }, St("span", {
                onClick: n => {
                    ((n, r, i) => {
                        n.preventDefault();
                        let o = [...s],
                            l = [];
                        if (t.question_number && "undefined" != t.question_number && t.question_number > 0) {
                            if (-1 !== o.indexOf(i)) return;
                            let e = Math.ceil((i + 1) / t.question_number),
                                n = e * t.question_number - t.question_number,
                                s = e * t.question_number;
                            for (let e = n; e < s; e++) l.push(e);
                            a(l)
                        }
                        e.update(l, "show")
                    })(n, 0, r)
                }
            }, n.marks))
        }) : "", t && t.meta && t.meta.questions && t.meta.questions.length ? St("span", {
            className: "hide_questions",
            onClick: e.hideQuestions
        }, St("span", {
            class: "vicon vicon-angle-double-left"
        }), St("span", null, window.wplms_course_data.translations.hide_questions)) : "")))
    };
    const {
        createElement: Ct,
        render: Mt,
        useState: It,
        useEffect: Tt,
        Fragment: Lt
    } = wp.element;
    const {
        createElement: jt,
        render: At,
        useState: Dt,
        useEffect: Ht,
        Fragment: Ft
    } = wp.element;
    var Bt = e => {
        const [t, n] = Dt({}), [s, a] = Dt([]), [r, i] = Dt(1);
        Ht(() => {
            if (n(e.quiz), a(e.currentQuestions), e.currentQuestions.length) {
                let t = Math.ceil((e.currentQuestions[0] + 1) / e.quiz.question_number);
                i(t)
            }
            const t = document.createElement("script");
            t.src = "https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js", t.async = !0, t.onload = () => {
                document.dispatchEvent(new Event("VibeBP_Editor_Content"))
            }, document.body.appendChild(t)
        }, [e.quiz, e.currentQuestions]), Ht(() => {
            n(e.quiz), o(null, 1)
        }, [e.filter]), Ht(() => {
            "bookmarked" == e.filter && e.questions.length && s.length && e.questions.length <= s[s.length - 1] && o(null, e.questions.length)
        }, [e.bookMarked]);
        const o = (n, s) => {
                if (n && n.preventDefault(), r === s) return;
                let o = [],
                    l = s * t.question_number - t.question_number,
                    u = s * t.question_number;
                for (let e = l; e < u; e++) o.push(e);
                a(o), e.update(o, "show"), i(s)
            },
            l = (n = null, i) => {
                n && n.preventDefault();
                let o = [...s],
                    l = [];
                if (t.question_number && "undefined" != t.question_number && t.question_number > 0)
                    if (i > 0) {
                        let n;
                        n = t.question_number + o[o.length] > e.questions.length ? e.questions.length : o[o.length - 1] + t.question_number + 1;
                        for (let e = o[o.length - 1] + 1; e < n; e++) l.push(e);
                        let s = r;
                        s++, a(l)
                    } else {
                        for (let e = o[0] - 1; e >= o[0] - t.question_number; e--) l.unshift(e);
                        let e = r;
                        e--, a(l)
                    } e.update(l, "show")
            };

        return t && t.meta && e.questions && e.questions.length ? jt("div", {
            className: "footer_parent"
        }, jt("div", {
            className: t.submitted ? "pagination_merge submitted" :  "pagination_merge"
        }, jt("span", {
            className: "pagination_pagetext"
        },s[0] + 1 + " of " + e.questions.length + " Questions"), jt("div", {
            class:"quiz_pagination_wrapper buttons has-addons"
        }, e.questions[s[0] - 1] && "undefined" != e.questions[s[0] - 1] ? jt("span", {
            href: "#",
            className: t.submitted ? "button ques_link left prevq" : "prev_btn",
            onClick: t => {
                l(t, -1)
            }
        }, jt("i", {
            className: "vicon vicon-angle-left",
            "aria-hidden": "true"
        },t.submitted ? '' : "Previous")) : jt("span", {
            href: "#",
            className: t.submitted ? "button ques_link left prevq faded" : "prev_btn"
        }, jt("i", {
            className: "vicon vicon-angle-left",
            "aria-hidden": "true"
        },t.submitted ? '' : "Previous")), 
        t.submitted ? (() => {
            let n = Math.ceil(e.questions.length / t.question_number),
                s = n,
                qq = e.questions,
                a = [],
                i = 0;
            if (n > 1)
                for (; n;)
                    if (n) {
                        const quiz_question_result = [];
                        qq.map(function(key,result){
                            if(key.usercorrect && key.usercorrect != 0){
                                quiz_question_result.push(1);
                            }
                            else if(key.marked_answer == null && key.usercorrect == 0){
                                quiz_question_result.push(2);
                            }
                            else if(key.usercorrect == 0){
                                quiz_question_result.push(0);
                            }
                        })
                        let e = n;
                        r == e ? a.unshift(jt("span", {
                            className: quiz_question_result[e-1] === 1 ? 'button user-correct active' :quiz_question_result[e-1] === 2 ? 'button unattempted active' : quiz_question_result[e-1] === 0 ? 'button user-incorrect active' : 'button active',
                            onClick: t => {
                                o(t, e)
                            }
                        }, n)) : (r - 1 >= 1 || r + 1 <= s) ? a.unshift(jt("span", {
                            className: quiz_question_result[e-1] === 1 ? 'button correct' : quiz_question_result[e-1] === 2 ? 'button unattempt' : quiz_question_result[e-1] === 0 ? 'button incorrect' : 'button',
                            onClick: t => {
                                o(t, e)
                            }
                        }, n)) : i < 5 && (a.unshift(jt("span", {
                            className: "button"
                        }, "...")), i++), n--
                    } return a
        })() : "", e.questions[s[s.length - 1] + 1] && "undefined" != e.questions[s[s.length - 1] + 1] ? jt("span", {
            href: "#",
            className: t.submitted ? "button ques_link right nextq" : "next_btn",
            onClick: e => {
                l(e, 1)
            }
        },t.submitted ? '' : "Next", jt("i", {
            className: "vicon vicon-angle-right",
            "aria-hidden": "true"
        })) : jt("span", {
            href: "#",
            className: t.submitted ? "button ques_link right nextq faded" : "next_btn"
        },t.submitted ? '' : "Next", jt("i", {
            className: "vicon vicon-angle-right",
            "aria-hidden": "true"
        })))), t.submitted && t.next_unit != null ? jt("div", {
            className: "next_unit_button",
            onClick: () => {
                document.getElementById("navigate_unit").click(); 
            } 
        },"Next Unit") : "") : ""
    };
    const {
        createElement: Rt,
        render: $t,
        useState: Jt,
        useEffect: Wt,
        Fragment: Ut,
        RawHTML: Yt
    } = wp.element;
    var Xt = e => Rt(Ut, null, e.active ? Rt("div", {
        className: "confirmpopup_wrapper submitpopup_wrapper"
    }, Rt("div", {
        className: "confirmpopup_content"
    }, Rt("div", {
        className: "modal-header"
    }, Rt("div", {
        className: "header-close",
        onClick: t => {
            e.update(e.type, "nottrigger")
        }
    }), Rt("div", {
        className: "header-logo"
    }),Rt("div", {
        className: "submitheading",
        dangerouslySetInnerHTML: {
            __html: e.content
        }
    })), Rt("div", {
        className: "submit_info"
    },Rt("div", {
        className: "left_scoring"
    }, Rt("div", {
        className: "quiz-text",
        dangerouslySetInnerHTML: {
            __html: "<span class='text'>Question(s) Answered<span>"
        }
    }), Rt("div", {
        className: "score",
        dangerouslySetInnerHTML: {
            __html: "<span class='question-attempt'>"+parseInt(e.MarkedAnswer)+"</span>" + '/' + e.QuestionCount
        }
    })), Rt("div", {
        className: "right_icon"
    })), Rt("div", {
        className: "buttons_wrapper"
    },
    Rt("span", {
        className: "button cancel_button",
        onClick: t => {
            e.update(e.type, "nottrigger")
        }
    }, e.no),Rt("span", {
        className: "button submit_button",
        onClick: t => {
            document.getElementById("quiz_questions_content").classList.add("quiz_after_submitted");
            e.yesfunction, e.update(e.type, "trigger")

        }
    }, e.yes)))) : "");
    const {
        createElement: Vt,
        render: Qt,
        useState: Kt,
        useEffect: Gt,
        Fragment: Zt
    } = wp.element;

    function en(e) {
        if (null == e) return !0;
        if (void 0 === e) return !0;
        if ("number" == typeof e) return !1;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    }
    var tn = e => {
        const [t, n] = Kt(e.quiz), [s, a] = Kt(!1), [r, i] = Kt(""), [o, l] = Kt({}), [u, c] = Kt({});
        return Gt(() => {
            let t = 0,
                n = 0,
                s = 0,
                a = 0;
            if (e.quiz && e.quiz.meta && e.quiz.meta.questions && (e.quiz.meta.questions.map((e, r) => {
                    e.hasOwnProperty("usercorrect") && e.hasOwnProperty("marked_answer") && !en(e.marked_answer) ? parseInt(e.usercorrect) > 0 ? t++ : n++ : s++, a++
                }), c({
                    correct: t,
                    incorrect: n,
                    ommitted: s
                }), "" != r)) {
                let e = {
                        datasets: [{
                            data: [t, n, s],
                            backgroundColor: ["#82c362", "#dc6a6a", "#5381ab"]
                        }],
                        labels: [window.wplms_course_data.translations.correct + " (" + t + ") (" + Math.round(t / a * 100) + "%)", window.wplms_course_data.translations.incorrect + " (" + n + ") (" + Math.round(n / a * 100) + "%)", window.wplms_course_data.translations.unattempted + " (" + s + ") (" + Math.round(s / a * 100) + "%)"]
                    },
                    i = new Chart(r, {
                        type: "pie",
                        data: e
                    });
                l(i)
            }
        }, [r]), Vt("div", {
            className: "quiz_stats_chart"
        }, t && t.meta && t.meta.questions && t.meta.questions.length && t.submitted ? Vt(Zt, null, o && u ? Vt("div", {
            className: "quiz_stats_chart_pie"
        }, Vt("canvas", {
            ref: e => {
                e && "" == r && i(e)
            }
        })) : "", Vt("div", {
            className: "question_stats_content_wrapper"
        }, Vt("span", {
            className: "question_stats_content_heading"
        }, window.wplms_course_data.translations.historical), Vt("div", {
            className: "question_stats_content"
        }, t.meta.questions.map((e, t) => {
            if (e.hasOwnProperty("correct_data")) return Vt("div", {
                className: e.hasOwnProperty("user_marks") && e.user_marks && parseFloat(e.user_marks) > 0 ? "checked_answer correct" : "checked_answer incorrect"
            }, Vt("span", null, window.wplms_course_data.translations.q, t + 1), Vt("span", null, e.correct_data, "%"))
        })), t.hasOwnProperty("tags_data") && !en(t.tags_data) ? Vt(Zt, null, Vt("span", {
            className: "question_stats_content_heading"
        }, window.wplms_course_data.translations.correct_by_tag), Vt("div", {
            className: "question_stats_content"
        }, t.tags_data.map(e => Vt("div", {
            className: "checked_answer correct"
        }, Vt("span", {
            dangerouslySetInnerHTML: {
                __html: e.label
            }
        }), Vt("span", null, e.value, "%"))))) : "")) : "")
    };
    const {
        createElement: nn,
        render: sn,
        useState: an,
        useEffect: rn,
        Fragment: on
    } = wp.element, {
        dispatch: ln,
        select: un
    } = wp.data;
    var cn = e => {
        const [t, n] = an([]), [s, a] = an(null), [r, i] = an(!0), [o, l] = an(null), [u, c] = an(!1);
        rn(() => {
            let e = un("vibebp").getToken();
            ! function(e) {
                if (null == e) return !0;
                if ("number" == typeof e) return !0;
                if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
                for (var t in e)
                    if (e.hasOwnProperty(t)) return !1;
                return !0
            }(e) ? (d(e), a(e)) : localforage.getItem("bp_login_token").then(t => {
                e = t, d(e), a(e)
            })
        }, [e.quizid]);
        const d = t => {
            fetch(window.wplms_course_data.api_url + "/user/quiz/previousresults/" + e.quizid, {
                method: "post",
                body: JSON.stringify({
                    token: t
                })
            }).then(e => e.json()).then(e => {
                e && e.length && n(e), i(!1)
            })
        };
        return r ? "" : nn("div", {
            className: "previous_results_wrapper"
        }, nn("h3", {
            className: "subtitle",
            onClick: () => {
                c(!u)
            }
        }, nn("span", null, window.wplms_course_data.translations.previous_results), " ", nn("span", {
            className: u ? "vicon vicon-minus" : "vicon vicon-plus"
        })), u ? o && o.hasOwnProperty("id") ? nn("div", {
            className: "single_quiz_result quiz_results"
        }, nn("span", {
            className: "vicon vicon-angle-left",
            onClick: () => {
                l(null)
            }
        }), nn(Pn, {
            quizid: e.quizid,
            activity: o.id
        })) : nn("div", null, t.length ? nn("ul", {
            className: "quiz_results"
        }, t.map(e => nn("li", {
            className: "result",
            onClick: () => {
                l(e)
            }
        }, nn("span", {
            dangerouslySetInnerHTML: {
                __html: e.content
            }
        })))) : nn("div", {
            className: "vbp_message message"
        }, window.wplms_course_data.translations.results_not_available)) : "")
    };
    const {
        createElement: dn,
        useState: mn,
        useEffect: pn,
        Fragment: hn,
        render: _n,
        useRef: wn
    } = wp.element, {
        dispatch: fn,
        select: vn
    } = wp.data;
    const {
        createElement: gn,
        render: yn,
        useState: bn,
        useEffect: kn,
        useCallback: xn,
        useRef: qn,
        Fragment: Sn,
        useLayoutEffect: Nn
    } = wp.element, {
        dispatch: On,
        select: En
    } = wp.data;

    function zn(e) {
        if (null == e) return !0;
        if ("number" == typeof e) return !0;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    }
    var Pn = e => {
            const [t, n] = bn({}), [s, a] = bn("quiz"), [r, i] = bn([]), o = qn(null), l = qn(null), [u, c] = bn({}), [d, m] = bn("up"), [h, _] = bn(!1), [w, f] = bn(!1), [v, g] = bn(!1), [y, b] = bn(!0), [k, x] = bn(null), [q, S] = bn(null), [N, O] = bn([]), [E, z] = bn([]);
            kn(() => {
                let t = En("vibebp").getToken();
                zn(t) ? localforage.getItem("bp_login_token").then(e => {
                    t = e, L(t), x(t)
                }) : (L(t), x(t)), document.addEventListener("wplms_answer_question_type", ({
                    detail: e
                }) => {
                    j(e.question, e.index, "changed")
                }), localforage.getItem("bookmarked_questions_" + e.quizid).then(e => {
                    e && e.length && O(JSON.parse(e))
                })
            }, [e.quizid]);
            const P = (C = e => {
                let t = window.scrollY;
                if (!l || !l.current) return;
                let n = l.current.getBoundingClientRect();
                void 0 !== e.target.scrollTop ? (t = e.target.scrollTop, o && o.current < t ? (m("down"), console.log("-")) : n.top < t && m("up")) : o && o.current > t ? m("up") : n.top <= t && m("down"), o.current = t
            }, M = 200, function() {
                var e = this,
                    t = arguments,
                    n = function() {
                        T = null, I || C.apply(e, t)
                    },
                    s = I && !T;
                clearTimeout(T), T = setTimeout(n, M), s && C.apply(e, t)
            });
            var C, M, I, T;
            Nn(() => {
                if (!s) {
                    if (document.querySelector(".course_status")) return document.querySelector(".course_status").addEventListener("scroll", P, {
                        passive: !1
                    }), () => {
                        document.querySelector(".course_status").removeEventListener("scroll", P)
                    };
                    if (document.querySelector(".incourse")) return window.addEventListener("scroll", P, {
                        passive: !1
                    }), () => {
                        window.removeEventListener("scroll", P)
                    }
                }
            });
            const L = (t = null) => {
                    t || (t = k), a("quiz");
                    let s = {
                        token: t
                    };
                    e.hasOwnProperty("activity") && e.activity && (s.activity = e.activity), fetch(window.wplms_course_data.api_url + "/user/quiz/" + e.quizid, {
                        method: "post",
                        body: JSON.stringify(s)
                    }).then(e => e.json()).then(e => {
                        if (e) {
                            jQuery('.attempt-number').text(e.meta.retakes);
                            if(e.meta.retakes == 0 && e.submitted){
                                jQuery('.right-info').addClass('show-right-info');
                                jQuery('.attempt-number').removeClass('correct');
                                jQuery('.attempt-number').addClass('incorrect');
                            }
                            else if(e.meta.retakes > 0 && e.quiz_points > 0 && e.is_event_type == 1){
                                jQuery('.right-info').removeClass('show-right-info');
                            }
                            // if(e.meta.retakes > 0){
                            //     jQuery('.right-info').addClass('show-right-info');
                            // }
                            // else{
                            //     jQuery('.right-info').removeClass('show-right-info');
                            // }
                            console.log(e.submitted);
                            console.log(e);
                            if(e.submitted != undefined && e.submitted == true && e.quiz_points > 0){
                                jQuery('.right-info').addClass('show-right-info');
                            }
                            if (S(null), e.meta && e.meta.questions) {
                                let t = 0,
                                    s = 0;
                                if ("object" == typeof e.meta.questions && !Array.isArray(e.meta.questions)) {
                                    let t = [];
                                    Object.keys(e.meta.questions).map(n => {
                                        "object" == typeof e.meta.questions[n] && (e.meta.questions[n].id = n, t.push(e.meta.questions[n]), t.id = n)
                                    }), e.meta.questions = t
                                }
                                e.meta.questions.map((n, a) => {
                                    if (n.raw) e.meta.questions[a] = n.raw;
                                    else {
                                        e.meta.questions[a].show = !1;
                                        let t = localStorage.getItem(n.id);
                                        !zn(t) && zn(n.marked_answer) && (! function(e) {
                                            try {
                                                JSON.parse(e)
                                            } catch (e) {
                                                return !1
                                            }
                                            return !0
                                        }(t) ? n.marked_answer = t : n.marked_answer = JSON.parse(t)), n.attempted && (e.meta.questions[a].correct = JSON.parse(it.AES.decrypt(n.correct, n.key, {
                                            format: ot
                                        }).toString(it.enc.Utf8)), n.correct = ut(n))
                                    }
                                    t += parseFloat(n.marks), s += parseInt(n.max_marks)
                                }), Number.isInteger(t) || (t = t.toFixed(2)), e.marks = t, e.max_marks = s, e.question_number = parseInt(e.question_number);
                                let a = [];
                                if (e.question_number && e.question_number > 0)
                                    for (let t = 0; t < e.question_number; t++) a.push(t);
                                i(a), n(e)
                            }
                            e.remaining && e.remaining <= 0 && F(e, t);
                            var s = document.createEvent("Event");
                            s.initEvent("unit_traverse", !1, !0), document.querySelector(".unit_content") && document.querySelector(".unit_content") && document.querySelector(".unit_content").dispatchEvent(s)
                        } else console.log(e);
                        a(!1)
                    })
                },
                j = (e, s, a) => {
                    if ("changed" == a) {
                        let a = {
                            ...t
                        };
                        a.meta.questions[s] = e, n(a), zn(e.marked_answer) ? null == e.marked_answer && localStorage.removeItem(e.id) : "object" == typeof e.marked_answer || Array.isArray(e.marked_answer) ? localStorage.setItem(e.id, JSON.stringify(e.marked_answer)) : localStorage.setItem(e.id, e.marked_answer)
                    }
                },
                D = (e, t) => {
                    "show" == t && i(e)
                },
                H = () => {
                    a("start");
                    let e = {
                        ...t
                    };
                    e.start = !0, t.remaining && t.remaining > 0 ? (a(!1), n(e)) : fetch(window.wplms_course_data.api_url + "/user/quiz/start", {
                        method: "POST",
                        body: JSON.stringify({
                            quiz_id: e.id,
                            token: k
                        })
                    }).then(e => e.json()).then(t => {
                        a(!1), n(e)
                    })
                },
                F = (s = null, r = null) => {
                    O([]), localforage.removeItem("bookmarked_questions_" + e.quizid), s || (s = t), r || zn(k) || (r = k), a("submit");
                    let i = {
                            ...s
                        },
                        o = 0,
                        l = 0;
                    if (i.meta && i.meta.questions && i.meta.questions.length)
                        for (let e = 0; e < i.meta.questions.length; e++) i.meta.questions[e].attempted || (i.meta.questions[e] = dt(i.meta.questions[e], t.partial_marking, t.negative_marking, parseFloat(t.negative_marks), !1)), i.meta.questions[e].content = i.meta.questions[e].original_content, i.meta.questions[e].auto || (i.meta.questions[e].user_marks = 0), o += parseFloat(i.meta.questions[e].user_marks), l += parseInt(i.meta.questions[e].marks), localStorage.removeItem(i.meta.questions[e].id);
                    i.marks = o.toFixed(2), i.max_marks = l, fetch(window.wplms_course_data.api_url + "/user/submitresult/", {
                        method: "POST",
                        headers: {
                            Accept: "application/json",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            quiz_id: i.id,
                            course_id: i.course_id,
                            results: i.meta.questions,
                            quiz: i,
                            token: r,
                            correct_answer_based_percent : parseInt(correct_answer_based_percent),
                            total_retakes : t.meta.total_retakes,
                            retakes : t.meta.retakes,
                            quiz_attempt1_points : quiz_attempt1_points,
                            quiz_attempt2_points : quiz_attempt2_points,
                            quiz_attempt3_points : quiz_attempt3_points,
                            quiz_attempt_1_wrong_points:
                            quiz_attempt_1_wrong_points,
                            event_quiz_type:event_quiz_type
                        })
                    }).then(e => e.json()).then(t => {
                        if (t) {
                            if (a(!1), i.submitted = !0, i.start = !1, t.check_results_url && (i.check_results_url = t.check_results_url), t.completion_message && (i.meta.completion_message = t.completion_message), t.retake_html && (i.retake_html = t.retake_html), i.meta && i.meta.questions && i.meta.questions.length && !zn(t.correct_data))
                                for (let e = 0; e < i.meta.questions.length; e++) t.correct_data.hasOwnProperty(i.meta.questions[e].id) && (i.meta.questions[e].correct_data = t.correct_data[i.meta.questions[e].id]);
                            t.hasOwnProperty("tags_data") && (i.tags_data = t.tags_data), n(i);
                            var s = document.createEvent("Event");
                            if (s.initEvent("unit_traverse", !1, !0), i.hasOwnProperty("quiz_passing_score") && i.quiz_passing_score ? t.hasOwnProperty("continue") && t.continue && e.hasOwnProperty("update") && e.update("quizsubmitted") : e.hasOwnProperty("update") && e.update("quizsubmitted"), document.querySelector(".unit_content") && document.querySelector(".unit_content")) {
                                document.querySelector(".unit_content").dispatchEvent(s);
                                var r = new CustomEvent("react_quiz_submitted", {
                                    detail: {
                                        next_unit: t.next_unit
                                    }
                                });
                                document.dispatchEvent(r)
                            }
                            if(t.quiz_points_credit > 0){
                                var prev_creds = jQuery('.point-number').text();
                                var total_creds = parseInt(prev_creds) + parseInt(t.quiz_points_credit);
                                jQuery('.point-number').text(total_creds);
                                var point_toast = "You just earned "+t.quiz_points_credit+" Points"
                                jQuery('#point-text').text(point_toast);

                                jQuery('.point-toaster').fadeIn();
                                jQuery('.point-toaster').fadeOut(10000);
                                jQuery('.result-show').text('PASSED');
                                jQuery('#result-display').removeClass("failed");
                                jQuery('#result-display').addClass("pass");
                                jQuery('#quiz_result_icon').removeClass("failed");
                                jQuery('.right-info').removeClass('show-right-info');
                                jQuery('.next_unit_button').removeClass('disabled');
                                jQuery('#retake-quiz').removeClass('hide-retake');
                                jQuery('#retake-quiz').addClass('button');
                            }
                            else{
                                jQuery('.right-info').addClass('show-right-info');

                            }
                            //jQuery('.right-info').addClass('show-right-info');
                            if(t.$is_event_type == 0){
                                jQuery('#quiz_result_icon').removeClass("failed");
                            }
                            jQuery('.attempt-number').text(t.retakes);
                            if(t.retakes == 0){
                                jQuery('.attempt-number').removeClass('correct');
                                jQuery('.attempt-number').addClass('incorrect');
                            }
                        }
                    })
                },
                B = (e, n) => {
                    switch (e.type) {
                        case "smalltext":
                            return gn($, {
                                question: e,
                                index: n,
                                update: j
                            });
                        case "single":
                            return gn(V, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "select":
                            return gn(te, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "multiple":
                            return gn(oe, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "fillblank":
                            return gn(ge, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "sort":
                            return gn(Ce, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "match":
                            return gn(Je, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "truefalse":
                            return gn(Qe, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        case "largetext":
                            return gn(at, {
                                question: e,
                                index: n,
                                update: j,
                                quiz_id: t.id
                            });
                        default:
                            return document.dispatchEvent(new CustomEvent("wplms_load_question_type", {
                                detail: {
                                    question: e,
                                    quiz_id: t.id,
                                    index: n
                                }
                            })), gn("div", {
                                "data-q": e.id,
                                className: e.type
                            })
                    }
                },
                R = (e, n) => {
                    if ("trigger" == n) switch (e) {
                        case "submit":
                            F(t), f(!1), g(!1);
                            break;
                        case "start":
                            H(), _(!1)
                    }
                    if ("nottrigger" == n) switch (e) {
                        case "submit":
                            f(!1), g(!1);
                            break;
                        case "start":
                            _(!1)
                    }
                };
            let J = 0;
            t.meta && t.meta.duration && (J = t.meta.duration), t && t.remaining && t.remaining > 0 && (J = t.remaining);
            let W = "",
                U = "loading_quiz";
            s || (W = "disabled", U += " disabled");
            let Y = window.wplms_course_data.translations.submit_quizes_confirm;
            if (t.meta && t.meta.questions) {
                let usercorrect = [];
                t.meta.questions.map(function(key,result){
                    if(key.usercorrect == 1){
                        usercorrect.push(key.usercorrect);
                    }
                })
                var UU = usercorrect.length;
                var total_question = t.meta.questions.length;
                var quiz_passing_score = t.quiz_passing_score;
                var quiz_attempt1_points = t.quiz_attempt_1_points;
                var quiz_attempt_1_wrong_points = t.quiz_attempt_1_wrong_points;
                var quiz_attempt2_points = t.quiz_attempt_2_points;
                var quiz_attempt3_points = t.quiz_attempt_3_points;
                var event_quiz_type = t.event_quiz_type;
                var correct_answer_based_percent = (t.quiz_passing_score/100)*t.meta.questions.length;
                var quiz_points_credit = 0;
                var quiz_attempt_number = 0;
                var is_quiz_retake = 1;
                if(parseInt(correct_answer_based_percent) <= UU)
                {   
                    var is_quiz_retake = 0;
                    if(t.meta.total_retakes == 2){ 
                        if(t.meta.retakes == t.meta.total_retakes){
                            var quiz_points_credit = UU * quiz_attempt1_points; 
                            quiz_attempt_number = 1;
                        }
                        else if(t.meta.retakes == 1){
                            var quiz_points_credit = UU * quiz_attempt2_points; 
                            quiz_attempt_number = 2;
                        }
                        else if(t.meta.retakes == 0){
                            quiz_attempt_number = 3;
                            var quiz_points_credit = UU * quiz_attempt3_points; 
                        }
                    }
                    else if(t.meta.total_retakes == 1){
                        if(t.meta.retakes == t.meta.total_retakes){
                            var quiz_points_credit = UU * quiz_attempt1_points; 
                            quiz_attempt_number = 1;
                        }
                        else if(t.meta.retakes == 0){
                            var quiz_points_credit = UU * quiz_attempt2_points; 
                            quiz_attempt_number = 2;
                        }
                    }
                }

                let e = 1;
                var unmarkedCount = t.meta.questions.reduce(function (n, result) {
                    return n + (result.marked_answer != null);
                }, 0);
                var questionCount = Object.keys(t.meta.questions).length;
                var CC = questionCount;
                var PP = unmarkedCount;
                t.meta.questions.map((function(t) {
                    t.marked_answer || (e = 0)
                })), e || (Y = window.wplms_course_data.translations.submit_quizes_confirm);
            }
            let X = [];
            if (t.hasOwnProperty("meta") && t.meta.hasOwnProperty("questions") && t.meta.questions && t.meta.questions.length && (X = t.meta.questions), X.length && null !== q) switch (q) {
                case "wrong":
                    X = X.filter(e => !e.hasOwnProperty("user_marks") || !e.user_marks || parseFloat(e.user_marks) <= 0);
                    break;
                case "correct":
                    X = X.filter(e => e.hasOwnProperty("user_marks") && e.user_marks && parseFloat(e.user_marks) > 0);
                    break;
                case "bookmarked":
                    X = X.filter(e => N.indexOf(e.id) > -1)
            }
            return "quiz" !== s ? gn(Sn, null, gn(Xt, {
                active: w,
                update: R,
                type: "submit",
                content: Y,
                MarkedAnswer : PP,
                QuestionCount : CC,
                yes: window.wplms_course_data.translations.submit_button,
                no: window.wplms_course_data.translations.cancel_button,
                yesfunction: "submitQuiz"
            }), ReactDOM.createPortal(gn(Xt, {
                active: v,
                MarkedAnswer : PP,
                QuestionCount : CC,
                update: R,
                type: "submit",
                content: window.wplms_course_data.translations.bookmark_confirm,
                yes: window.wplms_course_data.translations.submit_button,
                no: window.wplms_course_data.translations.cancel_button,
                yesfunction: "submitQuiz"
            }), document.querySelector("#quiz_popup")), gn(Xt, {
                active: h,
                update: R,
                type: "start",
                content: window.wplms_course_data.translations.start_quiz_confirm,
                yes: window.wplms_course_data.translations.yes,
                no: window.wplms_course_data.translations.no,
                yesfunction: "startQuiz"
            }),gn("div", {
                className: "incourse",
                id: "course_quiz_result"
            },t.submitted ? gn("div", {
                className: "show_result",
                id:"show_result"
            }, gn("div", {
                className: "show_quiz_result"
            },gn("div", {
                className: "quiz_result_details"
            },t.is_event_type == 1 && t.event_quiz_type != "video" ? gn("h1",null,"Quiz Result:",t.quiz_points > 0 && t.is_event_type ? gn("span", {
                className: "result-show pass"
            }, 'PASSED') : gn("span", {
                className: "result-show failed",
                id: "result-display"
            }, 'FAILED')) : gn("h1",null,"Quiz Result"),
            gn("span", {
                className: "quiz_result_heading"
            },"Correct Answers "),
                gn("span", {
                className: "score",
                dangerouslySetInnerHTML: {
                    __html: t.meta.auto ? "<span class='question-attempt'>"+UU+"</span>" + "/" + t.meta.questions.length : ""
                }
            }),
                // gn("span", {
                //     dangerouslySetInnerHTML: {
                //     __html: quiz_points_credit ? "<span class='points'>"+quiz_points_credit+"</span>" : ""
                // }

                // })
            ),t.is_event_type ? gn("div", {
                className: t.quiz_points > 0 && t.is_event_type ? "quiz_result_icon" : "quiz_result_icon failed",
                id:'quiz_result_icon'
            }) : gn("div", {
                className: "quiz_result_icon"
            }), Rt("div", {
                className: "buttons_wrapper"
            },
            Rt("span", {
                className: t.meta.retakes == 0 && t.event_quiz_type !='video' ? "button" : t.meta.retakes > 0 && t.quiz_points > 0 ? "button" : "hide-retake",
                id:"retake-quiz",
                onClick: () => {
                    document.getElementById('show_result').style.display = 'none';
                    document.getElementById("quiz_questions_content").classList.remove("quiz_after_submitted");
                }
            },"Review Quiz Questions"))), Rt("div", {
                className: "buttons_wrapper pull-right"
            }, !t.start && t.submitted && t.meta && t.meta.retakes && is_quiz_retake > 0 ? gn("div", {
                className: "quiz_retake",
                onClick: () => (a("retake"), void fetch(window.wplms_course_data.api_url + "/user/coursestatus/retake_single_quiz/" + e.quizid, {
                    method: "post",
                    body: JSON.stringify({
                        token: k
                    })
                }).then(e => e.json()).then(t => {
                    jQuery('.right-info').removeClass('show-right-info');
                    t && (t.status ? (L(), e.hasOwnProperty("update") && e.update("retake_quiz")) : t.message && (On("vibebp").addNotification({
                        icon: "",
                        text: t.message
                    }), a(!1)))
                }))
            }, gn("a", {
                className: "retake" === s ? "retake_quiz button is-primary is-loading" : "retake_quiz button is-primary"
            }, window.wplms_course_data.translations.retake), gn("strong", null, window.wplms_course_data.translations.retakes_left, " : ", t.meta.retakes)) : "",
            t.next_unit != null ? Rt("span", {
                className: t.meta.retakes != 0 && t.quiz_points == 0 && t.is_event_type ==1 ? "button next_unit_button disabled" : "button next_unit_button",
                onClick: () => {
                    document.getElementById("navigate_unit").click(); 
                }
            },"Next Unit") : t.next_unit == null && t.is_event_type == 1 ? Rt("span", {
                className: "button next_unit_button",
                onClick: () => {
                    window.location.href = window.wplms_course_data.home_url + '/event-dashboard'; 
                }
            },"Go to Dashboard") : '')) : '', gn("div", {
                className: U
            }, gn("div", {
                id: "ajaxloader",
                className: W
            })), e.hasOwnProperty("activity") ? t.submitted ? gn("h3", null, gn("span", {
                className: "student_score"
            }, t.meta.auto ? t.marks + "/" + t.max_marks : ""), t.quiz_passing_score ? gn("span", null, t.marks > t.quiz_passing_score ? window.wplms_course_data.translations.passed : window.wplms_course_data.translations.failed) : "") : "" : gn("div", {
                className: "up" == d ? "incoursequiz_details show_controls" : "incoursequiz_details hide_controls",
                ref: l
            }, gn("div", null, t.submitted ? gn("strong", {
                onClick: () => {
                    m("up" == d ? "down" : "up")
                }
            }, gn("span", {
                className: "student_score"
            }, t.meta.auto ? t.marks + "/" + t.max_marks : ""), t.quiz_passing_score ? gn("span",{
                className: "student_resultmsg"
            }, null, t.marks > t.quiz_passing_score ? window.wplms_course_data.translations.passed : window.wplms_course_data.translations.failed) : "", gn("span", {
                className: "student_quiz_status"
            }, window.wplms_course_data.translations.quiz_submitted)) : gn("div", {
                className: "quiztimer_wrapper",
                onClick: () => {
                    m("up" == d ? "down" : "up")
                }
            }, t && t.meta && t.meta.duration && parseInt(t.meta.duration) < 863913600 ? gn(A, {
                duration: J,
                update: (e, n) => {
                    "expired" == n && F(t)
                },
                quiz_id: t.id,
                start: t.start
            }) : gn("strong", null, window.wplms_course_data.translations.no_time_limit)), t && t.meta && t.meta.questions && t.meta.questions.length && !y ? gn("span", {
                className: "show_questions",
                onClick: () => b(!0)
            }, gn("span", null, window.wplms_course_data.translations.show_questions), gn("span", {
                className: "vicon vicon-angle-double-right"
            })) : "", t && t.meta && t.meta.questions && t.meta.questions.length && t.submitted ? gn("div", {
                className: "buttons has-addons small right_buttons"
            }, gn("a", {
                className: "correct" == q ? "button tip end is-focused" : "button tip",
                title: window.wplms_course_data.translations.show_correct_attempts,
                onClick: () => {
                    S("correct" != q ? "correct" : null)
                }
            }, gn("span", {
                className: "vicon vicon-check"
            })), gn("a", {
                className: "wrong" == q ? "button tip end is-focused" : "button tip",
                title: window.wplms_course_data.translations.show_wrong_attempts,
                onClick: () => {
                    S("wrong" != q ? "wrong" : null)
                }
            }, gn("span", {
                className: "vicon vicon-close"
            }))) : "", t && t.meta && t.meta.questions && t.meta.questions.length && N.length ? gn("div", {
                className: "buttons has-addons"
            }, gn("a", {
                className: "bookmarked" == q ? "button tip end is-focused" : "button tip",
                title: window.wplms_course_data.translations.show_bookmarked,
                onClick: () => {
                    S("bookmarked" != q ? "bookmarked" : null)
                }
            }, gn("span", {
                className: "vicon vicon-bookmark-alt"
            }))) : ""), y ? gn(Pt, {
                hideQuestions: () => b(!1),
                quiz: t,
                currentQuestions: r,
                update: D,
                filter: q,
                bookMarked: N
            }) : ""), gn("div", {
                className: !t.start && t.submitted ? "quiz_questions_content quiz_after_submitted" : "quiz_questions_content",
                id:"quiz_questions_content"
            },!t.submitted || t.meta && t.meta.retakes > 0 ? gn("div", {
                className: "incourse_quiz_button"
            }, t.start || t.submitted ? "" : t.remaining && t.remaining > 0 ? 
            gn("a", {
                className: "continue_quiz button is-primary",
                onClick: H
            }, window.wplms_course_data.translations.continue) : t.meta.hasOwnProperty("check_access") && t.meta.check_access.hasOwnProperty("status") && !t.meta.check_access.status ? gn("div", {
                className: "check_quiz",
                dangerouslySetInnerHTML: {
                    __html: t.meta.check_access.html
                }
            }) : gn("a", {
                className: "start" === s ? "start_quiz button full is-primary is-loading" : "start_quiz  full button is-primary",
                onClick: () => {
                    window.wplms_course_data.start_popup ? _(!0) : H()
                }
            }, window.wplms_course_data.translations.start), t.start && !t.submitted ? gn("a", {
                className: "save" === s ? "save_quiz button is-primary is-loading" : "save_quiz button is-primary",
                onClick: () => {
                    if (t.meta.questions && t.meta.questions.length) {
                        a("save");
                        let e = [];
                        t.meta.questions.map((t, n) => {
                            let s = {
                                ...t
                            };
                            null == s.marked_answer || "undefined" == s.marked_answer || zn(s.marked_answer) || t.attempted || (s.correct = ut(s), e.push(s))
                        }), fetch(window.wplms_course_data.api_url + "/user/savequiz", {
                            method: "POST",
                            body: JSON.stringify({
                                quiz_id: t.id,
                                questions: e,
                                token: k
                            })
                        }).then(e => e.json()).then(e => {
                            a(!1)
                        })
                    }
                }
            }, window.wplms_course_data.translations.save_quiz) : "", t.start && !t.submitted ? gn("a", {
                className: "submit" === s ? "submit_quiz button is-primary is-loading" : "submit_quiz button is-primary",
                onClick: () => {
                    window.wplms_course_data.submit_popup ? f(!0) : N.length ? g(!0) : F()
                }
            }, window.wplms_course_data.translations.submit) : "") : "", gn("div", {
                className: ""
            }, t.start || t.submitted ? "" : gn("div", {
                className: "quiz_content before_start",
                dangerouslySetInnerHTML: {
                    __html: t && t.content ? t.content+"<div class='spacing_lms'></div>" : "<div class='spacing_lms_empty'></div>"
                }
                
            }), !t.start && t.submitted ? gn("div", {
                className: ""
            }, gn("div", {
                className: "quiz_content after_start",
                dangerouslySetInnerHTML: {
                    __html: t.meta.completion_message
                }
            }), !t.start && t.submitted && t.retake_html ? gn("div", {
                dangerouslySetInnerHTML: {
                    __html: t.retake_html
                }
            }) : "") : "", t.start || !t.submitted || e.hasOwnProperty("activity") ? "" : gn(cn, {
                quizid: e.quizid
            }), t && t.meta && t.meta.questions && t.submitted && t.meta.auto && t.show_advance_stats && !e.hasOwnProperty("activity") ? gn(tn, {
                quiz: t
            }) : "", t && t.meta && X && (t.start || t.submitted) ? X.map((i, o) => {
                if (-1 === r.indexOf(o)) return;
                let l = "",
                    u = "";
                return i.hasOwnProperty("show_hint") && i.show_hint ? (u = "question_hint_content message show", l = "question_hint show") : (u = "question_hint_content message", l = "question_hint"), gn("div", {
                    className: "question"
                }, gn("div", {
                    className: "question_actions"
                }, gn("span", null, window.wplms_course_data.translations.question_full_prefix, " ", o + 1), gn("div",{
                    className: "marks_right"
                }, null, gn("span", {
                    className: "marks"
                }, gn("i", {
                    className: "vicon vicon-medall"
                }), i.marks), gn("span", {
                    className: E.indexOf(i.id) > -1 ? "is-loading" : i.flagged ? "flagged" : "flag",
                    onClick: () => {
                        ((e, s) => {
                            let a = [...E];
                            a.indexOf(e.id) <= -1 && a.push(e.id), z(a), fetch(window.wplms_course_data.api_url + "/user/question/flag/" + e.id, {
                                method: "post",
                                body: JSON.stringify({
                                    token: k,
                                    flagged: e.hasOwnProperty("flagged") && e.flagged
                                })
                            }).then(e => e.json()).then(r => {
                                if (r)
                                    if (r.status) {
                                        let r = a.indexOf(e.id);
                                        r > -1 && (a.splice(r, 1), z(a));
                                        let i = {
                                            ...t
                                        };
                                        i.meta.questions[s].flagged = !(e.hasOwnProperty("flagged") && e.flagged), n(i)
                                    } else r.message && On("vibebp").addNotification({
                                        icon: "",
                                        text: r.message
                                    })
                            })
                        })(i, o)
                    }
                }, gn("i", {
                    className: i.flagged ? "vicon vicon-flag-alt" : "vicon vicon-flag"
                })), i.hint ? gn("span", {
                    className: l,
                    onClick: e => {
                        let s = {
                            ...t
                        };
                        s.meta.questions[o].hasOwnProperty("show_hint") && s.meta.questions[o].show_hint ? s.meta.questions[o].show_hint = !1 : s.meta.questions[o].show_hint = !0, n(s)
                    }
                }) : "")), B(i, o), !t.submitted && t.start ? gn("span", {
                    className: "bookmark button",
                    onClick: () => {
                        (t => {
                            let n = [...N],
                                s = n.indexOf(t.id);
                            s <= -1 ? n.push(t.id) : n.splice(s, 1), localforage.setItem("bookmarked_questions_" + e.quizid, JSON.stringify(n)), O(n), n.length || "bookmarked" != q || S(null)
                        })(i)
                    }
                }, gn("i", {
                    className: N.indexOf(i.id) > -1 ? "vicon vicon-bookmark-alt" : "vicon vicon-bookmark"
                })) : "", i.attempted || !t.check_answer || t.submitted ? "" : gn("div", {
                    className: "checkanswer" === s ? "check_answer button is-primary is-loading" : "check_answer button is-primary",
                    onClick: e => {
                        ((e, s) => {
                            a("checkanswer");
                            let r = dt(e, t.partial_marking, t.negative_marking, parseFloat(t.negative_marks), !0),
                                i = {
                                    ...t
                                };
                            r.attempted = !0, i.meta.questions[s] = r, fetch(window.wplms_course_data.api_url + "/user/saveuserquestion", {
                                method: "POST",
                                headers: {
                                    Accept: "application/json",
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    quiz_id: i.id,
                                    question: r,
                                    token: k
                                })
                            }).then(e => e.json()).then(e => {
                                a(!1), n(i)
                            })
                        })(i, o)
                    }
                }, window.wplms_course_data.translations.check_answer), i.hint ? gn("span", {
                    className: u,
                    dangerouslySetInnerHTML: {
                        __html: i.hint
                    }
                }) : "", i.attempted ? gn(vt, {
                    question: i
                }) : "", i.attempted && i.show_correct_answer && i.explanation.length ? gn("div", {
                    className: "explanation"
                }, gn("div", {
                    className: "top_border"
                }), gn("strong", null, window.wplms_course_data.translations.question_explanation), gn("div", {
                    dangerouslySetInnerHTML: {
                        __html: i.explanation
                    }
                })) : "")
            }) : "", t && t.meta && t.meta.questions && (t.start || t.submitted) ? gn(Bt, {
                quiz: t,
                questions: [...X],
                currentQuestions: r,
                filter: q,
                update: D,
                bookMarked: N
            }) : "")))) : gn(p, null)
        },
        Cn = n(6),
        Mn = n.n(Cn);
    const {
        createElement: In,
        useState: Tn,
        useEffect: Ln,
        useRef: jn,
        Fragment: An,
        render: Dn
    } = wp.element, {
        dispatch: Hn,
        select: Fn
    } = wp.data, Bn = Math.round(100 * Math.random());
    var Rn = e => {
        const t = jn(null),
            [n, s] = Tn(!1),
            [a, r] = Tn(!1),
            [i, o] = Tn(""),
            [l, u] = Tn(""),
            [c, d] = Tn(""),
            [m, p] = Tn(""),
            [h, _] = Tn({
                x: 0,
                y: 0,
                width: 0,
                height: 0,
                type: "image"
            }),
            [w, f] = Tn(""),
            [v, g] = Tn(window.wplms_course_data.translations.select_image);
        Ln(() => {
            e.hasOwnProperty("crop") && e.crop && s(!0)
        }, []), Ln(() => {
            if (a && w && n) new Mn.a(w, {
                returnMode: "ratio",
                onCropEnd: function(t) {
                    let n = {
                        ...h
                    };
                    n.x = 100 * t.x, n.y = 100 * t.y, n.height = 100 * t.height, n.width = 100 * t.width, _(n);
                    let s = {
                        x: w.naturalWidth * t.x,
                        y: w.naturalHeight * t.y,
                        width: w.naturalWidth * t.width,
                        height: w.naturalHeight * t.height
                    };
                    e.update(m, s)
                }
            })
        }, [a, w]);
        h.x, h.y, h.width, h.height;
        return In("div", {
            className: "uploader"
        }, In("label", {
            for: "fileupload_" + Bn,
            className: "upload_file"
        }, v, "image" == e.type ? In("input", {
            id: "fileupload_" + Bn,
            "data-type": e.type,
            ref: t,
            type: "file",
            accept: "image/*",
            onChange: n => {
                t.current.files[0].size < window.wplms_course_data.settings.upload_limit ? (o(window.URL.createObjectURL(t.current.files[0])), p(t.current.files[0]), e.update(t.current.files[0], {
                    ...h,
                    key: "image"
                })) : (g(window.wplms_course_data.translations.image_size_error), setTimeout(() => {
                    g(window.wplms_course_data.translations.select_image)
                }, 3500))
            }
        }) : "video" == e.type ? In("input", {
            id: "fileupload_" + Bn,
            "data-type": e.type,
            ref: t,
            type: "file",
            accept: "video/*",
            onChange: n => {
                t.current.files[0].size < window.wplms_course_data.settings.upload_limit ? (u(window.URL.createObjectURL(t.current.files[0])), p(t.current.files[0]), e.update(t.current.files[0], {
                    ...h,
                    key: "video"
                })) : (g(window.wplms_course_data.translations.image_size_error), setTimeout(() => {
                    g(window.wplms_course_data.translations.select_image)
                }, 3500))
            }
        }) : In("input", {
            id: "fileupload_" + Bn,
            "data-type": e.type,
            ref: t,
            type: "file",
            onChange: n => {
                t.current.files && t.current.files[0] && (t.current.files[0].size < e.args.allowed_file_size ? -1 !== e.args.allowed_mime_types.indexOf(t.current.files[0].type) ? (d(window.URL.createObjectURL(t.current.files[0])), p(t.current.files), e.update(t.current.files, {
                    ...h,
                    key: "attachment"
                })) : (g(window.wplms_course_data.translations.image_type_error), setTimeout(() => {
                    g(window.wplms_course_data.translations.select_image)
                }, 3500)) : (g(window.wplms_course_data.translations.image_size_error), setTimeout(() => {
                    g(window.wplms_course_data.translations.select_image)
                }, 3500)))
            }
        })))
    };
    const {
        Component: $n,
        createElement: Jn,
        render: Wn,
        useState: Un,
        useEffect: Yn,
        Fragment: Xn
    } = wp.element;
    var Vn = e => {
        const [t, n] = Un(e.duration), [s, a] = Un({
            d: 0,
            h: 0,
            m: 0,
            s: 0
        });
        Yn(() => {
            if (e.start) {
                setTimeout(() => {
                    let s = t - 1;
                    s <= -1 ? e.update(e.quiz_id, "expired") : s >= 0 && (n(s), r())
                }, 1e3)
            } else n(e.duration), r()
        }, [t, e.start, e.duration]);
        const r = () => {
            let e = {
                    ...s
                },
                n = t;
            n > 86400 ? (e.d = Math.floor(n / 86400), n -= 86400 * e.d) : e.d = 0, n > 3600 ? (e.h = Math.floor(n / 3600), n -= 3600 * e.h) : e.h = 0, n > 60 ? (e.m = Math.floor(n / 60), n -= 60 * e.m) : e.m = 0, e.s = n, a(e)
        };
        let i = "c100 p0 big";
        if (t > -1) {
            let n = Math.floor((e.duration - t) / e.duration * 100);
            n <= 0 && (n = 1), i = "c100 p" + n + " big"
        }
        return Jn("div", {
            className: "quiztimer"
        }, Jn(Xn, null, Jn("div", {
            className: "circle_timer"
        }, Jn("div", {
            className: i
        }, Jn("span", null, Jn("span", {
            className: "timer_amount"
        }, s.d ? Jn(Xn, null, Jn("span", null, s.d), Jn("span", null, ":")) : "", s.h ? Jn(Xn, null, Jn("span", null, s.h), Jn("span", null, ":")) : "", s.m ? Jn(Xn, null, Jn("span", null, s.m), Jn("span", null, ":")) : "", Jn("span", null, s.s)), Jn("span", {
            className: "timer_unit"
        }, s.d ? Jn(Xn, null, Jn("span", null, window.wplms_course_data.translations.days), Jn("span", null)) : "", s.h ? Jn(Xn, null, Jn("span", null, window.wplms_course_data.translations.hours), Jn("span", null)) : "", s.m ? Jn(Xn, null, Jn("span", null, window.wplms_course_data.translations.minutes), Jn("span", null)) : "", Jn("span", null, window.wplms_course_data.translations.seconds))), Jn("div", {
            className: "slice"
        }, Jn("div", {
            className: "bar"
        }), Jn("div", {
            className: "fill"
        }))))))
    };
    const {
        createContext: Qn
    } = wp.element;
    var Kn = Qn({
        course: {},
        activeTab: "create_course",
        update: e => {}
    });
    const {
        createElement: Gn,
        render: Zn,
        useState: es,
        useEffect: ts,
        useContext: ns,
        Fragment: ss,
        RawHTML: as
    } = wp.element;
    var rs = e => {
        const [t, n] = es(e.field), [s, a] = (ns(Kn), es({
            post_content: "",
            raw: {}
        })), [r, i] = es(Math.round(1e5 * Math.random()));
        ts(() => {
            if (e.field && e.field.id) {
                var t = new CustomEvent("load_vibe_editor", {
                    detail: {
                        selector: ".vibe_" + e.field.id + r + "_editor",
                        content: e.field.hasOwnProperty("value") ? e.field.value : "",
                        raw: e.field.hasOwnProperty("raw") ? e.field.raw : "",
                        components: e.field.components ? e.field.components : "",
                        updater: e.field.id + r
                    }
                });
                document.dispatchEvent(t)
            }
        }, [e.field]), ts(() => (e.field && e.field.id && document.addEventListener("vibe_editor_content_update_" + e.field.id + r, o, !1), () => {
            e.field && e.field.id && document.removeEventListener("vibe_editor_content_update_" + e.field.id + r, o)
        }));
        const o = t => {
            console.log("captured"), a({
                post_content: t.detail.raw_html,
                raw: t.detail.editor_content
            });
            let s = {
                ...e.field
            };
            s.value = t.detail.raw_html, s.raw = t.detail.editor_content, n(s), e.update(s, e.fieldIndex, "fieldvaluechanged")
        };
        return Gn("div", {
            className: "vibev_editor"
        }, Gn("div", {
            className: "vibe_" + t.id + r + "_editor"
        }, Gn("textarea", {
            value: t.value
        })))
    };
    var is = function(e) {
        if (void 0 === e) return !0;
        if ("undefined" === e) return !0;
        if (null == e) return !0;
        if ("number" == typeof e) return !1;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    };
    const {
        createElement: os,
        useState: ls,
        useEffect: us,
        Fragment: cs,
        render: ds,
        useContext: ms
    } = wp.element, {
        dispatch: ps,
        select: hs
    } = wp.data;
    var _s = e => {
        const [t, n] = ls(!0), [s, a] = ls({}), [r, i] = ls([]), [o, l] = ls(""), [u, c] = ls(!1);
        ms(b);
        let d = hs("vibebp").getUser();
        d.token = hs("vibebp").getToken(), us(() => {
            n(!0), fetch(`${window.wplms_course_data.api_url}/user/content/assignmentId/${e.assignment.id}`, {
                method: "post",
                body: JSON.stringify({
                    token: d.token
                })
            }).then(e => e.json()).then(e => {
                e && (e.hasOwnProperty("remaining") && (e.duration = e.remaining), e.hasOwnProperty("comment_content") && l(e.comment_content), a(e), n(!1))
            }), document.addEventListener("wplms_assignment_custom_upload", ({
                detail: e
            }) => {
                if (e.hasOwnProperty("data") && e.data.hasOwnProperty("Key") && e.data.Key.length) {
                    let t = [...r],
                        n = e.data.Key.split("/");
                    t.push({
                        ...e.data,
                        name: n[n.length - 1]
                    }), i(t)
                }
            })
        }, [e.assignment]);
        const m = (t = null) => {
            let n = o;
            if (!t && s && s.type && "upload" == s.type) {
                if (!r || r.length <= 0) return alert(window.wplms_course_data.translations.upload_a_file), !1;
                is(n) && (n = s.title + " - " + (d.displayname ? d.displayname : d.name ? d.name : ""))
            } else if (t && is(n) && (n = s.title + " - " + (d.displayname ? d.displayname : d.name ? d.name : "")), !n || n.length <= 3) return alert(window.wplms_course_data.translations.error), !1;
            c(!0);
            var i = new FormData;
            i.append("body", JSON.stringify({
                comment: n,
                attachments: r,
                token: hs("vibebp").getToken()
            })), r.length && r.map((e, t) => {
                e instanceof File ? i.append("files_" + t, e) : i.append("files_" + t, JSON.stringify(e))
            }), fetch(`${window.wplms_course_data.api_url}/user/upload/assignmentId/${e.assignment.id}`, {
                method: "post",
                body: i
            }).then(e => e.json()).then(t => {
                if (c(!1), t) {
                    let n = {
                        ...s
                    };
                    t.attachment_urls && t.attachment_urls.length && (n.attachment_urls = t.attachment_urls), t.comment_id && (n.flag = 1, n.already_submitted = !0, e.hasOwnProperty("unitIndex") ? e.update({
                        unitIndex: e.unitIndex,
                        assignmentIndex: e.assignmentIndex
                    }, "complete") : e.update({}, "submitassignment")), a(n)
                }
            })
        };
        let h = {
            allowed_mime_types: s.permit_mime,
            allowed_file_size: parseInt(s.permit_size)
        };
        return t ? os(p, null) : os("div", {
            className: "course_assignment_wrapper"
        }, os("div", {
            className: "course_assignment"
        }, os("div", {
            className: "assignment_details"
        }, os("div", {
            className: "assignment_marks"
        }, os("span", null, s.total_marks), os("span", null, window.wplms_course_data.translations.total_marks)), os(Vn, {
            duration: s.duration,
            update: (e, t) => {
                "expired" == t && (s.already_submitted || m(!0))
            },
            quiz_id: s.id,
            start: s.start
        })), os("div", {
            className: "assignment_content_wrapper"
        }, os("div", {
            className: "assignment_content",
            dangerouslySetInnerHTML: {
                __html: s.content
            }
        }), s.type && "upload" == s.type && s && s.permit_extension && s.permit_extension.length && s.flag <= 2 ? os("div", {
            className: "allowed_file_extenstions"
        }, os("label", null, window.wplms_course_data.translations.allowed_file_extenstions), s.permit_extension.map(e => os("span", null, e))) : "", s.start ? "" : os("a", {
            className: "assignment_start_button button is-primary",
            onClick: () => {
                fetch(`${window.wplms_course_data.api_url}/user/start/assignmentId/${e.assignment.id}`, {
                    method: "post",
                    body: JSON.stringify({
                        token: hs("vibebp").getToken()
                    })
                }).then(e => e.json()).then(e => {
                    if (e && e.start) {
                        let e = {
                            ...s
                        };
                        e.start = !0, a(e)
                    }
                })
            }
        }, window.wplms_course_data.translations.start_assigmment), s.start && s.flag <= 2 ? os(cs, null, s.already_submitted ? os(cs, null, s.attachment_urls && s.attachment_urls.length ? os(cs, null, window.wplms_course_data.translations.uploaded_files, os("div", {
            className: "assignment_attachments"
        }, s.attachment_urls.map((e, t) => os("div", null, os("a", {
            href: e.url,
            target: "_blank",
            download: !0
        }, e.name))))) : "", s.hasOwnProperty("flag") && 1 == s.flag && s.duration > 0 ? os("div", {
            className: "resubmit ",
            onClick: () => {
                (() => {
                    let t = {
                        ...s
                    };
                    t.already_submitted = !1, t.flag = 0, e.hasOwnProperty("unitIndex") ? e.update({
                        unitIndex: e.unitIndex,
                        assignmentIndex: e.assignmentIndex
                    }, "retake") : e.update({}, "retookassignment"), a(t)
                })()
            }
        }, os("a", {
            className: "button is-primary"
        }, window.wplms_course_data.translations.resubmit, os("span", {
            className: "vicon vicon-close"
        }))) : "") : "", s.type && "upload" == s.type && !s.already_submitted ? os("div", {
            className: "upload_assignment"
        }, s.hasOwnProperty("custom_upload") && s.custom_upload ? os("div", null, (_ = new CustomEvent("custom_assignment_upload", {
            detail: {
                data: s
            }
        }), document.dispatchEvent(_), os("div", {
            className: "custom_assignment_upload",
            id: s.custom_upload
        }))) : os(Rn, {
            type: 1,
            update: (e, t) => {
                let n = [...r];
                n.push(new File([e[0]], e[0].name)), i(n)
            },
            args: h
        }), r ? os("div", {
            className: "assignment_attachments"
        }, r.map((e, t) => os("div", null, os("span", null, e.name), os("span", {
            className: "vicon vicon-close",
            onClick: () => {
                (e => {
                    let t = [...r];
                    t.splice(e, 1), i(t)
                })(t)
            }
        })))) : "", os(rs, o ? {
            field: {
                id: "assignment_text",
                value: o,
                components: ["editor"]
            },
            update: (e, t, n) => {
                l(e.value)
            }
        } : {
            field: {
                id: "assignment_text",
                components: ["editor"]
            },
            update: (e, t, n) => {
                l(e.value)
            }
        })) : "", !s.hasOwnProperty("type") || s.type && "textarea" == s.type ? os(rs, {
            field: o ? {
                id: "assignment_text",
                value: o,
                components: ["editor"]
            } : {
                id: "assignment_text",
                components: ["editor"]
            },
            update: (e, t, n) => {
                l(e.value)
            }
        }) : "") : "", s.flag && s.hasOwnProperty("marks") && s.flag > 1 ? os("div", {
            className: "assigment_evaluated"
        }, s.message ? os("span", null, s.message) : "", s.marks ? os("span", null, window.wplms_course_data.translations.marks_obtained, " : ", s.marks) : "", s.hasOwnProperty("instructor_remarks") ? os("div", {
            className: "remarks"
        }, os("h3", null, window.wplms_course_data.translations.instructor_remarks, " "), os("div", {
            dangerouslySetInnerHTML: {
                __html: s.instructor_remarks
            }
        })) : "") : "")), s.start && !s.already_submitted ? os("a", {
            className: u ? "button is-primary is-loading" : "button is-primary",
            onClick: () => {
                m()
            }
        }, window.wplms_course_data.translations.submit_assignment) : "");
        var _
    };
    const {
        createContext: ws
    } = wp.element;
    var fs = ws({
        comments: {},
        update: e => {}
    });
    const {
        createElement: vs,
        render: gs,
        useState: ys,
        useEffect: bs,
        useContext: ks,
        Fragment: xs,
        RawHTML: qs
    } = wp.element, {
        dispatch: Ss,
        select: Ns
    } = wp.data;
    var Os = e => {
        const [t, n] = ys(e.timestamp), [s, a] = ys(0);
        let r = Math.floor(Date.now() / 1e3);
        bs(() => {
            if (n(parseInt(e.timestamp)), e.timestamp)
                if (e.hasOwnProperty("notimediff")) a(parseInt(e.timestamp));
                else {
                    let t = e.timestamp;
                    e.timestamp.toString().includes("-") && (t = new Date(t).getTime() / 1e3), parseInt(t) > r ? a(parseInt(t) - r) : a(r - parseInt(t))
                }
        }, [e.timestamp]);
        return vs("span", {
            className: "friendly_time"
        }, (() => {
            if (s < 0) return window.wplms_course_data.translations.expired;
            let t, n, a, r = 0,
                i = 0,
                o = 0,
                l = [{
                    label: window.wplms_course_data.time_labels.year.single,
                    multi: window.wplms_course_data.time_labels.year.multi,
                    value: 31536e3
                }, {
                    label: window.wplms_course_data.time_labels.month.single,
                    multi: window.wplms_course_data.time_labels.month.multi,
                    value: 2592e3,
                    max: 12
                }, {
                    label: window.wplms_course_data.time_labels.week.single,
                    multi: window.wplms_course_data.time_labels.week.multi,
                    value: 604800,
                    max: 7
                }, {
                    label: window.wplms_course_data.time_labels.day.single,
                    multi: window.wplms_course_data.time_labels.day.multi,
                    value: 86400,
                    max: 31
                }, {
                    label: window.wplms_course_data.time_labels.hour.single,
                    multi: window.wplms_course_data.time_labels.hour.multi,
                    value: 3600,
                    max: 24
                }, {
                    label: window.wplms_course_data.time_labels.minute.single,
                    multi: window.wplms_course_data.time_labels.minute.multi,
                    value: 60,
                    max: 60
                }, {
                    label: window.wplms_course_data.time_labels.second.single,
                    multi: window.wplms_course_data.time_labels.second.multi,
                    value: 1,
                    max: 60
                }];
            //if (s >= 776736e3) return window.wplms_course_data.translations.unlimited_time;
            if (s >= 776736e3) return '';
            if (s <= 0) return e.hasOwnProperty("notimediff") ? s + " " + window.wplms_course_data.time_labels.second.multi : window.wplms_course_data.translations.just_now;
            for (let e = 0; e < l.length; e++)
                if (n = l[e], i = e, n.value < s) {
                    r = Math.floor(s / n.value), r > n.max && (r = n.max);
                    break
                } return t = r + " " + (r > 1 ? n.multi : n.label), n.value > 1 && (a = l[i + 1], o = Math.floor(s % n.value / a.value), o && (t += ", " + o + " " + (o > 1 ? a.multi : a.label))), t
        })())
    };
    const {
        createElement: Es,
        useState: zs,
        useEffect: Ps,
        Fragment: Cs,
        render: Ms,
        useContext: Is
    } = wp.element, {
        dispatch: Ts,
        select: Ls
    } = wp.data, js = e => {
        const [t, n] = zs({}), s = Is(fs);
        Ps(() => {
            n(e.comment)
        }, [e.comment]);
        const a = e => {
                s.update({
                    comment: t
                }, e)
            },
            r = Ls("vibebp").getUser();
        return t && Object.keys(t).length ? Es("li", {
            className: "unit_comment_wrapper " + (e.disable == t.comment_ID ? "disabled" : "")
        }, Es("div", {
            className: "unit_comment"
        }, t.user ? Es("div", {
            className: "comment_user"
        }, t.user.avatar ? Es("img", {
            src: t.user.avatar
        }) : "", t.user.name ? Es("span", {
            className: "username"
        }, t.user.name) : t.user.displayname ? Es("span", {
            className: "username"
        }, t.user.displayname) : Es("span", {
            className: "username"
        }, window.wplms_course_data.translations.anonymous)) : "", Es("div", {
            className: "unit_comment_content"
        }, Es("div", {
            className: "unit_comment_header"
        }, Es("span", null, Es(Os, {
            timestamp: parseInt(t.comment_date)
        })), e.disable != t.comment_ID ? Es("div", {
            className: "comment_actions"
        }, r.id == t.user_id || t.hasOwnProperty("user") && t.user.id == r.id || Object.keys(r.caps).indexOf("manage_options") > -1 ? Es("span", {
            className: "vicon vicon-pencil",
            onClick: () => {
                a("edit")
            }
        }) : "", "note" != t.type ? Es("span", {
            className: "vicon vicon-share",
            onClick: () => {
                a("reply")
            }
        }) : "", r.id == t.user_id || t.hasOwnProperty("user") && t.user.id == r.id ? Es(Cs, null, parseInt(t.comment_parent) || "note" == t.type ? "" : t.question ? Es("span", {
            className: "vicon vicon-user active tip",
            title: window.wplms_course_data.translations.instructor_question
        }) : Es("span", {
            className: "vicon vicon-user tip",
            title: window.wplms_course_data.translations.ask_instructor,
            onClick: () => {
                fetch(window.wplms_course_data.api_url + "/student/askQuestion/", {
                    method: "post",
                    body: JSON.stringify({
                        comment: t,
                        unit_id: s.unit_id,
                        course_id: s.course_id,
                        token: Ls("vibebp").getToken()
                    })
                }).then(e => e.json()).then(e => {
                    n({
                        ...t,
                        question: !0
                    }), e ? e.hasOwnProperty("message") && Ts("vibebp").addNotification({
                        icon: "vicon vicon-user",
                        text: e.message
                    }) : e.hasOwnProperty("message") && Ts("vibebp").addNotification({
                        text: e.message
                    })
                })
            }
        }), r.id == t.user_id || t.hasOwnProperty("user") && t.user.id == r.id ? Es("span", {
            className: "vicon vicon-trash",
            onClick: () => {
                a("delete")
            }
        }) : "") : "") : ""), Es("div", {
            dangerouslySetInnerHTML: {
                __html: t.comment_content
            }
        }))), t.child && t.child.length ? Es("ul", null, t.child.map((t, n) => Es(js, {
            comment: t,
            disable: e.disable
        }))) : "") : ""
    };
    var As = js;
    const {
        createElement: Ds,
        useState: Hs,
        useEffect: Fs,
        Fragment: Bs,
        render: Rs
    } = wp.element, {
        dispatch: $s,
        select: Js
    } = wp.data;
    var Ws = e => {
        const [t, n] = Hs([]), [s, a] = Hs(!1), [r, i] = Hs(0), [o, l] = Hs(!1), [u, c] = Hs(!1), [d, m] = Hs({}), [h, _] = Hs(!0);
        const w = Js("vibebp").getUser(),
            f = Js("vibebp").getToken(),
            v = {
                type: e.type,
                unit_id: e.unit_id,
                course_id: e.course_id
            };
        Fs(() => {
            m(v), g()
        }, [e.unit_id]);
        const g = () => {
                r || a(!0), fetch(`${window.wplms_course_data.api_url}/user/unitcomments/${e.unit_id}?page=${r}&per_page=20`, {
                    method: "post",
                    body: JSON.stringify({
                        token: f,
                        type: e.type
                    })
                }).then(e => e.json()).then(e => {
                    if (e) {
                        let s = [...t];
                        e.length ? (e.map((t, n) => {
                            s.findIndex(e => e.comment_ID === t.comment_ID) < 0 && s.push(x(t, e))
                        }), n(s), a(!1), i(r + 1)) : (_(!0), a(!1))
                    }
                })
            },
            y = (e, t, n) => {
                for (let s = 0; s < e.length; s++) e[s].comment_ID == t && (e[s].child && e[s].child.length ? e[s].child.unshift(n) : (e[s].child = [], e[s].child.push(n))), e[s].child && e[s].child.length && y(e[s].child, t, n);
                return e
            },
            b = (e, t, n) => {
                for (let s = 0; s < e.length; s++) e[s].comment_ID == t && (e[s] = n), e[s].child && e[s].child.length && b(e[s].child, t, n);
                return e
            },
            k = (e, t, n) => {
                for (let s = 0; s < e.length; s++) e[s].comment_ID == t && (e[s].comment_content = n.comment_content), e[s].child && e[s].child.length && b(e[s].child, t, n);
                return e
            },
            x = (e, t) => (t.map((n, s) => {
                parseInt(e.comment_ID) === parseInt(n.comment_parent) && (e.hasOwnProperty("child") || (e.child = []), t.splice(s, 1), e.child.push(x(n, t)))
            }), e),
            q = () => Math.floor(1e9 * Math.random() + 1),
            S = s => {
                s.user.id && fetch(`${window.wplms_course_data.api_url}/user/unitcomments/delete/${s.comment_ID}`, {
                    method: "post",
                    body: JSON.stringify({
                        comment: s,
                        token: Js("vibebp").getToken(),
                        course_id: e.course_id
                    })
                }).then(e => e.json()).then(e => {
                    if (e) {
                        if (e.status) {
                            let e = N(s, [...t]);
                            n(e)
                        }
                        e.hasOwnProperty("message") && e.message.length && $s("vibebp").addNotification({
                            text: e.message
                        })
                    }
                })
            },
            N = (e, t) => {
                if (e.comment_ID && t.length)
                    for (var n = t.length - 1; n >= 0; n--) {
                        if (t[n].comment_ID == e.comment_ID) {
                            t.splice(n, 1);
                            break
                        }
                        t[n].hasOwnProperty("child") && t[n].child.length && (t[n].child = N(e, t[n].child))
                    }
                return t
            },
            O = () => {
                switch (d.ctype) {
                    case "new":
                        return window.wplms_course_data.translations.add_comment;
                    case "new_question":
                        return window.wplms_course_data.translations.ask_question;
                    case "reply":
                        return window.wplms_course_data.translations.reply;
                    case "edit":
                        return window.wplms_course_data.translations.edit_comment;
                    default:
                        return window.wplms_course_data.translations.add_comment
                }
            };
        let E = "";
        if (t.length && u) {
            let e = t.findIndex(e => e.comment_ID === u);
            E = e > -1 ? t[e].ctype : ""
        }
        return Ds(fs.Provider, {
            value: {
                comments: t,
                unit_id: e.unit_id,
                course_id: e.course_id,
                update: (e, t) => {
                    switch (t) {
                        case "edit":
                            l(!0), e.comment.ctype = t, e.comment.user_id || (e.comment.user_id = w.id), e.comment.user || (e.comment.user = w), m(e.comment);
                            break;
                        case "reply":
                            l(!0), m({
                                user_id: w.id,
                                user: w,
                                comment_ID: q(),
                                comment_parent: e.comment.comment_ID,
                                ctype: t
                            });
                            break;
                        case "delete":
                            S(e.comment)
                    }
                }
            }
        }, Ds("div", {
            className: "unit_comments_enclosure"
        }, Ds("div", {
            className: o ? "unit_comments_wrapper active" : "unit_comments_wrapper"
        }, Ds("span",{
            className: "comment_top_heading"
        }, null, Ds("span", {
            onClick: e.back
        }, Ds("span", {
            className: "bi bi-arrow-left"
        })), Ds("strong", null, window.wplms_course_data.translations[e.type]), Ds("span", {
            onClick: e.expand
        }, Ds("span", {
            className: "vicon vicon-align-right"
        }))), s ? Ds(p, null) : Ds(Bs, null, Ds("div", {
            className: "unit_comments"
        }, t && t.length ? Ds("ul", null, t.map((e, t) => Ds(As, {
            comment: e,
            disable: u
        }))) : Ds("div", {
            className: "vbp_message"
        }, window.wplms_course_data.translations.no_comments), Ds("div", {
            className: "loadmore_wrapper"
        }, h ? "" : Ds("a", {
            className: "link",
            onClick: () => {
                g()
            }
        }, window.wplms_course_data.translations.load_more))), Ds("div", {
            className: "unit_comments_action"
        }, o ? Ds("div", {
            className: "addcomment"
        }, Ds("textarea", {
            value: d.comment_content,
            onChange: e => {
                let t = {
                    ...d
                };
                t.comment_content = e.target.value, m(t)
            }
        }, d.comment_content), Ds("div", {
            className: "addcomment_buttons"
        }, Ds("a", {
            className: u ? "button is-primary is-loading" : "button is-primary",
            onClick: () => {
                if (!d.ctype) return $s("vibebp").addNotification({
                    text: window.wplms_course_data.translations.insufficientdata
                }), !1;
                if (!(d.comment_content && d.comment_content.length > 3)) return $s("vibebp").addNotification({
                    text: window.wplms_course_data.translations.add_more_content
                }), !1; {
                    d.comment_ID || (d.comment_ID = q()), c(d.comment_ID), d.comment_post_ID || (d.comment_post_ID = e.unit_id);
                    let s = d.comment_ID,
                        a = [...t];
                    switch (d.ctype) {
                        case "new":
                        case "new_question":
                            a.unshift(d), n(a), fetch(`${window.wplms_course_data.api_url}/user/unitcomments/${e.unit_id}/new/0`, {
                                method: "post",
                                body: JSON.stringify({
                                    ...d,
                                    token: Js("vibebp").getToken(),
                                    course_id: e.course_id
                                })
                            }).then(e => e.json()).then(e => {
                                if (e)
                                    if (e.comment_data) {
                                        let t = a.findIndex(e => parseInt(e.comment_ID) == d.comment_ID);
                                        t >= 0 && (e.comment_data.user = w, a.splice(t, 1, e.comment_data), n(a))
                                    } else $s("vibebp").addNotification({
                                        text: e.message
                                    });
                                c(!1)
                            });
                            break;
                        case "edit":
                            if (!d.comment_content || d.comment_content.length < 4) return void $s("vibebp").addNotification({
                                text: window.wplms_course_data.translations.add_more_content
                            });
                            let t = k(a, s, d);
                            n(t);
                            d.comment_content;
                            fetch(`${window.wplms_course_data.api_url}/user/unitcomments/${e.unit_id}/edit/${s}`, {
                                method: "post",
                                body: JSON.stringify({
                                    ...d,
                                    token: Js("vibebp").getToken(),
                                    course_id: e.course_id
                                })
                            }).then(e => e.json()).then(e => {
                                e && (e.comment_data ? (e.comment_data.hasOwnProperty("user") || (e.comment_data.user = w), t = k(a, s, e.comment_data), n(t)) : $s("vibebp").addNotification({
                                    text: window.wplms_course_data.translations.error
                                })), c(!1)
                            });
                            break;
                        case "reply":
                            if (!d.comment_content || d.comment_content.length < 4) return void $s("vibebp").addNotification({
                                text: window.wplms_course_data.translations.add_more_content
                            });
                            let r = y(a, d.comment_parent, d);
                            n(r), fetch(`${window.wplms_course_data.api_url}/user/unitcomments/${e.unit_id}/reply/${d.comment_parent}`, {
                                method: "post",
                                body: JSON.stringify({
                                    ...d,
                                    token: Js("vibebp").getToken(),
                                    course_id: e.course_id
                                })
                            }).then(e => e.json()).then(e => {
                                e && (e.comment_data ? (e.comment_data.hasOwnProperty("user") || (e.comment_data.user = w), r = b(a, s, e.comment_data), n(r)) : $s("vibebp").addNotification({
                                    text: window.wplms_course_data.translations.error
                                })), c(!1)
                            })
                    }
                    m(v), l(!1)
                }
            }
        }, O()), Ds("a", {
            className: "link",
            onClick: () => {
                m(v), l(!1)
            }
        }, window.wplms_course_data.translations.cancel))) : Ds(Bs, null, Ds("a", {
            className: "new" == E && u ? "button is-primary is-loading" : "button is-primary",
            onClick: () => {
                let e = {
                    ...d
                };
                e.ctype = "new", o && (e = {}), e.user_id = w.id, e.user = w, m(e), l(!o)
            }
        }, Ds("span", {
            className: "public" == e.type ? "vicon vicon-comments" : "vicon vicon-note"
        }), Ds("span", null, O())), "public" == e.type ? Ds("a", {
            className: "new_question" == E && u ? "button is-primary is-loading" : "button is-primary",
            onClick: () => {
                let e = {
                    ...d
                };
                e.ctype = "new_question", o && (e = {}), e.user_id = w.id, e.user = w, m(e), l(!o)
            }
        }, Ds("span", {
            className: "vicon vicon-help"
        }), Ds("span", null, window.wplms_course_data.translations.ask_question)) : ""))))))
    };
    const {
        createElement: Us,
        useState: Ys,
        useEffect: Xs,
        Fragment: Vs,
        render: Qs,
        useContext: Ks
    } = wp.element, {
        dispatch: Gs,
        select: Zs
    } = wp.data;
    var ea = e => {
        const [t, n] = Ys(0), s = Ks(b), a = () => {
            const e = document.querySelector(".course_content_content");
            if (!e) return;
            let t = e.clientHeight - (e.offsetTop - 240) - window.innerHeight,
                n = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            if (document.querySelector("body").classList && document.querySelector("body").classList.contains("course_status_fullscreen") && document.querySelector(".course_status") && (n = document.querySelector(".course_status").scrollTop, t = e.clientHeight - e.offsetTop - window.innerHeight), 0 !== n) return n > t ? (s.update({
                progress: 100
            }, "updateprogress"), void s.update({}, "progresscompleted")) : void s.update({
                progress: n / t * 100
            }, "updateprogress");
            s.update({
                progress: 0
            }, "updateprogress")
        };
        return Xs(() => (window.addEventListener("scroll", a), () => window.removeEventListener("scroll", a)), []), ""
    };
    const {
        createElement: ta,
        render: na,
        useState: sa,
        useEffect: aa,
        useContext: ra,
        Fragment: ia,
        RawHTML: oa
    } = wp.element;
    var la = e => {
        const [t, n] = sa([]), [s, a] = sa(() => {
            let t = e.maxstars ? e.maxstars - 1 : 4,
                n = [];
            for (; t >= 0;) n.unshift(t), t--;
            return n
        });
        aa(() => {
            let t = e.rating ? e.rating - 1 : -1,
                s = [];
            for (; t >= 0;) s.unshift(t), t--;
            n(s)
        }, [e.rating]);
        return t && t.length >= 0 ? ta("div", {
            className: "wplms-course-star-rating"
        }, s.map((s, a) => {
            let r = 0;
            return t.includes(a) && (r = 1), ta("span", {
                className: "vicon vicon-star " + (r ? "golden" : ""),
                onClick: t => {
                    (t => {
                        let s = [];
                        for (; t >= 0;) s.unshift(t), t--;
                        n(s), e.update(s, "ratingchanged")
                    })(a)
                }
            })
        })) : ""
    };
    const {
        Component: ua,
        createElement: ca,
        render: da,
        useState: ma,
        useEffect: pa,
        Fragment: ha
    } = wp.element;
    var _a = e => {
        const [t, n] = ma(e.duration), [s, a] = ma({
            d: 0,
            h: 0,
            m: 0,
            s: 0
        });
        pa(() => {
            if (e.start) {
                setTimeout(() => {
                    let s = t - 1;
                    s <= -1 ? e.update(e.quiz_id, "expired") : s >= 0 && (n(s), r())
                }, 1e3)
            } else n(e.duration), r()
        }, [t, e.start, e.duration]);
        const r = () => {
            let e = {
                    ...s
                },
                n = t;
            n > 86400 ? (e.d = Math.floor(n / 86400), n -= 86400 * e.d) : e.d = 0, n > 3600 ? (e.h = Math.floor(n / 3600), n -= 3600 * e.h) : e.h = 0, n > 60 ? (e.m = Math.floor(n / 60), n -= 60 * e.m) : e.m = 0, e.s = n, a(e)
        };
        return ca("div", {
            className: "driptimer_wrapper"
        }, ca("div", {
            className: "driptimer"
        }, ca("span", {
            className: "timer_amount"
        }, s.d ? ca(ha, null, ca("span", null, s.d), ca("span", null, ":")) : "", s.h ? ca(ha, null, ca("span", null, s.h), ca("span", null, ":")) : "", s.m ? ca(ha, null, ca("span", null, s.m), ca("span", null, ":")) : "", ca("span", null, s.s)), ca("span", {
            className: "timer_unit"
        }, s.d ? ca(ha, null, ca("span", null, window.wplms_course_data.translations.days), ca("span", null)) : "", s.h ? ca(ha, null, ca("span", null, window.wplms_course_data.translations.hours), ca("span", null)) : "", s.m ? ca(ha, null, ca("span", null, window.wplms_course_data.translations.minutes), ca("span", null)) : "", ca("span", null, window.wplms_course_data.translations.seconds))))
    };
    const {
        createElement: wa,
        render: fa,
        useState: va,
        useEffect: ga,
        Fragment: ya,
        useContext: ba,
        useRef: ka
    } = wp.element, {
        dispatch: xa,
        select: qa
    } = wp.data;
    var Sa = e => {
        const t = ka(null),
            [n, s] = va(Math.round(1e4 * Math.random())),
            [a, r] = va(!1),
            [i, o] = va(!1),
            l = (e, t) => {
                console.log(e, t), void 0 === t && (t = window.location.href);
                var n = t.match("[?&]" + e + "=([^&]+)");
                return n ? n[1] : null
            };
        ga(() => {
            if (c(), document.querySelector("#item_" + e.index)) {
                let t = {};
                if ("youtube" == e.provider && (t.youtube = {
                        modestbranding: 1
                    }), "vimeo" == e.provider && (t.vimeo = {
                        controls: !0,
                        playsinline: !1
                    }, t.controls = []), window.wplms_course_data.course.status.seek_lock && (t.listeners = {
                        seek: e => {
                            var t = a.currentTime;
                            if (_getTargetTime(a, e) > t) return e.preventDefault(), !1
                        }
                    }), e.hasOwnProperty("src") && "mpd" == e.src.split(".").pop()) dashjs.MediaPlayer().create().initialize(document.querySelector("#item_" + e.index), e.src, !0);
                let s = new Plyr(document.querySelector("#item_" + e.index), t);
                if (e.hasOwnProperty("src") && "m3u8" == e.src.split(".").pop())
                    if (Hls.isSupported()) {
                        const t = new Hls;
                        t.loadSource(e.src), t.attachMedia(document.querySelector("#item_" + e.index))
                    } else document.querySelector("#item_" + e.index).src = e.src;
                o(s), s.once("loadeddata", () => {
                    let t = localStorage.getItem(e.url);
                    t && t <= i.duration && (s.currentTime = t), r({
                        plyr: s,
                        url: e.url
                    })
                }), s.once("ready", () => {
                    if ("youtube" == e.provider) {
                        let t = l("t", e.url);
                        t && void 0 !== t || (t = l("start", e.url)), t && (s.currentTime = t)
                    }
                    "vimeo" == e.provider && document.querySelector(".plyr__poster") && document.querySelector(".item_player_" + n + " .plyr__poster") && document.querySelector(".item_player_" + n + " .plyr__poster").remove()
                }), s.once("ended", u)
            }
            return () => {
                c()
            }
        }, [e.url]);
        const u = t => {
                e.update("ended", {
                    index: e.index,
                    src: e.url,
                    event: t
                })
            },
            c = () => {
                if (document.querySelector(".video_wrapper > div").remove(), "youtube" == e.provider)(t = document.createElement("div")).setAttribute("id", "item_" + e.index), t.setAttribute("data-plyr-provider", "youtube"), t.setAttribute("data-plyr-embed-id", e.embed_id);
                else if ("vimeo" == e.provider) {
                    (t = document.createElement("div")).setAttribute("id", "item_" + e.index), t.setAttribute("data-plyr-provider", "vimeo"), t.setAttribute("data-plyr-embed-id", e.embed_id)
                } else {
                    var t = document.createElement("div"),
                        n = document.createElement("video");
                    n.setAttribute("id", "item_" + e.index);
                    var s = document.createElement("source");
                    s.setAttribute("src", e.src), s.setAttribute("type", e.mime_type), n.appendChild(s), t.appendChild(n)
                }
                document.querySelector(".video_wrapper").appendChild(t)
            };
        return wa("div", {
            className: "video_wrapper item_player_" + n
        }, "youtube" == e.provider ? wa("div", {
            ref: t,
            id: "item_" + e.index,
            "data-plyr-provider": "youtube",
            "data-plyr-embed-id": e.embed_id
        }) : "vimeo" == e.provider ? wa("div", {
            ref: t,
            id: "item_" + e.index,
            "data-plyr-provider": "vimeo",
            "data-plyr-embed-id": e.embed_id
        }) : "local" == e.provider ? wa("div", null, wa("video", {
            className: "activity_meta video",
            ref: t,
            id: "item_" + e.index
        }, wa("source", {
            src: e.src,
            type: e.mime_type
        }))) : "")
    };
    const {
        createElement: Na,
        render: Oa,
        useState: Ea,
        useEffect: za,
        Fragment: Pa
    } = wp.element, {
        dispatch: Ca,
        select: Ma
    } = wp.data;
    var Ia = e => {
        const [t, n] = Ea({}), [s, a] = Ea(!1), [r, i] = Ea(null);
        za(() => {
            n(e.question), a(!0)
        }, [e.question]);
        const o = (e, s = 0, a) => {
            let r = {
                ...t
            };
            "changed" == a && (r = e, n(r), ! function(e) {
                if (null == e) return !0;
                if ("number" == typeof e) return !0;
                if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
                for (var t in e)
                    if (e.hasOwnProperty(t)) return !1;
                return !0
            }(e.marked_answer) ? "object" == typeof e.marked_answer || Array.isArray(e.marked_answer) ? localStorage.setItem(e.id, JSON.stringify(e.marked_answer)) : localStorage.setItem(e.id, e.marked_answer) : null == e.marked_answer && localStorage.removeItem(e.id))
        };
        return s ? t ? Na(Pa, null, Na("div", {
            className: "incourse"
        }, Na("div", {
            className: "quiz_questions_content"
        }, Na("div", {
            className: "question_cwrapper"
        }, Na("div", {
            className: "question",
            "data-i": e.i
        }, Na(qt, {
            question: t,
            update: o
        }), (e => {
            switch (e.type) {
                case "smalltext":
                    return Na($, {
                        question: e,
                        update: o
                    });
                case "single":
                    return Na(V, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "select":
                    return Na(te, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "multiple":
                    return Na(oe, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "fillblank":
                    return Na(ge, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "sort":
                    return Na(Ce, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "match":
                    return Na(Je, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "truefalse":
                    return Na(Qe, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    });
                case "largetext":
                    return Na(at, {
                        question: e,
                        update: o,
                        quiz_id: e.id
                    })
            }
        })({
            ...t
        }), t.attempted ? "" : Na("div", {
            className: "quiz_check_answer button",
            onClick: e => {
                (e => {
                    let t = {
                        ...e
                    };
                    a(!1), t = dt(t, null, null, null, !0), t.attempted = !0, a(!0), n(t)
                })(t)
            }
        }, window.wplms_course_data.translations.check_answer), t.attempted ? Na(vt, {
            question: t
        }) : "", t.attempted && t.explanation.length ? Na("div", {
            className: "explanation"
        }, Na("strong", null, window.wplms_course_data.translations.question_explanation), Na("div", {
            dangerouslySetInnerHTML: {
                __html: t.explanation
            }
        })) : "")), t.attempted && window.wplms_course_data.question_retries ? Na("div", {
            className: "quiz_check_answer button",
            onClick: e => {
                (() => {
                    let e = {
                        ...t
                    };
                    if (e.hasOwnProperty("original")) {
                        let t = e;
                        e = t.original, e.original = t.original, n(e)
                    }
                })()
            }
        }, Na("span", {
            className: "vicon vicon-reload"
        }), window.wplms_course_data.translations.retry) : ""))) : "" : Na(p, null)
    };
    const {
        createElement: Ta,
        render: La,
        useState: ja,
        useEffect: Aa,
        Fragment: Da
    } = wp.element, {
        dispatch: Ha,
        select: Fa
    } = wp.data;

    function Ba(e) {
        if (null == e) return !0;
        if ("number" == typeof e) return !0;
        if (Array.isArray(e) || "string" == typeof e || e instanceof String) return 0 === e.length;
        for (var t in e)
            if (e.hasOwnProperty(t)) return !1;
        return !0
    }
    var Ra = e => {
        const [t, n] = ja([]), [s, a] = ja(!1), [r, i] = ja(0);
        Aa(() => {
            o()
        }, [e.questions, r]);
        const o = () => {
            a(!1), fetch(`${window.wplms_course_data.api_url}/course/questions/?client_id=${window.wplms_course_data.client_id}`, {
                method: "post",
                body: JSON.stringify({
                    questions: e.questions,
                    page: r + 1,
                    per_page: window.wplms_course_data.practice_questions
                })
            }).then(e => e.json()).then(e => {
                if (e.status) {
                    if (e.questions) {
                        let t = [];
                        e.questions.map(e => {
                            let n = localStorage.getItem(e.id);
                            !Ba(n) && Ba(e.marked_answer) && (! function(e) {
                                try {
                                    JSON.parse(e)
                                } catch (e) {
                                    return !1
                                }
                                return !0
                            }(n) ? e.marked_answer = n : e.marked_answer = JSON.parse(n)), t.push(e)
                        }), n(t)
                    }
                    a(!0)
                } else console.log(e)
            })
        };
        return Ta("div", {
            className: "practice_questions"
        }, s ? t.filter((e, t) => t < (r + 1) * window.wplms_course_data.practice_questions).map(e => Ta(Ia, {
            question: e,
            i: r * window.wplms_course_data.practice_questions + t.indexOf(e) + 1
        })) : Ta(p, null), e.questions.length > window.wplms_course_data.practice_questions ? Ta("div", {
            className: "buttons has-addons"
        }, r > 0 ? Ta("span", {
            className: "button vicon vicon-angle-left",
            onClick: () => {
                s && i(r - 1)
            }
        }) : "", r < Math.floor(e.questions.length / window.wplms_course_data.practice_questions) ? Ta("span", {
            className: "button vicon vicon-angle-right",
            onClick: () => {
                s && i(r + 1)
            }
        }) : "") : "")
    };
    const {
        createElement: $a,
        render: Ja,
        useState: Wa,
        useEffect: Ua,
        Fragment: Ya,
        useContext: Xa
    } = wp.element, {
        dispatch: Va,
        select: Qa
    } = wp.data;
    var Ka = e => {
            const [t, n] = Wa(null), [s, a] = Wa(e.curriculumItem), [r, i] = Wa(!1), [o, l] = Wa(!1), [u, c] = Wa(!1), [d, m] = Wa(!1);
            Xa(b);
            Ua(() => {
                a(e.curriculumItem)
            }, [e.curriculumItem]), Ua(() => {
                var e;
                if (document.querySelector(".wp-playlist.wp-video-playlist") && (void 0 !== (e = JSON.parse(document.querySelector(".wp-playlist-script").innerHTML)) && e && e.hasOwnProperty("tracks") && e.tracks.length)) {
                    document.querySelector(".wp-playlist video") && document.querySelector(".wp-playlist video").remove(), (n = document.createElement("div")).classList.add("wplms-playlist");
                    var t = document.createElement("video");
                    n.appendChild(t), document.querySelector(".wp-playlist.wp-video-playlist").parentNode.appendChild(n), setTimeout(() => {
                        new Plyr(".wplms-playlist video").source = {
                            type: "video",
                            sources: e.tracks
                        };
                        var t = document.createElement("div");
                        t.classList.add("wplms_playlist"), e.tracks.map((e, n) => {
                            var s = document.createElement("span");
                            s.classList.add("track"), s.setAttribute("data-url", e.src), s.innerHTML = e.title, n < 1 && s.classList.add("active"), s.onclick = t => {
                                t.preventDefault(), document.querySelector(".wplms_playlist .track") && document.querySelectorAll(".wplms_playlist .track").forEach((e, t) => {
                                    e.classList.remove("active")
                                }), t.target.classList.add("active"), document.querySelector(".wplms-playlist video") && document.querySelector(".wplms-playlist video").remove();
                                var n = document.createElement("div");
                                n.classList.add("wplms-playlist");
                                var s = document.createElement("video");
                                n.appendChild(s), document.querySelector(".wp-playlist.wp-video-playlist").parentNode.appendChild(n), setTimeout(() => {
                                    new Plyr(".wplms-playlist video").source = {
                                        type: "video",
                                        sources: [e]
                                    }
                                }, 200)
                            }, t.appendChild(s)
                        }), document.querySelector(".wp-playlist.wp-video-playlist").appendChild(t)
                    }, 200)
                }
                if (document.querySelector(".wp-playlist.wp-audio-playlist") && (void 0 !== (e = JSON.parse(document.querySelector(".wp-playlist-script").innerHTML)) && e && e.hasOwnProperty("tracks") && e.tracks.length)) {
                    var n;
                    document.querySelector(".wp-playlist audio") && document.querySelector(".wp-playlist audio").remove(), document.querySelector(".wp-playlist-current-item") && document.querySelector(".wp-playlist-current-item").remove(), (n = document.createElement("div")).classList.add("wplms-playlist");
                    t = document.createElement("audio");
                    n.appendChild(t), document.querySelector(".wp-playlist.wp-audio-playlist").parentNode.appendChild(n), setTimeout(() => {
                        new Plyr(".wplms-playlist audio").source = {
                            type: "audio",
                            sources: e.tracks
                        };
                        var t = document.createElement("div");
                        t.classList.add("wplms_playlist"), e.tracks.map((e, n) => {
                            var s = document.createElement("span");
                            s.classList.add("track"), s.setAttribute("data-url", e.src), s.innerHTML = e.title, n < 1 && s.classList.add("active"), s.onclick = t => {
                                t.preventDefault(), document.querySelector(".wplms_playlist .track") && document.querySelectorAll(".wplms_playlist .track").forEach((e, t) => {
                                    e.classList.remove("active")
                                }), t.target.classList.add("active"), document.querySelector(".wplms-playlist") && document.querySelector(".wplms-playlist").remove();
                                var n = document.createElement("div");
                                n.classList.add("wplms-playlist");
                                var s = document.createElement("audio");
                                n.appendChild(s), document.querySelector(".wp-playlist.wp-audio-playlist").parentNode.appendChild(n), setTimeout(() => {
                                    new Plyr(".wplms-playlist audio").source = {
                                        type: "audio",
                                        sources: [e]
                                    }
                                }, 200)
                            }, t.appendChild(s)
                        }), document.querySelector(".wp-playlist.wp-audio-playlist").appendChild(t)
                    }, 200)
                }
            }, [s]);
            let p = "";
            if (s.meta.hasOwnProperty("video") && "object" == typeof s.meta.video && "video" == s.meta.video.type) {
                let e = s.meta.video.url.split(".");
                switch (e[e.length - 1]) {
                    case "mov":
                        p = "video/mp4";
                        break;
                    default:
                        p = "video/" + e[e.length - 1]
                }
            }
            if (s.meta.hasOwnProperty("audio") && "object" == typeof s.meta.audio && "audio" == s.meta.audio.type) {
                let e = s.meta.audio.url.split(".");
                switch (e[e.length - 1]) {
                    case "m4a":
                        p = "audio/mp4";
                        break;
                    case "oga":
                        p = "audio/ogg";
                        break;
                    default:
                        p = "audio/" + e[e.length - 1]
                }
            }
            const h = (t, n, a = null) => {
                let o = {};
                window.wplms_course_data.course.status.seek_lock && (o.listeners = {
                    seek: e => {
                        var t = r.currentTime;
                        if (((e, t) => "object" != typeof t || "input" !== t.type && "change" !== t.type ? Number(t) : t.target.value / t.target.max * e.media.duration)(r, e) > t) return e.preventDefault(), !1
                    }
                });
                let l = new Plyr(t, o);
                l.once("loadeddata", () => {
                    let e = localStorage.getItem(n);
                    e && e <= l.duration && (l.currentTime = e), i({
                        plyr: l,
                        url: n
                    })
                }), null === a || s.status || l.once("ended", t => {
                    e.update({
                        index: a,
                        src: n,
                        event: t
                    }, "videosended")
                })
            };
            ((e, t, n = []) => {
                const s = wn(Date.now());
                pn(() => {
                    const n = setTimeout((function() {
                        Date.now() - s.current >= t && (e(), s.current = Date.now())
                    }), t - (Date.now() - s.current));
                    return () => {
                        clearTimeout(n)
                    }
                }, [t, ...n])
            })(() => {
                void 0 !== r.player && r.player.on("playing", () => {
                    localStorage.setItem(r.url, r.player.currentTime)
                })
            }, 500, [r, o]);
            const _ = (e, t) => {
                    let n = {
                        ...s
                    };
                    n.meta.hasOwnProperty("assignments") && n.meta.assignments.length && n.meta.assignments[t] && (n.meta.assignments[t].show = e), a(n)
                },
                w = (t, n) => {
                    "complete" == n && e.update({
                        assignmentIndex: t.assignmentIndex
                    }, "completeUnitAssigmnent"), "retake" == n && e.update({
                        assignmentIndex: t.assignmentIndex
                    }, "retakeUnitAssigmnent")
                };
            window.scorm_page_type = "unit", window.hasOwnProperty("scorm_wplms_data") || (window.scorm_wplms_data = {}), window.scorm_wplms_data.module_id = s.id, window.scorm_wplms_data.type = "unit";
            const f = (t, n) => {
                e.update(n, "mediaended")
            };
            let v = [],
                g = [];
            if (s.meta.hasOwnProperty("video") && "object" == typeof s.meta.video) {
                if ("youtube" == s.meta.video.type) {
                    let e = s.meta.video.url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&|?]+)/);
                    e && e.length && (v = e[1])
                }
                "vimeo" == s.meta.video.type && (g = s.meta.video.url.match(/(http|https)?:\/\/(www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|)(\d+)(?:|\/\?)/))
            }
            return $a("div", {
                className: "course_content_content"
            }, e.hasOwnProperty("noLabels") && e.noLabels ? "" : $a(Ya, null, $a("span", {
                className: "lesson_info",
                onClick : () =>{
                    console.log(s);
                }
            }, $a("span", null, window.wplms_course_data.reports.module.unit + " ", e.item_number + "/" + e.total_item_count), $a("span", null, " "), $a(Os, {
                timestamp: s.duration,
                notimediff: 1
            })), $a("h2", {
                dangerouslySetInnerHTML: {
                    __html: s.title
                }
            }),$a("div",{
                dangerouslySetInnerHTML: {
                    __html: s.join_meeting_link != 0 ? s.join_meeting_link : ""
                }
            })), $a("div", null, s.meta.hasOwnProperty("access") && s.meta.access || !s.meta.hasOwnProperty("drip_time") ? s.meta.hasOwnProperty("video") && "object" == typeof s.meta.video && !Array.isArray(s.meta.video) ? "youtube" == s.meta.video.type ? $a("div", null, v && v.length ? $a(Sa, {
                provider: "youtube",
                index: e.index,
                embed_id: v,
                url: s.meta.video.url,
                update: f
            }) : "") : "vimeo" == s.meta.video.type ? $a("div", null, $a(Sa, {
                provider: "vimeo",
                index: e.index,
                embed_id: g[4],
                url: s.meta.video.url,
                update: f
            })) : $a("div", null, $a(Sa, {
                provider: "local",
                index: e.index,
                src: s.meta.video.url,
                mime_type: p,
                url: s.meta.video.url,
                update: f
            })) : s.meta.hasOwnProperty("audio") && "object" == typeof s.meta.audio && !Array.isArray(s.meta.audio) && s.meta.audio.url.length ? $a("audio", {
                className: "activity_meta video",
                ref: e => {
                    h(e, s.meta.audio.url)
                }
            }, $a("source", {
                src: s.meta.audio.url,
                type: p
            })) : s.meta.hasOwnProperty("package") ? $a("div", {
                className: "unit_iframe_wrapper"
            }, $a("iframe", {
                src: s.meta.package.src,
                width: "100%",
                height: "100%",
                frameborder: "0",
                allowfullscreen: "allowfullscreen"
            })) : $a("div", {
                className: s.type + "" + s.id
            }) : $a(_a, {
                start: !0,
                duration: s.meta.drip_time,
                update: (t, n) => {
                    "expired" == n && e.update({
                        index: e.index
                    }, "loadunit")
                },
                quiz_id: e.index
            })), s.meta && s.meta.hasOwnProperty("access") && s.meta.access && s.meta.hasOwnProperty("video") && s.meta.video.length ? $a("div", {
                className: "unit_videos"
            }, s.meta.video.map((e, t) => $a("div", {
                className: "video_wrapper"
            }, $a("video", {
                className: "activity_meta video",
                ref: n => h(n, e, t)
            }, $a("source", {
                src: e,
                type: "video/mp4"
            }))))) : "", s.meta && s.meta.hasOwnProperty("access") && s.meta.access && s.meta.hasOwnProperty("audio") && s.meta.audio.length ? $a("div", {
                className: "unit_videos"
            }, s.meta.audio.map((e, t) => $a("div", {
                className: "video_wrapper"
            }, $a("audio", {
                className: "activity_meta video",
                ref: t => h(t, e)
            }, $a("source", {
                src: e,
                type: "audio/mpeg"
            }))))) : "", s.meta && s.meta.hasOwnProperty("access") && s.meta.access && s.meta.hasOwnProperty("iframes") && s.meta.iframes.length ? $a("div", {
                className: "unit_iframes"
            }, s.meta.iframes.map((e, t) => "object" == typeof e && e.hasOwnProperty("value") ? $a("div", {
                className: "unit_iframe_wrapper " + e.shortcode
            }, $a("iframe", {
                src: e.value,
                width: "560",
                height: "315",
                frameborder: "0",
                allowfullscreen: "allowfullscreen"
            })) : $a("div", {
                className: "unit_iframe_wrapper"
            }, $a("iframe", {
                src: e,
                width: "560",
                height: "315",
                frameborder: "0",
                allowfullscreen: "allowfullscreen"
            })))) : "", $a("div", {
                dangerouslySetInnerHTML: {
                    __html: s.content
                },
                ref: e => {
                    e && !t && n(e)
                }
            }), s.meta && s.meta.hasOwnProperty("access") && s.meta.access && s.meta.attachments && s.meta.attachments.length ? $a("div", {
                className: "unit_attachments"
            }, $a("h3", null, window.wplms_course_data.translations.attachments), s.meta.attachments.map((e, t) => $a("div", {
                className: "attachment download_options"
            }, $a("span", null, e.name), $a("a", {
                href: e.link,
                download: e.link.substring(e.link.lastIndexOf("/") + 1),
                target: "_blank",
                className: "download_button"
            })))) : "", s.meta && s.meta.hasOwnProperty("access") && s.meta.access && s.meta.attachments && s.meta.assignments.length ? $a("div", {
                className: "unit_assignments"
            }, $a("h3", null, window.wplms_course_data.translations.assignments), s.meta.assignments.map((t, n) => $a("div", {
                className: "assignment"
            }, $a("div", {
                className: "assignment_heading"
            }, $a("span", null, t.title), $a("div", {
                className: "assignment_meta"
            }, t && t.hasOwnProperty("show") && t.show ? $a("a", {
                className: "vicon vicon-minus",
                onClick: () => {
                    _(!1, n)
                }
            }) : $a("a", {
                className: "vicon vicon-plus",
                onClick: () => {
                    _(!0, n)
                }
            }))), t.show ? $a("div", {
                className: "assignment_content_wrapper"
            }, $a(_s, {
                assignment: t,
                assignmentIndex: n,
                index: n,
                unitIndex: e.index,
                update: w
            })) : ""))) : "", s.meta.hasOwnProperty("pratice_questions") && s.meta.pratice_questions.length ? $a("div", {
                className: "pratice_questions"
            }, $a(Ra, {
                questions: s.meta.pratice_questions
            })) : "")
        },
        Ga = n(7);

    function Za(e, t, n, s) {
        const a = e * (Math.PI / 180),
            r = t * (Math.PI / 180);
        return {
            x: 0,
            y: 0,
            wobble: 10 * s(),
            wobbleSpeed: .1 + .1 * s(),
            velocity: .5 * n + s() * n,
            angle2D: -a + (.5 * r - s() * r),
            angle3D: -Math.PI / 4 + s() * (Math.PI / 2),
            tiltAngle: s() * Math.PI,
            tiltAngleSpeed: .1 + .3 * s()
        }
    }

    function er(e, t, n, s, a, r) {
        let i;
        return new Promise(o => {
            requestAnimationFrame((function l(u) {
                i || (i = u);
                const c = u - i,
                    d = i === u ? 0 : (u - i) / a;
                t.slice(0, Math.ceil(c / r)).forEach(e => {
                    ! function(e, t, n, s) {
                        e.physics.x += Math.cos(e.physics.angle2D) * e.physics.velocity, e.physics.y += Math.sin(e.physics.angle2D) * e.physics.velocity, e.physics.z += Math.sin(e.physics.angle3D) * e.physics.velocity, e.physics.wobble += e.physics.wobbleSpeed, s ? e.physics.velocity *= s : e.physics.velocity -= e.physics.velocity * n, e.physics.y += 3, e.physics.tiltAngle += e.physics.tiltAngleSpeed;
                        const {
                            x: a,
                            y: r,
                            tiltAngle: i,
                            wobble: o
                        } = e.physics, l = `translate3d(${a+10*Math.cos(o)}px, ${r+10*Math.sin(o)}px, 0) rotate3d(1, 1, 1, ${i}rad)`;
                        e.element.style.visibility = "visible", e.element.style.transform = l, e.element.style.opacity = 1 - t
                    }(e, d, n, s)
                }), u - i < a ? requestAnimationFrame(l) : (t.forEach(t => {
                    if (e && t.element.parentNode === e) return e.removeChild(t.element)
                }), o())
            }))
        })
    }
    const tr = {
        angle: 90,
        spread: 45,
        startVelocity: 45,
        elementCount: 50,
        width: "10px",
        height: "10px",
        colors: ["#a864fd", "#29cdff", "#78ff44", "#ff718d", "#fdff6a"],
        duration: 3e3,
        stagger: 0,
        dragFriction: .1,
        random: Math.random
    };

    function nr(e, t = {}) {
        const {
            elementCount: n,
            colors: s,
            width: a,
            height: r,
            angle: i,
            spread: o,
            startVelocity: l,
            decay: u,
            dragFriction: c,
            duration: d,
            stagger: m,
            random: p
        } = Object.assign({}, tr, function(e) {
            return !e.stagger && e.delay && (e.stagger = e.delay), e
        }(t)), h = function(e, t, n, s, a) {
            return Array.from({
                length: t
            }).map((t, r) => {
                const i = document.createElement("div"),
                    o = n[r % n.length];
                return i.style["background-color"] = o, i.style.width = s, i.style.height = a, i.style.position = "absolute", i.style.willChange = "transform, opacity", i.style.visibility = "hidden", e && e.appendChild(i), i
            })
        }(e, n, s, a, r);
        return er(e, h.map(e => ({
            element: e,
            physics: Za(i, o, l, p)
        })), c, u, d, m)
    }
    const {
        createElement: sr,
        render: ar,
        useState: rr,
        useEffect: ir,
        Fragment: or,
        useRef: lr
    } = wp.element, {
        dispatch: ur,
        select: cr
    } = wp.data;
    jQuery.noConflict();
    var dr = e => {
        const [t, n] = rr(!1), [s, a] = rr(!1), r = lr(null), [i, o] = rr(""), [l, u] = rr(!1), [c, d] = rr(e.course), [m, h] = rr({}), [_, w] = rr({
            per_page: 5,
            paged: 1
        }), [f, v] = rr({
            prev: 0,
            next: 0
        }), [g, y] = rr(!1), [k, x] = rr(!1), [q, S] = rr(!1), [N, O] = rr(!1), [E, z] = rr({}), [C, M] = rr(!1), [I, T] = rr(!0), [L, j] = rr(!0), [A, D] = rr([]), [H, F] = rr(null), [B, R] = rr(!1), [$, J] = rr(null), [W, U] = rr(null);
        let Y = cr("vibebp").getUser();
        Y.token = cr("vibebp").getToken(), window.scorm_page_type = "course", window.scorm_wplms_data = {}, window.scorm_wplms_data.user_email = Y.email, window.scorm_wplms_data.user_name = Y.username, window.scorm_wplms_data.token = Y.token, window.scorm_wplms_data.course_id = e.course_id, window.is_take_course = !0, window.scorm_wplms_data.type = "course", ir(() => {
            d(e.course)
        }, [e.course]), ir(() => (window.innerWidth < 480 && S(!0), document.addEventListener("wplms_change_coursestatus", e => {
            let t = e.detail.coursestatus;
            a(!0), h(t), a(!1)
        }), document.addEventListener("custom_quiz_action", t => {
            if (t.detail.hasOwnProperty("action")) {
                console.log(t.detail);
                let n = t.detail.coursestatus;
                if ("quizsubmitted" == t.detail.action) {
                    let t = n.current_unit_key;
                    if (n.courseitems[t].hasOwnProperty("status") && parseInt(n.courseitems[t].status)) return n.courseitems[t].progressbar = 100, !1;
                    n.courseitems[t].status = 1, n.courseitems[t].progressbar = 100;
                    let s = 0,
                        a = 0,
                        r = 0;
                    n.courseitems.map((e, t) => {
                        e.status && s++, e.id && r++
                    }), a = s / r, a = Math.round(100 * a), e.update({
                        progress: a,
                        index: e.index
                    }, "progresschanged"), h(n), n.courseitems[t] && "unit" == n.courseitems[t].type ? fetch(`${window.wplms_course_data.api_url}/user/coursestatus/${e.course_id}/item/${n.courseitems[t].id}/markcomplete`, {
                        method: "post",
                        body: JSON.stringify({
                            token: Y.token,
                            progress: a
                        })
                    }).then(e => e.json()).then(e => {
                        e.status && (ur("vibebp").addNotification({
                            icon: e.icon,
                            text: e.message
                        }), a && a >= 100 && V())
                    }) : (n.courseitems[t].status = 1, h(n), a && a >= 100 && V())
                }
                if ("retake_quiz" == t.detail.action) {
                    let t = n.current_unit_key;
                    if (n.courseitems[t] && n.courseitems[t].status) {
                        n.courseitems[t].status = 0;
                        let s = 0,
                            a = 0,
                            r = 0;
                        n.courseitems.map((e, t) => {
                            e.status && s++, e.id && r++
                        }), a = s / r, a = Math.round(100 * a), e.update({
                            progress: a,
                            index: e.index
                        }, "progresschanged"), h(n)
                    }
                }
            }
        }), document.querySelector("body").classList.add("course_status_fullscreen"), document.querySelector("body").classList.add("wplms_course_status"), window.wplms_course_data.disable_contextmenu && document.addEventListener("contextmenu", X, !1), () => {
            document.querySelector("body").classList.remove("wplms_course_status"), document.querySelector("body").classList.remove("course_status_fullscreen"), document.querySelector("body").classList.remove("course_status_loaded"), window.wplms_course_data.disable_contextmenu && document.removeEventListener("contextmenu", X);
            var t = new CustomEvent("course_status_left", {
                detail: {
                    coursestatus: m,
                    course_id: e.course_id
                }
            });
            document.dispatchEvent(t)
        }), []);
        const X = e => (console.log("You've tried to open context menu"), e.preventDefault(), !1);
        ir(() => {
            n(!0), fetch(`${window.wplms_course_data.api_url}/user/coursestatus/${e.course_id}`, {
                method: "post",
                body: JSON.stringify({
                    token: Y.token
                })
            }).then(e => e.json()).then(t => {
                if (t) {
                    t.hasOwnProperty("error_code") && (ur("vibebp").addNotification({
                        icon: t.icon,
                        text: t.hasOwnProperty("error_message") && t.error_message.length ? t.error_message : window.wplms_course_data.translations.error
                    }), e.back(!0)), t.courseitems && t.courseitems.length && (t.courseitems.map((e, t) => {
                        e.status && (e.progressbar = 100, j(!1))
                    }), document.querySelector("body").classList.contains("course_status_loaded") || document.querySelector("body").classList.add("course_status_loaded"), h(t), G(t.current_unit_key, t), ee(t.current_unit_key, t)), t.package && (h({
                        package: t.package
                    }), t.hasOwnProperty("package_type") && t.package_type && "1.1" == t.package_type && setTimeout(() => {
                        var e = new CustomEvent("unit_content_loaded", {
                            detail: {
                                coursestatus: {
                                    package: t.package
                                }
                            }
                        });
                        document.dispatchEvent(e)
                    }, 200));
                    var s = new CustomEvent("course_status_loaded", {
                        detail: {
                            coursestatus: t,
                            course_id: e.course_id
                        }
                    });
                    document.dispatchEvent(s), n(!1)
                }
            })
        }, [_]), ir(() => {
            let e = {
                ...m
            };
            if (i && i.length > 3) {
                if (e && e.courseitems) {
                    var t = new Ga.Search("key");
                    t.addIndex("title"), t.addIndex("content"), t.addDocuments(e.courseitems);
                    var n = t.search(i);
                    e.filtered_items = n, e.keyword = i, h(e), n && n.length && G(n[0].key, e)
                }
            } else e.filtered_items = [], e.keyword = "", h(e)
        }, [i]);
        const V = () => {
                m.hasOwnProperty("auto_finish") && m.auto_finish && c.user_progress >= 100 && fetch(`${window.wplms_course_data.api_url}/user/coursestatus/${e.course_id}/checkcomplete`, {
                    method: "post",
                    body: JSON.stringify({
                        token: Y.token,
                        course: m,
                        course_id: e.course
                    })
                }).then(e => e.json()).then(e => {
                    e && e.status && re(!0)
                })
            },
            Q = e => {
                let t = {
                    ...m
                };
                t && t.courseitems && t.courseitems[W] && "unit" == t.courseitems[W].type && (t.courseitems[W].hasOwnProperty("progressbar") || (t.courseitems[W].progressbar = 0), e > 100 && (e = 100), t.courseitems[W].progressbar = e, h(t))
            },
            K = (e, t) => {
                let n = document.scrollingElement || document.documentElement;
                document.querySelector("body").classList && document.querySelector("body").classList.length && document.querySelector("body").classList.contains("course_status_fullscreen") && r.current && (e = 0, n = r.current);
                const s = n.scrollTop,
                    a = e - s,
                    i = +new Date,
                    o = function() {
                        const r = +new Date - i;
                        var l, u, c;
                        n.scrollTop = parseInt((l = r, u = s, c = a, (l /= t / 2) < 1 ? c / 2 * l * l + u : -c / 2 * (--l * (l - 2) - 1) + u)), r < t ? requestAnimationFrame(o) : n.scrollTop = e
                    };
                o()
            },
            G = (t, n = null) => {
                if (null == n && (n = {
                        ...m
                    }), n.hasOwnProperty("lock") && n.lock && n.courseitems && n.courseitems.length)
                    for (let e = 0; e < t; e++)
                        if ("section" != n.courseitems[e].type && !n.courseitems[e].status) return !1;
                if (n.courseitems[t].id && "unit" == n.courseitems[t].type)
                    if (!n.courseitems[t].content || n.courseitems[t].content.length < 3 || !m.courseitems[t].meta.hasOwnProperty("access") || !m.courseitems[t].meta.access || n.courseitems[t].meta.hasOwnProperty("no_cache") && n.courseitems[t].meta.no_cache) {
                        a(!0), $ && $.abort();
                        let s = {},
                            i = new AbortController;
                        $ && (s = {
                            signal: i.signal
                        }), J(i), n.current_unit_key = t, h(n), U(t), ee(t, n), fetch(`${window.wplms_course_data.api_url}/user/coursestatus/${e.course_id}/item/${n.courseitems[t].id}`, {
                            method: "post",
                            ...s,
                            body: JSON.stringify({
                                token: Y.token
                            })
                        }).then(e => e.json()).then(s => {
                            if (J(null), s) {
                                n.courseitems[t].content = s.content, n.courseitems[t].meta = s.meta;
                                let o = 1;
                                Array.isArray(s.scripts) && s.scripts.map(e => {
                                    if (!document.getElementById(e.key)) {
                                        let t = document.createElement("script");
                                        t.src = e.src, t.id = e.key, document.body.appendChild(t), t.onload = () => {
                                            o++, console.log("loaded"), o == s.scripts.length && document.body.dispatchEvent(new Event("post-load"))
                                        }
                                    }
                                }), h(n), a(!1), r.current && window.hasOwnProperty("innerWidth") && window.innerWidth > 768 && K(r.current.scrollTop, 800), s.meta.hasOwnProperty("scorm_type") && s.meta.scorm_type && setTimeout(() => {
                                    var e = new CustomEvent("unit_content_loaded", {
                                        detail: {
                                            coursestatus: n
                                        }
                                    });
                                    document.dispatchEvent(e)
                                }, 200);
                                var i = new CustomEvent("unit_loaded", {
                                    detail: {
                                        coursestatus: n,
                                        course: e.course_id
                                    }
                                });
                                document.dispatchEvent(i), document.dispatchEvent(new Event("VibeBP_Editor_Content"))
                            }
                            
                            var iframe = document.querySelector('iframe');
                            var player = new Vimeo.Player(iframe);

                             var currentPos, percentage, vdoEndTym = "";
                             var vdo_play = "";
                                // player.on('timeupdate', function (getAll)
                                // {
                                //     currentPos = getAll.seconds; //get currentime
                                //     vdoEndTym = getAll.duration; //get video duration
                                //     percentage = (getAll.percent * 100)+"%";
                                //     console.log('currentPos: ' + currentPos);
                                //     console.log('percentage: ' + percentage);
                                //     console.log('vdoEndTym: ' + vdoEndTym);
                                // });
                                player.on('ended', function (){
                                    let d = hs("vibebp").getUser();
                                    d.token = hs("vibebp").getToken();
                                    console.log("finished");
                                    fetch(window.wplms_course_data.api_url + "/user/videowatched", {
                                        method: "POST",
                                        body: JSON.stringify({
                                            quiz_id: n.courseitems[t].id,
                                            course_id: e.course_id,
                                            token: d.token
                                        })
                                    }).then(e => e.json()).then(e => {
                                        if(e.status == true){ 
                                            var prev_creds = jQuery('.point-number').text();
                                            var total_creds = parseInt(prev_creds) + parseInt(e.points);
                                            jQuery('.point-number').text(total_creds);
                                            var point_toast = "You just earned "+e.points+" Points"
                                            jQuery('#point-text').text(point_toast);

                                            jQuery('.point-toaster').fadeIn();
                                            jQuery('.point-toaster').fadeOut(10000);
                                        }
                                    })
                                })
                            
                        }).catch(e => {
                            "AbortError" === e.name ? console.log("Fetch aborted") : console.error("Uh oh, an error!", e)
                        })
                    } else {
                        U(t), h(n), ee(t, n), n.hasOwnProperty("courseitems") && n.courseitems[t].hasOwnProperty("meta") && n.courseitems[t].meta.hasOwnProperty("scorm_type") && n.courseitems[t].meta.scorm_type && setTimeout(() => {
                            var e = new CustomEvent("unit_content_loaded", {
                                detail: {
                                    coursestatus: n
                                }
                            });
                            document.dispatchEvent(e)
                        }, 200);
                        var s = new CustomEvent("unit_loaded", {
                            detail: {
                                coursestatus: n,
                                course: e.course_id
                            }
                        });
                        document.dispatchEvent(s), document.dispatchEvent(new Event("VibeBP_Editor_Content")), r.current && window.hasOwnProperty("innerWidth") && window.innerWidth > 768 && K(r.current.scrollTop, 800)
                    }
                else a(!0), U(t), h(n), ee(t, n), a(!1), r.current && window.hasOwnProperty("innerWidth") && window.innerWidth > 768 && K(r.current.scrollTop, 800);
                y(!1)
            },
            Z = t => {
                let n = W;
                if ("prev" == t) {
                    for (let e = n - 1; e >= 0; e--)
                        if (m.courseitems[e] && 0 != m.courseitems[e].id) {
                            n = m.courseitems[e].key;
                            break
                        }
                } else
                    for (let t = n + 1; t < m.courseitems.length; t++)
                        if (m.courseitems[t] && 0 != m.courseitems[t].id) {
                            n = m.courseitems[t].key, 1 == e.course.user_status && e.update({
                                index: e.index,
                                user_status: 2
                            }, "statuschanged");
                            break
                        } G(n)
            },
            ee = (e, t = null) => {
                null === t && (t = m);
                let n = {
                    prev: 0,
                    next: 0
                };
                for (let s = e - 1; s >= 0; s--)
                    if (t.courseitems[s] && 0 != t.courseitems[s].id) {
                        n.prev = 1;
                        break
                    } for (let s = e + 1; s < t.courseitems.length; s++)
                    if (t.courseitems[s] && 0 != t.courseitems[s].id) {
                        n.next = 1;
                        break
                    } v(n)
            },
            te = (t = null, n = null) => {
                if ("quizsubmitted" == t && se(), "retake_quiz" == t) {
                    let t = {
                        ...m
                    };
                    if (t.courseitems[W] && t.courseitems[W].status) {
                        t.courseitems[W].status = 0;
                        let n = 0,
                            s = 0,
                            a = 0;
                        t.courseitems.map((e, t) => {
                            e.status && n++, e.id && a++
                        }), s = n / a, s = Math.round(100 * s), e.update({
                            progress: s,
                            index: e.index
                        }, "progresschanged"), h(t)
                    }
                }
            },
            ne = (e, t) => {
                let n = {
                    ...m
                };
                "submitassignment" == t && (e.hasOwnProperty("unitIndex") || (n.courseitems[W].status = 1, h(n))), "retookassignment" == t && (e.hasOwnProperty("unitIndex") || (n.courseitems[W].status = 0, h(n)))
            },
            se = (t = null, n = null) => new Promise(s => {
                let a = {
                    ...m
                };
                if (null == t && (t = W), a.courseitems[t].hasOwnProperty("status") && parseInt(a.courseitems[t].status)) return a.courseitems[t].progressbar = 100, s(), !1;
                a.courseitems[t].status = 1, a.courseitems[t].progressbar = 100;
                let r = 0,
                    i = 0,
                    o = 0;
                a.courseitems.map((e, t) => {
                    e.status && r++, e.id && o++
                }), i = r / o, i = Math.round(100 * i), e.update({
                    progress: i,
                    index: e.index
                }, "progresschanged"), a.courseitems[t] ? fetch(`${window.wplms_course_data.api_url}/user/coursestatus/${e.course_id}/item/${a.courseitems[t].id}/markcomplete`, {
                    method: "post",
                    body: JSON.stringify({
                        token: Y.token,
                        progress: i
                    })
                }).then(e => e.json()).then(e => {
                    e.status && (ur("vibebp").addNotification({
                        icon: e.icon,
                        text: e.message
                    }), i && i >= 100 && null == n && V(), s(), h(a))
                }) : (a.courseitems[t].status = 1, h(a), i && i >= 100 && null == n && V(), s(), h(a))
            }),
            ae = () => {
                if (m.hasOwnProperty("package") && m.package || se(), M(!0), R(!0), !m.hasOwnProperty("comments_open") || !m.comments_open) return re(!0), !1;
                E.hasOwnProperty("comment_ID") || fetch(`${window.wplms_course_data.api_url}/user/getreview/${e.course_id}`, {
                    method: "post",
                    body: JSON.stringify({
                        token: Y.token,
                        course_id: e.course_id
                    })
                }).then(e => e.json()).then(e => {
                    e && e.comment_ID && z(e), T(!1)
                })
            },
            re = (t = null) => {
                if (!t) {
                    //if (!(E && E.hasOwnProperty("title") && E.hasOwnProperty("review") && E.hasOwnProperty("rating") && E.title.length > 3 && E.review.length > 3 && E.rating > 1 )) return alert(window.wplms_course_data.translations.please_check_review_form), T(!1), !1;
                    
                    //if (!(E && E.hasOwnProperty("review") && E.hasOwnProperty("rating") && E.review.length > 3 && E.rating > 1 )) return alert(window.wplms_course_data.translations.please_check_review_form), T(!1), !1;   
                    if (!(E && E.hasOwnProperty("review") && E.hasOwnProperty("rating"))) return alert(window.wplms_course_data.translations.please_check_review_form), T(!1), !1;                  
                    T(!0), E.comment_post_ID = e.course_id, E.course_id = e.course_id, E.token = Y.token, fetch(window.wplms_course_data.api_url + "/updatecourse/addreview", {
                        method: "post",
                        body: JSON.stringify(E)
                    }).then(e => e.json()).then(e => {
                        if (!e) return alert(window.wplms_course_data.translations.error_review_form), T(!1), !1;
                        if (e.status) T(!1);
                       // else if (e.message) return alert(e.message), T(!1), !1
                    })
                }                
                T(!0), fetch(window.wplms_course_data.api_url + "/user/finishcourse", {
                    method: "post",
                    body: JSON.stringify({
                        course_id: e.course_id,
                        token: Y.token
                    })
                }).then(e => e.json()).then(t => {
                    t ? t.status && (M(!1), T(!1), t.finished && (F(t.finished), t.finished.hasOwnProperty("course_status") && e.update({
                        index: e.index,
                        user_status: t.finished.course_status
                    }, "statuschanged"), t.finished.status && ie().then(() => {
                        e.update({
                            progress: 100,
                            index: e.index
                        }, "progresschanged")
                    }))) : (ur("vibebp").addNotification({
                        text: window.wplms_course_data.translations.error_finishing_course
                    }), T(!1))
                })
            },
            ie = () => {
                let e = [],
                    t = {
                        ...m
                    };
                return t.hasOwnProperty("courseitems") && t.courseitems && t.courseitems.length && t.courseitems.map((n, s) => {
                    let a = new Promise((function(e) {
                        n && n.hasOwnProperty("status") && parseInt(n.status) ? e() : n && n.hasOwnProperty("id") && parseInt(n.id) ? (t.courseitems[s].status = 1, t.courseitems[s].progressbar = 100, e()) : e()
                    }));
                    e.push(a)
                }), h(t), Promise.all(e)
            },
            oe = (e, t) => {
                if ("loadunit" == t && e.hasOwnProperty("index") && G(e.index), m.hasOwnProperty("assignment_locking") && m.assignment_locking && "completeUnitAssigmnent" == t || "retakeUnitAssigmnent" == t) {
                    let n = {
                            ...m
                        },
                        s = n.courseitems[W];
                    if (console.log(parseInt(n.assignment_locking) > 1), parseInt(n.assignment_locking) > 1) {
                        if ("completeUnitAssigmnent" == t && s.meta.hasOwnProperty("assignments") && s.meta.assignments.length && (s.meta.assignments[e.assignmentIndex].status = 1), "retakeUnitAssigmnent" == t) {
                            let t = m.courseitems[W];
                            t.meta.hasOwnProperty("assignments") && t.meta.assignments.length && (t.meta.assignments[e.assignmentIndex].status = 0)
                        }
                        let a = 0;
                        s.meta.assignments.map((e, t) => {
                            e.status && a++
                        });
                        let r = a / s.meta.assignments.length * 100;
                        r >= 100 ? se() : 1 == s.status && (n.courseitems[W].status = 0), r = Math.round(r), Q(r), h(n)
                    }
                }
                if ("mediaended" == t && se(), "videosended" == t) {
                    let t = {
                        ...m
                    };
                    if (t.courseitems[W] && t.courseitems[W].hasOwnProperty("meta") && t.courseitems[W].meta.hasOwnProperty("video") && t.courseitems[W].meta.video.length) {
                        t.courseitems[W].meta.hasOwnProperty("completion") || (t.courseitems[W].meta.completion = []), t.courseitems[W].meta.completion[e.index] || (t.courseitems[W].meta.completion[e.index] = {
                            url: t.courseitems[W].meta.completion[e.index],
                            status: 0
                        }), t.courseitems[W].meta.completion[e.index].status = 1;
                        let n = 0;
                        t.courseitems[W].meta.completion.map((e, t) => {
                            e && e.status && n++
                        });
                        let s = Math.round(n / t.courseitems[W].meta.video.length * 100);
                        t.courseitems[W].hasOwnProperty("progressbar") || (t.courseitems[W].progressbar = 0), s >= 100 ? (s = 100, se()) : (t.courseitems[W].progressbar = s, h(t))
                    }
                }
            };
        return sr(or, null, t ? sr(p, null) : m ? sr(b.Provider, {
            value: {
                courseStatus: m,
                current_unit_key: W,
                update: (e, t) => {
                    switch (t) {
                        case "loadunit":
                            e.hasOwnProperty("index") && G(e.index);
                            break;
                        case "updateprogress":
                            e.hasOwnProperty("progress") && Q(e.progress);
                            break;
                        case "progresscompleted":
                            se();
                            break;
                        case "directmarkcomplete":
                            e.hasOwnProperty("index") && (m.hasOwnProperty("assignment_locking") && m.assignment_locking && m.courseitems[W].meta.hasOwnProperty("assignments") && m.courseitems[W].meta.assignments.length ? ur("vibebp").addNotification({
                                icon: "vicon-bookmark-alt",
                                text: window.wplms_course_data.translations.complete_unit_assignments
                            }) : se(e.index))
                    }
                }
            }
        }, sr("div", {
            className: m.is_event_type ? "course_status event_course_timeline" : "course_status " + (q ? "moveonside" : ""),
            ref: r
        }, L && m.hasOwnProperty("instructions") && m.instructions.length ? sr("div", {
            className: "course_instructions_popup",
            onClick: e => {
                e.preventDefault(), document.querySelector(".course_instructions_wrapper") && e.target === document.querySelector(".course_instructions_wrapper") && j(!1)
            }
        }, sr("div", {
            className: "course_instructions exampleModalPopup",
            id:"exampleModalPopup"
        }, sr("div", {
            className: "close",
            onClick: () => {
                j(!1)
            }
        }, sr("span", {
            className: "vicon vicon-close"
        })),
        sr("div", {
            className: "modal-header",
            onClick: () => {
                j(!1)
            }
        }, sr("div", {
            className: "header-logo"
        }),
        sr("div", {
            className: "header-info"
        },
            
            sr("h2", {
                dangerouslySetInnerHTML: {
                    __html: "Welcome"
                }
            }), 
            sr("h6", {
            dangerouslySetInnerHTML: {
                __html: c.name
            }
        })
        )),
         sr("h1", null, window.wplms_course_data.translations.course_instructions), sr("div", {
            className: "custom-list",
            dangerouslySetInnerHTML: {
                __html: m.instructions
            }
        }))) : "", H ? sr("div", {
            className: "reviewpopup_wrapper complete_course_popup",
            id:"remove_course_popup",
        }, sr("div", {
            className: "reviewpopup_content"
        }, sr("div", {
            className: "finish-course-content"
        },sr("div", {
            className: "close",
           // onClick: e.back
            onClick: () => {
                  //var element = document.getElementById("remove_course_popup").hide();
                    //jQuery.noConflict();
                    jQuery('#remove_course_popup').toggle();
             }
        }, sr("span", {
            className: "vicon vicon-close"
        })), H.hasOwnProperty("percentage") ? sr("span", {
            className: "finish-logo",
           /* ref: e => nr(e, {
                colors: ["#a864fd", "#29cdff", "#78ff44", "#ff718d", "#fdff6a"],
                angle: 90,
                spread: 90,
                startVelocity: 45,
                elementCount: 100,
                dragFriction: .1,
                duration: 5e3,
                stagger: 2,
                width: "12px",
                height: "12px"
            })*/
        }, sr("span", null, sr("span", null, sr("strong", null, H.percentage), sr("span", null, "%")), sr("span", null, H.title))) : "", H.awards ? sr("div", {
            className: "awards"
        }, Object.keys(H.awards).map(e => "badge" == e ? sr("div", {
            className: "badge"
        }, sr("img", {
            src: H.awards[e].url
        }), sr("span", null, H.awards[e].title)) : "certificate" == e ? sr("div", {
            className: "certificate"
        }, sr("a", {
            href: H.awards[e].url,
            target: "_blank"
        }, sr("svg", {
            xmlns: "http://www.w3.org/2000/svg",
            width: "160",
            height: "160",
            viewBox: "0 0 24 24"
        }, sr("path", {
            d: "M14.969 9.547l.031.191c0 .193-.096.379-.264.496-.538.372-.467.278-.67.885-.084.253-.33.424-.605.424h-.002c-.664-.002-.549-.038-1.083.338-.112.08-.244.119-.376.119s-.264-.039-.376-.118c-.534-.376-.419-.34-1.083-.338h-.002c-.275 0-.521-.171-.605-.424-.203-.607-.133-.513-.669-.885-.169-.118-.265-.304-.265-.497l.031-.19c.207-.604.208-.488 0-1.094l-.031-.191c0-.193.096-.379.265-.497.536-.372.465-.277.669-.885.084-.253.33-.424.605-.424h.002c.662.002.544.041 1.083-.338.112-.08.244-.119.376-.119s.264.039.376.118c.534.376.419.34 1.083.338h.002c.275 0 .521.171.605.424.203.607.132.513.67.885.168.118.264.304.264.497l-.031.191c-.207.604-.208.488 0 1.094zm-1.469-1.198l-.465-.464-1.41 1.446-.66-.627-.465.464 1.125 1.091 1.875-1.91zm4.5 4.651h-12v1h12v-1zm-1 2h-10v1h10v-1zm1 2h-12v1h12v-1zm1-15h-19v20h24v-20h-5zm3 15.422c-1.151.504-2.074 1.427-2.578 2.578h-14.844c-.504-1.151-1.427-2.074-2.578-2.578v-10.844c1.151-.504 2.074-1.427 2.578-2.578h14.844c.504 1.151 1.427 2.074 2.578 2.578v10.844z"
        })), sr("span", null, window.wplms_course_data.translations.achievement_certificate))) : "points" == e ? sr("div", {
            className: "points"
        }, sr("svg", {
            xmlns: "http://www.w3.org/2000/svg",
            width: "24",
            height: "24",
            viewBox: "0 0 24 24"
        }, sr("path", {
            d: "M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 3c-4.971 0-9 4.029-9 9s4.029 9 9 9 9-4.029 9-9-4.029-9-9-9zm1 13.947v1.053h-1v-.998c-1.035-.018-2.106-.265-3-.727l.455-1.644c.956.371 2.229.765 3.225.54 1.149-.26 1.385-1.442.114-2.011-.931-.434-3.778-.805-3.778-3.243 0-1.363 1.039-2.583 2.984-2.85v-1.067h1v1.018c.725.019 1.535.145 2.442.42l-.362 1.648c-.768-.27-1.616-.515-2.442-.465-1.489.087-1.62 1.376-.581 1.916 1.711.804 3.943 1.401 3.943 3.546.002 1.718-1.344 2.632-3 2.864z"
        })), sr("span", null, H.awards[e].amount)) : void 0)) : "", sr("div", {
            className: "post_completion_message"
        }, sr("div", {
            className: "completion_message",
            dangerouslySetInnerHTML: {
                __html: H.message
            }
        }), sr("div", {
            className: "congrats-message",
            dangerouslySetInnerHTML: {
                __html: H.post_message
            }
        })),/* sr("div", {
            className: "popup-footer"
        }, window.wplms_course_data.translations.cancel),*/ sr("a", {
            className: "button back-button",
            onClick: e.back
        }, window.wplms_course_data.translations.back_to_my_courses, sr("span", {
            className: "vicon vicon-angle-right hide"
        }, sr("a", {
            className: "link",
            onClick: () => F(!1)
        })))))) : "", C ? sr("div", {
            className: "reviewpopup_wrapper",
            id: "reviewpopup_wrapid",
            onClick: e => {
                e.preventDefault(), document.querySelector(".reviewpopup_wrapper") && e.target === document.querySelector(".reviewpopup_wrapper") && M(!1)
            }
        }, sr("div", {
            className: "reviewpopup_content"
        }, sr("div", {
            className: "close",
            onClick: () => {
                M(!1)
            }
        }, sr("span", {
            className: "vicon vicon-close"
        })), I ? sr(p, null) : m.hasOwnProperty("comments_open") && m.comments_open ? sr(or, null, sr("div", {
            className: "reviewform"
        },sr("div", {
            className: "review_heading",
            dangerouslySetInnerHTML: {
                __html: c.name
            }}), sr("label", null, window.wplms_course_data.translations.rating), sr(la, {
            update: (e, t) => {
                if ("ratingchanged" == t) {
                    let t = 0;
                    e && (t = e.length);
                    let n = {
                        ...E
                    };
                    n.rating = t, z(n)
                }
            },
            rating: E.rating
        }), sr("textarea", {
            onChange: e => {
                let t = {
                    ...E
                }; 
                t.review = e.target.value, z(t)
            },
            value: E.review,
            placeholder: window.wplms_course_data.translations.your_review         
        }), sr("div", {
            className: "popup-footer custom-popup-footer"
        }, B ? sr(or, null, sr("a", {
            href: "#",
            onClick: () => {
                re(!0)               
            }
        }, sr("span", {
            className: "vicon vicon-angle-left"
        }), " ", window.wplms_course_data.translations.skip_review_and_finish_course), sr("a", {
            href: "#",
            className: I ? "button is-loading" : "button",
            onClick: () => {
                re()
                jQuery('#reviewpopup_wrapid').toggle();
                jQuery('#remove_course_popup').toggle();
            }
        }, window.wplms_course_data.translations.submit_review_and_finish_course, " ", sr("span", {
            className: "vicon vicon-angle-right"
        }))) : sr(or, null, sr("a", {
            className: "link",
            onClick: () => {
                M(!1)
                jQuery('#reviewpopup_wrapid').toggle();
                jQuery('#remove_course_popup').toggle();                
            }
        }, window.wplms_course_data.translations.cancel), sr("a", {
            className: "button",
            onClick: () => {
                E && E.hasOwnProperty("review") && E.hasOwnProperty("rating") ? (T(!0), E.comment_post_ID = e.course_id, E.course_id = e.course_id, E.token = Y.token, fetch(window.wplms_course_data.api_url + "/updatecourse/addreview", {
                    method: "post",
                    body: JSON.stringify(E)
                }).then(e => e.json()).then(e => {
                    e ? e.status ? T(!1) : e.message && (alert(e.message), T(!1)) : (alert(window.wplms_course_data.translations.error_review_form), T(!1)), M(!1)
                })) : (alert(window.wplms_course_data.translations.please_check_review_form), T(!1))                                
            }
        }, window.wplms_course_data.translations.submit_review, " ", sr("span", {
            className: "vicon vicon-angle-right"
        })))))) : "")) : "", (() => {
            let e = 0;
            if (m && m.courseitems && m.courseitems.length && m.courseitems[W] && "unit" == m.courseitems[W].type && !m.courseitems[W].status && m.courseitems[W].hasOwnProperty("meta") && m.courseitems[W].meta.hasOwnProperty("access") && m.courseitems[W].meta.access && (e = 1, m.hasOwnProperty("assignment_locking") && m.assignment_locking && m.courseitems[W].meta.hasOwnProperty("assignments") && m.courseitems[W].meta.assignments.length && (e = 0), m.courseitems[W].meta.hasOwnProperty("video") && (m.courseitems[W].meta.video.hasOwnProperty("url") || Array.isArray(m.courseitems[W].meta.video) && m.courseitems[W].meta.video.length) && (e = 0)), e) return sr(ea, null)
        })(), m.package ? sr("div", {
            className: "course_package_wrapper"
        }, sr("div", {
            className: "course_package_header"
        }, sr("div", {
            className: "vicon vicon-angle-left",
            onClick: e.back
        }), sr("div", {
            className: "finish_course button is-primary small",
            onClick: () => {
                ae()
            }
        }, window.wplms_course_data.translations.complete)), sr("div", {
            className: "course_package"
        }, sr("div", {
            dangerouslySetInnerHTML: {
                __html: m.package
            }
        }))) : sr(or, null, sr("div", {
            className: k ? "course_timeline expand " + (g || N ? "comments_shown" : "") : "course_timeline " + (g || N ? "comments_shown" : "")
        }, sr("div", {
            className: "course_action_points"
        }, sr("div", {
            className: "action_points"
        }, sr("a", {
            className: "arrow_right",
            onClick: () =>{
                let element     = document.getElementById("wplms_the_course_button");
                let fs_element  = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;
                if(fs_element == null){
                    e.back();
                }
                else {
                    if(document.exitFullscreen)                 document.exitFullscreen();
                    else if(document.mozCancelFullScreen)       document.mozCancelFullScreen();
                    else if(document.webkitExitFullscreen)      document.webkitExitFullscreen();
                    else if(document.msExitFullscreen)          document.msExitFullscreen();
                }
                
            }
        }), !s && !is(m) && m.hasOwnProperty("courseitems") && m.courseitems.length ? sr(or, null, sr("a", {
            className: "icon_search",
            onClick: () => {
                console.log(m);
                u(!0)
            }
        }), m.courseitems[W].hasOwnProperty("meta") && m.courseitems[W].meta.hasOwnProperty("access") && m.courseitems[W].meta.access ? sr(or, null, sr("a", {
            className: "icon_notepad",
            onClick: () => {
                O(!0)
            }
        }), 
        /*sr("a", {
            className: "icon_comments",
            onClick: () => {
                y(!0)
            }
        })*/
        ) : ""
        ) : "", sr("a", {
            title: document.querySelector("body").classList.contains("course_status_fullscreen") ? window.wplms_course_data.translations.minimise_screen : window.wplms_course_data.translations.maximise_screen,
            className: "icon_fullscreen",
            onClick: () => {
                // New logic is added here to enable fullscreen on click
                let element     = document.getElementById("wplms_the_course_button");
                let fs_element  = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;

                if(fs_element === null) {
                    if(element.requestFullscreen)               element.requestFullscreen();
                    else if(element.mozRequestFullScreen)       element.mozRequestFullScreen();
                    else if(element.webkitRequestFullscreen)    element.webkitRequestFullscreen();
                    else if(element.msRequestFullscreen)        element.msRequestFullscreen();
                } else {
                    if(document.exitFullscreen)                 document.exitFullscreen();
                    else if(document.mozCancelFullScreen)       document.mozCancelFullScreen();
                    else if(document.webkitExitFullscreen)      document.webkitExitFullscreen();
                    else if(document.msExitFullscreen)          document.msExitFullscreen();
                }
                //document.querySelector("body").classList.contains("course_status_fullscreen") ? document.querySelector("body").classList.remove("course_status_fullscreen") : document.querySelector("body").classList.add("course_status_fullscreen")
            }
        })), l ? sr("div", {
            className: "search-course " + (l ? "active" : "")
        }, sr("input", {
            type: "text",
            placeholder: window.wplms_course_data.translations.search_course_elements,
            onChange: e => {
                o(e.target.value)
            },
            value: i
        }), sr("span", null, m.filtered_items && i.length > 3 ? m.filtered_items.length + " " + window.wplms_course_data.translations.results_found : ""), sr("span", {
            onClick: () => {
                u(!1), o("")
            },
            className: "vicon vicon-close"
        })) : ""), g && m && m.courseitems && m.courseitems[W] && "unit" == m.courseitems[W].type ? sr(Ws, {
            type: "public",
            unit_id: m.courseitems[W].id,
            course_id: e.course_id,
            back: () => y(!1),
            expand: () => x(!k)
        }) : "", N && m && m.courseitems && m.courseitems[W] && "unit" == m.courseitems[W].type ? sr(Ws, {
            type: "note",
            unit_id: m.courseitems[W].id,
            course_id: e.course_id,
            back: () => O(!1),
            expand: () => x(!k)
        }) : "", e.hasOwnProperty("course") ? sr("div", {
            className: "course_heading"
        },sr("div", {
            className: c.is_event_course ? "event_course_logo" :  "leftheader-logo"
        }),sr("h6", {
            dangerouslySetInnerHTML: {
                __html: c.category
            }
        }),sr("h2", {
            dangerouslySetInnerHTML: {
                __html: c.name
            }
        }), sr("div", {
            class: "course_progress_wrapper"
        }, sr("div", {
            className: "course_progress"
        }, sr("span", {
            style: {
                width: c.user_progress + "%"
            }
        })), sr("span", null, c.user_progress, "%"))) : "", sr(P, null)), sr("div", {
            className: "course_content"
        }, sr("div", {
            className: "course_content_header"
        }, sr("span", {
            className: "toggle_timeline_wrapper hide_panel",
            onClick: () => {
                S(!q)
            }
        }, sr("span", {
            className: q ? window.innerWidth < 480 ? "vicon vicon-angle-double-down" : "vicon vicon-angle-double-right" : window.innerWidth < 480 ? "vicon vicon-angle-double-up" : "vicon vicon-angle-double-left"
        }), sr("span", null, q ? window.wplms_course_data.translations.show_panel : window.wplms_course_data.translations.hide_panel)), sr("div", {
            className: "right_block"
        },m.is_event_type ? sr("span", {
            className: "total-points"
        },sr("span", {
            className: "point-text"
        }, 'Total Points'),sr("span", {
            className: "point-number"
        }, m.total_creds),sr("span", {
            className: "point-toaster"
        },sr("span", {
            className: "point-toaster-icon"
        }),
        sr("p", {
            className: "point-text",
            id: "point-text"
        }, ''))) : '', m.hasOwnProperty("comments_open") ? sr("span", {
            className: "review_block",
            onClick: () => (M(!1), void(E.hasOwnProperty("comment_ID") || fetch(`${window.wplms_course_data.api_url}/user/getreview/${e.course_id}`, {
                method: "post",
                body: JSON.stringify({
                    token: Y.token,
                    course_id: e.course_id
                })
            }).then(e => e.json()).then(e => {console.log(e);
                e && e.comment_ID && z(e), T(!1)
            })))
        }, sr("span", {
            className: "vicon vicon-star"
        }), sr("span", null, window.wplms_course_data.translations.leave_rating)) : "", m && m.courseitems && m.courseitems.length ? sr("div", {
            className: "unit_prevnext"
        }, sr("div", {
            className: "unit_prev navigate_unit",
            onClick: () => {
                Z("prev")
            }
        }, f.prev ? sr(or, null, sr("span", {
            className: "vicon vicon-angle-left"
        }), sr("span", null, window.wplms_course_data.translations.previous_unit)) : ""), sr("div", {
            className: "unit_next navigate_unit",
            id:"navigate_unit",
            onClick: () => {
                se();
                Z("next");
            }
        }, f.next ? sr(or, null, sr("span", null, window.wplms_course_data.translations.next_unit), sr("span", {
            className: "vicon vicon-angle-right"
        })) : "")) : "")), s ? sr(p, null) : m && m.courseitems && m.courseitems.length ? (() => {
            let t = 0,
                n = 0;
            m.courseitems.map((e, s) => {
                e.id && t++, s <= W && e.id && n++
            });
            let s = "next_curriculum_item unlocked";
            switch (m.hasOwnProperty("lock") && m.lock && !m.courseitems[W].status && (s = "next_curriculum_item locked"), m.courseitems[W].type) {
                case "quiz":
                    return sr("div", {
                        className: "course_content_content_wrapper"
                    }, sr("div", {
                        className: "course_content_content"
                    }, sr("div", {
                        className: "top-heading"
                    },sr("span", {
                        className: "left-info"
                    }, sr("span", {
                        className: "lesson_info "
                    }, sr("span", null, window.wplms_course_data.reports.module.quiz, " ", n + "/" + t), sr(Os, {
                        timestamp: m.courseitems[W].duration,
                        notimediff: 1
                    })), sr("h2", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W].title
                        }
                    })),m.courseitems[W].quiz_mycreds == 0 && m.courseitems[W].total_retakes != 0 ? sr("span", {
                        className: "right-info"
                    },m.courseitems[W].is_event_type ? sr("span", {
                        className: "attempt-text"
                    }, 'Attempts Remaining') : '',m.courseitems[W].is_event_type ? sr("span", {
                        className: m.courseitems[W].retakes == 0 ? "attempt-number incorrect" : "attempt-number correct",
                        onClick : function(){
                            console.log(m);
                            console.log(m.courseitems[W]);
                            console.log(m.courseitems[W].is_event_type);
                        }
                    }, m.courseitems[W].retakes) : '') : ''), m.courseitems[W].hasOwnProperty("quiz_type") ? sr("div", null, (() => {
                        var t = {
                            coursestatus: m,
                            type: m.courseitems[W].quiz_type,
                            id: m.courseitems[W].id,
                            course_id: e.course_id
                        };
                        m.courseitems[W].hasOwnProperty("content_id") && (t.content_id = m.courseitems[W].content_id);
                        var n = new CustomEvent("custom_quiz_type", {
                            detail: t
                        });
                        return document.dispatchEvent(n), sr("div", {
                            id: m.courseitems[W].quiz_type,
                            quizid: m.courseitems[W].id
                        })
                    })()) : sr(Pn, {
                        quizid: m.courseitems[W].id,
                        update: te
                    })), W + 1 < m.courseitems.length ? sr("div", {
                        className: s,
                        onClick: () => {
                            Z("next")
                        }
                    }, m.courseitems[W + 1].icon ? m.courseitems[W + 1].icon.length > 200 ? sr("span", null, sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].icon
                        }
                    }), sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("span", null, sr("span", {
                        className: m.courseitems[W + 1].icon
                    }), sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("div", {
                        className: "finish_course"
                    }, sr("a", {
                        className: "button is-primary is-fullwidth",
                        onClick: () => {
                            ae()
                        }
                    }, window.wplms_course_data.translations.complete_course)));
                case "wplms-assignment":
                    return sr("div", {
                        className: "course_content_content_wrapper"
                    }, sr("div", {
                        className: "course_content_content"
                    }, sr("span", {
                        className: "lesson_info"
                    }, sr("span", null, window.wplms_course_data.reports.module.assignment, " ", n + "/" + t), sr(Os, {
                        timestamp: m.courseitems[W].duration,
                        notimediff: 1
                    })), sr("h2", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W].title
                        }
                    }), sr(_s, {
                        assignment: m.courseitems[W].meta,
                        update: ne
                    })), W + 1 < m.courseitems.length ? sr("div", {
                        className: s,
                        onClick: () => {
                            Z("next")
                        }
                    }, sr("span", null, sr("span", {
                        className: m.courseitems[W + 1].icon ? m.courseitems[W + 1].icon : ""
                    }), sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    }))) : sr("div", {
                        className: "finish_course"
                    }, sr("a", {
                        className: "button is-primary is-fullwidth",
                        onClick: () => {
                            ae()
                        }
                    }, 
                     window.wplms_course_data.translations.complete_course)));
                case "unit":
                default:
                    return sr("div", {
                        className: "course_content_content_wrapper"
                    }, sr(Ka, {
                        curriculumItem: m.courseitems[W],
                        update: oe,
                        index: W,
                        item_number: n,
                        total_item_count: t
                    }), W + 1 < m.courseitems.length ? sr("div", {
                        className: s,
                        onClick: () => {
                            Z("next");
                            let e = 0;
                            m && m.courseitems && m.courseitems.length && m.courseitems[W] && "unit" == m.courseitems[W].type && !m.courseitems[W].status && m.courseitems[W].hasOwnProperty("meta") && m.courseitems[W].meta.hasOwnProperty("access") && m.courseitems[W].meta.access && (e = 1, m.hasOwnProperty("assignment_locking") && m.assignment_locking && m.courseitems[W].meta.hasOwnProperty("assignments") && m.courseitems[W].meta.assignments.length && (e = 0)), e && se(W)
                        }
                    }, m.courseitems[W + 1].icon ? m.courseitems[W + 1].icon.length > 200 ? sr("span", null, sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].icon
                        }
                    }), sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("span", null, sr("span", {
                        className: m.courseitems[W + 1].icon
                    }), sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("span", {
                        dangerouslySetInnerHTML: {
                            __html: m.courseitems[W + 1].title
                        }
                    })) : sr("div", {
                        className: "finish_course"
                    }, sr("a", {
                        className: "button is-primary is-fullwidth",
                        onClick: () => {
                            ae()
                        }
                    }, sr("span", {
                        className: "",
                        style: {
                            display: "none"
                        }
                    }), window.wplms_course_data.translations.complete_course)))
            }
        })() : "")))) : "")
    };
    n(20);
    const {
        createElement: mr,
        render: pr,
        useState: hr,
        useEffect: _r,
        Fragment: wr
    } = wp.element, {
        select: fr,
        dispatch: vr
    } = wp.data, gr = e => {
        fr("vibebp").getUser();
        const t = fr("vibebp").getToken(),
            [n, s] = hr(!0),
            [a, r] = hr(window.wplms_course_data.translations.take_this_course),
            [i, o] = hr(""),
            [l, u] = hr({}),
            [c, d] = hr(-1),
            [m, p] = hr(""),
            [h, _] = hr([]),
            [w, f] = hr(!1),
            [v, g] = hr(!1),
            [y, b] = hr({}),
            [k, x] = hr(!1),
            [q, S] = hr(!1),
            [N, O] = hr(!1);
        _r(() => {
            document.addEventListener("wplms_popup_applied", t => {
                t.detail.course == e.id && t.detail.hasOwnProperty("text") && (g(!1), o("#"), r(t.detail.text))
            }, !1), document.addEventListener("reload_course_button", t => {
                t.detail.course == e.id && E()
            }, !1)
        }), _r(() => {
            E()
        }, [e]), _r(() => {
            if (N) {
                var t = new CustomEvent("wplms_popup_clicked", {
                    detail: {
                        course: e.id
                    }
                });
                document.dispatchEvent(t), O(!1)
            }
        }, [N]);
        const E = () => {
                s(!0), x(!1), fetch(window.wplms_course_data.api_url + "/student/courseButton/", {
                    method: "post",
                    body: JSON.stringify({
                        id: e.id,
                        token: t,
                        price: window.wplms_course_data.show_price
                    })
                }).then(e => e.json()).then(e => {
                    e.status && (e.text.length && ("#apply" == e.link && g(!0), r(e.text), e.hasOwnProperty("error") ? b(e.error) : (o(e.link), u(e.course), d(e.course_status), e.hasOwnProperty("form") && p(e.form)), _(e.extras)), e.hasOwnProperty("hide_button") && e.hide_button && x(!0)), s(!1)
                })
            },
            z = (t, n) => {
                var s = new CustomEvent("coursebuttonpricingclicked", {
                    detail: {
                        original_event: t,
                        course: e.id,
                        price: n
                    }
                });
                document.dispatchEvent(s)
            };
            let course_data = l;
        return k ? "" : w ? mr(wr, null, mr("div", {
            class: "lds-ellipsis"
        }, mr("div", null), mr("div", null), mr("div", null), mr("div", null)), ReactDOM.createPortal(mr(dr, {
            course_id: l.id,
            course: l,
            back: () => {
                f(!1)
            },
            index: 1,
            update: () => {}
        }), document.querySelector("#wplms_the_course_button"))) : n ? mr("span", {
            className: "course_button button full is-loading"
        }, "...") : mr(wr, null, v ? mr("span", {
            className: "the_course_button"
        }, mr("a", {
            href: i,
            className: "course_button button full",
            onClick: e => {
                e.preventDefault(), O(!0)
            }
        }, mr("span", {
            dangerouslySetInnerHTML: {
                __html: a
            }
        }), h.length ? mr("div", {
            className: "extra_details"
        }, h.map(e => mr("span", null, e))) : "")) : m.length ? mr("div", {
            className: " the_course_button"
        }, mr("form", {
            action: m,
            className: "",
            method: "post"
        }, mr("input", {
            type: "hidden",
            name: "token",
            value: t
        }), mr("input", {
            type: "hidden",
            name: "course_id",
            value: e.id
        }),
         mr("button", {
            type: "submit",
            className: "full course_button progress_key_" + l.user_status
        }, mr("span", {
            dangerouslySetInnerHTML: {
                __html: a
            }
        }), h.length ? h.map(e => mr("span", null, e)) : ""))) : mr(wr, null, mr("span", {
            className: "the_course_button"
        }, i && i.length ? c > -1 ? mr("span", null, mr("button", {
            onClick: () => {
                window.selectedCourseId = l.id;
                if(window.checkProfile == undefined){
                    window.checkProfile = true;
                }

                if(l.is_profile_complete || window.checkProfile == false){
                    if(l.is_cb_course){
                        window.location = l.cb_course_link;
                    } else if(l.is_aiws_course){
                        window.location = l.aiws_course_link;
                    }else{
                        f(!0)
                    }
                }else{
                    jQuery("#profileModal").modal("show");
                }
                
            },
            className: (l.is_live_course == 1 && l.user_status == 1 && l.is_live_course_start == 0) ? "course_button full button_cource_id_" + l.id + " disabled" : "course_button full progress_key_" + l.user_status + " button_cource_id_" + l.id
        }, (l.is_live_course == 1 && l.user_status == 1 && l.is_live_course_start == 0) ? l.live_course_starts_in_days : a),(l.is_live_course == 1 && l.user_status == 1 && l.is_live_course_start == 0) ? mr("div", {
            className : "livecourse_content"
        },mr("span", null,"We'll do our best to cater to your preferences! However, please note that the class schedule is subject to change. We will communicate on the final schedule over email.") 
        ) : "") : Array.isArray(i) ? mr("strong", {
            className: "course_button full"
        }, mr("a", {
            href: i[0].link,
            onClick: e => {
                z(e, i[0])
            }
        }, mr("strong", null, a && a.length ? a : window.wplms_course_data.translations.take_this_course), mr("span", {
            dangerouslySetInnerHTML: {
                __html: i[0].price
            }
        })), i.length > 1 ? mr(wr, null, mr("input", {
            id: "course_price",
            type: "checkbox"
        }), mr("label", {
            for: "course_price",
            class: "vicon vicon-angle-down"
        }), mr("div", {
            className: "wplms_price_dropdown"
        }, i.map(e => mr("a", {
            href: e.link,
            dangerouslySetInnerHTML: {
                __html: e.price
            },
            onClick: t => {
                z(t, e)
            }
        })))) : "", h.length ? mr("div", {
            className: "extra_details"
        }, h.map(e => mr("span", {
            dangerouslySetInnerHTML: {
                __html: e
            }
        }))) : "") : mr("a", {
            href: i,
            className: "course_button button full"
        }, a && a.length ? a : window.wplms_course_data.translations.take_this_course, h.length ? mr("div", {
            className: "extra_details"
        }, h.map(e => mr("span", {
            dangerouslySetInnerHTML: {
                __html: e
            }
        }))) : "") : mr("a", {
            href: i,
            className: "course_button button full",
            onClick: e => {
                z(e, i)
            }
        }, a, h.length ? mr("div", {
            className: "extra_details"
        }, h.map(e => mr("span", null, e))) : "")), y && y.hasOwnProperty("error_message") ? mr("div", {
            className: "vbp_message error"
        }, mr("span", {
            className: "vicon " + y.icon,
            style: {
                margin: "0 0.2rem"
            }
        }), mr("span", {
            dangerouslySetInnerHTML: {
                __html: y.error_message
            }
        })) : ""))
    }, yr = () => {
        document.querySelectorAll(".the_course_button").forEach(e => {
            pr(mr(gr, {
                id: e.getAttribute("data-id"),
                def: e.innerHTML
            }), e)
        }), document.removeEventListener("userLoaded", yr, !1)
    };
    document.addEventListener("userLoaded", yr, !1), document.addEventListener("wplms_popup_clicked", e => {
        null !== document.getElementById("wplms_popup") && document.getElementById("wplms_popup").remove();
        let t = document.createElement("div");
        t.setAttribute("id", "wplms_popup"), document.body.appendChild(t), pr(mr(c, {
            id: e.detail.course
        }), document.getElementById("wplms_popup"))
    }, !1)
}]);