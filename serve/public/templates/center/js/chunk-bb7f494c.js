(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-bb7f494c"],{1080:function(t,e,i){},4365:function(t,e,i){"use strict";var s=i("1080"),n=i.n(s);n.a},"94a2":function(t,e,i){"use strict";i.r(e);var s=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("div",{staticClass:"product-page-title"},[i("el-button",{attrs:{size:"small"},on:{click:function(e){return t.$router.push({name:"ProductList"})}}},[t._v("返回商品列表")]),i("el-button",{staticStyle:{float:"right"},attrs:{size:"small",type:"primary"},on:{click:t.confirmChange}},[t._v("保存")])],1),i("div",{staticClass:"product-page-content"},[i("div",{staticClass:"item-content"},[i("div",[t._v("商品名称")]),i("el-input",{model:{value:t.item.product.product_title,callback:function(e){t.$set(t.item.product,"product_title",e)},expression:"item.product.product_title"}})],1),i("div",{staticClass:"item-content"},[i("div",[t._v("商品简介")]),i("el-input",{model:{value:t.item.product.product_des,callback:function(e){t.$set(t.item.product,"product_des",e)},expression:"item.product.product_des"}})],1),i("div",{staticClass:"item-content",staticStyle:{position:"relative"}},[i("div",[t._v("商品分类")]),i("div",[i("el-button",{staticStyle:{"margin-right":"30px"},attrs:{size:"small"},on:{click:t.toSelect}},[t._v("选择分类")]),t._l(t.item.categories,(function(e,s){return i("span",{key:s,staticClass:"cate-item",on:{click:function(e){return t.cateDelete(s)}}},[i("span",[t._v(t._s(e.category_title))]),i("i",{staticClass:"iconfont iconguanbi"})])}))],2),i("transition",{attrs:{name:"type"}},[i("div",{directives:[{name:"show",rawName:"v-show",value:t.typeShow,expression:"typeShow"},{name:"clickoutside",rawName:"v-clickoutside",value:t.closeType,expression:"closeType"}],staticClass:"item-type-select"},[i("div",{staticClass:"item-type-select__header"},[t._v("分类列表")]),t.t_loading?i("div",{staticClass:"item-type-select__placeholder"},[t._v("加载中...")]):t._e(),t.t_loading||0!==t.types.length?t._e():i("div",{staticClass:"item-type-select__placeholder"},[t._v("暂无分类")]),t.t_loading||0===t.types.length?t._e():i("ul",{staticClass:"item-type-select__content"},t._l(t.types,(function(e,s){return i("li",{key:s,class:{"is-active":-1!==t.selectId.indexOf(e.id),"is-disabled":-1!==t.currentType.indexOf(e.id)}},[i("div",{on:{click:function(i){return t.selectType(e)}}},[t._v(t._s(e.category_title))]),i("div",[-1!==t.selectId.indexOf(e.id)?i("i",{staticClass:"iconfont iconguanbi",on:{click:function(i){return t.deleteType(e)}}}):t._e()])])})),0),i("div",{staticClass:"item-type-select__footer"},[i("el-button",{attrs:{size:"small"},on:{click:t.closeType}},[t._v("取消")]),i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.addType}},[t._v("确定")])],1)])])],1),i("div",{staticClass:"item-content"},[i("div",[t._v("商品图片")]),i("div",{staticClass:"item-content-image"},[t._l(t.item.images,(function(e,s){return i("div",{key:s,staticClass:"image-items",on:{mouseenter:function(e){t.activeIndex=s},mouseleave:function(e){t.activeIndex=null}}},[i("div",{staticClass:"image-edit-button",class:{"is-active":t.activeIndex===s}},[i("div",{staticStyle:{width:"calc(100% - 30px)","padding-left":"5px"}},[i("span",{on:{click:function(i){return t.imgFront(e,s)}}},[i("i",{staticClass:"iconfont iconshangyiye"})]),i("span",{on:{click:function(i){return t.imgBack(e,s)}}},[i("i",{staticClass:"iconfont iconxiayiye"})])]),i("div",{staticStyle:{width:"20px","padding-right":"5px","text-align":"right"},on:{click:function(i){return t.imgDelete(e)}}},[i("i",{staticClass:"iconfont iconshanchu1"})])]),i("el-image",{staticStyle:{width:"150px",height:"150px"},attrs:{src:e.url}})],1)})),i("div",{staticClass:"image-add",on:{click:function(e){t.imageShow=!0}}},[i("i",{staticClass:"iconfont iconjiahao"})])],2)]),i("div",{staticClass:"item-content"},[i("div",[t._v("商品规格")]),t._m(0),t._l(t.item.variants,(function(e,s){return i("div",{key:s,staticClass:"item-variant-column"},[i("div",{staticStyle:{width:"calc(100% - 558px)"}},[i("el-input",{model:{value:e.variant_title,callback:function(i){t.$set(e,"variant_title",i)},expression:"variable.variant_title"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{model:{value:e.variant_code,callback:function(i){t.$set(e,"variant_code",i)},expression:"variable.variant_code"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number"},model:{value:e.quantity,callback:function(i){t.$set(e,"quantity",i)},expression:"variable.quantity"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.weight,callback:function(i){t.$set(e,"weight",i)},expression:"variable.weight"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.price,callback:function(i){t.$set(e,"price",i)},expression:"variable.price"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.ori_price,callback:function(i){t.$set(e,"ori_price",i)},expression:"variable.ori_price"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-button",{attrs:{type:"text"},on:{click:function(e){return t.varDelete(s)}}},[t._v("删除")]),i("el-button",{attrs:{type:"text"},on:{click:function(i){return t.varCopy(e)}}},[t._v("复制")])],1)])})),i("div",{staticStyle:{"margin-top":"10px"}},[i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.addVariable}},[t._v("添加规格")])],1)],2),i("div",{staticClass:"item-content"},[i("div",[t._v("商品详情")]),i("div",[i("tinymce",{model:{value:t.item.product.content,callback:function(e){t.$set(t.item.product,"content",e)},expression:"item.product.content"}})],1)]),i("div",{staticClass:"item-content"},[i("div",[t._v("物流模版")]),i("div",[i("el-select",{model:{value:t.item.product.shipment_id,callback:function(e){t.$set(t.item.product,"shipment_id",e)},expression:"item.product.shipment_id"}},t._l(t.shipments,(function(t,e){return i("el-option",{key:e,attrs:{label:t.shipment_name,value:t.id}})})),1)],1)]),i("div",{staticClass:"item-content"},[i("div",[t._v("上架情况")]),i("div",[i("el-switch",{attrs:{"active-text":"上架","inactive-text":"下架"},model:{value:t.item.product.on_sale,callback:function(e){t.$set(t.item.product,"on_sale",e)},expression:"item.product.on_sale"}})],1)]),i("div",{staticStyle:{margin:"20px 0 40px"}},[i("el-button",{attrs:{type:"primary",loading:t.btnLoading},on:{click:t.confirmChange}},[t._v("保存")])],1)]),i("image-dialog",{attrs:{Visible:t.imageShow},on:{close:function(e){t.imageShow=!1},confirm:t.addImage}})],1)},n=[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"item-variant-column item-variant-column__header"},[i("div",{staticStyle:{width:"calc(100% - 556px)"}},[t._v("规格名称"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("编号")]),i("div",{staticStyle:{width:"80px"}},[t._v("库存"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("重量/kg")]),i("div",{staticStyle:{width:"80px"}},[t._v("售价"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("原价")]),i("div",{staticStyle:{width:"80px"}},[t._v("操作")])])}],a=(i("4de4"),i("c975"),i("d81d"),i("a434"),i("b0c0"),i("c4c8")),c=i("c405"),l=i("fe27"),o=i("6a95"),r=i("8256"),d=i("9169"),u={components:{ImageDialog:o["a"],Tinymce:r["a"]},directives:{Clickoutside:d["a"]},data:function(){return{item:{product:{on_sale:0},images:[],variants:[{variant_title:null,variant_code:null,quantity:null,weight:null,price:null,ori_price:null}],categories:[]},activeIndex:null,imageShow:!1,typeShow:!1,t_loading:!1,types:[],currentType:[],selectId:[],selectTypes:[],shipments:[],btnLoading:!1}},created:function(){this.getShipments()},beforeRouteLeave:function(t,e,i){"ProductList"===t.name?t.meta.keepAlive=!0:t.meta.keepAlive=!1,i()},methods:{cateDelete:function(t){this.item.categories.splice(t,1)},toSelect:function(){var t=this;this.item.categories.map((function(e){t.currentType.push(e.id)})),this.selectTypes=[],this.selectId=[],this.typeShow=!0,this.getTypes()},getTypes:function(){var t=this;this.t_loading=!0,Object(c["c"])().then((function(e){var i=e.data.body;t.types=i,t.t_loading=!1})).catch((function(){t.t_loading=!1}))},getShipments:function(){var t=this;Object(l["d"])().then((function(e){t.shipments=e.data.body}))},selectType:function(t){if(-1===this.currentType.indexOf(t.id)){var e=this.selectId.indexOf(t.id);-1===e&&(this.selectId.push(t.id),this.selectTypes.push(t))}},deleteType:function(t){var e=this.selectId.indexOf(t.id);-1!==e&&(this.selectId.splice(e,1),this.selectTypes.splice(e,1))},closeType:function(){this.typeShow=!1,this.types=[],this.currentType=[]},addType:function(){var t=this;0!==this.selectId.length?(this.selectTypes.map((function(e){t.item.categories.push(e)})),this.typeShow=!1,this.types=[],this.currentType=[]):this.$message.warning("请选择分类")},imgFront:function(t,e){1!==t.sort&&(t.sort-=1,this.item.images[e-1].sort+=1,this.item.images[e]=this.item.images.splice(e-1,1,this.item.images[e])[0])},imgBack:function(t,e){t.sort!==this.item.images.length&&(t.sort+=1,this.item.images[e+1].sort-=1,this.item.images[e]=this.item.images.splice(e+1,1,this.item.images[e])[0])},imgDelete:function(t){this.item.images.splice(t,1)},addImage:function(t){var e=this;this.imageShow=!1;var i=0!==this.item.images.length?this.item.images[this.item.images.length-1].sort:0;t.map((function(t,s){var n={url:t.url,id:t.id,sort:i+s+1};e.item.images.push(n)}))},addVariable:function(){var t={variant_title:null,variant_code:null,quantity:null,weight:null,price:null,ori_price:null};this.item.variants.push(t)},varDelete:function(t){this.item.variants.splice(t,1)},varCopy:function(t){var e={variant_title:t.variant_title,variant_code:t.variant_code,quantity:t.quantity,weight:t.weight,price:t.price,ori_price:t.ori_price};this.item.variants.push(e)},confirmChange:function(){var t=this;if(this.item.product.product_title)if(0!==this.item.variants.length){var e=this.item.variants.filter((function(t){return null===t.variant_title||null===t.price||null===t.quantity}));if(0===e.length)if(this.item.product.shipment_id){this.btnLoading=!0;var i=[];this.item.categories.map((function(t){i.push(t.id)})),this.item.categories=i;var s=[];this.item.images.map((function(t){s.push({image_id:t.id,sort:t.sort})})),this.item.images=s,Object(a["a"])(this.item).then((function(){t.$message.success("商品创建成功"),t.$router.push({name:"ProductList"}),t.btnLoading=!1})).catch((function(e){t.$message.warning(e.response.data.message),t.btnLoading=!1}))}else this.$message.warning("请选择物流模版");else this.$message.warning("商品规格填写不完整")}else this.$message.warning("商品至少应有一个规格");else this.$message.warning("商品名称为必填")}}},p=u,m=(i("4365"),i("c301"),i("2877")),v=Object(m["a"])(p,s,n,!1,null,"1f03f39c",null);e["default"]=v.exports},a728:function(t,e,i){},c301:function(t,e,i){"use strict";var s=i("a728"),n=i.n(s);n.a}}]);