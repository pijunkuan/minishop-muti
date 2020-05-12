(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-3fc9c540"],{

/***/ "1922":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wallet_vue_vue_type_style_index_0_id_161667f7_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("59e4");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wallet_vue_vue_type_style_index_0_id_161667f7_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wallet_vue_vue_type_style_index_0_id_161667f7_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Wallet_vue_vue_type_style_index_0_id_161667f7_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "59e4":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "5fbe":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Wallet.vue?vue&type=template&id=161667f7&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"user-wallet-header"},[_c('div',[_vm._v("我的余额")]),_c('div',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.$store.getters.balance))])])]),_c('div',{staticClass:"user-wallet-button"},[_c('shop-button',[_vm._v("我要充值")])],1)])}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/User/Wallet.vue?vue&type=template&id=161667f7&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Wallet.vue?vue&type=script&lang=js&

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

/* harmony default export */ var Walletvue_type_script_lang_js_ = ({
  created: function created() {
    this.getBalance();
  },
  methods: {
    getBalance: function getBalance() {
      var _this = this;

      this.$store.dispatch('getBalance').then(function () {}).catch(function (e) {
        if (e.response.status === 401) {
          _this.$store.dispatch('logout');

          Object(mint_ui_common["Toast"])({
            message: '登录超时',
            duration: 1000
          });
          setTimeout(function () {
            _this.$router.push({
              name: 'Login',
              query: {
                from: _this.$route.name
              }
            });
          }, 1000);
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./src/pages/User/Wallet.vue?vue&type=script&lang=js&
 /* harmony default export */ var User_Walletvue_type_script_lang_js_ = (Walletvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/User/Wallet.vue?vue&type=style&index=0&id=161667f7&lang=scss&scoped=true&
var Walletvue_type_style_index_0_id_161667f7_lang_scss_scoped_true_ = __webpack_require__("1922");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/User/Wallet.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  User_Walletvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "161667f7",
  null
  
)

/* harmony default export */ var Wallet = __webpack_exports__["default"] = (component.exports);

/***/ })

}]);