/*
 PlugIn Content
 ---------------------
 1. Swiper
 3. Counter Up
 4. Waypoints
 5. VenoBox
 7. Magnific Popup
 . Rateyo
 . Parallax js
 . Bootstrap Progressbar
 */

/**
 * Swiper 3.4.2
 * Most modern mobile touch slider and framework with hardware accelerated transitions
 *
 * http://www.idangero.us/swiper/
 *
 * Copyright 2017, Vladimir Kharlampidi
 * The iDangero.us
 * http://www.idangero.us/
 *
 * Licensed under MIT
 *
 * Released on: March 10, 2017
 */
! function() {
    "use strict";
    var e, a = function(t, s) {
        function r(e) {
            return Math.floor(e)
        }

        function i() {
            var e = x.params.autoplay,
                a = x.slides.eq(x.activeIndex);
            a.attr("data-swiper-autoplay") && (e = a.attr("data-swiper-autoplay") || x.params.autoplay), x.autoplayTimeoutId = setTimeout(function() {
                x.params.loop ? (x.fixLoop(), x._slideNext(), x.emit("onAutoplay", x)) : x.isEnd ? s.autoplayStopOnLast ? x.stopAutoplay() : (x._slideTo(0), x.emit("onAutoplay", x)) : (x._slideNext(), x.emit("onAutoplay", x))
            }, e)
        }

        function n(a, t) {
            var s = e(a.target);
            if (!s.is(t))
                if ("string" == typeof t) s = s.parents(t);
                else if (t.nodeType) {
                var r;
                return s.parents().each(function(e, a) {
                    a === t && (r = t)
                }), r ? t : void 0
            }
            if (0 !== s.length) return s[0]
        }

        function o(e, a) {
            a = a || {};
            var t = window.MutationObserver || window.WebkitMutationObserver,
                s = new t(function(e) {
                    e.forEach(function(e) {
                        x.onResize(!0), x.emit("onObserverUpdate", x, e)
                    })
                });
            s.observe(e, {
                attributes: void 0 === a.attributes || a.attributes,
                childList: void 0 === a.childList || a.childList,
                characterData: void 0 === a.characterData || a.characterData
            }), x.observers.push(s)
        }

        function l(e) {
            e.originalEvent && (e = e.originalEvent);
            var a = e.keyCode || e.charCode;
            if (!x.params.allowSwipeToNext && (x.isHorizontal() && 39 === a || !x.isHorizontal() && 40 === a)) return !1;
            if (!x.params.allowSwipeToPrev && (x.isHorizontal() && 37 === a || !x.isHorizontal() && 38 === a)) return !1;
            if (!(e.shiftKey || e.altKey || e.ctrlKey || e.metaKey || document.activeElement && document.activeElement.nodeName && ("input" === document.activeElement.nodeName.toLowerCase() || "textarea" === document.activeElement.nodeName.toLowerCase()))) {
                if (37 === a || 39 === a || 38 === a || 40 === a) {
                    var t = !1;
                    if (x.container.parents("." + x.params.slideClass).length > 0 && 0 === x.container.parents("." + x.params.slideActiveClass).length) return;
                    var s = {
                            left: window.pageXOffset,
                            top: window.pageYOffset
                        },
                        r = window.innerWidth,
                        i = window.innerHeight,
                        n = x.container.offset();
                    x.rtl && (n.left = n.left - x.container[0].scrollLeft);
                    for (var o = [
                            [n.left, n.top],
                            [n.left + x.width, n.top],
                            [n.left, n.top + x.height],
                            [n.left + x.width, n.top + x.height]
                        ], l = 0; l < o.length; l++) {
                        var p = o[l];
                        p[0] >= s.left && p[0] <= s.left + r && p[1] >= s.top && p[1] <= s.top + i && (t = !0)
                    }
                    if (!t) return
                }
                x.isHorizontal() ? (37 !== a && 39 !== a || (e.preventDefault ? e.preventDefault() : e.returnValue = !1), (39 === a && !x.rtl || 37 === a && x.rtl) && x.slideNext(), (37 === a && !x.rtl || 39 === a && x.rtl) && x.slidePrev()) : (38 !== a && 40 !== a || (e.preventDefault ? e.preventDefault() : e.returnValue = !1), 40 === a && x.slideNext(), 38 === a && x.slidePrev()), x.emit("onKeyPress", x, a)
            }
        }

        function p(e) {
            var a = 0,
                t = 0,
                s = 0,
                r = 0;
            return "detail" in e && (t = e.detail), "wheelDelta" in e && (t = -e.wheelDelta / 120), "wheelDeltaY" in e && (t = -e.wheelDeltaY / 120), "wheelDeltaX" in e && (a = -e.wheelDeltaX / 120), "axis" in e && e.axis === e.HORIZONTAL_AXIS && (a = t, t = 0), s = 10 * a, r = 10 * t, "deltaY" in e && (r = e.deltaY), "deltaX" in e && (s = e.deltaX), (s || r) && e.deltaMode && (1 === e.deltaMode ? (s *= 40, r *= 40) : (s *= 800, r *= 800)), s && !a && (a = s < 1 ? -1 : 1), r && !t && (t = r < 1 ? -1 : 1), {
                spinX: a,
                spinY: t,
                pixelX: s,
                pixelY: r
            }
        }

        function d(e) {
            e.originalEvent && (e = e.originalEvent);
            var a = 0,
                t = x.rtl ? -1 : 1,
                s = p(e);
            if (x.params.mousewheelForceToAxis)
                if (x.isHorizontal()) {
                    if (!(Math.abs(s.pixelX) > Math.abs(s.pixelY))) return;
                    a = s.pixelX * t
                } else {
                    if (!(Math.abs(s.pixelY) > Math.abs(s.pixelX))) return;
                    a = s.pixelY
                } else a = Math.abs(s.pixelX) > Math.abs(s.pixelY) ? -s.pixelX * t : -s.pixelY;
            if (0 !== a) {
                if (x.params.mousewheelInvert && (a = -a), x.params.freeMode) {
                    var r = x.getWrapperTranslate() + a * x.params.mousewheelSensitivity,
                        i = x.isBeginning,
                        n = x.isEnd;
                    if (r >= x.minTranslate() && (r = x.minTranslate()), r <= x.maxTranslate() && (r = x.maxTranslate()), x.setWrapperTransition(0), x.setWrapperTranslate(r), x.updateProgress(), x.updateActiveIndex(), (!i && x.isBeginning || !n && x.isEnd) && x.updateClasses(), x.params.freeModeSticky ? (clearTimeout(x.mousewheel.timeout), x.mousewheel.timeout = setTimeout(function() {
                            x.slideReset()
                        }, 300)) : x.params.lazyLoading && x.lazy && x.lazy.load(), x.emit("onScroll", x, e), x.params.autoplay && x.params.autoplayDisableOnInteraction && x.stopAutoplay(), 0 === r || r === x.maxTranslate()) return
                } else {
                    if ((new window.Date).getTime() - x.mousewheel.lastScrollTime > 60)
                        if (a < 0)
                            if (x.isEnd && !x.params.loop || x.animating) {
                                if (x.params.mousewheelReleaseOnEdges) return !0
                            } else x.slideNext(), x.emit("onScroll", x, e);
                    else if (x.isBeginning && !x.params.loop || x.animating) {
                        if (x.params.mousewheelReleaseOnEdges) return !0
                    } else x.slidePrev(), x.emit("onScroll", x, e);
                    x.mousewheel.lastScrollTime = (new window.Date).getTime()
                }
                return e.preventDefault ? e.preventDefault() : e.returnValue = !1, !1
            }
        }

        function m(a, t) {
            a = e(a);
            var s, r, i, n = x.rtl ? -1 : 1;
            s = a.attr("data-swiper-parallax") || "0", r = a.attr("data-swiper-parallax-x"), i = a.attr("data-swiper-parallax-y"), r || i ? (r = r || "0", i = i || "0") : x.isHorizontal() ? (r = s, i = "0") : (i = s, r = "0"), r = r.indexOf("%") >= 0 ? parseInt(r, 10) * t * n + "%" : r * t * n + "px", i = i.indexOf("%") >= 0 ? parseInt(i, 10) * t + "%" : i * t + "px", a.transform("translate3d(" + r + ", " + i + ",0px)")
        }

        function u(e) {
            return 0 !== e.indexOf("on") && (e = e[0] !== e[0].toUpperCase() ? "on" + e[0].toUpperCase() + e.substring(1) : "on" + e), e
        }
        if (!(this instanceof a)) return new a(t, s);
        var c = {
                direction: "horizontal",
                touchEventsTarget: "container",
                initialSlide: 0,
                speed: 300,
                autoplay: !1,
                autoplayDisableOnInteraction: !0,
                autoplayStopOnLast: !1,
                iOSEdgeSwipeDetection: !1,
                iOSEdgeSwipeThreshold: 20,
                freeMode: !1,
                freeModeMomentum: !0,
                freeModeMomentumRatio: 1,
                freeModeMomentumBounce: !0,
                freeModeMomentumBounceRatio: 1,
                freeModeMomentumVelocityRatio: 1,
                freeModeSticky: !1,
                freeModeMinimumVelocity: .02,
                autoHeight: !1,
                setWrapperSize: !1,
                virtualTranslate: !1,
                effect: "slide",
                coverflow: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: !0
                },
                flip: {
                    slideShadows: !0,
                    limitRotation: !0
                },
                cube: {
                    slideShadows: !0,
                    shadow: !0,
                    shadowOffset: 20,
                    shadowScale: .94
                },
                fade: {
                    crossFade: !1
                },
                parallax: !1,
                zoom: !1,
                zoomMax: 3,
                zoomMin: 1,
                zoomToggle: !0,
                scrollbar: null,
                scrollbarHide: !0,
                scrollbarDraggable: !1,
                scrollbarSnapOnRelease: !1,
                keyboardControl: !1,
                mousewheelControl: !1,
                mousewheelReleaseOnEdges: !1,
                mousewheelInvert: !1,
                mousewheelForceToAxis: !1,
                mousewheelSensitivity: 1,
                mousewheelEventsTarged: "container",
                hashnav: !1,
                hashnavWatchState: !1,
                history: !1,
                replaceState: !1,
                breakpoints: void 0,
                spaceBetween: 0,
                slidesPerView: 1,
                slidesPerColumn: 1,
                slidesPerColumnFill: "column",
                slidesPerGroup: 1,
                centeredSlides: !1,
                slidesOffsetBefore: 0,
                slidesOffsetAfter: 0,
                roundLengths: !1,
                touchRatio: 1,
                touchAngle: 45,
                simulateTouch: !0,
                shortSwipes: !0,
                longSwipes: !0,
                longSwipesRatio: .5,
                longSwipesMs: 300,
                followFinger: !0,
                onlyExternal: !1,
                threshold: 0,
                touchMoveStopPropagation: !0,
                touchReleaseOnEdges: !1,
                uniqueNavElements: !0,
                pagination: null,
                paginationElement: "span",
                paginationClickable: !1,
                paginationHide: !1,
                paginationBulletRender: null,
                paginationProgressRender: null,
                paginationFractionRender: null,
                paginationCustomRender: null,
                paginationType: "bullets",
                resistance: !0,
                resistanceRatio: .85,
                nextButton: null,
                prevButton: null,
                watchSlidesProgress: !1,
                watchSlidesVisibility: !1,
                grabCursor: !1,
                preventClicks: !0,
                preventClicksPropagation: !0,
                slideToClickedSlide: !1,
                lazyLoading: !1,
                lazyLoadingInPrevNext: !1,
                lazyLoadingInPrevNextAmount: 1,
                lazyLoadingOnTransitionStart: !1,
                preloadImages: !0,
                updateOnImagesReady: !0,
                loop: !1,
                loopAdditionalSlides: 0,
                loopedSlides: null,
                control: void 0,
                controlInverse: !1,
                controlBy: "slide",
                normalizeSlideIndex: !0,
                allowSwipeToPrev: !0,
                allowSwipeToNext: !0,
                swipeHandler: null,
                noSwiping: !0,
                noSwipingClass: "swiper-no-swiping",
                passiveListeners: !0,
                containerModifierClass: "swiper-container-",
                slideClass: "swiper-slide",
                slideActiveClass: "swiper-slide-active",
                slideDuplicateActiveClass: "swiper-slide-duplicate-active",
                slideVisibleClass: "swiper-slide-visible",
                slideDuplicateClass: "swiper-slide-duplicate",
                slideNextClass: "swiper-slide-next",
                slideDuplicateNextClass: "swiper-slide-duplicate-next",
                slidePrevClass: "swiper-slide-prev",
                slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
                wrapperClass: "swiper-wrapper",
                bulletClass: "swiper-pagination-bullet",
                bulletActiveClass: "swiper-pagination-bullet-active",
                buttonDisabledClass: "swiper-button-disabled",
                paginationCurrentClass: "swiper-pagination-current",
                paginationTotalClass: "swiper-pagination-total",
                paginationHiddenClass: "swiper-pagination-hidden",
                paginationProgressbarClass: "swiper-pagination-progressbar",
                paginationClickableClass: "swiper-pagination-clickable",
                paginationModifierClass: "swiper-pagination-",
                lazyLoadingClass: "swiper-lazy",
                lazyStatusLoadingClass: "swiper-lazy-loading",
                lazyStatusLoadedClass: "swiper-lazy-loaded",
                lazyPreloaderClass: "swiper-lazy-preloader",
                notificationClass: "swiper-notification",
                preloaderClass: "preloader",
                zoomContainerClass: "swiper-zoom-container",
                observer: !1,
                observeParents: !1,
                a11y: !1,
                prevSlideMessage: "Previous slide",
                nextSlideMessage: "Next slide",
                firstSlideMessage: "This is the first slide",
                lastSlideMessage: "This is the last slide",
                paginationBulletMessage: "Go to slide {{index}}",
                runCallbacksOnInit: !0
            },
            g = s && s.virtualTranslate;
        s = s || {};
        var h = {};
        for (var v in s)
            if ("object" != typeof s[v] || null === s[v] || (s[v].nodeType || s[v] === window || s[v] === document || "undefined" != typeof Dom7 && s[v] instanceof Dom7 || "undefined" != typeof jQuery && s[v] instanceof jQuery)) h[v] = s[v];
            else {
                h[v] = {};
                for (var f in s[v]) h[v][f] = s[v][f]
            }
        for (var w in c)
            if (void 0 === s[w]) s[w] = c[w];
            else if ("object" == typeof s[w])
            for (var y in c[w]) void 0 === s[w][y] && (s[w][y] = c[w][y]);
        var x = this;
        if (x.params = s, x.originalParams = h, x.classNames = [], void 0 !== e && "undefined" != typeof Dom7 && (e = Dom7), (void 0 !== e || (e = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery : Dom7)) && (x.$ = e, x.currentBreakpoint = void 0, x.getActiveBreakpoint = function() {
                if (!x.params.breakpoints) return !1;
                var e, a = !1,
                    t = [];
                for (e in x.params.breakpoints) x.params.breakpoints.hasOwnProperty(e) && t.push(e);
                t.sort(function(e, a) {
                    return parseInt(e, 10) > parseInt(a, 10)
                });
                for (var s = 0; s < t.length; s++)(e = t[s]) >= window.innerWidth && !a && (a = e);
                return a || "max"
            }, x.setBreakpoint = function() {
                var e = x.getActiveBreakpoint();
                if (e && x.currentBreakpoint !== e) {
                    var a = e in x.params.breakpoints ? x.params.breakpoints[e] : x.originalParams,
                        t = x.params.loop && a.slidesPerView !== x.params.slidesPerView;
                    for (var s in a) x.params[s] = a[s];
                    x.currentBreakpoint = e, t && x.destroyLoop && x.reLoop(!0)
                }
            }, x.params.breakpoints && x.setBreakpoint(), x.container = e(t), 0 !== x.container.length)) {
            if (x.container.length > 1) {
                var T = [];
                return x.container.each(function() {
                    T.push(new a(this, s))
                }), T
            }
            x.container[0].swiper = x, x.container.data("swiper", x), x.classNames.push(x.params.containerModifierClass + x.params.direction), x.params.freeMode && x.classNames.push(x.params.containerModifierClass + "free-mode"), x.support.flexbox || (x.classNames.push(x.params.containerModifierClass + "no-flexbox"), x.params.slidesPerColumn = 1), x.params.autoHeight && x.classNames.push(x.params.containerModifierClass + "autoheight"), (x.params.parallax || x.params.watchSlidesVisibility) && (x.params.watchSlidesProgress = !0), x.params.touchReleaseOnEdges && (x.params.resistanceRatio = 0), ["cube", "coverflow", "flip"].indexOf(x.params.effect) >= 0 && (x.support.transforms3d ? (x.params.watchSlidesProgress = !0, x.classNames.push(x.params.containerModifierClass + "3d")) : x.params.effect = "slide"), "slide" !== x.params.effect && x.classNames.push(x.params.containerModifierClass + x.params.effect), "cube" === x.params.effect && (x.params.resistanceRatio = 0, x.params.slidesPerView = 1, x.params.slidesPerColumn = 1, x.params.slidesPerGroup = 1, x.params.centeredSlides = !1, x.params.spaceBetween = 0, x.params.virtualTranslate = !0), "fade" !== x.params.effect && "flip" !== x.params.effect || (x.params.slidesPerView = 1, x.params.slidesPerColumn = 1, x.params.slidesPerGroup = 1, x.params.watchSlidesProgress = !0, x.params.spaceBetween = 0, void 0 === g && (x.params.virtualTranslate = !0)), x.params.grabCursor && x.support.touch && (x.params.grabCursor = !1), x.wrapper = x.container.children("." + x.params.wrapperClass), x.params.pagination && (x.paginationContainer = e(x.params.pagination), x.params.uniqueNavElements && "string" == typeof x.params.pagination && x.paginationContainer.length > 1 && 1 === x.container.find(x.params.pagination).length && (x.paginationContainer = x.container.find(x.params.pagination)), "bullets" === x.params.paginationType && x.params.paginationClickable ? x.paginationContainer.addClass(x.params.paginationModifierClass + "clickable") : x.params.paginationClickable = !1, x.paginationContainer.addClass(x.params.paginationModifierClass + x.params.paginationType)), (x.params.nextButton || x.params.prevButton) && (x.params.nextButton && (x.nextButton = e(x.params.nextButton), x.params.uniqueNavElements && "string" == typeof x.params.nextButton && x.nextButton.length > 1 && 1 === x.container.find(x.params.nextButton).length && (x.nextButton = x.container.find(x.params.nextButton))), x.params.prevButton && (x.prevButton = e(x.params.prevButton), x.params.uniqueNavElements && "string" == typeof x.params.prevButton && x.prevButton.length > 1 && 1 === x.container.find(x.params.prevButton).length && (x.prevButton = x.container.find(x.params.prevButton)))), x.isHorizontal = function() {
                return "horizontal" === x.params.direction
            }, x.rtl = x.isHorizontal() && ("rtl" === x.container[0].dir.toLowerCase() || "rtl" === x.container.css("direction")), x.rtl && x.classNames.push(x.params.containerModifierClass + "rtl"), x.rtl && (x.wrongRTL = "-webkit-box" === x.wrapper.css("display")), x.params.slidesPerColumn > 1 && x.classNames.push(x.params.containerModifierClass + "multirow"), x.device.android && x.classNames.push(x.params.containerModifierClass + "android"), x.container.addClass(x.classNames.join(" ")), x.translate = 0, x.progress = 0, x.velocity = 0, x.lockSwipeToNext = function() {
                x.params.allowSwipeToNext = !1, x.params.allowSwipeToPrev === !1 && x.params.grabCursor && x.unsetGrabCursor()
            }, x.lockSwipeToPrev = function() {
                x.params.allowSwipeToPrev = !1, x.params.allowSwipeToNext === !1 && x.params.grabCursor && x.unsetGrabCursor()
            }, x.lockSwipes = function() {
                x.params.allowSwipeToNext = x.params.allowSwipeToPrev = !1, x.params.grabCursor && x.unsetGrabCursor()
            }, x.unlockSwipeToNext = function() {
                x.params.allowSwipeToNext = !0, x.params.allowSwipeToPrev === !0 && x.params.grabCursor && x.setGrabCursor()
            }, x.unlockSwipeToPrev = function() {
                x.params.allowSwipeToPrev = !0, x.params.allowSwipeToNext === !0 && x.params.grabCursor && x.setGrabCursor()
            }, x.unlockSwipes = function() {
                x.params.allowSwipeToNext = x.params.allowSwipeToPrev = !0, x.params.grabCursor && x.setGrabCursor()
            }, x.setGrabCursor = function(e) {
                x.container[0].style.cursor = "move", x.container[0].style.cursor = e ? "-webkit-grabbing" : "-webkit-grab", x.container[0].style.cursor = e ? "-moz-grabbin" : "-moz-grab", x.container[0].style.cursor = e ? "grabbing" : "grab"
            }, x.unsetGrabCursor = function() {
                x.container[0].style.cursor = ""
            }, x.params.grabCursor && x.setGrabCursor(), x.imagesToLoad = [], x.imagesLoaded = 0, x.loadImage = function(e, a, t, s, r, i) {
                function n() {
                    i && i()
                }
                var o;
                e.complete && r ? n() : a ? (o = new window.Image, o.onload = n, o.onerror = n, s && (o.sizes = s), t && (o.srcset = t), a && (o.src = a)) : n()
            }, x.preloadImages = function() {
                function e() {
                    void 0 !== x && null !== x && x && (void 0 !== x.imagesLoaded && x.imagesLoaded++, x.imagesLoaded === x.imagesToLoad.length && (x.params.updateOnImagesReady && x.update(), x.emit("onImagesReady", x)))
                }
                x.imagesToLoad = x.container.find("img");
                for (var a = 0; a < x.imagesToLoad.length; a++) x.loadImage(x.imagesToLoad[a], x.imagesToLoad[a].currentSrc || x.imagesToLoad[a].getAttribute("src"), x.imagesToLoad[a].srcset || x.imagesToLoad[a].getAttribute("srcset"), x.imagesToLoad[a].sizes || x.imagesToLoad[a].getAttribute("sizes"), !0, e)
            }, x.autoplayTimeoutId = void 0, x.autoplaying = !1, x.autoplayPaused = !1, x.startAutoplay = function() {
                return void 0 === x.autoplayTimeoutId && (!!x.params.autoplay && (!x.autoplaying && (x.autoplaying = !0, x.emit("onAutoplayStart", x), void i())))
            }, x.stopAutoplay = function(e) {
                x.autoplayTimeoutId && (x.autoplayTimeoutId && clearTimeout(x.autoplayTimeoutId), x.autoplaying = !1, x.autoplayTimeoutId = void 0, x.emit("onAutoplayStop", x))
            }, x.pauseAutoplay = function(e) {
                x.autoplayPaused || (x.autoplayTimeoutId && clearTimeout(x.autoplayTimeoutId), x.autoplayPaused = !0, 0 === e ? (x.autoplayPaused = !1, i()) : x.wrapper.transitionEnd(function() {
                    x && (x.autoplayPaused = !1, x.autoplaying ? i() : x.stopAutoplay())
                }))
            }, x.minTranslate = function() {
                return -x.snapGrid[0]
            }, x.maxTranslate = function() {
                return -x.snapGrid[x.snapGrid.length - 1]
            }, x.updateAutoHeight = function() {
                var e, a = [],
                    t = 0;
                if ("auto" !== x.params.slidesPerView && x.params.slidesPerView > 1)
                    for (e = 0; e < Math.ceil(x.params.slidesPerView); e++) {
                        var s = x.activeIndex + e;
                        if (s > x.slides.length) break;
                        a.push(x.slides.eq(s)[0])
                    } else a.push(x.slides.eq(x.activeIndex)[0]);
                for (e = 0; e < a.length; e++)
                    if (void 0 !== a[e]) {
                        var r = a[e].offsetHeight;
                        t = r > t ? r : t
                    }
                t && x.wrapper.css("height", t + "px")
            }, x.updateContainerSize = function() {
                var e, a;
                e = void 0 !== x.params.width ? x.params.width : x.container[0].clientWidth, a = void 0 !== x.params.height ? x.params.height : x.container[0].clientHeight, 0 === e && x.isHorizontal() || 0 === a && !x.isHorizontal() || (e = e - parseInt(x.container.css("padding-left"), 10) - parseInt(x.container.css("padding-right"), 10), a = a - parseInt(x.container.css("padding-top"), 10) - parseInt(x.container.css("padding-bottom"), 10), x.width = e, x.height = a, x.size = x.isHorizontal() ? x.width : x.height)
            }, x.updateSlidesSize = function() {
                x.slides = x.wrapper.children("." + x.params.slideClass), x.snapGrid = [], x.slidesGrid = [], x.slidesSizesGrid = [];
                var e, a = x.params.spaceBetween,
                    t = -x.params.slidesOffsetBefore,
                    s = 0,
                    i = 0;
                if (void 0 !== x.size) {
                    "string" == typeof a && a.indexOf("%") >= 0 && (a = parseFloat(a.replace("%", "")) / 100 * x.size), x.virtualSize = -a, x.rtl ? x.slides.css({
                        marginLeft: "",
                        marginTop: ""
                    }) : x.slides.css({
                        marginRight: "",
                        marginBottom: ""
                    });
                    var n;
                    x.params.slidesPerColumn > 1 && (n = Math.floor(x.slides.length / x.params.slidesPerColumn) === x.slides.length / x.params.slidesPerColumn ? x.slides.length : Math.ceil(x.slides.length / x.params.slidesPerColumn) * x.params.slidesPerColumn, "auto" !== x.params.slidesPerView && "row" === x.params.slidesPerColumnFill && (n = Math.max(n, x.params.slidesPerView * x.params.slidesPerColumn)));
                    var o, l = x.params.slidesPerColumn,
                        p = n / l,
                        d = p - (x.params.slidesPerColumn * p - x.slides.length);
                    for (e = 0; e < x.slides.length; e++) {
                        o = 0;
                        var m = x.slides.eq(e);
                        if (x.params.slidesPerColumn > 1) {
                            var u, c, g;
                            "column" === x.params.slidesPerColumnFill ? (c = Math.floor(e / l), g = e - c * l, (c > d || c === d && g === l - 1) && ++g >= l && (g = 0, c++), u = c + g * n / l, m.css({
                                "-webkit-box-ordinal-group": u,
                                "-moz-box-ordinal-group": u,
                                "-ms-flex-order": u,
                                "-webkit-order": u,
                                order: u
                            })) : (g = Math.floor(e / p), c = e - g * p), m.css("margin-" + (x.isHorizontal() ? "top" : "left"), 0 !== g && x.params.spaceBetween && x.params.spaceBetween + "px").attr("data-swiper-column", c).attr("data-swiper-row", g)
                        }
                        "none" !== m.css("display") && ("auto" === x.params.slidesPerView ? (o = x.isHorizontal() ? m.outerWidth(!0) : m.outerHeight(!0), x.params.roundLengths && (o = r(o))) : (o = (x.size - (x.params.slidesPerView - 1) * a) / x.params.slidesPerView, x.params.roundLengths && (o = r(o)), x.isHorizontal() ? x.slides[e].style.width = o + "px" : x.slides[e].style.height = o + "px"), x.slides[e].swiperSlideSize = o, x.slidesSizesGrid.push(o), x.params.centeredSlides ? (t = t + o / 2 + s / 2 + a, 0 === s && 0 !== e && (t = t - x.size / 2 - a), 0 === e && (t = t - x.size / 2 - a), Math.abs(t) < .001 && (t = 0), i % x.params.slidesPerGroup == 0 && x.snapGrid.push(t), x.slidesGrid.push(t)) : (i % x.params.slidesPerGroup == 0 && x.snapGrid.push(t), x.slidesGrid.push(t), t = t + o + a), x.virtualSize += o + a, s = o, i++)
                    }
                    x.virtualSize = Math.max(x.virtualSize, x.size) + x.params.slidesOffsetAfter;
                    var h;
                    if (x.rtl && x.wrongRTL && ("slide" === x.params.effect || "coverflow" === x.params.effect) && x.wrapper.css({
                            width: x.virtualSize + x.params.spaceBetween + "px"
                        }), x.support.flexbox && !x.params.setWrapperSize || (x.isHorizontal() ? x.wrapper.css({
                            width: x.virtualSize + x.params.spaceBetween + "px"
                        }) : x.wrapper.css({
                            height: x.virtualSize + x.params.spaceBetween + "px"
                        })), x.params.slidesPerColumn > 1 && (x.virtualSize = (o + x.params.spaceBetween) * n, x.virtualSize = Math.ceil(x.virtualSize / x.params.slidesPerColumn) - x.params.spaceBetween, x.isHorizontal() ? x.wrapper.css({
                            width: x.virtualSize + x.params.spaceBetween + "px"
                        }) : x.wrapper.css({
                            height: x.virtualSize + x.params.spaceBetween + "px"
                        }), x.params.centeredSlides)) {
                        for (h = [], e = 0; e < x.snapGrid.length; e++) x.snapGrid[e] < x.virtualSize + x.snapGrid[0] && h.push(x.snapGrid[e]);
                        x.snapGrid = h
                    }
                    if (!x.params.centeredSlides) {
                        for (h = [], e = 0; e < x.snapGrid.length; e++) x.snapGrid[e] <= x.virtualSize - x.size && h.push(x.snapGrid[e]);
                        x.snapGrid = h, Math.floor(x.virtualSize - x.size) - Math.floor(x.snapGrid[x.snapGrid.length - 1]) > 1 && x.snapGrid.push(x.virtualSize - x.size)
                    }
                    0 === x.snapGrid.length && (x.snapGrid = [0]), 0 !== x.params.spaceBetween && (x.isHorizontal() ? x.rtl ? x.slides.css({
                        marginLeft: a + "px"
                    }) : x.slides.css({
                        marginRight: a + "px"
                    }) : x.slides.css({
                        marginBottom: a + "px"
                    })), x.params.watchSlidesProgress && x.updateSlidesOffset()
                }
            }, x.updateSlidesOffset = function() {
                for (var e = 0; e < x.slides.length; e++) x.slides[e].swiperSlideOffset = x.isHorizontal() ? x.slides[e].offsetLeft : x.slides[e].offsetTop
            }, x.currentSlidesPerView = function() {
                var e, a, t = 1;
                if (x.params.centeredSlides) {
                    var s, r = x.slides[x.activeIndex].swiperSlideSize;
                    for (e = x.activeIndex + 1; e < x.slides.length; e++) x.slides[e] && !s && (r += x.slides[e].swiperSlideSize, t++, r > x.size && (s = !0));
                    for (a = x.activeIndex - 1; a >= 0; a--) x.slides[a] && !s && (r += x.slides[a].swiperSlideSize, t++, r > x.size && (s = !0))
                } else
                    for (e = x.activeIndex + 1; e < x.slides.length; e++) x.slidesGrid[e] - x.slidesGrid[x.activeIndex] < x.size && t++;
                return t
            }, x.updateSlidesProgress = function(e) {
                if (void 0 === e && (e = x.translate || 0), 0 !== x.slides.length) {
                    void 0 === x.slides[0].swiperSlideOffset && x.updateSlidesOffset();
                    var a = -e;
                    x.rtl && (a = e), x.slides.removeClass(x.params.slideVisibleClass);
                    for (var t = 0; t < x.slides.length; t++) {
                        var s = x.slides[t],
                            r = (a + (x.params.centeredSlides ? x.minTranslate() : 0) - s.swiperSlideOffset) / (s.swiperSlideSize + x.params.spaceBetween);
                        if (x.params.watchSlidesVisibility) {
                            var i = -(a - s.swiperSlideOffset),
                                n = i + x.slidesSizesGrid[t];
                            (i >= 0 && i < x.size || n > 0 && n <= x.size || i <= 0 && n >= x.size) && x.slides.eq(t).addClass(x.params.slideVisibleClass)
                        }
                        s.progress = x.rtl ? -r : r
                    }
                }
            }, x.updateProgress = function(e) {
                void 0 === e && (e = x.translate || 0);
                var a = x.maxTranslate() - x.minTranslate(),
                    t = x.isBeginning,
                    s = x.isEnd;
                0 === a ? (x.progress = 0, x.isBeginning = x.isEnd = !0) : (x.progress = (e - x.minTranslate()) / a, x.isBeginning = x.progress <= 0, x.isEnd = x.progress >= 1), x.isBeginning && !t && x.emit("onReachBeginning", x), x.isEnd && !s && x.emit("onReachEnd", x), x.params.watchSlidesProgress && x.updateSlidesProgress(e), x.emit("onProgress", x, x.progress)
            }, x.updateActiveIndex = function() {
                var e, a, t, s = x.rtl ? x.translate : -x.translate;
                for (a = 0; a < x.slidesGrid.length; a++) void 0 !== x.slidesGrid[a + 1] ? s >= x.slidesGrid[a] && s < x.slidesGrid[a + 1] - (x.slidesGrid[a + 1] - x.slidesGrid[a]) / 2 ? e = a : s >= x.slidesGrid[a] && s < x.slidesGrid[a + 1] && (e = a + 1) : s >= x.slidesGrid[a] && (e = a);
                x.params.normalizeSlideIndex && (e < 0 || void 0 === e) && (e = 0), t = Math.floor(e / x.params.slidesPerGroup), t >= x.snapGrid.length && (t = x.snapGrid.length - 1), e !== x.activeIndex && (x.snapIndex = t, x.previousIndex = x.activeIndex, x.activeIndex = e, x.updateClasses(), x.updateRealIndex())
            }, x.updateRealIndex = function() {
                x.realIndex = parseInt(x.slides.eq(x.activeIndex).attr("data-swiper-slide-index") || x.activeIndex, 10)
            }, x.updateClasses = function() {
                x.slides.removeClass(x.params.slideActiveClass + " " + x.params.slideNextClass + " " + x.params.slidePrevClass + " " + x.params.slideDuplicateActiveClass + " " + x.params.slideDuplicateNextClass + " " + x.params.slideDuplicatePrevClass);
                var a = x.slides.eq(x.activeIndex);
                a.addClass(x.params.slideActiveClass), s.loop && (a.hasClass(x.params.slideDuplicateClass) ? x.wrapper.children("." + x.params.slideClass + ":not(." + x.params.slideDuplicateClass + ')[data-swiper-slide-index="' + x.realIndex + '"]').addClass(x.params.slideDuplicateActiveClass) : x.wrapper.children("." + x.params.slideClass + "." + x.params.slideDuplicateClass + '[data-swiper-slide-index="' + x.realIndex + '"]').addClass(x.params.slideDuplicateActiveClass));
                var t = a.next("." + x.params.slideClass).addClass(x.params.slideNextClass);
                x.params.loop && 0 === t.length && (t = x.slides.eq(0), t.addClass(x.params.slideNextClass));
                var r = a.prev("." + x.params.slideClass).addClass(x.params.slidePrevClass);
                if (x.params.loop && 0 === r.length && (r = x.slides.eq(-1), r.addClass(x.params.slidePrevClass)), s.loop && (t.hasClass(x.params.slideDuplicateClass) ? x.wrapper.children("." + x.params.slideClass + ":not(." + x.params.slideDuplicateClass + ')[data-swiper-slide-index="' + t.attr("data-swiper-slide-index") + '"]').addClass(x.params.slideDuplicateNextClass) : x.wrapper.children("." + x.params.slideClass + "." + x.params.slideDuplicateClass + '[data-swiper-slide-index="' + t.attr("data-swiper-slide-index") + '"]').addClass(x.params.slideDuplicateNextClass), r.hasClass(x.params.slideDuplicateClass) ? x.wrapper.children("." + x.params.slideClass + ":not(." + x.params.slideDuplicateClass + ')[data-swiper-slide-index="' + r.attr("data-swiper-slide-index") + '"]').addClass(x.params.slideDuplicatePrevClass) : x.wrapper.children("." + x.params.slideClass + "." + x.params.slideDuplicateClass + '[data-swiper-slide-index="' + r.attr("data-swiper-slide-index") + '"]').addClass(x.params.slideDuplicatePrevClass)), x.paginationContainer && x.paginationContainer.length > 0) {
                    var i, n = x.params.loop ? Math.ceil((x.slides.length - 2 * x.loopedSlides) / x.params.slidesPerGroup) : x.snapGrid.length;
                    if (x.params.loop ? (i = Math.ceil((x.activeIndex - x.loopedSlides) / x.params.slidesPerGroup), i > x.slides.length - 1 - 2 * x.loopedSlides && (i -= x.slides.length - 2 * x.loopedSlides), i > n - 1 && (i -= n), i < 0 && "bullets" !== x.params.paginationType && (i = n + i)) : i = void 0 !== x.snapIndex ? x.snapIndex : x.activeIndex || 0, "bullets" === x.params.paginationType && x.bullets && x.bullets.length > 0 && (x.bullets.removeClass(x.params.bulletActiveClass), x.paginationContainer.length > 1 ? x.bullets.each(function() {
                            e(this).index() === i && e(this).addClass(x.params.bulletActiveClass)
                        }) : x.bullets.eq(i).addClass(x.params.bulletActiveClass)), "fraction" === x.params.paginationType && (x.paginationContainer.find("." + x.params.paginationCurrentClass).text(i + 1), x.paginationContainer.find("." + x.params.paginationTotalClass).text(n)), "progress" === x.params.paginationType) {
                        var o = (i + 1) / n,
                            l = o,
                            p = 1;
                        x.isHorizontal() || (p = o, l = 1), x.paginationContainer.find("." + x.params.paginationProgressbarClass).transform("translate3d(0,0,0) scaleX(" + l + ") scaleY(" + p + ")").transition(x.params.speed)
                    }
                    "custom" === x.params.paginationType && x.params.paginationCustomRender && (x.paginationContainer.html(x.params.paginationCustomRender(x, i + 1, n)), x.emit("onPaginationRendered", x, x.paginationContainer[0]))
                }
                x.params.loop || (x.params.prevButton && x.prevButton && x.prevButton.length > 0 && (x.isBeginning ? (x.prevButton.addClass(x.params.buttonDisabledClass), x.params.a11y && x.a11y && x.a11y.disable(x.prevButton)) : (x.prevButton.removeClass(x.params.buttonDisabledClass), x.params.a11y && x.a11y && x.a11y.enable(x.prevButton))), x.params.nextButton && x.nextButton && x.nextButton.length > 0 && (x.isEnd ? (x.nextButton.addClass(x.params.buttonDisabledClass), x.params.a11y && x.a11y && x.a11y.disable(x.nextButton)) : (x.nextButton.removeClass(x.params.buttonDisabledClass), x.params.a11y && x.a11y && x.a11y.enable(x.nextButton))))
            }, x.updatePagination = function() {
                if (x.params.pagination && x.paginationContainer && x.paginationContainer.length > 0) {
                    var e = "";
                    if ("bullets" === x.params.paginationType) {
                        for (var a = x.params.loop ? Math.ceil((x.slides.length - 2 * x.loopedSlides) / x.params.slidesPerGroup) : x.snapGrid.length, t = 0; t < a; t++) e += x.params.paginationBulletRender ? x.params.paginationBulletRender(x, t, x.params.bulletClass) : "<" + x.params.paginationElement + ' class="' + x.params.bulletClass + '"></' + x.params.paginationElement + ">";
                        x.paginationContainer.html(e), x.bullets = x.paginationContainer.find("." + x.params.bulletClass), x.params.paginationClickable && x.params.a11y && x.a11y && x.a11y.initPagination()
                    }
                    "fraction" === x.params.paginationType && (e = x.params.paginationFractionRender ? x.params.paginationFractionRender(x, x.params.paginationCurrentClass, x.params.paginationTotalClass) : '<span class="' + x.params.paginationCurrentClass + '"></span> / <span class="' + x.params.paginationTotalClass + '"></span>', x.paginationContainer.html(e)), "progress" === x.params.paginationType && (e = x.params.paginationProgressRender ? x.params.paginationProgressRender(x, x.params.paginationProgressbarClass) : '<span class="' + x.params.paginationProgressbarClass + '"></span>', x.paginationContainer.html(e)), "custom" !== x.params.paginationType && x.emit("onPaginationRendered", x, x.paginationContainer[0])
                }
            }, x.update = function(e) {
                function a() {
                    x.rtl, x.translate;
                    t = Math.min(Math.max(x.translate, x.maxTranslate()), x.minTranslate()), x.setWrapperTranslate(t), x.updateActiveIndex(), x.updateClasses()
                }
                if (x) {
                    x.updateContainerSize(), x.updateSlidesSize(), x.updateProgress(), x.updatePagination(), x.updateClasses(), x.params.scrollbar && x.scrollbar && x.scrollbar.set();
                    var t;
                    if (e) {
                        x.controller && x.controller.spline && (x.controller.spline = void 0), x.params.freeMode ? (a(), x.params.autoHeight && x.updateAutoHeight()) : (("auto" === x.params.slidesPerView || x.params.slidesPerView > 1) && x.isEnd && !x.params.centeredSlides ? x.slideTo(x.slides.length - 1, 0, !1, !0) : x.slideTo(x.activeIndex, 0, !1, !0)) || a()
                    } else x.params.autoHeight && x.updateAutoHeight()
                }
            }, x.onResize = function(e) {
                x.params.onBeforeResize && x.params.onBeforeResize(x), x.params.breakpoints && x.setBreakpoint();
                var a = x.params.allowSwipeToPrev,
                    t = x.params.allowSwipeToNext;
                x.params.allowSwipeToPrev = x.params.allowSwipeToNext = !0, x.updateContainerSize(), x.updateSlidesSize(), ("auto" === x.params.slidesPerView || x.params.freeMode || e) && x.updatePagination(), x.params.scrollbar && x.scrollbar && x.scrollbar.set(), x.controller && x.controller.spline && (x.controller.spline = void 0);
                var s = !1;
                if (x.params.freeMode) {
                    var r = Math.min(Math.max(x.translate, x.maxTranslate()), x.minTranslate());
                    x.setWrapperTranslate(r), x.updateActiveIndex(), x.updateClasses(), x.params.autoHeight && x.updateAutoHeight()
                } else x.updateClasses(), s = ("auto" === x.params.slidesPerView || x.params.slidesPerView > 1) && x.isEnd && !x.params.centeredSlides ? x.slideTo(x.slides.length - 1, 0, !1, !0) : x.slideTo(x.activeIndex, 0, !1, !0);
                x.params.lazyLoading && !s && x.lazy && x.lazy.load(), x.params.allowSwipeToPrev = a, x.params.allowSwipeToNext = t, x.params.onAfterResize && x.params.onAfterResize(x)
            }, x.touchEventsDesktop = {
                start: "mousedown",
                move: "mousemove",
                end: "mouseup"
            }, window.navigator.pointerEnabled ? x.touchEventsDesktop = {
                start: "pointerdown",
                move: "pointermove",
                end: "pointerup"
            } : window.navigator.msPointerEnabled && (x.touchEventsDesktop = {
                start: "MSPointerDown",
                move: "MSPointerMove",
                end: "MSPointerUp"
            }), x.touchEvents = {
                start: x.support.touch || !x.params.simulateTouch ? "touchstart" : x.touchEventsDesktop.start,
                move: x.support.touch || !x.params.simulateTouch ? "touchmove" : x.touchEventsDesktop.move,
                end: x.support.touch || !x.params.simulateTouch ? "touchend" : x.touchEventsDesktop.end
            }, (window.navigator.pointerEnabled || window.navigator.msPointerEnabled) && ("container" === x.params.touchEventsTarget ? x.container : x.wrapper).addClass("swiper-wp8-" + x.params.direction), x.initEvents = function(e) {
                var a = e ? "off" : "on",
                    t = e ? "removeEventListener" : "addEventListener",
                    r = "container" === x.params.touchEventsTarget ? x.container[0] : x.wrapper[0],
                    i = x.support.touch ? r : document,
                    n = !!x.params.nested;
                if (x.browser.ie) r[t](x.touchEvents.start, x.onTouchStart, !1), i[t](x.touchEvents.move, x.onTouchMove, n), i[t](x.touchEvents.end, x.onTouchEnd, !1);
                else {
                    if (x.support.touch) {
                        var o = !("touchstart" !== x.touchEvents.start || !x.support.passiveListener || !x.params.passiveListeners) && {
                            passive: !0,
                            capture: !1
                        };
                        r[t](x.touchEvents.start, x.onTouchStart, o), r[t](x.touchEvents.move, x.onTouchMove, n), r[t](x.touchEvents.end, x.onTouchEnd, o)
                    }(s.simulateTouch && !x.device.ios && !x.device.android || s.simulateTouch && !x.support.touch && x.device.ios) && (r[t]("mousedown", x.onTouchStart, !1), document[t]("mousemove", x.onTouchMove, n), document[t]("mouseup", x.onTouchEnd, !1))
                }
                window[t]("resize", x.onResize), x.params.nextButton && x.nextButton && x.nextButton.length > 0 && (x.nextButton[a]("click", x.onClickNext), x.params.a11y && x.a11y && x.nextButton[a]("keydown", x.a11y.onEnterKey)), x.params.prevButton && x.prevButton && x.prevButton.length > 0 && (x.prevButton[a]("click", x.onClickPrev), x.params.a11y && x.a11y && x.prevButton[a]("keydown", x.a11y.onEnterKey)), x.params.pagination && x.params.paginationClickable && (x.paginationContainer[a]("click", "." + x.params.bulletClass, x.onClickIndex), x.params.a11y && x.a11y && x.paginationContainer[a]("keydown", "." + x.params.bulletClass, x.a11y.onEnterKey)), (x.params.preventClicks || x.params.preventClicksPropagation) && r[t]("click", x.preventClicks, !0)
            }, x.attachEvents = function() {
                x.initEvents()
            }, x.detachEvents = function() {
                x.initEvents(!0)
            }, x.allowClick = !0, x.preventClicks = function(e) {
                x.allowClick || (x.params.preventClicks && e.preventDefault(), x.params.preventClicksPropagation && x.animating && (e.stopPropagation(), e.stopImmediatePropagation()))
            }, x.onClickNext = function(e) {
                e.preventDefault(), x.isEnd && !x.params.loop || x.slideNext()
            }, x.onClickPrev = function(e) {
                e.preventDefault(), x.isBeginning && !x.params.loop || x.slidePrev()
            }, x.onClickIndex = function(a) {
                a.preventDefault();
                var t = e(this).index() * x.params.slidesPerGroup;
                x.params.loop && (t += x.loopedSlides), x.slideTo(t)
            }, x.updateClickedSlide = function(a) {
                var t = n(a, "." + x.params.slideClass),
                    s = !1;
                if (t)
                    for (var r = 0; r < x.slides.length; r++) x.slides[r] === t && (s = !0);
                if (!t || !s) return x.clickedSlide = void 0, void(x.clickedIndex = void 0);
                if (x.clickedSlide = t, x.clickedIndex = e(t).index(), x.params.slideToClickedSlide && void 0 !== x.clickedIndex && x.clickedIndex !== x.activeIndex) {
                    var i, o = x.clickedIndex,
                        l = "auto" === x.params.slidesPerView ? x.currentSlidesPerView() : x.params.slidesPerView;
                    if (x.params.loop) {
                        if (x.animating) return;
                        i = parseInt(e(x.clickedSlide).attr("data-swiper-slide-index"), 10), x.params.centeredSlides ? o < x.loopedSlides - l / 2 || o > x.slides.length - x.loopedSlides + l / 2 ? (x.fixLoop(), o = x.wrapper.children("." + x.params.slideClass + '[data-swiper-slide-index="' + i + '"]:not(.' + x.params.slideDuplicateClass + ")").eq(0).index(), setTimeout(function() {
                            x.slideTo(o)
                        }, 0)) : x.slideTo(o) : o > x.slides.length - l ? (x.fixLoop(), o = x.wrapper.children("." + x.params.slideClass + '[data-swiper-slide-index="' + i + '"]:not(.' + x.params.slideDuplicateClass + ")").eq(0).index(), setTimeout(function() {
                            x.slideTo(o)
                        }, 0)) : x.slideTo(o)
                    } else x.slideTo(o)
                }
            };
            var b, C, S, z, M, P, E, I, k, D, L = "input, select, textarea, button, video",
                B = Date.now(),
                H = [];
            x.animating = !1, x.touches = {
                startX: 0,
                startY: 0,
                currentX: 0,
                currentY: 0,
                diff: 0
            };
            var G, X;
            x.onTouchStart = function(a) {
                if (a.originalEvent && (a = a.originalEvent), (G = "touchstart" === a.type) || !("which" in a) || 3 !== a.which) {
                    if (x.params.noSwiping && n(a, "." + x.params.noSwipingClass)) return void(x.allowClick = !0);
                    if (!x.params.swipeHandler || n(a, x.params.swipeHandler)) {
                        var t = x.touches.currentX = "touchstart" === a.type ? a.targetTouches[0].pageX : a.pageX,
                            s = x.touches.currentY = "touchstart" === a.type ? a.targetTouches[0].pageY : a.pageY;
                        if (!(x.device.ios && x.params.iOSEdgeSwipeDetection && t <= x.params.iOSEdgeSwipeThreshold)) {
                            if (b = !0, C = !1, S = !0, M = void 0, X = void 0, x.touches.startX = t, x.touches.startY = s, z = Date.now(), x.allowClick = !0, x.updateContainerSize(), x.swipeDirection = void 0, x.params.threshold > 0 && (I = !1), "touchstart" !== a.type) {
                                var r = !0;
                                e(a.target).is(L) && (r = !1), document.activeElement && e(document.activeElement).is(L) && document.activeElement.blur(), r && a.preventDefault()
                            }
                            x.emit("onTouchStart", x, a)
                        }
                    }
                }
            }, x.onTouchMove = function(a) {
                if (a.originalEvent && (a = a.originalEvent), !G || "mousemove" !== a.type) {
                    if (a.preventedByNestedSwiper) return x.touches.startX = "touchmove" === a.type ? a.targetTouches[0].pageX : a.pageX, void(x.touches.startY = "touchmove" === a.type ? a.targetTouches[0].pageY : a.pageY);
                    if (x.params.onlyExternal) return x.allowClick = !1, void(b && (x.touches.startX = x.touches.currentX = "touchmove" === a.type ? a.targetTouches[0].pageX : a.pageX, x.touches.startY = x.touches.currentY = "touchmove" === a.type ? a.targetTouches[0].pageY : a.pageY, z = Date.now()));
                    if (G && x.params.touchReleaseOnEdges && !x.params.loop)
                        if (x.isHorizontal()) {
                            if (x.touches.currentX < x.touches.startX && x.translate <= x.maxTranslate() || x.touches.currentX > x.touches.startX && x.translate >= x.minTranslate()) return
                        } else if (x.touches.currentY < x.touches.startY && x.translate <= x.maxTranslate() || x.touches.currentY > x.touches.startY && x.translate >= x.minTranslate()) return;
                    if (G && document.activeElement && a.target === document.activeElement && e(a.target).is(L)) return C = !0, void(x.allowClick = !1);
                    if (S && x.emit("onTouchMove", x, a), !(a.targetTouches && a.targetTouches.length > 1)) {
                        if (x.touches.currentX = "touchmove" === a.type ? a.targetTouches[0].pageX : a.pageX, x.touches.currentY = "touchmove" === a.type ? a.targetTouches[0].pageY : a.pageY, void 0 === M) {
                            var t;
                            x.isHorizontal() && x.touches.currentY === x.touches.startY || !x.isHorizontal() && x.touches.currentX === x.touches.startX ? M = !1 : (t = 180 * Math.atan2(Math.abs(x.touches.currentY - x.touches.startY), Math.abs(x.touches.currentX - x.touches.startX)) / Math.PI, M = x.isHorizontal() ? t > x.params.touchAngle : 90 - t > x.params.touchAngle)
                        }
                        if (M && x.emit("onTouchMoveOpposite", x, a), void 0 === X && (x.touches.currentX === x.touches.startX && x.touches.currentY === x.touches.startY || (X = !0)), b) {
                            if (M) return void(b = !1);
                            if (X) {
                                x.allowClick = !1, x.emit("onSliderMove", x, a), a.preventDefault(), x.params.touchMoveStopPropagation && !x.params.nested && a.stopPropagation(), C || (s.loop && x.fixLoop(), E = x.getWrapperTranslate(), x.setWrapperTransition(0), x.animating && x.wrapper.trigger("webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd msTransitionEnd"), x.params.autoplay && x.autoplaying && (x.params.autoplayDisableOnInteraction ? x.stopAutoplay() : x.pauseAutoplay()), D = !1, !x.params.grabCursor || x.params.allowSwipeToNext !== !0 && x.params.allowSwipeToPrev !== !0 || x.setGrabCursor(!0)), C = !0;
                                var r = x.touches.diff = x.isHorizontal() ? x.touches.currentX - x.touches.startX : x.touches.currentY - x.touches.startY;
                                r *= x.params.touchRatio, x.rtl && (r = -r), x.swipeDirection = r > 0 ? "prev" : "next", P = r + E;
                                var i = !0;
                                if (r > 0 && P > x.minTranslate() ? (i = !1, x.params.resistance && (P = x.minTranslate() - 1 + Math.pow(-x.minTranslate() + E + r, x.params.resistanceRatio))) : r < 0 && P < x.maxTranslate() && (i = !1, x.params.resistance && (P = x.maxTranslate() + 1 - Math.pow(x.maxTranslate() - E - r, x.params.resistanceRatio))), i && (a.preventedByNestedSwiper = !0), !x.params.allowSwipeToNext && "next" === x.swipeDirection && P < E && (P = E), !x.params.allowSwipeToPrev && "prev" === x.swipeDirection && P > E && (P = E), x.params.threshold > 0) {
                                    if (!(Math.abs(r) > x.params.threshold || I)) return void(P = E);
                                    if (!I) return I = !0, x.touches.startX = x.touches.currentX, x.touches.startY = x.touches.currentY, P = E, void(x.touches.diff = x.isHorizontal() ? x.touches.currentX - x.touches.startX : x.touches.currentY - x.touches.startY)
                                }
                                x.params.followFinger && ((x.params.freeMode || x.params.watchSlidesProgress) && x.updateActiveIndex(), x.params.freeMode && (0 === H.length && H.push({
                                    position: x.touches[x.isHorizontal() ? "startX" : "startY"],
                                    time: z
                                }), H.push({
                                    position: x.touches[x.isHorizontal() ? "currentX" : "currentY"],
                                    time: (new window.Date).getTime()
                                })), x.updateProgress(P), x.setWrapperTranslate(P))
                            }
                        }
                    }
                }
            }, x.onTouchEnd = function(a) {
                if (a.originalEvent && (a = a.originalEvent), S && x.emit("onTouchEnd", x, a), S = !1, b) {
                    x.params.grabCursor && C && b && (x.params.allowSwipeToNext === !0 || x.params.allowSwipeToPrev === !0) && x.setGrabCursor(!1);
                    var t = Date.now(),
                        s = t - z;
                    if (x.allowClick && (x.updateClickedSlide(a), x.emit("onTap", x, a), s < 300 && t - B > 300 && (k && clearTimeout(k), k = setTimeout(function() {
                            x && (x.params.paginationHide && x.paginationContainer.length > 0 && !e(a.target).hasClass(x.params.bulletClass) && x.paginationContainer.toggleClass(x.params.paginationHiddenClass), x.emit("onClick", x, a))
                        }, 300)), s < 300 && t - B < 300 && (k && clearTimeout(k), x.emit("onDoubleTap", x, a))), B = Date.now(), setTimeout(function() {
                            x && (x.allowClick = !0)
                        }, 0), !b || !C || !x.swipeDirection || 0 === x.touches.diff || P === E) return void(b = C = !1);
                    b = C = !1;
                    var r;
                    if (r = x.params.followFinger ? x.rtl ? x.translate : -x.translate : -P, x.params.freeMode) {
                        if (r < -x.minTranslate()) return void x.slideTo(x.activeIndex);
                        if (r > -x.maxTranslate()) return void(x.slides.length < x.snapGrid.length ? x.slideTo(x.snapGrid.length - 1) : x.slideTo(x.slides.length - 1));
                        if (x.params.freeModeMomentum) {
                            if (H.length > 1) {
                                var i = H.pop(),
                                    n = H.pop(),
                                    o = i.position - n.position,
                                    l = i.time - n.time;
                                x.velocity = o / l, x.velocity = x.velocity / 2, Math.abs(x.velocity) < x.params.freeModeMinimumVelocity && (x.velocity = 0), (l > 150 || (new window.Date).getTime() - i.time > 300) && (x.velocity = 0)
                            } else x.velocity = 0;
                            x.velocity = x.velocity * x.params.freeModeMomentumVelocityRatio, H.length = 0;
                            var p = 1e3 * x.params.freeModeMomentumRatio,
                                d = x.velocity * p,
                                m = x.translate + d;
                            x.rtl && (m = -m);
                            var u, c = !1,
                                g = 20 * Math.abs(x.velocity) * x.params.freeModeMomentumBounceRatio;
                            if (m < x.maxTranslate()) x.params.freeModeMomentumBounce ? (m + x.maxTranslate() < -g && (m = x.maxTranslate() - g), u = x.maxTranslate(), c = !0, D = !0) : m = x.maxTranslate();
                            else if (m > x.minTranslate()) x.params.freeModeMomentumBounce ? (m - x.minTranslate() > g && (m = x.minTranslate() + g), u = x.minTranslate(), c = !0, D = !0) : m = x.minTranslate();
                            else if (x.params.freeModeSticky) {
                                var h, v = 0;
                                for (v = 0; v < x.snapGrid.length; v += 1)
                                    if (x.snapGrid[v] > -m) {
                                        h = v;
                                        break
                                    }
                                m = Math.abs(x.snapGrid[h] - m) < Math.abs(x.snapGrid[h - 1] - m) || "next" === x.swipeDirection ? x.snapGrid[h] : x.snapGrid[h - 1], x.rtl || (m = -m)
                            }
                            if (0 !== x.velocity) p = x.rtl ? Math.abs((-m - x.translate) / x.velocity) : Math.abs((m - x.translate) / x.velocity);
                            else if (x.params.freeModeSticky) return void x.slideReset();
                            x.params.freeModeMomentumBounce && c ? (x.updateProgress(u), x.setWrapperTransition(p), x.setWrapperTranslate(m), x.onTransitionStart(), x.animating = !0, x.wrapper.transitionEnd(function() {
                                x && D && (x.emit("onMomentumBounce", x), x.setWrapperTransition(x.params.speed), x.setWrapperTranslate(u), x.wrapper.transitionEnd(function() {
                                    x && x.onTransitionEnd()
                                }))
                            })) : x.velocity ? (x.updateProgress(m), x.setWrapperTransition(p), x.setWrapperTranslate(m), x.onTransitionStart(), x.animating || (x.animating = !0, x.wrapper.transitionEnd(function() {
                                x && x.onTransitionEnd()
                            }))) : x.updateProgress(m), x.updateActiveIndex()
                        }
                        return void((!x.params.freeModeMomentum || s >= x.params.longSwipesMs) && (x.updateProgress(), x.updateActiveIndex()))
                    }
                    var f, w = 0,
                        y = x.slidesSizesGrid[0];
                    for (f = 0; f < x.slidesGrid.length; f += x.params.slidesPerGroup) void 0 !== x.slidesGrid[f + x.params.slidesPerGroup] ? r >= x.slidesGrid[f] && r < x.slidesGrid[f + x.params.slidesPerGroup] && (w = f, y = x.slidesGrid[f + x.params.slidesPerGroup] - x.slidesGrid[f]) : r >= x.slidesGrid[f] && (w = f, y = x.slidesGrid[x.slidesGrid.length - 1] - x.slidesGrid[x.slidesGrid.length - 2]);
                    var T = (r - x.slidesGrid[w]) / y;
                    if (s > x.params.longSwipesMs) {
                        if (!x.params.longSwipes) return void x.slideTo(x.activeIndex);
                        "next" === x.swipeDirection && (T >= x.params.longSwipesRatio ? x.slideTo(w + x.params.slidesPerGroup) : x.slideTo(w)), "prev" === x.swipeDirection && (T > 1 - x.params.longSwipesRatio ? x.slideTo(w + x.params.slidesPerGroup) : x.slideTo(w))
                    } else {
                        if (!x.params.shortSwipes) return void x.slideTo(x.activeIndex);
                        "next" === x.swipeDirection && x.slideTo(w + x.params.slidesPerGroup), "prev" === x.swipeDirection && x.slideTo(w)
                    }
                }
            }, x._slideTo = function(e, a) {
                return x.slideTo(e, a, !0, !0)
            }, x.slideTo = function(e, a, t, s) {
                void 0 === t && (t = !0), void 0 === e && (e = 0), e < 0 && (e = 0), x.snapIndex = Math.floor(e / x.params.slidesPerGroup), x.snapIndex >= x.snapGrid.length && (x.snapIndex = x.snapGrid.length - 1);
                var r = -x.snapGrid[x.snapIndex];
                if (x.params.autoplay && x.autoplaying && (s || !x.params.autoplayDisableOnInteraction ? x.pauseAutoplay(a) : x.stopAutoplay()), x.updateProgress(r), x.params.normalizeSlideIndex)
                    for (var i = 0; i < x.slidesGrid.length; i++) - Math.floor(100 * r) >= Math.floor(100 * x.slidesGrid[i]) && (e = i);
                return !(!x.params.allowSwipeToNext && r < x.translate && r < x.minTranslate()) && (!(!x.params.allowSwipeToPrev && r > x.translate && r > x.maxTranslate() && (x.activeIndex || 0) !== e) && (void 0 === a && (a = x.params.speed), x.previousIndex = x.activeIndex || 0, x.activeIndex = e, x.updateRealIndex(), x.rtl && -r === x.translate || !x.rtl && r === x.translate ? (x.params.autoHeight && x.updateAutoHeight(), x.updateClasses(), "slide" !== x.params.effect && x.setWrapperTranslate(r), !1) : (x.updateClasses(), x.onTransitionStart(t), 0 === a || x.browser.lteIE9 ? (x.setWrapperTranslate(r), x.setWrapperTransition(0), x.onTransitionEnd(t)) : (x.setWrapperTranslate(r), x.setWrapperTransition(a), x.animating || (x.animating = !0, x.wrapper.transitionEnd(function() {
                    x && x.onTransitionEnd(t)
                }))), !0)))
            }, x.onTransitionStart = function(e) {
                void 0 === e && (e = !0), x.params.autoHeight && x.updateAutoHeight(), x.lazy && x.lazy.onTransitionStart(), e && (x.emit("onTransitionStart", x), x.activeIndex !== x.previousIndex && (x.emit("onSlideChangeStart", x), x.activeIndex > x.previousIndex ? x.emit("onSlideNextStart", x) : x.emit("onSlidePrevStart", x)))
            }, x.onTransitionEnd = function(e) {
                x.animating = !1, x.setWrapperTransition(0), void 0 === e && (e = !0), x.lazy && x.lazy.onTransitionEnd(), e && (x.emit("onTransitionEnd", x), x.activeIndex !== x.previousIndex && (x.emit("onSlideChangeEnd", x), x.activeIndex > x.previousIndex ? x.emit("onSlideNextEnd", x) : x.emit("onSlidePrevEnd", x))), x.params.history && x.history && x.history.setHistory(x.params.history, x.activeIndex), x.params.hashnav && x.hashnav && x.hashnav.setHash()
            }, x.slideNext = function(e, a, t) {
                if (x.params.loop) {
                    if (x.animating) return !1;
                    x.fixLoop();
                    x.container[0].clientLeft;
                    return x.slideTo(x.activeIndex + x.params.slidesPerGroup, a, e, t)
                }
                return x.slideTo(x.activeIndex + x.params.slidesPerGroup, a, e, t)
            }, x._slideNext = function(e) {
                return x.slideNext(!0, e, !0)
            }, x.slidePrev = function(e, a, t) {
                if (x.params.loop) {
                    if (x.animating) return !1;
                    x.fixLoop();
                    x.container[0].clientLeft;
                    return x.slideTo(x.activeIndex - 1, a, e, t)
                }
                return x.slideTo(x.activeIndex - 1, a, e, t)
            }, x._slidePrev = function(e) {
                return x.slidePrev(!0, e, !0)
            }, x.slideReset = function(e, a, t) {
                return x.slideTo(x.activeIndex, a, e)
            }, x.disableTouchControl = function() {
                return x.params.onlyExternal = !0, !0
            }, x.enableTouchControl = function() {
                return x.params.onlyExternal = !1, !0
            }, x.setWrapperTransition = function(e, a) {
                x.wrapper.transition(e), "slide" !== x.params.effect && x.effects[x.params.effect] && x.effects[x.params.effect].setTransition(e), x.params.parallax && x.parallax && x.parallax.setTransition(e), x.params.scrollbar && x.scrollbar && x.scrollbar.setTransition(e), x.params.control && x.controller && x.controller.setTransition(e, a), x.emit("onSetTransition", x, e)
            }, x.setWrapperTranslate = function(e, a, t) {
                var s = 0,
                    i = 0;
                x.isHorizontal() ? s = x.rtl ? -e : e : i = e, x.params.roundLengths && (s = r(s), i = r(i)), x.params.virtualTranslate || (x.support.transforms3d ? x.wrapper.transform("translate3d(" + s + "px, " + i + "px, 0px)") : x.wrapper.transform("translate(" + s + "px, " + i + "px)")), x.translate = x.isHorizontal() ? s : i;
                var n, o = x.maxTranslate() - x.minTranslate();
                n = 0 === o ? 0 : (e - x.minTranslate()) / o, n !== x.progress && x.updateProgress(e), a && x.updateActiveIndex(), "slide" !== x.params.effect && x.effects[x.params.effect] && x.effects[x.params.effect].setTranslate(x.translate), x.params.parallax && x.parallax && x.parallax.setTranslate(x.translate), x.params.scrollbar && x.scrollbar && x.scrollbar.setTranslate(x.translate), x.params.control && x.controller && x.controller.setTranslate(x.translate, t), x.emit("onSetTranslate", x, x.translate)
            }, x.getTranslate = function(e, a) {
                var t, s, r, i;
                return void 0 === a && (a = "x"), x.params.virtualTranslate ? x.rtl ? -x.translate : x.translate : (r = window.getComputedStyle(e, null), window.WebKitCSSMatrix ? (s = r.transform || r.webkitTransform, s.split(",").length > 6 && (s = s.split(", ").map(function(e) {
                    return e.replace(",", ".")
                }).join(", ")), i = new window.WebKitCSSMatrix("none" === s ? "" : s)) : (i = r.MozTransform || r.OTransform || r.MsTransform || r.msTransform || r.transform || r.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), t = i.toString().split(",")), "x" === a && (s = window.WebKitCSSMatrix ? i.m41 : 16 === t.length ? parseFloat(t[12]) : parseFloat(t[4])), "y" === a && (s = window.WebKitCSSMatrix ? i.m42 : 16 === t.length ? parseFloat(t[13]) : parseFloat(t[5])), x.rtl && s && (s = -s), s || 0)
            }, x.getWrapperTranslate = function(e) {
                return void 0 === e && (e = x.isHorizontal() ? "x" : "y"), x.getTranslate(x.wrapper[0], e)
            }, x.observers = [], x.initObservers = function() {
                if (x.params.observeParents)
                    for (var e = x.container.parents(), a = 0; a < e.length; a++) o(e[a]);
                o(x.container[0], {
                    childList: !1
                }), o(x.wrapper[0], {
                    attributes: !1
                })
            }, x.disconnectObservers = function() {
                for (var e = 0; e < x.observers.length; e++) x.observers[e].disconnect();
                x.observers = []
            }, x.createLoop = function() {
                x.wrapper.children("." + x.params.slideClass + "." + x.params.slideDuplicateClass).remove();
                var a = x.wrapper.children("." + x.params.slideClass);
                "auto" !== x.params.slidesPerView || x.params.loopedSlides || (x.params.loopedSlides = a.length), x.loopedSlides = parseInt(x.params.loopedSlides || x.params.slidesPerView, 10), x.loopedSlides = x.loopedSlides + x.params.loopAdditionalSlides, x.loopedSlides > a.length && (x.loopedSlides = a.length);
                var t, s = [],
                    r = [];
                for (a.each(function(t, i) {
                        var n = e(this);
                        t < x.loopedSlides && r.push(i), t < a.length && t >= a.length - x.loopedSlides && s.push(i), n.attr("data-swiper-slide-index", t)
                    }), t = 0; t < r.length; t++) x.wrapper.append(e(r[t].cloneNode(!0)).addClass(x.params.slideDuplicateClass));
                for (t = s.length - 1; t >= 0; t--) x.wrapper.prepend(e(s[t].cloneNode(!0)).addClass(x.params.slideDuplicateClass))
            }, x.destroyLoop = function() {
                x.wrapper.children("." + x.params.slideClass + "." + x.params.slideDuplicateClass).remove(), x.slides.removeAttr("data-swiper-slide-index")
            }, x.reLoop = function(e) {
                var a = x.activeIndex - x.loopedSlides;
                x.destroyLoop(), x.createLoop(), x.updateSlidesSize(), e && x.slideTo(a + x.loopedSlides, 0, !1)
            }, x.fixLoop = function() {
                var e;
                x.activeIndex < x.loopedSlides ? (e = x.slides.length - 3 * x.loopedSlides + x.activeIndex, e += x.loopedSlides, x.slideTo(e, 0, !1, !0)) : ("auto" === x.params.slidesPerView && x.activeIndex >= 2 * x.loopedSlides || x.activeIndex > x.slides.length - 2 * x.params.slidesPerView) && (e = -x.slides.length + x.activeIndex + x.loopedSlides, e += x.loopedSlides, x.slideTo(e, 0, !1, !0))
            }, x.appendSlide = function(e) {
                if (x.params.loop && x.destroyLoop(), "object" == typeof e && e.length)
                    for (var a = 0; a < e.length; a++) e[a] && x.wrapper.append(e[a]);
                else x.wrapper.append(e);
                x.params.loop && x.createLoop(), x.params.observer && x.support.observer || x.update(!0)
            }, x.prependSlide = function(e) {
                x.params.loop && x.destroyLoop();
                var a = x.activeIndex + 1;
                if ("object" == typeof e && e.length) {
                    for (var t = 0; t < e.length; t++) e[t] && x.wrapper.prepend(e[t]);
                    a = x.activeIndex + e.length
                } else x.wrapper.prepend(e);
                x.params.loop && x.createLoop(), x.params.observer && x.support.observer || x.update(!0), x.slideTo(a, 0, !1)
            }, x.removeSlide = function(e) {
                x.params.loop && (x.destroyLoop(), x.slides = x.wrapper.children("." + x.params.slideClass));
                var a, t = x.activeIndex;
                if ("object" == typeof e && e.length) {
                    for (var s = 0; s < e.length; s++) a = e[s], x.slides[a] && x.slides.eq(a).remove(), a < t && t--;
                    t = Math.max(t, 0)
                } else a = e, x.slides[a] && x.slides.eq(a).remove(), a < t && t--, t = Math.max(t, 0);
                x.params.loop && x.createLoop(), x.params.observer && x.support.observer || x.update(!0), x.params.loop ? x.slideTo(t + x.loopedSlides, 0, !1) : x.slideTo(t, 0, !1)
            }, x.removeAllSlides = function() {
                for (var e = [], a = 0; a < x.slides.length; a++) e.push(a);
                x.removeSlide(e)
            }, x.effects = {
                fade: {
                    setTranslate: function() {
                        for (var e = 0; e < x.slides.length; e++) {
                            var a = x.slides.eq(e),
                                t = a[0].swiperSlideOffset,
                                s = -t;
                            x.params.virtualTranslate || (s -= x.translate);
                            var r = 0;
                            x.isHorizontal() || (r = s, s = 0);
                            var i = x.params.fade.crossFade ? Math.max(1 - Math.abs(a[0].progress), 0) : 1 + Math.min(Math.max(a[0].progress, -1), 0);
                            a.css({
                                opacity: i
                            }).transform("translate3d(" + s + "px, " + r + "px, 0px)")
                        }
                    },
                    setTransition: function(e) {
                        if (x.slides.transition(e), x.params.virtualTranslate && 0 !== e) {
                            var a = !1;
                            x.slides.transitionEnd(function() {
                                if (!a && x) {
                                    a = !0, x.animating = !1;
                                    for (var e = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], t = 0; t < e.length; t++) x.wrapper.trigger(e[t])
                                }
                            })
                        }
                    }
                },
                flip: {
                    setTranslate: function() {
                        for (var a = 0; a < x.slides.length; a++) {
                            var t = x.slides.eq(a),
                                s = t[0].progress;
                            x.params.flip.limitRotation && (s = Math.max(Math.min(t[0].progress, 1), -1));
                            var r = t[0].swiperSlideOffset,
                                i = -180 * s,
                                n = i,
                                o = 0,
                                l = -r,
                                p = 0;
                            if (x.isHorizontal() ? x.rtl && (n = -n) : (p = l, l = 0, o = -n, n = 0), t[0].style.zIndex = -Math.abs(Math.round(s)) + x.slides.length, x.params.flip.slideShadows) {
                                var d = x.isHorizontal() ? t.find(".swiper-slide-shadow-left") : t.find(".swiper-slide-shadow-top"),
                                    m = x.isHorizontal() ? t.find(".swiper-slide-shadow-right") : t.find(".swiper-slide-shadow-bottom");
                                0 === d.length && (d = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "left" : "top") + '"></div>'), t.append(d)), 0 === m.length && (m = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "right" : "bottom") + '"></div>'), t.append(m)), d.length && (d[0].style.opacity = Math.max(-s, 0)), m.length && (m[0].style.opacity = Math.max(s, 0))
                            }
                            t.transform("translate3d(" + l + "px, " + p + "px, 0px) rotateX(" + o + "deg) rotateY(" + n + "deg)")
                        }
                    },
                    setTransition: function(a) {
                        if (x.slides.transition(a).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(a), x.params.virtualTranslate && 0 !== a) {
                            var t = !1;
                            x.slides.eq(x.activeIndex).transitionEnd(function() {
                                if (!t && x && e(this).hasClass(x.params.slideActiveClass)) {
                                    t = !0, x.animating = !1;
                                    for (var a = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"], s = 0; s < a.length; s++) x.wrapper.trigger(a[s])
                                }
                            })
                        }
                    }
                },
                cube: {
                    setTranslate: function() {
                        var a, t = 0;
                        x.params.cube.shadow && (x.isHorizontal() ? (a = x.wrapper.find(".swiper-cube-shadow"), 0 === a.length && (a = e('<div class="swiper-cube-shadow"></div>'), x.wrapper.append(a)), a.css({
                            height: x.width + "px"
                        })) : (a = x.container.find(".swiper-cube-shadow"), 0 === a.length && (a = e('<div class="swiper-cube-shadow"></div>'), x.container.append(a))));
                        for (var s = 0; s < x.slides.length; s++) {
                            var r = x.slides.eq(s),
                                i = 90 * s,
                                n = Math.floor(i / 360);
                            x.rtl && (i = -i, n = Math.floor(-i / 360));
                            var o = Math.max(Math.min(r[0].progress, 1), -1),
                                l = 0,
                                p = 0,
                                d = 0;
                            s % 4 == 0 ? (l = 4 * -n * x.size, d = 0) : (s - 1) % 4 == 0 ? (l = 0, d = 4 * -n * x.size) : (s - 2) % 4 == 0 ? (l = x.size + 4 * n * x.size, d = x.size) : (s - 3) % 4 == 0 && (l = -x.size, d = 3 * x.size + 4 * x.size * n), x.rtl && (l = -l), x.isHorizontal() || (p = l, l = 0);
                            var m = "rotateX(" + (x.isHorizontal() ? 0 : -i) + "deg) rotateY(" + (x.isHorizontal() ? i : 0) + "deg) translate3d(" + l + "px, " + p + "px, " + d + "px)";
                            if (o <= 1 && o > -1 && (t = 90 * s + 90 * o, x.rtl && (t = 90 * -s - 90 * o)), r.transform(m), x.params.cube.slideShadows) {
                                var u = x.isHorizontal() ? r.find(".swiper-slide-shadow-left") : r.find(".swiper-slide-shadow-top"),
                                    c = x.isHorizontal() ? r.find(".swiper-slide-shadow-right") : r.find(".swiper-slide-shadow-bottom");
                                0 === u.length && (u = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "left" : "top") + '"></div>'), r.append(u)), 0 === c.length && (c = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "right" : "bottom") + '"></div>'), r.append(c)), u.length && (u[0].style.opacity = Math.max(-o, 0)), c.length && (c[0].style.opacity = Math.max(o, 0))
                            }
                        }
                        if (x.wrapper.css({
                                "-webkit-transform-origin": "50% 50% -" + x.size / 2 + "px",
                                "-moz-transform-origin": "50% 50% -" + x.size / 2 + "px",
                                "-ms-transform-origin": "50% 50% -" + x.size / 2 + "px",
                                "transform-origin": "50% 50% -" + x.size / 2 + "px"
                            }), x.params.cube.shadow)
                            if (x.isHorizontal()) a.transform("translate3d(0px, " + (x.width / 2 + x.params.cube.shadowOffset) + "px, " + -x.width / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + x.params.cube.shadowScale + ")");
                            else {
                                var g = Math.abs(t) - 90 * Math.floor(Math.abs(t) / 90),
                                    h = 1.5 - (Math.sin(2 * g * Math.PI / 360) / 2 + Math.cos(2 * g * Math.PI / 360) / 2),
                                    v = x.params.cube.shadowScale,
                                    f = x.params.cube.shadowScale / h,
                                    w = x.params.cube.shadowOffset;
                                a.transform("scale3d(" + v + ", 1, " + f + ") translate3d(0px, " + (x.height / 2 + w) + "px, " + -x.height / 2 / f + "px) rotateX(-90deg)")
                            }
                        var y = x.isSafari || x.isUiWebView ? -x.size / 2 : 0;
                        x.wrapper.transform("translate3d(0px,0," + y + "px) rotateX(" + (x.isHorizontal() ? 0 : t) + "deg) rotateY(" + (x.isHorizontal() ? -t : 0) + "deg)")
                    },
                    setTransition: function(e) {
                        x.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), x.params.cube.shadow && !x.isHorizontal() && x.container.find(".swiper-cube-shadow").transition(e)
                    }
                },
                coverflow: {
                    setTranslate: function() {
                        for (var a = x.translate, t = x.isHorizontal() ? -a + x.width / 2 : -a + x.height / 2, s = x.isHorizontal() ? x.params.coverflow.rotate : -x.params.coverflow.rotate, r = x.params.coverflow.depth, i = 0, n = x.slides.length; i < n; i++) {
                            var o = x.slides.eq(i),
                                l = x.slidesSizesGrid[i],
                                p = o[0].swiperSlideOffset,
                                d = (t - p - l / 2) / l * x.params.coverflow.modifier,
                                m = x.isHorizontal() ? s * d : 0,
                                u = x.isHorizontal() ? 0 : s * d,
                                c = -r * Math.abs(d),
                                g = x.isHorizontal() ? 0 : x.params.coverflow.stretch * d,
                                h = x.isHorizontal() ? x.params.coverflow.stretch * d : 0;
                            Math.abs(h) < .001 && (h = 0), Math.abs(g) < .001 && (g = 0), Math.abs(c) < .001 && (c = 0), Math.abs(m) < .001 && (m = 0), Math.abs(u) < .001 && (u = 0);
                            var v = "translate3d(" + h + "px," + g + "px," + c + "px)  rotateX(" + u + "deg) rotateY(" + m + "deg)";
                            if (o.transform(v), o[0].style.zIndex = 1 - Math.abs(Math.round(d)), x.params.coverflow.slideShadows) {
                                var f = x.isHorizontal() ? o.find(".swiper-slide-shadow-left") : o.find(".swiper-slide-shadow-top"),
                                    w = x.isHorizontal() ? o.find(".swiper-slide-shadow-right") : o.find(".swiper-slide-shadow-bottom");
                                0 === f.length && (f = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "left" : "top") + '"></div>'), o.append(f)), 0 === w.length && (w = e('<div class="swiper-slide-shadow-' + (x.isHorizontal() ? "right" : "bottom") + '"></div>'), o.append(w)), f.length && (f[0].style.opacity = d > 0 ? d : 0), w.length && (w[0].style.opacity = -d > 0 ? -d : 0)
                            }
                        }
                        if (x.browser.ie) {
                            x.wrapper[0].style.perspectiveOrigin = t + "px 50%"
                        }
                    },
                    setTransition: function(e) {
                        x.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)
                    }
                }
            }, x.lazy = {
                initialImageLoaded: !1,
                loadImageInSlide: function(a, t) {
                    if (void 0 !== a && (void 0 === t && (t = !0), 0 !== x.slides.length)) {
                        var s = x.slides.eq(a),
                            r = s.find("." + x.params.lazyLoadingClass + ":not(." + x.params.lazyStatusLoadedClass + "):not(." + x.params.lazyStatusLoadingClass + ")");
                        !s.hasClass(x.params.lazyLoadingClass) || s.hasClass(x.params.lazyStatusLoadedClass) || s.hasClass(x.params.lazyStatusLoadingClass) || (r = r.add(s[0])), 0 !== r.length && r.each(function() {
                            var a = e(this);
                            a.addClass(x.params.lazyStatusLoadingClass);
                            var r = a.attr("data-background"),
                                i = a.attr("data-src"),
                                n = a.attr("data-srcset"),
                                o = a.attr("data-sizes");
                            x.loadImage(a[0], i || r, n, o, !1, function() {
                                if (void 0 !== x && null !== x && x) {
                                    if (r ? (a.css("background-image", 'url("' + r + '")'), a.removeAttr("data-background")) : (n && (a.attr("srcset", n), a.removeAttr("data-srcset")), o && (a.attr("sizes", o), a.removeAttr("data-sizes")), i && (a.attr("src", i), a.removeAttr("data-src"))), a.addClass(x.params.lazyStatusLoadedClass).removeClass(x.params.lazyStatusLoadingClass), s.find("." + x.params.lazyPreloaderClass + ", ." + x.params.preloaderClass).remove(), x.params.loop && t) {
                                        var e = s.attr("data-swiper-slide-index");
                                        if (s.hasClass(x.params.slideDuplicateClass)) {
                                            var l = x.wrapper.children('[data-swiper-slide-index="' + e + '"]:not(.' + x.params.slideDuplicateClass + ")");
                                            x.lazy.loadImageInSlide(l.index(), !1)
                                        } else {
                                            var p = x.wrapper.children("." + x.params.slideDuplicateClass + '[data-swiper-slide-index="' + e + '"]');
                                            x.lazy.loadImageInSlide(p.index(), !1)
                                        }
                                    }
                                    x.emit("onLazyImageReady", x, s[0], a[0])
                                }
                            }), x.emit("onLazyImageLoad", x, s[0], a[0])
                        })
                    }
                },
                load: function() {
                    var a, t = x.params.slidesPerView;
                    if ("auto" === t && (t = 0), x.lazy.initialImageLoaded || (x.lazy.initialImageLoaded = !0), x.params.watchSlidesVisibility) x.wrapper.children("." + x.params.slideVisibleClass).each(function() {
                        x.lazy.loadImageInSlide(e(this).index())
                    });
                    else if (t > 1)
                        for (a = x.activeIndex; a < x.activeIndex + t; a++) x.slides[a] && x.lazy.loadImageInSlide(a);
                    else x.lazy.loadImageInSlide(x.activeIndex);
                    if (x.params.lazyLoadingInPrevNext)
                        if (t > 1 || x.params.lazyLoadingInPrevNextAmount && x.params.lazyLoadingInPrevNextAmount > 1) {
                            var s = x.params.lazyLoadingInPrevNextAmount,
                                r = t,
                                i = Math.min(x.activeIndex + r + Math.max(s, r), x.slides.length),
                                n = Math.max(x.activeIndex - Math.max(r, s), 0);
                            for (a = x.activeIndex + t; a < i; a++) x.slides[a] && x.lazy.loadImageInSlide(a);
                            for (a = n; a < x.activeIndex; a++) x.slides[a] && x.lazy.loadImageInSlide(a)
                        } else {
                            var o = x.wrapper.children("." + x.params.slideNextClass);
                            o.length > 0 && x.lazy.loadImageInSlide(o.index());
                            var l = x.wrapper.children("." + x.params.slidePrevClass);
                            l.length > 0 && x.lazy.loadImageInSlide(l.index())
                        }
                },
                onTransitionStart: function() {
                    x.params.lazyLoading && (x.params.lazyLoadingOnTransitionStart || !x.params.lazyLoadingOnTransitionStart && !x.lazy.initialImageLoaded) && x.lazy.load()
                },
                onTransitionEnd: function() {
                    x.params.lazyLoading && !x.params.lazyLoadingOnTransitionStart && x.lazy.load()
                }
            }, x.scrollbar = {
                isTouched: !1,
                setDragPosition: function(e) {
                    var a = x.scrollbar,
                        t = x.isHorizontal() ? "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX || e.clientX : "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY || e.clientY,
                        s = t - a.track.offset()[x.isHorizontal() ? "left" : "top"] - a.dragSize / 2,
                        r = -x.minTranslate() * a.moveDivider,
                        i = -x.maxTranslate() * a.moveDivider;
                    s < r ? s = r : s > i && (s = i), s = -s / a.moveDivider, x.updateProgress(s), x.setWrapperTranslate(s, !0)
                },
                dragStart: function(e) {
                    var a = x.scrollbar;
                    a.isTouched = !0, e.preventDefault(), e.stopPropagation(), a.setDragPosition(e), clearTimeout(a.dragTimeout), a.track.transition(0), x.params.scrollbarHide && a.track.css("opacity", 1), x.wrapper.transition(100), a.drag.transition(100), x.emit("onScrollbarDragStart", x)
                },
                dragMove: function(e) {
                    var a = x.scrollbar;
                    a.isTouched && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, a.setDragPosition(e), x.wrapper.transition(0), a.track.transition(0), a.drag.transition(0), x.emit("onScrollbarDragMove", x))
                },
                dragEnd: function(e) {
                    var a = x.scrollbar;
                    a.isTouched && (a.isTouched = !1, x.params.scrollbarHide && (clearTimeout(a.dragTimeout), a.dragTimeout = setTimeout(function() {
                        a.track.css("opacity", 0), a.track.transition(400)
                    }, 1e3)), x.emit("onScrollbarDragEnd", x), x.params.scrollbarSnapOnRelease && x.slideReset())
                },
                draggableEvents: function() {
                    return x.params.simulateTouch !== !1 || x.support.touch ? x.touchEvents : x.touchEventsDesktop
                }(),
                enableDraggable: function() {
                    var a = x.scrollbar,
                        t = x.support.touch ? a.track : document;
                    e(a.track).on(a.draggableEvents.start, a.dragStart), e(t).on(a.draggableEvents.move, a.dragMove), e(t).on(a.draggableEvents.end, a.dragEnd)
                },
                disableDraggable: function() {
                    var a = x.scrollbar,
                        t = x.support.touch ? a.track : document;
                    e(a.track).off(a.draggableEvents.start, a.dragStart), e(t).off(a.draggableEvents.move, a.dragMove), e(t).off(a.draggableEvents.end, a.dragEnd)
                },
                set: function() {
                    if (x.params.scrollbar) {
                        var a = x.scrollbar;
                        a.track = e(x.params.scrollbar), x.params.uniqueNavElements && "string" == typeof x.params.scrollbar && a.track.length > 1 && 1 === x.container.find(x.params.scrollbar).length && (a.track = x.container.find(x.params.scrollbar)), a.drag = a.track.find(".swiper-scrollbar-drag"), 0 === a.drag.length && (a.drag = e('<div class="swiper-scrollbar-drag"></div>'), a.track.append(a.drag)), a.drag[0].style.width = "", a.drag[0].style.height = "", a.trackSize = x.isHorizontal() ? a.track[0].offsetWidth : a.track[0].offsetHeight, a.divider = x.size / x.virtualSize, a.moveDivider = a.divider * (a.trackSize / x.size), a.dragSize = a.trackSize * a.divider, x.isHorizontal() ? a.drag[0].style.width = a.dragSize + "px" : a.drag[0].style.height = a.dragSize + "px", a.divider >= 1 ? a.track[0].style.display = "none" : a.track[0].style.display = "", x.params.scrollbarHide && (a.track[0].style.opacity = 0)
                    }
                },
                setTranslate: function() {
                    if (x.params.scrollbar) {
                        var e, a = x.scrollbar,
                            t = (x.translate, a.dragSize);
                        e = (a.trackSize - a.dragSize) * x.progress, x.rtl && x.isHorizontal() ? (e = -e, e > 0 ? (t = a.dragSize - e, e = 0) : -e + a.dragSize > a.trackSize && (t = a.trackSize + e)) : e < 0 ? (t = a.dragSize + e, e = 0) : e + a.dragSize > a.trackSize && (t = a.trackSize - e), x.isHorizontal() ? (x.support.transforms3d ? a.drag.transform("translate3d(" + e + "px, 0, 0)") : a.drag.transform("translateX(" + e + "px)"), a.drag[0].style.width = t + "px") : (x.support.transforms3d ? a.drag.transform("translate3d(0px, " + e + "px, 0)") : a.drag.transform("translateY(" + e + "px)"), a.drag[0].style.height = t + "px"), x.params.scrollbarHide && (clearTimeout(a.timeout), a.track[0].style.opacity = 1, a.timeout = setTimeout(function() {
                            a.track[0].style.opacity = 0, a.track.transition(400)
                        }, 1e3))
                    }
                },
                setTransition: function(e) {
                    x.params.scrollbar && x.scrollbar.drag.transition(e)
                }
            }, x.controller = {
                LinearSpline: function(e, a) {
                    var t = function() {
                        var e, a, t;
                        return function(s, r) {
                            for (a = -1, e = s.length; e - a > 1;) s[t = e + a >> 1] <= r ? a = t : e = t;
                            return e
                        }
                    }();
                    this.x = e, this.y = a, this.lastIndex = e.length - 1;
                    var s, r;
                    this.x.length;
                    this.interpolate = function(e) {
                        return e ? (r = t(this.x, e), s = r - 1, (e - this.x[s]) * (this.y[r] - this.y[s]) / (this.x[r] - this.x[s]) + this.y[s]) : 0
                    }
                },
                getInterpolateFunction: function(e) {
                    x.controller.spline || (x.controller.spline = x.params.loop ? new x.controller.LinearSpline(x.slidesGrid, e.slidesGrid) : new x.controller.LinearSpline(x.snapGrid, e.snapGrid))
                },
                setTranslate: function(e, t) {
                    function s(a) {
                        e = a.rtl && "horizontal" === a.params.direction ? -x.translate : x.translate, "slide" === x.params.controlBy && (x.controller.getInterpolateFunction(a), i = -x.controller.spline.interpolate(-e)), i && "container" !== x.params.controlBy || (r = (a.maxTranslate() - a.minTranslate()) / (x.maxTranslate() - x.minTranslate()), i = (e - x.minTranslate()) * r + a.minTranslate()), x.params.controlInverse && (i = a.maxTranslate() - i), a.updateProgress(i), a.setWrapperTranslate(i, !1, x), a.updateActiveIndex()
                    }
                    var r, i, n = x.params.control;
                    if (Array.isArray(n))
                        for (var o = 0; o < n.length; o++) n[o] !== t && n[o] instanceof a && s(n[o]);
                    else n instanceof a && t !== n && s(n)
                },
                setTransition: function(e, t) {
                    function s(a) {
                        a.setWrapperTransition(e, x), 0 !== e && (a.onTransitionStart(), a.wrapper.transitionEnd(function() {
                            i && (a.params.loop && "slide" === x.params.controlBy && a.fixLoop(), a.onTransitionEnd())
                        }))
                    }
                    var r, i = x.params.control;
                    if (Array.isArray(i))
                        for (r = 0; r < i.length; r++) i[r] !== t && i[r] instanceof a && s(i[r]);
                    else i instanceof a && t !== i && s(i)
                }
            }, x.hashnav = {
                onHashCange: function(e, a) {
                    var t = document.location.hash.replace("#", "");
                    t !== x.slides.eq(x.activeIndex).attr("data-hash") && x.slideTo(x.wrapper.children("." + x.params.slideClass + '[data-hash="' + t + '"]').index())
                },
                attachEvents: function(a) {
                    var t = a ? "off" : "on";
                    e(window)[t]("hashchange", x.hashnav.onHashCange)
                },
                setHash: function() {
                    if (x.hashnav.initialized && x.params.hashnav)
                        if (x.params.replaceState && window.history && window.history.replaceState) window.history.replaceState(null, null, "#" + x.slides.eq(x.activeIndex).attr("data-hash") || "");
                        else {
                            var e = x.slides.eq(x.activeIndex),
                                a = e.attr("data-hash") || e.attr("data-history");
                            document.location.hash = a || ""
                        }
                },
                init: function() {
                    if (x.params.hashnav && !x.params.history) {
                        x.hashnav.initialized = !0;
                        var e = document.location.hash.replace("#", "");
                        if (e)
                            for (var a = 0, t = x.slides.length; a < t; a++) {
                                var s = x.slides.eq(a),
                                    r = s.attr("data-hash") || s.attr("data-history");
                                if (r === e && !s.hasClass(x.params.slideDuplicateClass)) {
                                    var i = s.index();
                                    x.slideTo(i, 0, x.params.runCallbacksOnInit, !0)
                                }
                            }
                        x.params.hashnavWatchState && x.hashnav.attachEvents()
                    }
                },
                destroy: function() {
                    x.params.hashnavWatchState && x.hashnav.attachEvents(!0)
                }
            }, x.history = {
                init: function() {
                    if (x.params.history) {
                        if (!window.history || !window.history.pushState) return x.params.history = !1, void(x.params.hashnav = !0);
                        x.history.initialized = !0, this.paths = this.getPathValues(), (this.paths.key || this.paths.value) && (this.scrollToSlide(0, this.paths.value, x.params.runCallbacksOnInit), x.params.replaceState || window.addEventListener("popstate", this.setHistoryPopState))
                    }
                },
                setHistoryPopState: function() {
                    x.history.paths = x.history.getPathValues(), x.history.scrollToSlide(x.params.speed, x.history.paths.value, !1)
                },
                getPathValues: function() {
                    var e = window.location.pathname.slice(1).split("/"),
                        a = e.length;
                    return {
                        key: e[a - 2],
                        value: e[a - 1]
                    }
                },
                setHistory: function(e, a) {
                    if (x.history.initialized && x.params.history) {
                        var t = x.slides.eq(a),
                            s = this.slugify(t.attr("data-history"));
                        window.location.pathname.includes(e) || (s = e + "/" + s), x.params.replaceState ? window.history.replaceState(null, null, s) : window.history.pushState(null, null, s)
                    }
                },
                slugify: function(e) {
                    return e.toString().toLowerCase().replace(/\s+/g, "-").replace(/[^\w\-]+/g, "").replace(/\-\-+/g, "-").replace(/^-+/, "").replace(/-+$/, "")
                },
                scrollToSlide: function(e, a, t) {
                    if (a)
                        for (var s = 0, r = x.slides.length; s < r; s++) {
                            var i = x.slides.eq(s),
                                n = this.slugify(i.attr("data-history"));
                            if (n === a && !i.hasClass(x.params.slideDuplicateClass)) {
                                var o = i.index();
                                x.slideTo(o, e, t)
                            }
                        } else x.slideTo(0, e, t)
                }
            }, x.disableKeyboardControl = function() {
                x.params.keyboardControl = !1, e(document).off("keydown", l)
            }, x.enableKeyboardControl = function() {
                x.params.keyboardControl = !0, e(document).on("keydown", l)
            }, x.mousewheel = {
                event: !1,
                lastScrollTime: (new window.Date).getTime()
            }, x.params.mousewheelControl && (x.mousewheel.event = navigator.userAgent.indexOf("firefox") > -1 ? "DOMMouseScroll" : function() {
                var e = "onwheel" in document;
                if (!e) {
                    var a = document.createElement("div");
                    a.setAttribute("onwheel", "return;"), e = "function" == typeof a.onwheel
                }
                return !e && document.implementation && document.implementation.hasFeature && document.implementation.hasFeature("", "") !== !0 && (e = document.implementation.hasFeature("Events.wheel", "3.0")), e
            }() ? "wheel" : "mousewheel"), x.disableMousewheelControl = function() {
                if (!x.mousewheel.event) return !1;
                var a = x.container;
                return "container" !== x.params.mousewheelEventsTarged && (a = e(x.params.mousewheelEventsTarged)), a.off(x.mousewheel.event, d), x.params.mousewheelControl = !1, !0
            }, x.enableMousewheelControl = function() {
                if (!x.mousewheel.event) return !1;
                var a = x.container;
                return "container" !== x.params.mousewheelEventsTarged && (a = e(x.params.mousewheelEventsTarged)), a.on(x.mousewheel.event, d), x.params.mousewheelControl = !0, !0
            }, x.parallax = {
                setTranslate: function() {
                    x.container.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                        m(this, x.progress)
                    }), x.slides.each(function() {
                        var a = e(this);
                        a.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                            m(this, Math.min(Math.max(a[0].progress, -1), 1))
                        })
                    })
                },
                setTransition: function(a) {
                    void 0 === a && (a = x.params.speed), x.container.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y]").each(function() {
                        var t = e(this),
                            s = parseInt(t.attr("data-swiper-parallax-duration"), 10) || a;
                        0 === a && (s = 0), t.transition(s)
                    })
                }
            }, x.zoom = {
                scale: 1,
                currentScale: 1,
                isScaling: !1,
                gesture: {
                    slide: void 0,
                    slideWidth: void 0,
                    slideHeight: void 0,
                    image: void 0,
                    imageWrap: void 0,
                    zoomMax: x.params.zoomMax
                },
                image: {
                    isTouched: void 0,
                    isMoved: void 0,
                    currentX: void 0,
                    currentY: void 0,
                    minX: void 0,
                    minY: void 0,
                    maxX: void 0,
                    maxY: void 0,
                    width: void 0,
                    height: void 0,
                    startX: void 0,
                    startY: void 0,
                    touchesStart: {},
                    touchesCurrent: {}
                },
                velocity: {
                    x: void 0,
                    y: void 0,
                    prevPositionX: void 0,
                    prevPositionY: void 0,
                    prevTime: void 0
                },
                getDistanceBetweenTouches: function(e) {
                    if (e.targetTouches.length < 2) return 1;
                    var a = e.targetTouches[0].pageX,
                        t = e.targetTouches[0].pageY,
                        s = e.targetTouches[1].pageX,
                        r = e.targetTouches[1].pageY;
                    return Math.sqrt(Math.pow(s - a, 2) + Math.pow(r - t, 2))
                },
                onGestureStart: function(a) {
                    var t = x.zoom;
                    if (!x.support.gestures) {
                        if ("touchstart" !== a.type || "touchstart" === a.type && a.targetTouches.length < 2) return;
                        t.gesture.scaleStart = t.getDistanceBetweenTouches(a)
                    }
                    if (!(t.gesture.slide && t.gesture.slide.length || (t.gesture.slide = e(this), 0 === t.gesture.slide.length && (t.gesture.slide = x.slides.eq(x.activeIndex)), t.gesture.image = t.gesture.slide.find("img, svg, canvas"), t.gesture.imageWrap = t.gesture.image.parent("." + x.params.zoomContainerClass), t.gesture.zoomMax = t.gesture.imageWrap.attr("data-swiper-zoom") || x.params.zoomMax, 0 !== t.gesture.imageWrap.length))) return void(t.gesture.image = void 0);
                    t.gesture.image.transition(0), t.isScaling = !0
                },
                onGestureChange: function(e) {
                    var a = x.zoom;
                    if (!x.support.gestures) {
                        if ("touchmove" !== e.type || "touchmove" === e.type && e.targetTouches.length < 2) return;
                        a.gesture.scaleMove = a.getDistanceBetweenTouches(e)
                    }
                    a.gesture.image && 0 !== a.gesture.image.length && (x.support.gestures ? a.scale = e.scale * a.currentScale : a.scale = a.gesture.scaleMove / a.gesture.scaleStart * a.currentScale, a.scale > a.gesture.zoomMax && (a.scale = a.gesture.zoomMax - 1 + Math.pow(a.scale - a.gesture.zoomMax + 1, .5)), a.scale < x.params.zoomMin && (a.scale = x.params.zoomMin + 1 - Math.pow(x.params.zoomMin - a.scale + 1, .5)), a.gesture.image.transform("translate3d(0,0,0) scale(" + a.scale + ")"))
                },
                onGestureEnd: function(e) {
                    var a = x.zoom;
                    !x.support.gestures && ("touchend" !== e.type || "touchend" === e.type && e.changedTouches.length < 2) || a.gesture.image && 0 !== a.gesture.image.length && (a.scale = Math.max(Math.min(a.scale, a.gesture.zoomMax), x.params.zoomMin), a.gesture.image.transition(x.params.speed).transform("translate3d(0,0,0) scale(" + a.scale + ")"), a.currentScale = a.scale, a.isScaling = !1, 1 === a.scale && (a.gesture.slide = void 0))
                },
                onTouchStart: function(e, a) {
                    var t = e.zoom;
                    t.gesture.image && 0 !== t.gesture.image.length && (t.image.isTouched || ("android" === e.device.os && a.preventDefault(), t.image.isTouched = !0, t.image.touchesStart.x = "touchstart" === a.type ? a.targetTouches[0].pageX : a.pageX, t.image.touchesStart.y = "touchstart" === a.type ? a.targetTouches[0].pageY : a.pageY))
                },
                onTouchMove: function(e) {
                    var a = x.zoom;
                    if (a.gesture.image && 0 !== a.gesture.image.length && (x.allowClick = !1, a.image.isTouched && a.gesture.slide)) {
                        a.image.isMoved || (a.image.width = a.gesture.image[0].offsetWidth, a.image.height = a.gesture.image[0].offsetHeight, a.image.startX = x.getTranslate(a.gesture.imageWrap[0], "x") || 0, a.image.startY = x.getTranslate(a.gesture.imageWrap[0], "y") || 0, a.gesture.slideWidth = a.gesture.slide[0].offsetWidth, a.gesture.slideHeight = a.gesture.slide[0].offsetHeight, a.gesture.imageWrap.transition(0), x.rtl && (a.image.startX = -a.image.startX), x.rtl && (a.image.startY = -a.image.startY));
                        var t = a.image.width * a.scale,
                            s = a.image.height * a.scale;
                        if (!(t < a.gesture.slideWidth && s < a.gesture.slideHeight)) {
                            if (a.image.minX = Math.min(a.gesture.slideWidth / 2 - t / 2, 0), a.image.maxX = -a.image.minX, a.image.minY = Math.min(a.gesture.slideHeight / 2 - s / 2, 0), a.image.maxY = -a.image.minY, a.image.touchesCurrent.x = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX, a.image.touchesCurrent.y = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY, !a.image.isMoved && !a.isScaling) {
                                if (x.isHorizontal() && Math.floor(a.image.minX) === Math.floor(a.image.startX) && a.image.touchesCurrent.x < a.image.touchesStart.x || Math.floor(a.image.maxX) === Math.floor(a.image.startX) && a.image.touchesCurrent.x > a.image.touchesStart.x) return void(a.image.isTouched = !1);
                                if (!x.isHorizontal() && Math.floor(a.image.minY) === Math.floor(a.image.startY) && a.image.touchesCurrent.y < a.image.touchesStart.y || Math.floor(a.image.maxY) === Math.floor(a.image.startY) && a.image.touchesCurrent.y > a.image.touchesStart.y) return void(a.image.isTouched = !1)
                            }
                            e.preventDefault(), e.stopPropagation(), a.image.isMoved = !0, a.image.currentX = a.image.touchesCurrent.x - a.image.touchesStart.x + a.image.startX, a.image.currentY = a.image.touchesCurrent.y - a.image.touchesStart.y + a.image.startY, a.image.currentX < a.image.minX && (a.image.currentX = a.image.minX + 1 - Math.pow(a.image.minX - a.image.currentX + 1, .8)), a.image.currentX > a.image.maxX && (a.image.currentX = a.image.maxX - 1 + Math.pow(a.image.currentX - a.image.maxX + 1, .8)), a.image.currentY < a.image.minY && (a.image.currentY = a.image.minY + 1 - Math.pow(a.image.minY - a.image.currentY + 1, .8)), a.image.currentY > a.image.maxY && (a.image.currentY = a.image.maxY - 1 + Math.pow(a.image.currentY - a.image.maxY + 1, .8)), a.velocity.prevPositionX || (a.velocity.prevPositionX = a.image.touchesCurrent.x), a.velocity.prevPositionY || (a.velocity.prevPositionY = a.image.touchesCurrent.y), a.velocity.prevTime || (a.velocity.prevTime = Date.now()), a.velocity.x = (a.image.touchesCurrent.x - a.velocity.prevPositionX) / (Date.now() - a.velocity.prevTime) / 2, a.velocity.y = (a.image.touchesCurrent.y - a.velocity.prevPositionY) / (Date.now() - a.velocity.prevTime) / 2, Math.abs(a.image.touchesCurrent.x - a.velocity.prevPositionX) < 2 && (a.velocity.x = 0), Math.abs(a.image.touchesCurrent.y - a.velocity.prevPositionY) < 2 && (a.velocity.y = 0), a.velocity.prevPositionX = a.image.touchesCurrent.x, a.velocity.prevPositionY = a.image.touchesCurrent.y, a.velocity.prevTime = Date.now(), a.gesture.imageWrap.transform("translate3d(" + a.image.currentX + "px, " + a.image.currentY + "px,0)")
                        }
                    }
                },
                onTouchEnd: function(e, a) {
                    var t = e.zoom;
                    if (t.gesture.image && 0 !== t.gesture.image.length) {
                        if (!t.image.isTouched || !t.image.isMoved) return t.image.isTouched = !1, void(t.image.isMoved = !1);
                        t.image.isTouched = !1, t.image.isMoved = !1;
                        var s = 300,
                            r = 300,
                            i = t.velocity.x * s,
                            n = t.image.currentX + i,
                            o = t.velocity.y * r,
                            l = t.image.currentY + o;
                        0 !== t.velocity.x && (s = Math.abs((n - t.image.currentX) / t.velocity.x)), 0 !== t.velocity.y && (r = Math.abs((l - t.image.currentY) / t.velocity.y));
                        var p = Math.max(s, r);
                        t.image.currentX = n, t.image.currentY = l;
                        var d = t.image.width * t.scale,
                            m = t.image.height * t.scale;
                        t.image.minX = Math.min(t.gesture.slideWidth / 2 - d / 2, 0), t.image.maxX = -t.image.minX, t.image.minY = Math.min(t.gesture.slideHeight / 2 - m / 2, 0), t.image.maxY = -t.image.minY, t.image.currentX = Math.max(Math.min(t.image.currentX, t.image.maxX), t.image.minX), t.image.currentY = Math.max(Math.min(t.image.currentY, t.image.maxY), t.image.minY), t.gesture.imageWrap.transition(p).transform("translate3d(" + t.image.currentX + "px, " + t.image.currentY + "px,0)")
                    }
                },
                onTransitionEnd: function(e) {
                    var a = e.zoom;
                    a.gesture.slide && e.previousIndex !== e.activeIndex && (a.gesture.image.transform("translate3d(0,0,0) scale(1)"), a.gesture.imageWrap.transform("translate3d(0,0,0)"), a.gesture.slide = a.gesture.image = a.gesture.imageWrap = void 0, a.scale = a.currentScale = 1)
                },
                toggleZoom: function(a, t) {
                    var s = a.zoom;
                    if (s.gesture.slide || (s.gesture.slide = a.clickedSlide ? e(a.clickedSlide) : a.slides.eq(a.activeIndex), s.gesture.image = s.gesture.slide.find("img, svg, canvas"), s.gesture.imageWrap = s.gesture.image.parent("." + a.params.zoomContainerClass)), s.gesture.image && 0 !== s.gesture.image.length) {
                        var r, i, n, o, l, p, d, m, u, c, g, h, v, f, w, y, x, T;
                        void 0 === s.image.touchesStart.x && t ? (r = "touchend" === t.type ? t.changedTouches[0].pageX : t.pageX, i = "touchend" === t.type ? t.changedTouches[0].pageY : t.pageY) : (r = s.image.touchesStart.x, i = s.image.touchesStart.y), s.scale && 1 !== s.scale ? (s.scale = s.currentScale = 1, s.gesture.imageWrap.transition(300).transform("translate3d(0,0,0)"), s.gesture.image.transition(300).transform("translate3d(0,0,0) scale(1)"), s.gesture.slide = void 0) : (s.scale = s.currentScale = s.gesture.imageWrap.attr("data-swiper-zoom") || a.params.zoomMax, t ? (x = s.gesture.slide[0].offsetWidth, T = s.gesture.slide[0].offsetHeight, n = s.gesture.slide.offset().left, o = s.gesture.slide.offset().top, l = n + x / 2 - r, p = o + T / 2 - i, u = s.gesture.image[0].offsetWidth, c = s.gesture.image[0].offsetHeight, g = u * s.scale, h = c * s.scale, v = Math.min(x / 2 - g / 2, 0), f = Math.min(T / 2 - h / 2, 0), w = -v, y = -f, d = l * s.scale, m = p * s.scale, d < v && (d = v), d > w && (d = w), m < f && (m = f), m > y && (m = y)) : (d = 0, m = 0), s.gesture.imageWrap.transition(300).transform("translate3d(" + d + "px, " + m + "px,0)"), s.gesture.image.transition(300).transform("translate3d(0,0,0) scale(" + s.scale + ")"))
                    }
                },
                attachEvents: function(a) {
                    var t = a ? "off" : "on";
                    if (x.params.zoom) {
                        var s = (x.slides, !("touchstart" !== x.touchEvents.start || !x.support.passiveListener || !x.params.passiveListeners) && {
                            passive: !0,
                            capture: !1
                        });
                        x.support.gestures ? (x.slides[t]("gesturestart", x.zoom.onGestureStart, s), x.slides[t]("gesturechange", x.zoom.onGestureChange, s), x.slides[t]("gestureend", x.zoom.onGestureEnd, s)) : "touchstart" === x.touchEvents.start && (x.slides[t](x.touchEvents.start, x.zoom.onGestureStart, s), x.slides[t](x.touchEvents.move, x.zoom.onGestureChange, s), x.slides[t](x.touchEvents.end, x.zoom.onGestureEnd, s)), x[t]("touchStart", x.zoom.onTouchStart), x.slides.each(function(a, s) {
                            e(s).find("." + x.params.zoomContainerClass).length > 0 && e(s)[t](x.touchEvents.move, x.zoom.onTouchMove)
                        }), x[t]("touchEnd", x.zoom.onTouchEnd), x[t]("transitionEnd", x.zoom.onTransitionEnd), x.params.zoomToggle && x.on("doubleTap", x.zoom.toggleZoom)
                    }
                },
                init: function() {
                    x.zoom.attachEvents()
                },
                destroy: function() {
                    x.zoom.attachEvents(!0)
                }
            }, x._plugins = [];
            for (var Y in x.plugins) {
                var A = x.plugins[Y](x, x.params[Y]);
                A && x._plugins.push(A)
            }
            return x.callPlugins = function(e) {
                for (var a = 0; a < x._plugins.length; a++) e in x._plugins[a] && x._plugins[a][e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            }, x.emitterEventListeners = {}, x.emit = function(e) {
                x.params[e] && x.params[e](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                var a;
                if (x.emitterEventListeners[e])
                    for (a = 0; a < x.emitterEventListeners[e].length; a++) x.emitterEventListeners[e][a](arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                x.callPlugins && x.callPlugins(e, arguments[1], arguments[2], arguments[3], arguments[4], arguments[5])
            }, x.on = function(e, a) {
                return e = u(e), x.emitterEventListeners[e] || (x.emitterEventListeners[e] = []), x.emitterEventListeners[e].push(a), x
            }, x.off = function(e, a) {
                var t;
                if (e = u(e), void 0 === a) return x.emitterEventListeners[e] = [], x;
                if (x.emitterEventListeners[e] && 0 !== x.emitterEventListeners[e].length) {
                    for (t = 0; t < x.emitterEventListeners[e].length; t++) x.emitterEventListeners[e][t] === a && x.emitterEventListeners[e].splice(t, 1);
                    return x
                }
            }, x.once = function(e, a) {
                e = u(e);
                var t = function() {
                    a(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]), x.off(e, t)
                };
                return x.on(e, t), x
            }, x.a11y = {
                makeFocusable: function(e) {
                    return e.attr("tabIndex", "0"), e
                },
                addRole: function(e, a) {
                    return e.attr("role", a), e
                },
                addLabel: function(e, a) {
                    return e.attr("aria-label", a), e
                },
                disable: function(e) {
                    return e.attr("aria-disabled", !0), e
                },
                enable: function(e) {
                    return e.attr("aria-disabled", !1), e
                },
                onEnterKey: function(a) {
                    13 === a.keyCode && (e(a.target).is(x.params.nextButton) ? (x.onClickNext(a), x.isEnd ? x.a11y.notify(x.params.lastSlideMessage) : x.a11y.notify(x.params.nextSlideMessage)) : e(a.target).is(x.params.prevButton) && (x.onClickPrev(a), x.isBeginning ? x.a11y.notify(x.params.firstSlideMessage) : x.a11y.notify(x.params.prevSlideMessage)), e(a.target).is("." + x.params.bulletClass) && e(a.target)[0].click())
                },
                liveRegion: e('<span class="' + x.params.notificationClass + '" aria-live="assertive" aria-atomic="true"></span>'),
                notify: function(e) {
                    var a = x.a11y.liveRegion;
                    0 !== a.length && (a.html(""), a.html(e))
                },
                init: function() {
                    x.params.nextButton && x.nextButton && x.nextButton.length > 0 && (x.a11y.makeFocusable(x.nextButton), x.a11y.addRole(x.nextButton, "button"), x.a11y.addLabel(x.nextButton, x.params.nextSlideMessage)), x.params.prevButton && x.prevButton && x.prevButton.length > 0 && (x.a11y.makeFocusable(x.prevButton), x.a11y.addRole(x.prevButton, "button"), x.a11y.addLabel(x.prevButton, x.params.prevSlideMessage)), e(x.container).append(x.a11y.liveRegion)
                },
                initPagination: function() {
                    x.params.pagination && x.params.paginationClickable && x.bullets && x.bullets.length && x.bullets.each(function() {
                        var a = e(this);
                        x.a11y.makeFocusable(a), x.a11y.addRole(a, "button"), x.a11y.addLabel(a, x.params.paginationBulletMessage.replace(/{{index}}/, a.index() + 1))
                    })
                },
                destroy: function() {
                    x.a11y.liveRegion && x.a11y.liveRegion.length > 0 && x.a11y.liveRegion.remove()
                }
            }, x.init = function() {
                x.params.loop && x.createLoop(), x.updateContainerSize(), x.updateSlidesSize(), x.updatePagination(), x.params.scrollbar && x.scrollbar && (x.scrollbar.set(), x.params.scrollbarDraggable && x.scrollbar.enableDraggable()), "slide" !== x.params.effect && x.effects[x.params.effect] && (x.params.loop || x.updateProgress(), x.effects[x.params.effect].setTranslate()), x.params.loop ? x.slideTo(x.params.initialSlide + x.loopedSlides, 0, x.params.runCallbacksOnInit) : (x.slideTo(x.params.initialSlide, 0, x.params.runCallbacksOnInit), 0 === x.params.initialSlide && (x.parallax && x.params.parallax && x.parallax.setTranslate(), x.lazy && x.params.lazyLoading && (x.lazy.load(), x.lazy.initialImageLoaded = !0))), x.attachEvents(), x.params.observer && x.support.observer && x.initObservers(), x.params.preloadImages && !x.params.lazyLoading && x.preloadImages(), x.params.zoom && x.zoom && x.zoom.init(), x.params.autoplay && x.startAutoplay(), x.params.keyboardControl && x.enableKeyboardControl && x.enableKeyboardControl(), x.params.mousewheelControl && x.enableMousewheelControl && x.enableMousewheelControl(), x.params.hashnavReplaceState && (x.params.replaceState = x.params.hashnavReplaceState), x.params.history && x.history && x.history.init(), x.params.hashnav && x.hashnav && x.hashnav.init(), x.params.a11y && x.a11y && x.a11y.init(), x.emit("onInit", x)
            }, x.cleanupStyles = function() {
                x.container.removeClass(x.classNames.join(" ")).removeAttr("style"), x.wrapper.removeAttr("style"), x.slides && x.slides.length && x.slides.removeClass([x.params.slideVisibleClass, x.params.slideActiveClass, x.params.slideNextClass, x.params.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-column").removeAttr("data-swiper-row"), x.paginationContainer && x.paginationContainer.length && x.paginationContainer.removeClass(x.params.paginationHiddenClass), x.bullets && x.bullets.length && x.bullets.removeClass(x.params.bulletActiveClass), x.params.prevButton && e(x.params.prevButton).removeClass(x.params.buttonDisabledClass), x.params.nextButton && e(x.params.nextButton).removeClass(x.params.buttonDisabledClass), x.params.scrollbar && x.scrollbar && (x.scrollbar.track && x.scrollbar.track.length && x.scrollbar.track.removeAttr("style"), x.scrollbar.drag && x.scrollbar.drag.length && x.scrollbar.drag.removeAttr("style"))
            }, x.destroy = function(e, a) {
                x.detachEvents(), x.stopAutoplay(), x.params.scrollbar && x.scrollbar && x.params.scrollbarDraggable && x.scrollbar.disableDraggable(), x.params.loop && x.destroyLoop(), a && x.cleanupStyles(), x.disconnectObservers(), x.params.zoom && x.zoom && x.zoom.destroy(), x.params.keyboardControl && x.disableKeyboardControl && x.disableKeyboardControl(), x.params.mousewheelControl && x.disableMousewheelControl && x.disableMousewheelControl(), x.params.a11y && x.a11y && x.a11y.destroy(), x.params.history && !x.params.replaceState && window.removeEventListener("popstate", x.history.setHistoryPopState), x.params.hashnav && x.hashnav && x.hashnav.destroy(), x.emit("onDestroy"), e !== !1 && (x = null)
            }, x.init(), x
        }
    };
    a.prototype = {
        isSafari: function() {
            var e = window.navigator.userAgent.toLowerCase();
            return e.indexOf("safari") >= 0 && e.indexOf("chrome") < 0 && e.indexOf("android") < 0
        }(),
        isUiWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(window.navigator.userAgent),
        isArray: function(e) {
            return "[object Array]" === Object.prototype.toString.apply(e)
        },
        browser: {
            ie: window.navigator.pointerEnabled || window.navigator.msPointerEnabled,
            ieTouch: window.navigator.msPointerEnabled && window.navigator.msMaxTouchPoints > 1 || window.navigator.pointerEnabled && window.navigator.maxTouchPoints > 1,
            lteIE9: function() {
                var e = document.createElement("div");
                return e.innerHTML = "<!--[if lte IE 9]><i></i><![endif]-->", 1 === e.getElementsByTagName("i").length
            }()
        },
        device: function() {
            var e = window.navigator.userAgent,
                a = e.match(/(Android);?[\s\/]+([\d.]+)?/),
                t = e.match(/(iPad).*OS\s([\d_]+)/),
                s = e.match(/(iPod)(.*OS\s([\d_]+))?/),
                r = !t && e.match(/(iPhone\sOS|iOS)\s([\d_]+)/);
            return {
                ios: t || r || s,
                android: a
            }
        }(),
        support: {
            touch: window.Modernizr && Modernizr.touch === !0 || function() {
                return !!("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch)
            }(),
            transforms3d: window.Modernizr && Modernizr.csstransforms3d === !0 || function() {
                var e = document.createElement("div").style;
                return "webkitPerspective" in e || "MozPerspective" in e || "OPerspective" in e || "MsPerspective" in e || "perspective" in e
            }(),
            flexbox: function() {
                for (var e = document.createElement("div").style, a = "alignItems webkitAlignItems webkitBoxAlign msFlexAlign mozBoxAlign webkitFlexDirection msFlexDirection mozBoxDirection mozBoxOrient webkitBoxDirection webkitBoxOrient".split(" "), t = 0; t < a.length; t++)
                    if (a[t] in e) return !0
            }(),
            observer: function() {
                return "MutationObserver" in window || "WebkitMutationObserver" in window
            }(),
            passiveListener: function() {
                var e = !1;
                try {
                    var a = Object.defineProperty({}, "passive", {
                        get: function() {
                            e = !0
                        }
                    });
                    window.addEventListener("testPassiveListener", null, a)
                } catch (e) {}
                return e
            }(),
            gestures: function() {
                return "ongesturestart" in window
            }()
        },
        plugins: {}
    };
    for (var t = ["jQuery", "Zepto", "Dom7"], s = 0; s < t.length; s++) window[t[s]] && function(e) {
        e.fn.swiper = function(t) {
            var s;
            return e(this).each(function() {
                var e = new a(this, t);
                s || (s = e)
            }), s
        }
    }(window[t[s]]);
    var r;
    r = "undefined" == typeof Dom7 ? window.Dom7 || window.Zepto || window.jQuery : Dom7, r && ("transitionEnd" in r.fn || (r.fn.transitionEnd = function(e) {
        function a(i) {
            if (i.target === this)
                for (e.call(this, i), t = 0; t < s.length; t++) r.off(s[t], a)
        }
        var t, s = ["webkitTransitionEnd", "transitionend", "oTransitionEnd", "MSTransitionEnd", "msTransitionEnd"],
            r = this;
        if (e)
            for (t = 0; t < s.length; t++) r.on(s[t], a);
        return this
    }), "transform" in r.fn || (r.fn.transform = function(e) {
        for (var a = 0; a < this.length; a++) {
            var t = this[a].style;
            t.webkitTransform = t.MsTransform = t.msTransform = t.MozTransform = t.OTransform = t.transform = e
        }
        return this
    }), "transition" in r.fn || (r.fn.transition = function(e) {
        "string" != typeof e && (e += "ms");
        for (var a = 0; a < this.length; a++) {
            var t = this[a].style;
            t.webkitTransitionDuration = t.MsTransitionDuration = t.msTransitionDuration = t.MozTransitionDuration = t.OTransitionDuration = t.transitionDuration = e
        }
        return this
    }), "outerWidth" in r.fn || (r.fn.outerWidth = function(e) {
        console.log(this.css("margin-right"))
        return this.length > 0 ? e ? this[0].offsetWidth + parseFloat(this.css("margin-right")) + parseFloat(this.css("margin-left")) : this[0].offsetWidth : null
    })), window.Swiper = a
}(), "undefined" != typeof module ? module.exports = window.Swiper : "function" == typeof define && define.amd && define([], function() {
    "use strict";
    return window.Swiper
});//# sourceMappingURL=maps/swiper.jquery.min.js.map

        /* ----------------------------------------- Counter --------------------------- Up */
                /*!
                 * jquery.counterup.js 1.0
                 *
                 * Copyright 2013, Benjamin Intal http://gambit.ph @bfintal
                 * Released under the GPL v2 License
                 *
                 * Date: Nov 26, 2013
                 */(function(e){"use strict"; e.fn.counterUp = function(t){var n = e.extend({time:400, delay:10}, t); return this.each(function(){var t = e(this), r = n, i = function(){var e = [], n = r.time / r.delay, i = t.text(), s = /[0-9]+,[0-9]+/.test(i); i = i.replace(/,/g, ""); var o = /^[0-9]+$/.test(i), u = /^[0-9]+\.[0-9]+$/.test(i), a = u?(i.split(".")[1] || []).length:0; for (var f = n; f >= 1; f--){var l = parseInt(i / n * f); u && (l = parseFloat(i / n * f).toFixed(a)); if (s)while (/(\d+)(\d{3})/.test(l.toString()))l = l.toString().replace(/(\d+)(\d{3})/, "$1,$2"); e.unshift(l)}t.data("counterup-nums", e); t.text("0"); var c = function(){t.text(t.data("counterup-nums").shift()); if (t.data("counterup-nums").length)setTimeout(t.data("counterup-func"), r.delay);  else{delete t.data("counterup-nums"); t.data("counterup-nums", null); t.data("counterup-func", null)}}; t.data("counterup-func", c); setTimeout(t.data("counterup-func"), r.delay)}; t.waypoint(i, {offset:"100%", triggerOnce:!0})})}})(jQuery);
                /* -----------------------------  Waypoints ----------------------------- */
// Generated by CoffeeScript 1.6.2
                        /*
                         jQuery Waypoints - v2.0.3
                         Copyright (c) 2011-2013 Caleb Troughton
                         Dual licensed under the MIT license and GPL license.
                         https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
                         */
                                (function(){var t = [].indexOf || function(t){for (var e = 0, n = this.length; e < n; e++){if (e in this && this[e] === t)return e}return - 1}, e = [].slice; (function(t, e){if (typeof define === "function" && define.amd){return define("waypoints", ["jquery"], function(n){return e(n, t)})} else{return e(t.jQuery, t)}})(this, function(n, r){var i, o, l, s, f, u, a, c, h, d, p, y, v, w, g, m; i = n(r); c = t.call(r, "ontouchstart") >= 0; s = {horizontal:{}, vertical:{}}; f = 1; a = {}; u = "waypoints-context-id"; p = "resize.waypoints"; y = "scroll.waypoints"; v = 1; w = "waypoints-waypoint-ids"; g = "waypoint"; m = "waypoints"; o = function(){function t(t){var e = this; this.$element = t; this.element = t[0]; this.didResize = false; this.didScroll = false; this.id = "context" + f++; this.oldScroll = {x:t.scrollLeft(), y:t.scrollTop()}; this.waypoints = {horizontal:{}, vertical:{}}; t.data(u, this.id); a[this.id] = this; t.bind(y, function(){var t; if (!(e.didScroll || c)){e.didScroll = true; t = function(){e.doScroll(); return e.didScroll = false}; return r.setTimeout(t, n[m].settings.scrollThrottle)}}); t.bind(p, function(){var t; if (!e.didResize){e.didResize = true; t = function(){n[m]("refresh"); return e.didResize = false}; return r.setTimeout(t, n[m].settings.resizeThrottle)}})}t.prototype.doScroll = function(){var t, e = this; t = {horizontal:{newScroll:this.$element.scrollLeft(), oldScroll:this.oldScroll.x, forward:"right", backward:"left"}, vertical:{newScroll:this.$element.scrollTop(), oldScroll:this.oldScroll.y, forward:"down", backward:"up"}}; if (c && (!t.vertical.oldScroll || !t.vertical.newScroll)){n[m]("refresh")}n.each(t, function(t, r){var i, o, l; l = []; o = r.newScroll > r.oldScroll; i = o?r.forward:r.backward; n.each(e.waypoints[t], function(t, e){var n, i; if (r.oldScroll < (n = e.offset) && n <= r.newScroll){return l.push(e)} else if (r.newScroll < (i = e.offset) && i <= r.oldScroll){return l.push(e)}}); l.sort(function(t, e){return t.offset - e.offset}); if (!o){l.reverse()}return n.each(l, function(t, e){if (e.options.continuous || t === l.length - 1){return e.trigger([i])}})}); return this.oldScroll = {x:t.horizontal.newScroll, y:t.vertical.newScroll}}; t.prototype.refresh = function(){var t, e, r, i = this; r = n.isWindow(this.element); e = this.$element.offset(); this.doScroll(); t = {horizontal:{contextOffset:r?0:e.left, contextScroll:r?0:this.oldScroll.x, contextDimension:this.$element.width(), oldScroll:this.oldScroll.x, forward:"right", backward:"left", offsetProp:"left"}, vertical:{contextOffset:r?0:e.top, contextScroll:r?0:this.oldScroll.y, contextDimension:r?n[m]("viewportHeight"):this.$element.height(), oldScroll:this.oldScroll.y, forward:"down", backward:"up", offsetProp:"top"}}; return n.each(t, function(t, e){return n.each(i.waypoints[t], function(t, r){var i, o, l, s, f; i = r.options.offset; l = r.offset; o = n.isWindow(r.element)?0:r.$element.offset()[e.offsetProp]; if (n.isFunction(i)){i = i.apply(r.element)} else if (typeof i === "string"){i = parseFloat(i); if (r.options.offset.indexOf("%") > - 1){i = Math.ceil(e.contextDimension * i / 100)}}r.offset = o - e.contextOffset + e.contextScroll - i; if (r.options.onlyOnScroll && l != null || !r.enabled){return}if (l !== null && l < (s = e.oldScroll) && s <= r.offset){return r.trigger([e.backward])} else if (l !== null && l > (f = e.oldScroll) && f >= r.offset){return r.trigger([e.forward])} else if (l === null && e.oldScroll >= r.offset){return r.trigger([e.forward])}})})}; t.prototype.checkEmpty = function(){if (n.isEmptyObject(this.waypoints.horizontal) && n.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([p, y].join(" ")); return delete a[this.id]}}; return t}(); l = function(){function t(t, e, r){var i, o; r = n.extend({}, n.fn[g].defaults, r); if (r.offset === "bottom-in-view"){r.offset = function(){var t; t = n[m]("viewportHeight"); if (!n.isWindow(e.element)){t = e.$element.height()}return t - n(this).outerHeight()}}this.$element = t; this.element = t[0]; this.axis = r.horizontal?"horizontal":"vertical"; this.callback = r.handler; this.context = e; this.enabled = r.enabled; this.id = "waypoints" + v++; this.offset = null; this.options = r; e.waypoints[this.axis][this.id] = this; s[this.axis][this.id] = this; i = (o = t.data(w)) != null?o:[]; i.push(this.id); t.data(w, i)}t.prototype.trigger = function(t){if (!this.enabled){return}if (this.callback != null){this.callback.apply(this.element, t)}if (this.options.triggerOnce){return this.destroy()}}; t.prototype.disable = function(){return this.enabled = false}; t.prototype.enable = function(){this.context.refresh(); return this.enabled = true}; t.prototype.destroy = function(){delete s[this.axis][this.id]; delete this.context.waypoints[this.axis][this.id]; return this.context.checkEmpty()}; t.getWaypointsByElement = function(t){var e, r; r = n(t).data(w); if (!r){return[]}e = n.extend({}, s.horizontal, s.vertical); return n.map(r, function(t){return e[t]})}; return t}(); d = {init:function(t, e){var r; if (e == null){e = {}}if ((r = e.handler) == null){e.handler = t}this.each(function(){var t, r, i, s; t = n(this); i = (s = e.context) != null?s:n.fn[g].defaults.context; if (!n.isWindow(i)){i = t.closest(i)}i = n(i); r = a[i.data(u)]; if (!r){r = new o(i)}return new l(t, r, e)}); n[m]("refresh"); return this}, disable:function(){return d._invoke(this, "disable")}, enable:function(){return d._invoke(this, "enable")}, destroy:function(){return d._invoke(this, "destroy")}, prev:function(t, e){return d._traverse.call(this, t, e, function(t, e, n){if (e > 0){return t.push(n[e - 1])}})}, next:function(t, e){return d._traverse.call(this, t, e, function(t, e, n){if (e < n.length - 1){return t.push(n[e + 1])}})}, _traverse:function(t, e, i){var o, l; if (t == null){t = "vertical"}if (e == null){e = r}l = h.aggregate(e); o = []; this.each(function(){var e; e = n.inArray(this, l[t]); return i(o, e, l[t])}); return this.pushStack(o)}, _invoke:function(t, e){t.each(function(){var t; t = l.getWaypointsByElement(this); return n.each(t, function(t, n){n[e](); return true})}); return this}}; n.fn[g] = function(){var t, r; r = arguments[0], t = 2 <= arguments.length?e.call(arguments, 1):[]; if (d[r]){return d[r].apply(this, t)} else if (n.isFunction(r)){return d.init.apply(this, arguments)} else if (n.isPlainObject(r)){return d.init.apply(this, [null, r])} else if (!r){return n.error("jQuery Waypoints needs a callback function or handler option.")} else{return n.error("The " + r + " method does not exist in jQuery Waypoints.")}}; n.fn[g].defaults = {context:r, continuous:true, enabled:true, horizontal:false, offset:0, triggerOnce:false}; h = {refresh:function(){return n.each(a, function(t, e){return e.refresh()})}, viewportHeight:function(){var t; return(t = r.innerHeight) != null?t:i.height()}, aggregate:function(t){var e, r, i; e = s; if (t){e = (i = a[n(t).data(u)]) != null?i.waypoints:void 0}if (!e){return[]}r = {horizontal:[], vertical:[]}; n.each(r, function(t, i){n.each(e[t], function(t, e){return i.push(e)}); i.sort(function(t, e){return t.offset - e.offset}); r[t] = n.map(i, function(t){return t.element}); return r[t] = n.unique(r[t])}); return r}, above:function(t){if (t == null){t = r}return h._filter(t, "vertical", function(t, e){return e.offset <= t.oldScroll.y})}, below:function(t){if (t == null){t = r}return h._filter(t, "vertical", function(t, e){return e.offset > t.oldScroll.y})}, left:function(t){if (t == null){t = r}return h._filter(t, "horizontal", function(t, e){return e.offset <= t.oldScroll.x})}, right:function(t){if (t == null){t = r}return h._filter(t, "horizontal", function(t, e){return e.offset > t.oldScroll.x})}, enable:function(){return h._invoke("enable")}, disable:function(){return h._invoke("disable")}, destroy:function(){return h._invoke("destroy")}, extendFn:function(t, e){return d[t] = e}, _invoke:function(t){var e; e = n.extend({}, s.vertical, s.horizontal); return n.each(e, function(e, n){n[t](); return true})}, _filter:function(t, e, r){var i, o; i = a[n(t).data(u)]; if (!i){return[]}o = []; n.each(i.waypoints[e], function(t, e){if (r(i, e)){return o.push(e)}}); o.sort(function(t, e){return t.offset - e.offset}); return n.map(o, function(t){return t.element})}}; n[m] = function(){var t, n; n = arguments[0], t = 2 <= arguments.length?e.call(arguments, 1):[]; if (h[n]){return h[n].apply(null, t)} else{return h.aggregate.call(null, n)}}; n[m].settings = {resizeThrottle:100, scrollThrottle:30}; return i.load(function(){return n[m]("refresh")})})}).call(this);
                                /* ---------------------------- VenoBox -------------------------- */

                                /*
                                 * VenoBox - jQuery Plugin
                                 * version: 1.8.2
                                 * @requires jQuery >= 1.7.0
                                 *
                                 * Examples at http://veno.es/venobox/
                                 * License: MIT License
                                 * License URI: https://github.com/nicolafranchini/VenoBox/blob/master/LICENSE
                                 * Copyright 2013-2017 Nicola Franchini - @nicolafranchini
                                 *
                                 */
                                !function(e){"use strict"; var o, t, a, i, s, n, c, r, d, l, v, u, b, p, m, f, h, g, k, x, y, w, C, _, P, B, E, O, U, D, M, N, V, z, R, X, Y, j, W, q; e.fn.extend({venobox:function($){var I = this, A = {arrowsColor:"#B6B6B6", autoplay:!1, bgcolor:"#fff", border:"0", closeBackground:"#161617", closeColor:"#d2d2d2", framewidth:"", frameheight:"", infinigall:!1, htmlClose:"&times;", htmlNext:"<span>Next</span>", htmlPrev:"<span>Prev</span>", numeratio:!1, numerationBackground:"#161617", numerationColor:"#d2d2d2", numerationPosition:"top", overlayClose:!0, overlayColor:"rgba(23,23,23,0.85)", spinner:"double-bounce", spinColor:"#d2d2d2", titleattr:"title", titleBackground:"#161617", titleColor:"#d2d2d2", titlePosition:"top", cb_pre_open:function(){return!0}, cb_post_open:function(){}, cb_pre_close:function(){return!0}, cb_post_close:function(){}, cb_post_resize:function(){}, cb_after_nav:function(){}, cb_init:function(){}}, H = e.extend(A, $); return H.cb_init(I), this.each(function(){function $(){y = O.data("gall"), h = O.data("numeratio"), b = O.data("infinigall"), p = e('.vbox-item[data-gall="' + y + '"]'), w = p.eq(p.index(O) + 1), C = p.eq(p.index(O) - 1), w.length || b !== !0 || (w = p.eq(0)), p.length > 1?(U = p.index(O) + 1, a.html(U + " / " + p.length)):U = 1, h === !0?a.show():a.hide(), "" !== x?i.show():i.hide(), w.length || b === !0?(e(".vbox-next").css("display", "block"), _ = !0):(e(".vbox-next").css("display", "none"), _ = !1), p.index(O) > 0 || b === !0?(e(".vbox-prev").css("display", "block"), P = !0):(e(".vbox-prev").css("display", "none"), P = !1), (P === !0 || _ === !0) && (r.on(ne.DOWN, T), r.on(ne.MOVE, Z), r.on(ne.UP, F))}function A(e){return e.length < 1?!1:m?!1:(m = !0, g = e.data("overlay") || e.data("overlaycolor"), v = e.data("framewidth"), u = e.data("frameheight"), s = e.data("border"), t = e.data("bgcolor"), d = e.data("href") || e.attr("href"), o = e.data("autoplay"), x = e.attr(e.data("titleattr")) || "", e === C && r.addClass("animated").addClass("swipe-right"), e === w && r.addClass("animated").addClass("swipe-left"), void r.animate({opacity:0}, 500, function(){k.css("background", g), r.removeClass("animated").removeClass("swipe-left").removeClass("swipe-right").css({"margin-left":0, "margin-right":0}), "iframe" == e.data("vbtype")?J():"inline" == e.data("vbtype")?oe():"ajax" == e.data("vbtype")?G():"video" == e.data("vbtype") || "vimeo" == e.data("vbtype") || "youtube" == e.data("vbtype")?K(o):(r.html('<img src="' + d + '">'), te()), O = e, $(), m = !1, H.cb_after_nav(O, U, w, C)}))}function Q(e){27 === e.keyCode && S(), 37 == e.keyCode && P === !0 && A(C), 39 == e.keyCode && _ === !0 && A(w)}function S(){var o = H.cb_pre_close(O, U, w, C); return o === !1?!1:(e("body").off("keydown", Q).removeClass("vbox-open"), O.focus(), void k.animate({opacity:0}, 500, function(){k.remove(), m = !1, H.cb_post_close()}))}function T(e){r.addClass("animated"), V = R = e.pageY, z = X = e.pageX, D = !0}function Z(e){if (D === !0){X = e.pageX, R = e.pageY, j = X - z, W = R - V; var o = Math.abs(j), t = Math.abs(W); o > t && 100 >= o && (e.preventDefault(), r.css("margin-left", j))}}function F(e){if (D === !0){D = !1; var o = O, t = !1; Y = X - z, 0 > Y && _ === !0 && (o = w, t = !0), Y > 0 && P === !0 && (o = C, t = !0), Math.abs(Y) >= q && t === !0?A(o):r.css({"margin-left":0, "margin-right":0})}}function G(){e.ajax({url:d, cache:!1}).done(function(e){r.html('<div class="vbox-inline">' + e + "</div>"), te()}).fail(function(){r.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'), ae()})}function J(){r.html('<iframe class="venoframe" src="' + d + '"></iframe>'), ae()}function K(e){var o, t = L(d), a = e?"?rel=0&autoplay=1":"?rel=0", i = a + ee(d); "vimeo" == t.type?o = "https://player.vimeo.com/video/":"youtube" == t.type && (o = "https://www.youtube.com/embed/"), r.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" src="' + o + t.id + i + '"></iframe>'), ae()}function L(e){if (e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), RegExp.$3.indexOf("youtu") > - 1)var o = "youtube";  else if (RegExp.$3.indexOf("vimeo") > - 1)var o = "vimeo"; return{type:o, id:RegExp.$6}}function ee(e){var o = "", t = decodeURIComponent(e), a = t.split("?"); if (void 0 !== a[1]){var i, s, n = a[1].split("&"); for (s = 0; s < n.length; s++)i = n[s].split("="), o = o + "&" + i[0] + "=" + i[1]}return encodeURI(o)}function oe(){r.html('<div class="vbox-inline">' + e(d).html() + "</div>"), ae()}function te(){N = r.find("img"), N.length?N.each(function(){e(this).one("load", function(){ae()})}):ae()}function ae(){i.html(x), r.find(">:first-child").addClass("figlio").css({width:v, height:u, padding:s, background:t}), e("img.figlio").on("dragstart", function(e){e.preventDefault()}), ie(), r.animate({opacity:"1"}, "slow", function(){})}function ie(){var o = r.outerHeight(), t = e(window).height(); f = t > o + 60?(t - o) / 2:"30px", r.css("margin-top", f), r.css("margin-bottom", f), H.cb_post_resize()}if (O = e(this), O.data("venobox"))return!0; I.VBclose = function(){S()}, O.addClass("vbox-item"), O.data("framewidth", H.framewidth), O.data("frameheight", H.frameheight), O.data("border", H.border), O.data("bgcolor", H.bgcolor), O.data("numeratio", H.numeratio), O.data("infinigall", H.infinigall), O.data("overlaycolor", H.overlayColor), O.data("titleattr", H.titleattr), O.data("venobox", !0), O.on("click", function(b){b.preventDefault(), O = e(this); var p = H.cb_pre_open(O); if (p === !1)return!1; switch (I.VBnext = function(){A(w)}, I.VBprev = function(){A(C)}, g = O.data("overlay") || O.data("overlaycolor"), v = O.data("framewidth"), u = O.data("frameheight"), o = O.data("autoplay") || H.autoplay, s = O.data("border"), t = O.data("bgcolor"), _ = !1, P = !1, m = !1, d = O.data("href") || O.attr("href"), l = O.data("css") || "", x = O.attr(O.data("titleattr")) || "", B = '<div class="vbox-preloader">', H.spinner){case"rotating-plane":B += '<div class="sk-rotating-plane"></div>'; break; case"double-bounce":B += '<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>'; break; case"wave":B += '<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>'; break; case"wandering-cubes":B += '<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>'; break; case"spinner-pulse":B += '<div class="sk-spinner sk-spinner-pulse"></div>'; break; case"three-bounce":B += '<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>'; break; case"cube-grid":B += '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>'}return B += "</div>", E = '<a class="vbox-next">' + H.htmlNext + '</a><a class="vbox-prev">' + H.htmlPrev + "</a>", M = '<div class="vbox-title"></div><div class="vbox-num">0/0</div><div class="vbox-close">' + H.htmlClose + "</div>", n = '<div class="vbox-overlay ' + l + '" style="background:' + g + '">' + B + '<div class="vbox-container"><div class="vbox-content"></div></div>' + M + E + "</div>", e("body").append(n).addClass("vbox-open"), e(".vbox-preloader .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader .sk-cube, .vbox-preloader .sk-spinner-pulse").css("background-color", H.spinColor), k = e(".vbox-overlay"), c = e(".vbox-container"), r = e(".vbox-content"), a = e(".vbox-num"), i = e(".vbox-title"), i.css(H.titlePosition, "-1px"), i.css({color:H.titleColor, "background-color":H.titleBackground}), e(".vbox-close").css({color:H.closeColor, "background-color":H.closeBackground}), e(".vbox-num").css(H.numerationPosition, "-1px"), e(".vbox-num").css({color:H.numerationColor, "background-color":H.numerationBackground}), e(".vbox-next span, .vbox-prev span").css({"border-top-color":H.arrowsColor, "border-right-color":H.arrowsColor}), r.html(""), r.css("opacity", "0"), k.css("opacity", "0"), $(), k.animate({opacity:1}, 250, function(){"iframe" == O.data("vbtype")?J():"inline" == O.data("vbtype")?oe():"ajax" == O.data("vbtype")?G():"video" == O.data("vbtype") || "vimeo" == O.data("vbtype") || "youtube" == O.data("vbtype")?K(o):(r.html('<img src="' + d + '">'), te()), H.cb_post_open(O, U, w, C)}), e("body").keydown(Q), e(".vbox-prev").on("click", function(){A(C)}), e(".vbox-next").on("click", function(){A(w)}), !1}); var se = ".vbox-overlay"; H.overlayClose || (se = ".vbox-close"), e(document).on("click", se, function(o){(e(o.target).is(".vbox-overlay") || e(o.target).is(".vbox-content") || e(o.target).is(".vbox-close") || e(o.target).is(".vbox-preloader")) && S()}), z = 0, X = 0, Y = 0, q = 50, D = !1; var ne = {DOWN:"touchmousedown", UP:"touchmouseup", MOVE:"touchmousemove"}, ce = function(o){var t; switch (o.type){case"mousedown":t = ne.DOWN; break; case"mouseup":t = ne.UP; break; case"mouseout":t = ne.UP; break; case"mousemove":t = ne.MOVE; break; default:return}var a = de(t, o, o.pageX, o.pageY); e(o.target).trigger(a)}, re = function(o){var t; switch (o.type){case"touchstart":t = ne.DOWN; break; case"touchend":t = ne.UP; break; case"touchmove":t = ne.MOVE; break; default:return}var a, i = o.originalEvent.touches[0]; a = t == ne.UP?de(t, o, null, null):de(t, o, i.pageX, i.pageY), e(o.target).trigger(a)}, de = function(o, t, a, i){return e.Event(o, {pageX:a, pageY:i, originalEvent:t})}; "ontouchstart"in window?(e(document).on("touchstart", re), e(document).on("touchmove", re), e(document).on("touchend", re)):(e(document).on("mousedown", ce), e(document).on("mouseup", ce), e(document).on("mouseout", ce), e(document).on("mousemove", ce)), e(window).resize(function(){e(".vbox-content").length && setTimeout(ie(), 800)})})}})}(jQuery);
                                /* --------------------------------------- Magnific Popup ----------------------------------- */
                                /*! Magnific Popup - v1.1.0 - 2016-02-20
                                 * http://dimsemenov.com/plugins/magnific-popup/
                                 * Copyright (c) 2016 Dmitry Semenov; */
                                !function(a){"function" == typeof define && define.amd?define(["jquery"], a):a("object" == typeof exports?require("jquery"):window.jQuery || window.Zepto)}(function(a){var b, c, d, e, f, g, h = "Close", i = "BeforeClose", j = "AfterClose", k = "BeforeAppend", l = "MarkupParse", m = "Open", n = "Change", o = "mfp", p = "." + o, q = "mfp-ready", r = "mfp-removing", s = "mfp-prevent-close", t = function(){}, u = !!window.jQuery, v = a(window), w = function(a, c){b.ev.on(o + a + p, c)}, x = function(b, c, d, e){var f = document.createElement("div"); return f.className = "mfp-" + b, d && (f.innerHTML = d), e?c && c.appendChild(f):(f = a(f), c && f.appendTo(c)), f}, y = function(c, d){b.ev.triggerHandler(o + c, d), b.st.callbacks && (c = c.charAt(0).toLowerCase() + c.slice(1), b.st.callbacks[c] && b.st.callbacks[c].apply(b, a.isArray(d)?d:[d]))}, z = function(c){return c === g && b.currTemplate.closeBtn || (b.currTemplate.closeBtn = a(b.st.closeMarkup.replace("%title%", b.st.tClose)), g = c), b.currTemplate.closeBtn}, A = function(){a.magnificPopup.instance || (b = new t, b.init(), a.magnificPopup.instance = b)}, B = function(){var a = document.createElement("p").style, b = ["ms", "O", "Moz", "Webkit"]; if (void 0 !== a.transition)return!0; for (; b.length; )if (b.pop() + "Transition"in a)return!0; return!1}; t.prototype = {constructor:t, init:function(){var c = navigator.appVersion; b.isLowIE = b.isIE8 = document.all && !document.addEventListener, b.isAndroid = /android/gi.test(c), b.isIOS = /iphone|ipad|ipod/gi.test(c), b.supportsTransition = B(), b.probablyMobile = b.isAndroid || b.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent), d = a(document), b.popupsCache = {}}, open:function(c){var e; if (c.isObj === !1){b.items = c.items.toArray(), b.index = 0; var g, h = c.items; for (e = 0; e < h.length; e++)if (g = h[e], g.parsed && (g = g.el[0]), g === c.el[0]){b.index = e; break}} else b.items = a.isArray(c.items)?c.items:[c.items], b.index = c.index || 0; if (b.isOpen)return void b.updateItemHTML(); b.types = [], f = "", c.mainEl && c.mainEl.length?b.ev = c.mainEl.eq(0):b.ev = d, c.key?(b.popupsCache[c.key] || (b.popupsCache[c.key] = {}), b.currTemplate = b.popupsCache[c.key]):b.currTemplate = {}, b.st = a.extend(!0, {}, a.magnificPopup.defaults, c), b.fixedContentPos = "auto" === b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos, b.st.modal && (b.st.closeOnContentClick = !1, b.st.closeOnBgClick = !1, b.st.showCloseBtn = !1, b.st.enableEscapeKey = !1), b.bgOverlay || (b.bgOverlay = x("bg").on("click" + p, function(){b.close()}), b.wrap = x("wrap").attr("tabindex", - 1).on("click" + p, function(a){b._checkIfClose(a.target) && b.close()}), b.container = x("container", b.wrap)), b.contentContainer = x("content"), b.st.preloader && (b.preloader = x("preloader", b.container, b.st.tLoading)); var i = a.magnificPopup.modules; for (e = 0; e < i.length; e++){var j = i[e]; j = j.charAt(0).toUpperCase() + j.slice(1), b["init" + j].call(b)}y("BeforeOpen"), b.st.showCloseBtn && (b.st.closeBtnInside?(w(l, function(a, b, c, d){c.close_replaceWith = z(d.type)}), f += " mfp-close-btn-in"):b.wrap.append(z())), b.st.alignTop && (f += " mfp-align-top"), b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY, overflowX:"hidden", overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(), position:"absolute"}), (b.st.fixedBgPos === !1 || "auto" === b.st.fixedBgPos && !b.fixedContentPos) && b.bgOverlay.css({height:d.height(), position:"absolute"}), b.st.enableEscapeKey && d.on("keyup" + p, function(a){27 === a.keyCode && b.close()}), v.on("resize" + p, function(){b.updateSize()}), b.st.closeOnContentClick || (f += " mfp-auto-cursor"), f && b.wrap.addClass(f); var k = b.wH = v.height(), n = {}; if (b.fixedContentPos && b._hasScrollBar(k)){var o = b._getScrollbarSize(); o && (n.marginRight = o)}b.fixedContentPos && (b.isIE7?a("body, html").css("overflow", "hidden"):n.overflow = "hidden"); var r = b.st.mainClass; return b.isIE7 && (r += " mfp-ie7"), r && b._addClassToMFP(r), b.updateItemHTML(), y("BuildControls"), a("html").css(n), b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo || a(document.body)), b._lastFocusedEl = document.activeElement, setTimeout(function(){b.content?(b._addClassToMFP(q), b._setFocus()):b.bgOverlay.addClass(q), d.on("focusin" + p, b._onFocusIn)}, 16), b.isOpen = !0, b.updateSize(k), y(m), c}, close:function(){b.isOpen && (y(i), b.isOpen = !1, b.st.removalDelay && !b.isLowIE && b.supportsTransition?(b._addClassToMFP(r), setTimeout(function(){b._close()}, b.st.removalDelay)):b._close())}, _close:function(){y(h); var c = r + " " + q + " "; if (b.bgOverlay.detach(), b.wrap.detach(), b.container.empty(), b.st.mainClass && (c += b.st.mainClass + " "), b._removeClassFromMFP(c), b.fixedContentPos){var e = {marginRight:""}; b.isIE7?a("body, html").css("overflow", ""):e.overflow = "", a("html").css(e)}d.off("keyup" + p + " focusin" + p), b.ev.off(p), b.wrap.attr("class", "mfp-wrap").removeAttr("style"), b.bgOverlay.attr("class", "mfp-bg"), b.container.attr("class", "mfp-container"), !b.st.showCloseBtn || b.st.closeBtnInside && b.currTemplate[b.currItem.type] !== !0 || b.currTemplate.closeBtn && b.currTemplate.closeBtn.detach(), b.st.autoFocusLast && b._lastFocusedEl && a(b._lastFocusedEl).focus(), b.currItem = null, b.content = null, b.currTemplate = null, b.prevHeight = 0, y(j)}, updateSize:function(a){if (b.isIOS){var c = document.documentElement.clientWidth / window.innerWidth, d = window.innerHeight * c; b.wrap.css("height", d), b.wH = d} else b.wH = a || v.height(); b.fixedContentPos || b.wrap.css("height", b.wH), y("Resize")}, updateItemHTML:function(){var c = b.items[b.index]; b.contentContainer.detach(), b.content && b.content.detach(), c.parsed || (c = b.parseEl(b.index)); var d = c.type; if (y("BeforeChange", [b.currItem?b.currItem.type:"", d]), b.currItem = c, !b.currTemplate[d]){var f = b.st[d]?b.st[d].markup:!1; y("FirstMarkupParse", f), f?b.currTemplate[d] = a(f):b.currTemplate[d] = !0}e && e !== c.type && b.container.removeClass("mfp-" + e + "-holder"); var g = b["get" + d.charAt(0).toUpperCase() + d.slice(1)](c, b.currTemplate[d]); b.appendContent(g, d), c.preloaded = !0, y(n, c), e = c.type, b.container.prepend(b.contentContainer), y("AfterChange")}, appendContent:function(a, c){b.content = a, a?b.st.showCloseBtn && b.st.closeBtnInside && b.currTemplate[c] === !0?b.content.find(".mfp-close").length || b.content.append(z()):b.content = a:b.content = "", y(k), b.container.addClass("mfp-" + c + "-holder"), b.contentContainer.append(b.content)}, parseEl:function(c){var d, e = b.items[c]; if (e.tagName?e = {el:a(e)}:(d = e.type, e = {data:e, src:e.src}), e.el){for (var f = b.types, g = 0; g < f.length; g++)if (e.el.hasClass("mfp-" + f[g])){d = f[g]; break}e.src = e.el.attr("data-mfp-src"), e.src || (e.src = e.el.attr("href"))}return e.type = d || b.st.type || "inline", e.index = c, e.parsed = !0, b.items[c] = e, y("ElementParse", e), b.items[c]}, addGroup:function(a, c){var d = function(d){d.mfpEl = this, b._openClick(d, a, c)}; c || (c = {}); var e = "click.magnificPopup"; c.mainEl = a, c.items?(c.isObj = !0, a.off(e).on(e, d)):(c.isObj = !1, c.delegate?a.off(e).on(e, c.delegate, d):(c.items = a, a.off(e).on(e, d)))}, _openClick:function(c, d, e){var f = void 0 !== e.midClick?e.midClick:a.magnificPopup.defaults.midClick; if (f || !(2 === c.which || c.ctrlKey || c.metaKey || c.altKey || c.shiftKey)){var g = void 0 !== e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn; if (g)if (a.isFunction(g)){if (!g.call(b))return!0} else if (v.width() < g)return!0; c.type && (c.preventDefault(), b.isOpen && c.stopPropagation()), e.el = a(c.mfpEl), e.delegate && (e.items = d.find(e.delegate)), b.open(e)}}, updateStatus:function(a, d){if (b.preloader){c !== a && b.container.removeClass("mfp-s-" + c), d || "loading" !== a || (d = b.st.tLoading); var e = {status:a, text:d}; y("UpdateStatus", e), a = e.status, d = e.text, b.preloader.html(d), b.preloader.find("a").on("click", function(a){a.stopImmediatePropagation()}), b.container.addClass("mfp-s-" + a), c = a}}, _checkIfClose:function(c){if (!a(c).hasClass(s)){var d = b.st.closeOnContentClick, e = b.st.closeOnBgClick; if (d && e)return!0; if (!b.content || a(c).hasClass("mfp-close") || b.preloader && c === b.preloader[0])return!0; if (c === b.content[0] || a.contains(b.content[0], c)){if (d)return!0} else if (e && a.contains(document, c))return!0; return!1}}, _addClassToMFP:function(a){b.bgOverlay.addClass(a), b.wrap.addClass(a)}, _removeClassFromMFP:function(a){this.bgOverlay.removeClass(a), b.wrap.removeClass(a)}, _hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight) > (a || v.height())}, _setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()}, _onFocusIn:function(c){return c.target === b.wrap[0] || a.contains(b.wrap[0], c.target)?void 0:(b._setFocus(), !1)}, _parseMarkup:function(b, c, d){var e; d.data && (c = a.extend(d.data, c)), y(l, [b, c, d]), a.each(c, function(c, d){if (void 0 === d || d === !1)return!0; if (e = c.split("_"), e.length > 1){var f = b.find(p + "-" + e[0]); if (f.length > 0){var g = e[1]; "replaceWith" === g?f[0] !== d[0] && f.replaceWith(d):"img" === g?f.is("img")?f.attr("src", d):f.replaceWith(a("<img>").attr("src", d).attr("class", f.attr("class"))):f.attr(e[1], d)}} else b.find(p + "-" + c).html(d)})}, _getScrollbarSize:function(){if (void 0 === b.scrollbarSize){var a = document.createElement("div"); a.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;", document.body.appendChild(a), b.scrollbarSize = a.offsetWidth - a.clientWidth, document.body.removeChild(a)}return b.scrollbarSize}}, a.magnificPopup = {instance:null, proto:t.prototype, modules:[], open:function(b, c){return A(), b = b?a.extend(!0, {}, b):{}, b.isObj = !0, b.index = c || 0, this.instance.open(b)}, close:function(){return a.magnificPopup.instance && a.magnificPopup.instance.close()}, registerModule:function(b, c){c.options && (a.magnificPopup.defaults[b] = c.options), a.extend(this.proto, c.proto), this.modules.push(b)}, defaults:{disableOn:0, key:null, midClick:!1, mainClass:"", preloader:!0, focus:"", closeOnContentClick:!1, closeOnBgClick:!0, closeBtnInside:!0, showCloseBtn:!0, enableEscapeKey:!0, modal:!1, alignTop:!1, removalDelay:0, prependTo:null, fixedContentPos:"auto", fixedBgPos:"auto", overflowY:"auto", closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>', tClose:"Close (Esc)", tLoading:"Loading...", autoFocusLast:!0}}, a.fn.magnificPopup = function(c){A(); var d = a(this); if ("string" == typeof c)if ("open" === c){var e, f = u?d.data("magnificPopup"):d[0].magnificPopup, g = parseInt(arguments[1], 10) || 0; f.items?e = f.items[g]:(e = d, f.delegate && (e = e.find(f.delegate)), e = e.eq(g)), b._openClick({mfpEl:e}, d, f)} else b.isOpen && b[c].apply(b, Array.prototype.slice.call(arguments, 1));  else c = a.extend(!0, {}, c), u?d.data("magnificPopup", c):d[0].magnificPopup = c, b.addGroup(d, c); return d}; var C, D, E, F = "inline", G = function(){E && (D.after(E.addClass(C)).detach(), E = null)}; a.magnificPopup.registerModule(F, {options:{hiddenClass:"hide", markup:"", tNotFound:"Content not found"}, proto:{initInline:function(){b.types.push(F), w(h + "." + F, function(){G()})}, getInline:function(c, d){if (G(), c.src){var e = b.st.inline, f = a(c.src); if (f.length){var g = f[0].parentNode; g && g.tagName && (D || (C = e.hiddenClass, D = x(C), C = "mfp-" + C), E = f.after(D).detach().removeClass(C)), b.updateStatus("ready")} else b.updateStatus("error", e.tNotFound), f = a("<div>"); return c.inlineElement = f, f}return b.updateStatus("ready"), b._parseMarkup(d, {}, c), d}}}); var H, I = "ajax", J = function(){H && a(document.body).removeClass(H)}, K = function(){J(), b.req && b.req.abort()}; a.magnificPopup.registerModule(I, {options:{settings:null, cursor:"mfp-ajax-cur", tError:'<a href="%url%">The content</a> could not be loaded.'}, proto:{initAjax:function(){b.types.push(I), H = b.st.ajax.cursor, w(h + "." + I, K), w("BeforeChange." + I, K)}, getAjax:function(c){H && a(document.body).addClass(H), b.updateStatus("loading"); var d = a.extend({url:c.src, success:function(d, e, f){var g = {data:d, xhr:f}; y("ParseAjax", g), b.appendContent(a(g.data), I), c.finished = !0, J(), b._setFocus(), setTimeout(function(){b.wrap.addClass(q)}, 16), b.updateStatus("ready"), y("AjaxContentAdded")}, error:function(){J(), c.finished = c.loadError = !0, b.updateStatus("error", b.st.ajax.tError.replace("%url%", c.src))}}, b.st.ajax.settings); return b.req = a.ajax(d), ""}}}); var L, M = function(c){if (c.data && void 0 !== c.data.title)return c.data.title; var d = b.st.image.titleSrc; if (d){if (a.isFunction(d))return d.call(b, c); if (c.el)return c.el.attr(d) || ""}return""}; a.magnificPopup.registerModule("image", {options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>', cursor:"mfp-zoom-out-cur", titleSrc:"title", verticalFit:!0, tError:'<a href="%url%">The image</a> could not be loaded.'}, proto:{initImage:function(){var c = b.st.image, d = ".image"; b.types.push("image"), w(m + d, function(){"image" === b.currItem.type && c.cursor && a(document.body).addClass(c.cursor)}), w(h + d, function(){c.cursor && a(document.body).removeClass(c.cursor), v.off("resize" + p)}), w("Resize" + d, b.resizeImage), b.isLowIE && w("AfterChange", b.resizeImage)}, resizeImage:function(){var a = b.currItem; if (a && a.img && b.st.image.verticalFit){var c = 0; b.isLowIE && (c = parseInt(a.img.css("padding-top"), 10) + parseInt(a.img.css("padding-bottom"), 10)), a.img.css("max-height", b.wH - c)}}, _onImageHasSize:function(a){a.img && (a.hasSize = !0, L && clearInterval(L), a.isCheckingImgSize = !1, y("ImageHasSize", a), a.imgHidden && (b.content && b.content.removeClass("mfp-loading"), a.imgHidden = !1))}, findImageSize:function(a){var c = 0, d = a.img[0], e = function(f){L && clearInterval(L), L = setInterval(function(){return d.naturalWidth > 0?void b._onImageHasSize(a):(c > 200 && clearInterval(L), c++, void(3 === c?e(10):40 === c?e(50):100 === c && e(500)))}, f)}; e(1)}, getImage:function(c, d){var e = 0, f = function(){c && (c.img[0].complete?(c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("ready")), c.hasSize = !0, c.loaded = !0, y("ImageLoadComplete")):(e++, 200 > e?setTimeout(f, 100):g()))}, g = function(){c && (c.img.off(".mfploader"), c === b.currItem && (b._onImageHasSize(c), b.updateStatus("error", h.tError.replace("%url%", c.src))), c.hasSize = !0, c.loaded = !0, c.loadError = !0)}, h = b.st.image, i = d.find(".mfp-img"); if (i.length){var j = document.createElement("img"); j.className = "mfp-img", c.el && c.el.find("img").length && (j.alt = c.el.find("img").attr("alt")), c.img = a(j).on("load.mfploader", f).on("error.mfploader", g), j.src = c.src, i.is("img") && (c.img = c.img.clone()), j = c.img[0], j.naturalWidth > 0?c.hasSize = !0:j.width || (c.hasSize = !1)}return b._parseMarkup(d, {title:M(c), img_replaceWith:c.img}, c), b.resizeImage(), c.hasSize?(L && clearInterval(L), c.loadError?(d.addClass("mfp-loading"), b.updateStatus("error", h.tError.replace("%url%", c.src))):(d.removeClass("mfp-loading"), b.updateStatus("ready")), d):(b.updateStatus("loading"), c.loading = !0, c.hasSize || (c.imgHidden = !0, d.addClass("mfp-loading"), b.findImageSize(c)), d)}}}); var N, O = function(){return void 0 === N && (N = void 0 !== document.createElement("p").style.MozTransform), N}; a.magnificPopup.registerModule("zoom", {options:{enabled:!1, easing:"ease-in-out", duration:300, opener:function(a){return a.is("img")?a:a.find("img")}}, proto:{initZoom:function(){var a, c = b.st.zoom, d = ".zoom"; if (c.enabled && b.supportsTransition){var e, f, g = c.duration, j = function(a){var b = a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"), d = "all " + c.duration / 1e3 + "s " + c.easing, e = {position:"fixed", zIndex:9999, left:0, top:0, "-webkit-backface-visibility":"hidden"}, f = "transition"; return e["-webkit-" + f] = e["-moz-" + f] = e["-o-" + f] = e[f] = d, b.css(e), b}, k = function(){b.content.css("visibility", "visible")}; w("BuildControls" + d, function(){if (b._allowZoom()){if (clearTimeout(e), b.content.css("visibility", "hidden"), a = b._getItemToZoom(), !a)return void k(); f = j(a), f.css(b._getOffset()), b.wrap.append(f), e = setTimeout(function(){f.css(b._getOffset(!0)), e = setTimeout(function(){k(), setTimeout(function(){f.remove(), a = f = null, y("ZoomAnimationEnded")}, 16)}, g)}, 16)}}), w(i + d, function(){if (b._allowZoom()){if (clearTimeout(e), b.st.removalDelay = g, !a){if (a = b._getItemToZoom(), !a)return; f = j(a)}f.css(b._getOffset(!0)), b.wrap.append(f), b.content.css("visibility", "hidden"), setTimeout(function(){f.css(b._getOffset())}, 16)}}), w(h + d, function(){b._allowZoom() && (k(), f && f.remove(), a = null)})}}, _allowZoom:function(){return"image" === b.currItem.type}, _getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1}, _getOffset:function(c){var d; d = c?b.currItem.img:b.st.zoom.opener(b.currItem.el || b.currItem); var e = d.offset(), f = parseInt(d.css("padding-top"), 10), g = parseInt(d.css("padding-bottom"), 10); e.top -= a(window).scrollTop() - f; var h = {width:d.width(), height:(u?d.innerHeight():d[0].offsetHeight) - g - f}; return O()?h["-moz-transform"] = h.transform = "translate(" + e.left + "px," + e.top + "px)":(h.left = e.left, h.top = e.top), h}}}); var P = "iframe", Q = "//about:blank", R = function(a){if (b.currTemplate[P]){var c = b.currTemplate[P].find("iframe"); c.length && (a || (c[0].src = Q), b.isIE8 && c.css("display", a?"block":"none"))}}; a.magnificPopup.registerModule(P, {options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>', srcAction:"iframe_src", patterns:{youtube:{index:"youtube.com", id:"v=", src:"//www.youtube.com/embed/%id%?autoplay=1"}, vimeo:{index:"vimeo.com/", id:"/", src:"//player.vimeo.com/video/%id%?autoplay=1"}, gmaps:{index:"//maps.google.", src:"%id%&output=embed"}}}, proto:{initIframe:function(){b.types.push(P), w("BeforeChange", function(a, b, c){b !== c && (b === P?R():c === P && R(!0))}), w(h + "." + P, function(){R()})}, getIframe:function(c, d){var e = c.src, f = b.st.iframe; a.each(f.patterns, function(){return e.indexOf(this.index) > - 1?(this.id && (e = "string" == typeof this.id?e.substr(e.lastIndexOf(this.id) + this.id.length, e.length):this.id.call(this, e)), e = this.src.replace("%id%", e), !1):void 0}); var g = {}; return f.srcAction && (g[f.srcAction] = e), b._parseMarkup(d, g, c), b.updateStatus("ready"), d}}}); var S = function(a){var c = b.items.length; return a > c - 1?a - c:0 > a?c + a:a}, T = function(a, b, c){return a.replace(/%curr%/gi, b + 1).replace(/%total%/gi, c)}; a.magnificPopup.registerModule("gallery", {options:{enabled:!1, arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', preload:[0, 2], navigateByImgClick:!0, arrows:!0, tPrev:"Previous (Left arrow key)", tNext:"Next (Right arrow key)", tCounter:"%curr% of %total%"}, proto:{initGallery:function(){var c = b.st.gallery, e = ".mfp-gallery"; return b.direction = !0, c && c.enabled?(f += " mfp-gallery", w(m + e, function(){c.navigateByImgClick && b.wrap.on("click" + e, ".mfp-img", function(){return b.items.length > 1?(b.next(), !1):void 0}), d.on("keydown" + e, function(a){37 === a.keyCode?b.prev():39 === a.keyCode && b.next()})}), w("UpdateStatus" + e, function(a, c){c.text && (c.text = T(c.text, b.currItem.index, b.items.length))}), w(l + e, function(a, d, e, f){var g = b.items.length; e.counter = g > 1?T(c.tCounter, f.index, g):""}), w("BuildControls" + e, function(){if (b.items.length > 1 && c.arrows && !b.arrowLeft){var d = c.arrowMarkup, e = b.arrowLeft = a(d.replace(/%title%/gi, c.tPrev).replace(/%dir%/gi, "left")).addClass(s), f = b.arrowRight = a(d.replace(/%title%/gi, c.tNext).replace(/%dir%/gi, "right")).addClass(s); e.click(function(){b.prev()}), f.click(function(){b.next()}), b.container.append(e.add(f))}}), w(n + e, function(){b._preloadTimeout && clearTimeout(b._preloadTimeout), b._preloadTimeout = setTimeout(function(){b.preloadNearbyImages(), b._preloadTimeout = null}, 16)}), void w(h + e, function(){d.off(e), b.wrap.off("click" + e), b.arrowRight = b.arrowLeft = null})):!1}, next:function(){b.direction = !0, b.index = S(b.index + 1), b.updateItemHTML()}, prev:function(){b.direction = !1, b.index = S(b.index - 1), b.updateItemHTML()}, goTo:function(a){b.direction = a >= b.index, b.index = a, b.updateItemHTML()}, preloadNearbyImages:function(){var a, c = b.st.gallery.preload, d = Math.min(c[0], b.items.length), e = Math.min(c[1], b.items.length); for (a = 1; a <= (b.direction?e:d); a++)b._preloadItem(b.index + a); for (a = 1; a <= (b.direction?d:e); a++)b._preloadItem(b.index - a)}, _preloadItem:function(c){if (c = S(c), !b.items[c].preloaded){var d = b.items[c]; d.parsed || (d = b.parseEl(c)), y("LazyLoad", d), "image" === d.type && (d.img = a('<img class="mfp-img" />').on("load.mfploader", function(){d.hasSize = !0}).on("error.mfploader", function(){d.hasSize = !0, d.loadError = !0, y("LazyLoadError", d)}).attr("src", d.src)), d.preloaded = !0}}}}); var U = "retina"; a.magnificPopup.registerModule(U, {options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/, function(a){return"@2x" + a})}, ratio:1}, proto:{initRetina:function(){if (window.devicePixelRatio > 1){var a = b.st.retina, c = a.ratio; c = isNaN(c)?c():c, c > 1 && (w("ImageHasSize." + U, function(a, b){b.img.css({"max-width":b.img[0].naturalWidth / c, width:"100%"})}), w("ElementParse." + U, function(b, d){d.src = a.replaceSrc(d, c)}))}}}}), A()});
                                /* ---------------------------------------- Rateyo --------------------------- */
                                /*rateYo V2.3.2, A simple and flexible star rating plugin
                                 prashanth pamidi (https://github.com/prrashi)*/
                                !function(a){"use strict"; function b(){var a = !1; return function(b){(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(b) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(b.substr(0, 4))) && (a = !0)}(navigator.userAgent || navigator.vendor || window.opera), a}function c(a, b, c){return a === b?a = b:a === c && (a = c), a}function d(a, b, c){if (!(a >= b && a <= c))throw Error("Invalid Rating, expected value between " + b + " and " + c); return a}function e(a){return void 0 !== a}function f(a, b, c){var d = c / 100 * (b - a); return d = Math.round(a + d).toString(16), 1 === d.length && (d = "0" + d), d}function g(a, b, c){if (!a || !b)return null; c = e(c)?c:0, a = q(a), b = q(b); var d = f(a.r, b.r, c), g = f(a.b, b.b, c); return"#" + d + f(a.g, b.g, c) + g}function h(f, i){function k(a){e(a) || (a = i.rating), Z = a; var b = a / P, c = b * R; b > 1 && (c += (Math.ceil(b) - 1) * T), r(i.ratedFill), c = i.rtl?100 - c:c, c < 0?c = 0:c > 100 && (c = 100), X.css("width", c + "%")}function l(){U = Q * i.numStars + S * (i.numStars - 1), R = Q / U * 100, T = S / U * 100, f.width(U), k()}function n(a){var b = i.starWidth = a; return Q = window.parseFloat(i.starWidth.replace("px", "")), W.find("svg").attr({width:i.starWidth, height:b}), X.find("svg").attr({width:i.starWidth, height:b}), l(), f}function p(a){return i.spacing = a, S = parseFloat(i.spacing.replace("px", "")), W.find("svg:not(:first-child)").css({"margin-left":a}), X.find("svg:not(:first-child)").css({"margin-left":a}), l(), f}function q(a){return i.normalFill = a, (i.rtl?X:W).find("svg").attr({fill:i.normalFill}), f}function r(a){if (i.multiColor){var b = Z - Y, c = b / i.maxValue * 100, d = i.multiColor || {}; a = g(d.startColor || o.startColor, d.endColor || o.endColor, c)} else _ = a; return i.ratedFill = a, (i.rtl?W:X).find("svg").attr({fill:i.ratedFill}), f}function s(a){a = !!a, i.rtl = a, q(i.normalFill), k()}function t(a){i.multiColor = a, r(a?a:_)}function u(b){i.numStars = b, P = i.maxValue / i.numStars, W.empty(), X.empty(); for (var c = 0; c < i.numStars; c++)W.append(a(i.starSvg || m)), X.append(a(i.starSvg || m)); return n(i.starWidth), q(i.normalFill), p(i.spacing), k(), f}function v(a){return i.maxValue = a, P = i.maxValue / i.numStars, i.rating > a && C(a), k(), f}function w(a){return i.precision = a, C(i.rating), f}function x(a){return i.halfStar = a, f}function y(a){return i.fullStar = a, f}function z(a){var b = a % P, c = P / 2, d = i.halfStar, e = i.fullStar; return e || d?(e || d && b > c?a += P - b:(a -= b, b > 0 && (a += c)), a):a}function A(a){var b = W.offset(), c = b.left, d = c + W.width(), e = i.maxValue, f = a.pageX, g = 0; if (f < c)g = Y;  else if (f > d)g = e;  else{var h = (f - c) / (d - c); if (S > 0){h *= 100; for (var j = h; j > 0; )j > R?(g += P, j -= R + T):(g += j / R * P, j = 0)} else g = h * i.maxValue; g = z(g)}return i.rtl && (g = e - g), parseFloat(g)}function B(a){return i.readOnly = a, f.attr("readonly", !0), N(), a || (f.removeAttr("readonly"), M()), f}function C(a){var b = a, e = i.maxValue; return"string" == typeof b && ("%" === b[b.length - 1] && (b = b.substr(0, b.length - 1), e = 100, v(e)), b = parseFloat(b)), d(b, Y, e), b = parseFloat(b.toFixed(i.precision)), c(parseFloat(b), Y, e), i.rating = b, k(), $ && f.trigger("rateyo.set", {rating:b}), f}function D(a){return i.onInit = a, f}function E(a){return i.onSet = a, f}function F(a){return i.onChange = a, f}function G(a){var b = A(a).toFixed(i.precision), d = i.maxValue; b = c(parseFloat(b), Y, d), k(b), f.trigger("rateyo.change", {rating:b})}function H(){b() || (k(), f.trigger("rateyo.change", {rating:i.rating}))}function I(a){var b = A(a).toFixed(i.precision); b = parseFloat(b), O.rating(b)}function J(a, b){i.onInit && "function" == typeof i.onInit && i.onInit.apply(this, [b.rating, O])}function K(a, b){i.onChange && "function" == typeof i.onChange && i.onChange.apply(this, [b.rating, O])}function L(a, b){i.onSet && "function" == typeof i.onSet && i.onSet.apply(this, [b.rating, O])}function M(){f.on("mousemove", G).on("mouseenter", G).on("mouseleave", H).on("click", I).on("rateyo.init", J).on("rateyo.change", K).on("rateyo.set", L)}function N(){f.off("mousemove", G).off("mouseenter", G).off("mouseleave", H).off("click", I).off("rateyo.init", J).off("rateyo.change", K).off("rateyo.set", L)}this.node = f.get(0); var O = this; f.empty().addClass("jq-ry-container"); var P, Q, R, S, T, U, V = a("<div/>").addClass("jq-ry-group-wrapper").appendTo(f), W = a("<div/>").addClass("jq-ry-normal-group").addClass("jq-ry-group").appendTo(V), X = a("<div/>").addClass("jq-ry-rated-group").addClass("jq-ry-group").appendTo(V), Y = 0, Z = i.rating, $ = !1, _ = i.ratedFill; this.rating = function(a){return e(a)?(C(a), f):i.rating}, this.destroy = function(){return i.readOnly || N(), h.prototype.collection = j(f.get(0), this.collection), f.removeClass("jq-ry-container").children().remove(), f}, this.method = function(a){if (!a)throw Error("Method name not specified!"); if (!e(this[a]))throw Error("Method " + a + " doesn't exist!"); var b = Array.prototype.slice.apply(arguments, []), c = b.slice(1); return this[a].apply(this, c)}, this.option = function(a, b){if (!e(a))return i; var c; switch (a){case"starWidth":c = n; break; case"numStars":c = u; break; case"normalFill":c = q; break; case"ratedFill":c = r; break; case"multiColor":c = t; break; case"maxValue":c = v; break; case"precision":c = w; break; case"rating":c = C; break; case"halfStar":c = x; break; case"fullStar":c = y; break; case"readOnly":c = B; break; case"spacing":c = p; break; case"rtl":c = s; break; case"onInit":c = D; break; case"onSet":c = E; break; case"onChange":c = F; break; default:throw Error("No such option as " + a)}return e(b)?c(b):i[a]}, u(i.numStars), B(i.readOnly), i.rtl && s(i.rtl), this.collection.push(this), this.rating(i.rating, !0), $ = !0, f.trigger("rateyo.init", {rating:i.rating})}function i(b, c){var d; return a.each(c, function(){if (b === this.node)return d = this, !1}), d}function j(b, c){return a.each(c, function(a){if (b === this.node){var d = c.slice(0, a), e = c.slice(a + 1, c.length); return c = d.concat(e), !1}}), c}function k(b){var c = h.prototype.collection, d = a(this); if (0 === d.length)return d; var e = Array.prototype.slice.apply(arguments, []); if (0 === e.length)b = e[0] = {};  else{if (1 !== e.length || "object" != typeof e[0]){if (e.length >= 1 && "string" == typeof e[0]){var f = e[0], g = e.slice(1), j = []; return a.each(d, function(a, b){var d = i(b, c); if (!d)throw Error("Trying to set options before even initialization"); var e = d[f]; if (!e)throw Error("Method " + f + " does not exist!"); var h = e.apply(d, g); j.push(h)}), j = 1 === j.length?j[0]:j}throw Error("Invalid Arguments")}b = e[0]}return b = a.extend({}, n, b), a.each(d, function(){var d = i(this, c); if (d)return d; var e = a(this), f = {}, g = a.extend({}, b); return a.each(e.data(), function(a, b){if (0 === a.indexOf("rateyo")){var c = a.replace(/^rateyo/, ""); c = c[0].toLowerCase() + c.slice(1), f[c] = b, delete g[c]}}), new h(a(this), a.extend({}, f, g))})}function l(){return k.apply(this, Array.prototype.slice.apply(arguments, []))}var m = '<?xml version="1.0" encoding="utf-8"?><svg version="1.1"xmlns="http://www.w3.org/2000/svg"viewBox="0 12.705 512 486.59"x="0px" y="0px"xml:space="preserve"><polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "/></svg>', n = {starWidth:"32px", normalFill:"gray", ratedFill:"#f39c12", numStars:5, maxValue:5, precision:1, rating:0, fullStar:!1, halfStar:!1, readOnly:!1, spacing:"0px", rtl:!1, multiColor:null, onInit:null, onChange:null, onSet:null, starSvg:null}, o = {startColor:"#c0392b", endColor:"#f1c40f"}, p = /^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i, q = function(a){if (!p.test(a))return null; var b = p.exec(a); return{r:parseInt(b[1], 16), g:parseInt(b[2], 16), b:parseInt(b[3], 16)}}; h.prototype.collection = [], window.RateYo = h, a.fn.rateYo = l}(window.jQuery);
