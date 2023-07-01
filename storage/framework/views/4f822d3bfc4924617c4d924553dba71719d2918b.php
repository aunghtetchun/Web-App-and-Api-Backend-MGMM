<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Primary Meta Tags -->
    <meta name="title" content="<?php echo $__env->yieldContent('meta_gtitle', 'Welcome from Mod games myanmar.'); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_gdescription', 'Welcome from Mod games myanmar. You can download all mod games here.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_gkeywords', 'modgamesmm,mgmm, MGMM'); ?>">

    <meta property="og:site_name" content="modgamesmm.com" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('meta_title', 'Welcome from Mod games myanmar. You can download all mod games here.'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', 'Welcome from Mod Games myanmar. You can download all mod games here.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('og_image', asset(\App\Custom::$info['c-logo'])); ?>">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta property="twitter:title" content="Welcome from Mod Games myanmar. You can download all mod games here.">
    <meta property="twitter:description" content="Welcome from Mod Games myanmar. You can download all mod games here.">
    <meta property="twitter:image" content="<?php echo $__env->yieldContent('twt_image', asset(\App\Custom::$info['c-logo'])); ?>">
    <meta name="viewport"
        content="width=device-width, wedding-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Google Meta  -->
    <meta name="google-site-verification" content="KB1B5_i_gC0rSOb8VsxGz6ccLZqQyUmKmPMUqt_O-Cc" />

    <!-- Google Tag Manager -->
    
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-93R2V4BR1D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-93R2V4BR1D');
    </script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "MGMM",
            "url": "https://modgamesmm.com",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://modgamesmm.com/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Corporation",
            "name": "MGMM",
            "url": "https://modgamesmm.com",
            "logo": "<?php echo $__env->yieldContent('lg_logo', asset(\App\Custom::$info['c-logo']) ); ?>",
            "sameAs": [
                "https://www.facebook.com/modgamesmyanmar",
                "https://twitter.com/modgamesmyanmar",
                "https://vk.com/modgamesmyanmar",
                "https://www.youtube.com/channel/modgamesmyanmar"
            ]
        }
    </script>


    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="<?php echo $__env->yieldContent('meta_icon', asset(\App\Custom::$info['c-logo'])); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(\App\Custom::$info['main_css'])); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/game_ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/font-awesome/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/font-awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/slick/slick-theme.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/venobox/venobox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/vendor/feather-icons-web/feather.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    
    <!-- Google ADS  -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7297781591471758"
        crossorigin="anonymous"></script>
    <script async src="https://fundingchoicesmessages.google.com/i/pub-7297781591471758?ers=1"
        nonce="YOqT9kQHmHXipGXtomja6g"></script>
    <script nonce="YOqT9kQHmHXipGXtomja6g">
        (function() {
            function signalGooglefcPresent() {
                if (!window.frames['googlefcPresent']) {
                    if (document.body) {
                        const iframe = document.createElement('iframe');
                        iframe.style =
                            'width: 0; height: 0; border: none; z-index: -1000; left: -1000px; top: -1000px;';
                        iframe.style.display = 'none';
                        iframe.name = 'googlefcPresent';
                        document.body.appendChild(iframe);
                    } else {
                        setTimeout(signalGooglefcPresent, 0);
                    }
                }
            }
            signalGooglefcPresent();
        })();
    </script>
    <script>
        (function() {
            /*

            Copyright The Closure Library Authors.
            SPDX-License-Identifier: Apache-2.0
            */
            'use strict';
            var aa = function(a) {
                    var b = 0;
                    return function() {
                        return b < a.length ? {
                            done: !1,
                            value: a[b++]
                        } : {
                            done: !0
                        }
                    }
                },
                ba = "function" == typeof Object.create ? Object.create : function(a) {
                    var b = function() {};
                    b.prototype = a;
                    return new b
                },
                k;
            if ("function" == typeof Object.setPrototypeOf) k = Object.setPrototypeOf;
            else {
                var m;
                a: {
                    var ca = {
                            a: !0
                        },
                        n = {};
                    try {
                        n.__proto__ = ca;
                        m = n.a;
                        break a
                    } catch (a) {}
                    m = !1
                }
                k = m ? function(a, b) {
                    a.__proto__ = b;
                    if (a.__proto__ !== b) throw new TypeError(a + " is not extensible");
                    return a
                } : null
            }
            var p = k,
                q = function(a, b) {
                    a.prototype = ba(b.prototype);
                    a.prototype.constructor = a;
                    if (p) p(a, b);
                    else
                        for (var c in b)
                            if ("prototype" != c)
                                if (Object.defineProperties) {
                                    var d = Object.getOwnPropertyDescriptor(b, c);
                                    d && Object.defineProperty(a, c, d)
                                } else a[c] = b[c];
                    a.v = b.prototype
                },
                r = this || self,
                da = function() {},
                t = function(a) {
                    return a
                };
            var u;
            var w = function(a, b) {
                this.g = b === v ? a : ""
            };
            w.prototype.toString = function() {
                return this.g + ""
            };
            var v = {},
                x = function(a) {
                    if (void 0 === u) {
                        var b = null;
                        var c = r.trustedTypes;
                        if (c && c.createPolicy) {
                            try {
                                b = c.createPolicy("goog#html", {
                                    createHTML: t,
                                    createScript: t,
                                    createScriptURL: t
                                })
                            } catch (d) {
                                r.console && r.console.error(d.message)
                            }
                            u = b
                        } else u = b
                    }
                    a = (b = u) ? b.createScriptURL(a) : a;
                    return new w(a, v)
                };
            var A = function() {
                return Math.floor(2147483648 * Math.random()).toString(36) + Math.abs(Math.floor(2147483648 * Math
                    .random()) ^ Date.now()).toString(36)
            };
            var B = {},
                C = null;
            var D = "function" === typeof Uint8Array;

            function E(a, b, c) {
                return "object" === typeof a ? D && !Array.isArray(a) && a instanceof Uint8Array ? c(a) : F(a, b, c) :
                    b(a)
            }

            function F(a, b, c) {
                if (Array.isArray(a)) {
                    for (var d = Array(a.length), e = 0; e < a.length; e++) {
                        var f = a[e];
                        null != f && (d[e] = E(f, b, c))
                    }
                    Array.isArray(a) && a.s && G(d);
                    return d
                }
                d = {};
                for (e in a) Object.prototype.hasOwnProperty.call(a, e) && (f = a[e], null != f && (d[e] = E(f, b, c)));
                return d
            }

            function ea(a) {
                return F(a, function(b) {
                    return "number" === typeof b ? isFinite(b) ? b : String(b) : b
                }, function(b) {
                    var c;
                    void 0 === c && (c = 0);
                    if (!C) {
                        C = {};
                        for (var d = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789".split(""),
                                e = ["+/=", "+/", "-_=", "-_.", "-_"], f = 0; 5 > f; f++) {
                            var h = d.concat(e[f].split(""));
                            B[f] = h;
                            for (var g = 0; g < h.length; g++) {
                                var l = h[g];
                                void 0 === C[l] && (C[l] = g)
                            }
                        }
                    }
                    c = B[c];
                    d = Array(Math.floor(b.length / 3));
                    e = c[64] || "";
                    for (f = h = 0; h < b.length - 2; h += 3) {
                        var y = b[h],
                            z = b[h + 1];
                        l = b[h + 2];
                        g = c[y >> 2];
                        y = c[(y & 3) <<
                            4 | z >> 4];
                        z = c[(z & 15) << 2 | l >> 6];
                        l = c[l & 63];
                        d[f++] = "" + g + y + z + l
                    }
                    g = 0;
                    l = e;
                    switch (b.length - h) {
                        case 2:
                            g = b[h + 1], l = c[(g & 15) << 2] || e;
                        case 1:
                            b = b[h], d[f] = "" + c[b >> 2] + c[(b & 3) << 4 | g >> 4] + l + e
                    }
                    return d.join("")
                })
            }
            var fa = {
                    s: {
                        value: !0,
                        configurable: !0
                    }
                },
                G = function(a) {
                    Array.isArray(a) && !Object.isFrozen(a) && Object.defineProperties(a, fa);
                    return a
                };
            var H;
            var J = function(a, b, c) {
                    var d = H;
                    H = null;
                    a || (a = d);
                    d = this.constructor.u;
                    a || (a = d ? [d] : []);
                    this.j = d ? 0 : -1;
                    this.h = null;
                    this.g = a;
                    a: {
                        d = this.g.length;a = d - 1;
                        if (d && (d = this.g[a], !(null === d || "object" != typeof d || Array.isArray(d) || D &&
                                d instanceof Uint8Array))) {
                            this.l = a - this.j;
                            this.i = d;
                            break a
                        }
                        void 0 !== b && -1 < b ? (this.l = Math.max(b, a + 1 - this.j), this.i = null) : this.l =
                            Number.MAX_VALUE
                    }
                    if (c)
                        for (b = 0; b < c.length; b++) a = c[b], a < this.l ? (a += this.j, (d = this.g[a]) ? G(d) :
                            this.g[a] = I) : (d = this.l + this.j, this.g[d] || (this.i = this.g[d] = {}), (d = this
                                .i[a]) ?
                            G(d) : this.i[a] = I)
                },
                I = Object.freeze(G([])),
                K = function(a, b) {
                    if (-1 === b) return null;
                    if (b < a.l) {
                        b += a.j;
                        var c = a.g[b];
                        return c !== I ? c : a.g[b] = G([])
                    }
                    if (a.i) return c = a.i[b], c !== I ? c : a.i[b] = G([])
                },
                M = function(a, b) {
                    var c = L;
                    if (-1 === b) return null;
                    a.h || (a.h = {});
                    if (!a.h[b]) {
                        var d = K(a, b);
                        d && (a.h[b] = new c(d))
                    }
                    return a.h[b]
                };
            J.prototype.toJSON = function() {
                var a = N(this, !1);
                return ea(a)
            };
            var N = function(a, b) {
                    if (a.h)
                        for (var c in a.h)
                            if (Object.prototype.hasOwnProperty.call(a.h, c)) {
                                var d = a.h[c];
                                if (Array.isArray(d))
                                    for (var e = 0; e < d.length; e++) d[e] && N(d[e], b);
                                else d && N(d, b)
                            } return a.g
                },
                O = function(a, b) {
                    H = b = b ? JSON.parse(b) : null;
                    a = new a(b);
                    H = null;
                    return a
                };
            J.prototype.toString = function() {
                return N(this, !1).toString()
            };
            var P = function(a) {
                J.call(this, a)
            };
            q(P, J);

            function ha(a) {
                var b, c = (a.ownerDocument && a.ownerDocument.defaultView || window).document,
                    d = null === (b = c.querySelector) || void 0 === b ? void 0 : b.call(c, "script[nonce]");
                (b = d ? d.nonce || d.getAttribute("nonce") || "" : "") && a.setAttribute("nonce", b)
            };
            var Q = function(a, b) {
                    b = String(b);
                    "application/xhtml+xml" === a.contentType && (b = b.toLowerCase());
                    return a.createElement(b)
                },
                R = function(a) {
                    this.g = a || r.document || document
                };
            R.prototype.appendChild = function(a, b) {
                a.appendChild(b)
            };
            var S = function(a, b, c, d, e, f) {
                try {
                    var h = a.g,
                        g = Q(a.g, "SCRIPT");
                    g.async = !0;
                    g.src = b instanceof w && b.constructor === w ? b.g : "type_error:TrustedResourceUrl";
                    ha(g);
                    h.head.appendChild(g);
                    g.addEventListener("load", function() {
                        e();
                        d && h.head.removeChild(g)
                    });
                    g.addEventListener("error", function() {
                        0 < c ? S(a, b, c - 1, d, e, f) : (d && h.head.removeChild(g), f())
                    })
                } catch (l) {
                    f()
                }
            };
            var ia = r.atob(
                    "aHR0cHM6Ly93d3cuZ3N0YXRpYy5jb20vaW1hZ2VzL2ljb25zL21hdGVyaWFsL3N5c3RlbS8xeC93YXJuaW5nX2FtYmVyXzI0ZHAucG5n"
                ),
                ja = r.atob(
                    "WW91IGFyZSBzZWVpbmcgdGhpcyBtZXNzYWdlIGJlY2F1c2UgYWQgb3Igc2NyaXB0IGJsb2NraW5nIHNvZnR3YXJlIGlzIGludGVyZmVyaW5nIHdpdGggdGhpcyBwYWdlLg=="
                ),
                ka = r.atob("RGlzYWJsZSBhbnkgYWQgb3Igc2NyaXB0IGJsb2NraW5nIHNvZnR3YXJlLCB0aGVuIHJlbG9hZCB0aGlzIHBhZ2Uu"),
                la = function(a, b, c) {
                    this.h = a;
                    this.j = new R(this.h);
                    this.g = null;
                    this.i = [];
                    this.l = !1;
                    this.o = b;
                    this.m = c
                },
                V = function(a) {
                    if (a.h.body && !a.l) {
                        var b =
                            function() {
                                T(a);
                                r.setTimeout(function() {
                                    return U(a, 3)
                                }, 50)
                            };
                        S(a.j, a.o, 2, !0, function() {
                            r[a.m] || b()
                        }, b);
                        a.l = !0
                    }
                },
                T = function(a) {
                    for (var b = W(1, 5), c = 0; c < b; c++) {
                        var d = X(a);
                        a.h.body.appendChild(d);
                        a.i.push(d)
                    }
                    b = X(a);
                    b.style.bottom = "0";
                    b.style.left = "0";
                    b.style.position = "fixed";
                    b.style.width = W(100, 110).toString() + "%";
                    b.style.zIndex = W(2147483544, 2147483644).toString();
                    b.style["background-color"] = ma(249, 259, 242, 252, 219, 229);
                    b.style["box-shadow"] = "0 0 12px #888";
                    b.style.color = ma(0, 10, 0, 10, 0, 10);
                    b.style.display =
                        "flex";
                    b.style["justify-content"] = "center";
                    b.style["font-family"] = "Roboto, Arial";
                    c = X(a);
                    c.style.width = W(80, 85).toString() + "%";
                    c.style.maxWidth = W(750, 775).toString() + "px";
                    c.style.margin = "24px";
                    c.style.display = "flex";
                    c.style["align-items"] = "flex-start";
                    c.style["justify-content"] = "center";
                    d = Q(a.j.g, "IMG");
                    d.className = A();
                    d.src = ia;
                    d.style.height = "24px";
                    d.style.width = "24px";
                    d.style["padding-right"] = "16px";
                    var e = X(a),
                        f = X(a);
                    f.style["font-weight"] = "bold";
                    f.textContent = ja;
                    var h = X(a);
                    h.textContent = ka;
                    Y(a,
                        e, f);
                    Y(a, e, h);
                    Y(a, c, d);
                    Y(a, c, e);
                    Y(a, b, c);
                    a.g = b;
                    a.h.body.appendChild(a.g);
                    b = W(1, 5);
                    for (c = 0; c < b; c++) d = X(a), a.h.body.appendChild(d), a.i.push(d)
                },
                Y = function(a, b, c) {
                    for (var d = W(1, 5), e = 0; e < d; e++) {
                        var f = X(a);
                        b.appendChild(f)
                    }
                    b.appendChild(c);
                    c = W(1, 5);
                    for (d = 0; d < c; d++) e = X(a), b.appendChild(e)
                },
                W = function(a, b) {
                    return Math.floor(a + Math.random() * (b - a))
                },
                ma = function(a, b, c, d, e, f) {
                    return "rgb(" + W(Math.max(a, 0), Math.min(b, 255)).toString() + "," + W(Math.max(c, 0), Math.min(d,
                        255)).toString() + "," + W(Math.max(e, 0), Math.min(f,
                        255)).toString() + ")"
                },
                X = function(a) {
                    a = Q(a.j.g, "DIV");
                    a.className = A();
                    return a
                },
                U = function(a, b) {
                    0 >= b || null != a.g && 0 != a.g.offsetHeight && 0 != a.g.offsetWidth || (na(a), T(a), r
                        .setTimeout(function() {
                            return U(a, b - 1)
                        }, 50))
                },
                na = function(a) {
                    var b = a.i;
                    var c = "undefined" != typeof Symbol && Symbol.iterator && b[Symbol.iterator];
                    b = c ? c.call(b) : {
                        next: aa(b)
                    };
                    for (c = b.next(); !c.done; c = b.next())(c = c.value) && c.parentNode && c.parentNode.removeChild(
                        c);
                    a.i = [];
                    (b = a.g) && b.parentNode && b.parentNode.removeChild(b);
                    a.g = null
                };
            var pa = function(a, b, c, d, e) {
                    var f = oa(c),
                        h = function(l) {
                            l.appendChild(f);
                            r.setTimeout(function() {
                                f ? (0 !== f.offsetHeight && 0 !== f.offsetWidth ? b() : a(), f.parentNode && f
                                    .parentNode.removeChild(f)) : a()
                            }, d)
                        },
                        g = function(l) {
                            document.body ? h(document.body) : 0 < l ? r.setTimeout(function() {
                                g(l - 1)
                            }, e) : b()
                        };
                    g(3)
                },
                oa = function(a) {
                    var b = document.createElement("div");
                    b.className = a;
                    b.style.width = "1px";
                    b.style.height = "1px";
                    b.style.position = "absolute";
                    b.style.left = "-10000px";
                    b.style.top = "-10000px";
                    b.style.zIndex = "-10000";
                    return b
                };
            var L = function(a) {
                J.call(this, a)
            };
            q(L, J);
            var qa = function(a) {
                J.call(this, a)
            };
            q(qa, J);
            var ra = function(a, b) {
                this.l = a;
                this.m = new R(a.document);
                this.g = b;
                this.i = K(this.g, 1);
                b = M(this.g, 2);
                this.o = x(K(b, 4) || "");
                this.h = !1;
                b = M(this.g, 13);
                b = x(K(b, 4) || "");
                this.j = new la(a.document, b, K(this.g, 12))
            };
            ra.prototype.start = function() {
                sa(this)
            };
            var sa = function(a) {
                    ta(a);
                    S(a.m, a.o, 3, !1, function() {
                        a: {
                            var b = a.i;
                            var c = r.btoa(b);
                            if (c = r[c]) {
                                try {
                                    var d = O(P, r.atob(c))
                                } catch (e) {
                                    b = !1;
                                    break a
                                }
                                b = b === K(d, 1)
                            } else b = !1
                        }
                        b ? Z(a, K(a.g, 14)) : (Z(a, K(a.g, 8)), V(a.j))
                    }, function() {
                        pa(function() {
                            Z(a, K(a.g, 7));
                            V(a.j)
                        }, function() {
                            return Z(a, K(a.g, 6))
                        }, K(a.g, 9), K(a.g, 10), K(a.g, 11))
                    })
                },
                Z = function(a, b) {
                    a.h || (a.h = !0, a = new a.l.XMLHttpRequest, a.open("GET", b, !0), a.send())
                },
                ta = function(a) {
                    var b = r.btoa(a.i);
                    a.l[b] && Z(a, K(a.g, 5))
                };
            (function(a, b) {
                r[a] = function(c) {
                    for (var d = [], e = 0; e < arguments.length; ++e) d[e - 0] = arguments[e];
                    r[a] = da;
                    b.apply(null, d)
                }
            })("__h82AlnkH6D91__", function(a) {
                "function" === typeof window.atob && (new ra(window, O(qa, window.atob(a)))).start()
            });
        }).call(this);

        window.__h82AlnkH6D91__(
            "WyJwdWItNzI5Nzc4MTU5MTQ3MTc1OCIsW251bGwsbnVsbCxudWxsLCJodHRwczovL2Z1bmRpbmdjaG9pY2VzbWVzc2FnZXMuZ29vZ2xlLmNvbS9iL3B1Yi03Mjk3NzgxNTkxNDcxNzU4Il0sbnVsbCxudWxsLCJodHRwczovL2Z1bmRpbmdjaG9pY2VzbWVzc2FnZXMuZ29vZ2xlLmNvbS9lbC9BR1NLV3hYMVMzemRMRks4dGFWNzNzcDRvdXlSUXRsWGFGUUM1VFRjTURBUWVNLTN1Q25OYTJzZzlKZkxvZGZiZlJMX1RtUTgyNzd3YWJfSGJrS3ZGaTZ5NzM5U0ZRXHUwMDNkXHUwMDNkP3RlXHUwMDNkVE9LRU5fRVhQT1NFRCIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFVjeDhiM0tGSUJhbWNtbDF2alN3WE9jc0pJa3dpN1daS3gySkJfNnJJSk4tMlhXVWFPQ1NYcDY1aFZNVkpBUXUxMTAyNXB5cEJSMUphMUo2aUxQU0hiZFFcdTAwM2RcdTAwM2Q/YWJcdTAwM2QxXHUwMDI2c2JmXHUwMDNkMSIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFc0c1hmNVhySWticzlwb0drVEQ2RnI0eGlaQlhDZ1E3LW1Td3B1bFRUbjRjUUtwSF9lUTcyUkhrZnVjY0V5RGZacnh2VDJZYjhMbkF3M3VyWVNHWmYxYUFcdTAwM2RcdTAwM2Q/YWJcdTAwM2QyXHUwMDI2c2JmXHUwMDNkMSIsImh0dHBzOi8vZnVuZGluZ2Nob2ljZXNtZXNzYWdlcy5nb29nbGUuY29tL2VsL0FHU0tXeFdCZjVSUjJGNHJhN1hjMjVNSnlPXzVuRGJPR01SNVdIYzRnN0xHYkFENWdjRGd0RnlTOUJ4S3hwUEtaT1ZXbEhONWVCOGktN0ZJNjFxbWhYcF9sUEVVd2dcdTAwM2RcdTAwM2Q/c2JmXHUwMDNkMiIsImRpdi1ncHQtYWQiLDIwLDEwMCwiY0hWaUxUY3lPVGMzT0RFMU9URTBOekUzTlRnXHUwMDNkIixbbnVsbCxudWxsLG51bGwsImh0dHBzOi8vd3d3LmdzdGF0aWMuY29tLzBlbW4vZi9wL3B1Yi03Mjk3NzgxNTkxNDcxNzU4LmpzP3VzcXBcdTAwM2RDQTAiXSwiaHR0cHM6Ly9mdW5kaW5nY2hvaWNlc21lc3NhZ2VzLmdvb2dsZS5jb20vZWwvQUdTS1d4V0k0WVJsWFBrejNOVlNBejVQaEhMbXNvRkhUWjlXV2lXWTNwTFhnTHpNdkpINGxVZ0hTU3NISVlMN3hjVGpQYnEzbVZiVUVYaFN1TWdETEotNTVMM3hVd1x1MDAzZFx1MDAzZCJd"
        );
    </script>
    <?php echo $__env->yieldContent('head'); ?>
    <style>
        * {
            font-family: 'Oswald', sans-serif;
        }

        .modal-backdrop {
            z-index: 3 !important;
        }

        .cropped {
            min-width: 100%;
            height: 77px;
            overflow: hidden;
        }

        .cropped img {
            margin: auto 0px 0px -90px;
        }

        .text-white: {
            color: white !important;
        }

        .gcount {
            font-weight: bold;
            font-style: normal;
            /* text-shadow: 3px 4px 7px rgba(38, 0, 255, 0.8); */
            color: red;
        }

        .list_badge {
            border-top-right-radius: 0px !important;
            border-bottom-right-radius: 0px !important;
            font-size: 12px !important;
            min-width: 50px !important;
            position: absolute !important;
            right: 0 !important;
        }

        .warning_download {
            line-height: 1.6;
            color: #543e3e !important;
        }

        .gcat {
            font-weight: bold;
            /* text-shadow:
 1px 1px 0 #c63d2b,
 -1px -1px 0 #c6c23f; */
        }

        /* .lgtext {

            text-shadow: -1px 1px 0 #41ba45,
                1px 1px 0 #c63d2b,
                1px -1px 0 #42afac,
                -1px -1px 0 #c6c23f;
        } */
    </style>



