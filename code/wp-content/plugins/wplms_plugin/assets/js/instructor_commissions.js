!function(e){var t={};function s(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,s),o.l=!0,o.exports}s.m=e,s.c=t,s.d=function(e,t,n){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},s.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(s.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)s.d(n,o,function(t){return e[t]}.bind(null,o));return n},s.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="",s(s.s=0)}([function(e,t,s){"use strict";s.r(t);s(1);const{createElement:n,render:o,useState:r,useEffect:a,Fragment:i}=wp.element,{select:c,dispatch:l}=wp.data,u=e=>{const[t,s]=r(!0),[o,l]=r({}),[u,d]=r(null),[m,p]=r(""),[_,b]=r(0),[f,h]=r(0),[y,v]=r(0),[w,g]=r(0),[O,j]=r(!1);a(()=>{if(document.getElementById("chartjs"))j(!0);else{const e=document.createElement("script");e.src=window.wplms_course_data.chartjs,e.id="chartjs",document.body.appendChild(e),e.onload=()=>{j(!0)}}},[]);const k=()=>{for(var e="#",t=0;t<6;t++)e+="0123456789ABCDEF"[Math.floor(16*Math.random())];return e};a(()=>{fetch(window.instructor_commissions.api+"/instructor_commissions/",{method:"post",body:JSON.stringify({user_id:window.instructor_commissions.user_id,currency:u,token:c("vibebp").getToken()})}).then(e=>e.json()).then(e=>{e.status&&e.data&&e.data.currencies&&(l(e.data),u||d(e.data.currencies[0].value)),s(!1)})},[u,w]),a(()=>{if(m&&O&&!t&&o.hasOwnProperty("commissions")&&Object.keys(o.commissions).length){let t=["January","February","March","April","May","June","July","August","Spetember","October","November","December"],s=[],n=[],r=[];Object.keys(o.commissions).map(e=>{n[parseInt(e-1)]=parseInt(o.commissions[e].sales),s[parseInt(e-1)]=parseInt(o.commissions[e].commission)});for(var e=0;e<=11;e++)null!==n[e]&&void 0!==n[e]||(n[e]=0),null!==s[e]&&void 0!==s[e]||(s[e]=0);let a=k(),i=k();r.push({label:window.instructor_commissions.translations.earnings,data:n,borderColor:a,backgroundColor:a,showLines:!0,fill:!1}),r.push({label:window.instructor_commissions.translations.payouts,data:s,borderColor:i,backgroundColor:i,showLines:!0,fill:!1});let c=m.getContext("2d");f&&f.destroy();let l={};setTimeout(()=>{l=new Chart(c,{type:"line",data:{labels:t,datasets:r,options:{scales:{yAxes:[{stacked:!0,ticks:{beginAtZero:!0}}]}}}}),h(l)},200)}if(_&&!t&&o.hasOwnProperty("sales_pie")&&o.sales_pie.length){let e=[],t=[],n=[];o.sales_pie.map(t=>{e.push(t.label)}),o.sales_pie.map(e=>{t.push(e.value),n.push(k())}),s&&s.destroy();var s={};setTimeout(()=>{s=new Chart(_.getContext("2d"),{type:"doughnut",data:{datasets:[{data:t,backgroundColor:n}],labels:e}}),v(s)},200)}},[o,t,O]);return n("div",{className:"wplms_dashboard_instructor_commission text-center"},n("span",{className:"vicon vicon-reload",onClick:e=>{s(!0),fetch(window.instructor_commissions.api+"/instructor_commissions/generate",{method:"post",body:JSON.stringify({token:c("vibebp").getToken()})}).then(e=>e.json()).then(e=>{alert(window.instructor_commissions.translations.calculated_commissions),window.location.reload()})}}),t?n("div",{class:"widget_loader"},n("div",null),n("div",null),n("div",null),n("div",null)):n(i,null,o.hasOwnProperty("currencies")?n("div",{className:"dash_tabs"},o.currencies.map(e=>n("div",{className:"dash_tab "+(e.value==u?"active":""),onClick:()=>{d(e.value)}},n("span",{dangerouslySetInnerHTML:{__html:e.label}})))):"",n("div",{className:"wplms_instructor_commission_data"},n("div",{className:"wplms_instructor_commission_graph"},o.hasOwnProperty("commissions")?n("canvas",{ref:e=>{e&&!m&&p(e)}}):n("div",{className:"vbp_message"},window.instructor_commissions.translations.no_data)),n("div",{className:"wplms_instructor_commission_pie"},o.hasOwnProperty("sales_pie")?n("canvas",{ref:e=>{e&&!_&&b(e)}}):""))))};document.addEventListener("wplms_instructor_commission_stats",e=>{document.querySelectorAll(".wplms_instructor_commission_stats").forEach(e=>{o(n(u,{type:e.getAttribute("data-type")}),e)})})},function(e,t,s){}]);