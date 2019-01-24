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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

var ACTIVE_CLASS = "block--active";
var TRANSITION_CLASS = "block--transition";

var getTransforms = function getTransforms(a, b) {
  var scaleY = a.height / b.height;
  var scaleX = a.width / b.width;

  // dividing by 2 centers the transform since the origin
  // is centered not top left
  var translateX = a.left + a.width / 2 - (b.left + b.width / 2);
  var translateY = a.top + a.height / 2 - (b.top + b.height / 2);

  // nothing particularly clever here, just using the
  // translate amount to estimate a rotation direction/amount.
  // ends up feeling pretty natural to me.
  var rotate = translateX;

  return ["translateX(" + translateX + "px)", "translateY(" + translateY + "px)", "rotate(" + rotate + "deg)", "scaleY(" + scaleY + ")", "scaleX(" + scaleX + ")"].join(" ");
};

var animate = function animate(block, transforms, oldTransforms) {
  block.style.transform = transforms;
  block.getBoundingClientRect(); // force redraw
  block.classList.add(TRANSITION_CLASS);
  block.style.transform = oldTransforms;
  block.addEventListener("transitionend", function () {
    block.removeAttribute("style");
  }, { once: true });
};

[].concat(_toConsumableArray(document.querySelectorAll(".block"))).forEach(function (block) {
  var buttonForBlock = block.querySelector(".block-content__button");
  block.addEventListener("click", function (event) {
    if (block.classList.contains(ACTIVE_CLASS) && event.target !== buttonForBlock) {
      return;
    }

    block.classList.remove(TRANSITION_CLASS);
    var inactiveRect = block.getBoundingClientRect();
    var oldTransforms = block.style.transform;

    block.classList.toggle(ACTIVE_CLASS);
    var activeRect = block.getBoundingClientRect();
    var transforms = getTransforms(inactiveRect, activeRect);

    animate(block, transforms, oldTransforms);
  });
});

/***/ })

/******/ });