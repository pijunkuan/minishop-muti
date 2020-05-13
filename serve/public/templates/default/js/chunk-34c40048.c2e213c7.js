(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-34c40048"],{

/***/ "3119":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "7d57":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Login/Forget.vue?vue&type=template&id=d8ab9a6e&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"login-background"},[_c('page-loading',{attrs:{"loading":_vm.loading}}),_c('div',{staticClass:"login-form"},[_c('shop-image',{staticClass:"login-form-avatar",attrs:{"width":80,"circled":""}},[_c('div',{attrs:{"slot":"placeholder"},slot:"placeholder"},[_c('shop-icon',{staticStyle:{"background-color":"#fff"},attrs:{"name":"iconzhucetouxiang"}})],1),_c('div',{attrs:{"slot":"error"},slot:"error"},[_c('shop-icon',{staticStyle:{"background-color":"#fff"},attrs:{"name":"iconzhucetouxiang"}})],1)]),_c('div',{staticClass:"login-form-switch"},[_c('div',{staticStyle:{"width":"50%"}},[_c('shop-button',{attrs:{"type":_vm.regType === 'phone' ? 'default' : 'border',"rounded":false,"size":"medium"},on:{"click":function($event){return _vm.changeType('email','phone')}}},[_vm._v("手机找回")])],1),_c('div',{staticStyle:{"width":"50%"}},[_c('shop-button',{attrs:{"type":_vm.regType === 'email' ? 'default' : 'border',"rounded":false,"size":"medium"},on:{"click":function($event){return _vm.changeType('phone','email')}}},[_vm._v("邮箱找回")])],1)]),(_vm.regType === 'email')?_c('shop-input',{ref:"email",staticClass:"login-form-input",attrs:{"validate":"","rules":_vm.rules.email},model:{value:(_vm.user.email),callback:function ($$v) {_vm.$set(_vm.user, "email", $$v)},expression:"user.email"}},[_c('span',{staticClass:"login-prepend",attrs:{"slot":"prepend"},slot:"prepend"},[_vm._v("邮箱")])]):_vm._e(),(_vm.regType === 'phone')?_c('shop-input',{ref:"phone",staticClass:"login-form-input",attrs:{"validate":"","rules":_vm.rules.phone},model:{value:(_vm.user.phone),callback:function ($$v) {_vm.$set(_vm.user, "phone", $$v)},expression:"user.phone"}},[_c('span',{staticClass:"login-prepend",attrs:{"slot":"prepend"},slot:"prepend"},[_vm._v("手机号")])]):_vm._e(),_c('shop-button',{staticClass:"login-form-button",on:{"click":_vm.confirmForget}},[_vm._v("忘记密码")]),_c('div',{staticClass:"login-form-bottom"},[_c('div',[_vm._v("已有账号？"),_c('div',{staticClass:"bottom-btn",on:{"click":_vm.toLogin}},[_vm._v("登录")])]),_c('div',{staticClass:"bottom-btn",on:{"click":_vm.toRegister}},[_vm._v("注册账号")])])],1)],1)}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/Login/Forget.vue?vue&type=template&id=d8ab9a6e&scoped=true&

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Login/Forget.vue?vue&type=script&lang=js&
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

/* harmony default export */ var Forgetvue_type_script_lang_js_ = ({
  data: function data() {
    return {
      regType: 'phone',
      user: {
        email: '',
        phone: ''
      },
      rules: {
        email: [{
          required: true,
          message: '请输入邮箱'
        }],
        phone: [{
          required: true,
          message: '请输入手机号'
        }]
      },
      loading: false
    };
  },
  created: function created() {
    var _this = this;

    setTimeout(function () {
      _this.loading = true;
    }, 500);
    setTimeout(function () {
      _this.loading = false;
    }, 2000);
  },
  methods: {
    changeType: function changeType(oritype, type) {
      this.$refs[oritype].clearValidate();
      this.regType = type;
    },
    toLogin: function toLogin() {
      this.$router.push({
        name: 'Login'
      });
    },
    toRegister: function toRegister() {
      this.$router.push({
        name: 'Register'
      });
    },
    confirmForget: function confirmForget() {
      var _this2 = this;

      this.$refs.phone.validation(function (valid) {
        if (valid) {
          _this2.$refs.email.validation(function (validate) {
            if (validate) {
              Object(mint_ui_common["Toast"])('登录成功');
              setTimeout(function () {
                _this2.$refs.username.clearValidate();

                _this2.$refs.password.clearValidate();
              }, 500);
            }
          });
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./src/pages/Login/Forget.vue?vue&type=script&lang=js&
 /* harmony default export */ var Login_Forgetvue_type_script_lang_js_ = (Forgetvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/Login/Forget.vue?vue&type=style&index=0&id=d8ab9a6e&lang=scss&scoped=true&
var Forgetvue_type_style_index_0_id_d8ab9a6e_lang_scss_scoped_true_ = __webpack_require__("9706");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/Login/Forget.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  Login_Forgetvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "d8ab9a6e",
  null
  
)

/* harmony default export */ var Forget = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "9706":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Forget_vue_vue_type_style_index_0_id_d8ab9a6e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3119");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Forget_vue_vue_type_style_index_0_id_d8ab9a6e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Forget_vue_vue_type_style_index_0_id_d8ab9a6e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Forget_vue_vue_type_style_index_0_id_d8ab9a6e_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ })

}]);