(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.[jt]sx?$":
/*!****************************************************************************************************************!*\
  !*** ./assets/controllers/ sync ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \.[jt]sx?$ ***!
  \****************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var map = {
	"./hello_controller.js": "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.[jt]sx?$";

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json":
/*!************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/dist/webpack/loader.js!./assets/controllers.json ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var tom_select_dist_css_tom_select_default_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tom-select/dist/css/tom-select.default.css */ "./node_modules/tom-select/dist/css/tom-select.default.css");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  'symfony--ux-autocomplete--autocomplete': Promise.resolve(/*! import() eager */).then(__webpack_require__.bind(__webpack_require__, /*! @symfony/ux-autocomplete/dist/controller.js */ "./vendor/symfony/ux-autocomplete/assets/dist/controller.js")),
});

/***/ }),

/***/ "./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js":
/*!******************************************************************************************************************!*\
  !*** ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js!./assets/controllers/hello_controller.js ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _default)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.function.bind.js */ "./node_modules/core-js/modules/es.function.bind.js");
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.reflect.to-string-tag.js */ "./node_modules/core-js/modules/es.reflect.to-string-tag.js");
/* harmony import */ var core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.reflect.construct.js */ "./node_modules/core-js/modules/es.reflect.construct.js");
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! @hotwired/stimulus */ "./node_modules/@hotwired/stimulus/dist/stimulus.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }



















function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }


/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
var _default = /*#__PURE__*/function (_Controller) {
  _inherits(_default, _Controller);
  var _super = _createSuper(_default);
  function _default() {
    _classCallCheck(this, _default);
    return _super.apply(this, arguments);
  }
  _createClass(_default, [{
    key: "connect",
    value: function connect() {
      this.element.textContent = 'Hello Stimulus! Edit me in assets/controllers/hello_controller.js';
    }
  }]);
  return _default;
}(_hotwired_stimulus__WEBPACK_IMPORTED_MODULE_19__.Controller);


/***/ }),

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.css */ "./assets/styles/app.css");
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./bootstrap */ "./assets/bootstrap.js");
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)


// start the Stimulus application


/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "app": () => (/* binding */ app)
/* harmony export */ });
/* harmony import */ var _symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @symfony/stimulus-bridge */ "./node_modules/@symfony/stimulus-bridge/dist/index.js");


// Registers Stimulus controllers from controllers.json and in the controllers/ directory
var app = (0,_symfony_stimulus_bridge__WEBPACK_IMPORTED_MODULE_0__.startStimulusApp)(__webpack_require__("./assets/controllers sync recursive ./node_modules/@symfony/stimulus-bridge/lazy-controller-loader.js! \\.[jt]sx?$"));

// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);

/***/ }),

/***/ "./vendor/symfony/ux-autocomplete/assets/dist/controller.js":
/*!******************************************************************!*\
  !*** ./vendor/symfony/ux-autocomplete/assets/dist/controller.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ default_1)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.weak-set.js */ "./node_modules/core-js/modules/es.weak-set.js");
/* harmony import */ var core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_weak_set_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_object_assign_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.object.assign.js */ "./node_modules/core-js/modules/es.object.assign.js");
/* harmony import */ var core_js_modules_es_object_assign_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_assign_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.array.includes.js */ "./node_modules/core-js/modules/es.array.includes.js");
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.number.constructor.js */ "./node_modules/core-js/modules/es.number.constructor.js");
/* harmony import */ var core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_constructor_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.function.bind.js */ "./node_modules/core-js/modules/es.function.bind.js");
/* harmony import */ var core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_bind_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.reflect.to-string-tag.js */ "./node_modules/core-js/modules/es.reflect.to-string-tag.js");
/* harmony import */ var core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_to_string_tag_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.reflect.construct.js */ "./node_modules/core-js/modules/es.reflect.construct.js");
/* harmony import */ var core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_reflect_construct_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! core-js/modules/es.symbol.to-primitive.js */ "./node_modules/core-js/modules/es.symbol.to-primitive.js");
/* harmony import */ var core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_to_primitive_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! core-js/modules/es.date.to-primitive.js */ "./node_modules/core-js/modules/es.date.to-primitive.js");
/* harmony import */ var core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_primitive_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_25___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_25__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_26___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_26__);
/* harmony import */ var _hotwired_stimulus__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! @hotwired/stimulus */ "./node_modules/@hotwired/stimulus/dist/stimulus.js");
/* harmony import */ var tom_select__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! tom-select */ "./node_modules/tom-select/dist/js/tom-select.complete.js");
/* harmony import */ var tom_select__WEBPACK_IMPORTED_MODULE_28___default = /*#__PURE__*/__webpack_require__.n(tom_select__WEBPACK_IMPORTED_MODULE_28__);
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }
function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }
function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }
function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }
function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }
function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }
function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }






























/******************************************************************************
Copyright (c) Microsoft Corporation.

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
PERFORMANCE OF THIS SOFTWARE.
***************************************************************************** */

