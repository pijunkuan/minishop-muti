(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-547bb922"],{

/***/ "3a4c":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "7d0d":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Order_vue_vue_type_style_index_0_id_043a4dda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3a4c");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Order_vue_vue_type_style_index_0_id_043a4dda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Order_vue_vue_type_style_index_0_id_043a4dda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Order_vue_vue_type_style_index_0_id_043a4dda_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "db70":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Order.vue?vue&type=template&id=043a4dda&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('ul',{staticClass:"user-order-menubar"},[_c('li',{class:{'is-active':_vm.fetchQuery.status === ''},on:{"click":function($event){return _vm.changeStatus('')}}},[_c('span',[_vm._v("全部")])]),_c('li',{class:{'is-active':_vm.fetchQuery.status === 'pending'},on:{"click":function($event){return _vm.changeStatus('pending')}}},[_c('span',[_vm._v("待付款")])]),_c('li',{class:{'is-active':_vm.fetchQuery.status === 'processing'},on:{"click":function($event){return _vm.changeStatus('processing')}}},[_c('span',[_vm._v("待发货")])]),_c('li',{class:{'is-active':_vm.fetchQuery.status === 'sent'},on:{"click":function($event){return _vm.changeStatus('sent')}}},[_c('span',[_vm._v("待收货")])]),_c('li',{class:{'is-active':_vm.fetchQuery.status === 'refunding'},on:{"click":function($event){return _vm.changeStatus('refunding')}}},[_c('span',[_vm._v("退换货")])])]),_c('ul',{directives:[{name:"infinite-scroll",rawName:"v-infinite-scroll",value:(_vm.getOrders),expression:"getOrders"}],staticClass:"order-list",style:({height:_vm.height - 1 + 'px'}),attrs:{"infinite-scroll-disabled":"loading","infinite-scroll-distance":"10","infinite-scroll-immediate-check":""}},[_vm._l((_vm.orders),function(order,index){return _c('li',{key:index,staticClass:"order-list-item"},[_c('div',{staticClass:"order-list-item__title",on:{"click":function($event){return _vm.toCheck(order)}}},[_c('div',[_vm._v(_vm._s(order.created_at))]),_c('div',{class:{'is-disabled':_vm.disabledStatus.indexOf(order.status) !== -1}},[_vm._v(_vm._s(order.status_value))])]),_vm._l((order.items),function(item,index){return _c('div',{key:'i' + index,staticClass:"order-list-item__item"},[_c('div',[_c('shop-image',{staticClass:"order-list-item__item-image",attrs:{"src":item.img_url,"type":"fit","width":60,"rounded":""}},[_c('div',{staticClass:"order-item-placeholder",attrs:{"slot":"error"},slot:"error"}),_c('div',{staticClass:"order-item-placeholder",attrs:{"slot":"placeholder"},slot:"placeholder"})])],1),_c('div',{staticClass:"order-list-item__item-title"},[_c('div',[_vm._v(_vm._s(item.product_title))]),_c('div',[_vm._v(_vm._s(item.variant_title))])]),_c('div',{staticClass:"order-list-item__item-price"},[_c('div',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(item.price))])]),_c('div',[_vm._v("x "+_vm._s(item.quantity))])])])}),_c('div',{staticClass:"order-list-item__bottom"},[_c('div',[_vm._v("订单总额 ¥ "),_c('strong',[_vm._v(_vm._s(order.amount ? order.amount : '-'))])]),_c('div',[(_vm.canClose.indexOf(order.status) !== -1)?_c('shop-button',{attrs:{"size":"small","type":"border"},on:{"click":function($event){return _vm.toClose(order)}}},[_vm._v("关闭订单")]):_vm._e(),(_vm.canShip.indexOf(order.status) !== -1)?_c('shop-button',{attrs:{"size":"small","type":"border"}},[_vm._v("查看物流")]):_vm._e(),(_vm.canRefund.indexOf(order.status) !== -1)?_c('shop-button',{attrs:{"size":"small","type":"border"}},[_vm._v("退换货")]):_vm._e(),(_vm.canReceive.indexOf(order.status) !== -1)?_c('shop-button',{attrs:{"size":"small"}},[_vm._v("确认收货")]):_vm._e()],1)])],2)}),(!_vm.nomore)?_c('div',{staticClass:"order-list-placeholder"},[_vm._v("加载中...")]):_vm._e(),(_vm.nomore)?_c('div',{staticClass:"order-list-placeholder"},[_vm._v("没有更多了")]):_vm._e()],2)])}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/User/Order.vue?vue&type=template&id=043a4dda&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.concat.js
var es_array_concat = __webpack_require__("99af");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// EXTERNAL MODULE: ./src/api/order.js
var api_order = __webpack_require__("f8b7");

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Order.vue?vue&type=script&lang=js&


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


/* harmony default export */ var Ordervue_type_script_lang_js_ = ({
  data: function data() {
    return {
      fetchQuery: {
        status: this.$route.params.status !== undefined ? this.$route.params.status : '',
        page: 0,
        pageSize: 15
      },
      loading: false,
      nomore: false,
      height: 0,
      orders: [],
      canClose: ['pending'],
      canShip: ['sent', 'partial', 'success'],
      canRefund: ['processing', 'sent', 'partial', 'success'],
      canReceive: ['sent', 'partial'],
      disabledStatus: ['cancel', 'closed', 'refunded']
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.height = window.innerHeight - 170;
    });
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    if (to.name === 'UserOrderDetail') from.meta.keepAlive = true;else from.meta.keepAlive = false;
    next();
  },
  methods: {
    getOrders: function getOrders() {
      var _this2 = this;

      this.loading = true;
      this.nomore = false;
      this.fetchQuery.page += 1;
      Object(api_order["f" /* get_orders */])(this.fetchQuery).then(function (r) {
        var _data = r.data.body.data;

        if (_data.length === 0) {
          _this2.loading = true;
          _this2.nomore = true;
        } else {
          _this2.loading = false;
          _this2.nomore = false;
          _this2.orders = _this2.orders.concat(_data);
        }
      }).catch(function (e) {
        _this2.loading = true;
        _this2.nomore = true;

        if (e.response.status === 401) {
          Object(mint_ui_common["Toast"])('登录超时');

          _this2.$router.push({
            name: 'Login',
            query: {
              from: _this2.$route.name
            }
          });
        }
      });
    },
    changeStatus: function changeStatus(status) {
      this.fetchQuery.status = status;
      this.fetchQuery.page = 0;
      this.orders = [];
      this.loading = false;
      this.nomore = false;
      this.getOrders();
    },
    toCheck: function toCheck(order) {
      this.$router.push({
        name: 'UserOrderDetail',
        query: {
          no: order.no
        }
      });
    },
    toClose: function toClose(order) {
      var _this3 = this;

      mint_ui_common["MessageBox"].confirm('是否确认关闭?').then(function () {
        Object(api_order["b" /* change_order_status */])(order.no, {
          status: 'cancel'
        }).then(function () {
          Object(mint_ui_common["Toast"])('订单已关闭');
          _this3.fetchQuery.page = 0;
          _this3.orders = [];
          _this3.loading = false;
          _this3.nomore = false;

          _this3.getOrders();
        });
      }).catch(function () {});
    } // toPay(order){
    // }

  }
});
// CONCATENATED MODULE: ./src/pages/User/Order.vue?vue&type=script&lang=js&
 /* harmony default export */ var User_Ordervue_type_script_lang_js_ = (Ordervue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/User/Order.vue?vue&type=style&index=0&id=043a4dda&lang=scss&scoped=true&
var Ordervue_type_style_index_0_id_043a4dda_lang_scss_scoped_true_ = __webpack_require__("7d0d");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/User/Order.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  User_Ordervue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "043a4dda",
  null
  
)

/* harmony default export */ var Order = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "f8b7":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return calc_order_total; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return create_order; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return create_pay; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return pay_order; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return get_orders; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return get_order; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return change_order_status; });
/* harmony import */ var _utils_request__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("b775");

function calc_order_total(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order/calc',
    method: 'post',
    data: data
  });
}
function create_order(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order',
    method: 'post',
    data: data
  });
}
function create_pay(order_no, payment) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order/' + order_no + '/pay/' + payment,
    method: 'post'
  });
}
function pay_order(pay_no) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'pay/' + pay_no + '/wallet',
    method: 'get'
  });
}
function get_orders(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order',
    method: 'get',
    params: data
  });
}
function get_order(order_no) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order/' + order_no,
    method: 'get'
  });
}
function change_order_status(order_no, data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'order/' + order_no,
    method: 'put',
    data: data
  });
}

/***/ })

}]);