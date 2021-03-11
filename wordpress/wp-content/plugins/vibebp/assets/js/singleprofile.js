/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/profile/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./_sass/main.scss":
/*!*************************!*\
  !*** ./_sass/main.scss ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./_sass/main.scss?");

/***/ }),

/***/ "./src/components/cardloading/index.js":
/*!*********************************************!*\
  !*** ./src/components/cardloading/index.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nvar _wp$element = wp.element,\n    createElement = _wp$element.createElement,\n    useState = _wp$element.useState,\n    useEffect = _wp$element.useEffect,\n    Fragment = _wp$element.Fragment,\n    render = _wp$element.render;\nvar _wp$data = wp.data,\n    dispatch = _wp$data.dispatch,\n    select = _wp$data.select;\n\nvar CardLoading = function CardLoading(props) {\n  return wp.element.createElement(\"div\", {\n    \"class\": \"vibebp-directory-content-block\"\n  }, wp.element.createElement(\"div\", {\n    \"class\": \"loader-wrapper\"\n  }, wp.element.createElement(\"div\", {\n    \"class\": \"loader-animation\"\n  }, wp.element.createElement(\"svg\", null, wp.element.createElement(\"path\", {\n    d: \"M442 79.1H0V65.5h412.4v-7.1H0V0h442v79.1zm0 7.1V107H181.2v-7.1H0V86.2h442zM50.1 24.6v7.2h53.3v-7.2H50.1zm0-16.8v7.1h89.3V7.8H50.1zM19.3 38.9c10.6 0 19.2-8.7 19.2-19.4C38.5 8.7 30 0 19.3 0A19.4 19.4 0 0 0 0 19.5c0 10.7 8.6 19.4 19.3 19.4z\"\n  })))));\n};\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (CardLoading);\n\n//# sourceURL=webpack:///./src/components/cardloading/index.js?");

/***/ }),

/***/ "./src/profile/index.js":
/*!******************************!*\
  !*** ./src/profile/index.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _profile_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./profile.js */ \"./src/profile/profile.js\");\n/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../_sass/main.scss */ \"./_sass/main.scss\");\n/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_sass_main_scss__WEBPACK_IMPORTED_MODULE_1__);\n\n\nvar _wp$element = wp.element,\n    createElement = _wp$element.createElement,\n    useState = _wp$element.useState,\n    useEffect = _wp$element.useEffect,\n    Fragment = _wp$element.Fragment,\n    render = _wp$element.render;\nvar _wp$data = wp.data,\n    dispatch = _wp$data.dispatch,\n    select = _wp$data.select;\ndocument.addEventListener('member_card_clicked', function (e) {\n  e.detail.original_event.preventDefault();\n\n  if (e.detail.hasOwnProperty('id')) {\n    render(wp.element.createElement(_profile_js__WEBPACK_IMPORTED_MODULE_0__[\"default\"], {\n      id: e.detail.id,\n      member: e.detail.member\n    }), document.getElementById(\"single_member_profile\"));\n  }\n});\n\n//# sourceURL=webpack:///./src/profile/index.js?");

/***/ }),

/***/ "./src/profile/profile.js":
/*!********************************!*\
  !*** ./src/profile/profile.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _components_cardloading__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../components/cardloading */ \"./src/components/cardloading/index.js\");\nfunction _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }\n\nfunction _nonIterableRest() { throw new TypeError(\"Invalid attempt to destructure non-iterable instance\"); }\n\nfunction _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === \"[object Arguments]\")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i[\"return\"] != null) _i[\"return\"](); } finally { if (_d) throw _e; } } return _arr; }\n\nfunction _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }\n\nvar _wp$element = wp.element,\n    createElement = _wp$element.createElement,\n    useState = _wp$element.useState,\n    useEffect = _wp$element.useEffect,\n    Fragment = _wp$element.Fragment,\n    render = _wp$element.render;\nvar _wp$data = wp.data,\n    dispatch = _wp$data.dispatch,\n    select = _wp$data.select;\n\n\nvar Profile = function Profile(props) {\n  var _useState = useState(true),\n      _useState2 = _slicedToArray(_useState, 2),\n      isLoading = _useState2[0],\n      setIsLoading = _useState2[1];\n\n  var _useState3 = useState(null),\n      _useState4 = _slicedToArray(_useState3, 2),\n      profile = _useState4[0],\n      setProfile = _useState4[1];\n\n  useEffect(function () {\n    setIsLoading(true);\n    fetch(\"\".concat(window.vibebp.api.url, \"/profile?client_id=\").concat(window.vibebp.settings.client_id), {\n      method: 'post',\n      body: JSON.stringify({\n        id: props.id,\n        token: select('vibebp').getToken()\n      })\n    }).then(function (res) {\n      return res.json();\n    }).then(function (data) {\n      setProfile(data);\n      setIsLoading(false);\n    });\n  }, [props.id]);\n  return isLoading ? wp.element.createElement(\"div\", {\n    className: \"member_card\"\n  }, wp.element.createElement(_components_cardloading__WEBPACK_IMPORTED_MODULE_0__[\"default\"], null)) : wp.element.createElement(\"div\", {\n    className: \"vibebp_member\"\n  }, wp.element.createElement(\"div\", {\n    className: \"header\"\n  }, wp.element.createElement(\"span\", null), wp.element.createElement(\"span\", {\n    className: \"button small\",\n    onClick: function onClick() {\n      setIsLoading(true);\n    }\n  }, wp.element.createElement(\"span\", {\n    className: \"vicon vicon-close\"\n  }), window.vibebp.translations.close)), profile.length ? wp.element.createElement(\"div\", {\n    className: \"member_card\",\n    dangerouslySetInnerHTML: {\n      __html: profile\n    }\n  }) : '');\n};\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (Profile);\n\n//# sourceURL=webpack:///./src/profile/profile.js?");

/***/ })

/******/ });