!function(t){var n={};function e(r){if(n[r])return n[r].exports;var o=n[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,e),o.l=!0,o.exports}e.m=t,e.c=n,e.d=function(t,n,r){e.o(t,n)||Object.defineProperty(t,n,{configurable:!1,enumerable:!0,get:r})},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="./build/",e(e.s=13)}([function(t,n){var e=t.exports={version:"2.5.5"};"number"==typeof __e&&(__e=e)},function(t,n){t.exports=function(t){try{return!!t()}catch(t){return!0}}},function(t,n){var e=t.exports="undefined"!=typeof window&&window.Math==Math?window:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")();"number"==typeof __g&&(__g=e)},function(t,n){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},function(t,n,e){t.exports=!e(1)(function(){return 7!=Object.defineProperty({},"a",{get:function(){return 7}}).a})},function(t,n,e){var r=e(2),o=e(0),i=e(17),u=e(19),c=e(6),a=function(t,n,e){var s,f,p,l=t&a.F,d=t&a.G,h=t&a.S,y=t&a.P,v=t&a.B,x=t&a.W,b=d?o:o[n]||(o[n]={}),m=b.prototype,j=d?r:h?r[n]:(r[n]||{}).prototype;for(s in d&&(e=n),e)(f=!l&&j&&void 0!==j[s])&&c(b,s)||(p=f?j[s]:e[s],b[s]=d&&"function"!=typeof j[s]?e[s]:v&&f?i(p,r):x&&j[s]==p?function(t){var n=function(n,e,r){if(this instanceof t){switch(arguments.length){case 0:return new t;case 1:return new t(n);case 2:return new t(n,e)}return new t(n,e,r)}return t.apply(this,arguments)};return n.prototype=t.prototype,n}(p):y&&"function"==typeof p?i(Function.call,p):p,y&&((b.virtual||(b.virtual={}))[s]=p,t&a.R&&m&&!m[s]&&u(m,s,p)))};a.F=1,a.G=2,a.S=4,a.P=8,a.B=16,a.W=32,a.U=64,a.R=128,t.exports=a},function(t,n){var e={}.hasOwnProperty;t.exports=function(t,n){return e.call(t,n)}},function(t,n,e){var r=e(27),o=e(35);t.exports=Object.keys||function(t){return r(t,o)}},function(t,n,e){var r=e(9),o=e(10);t.exports=function(t){return r(o(t))}},function(t,n,e){var r=e(28);t.exports=Object("z").propertyIsEnumerable(0)?Object:function(t){return"String"==r(t)?t.split(""):Object(t)}},function(t,n){t.exports=function(t){if(void 0==t)throw TypeError("Can't call method on  "+t);return t}},function(t,n){var e=Math.ceil,r=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?r:e)(t)}},function(t,n,e){var r=e(10);t.exports=function(t){return Object(r(t))}},function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0});var r=e(14),o=e.n(r),i=e(38),u=e.n(i);!function(){const t={"Dsheiko\\Extras\\Arrays":{js:["assign","concat","copyWithin","each","entries","every","fill","filter","find","from","hasOwnProperty","includes","indexOf","is","join","keys","lastIndexOf","map","of","pop","push","reduceRight","reduce","reverse","shift","slice","some","sort","splice","unshift","values"],_:["each","map","reduce","reduceRight","find","filter","where","findWhere","reject","every","some","contains","invoke","pluck","max","min","sortBy","groupBy","indexBy","countBy","shuffle","sample","toArray","size","partition","first","initial","last","rest","compact","flatten","without","union","intersection","difference","uniq","zip","unzip","object","indexOf","lastIndexOf","sortedIndex","findIndex","findLastIndex","range","keys","allKeys","values","mapObject","pairs","invert","findKey","extend","pick","omit","defaults","tap","has","property","propertyOf","matcher","isEqual","isMatch","isEmpty","isArray","isObject"]},"Dsheiko\\Extras\\Collections":{_:["chain","each","toArray"]},"Dsheiko\\Extras\\Functions":{js:["apply","bind","call","toString"],_:["bind","bindAll","partial","memoize","delay","throttle","debounce","once","after","before","wrap","negate","compose","times","chain"]},"Dsheiko\\Extras\\Strings":{js:["charAt","charCodeAt","concat","endsWith","fromCharCode","includes","indexOf","lastIndexOf","localeCompare","match","padEnd","padStart","remove","repeat","replace","slice","split","startsWith","substr","substring","toLowerCase","toUpperCase","trim"],_:["escape","unescape","chain"]},"Dsheiko\\Extras\\Numbers":{js:["isFinite","isInteger","isNaN","parseFloat","parseInt","toFixed","toPrecision"],_:["isNumber","chain"]},"Dsheiko\\Extras\\Booleans":{_:["isBoolean","chain"]},"Dsheiko\\Extras\\Type\\PlainObject":{js:["assign","entries","keys","values"],_:["keys","values","mapObject","pairs","invert","findKey","pick","omit","defaults","has","isEqual","isEmpty","toArray"]},"Dsheiko\\Extras\\Any":{_:["isDate","isError","isException","isNull","chain"]},Chaining:{_:["chain","then","tap","value"]},"Dsheiko\\Extras\\Utils":{_:["identity","constant","noop","random","iteratee","uniqueId","now"]}};function n(t){return t.toLowerCase().replace(/\\/g,"-")}function e(t,e,r){if(!(t in e))return"";if(!e[t].length)return"";return`<a class="toc_subtitle">${"js"===t?"JavaScript":"Underscore.js"} methods</a>\n      <ul class="toc_section">`+function(t,e){return t.reduce((t,r)=>t+`\n<li>- <a href="#${n(`${e}-${r}`)}">${r}</a></li>`,"")}(e[t],r)+"</ul>"}function r(t){return u()(t).reduce((r,o)=>{const i=o.split("\\").pop().toLowerCase(),u=e("js",t[o],i)+e("_",t[o],i);return r+(""===u?"":function(t,e){return`<a class="toc_title" href="#${n(`${e}-${t}`)}">${t}</a>`}(o,i)+u)},"")}function i(t,n){return t.filter(t=>-1!==t.indexOf(n))}function c(t,n){n.innerHTML=r(t)}const a=document.querySelector("[data-bind=menu]");document.querySelector("[data-bind=filter]").addEventListener("input",function(t,n,e=null){var r=null;return(...o)=>{clearTimeout(r),r=setTimeout(()=>{r=null,t.apply(e||this,o)},n)}}(function(n){var e,r;c((e=t,r=n.target.value,u()(e).reduce((t,n)=>{const u=o()({},e[n]);return"js"in u&&(u.js=i(u.js,r)),"_"in u&&(u._=i(u._,r)),t[n]=u,t},{})),a)},200),!1),c(t,a)}()},function(t,n,e){t.exports={default:e(15),__esModule:!0}},function(t,n,e){e(16),t.exports=e(0).Object.assign},function(t,n,e){var r=e(5);r(r.S+r.F,"Object",{assign:e(26)})},function(t,n,e){var r=e(18);t.exports=function(t,n,e){if(r(t),void 0===n)return t;switch(e){case 1:return function(e){return t.call(n,e)};case 2:return function(e,r){return t.call(n,e,r)};case 3:return function(e,r,o){return t.call(n,e,r,o)}}return function(){return t.apply(n,arguments)}}},function(t,n){t.exports=function(t){if("function"!=typeof t)throw TypeError(t+" is not a function!");return t}},function(t,n,e){var r=e(20),o=e(25);t.exports=e(4)?function(t,n,e){return r.f(t,n,o(1,e))}:function(t,n,e){return t[n]=e,t}},function(t,n,e){var r=e(21),o=e(22),i=e(24),u=Object.defineProperty;n.f=e(4)?Object.defineProperty:function(t,n,e){if(r(t),n=i(n,!0),r(e),o)try{return u(t,n,e)}catch(t){}if("get"in e||"set"in e)throw TypeError("Accessors not supported!");return"value"in e&&(t[n]=e.value),t}},function(t,n,e){var r=e(3);t.exports=function(t){if(!r(t))throw TypeError(t+" is not an object!");return t}},function(t,n,e){t.exports=!e(4)&&!e(1)(function(){return 7!=Object.defineProperty(e(23)("div"),"a",{get:function(){return 7}}).a})},function(t,n,e){var r=e(3),o=e(2).document,i=r(o)&&r(o.createElement);t.exports=function(t){return i?o.createElement(t):{}}},function(t,n,e){var r=e(3);t.exports=function(t,n){if(!r(t))return t;var e,o;if(n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;if("function"==typeof(e=t.valueOf)&&!r(o=e.call(t)))return o;if(!n&&"function"==typeof(e=t.toString)&&!r(o=e.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},function(t,n){t.exports=function(t,n){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:n}}},function(t,n,e){"use strict";var r=e(7),o=e(36),i=e(37),u=e(12),c=e(9),a=Object.assign;t.exports=!a||e(1)(function(){var t={},n={},e=Symbol(),r="abcdefghijklmnopqrst";return t[e]=7,r.split("").forEach(function(t){n[t]=t}),7!=a({},t)[e]||Object.keys(a({},n)).join("")!=r})?function(t,n){for(var e=u(t),a=arguments.length,s=1,f=o.f,p=i.f;a>s;)for(var l,d=c(arguments[s++]),h=f?r(d).concat(f(d)):r(d),y=h.length,v=0;y>v;)p.call(d,l=h[v++])&&(e[l]=d[l]);return e}:a},function(t,n,e){var r=e(6),o=e(8),i=e(29)(!1),u=e(32)("IE_PROTO");t.exports=function(t,n){var e,c=o(t),a=0,s=[];for(e in c)e!=u&&r(c,e)&&s.push(e);for(;n.length>a;)r(c,e=n[a++])&&(~i(s,e)||s.push(e));return s}},function(t,n){var e={}.toString;t.exports=function(t){return e.call(t).slice(8,-1)}},function(t,n,e){var r=e(8),o=e(30),i=e(31);t.exports=function(t){return function(n,e,u){var c,a=r(n),s=o(a.length),f=i(u,s);if(t&&e!=e){for(;s>f;)if((c=a[f++])!=c)return!0}else for(;s>f;f++)if((t||f in a)&&a[f]===e)return t||f||0;return!t&&-1}}},function(t,n,e){var r=e(11),o=Math.min;t.exports=function(t){return t>0?o(r(t),9007199254740991):0}},function(t,n,e){var r=e(11),o=Math.max,i=Math.min;t.exports=function(t,n){return(t=r(t))<0?o(t+n,0):i(t,n)}},function(t,n,e){var r=e(33)("keys"),o=e(34);t.exports=function(t){return r[t]||(r[t]=o(t))}},function(t,n,e){var r=e(2),o=r["__core-js_shared__"]||(r["__core-js_shared__"]={});t.exports=function(t){return o[t]||(o[t]={})}},function(t,n){var e=0,r=Math.random();t.exports=function(t){return"Symbol(".concat(void 0===t?"":t,")_",(++e+r).toString(36))}},function(t,n){t.exports="constructor,hasOwnProperty,isPrototypeOf,propertyIsEnumerable,toLocaleString,toString,valueOf".split(",")},function(t,n){n.f=Object.getOwnPropertySymbols},function(t,n){n.f={}.propertyIsEnumerable},function(t,n,e){t.exports={default:e(39),__esModule:!0}},function(t,n,e){e(40),t.exports=e(0).Object.keys},function(t,n,e){var r=e(12),o=e(7);e(41)("keys",function(){return function(t){return o(r(t))}})},function(t,n,e){var r=e(5),o=e(0),i=e(1);t.exports=function(t,n){var e=(o.Object||{})[t]||Object[t],u={};u[t]=n(e),r(r.S+r.F*i(function(){e(1)}),"Object",u)}}]);