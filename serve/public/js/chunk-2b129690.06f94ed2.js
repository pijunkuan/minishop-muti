(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-2b129690"],{

/***/ "665d":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetail_vue_vue_type_style_index_0_id_4e21cef8_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("c0f6");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetail_vue_vue_type_style_index_0_id_4e21cef8_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetail_vue_vue_type_style_index_0_id_4e21cef8_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OrderDetail_vue_vue_type_style_index_0_id_4e21cef8_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "c0f6":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "d818":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/OrderDetail.vue?vue&type=template&id=4e21cef8&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('page-loading',{attrs:{"loading":_vm.loading}}),_c('div',{staticClass:"order-detail-content",style:({height:_vm.height + 'px'})},[_c('div',{staticClass:"order-detail-header"},[_c('div',[_c('div',[_vm._v(_vm._s(_vm.order.status_value))]),(!_vm.loading)?_c('div',{staticClass:"order-detail-header-content"},[_vm._v(_vm._s(_vm.statusTip[_vm.order.status] !== undefined ? _vm.statusTip[_vm.order.status].tip : ''))]):_vm._e()]),_c('div',[(!_vm.loading)?_c('i',{staticClass:"iconfont",class:_vm.statusTip[_vm.order.status] !== undefined ? _vm.statusTip[_vm.order.status].icon : ''}):_vm._e()])]),_c('div',{staticStyle:{"position":"relative"}},[_c('div',{staticClass:"order-detail-basic"},[_c('div',[_c('shop-icon',{attrs:{"name":"dingwei","size":"small"}})],1),_c('div',[_c('div',[_c('strong',[_vm._v(_vm._s(_vm.order.address.name))])]),_c('div',[_c('strong',[_vm._v(_vm._s(_vm.order.address.mobile))])]),_c('div',{staticClass:"order-detail-basic__address"},[_vm._v(_vm._s(_vm.order.address.address))])])])]),_c('div',{staticClass:"order-detail-items"},[_vm._m(0),_vm._l((_vm.order.items),function(item,index){return _c('div',{key:index,staticClass:"order-detail-items-item"},[_c('div',[_c('shop-image',{attrs:{"src":item.img_url,"type":"stretch","width":60,"rounded":""}},[_c('div',{staticClass:"order-detail-item-placeholder",attrs:{"slot":"error"},slot:"error"}),_c('div',{staticClass:"order-detail-item-placeholder",attrs:{"slot":"placeholder"},slot:"placeholder"})])],1),_c('div',[_c('div',{staticClass:"order-detail-items-item__title"},[_vm._v(_vm._s(item.product_title))]),_c('div',{staticClass:"order-detail-items-item__subtitle"},[_vm._v(_vm._s(item.variant_title))]),_c('div',{staticClass:"order-detail-items-item__price"},[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(item.price))])]),_c('div',{staticClass:"order-detail-items-item__amount"},[_vm._v("x "+_vm._s(item.quantity))])])])}),_c('div',{staticClass:"order-detail-items-service"},[_c('shop-icon',{attrs:{"name":"kefu","size":"small"}}),_vm._v("联系客服")],1)],2),_c('div',{staticClass:"order-detail-info"},[_c('div',[_vm._m(1),_c('div',[_vm._v(_vm._s(_vm.$route.query.no))])]),_c('div',[_vm._m(2),_c('div',[_vm._v(_vm._s(_vm.order.created_at))])]),_c('div',[_vm._m(3),_c('div',[(_vm.order.payments.length === 0)?_c('div',[_vm._v(" - ")]):_vm._e(),_vm._l((_vm.order.payments),function(payment,index){return _c('div',{key:index,staticClass:"order-item-list"},[_c('div',[_vm._v(_vm._s(_vm.payments[payment.payment_method]))])])})],2)]),(_vm.order.pay_at)?_c('div',[_vm._m(4),_c('div',[_vm._v(_vm._s(_vm.order.pay_at))])]):_vm._e(),_c('div',[_vm._m(5),_c('div',[(_vm.order.shipments.length === 0)?_c('div',[_vm._v(" - ")]):_vm._e(),_vm._l((_vm.order.shipments),function(shipment,index){return _c('div',{key:index,staticClass:"order-item-list"},[_c('div',[_vm._v(_vm._s(shipment.shipment_company))]),_c('div',[_c('strong',[_vm._v(_vm._s(shipment.shipment_no))])]),_c('div',[_vm._v(_vm._s(shipment.created_at))])])})],2)]),(_vm.order.send_at)?_c('div',[_vm._m(6),_c('div',[_vm._v(_vm._s(_vm.order.send_at))])]):_vm._e()]),_c('div',{staticClass:"order-detail-price"},[_c('div',[_vm._m(7),_c('div',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.order.items_amount ? _vm.order.items_amount : '-'))])])]),_c('div',[_vm._m(8),_c('div',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.order.shipments_amount ? _vm.order.shipments_amount : '-'))])])]),_c('div',[_vm._m(9),_c('div',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.order.discounts_amount ? _vm.order.discounts_amount : '-'))])])]),_c('div',[_c('div',[_vm._v("共 "+_vm._s(_vm.order.total_quantity ? _vm.order.total_quantity : '-')+" 件商品，合计："),_c('span',[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(_vm.order.amount ? _vm.order.amount : '-'))])])])])])]),(_vm.footerFold.indexOf(_vm.order.status) === -1)?_c('div',{staticClass:"order-detail-bottom"},[(_vm.canClose.indexOf(_vm.order.status) !== -1)?_c('shop-button',{attrs:{"size":"small"}},[_vm._v("支付订单")]):_vm._e(),(_vm.canShip.indexOf(_vm.order.status) !== -1)?_c('shop-button',{attrs:{"size":"small"}},[_vm._v("查看物流")]):_vm._e(),(_vm.canReceive.indexOf(_vm.order.status) !== -1)?_c('shop-button',{attrs:{"size":"small"}},[_vm._v("确认收货")]):_vm._e(),(_vm.canRefund.indexOf(_vm.order.status) !== -1)?_c('shop-button',{attrs:{"size":"small"}},[_vm._v("退换货")]):_vm._e(),(_vm.canClose.indexOf(_vm.order.status) !== -1)?_c('shop-button',{attrs:{"size":"small","disabled":_vm.btnLoading},on:{"click":_vm.toClose}},[_vm._v("关闭订单")]):_vm._e()],1):_vm._e()],1)}
var staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("订单详情")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("订单编号")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("下单时间")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("支付方式")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("支付时间")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("配送信息")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("配送时间")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("商品总额")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("运费")])])},function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('strong',[_vm._v("优惠")])])}]


