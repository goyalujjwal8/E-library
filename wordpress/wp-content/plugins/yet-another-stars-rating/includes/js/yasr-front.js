!function(t){var e={};function r(a){if(e[a])return e[a].exports;var n=e[a]={i:a,l:!1,exports:{}};return t[a].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=t,r.c=e,r.d=function(t,e,a){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},r.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var n in t)r.d(a,n,function(e){return t[e]}.bind(null,n));return a},r.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r(r.s=0)}([function(t,e,r){t.exports=r(1)},function(t,e,r){"use strict";var a,n;r.r(e),r.d(e,"yasrSearchStarsDom",(function(){return j})),r.d(e,"yasrSetRaterValue",(function(){return L}));var o=new Uint8Array(16);function s(){if(!n&&!(n="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)||"undefined"!=typeof msCrypto&&"function"==typeof msCrypto.getRandomValues&&msCrypto.getRandomValues.bind(msCrypto)))throw new Error("crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported");return n(o)}var i=/^(?:[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}|00000000-0000-0000-0000-000000000000)$/i;for(var l=function(t){return"string"==typeof t&&i.test(t)},u=[],c=0;c<256;++c)u.push((c+256).toString(16).substr(1));var d=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,r=(u[t[e+0]]+u[t[e+1]]+u[t[e+2]]+u[t[e+3]]+"-"+u[t[e+4]]+u[t[e+5]]+"-"+u[t[e+6]]+u[t[e+7]]+"-"+u[t[e+8]]+u[t[e+9]]+"-"+u[t[e+10]]+u[t[e+11]]+u[t[e+12]]+u[t[e+13]]+u[t[e+14]]+u[t[e+15]]).toLowerCase();if(!l(r))throw TypeError("Stringified UUID is invalid");return r};var m=function(t,e,r){var a=(t=t||{}).random||(t.rng||s)();if(a[6]=15&a[6]|64,a[8]=63&a[8]|128,e){r=r||0;for(var n=0;n<16;++n)e[r+n]=a[n];return e}return d(a)};function g(t){return(g="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}function y(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}function f(t,e){return(f=Object.setPrototypeOf||function(t,e){return t.__proto__=e,t})(t,e)}function p(t){var e=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(t){return!1}}();return function(){var r,a=h(t);if(e){var n=h(this).constructor;r=Reflect.construct(a,arguments,n)}else r=a.apply(this,arguments);return v(this,r)}}function v(t,e){return!e||"object"!==g(e)&&"function"!=typeof e?function(t){if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(t):e}function h(t){return(h=Object.setPrototypeOf?Object.getPrototypeOf:function(t){return t.__proto__||Object.getPrototypeOf(t)})(t)}var b=wp.i18n.__,_=wp.element.render;function E(t){var e="yasr-ranking-element-"+m(),r=document.getElementById(t.tableId).dataset.rankingSize;return React.createElement("div",{id:e,ref:function(){return L(r,e,!1,.1,!0,t.rating)}})}function R(t){if(void 0!==t.post.number_of_votes)return React.createElement("span",{className:"yasr-most-rated-text"},"[",b("Total:","yet-another-stars-rating")," ",t.post.number_of_votes,"  ",b("Average:","yet-another-stars-rating")," ",t.post.rating,"]");var e=t.text;return React.createElement("span",{className:"yasr-highest-rated-text"},e," ",t.post.rating)}function I(t){return React.createElement("td",{className:t.colClass},React.createElement("a",{href:t.post.link},function(t){if("string"!=typeof t||-1===t.indexOf("&"))return t;void 0===a&&(a=document.implementation&&document.implementation.createHTMLDocument?document.implementation.createHTMLDocument("").createElement("textarea"):document.createElement("textarea")),a.innerHTML=t;var e=a.textContent;return a.innerHTML="",e}(t.post.title)))}function k(t){var e="after",r=b("Rating:","yet-another-stars-rating"),a=new URLSearchParams(t.rankingParams);return null!==a.get("text_position")&&(e=a.get("text_position")),null!==a.get("custom_txt")&&(r=a.get("custom_txt")),"before"===e?React.createElement("td",{className:t.colClass},React.createElement(R,{post:t.post,tableId:t.tableId,text:r}),React.createElement(E,{rating:t.post.rating,tableId:t.tableId})):React.createElement("td",{className:t.colClass},React.createElement(E,{rating:t.post.rating,tableId:t.tableId}),React.createElement(R,{post:t.post,tableId:t.tableId,text:r}))}function w(t){var e="",r="";return"author_ranking"===t.source?(e="yasr-top-10-overall-left",r="yasr-top-10-overall-right"):"visitor_votes"===t.source&&(e="yasr-top-10-most-highest-left",r="yasr-top-10-most-highest-right"),React.createElement("tr",{className:t.trClass},React.createElement(I,{colClass:e,post:t.post}),React.createElement(k,{colClass:r,post:t.post,tableId:t.tableId,rankingParams:t.rankingParams}))}function C(t){return React.createElement("tbody",{id:t.tBodyId,style:{display:t.show}},t.data.map((function(e,r){var a="yasr-rankings-td-colored";return"author_ranking"===t.source&&(a="yasr-rankings-td-white"),r%2==0&&(a="yasr-rankings-td-white","author_ranking"===t.source&&(a="yasr-rankings-td-colored")),React.createElement(w,{key:e.post_id,source:t.source,tableId:t.tableId,rankingParams:t.rankingParams,post:e,trClass:a})})))}var S=function(t){!function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,writable:!0,configurable:!0}}),e&&f(t,e)}(o,React.Component);var e,r,a,n=p(o);function o(t){var e;return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,o),(e=n.call(this,t)).state={error:null,isLoaded:!1,data:[],tableId:t.tableId,source:t.source,rankingParams:t.params},e}return e=o,(r=[{key:"componentDidMount",value:function(){var t=this,e=JSON.parse(document.getElementById(this.state.tableId).dataset.rankingData),r={};if("yes"!==yasrCommonData.ajaxEnabled)console.info(b("Ajax Disabled, getting data from source","yet-another-stars-rating")),this.setState({isLoaded:!0,data:e});else if(this.state.source){var a=this.returnRestUrl();Promise.all(a.map((function(t){return fetch(t).then((function(t){return!0===t.ok?t.json():(console.info(b("Ajax Call Failed. Getting data from source")),"KO")})).then((function(t){"KO"===t?r=e:"overall_rating"===t.source||"author_multi"===t.source?r="overall_rating"===t.source?t.data_overall:t.data_mv:r[t.show]=t.data_vv})).catch((function(t){r=e,console.info(b(t))}))}))).then((function(e){t.setState({isLoaded:!0,data:r})})).catch((function(e){console.info(b(e)),t.setState({isLoaded:!0,data:r})}))}else this.setState({error:b("Invalid Data Source","yet-another-stars-rating")})}},{key:"returnRestUrl",value:function(){var t,e=""!==this.state.rankingParams?this.state.rankingParams:"",r=this.state.source,a="yet-another-stars-rating/v1/yasr-rankings/",n="";if(""!==e&&!1!==e){var o=new URLSearchParams(e);null!==o.get("order_by")&&(n+="order_by="+o.get("order_by")),null!==o.get("limit")&&(n+="&limit="+o.get("limit")),null!==o.get("ctg")?n+="&ctg="+o.get("ctg"):null!==o.get("cpt")&&(n+="&cpt="+o.get("cpt")),""!==n&&(n="&"+(n=n.replace(/\s+/g,""))),"visitor_multi"!==r&&"author_multi"!==r||null!==o.get("setid")&&(n+="&setid="+o.get("setid"))}else n="";if("author_ranking"===r||"author_multi"===r)t=[yasrCommonData.restEndpoint+a+"?source="+r+n];else{var s="",i="";if(""!==e){var l=new URLSearchParams(e);null!==l.get("required_votes[most]")&&(s="&required_votes="+l.get("required_votes[most]")),null!==l.get("required_votes[highest]")&&(i="&required_votes="+l.get("required_votes[highest]"))}t=[yasrCommonData.restEndpoint+a+"?show=most&source="+r+n+s,yasrCommonData.restEndpoint+a+"?show=highest&source="+r+n+i]}return t}},{key:"rankingTableHead",value:function(t,e){var r=this.state.tableId,a="link-most-rated-posts-"+r,n="link-highest-rated-posts-"+r;if("author_ranking"!==t){var o=React.createElement("span",null,React.createElement("span",{id:a},b("Most Rated","yet-another-stars-rating"))," | ",React.createElement("a",{href:"#",id:n,onClick:this.switchTBody.bind(this)},b("Highest Rated","yet-another-stars-rating")));return"highest"===e&&(o=React.createElement("span",null,React.createElement("span",{id:n},b("Highest Rated","yet-another-stars-rating"))," | ",React.createElement("a",{href:"#",id:a,onClick:this.switchTBody.bind(this)},b("Most Rated","yet-another-stars-rating")))),React.createElement("thead",null,React.createElement("tr",{className:"yasr-rankings-td-colored yasr-rankings-heading"},React.createElement("th",null,"Post"),React.createElement("th",null,b("Order By","yet-another-stars-rating-pro"),":  ",o)))}return React.createElement(React.Fragment,null)}},{key:"switchTBody",value:function(t){t.preventDefault();var e=t.target.id,r=this.state.tableId,a="link-most-rated-posts-"+r,n="link-highest-rated-posts-"+r,o="most-rated-posts-"+r,s="highest-rated-posts-"+r,i=document.getElementById(e),l=document.createElement("span");l.innerHTML=i.innerHTML,l.id=i.id,i.parentNode.replaceChild(l,i),e===a&&(document.getElementById(s).style.display="none",document.getElementById(o).style.display="",l=document.getElementById(n),i.innerHTML=l.innerHTML,i.id=l.id,l.parentNode.replaceChild(i,l)),e===n&&(document.getElementById(o).style.display="none",document.getElementById(s).style.display="",l=document.getElementById(a),i.innerHTML=l.innerHTML,i.id=l.id,l.parentNode.replaceChild(i,l))}},{key:"rankingTableBody",value:function(){var t=this.state,e=t.data,r=t.source,a=t.rankingParams;if("overall_rating"===r||"author_multi"===r)return React.createElement(C,{data:e,tableId:this.state.tableId,tBodyId:"overall_"+this.state.tableId,rankingParams:a,show:"table-row-group",source:r});var n=e.most,o=e.highest,s="most",i="table-row-group",l="none",u=new URLSearchParams(a);return null!==u.get("view")&&(s=u.get("view")),"highest"===s&&(i="none",l="table-row-group"),React.createElement(React.Fragment,null,this.rankingTableHead(r,s),React.createElement(C,{data:n,tableId:this.state.tableId,tBodyId:"most-rated-posts-"+this.state.tableId,rankingParams:a,show:i,source:r}),React.createElement(C,{data:o,tableId:this.state.tableId,tBodyId:"highest-rated-posts-"+this.state.tableId,rankingParams:a,show:l,source:r}))}},{key:"render",value:function(){var t=this.state,e=t.error,r=t.isLoaded;return e?React.createElement("tbody",null,React.createElement("tr",null,React.createElement("td",null,console.log(e),"Error"))):!1===r?React.createElement("tbody",null,React.createElement("tr",null,React.createElement("td",null,b("Loading Charts","yet-another-stars-rating")))):React.createElement(React.Fragment,null,this.rankingTableBody())}}])&&y(e.prototype,r),a&&y(e,a),o}();for(var x=wp.i18n.__,B=["yasr-rater-stars","yasr-rater-stars-vv","yasr-multiset-visitors-rater"],T=0;T<B.length;T++)j(B[T]);function j(t){var e=document.getElementsByClassName(t);if(e.length>0){if("yasr-rater-stars"!==t&&"yasr-ranking-stars"!==t||function(t){for(var e=0;e<t.length;e++)if(!1===t.item(e).classList.contains("yasr-star-rating")){var r=t.item(e),a=r.id;L(r.getAttribute("data-rater-starsize"),a,r)}}(e),"yasr-rater-stars-vv"===t&&(function(t){for(var e=0;e<t.length;e++)!function(e){if(!1===t.item(e).classList.contains("yasr-star-rating")){var r=t.item(e),a=r.getAttribute("data-rating"),n=r.getAttribute("data-readonly-attribute"),o=r.getAttribute("data-rater-readonly");null===n&&(n=!1),n=O(n),o=O(o),!0===n&&(o=!0);var s=r.getAttribute("data-rater-postid"),i=r.id,l=i.replace("yasr-visitor-votes-rater-",""),u=parseInt(r.getAttribute("data-rater-starsize")),c=r.getAttribute("data-rater-nonce"),d=r.getAttribute("data-issingular"),m="yasr-vv-votes-number-container-"+l,g="yasr-vv-average-container-"+l,y=document.getElementById(m),f=document.getElementById(g),p="yasr-vv-loader-"+l,v=!1;if("yes"===yasrCommonData.ajaxEnabled){var h=r.getAttribute("data-cpt");""===h&&(h="posts");var b="wp/v2/"+h+"/"+s+"?_fields=yasr_visitor_votes&_wpnonce="+yasrCommonData.nonce;jQuery.get(yasrCommonData.restEndpoint+b).done((function(t){var e;(e=!0===n||t.yasr_visitor_votes.stars_attributes.read_only,a=(a=t.yasr_visitor_votes.number_of_votes>0?t.yasr_visitor_votes.sum_votes/t.yasr_visitor_votes.number_of_votes:0).toFixed(1),a=parseFloat(a),P(u,a,s,e,i,l,c,d,y,f,p),!0!==n)&&(null!==y&&(y.innerHTML=t.yasr_visitor_votes.number_of_votes),null!==f&&(f.innerHTML=a),!1!==t.yasr_visitor_votes.stars_attributes.span_bottom&&(v=t.yasr_visitor_votes.stars_attributes.span_bottom,document.getElementById(p).innerHTML=v))})).fail((function(t,e,r,m){console.info(x("YASR ajax call failed. Showing ratings from html","yet-another-stars-rating")),P(u,a,s,o,i,l,c,d,y,f,p),!0!==n&&(document.getElementById("yasr-below-stars-hidden-"+l).style.display="")}))}else P(u,a,s,o,i,l,c,d,y,f,p)}}(e)}(e),"yes"===yasrCommonData.visitorStatsEnabled)){var r=document.getElementsByClassName("yasr-dashicons-visitor-stats");r&&function(t){for(var e=!1,r=0;r<t.length;r++)!function(r){var a="#"+t.item(r).id,n={action:"yasr_stats_visitors_votes",post_id:t.item(r).getAttribute("data-postid")};tippy(a,{content:'<span style="color: #0a0a0a">Loading...</span>',theme:"yasr",arrow:"true",arrowType:"round",onShow:function(t){a!==e&&jQuery.post(yasrCommonData.ajaxurl,n,(function(e){e=JSON.parse(e),t.setContent(e)}))},onHidden:function(){e=a}})}(r)}(r)}"yasr-multiset-visitors-rater"===t&&function(t){for(var e="",r=[],a=0;a<t.length;a++)!function(a){if(!1===t.item(a).classList.contains("yasr-star-rating")){var n=t.item(a),o=n.id,s=n.getAttribute("data-rater-readonly");s=O(s);L(16,o,n,1,s,!1,(function(t,a){var o=n.getAttribute("data-rater-postid"),s=n.getAttribute("data-rater-setid"),i=n.getAttribute("data-rater-set-field-id");t=t.toFixed(1);var l=parseInt(t);this.setRating(l),e={postid:o,setid:s,field:i,rating:l},r.push(e),a()}))}}(a);jQuery(".yasr-send-visitor-multiset").on("click",(function(){var t=this.getAttribute("data-postid"),e=this.getAttribute("data-setid"),a=this.getAttribute("data-nonce");jQuery("#yasr-send-visitor-multiset-"+t+"-"+e).hide(),jQuery("#yasr-loader-multiset-visitor-"+t+"-"+e).show();var n={action:"yasr_visitor_multiset_field_vote",nonce:a,post_id:t,rating:r,set_type:e};jQuery.post(yasrCommonData.ajaxurl,n,(function(r){jQuery("#yasr-loader-multiset-visitor-"+t+"-"+e).text(r)}))}))}(e)}}function L(t,e){var r,a=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:.1,o=!(arguments.length>4&&void 0!==arguments[4])||arguments[4],s=arguments.length>5&&void 0!==arguments[5]&&arguments[5],i=arguments.length>6&&void 0!==arguments[6]&&arguments[6];r=a||document.getElementById(e),t=parseInt(t),raterJs({starSize:t,showToolTip:!1,element:r,step:n,readOnly:o,rating:s,rateCallback:i})}function P(t,e,r,a,n,o,s,i,l,u,c){e=parseFloat(e),a=O(a);L(t,n,document.getElementById(n),1,a,e,(function(t,e){document.getElementById(c).innerHTML=yasrCommonData.loaderHtml;var a={action:"yasr_send_visitor_rating",rating:t,post_id:r,nonce_visitor:s,is_singular:i};this.setRating(t),this.disable(),jQuery.post(yasrCommonData.ajaxurl,a,(function(t){t=JSON.parse(t),null!==l&&(l.innerHTML=t.number_of_votes),null!==u&&(u.innerHTML=t.average_rating),document.getElementById(c).innerHTML=t.rating_saved_text})),e()}))}function O(t){return null!=t&&""!==t||(t=!0),"true"!==t&&"1"!==t||(t=!0),"false"!==t&&"0"!==t||(t=!1),t}!function(){var t=document.getElementsByClassName("yasr-stars-rankings");if(t.length>0)for(var e=0;e<t.length;e++){var r=t.item(e).id,a=JSON.parse(t.item(e).dataset.rankingSource),n=JSON.parse(t.item(e).dataset.rankingParams),o=document.getElementById(r);_(React.createElement(S,{source:a,tableId:r,params:n}),o)}}()}]);