</head>

<body id="dscroll">
    


    <div class="container-fluid" style="background:  #f7efe9">
        <div class="row">
            
            <div class="col-12 p-0 position-sticky  d-none d-md-block" style=" top: 0; z-index: 16; background: #a81d1d">
                <div class="container ">
                    <div class="row">
                        <div class="col-12 p-0 nbar ">
                            <nav class="navbar py-0 navbar-expand-md navbar-dark "
                                style="background: #a81d1d !important;">
                                <label class="logo px-0" onclick="location.href='<?php echo e(route('game.gameList')); ?>'"
                                    style="cursor: pointer">
                                    <img src="<?php echo e(asset(\App\Custom::$info['c-logo'])); ?>"
                                        style="width: 65px; filter:drop-shadow(0px 0px 6px white) !important;">
                                </label>
                                <span class="h3 lgtext pl-2 text-white gsmm"
                                    onclick="location.href='<?php echo e(route('game.gameList')); ?>'"
                                    style="cursor: pointer">MGMM</span>
                                
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>


                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link " href="<?php echo e(asset('/')); ?>">Home</a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link " href="#" id="navbarDropdown" role="button"
                                                data-toggle="modal" data-target="#catmodal">
                                                Games
                                            </a>
                                            <!-- Modal -->
                                            

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="<?php echo e(asset('/softwares')); ?>">Software</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link "
                                                href="<?php echo e(route('requestGame.createRequest')); ?>">ဂိမ်းတောင်းရန်</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                        <a class="nav-link " href="<?php echo e(route('suggestGame.createSuggest')); ?>">Suggest Website</a>
                                    </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link " href="<?php echo e(route('adGame')); ?>">Our Team</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal fade " id="catmodal" tabindex="-1" role="dialog" style="z-index:3000;"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog vh-100 modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                                ဂိမ်းအမျိုးအစားအလိုက်ကြည့်ရန်
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="z-index:3000;">
                                                            <div
                                                                class="d-flex flex-wrap justify-content-center align-items-center">
                                                                <a class="gcat col-12 btn btn-outline-primary px-3 py-2 "
                                                                    href="<?php echo e(route('game.gameList')); ?>"
                                                                    role="button">ဂိမ်းအားလုံး <span class="gcount">
                                                                        (<?php echo e(App\Post::count()); ?> ဂိမ်း) </span></a>
                                                                <?php $__currentLoopData = \App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <a style=" font-size:14px;"
                                                                        class="gcat mt-1 col-6 btn btn-outline-primary px-2 py-2 "
                                                                        href="<?php echo e(route('game.gameListFilter', $cat->id)); ?>"
                                                                        role="button"><?php echo e($cat->title); ?> <span
                                                                            class="gcount">(<?php echo e(App\Category::find($cat->id)->posts()->count()); ?>)</span>
                                                                    </a>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
            <div class="fb-quote"></div>
            <?php echo $__env->yieldContent('download'); ?>
            <!-- <div class="main_bg_photo"></div> -->
            <div class="content_bod col-12 p-0 bg-light  pb-5" style="min-height: 65vh">
                <?php echo $__env->yieldContent('content'); ?>
                <div id="yourElementId" class=" pb-5"></div>
                <div class="col-12 d-md-none d-block pb-2 pt-3 shadow shadow-lg d-flex justify-content-center align-items-center mobile_footer" style="position: fixed;
                width: 100%;
                z-index:2900;
                bottom: 0;
                right: 0;
                background: #ffffff !important;
                color: black !important;">
                    <div onclick="window.location.href = '<?php echo e(url('/')); ?>';" class="col <?php if(Request::url() == url('/')): ?> text-primary <?php else: ?> text-dark <?php endif; ?> px-0 text-center">
                        <i class="feather-home"></i><br>
                        <span style="font-size: 14px">Home</span>
                    </div>
                    <div class="col <?php if(preg_match('/\/game\/\d+/', Request::url())): ?> text-primary <?php else: ?> text-dark <?php endif; ?> px-0 text-center">
                        <i class="feather-grid"></i><br>
                        <a style="font-size: 14px" class=" <?php if(preg_match('/\/game\/\d+/', Request::url())): ?> text-primary <?php else: ?> text-dark <?php endif; ?> href="#" id="navbarDropdown" role="button"
                                                data-toggle="modal" data-target="#catmodal">
                                                Games
                        </a>
                    </div>
                    <div onclick="window.location.href = '<?php echo e(url('/softwares')); ?>';" class="col <?php if(Request::url() == url('/softwares')): ?> text-primary <?php else: ?> text-dark <?php endif; ?> px-0 text-center">
                        <i class="feather-cpu"></i><br>
                        <span style="font-size: 14px">Software</span>
                    </div>
                    <div onclick="window.location.href = '<?php echo e(route('requestGame.createRequest')); ?>';" class="col <?php if(Request::url() == url('/request_game/create')): ?> text-primary <?php else: ?> text-dark <?php endif; ?> px-0 text-center">
                        <i class="feather-box"></i><br>
                        <span style="font-size: 14px">Request</span>
                    </div>
                    <div onclick="window.location.href = '<?php echo e(route('adGame')); ?>';" class="col <?php if(Request::url() == url('/our_team')): ?> text-primary <?php else: ?> text-dark <?php endif; ?> px-0 text-center">
                        <i class="feather-users"></i><br>
                        <a style="font-size: 14px">Team</a>
                    </div>

                </div>
                <div class="footer mt-4 d-none d-md-block text-dark text-center pb-3 py-3 font-weight-bolder "
                    style="background-color: rgba(255,255,255,0.8); line-height: 30px">
                    <span class="px-3" >Copyright ©2021 All rights reserved | This Website is
                        Created by <a href="https://www.facebook.com/aunghtetch0n">Aung Htet Chon</a>
                    </span>
                </div>
            </div>

        </div>
    </div>


    <!-- Scripts -->
    <script src="<?php echo e(asset('dashboard/js/jquery.js')); ?>"></script>
    <!-- <script src="https://code.jquery.com/jquery-migrate-3.4.1.min.js"
        integrity="sha256-UnTxHm+zKuDPLfufgEMnKGXDl6fEIjtM+n1Q6lL73ok=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/venobox/venobox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/font-awesome/fontawesome.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/font-awesome/all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/slick/slick.min.js')); ?>"></script>

    <script>
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut(500);
        });
        $(document).ready(function() {
            $('.venobox').venobox({ // default: ''
                frameheight: '600px', // default: ''
                bgcolor: '#5dff5e', // default: '#fff'
                titleattr: 'data-title', // default: 'title'
                numeratio: true, // default: false
                infinigall: true, // default: false
            });
        });
    </script>
    <?php echo $__env->yieldContent('foot'); ?>


</body>

</html>
<?php /**PATH /var/www/modgamesmm/resources/views/dashboard/game_ui.blade.php ENDPATH**/ ?>