// CONCATENATED MODULE: ./src/pages/User/OrderDetail.vue?vue&type=template&id=4e21cef8&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.filter.js
var es_array_filter = __webpack_require__("4de4");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("c975");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.map.js
var es_array_map = __webpack_require__("d81d");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// EXTERNAL MODULE: ./src/api/order.js
var order = __webpack_require__("f8b7");

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/OrderDetail.vue?vue&type=script&lang=js&




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


/* harmony default export */ var OrderDetailvue_type_script_lang_js_ = ({
  data: function data() {
    return {
      loading: false,
      height: 0,
      order: {
        address: {},
        items: [],
        payments: [],
        shipments: []
      },
      btnLoading: false,
      payments: {
        wallet: '钱包支付'
      },
      statusTip: {
        pending: {
          tip: '您拍下的宝贝未支付，还在等着您哦～',
          icon: 'icondaifukuan'
        },
        processing: {
          tip: '订单已经接收，正在抓紧为您包装理货',
          icon: 'icondaifahuo'
        },
        sent: {
          tip: '包裹已经坐上火箭朝您飞来～',
          icon: 'iconwuliu'
        },
        partial: {
          tip: '部分宝贝已经坐上火箭朝您飞来，剩下的也在加紧准备出发～',
          icon: 'iconwuliu'
        },
        refunding: {
          tip: '退换货正在处理中',
          icon: 'iconshouhou'
        },
        refunded: {
          tip: '已处理退换货',
          icon: 'iconjianshao2'
        },
        cancel: {
          tip: '订单已经取消',
          icon: 'iconjianshao2'
        },
        closed: {
          tip: '订单已经关闭',
          icon: 'iconjianshao2'
        },
        success: {
          tip: '宝贝已经到达，期待您留下宝贵意见',
          icon: 'icondaishouhuo'
        }
      },
      footerFold: ['refunding', 'refunded', 'cancel', 'closed'],
      canClose: ['pending'],
      canShip: ['sent', 'partial', 'success'],
      canRefund: ['processing', 'sent', 'partial', 'success'],
      canReceive: ['sent', 'partial']
    };
  },
  created: function created() {
    this.getDetail();
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    if (to.name === 'UserOrder') to.meta.keepAlive = true;else to.meta.keepAlive = false;
    next();
  },
  methods: {
    getDetail: function getDetail() {
      var _this = this;

      this.loading = true;
      Object(order["e" /* get_order */])(this.$route.query.no).then(function (r) {
        _this.order = r.data.body;
        _this.order['total_quantity'] = 0;

        _this.order.items.map(function (v) {
          _this.order.total_quantity += v.quantity;
        });

        _this.order.payments = _this.order.payments.filter(function (val) {
          return val.status === 'success';
        });
        if (_this.footerFold.indexOf(_this.order.status) !== -1) _this.height = window.innerHeight - 49;else _this.height = window.innerHeight - 95;
        _this.loading = false;
      }).catch(function (e) {
        _this.loading = false;

        if (e.response.status === 401) {
          _this.$store.dispatch('logout');

          _this.$router.push({
            name: 'Login',
            query: {
              from: 'UserOrder'
            }
          });
        }
      });
    },
    toClose: function toClose() {
      var _this2 = this;

      mint_ui_common["MessageBox"].confirm('是否确认关闭?').then(function () {
        _this2.btnLoading = true;
        Object(order["b" /* change_order_status */])(_this2.$route.query.no, {
          status: 'cancel'
        }).then(function () {
          Object(mint_ui_common["Toast"])('订单已关闭');

          _this2.getDetail();

          _this2.btnLoading = false;
        });
      }).catch(function () {});
    }
  }
});
// CONCATENATED MODULE: ./src/pages/User/OrderDetail.vue?vue&type=script&lang=js&
 /* harmony default export */ var User_OrderDetailvue_type_script_lang_js_ = (OrderDetailvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/User/OrderDetail.vue?vue&type=style&index=0&id=4e21cef8&lang=scss&scoped=true&
var OrderDetailvue_type_style_index_0_id_4e21cef8_lang_scss_scoped_true_ = __webpack_require__("665d");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/User/OrderDetail.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  User_OrderDetailvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "4e21cef8",
  null
  
)

/* harmony default export */ var OrderDetail = __webpack_exports__["default"] = (component.exports);

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