//# sourceMappingURL=jquery.rateyo.min.js.map


                                /* ---------------------------------------- Parallax js --------------------------- */
                                /**
                                 * Parallax.js
                                 * @author Matthew Wagerfield - @wagerfield, René Roth - mail@reneroth.org
                                 * @description Creates a parallax effect between an array of layers,
                                 *              driving the motion from the gyroscope output of a smartdevice.
                                 *              If no gyroscope is available, the cursor position is used.
                                 */

                                !function(t){if ("object" == typeof exports && "undefined" != typeof module)module.exports = t();  else if ("function" == typeof define && define.amd)define([], t);  else{("undefined" != typeof window?window:"undefined" != typeof global?global:"undefined" != typeof self?self:this).Parallax = t()}}(function(){return function t(e, i, n){function o(r, a){if (!i[r]){if (!e[r]){var l = "function" == typeof require && require; if (!a && l)return l(r, !0); if (s)return s(r, !0); var h = new Error("Cannot find module '" + r + "'"); throw h.code = "MODULE_NOT_FOUND", h}var u = i[r] = {exports:{}}; e[r][0].call(u.exports, function(t){var i = e[r][1][t]; return o(i || t)}, u, u.exports, t, e, i, n)}return i[r].exports}for (var s = "function" == typeof require && require, r = 0; r < n.length; r++)o(n[r]); return o}({1:[function(t, e, i){"use strict"; function n(t){if (null === t || void 0 === t)throw new TypeError("Object.assign cannot be called with null or undefined"); return Object(t)}var o = Object.getOwnPropertySymbols, s = Object.prototype.hasOwnProperty, r = Object.prototype.propertyIsEnumerable; e.exports = function(){try{if (!Object.assign)return!1; var t = new String("abc"); if (t[5] = "de", "5" === Object.getOwnPropertyNames(t)[0])return!1; for (var e = {}, i = 0; i < 10; i++)e["_" + String.fromCharCode(i)] = i; if ("0123456789" !== Object.getOwnPropertyNames(e).map(function(t){return e[t]}).join(""))return!1; var n = {}; return"abcdefghijklmnopqrst".split("").forEach(function(t){n[t] = t}), "abcdefghijklmnopqrst" === Object.keys(Object.assign({}, n)).join("")} catch (t){return!1}}()?Object.assign:function(t, e){for (var i, a, l = n(t), h = 1; h < arguments.length; h++){i = Object(arguments[h]); for (var u in i)s.call(i, u) && (l[u] = i[u]); if (o){a = o(i); for (var c = 0; c < a.length; c++)r.call(i, a[c]) && (l[a[c]] = i[a[c]])}}return l}}, {}], 2:[function(t, e, i){(function(t){(function(){var i, n, o, s, r, a; "undefined" != typeof performance && null !== performance && performance.now?e.exports = function(){return performance.now()}:void 0 !== t && null !== t && t.hrtime?(e.exports = function(){return(i() - r) / 1e6}, n = t.hrtime, s = (i = function(){var t; return 1e9 * (t = n())[0] + t[1]})(), a = 1e9 * t.uptime(), r = s - a):Date.now?(e.exports = function(){return Date.now() - o}, o = Date.now()):(e.exports = function(){return(new Date).getTime() - o}, o = (new Date).getTime())}).call(this)}).call(this, t("_process"))}, {_process:3}], 3:[function(t, e, i){function n(){throw new Error("setTimeout has not been defined")}function o(){throw new Error("clearTimeout has not been defined")}function s(t){if (c === setTimeout)return setTimeout(t, 0); if ((c === n || !c) && setTimeout)return c = setTimeout, setTimeout(t, 0); try{return c(t, 0)} catch (e){try{return c.call(null, t, 0)} catch (e){return c.call(this, t, 0)}}}function r(t){if (d === clearTimeout)return clearTimeout(t); if ((d === o || !d) && clearTimeout)return d = clearTimeout, clearTimeout(t); try{return d(t)} catch (e){try{return d.call(null, t)} catch (e){return d.call(this, t)}}}function a(){v && p && (v = !1, p.length?f = p.concat(f):y = - 1, f.length && l())}function l(){if (!v){var t = s(a); v = !0; for (var e = f.length; e; ){for (p = f, f = []; ++y < e; )p && p[y].run(); y = - 1, e = f.length}p = null, v = !1, r(t)}}function h(t, e){this.fun = t, this.array = e}function u(){}var c, d, m = e.exports = {}; !function(){try{c = "function" == typeof setTimeout?setTimeout:n} catch (t){c = n}try{d = "function" == typeof clearTimeout?clearTimeout:o} catch (t){d = o}}(); var p, f = [], v = !1, y = - 1; m.nextTick = function(t){var e = new Array(arguments.length - 1); if (arguments.length > 1)for (var i = 1; i < arguments.length; i++)e[i - 1] = arguments[i]; f.push(new h(t, e)), 1 !== f.length || v || s(l)}, h.prototype.run = function(){this.fun.apply(null, this.array)}, m.title = "browser", m.browser = !0, m.env = {}, m.argv = [], m.version = "", m.versions = {}, m.on = u, m.addListener = u, m.once = u, m.off = u, m.removeListener = u, m.removeAllListeners = u, m.emit = u, m.prependListener = u, m.prependOnceListener = u, m.listeners = function(t){return[]}, m.binding = function(t){throw new Error("process.binding is not supported")}, m.cwd = function(){return"/"}, m.chdir = function(t){throw new Error("process.chdir is not supported")}, m.umask = function(){return 0}}, {}], 4:[function(t, e, i){(function(i){for (var n = t("performance-now"), o = "undefined" == typeof window?i:window, s = ["moz", "webkit"], r = "AnimationFrame", a = o["request" + r], l = o["cancel" + r] || o["cancelRequest" + r], h = 0; !a && h < s.length; h++)a = o[s[h] + "Request" + r], l = o[s[h] + "Cancel" + r] || o[s[h] + "CancelRequest" + r]; if (!a || !l){var u = 0, c = 0, d = []; a = function(t){if (0 === d.length){var e = n(), i = Math.max(0, 1e3 / 60 - (e - u)); u = i + e, setTimeout(function(){var t = d.slice(0); d.length = 0; for (var e = 0; e < t.length; e++)if (!t[e].cancelled)try{t[e].callback(u)} catch (t){setTimeout(function(){throw t}, 0)}}, Math.round(i))}return d.push({handle:++c, callback:t, cancelled:!1}), c}, l = function(t){for (var e = 0; e < d.length; e++)d[e].handle === t && (d[e].cancelled = !0)}}e.exports = function(t){return a.call(o, t)}, e.exports.cancel = function(){l.apply(o, arguments)}, e.exports.polyfill = function(){o.requestAnimationFrame = a, o.cancelAnimationFrame = l}}).call(this, "undefined" != typeof global?global:"undefined" != typeof self?self:"undefined" != typeof window?window:{})}, {"performance-now":2}], 5:[function(t, e, i){"use strict"; function n(t, e){if (!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var o = function(){function t(t, e){for (var i = 0; i < e.length; i++){var n = e[i]; n.enumerable = n.enumerable || !1, n.configurable = !0, "value"in n && (n.writable = !0), Object.defineProperty(t, n.key, n)}}return function(e, i, n){return i && t(e.prototype, i), n && t(e, n), e}}(), s = t("raf"), r = t("object-assign"), a = {propertyCache:{}, vendors:[null, ["-webkit-", "webkit"], ["-moz-", "Moz"], ["-o-", "O"], ["-ms-", "ms"]], clamp:function(t, e, i){return e < i?t < e?e:t > i?i:t:t < i?i:t > e?e:t}, data:function(t, e){return a.deserialize(t.getAttribute("data-" + e))}, deserialize:function(t){return"true" === t || "false" !== t && ("null" === t?null:!isNaN(parseFloat(t)) && isFinite(t)?parseFloat(t):t)}, camelCase:function(t){return t.replace(/-+(.)?/g, function(t, e){return e?e.toUpperCase():""})}, accelerate:function(t){a.css(t, "transform", "translate3d(0,0,0) rotate(0.0001deg)"), a.css(t, "transform-style", "preserve-3d"), a.css(t, "backface-visibility", "hidden")}, transformSupport:function(t){for (var e = document.createElement("div"), i = !1, n = null, o = !1, s = null, r = null, l = 0, h = a.vendors.length; l < h; l++)if (null !== a.vendors[l]?(s = a.vendors[l][0] + "transform", r = a.vendors[l][1] + "Transform"):(s = "transform", r = "transform"), void 0 !== e.style[r]){i = !0; break}switch (t){case"2D":o = i; break; case"3D":if (i){var u = document.body || document.createElement("body"), c = document.documentElement, d = c.style.overflow, m = !1; document.body || (m = !0, c.style.overflow = "hidden", c.appendChild(u), u.style.overflow = "hidden", u.style.background = ""), u.appendChild(e), e.style[r] = "translate3d(1px,1px,1px)", o = void 0 !== (n = window.getComputedStyle(e).getPropertyValue(s)) && n.length > 0 && "none" !== n, c.style.overflow = d, u.removeChild(e), m && (u.removeAttribute("style"), u.parentNode.removeChild(u))}}return o}, css:function(t, e, i){var n = a.propertyCache[e]; if (!n)for (var o = 0, s = a.vendors.length; o < s; o++)if (n = null !== a.vendors[o]?a.camelCase(a.vendors[o][1] + "-" + e):e, void 0 !== t.style[n]){a.propertyCache[e] = n; break}t.style[n] = i}}, l = {relativeInput:!1, clipRelativeInput:!1, inputElement:null, hoverOnly:!1, calibrationThreshold:100, calibrationDelay:500, supportDelay:500, calibrateX:!1, calibrateY:!0, invertX:!0, invertY:!0, limitX:!1, limitY:!1, scalarX:10, scalarY:10, frictionX:.1, frictionY:.1, originX:.5, originY:.5, pointerEvents:!1, precision:1, onReady:null, selector:null}, h = function(){function t(e, i){n(this, t), this.element = e; var o = {calibrateX:a.data(this.element, "calibrate-x"), calibrateY:a.data(this.element, "calibrate-y"), invertX:a.data(this.element, "invert-x"), invertY:a.data(this.element, "invert-y"), limitX:a.data(this.element, "limit-x"), limitY:a.data(this.element, "limit-y"), scalarX:a.data(this.element, "scalar-x"), scalarY:a.data(this.element, "scalar-y"), frictionX:a.data(this.element, "friction-x"), frictionY:a.data(this.element, "friction-y"), originX:a.data(this.element, "origin-x"), originY:a.data(this.element, "origin-y"), pointerEvents:a.data(this.element, "pointer-events"), precision:a.data(this.element, "precision"), relativeInput:a.data(this.element, "relative-input"), clipRelativeInput:a.data(this.element, "clip-relative-input"), hoverOnly:a.data(this.element, "hover-only"), inputElement:document.querySelector(a.data(this.element, "input-element")), selector:a.data(this.element, "selector")}; for (var s in o)null === o[s] && delete o[s]; r(this, l, o, i), this.inputElement || (this.inputElement = this.element), this.calibrationTimer = null, this.calibrationFlag = !0, this.enabled = !1, this.depthsX = [], this.depthsY = [], this.raf = null, this.bounds = null, this.elementPositionX = 0, this.elementPositionY = 0, this.elementWidth = 0, this.elementHeight = 0, this.elementCenterX = 0, this.elementCenterY = 0, this.elementRangeX = 0, this.elementRangeY = 0, this.calibrationX = 0, this.calibrationY = 0, this.inputX = 0, this.inputY = 0, this.motionX = 0, this.motionY = 0, this.velocityX = 0, this.velocityY = 0, this.onMouseMove = this.onMouseMove.bind(this), this.onDeviceOrientation = this.onDeviceOrientation.bind(this), this.onDeviceMotion = this.onDeviceMotion.bind(this), this.onOrientationTimer = this.onOrientationTimer.bind(this), this.onMotionTimer = this.onMotionTimer.bind(this), this.onCalibrationTimer = this.onCalibrationTimer.bind(this), this.onAnimationFrame = this.onAnimationFrame.bind(this), this.onWindowResize = this.onWindowResize.bind(this), this.windowWidth = null, this.windowHeight = null, this.windowCenterX = null, this.windowCenterY = null, this.windowRadiusX = null, this.windowRadiusY = null, this.portrait = !1, this.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i), this.motionSupport = !!window.DeviceMotionEvent && !this.desktop, this.orientationSupport = !!window.DeviceOrientationEvent && !this.desktop, this.orientationStatus = 0, this.motionStatus = 0, this.initialise()}return o(t, [{key:"initialise", value:function(){void 0 === this.transform2DSupport && (this.transform2DSupport = a.transformSupport("2D"), this.transform3DSupport = a.transformSupport("3D")), this.transform3DSupport && a.accelerate(this.element), "static" === window.getComputedStyle(this.element).getPropertyValue("position") && (this.element.style.position = "relative"), this.pointerEvents || (this.element.style.pointerEvents = "none"), this.updateLayers(), this.updateDimensions(), this.enable(), this.queueCalibration(this.calibrationDelay)}}, {key:"doReadyCallback", value:function(){this.onReady && this.onReady()}}, {key:"updateLayers", value:function(){this.selector?this.layers = this.element.querySelectorAll(this.selector):this.layers = this.element.children, this.layers.length || console.warn("ParallaxJS: Your scene does not have any layers."), this.depthsX = [], this.depthsY = []; for (var t = 0; t < this.layers.length; t++){var e = this.layers[t]; this.transform3DSupport && a.accelerate(e), e.style.position = t?"absolute":"relative", e.style.display = "block", e.style.left = 0, e.style.top = 0; var i = a.data(e, "depth") || 0; this.depthsX.push(a.data(e, "depth-x") || i), this.depthsY.push(a.data(e, "depth-y") || i)}}}, {key:"updateDimensions", value:function(){this.windowWidth = window.innerWidth, this.windowHeight = window.innerHeight, this.windowCenterX = this.windowWidth * this.originX, this.windowCenterY = this.windowHeight * this.originY, this.windowRadiusX = Math.max(this.windowCenterX, this.windowWidth - this.windowCenterX), this.windowRadiusY = Math.max(this.windowCenterY, this.windowHeight - this.windowCenterY)}}, {key:"updateBounds", value:function(){this.bounds = this.inputElement.getBoundingClientRect(), this.elementPositionX = this.bounds.left, this.elementPositionY = this.bounds.top, this.elementWidth = this.bounds.width, this.elementHeight = this.bounds.height, this.elementCenterX = this.elementWidth * this.originX, this.elementCenterY = this.elementHeight * this.originY, this.elementRangeX = Math.max(this.elementCenterX, this.elementWidth - this.elementCenterX), this.elementRangeY = Math.max(this.elementCenterY, this.elementHeight - this.elementCenterY)}}, {key:"queueCalibration", value:function(t){clearTimeout(this.calibrationTimer), this.calibrationTimer = setTimeout(this.onCalibrationTimer, t)}}, {key:"enable", value:function(){this.enabled || (this.enabled = !0, this.orientationSupport?(this.portrait = !1, window.addEventListener("deviceorientation", this.onDeviceOrientation), this.detectionTimer = setTimeout(this.onOrientationTimer, this.supportDelay)):this.motionSupport?(this.portrait = !1, window.addEventListener("devicemotion", this.onDeviceMotion), this.detectionTimer = setTimeout(this.onMotionTimer, this.supportDelay)):(this.calibrationX = 0, this.calibrationY = 0, this.portrait = !1, window.addEventListener("mousemove", this.onMouseMove), this.doReadyCallback()), window.addEventListener("resize", this.onWindowResize), this.raf = s(this.onAnimationFrame))}}, {key:"disable", value:function(){this.enabled && (this.enabled = !1, this.orientationSupport?window.removeEventListener("deviceorientation", this.onDeviceOrientation):this.motionSupport?window.removeEventListener("devicemotion", this.onDeviceMotion):window.removeEventListener("mousemove", this.onMouseMove), window.removeEventListener("resize", this.onWindowResize), s.cancel(this.raf))}}, {key:"calibrate", value:function(t, e){this.calibrateX = void 0 === t?this.calibrateX:t, this.calibrateY = void 0 === e?this.calibrateY:e}}, {key:"invert", value:function(t, e){this.invertX = void 0 === t?this.invertX:t, this.invertY = void 0 === e?this.invertY:e}}, {key:"friction", value:function(t, e){this.frictionX = void 0 === t?this.frictionX:t, this.frictionY = void 0 === e?this.frictionY:e}}, {key:"scalar", value:function(t, e){this.scalarX = void 0 === t?this.scalarX:t, this.scalarY = void 0 === e?this.scalarY:e}}, {key:"limit", value:function(t, e){this.limitX = void 0 === t?this.limitX:t, this.limitY = void 0 === e?this.limitY:e}}, {key:"origin", value:function(t, e){this.originX = void 0 === t?this.originX:t, this.originY = void 0 === e?this.originY:e}}, {key:"setInputElement", value:function(t){this.inputElement = t, this.updateDimensions()}}, {key:"setPosition", value:function(t, e, i){e = e.toFixed(this.precision) + "px", i = i.toFixed(this.precision) + "px", this.transform3DSupport?a.css(t, "transform", "translate3d(" + e + "," + i + ",0)"):this.transform2DSupport?a.css(t, "transform", "translate(" + e + "," + i + ")"):(t.style.left = e, t.style.top = i)}}, {key:"onOrientationTimer", value:function(){this.orientationSupport && 0 === this.orientationStatus?(this.disable(), this.orientationSupport = !1, this.enable()):this.doReadyCallback()}}, {key:"onMotionTimer", value:function(){this.motionSupport && 0 === this.motionStatus?(this.disable(), this.motionSupport = !1, this.enable()):this.doReadyCallback()}}, {key:"onCalibrationTimer", value:function(){this.calibrationFlag = !0}}, {key:"onWindowResize", value:function(){this.updateDimensions()}}, {key:"onAnimationFrame", value:function(){this.updateBounds(); var t = this.inputX - this.calibrationX, e = this.inputY - this.calibrationY; (Math.abs(t) > this.calibrationThreshold || Math.abs(e) > this.calibrationThreshold) && this.queueCalibration(0), this.portrait?(this.motionX = this.calibrateX?e:this.inputY, this.motionY = this.calibrateY?t:this.inputX):(this.motionX = this.calibrateX?t:this.inputX, this.motionY = this.calibrateY?e:this.inputY), this.motionX *= this.elementWidth * (this.scalarX / 100), this.motionY *= this.elementHeight * (this.scalarY / 100), isNaN(parseFloat(this.limitX)) || (this.motionX = a.clamp(this.motionX, - this.limitX, this.limitX)), isNaN(parseFloat(this.limitY)) || (this.motionY = a.clamp(this.motionY, - this.limitY, this.limitY)), this.velocityX += (this.motionX - this.velocityX) * this.frictionX, this.velocityY += (this.motionY - this.velocityY) * this.frictionY; for (var i = 0; i < this.layers.length; i++){var n = this.layers[i], o = this.depthsX[i], r = this.depthsY[i], l = this.velocityX * (o * (this.invertX? - 1:1)), h = this.velocityY * (r * (this.invertY? - 1:1)); this.setPosition(n, l, h)}this.raf = s(this.onAnimationFrame)}}, {key:"rotate", value:function(t, e){var i = (t || 0) / 30, n = (e || 0) / 30, o = this.windowHeight > this.windowWidth; this.portrait !== o && (this.portrait = o, this.calibrationFlag = !0), this.calibrationFlag && (this.calibrationFlag = !1, this.calibrationX = i, this.calibrationY = n), this.inputX = i, this.inputY = n}}, {key:"onDeviceOrientation", value:function(t){var e = t.beta, i = t.gamma; null !== e && null !== i && (this.orientationStatus = 1, this.rotate(e, i))}}, {key:"onDeviceMotion", value:function(t){var e = t.rotationRate.beta, i = t.rotationRate.gamma; null !== e && null !== i && (this.motionStatus = 1, this.rotate(e, i))}}, {key:"onMouseMove", value:function(t){var e = t.clientX, i = t.clientY; if (this.hoverOnly && (e < this.elementPositionX || e > this.elementPositionX + this.elementWidth || i < this.elementPositionY || i > this.elementPositionY + this.elementHeight))return this.inputX = 0, void(this.inputY = 0); this.relativeInput?(this.clipRelativeInput && (e = Math.max(e, this.elementPositionX), e = Math.min(e, this.elementPositionX + this.elementWidth), i = Math.max(i, this.elementPositionY), i = Math.min(i, this.elementPositionY + this.elementHeight)), this.elementRangeX && this.elementRangeY && (this.inputX = (e - this.elementPositionX - this.elementCenterX) / this.elementRangeX, this.inputY = (i - this.elementPositionY - this.elementCenterY) / this.elementRangeY)):this.windowRadiusX && this.windowRadiusY && (this.inputX = (e - this.windowCenterX) / this.windowRadiusX, this.inputY = (i - this.windowCenterY) / this.windowRadiusY)}}, {key:"destroy", value:function(){this.disable(), clearTimeout(this.calibrationTimer), clearTimeout(this.detectionTimer), this.element.removeAttribute("style"); for (var t = 0; t < this.layers.length; t++)this.layers[t].removeAttribute("style"); delete this.element, delete this.layers}}, {key:"version", value:function(){return"3.1.0"}}]), t}(); e.exports = h}, {"object-assign":1, raf:4}]}, {}, [5])(5)});
//# sourceMappingURL=parallax.min.js.map

                                /* ------------------------------------------- Bootstrap Progressbar -------------------------------------*/
                                /*! bootstrap-progressbar v0.9.0 | Copyright (c) 2012-2015 Stephan Groß | MIT license | http://www.minddust.com */
                                ! function(t) {
                                "use strict";
                                        var e = function(n, s) {
                                        this.$element = t(n), this.options = t.extend({}, e.defaults, s)
                                        };
                                      
                                        e.defaults = {
                                        transition_delay: 300,
                                                refresh_speed: 50,
                                                display_text: "none",
                                                use_percentage: !0,
                                                percent_format: function(t) {
                                                return t + "%"
                                                },
                                                amount_format: function(t, e) {
                                                return t + " / " + e
                                                },
                                                update: t.noop,
                                                done: t.noop,
                                                fail: t.noop
                                        }, e.prototype.transition = function() {
                                var n = this.$element,
                                        s = n.parent(),
                                        a = this.$back_text,
                                        r = this.$front_text,
                                        i = this.options,
                                        o = parseInt(n.attr("data-transitiongoal")),
                                        h = parseInt(n.attr("aria-valuemin")) || 0,
                                        d = parseInt(n.attr("aria-valuemax")) || 100,
                                        f = s.hasClass("vertical"),
                                        p = i.update && "function" == typeof i.update ? i.update : e.defaults.update,
                                        u = i.done && "function" == typeof i.done ? i.done : e.defaults.done,
                                        c = i.fail && "function" == typeof i.fail ? i.fail : e.defaults.fail;
                                        if (isNaN(o)) return void c("data-transitiongoal not set");
                                        var l = Math.round(100 * (o - h) / (d - h));
                                        if ("center" === i.display_text && !a && !r) {
                                           
                                this.$back_text = a = t("<span>").addClass("progressbar-back-text").prependTo(s), this.$front_text = r = t("<span>").addClass("progressbar-front-text").prependTo(n);
                                        var g;
                                        f ? (g = s.css("height"), a.css({
                                        height: g,
                                                "line-height": g
                                        }), r.css({
                                        height: g,
                                                "line-height": g
                                        }), t(window).resize(function() {
                                        g = s.css("height"), a.css({
                                        height: g,
                                                "line-height": g
                                        }), r.css({
                                        height: g,
                                                "line-height": g
                                        })
                                        })) : (g = s.css("width"), r.css({
                                width: g
                                }), t(window).resize(function() {
                                g = s.css("width"), r.css({
                                width: g
                                })
                                }))
                                }
                                setTimeout(function() {
                                var t, e, c, g, _;
                                        f ? n.css("height", l + "%") : n.css("width", l + "%");
                                        var x = setInterval(function() {
                                        f ? (c = n.height(), g = s.height()) : (c = n.width(), g = s.width()), t = Math.round(100 * c / g), e = Math.round(h + c / g * (d - h)), t >= l && (t = l, e = o, u(n), clearInterval(x)), "none" !== i.display_text && (_ = i.use_percentage ? i.percent_format(t) : i.amount_format(e, d, h), "fill" === i.display_text ? n.text(_) : "center" === i.display_text && (a.text(_), r.text(_))), n.attr("aria-valuenow", e), p(t, n)
                                        }, i.refresh_speed)
                                }, i.transition_delay)
                                };
                                        var n = t.fn.progressbar;
                                        t.fn.progressbar = function(n) {
                                        return this.each(function() {
                                        var s = t(this),
                                                a = s.data("bs.progressbar"),
                                                r = "object" == typeof n && n;
                                                a && r && t.extend(a.options, r), a || s.data("bs.progressbar", a = new e(this, r)), a.transition()
                                        })
                                        }, t.fn.progressbar.Constructor = e, t.fn.progressbar.noConflict = function() {
                                return t.fn.progressbar = n, this
                                }
                                }(window.jQuery);
                                /* ------------------------------------------------  ------------------------------------------ */



                                /*! WOW wow.js - v1.3.0 - 2016-10-04
                                 * https://wowjs.uk
                                 * Copyright (c) 2016 Thomas Grainger; Licensed MIT */!function(a, b){if ("function" == typeof define && define.amd)define(["module", "exports"], b);  else if ("undefined" != typeof exports)b(module, exports);  else{var c = {exports:{}}; b(c, c.exports), a.WOW = c.exports}}(this, function(a, b){"use strict"; function c(a, b){if (!(a instanceof b))throw new TypeError("Cannot call a class as a function")}function d(a, b){return b.indexOf(a) >= 0}function e(a, b){for (var c in b)if (null == a[c]){var d = b[c]; a[c] = d}return a}function f(a){return/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)}function g(a){var b = arguments.length <= 1 || void 0 === arguments[1]?!1:arguments[1], c = arguments.length <= 2 || void 0 === arguments[2]?!1:arguments[2], d = arguments.length <= 3 || void 0 === arguments[3]?null:arguments[3], e = void 0; return null != document.createEvent?(e = document.createEvent("CustomEvent"), e.initCustomEvent(a, b, c, d)):null != document.createEventObject?(e = document.createEventObject(), e.eventType = a):e.eventName = a, e}function h(a, b){null != a.dispatchEvent?a.dispatchEvent(b):b in(null != a)?a[b]():"on" + b in(null != a) && a["on" + b]()}function i(a, b, c){null != a.addEventListener?a.addEventListener(b, c, !1):null != a.attachEvent?a.attachEvent("on" + b, c):a[b] = c}function j(a, b, c){null != a.removeEventListener?a.removeEventListener(b, c, !1):null != a.detachEvent?a.detachEvent("on" + b, c):delete a[b]}function k(){return"innerHeight"in window?window.innerHeight:document.documentElement.clientHeight}Object.defineProperty(b, "__esModule", {value:!0}); var l, m, n = function(){function a(a, b){for (var c = 0; c < b.length; c++){var d = b[c]; d.enumerable = d.enumerable || !1, d.configurable = !0, "value"in d && (d.writable = !0), Object.defineProperty(a, d.key, d)}}return function(b, c, d){return c && a(b.prototype, c), d && a(b, d), b}}(), o = window.WeakMap || window.MozWeakMap || function(){function a(){c(this, a), this.keys = [], this.values = []}return n(a, [{key:"get", value:function(a){for (var b = 0; b < this.keys.length; b++){var c = this.keys[b]; if (c === a)return this.values[b]}}}, {key:"set", value:function(a, b){for (var c = 0; c < this.keys.length; c++){var d = this.keys[c]; if (d === a)return this.values[c] = b, this}return this.keys.push(a), this.values.push(b), this}}]), a}(), p = window.MutationObserver || window.WebkitMutationObserver || window.MozMutationObserver || (m = l = function(){function a(){c(this, a), "undefined" != typeof console && null !== console && (console.warn("MutationObserver is not supported by your browser."), console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content."))}return n(a, [{key:"observe", value:function(){}}]), a}(), l.notSupported = !0, m), q = window.getComputedStyle || function(a){var b = /(\-([a-z]){1})/g; return{getPropertyValue:function(c){"float" === c && (c = "styleFloat"), b.test(c) && c.replace(b, function(a, b){return b.toUpperCase()}); var d = a.currentStyle; return(null != d?d[c]:void 0) || null}}}, r = function(){function a(){var b = arguments.length <= 0 || void 0 === arguments[0]?{}:arguments[0]; c(this, a), this.defaults = {boxClass:"wow", animateClass:"animated", offset:0, mobile:!0, live:!0, callback:null, scrollContainer:null, resetAnimation:!0}, this.animate = function(){return"requestAnimationFrame"in window?function(a){return window.requestAnimationFrame(a)}:function(a){return a()}}(), this.vendors = ["moz", "webkit"], this.start = this.start.bind(this), this.resetAnimation = this.resetAnimation.bind(this), this.scrollHandler = this.scrollHandler.bind(this), this.scrollCallback = this.scrollCallback.bind(this), this.scrolled = !0, this.config = e(b, this.defaults), null != b.scrollContainer && (this.config.scrollContainer = document.querySelector(b.scrollContainer)), this.animationNameCache = new o, this.wowEvent = g(this.config.boxClass)}return n(a, [{key:"init", value:function(){this.element = window.document.documentElement, d(document.readyState, ["interactive", "complete"])?this.start():i(document, "DOMContentLoaded", this.start), this.finished = []}}, {key:"start", value:function(){var a = this; if (this.stopped = !1, this.boxes = [].slice.call(this.element.querySelectorAll("." + this.config.boxClass)), this.all = this.boxes.slice(0), this.boxes.length)if (this.disabled())this.resetStyle();  else for (var b = 0; b < this.boxes.length; b++){var c = this.boxes[b]; this.applyStyle(c, !0)}if (this.disabled() || (i(this.config.scrollContainer || window, "scroll", this.scrollHandler), i(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live){var d = new p(function(b){for (var c = 0; c < b.length; c++)for (var d = b[c], e = 0; e < d.addedNodes.length; e++){var f = d.addedNodes[e]; a.doSync(f)}}); d.observe(document.body, {childList:!0, subtree:!0})}}}, {key:"stop", value:function(){this.stopped = !0, j(this.config.scrollContainer || window, "scroll", this.scrollHandler), j(window, "resize", this.scrollHandler), null != this.interval && clearInterval(this.interval)}}, {key:"sync", value:function(){p.notSupported && this.doSync(this.element)}}, {key:"doSync", value:function(a){if ("undefined" != typeof a && null !== a || (a = this.element), 1 === a.nodeType){a = a.parentNode || a; for (var b = a.querySelectorAll("." + this.config.boxClass), c = 0; c < b.length; c++){var e = b[c]; d(e, this.all) || (this.boxes.push(e), this.all.push(e), this.stopped || this.disabled()?this.resetStyle():this.applyStyle(e, !0), this.scrolled = !0)}}}}, {key:"show", value:function(a){return this.applyStyle(a), a.className = a.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(a), h(a, this.wowEvent), this.config.resetAnimation && (i(a, "animationend", this.resetAnimation), i(a, "oanimationend", this.resetAnimation), i(a, "webkitAnimationEnd", this.resetAnimation), i(a, "MSAnimationEnd", this.resetAnimation)), a}}, {key:"applyStyle", value:function(a, b){var c = this, d = a.getAttribute("data-wow-duration"), e = a.getAttribute("data-wow-delay"), f = a.getAttribute("data-wow-iteration"); return this.animate(function(){return c.customStyle(a, b, d, e, f)})}}, {key:"resetStyle", value:function(){for (var a = 0; a < this.boxes.length; a++){var b = this.boxes[a]; b.style.visibility = "visible"}}}, {key:"resetAnimation", value:function(a){if (a.type.toLowerCase().indexOf("animationend") >= 0){var b = a.target || a.srcElement; b.className = b.className.replace(this.config.animateClass, "").trim()}}}, {key:"customStyle", value:function(a, b, c, d, e){return b && this.cacheAnimationName(a), a.style.visibility = b?"hidden":"visible", c && this.vendorSet(a.style, {animationDuration:c}), d && this.vendorSet(a.style, {animationDelay:d}), e && this.vendorSet(a.style, {animationIterationCount:e}), this.vendorSet(a.style, {animationName:b?"none":this.cachedAnimationName(a)}), a}}, {key:"vendorSet", value:function(a, b){for (var c in b)if (b.hasOwnProperty(c)){var d = b[c]; a["" + c] = d; for (var e = 0; e < this.vendors.length; e++){var f = this.vendors[e]; a["" + f + c.charAt(0).toUpperCase() + c.substr(1)] = d}}}}, {key:"vendorCSS", value:function(a, b){for (var c = q(a), d = c.getPropertyCSSValue(b), e = 0; e < this.vendors.length; e++){var f = this.vendors[e]; d = d || c.getPropertyCSSValue("-" + f + "-" + b)}return d}}, {key:"animationName", value:function(a){var b = void 0; try{b = this.vendorCSS(a, "animation-name").cssText} catch (c){b = q(a).getPropertyValue("animation-name")}return"none" === b?"":b}}, {key:"cacheAnimationName", value:function(a){return this.animationNameCache.set(a, this.animationName(a))}}, {key:"cachedAnimationName", value:function(a){return this.animationNameCache.get(a)}}, {key:"scrollHandler", value:function(){this.scrolled = !0}}, {key:"scrollCallback", value:function(){if (this.scrolled){this.scrolled = !1; for (var a = [], b = 0; b < this.boxes.length; b++){var c = this.boxes[b]; if (c){if (this.isVisible(c)){this.show(c); continue}a.push(c)}}this.boxes = a, this.boxes.length || this.config.live || this.stop()}}}, {key:"offsetTop", value:function(a){for (; void 0 === a.offsetTop; )a = a.parentNode; for (var b = a.offsetTop; a.offsetParent; )a = a.offsetParent, b += a.offsetTop; return b}}, {key:"isVisible", value:function(a){var b = a.getAttribute("data-wow-offset") || this.config.offset, c = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset, d = c + Math.min(this.element.clientHeight, k()) - b, e = this.offsetTop(a), f = e + a.clientHeight; return d >= e && f >= c}}, {key:"disabled", value:function(){return!this.config.mobile && f(navigator.userAgent)}}]), a}(); b["default"] = r, a.exports = b["default"]});