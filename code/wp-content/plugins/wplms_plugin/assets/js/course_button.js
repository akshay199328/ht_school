! function(e) {
    var t = {};

    function n(o) {
        if (t[o]) return t[o].exports;
        var r = t[o] = {
            i: o,
            l: !1,
            exports: {}
        };
        return e[o].call(r.exports, r, r.exports, n), r.l = !0, r.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, o) {
        n.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: o
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
        var o = Object.create(null);
        if (n.r(o), Object.defineProperty(o, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var r in e) n.d(o, r, function(t) {
                return e[t]
            }.bind(null, r));
        return o
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
    n.r(t);
    const {
        createElement: o,
        render: r,
        useState: a,
        useEffect: s,
        Fragment: l
    } = wp.element, {
        select: u,
        dispatch: i
    } = wp.data;
    var c = e => {
        const [t, n] = a(!1), [r, u] = a(!1), [i, c] = a(!1);
        s(() => {
            localforage.getItem("bp_login_token").then(e => {
                e && c(e)
            })
        }, []), s(() => {
            n(!0)
        }, [e, i]);
        let d = {};
        return r && (d = {
            opacity: "0.5",
            "pointer-events": "none"
        }), o(l, null, t ? o("div", {
            className: "popup_wrapper",
            onClick: e => {
                e.preventDefault(), document.querySelector(".popup_wrapper") && e.target === document.querySelector(".popup_wrapper") && n(!1)
            }
        }, o("div", {
            className: "popup_content"
        }, o("span", {
            className: "vicon vicon-close",
            onClick: () => {
                n(!1)
            }
        }), o("h3", null, window.wplms_course_data.translations.apply_to_course), o("div", {
            className: "popup-footer"
        }, o("a", {
            className: "button is-primary",
            style: d,
            onClick: () => {
                u(!0), fetch(window.wplms_course_data.api_url + "/student/courseButton/applycourse", {
                    method: "post",
                    body: JSON.stringify({
                        id: e.id,
                        token: i
                    })
                }).then(e => e.json()).then(t => {
                    if (t.status) {
                        n(!1), u(!1);
                        var o = new CustomEvent("wplms_popup_applied", {
                            detail: {
                                course: e.id,
                                text: t.message
                            }
                        });
                        document.dispatchEvent(o)
                    }
                })
            }
        }, window.wplms_course_data.translations.yes), o("a", {
            className: "button is-primary",
            onClick: () => {
                n(!1)
            }
        }, window.wplms_course_data.translations.cancel)))) : "")
    };
    const {
        createElement: d,
        render: p,
        useState: m,
        useEffect: _,
        Fragment: f
    } = wp.element, {
        select: h,
        dispatch: w
    } = wp.data, y = e => {
        const [t, n] = m(!1), [o, r] = m(!0), [a, s] = m(window.wplms_course_data.translations.take_this_course), [l, u] = m(""), [i, c] = m(""), [p, h] = m([]), [w, y] = m(!1), [g, v] = m({}), [b, k] = m(!1), [E, N] = m(!1);
        _(() => {
            localforage.getItem("bp_login_token").then(e => {
                n(e)
            })
        }, []), _(() => {
            document.addEventListener("wplms_popup_applied", t => {
                t.detail.course == e.id && t.detail.hasOwnProperty("text") && (y(!1), u("#"), s(t.detail.text))
            }, !1), document.addEventListener("reload_course_button", t => {
                t.detail.course == e.id && S()
            }, !1)
        }, []), _(() => {
            S()
        }, [e, t]), _(() => {
            if (E) {
                var t = new CustomEvent("wplms_popup_clicked", {
                    detail: {
                        course: e.id
                    }
                });
                document.dispatchEvent(t), N(!1)
            }
        }, [E]);
        const S = () => {
                r(!0), t && (k(!1), fetch(window.wplms_course_data.api_url + "/student/courseButton/", {
                    method: "post",
                    body: JSON.stringify({
                        id: e.id,
                        token: t,
                        price: window.wplms_course_data.show_price
                    })
                }).then(e => e.json()).then(e => {
                    e.status && ("#apply" == e.link && y(!0), s(e.text), e.hasOwnProperty("error") ? v(e.error) : (u(e.link), e.hasOwnProperty("form") && c(e.form)), h(e.extras)), e.hasOwnProperty("hide_button") && e.hide_button && k(!0), r(!1)
                }))
            },
            L = (t, n) => {
                var o = new CustomEvent("coursebuttonpricingclicked", {
                    detail: {
                        original_event: t,
                        course: e.id,
                        price: n
                    }
                });
                console.log(o), document.dispatchEvent(o)
            };
        return b ? "" : o ? d("span", {
            className: "course_button button full is-loading"
        }, "...") : d(f, null, w ? d("span", {
            className: "the_course_button"
        }, d("a", {
            href: l,
            className: "course_button button full",
            onClick: e => {
                e.preventDefault(), N(!0)
            }
        }, d("span", {
            dangerouslySetInnerHTML: {
                __html: a
            }
        }), p.length ? p.map(e => d("span", null, e)) : "")) : i.length ? d("div", {
            className: " the_course_button"
        }, d("form", {
            action: i,
            className: "",
            method: "post"
        }, d("input", {
            type: "hidden",
            name: "token",
            value: t
        }), d("input", {
            type: "hidden",
            name: "course_id",
            value: e.id
        }), d("button", {
            type: "submit",
            className: "button full course_button"
        }, d("span", {
            dangerouslySetInnerHTML: {
                __html: a
            }
        }), p.length ? p.map(e => d("span", null, e)) : ""))) : d(f, null, d("div", {
            className: "the_course_button"
        }, Array.isArray(l) ? d("div", {
            className: "course_button button full"
        }, d("a", {
            href: l[0].link,
            onClick: e => {
                L(e, l[0])
            }
        }, d("strong", null, a || window.wplms_course_data.translations.take_this_course), d("span", {
            dangerouslySetInnerHTML: {
                __html: l[0].price
            }
        })), l.length > 1 ? d(f, null, d("input", {
            id: "course_price",
            type: "checkbox"
        }), d("label", {
            for: "course_price",
            class: "vicon vicon-angle-down"
        }), d("div", {
            className: "wplms_price_dropdown"
        }, l.map(e => d("a", {
            href: e.link,
            dangerouslySetInnerHTML: {
                __html: e.price
            },
            onClick: t => {
                L(t, e)
            }
        })))) : "", p.length ? d("div", {
            className: "extra_details"
        }, p.map(e => d("span", {
            dangerouslySetInnerHTML: {
                __html: e
            }
        }))) : "") : d("a", {
            href: l,
            className: "course_button button full",
            onClick: e => {
                L(e, l)
            }
        }, a || window.wplms_course_data.translations.take_this_course, p.length ? d("div", {
            className: "extra_details"
        }, p.map(e => d("span", {
            dangerouslySetInnerHTML: {
                __html: e
            }
        }))) : "")), g && g.hasOwnProperty("error_message") ? d("div", {
            className: "vbp_message error"
        }, d("span", {
            className: "vicon " + g.icon,
            style: {
                margin: "0 0.2rem"
            }
        }), d("span", {
            dangerouslySetInnerHTML: {
                __html: g.error_message
            }
        })) : ""))
    }, g = () => {
        document.querySelectorAll(".the_course_button").forEach(e => {
            p(d(y, {
                id: e.getAttribute("data-id"),
                def: e.innerHTML
            }), e)
        }), document.removeEventListener("userLoaded", g, !1)
    };
    document.addEventListener("userLoaded", g, !1), document.addEventListener("DOMContentLoaded", () => {
        "undefined" != typeof localforage && localforage.getItem("bp_login_token").then(e => {
            e && document.querySelectorAll(".the_course_button").forEach(e => {
                p(d(y, {
                    id: e.getAttribute("data-id"),
                    def: e.innerHTML
                }), e)
            })
        })
    }, !1), document.addEventListener("wplms_popup_clicked", e => {
        null !== document.getElementById("wplms_popup") && document.getElementById("wplms_popup").remove();
        let t = document.createElement("div");
        t.setAttribute("id", "wplms_popup"), document.body.appendChild(t), p(d(c, {
            id: e.detail.course
        }), document.getElementById("wplms_popup"))
    }, !1)
}]);