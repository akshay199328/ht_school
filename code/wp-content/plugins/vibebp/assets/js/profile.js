! function(e) {
    var t = {};

    function n(r) {
        if (t[r]) return t[r].exports;
        var a = t[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return e[r].call(a.exports, a, a.exports, n), a.l = !0, a.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, r) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: r
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
        var r = Object.create(null);
        if (n.r(r), Object.defineProperty(r, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var a in e) n.d(r, a, function(t) {
                return e[t]
            }.bind(null, a));
        return r
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 1)
}([function(e, t, n) {}, function(e, t, n) {
    "use strict";
    n.r(t);
    var r = (0, wp.element.createContext)({});

    function a(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function l(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var o = wp.element,
        c = (o.createElement, o.useState),
        s = o.useEffect,
        m = o.Fragment,
        p = (o.render, o.useContext),
        u = wp.data,
        d = u.dispatch,
        f = u.select,
        w = function(e) {
            var t = p(r),
                n = l(c([]), 2),
                i = n[0],
                o = n[1],
                u = l(c(""), 2),
                w = u[0],
                v = u[1],
                b = l(c(""), 2),
                y = (b[0], b[1], l(c(f("vibebp").getToken()), 2)),
                g = y[0],
                h = y[1],
                E = l(c(!0), 2),
                _ = E[0],
                O = E[1],
                N = l(c(!1), 2),
                j = N[0],
                k = N[1];
            s(function() {
                _ || -1 != document.querySelector("body").classList.contains("dark_vibebp") ? document.querySelector("body").classList.remove("dark_vibebp") : document.querySelector("body").classList.add("dark_vibebp")
            }, [_]), s(function() {
                window.vibebp.expanded_menu && window.innerWidth > 768 && k(!0), window.addEventListener("resize", function() {
                    window.innerWidth > 768 && k(!0)
                }), window.vibebp.dark_mode && (O(!1), t.update("dark", !0))
            }, []), s(function() {
                window.vibebp.expanded_menu && window.innerWidth > 768 && k(!0)
            }, [j]), s(function() {
                document.addEventListener("userLoaded", function() {
                    g || h(f("vibebp").getToken())
                }), g && (fetch("".concat(window.vibebp.api.url, "/profilemenu"), {
                    method: "post",
                    body: JSON.stringify({
                        token: g
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (o(e.menu), d("vibebp").setMenu(e.bpmenu))
                }), document.addEventListener("component_loaded", function(e) {
                    v(e.detail.component)
                }))
            }, [g]), s(function() {
                if (i.length) {
                    if (!w) {
                        var e = i[0].css_id;
                        "xprofile" === e && (e = "profile"), v(e)
                    }
                    if (-1 !== window.location.href.indexOf("#")) {
                        var t = window.location.href.split("#");
                        if (t.length > 1) {
                            var n = t[1].split("&"),
                                r = [];
                            n.map(function(e, t) {
                                "component" === (r = e.split("="))[0] && (f("vibebp").getComponent() || (i.map(function(e, t) {
                                    e.css_id == r[1] && P(t)
                                }), d("vibebp").setComponent(r[1])))
                            })
                        }
                    }
                }
            }, [i]);
            var S = function(e) {
                    e.hasOwnProperty("css_id") ? (d("vibebp").setComponent(e.css_id), d("vibebp").setAction(!1), d("vibebp").setId(!1)) : d("vibebp").setComponent(e.type + "__" + e.object + "__" + e.object_id)
                },
                P = function(e) {
                    var t = a(i);
                    t.map(function(e) {
                        e.classes.indexOf("is_active") > -1 && e.classes.splice(e.classes.indexOf("is_active"), 1)
                    }), t[e].classes.push("is_active"), o(t)
                };
            return wp.element.createElement("div", {
                className: j ? "profile_menu active" : "profile_menu",
                onMouseEnter: function() {
                    window.vibebp.expanded_menu || k(!0)
                },
                onMouseLeave: function() {
                    window.vibebp.expanded_menu || k(!1)
                }
            }, wp.element.createElement("div", {
                className: "menu_items"
            }, Array.isArray(i) && i.length ? i.map(function(e, t) {
                if (e.menu_item_parent = parseInt(e.menu_item_parent), !e.menu_item_parent) {
                    "xprofile" === e.css_id && (e.css_id = "profile");
                    var n = i.filter(function(t) {
                        return t.menu_item_parent === e.ID
                    });
                    return n.length && -1 === e.classes.indexOf("hasChildren") && e.classes.push("hasChildren"), wp.element.createElement("div", {
                        id: e.css_id,
                        className: e.classes.join(" ")
                    }, wp.element.createElement("span", {
                        className: "menu_item_" + e.css_id
                    }, e.classes.indexOf("external_link") > -1 ? wp.element.createElement("span", {
                        onClick: function() {
                            window.location.href = e.url
                        }
                    }, wp.element.createElement("span", {
                        className: "vicon vicon-new-window"
                    }), wp.element.createElement("span", null, e.title)) : wp.element.createElement(m, null, wp.element.createElement("span", {
                        onClick: function() {
                            S(e), k(!1), P(t)
                        }
                    }, /svg/.test(e.icon) ? wp.element.createElement("span", {
                        className: "icon",
                        dangerouslySetInnerHTML: {
                            __html: e.icon
                        }
                    }) : wp.element.createElement("span", {
                        className: "icon " + e.icon
                    }), wp.element.createElement("span", {
                        dangerouslySetInnerHTML: {
                            __html: e.title
                        }
                    })), n.length ? wp.element.createElement("span", {
                        class: "vicon vicon-angle-right",
                        onClick: function() {
                            var e = a(i); - 1 == e[t].classes.indexOf("open") ? e[t].classes.push("open") : e[t].classes.splice(e[t].classes.indexOf("open"), 1), o(e)
                        }
                    }) : "")), n.length ? wp.element.createElement("div", {
                        className: "sub_nav_items"
                    }, n.map(function(e) {
                        return wp.element.createElement("div", {
                            onClick: function() {
                                S(e), k(!1), P(t)
                            },
                            className: e.classes.join(" ")
                        }, /svg/.test(e.icon) ? wp.element.createElement("span", {
                            dangerouslySetInnerHTML: {
                                __html: e.icon
                            }
                        }) : wp.element.createElement("span", {
                            className: e.icon
                        }), wp.element.createElement("span", null, e.title))
                    })) : "")
                }
            }) : ""), wp.element.createElement("span", {
                className: j ? "vicon vicon-angle-double-right reversed" : "vicon vicon-angle-double-right",
                onClick: function() {
                    return k(!j)
                }
            }), wp.element.createElement("div", {
                className: "menu_bottom"
            }, _ ? wp.element.createElement("div", {
                className: "menu_item",
                onClick: function() {
                    O(!1), t.update("dark", !0), k(!j)
                }
            }, wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.icons.dark_mode
                }
            }), wp.element.createElement("span", null, window.vibebp.translations.dark_mode)) : wp.element.createElement("div", {
                className: "menu_item",
                onClick: function() {
                    O(!0), t.update("dark", !1)
                }
            }, wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.icons.light_mode
                }
            }), wp.element.createElement("span", null, window.vibebp.translations.light_mode)), wp.element.createElement("div", {
                className: "menu_item",
                onClick: function() {
                    f("vibebp").logout(), k(!1), document.querySelector("body").classList.add("vibebp_logout");
                    var e = new CustomEvent("userLoaded", {
                        detail: {
                            userLoaded: !0
                        }
                    });
                    document.dispatchEvent(e)
                }
            }, wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.icons.logout
                }
            }), wp.element.createElement("span", null, window.vibebp.translations.logout))))
        };

    function v(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function b(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? v(n, !0).forEach(function(t) {
                y(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : v(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function y(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function g(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var h = wp.element,
        E = (h.createElement, h.useState),
        _ = h.useEffect,
        O = h.Fragment,
        N = (h.render, h.useContext, wp.data),
        j = (N.dispatch, N.select),
        k = function(e) {
            var t = g(E(!1), 2),
                n = t[0],
                r = t[1],
                a = g(E(e.move), 2),
                i = a[0],
                l = a[1],
                o = g(E([]), 2),
                c = o[0],
                s = o[1],
                m = g(E({}), 2),
                p = m[0],
                u = m[1],
                d = g(E(""), 2),
                f = d[0],
                w = d[1];
            return _(function() {
                l(e.move)
            }, [e.move]), _(function() {
                e.widget.link && (r(!0), e.setloading(!0), fetch("".concat(e.widget.link), {
                    method: "post",
                    body: JSON.stringify({
                        token: j("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(t) {
                    if (r(!1), t.status && -1 != window.vibebp.components.dashboard.widgets.indexOf(t.widget.id_base)) {
                        w(t.widget.id_base), s(b({}, t.widget, {
                            link: e.widget.link
                        })), e.update("defaultWidth", b({}, t.widget, {
                            link: e.widget.link
                        }), e.all_widgets);
                        var n = new CustomEvent(t.widget.id_base, {
                            detail: {
                                widget: t.widget
                            }
                        });
                        document.dispatchEvent(n), e.setloading(!1)
                    }
                }))
            }, [e.widget.link]), _(function() {
                u(e.widget)
            }, [e.widget]), wp.element.createElement("div", {
                class: "dashboard_widget dash_" + f
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement(O, null, wp.element.createElement("div", {
                className: "dashboard_widget_header"
            }, wp.element.createElement("span", {
                className: i ? "vicon vicon-move" : "vicon vicon-pin2",
                onClick: function() {
                    return e.update("move", c, e.all_widgets)
                }
            }), wp.element.createElement("span", null, i ? wp.element.createElement(O, null, p.hasOwnProperty("style") && p.style.column > 1 ? wp.element.createElement("span", {
                className: "vicon vicon-arrow-left",
                onClick: function() {
                    return e.update("column_minus", c, e.all_widgets)
                }
            }) : "", wp.element.createElement("span", {
                className: "vicon vicon-arrow-right",
                onClick: function() {
                    return e.update("column", c, e.all_widgets)
                }
            }), p.hasOwnProperty("style") && p.style.row > 1 ? wp.element.createElement("span", {
                className: "vicon vicon-arrow-up",
                onClick: function() {
                    return e.update("row_minus", c, e.all_widgets)
                }
            }) : "", wp.element.createElement("span", {
                className: "vicon vicon-arrow-down",
                onClick: function() {
                    return e.update("row", c, e.all_widgets)
                }
            }), wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    return e.update("remove", c, e.all_widgets)
                }
            })) : "")), c.hasOwnProperty("html") ? wp.element.createElement(O, null, wp.element.createElement("div", {
                className: c.id_base + " " + c.id,
                dangerouslySetInnerHTML: {
                    __html: c.html
                }
            })) : f ? wp.element.createElement("div", {
                className: f + " " + c.id
            }) : ""))
        };

    function S(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function P(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var x = wp.element,
        A = (x.createElement, x.useState),
        C = x.useEffect,
        T = (x.useContext, x.Fragment),
        I = (x.render, wp.data),
        D = (I.dispatch, I.select, function(e) {
            var t = P(A(), 2),
                n = t[0],
                r = t[1],
                a = P(A([]), 2),
                i = (a[0], a[1], P(A(-1), 2)),
                l = i[0],
                o = i[1],
                c = P(A(!1), 2),
                s = c[0],
                m = c[1],
                p = P(A(!1), 2),
                u = p[0],
                d = p[1],
                f = P(A(!0), 2),
                w = f[0],
                v = f[1],
                b = P(A([]), 2),
                y = b[0],
                g = b[1];
            C(function() {
                r(e.widgets)
            }, [e.widgets]);
            return wp.element.createElement(T, null, n ? n.map(function(t, a) {
                var i = {},
                    c = {
                        link: ""
                    };
                return "string" == typeof t ? c.link = t : t && t.hasOwnProperty("style") && (i.gridColumn = "span " + t.style.column, i.gridRow = "span " + t.style.row, c = t), wp.element.createElement(T, null, wp.element.createElement("div", {
                    className: "dashboard_widget_wrapper",
                    ref: function(e) {
                        if (e && !y[a]) {
                            var t = S(y);
                            t[a] = e, g(t)
                        }
                    },
                    "data-index": a,
                    key: a,
                    draggable: u && !w,
                    onDragStart: function(e) {
                        o(a)
                    },
                    onDragEnd: function() {
                        o(!1),
                            function() {
                                if (s !== l) {
                                    var t = S(n);
                                    (t = t.filter(function(e, t) {
                                        return t !== l && t !== s
                                    })).splice(s, 0, n[l]), t.splice(l, 0, n[s]), r(t), e.update(t)
                                }
                            }()
                    },
                    onDragOver: function(e) {
                        e.preventDefault(), e.stopPropagation(), m(a)
                    },
                    style: i
                }, wp.element.createElement(k, {
                    widget: c,
                    move: u,
                    update: function(t, n, i) {
                        ! function(t, n, a, i) {
                            if ("move" != t) {
                                if ("remove" == t && (i.splice(n, 1), e.add({
                                        link: a.link,
                                        name: a.name,
                                        style: {
                                            row: 1,
                                            column: 1
                                        }
                                    })), "column" == t && ("string" == typeof i[n] ? (i[n] = {
                                        link: i[n]
                                    }, i[n].style = {
                                        row: 1,
                                        column: 1
                                    }, i[n].style.column++) : i[n].style.column++), "column_minus" == t && i[n].style.column--, "row" == t && ("string" == typeof i[n] ? (i[n] = {
                                        link: i[n]
                                    }, i[n].style = {
                                        row: 1,
                                        column: 1
                                    }, i[n].style.row++) : i[n].style.row++), "row_minus" == t && i[n].style.row--, "defaultWidth" == t) {
                                    var l = {
                                        id: a.id_base,
                                        name: a.name,
                                        description: a.description,
                                        link: a.link,
                                        style: {
                                            row: 5,
                                            column: 1
                                        }
                                    };
                                    a.options.hasOwnProperty("width") && (a.options.width.indexOf("col-md-6") > -1 && (l.style = {
                                        row: 10,
                                        column: 2
                                    }), a.options.width.indexOf("col-md-8") > -1 && (l.style.column = 3, l.style.row = 10), a.options.width.indexOf("col-md-12") > -1 && (l.style.column = 4, l.style.row = 10)), i.splice(n, 1, l), r(i)
                                }
                                "defaultWidth" != t && (r(i), e.update(i))
                            } else d(!u)
                        }(t, a, n, i)
                    },
                    all_widgets: n,
                    setloading: function(e) {
                        v(e)
                    }
                })))
            }) : "")
        });

    function L(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function J(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var M = wp.element,
        q = (M.createElement, M.useState),
        F = M.useEffect,
        H = (M.useContext, M.Fragment),
        U = (M.render, wp.data),
        z = U.dispatch,
        R = U.select,
        W = function(e) {
            var t = J(q(!1), 2),
                n = t[0],
                r = t[1],
                a = J(q([]), 2),
                i = a[0],
                l = a[1],
                o = J(q(""), 2),
                c = o[0],
                s = o[1],
                m = J(q(!1), 2),
                p = m[0],
                u = m[1],
                d = J(q([]), 2),
                f = d[0],
                w = d[1];
            F(function() {
                document.querySelector("body").classList.value.indexOf("withsidebar") > -1 && document.querySelector("body").classList.remove("withsidebar"), r(!0), fetch("".concat(window.vibebp.api.url, "/sidebar/").concat(window.vibebp.components.dashboard.sidebar), {
                    method: "post",
                    body: JSON.stringify({
                        token: R("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (l(e.widgets), e.unusedwidgets && w(e.unusedwidgets)), r(!1)
                })
            }, []);
            return wp.element.createElement("div", {
                class: "dashboard"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : i.length ? wp.element.createElement(H, null, wp.element.createElement(D, {
                widgets: i,
                add: function(e) {
                    var t = L(f);
                    t.push(e), w(t)
                },
                update: function(e) {
                    fetch("".concat(window.vibebp.api.url, "/save_sidebar"), {
                        method: "post",
                        body: JSON.stringify({
                            widgets: e,
                            sidebar_id: window.vibebp.components.dashboard.sidebar,
                            token: R("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        e.status && z("vibebp").addNotification({
                            text: e.message
                        })
                    }), l(e)
                }
            }), f.length ? wp.element.createElement("span", {
                className: "widget_move_spot"
            }, p ? wp.element.createElement("span", null, wp.element.createElement("select", {
                onChange: function(e) {
                    var t = L(i),
                        n = L(f);
                    t.push(e.target.value), l(t), n.splice(n.findIndex(function(t) {
                        return t.link == e.target.value
                    }), 1), w(n), s(""), u(!1)
                },
                value: c
            }, wp.element.createElement("option", null, window.vibebp.translations.select_widget), f.map(function(e) {
                return wp.element.createElement("option", {
                    value: e.link
                }, e.name)
            })), wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    u(!1)
                }
            })) : wp.element.createElement("span", {
                className: "vicon vicon-plus",
                onClick: function() {
                    u(!0)
                }
            })) : "") : wp.element.createElement("div", {
                className: "vibebp_message"
            }, window.vibebp.translations.empty_dashboard))
        };

    function Y(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function B(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Y(n, !0).forEach(function(t) {
                G(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Y(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function G(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function K(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Q = wp.element,
        $ = (Q.createElement, Q.useState),
        V = Q.useEffect,
        X = Q.useRef,
        Z = Q.Fragment,
        ee = (Q.render, wp.data),
        te = (ee.dispatch, ee.select, Math.round(100 * Math.random())),
        ne = function(e) {
            var t = X(null),
                n = React.createRef(),
                r = K($(!0), 2),
                a = r[0],
                i = r[1],
                l = K($(!1), 2),
                o = l[0],
                c = l[1],
                s = K($(!1), 2),
                m = s[0],
                p = s[1],
                u = K($(""), 2),
                d = u[0],
                f = u[1],
                w = K($(""), 2),
                v = w[0],
                b = w[1],
                y = K($(""), 2),
                g = (y[0], y[1]),
                h = K($(""), 2),
                E = h[0],
                _ = h[1],
                O = K($({
                    x: 0,
                    y: 0,
                    width: 0,
                    height: 0,
                    type: "image"
                }), 2),
                N = O[0],
                j = O[1],
                k = K($(window.vibebp.translations.select_image), 2),
                S = k[0],
                P = k[1];
            V(function() {
                e.hasOwnProperty("crop") && e.crop && c(!0)
            }, []), V(function() {
                if (m && o) {
                    var t = n.current;
                    new Croppr(t, {
                        aspectRatio: 1,
                        returnMode: "raw",
                        maxSize: [460, 460, "px"],
                        minSize: [150, 150, "px"],
                        onCropEnd: function(t) {
                            var n = B({}, N);
                            n.x = t.x, n.y = t.y, n.height = t.height, n.width = t.width, j(n);
                            var r = {
                                x: t.x,
                                y: t.y,
                                width: t.width,
                                height: t.height
                            };
                            e.update(E, r)
                        }
                    })
                }
            }, [m]);
            return wp.element.createElement("div", {
                className: "uploader"
            }, a ? wp.element.createElement("label", {
                for: "fileupload_" + te,
                className: "upload_file"
            }, S, "image" == e.type ? wp.element.createElement("input", {
                id: "fileupload_" + te,
                "data-type": e.type,
                ref: t,
                type: "file",
                accept: "image/*",
                onChange: function(n) {
                    t.current.files[0].size < window.vibebp.settings.upload_limit ? (f(window.URL.createObjectURL(t.current.files[0])), i(!1), _(t.current.files), e.update(t.current.files, B({}, N, {
                        key: "image"
                    }))) : (P(window.vibebp.translations.image_size_error), setTimeout(function() {
                        P(window.vibebp.translations.select_image)
                    }, 3500))
                }
            }) : "video" == e.type ? wp.element.createElement("input", {
                id: "fileupload_" + te,
                "data-type": e.type,
                ref: t,
                type: "file",
                accept: "video/*",
                onChange: function(n) {
                    t.current.files[0].size < window.vibebp.settings.upload_limit ? (b(window.URL.createObjectURL(t.current.files[0])), i(!1), _(t.current.files), e.update(t.current.files, B({}, N, {
                        key: "video"
                    }))) : (P(window.vibebp.translations.image_size_error), setTimeout(function() {
                        P(window.vibebp.translations.select_image)
                    }, 3500))
                }
            }) : wp.element.createElement("input", {
                id: "fileupload_" + te,
                "data-type": e.type,
                ref: t,
                type: "file",
                onChange: function(n) {
                    t.current.files[0].size < window.vibebp.settings.upload_limit ? (g(window.URL.createObjectURL(t.current.files[0])), i(!1), _(t.current.files), e.update(t.current.files, B({}, N, {
                        key: "attachment"
                    }))) : (P(window.vibebp.translations.image_size_error), setTimeout(function() {
                        P(window.vibebp.translations.select_image)
                    }, 3500))
                }
            })) : wp.element.createElement("div", {
                className: "uploaded_src"
            }, "image" == e.type ? wp.element.createElement(Z, null, o ? wp.element.createElement(Z, null, wp.element.createElement("div", {
                className: "uploaded_image"
            }, wp.element.createElement("img", {
                src: d
            })), wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vicon vicon-pencil",
                onClick: function() {
                    p(!m)
                }
            }), wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    c(!1), i(!0), setImgRef(""), f(""), j({
                        x: 0,
                        y: 0,
                        width: 0,
                        height: 0
                    })
                }
            })), m ? wp.element.createElement("div", {
                className: "cropimage",
                id: "cropper"
            }, wp.element.createElement("img", {
                src: d,
                ref: n
            })) : "") : wp.element.createElement("img", {
                src: d
            })) : "video" == e.type ? wp.element.createElement(Z, null, wp.element.createElement("video", {
                className: "content_to_html_video",
                ref: function(e) {
                    e && new Plyr(e)
                }
            }, wp.element.createElement("source", {
                src: v,
                type: "video/mp4"
            }))) : wp.element.createElement(Z, null, wp.element.createElement("i", {
                className: "vicon vicon-clip"
            }))))
        };

    function re(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function ae(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function ie(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? ae(n, !0).forEach(function(t) {
                le(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : ae(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function le(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function oe(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ce = wp.element,
        se = (ce.createElement, ce.useState),
        me = ce.useEffect,
        pe = ce.Fragment,
        ue = (ce.render, wp.data),
        de = ue.dispatch,
        fe = ue.select,
        we = function(e) {
            var t = oe(se([]), 2),
                n = t[0],
                r = t[1],
                a = oe(se([]), 2),
                i = a[0],
                l = a[1],
                o = oe(se(""), 2),
                c = o[0],
                s = o[1],
                m = oe(se({
                    content: "",
                    component: "activity",
                    component_id: "",
                    parent_id: "",
                    meta: []
                }), 2),
                p = m[0],
                u = m[1];
            me(function() {
                e.hasOwnProperty("activity_id") && u({
                    content: "",
                    component: "activity_comment",
                    component_id: e.comment_id,
                    parent_id: e.activity_id,
                    meta: []
                }), e.hasOwnProperty("component") && "personal" != e.component && u(ie({}, p, {
                    component: e.component,
                    component_id: e.id
                }))
            }, []), me(function() {
                p.component.length && "activity" !== p.component && "activity_comment" !== p.component && fetch("".concat(window.vibebp.api.url, "/").concat(p.component, "/user/").concat(fe("vibebp").getUser().id, "/get_items"), {
                    method: "post",
                    body: JSON.stringify({
                        token: fe("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && Array.isArray(e.groups) && r(e.groups)
                })
            }, [p.component]);
            return wp.element.createElement("div", {
                className: "portal activity_post"
            }, wp.element.createElement("div", {
                className: "portal_body"
            }, wp.element.createElement("textarea", {
                placeholder: window.vibebp.translations.whats_new,
                onChange: function(e) {
                    var t = ie({}, p);
                    t.content = e.target.value, u(t)
                }
            }, p.content)), wp.element.createElement("div", {
                className: "portal_footer"
            }, e.hasOwnProperty("activity_id") ? "" : "activity" !== p.component ? "" : wp.element.createElement("div", {
                className: "footer_main"
            }, wp.element.createElement("select", {
                value: p.component,
                onChange: function(e) {
                    var t = ie({}, p);
                    t.component = e.target.value, u(t)
                }
            }, Object.keys(window.vibebp.components.activity.post.components).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.activity.post.components[e])
            })), n.length ? wp.element.createElement("select", {
                value: p.component_id,
                onChange: function(e) {
                    var t = ie({}, p);
                    t.component_id = e.target.value, u(t)
                }
            }, wp.element.createElement("option", null, window.vibebp.translations.select_component), n.map(function(e) {
                return wp.element.createElement("option", {
                    value: e.id
                }, e.label)
            })) : ""), wp.element.createElement("div", {
                className: "footer_links"
            }, i.length ? i.map(function(e, t) {
                return wp.element.createElement(pe, null, "image" == e ? wp.element.createElement("a", {
                    className: "vicon vicon-image upload_type"
                }) : "video" == e ? wp.element.createElement("a", {
                    className: "vicon vicon-video-camera upload_type"
                }) : wp.element.createElement("a", {
                    className: "vicon vicon-clip upload_type"
                }), wp.element.createElement(ne, {
                    type: e,
                    update: function(n, r) {
                        var a = re(c);
                        a[t] = new File([n[0]], n[0].name), s(a), u(ie({}, p, {
                            meta: [].concat(re(p.meta), [{
                                key: e,
                                value: t
                            }])
                        }))
                    }
                }), wp.element.createElement("a", {
                    className: "vicon vicon-close",
                    onClick: function() {
                        var e = re(i);
                        e.splice(t, 1);
                        var n = re(c);
                        n.splice(t, 1), s(n), l(e)
                    }
                }))
            }) : "", wp.element.createElement(pe, null, wp.element.createElement("a", {
                className: "vicon vicon-clip",
                onClick: function() {
                    var e = re(i);
                    e.push("attachment"), l(e)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-video-camera",
                onClick: function() {
                    var e = re(i);
                    e.push("video"), l(e)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-image",
                onClick: function() {
                    var e = re(i);
                    e.push("image"), l(e)
                }
            })), wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    if (p.content.length) {
                        var t = new FormData;
                        t.append("body", JSON.stringify({
                            args: p,
                            token: fe("vibebp").getToken()
                        })), c.length && c.map(function(e, n) {
                            t.append("files_" + n, e)
                        }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.activity, "/add"), {
                            method: "post",
                            body: t
                        }).then(function(e) {
                            return e.json()
                        }).then(function(t) {
                            t.status && (e.update(t.activity, "add"), u(ie({}, p, {
                                content: "",
                                meta: []
                            })), s([]), de("vibebp").addNotification({
                                text: t.activity.action
                            }))
                        })
                    }
                }
            }, window.vibebp.translations.post_update), e.hasOwnProperty("activity_id") ? wp.element.createElement("a", {
                className: "button is-text",
                onClick: function() {
                    e.update("", "cancel")
                }
            }, window.vibebp.translations.cancel) : "")))
        };

    function ve(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var be = wp.element,
        ye = (be.createElement, be.useState),
        ge = be.useEffect,
        he = (be.Fragment, be.render, function(e) {
            var t = ve(ye(""), 2),
                n = t[0],
                r = t[1],
                a = ve(ye({
                    s: 0,
                    m: 0,
                    h: 0,
                    d: 0,
                    w: 0,
                    mn: 0,
                    y: 0
                }), 2),
                i = a[0],
                l = a[1];
            ge(function() {
                o()
            }, [e.time]), ge(function() {
                var e = setInterval(function() {
                    o(), r(n + 60)
                }, 6e4);
                return function() {
                    return clearInterval(e)
                }
            }, []);
            var o = function() {
                var t = {
                        s: 0,
                        m: 0,
                        h: 0,
                        d: 0,
                        mn: 0,
                        y: 0
                    },
                    n = Math.floor(((new Date).getTime() - Date.parse(e.time) + 6e4 * (new Date).getTimezoneOffset()) / 1e3);
                n > 31536e3 && (t.y = Math.floor(n / 31536e3), n -= 86400 * t.y * 365), n > 2592e3 && (t.mn = Math.floor(n / 2592e3), n -= 86400 * t.mn * 30), n > 604800 && (t.w = Math.floor(n / 604800), n -= 86400 * t.w * 7), n > 86400 && (t.d = Math.floor(n / 86400), n -= 86400 * t.d), n > 3600 && (t.h = Math.floor(n / 3600), n -= 3600 * t.h), n > 60 && (t.m = Math.floor(n / 60), n -= 60 * t.m), t.s = n, l(t)
            };
            return wp.element.createElement("div", {
                className: "datetime"
            }, i.y || i.mn || i.w || i.d || i.h || i.m ? "" : window.vibebp.translations.justnow, i.y ? wp.element.createElement("span", {
                className: "years"
            }, i.y, " ", i.y > 1 ? window.vibebp.translations.years : window.vibebp.translations.year) : "", i.mn ? wp.element.createElement("span", {
                className: "months"
            }, i.mn, " ", i.mn > 1 ? window.vibebp.translations.months : window.vibebp.translations.month) : "", i.w ? wp.element.createElement("span", {
                className: "weeks"
            }, i.w, " ", i.w > 1 ? window.vibebp.translations.weeks : window.vibebp.translations.week) : "", i.d ? wp.element.createElement("span", {
                className: "days"
            }, i.d, " ", i.d > 1 ? window.vibebp.translations.days : window.vibebp.translations.day) : "", i.h ? wp.element.createElement("span", {
                className: "hours"
            }, i.h, " ", i.h > 1 ? window.vibebp.translations.hours : window.vibebp.translations.hour) : "", i.m ? wp.element.createElement("span", {
                className: "minutes"
            }, i.m, " ", i.m > 1 ? window.vibebp.translations.minutes : window.vibebp.translations.minute) : "")
        });

    function Ee(e) {
        return (Ee = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function _e(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Oe(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ne(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function je(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ke = wp.element,
        Se = (ke.createElement, ke.useState),
        Pe = ke.useEffect,
        xe = ke.Fragment,
        Ae = (ke.render, wp.data),
        Ce = Ae.dispatch,
        Te = Ae.select,
        Ie = function e(t) {
            var n = je(Se({}), 2),
                r = n[0],
                a = n[1],
                l = je(Se(!1), 2),
                o = l[0],
                c = l[1],
                s = je(Se(!1), 2),
                m = s[0],
                p = s[1],
                u = je(Se(!1), 2),
                d = u[0],
                f = u[1],
                w = je(Se([]), 2),
                v = w[0],
                b = w[1];
            Pe(function() {
                a(t.activity), localforage.getItem("favorite_activities_" + Te("vibebp").getUser().id).then(function(e) {
                    e && (e = JSON.parse(e), f(e))
                }), localforage.getItem("liked_activities_" + Te("vibebp").getUser().id).then(function(e) {
                    e && (e = JSON.parse(e), b(e))
                })
            }, [t.activity]);
            r.hasOwnProperty("date_recorded") || (r.date_recorded = (new Date).getTime());
            var y = "activity_item " + r.type + " " + r.component;
            return r.hasOwnProperty("content") && r.content.length && (y += " with_activity_content"), o && (y += " removed"), wp.element.createElement("div", {
                className: y,
                "data-activity-id": r.id
            }, wp.element.createElement("div", {
                className: "activity_avatar"
            }, wp.element.createElement("img", {
                src: r.avatar
            })), wp.element.createElement("div", {
                className: "activity_body"
            }, wp.element.createElement("div", {
                className: "activity_header"
            }, wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: r.action
                }
            })), r.hasOwnProperty("content") && r.content.length ? wp.element.createElement("div", {
                className: "activity_content"
            }, wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: r.content
                }
            }), wp.element.createElement("div", {
                className: "activity_attachments"
            }, r.hasOwnProperty("meta") && Object.keys(r.meta).length ? Object.keys(r.meta).map(function(e) {
                return wp.element.createElement(xe, null, r.meta[e].map(function(t) {
                    if (t && t.length > 3) {
                        if ("image" == e) return wp.element.createElement("img", {
                            src: t,
                            className: "activity_meta image"
                        });
                        if ("video" == e) return wp.element.createElement("div", {
                            className: "video_wrapper"
                        }, wp.element.createElement("video", {
                            className: "activity_meta video",
                            ref: function(e) {
                                e && new Plyr(e)
                            }
                        }, wp.element.createElement("source", {
                            src: t,
                            type: "video/mp4"
                        })));
                        if ("audio" == e) return wp.element.createElement("audio", {
                            className: "activity_meta audio",
                            ref: function(e) {
                                e && new Plyr(e)
                            }
                        }, wp.element.createElement("source", {
                            src: t,
                            type: "audio/mp3"
                        }));
                        if ("attachment" == e) return wp.element.createElement("a", {
                            href: t,
                            target: "_blank",
                            className: "vicon vicon-clip activity_meta"
                        })
                    }
                }))
            }) : "")) : "", wp.element.createElement(he, {
                time: r.date_recorded
            }), wp.element.createElement("div", {
                className: "activity_actions"
            }, window.vibebp.settings.likes ? wp.element.createElement("a", {
                className: -1 === v.indexOf(r.id) ? "vicon vicon-thumb-up" : "vicon vicon-thumb-up filled",
                onClick: function() {
                    var e = [],
                        n = -1;
                    v && (e = Ne(v), n = v.indexOf(r.id));
                    var a = "add-like"; - 1 === n ? e.push(r.id) : (a = "remove-like", t.update(r, "remove-like"), e.splice(n, 1)), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.activity, "/").concat(a), {
                        method: "post",
                        body: JSON.stringify({
                            activity_id: r.id,
                            token: Te("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        t.hasOwnProperty("message") && Ce("vibebp").addNotification({
                            text: t.message
                        }), localforage.setItem("liked_activities_" + Te("vibebp").getUser().id, JSON.stringify(e))
                    }), b(e)
                }
            }) : "", wp.element.createElement("a", {
                className: r.hasOwnProperty("children") && r.children ? "vicon vicon-comment-alt" : "vicon vicon-comment",
                onClick: function() {
                    p(!m)
                }
            }), wp.element.createElement("a", {
                className: d && -1 !== d.indexOf(r.id) ? "vicon vicon-star filled" : "vicon vicon-star",
                onClick: function() {
                    var e = [],
                        n = -1;
                    d && (e = Ne(d), n = d.indexOf(r.id));
                    var a = "add-favorite"; - 1 === n ? e.push(r.id) : (a = "remove-favorite", t.update(r, "remove-favorite"), e.splice(n, 1)), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.activity, "/").concat(a), {
                        method: "post",
                        body: JSON.stringify({
                            activity_id: r.id,
                            token: Te("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        t.hasOwnProperty("message") && Ce("vibebp").addNotification({
                            text: t.message
                        }), localforage.setItem("favorite_activities_" + Te("vibebp").getUser().id, JSON.stringify(e)), f(e)
                    })
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-trash",
                onClick: function() {
                    fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.activity, "/remove"), {
                        method: "post",
                        body: JSON.stringify({
                            activity_id: r.id,
                            parent_id: t.rootActivityId,
                            token: Te("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        e.hasOwnProperty("message") && Ce("vibebp").addNotification({
                            text: e.message
                        }), c(!0), t.update(r, "remove")
                    })
                }
            })), m ? wp.element.createElement(we, {
                activity_id: t.rootActivityId,
                update: function(e, t) {
                    var n = function(e) {
                        for (var t = 1; t < arguments.length; t++) {
                            var n = null != arguments[t] ? arguments[t] : {};
                            t % 2 ? _e(n, !0).forEach(function(t) {
                                Oe(e, t, n[t])
                            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : _e(n).forEach(function(t) {
                                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                            })
                        }
                        return e
                    }({}, r);
                    ("add" === t && (n.children ? n.children[Object.keys(n.children).length] = e : ("object" === Ee(n.children) && null !== n.children || (n.children = {}), n.children[0] = e), p(!1), a(n)), "remove" === t) && (-1 !== Object.keys(n.children).findIndex(function(t) {
                        return n.children[t].id === e.id
                    }) && (delete n.children[i], a(n)));
                    "cancel" === t && p(!1)
                },
                comment_id: r.id
            }) : "", r.hasOwnProperty("children") && r.children ? wp.element.createElement("div", {
                class: "activity_list"
            }, Object.keys(r.children).map(function(n) {
                return wp.element.createElement(e, {
                    activity: r.children[n],
                    rootActivityId: t.rootActivityId
                })
            })) : ""))
        };

    function De(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Le(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Je(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Le(n, !0).forEach(function(t) {
                Me(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Le(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Me(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function qe(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Fe = wp.element,
        He = (Fe.createElement, Fe.useState),
        Ue = Fe.useEffect,
        ze = (Fe.Fragment, Fe.render, wp.data),
        Re = ze.dispatch,
        We = ze.select,
        Ye = function(e) {
            var t = qe(He([]), 2),
                n = t[0],
                r = t[1],
                a = qe(He({}), 2),
                i = a[0],
                l = a[1],
                o = qe(He(!1), 2),
                c = o[0],
                s = o[1],
                m = qe(He(!0), 2),
                p = m[0],
                u = m[1],
                d = qe(He(!1), 2),
                f = d[0],
                w = d[1],
                v = qe(He([]), 2),
                b = v[0],
                y = v[1];
            Ue(function() {
                "personal" === e.type && l({
                    filter: "just-me",
                    search: "",
                    sorter: "",
                    page: 1
                }), "groups" === e.type && l({
                    filter: "groups",
                    item_id: e.id,
                    search: "",
                    sorter: "",
                    page: 1
                }), "course" === e.type && l({
                    filter: "course",
                    item_id: e.id,
                    search: "",
                    sorter: "",
                    page: 1
                });
                var t = We("vibebp").getMenu().filter(function(e) {
                    return "activity" === e.parent_slug
                });
                window.vibebp.settings.followers && t.push({
                    class: ["menu-child"],
                    css_id: "activity-following",
                    name: window.vibebp.translations.following,
                    parent: "activity"
                }), window.vibebp.settings.likes && t.push({
                    class: ["menu-child"],
                    css_id: "activity-likes",
                    name: window.vibebp.translations.liked,
                    parent: "activity"
                }), t.map(function(e, n) {
                    if (-1 === t.findIndex(function(e) {
                            return e.class.indexOf("current-menu-item") > -1
                        })) {
                        t[n].class.push("current-menu-item");
                        var r = new CustomEvent("action_loaded", {
                            detail: {
                                component: window.vibebp.api.endpoints.activity,
                                action: t[n].class
                            }
                        });
                        document.dispatchEvent(r)
                    }
                });
                var n = We("vibebp").getUser();
                n.caps.hasOwnProperty("manage_options") && t.push({
                    class: ["menu-child"],
                    css_id: "all_activity",
                    name: window.vibebp.translations.site_activity,
                    parent: "activity"
                }), t.map(function(e, r) {
                    e.hasOwnProperty("caps") && (n.caps.hasOwnProperty(e.caps) || t.splice(r, 1))
                }), y(t), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), Ue(function() {
                if (Object.keys(i).length) {
                    var e = Je({}, i);
                    e.token = We("vibebp").getToken(), navigator.onLine, u(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.activity), {
                        method: "post",
                        body: JSON.stringify(e)
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        if (u(!1), e.status) {
                            var t = [];
                            if (f) t = De(n), e.data.activities.map(function(e) {
                                t.push(e)
                            }), w(!1);
                            else {
                                if ("activity-favs" === i.filter) {
                                    var a = [];
                                    localforage.getItem("favorite_activities_" + We("vibebp").getUser().id).then(function(t) {
                                        t && ((t = JSON.parse(t)) && t.length && (a = De(t)), e.data.activities.map(function(e) {
                                            -1 === a.indexOf(e.id) && a.push(e.id)
                                        }), localforage.setItem("favorite_activities_" + We("vibebp").getUser().id, JSON.stringify(a)))
                                    })
                                }
                                if ("activity-likes" === i.filter) {
                                    var l = [];
                                    localforage.getItem("liked_activities_" + We("vibebp").getUser().id).then(function(t) {
                                        t && ((t = JSON.parse(t)) && t.length && (l = De(t)), e.data.activities.map(function(e) {
                                            -1 === l.indexOf(e.id) && l.push(e.id)
                                        }), localforage.setItem("liked_activities_" + We("vibebp").getUser().id, JSON.stringify(l)))
                                    })
                                }
                                t = e.data.activities
                            }
                            r(t), s(e.data.has_more_items)
                        } else e.hasOwnProperty("message") && Re("vibebp").addNotification({
                            text: e.message
                        })
                    })
                }
            }, [i]);
            var g = function(e, t) {
                var a = De(n);
                if ("remove" === t || "remove-favorite" == t && "activity-favs" == i.filter) {
                    var l = De(n),
                        o = l.findIndex(function(t) {
                            return t.id === e.id
                        }); - 1 !== o && (l.splice(o, 1), r(l))
                }
                "add" === t && (a.unshift(e), r(a))
            };
            return wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, "personal" === e.type ? wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.activity.label), b.map(function(e, t) {
                return wp.element.createElement("a", {
                    className: e.class.join(" "),
                    onClick: function(n) {
                        var r = Je({}, i);
                        r.filter = e.css_id, r.page = 1, l(r);
                        var a = De(b),
                            o = a.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        a[o].class.splice(a[o].class.indexOf("current-menu-item"), 1), a[t].class.push("current-menu-item"), y(a)
                    }
                }, e.name)
            }))) : "", wp.element.createElement("div", {
                className: "vibebp_main"
            }, wp.element.createElement(we, {
                component: e.type,
                id: e.id,
                update: g
            }), wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("div", {
                className: "header_links"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.search_text,
                value: i.search,
                onChange: function(e) {
                    var t = Je({}, i);
                    t.search = e.target.value, t.page = 1, l(t)
                }
            }))), wp.element.createElement("div", {
                className: "header_extras"
            }, wp.element.createElement("select", {
                onChange: function(e) {
                    return t = e.target.value, void l(Je({}, i, {
                        sorter: t
                    }));
                    var t
                }
            }, Object.keys(window.vibebp.components.activity.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.activity.sorters[e])
            })))), wp.element.createElement("div", {
                className: "portal_body"
            }, p ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : n.length ? wp.element.createElement("div", {
                className: "activity_list"
            }, n.map(function(e) {
                return wp.element.createElement(Ie, {
                    activity: e,
                    rootActivityId: e.id,
                    update: g
                })
            }), c ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = Je({}, i);
                    e.page = i.page + 1, w(!0), l(e)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_activity_found)))))
        };

    function Be(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ge = wp.element,
        Ke = (Ge.createElement, Ge.useState),
        Qe = Ge.useEffect,
        $e = (Ge.Fragment, Ge.render, wp.data),
        Ve = ($e.dispatch, $e.select),
        Xe = function(e) {
            var t = Be(Ke(!1), 2),
                n = t[0],
                r = t[1],
                a = Be(Ke(""), 2),
                i = a[0],
                l = a[1];
            return Qe(function() {
                r(!0);
                var t = {
                    token: Ve("vibebp").getToken()
                };
                e.hasOwnProperty("id") && (t.id = e.id), fetch("".concat(window.vibebp.api.url, "/profile/"), {
                    method: "post",
                    body: JSON.stringify({
                        token: Ve("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), l(e)
                })
            }, []), wp.element.createElement("div", {
                className: "user_profile"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement("div", {
                dangerouslySetInnerHTML: {
                    __html: i
                }
            }))
        };

    function Ze(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }
    var et = wp.element,
        tt = (et.createElement, et.useRef),
        nt = et.useEffect,
        rt = (et.Fragment, et.render, function(e, t) {
            var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : [],
                r = tt(Date.now());
            nt(function() {
                var n = setTimeout(function() {
                    Date.now() - r.current >= t && (e(), r.current = Date.now())
                }, t - (Date.now() - r.current));
                return function() {
                    clearTimeout(n)
                }
            }, [t].concat(Ze(n)))
        }),
        at = function(e) {
            try {
                JSON.parse(e)
            } catch (e) {
                return !1
            }
            return !0
        },
        it = function(e) {
            var t, n, r = e.progress;
            switch (e.size) {
                case "xs":
                    t = 10, n = 1;
                    break;
                case "sm":
                    t = 25, n = 2.5;
                    break;
                case "med":
                    t = 50, n = 5;
                    break;
                case "lg":
                    t = 75, n = 7.5;
                    break;
                case "xl":
                    t = 100, n = 10;
                    break;
                default:
                    t = 50, n = 5
            }
            var a = t - 2 * n,
                i = 2 * a * Math.PI,
                l = i - r / 100 * i;
            return wp.element.createElement("div", {
                className: "react-progress-circle"
            }, wp.element.createElement("svg", {
                height: 2 * t,
                width: 2 * t
            }, wp.element.createElement("circle", {
                className: "ReactProgressCircle_circleBackground",
                strokeWidth: n,
                style: {
                    strokeDashoffset: l
                },
                r: a,
                cx: t,
                cy: t
            }), wp.element.createElement("circle", {
                className: "ReactProgressCircle_circle",
                strokeWidth: n,
                strokeDasharray: i + " " + i,
                style: {
                    strokeDashoffset: l
                },
                r: a,
                cx: t,
                cy: t
            })))
        };

    function lt(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function ot(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? lt(n, !0).forEach(function(t) {
                ct(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : lt(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function ct(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function st(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function mt(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var pt = wp.element,
        ut = (pt.createElement, pt.useState),
        dt = pt.useEffect,
        ft = (pt.Fragment, pt.render, wp.data),
        wt = ft.dispatch,
        vt = ft.select,
        bt = function(e) {
            var t = mt(ut(!0), 2),
                n = (t[0], t[1], mt(ut(e.field), 2)),
                r = n[0],
                a = (n[1], mt(ut(!1), 2)),
                i = a[0],
                l = a[1],
                o = mt(ut({
                    icon: "",
                    url: ""
                }), 2),
                c = o[0],
                s = o[1],
                m = mt(ut([]), 2),
                p = m[0],
                u = m[1];
            dt(function() {
                "string" == typeof e.field.value && e.field.value.length && u(JSON.parse(e.field.value))
            }, []);
            var d, f = function(e) {
                console.log(p), fetch("".concat(window.vibebp.api.url, "/xprofile/field/save"), {
                    method: "post",
                    body: JSON.stringify({
                        field_id: r.id,
                        value: JSON.stringify(e),
                        token: vt("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    wt("vibebp").addNotification({
                        text: e.message
                    })
                })
            };
            return wp.element.createElement("div", {
                className: "vibebp_profile_field social"
            }, p.length ? wp.element.createElement("div", {
                className: "social_icons_list"
            }, p.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "social_icon_wrapper"
                }, wp.element.createElement("div", {
                    className: "social_icon"
                }, wp.element.createElement("span", {
                    className: e.icon
                }), wp.element.createElement("span", null, e.url)), wp.element.createElement("span", {
                    className: "vicon vicon-close",
                    onClick: function() {
                        var e = st(p);
                        e.splice(t, 1), u(e), f(e)
                    }
                }))
            })) : "", wp.element.createElement("a", {
                className: i ? "vicon vicon-close" : "vicon vicon-plus",
                onClick: function() {
                    l(!i)
                }
            }), i ? wp.element.createElement("div", {
                className: "add_social_icon"
            }, wp.element.createElement("div", {
                className: "social_icons"
            }, window.vibebp.social_icons.map(function(e) {
                return wp.element.createElement("div", {
                    className: c.icon === e.icon ? "social_icon selected" : "social_icon",
                    onClick: function() {
                        s(ot({}, c, {
                            icon: e.icon
                        }))
                    }
                }, wp.element.createElement("span", {
                    className: e.icon
                }), wp.element.createElement("span", null, e.label))
            })), wp.element.createElement("div", {
                className: !c.url.length || (d = c.url, /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:[\/?#]\S*)?$/i.test(d)) ? "social_icon_url" : "social_icon_url error"
            }, wp.element.createElement("input", {
                type: "text",
                onChange: function(e) {
                    s(ot({}, c, {
                        url: e.target.value
                    }))
                },
                value: c.url
            })), wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    if (c.url.length) {
                        var e = st(p);
                        e.push(c), u(e), l(!1), s({
                            icon: "",
                            url: ""
                        }), f(e)
                    }
                }
            }, window.vibebp.translations.set_icon)) : "")
        };

    function yt(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function gt(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? yt(n, !0).forEach(function(t) {
                ht(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : yt(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function ht(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Et(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function _t(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ot = wp.element,
        Nt = (Ot.createElement, Ot.useState),
        jt = Ot.useEffect,
        kt = (Ot.Fragment, Ot.render, wp.data),
        St = kt.dispatch,
        Pt = kt.select,
        xt = function(e) {
            var t = _t(Nt(!0), 2),
                n = (t[0], t[1], _t(Nt(e.field), 2)),
                r = n[0],
                a = (n[1], _t(Nt(!1), 2)),
                i = a[0],
                l = a[1],
                o = _t(Nt({
                    icon: "",
                    title: "",
                    description: ""
                }), 2),
                c = o[0],
                s = o[1],
                m = _t(Nt([]), 2),
                p = m[0],
                u = m[1];
            jt(function() {
                "string" == typeof e.field.value && e.field.value.length && u(JSON.parse(e.field.value))
            }, []);
            var d = function(e) {
                console.log(p), fetch("".concat(window.vibebp.api.url, "/xprofile/field/save"), {
                    method: "post",
                    body: JSON.stringify({
                        field_id: r.id,
                        value: JSON.stringify(e),
                        token: Pt("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    St("vibebp").addNotification({
                        text: e.message
                    })
                })
            };
            return wp.element.createElement("div", {
                className: "vibebp_profile_field repeatable"
            }, p.length ? wp.element.createElement("div", {
                className: "repeatable_icons_list"
            }, p.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "repeatable_icon_wrapper"
                }, wp.element.createElement("div", {
                    className: "repeatable_icon"
                }, e.icon.length > 100 ? wp.element.createElement("span", {
                    dangerouslySetInnetHTML: {
                        __html: e.icon
                    }
                }) : wp.element.createElement("span", {
                    className: e.icon
                }), wp.element.createElement("span", null, wp.element.createElement("h4", null, e.title), wp.element.createElement("p", null, e.description))), wp.element.createElement("span", {
                    className: "vicon vicon-close",
                    onClick: function() {
                        var e = Et(p);
                        e.splice(t, 1), u(e), d(e)
                    }
                }))
            })) : "", wp.element.createElement("a", {
                className: i ? "vicon vicon-close" : "vicon vicon-plus",
                onClick: function() {
                    l(!i)
                }
            }), i ? wp.element.createElement("div", {
                className: "add_repeatable_icon"
            }, wp.element.createElement("div", {
                className: "repeatable_icons"
            }, window.vibebp.repeatable_icons.map(function(e) {
                if (!(e.length > 100)) return wp.element.createElement("div", {
                    className: c.icon === e ? "repeatable_icon selected" : "repeatable_icon",
                    onClick: function() {
                        s(gt({}, c, {
                            icon: e
                        }))
                    }
                }, wp.element.createElement("span", {
                    className: e
                }));
                wp.element.createElement("div", {
                    className: c.icon === e ? "repeatable_icon selected" : "repeatable_icon",
                    onClick: function() {
                        s(gt({}, c, {
                            icon: e
                        }))
                    }
                }, wp.element.createElement("span", {
                    dangerouslySetInnetHTML: {
                        __html: e
                    }
                }))
            })), wp.element.createElement("div", {
                className: "repeatable_title"
            }, c.icon ? c.icon.length > 100 ? wp.element.createElement("span", {
                dangerouslySetInnetHTML: {
                    __html: c.icon
                }
            }) : wp.element.createElement("span", {
                className: c.icon
            }) : "", wp.element.createElement("span", null, wp.element.createElement("input", {
                type: "text",
                onChange: function(e) {
                    s(gt({}, c, {
                        title: e.target.value
                    }))
                },
                value: c.title,
                placeholder: window.vibebp.translations.title
            }), wp.element.createElement("input", {
                type: "text",
                onChange: function(e) {
                    s(gt({}, c, {
                        description: e.target.value
                    }))
                },
                value: c.description,
                placeholder: window.vibebp.translations.description
            }))), wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    if (c.title.length) {
                        var e = Et(p);
                        e.push(c), u(e), l(!1), s({
                            icon: "",
                            title: "",
                            description: ""
                        }), d(e)
                    }
                }
            }, window.vibebp.translations.set_icon)) : "")
        };

    function At(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Ct(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? At(n, !0).forEach(function(t) {
                Tt(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : At(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Tt(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function It(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Dt(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Lt = wp.element,
        Jt = (Lt.createElement, Lt.useState),
        Mt = Lt.useEffect,
        qt = (Lt.Fragment, Lt.render, wp.data),
        Ft = qt.dispatch,
        Ht = qt.select,
        Ut = function(e) {
            var t = Dt(Jt(!0), 2),
                n = t[0],
                r = t[1],
                a = Dt(Jt(e.field), 2),
                i = a[0],
                l = a[1],
                o = Dt(Jt(), 2),
                c = o[0],
                s = o[1],
                m = Dt(Jt(), 2),
                p = m[0],
                u = m[1],
                d = Dt(Jt(), 2),
                f = d[0],
                w = d[1],
                v = Dt(Jt(), 2),
                b = v[0],
                y = v[1],
                g = Dt(Jt(""), 2),
                h = g[0],
                E = g[1],
                _ = Dt(Jt([]), 2),
                O = _[0],
                N = _[1];
            rt(function() {
                n || e.field.value === i.value || fetch("".concat(window.vibebp.api.url, "/xprofile/field/save"), {
                    method: "post",
                    body: JSON.stringify({
                        field_id: i.id,
                        type: "location",
                        value: i.value,
                        token: Ht("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.hasOwnProperty("message") && Ft("vibebp").addNotification({
                        text: e.message
                    })
                })
            }, 500, [i.value]), rt(function() {
                if (!n) {
                    var e = new google.maps.places.AutocompleteService;
                    h.length && e.getQueryPredictions({
                        input: h
                    }, function(e, t) {
                        if (t == google.maps.places.PlacesServiceStatus.OK) {
                            var n = It(O);
                            e.forEach(function(e) {
                                n.push(e.description)
                            }), N(n)
                        }
                    })
                }
            }, 500, [h]), Mt(function() {
                if (c)
                    if (window.hasOwnProperty("google") && window.google.hasOwnProperty("maps")) {
                        var e = {
                                lat: -34.397,
                                lng: 150.644
                            },
                            t = {
                                zoom: 16,
                                center: e,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                imageDefaultUI: !0
                            },
                            n = new google.maps.Map(c, t);
                        u(n);
                        var a = new google.maps.Marker({
                            map: n,
                            position: e,
                            animation: google.maps.Animation.DROP
                        });
                        w(a), r(!1), y(new google.maps.Geocoder)
                    } else {
                        var i = window.document.createElement("script");
                        i.src = "https://maps.googleapis.com/maps/api/js?key=".concat(window.vibebp.settings.google_maps_api_key, "&libraries=places"), i.async = !0, window.document.body.appendChild(i), i.addEventListener("load", function() {
                            var e = {
                                    lat: -34.397,
                                    lng: 150.644
                                },
                                t = {
                                    zoom: 16,
                                    center: e,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                                    imageDefaultUI: !0
                                },
                                n = new google.maps.Map(c, t);
                            u(n);
                            var a = {
                                    url: window.vibebp.settings.map_marker,
                                    size: new google.maps.Size(51, 32),
                                    origin: new google.maps.Point(0, 0),
                                    anchor: new google.maps.Point(21, 30)
                                },
                                i = new google.maps.Marker({
                                    map: n,
                                    position: e,
                                    animation: google.maps.Animation.DROP,
                                    draggable: !0,
                                    icon: a
                                });
                            w(i), r(!1), y(new google.maps.Geocoder)
                        })
                    }
            }, [c]), Mt(function() {
                if (!n) {
                    if (i.value) {
                        var e = i.value;
                        if (Array.isArray(e) || e.split(","), e.length) {
                            var t = Ct({}, i);
                            6 === e.length && (t.value = {
                                lat: e[0],
                                lng: e[1],
                                address: e[2],
                                zipcode: e[3],
                                city: e[4],
                                country: e[5]
                            });
                            var r = new google.maps.LatLng(e[0], e[1]);
                            l(t), p.setCenter(r), f.setPosition(r)
                        }
                    } else k();
                    window.google.maps.event.addListener(f, "dragend", function(e) {
                        (new google.maps.Geocoder).geocode({
                            location: e.latLng
                        }, function(e, t) {
                            "OK" == t && (console.log(e), p.setCenter(e[0].geometry.location), l(Ct({}, i, {
                                value: {
                                    lat: e[0].geometry.location.lat(),
                                    lng: e[0].geometry.location.lng(),
                                    address: e[0].formatted_address,
                                    zipcode: e[0].address_components[e[0].address_components.findIndex(function(e) {
                                        return -1 !== e.types.indexOf("postal_code")
                                    })].long_name,
                                    city: e[0].address_components[e[0].address_components.findIndex(function(e) {
                                        return -1 !== e.types.indexOf("locality")
                                    })].long_name,
                                    country: e[0].address_components[e[0].address_components.findIndex(function(e) {
                                        return -1 !== e.types.indexOf("country")
                                    })].long_name
                                }
                            })))
                        })
                    })
                }
            }, [n]);
            var j = function() {
                    b && (new google.maps.Geocoder).geocode({
                        address: h
                    }, function(e, t) {
                        "OK" == t && (p.setCenter(e[0].geometry.location), f.setPosition(e[0].geometry.location)), N([])
                    })
                },
                k = function() {
                    console.log("...locating"), "geolocation" in navigator && navigator.geolocation.getCurrentPosition(function(e) {
                        var t = Ct({}, i);
                        console.log(e), t.value = [e.coords.latitude, e.coords.longitude], l(t);
                        var n = new google.maps.LatLng(e.coords.latitude, e.coords.longitude);
                        console.log(n), p.setCenter(n), f.setPosition(n)
                    })
                };
            return wp.element.createElement("div", {
                className: "vibebp_profile_field location"
            }, wp.element.createElement("div", {
                className: "search_me"
            }, wp.element.createElement("span", {
                className: "vicon vicon-target",
                onClick: k
            }), wp.element.createElement("input", {
                type: "text",
                value: h,
                onChange: function(e) {
                    E(e.target.value)
                }
            }), h.length ? wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    E(""), N([])
                }
            }) : "", wp.element.createElement("span", {
                className: h.length ? "vicon vicon-search is_active" : "vicon vicon-search",
                onClick: j
            })), O.length ? wp.element.createElement("div", {
                className: "vibebp_autocomplete_results"
            }, O.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_autocomplete_result",
                    onClick: function() {
                        E(e), N([]), j()
                    }
                }, e)
            })) : "", wp.element.createElement("div", {
                className: "google_map_locator"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : "", wp.element.createElement("div", {
                ref: function(e) {
                    e && !c && s(e)
                },
                style: {
                    height: "400px",
                    width: "100%"
                }
            })), wp.element.createElement("div", {
                className: "google_map_details"
            }, wp.element.createElement("textarea", {
                placeholder: window.vibebp.translations.address,
                onChange: function(e) {
                    l(Ct({}, i, {
                        value: Ct({}, i.value, {
                            address: e.target.value
                        })
                    }))
                },
                value: i.value.hasOwnProperty("address") ? i.value.address : ""
            }), wp.element.createElement("div", {
                className: "gmap_fields"
            }, wp.element.createElement("input", {
                type: "text",
                onChange: function(e) {
                    l(Ct({}, i, {
                        value: Ct({}, i.value, {
                            zipcode: e.target.value
                        })
                    }))
                },
                placeholder: window.vibebp.translations.zipcode,
                value: i.value.hasOwnProperty("zipcode") ? i.value.zipcode : ""
            }), wp.element.createElement("input", {
                type: "text",
                onChange: function(e) {
                    l(Ct({}, i, {
                        value: Ct({}, i.value, {
                            city: e.target.value
                        })
                    }))
                },
                placeholder: window.vibebp.translations.city,
                value: i.value.hasOwnProperty("city") ? i.value.city : ""
            }), wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.country,
                value: i.value.hasOwnProperty("country") ? i.value.country : ""
            }))))
        };

    function zt(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Rt(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? zt(n, !0).forEach(function(t) {
                Wt(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : zt(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Wt(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Yt(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Bt(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Gt = wp.element,
        Kt = (Gt.createElement, Gt.render, Gt.useState),
        Qt = Gt.useEffect;
    Gt.useContext, Gt.Fragment, Gt.RawHTML;

    function $t(e, t) {
        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : null;
        if (Array.isArray(t))
            if (n) {
                for (var r = 0; r < t.length; r++)
                    if (t[r][n] === e[n]) return r
            } else
                for (var a = 0; a < t.length; a++)
                    if (t[a].name === e.name) return a;
        return -1
    }
    var Vt = function(e) {
        var t = Bt(Kt({}), 2),
            n = t[0],
            r = t[1],
            a = Bt(Kt(""), 2),
            i = (a[0], a[1]),
            l = Bt(Kt([]), 2),
            o = l[0],
            c = l[1],
            s = Bt(Kt([]), 2),
            m = s[0],
            p = s[1],
            u = Bt(Kt(!1), 2),
            d = u[0],
            f = u[1],
            w = Bt(Kt(!1), 2),
            v = w[0],
            b = w[1],
            y = Bt(Kt(!1), 2),
            g = (y[0], y[1]);
        Qt(function() {
            if (e.field && e.field.hasOwnProperty("value") && e.field.value.length && e.field.options && e.field.options.length) {
                var t = [];
                e.field.value.map(function(n) {
                    e.field.options.map(function(e) {
                        e.value != n && e.name != n || t.push(e)
                    })
                }), p(t)
            }
            e.field.options && e.field.options.length && Array.isArray(e.field.options) && (f(!0), c(Yt(e.field.options)), f(!1)), r(e.field), g(!0)
        }, [e.field]);
        var h = "search_results";
        return v && (h = "search_results active"), wp.element.createElement("div", {
            className: "selectcptfield multiselect"
        }, wp.element.createElement("div", {
            className: "selectcptfield_list"
        }, m.length ? wp.element.createElement("div", {
            className: "selectcptfield_items"
        }, m.map(function(t) {
            var a = n.cpt ? n.multiselect : "";
            return wp.element.createElement("span", {
                type: a,
                onClick: function() {
                    var a = Yt(m),
                        i = Yt(o);
                    a.splice($t(t, m, "name"), 1), i.push(t), c(i), p(a);
                    var l = Rt({}, n);
                    if (a && a.length) {
                        var s = [];
                        a.map(function(e) {
                            e.hasOwnProperty("name") && s.push(e.name)
                        }), l.value = s, l.show_value = a, r(l), e.update(l, e.fieldIndex, "fieldvaluechanged")
                    } else l.value = [], l.show_value = [], r(l), e.update(l, e.fieldIndex, "fieldvaluechanged")
                }
            }, t.name)
        })) : ""), wp.element.createElement("div", {
            className: "selectimitate",
            onClick: function() {
                b(!v)
            }
        }, v ? wp.element.createElement("i", {
            class: "vicon vicon-angle-up",
            "aria-hidden": "true"
        }) : wp.element.createElement("i", {
            class: "vicon vicon-angle-down",
            "aria-hidden": "true"
        }), o.length ? wp.element.createElement("div", {
            className: h
        }, o.map(function(t, a) {
            if (-1 === $t(t, m, "name")) return wp.element.createElement("div", {
                className: "search_result selectcpt",
                onClick: function() {
                    i("");
                    var l = Yt(m);
                    if (-1 === $t(t, l, "name")) {
                        l.push(t), o.splice(a, 1), p(l);
                        var c = Rt({}, n);
                        if (l && l.length) {
                            var s = [];
                            l.map(function(e) {
                                e.hasOwnProperty("name") && s.push(e.name)
                            }), c.value = s, c.show_value = l, r(c), e.update(c, e.fieldIndex, "fieldvaluechanged")
                        }
                    }
                }
            }, wp.element.createElement("span", null, t.name))
        })) : d ? "......" : ""))
    };

    function Xt(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Zt(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function en(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Zt(n, !0).forEach(function(t) {
                tn(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Zt(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function tn(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function nn(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var rn = wp.element,
        an = (rn.createElement, rn.useState),
        ln = rn.useEffect,
        on = (rn.Fragment, rn.render, rn.useRef),
        cn = wp.data,
        sn = cn.dispatch,
        mn = cn.select,
        pn = function(e) {
            var t = nn(an(!1), 2),
                n = t[0],
                r = t[1],
                a = nn(an(!1), 2),
                i = a[0],
                l = a[1],
                o = nn(an(e.field), 2),
                c = o[0],
                s = o[1],
                m = on(null);
            ln(function() {
                "checkbox" != c.type && "selectbox" != c.type && "radio" != c.type && "multiselect" != c.type && "location" != c.type && "multiselectbox" != c.type || fetch("".concat(window.vibebp.api.url, "/xprofile/field/options"), {
                    method: "post",
                    body: JSON.stringify({
                        field_id: c.id,
                        type: c.type,
                        token: mn("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && s(en({}, c, {
                        options: e.values
                    }))
                });
                var e = new CustomEvent("field_loaded", {
                    detail: {
                        field: c
                    }
                });
                document.dispatchEvent(e)
            }, []), ln(function() {
                if (m && m.hasOwnProperty("current") && m.current) {
                    var e = {
                        altInput: !0,
                        dateFormat: "Y-m-d",
                        defaultDate: c.hasOwnProperty("value") && c.value.length ? c.value : [],
                        onChange: p
                    };
                    flatpickr(m.current, e)
                }
            }, [c]), rt(function() {
                n && (l(!0), fetch("".concat(window.vibebp.api.url, "/xprofile/field/save"), {
                    method: "post",
                    body: JSON.stringify({
                        field_id: c.id,
                        type: c.type,
                        value: c.value,
                        token: mn("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(t) {
                    l(!1), document.dispatchEvent(new CustomEvent("xprofile_field_saved", {
                        detail: {
                            field_id: c.id
                        }
                    })), e.hasOwnProperty("update") && e.update(c), t.hasOwnProperty("message") && sn("vibebp").addNotification({
                        icon: t.status ? "vicon vicon-check-box" : "vicon vicon-alert",
                        text: t.message
                    })
                }))
            }, 1500, [c.value, n]);
            var p = function(e) {
                var t = en({}, c);
                if (e && e.length) {
                    var n = e[0].getDate();
                    (n = n.toString()).length < 2 && (n = "0" + n);
                    var a = e[0].getMonth() + 1;
                    (a = a.toString()).length < 2 && (a = "0" + a);
                    var i = e[0].getFullYear() + "-" + a + "-" + n;
                    t.value = i
                } else t.value = "";
                s(t), r(!0)
            };
            return wp.element.createElement("div", {
                className: i ? "vibebp_form_field control is-loading" : "vibebp_form_field control"
            }, wp.element.createElement("label", null, wp.element.createElement("strong", {
                dangerouslySetInnerHTML: {
                    __html: c.name
                }
            }), " ", wp.element.createElement("span", null, window.vibebp.components.xprofile.visibility[c.visibility])), wp.element.createElement("div", {
                className: "field_description",
                dangerouslySetInnerHTML: {
                    __html: c.description
                }
            }), "textbox" === c.type ? wp.element.createElement("input", {
                type: "text",
                value: c.value,
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                }
            }) : "number" === c.type ? wp.element.createElement("input", {
                type: "number",
                value: c.value,
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                }
            }) : "telephone" === c.type ? wp.element.createElement("input", {
                type: "number",
                value: c.value,
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                }
            }) : "url" === c.type ? wp.element.createElement("input", {
                type: "text",
                value: c.value,
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                }
            }) : "textarea" === c.type ? wp.element.createElement("textarea", {
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                }
            }, c.value) : "selectbox" === c.type ? wp.element.createElement("select", {
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                },
                value: c.value
            }, c.hasOwnProperty("options") ? c.options.map(function(e, t) {
                return wp.element.createElement("option", {
                    value: e.name
                }, e.name)
            }) : "") : "radio" === c.type ? wp.element.createElement("div", {
                className: "vibebp_field_group"
            }, c.hasOwnProperty("options") ? c.options.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "radio"
                }, wp.element.createElement("input", {
                    id: e.id,
                    type: "radio",
                    value: e.name,
                    checked: c.value === e.name,
                    onChange: function(e) {
                        s(en({}, c, {
                            value: e.target.value
                        })), r(!0)
                    }
                }), wp.element.createElement("label", {
                    for: e.id
                }, e.name))
            }) : "") : "checkbox" === c.type ? wp.element.createElement("div", {
                className: "vibebp_field_group"
            }, c.hasOwnProperty("options") ? c.options.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "checkbox"
                }, wp.element.createElement("input", {
                    type: "checkbox",
                    id: e.id,
                    value: e.name,
                    checked: -1 !== c.value.indexOf(e.name),
                    onChange: function(t) {
                        if (c.value && -1 === c.value.indexOf(e.name)) {
                            var n = Xt(c.value);
                            n.push(e.name), s(en({}, c, {
                                value: n
                            }))
                        } else {
                            var a = Xt(c.value);
                            a.splice(c.value.indexOf(e.name), 1), s(en({}, c, {
                                value: a
                            }))
                        }
                        r(!0)
                    }
                }), wp.element.createElement("label", {
                    for: e.id
                }, e.name))
            }) : "") : "multiselectbox" === c.type ? wp.element.createElement(Vt, {
                update: function(e, t, n) {
                    s(en({}, c, {
                        value: e.value
                    })), r(!0)
                },
                field: c
            }) : "datebox" === c.type ? wp.element.createElement("input", {
                type: "text",
                ref: m
            }) : "country" === c.type ? wp.element.createElement("select", {
                onChange: function(e) {
                    s(en({}, c, {
                        value: e.target.value
                    })), r(!0)
                },
                value: c.value
            }, Object.keys(window.vibebp.components.xprofile.countries).length ? Object.keys(window.vibebp.components.xprofile.countries).map(function(e, t) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.xprofile.countries[e])
            }) : "") : "color" === c.type ? wp.element.createElement("span", {
                className: "vibebp_color_field",
                style: {
                    background: c.value
                },
                ref: function(e) {
                    new Picker(e).onChange = function(t) {
                        e.style.background = t.rgbaString, s(en({}, c, {
                            value: t.rgbaString
                        })), r(!0)
                    }
                }
            }) : "location" === c.type ? wp.element.createElement(Ut, {
                field: c
            }) : "social" === c.type ? wp.element.createElement(bt, {
                field: c
            }) : "repeatable" === c.type ? wp.element.createElement(xt, {
                field: c
            }) : "")
        };

    function un(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function dn(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function fn(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var wn = wp.element,
        vn = (wn.createElement, wn.useState),
        bn = wn.useEffect,
        yn = wn.Fragment,
        gn = (wn.render, wp.data),
        hn = (gn.dispatch, gn.select),
        En = function(e) {
            var t = fn(vn(!1), 2),
                n = t[0],
                r = t[1],
                a = fn(vn({
                    avatar: {},
                    groups: [],
                    fields: [],
                    cover: {}
                }), 2),
                i = a[0],
                l = a[1];
            return bn(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/xprofile/allfields"), {
                    method: "post",
                    body: JSON.stringify({
                        token: hn("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (r(!1), e.status) {
                        var t = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? un(n, !0).forEach(function(t) {
                                    dn(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : un(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, i);
                        t.groups = e.groups, t.fields = e.fields, l(t)
                    }
                }), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "edit_profile"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement(yn, null, i.groups.length ? i.groups.map(function(e) {
                if (i.fields.filter(function(t) {
                        return t.group_id == e.id
                    }).length) return wp.element.createElement("div", {
                    className: "portal"
                }, wp.element.createElement("div", {
                    className: "portal_header"
                }, wp.element.createElement("strong", null, e.name)), wp.element.createElement("div", {
                    className: "portal_body"
                }, i.fields.filter(function(t) {
                    return t.group_id == e.id
                }).length ? wp.element.createElement("ul", {
                    className: "vibebp_form"
                }, i.fields.filter(function(t) {
                    return t.group_id == e.id
                }).map(function(e) {
                    return wp.element.createElement(pn, {
                        field: e
                    })
                })) : ""))
            }) : ""))
        };

    function _n(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var On = wp.element,
        Nn = (On.createElement, On.useState),
        jn = On.useEffect,
        kn = (On.Fragment, On.render, wp.data),
        Sn = kn.dispatch,
        Pn = kn.select,
        xn = function(e) {
            var t = _n(Nn(!1), 2),
                n = t[0],
                r = t[1],
                a = _n(Nn(""), 2),
                i = a[0],
                l = a[1],
                o = _n(Nn(""), 2),
                c = o[0],
                s = o[1],
                m = _n(Nn({}), 2),
                p = m[0],
                u = m[1],
                d = _n(Nn(!1), 2),
                f = d[0],
                w = d[1],
                v = _n(Nn(!1), 2),
                b = v[0],
                y = v[1],
                g = Pn("vibebp").getUser();
            jn(function() {
                localforage.getItem("user_" + g.id).then(function(e) {
                    null !== e ? (e = JSON.parse(e), l(e.avatar)) : fetch("".concat(window.vibebp.api.url, "/avatar"), {
                        method: "post",
                        body: JSON.stringify({
                            type: "user",
                            ids: g.id,
                            token: Pn("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        e.status && (localforage.setItem("user_" + g.id, JSON.stringify(e.value)), l(e.value))
                    })
                })
            }, []);
            return wp.element.createElement("div", {
                className: "profile_avatar_wrapper"
            }, wp.element.createElement("div", {
                className: "profile_avatar"
            }, n ? wp.element.createElement(ne, {
                type: "image",
                crop: "1",
                update: function(e, t) {
                    console.log(t), y(!0), s(e[0]), u(t)
                }
            }) : wp.element.createElement("img", {
                src: i
            })), wp.element.createElement("div", {
                className: "profile_avatar_actions buttons"
            }, wp.element.createElement("a", {
                className: n ? "button is-danger" : "button is-info",
                onClick: function() {
                    r(!n)
                }
            }, n ? window.vibebp.translations.cancel : window.vibebp.translations.change_image), b ? wp.element.createElement("a", {
                className: f ? "button is-loading is-primary" : "button is-primary",
                onClick: function() {
                    w(!0);
                    var e = {
                            cropdata: p,
                            token: Pn("vibebp").getToken()
                        },
                        t = new FormData;
                    t.append("body", JSON.stringify(e)), t.append("file", c), fetch("".concat(window.vibebp.api.url, "/profile/avatar"), {
                        method: "post",
                        body: t
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        if (w(!1), e.status && (y(!1), e.hasOwnProperty("message") && Sn("vibebp").addNotification({
                                text: e.message
                            }), e.hasOwnProperty("avatar"))) {
                            l(e.avatar);
                            var t = Pn("vibebp").getUser();
                            t.avatar = e.avatar, localforage.setItem("bp_user", JSON.stringify(t));
                            var n = t.username;
                            t.hasOwnProperty("displayname") && t.displayname.length && (n = t.displayname), localforage.setItem("user_" + t.id, JSON.stringify({
                                avatar: e.avatar,
                                name: n
                            })), Pn("vibebp").setUser(t)
                        }
                    })
                }
            }, window.vibebp.translations.update_image) : ""))
        };

    function An(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Cn(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Tn = wp.element,
        In = (Tn.createElement, Tn.useState),
        Dn = Tn.useEffect,
        Ln = (Tn.Fragment, Tn.render, wp.data),
        Jn = Ln.dispatch,
        Mn = Ln.select,
        qn = function(e) {
            var t = Cn(In(!1), 2),
                n = t[0],
                r = (t[1], Cn(In("public"), 2)),
                a = r[0],
                i = r[1],
                l = Cn(In([]), 2),
                o = l[0],
                c = l[1];
            return Dn(function() {
                var e = Mn("vibebp").getAction(),
                    t = Mn("vibebp").getMenu().filter(function(e) {
                        return "profile" === e.parent
                    });
                t.map(function(n, r) {
                    e ? t.findIndex(function(t) {
                        return t.css_id == e
                    }) > -1 && (i(t[t.findIndex(function(t) {
                        return t.css_id == e
                    })].css_id), t[t.findIndex(function(t) {
                        return t.css_id == e
                    })].class.push("current-menu-item")) : -1 == t[0].class.indexOf("current-menu-item") && t[0].class.push("current-menu-item")
                }), c(t), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.profile.label), o.map(function(e, t) {
                return wp.element.createElement("a", {
                    className: e.class.join(" "),
                    onClick: function(e) {
                        var n = An(o),
                            r = n.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        n[r].class.splice(n[r].class.indexOf("current-menu-item"), 1), n[t].class.push("current-menu-item"), c(n), i(n[t].css_id), Jn("vibebp").setAction(n[t].css_id)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : "edit" === a ? wp.element.createElement(En, null) : "change-avatar" === a ? wp.element.createElement(xn, null) : wp.element.createElement(Xe, null)))
        };

    function Fn(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Hn = wp.element,
        Un = (Hn.createElement, Hn.useState),
        zn = Hn.useEffect,
        Rn = (Hn.Fragment, Hn.render, function(e) {
            var t = Fn(Un(""), 2),
                n = t[0],
                r = t[1];
            return zn(function() {
                e.notification.content.hasOwnProperty("text") ? r(e.notification.content.text) : r(e.notification.content)
            }, [e.notification.content]), wp.element.createElement("div", {
                className: "notification",
                dangerouslySetInnerHTML: {
                    __html: n
                }
            })
        });

    function Wn(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Yn = wp.element,
        Bn = (Yn.createElement, Yn.useState),
        Gn = Yn.useEffect,
        Kn = (Yn.Fragment, Yn.render, wp.data),
        Qn = (Kn.dispatch, Kn.select),
        $n = function(e) {
            var t = Wn(Bn(""), 2),
                n = t[0],
                r = t[1];
            return Gn(function() {
                var t = "",
                    n = "";
                switch (e.type) {
                    case "friends":
                        n = "user", t = e.id.item_id;
                        break;
                    case "forum":
                        n = "forum", t = e.id.item_id;
                        break;
                    case "group":
                        n = "group", t = e.id.item_id;
                        break;
                    case "activity":
                        n = "user", t = e.id.secondary_item_id;
                        break;
                    case "member":
                    case "name":
                    case "user_tip":
                    case "user":
                        n = "user", t = e.id.user_id;
                        break;
                    default:
                        n = e.type, t = e.id.item_id
                }
                localforage.getItem(n + "_" + t).then(function(t) {
                    null !== t ? r(JSON.parse(t)) : fetch("".concat(window.vibebp.api.url, "/avatar"), {
                        method: "post",
                        body: JSON.stringify({
                            type: e.type,
                            ids: e.id,
                            token: Qn("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        e.status && (localforage.setItem(e.key, JSON.stringify(e.value)), r(e.value))
                    })
                })
            }, []), "member" == e.type ? wp.element.createElement("span", {
                className: "vibebp_member"
            }, wp.element.createElement("img", {
                src: n.avatar,
                className: "vibebp_avatar",
                onClick: e.click,
                alt: n.name,
                title: n.name
            }), wp.element.createElement("span", null, n.name)) : "user_tip" == e.type ? wp.element.createElement("span", {
                className: "vibebp_member tip",
                title: n.name
            }, wp.element.createElement("img", {
                src: n.avatar,
                className: "vibebp_avatar",
                onClick: e.click,
                alt: n.name,
                title: n.name
            })) : "name" == e.type ? wp.element.createElement("span", null, n.name) : "forum" == e.type ? wp.element.createElement("span", null, n.name) : wp.element.createElement("img", {
                src: n.avatar,
                className: "vibebp_avatar",
                onClick: e.click,
                alt: n.name,
                title: n.name
            })
        };

    function Vn(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Xn(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Zn(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Xn(n, !0).forEach(function(t) {
                er(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Xn(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function er(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function tr(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var nr = wp.element,
        rr = (nr.createElement, nr.useState),
        ar = nr.useEffect,
        ir = (nr.Fragment, nr.render, wp.data),
        lr = (ir.dispatch, ir.select),
        or = function(e) {
            var t = tr(rr([]), 2),
                n = t[0],
                r = t[1],
                a = tr(rr([]), 2),
                i = a[0],
                l = a[1],
                o = tr(rr(!1), 2),
                c = o[0],
                s = o[1],
                m = tr(rr({
                    filter: "unread",
                    sorter: "",
                    page: 1,
                    search: ""
                }), 2),
                p = m[0],
                u = m[1],
                d = tr(rr(!1), 2),
                f = d[0],
                w = d[1],
                v = tr(rr([]), 2),
                b = v[0],
                y = v[1],
                g = tr(rr(!0), 2),
                h = g[0],
                E = g[1],
                _ = tr(rr(""), 2),
                O = _[0],
                N = _[1],
                j = tr(rr(!1), 2),
                k = j[0],
                S = j[1],
                P = tr(rr(!1), 2),
                x = P[0],
                A = P[1];
            ar(function() {
                console.log(lr("vibebp").getMenu());
                var e = lr("vibebp").getMenu().filter(function(e) {
                    return "notifications" === e.parent
                });
                e.map(function(t, n) {
                    -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && e[n].class.push("current-menu-item")
                }), l(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), rt(function() {
                var e = Zn({}, p);
                e.token = lr("vibebp").getToken(), E(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications), {
                    method: "post",
                    body: JSON.stringify(e)
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (E(!1), e.status)
                        if (x) {
                            var t = Vn(n);
                            e.data.notifications.map(function(e) {
                                t.push(e)
                            }), r(t), A(!1), t.length < e.data.total ? S(!0) : S(!1)
                        } else r(e.data.notifications), e.data.notifications.length < e.data.total ? S(!0) : S(!1);
                    else r([])
                })
            }, 500, [p]);
            var C = function(e, t) {
                s(!1);
                var a = Vn(n);
                "read" === t && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/mark-read-unread"), {
                    method: "post",
                    body: JSON.stringify({
                        is_new: 0,
                        id: e,
                        token: lr("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {}), "unread" === t && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/mark-read-unread"), {
                    method: "post",
                    body: JSON.stringify({
                        is_new: 1,
                        id: e,
                        token: lr("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {}), "delete" === t && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/delete-notification"), {
                    method: "post",
                    body: JSON.stringify({
                        id: e,
                        token: lr("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {}), a.splice(a.findIndex(function(t) {
                    return t.id === e
                }), 1), r(a)
            };
            return wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.notifications.label), i.map(function(e, t) {
                var n = e.class.join(" ") + " " + e.css_id;
                return wp.element.createElement("a", {
                    className: n,
                    onClick: function(n) {
                        var r = Zn({}, p);
                        r.filter = e.css_id, "notifications-my-notifications" === e.css_id && (r.filter = "unread"), r.page = 1, u(r);
                        var a = Vn(i),
                            o = a.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        a[o].class.splice(a[o].class.indexOf("current-menu-item"), 1), a[t].class.push("current-menu-item"), w(!1), y([]), N(""), l(a)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, wp.element.createElement("div", {
                className: "vibebp_main_head"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                value: p.search,
                onChange: function(e) {
                    return u(Zn({}, p, {
                        search: e.target.value
                    }))
                },
                placeholder: window.vibebp.translations.search_text
            })), wp.element.createElement("select", {
                onChange: function(e) {
                    var t = Zn({}, p);
                    t.sorter = e.target.value, u(t)
                }
            }, Object.keys(window.vibebp.components.notifications.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.notifications.sorters[e])
            }))), n.length || h ? wp.element.createElement("div", {
                className: "table_block"
            }, wp.element.createElement("table", {
                className: "table"
            }, wp.element.createElement("thead", null, wp.element.createElement("th", null, wp.element.createElement("div", {
                className: "checkbox"
            }, wp.element.createElement("input", {
                id: "selectall",
                type: "checkbox",
                checked: f ? "checked" : "",
                onClick: function() {
                    f ? w(!1) : (w(!0), y([]))
                }
            }), wp.element.createElement("label", {
                for: "selectall"
            }))), wp.element.createElement("th", null, window.vibebp.translations.owner), wp.element.createElement("th", null, window.vibebp.components.notifications.label), wp.element.createElement("th", null, window.vibebp.translations.date), wp.element.createElement("th", null, wp.element.createElement("a", {
                className: "vicon vicon-more rotate90"
            }))), wp.element.createElement("tbody", null, h ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : n.length ? n.map(function(e) {
                return wp.element.createElement("tr", null, wp.element.createElement("td", {
                    valign: "center"
                }, wp.element.createElement("div", {
                    className: "checkbox"
                }, wp.element.createElement("input", {
                    type: "checkbox",
                    onClick: function() {
                        var t = Vn(b);
                        f && (w(!1), n.map(function(e) {
                            t.push(e.id)
                        })), -1 === b.indexOf(e.id) ? (t.push(e.id), y(t)) : (t.splice(b.indexOf(e.id), 1), y(t))
                    },
                    checked: f || -1 !== b.indexOf(e.id) ? "checked" : "",
                    id: e.id
                }), wp.element.createElement("label", {
                    for: e.id
                }))), wp.element.createElement("td", {
                    valign: "center"
                }, wp.element.createElement($n, {
                    type: e.component_name,
                    id: {
                        item_id: e.item_id,
                        secondary_item_id: e.secondary_item_id,
                        user_id: e.user_id
                    }
                })), wp.element.createElement("td", {
                    valign: "center"
                }, wp.element.createElement(Rn, {
                    notification: e,
                    update: C
                })), wp.element.createElement("td", {
                    valign: "center"
                }, wp.element.createElement(he, {
                    time: e.date_notified
                })), wp.element.createElement("td", {
                    valign: "center"
                }, wp.element.createElement("a", {
                    className: "vicon vicon-more rotate90",
                    onClick: function() {
                        s(!c && e.id)
                    }
                }), c === e.id ? wp.element.createElement("ul", {
                    className: "target_menu"
                }, Object.keys(window.vibebp.components.notifications.actions).map(function(t) {
                    if (t !== p.filter) return wp.element.createElement("li", {
                        value: t,
                        onClick: function() {
                            C(e.id, t)
                        }
                    }, window.vibebp.components.notifications.actions[t])
                })) : ""))
            }) : "")), f || b.length ? wp.element.createElement("div", {
                className: "bulk_actions"
            }, wp.element.createElement("select", {
                onChange: function(e) {
                    N(e.target.value)
                }
            }, wp.element.createElement("option", null, window.vibebp.translations.selectaction), Object.keys(window.vibebp.components.notifications.actions).map(function(e) {
                if (e !== p.filter) return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.notifications.actions[e])
            })), wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    var e = Vn(n);
                    if (console.log(O), O)
                        if (f) {
                            if (r([]), "read" === O && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/markall-read-unread"), {
                                    method: "post",
                                    body: JSON.stringify({
                                        is_new: 0,
                                        token: lr("vibebp").getToken()
                                    })
                                }).then(function(e) {
                                    return e.json()
                                }).then(function(e) {}), "unread" === O && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/markall-read-unread"), {
                                    method: "post",
                                    body: JSON.stringify({
                                        is_new: 1,
                                        token: lr("vibebp").getToken()
                                    })
                                }).then(function(e) {
                                    return e.json()
                                }).then(function(e) {}), "delete" === O) {
                                var t = [];
                                n.map(function(e) {
                                    t.push(e.id)
                                }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/deleteall"), {
                                    method: "post",
                                    body: JSON.stringify({
                                        ids: t,
                                        token: lr("vibebp").getToken()
                                    })
                                }).then(function(e) {
                                    return e.json()
                                }).then(function(e) {})
                            }
                        } else b.length && (b.map(function(t) {
                            e.splice(e.findIndex(function(e) {
                                return t === e.id
                            }), 1)
                        }), r(e), "read" === O && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/mark-read-unread"), {
                            method: "post",
                            body: JSON.stringify({
                                is_new: 0,
                                id: b,
                                token: lr("vibebp").getToken()
                            })
                        }).then(function(e) {
                            return e.json()
                        }).then(function(e) {}), "unread" === O && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/mark-read-unread"), {
                            method: "post",
                            body: JSON.stringify({
                                is_new: 1,
                                id: b,
                                token: lr("vibebp").getToken()
                            })
                        }).then(function(e) {
                            return e.json()
                        }).then(function(e) {}), "delete" === O && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.notifications, "/delete-notification"), {
                            method: "post",
                            body: JSON.stringify({
                                id: b,
                                token: lr("vibebp").getToken()
                            })
                        }).then(function(e) {
                            return e.json()
                        }).then(function(e) {}))
                }
            }, window.vibebp.translations.apply)) : "", k ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = Zn({}, p);
                    e.page += 1, u(e), A(!0)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_notifications_found)))
        };

    function cr(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var sr = wp.element,
        mr = (sr.createElement, sr.useState),
        pr = (sr.useEffect, sr.Fragment),
        ur = (sr.render, wp.data),
        dr = (ur.dispatch, ur.select, function(e) {
            var t = cr(mr(JSON.parse(e.object)), 2),
                n = t[0];
            t[1];
            return wp.element.createElement(pr, null, "unstyled" === n.blocks[0].type ? wp.element.createElement("div", {
                className: "blocktext"
            }, n.blocks[0].text) : "")
        });

    function fr(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function wr(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var vr = wp.element,
        br = (vr.createElement, vr.useState),
        yr = vr.useEffect,
        gr = vr.Fragment,
        hr = (vr.render, vr.useContext),
        Er = wp.data,
        _r = Er.dispatch,
        Or = Er.select,
        Nr = function(e) {
            var t = hr(r),
                n = wr(br(0), 2),
                a = n[0],
                i = n[1],
                l = wr(br(!1), 2),
                o = l[0],
                c = l[1],
                s = wr(br(e.message.labels), 2),
                m = s[0],
                p = s[1];
            yr(function() {
                Object.keys(e.message.recipients).map(function(t) {
                    e.message.recipients[t].user_id === Or("vibebp").getUser() && e.message.recipients[t].unread_count && i(1)
                })
            }, []);
            var u = "message_add_label vicon vicon-plus";
            return o && (u = "message_add_label vicon vicon-close"), wp.element.createElement(gr, null, t.messageLabels && t.messageLabels.length ? wp.element.createElement("div", {
                className: "message_labels"
            }, m.length ? m.map(function(n) {
                var r = t.messageLabels[t.messageLabels.findIndex(function(e) {
                    return e.slug === n
                })];
                return wp.element.createElement("span", {
                    style: {
                        background: r.color
                    },
                    onClick: function() {
                        return function(t) {
                            var n = fr(m);
                            n.splice(n.indexOf(t), 1), p(n), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                                method: "post",
                                body: JSON.stringify({
                                    id: e.message.thread_id,
                                    action: "remove_label",
                                    label: t,
                                    token: Or("vibebp").getToken()
                                })
                            }).then(function(e) {
                                return e.json()
                            }).then(function(n) {
                                e.updateLabels(t, 0), n.hasOwnProperty("message") && _r("vibebp").addNotification({
                                    text: n.message,
                                    icon: "vicon vicon-save"
                                })
                            })
                        }(n)
                    }
                }, r.name)
            }) : "", wp.element.createElement("a", {
                className: u,
                onClick: function() {
                    c(!o)
                }
            }), o ? wp.element.createElement("ul", {
                className: "allmessage_labels"
            }, t.messageLabels.map(function(t) {
                if (-1 === m.indexOf(t.slug)) return wp.element.createElement("li", {
                    onClick: function() {
                        return function(t) {
                            c(!1);
                            var n = fr(m);
                            n.push(t.slug), p(n), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                                method: "post",
                                body: JSON.stringify({
                                    id: e.message.thread_id,
                                    action: "add_label",
                                    label: t.slug,
                                    token: Or("vibebp").getToken()
                                })
                            }).then(function(e) {
                                return e.json()
                            }).then(function(n) {
                                e.updateLabels(t.slug, 1), n.hasOwnProperty("message") && _r("vibebp").addNotification({
                                    text: n.message,
                                    icon: "vicon vicon-save"
                                })
                            })
                        }(t)
                    },
                    style: {
                        background: t.color
                    }
                }, t.name)
            })) : "") : "", wp.element.createElement("div", {
                className: "message",
                onClick: function() {
                    e.show()
                }
            }, a ? wp.element.createElement("strong", {
                dangerouslySetInnerHTML: {
                    __html: e.message.last_message_subject
                }
            }) : wp.element.createElement("div", {
                dangerouslySetInnerHTML: {
                    __html: e.message.last_message_subject
                }
            }), at(e.message.last_message_content) ? wp.element.createElement(dr, {
                object: e.message.last_message_content,
                type: "text"
            }) : wp.element.createElement("div", {
                className: "message_content",
                dangerouslySetInnerHTML: {
                    __html: e.message.last_message_content
                }
            })))
        };

    function jr(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function kr(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Sr(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? kr(n, !0).forEach(function(t) {
                Pr(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : kr(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Pr(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function xr(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ar = wp.element,
        Cr = (Ar.createElement, Ar.useState),
        Tr = Ar.useEffect,
        Ir = Ar.Fragment,
        Dr = (Ar.render, wp.data),
        Lr = Dr.dispatch,
        Jr = Dr.select,
        Mr = function(e) {
            var t = xr(Cr(""), 2),
                n = t[0],
                r = t[1],
                a = xr(Cr(!1), 2),
                i = a[0],
                l = a[1],
                o = xr(Cr(!1), 2),
                c = o[0],
                s = o[1],
                m = xr(Cr([]), 2),
                p = m[0],
                u = m[1],
                d = xr(Cr({
                    content: "",
                    recipients: [],
                    subject: "",
                    thread_id: 0,
                    meta: []
                }), 2),
                f = d[0],
                w = d[1],
                v = xr(Cr([]), 2),
                b = v[0],
                y = v[1],
                g = xr(Cr(""), 2),
                h = g[0],
                E = g[1];
            Tr(function() {
                if (e.hasOwnProperty("thread_id")) {
                    var t = Sr({}, f);
                    t.thread_id = e.thread_id, t.recipients = e.recipients, w(t)
                }
            }, []), rt(function() {
                n.length > 4 && (s(!0), fetch("".concat(window.vibebp.api.url, "/search"), {
                    method: "post",
                    body: JSON.stringify({
                        search: n,
                        type: "user",
                        token: Jr("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    s(!1), e.status && Array.isArray(e.results) && (e.results.map(function(e) {
                        localforage.setItem("user_" + e.id, JSON.stringify(e))
                    }), u(e.results))
                }))
            }, 500, [n]);
            var _ = function() {
                var t = 1;
                if (f.content.length || (t = 0, Lr("vibebp").addNotification({
                        text: window.vibebp.translations.missing_content
                    })), f.recipients.length || 2 == e.type || (t = 0, Lr("vibebp").addNotification({
                        text: window.vibebp.translations.missing_recipients
                    })), f.subject.length || f.thread_id || (t = 0, Lr("vibebp").addNotification({
                        text: window.vibebp.translations.missing_subject
                    })), t) {
                    var n = Sr({}, f);
                    2 == e.type && (n.notice = 1), l(!0);
                    var r = new FormData;
                    r.append("body", JSON.stringify({
                        args: n,
                        token: Jr("vibebp").getToken()
                    })), h.length && h.map(function(e, t) {
                        r.append("files_" + t, e)
                    }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/send"), {
                        method: "post",
                        body: r
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        l(!1), e.update(t, f), y([]), E(""), w(Sr({}, f, {
                            content: "",
                            subject: ""
                        }))
                    })
                }
            };
            return wp.element.createElement("div", {
                className: "newmessage_form"
            }, e.recipients || 2 == e.type ? "" : wp.element.createElement("div", {
                className: "recipients"
            }, wp.element.createElement("label", null, window.vibebp.translations.recipients), wp.element.createElement("div", {
                className: "recipients_list"
            }, wp.element.createElement("div", {
                className: "recipient_items"
            }, f.recipients.map(function(e) {
                return wp.element.createElement($n, {
                    type: "member",
                    click: function() {
                        var t = Sr({}, f);
                        t.recipients.splice(t.recipients.indexOf(e), 1), w(t)
                    },
                    id: {
                        user_id: e
                    }
                })
            })), wp.element.createElement("div", {
                className: c ? "control is-loading" : "control"
            }, wp.element.createElement("input", {
                type: "text",
                value: n,
                placeholder: window.vibebp.translations.search_member,
                onChange: function(e) {
                    r(e.target.value)
                }
            }))), p.length ? wp.element.createElement("div", {
                className: "search_results"
            }, p.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "search_result user",
                    onClick: function() {
                        r("");
                        var n = jr(p),
                            a = Sr({}, f); - 1 === a.recipients.indexOf(e.id) && (a.recipients.push(e.id), w(a), n.splice(t, 1), u(n))
                    }
                }, wp.element.createElement("img", {
                    src: e.avatar
                }), wp.element.createElement("span", null, e.name))
            })) : ""), e.hasOwnProperty("thread_id") ? "" : wp.element.createElement("div", {
                className: "subject"
            }, wp.element.createElement("label", null, window.vibebp.translations.subject), wp.element.createElement("input", {
                type: "text",
                value: f.subject,
                onChange: function(e) {
                    var t = Sr({}, f);
                    t.subject = e.target.value, w(t)
                }
            })), wp.element.createElement("div", {
                className: "message_body",
                id: "message_body"
            }, wp.element.createElement("label", null, window.vibebp.translations.message), wp.element.createElement("div", {
                className: "message_editor"
            }, wp.element.createElement("textarea", {
                onChange: function(e) {
                    var t = Sr({}, f);
                    t.content = e.target.value, w(t)
                },
                onKeyDown: function(e) {
                    "Enter" === e.key && _()
                }
            }, f.content))), wp.element.createElement("div", {
                className: "message_actions"
            }, wp.element.createElement("div", {
                className: "message_Attachments"
            }, wp.element.createElement(Ir, null, wp.element.createElement("a", {
                className: "vicon vicon-clip",
                onClick: function() {
                    var e = jr(b);
                    e.push("attachment"), y(e)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-video-camera",
                onClick: function() {
                    var e = jr(b);
                    e.push("video"), y(e)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-image",
                onClick: function() {
                    var e = jr(b);
                    e.push("image"), y(e)
                }
            })), b.length ? b.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "message_attachment"
                }, "image" == e ? wp.element.createElement("a", {
                    className: "vicon vicon-image upload_type"
                }) : "video" == e ? wp.element.createElement("a", {
                    className: "vicon vicon-video-camera upload_type"
                }) : wp.element.createElement("a", {
                    className: "vicon vicon-clip upload_type"
                }), wp.element.createElement(ne, {
                    type: e,
                    update: function(n, r) {
                        var a = jr(h);
                        a[t] = new File([n[0]], n[0].name), E(a), w(Sr({}, f, {
                            meta: [].concat(jr(f.meta), [{
                                key: e,
                                value: t
                            }])
                        }))
                    }
                }), wp.element.createElement("a", {
                    className: "vicon vicon-close",
                    onClick: function() {
                        var e = jr(b);
                        e.splice(t, 1);
                        var n = jr(h);
                        n.splice(t, 1), E(n), y(e)
                    }
                }))
            }) : ""), wp.element.createElement("div", {
                className: "message_buttons"
            }, f.thread_id ? "" : wp.element.createElement("a", {
                className: "link",
                onClick: e.cancel
            }, window.vibebp.translations.cancel), wp.element.createElement("a", {
                className: i ? "button is-primary is-loading" : "button is-primary",
                onClick: _
            }, window.vibebp.translations.send_message))))
        };

    function qr(e) {
        return (qr = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function Fr(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Hr(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ur(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var zr = wp.element,
        Rr = (zr.createElement, zr.useState),
        Wr = zr.useEffect,
        Yr = zr.Fragment,
        Br = (zr.render, wp.data),
        Gr = (Br.dispatch, Br.select),
        Kr = function(e) {
            var t = Ur(Rr(e.message), 2),
                n = t[0],
                r = t[1],
                a = Ur(Rr(0), 2),
                i = a[0],
                l = a[1],
                o = Ur(Rr([]), 2),
                c = o[0],
                s = o[1];
            Wr(function() {
                var t = [],
                    n = Gr("vibebp").getUser();
                Object.keys(e.message.recipients).map(function(r) {
                    e.message.recipients[r].user_id === n.id ? e.message.recipients[r].unread_count && l(1) : t.push(e.message.recipients[r].user_id)
                }), s(t), r(e.message)
            }, [e.message]);
            var m = Gr("vibebp").getUser();
            return wp.element.createElement("div", {
                className: "fullmessage"
            }, wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("div", {
                className: "header_left"
            }, c.length ? c.map(function(e) {
                return wp.element.createElement($n, {
                    type: "user",
                    id: {
                        user_id: e
                    }
                })
            }) : ""), wp.element.createElement("div", {
                className: "header_right"
            }, wp.element.createElement("i", {
                className: "vicon vicon-arrow-left",
                onClick: function() {
                    e.show()
                }
            }), wp.element.createElement("a", {
                href: "#message_body",
                className: "vicon vicon-back-left"
            }), wp.element.createElement("i", {
                className: "vicon vicon-trash",
                onClick: function() {
                    return e.action("delete")
                }
            }))), wp.element.createElement("div", {
                className: "portal_body"
            }, n.messages.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: e.sender_id != m.id ? "notmine" : "mine"
                }, wp.element.createElement("div", {
                    className: "portal_message_wrapper"
                }, wp.element.createElement($n, {
                    type: "user",
                    id: {
                        user_id: e.sender_id
                    }
                }), wp.element.createElement("div", {
                    className: "portal_message"
                }, wp.element.createElement("div", {
                    className: "portal_title"
                }, 0 == t ? wp.element.createElement(Yr, null, wp.element.createElement("div", {
                    className: "message_subject"
                }, i ? wp.element.createElement("strong", null, e.subject) : wp.element.createElement("span", null, e.subject)), wp.element.createElement(he, {
                    time: e.date_sent
                })) : wp.element.createElement("div", {
                    className: "message_subject"
                }, i ? wp.element.createElement("strong", null, wp.element.createElement(he, {
                    time: e.date_sent
                })) : wp.element.createElement("span", null, wp.element.createElement(he, {
                    time: e.date_sent
                })))), wp.element.createElement("div", {
                    className: "portal_content"
                }, at(e.message) ? wp.element.createElement(dr, {
                    object: e.message
                }) : wp.element.createElement("div", {
                    className: "portal_content",
                    dangerouslySetInnerHTML: {
                        __html: e.message
                    }
                })), wp.element.createElement("div", {
                    className: "message_attachments"
                }, "object" === qr(e.meta) && null !== e.meta ? Object.keys(e.meta).map(function(t) {
                    return wp.element.createElement(Yr, null, e.meta[t].map(function(e) {
                        if (e.length > 3) {
                            if ("image" == t) return wp.element.createElement("img", {
                                src: e,
                                className: "activity_meta image"
                            });
                            if ("video" == t) return wp.element.createElement("video", {
                                src: e,
                                className: "activity_meta video"
                            });
                            if ("attachment" == t) return wp.element.createElement("a", {
                                href: e,
                                target: "_blank",
                                className: "vicon vicon-clip activity_meta"
                            })
                        }
                    }))
                }) : ""))), wp.element.createElement("div", null))
            }))), c.length ? wp.element.createElement(Mr, {
                thread_id: n.thread_id,
                update: function(e, t) {
                    if (e.status) {
                        var a = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? Fr(n, !0).forEach(function(t) {
                                    Hr(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Fr(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, n);
                        a.messages = e.data, r(a)
                    }
                },
                recipients: c
            }) : "")
        };

    function Qr(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function $r(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Vr(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? $r(n, !0).forEach(function(t) {
                Xr(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : $r(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Xr(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Zr(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ea = wp.element,
        ta = (ea.createElement, ea.useState),
        na = ea.useEffect,
        ra = ea.Fragment,
        aa = (ea.rende, ea.useContext),
        ia = wp.data,
        la = ia.dispatch,
        oa = ia.select,
        ca = function(e) {
            var t = aa(r),
                n = Zr(ta([]), 2),
                a = n[0],
                i = n[1],
                l = Zr(ta([]), 2),
                o = l[0],
                c = l[1],
                s = Zr(ta(!1), 2),
                m = s[0],
                p = s[1],
                u = Zr(ta({
                    filter: "unread",
                    sorter: "",
                    page: 1,
                    search: "",
                    label: ""
                }), 2),
                d = u[0],
                f = u[1],
                w = Zr(ta(!1), 2),
                v = w[0],
                b = w[1],
                y = Zr(ta([]), 2),
                g = y[0],
                h = y[1],
                E = Zr(ta(!0), 2),
                _ = E[0],
                O = E[1],
                N = Zr(ta(""), 2),
                j = N[0],
                k = N[1],
                S = Zr(ta(!1), 2),
                P = S[0],
                x = S[1],
                A = Zr(ta(!1), 2),
                C = A[0],
                T = A[1],
                I = Zr(ta(!1), 2),
                D = I[0],
                L = I[1],
                J = Zr(ta(0), 2),
                M = J[0],
                q = J[1],
                F = Zr(ta(!1), 2),
                H = F[0],
                U = F[1],
                z = Zr(ta({
                    text: "",
                    color: "#000"
                }), 2),
                R = z[0],
                W = z[1],
                Y = Zr(ta([]), 2),
                B = Y[0],
                G = Y[1],
                K = Zr(ta(window.vibebp.components.messages.actions), 2),
                Q = K[0],
                $ = (K[1], Zr(ta(!1), 2)),
                V = $[0],
                X = $[1];
            na(function() {
                var e = oa("vibebp").getMenu().filter(function(e) {
                    return "messages" === e.parent
                });
                e.map(function(t, n) {
                    "notices" == t.slug && e.splice(n, 1), -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && e[n].class.push("current-menu-item")
                }), c(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), rt(function() {
                var e = Vr({}, d);
                e.token = oa("vibebp").getToken(), O(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages), {
                    method: "post",
                    body: JSON.stringify(e)
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (O(!1), e.status)
                        if (C) {
                            var t = Qr(a);
                            e.data.threads.map(function(e) {
                                t.push(e)
                            }), i(t), T(!1), t.length < e.data.total ? x(!0) : x(!1)
                        } else i(e.data.threads), e.data.threads.length < e.data.total ? x(!0) : x(!1);
                    else i([])
                })
            }, 500, [d]), na(function() {
                fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/labels"), {
                    method: "post",
                    body: JSON.stringify({
                        token: oa("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && Array.isArray(e.labels) && e.labels.length && (G(e.labels), t.update("messageLabels", e.labels))
                })
            }, [d]);
            var Z = function(e, t) {
                    p(!1);
                    var n = Qr(a);
                    if (!Array.isArray(e)) {
                        var r = [];
                        r.push(e), e = r
                    }
                    if ("star" === t || "unstar" === t) {
                        var l = [];
                        e.map(function(e, t) {
                            X(e), n[n.findIndex(function(t) {
                                return t.thread_id === e
                            })].messages.map(function(e, t) {
                                l.push(e.id)
                            })
                        }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                            method: "post",
                            body: JSON.stringify({
                                id: l,
                                action: t,
                                token: oa("vibebp").getToken()
                            })
                        }).then(function(e) {
                            return e.json()
                        }).then(function(r) {
                            X(!1), r.status && ("unstar" === t && e.map(function(e, t) {
                                n[n.findIndex(function(t) {
                                    return t.thread_id === e
                                })].star = 0
                            }), "star" === t && e.map(function(e, t) {
                                n[n.findIndex(function(t) {
                                    return t.thread_id === e
                                })].star = 1
                            }))
                        })
                    }
                    "read" === t && (e.map(function(e, t) {
                        n[n.findIndex(function(t) {
                            return t.thread_id === e
                        })].unread_count = 0
                    }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                        method: "post",
                        body: JSON.stringify({
                            id: e,
                            action: t,
                            token: oa("vibebp").getToken()
                        })
                    })), "unread" === t && (e.map(function(e, t) {
                        n[n.findIndex(function(t) {
                            return t.thread_id === e
                        })].unread_count++
                    }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                        method: "post",
                        body: JSON.stringify({
                            id: e,
                            action: t,
                            token: oa("vibebp").getToken()
                        })
                    })), "delete" === t && (e.map(function(e, t) {
                        n.splice(n.findIndex(function(t) {
                            return t.thread_id === e
                        }), 1)
                    }), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                        method: "post",
                        body: JSON.stringify({
                            id: e,
                            action: t,
                            token: oa("vibebp").getToken()
                        })
                    })), i(n)
                },
                ee = function(e) {
                    var t = Vr({}, d);
                    t.label === e.slug ? t.label = "" : t.label = e.slug, f(t)
                },
                te = function(e) {
                    return !1 !== M && M === e ? "message_block active" : "message_block"
                };
            return wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.messages.label), wp.element.createElement("a", {
                className: "button is-primary new_mail",
                onClick: function() {
                    L(1)
                }
            }, window.vibebp.translations.new_message), o.map(function(e, t) {
                var n = e.class.join(" ") + " " + e.css_id;
                if ("compose" !== e.css_id) return wp.element.createElement("a", {
                    className: n,
                    onClick: function(n) {
                        var r = Vr({}, d);
                        r.filter = e.css_id, r.page = 1, q(!1), L(!1), d.css_id !== r.filter && f(r);
                        var a = Qr(o),
                            i = a.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        a[i].class.splice(a[i].class.indexOf("current-menu-item"), 1), a[t].class.push("current-menu-item"), b(!1), h([]), k(""), c(a)
                    }
                }, e.name)
            }), wp.element.createElement("div", {
                className: "labels"
            }, wp.element.createElement("div", {
                class: "labels_title"
            }, wp.element.createElement("span", null, window.vibebp.translations.labels), wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    U(!H)
                }
            }, window.vibebp.translations.add_new)), H ? wp.element.createElement("div", {
                className: "newlabel_form"
            }, wp.element.createElement("input", {
                type: "text",
                value: R.text,
                onChange: function(e) {
                    var t = Vr({}, R);
                    t.text = e.target.value, W(t)
                }
            }), wp.element.createElement("label", {
                style: {
                    background: R.color
                }
            }, wp.element.createElement("input", {
                type: "color",
                onChange: function(e) {
                    var t = Vr({}, R);
                    t.color = e.target.value, W(t)
                }
            })), wp.element.createElement("a", {
                className: "button is-primary vicon vicon-plus",
                onClick: function() {
                    U(!1), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/label/add"), {
                        method: "post",
                        body: JSON.stringify(Vr({}, R, {
                            token: oa("vibebp").getToken()
                        }))
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        if (e.status) {
                            if (e.labels.length) {
                                var n = Qr(B);
                                e.labels.map(function(e) {
                                    -1 == n.findIndex(function(t) {
                                        return t.slug == e.slug
                                    }) && n.push(e)
                                }), G(e.labels)
                            }
                            t.update("messageLabels", e.labels)
                        }
                        e.hasOwnProperty("message") && la("vibebp").addNotification({
                            text: e.message
                        })
                    })
                }
            })) : "", B && B.length ? wp.element.createElement("ul", {
                className: "message_labels"
            }, B.map(function(e, n) {
                var r = "";
                return d.label == e.slug && (r = "active"), wp.element.createElement("li", {
                    className: r
                }, wp.element.createElement("label", null, wp.element.createElement("strong", {
                    onClick: function() {
                        return ee(e)
                    }
                }, wp.element.createElement("span", {
                    style: {
                        borderColor: e.color
                    }
                }), e.name), wp.element.createElement("span", {
                    className: "vicon vicon-trash",
                    onClick: function() {
                        return function(e) {
                            var n = Qr(B);
                            n.splice(e, 1), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/label/remove"), {
                                method: "post",
                                body: JSON.stringify({
                                    slug: B[e].slug,
                                    token: oa("vibebp").getToken()
                                })
                            }).then(function(e) {
                                return e.json()
                            }).then(function(e) {}), G(n), t.update("messageLabels", n)
                        }(n)
                    }
                })), wp.element.createElement("span", {
                    onClick: function() {
                        return ee(e)
                    }
                }, e.count))
            })) : ""))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, wp.element.createElement("div", {
                className: "message_left_right"
            }, wp.element.createElement("div", {
                className: "message_list_left"
            }, wp.element.createElement("div", {
                className: "message_list_head"
            }, v || g.length ? "" : wp.element.createElement(ra, null, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                value: d.search,
                placeholder: window.vibebp.translations.search_text,
                onChange: function(e) {
                    var t = Vr({}, d);
                    t.search = e.target.value, f(t)
                }
            })), wp.element.createElement("select", {
                onChange: function(e) {
                    var t = Vr({}, d);
                    t.sorter = e.target.value, f(t)
                }
            }, Object.keys(window.vibebp.components.messages.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.messages.sorters[e])
            }))), wp.element.createElement("div", {
                className: "checkbox"
            }, wp.element.createElement("input", {
                id: "selectall",
                type: "checkbox",
                checked: v ? "checked" : "",
                onClick: function() {
                    v ? b(!1) : (b(!0), h([]))
                }
            }), wp.element.createElement("label", {
                for: "selectall"
            })), v || g.length ? wp.element.createElement("div", {
                className: "bulk_actions"
            }, wp.element.createElement("select", {
                onChange: function(e) {
                    k(e.target.value)
                }
            }, wp.element.createElement("option", null, window.vibebp.translations.selectaction), Object.keys(Q).map(function(e) {
                if (e !== d.filter) return wp.element.createElement("option", {
                    value: e
                }, Q[e])
            })), wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    var e = Qr(a),
                        t = [];
                    j && (v ? e.map(function(e, n) {
                        t.push(e.thread_id)
                    }) : g.length && e.map(function(e, n) {
                        g.indexOf(e.thread_id) > -1 && t.push(e.thread_id)
                    }), Z(t, j))
                }
            }, window.vibebp.translations.apply)) : ""), wp.element.createElement("div", {
                className: "messages"
            }, a.length || _ ? wp.element.createElement(ra, null, _ ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : a.length ? a.map(function(e, n) {
                var r = "vicon vicon-star";
                return r = V == e.thread_id ? "vicon vicon-more" : "vicon vicon-star", e.star && (r += " filled"), wp.element.createElement("div", {
                    className: te(n)
                }, wp.element.createElement("div", {
                    className: "message_avatars"
                }, Object.keys(e.sender_ids).length ? Object.keys(e.sender_ids).map(function(t, n) {
                    return Object.keys(e.sender_ids) > 3 ? n < 3 ? wp.element.createElement($n, {
                        type: "user",
                        id: {
                            user_id: t
                        }
                    }) : void 0 : wp.element.createElement($n, {
                        type: "user",
                        id: {
                            user_id: t
                        }
                    })
                }) : "", Object.keys(e.sender_ids).length > 3 ? wp.element.createElement("span", null, "+" + (Object.keys(e.sender_ids).length - 3) + " " + window.vibebp.translations.more) : ""), wp.element.createElement("div", {
                    className: "message_block_main"
                }, wp.element.createElement("div", {
                    className: "message_block_head"
                }, wp.element.createElement(he, {
                    time: e.last_message_date
                }), wp.element.createElement("div", null, wp.element.createElement("div", {
                    className: "checkbox"
                }, wp.element.createElement("input", {
                    type: "checkbox",
                    onClick: function() {
                        var t = Qr(g);
                        v && (b(!1), a.map(function(e) {
                            t.push(e.thread_id)
                        })), -1 === g.indexOf(e.thread_id) ? (t.push(e.thread_id), h(t)) : (t.splice(g.indexOf(e.thread_id), 1), h(t))
                    },
                    checked: v || -1 !== g.indexOf(e.thread_id) ? "checked" : "",
                    id: e.thread_id
                }), wp.element.createElement("label", {
                    for: e.thread_id
                })), wp.element.createElement("a", {
                    onClick: function() {
                        e.star ? Z(e.thread_id, "unstar") : Z(e.thread_id, "star")
                    },
                    className: r
                }), wp.element.createElement("a", {
                    className: "vicon vicon-more rotate90",
                    onClick: function() {
                        p(!m && e.thread_id)
                    }
                }), wp.element.createElement(ra, null, m === e.thread_id ? wp.element.createElement("ul", {
                    className: "target_menu"
                }, Object.keys(Q).map(function(t) {
                    if ("unread" !== t && "read" !== t && "star" !== t && "unstar" !== t && "remove_label" !== t || "unread" === t && !e.unread_count || "read" === t && e.unread_count || "unstar" === t && e.star || "star" === t && !e.star) return wp.element.createElement("li", {
                        value: t,
                        onClick: function() {
                            Z(e.thread_id, t)
                        }
                    }, Q[t])
                })) : ""))), wp.element.createElement(Nr, {
                    message: e,
                    labels: B,
                    updateLabels: function(e, n) {
                        ! function(e, n) {
                            var r = Qr(B);
                            n ? r[r.findIndex(function(t) {
                                return t.slug === e
                            })].count++ : r[r.findIndex(function(t) {
                                return t.slug === e
                            })].count--, G(r), t.update("messageLabels", r)
                        }(e, n)
                    },
                    show: function() {
                        q(n)
                    }
                })))
            }) : "", P ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = Vr({}, d);
                    e.page += 1, f(e), T(!0)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_messages_found))), wp.element.createElement("div", {
                className: "message_main"
            }, D ? wp.element.createElement(Mr, {
                type: D,
                cancel: function() {
                    L(!1)
                },
                update: function(e, t) {
                    var n = Qr(a);
                    if (e.status) {
                        var r = {};
                        t.recipients.map(function(t) {
                            r[1] = {
                                user_id: t,
                                unread_count: 1
                            }, r[2] = {
                                user_id: e.data[0].sender_id,
                                unread_count: 0
                            }
                        });
                        var l = {
                            thread_id: e.data[0].thread_id,
                            last_message_date: e.data[0].date_sent,
                            last_message_subject: e.data[0].subject,
                            last_message_content: e.data[0].message,
                            star: 0,
                            recipients: r,
                            sender_ids: {
                                0: e.data[0].sender_id
                            },
                            messages: e.data,
                            unread_count: 0
                        };
                        n.unshift(l), i(n), q(0), L(!1)
                    }
                }
            }) : !_ && a.length && !1 !== M ? wp.element.createElement(Kr, {
                message: a[M],
                show: function() {
                    q(!1)
                },
                action: function(e) {
                    return function(e, t) {
                        "delete" == t && fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.messages, "/actions"), {
                            method: "post",
                            body: JSON.stringify({
                                id: a[e].thread_id,
                                action: "delete",
                                token: oa("vibebp").getToken()
                            })
                        }).then(function(e) {
                            return e.json()
                        }).then(function(t) {
                            var n = Qr(a);
                            n.splice(e, 1), i(n), q(!1), t.hasOwnProperty("message") && la("vibebp").addNotification({
                                text: t.message,
                                icon: "vicon vicon-save"
                            })
                        })
                    }(M, e)
                }
            }) : ""))))
        };

    function sa(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function ma(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? sa(n, !0).forEach(function(t) {
                pa(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : sa(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function pa(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function ua(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var da = wp.element,
        fa = (da.createElement, da.useState),
        wa = da.useEffect,
        va = da.Fragment,
        ba = (da.render, wp.data),
        ya = ba.dispatch,
        ga = ba.select,
        ha = function(e) {
            var t = ua(fa({
                    unfriend: !1,
                    accept: !1,
                    reject: !1,
                    cancel: !1,
                    follow: !1,
                    unfollow: !1
                }), 2),
                n = t[0],
                r = t[1],
                a = ua(fa(!1), 2),
                i = (a[0], a[1]),
                l = ua(fa(e.member), 2),
                o = l[0],
                c = l[1],
                s = ua(fa(!1), 2);
            s[0], s[1];
            wa(function() {
                c(e.member)
            }, [e.member]);
            var m = function(t) {
                e.action && e.action(t);
                var a = ma({}, n);
                a[t] = !0, r(a), fetch("".concat(window.vibebp.api.url, "/followers/action"), {
                    method: "post",
                    body: JSON.stringify({
                        action: t,
                        user: o,
                        token: ga("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    var a = ma({}, n);
                    a[t] = !1, r(a), e.status && ("follow" === t && (c(ma({}, o, {
                        is_following: !0
                    })), ya("vibebp").addNotification({
                        message: e.message
                    }), ya("vibebp").sendRealTimeNotification(e.rtm.user_id, e.rtm.message)), "unfollow" === t && (c(ma({}, o, {
                        is_following: !1
                    })), ya("vibebp").addNotification({
                        message: e.message
                    }), ya("vibebp").sendRealTimeNotification(e.rtm.user_id, e.rtm.message)))
                })
            };
            return wp.element.createElement("div", {
                className: "membercard",
                onClick: function() {
                    i(!0)
                }
            }, wp.element.createElement("img", {
                src: o.avatar
            }), wp.element.createElement("div", {
                className: "member_details"
            }, wp.element.createElement("strong", null, o.display_name ? o.display_name : o.name ? o.name : ""), wp.element.createElement(va, null, o.hasOwnProperty("is_admin") ? o.is_admin ? wp.element.createElement("span", {
                className: "is-highlight is-admin"
            }, window.vibebp.translations.admin) : o.is_mod ? wp.element.createElement("span", {
                className: "is-highlight is-mod"
            }, window.vibebp.translations.mod) : "" : ""), wp.element.createElement(va, null, o.hasOwnProperty("latest_update") && o.latest_update ? wp.element.createElement("span", null, o.latest_update.content) : ""), wp.element.createElement("div", {
                className: "request_actions"
            }, o.hasOwnProperty("is_friend") ? wp.element.createElement("a", {
                className: n.unfriend ? "button is-warning is-small vicon vicon-na is-loading" : "button is-warning is-small vicon vicon-na",
                onClick: e.unfriend
            }) : o.hasOwnProperty("is_friend_request") ? wp.element.createElement(va, null, wp.element.createElement("a", {
                className: n.accept ? "button is-success is-small vicon vicon-face-smile is-loading" : "button is-success is-small vicon vicon-face-smile",
                onClick: function() {
                    return e.action("accept")
                }
            }), wp.element.createElement("a", {
                className: n.reject ? "button is-warning is-small vicon vicon-face-sad is-loading" : "button is-warning is-small vicon vicon-face-sad",
                onClick: function() {
                    return e.action("reject")
                }
            })) : o.hasOwnProperty("is_my_friend_request") ? wp.element.createElement(va, null, wp.element.createElement("a", {
                className: n.cancel ? "button is-warning is-small vicon vicon-na is-loading" : "button is-warning is-small vicon vicon-na",
                onClick: function() {
                    return e.action("cancel")
                }
            })) : "", window.vibebp.settings.followers ? o.hasOwnProperty("is_following") && o.is_following ? wp.element.createElement("a", {
                className: n.unfollow ? "button is-info is-small vicon vicon-thumb-down is-loading" : "button is-info is-small vicon vicon-thumb-down",
                onClick: function() {
                    return m("unfollow")
                }
            }) : wp.element.createElement("a", {
                className: n.follow ? "button is-info is-small vicon vicon-thumb-up is-loading" : "button is-info is-small vicon vicon-thumb-up",
                onClick: function() {
                    return m("follow")
                }
            }) : "")))
        };

    function Ea(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function _a(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Oa(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? _a(n, !0).forEach(function(t) {
                Na(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : _a(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Na(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function ja(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ka = wp.element,
        Sa = (ka.createElement, ka.useState),
        Pa = ka.useEffect,
        xa = (ka.Fragment, ka.render, wp.data),
        Aa = (xa.dispatch, xa.select),
        Ca = function(e) {
            var t = ja(Sa(!1), 2),
                n = t[0],
                r = t[1],
                a = ja(Sa({
                    page: 1,
                    search: "",
                    sort: "active"
                }), 2),
                i = a[0],
                l = a[1],
                o = ja(Sa([]), 2),
                c = o[0],
                s = o[1],
                m = ja(Sa(!1), 2),
                p = m[0],
                u = m[1],
                d = ja(Sa(!1), 2),
                f = d[0],
                w = d[1];
            Pa(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.friends, "/"), {
                    method: "post",
                    body: JSON.stringify(Oa({}, i, {
                        token: Aa("vibebp").getToken()
                    }))
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (r(!1), e.status)
                        if (p) {
                            u(!1);
                            var t = Ea(c);
                            e.data.users.map(function(e) {
                                t.push(e)
                            }), s(t), t.length < e.data.total ? w(!0) : w(!1)
                        } else s(e.data.users), e.data.users.length < e.data.total ? w(!0) : w(!1)
                })
            }, [i]);
            var v = function(e) {
                var t = Ea(c);
                t.splice(c.findIndex(function(t) {
                    return t.id === e.id
                }), 1), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.friends, "/removefriendship"), {
                    method: "post",
                    body: JSON.stringify({
                        friend_userid: e.id,
                        token: Aa("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {}), s(t)
            };
            return wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("div", {
                className: "header_links"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.search_text,
                value: i.search,
                onChange: function(e) {
                    var t = Oa({}, i);
                    t.search = e.target.value, t.page = 1, l(t)
                }
            }))), wp.element.createElement("div", {
                className: "header_extras"
            }, wp.element.createElement("select", {
                onChange: function(e) {
                    l(Oa({}, i, {
                        sort: e.target.value
                    }))
                },
                value: i.sort
            }, Object.keys(window.vibebp.components.friends.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.friends.sorters[e])
            })))), wp.element.createElement("div", {
                className: "portal_body"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : c.length ? wp.element.createElement("div", {
                className: "friend_list member_list"
            }, c.map(function(e) {
                return wp.element.createElement(ha, {
                    member: Oa({}, e, {
                        is_friend: 1
                    }),
                    unfriend: v
                })
            }), f ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = Oa({}, i);
                    e.page = i.page + 1, u(!0), l(e)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_friends_found)))
        };

    function Ta(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Ia(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Da(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Ia(n, !0).forEach(function(t) {
                La(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Ia(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function La(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ja(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ma = wp.element,
        qa = (Ma.createElement, Ma.useState),
        Fa = Ma.useEffect,
        Ha = (Ma.Fragment, Ma.render, wp.data),
        Ua = (Ha.dispatch, Ha.select),
        za = function(e) {
            var t = Ja(qa(!1), 2),
                n = t[0],
                r = t[1],
                a = Ja(qa({
                    page: 1,
                    requester: 0,
                    sort: "DESC",
                    reload: 0
                }), 2),
                i = a[0],
                l = a[1],
                o = Ja(qa([]), 2),
                c = o[0],
                s = o[1],
                m = Ja(qa(!1), 2),
                p = m[0],
                u = m[1],
                d = Ja(qa(!1), 2),
                f = d[0],
                w = d[1],
                v = Ja(qa(!1), 2),
                b = v[0],
                y = v[1],
                g = Ja(qa(!1), 2),
                h = g[0],
                E = g[1],
                _ = Ja(qa([]), 2),
                O = _[0],
                N = _[1],
                j = Ja(qa(""), 2),
                k = j[0],
                S = j[1],
                P = Ja(qa([]), 2),
                x = P[0],
                A = P[1];
            Fa(function() {
                k.length > 4 && (E(!0), fetch("".concat(window.vibebp.api.url, "/search"), {
                    method: "post",
                    body: JSON.stringify({
                        search: k,
                        type: "user",
                        token: Ua("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    E(!1), e.status && Array.isArray(e.results) && (e.results.map(function(e) {
                        localforage.setItem("user_" + e.id, JSON.stringify(e))
                    }), A(e.results))
                }))
            }, [k]), Fa(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.friends, "/requests"), {
                    method: "post",
                    body: JSON.stringify(Da({}, i, {
                        token: Ua("vibebp").getToken()
                    }))
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (r(!1), w(!1), e.status)
                        if (p) {
                            if (u(!1), e.data.length) {
                                var t = Ta(c);
                                e.data.map(function(e) {
                                    t.push(e)
                                }), s(t), 20 === e.data.length && w(!0)
                            }
                        } else s(e.data), 20 === e.data.length && w(!0)
                })
            }, [i]);
            var C = function(e, t) {
                var n = c.findIndex(function(t) {
                    return t.friendship_id === e
                });
                fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.friends, "/action"), {
                    method: "post",
                    body: JSON.stringify({
                        friendship_id: e,
                        action: t,
                        friend_id: c[n].user.ID,
                        token: Ua("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {});
                var r = Ta(c);
                r.splice(n, 1), s(r)
            };
            return wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("div", {
                className: "header_links"
            }, wp.element.createElement("a", {
                onClick: function() {
                    l(Da({}, i, {
                        requester: 0
                    }))
                },
                className: i.requester ? "" : "active"
            }, window.vibebp.translations.requestee), wp.element.createElement("a", {
                onClick: function() {
                    l(Da({}, i, {
                        requester: 1
                    }))
                },
                className: i.requester ? "active" : ""
            }, window.vibebp.translations.requester), wp.element.createElement("a", {
                onClick: function() {
                    y(!0)
                },
                className: "button is-primary"
            }, window.vibebp.translations.add_friend)), wp.element.createElement("div", {
                className: "header_extras"
            }, wp.element.createElement("select", {
                onChange: function(e) {
                    l(Da({}, i, {
                        sort: e.target.value
                    }))
                },
                value: i.sort
            }, Object.keys(window.vibebp.components.friends.requests_sorter).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.friends.requests_sorter[e])
            })))), b ? wp.element.createElement("div", {
                className: "recipients"
            }, wp.element.createElement("div", {
                className: "recipients_list"
            }, wp.element.createElement("div", {
                className: "recipient_items"
            }, O.map(function(e) {
                return wp.element.createElement($n, {
                    type: "user",
                    click: function() {
                        var t = Ta(O);
                        t.splice(t.indexOf(e), 1), N(t)
                    },
                    id: {
                        user_id: e
                    }
                })
            }), O.length ? wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.friends, "/addfriendship"), {
                        method: "post",
                        body: JSON.stringify({
                            friends: O,
                            token: Ua("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        l(Da({}, i, {
                            reload: 1
                        })), N([])
                    }), y(!1)
                }
            }, window.vibebp.translations.send_friend_request) : ""), wp.element.createElement("div", {
                className: h ? "control is-loading" : "control"
            }, wp.element.createElement("input", {
                type: "text",
                value: k,
                placeholder: window.vibebp.translations.search_member,
                onChange: function(e) {
                    S(e.target.value)
                }
            }))), x.length ? wp.element.createElement("div", {
                className: "search_results"
            }, x.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "search_result user",
                    onClick: function() {
                        S("");
                        var n = Ta(x),
                            r = Ta(O); - 1 === r.indexOf(e.id) && (r.push(e.id), N(r), n.splice(t, 1), A(n))
                    }
                }, wp.element.createElement("img", {
                    src: e.avatar
                }), wp.element.createElement("span", null, e.name))
            })) : "") : "", wp.element.createElement("div", {
                className: "portal_body"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : c.length ? wp.element.createElement("div", {
                className: "friend_list member_list"
            }, c.map(function(e) {
                return i.requester ? wp.element.createElement(ha, {
                    member: Da({}, e.user, {
                        is_my_friend_request: 1
                    }),
                    action: function(t) {
                        return C(e.friendship_id, t)
                    }
                }) : wp.element.createElement(ha, {
                    member: Da({}, e.user, {
                        is_friend_request: 1
                    }),
                    action: function(t) {
                        return C(e.friendship_id, t)
                    }
                })
            }), f ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = Da({}, i);
                    e.page = i.page + 1, u(!0), l(e)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_requests_found)))
        };

    function Ra(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Wa(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Ya(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ba(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ga = wp.element,
        Ka = (Ga.createElement, Ga.useState),
        Qa = Ga.useEffect,
        $a = (Ga.Fragment, Ga.render, wp.data),
        Va = ($a.dispatch, $a.select),
        Xa = function(e) {
            var t = Ba(Ka({}), 2),
                n = t[0],
                r = t[1],
                a = Ba(Ka([]), 2),
                i = a[0],
                l = a[1],
                o = Ba(Ka(""), 2),
                c = o[0],
                s = o[1];
            return Qa(function() {
                var e = Va("vibebp").getMenu().filter(function(e) {
                    return "friends" === e.parent
                });
                e.map(function(t, n) {
                    -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && e[n].class.push("current-menu-item")
                }), l(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.friends.label), i.map(function(e, t) {
                var a = e.class.join(" ") + " " + e.css_id;
                if ("compose" !== e.css_id) return wp.element.createElement("a", {
                    className: a,
                    onClick: function(a) {
                        var o = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? Wa(n, !0).forEach(function(t) {
                                    Ya(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Wa(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, n);
                        o.filter = e.css_id, o.page = 1, n.css_id !== o.filter && r(o), s(e.css_id);
                        var c = Ra(i),
                            m = c.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        c[m].class.splice(c[m].class.indexOf("current-menu-item"), 1), c[t].class.push("current-menu-item"), l(c)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, "requests" === c ? wp.element.createElement(za, null) : wp.element.createElement(Ca, null)))
        };

    function Za(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function ei(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Za(n, !0).forEach(function(t) {
                ti(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Za(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function ti(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function ni(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ri = wp.element,
        ai = (ri.createElement, ri.useState),
        ii = (ri.useEffect, ri.Fragment, ri.render, wp.data),
        li = (ii.dispatch, ii.select),
        oi = function(e) {
            var t = ni(ai(!1), 2),
                n = t[0],
                r = t[1],
                a = ni(ai({
                    page: 1,
                    search: "",
                    orderby: "active"
                }), 2),
                i = a[0],
                l = a[1],
                o = ni(ai([]), 2),
                c = o[0],
                s = o[1];
            return rt(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/followers"), {
                    method: "post",
                    body: JSON.stringify(ei({}, i, {
                        token: li("vibebp").getToken()
                    }))
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && s(e.followers)
                })
            }, 500, [i]), wp.element.createElement("div", {
                className: "vibebp_followers_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_main_head vibebp_form"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.search_member,
                value: i.search,
                onChange: function(e) {
                    return l(ei({}, i, {
                        search: e.target.value
                    }))
                }
            })), wp.element.createElement("select", {
                onChange: function(e) {
                    return l(ei({}, i, {
                        orderby: e.target.value
                    }))
                }
            }, Object.keys(window.vibebp.components.followers.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.followers.sorters[e])
            }))), wp.element.createElement("div", {
                className: "vibebp_followers"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : c.length ? c.map(function(e) {
                return wp.element.createElement(ha, {
                    member: e
                })
            }) : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_followers)))
        };

    function ci(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function si(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function mi(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? si(n, !0).forEach(function(t) {
                pi(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : si(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function pi(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function ui(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var di = wp.element,
        fi = (di.createElement, di.useState),
        wi = (di.useEffect, di.Fragment, di.render, wp.data),
        vi = wi.dispatch,
        bi = wi.select,
        yi = function(e) {
            var t = ui(fi(!1), 2),
                n = t[0],
                r = t[1],
                a = ui(fi({
                    page: 1,
                    search: "",
                    orderby: "active"
                }), 2),
                i = a[0],
                l = a[1],
                o = ui(fi([]), 2),
                c = o[0],
                s = o[1],
                m = ui(fi(!1), 2),
                p = m[0],
                u = m[1],
                d = ui(fi([]), 2),
                f = d[0],
                w = d[1],
                v = ui(fi(""), 2),
                b = v[0],
                y = v[1],
                g = ui(fi([]), 2),
                h = g[0],
                E = g[1],
                _ = ui(fi(!1), 2),
                O = (_[0], _[1]),
                N = ui(fi(!1), 2),
                j = (N[0], N[1]);
            rt(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/following"), {
                    method: "post",
                    body: JSON.stringify(mi({}, i, {
                        token: bi("vibebp").getToken()
                    }))
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && s(e.following)
                })
            }, 500, [i]), rt(function() {
                b.length > 4 && (O(!0), fetch("".concat(window.vibebp.api.url, "/search"), {
                    method: "post",
                    body: JSON.stringify({
                        search: b,
                        type: "user",
                        token: bi("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    O(!1), e.status && Array.isArray(e.results) && (e.results.map(function(e) {
                        localforage.setItem("user_" + e.id, JSON.stringify(e))
                    }), E(e.results))
                }))
            }, 500, [b]);
            return wp.element.createElement("div", {
                className: "vibebp_followers_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_followers_header vibebp_form"
            }, wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.search_member,
                value: i.search,
                onChange: function(e) {
                    return l(mi({}, i, {
                        search: e.target.value
                    }))
                }
            })), p ? wp.element.createElement("div", {
                className: "add_member_wrapper recipients"
            }, f.length ? wp.element.createElement("div", {
                className: "add_following_wrapper"
            }, f.map(function(e, t) {
                return wp.element.createElement($n, {
                    type: "user",
                    click: function() {
                        var e = ci(f);
                        e.splice(t, 1), w(e)
                    },
                    id: {
                        user_id: e.id
                    }
                })
            }), wp.element.createElement("a", {
                className: "vicon vicon-plus button is-link",
                onClick: function() {
                    j(!0), fetch("".concat(window.vibebp.api.url, "/followers/action"), {
                        method: "post",
                        body: JSON.stringify({
                            followers: f,
                            action: "follow",
                            token: bi("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        if (j(!1), e.status) {
                            u(!1);
                            var t = ci(f);
                            t.map(function(e, n) {
                                t[n].is_following = 1
                            });
                            var n = [].concat(ci(c), ci(t));
                            s(n), e.hasOwnProperty("message") && e.message.length && e.message.map(function(e) {
                                vi("vibebp").addNotification({
                                    icon: "vicon vicon-thumb-up",
                                    message: e
                                })
                            }), e.hasOwnProperty("rtm") && e.rtm.length && e.rtm.map(function(e) {
                                vi("vibebp").sendRealTimeNotification(e.user_id, e.message)
                            })
                        } else e.hasOwnProperty("message") && vi("vibebp").addNotification({
                            text: e.message
                        })
                    })
                }
            })) : "", wp.element.createElement("input", {
                type: "text",
                placeholder: window.vibebp.translations.search_member,
                value: b,
                onChange: function(e) {
                    return y(e.target.value)
                }
            }), h.length ? wp.element.createElement("div", {
                className: "search_results"
            }, h.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "search_result user",
                    onClick: function() {
                        y("");
                        var n = ci(h),
                            r = ci(f); - 1 === r.indexOf(e) && (r.push(e), w(r), n.splice(t, 1), E(n))
                    }
                }, wp.element.createElement("img", {
                    src: e.avatar
                }), wp.element.createElement("span", null, e.name))
            })) : "") : wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    return u(!0)
                }
            }, window.vibebp.translations.follow_members)), wp.element.createElement("select", {
                onChange: function(e) {
                    return l(mi({}, i, {
                        orderby: e.target.value
                    }))
                }
            }, Object.keys(window.vibebp.components.followers.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.followers.sorters[e])
            }))), wp.element.createElement("div", {
                className: "vibebp_followers"
            }, n ? wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : c.length ? c.map(function(e) {
                return wp.element.createElement(ha, {
                    member: e
                })
            }) : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_following)))
        };

    function gi(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function hi(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Ei(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function _i(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Oi = wp.element,
        Ni = (Oi.createElement, Oi.useState),
        ji = Oi.useEffect,
        ki = (Oi.Fragment, Oi.render, wp.data),
        Si = (ki.dispatch, ki.select),
        Pi = function(e) {
            var t = _i(Ni({}), 2),
                n = t[0],
                r = t[1],
                a = _i(Ni([]), 2),
                i = a[0],
                l = a[1],
                o = _i(Ni(""), 2),
                c = o[0],
                s = o[1];
            return ji(function() {
                var e = Si("vibebp").getMenu().filter(function(e) {
                    return "followers" === e.parent
                });
                e.map(function(t, n) {
                    -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && e[n].class.push("current-menu-item")
                }), l(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.followers.label), i.map(function(e, t) {
                var a = e.class.join(" ") + " " + e.css_id;
                return wp.element.createElement("a", {
                    className: a,
                    onClick: function(a) {
                        var o = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? hi(n, !0).forEach(function(t) {
                                    Ei(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : hi(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, n);
                        o.filter = e.css_id, o.page = 1, n.css_id !== o.filter && r(o), s(e.css_id);
                        var c = gi(i),
                            m = c.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        c[m].class.splice(c[m].class.indexOf("current-menu-item"), 1), c[t].class.push("current-menu-item"), l(c)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, "following" === c ? wp.element.createElement(yi, null) : wp.element.createElement(oi, null)))
        };

    function xi(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Ai(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Ci(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Ai(n, !0).forEach(function(t) {
                Ti(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Ai(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Ti(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ii(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Di = wp.element,
        Li = (Di.createElement, Di.useState),
        Ji = Di.useEffect,
        Mi = Di.Fragment,
        qi = (Di.render, wp.data),
        Fi = qi.dispatch,
        Hi = qi.select,
        Ui = function(e) {
            var t = Ii(Li(!0), 2),
                n = t[0],
                r = t[1],
                a = Ii(Li({
                    component: "",
                    id: "",
                    search_terms: "",
                    type: "",
                    role: "",
                    page: 1
                }), 2),
                i = a[0],
                l = a[1],
                o = Ii(Li([]), 2),
                c = o[0],
                s = o[1],
                m = Ii(Li(!1), 2),
                p = m[0],
                u = m[1],
                d = Ii(Li(!1), 2),
                f = d[0],
                w = d[1],
                v = Ii(Li([]), 2),
                b = v[0],
                y = v[1],
                g = Ii(Li(""), 2),
                h = g[0],
                E = g[1],
                _ = Ii(Li([]), 2),
                O = _[0],
                N = _[1],
                j = Ii(Li([]), 2),
                k = j[0],
                S = j[1],
                P = Ii(Li({}), 2),
                x = P[0],
                A = P[1];
            Ji(function() {
                if (e.hasOwnProperty("type")) {
                    var t = Ci({}, i);
                    t.component = e.type, t.id = e.id, l(t)
                }
            }, [e.type, e.id]), rt(function() {
                h.length > 4 && fetch("".concat(window.vibebp.api.url, "/search"), {
                    method: "post",
                    body: JSON.stringify({
                        search: h,
                        type: "user",
                        token: Hi("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && Array.isArray(e.results) && (e.results.map(function(e) {
                        localforage.setItem("user_" + e.id, JSON.stringify(e))
                    }), N(e.results))
                })
            }, 500, [h]), Ji(function() {
                var t = Ci({}, i);
                t.token = Hi("vibebp").getToken();
                var n = Hi("vibebp").getUser();
                t.user_id = n.id, r(!0);
                var a = window.vibebp.api.endpoints.members;
                i.component !== window.vibebp.api.endpoints.members && (a = e.type + "/members/" + e.id), fetch("".concat(window.vibebp.api.url, "/").concat(a), {
                    method: "post",
                    body: JSON.stringify(t)
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && (A(e.meta), s(e.data.members))
                })
            }, [i]);
            return wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("div", {
                className: "header_links"
            }, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                value: i.search_terms,
                placeholder: window.vibebp.translations.search_member,
                onChange: function(e) {
                    var t = Ci({}, i);
                    t.search_terms = e.target.value, l(t)
                }
            }))), wp.element.createElement("div", {
                className: "header_extras"
            }, wp.element.createElement("select", {
                value: i.role,
                onChange: function(e) {
                    l(Ci({}, i, {
                        role: e.target.value
                    }))
                }
            }, Object.keys(window.vibebp.components[e.type].membertypes).map(function(t) {
                return wp.element.createElement("option", {
                    value: t
                }, window.vibebp.components[e.type].membertypes[t])
            })))), wp.element.createElement("div", {
                className: "portal_body"
            }, wp.element.createElement("div", {
                className: "members"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : c.length ? c.map(function(t) {
                return e.hasOwnProperty("type") ? wp.element.createElement("div", {
                    className: k.indexOf(t.ID) > -1 ? "selected" : "",
                    onClick: function() {
                        var e = xi(k);
                        k.indexOf(t.ID) > -1 ? e.splice(k.indexOf(t.ID), 1) : e.push(t.ID), S(e)
                    }
                }, wp.element.createElement(ha, {
                    member: t,
                    type: e.type,
                    id: e.id
                })) : wp.element.createElement("div", {
                    className: k.indexOf(t.ID) > -1 ? "selected" : ""
                }, wp.element.createElement(ha, {
                    member: t
                }))
            }) : "")), wp.element.createElement("div", {
                className: "portal_footer"
            }, "groups" === i.component ? p ? wp.element.createElement("div", {
                className: "recipients"
            }, wp.element.createElement("div", {
                className: "recipients_list"
            }, wp.element.createElement("div", {
                className: "recipient_items"
            }, b.length ? wp.element.createElement(Mi, null, b.map(function(e) {
                return wp.element.createElement($n, {
                    type: "user",
                    click: function() {
                        var t = xi(b);
                        t.splice(t.indexOf(e), 1), y(t)
                    },
                    id: {
                        user_id: e
                    }
                })
            }), wp.element.createElement("a", {
                className: f ? "is-loading button" : "button vicon vicon-control-forward",
                onClick: function() {
                    "invite" == p && (w(!0), fetch("".concat(window.vibebp.api.url, "/groups/invite_member/").concat(e.id, "/"), {
                        method: "post",
                        body: JSON.stringify({
                            invitees: b,
                            token: Hi("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        w(!1), r(!1), e.status && (u(!1), N([]), E([])), e.hasOwnProperty("message") && Fi("vibebp").addNotification({
                            text: e.message
                        });
                        var t = Ci({}, i);
                        t.page = 1, l(t)
                    })), "add" == p && (w(!0), fetch("".concat(window.vibebp.api.url, "/groups/join_group/").concat(e.id, "/"), {
                        method: "post",
                        body: JSON.stringify({
                            invitees: b,
                            token: Hi("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        w(!1), r(!1), e.status && (u(!1), N([]), E([])), e.hasOwnProperty("message") && Fi("vibebp").addNotification({
                            text: e.message
                        });
                        var t = Ci({}, i);
                        t.page = 1, l(t)
                    })), "requests" == p && (w(!0), fetch("".concat(window.vibebp.api.url, "/groups/requests/").concat(e.id, "/"), {
                        method: "post",
                        body: JSON.stringify({
                            invitees: b,
                            token: Hi("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        w(!1), r(!1), e.status && (u(!1), N([]), E([])), e.hasOwnProperty("message") && Fi("vibebp").addNotification({
                            text: e.message
                        });
                        var t = Ci({}, i);
                        t.page = 1, l(t)
                    }))
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-close",
                onClick: function() {
                    u(!1)
                }
            })) : ""), wp.element.createElement("div", {
                className: "vibebp_form"
            }, wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("input", {
                type: "text",
                value: h,
                placeholder: window.vibebp.translations.search_member,
                onChange: function(e) {
                    E(e.target.value)
                }
            })), wp.element.createElement("a", {
                className: "vicon vicon-close",
                onClick: function() {
                    u(!1)
                }
            }))), O.length ? wp.element.createElement("div", {
                className: "search_results"
            }, O.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "search_result user",
                    onClick: function() {
                        E("");
                        var n = xi(O),
                            r = xi(b); - 1 === r.indexOf(e.id) && (r.push(e.id), y(r), n.splice(t, 1), N(n))
                    }
                }, wp.element.createElement("img", {
                    src: e.avatar
                }), wp.element.createElement("span", null, e.name))
            })) : "") : wp.element.createElement("div", {
                className: "actions"
            }, !k.length && !p && x.hasOwnProperty("can_invite") && x.can_invite ? wp.element.createElement("a", {
                onClick: function() {
                    return u("invite")
                },
                className: "button is-primary"
            }, window.vibebp.translations.invite_members) : "", !p && x.hasOwnProperty("can_add_members") && x.can_add_members ? wp.element.createElement(Mi, null, k.length ? "" : wp.element.createElement("a", {
                onClick: function() {
                    return u("add")
                },
                className: "button is-info"
            }, window.vibebp.translations.add_members), k.length && x.member_actions ? wp.element.createElement("div", {
                className: "members_actions_block"
            }, wp.element.createElement("select", {
                onChange: function(t) {
                    k.length && e.memberActions(t.target.value, k).then(function() {
                        S([]), l(Ci({}, i))
                    })
                }
            }, wp.element.createElement("option", null, window.vibebp.translations.select_action), Object.keys(x.member_actions).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, x.member_actions[e])
            }))) : "") : "") : ""))
        };

    function zi(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Ri(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Wi(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Ri(n, !0).forEach(function(t) {
                Yi(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Ri(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Yi(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Bi(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Gi = wp.element,
        Ki = (Gi.createElement, Gi.useState),
        Qi = Gi.useEffect,
        $i = Gi.Fragment,
        Vi = (Gi.render, wp.data),
        Xi = (Vi.dispatch, Vi.select),
        Zi = function(e) {
            var t = Bi(Ki(!1), 2),
                n = t[0],
                r = t[1],
                a = Bi(Ki({
                    avatar: {
                        url: "",
                        cropdata: ""
                    },
                    name: "",
                    description: "",
                    status: "public",
                    invite_status: "members",
                    group_type: "",
                    invitees: [],
                    meta: []
                }), 2),
                i = a[0],
                l = a[1],
                o = Bi(Ki(""), 2),
                c = o[0],
                s = o[1],
                m = Bi(Ki(""), 2),
                p = m[0],
                u = m[1],
                d = Bi(Ki([]), 2),
                f = d[0],
                w = d[1],
                v = Bi(Ki(!1), 2),
                b = v[0],
                y = v[1],
                g = Bi(Ki(!0), 2),
                h = g[0],
                E = g[1],
                _ = Bi(Ki(!1), 2),
                O = _[0],
                N = _[1],
                j = Bi(Ki(!1), 2),
                k = j[0],
                S = j[1],
                P = Bi(Ki([]), 2),
                x = P[0],
                A = P[1];
            Qi(function() {
                if (e.hasOwnProperty("group")) {
                    var t = {
                        url: e.group.avatar,
                        cropdata: ""
                    };
                    e.group.avatar.length && E(!1), l(Wi({}, i, {
                        id: e.group.id,
                        name: e.group.name,
                        description: e.group.description,
                        status: e.group.status,
                        avatar: t
                    }))
                }
            }, []), rt(function() {
                window.helpdesk && k.length > 4 && (N(!0), fetch("".concat(window.helpdesk.api.url, "/bbp/forums"), {
                    method: "post",
                    body: JSON.stringify({
                        s: k,
                        token: Xi("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    N(!1), A(e.data)
                }))
            }, 500, [k]), rt(function() {
                p.length > 3 && (y(!0), fetch("".concat(window.vibebp.api.url, "/search"), {
                    method: "post",
                    body: JSON.stringify({
                        search: p,
                        type: "user",
                        token: Xi("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (y(!1), Array.isArray(e.results) && (e.results.map(function(e) {
                        localforage.setItem("user_" + e.id, JSON.stringify(e))
                    }), w(e.results)))
                }))
            }, 500, [p]);
            var C = "button is-fullwidth is-primary is-rounded";
            n && (C += " is-loading");
            var T = !0;
            return console.log(e), e.hasOwnProperty("meta") && e.meta.hasOwnProperty("can_invite") && !e.meta.can_invite && (T = !1), wp.element.createElement("div", {
                className: "vibebp_create_group create_form"
            }, wp.element.createElement("div", {
                className: "create_form_head"
            }, wp.element.createElement("div", {
                className: "left_side"
            }, wp.element.createElement("i", {
                className: "vicon vicon-arrow-left",
                onClick: function() {
                    e.newgroup(!1)
                }
            })), wp.element.createElement("div", {
                className: "right_side"
            })), wp.element.createElement("div", {
                className: "group_creation_steps"
            }, wp.element.createElement("div", {
                className: "group_step"
            }, wp.element.createElement("div", {
                className: "group_avatar"
            }, i.avatar.url.length && !h ? wp.element.createElement($i, null, wp.element.createElement("img", {
                src: i.avatar.url
            }), wp.element.createElement("div", {
                onClick: function() {
                    E(!0)
                },
                className: "vicon vicon-image"
            })) : wp.element.createElement($i, null, wp.element.createElement(ne, {
                type: "image",
                crop: "1",
                show: function() {
                    return E(!1)
                },
                update: function(e, t) {
                    s(e);
                    var n = Wi({}, i);
                    n.avatar.cropdata = t, l(n)
                }
            }), wp.element.createElement("div", {
                onClick: function() {
                    E(!1)
                },
                className: "vicon vicon-image"
            }))), wp.element.createElement("div", {
                className: "group_creation_step vibebp_form"
            }, wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.group_name), wp.element.createElement("input", {
                type: "text",
                value: i.name,
                onChange: function(e) {
                    l(Wi({}, i, {
                        name: e.target.value
                    }))
                }
            })), wp.element.createElement("div", {
                className: "group_description vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.group_description), wp.element.createElement("textarea", {
                onChange: function(e) {
                    l(Wi({}, i, {
                        description: e.target.value
                    }))
                },
                value: i.description
            })))), wp.element.createElement("div", {
                className: "group_step vibebp_form"
            }, Object.keys(window.vibebp.components.groups.type).length && window.vibebp.components.groups.hasOwnProperty("type") ? wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.group_type), wp.element.createElement("select", {
                onChange: function(e) {
                    l(Wi({}, i, {
                        group_type: e.target.value
                    }))
                },
                value: i.group_type
            }, wp.element.createElement("option", null, window.vibebp.translations.select_group_type), Object.keys(window.vibebp.components.groups.type).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.type[e])
            }))) : "", window.vibebp.components.groups.hasOwnProperty("forum") ? wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.set_group_forum), i.meta.findIndex(function(e) {
                return "forum_id" == e.meta_key
            }) > -1 ? wp.element.createElement("span", {
                onClick: function() {
                    var e = Wi({}, i);
                    e.meta.splice(i.meta.findIndex(function(e) {
                        return "forum_id" == e.meta_key
                    }), 1), l(e)
                }
            }, wp.element.createElement($n, {
                type: "forum",
                id: {
                    post_id: i.meta[i.meta.findIndex(function(e) {
                        return "forum_id" == e.meta_key
                    })].meta_value
                }
            })) : wp.element.createElement("div", {
                className: "search_forums"
            }, wp.element.createElement("div", {
                className: O ? "control is-loading" : "control"
            }, wp.element.createElement("input", {
                type: "text",
                value: k || "",
                placeholder: window.vibebp.translations.search_text,
                onChange: function(e) {
                    return S(e.target.value)
                }
            })), x.length ? wp.element.createElement("div", {
                className: "group_forums"
            }, x.map(function(e) {
                return wp.element.createElement("span", {
                    onClick: function() {
                        var t = Wi({}, i);
                        i.meta.findIndex(function(e) {
                            return "forum_id" == e.meta_key
                        }) > -1 && t.meta.splice(i.meta.findIndex(function(e) {
                            return "forum_id" == e.meta_key
                        }), 1), t.meta.push({
                            meta_key: "forum_id",
                            meta_value: e.id
                        }), l(t)
                    }
                }, e.title)
            })) : "")) : "", wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.group_status), wp.element.createElement("select", {
                onChange: function(e) {
                    l(Wi({}, i, {
                        status: e.target.value
                    }))
                },
                value: i.status
            }, Object.keys(window.vibebp.components.groups.status).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.status[e])
            }))), wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.group_invitations), wp.element.createElement("select", {
                onChange: function(e) {
                    l(Wi({}, i, {
                        invite_status: e.target.value
                    }))
                },
                value: i.invite_status
            }, Object.keys(window.vibebp.components.groups.invite_status).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.invite_status[e])
            })))), T ? wp.element.createElement("div", {
                className: "vibebp_form"
            }, wp.element.createElement("div", {
                className: "group_name vibebp_form_field"
            }, wp.element.createElement("div", {
                className: "recipients"
            }, wp.element.createElement("label", null, window.vibebp.translations.invite_members), wp.element.createElement("div", {
                className: "recipients_list"
            }, wp.element.createElement("div", {
                className: "recipient_items"
            }, i.invitees.map(function(e) {
                return wp.element.createElement($n, {
                    type: "user",
                    click: function() {
                        var t = Wi({}, i);
                        t.invitees.splice(t.invitees.indexOf(e), 1), l(t)
                    },
                    id: {
                        user_id: e
                    }
                })
            })), wp.element.createElement("div", {
                className: b ? "control is-loading" : "control"
            }, wp.element.createElement("input", {
                type: "text",
                value: p,
                placeholder: window.vibebp.translations.search_member,
                onChange: function(e) {
                    u(e.target.value)
                }
            }))), f.length ? wp.element.createElement("div", {
                className: "search_results"
            }, f.map(function(e, t) {
                return wp.element.createElement("div", {
                    className: "search_result user",
                    onClick: function() {
                        u("");
                        var n = zi(f),
                            r = Wi({}, i); - 1 === r.invitees.indexOf(e.id) && (r.invitees.push(e.id), l(r), n.splice(t, 1), w(n))
                    }
                }, wp.element.createElement("img", {
                    src: e.avatar
                }), wp.element.createElement("span", null, e.name))
            })) : ""))) : "", wp.element.createElement("br", null), wp.element.createElement("a", {
                onClick: function() {
                    r(!0);
                    var t = Wi({}, i, {
                            token: Xi("vibebp").getToken()
                        }),
                        n = new FormData;
                    n.append("body", JSON.stringify(t)), n.append("file", c[0]), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/create_update_group"), {
                        method: "post",
                        body: n
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        r(!1), t.status && e.newgroup(t.data)
                    })
                },
                className: C
            }, window.vibebp.translations.create_group)))
        };

    function el(e) {
        return (el = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function tl(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function nl(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? tl(n, !0).forEach(function(t) {
                rl(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : tl(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function rl(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function al(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var il = wp.element,
        ll = (il.createElement, il.useState),
        ol = il.useEffect,
        cl = il.Fragment,
        sl = (il.render, wp.data),
        ml = sl.dispatch,
        pl = sl.select,
        ul = function(e) {
            var t = al(ll(!1), 2),
                n = t[0],
                r = (t[1], al(ll(""), 2)),
                a = (r[0], r[1], al(ll({}), 2)),
                i = a[0],
                l = a[1],
                o = al(ll(null), 2),
                c = o[0],
                s = o[1],
                m = al(ll(!1), 2),
                p = m[0],
                u = (m[1], al(ll([]), 2)),
                d = (u[0], u[1], al(ll(nl({}, e.group)), 2)),
                f = d[0],
                w = d[1],
                v = al(ll(!1), 2),
                b = v[0],
                y = v[1],
                g = al(ll({}), 2),
                h = g[0],
                E = g[1],
                _ = al(ll(!1), 2),
                O = _[0],
                N = _[1];
            ol(function() {
                fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/").concat(f.id), {
                    method: "post",
                    body: JSON.stringify({
                        context: "meta",
                        token: pl("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (E(e.data), e.hasOwnProperty("tabs") && (l(e.tabs), s(Object.keys(e.tabs)[0])))
                })
            }, []), ol(function() {
                if ("home" !== c)
                    if (c && c.indexOf("#") > -1) {
                        var e = window.location.href.split("#");
                        Array.isArray(e) && e.length > 1 && (console.log(c.split("#")[1].split("&")[0].split("=")[1]), c.split("#")[1].split("&")[0].split("=")[1] && (window.location.href += e[0].activeTab, ml("vibebp").setComponent(c.split("#")[1].split("&")[0].split("=")[1])))
                    } else {
                        var t = new CustomEvent("group_tab", {
                            detail: {
                                tab: c,
                                group: f
                            }
                        });
                        document.dispatchEvent(t)
                    }
            }, [c]);
            return wp.element.createElement(cl, null, b ? wp.element.createElement(Zi, {
                group: f,
                newgroup: function(e) {
                    e ? (w(e), y(!1)) : y(!1)
                },
                meta: h
            }) : wp.element.createElement("div", {
                className: "vibebp_full_group"
            }, wp.element.createElement("div", {
                className: "group_head"
            }, wp.element.createElement("div", {
                className: "leftright_wrapper group_top"
            }, wp.element.createElement("div", {
                className: "left_side"
            }, wp.element.createElement("i", {
                className: "vicon vicon-arrow-left",
                onClick: function() {
                    e.show()
                }
            })), wp.element.createElement("div", {
                className: "right_side"
            }, wp.element.createElement("a", {
                onClick: function() {
                    fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/member_actions"), {
                        method: "post",
                        body: JSON.stringify({
                            action: "leave_group",
                            members: [pl("vibebp").getUser().id],
                            group_id: f.id,
                            token: pl("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        t.status && e.show(), t.hasOwnProperty("message") && ml("vibebp").addNotification({
                            text: t.message
                        })
                    })
                },
                className: p ? "small button is-primary is-loading" : "small button is-primary"
            }, p ? "" : window.vibebp.translations.leave_group), h && h.hasOwnProperty("is_admin") && h.is_admin ? wp.element.createElement("a", {
                className: "button is-primary small",
                onClick: function() {
                    y(!0)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-settings"
            })) : "")), wp.element.createElement("div", {
                className: "group_bottom"
            }, wp.element.createElement("div", {
                className: "group_avatar"
            }, wp.element.createElement("img", {
                src: f.avatar
            })), wp.element.createElement("div", {
                className: "group_title"
            }, wp.element.createElement("h1", {
                dangerouslySetInnerHTML: {
                    __html: f.name
                }
            }), wp.element.createElement("div", {
                className: O ? "group_description active" : "group_description",
                onClick: function() {
                    O && N(!1)
                }
            }, wp.element.createElement("p", {
                dangerouslySetInnerHTML: {
                    __html: f.description
                }
            }), !O && f.hasOwnProperty("description") && f.description.length > 180 ? wp.element.createElement("span", {
                className: "more",
                onClick: function() {
                    N(!0)
                }
            }, window.vibebp.translations.more) : "")))), n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement("div", {
                className: "group_content"
            }, Object.keys(i).length > 1 ? wp.element.createElement("div", {
                className: "content_tabs_wrapper"
            }, Object.keys(i).map(function(e) {
                return wp.element.createElement("div", {
                    className: c == e ? "content_tab active" : "content_tab",
                    onClick: function() {
                        s(e)
                    }
                }, wp.element.createElement("span", null, i[e]))
            })) : "", c && "home" != c ? wp.element.createElement("div", {
                className: "group_content_wrapper"
            }, wp.element.createElement("div", {
                id: c
            })) : wp.element.createElement("div", {
                className: "leftright_wrapper"
            }, wp.element.createElement("span", null), wp.element.createElement("div", {
                className: "left_side"
            }, wp.element.createElement(Ye, {
                type: "groups",
                id: e.group.id
            })), wp.element.createElement("div", {
                className: "right_side"
            }, wp.element.createElement(Ui, {
                type: "groups",
                id: f.id,
                object: f,
                memberActions: function(e, t) {
                    return fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/member_actions"), {
                        method: "post",
                        body: JSON.stringify({
                            action: e,
                            members: t,
                            group_id: f.id,
                            token: pl("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        e.status && w(nl({}, f, {
                            id: f.id
                        })), e.hasOwnProperty("message") && ml("vibebp").addNotification({
                            text: e.message
                        })
                    })
                }
            }), "object" === el(h) ? Object.keys(h).map(function(e) {
                if ("invite_status" !== e && "last_activity" !== e && "total_member_count" !== e) {
                    var t = new CustomEvent("meta_key", {
                        detail: h[e]
                    });
                    return document.dispatchEvent(t), wp.element.createElement("div", {
                        id: e
                    })
                }
            }) : "")))))
        },
        dl = wp.element,
        fl = (dl.createElement, dl.useState, dl.useEffect, dl.Fragment, dl.render, wp.data),
        wl = (fl.dispatch, fl.select, function(e) {
            return wp.element.createElement("div", {
                className: "vibebp_group",
                onClick: function() {
                    e.show()
                }
            }, wp.element.createElement("div", {
                className: "group_avatar"
            }, wp.element.createElement("img", {
                src: e.group.avatar
            })), wp.element.createElement("div", {
                className: "group_name"
            }, wp.element.createElement("strong", null, e.group.name)))
        }),
        vl = wp.element,
        bl = (vl.createElement, vl.useState, vl.useEffect, vl.Fragment, vl.render, wp.data),
        yl = (bl.dispatch, bl.select, function(e) {
            return wp.element.createElement("div", {
                className: "vibebp_group_invite"
            }, wp.element.createElement("div", {
                className: "group_avatar"
            }, wp.element.createElement("img", {
                src: e.invite.item.avatar
            })), wp.element.createElement("div", {
                className: "group_name"
            }, wp.element.createElement("strong", null, e.invite.item.name), wp.element.createElement("span", null, window.vibebp.components.groups[e.invite.item.status])), wp.element.createElement("div", {
                className: "inviter"
            }, wp.element.createElement($n, {
                type: "user",
                id: {
                    user_id: e.invite.inviter_id
                }
            })), wp.element.createElement("div", {
                className: "group_invite_time"
            }, wp.element.createElement(he, {
                time: e.invite.item.date_modified
            })), wp.element.createElement("div", {
                className: "group_actions"
            }, wp.element.createElement("a", {
                className: "vicon vicon-check",
                onClick: function() {
                    e.action(e.invite.item.id, "accept", e.invite.id)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-close",
                onClick: function() {
                    e.action(e.invite.item.id, "reject", e.invite.id)
                }
            }), wp.element.createElement("a", {
                className: "vicon vicon-trash",
                onClick: function() {
                    e.action(e.invite.item.id, "delete", e.invite.id)
                }
            })))
        });

    function gl(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function hl(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function El(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? hl(n, !0).forEach(function(t) {
                _l(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : hl(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function _l(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ol(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Nl = wp.element,
        jl = (Nl.createElement, Nl.useState),
        kl = Nl.useEffect,
        Sl = Nl.Fragment,
        Pl = (Nl.render, wp.data),
        xl = Pl.dispatch,
        Al = Pl.select,
        Cl = function(e) {
            var t = Ol(jl([]), 2),
                n = t[0],
                r = t[1],
                a = Ol(jl({
                    page: 1,
                    orderby: "",
                    accepted: "pending"
                }), 2),
                i = a[0],
                l = a[1],
                o = Ol(jl(""), 2),
                c = (o[0], o[1]),
                s = Ol(jl([]), 2),
                m = s[0],
                p = s[1],
                u = Ol(jl(!1), 2),
                d = u[0],
                f = u[1],
                w = Ol(jl(window.vibebp.components.groups.actions), 2),
                v = (w[0], w[1], Ol(jl([]), 2)),
                b = v[0],
                y = v[1],
                g = Ol(jl(!1), 2),
                h = (g[0], g[1], Ol(jl({
                    mine: "unread",
                    type: "",
                    include: "",
                    page: 1,
                    search_terms: "",
                    label: ""
                }), 2)),
                E = h[0],
                _ = h[1],
                O = Ol(jl(!1), 2),
                N = O[0],
                j = O[1],
                k = Ol(jl(!1), 2),
                S = k[0],
                P = k[1],
                x = Ol(jl(!1), 2),
                A = x[0],
                C = x[1],
                T = Ol(jl(!1), 2),
                I = T[0],
                D = T[1],
                L = Ol(jl(!1), 2),
                J = (L[0], L[1], Ol(jl({
                    text: "",
                    color: "#000"
                }), 2)),
                M = (J[0], J[1], Ol(jl(""), 2)),
                q = M[0],
                F = M[1],
                H = Ol(jl(!1), 2),
                U = H[0],
                z = H[1];
            kl(function() {
                var e = Al("vibebp").getAction();
                if (e && "view" == e) {
                    var t = Al("vibebp").getId();
                    t && _(El({}, E, {
                        include: [t]
                    }))
                } else E.include && _(El({}, E, {
                    include: ""
                }));
                var n = Al("vibebp").getMenu().filter(function(e) {
                    return "groups" === e.parent
                });
                n.map(function(e, t) {
                    -1 === n.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && -1 == n[0].class.indexOf("current-menu-item") && n[0].class.push("current-menu-item")
                }), y(n), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), rt(function() {
                if ("invites" === q) f(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/").concat(q), {
                    method: "post",
                    body: JSON.stringify(El({}, i, {
                        token: Al("vibebp").getToken()
                    }))
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (f(!1), e.status)
                        if (S) {
                            var t = gl(n);
                            e.data.invites.map(function(e) {
                                t.push(e)
                            }), r(ngroups), P(!1), t.length < e.data.total ? j(!0) : j(!1)
                        } else r(e.data.invites), e.data.invites.length < e.data.total ? j(!0) : j(!1);
                    else e.hasOwnProperty("message") && c(e.message), r([])
                });
                else {
                    var e = El({}, E);
                    e.token = Al("vibebp").getToken();
                    var t = Al("vibebp").getUser();
                    e.user_id = t.id, f(!0), fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups), {
                        method: "post",
                        body: JSON.stringify(e)
                    }).then(function(e) {
                        return e.json()
                    }).then(function(t) {
                        if (f(!1), t.status) {
                            if (S) {
                                var n = gl(m);
                                t.data.groups.map(function(e) {
                                    n.push(e)
                                }), p(n), P(!1), n.length < t.data.total ? j(!0) : j(!1)
                            } else p(t.data.groups), e.include && D(0), t.data.groups.length < t.data.total ? j(!0) : j(!1);
                            t.hasOwnProperty("can_create_groups") && z(t.can_create_groups)
                        } else p([])
                    })
                }
            }, 500, [E, i, q]);
            var R = function(e, t, a) {
                var i = gl(n);
                fetch("".concat(window.vibebp.api.url, "/").concat(window.vibebp.api.endpoints.groups, "/invite/").concat(e), {
                    method: "post",
                    body: JSON.stringify({
                        token: Al("vibebp").getToken(),
                        action: t
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (i.splice(n.findIndex(function(e) {
                        return e.id === a
                    }), 1), r(i))
                })
            };
            return wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.groups.label), b.map(function(e, t) {
                var n = e.class.join(" ") + " " + e.css_id;
                if ("compose" !== e.css_id) return wp.element.createElement("a", {
                    className: n,
                    onClick: function(n) {
                        var r = El({}, E);
                        r.filter = e.css_id, r.page = 1, D(!1), C(!1), E.css_id !== r.filter && _(r), F(e.css_id);
                        var a = gl(b),
                            i = a.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        a[i].class.splice(a[i].class.indexOf("current-menu-item"), 1), a[t].class.push("current-menu-item"), y(a)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, A ? wp.element.createElement(Zi, {
                newgroup: function(e) {
                    if (e) {
                        var t = gl(m);
                        t.unshift(e), p(t), C(!1), D(0)
                    } else C(!1)
                }
            }) : !1 !== I ? wp.element.createElement(ul, {
                group: m[I],
                show: function() {
                    D(!1), _(El({}, E, {
                        include: ""
                    })), xl("vibebp").setId(!1), xl("vibebp").setAction(!1)
                }
            }) : wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "vibebp_main_head"
            }, "invites" === q ? wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                value: i.search_terms,
                placeholder: window.vibebp.translations.search_text,
                onChange: function(e) {
                    var t = El({}, i);
                    t.search_terms = e.target.value, l(t)
                }
            })), wp.element.createElement("div", null, wp.element.createElement("select", {
                onChange: function(e) {
                    var t = El({}, i);
                    t.accepted = e.target.value, l(t)
                }
            }, Object.keys(window.vibebp.components.groups.invite_type).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.invite_type[e])
            })), wp.element.createElement("select", {
                onChange: function(e) {
                    var t = El({}, i);
                    t.orderby = e.target.value, l(t)
                }
            }, Object.keys(window.vibebp.components.groups.invite_sort).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.invite_sort[e])
            })))) : wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "searchbox active"
            }, wp.element.createElement("span", {
                className: "vicon vicon-search"
            }), wp.element.createElement("input", {
                type: "text",
                value: E.search_terms,
                placeholder: window.vibebp.translations.search_text,
                onChange: function(e) {
                    var t = El({}, E);
                    t.search_terms = e.target.value, _(t)
                }
            })), wp.element.createElement("select", {
                onChange: function(e) {
                    var t = El({}, E);
                    t.type = e.target.value, _(t)
                }
            }, Object.keys(window.vibebp.components.groups.sorters).map(function(e) {
                return wp.element.createElement("option", {
                    value: e
                }, window.vibebp.components.groups.sorters[e])
            })))), d ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : "invites" === q ? wp.element.createElement("div", {
                className: "group_invites"
            }, n.length || d ? wp.element.createElement(Sl, null, n.length ? n.map(function(e, t) {
                return wp.element.createElement(yl, {
                    invite: e,
                    action: R
                })
            }) : "") : wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_groups_found))) : wp.element.createElement("div", {
                className: "grouplist"
            }, m.length || d ? wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "vibebp_groups"
            }, U ? wp.element.createElement("div", {
                className: "vibebp_groups"
            }, wp.element.createElement("div", {
                className: "new_group",
                onClick: function() {
                    C(!0)
                }
            }, wp.element.createElement("i", {
                className: "vicon vicon-plus"
            }))) : "", m.length ? m.map(function(e, t) {
                return wp.element.createElement(wl, {
                    group: e,
                    show: function() {
                        D(t), xl("vibebp").setAction("view"), xl("vibebp").setId(e.id)
                    }
                })
            }) : ""), N ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    var e = El({}, E);
                    e.page = E.page + 1, P(!0), _(e)
                }
            }, window.vibebp.translations.more) : "") : wp.element.createElement(Sl, null, wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_groups_found), U ? wp.element.createElement("div", {
                className: "vibebp_groups"
            }, wp.element.createElement("div", {
                className: "new_group",
                onClick: function() {
                    C(!0)
                }
            }, wp.element.createElement("i", {
                className: "vicon vicon-plus"
            }))) : "")))))
        };

    function Tl(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Il(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? Tl(n, !0).forEach(function(t) {
                Dl(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Tl(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Dl(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ll(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Jl = wp.element,
        Ml = (Jl.createElement, Jl.useState),
        ql = (Jl.useEffect, Jl.Fragment),
        Fl = (Jl.render, wp.data),
        Hl = (Fl.dispatch, Fl.select),
        Ul = function(e) {
            var t = Ll(Ml(!1), 2),
                n = t[0],
                r = t[1],
                a = Ll(Ml(window.vibebp.translations.save_changes), 2),
                i = a[0],
                l = a[1],
                o = Ll(Ml("email"), 2),
                c = o[0],
                s = o[1],
                m = Hl("vibebp").getUser().email,
                p = Ll(Ml({
                    email: m,
                    pwd: "",
                    pass1: "",
                    pass2: ""
                }), 2),
                u = p[0],
                d = p[1];
            return wp.element.createElement("div", {
                className: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("strong", null, window.vibebp.translations.account_email)), wp.element.createElement("div", {
                className: "portal_body"
            }, wp.element.createElement("div", {
                className: "settings_tabs"
            }, wp.element.createElement("a", {
                className: "setting_tab " + ("email" == c ? "active" : ""),
                onClick: function() {
                    s("email")
                }
            }, window.vibebp.translations.change_email), wp.element.createElement("a", {
                className: "setting_tab " + ("password" == c ? "active" : ""),
                onClick: function() {
                    s("password")
                }
            }, window.vibebp.translations.change_password)), wp.element.createElement("div", {
                className: "vibebp_form tab_content"
            }, "email" == c ? wp.element.createElement(ql, null, wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.account_email), wp.element.createElement("input", {
                type: "email",
                onChange: function(e) {
                    d(Il({}, u, {
                        email: e.target.value
                    }))
                },
                value: u.email
            }), u.email !== m ? wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.confirm_old_password), wp.element.createElement("input", {
                type: "password",
                value: u.pwd,
                onChange: function(e) {
                    d(Il({}, u, {
                        pwd: e.target.value
                    }))
                }
            })) : "")) : "password" == c ? wp.element.createElement(ql, null, wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.change_password), wp.element.createElement("input", {
                type: "password",
                value: u.pass1,
                onChange: function(e) {
                    d(Il({}, u, {
                        pass1: e.target.value
                    }))
                }
            })), wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("label", null, window.vibebp.translations.repeat_new_password), wp.element.createElement("input", {
                type: "password",
                value: u.pass2,
                onChange: function(e) {
                    d(Il({}, u, {
                        pass2: e.target.value
                    }))
                }
            }))) : "", wp.element.createElement("a", {
                className: n ? "button is-primary is-loading" : "button is-primary",
                onClick: function() {
                    r(!0), fetch("".concat(window.vibebp.api.url, "/settings/save"), {
                        method: "post",
                        body: JSON.stringify(Il({}, u, {
                            token: Hl("vibebp").getToken(),
                            type: c
                        }))
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        r(!1), l(e.message), setTimeout(function() {
                            l(window.vibebp.translations.save_changes)
                        }, 3e3)
                    })
                }
            }, i))))
        };

    function zl(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Rl = wp.element,
        Wl = (Rl.createElement, Rl.useState),
        Yl = Rl.useEffect,
        Bl = Rl.Fragment,
        Gl = (Rl.render, wp.data),
        Kl = (Gl.dispatch, Gl.select),
        Ql = function(e) {
            var t = zl(Wl(!0), 2),
                n = t[0],
                r = t[1],
                a = zl(Wl({
                    status: "",
                    label: "",
                    exports: "",
                    message: "",
                    submessage: ""
                }), 2),
                i = a[0],
                l = a[1],
                o = zl(Wl(!1), 2),
                c = o[0],
                s = o[1];
            Yl(function() {
                m()
            }, []);
            var m = function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/settings/export_data"), {
                    method: "post",
                    body: JSON.stringify({
                        token: Kl("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), l(e)
                })
            };
            return wp.element.createElement("div", {
                class: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("strong", null, window.vibebp.translations.export_data_settings)), wp.element.createElement("div", {
                className: "portal_body"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement(Bl, null, i.hasOwnProperty("exports") && i.exports.length ? wp.element.createElement(Bl, null, wp.element.createElement("div", {
                className: "export_data_items",
                dangerouslySetInnerHTML: {
                    __html: i.exports
                }
            })) : "", i.hasOwnProperty("message") && i.message.length ? wp.element.createElement("div", null, wp.element.createElement("div", {
                className: "export_data_message vbp_message",
                dangerouslySetInnerHTML: {
                    __html: i.message
                }
            })) : "", i.hasOwnProperty("can_make_new_request") && i.can_make_new_request ? wp.element.createElement("div", null, wp.element.createElement("a", {
                className: c ? "button is-primary is-loading make_new_export_request" : "button is-primary make_new_export_request",
                onClick: function() {
                    s(!0), fetch("".concat(window.vibebp.api.url, "/settings/export_data/request"), {
                        method: "post",
                        body: JSON.stringify({
                            token: Kl("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        s(!1), m()
                    })
                }
            }, i.label, " ")) : "", i.hasOwnProperty("report_link") && i.report_link ? wp.element.createElement("div", null, wp.element.createElement("a", {
                className: "link make_new_export_download",
                href: i.report_link,
                target: "__blank"
            }, i.label, " ")) : "")))
        };

    function $l(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Vl(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Xl(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Zl = wp.element,
        eo = (Zl.createElement, Zl.useState),
        to = Zl.useEffect,
        no = Zl.Fragment,
        ro = (Zl.render, wp.data),
        ao = (ro.dispatch, ro.select),
        io = function(e) {
            var t = Xl(eo(!1), 2),
                n = t[0],
                r = t[1],
                a = Xl(eo({}), 2),
                i = a[0],
                l = a[1];
            to(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/settings/email"), {
                    method: "post",
                    body: JSON.stringify({
                        token: ao("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), l(e)
                })
            }, []);
            var o = function(e, t) {
                var n = function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = null != arguments[t] ? arguments[t] : {};
                        t % 2 ? $l(n, !0).forEach(function(t) {
                            Vl(e, t, n[t])
                        }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : $l(n).forEach(function(t) {
                            Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                        })
                    }
                    return e
                }({}, i);
                n[e].value = t, l(n), fetch("".concat(window.vibebp.api.url, "/settings/email/set"), {
                    method: "post",
                    body: JSON.stringify({
                        token: ao("vibebp").getToken(),
                        setting: e,
                        value: t
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {})
            };
            return wp.element.createElement("div", {
                class: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("strong", null, window.vibebp.translations.send_email_notice)), wp.element.createElement("div", {
                className: "portal_body"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : Object.keys(i).length ? wp.element.createElement(no, null, Object.keys(i).map(function(e) {
                return wp.element.createElement("div", {
                    className: "setting"
                }, wp.element.createElement("label", null, i[e].label), wp.element.createElement("div", {
                    className: "switch"
                }, "yes" == i[e].value ? wp.element.createElement("input", {
                    type: "checkbox",
                    id: e,
                    checked: !0,
                    onClick: function() {
                        return o(e, "no")
                    }
                }) : wp.element.createElement("input", {
                    type: "checkbox",
                    id: e,
                    onClick: function() {
                        return o(e, "yes")
                    }
                }), wp.element.createElement("label", {
                    for: e,
                    className: "slider"
                })))
            })) : ""))
        };

    function lo(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function oo(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function co(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var so = wp.element,
        mo = (so.createElement, so.useState),
        po = so.useEffect,
        uo = so.Fragment,
        fo = (so.render, wp.data),
        wo = (fo.dispatch, fo.select),
        vo = function(e) {
            var t = co(mo(!1), 2),
                n = t[0],
                r = t[1],
                a = co(mo({}), 2),
                i = a[0],
                l = a[1];
            po(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/xprofile/fields"), {
                    method: "post",
                    body: JSON.stringify({
                        token: wo("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), l(e)
                })
            }, []);
            var o = function(e, t) {
                var n = function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = null != arguments[t] ? arguments[t] : {};
                        t % 2 ? lo(n, !0).forEach(function(t) {
                            oo(e, t, n[t])
                        }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : lo(n).forEach(function(t) {
                            Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                        })
                    }
                    return e
                }({}, i);
                n.fields[n.fields.findIndex(function(t) {
                    return t.id === e.id
                })].visibility = t, l(n), fetch("".concat(window.vibebp.api.url, "/xprofile/fields/setvisibility"), {
                    method: "post",
                    body: JSON.stringify({
                        token: wo("vibebp").getToken(),
                        field_id: e.id,
                        visibility: t
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {})
            };
            return wp.element.createElement("div", {
                class: "portal"
            }, wp.element.createElement("div", {
                className: "portal_header"
            }, wp.element.createElement("strong", null, window.vibebp.translations.visibility_settings)), wp.element.createElement("div", {
                className: "portal_body"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : Object.keys(i).length ? wp.element.createElement(uo, null, i.groups.map(function(e) {
                return wp.element.createElement("div", {
                    className: "setting_group"
                }, wp.element.createElement("label", null, e.name), i.fields.filter(function(t) {
                    return t.group_id === e.id
                }).map(function(e) {
                    return wp.element.createElement("div", {
                        className: "setting_field"
                    }, wp.element.createElement("strong", null, e.name), wp.element.createElement("select", {
                        value: e.visibility,
                        onChange: function(t) {
                            return o(e, t.target.value)
                        }
                    }, Object.keys(window.vibebp.components.xprofile.visibility).map(function(t) {
                        return wp.element.createElement("option", {
                            value: t,
                            selected: e.visibility == t
                        }, window.vibebp.components.xprofile.visibility[t])
                    })))
                }))
            })) : ""))
        },
        bo = wp.element,
        yo = (bo.createElement, bo.useState, bo.useEffect),
        go = (bo.Fragment, bo.render, wp.data),
        ho = (go.dispatch, go.select, function(e) {
            return yo(function() {
                var e = new CustomEvent("vibebp_profile_settings");
                document.dispatchEvent(e), document.querySelector("body").classList.value.includes("withsidebar") && document.querySelector("body").classList.remove("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "profile_settings"
            }, wp.element.createElement(Ul, null), wp.element.createElement(vo, null), wp.element.createElement(io, null), wp.element.createElement(Ql, null), window.vibebp.settings.profile_settings.map(function(e) {
                return wp.element.createElement("div", {
                    className: "portal"
                }, wp.element.createElement("div", {
                    className: "portal_header"
                }, wp.element.createElement("strong", {
                    dangerouslySetInnerHTML: {
                        __html: e.label
                    }
                })), wp.element.createElement("div", {
                    className: "portal_body"
                }, wp.element.createElement("div", {
                    className: e.key
                })))
            }))
        }),
        Eo = wp.element,
        _o = (Eo.createElement, Eo.useState, Eo.useEffect, Eo.Fragment),
        Oo = (Eo.render, wp.data),
        No = (Oo.dispatch, Oo.select, function(e) {
            return wp.element.createElement("div", {
                className: "vibebp_wc_full_order"
            }, wp.element.createElement("div", {
                className: "vibebp_wc_order_header"
            }, wp.element.createElement("span", {
                className: "vicon vicon-arrow-left",
                onClick: e.back
            }), wp.element.createElement("span", {
                className: "order_status " + e.order.status
            }, window.vibebp.components.shop.order_statuses["wc-" + e.order.status])), wp.element.createElement("div", {
                className: "vibebp_order_details"
            }, wp.element.createElement("div", {
                className: "vibebp_order_main"
            }, wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vibebp_wc_order_label"
            }, window.vibebp.translations.order_number), "#", e.order.order_number), wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vibebp_wc_order_label"
            }, window.vibebp.translations.order_date), e.order.created_at), wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vibebp_wc_order_label"
            }, window.vibebp.translations.order_status), wp.element.createElement("span", {
                className: "order_status " + e.order.status
            }, window.vibebp.components.shop.order_statuses["wc-" + e.order.status])), wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vibebp_wc_order_label"
            }, window.vibebp.translations.order_amount), e.order.currency, " ", e.order.total), wp.element.createElement("span", null, wp.element.createElement("span", {
                className: "vibebp_wc_order_label"
            }, window.vibebp.translations.order_payment_method), e.order.payment_details.method_title)), wp.element.createElement("div", {
                className: "vibebp_order_line_items"
            }, e.order.line_items.length ? e.order.line_items.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_order_line_item"
                }, wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.item_name), e.name, " x ", e.quantity), wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.item_total), e.subtotal, " ", "0.00" !== e.subtotal_tax ? wp.element.createElement("span", {
                    className: "subtotal_tax"
                }, "[", e.subtotal_tax, "]") : ""))
            }) : ""), e.order.fee_lines.length || e.order.shipping_lines.length || e.order.coupon_lines.length ? wp.element.createElement("div", {
                className: "vibebp_order_extra_items"
            }, e.order.coupon_lines.length ? wp.element.createElement(_o, null, wp.element.createElement("strong", null, window.vibebp.translations.coupons_applied), e.order.coupon_lines.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_order_coupon_item"
                }, wp.element.createElement("span", null, e.code), wp.element.createElement("span", null, e.amount))
            })) : "", e.order.shipping_lines.length ? wp.element.createElement(_o, null, wp.element.createElement("strong", null, window.vibebp.translations.shipping_rates), e.order.shipping_lines.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_order_coupon_item"
                }, wp.element.createElement("span", null, e.method_title), wp.element.createElement("span", null, e.total))
            })) : "", e.order.fee_lines.length ? wp.element.createElement(_o, null, wp.element.createElement("strong", null, window.vibebp.translations.fees), e.order.fee_lines.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_order_coupon_item"
                }, wp.element.createElement("span", null, e.method_title), wp.element.createElement("span", null, e.total))
            })) : "") : "", wp.element.createElement("div", {
                className: "vibebp_addresses"
            }, wp.element.createElement("div", {
                className: "vibebp_billing_address"
            }, wp.element.createElement("strong", null, window.vibebp.translations.billing_address), wp.element.createElement("span", null, e.order.billing_address.first_name, " ", e.order.billing_address.last_name), wp.element.createElement("span", null, e.order.billing_address.email, " ", e.order.billing_address.phone), e.order.billing_address.company.length ? wp.element.createElement("span", null, e.order.billing_address.company) : "", wp.element.createElement("span", null, e.order.billing_address.address_1), e.order.billing_address.address_2.length ? wp.element.createElement("span", null, e.order.billing_address.address_2) : "", wp.element.createElement("span", null, e.order.billing_address.city, " ", e.order.billing_address.state, " ", e.order.billing_address.country, " ", e.order.billing_address.pincode)), e.order.shipping_address.first_name.length ? wp.element.createElement("div", {
                className: "vibebp_shipping_address"
            }, wp.element.createElement("strong", null, window.vibebp.translations.shipping_address), wp.element.createElement("span", null, e.order.shipping_address.first_name, " ", e.order.shipping_address.last_name), wp.element.createElement("span", null, e.order.shipping_address.email, " ", e.order.shipping_address.phone), e.order.shipping_address.company.length ? wp.element.createElement("span", null, e.order.shipping_address.company) : "", wp.element.createElement("span", null, e.order.shipping_address.address_1), e.order.shipping_address.address_2.length ? wp.element.createElement("span", null, e.order.shipping_address.address_2) : "", wp.element.createElement("span", null, e.order.shipping_address.city, " ", e.order.shipping_address.state, " ", e.order.shipping_address.country, " ", e.order.shipping_address.pincode)) : "")))
        });

    function jo(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function ko(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function So(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? ko(n, !0).forEach(function(t) {
                Po(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : ko(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function Po(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function xo(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ao = wp.element,
        Co = (Ao.createElement, Ao.useState),
        To = Ao.useEffect,
        Io = Ao.Fragment,
        Do = (Ao.render, Ao.useRef),
        Lo = wp.data,
        Jo = (Lo.dispatch, Lo.select),
        Mo = function(e) {
            var t = xo(Co(!1), 2),
                n = t[0],
                r = t[1],
                a = xo(Co({
                    page: 1,
                    order_date: "",
                    status: "wc-completed",
                    limit: window.vibebp.components.shop.per_page
                }), 2),
                i = a[0],
                l = a[1],
                o = xo(Co(!1), 2),
                c = o[0],
                s = o[1],
                m = xo(Co(!1), 2),
                p = m[0],
                u = m[1],
                d = xo(Co([]), 2),
                f = d[0],
                w = d[1],
                v = xo(Co([]), 2),
                b = v[0],
                y = v[1],
                g = xo(Co(!1), 2),
                h = g[0],
                E = g[1],
                _ = xo(Co(!1), 2),
                O = (_[0], _[1], Do());
            return To(function() {
                if (O && O.current && "function" == typeof flatpickr && (!f.length || f.length && f.length > 1)) {
                    var e = {
                        dateFormat: "m/d/Y",
                        mode: "range",
                        defaultDate: f,
                        onChange: function(e) {
                            if (e && e.length > 1) {
                                w(e);
                                var t = So({}, i);
                                t.order_date = {
                                    start_date: e[0].getTime(),
                                    end_date: e[e.length - 1].getTime()
                                }, l(t)
                            }
                        }
                    };
                    flatpickr(O.current, e)
                }
            }, [f]), To(function() {
                var e = So({}, i);
                e.token = Jo("vibebp").getToken(), r(!0), fetch("".concat(window.vibebp.api.url, "/wc/orders"), {
                    method: "post",
                    body: JSON.stringify(e)
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    if (r(!1), e.status) {
                        if (p) {
                            if (e.orders.length) {
                                var t = jo(b);
                                e.orders.map(function(e) {
                                    t.push(e)
                                }), y(t)
                            }
                            u(!1)
                        } else y(e.orders), s(!0);
                        e.orders.length < i.limit && s(!1)
                    }
                })
            }, [i]), wp.element.createElement("div", {
                className: "vibebp_shop_orders"
            }, wp.element.createElement("div", {
                className: "vibebp_shop_orders_header vibebp_form vibebp_main_head"
            }, wp.element.createElement("select", {
                value: i.timeline,
                onChange: function(e) {
                    l(So({}, i, {
                        timeline: e.target.value,
                        page: 1
                    }))
                }
            }, Object.keys(window.vibebp.components.shop.order_timelines).map(function(e) {
                return wp.element.createElement("option", {
                    selected: i.timeline == e,
                    value: e
                }, window.vibebp.components.shop.order_timelines[e])
            })), wp.element.createElement("div", {
                className: "vibebp_form_field"
            }, wp.element.createElement("div", {
                className: "date"
            }, wp.element.createElement("input", {
                type: "text",
                ref: O
            }), i.order_date ? wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    w([]);
                    var e = So({}, i);
                    e.order_date = !1, l(e)
                }
            }) : "")), wp.element.createElement("select", {
                value: i.status,
                onChange: function(e) {
                    l(So({}, i, {
                        status: e.target.value,
                        page: 1
                    }))
                }
            }, wp.element.createElement("option", null, window.vibebp.translations.select_order_status), Object.keys(window.vibebp.components.shop.order_statuses).map(function(e) {
                return wp.element.createElement("option", {
                    selected: i.status == e,
                    value: e
                }, window.vibebp.components.shop.order_statuses[e])
            }))), n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : h ? wp.element.createElement(No, {
                order: h,
                back: function() {
                    E(!1)
                }
            }) : b.length ? wp.element.createElement(Io, null, b.map(function(e) {
                var t = e[0];
                return wp.element.createElement("div", {
                    className: "vibebp_wc_order",
                    onClick: function() {
                        E(t)
                    }
                }, wp.element.createElement("div", {
                    className: "vibebp_order_details"
                }, wp.element.createElement("a", {
                    className: "vibebp_order_number link",
                    href: t.view_order_url,
                    target: "_blank"
                }, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.order_number), "#", t.order_number), wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.order_date), t.created_at), wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.order_status), wp.element.createElement("span", {
                    className: "order_status " + t.status
                }, window.vibebp.components.shop.order_statuses["wc-" + t.status])), wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.order_quantity), t.total_line_items_quantity), wp.element.createElement("span", null, wp.element.createElement("span", {
                    className: "vibebp_wc_order_label"
                }, window.vibebp.translations.order_amount), t.currency, " ", t.total)))
            }), c ? wp.element.createElement("a", {
                className: "link",
                onClick: function() {
                    u(!0), l(So({}, i, {
                        page: i.page + 1
                    }))
                }
            }, window.vibebp.components.shop.translations.load_more) : "") : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_orders))
        };

    function qo(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Fo = wp.element,
        Ho = (Fo.createElement, Fo.useState),
        Uo = Fo.useEffect,
        zo = (Fo.Fragment, Fo.render, wp.data),
        Ro = (zo.dispatch, zo.select),
        Wo = function(e) {
            var t = qo(Ho(!1), 2),
                n = t[0],
                r = t[1],
                a = qo(Ho([]), 2),
                i = a[0],
                l = a[1];
            return Uo(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/wc/downloads"), {
                    method: "post",
                    body: JSON.stringify({
                        token: Ro("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && l(e.downloads)
                })
            }, []), wp.element.createElement("div", {
                className: "vibebp_wc_downloads"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : i.length ? i.map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_wc_download"
                }, wp.element.createElement("strong", null, e.download_name), wp.element.createElement("span", null, wp.element.createElement("span", null, window.vibebp.translations.product_name), e.product_name), e.downloads_remaining ? wp.element.createElement("span", null, wp.element.createElement("span", null, window.vibebp.translations.remaining_downloads), e.downloads_remaining) : "", e.access_expires ? wp.element.createElement("span", null, wp.element.createElement("span", null, window.vibebp.translations.access_expires), e.access_expires) : "", wp.element.createElement("a", {
                    href: e.file.file,
                    target: "_blank",
                    className: "button is-primary"
                }, wp.element.createElement("span", {
                    className: "vicon vicon-download"
                }), " ", window.vibebp.translations.download))
            }) : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.translations.no_downloads))
        };

    function Yo(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function Bo(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Go(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ko = wp.element,
        Qo = (Ko.createElement, Ko.useState),
        $o = Ko.useEffect,
        Vo = (Ko.Fragment, Ko.render, wp.data),
        Xo = Vo.dispatch,
        Zo = Vo.select,
        ec = function(e) {
            var t = Go(Qo(!1), 2),
                n = t[0],
                r = t[1],
                a = Go(Qo({}), 2),
                i = a[0],
                l = a[1],
                o = Go(Qo(), 2),
                c = o[0],
                s = o[1],
                m = Go(Qo(!1), 2),
                p = m[0],
                u = m[1];
            return $o(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/wc/addresses"), {
                    method: "post",
                    body: JSON.stringify({
                        token: Zo("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && l(e.addresses)
                })
            }, []), rt(function() {
                if (p) {
                    var e = c.split("-");
                    fetch("".concat(window.vibebp.api.url, "/wc/addresses/update"), {
                        method: "post",
                        body: JSON.stringify({
                            token: Zo("vibebp").getToken(),
                            address_type: e[0],
                            field: e[1],
                            value: i[e[0]][e[1]].value
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        u(!1), e.status || e.hasOwnProperty("message") && Xo("vibebp").addNotification({
                            text: e.message
                        })
                    })
                }
            }, 500, [i]), wp.element.createElement("div", {
                className: "vibebp_wc_addresses"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : Object.keys(i).length ? Object.keys(i).map(function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_wc_address"
                }, wp.element.createElement("strong", null, window.vibebp.translations[e]), Object.keys(i[e]).map(function(t) {
                    return wp.element.createElement("div", {
                        className: "vibebp_wc_address_field"
                    }, wp.element.createElement("span", {
                        onClick: function() {
                            s(c !== e + "-" + t && e + "-" + t)
                        }
                    }, i[e][t].label, c === e + "-" + t ? wp.element.createElement("i", null, window.vibebp.translations.cancel) : wp.element.createElement("span", {
                        className: "vicon vicon-pencil"
                    })), c === e + "-" + t ? wp.element.createElement("div", {
                        className: p ? "control is-loading" : "control"
                    }, wp.element.createElement("input", {
                        type: "text",
                        value: i[e][t].value,
                        onChange: function(n) {
                            var r = function(e) {
                                for (var t = 1; t < arguments.length; t++) {
                                    var n = null != arguments[t] ? arguments[t] : {};
                                    t % 2 ? Yo(n, !0).forEach(function(t) {
                                        Bo(e, t, n[t])
                                    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Yo(n).forEach(function(t) {
                                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                    })
                                }
                                return e
                            }({}, i);
                            r[e][t].value = n.target.value, l(r), u(!0)
                        }
                    })) : wp.element.createElement("span", null, i[e][t].value))
                }))
            }) : "")
        };

    function tc(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function nc(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function rc(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function ac(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ic = wp.element,
        lc = (ic.createElement, ic.useState),
        oc = ic.useEffect,
        cc = (ic.Fragment, ic.render, wp.data),
        sc = (cc.dispatch, cc.select),
        mc = function(e) {
            var t = ac(lc({}), 2),
                n = t[0],
                r = t[1],
                a = ac(lc([]), 2),
                i = a[0],
                l = a[1],
                o = ac(lc(""), 2),
                c = o[0],
                s = o[1];
            return oc(function() {
                var e = sc("vibebp").getMenu().filter(function(e) {
                    return "shop" === e.parent
                });
                e.map(function(t, n) {
                    -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && e[n].class.push("current-menu-item")
                }), l(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.shop.label), i.map(function(e, t) {
                var a = e.class.join(" ") + " " + e.css_id;
                return wp.element.createElement("a", {
                    className: a,
                    onClick: function(a) {
                        var o = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? nc(n, !0).forEach(function(t) {
                                    rc(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : nc(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, n);
                        o.filter = e.css_id, o.page = 1, n.css_id !== o.filter && r(o), s(e.css_id);
                        var c = tc(i),
                            m = c.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        c[m].class.splice(c[m].class.indexOf("current-menu-item"), 1), c[t].class.push("current-menu-item"), l(c)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, "downloads" == c ? wp.element.createElement(Wo, null) : "edit-address" == c ? wp.element.createElement(ec, null) : wp.element.createElement(Mo, null)))
        };

    function pc(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var uc = wp.element,
        dc = (uc.createElement, uc.useState),
        fc = uc.useEffect,
        wc = uc.Fragment,
        vc = (uc.render, wp.data),
        bc = vc.dispatch,
        yc = vc.select,
        gc = function(e) {
            var t = pc(dc(!1), 2),
                n = t[0],
                r = t[1],
                a = pc(dc({}), 2),
                i = a[0],
                l = a[1],
                o = pc(dc({}), 2),
                c = o[0],
                s = o[1];
            return fc(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/pmpro/memberships"), {
                    method: "post",
                    body: JSON.stringify({
                        token: yc("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && l(e.data), e.hasOwnProperty("message") && bc("vibebp").addNotification({
                        text: e.message
                    }), e.hasOwnProperty("all_levels_page") && s(e.all_levels_page)
                })
            }, []), wp.element.createElement("div", {
                className: "vibebp_pmpro_memberships"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement(wc, null, i.length ? wp.element.createElement("table", {
                className: "memberships table"
            }, wp.element.createElement("thead", null, wp.element.createElement("tr", null, wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.level)), wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.billing)), wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.expiration)))), wp.element.createElement("tbody", null, i.map(function(e, t) {
                return wp.element.createElement("tr", {
                    className: "membership"
                }, wp.element.createElement("td", null, wp.element.createElement("h3", {
                    dangerouslySetInnerHTML: {
                        __html: e.name
                    }
                }), wp.element.createElement("div", {
                    className: "actions"
                }, e.hasOwnProperty("change_link") ? wp.element.createElement("a", {
                    target: "_blank",
                    className: "button",
                    href: e.change_link
                }, window.vibebp.components.pmpro.translations.change) : "", e.hasOwnProperty("cancel_link") ? wp.element.createElement("a", {
                    target: "_blank",
                    className: "button",
                    href: e.cancel_link
                }, window.vibebp.components.pmpro.translations.cancel, " ") : "", e.hasOwnProperty("renew") ? wp.element.createElement("a", {
                    target: "_blank",
                    className: "button",
                    href: e.renew
                }, window.vibebp.components.pmpro.translations.renew) : "")), e.hasOwnProperty("billing_html") ? wp.element.createElement("td", {
                    dangerouslySetInnerHTML: {
                        __html: e.billing_html
                    }
                }) : "", e.hasOwnProperty("expiration_html") ? wp.element.createElement("td", {
                    dangerouslySetInnerHTML: {
                        __html: e.expiration_html
                    }
                }) : "")
            }))) : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.components.pmpro.translations.no_memberships), c.length ? wp.element.createElement("a", {
                target: "_blank",
                href: c
            }, window.vibebp.components.pmpro.translations.view_all_levels) : ""))
        };

    function hc(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Ec = wp.element,
        _c = (Ec.createElement, Ec.useState),
        Oc = Ec.useEffect,
        Nc = (Ec.Fragment, Ec.render, wp.data),
        jc = (Nc.dispatch, Nc.select),
        kc = function(e) {
            var t = hc(_c(!1), 2),
                n = t[0],
                r = t[1],
                a = hc(_c({}), 2),
                i = (a[0], a[1]),
                l = jc("vibebp").getUser();
            return Oc(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/pmpro/account"), {
                    method: "post",
                    body: JSON.stringify({
                        token: jc("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && i(e.data)
                })
            }, []), wp.element.createElement("div", {
                className: "vibebp_pmpro_account"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement("table", {
                className: "table",
                style: {
                    width: "auto"
                }
            }, wp.element.createElement("tbody", null, wp.element.createElement("tr", null, wp.element.createElement("td", null, window.vibebp.components.pmpro.translations.username), wp.element.createElement("td", null, l.username)), wp.element.createElement("tr", null, wp.element.createElement("td", null, window.vibebp.components.pmpro.translations.email), wp.element.createElement("td", null, l.email)))))
        };

    function Sc(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Pc = wp.element,
        xc = (Pc.createElement, Pc.useState),
        Ac = Pc.useEffect,
        Cc = Pc.Fragment,
        Tc = (Pc.render, wp.data),
        Ic = Tc.dispatch,
        Dc = Tc.select,
        Lc = function(e) {
            var t = Sc(xc(!1), 2),
                n = t[0],
                r = t[1],
                a = Sc(xc({}), 2),
                i = a[0],
                l = a[1],
                o = Sc(xc({}), 2);
            o[0], o[1];
            return Ac(function() {
                r(!0), fetch("".concat(window.vibebp.api.url, "/pmpro/invoices"), {
                    method: "post",
                    body: JSON.stringify({
                        token: Dc("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    r(!1), e.status && l(e.data), e.hasOwnProperty("message") && Ic("vibebp").addNotification({
                        text: e.message
                    })
                })
            }, []), wp.element.createElement("div", {
                className: "vibebp_pmpro_invoices"
            }, n ? wp.element.createElement("div", {
                class: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null)) : wp.element.createElement(Cc, null, i.length ? wp.element.createElement("table", {
                className: "memberships table"
            }, wp.element.createElement("thead", null, wp.element.createElement("tr", null, wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.date)), wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.level)), wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.amount)), wp.element.createElement("td", null, wp.element.createElement("strong", null, window.vibebp.components.pmpro.translations.status)))), wp.element.createElement("tbody", null, i.map(function(e, t) {
                return wp.element.createElement("tr", {
                    className: "membership"
                }, wp.element.createElement("td", null, e.hasOwnProperty("date") ? wp.element.createElement("a", {
                    target: "_blank",
                    className: "",
                    href: e.invoice_link
                }, e.date) : ""), e.hasOwnProperty("level") ? wp.element.createElement("td", {
                    dangerouslySetInnerHTML: {
                        __html: e.level
                    }
                }) : "", e.hasOwnProperty("amount") ? wp.element.createElement("td", {
                    dangerouslySetInnerHTML: {
                        __html: e.amount
                    }
                }) : "", e.hasOwnProperty("status") ? wp.element.createElement("td", {
                    dangerouslySetInnerHTML: {
                        __html: e.status
                    }
                }) : "")
            }))) : wp.element.createElement("div", {
                className: "vbp_message"
            }, window.vibebp.components.pmpro.translations.no_invoices)))
        };

    function Jc(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function Mc(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function qc(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Fc(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Hc = wp.element,
        Uc = (Hc.createElement, Hc.useState),
        zc = Hc.useEffect,
        Rc = (Hc.Fragment, Hc.render, wp.data),
        Wc = (Rc.dispatch, Rc.select),
        Yc = function(e) {
            var t = Fc(Uc({}), 2),
                n = t[0],
                r = t[1],
                a = Fc(Uc([]), 2),
                i = a[0],
                l = a[1],
                o = Fc(Uc(""), 2),
                c = o[0],
                s = o[1];
            return zc(function() {
                var e = Wc("vibebp").getMenu().filter(function(e) {
                    return "memberships" === e.parent
                });
                e.map(function(t, n) {
                    -1 === e.findIndex(function(e) {
                        return e.class.indexOf("current-menu-item") > -1
                    }) && (e[n].class.push("current-menu-item"), "" == c && s(e[n].css_id))
                }), l(e), -1 == document.querySelector("body").classList.value.indexOf("withsidebar") && document.querySelector("body").classList.add("withsidebar")
            }, []), wp.element.createElement("div", {
                className: "vibebp_sidebars"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_left_sidebar"
            }, wp.element.createElement("h3", null, window.vibebp.components.pmpro.label), i.map(function(e, t) {
                var a = e.class.join(" ") + " " + e.css_id;
                return wp.element.createElement("a", {
                    className: a,
                    onClick: function(a) {
                        var o = function(e) {
                            for (var t = 1; t < arguments.length; t++) {
                                var n = null != arguments[t] ? arguments[t] : {};
                                t % 2 ? Mc(n, !0).forEach(function(t) {
                                    qc(e, t, n[t])
                                }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : Mc(n).forEach(function(t) {
                                    Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                                })
                            }
                            return e
                        }({}, n);
                        o.filter = e.css_id, o.page = 1, n.css_id !== o.filter && r(o), s(e.css_id);
                        var c = Jc(i),
                            m = c.findIndex(function(e) {
                                return e.class.indexOf("current-menu-item") > -1
                            });
                        c[m].class.splice(c[m].class.indexOf("current-menu-item"), 1), c[t].class.push("current-menu-item"), l(c)
                    }
                }, e.name)
            }))), wp.element.createElement("div", {
                className: "vibebp_main"
            }, "memberships" == c ? wp.element.createElement(gc, null) : "account" == c ? wp.element.createElement(kc, null) : "invoices" == c ? wp.element.createElement(Lc, null) : ""))
        };

    function Bc(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var Gc = wp.element,
        Kc = (Gc.createElement, Gc.useState),
        Qc = Gc.useEffect,
        $c = (Gc.Fragment, Gc.render, wp.data),
        Vc = ($c.dispatch, $c.select),
        Xc = function(e) {
            var t = Bc(Kc(), 2),
                n = t[0],
                r = t[1],
                a = Bc(Kc({}), 2),
                i = a[0],
                l = a[1],
                o = Bc(Kc({}), 2),
                c = o[0],
                s = o[1],
                m = Bc(Kc({}), 2),
                p = m[0],
                u = m[1];
            return Qc(function() {
                if (e.page) {
                    var t = e.page.split("__");
                    fetch("".concat(window.vibebp.api.url, "/getPost/"), {
                        method: "post",
                        body: JSON.stringify({
                            post_type: t[1],
                            id: t[2],
                            token: Vc("vibebp").getToken()
                        })
                    }).then(function(e) {
                        return e.json()
                    }).then(function(e) {
                        r(e.content), l(e.scripts), u(e.styles), s(e.objects)
                    })
                }
            }, [e.page]), Qc(function() {
                c && Object.keys(c).map(function(e) {
                    window[e] = c[e]
                })
            }, [c]), Qc(function() {
                i && Object.keys(i).map(function(e) {
                    var t = document.createElement("script");
                    t.src = i[e], t.id = e, document.body.appendChild(t), t.onload = function() {
                        setTimeout(function() {
                            document.dispatchEvent(new CustomEvent(e + "_loaded"))
                        }, 300)
                    }
                })
            }, [i]), Qc(function() {
                p && Object.keys(p).map(function(e) {
                    var t = document.createElement("link");
                    t.rel = "stylesheet", t.href = p[e], t.type = "text/css", t.id = e, document.head.appendChild(t)
                })
            }, [p]), wp.element.createElement("div", {
                dangerouslySetInnerHTML: {
                    __html: n
                }
            })
        };

    function Zc(e) {
        return function(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = new Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
        }(e) || function(e) {
            if (Symbol.iterator in Object(e) || "[object Arguments]" === Object.prototype.toString.call(e)) return Array.from(e)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance")
        }()
    }

    function es(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ts = wp.element,
        ns = (ts.createElement, ts.useState),
        rs = ts.useEffect,
        as = ts.Fragment,
        is = (ts.render, wp.data),
        ls = (is.dispatch, is.select),
        os = function(e) {
            var t = es(ns(!1), 2),
                n = t[0],
                r = t[1],
                a = es(ns(!1), 2),
                i = a[0],
                l = a[1],
                o = es(ns([]), 2),
                c = o[0],
                s = o[1],
                m = es(ns({
                    complete: 0,
                    total: 0,
                    total_field_count: 1
                }), 2),
                p = m[0],
                u = m[1],
                d = es(ns(100), 2),
                f = d[0],
                w = d[1];
            ls("vibebp").getUser();
            rs(function() {
                fetch("".concat(window.vibebp.api.url, "/getProfileCompleteness"), {
                    method: "post",
                    body: JSON.stringify({
                        token: ls("vibebp").getToken()
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (w(e.completeness), e.fields.length && (s(e.fields), u({
                        complete: 0,
                        total: e.fields.length,
                        total_field_count: e.total_field_count
                    }), l(e.fields[0].id)))
                })
            }, []);
            return wp.element.createElement(as, null, f < 100 ? wp.element.createElement("div", {
                className: n ? "active completeProgress" : "completeProgress",
                onClick: function() {
                    return r(!0)
                }
            }, wp.element.createElement("label", null, window.vibebp.translations.complete_profile), wp.element.createElement(it, {
                progress: f,
                size: "xs"
            }), f, " %") : "", n ? wp.element.createElement("div", {
                className: "profile_completeness_wrapper"
            }, wp.element.createElement("span", {
                onClick: function() {
                    return r(!1)
                }
            }), wp.element.createElement("div", {
                className: "profile_completeness"
            }, wp.element.createElement("div", {
                className: "profile_completeness_heading"
            }, wp.element.createElement("h2", null, window.vibebp.translations.complete_your_profile, " ", wp.element.createElement("span", null, p.complete + "/" + p.total)), wp.element.createElement("span", {
                className: "vicon vicon-close",
                onClick: function() {
                    return r(!1)
                }
            })), wp.element.createElement("div", {
                className: "profile_completeness_content"
            }, c.map(function(e, t) {
                if (e.id == i) return wp.element.createElement("div", {
                    className: "profile_field"
                }, wp.element.createElement(pn, {
                    field: e,
                    update: function(e) {
                        return function(e, t) {
                            var n = Zc(c);
                            n[t] = e, s(n);
                            var r = f + Math.round(100 / p.total_field_count, 2);
                            r > 100 && (r = 100), w(r), u({
                                complete: parseInt(p.complete) + 1,
                                total: p.total
                            })
                        }(e, t)
                    }
                }))
            })), wp.element.createElement("div", {
                className: "xprofile_pagination"
            }, i && c.findIndex(function(e) {
                return e.id == i
            }) > 0 ? wp.element.createElement("span", {
                className: "prev_next",
                onClick: function() {
                    return l(c[c.findIndex(function(e) {
                        return e.id == i
                    }) - 1].id)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-arrow-left"
            })) : wp.element.createElement("span", null), i && c.findIndex(function(e) {
                return e.id == i
            }) < c.length - 1 ? wp.element.createElement("span", {
                className: "prev_next",
                onClick: function() {
                    return l(c[c.findIndex(function(e) {
                        return e.id == i
                    }) + 1].id)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-arrow-right"
            })) : wp.element.createElement("span", null)))) : "")
        };

    function cs(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var ss = wp.element,
        ms = (ss.createElement, ss.useState),
        ps = ss.useEffect,
        us = (ss.Fragment, ss.render, wp.data),
        ds = us.dispatch,
        fs = us.select,
        ws = function(e) {
            var t = cs(ms("dashboard"), 2),
                n = t[0],
                r = t[1],
                a = cs(ms(!1), 2),
                i = a[0],
                l = a[1],
                o = cs(ms([]), 2),
                c = o[0],
                s = o[1],
                m = cs(ms(0), 2),
                p = m[0],
                u = m[1],
                d = cs(ms(!1), 2),
                f = d[0],
                w = d[1],
                v = cs(ms(!1), 2),
                b = v[0],
                y = v[1],
                g = cs(ms(!1), 2),
                h = g[0],
                E = g[1],
                _ = cs(ms([]), 2),
                O = _[0],
                N = _[1],
                j = cs(ms(fs("vibebp").getUser()), 2),
                k = j[0],
                S = j[1],
                P = cs(ms(fs("vibebp").getToken()), 2),
                x = P[0],
                A = P[1],
                C = cs(ms(), 2),
                T = C[0],
                I = C[1],
                D = cs(ms({}), 2),
                L = D[0],
                J = D[1],
                M = cs(ms(!1), 2),
                q = M[0],
                F = M[1];
            ps(function() {
                document.addEventListener("userLoaded", function() {
                    x || (A(fs("vibebp").getToken()), S(fs("vibebp").getUser()))
                }), x && (document.addEventListener("component_loaded", function(e) {
                    r(e.detail.component)
                }), fs("vibebp").getData("loggedinMenu") ? N(fs("vibebp").getData("loggedinMenu")) : fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                    method: "post",
                    body: JSON.stringify({
                        token: x
                    })
                }).then(function(e) {
                    return e.json()
                }).then(function(e) {
                    e.status && (ds("vibebp").setData("loggedinMenu", e.menu), N(e.menu))
                }))
            }, []), ps(function() {
                setTimeout(function() {
                    s(fs("vibebp").getNotifications()), u(p + 1)
                }, 5e3)
            }, [p]), ps(function() {
                window.innerWidth < 1280 ? (y(!0), -1 == document.querySelector("body").classList.contains("leftsidebar_minimised") && document.querySelector("body").classList.add("leftsidebar_minimised")) : (y(!1), document.querySelector("body").classList.contains("leftsidebar_minimised") > -1 && document.querySelector("body").classList.remove("leftsidebar_minimised")), window.addEventListener("resize", function() {
                    window.innerWidth < 1280 ? (y(!0), -1 == document.querySelector("body").classList.contains("leftsidebar_minimised") && document.querySelector("body").classList.add("leftsidebar_minimised")) : (y(!1), document.querySelector("body").classList.contains("leftsidebar_minimised") > -1 && document.querySelector("body").classList.remove("leftsidebar_minimised"))
                })
            }, []);
            return x ? wp.element.createElement("div", {
                className: "profile_grid"
            }, wp.element.createElement("div", {
                className: "profile_grid_header"
            }, wp.element.createElement("div", {
                className: "start_block"
            }, "dashboard" == n ? wp.element.createElement("div", {
                className: "dashboard_intro"
            }, wp.element.createElement("h4", null, wp.element.createElement("strong", null, window.vibebp.translations.hello), " ,"), wp.element.createElement("h3", null, k.displayname, " 👋")) : wp.element.createElement("span", {
                onClick: function() {
                    y(!b), b ? document.querySelector("body").classList.remove("leftsidebar_minimised") : document.querySelector("body").classList.add("leftsidebar_minimised")
                }
            }, wp.element.createElement("span", {
                className: b ? window.innerWidth < 480 ? "vicon vicon-angle-down" : "vicon vicon-angle-right" : window.innerWidth < 480 ? "vicon vicon-angle-up" : "vicon vicon-angle-left"
            }), wp.element.createElement("span", null, b ? window.vibebp.translations.show_panel : window.vibebp.translations.hide_panel))), wp.element.createElement("span", {
                onDragOver: function(e) {
                    console.log(e), e.clientY < 40 ? (J({
                        transform: "translateY(" + e.clientY + "px)"
                    }), e.preventDefault()) : (J({
                        transform: "translateY(0px)"
                    }), F(!0))
                }
            }, wp.element.createElement("span", {
                draggable: "true",
                style: L,
                onTouchMove: function(e) {
                    console.log(e)
                },
                ref: function(e) {
                    e && !T && I(e)
                }
            }, q ? wp.element.createElement("div", {
                class: "lds-ripple"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null)) : window.vibebp.translations.drag_to_refresh)), wp.element.createElement("div", {
                className: "end_block"
            }, wp.element.createElement("div", {
                className: "notifications",
                onClick: function() {
                    return w(!f)
                }
            }, c.length ? wp.element.createElement("span", {
                className: "count"
            }, c.length) : "", wp.element.createElement("span", {
                className: "vicon vicon-bell"
            }), f && c.length ? wp.element.createElement("div", {
                className: "notification_list"
            }, c.map(function(e) {
                return wp.element.createElement("div", {
                    className: "notification_item"
                }, wp.element.createElement("span", {
                    className: e.hasOwnProperty("icon") ? e.icon : "vicon vicon-alert"
                }), e.hasOwnProperty("sub") ? wp.element.createElement("span", null, e.sub) : "", wp.element.createElement("span", null, e.text))
            })) : ""), wp.element.createElement("div", {
                className: "user",
                onClick: function() {
                    return E(!h)
                }
            }, wp.element.createElement($n, {
                type: "user",
                id: {
                    user_id: fs("vibebp").getUser().id
                }
            }), h ? wp.element.createElement("div", {
                className: "vibebp_profile_menu_wrapper"
            }, wp.element.createElement("div", {
                className: "vibebp_profile_usermenu_content"
            }, O.length ? O.map(function(e) {
                return wp.element.createElement("span", {
                    className: e.classes.join(" "),
                    onClick: function() {
                        return function(e) {
                            e.classes.indexOf("bp-menu") > -1 ? (r(e.css_id), ds("vibebp").setComponent(e.css_id)) : window.location.href = e.url
                        }(e)
                    },
                    dangerouslySetInnerHTML: {
                        __html: e.title
                    }
                })
            }) : "", wp.element.createElement("span", {
                onClick: function() {
                    ds("vibebp").logout()
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-power-off"
            }), window.vibebp.translations.logout))) : ""), wp.element.createElement(os, null), window.vibebp.settings.firebase_config ? wp.element.createElement("span", {
                className: "login_extras",
                onClick: function() {
                    l(!i);
                    var e = new CustomEvent("loginExtras", {
                        detail: {
                            loginExtras: !0
                        }
                    });
                    document.dispatchEvent(e)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-align-justify"
            })) : "")), "dashboard" === n ? wp.element.createElement(W, null) : "activity" === n ? wp.element.createElement(Ye, {
                type: "personal"
            }) : "profile" === n ? wp.element.createElement(qn, null) : "notifications" === n ? wp.element.createElement(or, null) : "messages" === n ? wp.element.createElement(ca, null) : "friends" === n ? wp.element.createElement(Xa, null) : "groups" === n ? wp.element.createElement(Cl, null) : "settings" === n ? wp.element.createElement(ho, null) : "followers" === n ? wp.element.createElement(Pi, null) : "shop" === n ? wp.element.createElement(mc, null) : "memberships" === n ? wp.element.createElement(Yc, null) : -1 !== n.indexOf("post_type") ? wp.element.createElement(Xc, {
                page: n
            }) : wp.element.createElement("div", {
                id: n + "_component"
            })) : wp.element.createElement("div", {
                className: "loading-roller"
            }, wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null), wp.element.createElement("div", null))
        };

    function vs(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter(function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            })), n.push.apply(n, r)
        }
        return n
    }

    function bs(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? vs(n, !0).forEach(function(t) {
                ys(e, t, n[t])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : vs(n).forEach(function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            })
        }
        return e
    }

    function ys(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function gs(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var hs = wp.element,
        Es = (hs.createElement, hs.useState),
        _s = (hs.useEffect, hs.Fragment, hs.render, wp.data),
        Os = (_s.dispatch, _s.select, function(e) {
            var t = gs(Es({
                    dark: !1,
                    widgets: []
                }), 2),
                n = t[0],
                a = t[1];
            return wp.element.createElement(r.Provider, {
                value: bs({}, n, {
                    update: function(e, t) {
                        var r = bs({}, n);
                        "remove" === e ? delete r[t] : r[e] = t, a(r)
                    }
                })
            }, wp.element.createElement("div", {
                className: n.dark ? "vibebp_myprofile dark_theme " + window.vibebp.style : "vibebp_myprofile " + window.vibebp.style
            }, wp.element.createElement(w, null), wp.element.createElement(ws, null)))
        });
    n(0);

    function Ns(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                a = !1,
                i = void 0;
            try {
                for (var l, o = e[Symbol.iterator](); !(r = (l = o.next()).done) && (n.push(l.value), !t || n.length !== t); r = !0);
            } catch (e) {
                a = !0, i = e
            } finally {
                try {
                    r || null == o.return || o.return()
                } finally {
                    if (a) throw i
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    var js = wp.element,
        ks = (js.createElement, js.useState),
        Ss = js.useEffect,
        Ps = js.Fragment,
        xs = js.render,
        As = wp.data,
        Cs = (As.dispatch, As.select);
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("vibebp_member") && xs(wp.element.createElement(function(e) {
            var t = Ns(ks({}), 2),
                n = t[0],
                r = t[1];
            return Ss(function() {
                document.addEventListener("userLoaded", function() {
                    var e = Cs("vibebp").getUser();
                    document.querySelector("body").classList.contains("page") && !document.querySelector("body").classList.contains("profile") || document.querySelector("body").classList.contains("my-profile") && parseInt(e.id) === parseInt(window.vibebp.user_id) ? (r(e), document.querySelector("body").classList.add("vibebp_my_profile")) : document.querySelector("body").classList.remove("vibebp_my_profile"), window.onpopstate = function() {
                        console.log("detected");
                        var e = window.location.href.split("#");
                        Array.isArray(e) && e.length > 1 && e.map(function(e, t) {
                            t > 0 && e.indexOf("&") ? e.split("&").map(function(e) {
                                e.indexOf("=") && ("component" == e.split("=")[0] && setTimeout(function() {
                                    console.log("not same")
                                }, 200))
                            }) : e.indexOf("=") && "component" == e.split("=")[0] && setTimeout(function() {
                                console.log("not same")
                            }, 200)
                        })
                    }
                })
            }, []), wp.element.createElement(Ps, null, n && Object.keys(n).length ? wp.element.createElement(Os, {
                user: n
            }) : wp.element.createElement("div", {
                dangerouslySetInnerHTML: {
                    __html: e.def
                }
            }))
        }, {
            def: document.getElementById("vibebp_member").innerHTML
        }), document.getElementById("vibebp_member"))
    }, !1)
}]);