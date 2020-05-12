(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-0fa0b968"],{

/***/ "2d98":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/Modules/ProductList/InfiniteList.vue?vue&type=template&id=2daa8504&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{style:({height:_vm.height + 'px'})},[_c('ul',{directives:[{name:"infinite-scroll",rawName:"v-infinite-scroll",value:(_vm.loadMore),expression:"loadMore"}],staticClass:"infinite-shop-list",style:({height:_vm.height - 1 + 'px'}),attrs:{"infinite-scroll-disabled":"loading","infinite-scroll-distance":"10","infinite-scroll-immediate-check":""}},[_vm._l((_vm.items),function(item,index){return _c('li',{key:index,style:({width:_vm.width + 'px', height:_vm.width + 90 + 'px'}),on:{"click":function($event){return _vm.toProduct(item)}}},[_c('div',[(item.stock * 1 === 0)?_c('div',{staticClass:"infinite-shop-list__soldout",style:({height:_vm.width - 50 + 'px', width:_vm.width - 50 + 'px', lineHeight:_vm.width - 50 + 'px'})},[_c('div',{style:({height:_vm.width - 70 + 'px', width:_vm.width - 70 + 'px', lineHeight:_vm.width - 70 + 'px'})},[_vm._v("已抢光")])]):_vm._e(),_c('shop-image',{attrs:{"src":item.img,"rounded":"","type":"fit","width":_vm.width - 20}},[_c('div',{staticClass:"product-image-error",style:({height:_vm.width - 20 + 'px'}),attrs:{"slot":"error"},slot:"error"},[_c('i',{staticClass:"iconfont icontupian"})])])],1),_c('div',[_c('div',{staticClass:"infinite-shop-content__title"},[_vm._v(_vm._s(item.product_title))]),_c('div',[_c('span',{staticClass:"infinite-shop-content__price"},[_vm._v("¥ "),_c('strong',[_vm._v(_vm._s(item.price ? item.price : '-'))])]),(item.oriPrice)?_c('span',{staticClass:"infinite-shop-content__oriprice"},[_vm._v("¥ "+_vm._s(item.oriPrice))]):_vm._e()])])])}),(!_vm.nomore)?_c('div',{staticClass:"infinite-shop-list__placeholder"},[_vm._v(" 加载中... ")]):_vm._e(),(_vm.nomore)?_c('div',{staticClass:"infinite-shop-list__error"},[_vm._v(" 没有更多了 ")]):_vm._e()],2)])}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/components/Modules/ProductList/InfiniteList.vue?vue&type=template&id=2daa8504&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.constructor.js
var es_number_constructor = __webpack_require__("a9e3");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/Modules/ProductList/InfiniteList.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var InfiniteListvue_type_script_lang_js_ = ({
  props: {
    items: Array,
    height: {
      type: Number,
      default: 500
    },
    loading: Boolean,
    nomore: Boolean
  },
  data: function data() {
    return {
      width: 0
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.width = window.innerWidth / 2 - 10;
    });
  },
  methods: {
    loadMore: function loadMore() {
      this.$emit('load');
    },
    toProduct: function toProduct(item) {
      if (item.id === undefined) return;else this.$router.push({
        name: 'Product',
        query: {
          id: item.id
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./src/components/Modules/ProductList/InfiniteList.vue?vue&type=script&lang=js&
 /* harmony default export */ var ProductList_InfiniteListvue_type_script_lang_js_ = (InfiniteListvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/Modules/ProductList/InfiniteList.vue?vue&type=style&index=0&id=2daa8504&lang=scss&scoped=true&
var InfiniteListvue_type_style_index_0_id_2daa8504_lang_scss_scoped_true_ = __webpack_require__("5fb4");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/components/Modules/ProductList/InfiniteList.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  ProductList_InfiniteListvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "2daa8504",
  null
  
)

/* harmony default export */ var InfiniteList = __webpack_exports__["a"] = (component.exports);

/***/ }),

/***/ "5fb4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a819");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "7e7d":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Products/index.vue?vue&type=template&id=67c78528&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('infinite-list',{attrs:{"loading":_vm.loading,"nomore":_vm.noresult,"items":_vm.items,"height":_vm.height},on:{"load":_vm.getItems}})],1)}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/Products/index.vue?vue&type=template&id=67c78528&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.concat.js
var es_array_concat = __webpack_require__("99af");

// EXTERNAL MODULE: ./src/components/Modules/ProductList/InfiniteList.vue + 4 modules
var InfiniteList = __webpack_require__("2d98");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Products/index.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var Productsvue_type_script_lang_js_ = ({
  components: {
    InfiniteList: InfiniteList["a" /* default */]
  },
  data: function data() {
    return {
      height: 0,
      loading: false,
      noresult: false,
      items: []
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.height = window.innerHeight - 114;
    });
  },
  methods: {
    getItems: function getItems() {
      var _this2 = this;

      setTimeout(function () {
        var _data = [];

        for (var i = 0; i <= 10; i++) {
          _data.push(i);
        }

        if (_data.length === 0) {
          _this2.loading = true;
          _this2.noresult = true;
        } else {
          _this2.loading = false;
          _this2.noresult = false;
          _this2.items = _this2.items.concat(_data);
        }
      }, 1000);
    }
  }
});
// CONCATENATED MODULE: ./src/pages/Products/index.vue?vue&type=script&lang=js&
 /* harmony default export */ var pages_Productsvue_type_script_lang_js_ = (Productsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/Products/index.vue?vue&type=style&index=0&id=67c78528&lang=scss&scoped=true&
var Productsvue_type_style_index_0_id_67c78528_lang_scss_scoped_true_ = __webpack_require__("c141");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/Products/index.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  pages_Productsvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "67c78528",
  null
  
)

/* harmony default export */ var Products = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "a819":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "c141":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_67c78528_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("cad6");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_67c78528_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_67c78528_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_67c78528_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "cad6":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

}]);