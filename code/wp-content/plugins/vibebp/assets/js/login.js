! function(e) {
    var t = {};

    function n(i) {
        if (t[i]) return t[i].exports;
        var r = t[i] = {
            i: i,
            l: !1,
            exports: {}
        };
        return e[i].call(r.exports, r, r.exports, n), r.l = !0, r.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, i) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: i
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
        var i = Object.create(null);
        if (n.r(i), Object.defineProperty(i, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var r in e) n.d(i, r, function(t) {
                return e[t]
            }.bind(null, r));
        return i
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 0)
}([function(e, t, n) {
    "use strict";

    function i(e) {
        return (i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function r(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                i = !0,
                r = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(i = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); i = !0);
            } catch (e) {
                r = !0, o = e
            } finally {
                try {
                    i || null == s.return || s.return()
                } finally {
                    if (r) throw o
                }
            }
            return n
        }(e, t) || function(e, t) {
            if (!e) return;
            if ("string" == typeof e) return o(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            "Object" === n && e.constructor && (n = e.constructor.name);
            if ("Map" === n || "Set" === n) return Array.from(e);
            if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return o(e, t)
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function o(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }
    n.r(t);
    var a = wp.element,
        s = (a.createElement, a.useState),
        c = a.useEffect,
        l = a.Fragment,
        u = (a.render, wp.data),
        d = u.dispatch,
        p = (u.select, function(e) {
            var t = r(s({}), 2),
                n = t[0],
                o = t[1],
                a = r(s(null), 2),
                u = a[0],
                p = a[1],
                b = r(s(!1), 2),
                f = b[0],
                m = b[1];
            c((function() {
                window.vibebp.settings.firebase_config && "object" == ("undefined" == typeof firebase ? "undefined" : i(firebase)) && 0 === firebase.apps.length && firebase.initializeApp(JSON.parse(window.vibebp.settings.firebase_config))
            }), []), c((function() {
                if (window.vibebp.settings.firebase_config) {
                    var e = {};
                    Object.keys(window.vibebp.settings.auth).map((function(t) {
                        window.vibebp.settings.auth[t] && ("google" === t && (e.google = new firebase.auth.GoogleAuthProvider, e.google.addScope("profile"), e.google.addScope("email")), "twitter" === t && (e.twitter = new firebase.auth.TwitterAuthProvider), "github" === t && (e.github = new firebase.auth.GithubAuthProvider), "apple" === t && (e.apple = new firebase.auth.OAuthProvider("apple.com"), e.apple.addScope("email"), e.apple.addScope("name")), "facebook" === t && (e.facebook = new firebase.auth.FacebookAuthProvider))
                    })), o(e)
                }
            }), []);
            var g = function(t, n) {
                    fetch("".concat(window.vibebp.api.url, "/sociallogin?client_id=").concat(window.vibebp.settings.client_id), {
                        method: "post",
                        body: JSON.stringify({
                            social: t.credential.signInMethod,
                            client_id: window.vibebp.settings.client_id,
                            user: {
                                email: t.user.email,
                                uid: t.user.uid,
                                name: t.user.displayName,
                                avatar: t.user.photoURL,
                                phoneNumber: t.user.phoneNumber,
                                last_login: t.user.metadata.lastSignInTime,
                                create_time: t.user.metadata.creationTime
                            },
                            idToken: n
                        })
                    }).then((function(e) {
                        return e.json()
                    })).then((function(n) {
                        n.status && (localforage.setItem("bp_login_token", n.token), fetch("".concat(window.vibebp.api.validate_token, "?client_id=").concat(window.vibebp.settings.client_id), {
                            method: "post",
                            body: n.token
                        }).then((function(e) {
                            return e.json()
                        })).then((function(i) {
                            if (i.hasOwnProperty("data")) {
                                "undefined" != typeof firebase && firebase && firebase.hasOwnProperty("database") && window.vibebp.settings.firebase_config && firebase.database().ref("users/".concat(i.data.data.user.id, "/firebaseUid")).set(t.user.uid), localforage.setItem("bp_user", JSON.stringify(i.data.data.user)), sessionStorage.setItem("bp_user", JSON.stringify(i.data.data.user)), e.setUser(i.data.data.user), d("vibebp").setToken(n.token), d("vibebp").setUser(i.data.data.user), document.querySelector("body").classList.add("vibebp-logged-in");
                                var r = new CustomEvent("userLoaded", {
                                    detail: {
                                        userLoaded: !0
                                    }
                                });
                                if (document.dispatchEvent(r), window.vibebp.settings.login_redirect && i.hasOwnProperty("redirect_component") && i.redirect_component) {
                                    var o = "";
                                    o = i.redirect_component.split("http").length > 1 ? i.redirect_component : i.redirect_component.split("#").length > 1 ? window.vibebp.settings.login_redirect + i.data.data.user.slug + i.redirect_component : window.vibebp.settings.login_redirect + i.data.data.user.slug + "#" + i.redirect_component, window.location.href = o
                                }
                                var a = sessionStorage.getItem("loggedinmenu");
                                a ? d("vibebp").setData("loggedinMenu", JSON.parse(a)) : fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                                    method: "post",
                                    body: JSON.stringify({
                                        token: n.token
                                    })
                                }).then((function(e) {
                                    return e.json()
                                })).then((function(e) {
                                    e.status && (sessionStorage.setItem("loggedinmenu", JSON.stringify(e.menu)), d("vibebp").setData("loggedinMenu", e.menu))
                                }))
                            }
                        })))
                    }))
                },
                w = function(e) {
                    return new Promise((function(t) {
                        window.vibebp.settings.hasOwnProperty("firebase_config") && window.vibebp.settings.firebase_config && "undefined" != typeof firebase && firebase && firebase.hasOwnProperty("database") && firebase.database && window.vibebp.settings.session_lock ? firebase.database().ref("users").orderByChild("firebaseUid").equalTo(e.uid).once("value", (function(e) {
                            if (e.exists()) {
                                var n = e.val();
                                if (n && Object.keys(n).length) {
                                    for (var i in n) n[i].hasOwnProperty("status") && 1 == n[i].status && t(window.vibebp.translations.online_from_other_account);
                                    t()
                                } else t()
                            } else t()
                        })) : t()
                    }))
                };
            return wp.element.createElement(l, null, window.vibebp.settings.email_login ? "" : wp.element.createElement(l, null, wp.element.createElement("h2", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.translations.login_heading
                }
            }), wp.element.createElement("p", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.translations.login_message
                }
            })), u ? wp.element.createElement("div", {
                className: "vbp_message error",
                dangerouslySetInnerHTML: {
                    __html: u
                }
            }) : "", window.vibebp.settings.firebase_config ? Object.keys(window.vibebp.settings.auth).map((function(e) {
                if (window.vibebp.settings.auth[e]) return wp.element.createElement("a", {
                    className: f == e ? "button is-primary is-loading" : "button is-primary",
                    onClick: function() {
                        return function(e) {
                            window.vibebp.settings.firebase_config && n && n[e] ? (m(e), p(null), firebase.auth().signInWithPopup(n[e]).then((function(e) {
                                var t = e.user;
                                w(t).then((function(n) {
                                    n && n.length ? p(n) : (d("vibebp").setData("firebaseUser", t), t.getIdToken().then((function(t) {
                                        g(e, t)
                                    })))
                                }))
                            })).catch((function(e) {
                                console.log(e), "auth/account-exists-with-different-credential" === e.code && (console.log("account exists in different login credentials"), firebase.auth().fetchSignInMethodsForEmail(e.email).then((function(t) {
                                    if (m(!1), Array.isArray(t)) {
                                        if (t.indexOf("google.com") > -1)(n = new firebase.auth.GoogleAuthProvider).addScope("profile"), n.addScope("email");
                                        else if (t.indexOf("facebook.com") > -1) var n = new firebase.auth.FacebookAuthProvider;
                                        else if (t.indexOf("twitter.com") > -1) n = new firebase.auth.TwitterAuthProvider;
                                        else if (t.indexOf("github.com") > -1) n = new firebase.auth.GithubAuthProvider;
                                        n.setCustomParameters({
                                            login_hint: e.email
                                        }), firebase.auth().signInWithPopup(n).then((function(e) {
                                            var t = e.user;
                                            w(t).then((function(n) {
                                                n && n.length ? p(n) : t.getIdToken().then((function(t) {
                                                    g(e, t)
                                                }))
                                            }))
                                        })).catch((function(e) {
                                            console.log(e)
                                        }))
                                    }
                                })))
                            }))) : document.dispatchEvent(new CustomEvent("login_with_" + e, {
                                detail: {
                                    key: e
                                }
                            }))
                        }(e)
                    }
                }, window.vibebp.settings.icons && window.vibebp.settings.icons[e] ? wp.element.createElement("span", {
                    className: "vicon",
                    dangerouslySetInnerHTML: {
                        __html: window.vibebp.settings.icons[e]
                    }
                }) : wp.element.createElement("span", {
                    className: "icon vicon vicon-" + e
                }), wp.element.createElement("span", null, window.vibebp.translations[e]))
            })) : "", window.vibebp.settings.email_login ? "" : wp.element.createElement("a", {
                className: "button is-primary",
                onClick: function() {
                    return e.setemailSignIn(!0)
                }
            }, wp.element.createElement("span", {
                className: "icon vicon vicon-email"
            }), wp.element.createElement("span", null, window.vibebp.translations.email_login)), wp.element.createElement("div", {
                className: "extra_details"
            }, window.vibebp.settings.enable_registrations ? isNaN(window.vibebp.settings.enable_registrations) ? wp.element.createElement("p", null, window.vibebp.translations.no_account, wp.element.createElement("a", {
                className: "vibebp_forward_link",
                href: window.vibebp.settings.enable_registrations
            }, window.vibebp.translations.create_one, " ", wp.element.createElement("span", {
                className: "vicon vicon-arrow-right"
            }))) : wp.element.createElement("p", null, window.vibebp.translations.no_account, wp.element.createElement("a", {
                className: "vibebp_forward_link",
                onClick: function() {
                    return e.setRegistration(!0)
                }
            }, window.vibebp.translations.create_one, " ", wp.element.createElement("span", {
                className: "vicon vicon-arrow-right"
            }))) : "", wp.element.createElement("p", null, window.vibebp.translations.login_terms)))
        });

    function b(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(e);
            t && (i = i.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, i)
        }
        return n
    }

    function f(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? b(Object(n), !0).forEach((function(t) {
                m(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : b(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }

    function m(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }
    var g = {
        setUser: function(e) {
            return {
                type: "SET_USER",
                user: e
            }
        },
        addNotification: function(e) {
            return {
                type: "ADD_NOTIFICATION",
                notification: f(f({}, e), {}, {
                    id: (new Date).getTime()
                })
            }
        },
        removeNotification: function(e) {
            return {
                type: "REMOVE_NOTIFICATION",
                notification: e
            }
        },
        getUser: function() {
            return {
                type: "GET_USER"
            }
        },
        verifyUser: function(e, t) {
            return {
                type: "VERIFY_USER_API",
                path: e,
                token: t
            }
        },
        setToken: function(e) {
            return {
                type: "SET_TOKEN",
                token: e
            }
        },
        logout: function() {
            var e = new CustomEvent("userLoaded", {
                detail: {
                    userLoaded: !0,
                    loggedOut: !0
                }
            });
            return document.dispatchEvent(e), localforage.removeItem("bp_login_token"), sessionStorage.removeItem("bp_user"), document.querySelector("body").classList.add("vibebp_logout"), window.location.href = window.vibebp.settings.logout_redirect + "?vibebp_logout=1", {
                type: "LOGOUT"
            }
        },
        setMenu: function(e) {
            return {
                type: "SET_MENU",
                menu: e
            }
        },
        setOnlineMembers: function(e) {
            return {
                type: "SET_ONLINE_MEMBERS",
                onlineMembers: e
            }
        },
        setData: function(e, t) {
            return {
                type: "SET_DATA",
                data_type: e,
                data: t
            }
        },
        setComponent: function(e) {
            var t = window.location.href.split("#")[0] + "#",
                n = [],
                i = (window.location.href.replace(/[#&]+([^=&]+)=([^&]*)/gi, (function(e, t, i) {
                    n[t] = i
                })), ""),
                r = "",
                o = "";
            return Object.keys(n).map((function(e) {
                "component" !== e && (i += "&" + e + "=" + n[e]), "action" == e && (r = n[e]), "id" == e && (o = n[e])
            })), t += "component=" + e, i.length && (t += i), window.location.href = t, document.querySelector("body").classList.forEach((function(e, t) {
                e.indexOf("vibebp-component") > -1 && document.querySelector("body").classList.remove(e)
            })), document.querySelector("body").classList.add("vibebp-component-" + e), {
                type: "SET_COMPONENT",
                component: e,
                action: r,
                id: o
            }
        },
        setAction: function(e) {
            var t = window.location.href.split("#")[0] + "#",
                n = [],
                i = (window.location.href.replace(/[#&]+([^=&]+)=([^&]*)/gi, (function(e, t, i) {
                    n[t] = i
                })), ""),
                r = "",
                o = "";
            return Object.keys(n).map((function(e) {
                "component" !== e && "action" !== e && (i += "&" + e + "=" + n[e]), "component" == e && (o = n[e]), "id" == e && (r = n[e])
            })), o && (t += "component=" + o, e && (t += "&action=" + e, r && (t += "&id=" + r))), i.length && (t += i), window.location.href = t, {
                type: "SET_ACTION",
                action: e
            }
        },
        setId: function(e) {
            var t = window.location.href.split("#")[0] + "#",
                n = [],
                i = (window.location.href.replace(/[#&]+([^=&]+)=([^&]*)/gi, (function(e, t, i) {
                    n[t] = i
                })), ""),
                r = "",
                o = "";
            return Object.keys(n).map((function(e) {
                "component" !== e && "action" !== e && "id" != e && (i += "&" + e + "=" + n[e]), "action" == e && (o = n[e]), "component" == e && (r = n[e])
            })), r && (t += "component=" + r, o && (t += "&action=" + o, e && (t += "&id=" + e))), i.length && (t += i), window.location.href = t, {
                type: "SET_ID",
                id: e
            }
        },
        sendRealTimeNotification: function(e, t) {
            return {
                type: "SEND_REALTIME_NOTIFICATION",
                user_id: e,
                message: t
            }
        },
        removeRealTimeNotification: function(e, t) {
            return {
                type: "REMOVE_REALTIME_NOTIFICATION",
                user_id: e,
                message: t
            }
        }
    };

    function w(e) {
        return function(e) {
            if (Array.isArray(e)) return v(e)
        }(e) || function(e) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e)
        }(e) || function(e, t) {
            if (!e) return;
            if ("string" == typeof e) return v(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            "Object" === n && e.constructor && (n = e.constructor.name);
            if ("Map" === n || "Set" === n) return Array.from(e);
            if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return v(e, t)
        }(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function v(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }

    function y(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(e);
            t && (i = i.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, i)
        }
        return n
    }

    function h(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? y(Object(n), !0).forEach((function(t) {
                _(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : y(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }

    function _(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }
    var E = wp.data,
        S = E.registerStore,
        O = (E.combineReducers, E.useStore, {
            user: {},
            menu: [],
            notifications: [],
            component: "",
            action: ""
        }),
        k = S("vibebp", {
            reducer: function() {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : O,
                    t = arguments.length > 1 ? arguments[1] : void 0;
                switch (t.type) {
                    case "SET_USER":
                        return sessionStorage.setItem("bp_user", JSON.stringify(t.user)), h(h({}, e), {}, {
                            user: t.user
                        });
                    case "ADD_NOTIFICATION":
                        var n = w(e.notifications),
                            i = [];
                        return n.map((function(e, t) {
                            e.id >= (new Date).getTime() - 3e3 && i.push(e)
                        })), i.unshift(h({}, t.notification)), h(h({}, e), {}, {
                            notifications: i
                        });
                    case "REMOVE_NOTIFICATION":
                        var r = w(e.notifications);
                        return r.splice(r.findIndex((function(e) {
                            return t.notification.id === e.id
                        })), 1), h(h({}, e), {}, {
                            notifications: r
                        });
                    case "GET_NOTIFICATIONS":
                        return e.notifications;
                    case "GET_USER":
                        return e.user;
                    case "SET_MENU":
                        return h(h({}, e), {}, {
                            menu: t.menu
                        });
                    case "GET_MENU":
                        return e.menu;
                    case "SET_TOKEN":
                        return h(h({}, e), {}, {
                            token: t.token
                        });
                    case "SET_COMPONENT":
                        var o = new CustomEvent("component_loaded", {
                            detail: {
                                component: t.component,
                                action: t.action,
                                id: t.id,
                                user: e.user,
                                token: e.token
                            }
                        });
                        return document.dispatchEvent(o), h(h({}, e), {}, {
                            component: t.component,
                            action: t.action,
                            id: t.id
                        });
                    case "SET_ACTION":
                        return h(h({}, e), {}, {
                            action: t.action
                        });
                    case "SET_ID":
                        return h(h({}, e), {}, {
                            action: t.id
                        });
                    case "SET_ONLINE_MEMBERS":
                        return h(h({}, e), {}, {
                            onlineMembers: t.onlineMembers
                        });
                    case "SET_DATA":
                        var a = h({}, e.data);
                        return a[t.data_type] = t.data, h(h({}, e), {}, {
                            data: a
                        });
                    case "SEND_REALTIME_NOTIFICATION":
                        var s = h({}, e.user);
                        return !e.hasOwnProperty("realTimeNotification") || e.realTimeNotification.message != t.message && e.realTimeNotification.user_id != t.user_id ? (window.vibebp.settings.firebase_config && window.vibebp.settings.realtimenotifications && firebase.database().ref("notifications/".concat(t.user_id)).push({
                            time: (new Date).getTime(),
                            sender: s.id,
                            message: t.message
                        }), h(h({}, e), {}, {
                            realTimeNotification: {
                                user_id: t.user_id,
                                message: t.message
                            }
                        })) : e
                }
                return e
            },
            actions: g,
            selectors: {
                getUser: function(e) {
                    return e.user
                },
                verifyUser: function(e, t, n) {
                    return e.user
                },
                setUser: function(e, t) {
                    return e.user = t, t
                },
                getNotifications: function(e) {
                    return e.notifications
                },
                removeNotification: function(e, t) {
                    var n = e.notifications;
                    return n.splice(n.findIndex((function(e) {
                        return e.id === t
                    })), 1), e.notifications = n, n
                },
                logout: function(e) {
                    return e.user
                },
                setMenu: function(e, t) {
                    return e.menu
                },
                getMenu: function(e) {
                    return e.menu
                },
                getComponent: function(e) {
                    return e.component
                },
                getAction: function(e) {
                    return e.action
                },
                getId: function(e) {
                    return e.id
                },
                getToken: function(e) {
                    return e.token
                },
                setToken: function(e, t) {
                    return e.token = t, t
                },
                getOnlineMembers: function(e) {
                    return e.onlineMembers
                },
                getData: function(e, t) {
                    return !(!e.hasOwnProperty("data") || !e.data.hasOwnProperty(t)) && e.data[t]
                }
            },
            controls: {
                VERIFY_USER_API: function(e) {
                    var t = e.path,
                        n = e.token;
                    return fetch(t, {
                        method: "post",
                        body: n
                    }).then((function(e) {
                        return e.json()
                    })).then((function(e) {
                        if (e.hasOwnProperty("data")) return e.status ? (localforage.setItem("bp_user", JSON.stringify(e.data.data.user)), e.data.data.user) : (localforage.removeItem("bp_user"), localforage.removeItem("bp_login_token"), {})
                    }))
                },
                LOGOUT: function(e) {
                    var session = sessionStorage.getItem('bp_user');
                    var result = jQuery.parseJSON(session);
                    let LogoutMoegObj = {
                    "User identifier"   :jQuery("#footer_user_identifier").val(),                  
                    "Email" :jQuery("#footer_user_email").val(),
                  };
                    dataLayer.push({ ecommerce: null });
                    LogoutMoegObj.event = "mo_Logged_Out";

                    dataLayer.push(LogoutMoegObj);
                    console.log(LogoutMoegObj);
                    setTimeout(function(){
                     localforage.removeItem("bp_login_token"), localforage.removeItem("bp_user")
                    }, 500);

                   
                }
            },
            resolvers: {
                verifyUser: regeneratorRuntime.mark((function e(t, n) {
                    var i;
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2, g.verifyUser(t, n);
                            case 2:
                                return i = e.sent, e.abrupt("return", g.setUser(i));
                            case 4:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                setToken: regeneratorRuntime.mark((function e(t) {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", g.setToken(t));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                setUser: regeneratorRuntime.mark((function e(t) {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", g.setUser(t));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                addNotification: regeneratorRuntime.mark((function e(t) {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", g.addNotification(t));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                removeNotification: regeneratorRuntime.mark((function e(t) {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", g.removeNotification(t));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                logout: regeneratorRuntime.mark((function e() {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.next = 2, g.logout();
                            case 2:
                                return e.sent, e.abrupt("return", g.setUser({}));
                            case 4:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                })),
                setMenu: regeneratorRuntime.mark((function e(t) {
                    return regeneratorRuntime.wrap((function(e) {
                        for (;;) switch (e.prev = e.next) {
                            case 0:
                                return e.abrupt("return", g.setMenu(t));
                            case 1:
                            case "end":
                                return e.stop()
                        }
                    }), e)
                }))
            }
        });

    function N(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                i = !0,
                r = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(i = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); i = !0);
            } catch (e) {
                r = !0, o = e
            } finally {
                try {
                    i || null == s.return || s.return()
                } finally {
                    if (r) throw o
                }
            }
            return n
        }(e, t) || function(e, t) {
            if (!e) return;
            if ("string" == typeof e) return I(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            "Object" === n && e.constructor && (n = e.constructor.name);
            if ("Map" === n || "Set" === n) return Array.from(e);
            if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return I(e, t)
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function I(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }
    var T = wp.element,
        j = (T.createElement, T.useState),
        A = T.useEffect,
        P = T.Fragment,
        L = (T.render, wp.data),
        x = L.select,
        U = L.dispatch,
        C = function(e) {
            var t = N(j(""), 2),
                n = t[0],
                i = t[1],
                r = N(j(!1), 2),
                o = r[0],
                a = r[1],
                s = N(j("input"), 2),
                c = s[0],
                l = s[1],
                u = N(j("input"), 2),
                d = (u[0], u[1]),
                p = N(j(""), 2),
                b = p[0],
                f = p[1],
                m = N(j(!1), 2),
                g = m[0],
                w = m[1],
                v = N(j(""), 2),
                y = v[0],
                h = v[1],
                _ = N(j(""), 2),
                E = _[0],
                S = _[1],
                O = N(j(!1), 2),
                k = O[0],
                I = O[1],
                T = N(j(!0), 2),
                L = T[0],
                C = T[1];
            A((function() {
                window.vibebp.translations.login_checkbox.length && C(!1)
            }), []);
            var M = function() {
                    var t = 0;
                    n.indexOf("@") > -1 && !n.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) && (l("input is-danger"), h(window.vibebp.translations.invalid_email), t++), b.length < 4 && (d("input is-danger"), h(window.vibebp.translations.password_too_short), t++), !t && L && (a(!0), window.vibebp.settings.hasOwnProperty("firebase_config") && window.vibebp.settings.firebase_config && "undefined" != typeof firebase && firebase && firebase.hasOwnProperty("database") && firebase.database && window.vibebp.settings.session_lock ? fetch("".concat(window.vibebp.api.generate_token, "?client_id=").concat(window.vibebp.settings.client_id), {
                        method: "post",
                        body: JSON.stringify({
                            email: n,
                            password: b
                        })
                    }).then((function(e) {
                        return e.json()
                    })).then((function(t) {
                        t.status ? fetch("".concat(window.vibebp.api.validate_token, "?client_id=").concat(window.vibebp.settings.client_id), {
                            method: "post",
                            body: t.token
                        }).then((function(e) {
                            return e.json()
                        })).then((function(n) {
                            n.hasOwnProperty("data") && firebase.auth().signInWithEmailAndPassword(n.data.data.user.email, n.data.data.user.refresh_token).then((function(i) {
                                D(i).then((function(r) {
                                    if (r && r.length) h(r);
                                    else {
                                        a(!1), localforage.setItem("bp_login_token", t.token), x("vibebp").setToken(t.token), localforage.setItem("bp_user", n.data.data.user), sessionStorage.setItem("bp_user", JSON.stringify(n.data.data.user)), e.setUser(n.data.data.user), U("vibebp").setData("firebaseUser", i), n.data.data.user.firebaseUid = i.user.uid, R(n.data.data.user), U("vibebp").setUser(n.data.data.user);
                                        var o = new CustomEvent("userLoaded", {
                                            detail: {
                                                userLoaded: !0
                                            }
                                        });
                                        if (document.dispatchEvent(o), document.querySelector("body").classList.contains("logged-out") && document.querySelector("body").classList.remove("logged-out"), document.querySelector("body").classList.contains("logged-in") || document.querySelector("body").classList.add("logged-in"), window.vibebp.settings.login_redirect && n.hasOwnProperty("redirect_component") && n.redirect_component) {
                                            var s = "";
                                            s = n.redirect_component.split("http").length > 1 ? n.redirect_component : n.redirect_component.split("#").length > 1 ? window.vibebp.settings.login_redirect + n.data.data.user.slug + n.redirect_component : window.vibebp.settings.login_redirect + n.data.data.user.slug + "#" + n.redirect_component, window.location.href = s
                                        }
                                        fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                                            method: "post",
                                            body: JSON.stringify({
                                                token: t.token
                                            })
                                        }).then((function(e) {
                                            return e.json()
                                        })).then((function(e) {
                                            e.status && U("vibebp").setData("loggedinMenu", e.menu)
                                        }))
                                    }
                                }))
                            })).catch((function(i) {
                                400 != i.code && "auth/user-not-found" != i.code || (console.log("create user in firebase"), firebase.auth().createUserWithEmailAndPassword(n.data.data.user.email, n.data.data.user.refresh_token).then((function(i) {
                                    D(i).then((function(r) {
                                        if (r && r.length) h(r);
                                        else {
                                            a(!1), localforage.setItem("bp_login_token", t.token), x("vibebp").setToken(t.token), localforage.setItem("bp_user", n.data.data.user), sessionStorage.setItem("bp_user", JSON.stringify(n.data.data.user)), e.setUser(n.data.data.user), U("vibebp").setData("firebaseUser", i), n.data.data.user.firebaseUid = i.user.uid, R(n.data.data.user), U("vibebp").setUser(n.data.data.user);
                                            var o = new CustomEvent("userLoaded", {
                                                detail: {
                                                    userLoaded: !0
                                                }
                                            });
                                            if (document.dispatchEvent(o), document.querySelector("body").classList.contains("logged-out") && document.querySelector("body").classList.remove("logged-out"), document.querySelector("body").classList.contains("logged-in") || document.querySelector("body").classList.add("logged-in"), window.vibebp.settings.login_redirect && n.hasOwnProperty("redirect_component") && n.redirect_component) {
                                                var s = "";
                                                s = n.redirect_component.split("http").length > 1 ? n.redirect_component : n.redirect_component.split("#").length > 1 ? window.vibebp.settings.login_redirect + n.data.data.user.slug + n.redirect_component : window.vibebp.settings.login_redirect + n.data.data.user.slug + "#" + n.redirect_component, window.location.href = s
                                            }
                                            fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                                                method: "post",
                                                body: JSON.stringify({
                                                    token: t.token
                                                })
                                            }).then((function(e) {
                                                return e.json()
                                            })).then((function(e) {
                                                e.status && U("vibebp").setData("loggedinMenu", e.menu)
                                            }))
                                        }
                                    }))
                                })).catch((function(e) {
                                    console.log("register", e)
                                })))
                            }))
                        })) : h(t.message)
                    })) : fetch("".concat(window.vibebp.api.generate_token, "?client_id=").concat(window.vibebp.settings.client_id), {
                        method: "post",
                        body: JSON.stringify({
                            email: n,
                            password: b
                        })
                    }).then((function(e) {
                        return e.json()
                    })).then((function(t) {
                        a(!1), t.status ? (localforage.setItem("bp_login_token", t.token), x("vibebp").setToken(t.token), fetch("".concat(window.vibebp.api.validate_token, "?client_id=").concat(window.vibebp.settings.client_id), {
                            method: "post",
                            body: t.token
                        }).then((function(e) {
                            return e.json()
                        })).then((function(n) {
                            if (n.hasOwnProperty("data")) {
                                localforage.setItem("bp_user", n.data.data.user), sessionStorage.setItem("bp_user", JSON.stringify(n.data.data.user)), e.setUser(n.data.data.user), window.vibebp.settings.firebase_config && "function" == typeof firebase.database && !firebase.auth().currentUser && firebase.auth().signInWithEmailAndPassword(n.data.data.user.email, n.data.data.user.refresh_token).then((function(e) {
                                    U("vibebp").setData("firebaseUser", e), n.data.data.user.firebaseUid = e.user.uid, R(n.data.data.user)
                                })).catch((function(e) {
                                    console.log(e), 400 != e.code && "auth/user-not-found" != e.code || (console.log("create user in firebase"), firebase.auth().createUserWithEmailAndPassword(n.data.data.user.email, n.data.data.user.refresh_token).then((function(e) {
                                        U("vibebp").setData("firebaseUser", e), n.data.data.user.firebaseUid = e.user.uid, R(n.data.data.user)
                                    })).catch((function(e) {
                                        console.log("register", e)
                                    })))
                                })), U("vibebp").setUser(n.data.data.user);
                                var i = new CustomEvent("userLoaded", {
                                    detail: {
                                        userLoaded: !0
                                    }
                                });
                                if (document.dispatchEvent(i), document.querySelector("body").classList.contains("logged-out") && document.querySelector("body").classList.remove("logged-out"), document.querySelector("body").classList.contains("logged-in") || document.querySelector("body").classList.add("logged-in"), window.vibebp.settings.login_redirect && n.hasOwnProperty("redirect_component") && n.redirect_component) {
                                    var r = "";
                                    r = n.redirect_component.split("http").length > 1 ? n.redirect_component : n.redirect_component.split("#").length > 1 ? window.vibebp.settings.login_redirect + n.data.data.user.slug + n.redirect_component : window.vibebp.settings.login_redirect + n.data.data.user.slug + "#" + n.redirect_component, window.location.href = r
                                }
                                fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                                    method: "post",
                                    body: JSON.stringify({
                                        token: t.token
                                    })
                                }).then((function(e) {
                                    return e.json()
                                })).then((function(e) {
                                    e.status && U("vibebp").setData("loggedinMenu", e.menu)
                                }))
                            }
                        }))) : h(t.message)
                    })))
                },
                D = function(e) {
                    return new Promise((function(t) {
                        window.vibebp.settings.hasOwnProperty("firebase_config") && window.vibebp.settings.firebase_config && "undefined" != typeof firebase && firebase && firebase.hasOwnProperty("database") && firebase.database && window.vibebp.settings.session_lock ? firebase.database().ref("users").orderByChild("firebaseUid").equalTo(e.user.uid).once("value", (function(e) {
                            if (e.exists()) {
                                var n = e.val();
                                if (n && Object.keys(n).length) {
                                    for (var i in n) n[i].hasOwnProperty("status") && 1 == n[i].status && t(window.vibebp.translations.online_from_other_account);
                                    t()
                                } else t()
                            } else t()
                        })) : t()
                    }))
                },
                R = function(e) {
                    firebase.database().ref("users/".concat(e.id, "/status")).set(1), firebase.database().ref("users/".concat(e.id, "/firebaseUid")).set(e.firebaseUid);
                    var t = document.createElement("div");
                    t.classList.add("vibebp_live_modules"), document.body.appendChild(t)
                };
            return wp.element.createElement(P, null, wp.element.createElement("h2", null, g ? window.vibebp.translations.forgotpassword : window.vibebp.translations.signin_email_heading), wp.element.createElement("p", null, window.vibebp.translations.signin_email_description), wp.element.createElement("div", {
                className: "loginform"
            }, E.length ? wp.element.createElement("div", {
                className: "message"
            }, wp.element.createElement("div", {
                dangerouslySetInnerHTML: {
                    __html: E
                }
            })) : wp.element.createElement("div", {
                className: "field"
            }, wp.element.createElement("div", {
                className: "control"
            }, wp.element.createElement("label", null, wp.element.createElement("strong", null, window.vibebp.translations.email)), wp.element.createElement("input", {
                className: c,
                type: "text",
                onChange: function(e) {
                    i(e.target.value)
                }
            }))), g ? wp.element.createElement(P, null, wp.element.createElement("a", {
                className: k ? "button is-primary is-loading" : "button is-primary",
                onClick: function() {
                    if (!n.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i)) return l("input is-danger"), void h(window.vibebp.translations.invalid_email);
                    I(!0), fetch("".concat(window.vibebp.api.url, "/forgotPassword?client_id=").concat(window.vibebp.settings.client_id), {
                        method: "post",
                        body: JSON.stringify({
                            email: n
                        })
                    }).then((function(e) {
                        return e.json()
                    })).then((function(e) {
                        I(!1), e.status ? S(e.message) : e.hasOwnProperty("message") && U("vibebp").addNotification({
                            text: e.message
                        })
                    }))
                }
            }, window.vibebp.translations.password_recovery_email)) : wp.element.createElement(P, null, wp.element.createElement("div", {
                className: "field"
            }, wp.element.createElement("div", {
                className: "control"
            }, wp.element.createElement("label", null, wp.element.createElement("strong", null, window.vibebp.translations.password), wp.element.createElement("span", {
                className: "forgot_password",
                onClick: function() {
                    return w(!0)
                }
            }, window.vibebp.translations.forgotpassword)), wp.element.createElement("input", {
                className: "input",
                type: "password",
                onChange: function(e) {
                    f(e.target.value), h("")
                },
                onKeyPress: function(e) {
                    "Enter" === e.key && M()
                }
            }))), window.vibebp.translations.login_checkbox.length ? wp.element.createElement("div", {
                className: L ? "checkbox" : "checkbox error"
            }, wp.element.createElement("input", {
                id: "login_checkbox",
                type: "checkbox",
                onClick: function() {
                    return C(!L)
                }
            }), wp.element.createElement("label", {
                for: "login_checkbox",
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.translations.login_checkbox
                }
            })) : "", wp.element.createElement("a", {
                className: o ? "button is-primary is-loading" : "button is-primary",
                onClick: M
            }, o && x("vibebp").getToken() ? "..." : window.vibebp.translations.signin), y.length ? wp.element.createElement("div", {
                className: "error"
            }, y) : "")), window.vibebp.settings.email_login ? g ? wp.element.createElement("div", {
                class: "extra_details"
            }, wp.element.createElement("a", {
                className: "vibebp_back_link",
                onClick: function() {
                    w(!1)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-arrow-left"
            }), window.vibebp.translations.back_to_signin)) : "" : wp.element.createElement("div", {
                class: "extra_details"
            }, wp.element.createElement("a", {
                className: "vibebp_back_link",
                onClick: function() {
                    e.setemailSignIn(!1), w(!0)
                }
            }, wp.element.createElement("span", {
                className: "vicon vicon-arrow-left"
            }), window.vibebp.translations.all_signin_options)))
        };

    function M(e) {
        return function(e) {
            if (Array.isArray(e)) return q(e)
        }(e) || function(e) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e)
        }(e) || R(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function D(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                i = !0,
                r = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(i = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); i = !0);
            } catch (e) {
                r = !0, o = e
            } finally {
                try {
                    i || null == s.return || s.return()
                } finally {
                    if (r) throw o
                }
            }
            return n
        }(e, t) || R(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function R(e, t) {
        if (e) {
            if ("string" == typeof e) return q(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? q(e, t) : void 0
        }
    }

    function q(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }
    var J = wp.element,
        F = (J.createElement, J.useState),
        H = J.useEffect,
        G = J.Fragment,
        $ = (J.render, wp.data),
        W = ($.dispatch, $.select, function(e) {
            var t = D(F(window.vibebp.settings.registration_fields), 2),
                n = t[0],
                i = t[1],
                r = D(F(!1), 2),
                o = r[0],
                a = r[1],
                s = D(F(!1), 2),
                c = s[0],
                l = s[1],
                u = D(F(""), 2),
                d = u[0],
                p = u[1],
                b = D(F(!0), 2),
                f = b[0],
                m = b[1];
            H((function() {
                window.vibebp.translations.registration_checkbox.length && m(!1)
            }), []);
            return wp.element.createElement(G, null, wp.element.createElement("h2", null, window.vibebp.translations.register_account_heading), wp.element.createElement("p", null, window.vibebp.translations.register_account_description), wp.element.createElement("div", {
                className: "loginform"
            }, d.length ? wp.element.createElement("div", {
                className: "registration_message",
                dangerouslySetInnerHTML: {
                    __html: d
                }
            }) : n.length ? wp.element.createElement(G, null, n.map((function(e, t) {
                return wp.element.createElement("div", {
                    className: "field"
                }, wp.element.createElement("div", {
                    className: "control"
                }, wp.element.createElement("label", null, wp.element.createElement("strong", null, e.label)), "email" == e.type ? wp.element.createElement("input", {
                    className: e.class,
                    type: "text",
                    value: e.value,
                    onChange: function(e) {
                        var r = M(n);
                        r[t].value = e.target.value, n.map((function(e, t) {
                            "email" != e.type || r[t].value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) || -1 != r[t].class.indexOf("is-danger") ? (r[t].class = r[t].class.split("is-danger").join(" "), console.log(r[t])) : r[t].class += " is-danger"
                        })), i(r)
                    }
                }) : "password" == e.type ? wp.element.createElement("input", {
                    className: e.class,
                    type: "password",
                    value: e.value,
                    onChange: function(e) {
                        var r = M(n);
                        r[t].value = e.target.value, n.map((function(e, t) {
                            "email" == e.type && !r[t].value.length < 4 && -1 == r[t].class.indexOf("is-danger") ? r[t].class += " is-danger" : r[t].class = r[t].class.split("is-danger").join(" ")
                        })), i(r)
                    }
                }) : "phone" == e.type || "mobile" == e.type ? wp.element.createElement("input", {
                    className: e.class,
                    type: "telephone",
                    value: e.value,
                    onChange: function(e) {
                        var r = M(n);
                        r[t].value = e.target.value, n.map((function(e, t) {
                            "phone" != e.type && "mobile" != e.type || r[t].value.match(/^(\+\d{1,3}[- ]?)?\d{10}$/) || r[t].value.match(/0{5,}/) || -1 != r[t].class.indexOf("is-danger") ? r[t].class = r[t].class.split("is-danger").join(" ") : r[t].class += " is-danger"
                        })), i(r)
                    }
                }) : wp.element.createElement("input", {
                    className: e.class,
                    type: "text",
                    value: e.value,
                    onChange: function(e) {
                        var r = M(n);
                        r[t].value = e.target.value, i(r)
                    }
                })))
            })), window.vibebp.translations.registration_checkbox.length ? wp.element.createElement("div", {
                className: f ? "checkbox" : "checkbox error"
            }, wp.element.createElement("input", {
                id: "registration_checkbox",
                type: "checkbox",
                onClick: function() {
                    return m(!f)
                }
            }), wp.element.createElement("label", {
                for: "registration_checkbox",
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.translations.registration_checkbox
                }
            })) : "", wp.element.createElement("a", {
                className: c ? "button is-primary is-loading" : "button is-primary",
                onClick: function() {
                    f && (l(!0), fetch("".concat(window.vibebp.api.url, "/registerUser?client_id=").concat(window.vibebp.settings.client_id), {
                        method: "post",
                        body: JSON.stringify(n)
                    }).then((function(e) {
                        return e.json()
                    })).then((function(e) {
                        l(!1), e.status ? p(e.message) : a(e.message)
                    })))
                }
            }, window.vibebp.translations.create_account), o ? wp.element.createElement("div", {
                className: "error"
            }, o) : "") : ""), wp.element.createElement("div", {
                className: "extra_details"
            }, wp.element.createElement("p", null, window.vibebp.translations.account_already, wp.element.createElement("a", {
                className: "vibebp_forward_link",
                onClick: function() {
                    return e.setRegistration(!1)
                }
            }, window.vibebp.translations.signin, " ", wp.element.createElement("span", {
                className: "vicon vicon-arrow-right"
            }))), wp.element.createElement("p", null, window.vibebp.translations.login_terms)))
        });

    function V(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                i = !0,
                r = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(i = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); i = !0);
            } catch (e) {
                r = !0, o = e
            } finally {
                try {
                    i || null == s.return || s.return()
                } finally {
                    if (r) throw o
                }
            }
            return n
        }(e, t) || function(e, t) {
            if (!e) return;
            if ("string" == typeof e) return B(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            "Object" === n && e.constructor && (n = e.constructor.name);
            if ("Map" === n || "Set" === n) return Array.from(e);
            if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return B(e, t)
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function B(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }
    var K = wp.element,
        z = (K.createElement, K.useState),
        Y = K.useEffect,
        Q = (K.Fragment, K.render, wp.data),
        X = Q.dispatch,
        Z = Q.select,
        ee = function(e) {
            var t = V(z("user_menu"), 2),
                n = t[0],
                i = t[1],
                r = V(z(""), 2),
                o = (r[0], r[1], V(z(Z("vibebp").getData("loggedinMenu")), 2)),
                a = o[0],
                s = (o[1], V(z(!1), 2)),
                c = (s[0], s[1], Z("vibebp").getUser());
            Y((function() {
                
                setTimeout((function() {
                    i(n.replace(/active user_active/g, "") + " active user_active");
                    jQuery('.user_active').parent('.loggedin_user_div').addClass('active');
                }), 30), document.addEventListener("userLoaded", (function() {
                    console.log("capturing")
                }))
            }), []);
            return wp.element.createElement("div", {
                className: n
            }, wp.element.createElement("div", {
                className: "usermenu_content"
            }, wp.element.createElement("span", {
                className: "divider"
            }), a.length ? a.map((function(e) {
                return wp.element.createElement("a", {
                    href: c.profile_link + "#component=" + e.css_id,
                    className: e.classes.join(" "),
                    onClick: function(t) {
                        t.preventDefault(),
                            function(e) {
                                var t = Z("vibebp").getUser();
                                e.classes.indexOf("bp-menu") > -1 ? window.location === t.profile_link ? X("vibebp").setComponent(e.css_id) : window.location = t.profile_link + "#component=" + e.css_id : window.location.href = e.url
                            }(e)
                    },
                    dangerouslySetInnerHTML: {
                        __html: e.title
                    }
                })
            })) : wp.element.createElement("a", {
                href: c.profile_link
            }, wp.element.createElement("span", {
                className: "profile_icon"
            }), "My profile"
            //window.vibebp.translations.profile
            ),wp.element.createElement("a", {
                href: c.profile_link + '/preference'
            }, wp.element.createElement("span", {
                className: "preference_icon"
            }), "Preference"
            ), wp.element.createElement("a", {
                className : "ht-logout",
                onClick: e.logout
            }, wp.element.createElement("span", {
                className: "logout_icon"
            }), window.vibebp.translations.logout)))
        };

    function te(e) {
        return function(e) {
            if (Array.isArray(e)) return ce(e)
        }(e) || function(e) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e)
        }(e) || se(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function ne(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(e);
            t && (i = i.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, i)
        }
        return n
    }

    function ie(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? ne(Object(n), !0).forEach((function(t) {
                re(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : ne(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }

    function re(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function oe(e) {
        return (oe = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function ae(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                i = !0,
                r = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(i = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); i = !0);
            } catch (e) {
                r = !0, o = e
            } finally {
                try {
                    i || null == s.return || s.return()
                } finally {
                    if (r) throw o
                }
            }
            return n
        }(e, t) || se(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function se(e, t) {
        if (e) {
            if ("string" == typeof e) return ce(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? ce(e, t) : void 0
        }
    }

    function ce(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, i = new Array(t); n < t; n++) i[n] = e[n];
        return i
    }
    var le = wp.element,
        ue = (le.createElement, le.useState),
        de = le.useEffect,
        pe = le.Fragment,
        be = le.render,
        fe = wp.data,
        me = fe.dispatch,
        ge = fe.select,
        we = 1,
        ve = function(e) {
            var t = ae(ue(!1), 2),
                n = t[0],
                i = t[1],
                r = ae(ue({}), 2),
                o = r[0],
                a = r[1],
                s = ae(ue(!0), 2),
                c = s[0],
                l = s[1],
                u = ae(ue(!1), 2),
                d = u[0],
                b = u[1],
                f = ae(ue(!1), 2),
                m = f[0],
                g = f[1],
                w = ae(ue(!1), 2),
                v = (w[0], w[1], ae(ue(!0), 2)),
                y = v[0],
                h = v[1],
                _ = ae(ue(!1), 2),
                E = _[0],
                S = _[1],
                O = ae(ue(!1), 2),
                N = O[0],
                I = O[1],
                T = ae(ue("login_popup " + window.vibebp.style), 2),
                j = T[0],
                A = T[1],
                P = ae(ue(!1), 2),
                L = P[0],
                x = P[1],
                U = ae(ue([]), 2),
                M = U[0],
                D = U[1],
                R = ae(ue(!1), 2),
                q = R[0],
                J = R[1],
                F = ae(ue(!0), 2),
                H = F[0],
                G = F[1],
                $ = ae(ue(!0), 2),
                V = $[0],
                B = $[1],
                K = ae(ue(!1), 2),
                z = K[0],
                Y = K[1];
            window.vibebp.settings.firebase_config && (firebase.apps.length || firebase.initializeApp(JSON.parse(window.vibebp.settings.firebase_config))), de((function() {
                document.addEventListener("tokenGenerated", (function() {
                    Y(!z)
                })), window.vibebp.settings.email_login && S(!0), localforage.getItem("bp_user").then((function(e) {
                    e && ("object" !== oe(e) ? b(JSON.parse(e)) : b(e))
                }));
                var e = setTimeout((function() {
                    G(!1)
                }), 5e3);
                return function() {
                    clearTimeout(e)
                }
            }), []), de((function() {
                new Promise((function(e) {
                    e(localforage.getItem("bp_login_token"))
                })).then((function(e) {
                    e ? (ge("vibebp").setToken(e), ge("vibebp").verifyUser("".concat(window.vibebp.api.validate_token, "?client_id=").concat(window.vibebp.settings.client_id), e), k.subscribe((function() {
                        if (y) {
                            G(!1), a(k.getState().user), ge("vibebp").getNotifications() && ge("vibebp").getNotifications().length ? (J(!0), D(ge("vibebp").getNotifications())) : J(!1);
                            var t = new CustomEvent("userLoaded", {
                                detail: {
                                    userLoaded: k.getState().user
                                }
                            });
                            document.dispatchEvent(t), document.querySelector("body").classList.remove("logged-out"), document.querySelector("body").classList.add("logged-in"), h(!1), !ge("vibebp").getData("loggedinMenu") && we && (we = 0, fetch("".concat(window.vibebp.api.url, "/loggedinmenu"), {
                                method: "post",
                                body: JSON.stringify({
                                    token: e
                                })
                            }).then((function(e) {
                                return e.json()
                            })).then((function(e) {
                                l(!1), e.status && me("vibebp").setData("loggedinMenu", e.menu)
                            })))
                        }
                    }))) : (G(!1), l(!1))
                }))
            }), [z]), de((function() {
                var e = [];
                return window.vibebp.settings.firebase_config && "function" == typeof firebase.database && k.getState().user && Object.keys(k.getState().user).length && (V && k.getState().user.hasOwnProperty("id") && firebase.auth() && firebase.auth().currentUser && (firebase.database().ref("users/".concat(k.getState().user.id, "/status")).set(1), firebase.database().ref("users/".concat(k.getState().user.id, "/status")).onDisconnect().set(0), fetch("".concat(window.vibebp.api.url, "/followers"), {
                        method: "post",
                        body: JSON.stringify({
                            token: ge("vibebp").getToken()
                        })
                    }).then((function(e) {
                        return e.json()
                    })).then((function(e) {
                        e.status && e.followers.map((function(e) {
                            firebase.database().ref("users/".concat(e.ID, "/status")).once("value").then((function(t) {
                                t.exists() && t.val() && firebase.database().ref("notifications/".concat(e.ID)).push({
                                    sender: ge("vibebp").getUser().id,
                                    type: "user_online",
                                    status: 1,
                                    time: (new Date).getTime()
                                })
                            }))
                        }))
                    })), firebase.database().ref("notifications/".concat(k.getState().user.id)).on("child_added", (function(t) {
                        if (t.exists()) {
                            var n = t.val();
                            n.hasOwnProperty("message") ? me("vibebp").addNotification({
                                text: n.message
                            }) : fetch("".concat(window.vibebp.api.url, "/process_notification"), {
                                method: "post",
                                body: JSON.stringify(ie(ie({}, n), {}, {
                                    token: ge("vibebp").getToken()
                                }))
                            }).then((function(e) {
                                return e.json()
                            })).then((function(t) {
                                if (t.status) {
                                    me("vibebp").addNotification(t);
                                    var n = setTimeout((function() {
                                        firebase.database().ref("notifications/".concat(o.id, "/").concat(key, "/status")).set(0)
                                    }), 1e4);
                                    e.push(n)
                                }
                            }))
                        }
                    })), B(!1)), window.addEventListener("online", (function() {
                        me("vibebp").addNotification({
                            text: window.vibebp.translations.online
                        })
                    }), !1), window.addEventListener("offline", (function() {
                        me("vibebp").addNotification({
                            text: window.vibebp.translations.offline
                        })
                    }), !1)),
                    function() {
                        e.length && e.map((function(e) {
                            clearTimeout(e)
                        }))
                    }
            }), [k.getState().user]), de((function() {
                k.getState().user && a(k.getState().user)
            }), [k.getState().user]), de((function() {
                document.addEventListener("vibebp_show_login_popup", (function() {
                    k.getState().user && Object.keys(k.getState().user).length || (i(!0), setTimeout((function() {
                        A(j + " active")
                    }), 30))
                }))
            }), []);
            return wp.element.createElement(pe, null, "static" != e.type ? o && Object.keys(o).length ? wp.element.createElement("div", {
                className: "loggedin_user_div"
            }, wp.element.createElement("a", {
                className: "loggedin_user",
                "data-id": o.id,
                onClick: function() {
                    g(!m)
                }
            }, wp.element.createElement("img", {
                src: o.avatar,
                alt: o.displayname
            }), wp.element.createElement("span", {
                className: "vibebp_name"
            }, o.displayname)), m ? wp.element.createElement(ee, {
                logout: function() {
                    if ("undefined" != typeof firebase && firebase && firebase.hasOwnProperty("database") && window.vibebp.settings.firebase_config && window.vibebp.settings.session_lock && firebase.auth().currentUser) {
                        var e = new CustomEvent("userLogout", {
                            detail: {
                                userLoaded: !0,
                                loggedOut: !0
                            }
                        });
                        document.dispatchEvent(e), firebase.database().ref("users/".concat(o.id, "/status")).set(0).then((function() {
                            document.querySelector("body").classList.add("vibebp_logout"), firebase.auth().signOut().then((function() {
                                a({}), ge("vibebp").logout()
                            }), (function(e) {
                                console.log("logout failed")
                            }))
                        }))
                    } else {
                        e = new CustomEvent("userLogout", {
                            detail: {
                                userLoaded: !0,
                                loggedOut: !0
                            }
                        });
                        document.dispatchEvent(e), document.querySelector("body").classList.add("vibebp_logout"), window.vibebp.settings.firebase_config ? firebase.auth().signOut().then((function() {
                            a({}), ge("vibebp").logout()
                        }), (function(e) {
                            console.log("logout failed")
                        })) : (a({}), ge("vibebp").logout())
                    }
                }
            }) : "", wp.element.createElement(pe, null, window.vibebp.settings.firebase_config && "on" != window.vibebp.settings.hide_live && firebase.auth() && firebase.auth().currentUser ? wp.element.createElement("span", {
                className: "login_extras",
                onClick: function() {
                    x(!L);
                    var e = new CustomEvent("loginExtras", {
                        detail: {
                            loginExtras: !0
                        }
                    });
                    document.dispatchEvent(e)
                }
            }, wp.element.createElement("span", {
                className: L ? "vicon vicon-align-right" : "vicon vicon-align-left"
            })) : "")) : wp.element.createElement("a", {
                onClick: function(e) {
                    e.stopPropagation(), i(!0), setTimeout((function() {
                        A(j + " active")
                    }), 30)
                }
            }, H ? "..." : wp.element.createElement("span", {
                dangerouslySetInnerHTML: {
                    __html: e.title
                }
            })) : "", n || "static" == e.type && o && !Object.keys(o).length ? ReactDOM.createPortal(wp.element.createElement("div", {
                className: e.hasOwnProperty("type") && "static" == e.type ? "static_wrapper" : "loginpopup_wrapper",
                onClick: function(e) {
                    e.stopPropagation(), -1 !== e.target.className.indexOf("loginpopup_wrapper") && (A(j.replace(/active/g)), i(!1))
                }
            }, wp.element.createElement("div", {
                className: j
            }, e.hasOwnProperty("type") && "static" == e.type && c ? wp.element.createElement("div", {
                className: "login_popup_content"
            }, wp.element.createElement("h2", {
                dangerouslySetInnerHTML: {
                    __html: window.vibebp.translations.login_heading
                }
            }), d ? wp.element.createElement("h2", {
                dangerouslySetInnerHTML: {
                    __html: d.displayname
                }
            }) : wp.element.createElement("h2", null, "...")) : wp.element.createElement("div", {
                className: window.vibebp.settings.email_login ? "login_popup_content email_login" : "login_popup_content"
            }, window.vibebp.settings.email_login ? N ? wp.element.createElement(W, {
                setRegistration: I
            }) : wp.element.createElement(pe, null, wp.element.createElement(C, {
                setemailSignIn: S,
                setUser: function(e) {
                    a(e), i(!1)
                }
            }), E ? wp.element.createElement(p, {
                setLoginpopupClass: A,
                setUser: function(e) {
                    a(e), i(!1)
                },
                setRegistration: I,
                setemailSignIn: S
            }) : "") : E ? wp.element.createElement(C, {
                setemailSignIn: S,
                setUser: function(e) {
                    a(e), i(!1)
                }
            }) : N ? wp.element.createElement(W, {
                setRegistration: I
            }) : wp.element.createElement(p, {
                setLoginpopupClass: A,
                setUser: function(e) {
                    a(e), i(!1)
                },
                setRegistration: I,
                setemailSignIn: S
            }), "static" != e.type ? wp.element.createElement("a", {
                onClick: function(e) {
                    e.stopPropagation(), A(j.replace(/active/g)), i(!1)
                },
                className: "vicon-close"
            }) : ""))), document.querySelector("#vibebp_login_wrapper")) : "", M.length ? ReactDOM.createPortal(wp.element.createElement("div", {
                className: q ? "vibebp_notifications_wrapper" : "vibebp_notifications_wrapper closed"
            }, M.map((function(e) {
                return wp.element.createElement("div", {
                    className: "vibebp_notification"
                }, wp.element.createElement("div", {
                    className: "vibebp_notification_body"
                }, wp.element.createElement("div", {
                    dangerouslySetInnerHTML: {
                        __html: e.text
                    }
                }), e.hasOwnProperty("actions") ? e.actions.map((function(t) {
                    return wp.element.createElement("a", {
                        className: "link",
                        onClick: function() {
                            var n = new CustomEvent(t.event, {
                                detail: ie(ie({}, t), {}, {
                                    item_id: e.item_id,
                                    user_id: ge("vibebp").getUser().id
                                })
                            });
                            document.dispatchEvent(n)
                        }
                    }, t.label)
                })) : "", wp.element.createElement("span", {
                    className: "vicon vicon-close",
                    onClick: function() {
                        ! function(e) {
                            var t = te(M);
                            t.splice(t.findIndex((function(t) {
                                return t.id === e.id
                            })), 1), D(t), ge("vibebp").removeNotification(e)
                        }(e)
                    }
                })))
            }))), document.querySelector("#vibebp_notifications_wrapper")) : "")
        };
    document.addEventListener("DOMContentLoaded", (function() {
        document.querySelector(".vibebp-login") && document.querySelectorAll(".vibebp-login").forEach((function(e) {
            be(wp.element.createElement(ve, {
                type: document.querySelector(".vibebp-login").getAttribute("type"),
                title: e.innerHTML
            }), e)
        })), document.addEventListener("wp_login_sync", (function() {
            document.querySelector(".vibebp-login") && document.querySelectorAll(".vibebp-login").forEach((function(e) {
                be(wp.element.createElement(ve, {
                    type: document.querySelector(".vibebp-login").getAttribute("type"),
                    title: e.innerHTML
                }), e)
            }))
        }))
    }), !1), document.querySelector(".vibebp-login") && document.querySelectorAll(".vibebp-login").forEach((function(e) {
        be(wp.element.createElement(ve, {
            type: document.querySelector(".vibebp-login").getAttribute("type"),
            title: e.innerHTML
        }), e)
    }))
}]);