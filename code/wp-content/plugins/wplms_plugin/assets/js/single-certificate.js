! function(e) {
    var t = {};

    function r(c) {
        if (t[c]) return t[c].exports;
        var i = t[c] = {
            i: c,
            l: !1,
            exports: {}
        };

        return e[c].call(i.exports, i, i.exports, r), i.l = !0, i.exports
    }
    r.m = e, r.c = t, r.d = function(e, t, c) {
        r.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: c
        })
    }, r.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, r.t = function(e, t) {
        if (1 & t && (e = r(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var c = Object.create(null);
        if (r.r(c), Object.defineProperty(c, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var i in e) r.d(c, i, function(t) {
                return e[t]
            }.bind(null, i));
        return c
    }, r.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return r.d(t, "a", t), t
    }, r.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, r.p = "", r(r.s = 0)
}([function(e, t, r) {
    "use strict";
    r.r(t);
    r(1);
    const {
        dispatch: c,
        select: i
    } = wp.data;
    var n = window.jspdf.jsPDF;
    let a = !1,
        o = !1;
    var u = document.querySelector('[name="certificate-course"]').value,
        d = document.querySelector('[name="certificate-user"]').value;
    const f = (e, t) => {
        if (a) {
            if ("pdf" == t) {
            	//alert(a);
                var r = new n;
                p = 210, m = 80;
                document.querySelector("#certificate .certificate_content").getAttribute("data-width").length && (m = Math.round(210 * parseInt(document.querySelector("#certificate .certificate_content").getAttribute("data-height")) / parseInt(document.querySelector("#certificate .certificate_content").getAttribute("data-width")))), r.addImage(o, "JPEG", 0, 0, 210, m), r.save("certificate.pdf")
            }
            "print" == t && window.print(), "download" == t && window.open(a, "_blank")
        } else {
            var c = document.querySelector("#certificate");
            if (document.querySelector("#certificate .certificate.type-certificate") && (c = document.querySelector("#certificate .certificate.type-certificate")), document.querySelector("#certificate .certificate_content").getAttribute("data-width").length) {
                var f = document.querySelector("#certificate .certificate_content").getAttribute("data-width"),
                    l = window.innerWidth / f;
                if (l >= 1) l = 1;
                else {
                    var s = "overflow:hidden;transform:scale(" + (l -= .1) + ")";
                    document.querySelector("section#certificate").setAttribute("style", s), (c = document.querySelector("section#certificate")).setAttribute("style", "")
                }
            }
        	
            document.querySelector(".extra_buttons").setAttribute("style", "display:none");
            var p = document.querySelector("#certificate .certificate_content").getAttribute("data-width"),
                m = document.querySelector("#certificate .certificate_content").getAttribute("data-height");
            html2canvas(c, {
                backgrounnd: "#ffffff",
                width: p,
                height: m
            }).then((function(e) {
                document.querySelector("#certificate .certificate_content").setAttribute("style", "");
                var r = e.toDataURL("image/jpeg");
                a = o = r, document.querySelector("#certificate .certificate_content").innerHTML = l >= 1 ? '<img src="' + r + '" width="' + p + '" height="' + m + '" class="certificate_image"/>' : '<img src="' + r + '" class="certificate_image"/>';
                var c = new CustomEvent("generate_certificate", {
                    detail: ""
                });

                document.dispatchEvent(c), document.querySelector(".extra_buttons").setAttribute("style", "display:flex");
                var f = new XMLHttpRequest;
                f.open("POST", ajaxurl), f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.onload = function(e) {
                    if (200 === f.status) {
                        let e = f.responseText;
                        if (a = e, "download" == t && window.open(a, "_blank"), "print" == t && window.print(), "pdf" == t) {
                            var r = new n,
                                c = 80;
                            document.querySelector("#certificate .certificate_content").getAttribute("data-width").length && (c = Math.round(210 * parseInt(document.querySelector("#certificate .certificate_content").getAttribute("data-height")) / parseInt(document.querySelector("#certificate .certificate_content").getAttribute("data-width")))), r.addImage(o, "JPEG", 0, 0, 210, c), r.save("certificate.pdf")
                        }
                    }
                }, f.send(encodeURI("action=save_certificate_image_4&token=" + i("vibebp").getToken() + "&image=" + r + "&course_id=" + u + "&user_id=" + d))
            }))
        }
    };
    window.addEventListener("DOMContentLoaded", e => {
        d && u && document.querySelector(".certificate_content") && (document.querySelector(".certificate_print").addEventListener("click", () => {
            f(0, "print")
        }), document.querySelector(".certificate_pdf").addEventListener("click", () => {
            f(0, "pdf")
        }), document.querySelector(".certificate_download").addEventListener("click", () => {
            f(0, "download")
        }))
    })
}, function(e, t, r) {}]);