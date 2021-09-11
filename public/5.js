(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[5],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Common/Footer.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Common/Footer.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../constants */ "./resources/js/constants.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Footer',
  data: function data() {
    return {
      main_menu: _constants__WEBPACK_IMPORTED_MODULE_0__["MainMenu"]
    };
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31& ***!
  \*****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "footer-area" }, [
    _c("div", { staticClass: "container wow fadeIn" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12 col-lg-12 col-sm-12 col-xs-12" }, [
          _c("div", { staticClass: "footer-top section-padding text-center" }, [
            _c("div", { staticClass: "footer-logo" }, [
              _c("a", { attrs: { href: _vm.main_menu[0].REDIRECT } }, [
                _c("img", {
                  attrs: {
                    src: "//files.chefmorrisdanzen.com/img/logo/logo-light.png",
                    alt: "Logo"
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _vm._m(0),
            _vm._v(" "),
            _vm._m(1)
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-6 col-lg-6 col-sm-12 col-xs-12" }, [
          _c("div", { staticClass: "footer-menu" }, [
            _c("ul", [
              _c(
                "li",
                _vm._l(_vm.main_menu, function(menu) {
                  return _c("a", { attrs: { href: menu.REDIRECT } }, [
                    _vm._v(_vm._s(menu.NAME))
                  ])
                }),
                0
              )
            ])
          ])
        ]),
        _vm._v(" "),
        _vm._m(2)
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "footer-address" }, [
      _c("p", [_vm._v("Sicily, Italy")]),
      _vm._v(" "),
      _c("p", [
        _c("a", { attrs: { href: "mailto:chefmorrisdanzen@gmail.com" } }, [
          _vm._v("chefmorrisdanzen@gmail.com")
        ])
      ]),
      _vm._v(" "),
      _c("p", [_c("a", [_vm._v("+39 351 267 1387")])])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "footer-social-bookmark" }, [
      _c("ul", [
        _c("li", [
          _c(
            "a",
            {
              attrs: {
                href: "//www.youtube.com/Chef%20Morris%20Danzen",
                target: "_blank",
                rel: "noopener noreferrer"
              }
            },
            [_c("i", { staticClass: "fa fa-youtube-play" })]
          )
        ]),
        _vm._v(" "),
        _c("li", [
          _c(
            "a",
            {
              attrs: {
                href: "//www.facebook.com/Chefmorrisdanzen",
                target: "_blank",
                rel: "noopener noreferrer"
              }
            },
            [_c("i", { staticClass: "fa fa-facebook" })]
          )
        ]),
        _vm._v(" "),
        _c("li", [
          _c(
            "a",
            {
              attrs: {
                href: "//api.whatsapp.com/send?phone=393512671387",
                target: "_blank",
                rel: "noopener noreferrer"
              }
            },
            [_c("i", { staticClass: "fa fa-whatsapp" })]
          )
        ]),
        _vm._v(" "),
        _c("li", [
          _c(
            "a",
            {
              attrs: {
                href: "//www.instagram.com/chef_morrisdanzen/",
                target: "_blank",
                rel: "noopener noreferrer"
              }
            },
            [_c("i", { staticClass: "fa fa-instagram" })]
          )
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-6 col-lg-6 col-sm-12 col-xs-12" }, [
      _c("div", { staticClass: "footer-copyright" }, [
        _c("p", [
          _vm._v("Copyright © "),
          _c("a", [_vm._v("Chef Morris Danzen")]),
          _vm._v(". All Rights Reserved")
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Common/Footer.vue":
/*!****************************************!*\
  !*** ./resources/js/Common/Footer.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Footer.vue?vue&type=template&id=37a40d31& */ "./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31&");
/* harmony import */ var _Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Footer.vue?vue&type=script&lang=js& */ "./resources/js/Common/Footer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Common/Footer.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Common/Footer.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/Common/Footer.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Footer.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Common/Footer.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31&":
/*!***********************************************************************!*\
  !*** ./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Footer.vue?vue&type=template&id=37a40d31& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Common/Footer.vue?vue&type=template&id=37a40d31&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Footer_vue_vue_type_template_id_37a40d31___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);