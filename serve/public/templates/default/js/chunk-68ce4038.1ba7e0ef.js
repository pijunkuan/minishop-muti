(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-68ce4038"],{

/***/ "2d76":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_07febbed_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("d709");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_07febbed_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_07febbed_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_id_07febbed_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

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

/***/ "48f5":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Search/index.vue?vue&type=template&id=07febbed&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"search-header"},[_c('span',[_vm._v("搜索结果：")]),_c('span',{staticClass:"search-header-content"},[_vm._v(_vm._s(_vm.fetchQuery.name))])]),_c('infinite-list',{attrs:{"items":_vm.items,"loading":_vm.loading,"nomore":_vm.nomore,"height":_vm.height},on:{"load":_vm.getItems}})],1)}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/Search/index.vue?vue&type=template&id=07febbed&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.concat.js
var es_array_concat = __webpack_require__("99af");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.exec.js
var es_regexp_exec = __webpack_require__("ac1f");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.search.js
var es_string_search = __webpack_require__("841c");

// EXTERNAL MODULE: ./src/components/Modules/ProductList/InfiniteList.vue + 4 modules
var InfiniteList = __webpack_require__("2d98");

// EXTERNAL MODULE: ./src/api/products.js
var products = __webpack_require__("4c79");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/Search/index.vue?vue&type=script&lang=js&




//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Searchvue_type_script_lang_js_ = ({
  components: {
    InfiniteList: InfiniteList["a" /* default */]
  },
  data: function data() {
    return {
      fetchQuery: {
        page: 0,
        pageSize: 15,
        Q4S: 1,
        name: ''
      },
      loading: false,
      nomore: false,
      items: [],
      height: 0
    };
  },
  created: function created() {
    this.fetchQuery.name = this.$route.query.search;
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.height = window.innerHeight - 165;
    });
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    if (to.name === 'Product') from.meta.keepAlive = true;else from.meta.keepAlive = false;
    next();
  },
  methods: {
    getItems: function getItems() {
      var _this2 = this;

      this.loading = true;
      this.nomore = false;
      this.fetchQuery.page += 1;
      Object(products["b" /* get_products */])(this.fetchQuery).then(function (r) {
        var _data = r.data.body.data;

        if (_data.length === 0) {
          _this2.loading = true;
          _this2.nomore = true;
        } else {
          _this2.items = _this2.items.concat(_data);
          _this2.loading = false;
          _this2.nomore = false;
        }
      }).catch(function () {
        _this2.loading = true;
        _this2.nomore = true;
      });
    }
  },
  watch: {
    '$route': function $route(nv, ov) {
      if (nv !== ov) {
        this.fetchQuery.name = this.$route.query.search;
        this.items = [];
        this.fetchQuery.page = 0;
        this.getItems();
      }
    }
  }
});
// CONCATENATED MODULE: ./src/pages/Search/index.vue?vue&type=script&lang=js&
 /* harmony default export */ var pages_Searchvue_type_script_lang_js_ = (Searchvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/Search/index.vue?vue&type=style&index=0&id=07febbed&lang=scss&scoped=true&
var Searchvue_type_style_index_0_id_07febbed_lang_scss_scoped_true_ = __webpack_require__("2d76");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/Search/index.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  pages_Searchvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "07febbed",
  null
  
)

/* harmony default export */ var Search = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "4c79":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return get_products; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return get_product; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return get_types; });
/* harmony import */ var _utils_request__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("b775");

function get_products(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'product',
    method: 'get',
    params: data
  });
}
function get_product(id) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'product/' + id,
    method: 'get'
  });
}
function get_types() {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'category',
    method: 'get'
  });
}

/***/ }),

/***/ "5fb4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a819");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InfiniteList_vue_vue_type_style_index_0_id_2daa8504_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "a819":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "d709":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ })

}]);