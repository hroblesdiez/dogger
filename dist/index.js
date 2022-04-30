/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _style_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.css */ \"./src/style.css\");\n/* harmony import */ var _modules_MenuMobile__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/MenuMobile */ \"./src/modules/MenuMobile.js\");\n/* harmony import */ var _modules_TestimonialSlider__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/TestimonialSlider */ \"./src/modules/TestimonialSlider.js\");\n/* harmony import */ var _modules_Search__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/Search */ \"./src/modules/Search.js\");\n // My modules / classes\n\n\n\n // Instantiate a new object using my modules/classes\n\nvar menuMobile = new _modules_MenuMobile__WEBPACK_IMPORTED_MODULE_1__[\"default\"]();\nvar testimonialSlider = new _modules_TestimonialSlider__WEBPACK_IMPORTED_MODULE_2__[\"default\"]();\nvar search = new _modules_Search__WEBPACK_IMPORTED_MODULE_3__[\"default\"]();\n\n//# sourceURL=webpack://dogger-theme/./src/index.js?");

/***/ }),

/***/ "./src/modules/MenuMobile.js":
/*!***********************************!*\
  !*** ./src/modules/MenuMobile.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar MenuMobile = /*#__PURE__*/_createClass(function MenuMobile() {\n  _classCallCheck(this, MenuMobile);\n\n  //Grab all elements\n  var btn = document.querySelector(\".mobile-button\");\n  var menu = document.querySelector(\".mobile-menu\");\n  var open = document.querySelector(\".mobile-open\");\n  var close = document.querySelector(\".mobile-close\");\n  var theBody = document.querySelector(\"body\");\n  var isOpen = false; //Add event listener\n\n  btn.addEventListener(\"click\", toggleMenu);\n\n  function toggleMenu() {\n    if (!isOpen) {\n      menu.classList.remove('hidden');\n      menu.classList.add('opacity-100');\n      menu.classList.add('top-[80px]');\n      open.classList.add('hidden');\n      close.classList.remove('hidden');\n      theBody.classList.add('overflow-hidden');\n      isOpen = true;\n    } else {\n      menu.classList.add('hidden');\n      menu.classList.remove('opacity-100');\n      menu.classList.remove('top-[80px]');\n      close.classList.add('hidden');\n      open.classList.remove('hidden');\n      theBody.classList.remove('overflow-hidden');\n      isOpen = false;\n    }\n  }\n});\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MenuMobile);\n\n//# sourceURL=webpack://dogger-theme/./src/modules/MenuMobile.js?");

/***/ }),

/***/ "./src/modules/Search.js":
/*!*******************************!*\
  !*** ./src/modules/Search.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nvar Search = /*#__PURE__*/function () {\n  function Search() {\n    _classCallCheck(this, Search);\n\n    this.cleanSearchButton = document.querySelector('#search-button-clean');\n    this.inputSearch = document.querySelector('#input-search');\n    this.events();\n  }\n\n  _createClass(Search, [{\n    key: \"events\",\n    value: function events() {\n      var _this = this;\n\n      this.inputSearch.addEventListener('input', function () {\n        _this.cleanSearchButton.classList.remove('hidden');\n      });\n      this.cleanSearchButton.addEventListener('click', function () {\n        if (_this.inputSearch.value !== '') {\n          _this.inputSearch.value = '';\n\n          _this.inputSearch.focus();\n        }\n      });\n\n      if (this.inputSearch.value !== '') {\n        this.cleanSearchButton.classList.remove('hidden');\n      }\n    }\n  }]);\n\n  return Search;\n}();\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Search);\n\n//# sourceURL=webpack://dogger-theme/./src/modules/Search.js?");

/***/ }),

/***/ "./src/modules/TestimonialSlider.js":
/*!******************************************!*\
  !*** ./src/modules/TestimonialSlider.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\n\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nvar TestimonialSlider = /*#__PURE__*/_createClass(function TestimonialSlider() {\n  _classCallCheck(this, TestimonialSlider);\n\n  var swiper = new Swiper('.swiper', {\n    // Optional parameters\n    slidesPerView: 1,\n    spaceBetween: 15,\n    loop: true,\n    speed: 2000,\n    lazyLoading: true,\n    keyboard: {\n      enabled: true\n    },\n    autoplay: true,\n    effect: 'fade',\n    fadeEffect: {\n      crossFade: true\n    },\n    // If we need pagination\n    pagination: {\n      el: '.swiper-pagination',\n      clickable: true\n    }\n  });\n});\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TestimonialSlider);\n\n//# sourceURL=webpack://dogger-theme/./src/modules/TestimonialSlider.js?");

/***/ }),

/***/ "./src/style.css":
/*!***********************!*\
  !*** ./src/style.css ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://dogger-theme/./src/style.css?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;