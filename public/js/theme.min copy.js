"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function _defineProperties(e,t){for(var o=0;o<t.length;o++){var a=t[o];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}function _createClass(e,t,o){return t&&_defineProperties(e.prototype,t),o&&_defineProperties(e,o),e}var docReady=function(e){"loading"===document.readyState?document.addEventListener("DOMContentLoaded",e):setTimeout(e,1)},isRTL=function(){return"rtl"===document.querySelector("html").getAttribute("dir")},resize=function(e){return window.addEventListener("resize",e)},isIterableArray=function(e){return Array.isArray(e)&&!!e.length},camelize=function(e){if(e){e=e.replace(/[-_\s.]+(.)?/g,function(e,t){return t?t.toUpperCase():""});return"".concat(e.substr(0,1).toLowerCase()).concat(e.substr(1))}},getData=function(t,o){try{return JSON.parse(t.dataset[camelize(o)])}catch(e){return t.dataset[camelize(o)]}},hexToRgb=function(e){e=0===e.indexOf("#")?e.substring(1):e,e=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i,function(e,t,o,a){return t+t+o+o+a+a}));return e?[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]:null},rgbaColor=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:"#fff",t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:.5;return"rgba(".concat(hexToRgb(e),", ").concat(t,")")},getColor=function(e){var t=1<arguments.length&&void 0!==arguments[1]?arguments[1]:document.documentElement;return getComputedStyle(t).getPropertyValue("--gohub-".concat(e)).trim()},getColors=function(e){return{primary:getColor("primary",e),secondary:getColor("secondary",e),success:getColor("success",e),info:getColor("info",e),warning:getColor("warning",e),danger:getColor("danger",e),light:getColor("light",e),dark:getColor("dark",e)}},getSoftColors=function(e){return{primary:getColor("soft-primary",e),secondary:getColor("soft-secondary",e),success:getColor("soft-success",e),info:getColor("soft-info",e),warning:getColor("soft-warning",e),danger:getColor("soft-danger",e),light:getColor("soft-light",e),dark:getColor("soft-dark",e)}},getGrays=function(e){return{white:getColor("white",e),100:getColor("100",e),200:getColor("200",e),300:getColor("300",e),400:getColor("400",e),500:getColor("500",e),600:getColor("600",e),700:getColor("700",e),800:getColor("800",e),900:getColor("900",e),1e3:getColor("1000",e),1100:getColor("1100",e),black:getColor("black",e)}},hasClass=function(e,t){return e.classList.value.includes(t)},addClass=function(e,t){e.classList.add(t)},getOffset=function(e){var t=e.getBoundingClientRect(),o=window.pageXOffset||document.documentElement.scrollLeft,e=window.pageYOffset||document.documentElement.scrollTop;return{top:t.top+e,left:t.left+o}},isScrolledIntoView=function(e){for(var t=e.offsetTop,o=e.offsetLeft,a=e.offsetWidth,n=e.offsetHeight;e.offsetParent;)t+=(e=e.offsetParent).offsetTop,o+=e.offsetLeft;return{all:t>=window.pageYOffset&&o>=window.pageXOffset&&t+n<=window.pageYOffset+window.innerHeight&&o+a<=window.pageXOffset+window.innerWidth,partial:t<window.pageYOffset+window.innerHeight&&o<window.pageXOffset+window.innerWidth&&t+n>window.pageYOffset&&o+a>window.pageXOffset}},isElementIntoView=function(e){e=e.getBoundingClientRect();return 0<=e.top&&e.bottom<=window.innerHeight||(e.top<window.innerHeight&&0<=e.bottom||void 0)},breakpoints={xs:0,sm:576,md:768,lg:992,xl:1200},getBreakpoint=function(e){var t,e=e&&e.classList.value;return t=e?breakpoints[e.split(" ").filter(function(e){return e.includes("navbar-expand-")}).pop().split("-").pop()]:t},getCurrentScreenBreakpoint=function(){var e="";return{currentBreakpoint:e=window.innerWidth>=breakpoints.xl?"xl":window.innerWidth>=breakpoints.lg?"lg":window.innerWidth>=breakpoints.md?"md":"sm",breakpointStartVal:breakpoints[e]}},setCookie=function(e,t,o){var a=new Date;a.setTime(a.getTime()+o),document.cookie="".concat(e,"=").concat(t,";expires=").concat(a.toUTCString())},getCookie=function(e){e=document.cookie.match("(^|;) ?".concat(e,"=([^;]*)(;|$)"));return e&&e[2]},settings={tinymce:{theme:"oxide"},chart:{borderColor:"rgba(255, 255, 255, 0.8)"}},newChart=function(e,t){e=e.getContext("2d");return new window.Chart(e,t)},getItemFromStore=function(t,o){var a=2<arguments.length&&void 0!==arguments[2]?arguments[2]:localStorage;try{return JSON.parse(a.getItem(t))||o}catch(e){return a.getItem(t)||o}},setItemToStore=function(e,t){return(2<arguments.length&&void 0!==arguments[2]?arguments[2]:localStorage).setItem(e,t)},getStoreSpace=function(){var e=0<arguments.length&&void 0!==arguments[0]?arguments[0]:localStorage;return parseFloat((escape(encodeURIComponent(JSON.stringify(e))).length/1048576).toFixed(2))},getDates=function(o,e){var a=2<arguments.length&&void 0!==arguments[2]?arguments[2]:864e5;return Array.from({length:1+(e-o)/a},function(e,t){return new Date(o.valueOf()+a*t)})},getPastDates=function(e){var t;switch(e){case"week":t=7;break;case"month":t=30;break;case"year":t=365;break;default:t=e}var o=new Date,a=o,o=new Date((new Date).setDate(o.getDate()-(t-1)));return getDates(o,a)},getRandomNumber=function(e,t){return Math.floor(Math.random()*(t-e)+e)},utils={docReady:docReady,resize:resize,isIterableArray:isIterableArray,camelize:camelize,getData:getData,hasClass:hasClass,addClass:addClass,hexToRgb:hexToRgb,rgbaColor:rgbaColor,getColor:getColor,getColors:getColors,getSoftColors:getSoftColors,getGrays:getGrays,getOffset:getOffset,isScrolledIntoView:isScrolledIntoView,getBreakpoint:getBreakpoint,setCookie:setCookie,getCookie:getCookie,newChart:newChart,settings:settings,getItemFromStore:getItemFromStore,setItemToStore:setItemToStore,getStoreSpace:getStoreSpace,getDates:getDates,getPastDates:getPastDates,getRandomNumber:getRandomNumber,getCurrentScreenBreakpoint:getCurrentScreenBreakpoint,breakpoints:breakpoints,isElementIntoView:isElementIntoView,isRTL:isRTL},detectorInit=function(){var e=window.is,t=document.querySelector("html");e.opera()&&addClass(t,"opera"),e.mobile()&&addClass(t,"mobile"),e.firefox()&&addClass(t,"firefox"),e.safari()&&addClass(t,"safari"),e.ios()&&addClass(t,"ios"),e.iphone()&&addClass(t,"iphone"),e.ipad()&&addClass(t,"ipad"),e.ie()&&addClass(t,"ie"),e.edge()&&addClass(t,"edge"),e.chrome()&&addClass(t,"chrome"),e.mac()&&addClass(t,"osx"),e.windows()&&addClass(t,"windows"),navigator.userAgent.match("CriOS")&&addClass(t,"chrome")},DomNode=function(){function t(e){_classCallCheck(this,t),this.node=e}return _createClass(t,[{key:"addClass",value:function(e){this.isValidNode()&&this.node.classList.add(e)}},{key:"removeClass",value:function(e){this.isValidNode()&&this.node.classList.remove(e)}},{key:"toggleClass",value:function(e){this.isValidNode()&&this.node.classList.toggle(e)}},{key:"hasClass",value:function(e){this.isValidNode()&&this.node.classList.contains(e)}},{key:"data",value:function(t){if(this.isValidNode())try{return JSON.parse(this.node.dataset[this.camelize(t)])}catch(e){return this.node.dataset[this.camelize(t)]}return null}},{key:"attr",value:function(e){return this.isValidNode()&&this.node[e]}},{key:"setAttribute",value:function(e,t){this.isValidNode()&&this.node.setAttribute(e,t)}},{key:"removeAttribute",value:function(e){this.isValidNode()&&this.node.removeAttribute(e)}},{key:"setProp",value:function(e,t){this.isValidNode()&&(this.node[e]=t)}},{key:"on",value:function(e,t){this.isValidNode()&&this.node.addEventListener(e,t)}},{key:"isValidNode",value:function(){return!!this.node}},{key:"camelize",value:function(e){e=e.replace(/[-_\s.]+(.)?/g,function(e,t){return t?t.toUpperCase():""});return"".concat(e.substr(0,1).toLowerCase()).concat(e.substr(1))}}]),t}(),navbarInit=function(){var t,o,a,n,r,i,s,l,e="[data-navbar-on-scroll]",d=".navbar-collapse",c=".navbar-toggler",u="collapsed",g="scroll",f="show.bs.collapse",m="hide.bs.collapse",p="hidden.bs.collapse",C=document.querySelector(e);C&&(t=window.innerHeight,o=document.documentElement,a=C.querySelector(d),e=utils.getData(C,"navbar-on-scroll")||"light",d=utils.getColor(e),n="bg-".concat(e),r="shadow-transition",i=utils.hexToRgb(d),s=window.getComputedStyle(C).backgroundImage,l="background-color 0.35s ease",C.style.backgroundImage="none",window.addEventListener(g,function(){var e=o.scrollTop/t*5;1<=e&&(e=1),C.style.backgroundColor="rgba(".concat(i[0],", ").concat(i[1],", ").concat(i[2],", ").concat(e,")"),C.style.backgroundImage=0<e||utils.hasClass(a,"show")?s:"none",0<e||utils.hasClass(a,"show")?C.classList.add(r):C.classList.remove(r)}),utils.resize(function(){var e=utils.getBreakpoint(C);window.innerWidth>e?(C.style.backgroundImage=o.scrollTop?s:"none",C.style.transition="none"):utils.hasClass(C.querySelector(c),u)||(C.classList.add(n),C.classList.add(r),C.style.backgroundImage=s),window.innerWidth<=e&&(C.style.transition=utils.hasClass(a,"show")?l:"none")}),a.addEventListener(f,function(){C.classList.add(n),C.classList.add(r),C.style.backgroundImage=s,C.style.transition=l}),a.addEventListener(m,function(){C.classList.remove(n),C.classList.remove(r),o.scrollTop||(C.style.backgroundImage="none")}),a.addEventListener(p,function(){C.style.transition="none"}))};CustomEase.create("CubicBezier",".77,0,.18,1");var zanimationInit=function(){function t(e,o){function a(e){var t,o,a={},n={};return e.hasAttribute("data-zanim-".concat(s))?r="zanim-".concat(s):(t=[],e.getAttributeNames().forEach(function(e){"data-zanim-trigger"!==e&&e.startsWith("data-zanim-")&&(e=e.split("data-zanim-")[1],utils.breakpoints[e]<l&&t.push({name:e,size:utils.breakpoints[e]}))}),r=void 0,0!==t.length&&(o=(t=t.sort(function(e,t){return e.size-t.size})).pop(),r="zanim-".concat(o.name))),e=utils.getData(e,r),n=window._.merge(a,e),void 0!==r&&(a=e.animation?i[e.animation]:i.default),void 0===r&&(a={delay:0,duration:0,ease:"Expo.easeOut",from:{},to:{}}),n.delay||(n.delay=a.delay),n.duration||(n.duration=a.duration),n.from||(n.from=a.from),n.to||(n.to=a.to),n.ease?n.to.ease=n.ease:n.to.ease=a.ease,n}var r,n,t;e.hasAttribute("data-zanim-timeline")?(t=utils.getData(e,"zanim-timeline"),n=gsap.timeline(t),e.querySelectorAll("[data-zanim-xs], [data-zanim-sm], [data-zanim-md], [data-zanim-lg], [data-zanim-xl]").forEach(function(e){var t=a(e);n.fromTo(e,t.duration,t.from,t.to,t.delay).pause(),window.imagesLoaded(e,o(n))})):e.closest("[data-zanim-timeline]")||(t=a(e),o(gsap.fromTo(e,t.duration,t.from,t.to).delay(t.delay).pause())),o(gsap.timeline())}var e=function(){var e="blur(5px)";return e=(window.is.ios()||window.is.mac())&&window.is.firefox()?"blur(0px)":e},i={default:{from:{opacity:0,y:70},to:{opacity:1,y:0},ease:"CubicBezier",duration:.8,delay:0},"slide-down":{from:{opacity:0,y:-70},to:{opacity:1,y:0},ease:"CubicBezier",duration:.8,delay:0},"slide-left":{from:{opacity:0,x:70},to:{opacity:1,x:0},ease:"CubicBezier",duration:.8,delay:0},"slide-right":{from:{opacity:0,x:-70},to:{opacity:1,x:0},ease:"CubicBezier",duration:.8,delay:0},"zoom-in":{from:{scale:.9,opacity:0,filter:e()},to:{scale:1,opacity:1,filter:"blur(0px)"},delay:0,ease:"CubicBezier",duration:.8},"zoom-out":{from:{scale:1.1,opacity:1,filter:e()},to:{scale:1,opacity:1,filter:"blur(0px)"},delay:0,ease:"CubicBezier",duration:.8},"zoom-out-slide-right":{from:{scale:1.1,opacity:1,x:-70,filter:e()},to:{scale:1,opacity:1,x:0,filter:"blur(0px)"},delay:0,ease:"CubicBezier",duration:.8},"zoom-out-slide-left":{from:{scale:1.1,opacity:1,x:70,filter:e()},to:{scale:1,opacity:1,x:0,filter:"blur(0px)"},delay:0,ease:"CubicBezier",duration:.8},"blur-in":{from:{opacity:0,filter:e()},to:{opacity:1,filter:"blur(0px)"},delay:0,ease:"CubicBezier",duration:.8}},s=utils.getCurrentScreenBreakpoint().currentBreakpoint,l=utils.getCurrentScreenBreakpoint().breakpointStartVal,e=function(){document.querySelectorAll("[data-zanim-trigger = 'scroll']").forEach(function(e){utils.isElementIntoView(e)&&e.hasAttribute("data-zanim-trigger")&&(t(e,function(e){return e.play()}),document.querySelector("[zanim-repeat]")||e.removeAttribute("data-zanim-trigger"))})};e(),window.addEventListener("scroll",e)};docReady(navbarInit),docReady(detectorInit),docReady(zanimationInit);
//# sourceMappingURL=theme.min.js.map