function __classPrivateFieldGet(receiver, state, kind, f) {
  if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a getter");
  if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot read private member from an object whose class did not declare it");
  return kind === "m" ? f : kind === "a" ? f.call(receiver) : f ? f.value : state.get(receiver);
}
var _default_1_instances, _default_1_getCommonConfig, _default_1_createAutocomplete, _default_1_createAutocompleteWithHtmlContents, _default_1_createAutocompleteWithRemoteData, _default_1_stripTags, _default_1_mergeObjects, _default_1_createTomSelect;
var default_1 = /*#__PURE__*/function (_Controller) {
  _inherits(default_1, _Controller);
  var _super = _createSuper(default_1);
  function default_1() {
    var _this;
    _classCallCheck(this, default_1);
    _this = _super.apply(this, arguments);
    _default_1_instances.add(_assertThisInitialized(_this));
    return _this;
  }
  _createClass(default_1, [{
    key: "initialize",
    value: function initialize() {
      this.element.setAttribute('data-live-ignore', '');
      if (this.element.id) {
        var label = document.querySelector("label[for=\"".concat(this.element.id, "\"]"));
        if (label) {
          label.setAttribute('data-live-ignore', '');
        }
      }
    }
  }, {
    key: "connect",
    value: function connect() {
      if (this.urlValue) {
        this.tomSelect = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createAutocompleteWithRemoteData).call(this, this.urlValue, this.minCharactersValue);
        return;
      }
      if (this.optionsAsHtmlValue) {
        this.tomSelect = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createAutocompleteWithHtmlContents).call(this);
        return;
      }
      this.tomSelect = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createAutocomplete).call(this);
    }
  }, {
    key: "disconnect",
    value: function disconnect() {
      this.tomSelect.revertSettings.innerHTML = this.element.innerHTML;
      this.tomSelect.destroy();
    }
  }, {
    key: "selectElement",
    get: function get() {
      if (!(this.element instanceof HTMLSelectElement)) {
        return null;
      }
      return this.element;
    }
  }, {
    key: "formElement",
    get: function get() {
      if (!(this.element instanceof HTMLInputElement) && !(this.element instanceof HTMLSelectElement)) {
        throw new Error('Autocomplete Stimulus controller can only be used on an <input> or <select>.');
      }
      return this.element;
    }
  }, {
    key: "dispatchEvent",
    value: function dispatchEvent(name, payload) {
      this.dispatch(name, {
        detail: payload,
        prefix: 'autocomplete'
      });
    }
  }, {
    key: "preload",
    get: function get() {
      if (!this.hasPreloadValue) {
        return 'focus';
      }
      if (this.preloadValue == 'false') {
        return false;
      }
      if (this.preloadValue == 'true') {
        return true;
      }
      return this.preloadValue;
    }
  }]);
  return default_1;
}(_hotwired_stimulus__WEBPACK_IMPORTED_MODULE_27__.Controller);
_default_1_instances = new WeakSet(), _default_1_getCommonConfig = function _default_1_getCommonConfig() {
  var _this2 = this;
  var plugins = {};
  var isMultiple = !this.selectElement || this.selectElement.multiple;
  if (!this.formElement.disabled && !isMultiple) {
    plugins.clear_button = {
      title: ''
    };
  }
  if (isMultiple) {
    plugins.remove_button = {
      title: ''
    };
  }
  if (this.urlValue) {
    plugins.virtual_scroll = {};
  }
  var render = {
    no_results: function no_results() {
      return "<div class=\"no-results\">".concat(_this2.noResultsFoundTextValue, "</div>");
    }
  };
  var config = {
    render: render,
    plugins: plugins,
    onItemAdd: function onItemAdd() {
      _this2.tomSelect.setTextboxValue('');
    },
    onInitialize: function onInitialize() {
      var tomSelect = this;
      tomSelect.wrapper.setAttribute('data-live-ignore', '');
    },
    closeAfterSelect: true
  };
  if (!this.selectElement && !this.urlValue) {
    config.shouldLoad = function () {
      return false;
    };
  }
  return __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_mergeObjects).call(this, config, this.tomSelectOptionsValue);
}, _default_1_createAutocomplete = function _default_1_createAutocomplete() {
  var config = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_mergeObjects).call(this, __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_getCommonConfig).call(this), {
    maxOptions: this.selectElement ? this.selectElement.options.length : 50
  });
  return __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createTomSelect).call(this, config);
}, _default_1_createAutocompleteWithHtmlContents = function _default_1_createAutocompleteWithHtmlContents() {
  var _this3 = this;
  var config = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_mergeObjects).call(this, __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_getCommonConfig).call(this), {
    maxOptions: this.selectElement ? this.selectElement.options.length : 50,
    score: function score(search) {
      var scoringFunction = _this3.tomSelect.getScoreFunction(search);
      return function (item) {
        return scoringFunction(Object.assign(Object.assign({}, item), {
          text: __classPrivateFieldGet(_this3, _default_1_instances, "m", _default_1_stripTags).call(_this3, item.text)
        }));
      };
    },
    render: {
      item: function item(_item) {
        return "<div>".concat(_item.text, "</div>");
      },
      option: function option(item) {
        return "<div>".concat(item.text, "</div>");
      }
    }
  });
  return __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createTomSelect).call(this, config);
}, _default_1_createAutocompleteWithRemoteData = function _default_1_createAutocompleteWithRemoteData(autocompleteEndpointUrl, minCharacterLength) {
  var _this5 = this;
  var config = __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_mergeObjects).call(this, __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_getCommonConfig).call(this), {
    firstUrl: function firstUrl(query) {
      var separator = autocompleteEndpointUrl.includes('?') ? '&' : '?';
      return "".concat(autocompleteEndpointUrl).concat(separator, "query=").concat(encodeURIComponent(query));
    },
    load: function load(query, callback) {
      var _this4 = this;
      var url = this.getUrl(query);
      fetch(url).then(function (response) {
        return response.json();
      }).then(function (json) {
        _this4.setNextUrl(query, json.next_page);
        callback(json.results);
      })["catch"](function () {
        return callback();
      });
    },
    shouldLoad: function shouldLoad(query) {
      return query.length >= minCharacterLength;
    },
    score: function score(search) {
      return function (item) {
        return 1;
      };
    },
    render: {
      option: function option(item) {
        return "<div>".concat(item.text, "</div>");
      },
      item: function item(_item2) {
        return "<div>".concat(_item2.text, "</div>");
      },
      no_more_results: function no_more_results() {
        return "<div class=\"no-more-results\">".concat(_this5.noMoreResultsTextValue, "</div>");
      },
      no_results: function no_results() {
        return "<div class=\"no-results\">".concat(_this5.noResultsFoundTextValue, "</div>");
      }
    },
    preload: this.preload
  });
  return __classPrivateFieldGet(this, _default_1_instances, "m", _default_1_createTomSelect).call(this, config);
}, _default_1_stripTags = function _default_1_stripTags(string) {
  return string.replace(/(<([^>]+)>)/gi, '');
}, _default_1_mergeObjects = function _default_1_mergeObjects(object1, object2) {
  return Object.assign(Object.assign({}, object1), object2);
}, _default_1_createTomSelect = function _default_1_createTomSelect(options) {
  this.dispatchEvent('pre-connect', {
    options: options
  });
  var tomSelect = new (tom_select__WEBPACK_IMPORTED_MODULE_28___default())(this.formElement, options);
  this.dispatchEvent('connect', {
    tomSelect: tomSelect,
    options: options
  });
  return tomSelect;
};
default_1.values = {
  url: String,
  optionsAsHtml: Boolean,
  noResultsFoundText: String,
  noMoreResultsText: String,
  minCharacters: {
    type: Number,
    "default": 3
  },
  tomSelectOptions: Object,
  preload: String
};


