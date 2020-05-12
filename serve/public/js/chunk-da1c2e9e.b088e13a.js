(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-da1c2e9e"],{

/***/ "21cc":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "27d3":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_style_index_0_id_4559b762_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("21cc");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_style_index_0_id_4559b762_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_style_index_0_id_4559b762_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_style_index_0_id_4559b762_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "4eb4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Login/Register.vue?vue&type=template&id=4559b762&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"login-background"},[_c('div',{staticClass:"login-form"},[_c('shop-image',{staticClass:"login-form-avatar",attrs:{"width":80,"circled":""}},[_c('div',{attrs:{"slot":"placeholder"},slot:"placeholder"},[_c('shop-icon',{staticStyle:{"background-color":"#fff"},attrs:{"name":"iconzhucetouxiang"}})],1),_c('div',{attrs:{"slot":"error"},slot:"error"},[_c('shop-icon',{staticStyle:{"background-color":"#fff"},attrs:{"name":"iconzhucetouxiang"}})],1)]),(_vm.regType === 'email')?_c('shop-input',{ref:"email",staticClass:"login-form-input",attrs:{"validate":"","rules":_vm.rules.email},model:{value:(_vm.user.email),callback:function ($$v) {_vm.$set(_vm.user, "email", $$v)},expression:"user.email"}},[_c('span',{staticClass:"login-prepend",attrs:{"slot":"prepend"},slot:"prepend"},[_vm._v("邮箱")])]):_vm._e(),(_vm.regType === 'mobile')?_c('shop-input',{ref:"mobile",staticClass:"login-form-input",attrs:{"validate":"","rules":_vm.rules.mobile},model:{value:(_vm.user.mobile),callback:function ($$v) {_vm.$set(_vm.user, "mobile", $$v)},expression:"user.mobile"}},[_c('span',{staticClass:"login-prepend",attrs:{"slot":"prepend"},slot:"prepend"},[_vm._v("手机号")])]):_vm._e(),_c('shop-input',{ref:"password",staticClass:"login-form-input",attrs:{"type":_vm.passType,"validate":"","rules":_vm.rules.password},model:{value:(_vm.user.password),callback:function ($$v) {_vm.$set(_vm.user, "password", $$v)},expression:"user.password"}},[_c('span',{staticClass:"login-prepend",attrs:{"slot":"prepend"},slot:"prepend"},[_vm._v("密码")]),_c('span',{attrs:{"slot":"append"},on:{"click":function($event){_vm.passType = 'text'}},slot:"append"},[(_vm.passType === 'password')?_c('shop-icon',{attrs:{"name":"yanjing-bi","size":"mini"}}):_vm._e()],1),_c('span',{attrs:{"slot":"append"},on:{"click":function($event){_vm.passType = 'password'}},slot:"append"},[(_vm.passType === 'text')?_c('shop-icon',{attrs:{"name":"yanjing","size":"mini"}}):_vm._e()],1)]),_c('shop-button',{staticClass:"login-form-button",class:{'is-loading':_vm.btnLoading},on:{"click":_vm.confirmLogin}},[_vm._v("注 册")]),_c('div',{staticClass:"login-form-bottom"},[_c('div',[_vm._v("已有账号？"),_c('div',{staticClass:"bottom-btn",on:{"click":_vm.toLogin}},[_vm._v("登录")])])])],1)])}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/Login/Register.vue?vue&type=template&id=4559b762&scoped=true&

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// EXTERNAL MODULE: ./src/api/login.js
var login = __webpack_require__("7ded");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Login/Register.vue?vue&type=script&lang=js&
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


/* harmony default export */ var Registervue_type_script_lang_js_ = ({
  data: function data() {
    return {
      regType: 'mobile',
      user: {
        email: '',
        mobile: '',
        password: ''
      },
      passType: 'password',
      rules: {
        email: [{
          required: true,
          message: '请输入邮箱'
        }],
        mobile: [{
          required: true,
          message: '请输入手机号'
        }],
        password: [{
          required: true,
          message: '请输入密码'
        }, {
          min: 6,
          message: '密码至少为6位'
        }]
      },
      btnLoading: false
    };
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
    toForget: function toForget() {
      this.$router.push({
        name: 'Forget'
      });
    },
    confirmLogin: function confirmLogin() {
      var _this = this;

      if (this.btnLoading) return;
      this.$refs.mobile.validation(function (valid) {
        if (valid) {
          _this.$refs.password.validation(function (validate) {
            if (validate) {
              _this.btnLoading = true;
              var _data = {
                mobile: _this.user.mobile,
                password: _this.user.password,
                password_confirmation: _this.user.password
              };
              Object(login["d" /* register */])(_data).then(function () {
                Object(mint_ui_common["Toast"])({
                  message: '注册成功，正在跳转登录中...',
                  duration: 2000
                });

                _this.$store.dispatch('login', {
                  mobile: _this.user.mobile,
                  password: _this.user.password
                }).then(function () {
                  if (_this.$route.query.from === 'Login' || _this.$route.query.from === undefined) _this.$router.push({
                    name: 'UserHome'
                  });else _this.$router.push({
                    name: _this.$route.query.from
                  });
                });

                setTimeout(function () {
                  _this.$refs.mobile.clearValidate();

                  _this.$refs.password.clearValidate();

                  _this.btnLoading = false;
                }, 2000);
              }).catch(function (e) {
                Object(mint_ui_common["Toast"])({
                  message: e.response.data.message,
                  duration: 2000
                });
                _this.btnLoading = false;
              });
            }
          });
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./src/pages/Login/Register.vue?vue&type=script&lang=js&
 /* harmony default export */ var Login_Registervue_type_script_lang_js_ = (Registervue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/Login/Register.vue?vue&type=style&index=0&id=4559b762&lang=scss&scoped=true&
var Registervue_type_style_index_0_id_4559b762_lang_scss_scoped_true_ = __webpack_require__("27d3");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/Login/Register.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  Login_Registervue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "4559b762",
  null
  
)

/* harmony default export */ var Register = __webpack_exports__["default"] = (component.exports);

/***/ })

}]);