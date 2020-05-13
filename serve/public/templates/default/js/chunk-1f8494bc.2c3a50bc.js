(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-1f8494bc"],{

/***/ "1ac7":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_37132cda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("d70c");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_37132cda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_37132cda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Home_vue_vue_type_style_index_0_id_37132cda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "d70c":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "dbe6":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Home.vue?vue&type=template&id=37132cda&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('page-loading',{attrs:{"loading":_vm.loading}}),_c('div',{staticClass:"user-home-header"},[_c('div',{staticClass:"user-home-header-icon",on:{"click":_vm.toLogout}},[_c('i',{staticClass:"iconfont icontuichu1"})]),_c('div',[_c('shop-image',{attrs:{"src":_vm.$store.getters.avatar,"width":80,"type":"fit","circled":""}},[_c('div',{attrs:{"slot":"placeholder"},slot:"placeholder"},[_c('i',{staticClass:"iconfont iconiconzhucetouxiang"})]),_c('div',{attrs:{"slot":"error"},slot:"error"},[_c('i',{staticClass:"iconfont iconiconzhucetouxiang"})])])],1),_c('div',[_c('div',[_vm._v(_vm._s(_vm.$store.getters.username ? _vm.$store.getters.username : '-'))]),_c('div',{staticClass:"user-home-level"},[_vm._m(0),_vm._v(" "+_vm._s(_vm.level.name)+" ")])])]),_c('div',{staticClass:"user-home-wallet"},[_c('div',{on:{"click":_vm.toWallet}},[_c('i',{staticClass:"iconfont iconyinhangyouhui"}),_vm._v("余额 | "),_c('span',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.$store.getters.balance ? _vm.$store.getters.balance : '0'))])])])]),_c('div',{staticClass:"user-home-order"},[_c('div',{staticClass:"user-home-order-title"},[_vm._v("我的订单")]),_c('div',{staticClass:"user-home-order-item",on:{"click":function($event){return _vm.toOrder('')}}},[_c('div',[_c('shop-icon',{attrs:{"name":"dingdan","size":"medium"}})],1),_c('div',[_vm._v("全部")])]),_c('div',{staticClass:"user-home-order-item",on:{"click":function($event){return _vm.toOrder('pending')}}},[_c('div',[_c('shop-icon',{attrs:{"name":"daifukuan","size":"medium"}})],1),_c('div',[_vm._v("待付款")])]),_c('div',{staticClass:"user-home-order-item",on:{"click":function($event){return _vm.toOrder('processing')}}},[_c('div',[_c('shop-icon',{attrs:{"name":"daifahuo","size":"medium"}})],1),_c('div',[_vm._v("待发货")])]),_c('div',{staticClass:"user-home-order-item",on:{"click":function($event){return _vm.toOrder('sent')}}},[_c('div',[_c('shop-icon',{attrs:{"name":"daishouhuo","size":"medium"}})],1),_c('div',[_vm._v("待收货")])]),_c('div',{staticClass:"user-home-order-item",on:{"click":function($event){return _vm.toOrder('refunding')}}},[_c('div',[_c('shop-icon',{attrs:{"name":"shouhou","size":"medium"}})],1),_c('div',[_vm._v("退换货")])])]),_c('div',{staticClass:"user-home-other"},[_c('div',{on:{"click":_vm.toAddress}},[_c('div',[_c('shop-icon',{attrs:{"name":"ditu1","size":"medium"}})],1),_c('div',[_vm._v("地址簿")])])])],1)}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('span',[_c('i',{staticClass:"iconfont iconhuiyuan"})])}]


// CONCATENATED MODULE: ./src/pages/User/Home.vue?vue&type=template&id=37132cda&scoped=true&

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Home.vue?vue&type=script&lang=js&
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

/* harmony default export */ var Homevue_type_script_lang_js_ = ({
  data: function data() {
    return {
      loading: false,
      level: {
        name: '普通会员',
        type: 'normal'
      },
      levels: {
        normal: '',
        higher: ''
      }
    };
  },
  created: function created() {
    var _this = this;

    this.loading = true;
    this.$store.dispatch('getUserInfo').then(function () {
      _this.$store.dispatch('getBalance').then(function () {
        _this.loading = false;
      }).catch(function (e) {
        if (e.response.status === 401) {
          Object(mint_ui_common["Toast"])({
            message: '登录超时',
            duration: 1000
          });

          _this.$store.dispatch('logout');

          setTimeout(function () {
            _this.$router.push({
              name: 'Login'
            });
          }, 1000);
        }
      });
    }).catch(function (err) {
      if (err.response.status === 401) {
        Object(mint_ui_common["Toast"])({
          message: '登录超时',
          duration: 1000
        });

        _this.$store.dispatch('logout');

        setTimeout(function () {
          _this.$router.push({
            name: 'Login'
          });
        }, 1000);
      }
    });
  },
  methods: {
    toLogout: function toLogout() {
      var _this2 = this;

      this.$store.dispatch('logout');
      Object(mint_ui_common["Toast"])({
        message: '正在退出登录...',
        duration: 1000
      });
      setTimeout(function () {
        _this2.$router.push({
          name: 'Home'
        });
      }, 1000);
    },
    toWallet: function toWallet() {
      this.$router.push({
        name: 'UserWallet'
      });
    },
    toOrder: function toOrder(status) {
      if (status) this.$router.push({
        name: 'UserOrder',
        params: {
          status: status
        }
      });else this.$router.push({
        name: 'UserOrder'
      });
    },
    toAddress: function toAddress() {
      this.$router.push({
        name: 'UserAddress'
      });
    }
  }
});
// CONCATENATED MODULE: ./src/pages/User/Home.vue?vue&type=script&lang=js&
 /* harmony default export */ var User_Homevue_type_script_lang_js_ = (Homevue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/User/Home.vue?vue&type=style&index=0&id=37132cda&lang=scss&scoped=true&
var Homevue_type_style_index_0_id_37132cda_lang_scss_scoped_true_ = __webpack_require__("1ac7");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/User/Home.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  User_Homevue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "37132cda",
  null
  
)

/* harmony default export */ var Home = __webpack_exports__["default"] = (component.exports);

/***/ })

}]);