/***/ }),

/***/ "./assets/styles/app.css":
/*!*******************************!*\
  !*** ./assets/styles/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_symfony_stimulus-bridge_dist_index_js-node_modules_core-js_modules_es_ar-52ec79"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUMzQ0MsZ0JBQWdCLEVBQUV2QyxNQUFNO0VBQ3hCd0IsT0FBTyxFQUFFTztBQUNiLENBQUM7Ozs7Ozs7Ozs7Ozs7QUN0TUQiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vIFxcLltqdF1zeCIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY29udHJvbGxlcnMuanNvbiIsIndlYnBhY2s6Ly8vLi9hc3NldHMvY29udHJvbGxlcnMvaGVsbG9fY29udHJvbGxlci5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9ib290c3RyYXAuanMiLCJ3ZWJwYWNrOi8vLy4vdmVuZG9yL3N5bWZvbnkvdXgtYXV0b2NvbXBsZXRlL2Fzc2V0cy9kaXN0L2NvbnRyb2xsZXIuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuY3NzPzNmYmEiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIG1hcCA9IHtcblx0XCIuL2hlbGxvX2NvbnRyb2xsZXIuanNcIjogXCIuL25vZGVfbW9kdWxlcy9Ac3ltZm9ueS9zdGltdWx1cy1icmlkZ2UvbGF6eS1jb250cm9sbGVyLWxvYWRlci5qcyEuL2Fzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vYXNzZXRzL2NvbnRyb2xsZXJzIHN5bmMgcmVjdXJzaXZlIC4vbm9kZV9tb2R1bGVzL0BzeW1mb255L3N0aW11bHVzLWJyaWRnZS9sYXp5LWNvbnRyb2xsZXItbG9hZGVyLmpzISBcXFxcLltqdF1zeD8kXCI7IiwiaW1wb3J0ICd0b20tc2VsZWN0L2Rpc3QvY3NzL3RvbS1zZWxlY3QuZGVmYXVsdC5jc3MnO1xuZXhwb3J0IGRlZmF1bHQge1xuICAnc3ltZm9ueS0tdXgtYXV0b2NvbXBsZXRlLS1hdXRvY29tcGxldGUnOiBpbXBvcnQoLyogd2VicGFja01vZGU6IFwiZWFnZXJcIiAqLyAnQHN5bWZvbnkvdXgtYXV0b2NvbXBsZXRlL2Rpc3QvY29udHJvbGxlci5qcycpLFxufTsiLCJpbXBvcnQgeyBDb250cm9sbGVyIH0gZnJvbSAnQGhvdHdpcmVkL3N0aW11bHVzJztcblxuLypcbiAqIFRoaXMgaXMgYW4gZXhhbXBsZSBTdGltdWx1cyBjb250cm9sbGVyIVxuICpcbiAqIEFueSBlbGVtZW50IHdpdGggYSBkYXRhLWNvbnRyb2xsZXI9XCJoZWxsb1wiIGF0dHJpYnV0ZSB3aWxsIGNhdXNlXG4gKiB0aGlzIGNvbnRyb2xsZXIgdG8gYmUgZXhlY3V0ZWQuIFRoZSBuYW1lIFwiaGVsbG9cIiBjb21lcyBmcm9tIHRoZSBmaWxlbmFtZTpcbiAqIGhlbGxvX2NvbnRyb2xsZXIuanMgLT4gXCJoZWxsb1wiXG4gKlxuICogRGVsZXRlIHRoaXMgZmlsZSBvciBhZGFwdCBpdCBmb3IgeW91ciB1c2UhXG4gKi9cbmV4cG9ydCBkZWZhdWx0IGNsYXNzIGV4dGVuZHMgQ29udHJvbGxlciB7XG4gICAgY29ubmVjdCgpIHtcbiAgICAgICAgdGhpcy5lbGVtZW50LnRleHRDb250ZW50ID0gJ0hlbGxvIFN0aW11bHVzISBFZGl0IG1lIGluIGFzc2V0cy9jb250cm9sbGVycy9oZWxsb19jb250cm9sbGVyLmpzJztcbiAgICB9XG59XG4iLCIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuLy8gYW55IENTUyB5b3UgaW1wb3J0IHdpbGwgb3V0cHV0IGludG8gYSBzaW5nbGUgY3NzIGZpbGUgKGFwcC5jc3MgaW4gdGhpcyBjYXNlKVxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuY3NzJztcblxuLy8gc3RhcnQgdGhlIFN0aW11bHVzIGFwcGxpY2F0aW9uXG5pbXBvcnQgJy4vYm9vdHN0cmFwJztcbiIsImltcG9ydCB7IHN0YXJ0U3RpbXVsdXNBcHAgfSBmcm9tICdAc3ltZm9ueS9zdGltdWx1cy1icmlkZ2UnO1xuXG4vLyBSZWdpc3RlcnMgU3RpbXVsdXMgY29udHJvbGxlcnMgZnJvbSBjb250cm9sbGVycy5qc29uIGFuZCBpbiB0aGUgY29udHJvbGxlcnMvIGRpcmVjdG9yeVxuZXhwb3J0IGNvbnN0IGFwcCA9IHN0YXJ0U3RpbXVsdXNBcHAocmVxdWlyZS5jb250ZXh0KFxuICAgICdAc3ltZm9ueS9zdGltdWx1cy1icmlkZ2UvbGF6eS1jb250cm9sbGVyLWxvYWRlciEuL2NvbnRyb2xsZXJzJyxcbiAgICB0cnVlLFxuICAgIC9cXC5banRdc3g/JC9cbikpO1xuXG4vLyByZWdpc3RlciBhbnkgY3VzdG9tLCAzcmQgcGFydHkgY29udHJvbGxlcnMgaGVyZVxuLy8gYXBwLnJlZ2lzdGVyKCdzb21lX2NvbnRyb2xsZXJfbmFtZScsIFNvbWVJbXBvcnRlZENvbnRyb2xsZXIpO1xuIiwiaW1wb3J0IHsgQ29udHJvbGxlciB9IGZyb20gJ0Bob3R3aXJlZC9zdGltdWx1cyc7XG5pbXBvcnQgVG9tU2VsZWN0IGZyb20gJ3RvbS1zZWxlY3QnO1xuXG4vKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqXG5Db3B5cmlnaHQgKGMpIE1pY3Jvc29mdCBDb3Jwb3JhdGlvbi5cblxuUGVybWlzc2lvbiB0byB1c2UsIGNvcHksIG1vZGlmeSwgYW5kL29yIGRpc3RyaWJ1dGUgdGhpcyBzb2Z0d2FyZSBmb3IgYW55XG5wdXJwb3NlIHdpdGggb3Igd2l0aG91dCBmZWUgaXMgaGVyZWJ5IGdyYW50ZWQuXG5cblRIRSBTT0ZUV0FSRSBJUyBQUk9WSURFRCBcIkFTIElTXCIgQU5EIFRIRSBBVVRIT1IgRElTQ0xBSU1TIEFMTCBXQVJSQU5USUVTIFdJVEhcblJFR0FSRCBUTyBUSElTIFNPRlRXQVJFIElOQ0xVRElORyBBTEwgSU1QTElFRCBXQVJSQU5USUVTIE9GIE1FUkNIQU5UQUJJTElUWVxuQU5EIEZJVE5FU1MuIElOIE5PIEVWRU5UIFNIQUxMIFRIRSBBVVRIT1IgQkUgTElBQkxFIEZPUiBBTlkgU1BFQ0lBTCwgRElSRUNULFxuSU5ESVJFQ1QsIE9SIENPTlNFUVVFTlRJQUwgREFNQUdFUyBPUiBBTlkgREFNQUdFUyBXSEFUU09FVkVSIFJFU1VMVElORyBGUk9NXG5MT1NTIE9GIFVTRSwgREFUQSBPUiBQUk9GSVRTLCBXSEVUSEVSIElOIEFOIEFDVElPTiBPRiBDT05UUkFDVCwgTkVHTElHRU5DRSBPUlxuT1RIRVIgVE9SVElPVVMgQUNUSU9OLCBBUklTSU5HIE9VVCBPRiBPUiBJTiBDT05ORUNUSU9OIFdJVEggVEhFIFVTRSBPUlxuUEVSRk9STUFOQ0UgT0YgVEhJUyBTT0ZUV0FSRS5cbioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqKioqICovXG5cbmZ1bmN0aW9uIF9fY2xhc3NQcml2YXRlRmllbGRHZXQocmVjZWl2ZXIsIHN0YXRlLCBraW5kLCBmKSB7XG4gICAgaWYgKGtpbmQgPT09IFwiYVwiICYmICFmKSB0aHJvdyBuZXcgVHlwZUVycm9yKFwiUHJpdmF0ZSBhY2Nlc3NvciB3YXMgZGVmaW5lZCB3aXRob3V0IGEgZ2V0dGVyXCIpO1xuICAgIGlmICh0eXBlb2Ygc3RhdGUgPT09IFwiZnVuY3Rpb25cIiA/IHJlY2VpdmVyICE9PSBzdGF0ZSB8fCAhZiA6ICFzdGF0ZS5oYXMocmVjZWl2ZXIpKSB0aHJvdyBuZXcgVHlwZUVycm9yKFwiQ2Fubm90IHJlYWQgcHJpdmF0ZSBtZW1iZXIgZnJvbSBhbiBvYmplY3Qgd2hvc2UgY2xhc3MgZGlkIG5vdCBkZWNsYXJlIGl0XCIpO1xuICAgIHJldHVybiBraW5kID09PSBcIm1cIiA/IGYgOiBraW5kID09PSBcImFcIiA/IGYuY2FsbChyZWNlaXZlcikgOiBmID8gZi52YWx1ZSA6IHN0YXRlLmdldChyZWNlaXZlcik7XG59XG5cbnZhciBfZGVmYXVsdF8xX2luc3RhbmNlcywgX2RlZmF1bHRfMV9nZXRDb21tb25Db25maWcsIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlLCBfZGVmYXVsdF8xX2NyZWF0ZUF1dG9jb21wbGV0ZVdpdGhIdG1sQ29udGVudHMsIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlV2l0aFJlbW90ZURhdGEsIF9kZWZhdWx0XzFfc3RyaXBUYWdzLCBfZGVmYXVsdF8xX21lcmdlT2JqZWN0cywgX2RlZmF1bHRfMV9jcmVhdGVUb21TZWxlY3Q7XG5jbGFzcyBkZWZhdWx0XzEgZXh0ZW5kcyBDb250cm9sbGVyIHtcbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgc3VwZXIoLi4uYXJndW1lbnRzKTtcbiAgICAgICAgX2RlZmF1bHRfMV9pbnN0YW5jZXMuYWRkKHRoaXMpO1xuICAgIH1cbiAgICBpbml0aWFsaXplKCkge1xuICAgICAgICB0aGlzLmVsZW1lbnQuc2V0QXR0cmlidXRlKCdkYXRhLWxpdmUtaWdub3JlJywgJycpO1xuICAgICAgICBpZiAodGhpcy5lbGVtZW50LmlkKSB7XG4gICAgICAgICAgICBjb25zdCBsYWJlbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoYGxhYmVsW2Zvcj1cIiR7dGhpcy5lbGVtZW50LmlkfVwiXWApO1xuICAgICAgICAgICAgaWYgKGxhYmVsKSB7XG4gICAgICAgICAgICAgICAgbGFiZWwuc2V0QXR0cmlidXRlKCdkYXRhLWxpdmUtaWdub3JlJywgJycpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfVxuICAgIGNvbm5lY3QoKSB7XG4gICAgICAgIGlmICh0aGlzLnVybFZhbHVlKSB7XG4gICAgICAgICAgICB0aGlzLnRvbVNlbGVjdCA9IF9fY2xhc3NQcml2YXRlRmllbGRHZXQodGhpcywgX2RlZmF1bHRfMV9pbnN0YW5jZXMsIFwibVwiLCBfZGVmYXVsdF8xX2NyZWF0ZUF1dG9jb21wbGV0ZVdpdGhSZW1vdGVEYXRhKS5jYWxsKHRoaXMsIHRoaXMudXJsVmFsdWUsIHRoaXMubWluQ2hhcmFjdGVyc1ZhbHVlKTtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuICAgICAgICBpZiAodGhpcy5vcHRpb25zQXNIdG1sVmFsdWUpIHtcbiAgICAgICAgICAgIHRoaXMudG9tU2VsZWN0ID0gX19jbGFzc1ByaXZhdGVGaWVsZEdldCh0aGlzLCBfZGVmYXVsdF8xX2luc3RhbmNlcywgXCJtXCIsIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlV2l0aEh0bWxDb250ZW50cykuY2FsbCh0aGlzKTtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuICAgICAgICB0aGlzLnRvbVNlbGVjdCA9IF9fY2xhc3NQcml2YXRlRmllbGRHZXQodGhpcywgX2RlZmF1bHRfMV9pbnN0YW5jZXMsIFwibVwiLCBfZGVmYXVsdF8xX2NyZWF0ZUF1dG9jb21wbGV0ZSkuY2FsbCh0aGlzKTtcbiAgICB9XG4gICAgZGlzY29ubmVjdCgpIHtcbiAgICAgICAgdGhpcy50b21TZWxlY3QucmV2ZXJ0U2V0dGluZ3MuaW5uZXJIVE1MID0gdGhpcy5lbGVtZW50LmlubmVySFRNTDtcbiAgICAgICAgdGhpcy50b21TZWxlY3QuZGVzdHJveSgpO1xuICAgIH1cbiAgICBnZXQgc2VsZWN0RWxlbWVudCgpIHtcbiAgICAgICAgaWYgKCEodGhpcy5lbGVtZW50IGluc3RhbmNlb2YgSFRNTFNlbGVjdEVsZW1lbnQpKSB7XG4gICAgICAgICAgICByZXR1cm4gbnVsbDtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdGhpcy5lbGVtZW50O1xuICAgIH1cbiAgICBnZXQgZm9ybUVsZW1lbnQoKSB7XG4gICAgICAgIGlmICghKHRoaXMuZWxlbWVudCBpbnN0YW5jZW9mIEhUTUxJbnB1dEVsZW1lbnQpICYmICEodGhpcy5lbGVtZW50IGluc3RhbmNlb2YgSFRNTFNlbGVjdEVsZW1lbnQpKSB7XG4gICAgICAgICAgICB0aHJvdyBuZXcgRXJyb3IoJ0F1dG9jb21wbGV0ZSBTdGltdWx1cyBjb250cm9sbGVyIGNhbiBvbmx5IGJlIHVzZWQgb24gYW4gPGlucHV0PiBvciA8c2VsZWN0Pi4nKTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdGhpcy5lbGVtZW50O1xuICAgIH1cbiAgICBkaXNwYXRjaEV2ZW50KG5hbWUsIHBheWxvYWQpIHtcbiAgICAgICAgdGhpcy5kaXNwYXRjaChuYW1lLCB7IGRldGFpbDogcGF5bG9hZCwgcHJlZml4OiAnYXV0b2NvbXBsZXRlJyB9KTtcbiAgICB9XG4gICAgZ2V0IHByZWxvYWQoKSB7XG4gICAgICAgIGlmICghdGhpcy5oYXNQcmVsb2FkVmFsdWUpIHtcbiAgICAgICAgICAgIHJldHVybiAnZm9jdXMnO1xuICAgICAgICB9XG4gICAgICAgIGlmICh0aGlzLnByZWxvYWRWYWx1ZSA9PSAnZmFsc2UnKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICAgICAgaWYgKHRoaXMucHJlbG9hZFZhbHVlID09ICd0cnVlJykge1xuICAgICAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHRoaXMucHJlbG9hZFZhbHVlO1xuICAgIH1cbn1cbl9kZWZhdWx0XzFfaW5zdGFuY2VzID0gbmV3IFdlYWtTZXQoKSwgX2RlZmF1bHRfMV9nZXRDb21tb25Db25maWcgPSBmdW5jdGlvbiBfZGVmYXVsdF8xX2dldENvbW1vbkNvbmZpZygpIHtcbiAgICBjb25zdCBwbHVnaW5zID0ge307XG4gICAgY29uc3QgaXNNdWx0aXBsZSA9ICF0aGlzLnNlbGVjdEVsZW1lbnQgfHwgdGhpcy5zZWxlY3RFbGVtZW50Lm11bHRpcGxlO1xuICAgIGlmICghdGhpcy5mb3JtRWxlbWVudC5kaXNhYmxlZCAmJiAhaXNNdWx0aXBsZSkge1xuICAgICAgICBwbHVnaW5zLmNsZWFyX2J1dHRvbiA9IHsgdGl0bGU6ICcnIH07XG4gICAgfVxuICAgIGlmIChpc011bHRpcGxlKSB7XG4gICAgICAgIHBsdWdpbnMucmVtb3ZlX2J1dHRvbiA9IHsgdGl0bGU6ICcnIH07XG4gICAgfVxuICAgIGlmICh0aGlzLnVybFZhbHVlKSB7XG4gICAgICAgIHBsdWdpbnMudmlydHVhbF9zY3JvbGwgPSB7fTtcbiAgICB9XG4gICAgY29uc3QgcmVuZGVyID0ge1xuICAgICAgICBub19yZXN1bHRzOiAoKSA9PiB7XG4gICAgICAgICAgICByZXR1cm4gYDxkaXYgY2xhc3M9XCJuby1yZXN1bHRzXCI+JHt0aGlzLm5vUmVzdWx0c0ZvdW5kVGV4dFZhbHVlfTwvZGl2PmA7XG4gICAgICAgIH0sXG4gICAgfTtcbiAgICBjb25zdCBjb25maWcgPSB7XG4gICAgICAgIHJlbmRlcixcbiAgICAgICAgcGx1Z2lucyxcbiAgICAgICAgb25JdGVtQWRkOiAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnRvbVNlbGVjdC5zZXRUZXh0Ym94VmFsdWUoJycpO1xuICAgICAgICB9LFxuICAgICAgICBvbkluaXRpYWxpemU6IGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIGNvbnN0IHRvbVNlbGVjdCA9IHRoaXM7XG4gICAgICAgICAgICB0b21TZWxlY3Qud3JhcHBlci5zZXRBdHRyaWJ1dGUoJ2RhdGEtbGl2ZS1pZ25vcmUnLCAnJyk7XG4gICAgICAgIH0sXG4gICAgICAgIGNsb3NlQWZ0ZXJTZWxlY3Q6IHRydWUsXG4gICAgfTtcbiAgICBpZiAoIXRoaXMuc2VsZWN0RWxlbWVudCAmJiAhdGhpcy51cmxWYWx1ZSkge1xuICAgICAgICBjb25maWcuc2hvdWxkTG9hZCA9ICgpID0+IGZhbHNlO1xuICAgIH1cbiAgICByZXR1cm4gX19jbGFzc1ByaXZhdGVGaWVsZEdldCh0aGlzLCBfZGVmYXVsdF8xX2luc3RhbmNlcywgXCJtXCIsIF9kZWZhdWx0XzFfbWVyZ2VPYmplY3RzKS5jYWxsKHRoaXMsIGNvbmZpZywgdGhpcy50b21TZWxlY3RPcHRpb25zVmFsdWUpO1xufSwgX2RlZmF1bHRfMV9jcmVhdGVBdXRvY29tcGxldGUgPSBmdW5jdGlvbiBfZGVmYXVsdF8xX2NyZWF0ZUF1dG9jb21wbGV0ZSgpIHtcbiAgICBjb25zdCBjb25maWcgPSBfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0KHRoaXMsIF9kZWZhdWx0XzFfaW5zdGFuY2VzLCBcIm1cIiwgX2RlZmF1bHRfMV9tZXJnZU9iamVjdHMpLmNhbGwodGhpcywgX19jbGFzc1ByaXZhdGVGaWVsZEdldCh0aGlzLCBfZGVmYXVsdF8xX2luc3RhbmNlcywgXCJtXCIsIF9kZWZhdWx0XzFfZ2V0Q29tbW9uQ29uZmlnKS5jYWxsKHRoaXMpLCB7XG4gICAgICAgIG1heE9wdGlvbnM6IHRoaXMuc2VsZWN0RWxlbWVudCA/IHRoaXMuc2VsZWN0RWxlbWVudC5vcHRpb25zLmxlbmd0aCA6IDUwLFxuICAgIH0pO1xuICAgIHJldHVybiBfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0KHRoaXMsIF9kZWZhdWx0XzFfaW5zdGFuY2VzLCBcIm1cIiwgX2RlZmF1bHRfMV9jcmVhdGVUb21TZWxlY3QpLmNhbGwodGhpcywgY29uZmlnKTtcbn0sIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlV2l0aEh0bWxDb250ZW50cyA9IGZ1bmN0aW9uIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlV2l0aEh0bWxDb250ZW50cygpIHtcbiAgICBjb25zdCBjb25maWcgPSBfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0KHRoaXMsIF9kZWZhdWx0XzFfaW5zdGFuY2VzLCBcIm1cIiwgX2RlZmF1bHRfMV9tZXJnZU9iamVjdHMpLmNhbGwodGhpcywgX19jbGFzc1ByaXZhdGVGaWVsZEdldCh0aGlzLCBfZGVmYXVsdF8xX2luc3RhbmNlcywgXCJtXCIsIF9kZWZhdWx0XzFfZ2V0Q29tbW9uQ29uZmlnKS5jYWxsKHRoaXMpLCB7XG4gICAgICAgIG1heE9wdGlvbnM6IHRoaXMuc2VsZWN0RWxlbWVudCA/IHRoaXMuc2VsZWN0RWxlbWVudC5vcHRpb25zLmxlbmd0aCA6IDUwLFxuICAgICAgICBzY29yZTogKHNlYXJjaCkgPT4ge1xuICAgICAgICAgICAgY29uc3Qgc2NvcmluZ0Z1bmN0aW9uID0gdGhpcy50b21TZWxlY3QuZ2V0U2NvcmVGdW5jdGlvbihzZWFyY2gpO1xuICAgICAgICAgICAgcmV0dXJuIChpdGVtKSA9PiB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIHNjb3JpbmdGdW5jdGlvbihPYmplY3QuYXNzaWduKE9iamVjdC5hc3NpZ24oe30sIGl0ZW0pLCB7IHRleHQ6IF9fY2xhc3NQcml2YXRlRmllbGRHZXQodGhpcywgX2RlZmF1bHRfMV9pbnN0YW5jZXMsIFwibVwiLCBfZGVmYXVsdF8xX3N0cmlwVGFncykuY2FsbCh0aGlzLCBpdGVtLnRleHQpIH0pKTtcbiAgICAgICAgICAgIH07XG4gICAgICAgIH0sXG4gICAgICAgIHJlbmRlcjoge1xuICAgICAgICAgICAgaXRlbTogZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gYDxkaXY+JHtpdGVtLnRleHR9PC9kaXY+YDtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBvcHRpb246IGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIGA8ZGl2PiR7aXRlbS50ZXh0fTwvZGl2PmA7XG4gICAgICAgICAgICB9LFxuICAgICAgICB9LFxuICAgIH0pO1xuICAgIHJldHVybiBfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0KHRoaXMsIF9kZWZhdWx0XzFfaW5zdGFuY2VzLCBcIm1cIiwgX2RlZmF1bHRfMV9jcmVhdGVUb21TZWxlY3QpLmNhbGwodGhpcywgY29uZmlnKTtcbn0sIF9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlV2l0aFJlbW90ZURhdGEgPSBmdW5jdGlvbiBfZGVmYXVsdF8xX2NyZWF0ZUF1dG9jb21wbGV0ZVdpdGhSZW1vdGVEYXRhKGF1dG9jb21wbGV0ZUVuZHBvaW50VXJsLCBtaW5DaGFyYWN0ZXJMZW5ndGgpIHtcbiAgICBjb25zdCBjb25maWcgPSBfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0KHRoaXMsIF9kZWZhdWx0XzFfaW5zdGFuY2VzLCBcIm1cIiwgX2RlZmF1bHRfMV9tZXJnZU9iamVjdHMpLmNhbGwodGhpcywgX19jbGFzc1ByaXZhdGVGaWVsZEdldCh0aGlzLCBfZGVmYXVsdF8xX2luc3RhbmNlcywgXCJtXCIsIF9kZWZhdWx0XzFfZ2V0Q29tbW9uQ29uZmlnKS5jYWxsKHRoaXMpLCB7XG4gICAgICAgIGZpcnN0VXJsOiAocXVlcnkpID0+IHtcbiAgICAgICAgICAgIGNvbnN0IHNlcGFyYXRvciA9IGF1dG9jb21wbGV0ZUVuZHBvaW50VXJsLmluY2x1ZGVzKCc/JykgPyAnJicgOiAnPyc7XG4gICAgICAgICAgICByZXR1cm4gYCR7YXV0b2NvbXBsZXRlRW5kcG9pbnRVcmx9JHtzZXBhcmF0b3J9cXVlcnk9JHtlbmNvZGVVUklDb21wb25lbnQocXVlcnkpfWA7XG4gICAgICAgIH0sXG4gICAgICAgIGxvYWQ6IGZ1bmN0aW9uIChxdWVyeSwgY2FsbGJhY2spIHtcbiAgICAgICAgICAgIGNvbnN0IHVybCA9IHRoaXMuZ2V0VXJsKHF1ZXJ5KTtcbiAgICAgICAgICAgIGZldGNoKHVybClcbiAgICAgICAgICAgICAgICAudGhlbigocmVzcG9uc2UpID0+IHJlc3BvbnNlLmpzb24oKSlcbiAgICAgICAgICAgICAgICAudGhlbigoanNvbikgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuc2V0TmV4dFVybChxdWVyeSwganNvbi5uZXh0X3BhZ2UpO1xuICAgICAgICAgICAgICAgIGNhbGxiYWNrKGpzb24ucmVzdWx0cyk7XG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5jYXRjaCgoKSA9PiBjYWxsYmFjaygpKTtcbiAgICAgICAgfSxcbiAgICAgICAgc2hvdWxkTG9hZDogZnVuY3Rpb24gKHF1ZXJ5KSB7XG4gICAgICAgICAgICByZXR1cm4gcXVlcnkubGVuZ3RoID49IG1pbkNoYXJhY3Rlckxlbmd0aDtcbiAgICAgICAgfSxcbiAgICAgICAgc2NvcmU6IGZ1bmN0aW9uIChzZWFyY2gpIHtcbiAgICAgICAgICAgIHJldHVybiBmdW5jdGlvbiAoaXRlbSkge1xuICAgICAgICAgICAgICAgIHJldHVybiAxO1xuICAgICAgICAgICAgfTtcbiAgICAgICAgfSxcbiAgICAgICAgcmVuZGVyOiB7XG4gICAgICAgICAgICBvcHRpb246IGZ1bmN0aW9uIChpdGVtKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIGA8ZGl2PiR7aXRlbS50ZXh0fTwvZGl2PmA7XG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgaXRlbTogZnVuY3Rpb24gKGl0ZW0pIHtcbiAgICAgICAgICAgICAgICByZXR1cm4gYDxkaXY+JHtpdGVtLnRleHR9PC9kaXY+YDtcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBub19tb3JlX3Jlc3VsdHM6ICgpID0+IHtcbiAgICAgICAgICAgICAgICByZXR1cm4gYDxkaXYgY2xhc3M9XCJuby1tb3JlLXJlc3VsdHNcIj4ke3RoaXMubm9Nb3JlUmVzdWx0c1RleHRWYWx1ZX08L2Rpdj5gO1xuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIG5vX3Jlc3VsdHM6ICgpID0+IHtcbiAgICAgICAgICAgICAgICByZXR1cm4gYDxkaXYgY2xhc3M9XCJuby1yZXN1bHRzXCI+JHt0aGlzLm5vUmVzdWx0c0ZvdW5kVGV4dFZhbHVlfTwvZGl2PmA7XG4gICAgICAgICAgICB9LFxuICAgICAgICB9LFxuICAgICAgICBwcmVsb2FkOiB0aGlzLnByZWxvYWQsXG4gICAgfSk7XG4gICAgcmV0dXJuIF9fY2xhc3NQcml2YXRlRmllbGRHZXQodGhpcywgX2RlZmF1bHRfMV9pbnN0YW5jZXMsIFwibVwiLCBfZGVmYXVsdF8xX2NyZWF0ZVRvbVNlbGVjdCkuY2FsbCh0aGlzLCBjb25maWcpO1xufSwgX2RlZmF1bHRfMV9zdHJpcFRhZ3MgPSBmdW5jdGlvbiBfZGVmYXVsdF8xX3N0cmlwVGFncyhzdHJpbmcpIHtcbiAgICByZXR1cm4gc3RyaW5nLnJlcGxhY2UoLyg8KFtePl0rKT4pL2dpLCAnJyk7XG59LCBfZGVmYXVsdF8xX21lcmdlT2JqZWN0cyA9IGZ1bmN0aW9uIF9kZWZhdWx0XzFfbWVyZ2VPYmplY3RzKG9iamVjdDEsIG9iamVjdDIpIHtcbiAgICByZXR1cm4gT2JqZWN0LmFzc2lnbihPYmplY3QuYXNzaWduKHt9LCBvYmplY3QxKSwgb2JqZWN0Mik7XG59LCBfZGVmYXVsdF8xX2NyZWF0ZVRvbVNlbGVjdCA9IGZ1bmN0aW9uIF9kZWZhdWx0XzFfY3JlYXRlVG9tU2VsZWN0KG9wdGlvbnMpIHtcbiAgICB0aGlzLmRpc3BhdGNoRXZlbnQoJ3ByZS1jb25uZWN0JywgeyBvcHRpb25zIH0pO1xuICAgIGNvbnN0IHRvbVNlbGVjdCA9IG5ldyBUb21TZWxlY3QodGhpcy5mb3JtRWxlbWVudCwgb3B0aW9ucyk7XG4gICAgdGhpcy5kaXNwYXRjaEV2ZW50KCdjb25uZWN0JywgeyB0b21TZWxlY3QsIG9wdGlvbnMgfSk7XG4gICAgcmV0dXJuIHRvbVNlbGVjdDtcbn07XG5kZWZhdWx0XzEudmFsdWVzID0ge1xuICAgIHVybDogU3RyaW5nLFxuICAgIG9wdGlvbnNBc0h0bWw6IEJvb2xlYW4sXG4gICAgbm9SZXN1bHRzRm91bmRUZXh0OiBTdHJpbmcsXG4gICAgbm9Nb3JlUmVzdWx0c1RleHQ6IFN0cmluZyxcbiAgICBtaW5DaGFyYWN0ZXJzOiB7IHR5cGU6IE51bWJlciwgZGVmYXVsdDogMyB9LFxuICAgIHRvbVNlbGVjdE9wdGlvbnM6IE9iamVjdCxcbiAgICBwcmVsb2FkOiBTdHJpbmcsXG59O1xuXG5leHBvcnQgeyBkZWZhdWx0XzEgYXMgZGVmYXVsdCB9O1xuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbIkNvbnRyb2xsZXIiLCJlbGVtZW50IiwidGV4dENvbnRlbnQiLCJzdGFydFN0aW11bHVzQXBwIiwiYXBwIiwicmVxdWlyZSIsImNvbnRleHQiLCJUb21TZWxlY3QiLCJfX2NsYXNzUHJpdmF0ZUZpZWxkR2V0IiwicmVjZWl2ZXIiLCJzdGF0ZSIsImtpbmQiLCJmIiwiVHlwZUVycm9yIiwiaGFzIiwiY2FsbCIsInZhbHVlIiwiZ2V0IiwiX2RlZmF1bHRfMV9pbnN0YW5jZXMiLCJfZGVmYXVsdF8xX2dldENvbW1vbkNvbmZpZyIsIl9kZWZhdWx0XzFfY3JlYXRlQXV0b2NvbXBsZXRlIiwiX2RlZmF1bHRfMV9jcmVhdGVBdXRvY29tcGxldGVXaXRoSHRtbENvbnRlbnRzIiwiX2RlZmF1bHRfMV9jcmVhdGVBdXRvY29tcGxldGVXaXRoUmVtb3RlRGF0YSIsIl9kZWZhdWx0XzFfc3RyaXBUYWdzIiwiX2RlZmF1bHRfMV9tZXJnZU9iamVjdHMiLCJfZGVmYXVsdF8xX2NyZWF0ZVRvbVNlbGVjdCIsImRlZmF1bHRfMSIsImFyZ3VtZW50cyIsImFkZCIsInNldEF0dHJpYnV0ZSIsImlkIiwibGFiZWwiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJ1cmxWYWx1ZSIsInRvbVNlbGVjdCIsIm1pbkNoYXJhY3RlcnNWYWx1ZSIsIm9wdGlvbnNBc0h0bWxWYWx1ZSIsInJldmVydFNldHRpbmdzIiwiaW5uZXJIVE1MIiwiZGVzdHJveSIsIkhUTUxTZWxlY3RFbGVtZW50IiwiSFRNTElucHV0RWxlbWVudCIsIkVycm9yIiwibmFtZSIsInBheWxvYWQiLCJkaXNwYXRjaCIsImRldGFpbCIsInByZWZpeCIsImhhc1ByZWxvYWRWYWx1ZSIsInByZWxvYWRWYWx1ZSIsIldlYWtTZXQiLCJwbHVnaW5zIiwiaXNNdWx0aXBsZSIsInNlbGVjdEVsZW1lbnQiLCJtdWx0aXBsZSIsImZvcm1FbGVtZW50IiwiZGlzYWJsZWQiLCJjbGVhcl9idXR0b24iLCJ0aXRsZSIsInJlbW92ZV9idXR0b24iLCJ2aXJ0dWFsX3Njcm9sbCIsInJlbmRlciIsIm5vX3Jlc3VsdHMiLCJub1Jlc3VsdHNGb3VuZFRleHRWYWx1ZSIsImNvbmZpZyIsIm9uSXRlbUFkZCIsInNldFRleHRib3hWYWx1ZSIsIm9uSW5pdGlhbGl6ZSIsIndyYXBwZXIiLCJjbG9zZUFmdGVyU2VsZWN0Iiwic2hvdWxkTG9hZCIsInRvbVNlbGVjdE9wdGlvbnNWYWx1ZSIsIm1heE9wdGlvbnMiLCJvcHRpb25zIiwibGVuZ3RoIiwic2NvcmUiLCJzZWFyY2giLCJzY29yaW5nRnVuY3Rpb24iLCJnZXRTY29yZUZ1bmN0aW9uIiwiaXRlbSIsIk9iamVjdCIsImFzc2lnbiIsInRleHQiLCJvcHRpb24iLCJhdXRvY29tcGxldGVFbmRwb2ludFVybCIsIm1pbkNoYXJhY3Rlckxlbmd0aCIsImZpcnN0VXJsIiwicXVlcnkiLCJzZXBhcmF0b3IiLCJpbmNsdWRlcyIsImVuY29kZVVSSUNvbXBvbmVudCIsImxvYWQiLCJjYWxsYmFjayIsInVybCIsImdldFVybCIsImZldGNoIiwidGhlbiIsInJlc3BvbnNlIiwianNvbiIsInNldE5leHRVcmwiLCJuZXh0X3BhZ2UiLCJyZXN1bHRzIiwibm9fbW9yZV9yZXN1bHRzIiwibm9Nb3JlUmVzdWx0c1RleHRWYWx1ZSIsInByZWxvYWQiLCJzdHJpbmciLCJyZXBsYWNlIiwib2JqZWN0MSIsIm9iamVjdDIiLCJkaXNwYXRjaEV2ZW50IiwidmFsdWVzIiwiU3RyaW5nIiwib3B0aW9uc0FzSHRtbCIsIkJvb2xlYW4iLCJub1Jlc3VsdHNGb3VuZFRleHQiLCJub01vcmVSZXN1bHRzVGV4dCIsIm1pbkNoYXJhY3RlcnMiLCJ0eXBlIiwiTnVtYmVyIiwidG9tU2VsZWN0T3B0aW9ucyIsImRlZmF1bHQiXSwic291cmNlUm9vdCI6IiJ9