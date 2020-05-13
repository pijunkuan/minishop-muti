(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["chunk-4554460e"],{

/***/ "2f94":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return get_addresses; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return create_address; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return edit_address; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return delete_address; });
/* harmony import */ var _utils_request__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("b775");

function get_addresses(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'address',
    method: 'get',
    params: data
  });
}
function create_address(data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'address',
    method: 'post',
    data: data
  });
}
function edit_address(id, data) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'address/' + id,
    method: 'put',
    data: data
  });
}
function delete_address(id) {
  return Object(_utils_request__WEBPACK_IMPORTED_MODULE_0__[/* default */ "a"])({
    url: 'address/' + id,
    method: 'delete'
  });
}

/***/ }),

/***/ "3d59":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "4296":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"eb31d644-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Address.vue?vue&type=template&id=29989dc2&scoped=true&
var render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"address-functional"},[(!_vm.isEdit)?_c('div',[_c('shop-button',{attrs:{"size":"small"},on:{"click":_vm.toAdd}},[_vm._v("新增地址")])],1):_vm._e(),(_vm.isEdit)?_c('div',[_c('shop-button',{attrs:{"size":"small"},on:{"click":_vm.toDelete}},[_vm._v("删除地址")])],1):_vm._e(),_c('div',[_c('shop-button',{attrs:{"size":"small","type":"border"},on:{"click":_vm.cancelEdit}},[_vm._v(_vm._s(_vm.isEdit ? '取消' : '删除'))])],1)]),_c('ul',{directives:[{name:"infinite-scroll",rawName:"v-infinite-scroll",value:(_vm.getMore),expression:"getMore"}],staticClass:"address-list",style:({height: _vm.height - 1 + 'px'}),attrs:{"infinite-scroll-disabled":"loading","infinite-scroll-distance":"10","infinite-scroll-immediate-check":""}},[_vm._l((_vm.addresses),function(item,index){return _c('li',{key:index},[(_vm.isEdit)?_c('shop-checkbox',{staticClass:"address-checkbox",attrs:{"label":item.id},model:{value:(_vm.selected),callback:function ($$v) {_vm.selected=$$v},expression:"selected"}}):_vm._e(),_c('div',{staticClass:"address-content",class:{'has-width':_vm.isEdit},on:{"click":function($event){return _vm.toEdit(item)}}},[_c('div',[_c('div',[_vm._v("收件人：")]),_c('div',[_vm._v(_vm._s(item.name))])]),_c('div',[_c('div',[_vm._v("联系方式：")]),_c('div',[_vm._v(_vm._s(item.mobile))])]),_c('div',[_c('div',[_vm._v("收件地址：")]),_c('div',[_vm._v(_vm._s(item.full_address))])])])],1)}),(!_vm.nomore)?_c('div',{staticClass:"address-placeholder"},[_vm._v("加载中...")]):_vm._e(),(_vm.nomore)?_c('div',{staticClass:"address-placeholder"},[_vm._v("没有更多了")]):_vm._e()],2),_c('shop-popup',{attrs:{"show":_vm.addShow,"full":""}},[_c('div',{attrs:{"slot":"title"},slot:"title"},[_vm._v(_vm._s(_vm.editType === 'edit' ? '编辑地址' : '新增地址'))]),_c('div',{staticClass:"add-popup-content",attrs:{"slot":"content"},slot:"content"},[_c('div',[_c('div',[_vm._v("收件人")]),_c('shop-input',{attrs:{"rounded":false},model:{value:(_vm.editAddress.name),callback:function ($$v) {_vm.$set(_vm.editAddress, "name", $$v)},expression:"editAddress.name"}})],1),_c('div',[_c('div',[_vm._v("联系方式")]),_c('shop-input',{attrs:{"rounded":false},model:{value:(_vm.editAddress.mobile),callback:function ($$v) {_vm.$set(_vm.editAddress, "mobile", $$v)},expression:"editAddress.mobile"}})],1),_c('div',[_c('div',[_vm._v("省市区")]),_c('shop-dispicker',{attrs:{"value":_vm.editAddress.dispicker},on:{"change":_vm.changeDispicker}})],1),_c('div',[_c('div',[_vm._v("邮政编码")]),_c('shop-input',{attrs:{"rounded":false},model:{value:(_vm.editAddress.zip),callback:function ($$v) {_vm.$set(_vm.editAddress, "zip", $$v)},expression:"editAddress.zip"}})],1),_c('div',[_c('div',[_vm._v("详细地址")]),_c('shop-input',{attrs:{"rounded":false},model:{value:(_vm.editAddress.detail),callback:function ($$v) {_vm.$set(_vm.editAddress, "detail", $$v)},expression:"editAddress.detail"}})],1)]),_c('div',{attrs:{"slot":"button"},slot:"button"},[_c('div',{staticClass:"add-popup-button"},[_c('shop-button',{attrs:{"type":"border","rounded":false},on:{"click":_vm.closeAdd}},[_vm._v("关闭")])],1),_c('div',{staticClass:"add-popup-button"},[_c('shop-button',{attrs:{"rounded":false},on:{"click":_vm.confirmAdd}},[_vm._v("确认")])],1)])])],1)}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/pages/User/Address.vue?vue&type=template&id=29989dc2&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.concat.js
var es_array_concat = __webpack_require__("99af");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// EXTERNAL MODULE: ./src/api/address.js
var address = __webpack_require__("2f94");

