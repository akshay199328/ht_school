!function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=1)}([function(e,t,n){},function(e,t,n){"use strict";n.r(t);n(0);function r(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(e)))return;var n=[],r=!0,a=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(r=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);r=!0);}catch(e){a=!0,o=e}finally{try{r||null==l.return||l.return()}finally{if(a)throw o}}return n}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return a(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return a(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function a(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var o=wp.element,i=o.useState,l=o.useEffect,c=o.Fragment,u=wp.data,s=u.select,m=u.dispatch,f=function(e){var t=r(i(e.event),2),n=t[0],a=t[1];s("vibebp").getUser();l((function(){a(e.event)}),[e.event]);var o=function(e){if(n&&n.meta&&Array.isArray(n.meta)){var t=n.meta.findIndex((function(t){return t.meta_key==e}));return t>-1?n.meta[t].meta_value:""}return""};return wp.element.createElement(c,null,n.hasOwnProperty("id")?wp.element.createElement("div",{className:"event_wrapper"},wp.element.createElement("div",{className:"event"},wp.element.createElement("div",{className:"event_details"},wp.element.createElement("h2",null,n.post_title),n.post_content?wp.element.createElement("div",{className:"event_description",dangerouslySetInnerHTML:{__html:n.post_content}}):"",n.meta?wp.element.createElement("div",{className:"event_start_end"},wp.element.createElement("span",null,wp.element.createElement("strong",null,window.vibezoom.translations.starts),wp.element.createElement("span",null,wp.element.createElement("span",{className:"vicon vicon-calendar"}),wp.element.createElement("span",null,new Date(o("start")).toLocaleString()))),wp.element.createElement("span",null,wp.element.createElement("strong",null,window.vibezoom.translations.ends),wp.element.createElement("span",null,wp.element.createElement("span",{className:"vicon vicon-calendar"}),wp.element.createElement("span",null,new Date(o("end")).toLocaleString())))):""),e.event?wp.element.createElement(c,null,wp.element.createElement("div",{className:"event_actions"},wp.element.createElement("a",{className:"button is-primary",onClick:function(){var e=window.location.href.split("#");window.location.href=e[0]+"#component=zoom_meeting&action=view&id="+n.id,m("vibebp").setComponent("zoom_meeting")}},window.vibezoom.translations.view_details),wp.element.createElement("a",{className:"link",onClick:function(){e.close()}},window.vibezoom.translations.cancel))):"")):"")};function d(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function p(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?d(Object(n),!0).forEach((function(t){v(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):d(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function v(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function w(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"==typeof Symbol||!(Symbol.iterator in Object(e)))return;var n=[],r=!0,a=!1,o=void 0;try{for(var i,l=e[Symbol.iterator]();!(r=(i=l.next()).done)&&(n.push(i.value),!t||n.length!==t);r=!0);}catch(e){a=!0,o=e}finally{try{r||null==l.return||l.return()}finally{if(a)throw o}}return n}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return y(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return y(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function y(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}var b=wp.element,g=b.useState,h=b.useEffect,_=(b.Fragment,b.createRef),O=wp.data,E=O.select,S=O.dispatch,j=function(e){var t=w(g([]),2),n=t[0],r=t[1],a=w(g({start:"",end:""}),2),o=a[0],i=a[1],l=w(g(!1),2),c=l[0],u=l[1],s=function(e){window.vibezoom.calevents=e,r(e)},m=w(g(),2),d=m[0],v=m[1],y=_(null),b=w(g({calendarView:"dayGridMonth",slotDuration:"00:15:00",editable:!0,buttonText:{today:window.vibezoom.translations.today,month:window.vibezoom.translations.month,week:window.vibezoom.translations.week,day:window.vibezoom.translations.day,list:window.vibezoom.translations.list}}),2),O=b[0];b[1];h((function(){s([]),o.start&&o.end&&fetch("".concat(window.vibezoom.api.url,"/user/meetings/zoommeetings"),{method:"post",body:JSON.stringify({token:E("vibebp").getToken(),filter:o})}).then((function(e){return e.json()})).then((function(e){e.status?Array.isArray(e.data)&&s(e.data):e.hasOwnProperty("message")&&S("vibebp").addNotification({text:e.message})}))}),[o]),h((function(){if(y){var e={initialView:O.calendarView,themeSystem:"bootstrap",headerToolbar:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,timeGridDay,listWeek"},buttonText:O.buttonText,eventClick:function(e,t,n){var r=window.vibezoom.calevents;if(r.length){var a=r.findIndex((function(t){return parseInt(t.id)==parseInt(e.event.id)}));a>=0&&u(r[a])}},datesSet:function(e){var t=e.view.activeStart.getTime(),n=e.view.activeEnd.getTime();i(p(p({},o),{},{start:t,end:n}))}};!d&&n.length&&(e.events=j(n));var t=new FullCalendar.Calendar(y.current,e);d&&(d.setOption("events",j(n)),t=d),t.render(),v(t)}}),[n]);var j=function(e){var t=[];return e.map((function(e){var n={};e.id&&(n.id=e.id),e.post_title&&(n.title=e.post_title),e.hasOwnProperty("meta")&&Array.isArray(e.meta)&&e.meta.length&&e.meta.map((function(e){e.meta_key&&e.meta_value&&("start"==e.meta_key?n.start=e.meta_value:"end"==e.meta_key?n.end=e.meta_value:"color"==e.meta_key&&(n.color=e.meta_value))})),t.push(n)})),t};return wp.element.createElement("div",{class:"vibezoom_fullcalendar"},wp.element.createElement("div",{id:"vibezoom_fullcalendar",ref:y}),c?wp.element.createElement(f,{event:c,close:function(){u(!1)}}):"")},z=wp.element,A=(z.createElement,z.render);z.useState,z.useEffect,z.Fragment,z.useContext;document.addEventListener("calendar_component_vibe_zoom_meeting",(function(e){var t=document.querySelector("#calendar_component_vibe_zoom_meeting");t&&A(wp.element.createElement(j,null),t)}),!1)}]);