// EXTERNAL MODULE: ./node_modules/mint-ui/lib/mint-ui.common.js
var mint_ui_common = __webpack_require__("76a0");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/pages/User/Address.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var Addressvue_type_script_lang_js_ = ({
  data: function data() {
    return {
      loading: false,
      nomore: false,
      height: 0,
      addresses: [],
      fetchQuery: {
        page: 0,
        pageSize: 15
      },
      selected: [],
      addShow: false,
      isEdit: false,
      editType: 'add',
      editAddress: {
        name: '',
        dispicker: [],
        detail: '',
        mobile: '',
        zip: ''
      },
      index: 0
    };
  },
  mounted: function mounted() {
    var _this = this;

    this.$nextTick(function () {
      _this.height = window.innerHeight - 170;
    });
  },
  methods: {
    getMore: function getMore() {
      var _this2 = this;

      this.loading = true;
      this.noresult = false;
      var _data = [];
      this.fetchQuery.page += 1;
      Object(address["d" /* get_addresses */])(this.fetchQuery).then(function (r) {
        _data = r.data.body.data;

        if (_data.length === 0) {
          _this2.loading = true;
          _this2.nomore = true;
        } else {
          _this2.addresses = _this2.addresses.concat(_data);
          _this2.loading = false;
          _this2.nomore = false;
        }
      }).catch(function (e) {
        _this2.loading = true;
        _this2.nomore = true;

        if (e.response.status === 401) {
          Object(mint_ui_common["Toast"])({
            message: '登录超时',
            duration: 1000
          });

          _this2.$store.dispatch('logout');

          setTimeout(function () {
            _this2.$router.push({
              name: 'Login',
              query: {
                from: _this2.$route.name
              }
            });
          }, 1000);
        }
      });
    },
    cancelEdit: function cancelEdit() {
      this.isEdit = !this.isEdit;
      this.selected = [];
    },
    toAdd: function toAdd() {
      this.addShow = true;
      this.editType = 'add';
    },
    toEdit: function toEdit(item) {
      this.addShow = true;
      this.editType = 'edit';
      this.editAddress = {
        id: item.id,
        name: item.name,
        mobile: item.mobile,
        dispicker: [],
        detail: item.detail,
        zip: item.zip
      };
      this.editAddress.dispicker.push(item.province);
      this.editAddress.dispicker.push(item.city);
      this.editAddress.dispicker.push(item.district);
    },
    changeDispicker: function changeDispicker(val) {
      this.editAddress.dispicker = val;
    },
    closeAdd: function closeAdd() {
      this.addShow = false;
      this.editAddress = {
        name: '',
        mobile: '',
        dispicker: [],
        detail: '',
        zip: ''
      };
    },
    confirmAdd: function confirmAdd() {
      var _this3 = this;

      var _data = {
        name: this.editAddress.name,
        province: this.editAddress.dispicker[0],
        city: this.editAddress.dispicker[1],
        district: this.editAddress.dispicker[2],
        detail: this.editAddress.detail,
        mobile: this.editAddress.mobile,
        zip: this.editAddress.zip
      };

      if (this.editType === 'edit') {
        Object(address["c" /* edit_address */])(this.editAddress.id, _data).then(function () {
          _this3.fetchQuery.page = 0;
          _this3.addresses = [];

          _this3.getMore();

          _this3.closeAdd();
        }).catch(function (e) {
          Object(mint_ui_common["Toast"])(e.response.data.message);
        });
      } else {
        Object(address["a" /* create_address */])(_data).then(function () {
          _this3.fetchQuery.page = 0;
          _this3.addresses = [];

          _this3.getMore();

          _this3.closeAdd();
        }).catch(function (e) {
          Object(mint_ui_common["Toast"])(e.response.data.message);
        });
      }
    },
    toDelete: function toDelete() {
      var _this4 = this;

      if (this.index === this.selected.length) {
        this.index = 0;
        this.selected = [];
        this.isEdit = false;
        this.fetchQuery.page = 0;
        this.addresses = [];
        this.getMore();
        return;
      }

      var _id = this.selected[this.index];
      Object(address["b" /* delete_address */])(_id).then(function () {
        _this4.index += 1;

        _this4.toDelete();
      }).catch(function (e) {
        if (e.response.status === 401) {
          _this4.$router.push({
            name: 'Login',
            query: {
              from: 'UserAddress'
            }
          });
        }
      });
    }
  }
});
// CONCATENATED MODULE: ./src/pages/User/Address.vue?vue&type=script&lang=js&
 /* harmony default export */ var User_Addressvue_type_script_lang_js_ = (Addressvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/pages/User/Address.vue?vue&type=style&index=0&id=29989dc2&lang=scss&scoped=true&
var Addressvue_type_style_index_0_id_29989dc2_lang_scss_scoped_true_ = __webpack_require__("5bea");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/pages/User/Address.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  User_Addressvue_type_script_lang_js_,
  render,
  staticRenderFns,
  false,
  null,
  "29989dc2",
  null
  
)

/* harmony default export */ var Address = __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "5bea":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Address_vue_vue_type_style_index_0_id_29989dc2_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3d59");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Address_vue_vue_type_style_index_0_id_29989dc2_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Address_vue_vue_type_style_index_0_id_29989dc2_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Address_vue_vue_type_style_index_0_id_29989dc2_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ })

}]);