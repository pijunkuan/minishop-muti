(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1f86162d"],{"21e0":function(t,e,i){"use strict";i.r(e);var s=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("div",{staticClass:"product-page-title"},[i("el-button",{attrs:{size:"small"},on:{click:function(e){return t.$router.go(-1)}}},[t._v("返回")]),i("span",{staticClass:"page-item-title"},[t._v(t._s(t.item.product.product_title))]),i("span",{staticStyle:{float:"right"}},[i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.toPreview}},[t._v("手机预览")]),i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.toShare}},[t._v("分享商品")]),i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.confirmChange}},[t._v("保存")])],1)],1),i("div",{staticClass:"product-page-content"},[i("div",{staticClass:"item-content"},[i("div",[t._v("商品名称")]),i("el-input",{model:{value:t.item.product.product_title,callback:function(e){t.$set(t.item.product,"product_title",e)},expression:"item.product.product_title"}})],1),i("div",{staticClass:"item-content"},[i("div",[t._v("商品简介")]),i("el-input",{model:{value:t.item.product.product_des,callback:function(e){t.$set(t.item.product,"product_des",e)},expression:"item.product.product_des"}})],1),i("div",{staticClass:"item-content",staticStyle:{position:"relative"}},[i("div",[t._v("商品分类")]),i("div",[i("el-button",{staticStyle:{"margin-right":"30px"},attrs:{size:"small"},on:{click:t.toSelect}},[t._v("选择分类")]),t._l(t.item.categories,(function(e,s){return i("span",{key:s,staticClass:"cate-item",on:{click:function(e){return t.cateDelete(s)}}},[i("span",[t._v(t._s(e.category_title))]),i("i",{staticClass:"iconfont iconguanbi"})])}))],2),i("transition",{attrs:{name:"type"}},[i("div",{directives:[{name:"show",rawName:"v-show",value:t.typeShow,expression:"typeShow"},{name:"clickoutside",rawName:"v-clickoutside",value:t.closeType,expression:"closeType"}],staticClass:"item-type-select"},[i("div",{staticClass:"item-type-select__header"},[t._v("分类列表")]),t.t_loading?i("div",{staticClass:"item-type-select__placeholder"},[t._v("加载中...")]):t._e(),t.t_loading||0!==t.types.length?t._e():i("div",{staticClass:"item-type-select__placeholder"},[t._v("暂无分类")]),t.t_loading||0===t.types.length?t._e():i("ul",{staticClass:"item-type-select__content"},t._l(t.types,(function(e,s){return i("li",{key:s,class:{"is-active":-1!==t.selectId.indexOf(e.id),"is-disabled":-1!==t.currentType.indexOf(e.id)}},[i("div",{on:{click:function(i){return t.selectType(e)}}},[t._v(t._s(e.category_title))]),i("div",[-1!==t.selectId.indexOf(e.id)?i("i",{staticClass:"iconfont iconguanbi",on:{click:function(i){return t.deleteType(e)}}}):t._e()])])})),0),i("div",{staticClass:"item-type-select__footer"},[i("el-button",{attrs:{size:"small"},on:{click:t.closeType}},[t._v("取消")]),i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.addType}},[t._v("确定")])],1)])])],1),i("div",{staticClass:"item-content"},[i("div",[t._v("商品图片")]),i("div",{staticClass:"item-content-image"},[t._l(t.item.images,(function(e,s){return i("div",{key:s,staticClass:"image-items",on:{mouseenter:function(e){t.activeIndex=s},mouseleave:function(e){t.activeIndex=null}}},[i("div",{staticClass:"image-edit-button",class:{"is-active":t.activeIndex===s}},[i("div",{staticStyle:{width:"calc(100% - 30px)","padding-left":"5px"}},[i("span",{on:{click:function(i){return t.imgFront(e,s)}}},[i("i",{staticClass:"iconfont iconshangyiye"})]),i("span",{on:{click:function(i){return t.imgBack(e,s)}}},[i("i",{staticClass:"iconfont iconxiayiye"})])]),i("div",{staticStyle:{width:"20px","padding-right":"5px","text-align":"right"},on:{click:function(i){return t.imgDelete(e)}}},[i("i",{staticClass:"iconfont iconshanchu1"})])]),i("el-image",{staticStyle:{width:"150px",height:"150px"},attrs:{src:e.url}})],1)})),i("div",{staticClass:"image-add",on:{click:function(e){t.imageShow=!0}}},[i("i",{staticClass:"iconfont iconjiahao"})])],2)]),i("div",{staticClass:"item-content"},[i("div",[t._v("商品规格")]),t._m(0),t._l(t.item.variants,(function(e,s){return i("div",{key:s,staticClass:"item-variant-column"},[i("div",{staticStyle:{width:"calc(100% - 558px)"}},[i("el-input",{model:{value:e.variant_title,callback:function(i){t.$set(e,"variant_title",i)},expression:"variable.variant_title"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{model:{value:e.variant_code,callback:function(i){t.$set(e,"variant_code",i)},expression:"variable.variant_code"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number"},model:{value:e.quantity,callback:function(i){t.$set(e,"quantity",i)},expression:"variable.quantity"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.weight,callback:function(i){t.$set(e,"weight",i)},expression:"variable.weight"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.price,callback:function(i){t.$set(e,"price",i)},expression:"variable.price"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-input",{attrs:{type:"number",step:"0.01"},model:{value:e.ori_price,callback:function(i){t.$set(e,"ori_price",i)},expression:"variable.ori_price"}})],1),i("div",{staticStyle:{width:"80px"}},[i("el-button",{attrs:{type:"text"},on:{click:function(e){return t.varDelete(s)}}},[t._v("删除")]),i("el-button",{attrs:{type:"text"},on:{click:function(i){return t.varCopy(e)}}},[t._v("复制")])],1)])})),i("div",{staticStyle:{"margin-top":"10px"}},[i("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.addVariable}},[t._v("添加规格")])],1)],2),i("div",{staticClass:"item-content"},[i("div",[t._v("商品详情")]),i("div",[i("tinymce",{model:{value:t.item.content,callback:function(e){t.$set(t.item,"content",e)},expression:"item.content"}})],1)]),i("div",{staticClass:"item-content"},[i("div",[t._v("物流模版")]),i("div",[i("el-select",{model:{value:t.item.product.shipment_id,callback:function(e){t.$set(t.item.product,"shipment_id",e)},expression:"item.product.shipment_id"}},t._l(t.shipments,(function(t,e){return i("el-option",{key:e,attrs:{label:t.shipment_name,value:t.id}})})),1)],1)]),i("div",{staticClass:"item-content"},[i("div",[t._v("上架情况")]),i("div",[i("el-switch",{attrs:{"active-text":"上架","inactive-text":"下架"},model:{value:t.item.product.on_sale,callback:function(e){t.$set(t.item.product,"on_sale",e)},expression:"item.product.on_sale"}})],1)]),i("div",{staticStyle:{margin:"20px 0 40px"}},[i("el-button",{attrs:{type:"primary",loading:t.btnLoading},on:{click:t.confirmChange}},[t._v("保存")])],1)]),i("image-dialog",{attrs:{Visible:t.imageShow},on:{close:function(e){t.imageShow=!1},confirm:t.addImage}}),i("el-dialog",{attrs:{visible:t.previewShow,title:"手机预览",center:"",width:"300px"},on:{close:t.closePreview}},[i("div",{staticClass:"preview-qrcode"},[i("div",{attrs:{id:"qrcode"}}),i("div",[t._v("扫描上方二维码，手机预览页面效果")])]),i("div",{attrs:{slot:"footer"},slot:"footer"},[i("el-button",{attrs:{type:"primary",size:"small"},on:{click:t.closePreview}},[t._v("关闭")])],1)]),i("el-dialog",{attrs:{visible:t.shareShow,title:"分享商品",width:"500px"},on:{close:t.closeShare}},[i("div",{staticClass:"share-image-loading"},[i("i",{staticClass:"el-icon-loading"}),t._v("正在生成分享图片 ")]),i("div",{ref:"shareimg",staticClass:"share-image-block"},[i("div",{ref:"shareImage",staticClass:"share-img"}),i("div",[t._v("分享至微信群、QQ群、微博，帮助您快速触达客户")])]),i("div",{ref:"sharebtn",staticClass:"share-image-btn"},[i("div",{attrs:{id:"shareLink"}})])]),t.shareShow?i("div",[i("div",{staticClass:"share-box"},[i("div",{staticStyle:{width:"750px"},attrs:{id:"shareBox"}},[0!==t.item.images.length?i("div",{staticClass:"share-content-img"},[i("img",{attrs:{id:"itemImage",src:t.item.images[0].url}})]):t._e(),0===t.item.images.length?i("div",{staticClass:"share-content-blank"},[t._m(1)]):t._e(),i("div",{staticClass:"share-content-bottom"},[i("div",[i("div",{staticClass:"share-title"},[t._v(t._s(t.item.product.product_title))]),i("div",{staticClass:"share-price"},[t._v("¥ "+t._s(t.item.variants[0].price))]),i("div",{staticClass:"share-subtext"},[t._v("长按右侧二维码识别，查看详情")])]),t._m(2)])])])]):t._e()],1)},a=[function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"item-variant-column item-variant-column__header"},[i("div",{staticStyle:{width:"calc(100% - 556px)"}},[t._v("规格名称"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("编号")]),i("div",{staticStyle:{width:"80px"}},[t._v("库存"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("重量/kg")]),i("div",{staticStyle:{width:"80px"}},[t._v("售价"),i("span",[t._v("(必填)")])]),i("div",{staticStyle:{width:"80px"}},[t._v("原价")]),i("div",{staticStyle:{width:"80px"}},[t._v("操作")])])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("i",{staticClass:"iconfont icontupian1"})])},function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[i("div",{attrs:{id:"shareCode"}})])}],n=(i("4de4"),i("c975"),i("baa5"),i("d81d"),i("a434"),i("b0c0"),i("c4c8")),c=i("c405"),o=i("fe27"),l=i("b775");function r(t){return Object(l["a"])({url:"tools/img2base64",method:"post",data:t})}var d=i("6a95"),h=i("8256"),u=i("9169"),v=(i("9911"),i("d044")),m=i.n(v);function p(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=t.id,i=t.link,s=t.height,a=void 0===s?150:s,n=t.width,c=void 0===n?150:n,o=new m.a(e,{text:i,height:a,width:c,colorDark:"#000",colorLight:"#fff"});return o}var g=i("c0e9"),f=i.n(g);function y(t,e,i){var s=i.$refs[e],a=document.createElement("img");a.style.width="100%",a.style.height="100%",a.style.borderRadius="10px",s.insertBefore(a,s.childNodes[0]),a.setAttribute("src",t)}function _(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},e=t.box,i=t.image,s=t.that,a=t.link,n=void 0===a?"":a,c=t.title,o=void 0===c?"":c,l=t.show,r=void 0===l?[]:l,d=document.createElement("canvas"),h=document.getElementById(e),u=parseInt(window.getComputedStyle(h).width),v=parseInt(window.getComputedStyle(h).height);d.width=u,d.height=v,d.style.width=u+"px",d.style.height=v+"px";var m=d.getContext("2d");m.scale(1,1);var p={backgroundColor:null,canvas:d,userCORS:!0};f()(h,p).then((function(t){var e=t.toDataURL("image/png");if(y(e,i,s),n){var a=document.getElementById(n),c=document.createElement("a");a.insertBefore(c,a.childNodes[0]),c.href=e,c.innerHTML="<div><i style='font-size:30px' class='iconfont iconfenxiang'></i><div style='margin-top:5px'>点击下载</div></div>",c.download=o||"图片下载",c.style.color="#3d4495",c.style.fontWeight="500",c.style.textDecoration="none"}0!==r.length&&r.map((function(t){s.$refs[t].style.display="block"}))}))}var w={components:{ImageDialog:d["a"],Tinymce:h["a"]},directives:{Clickoutside:u["a"]},data:function(){return{item:{product:{},images:[],variants:[{variant_title:null,variant_code:null,quantity:null,weight:null,price:null,ori_price:null}],categories:[],content:""},activeIndex:null,imageShow:!1,typeShow:!1,t_loading:!1,types:[],currentType:[],selectId:[],selectTypes:[],shipments:[],btnLoading:!1,previewShow:!1,shareShow:!1,link:""}},created:function(){void 0!==this.$route.query.id&&this.getItem(),this.getShipments()},beforeRouteLeave:function(t,e,i){"ProductList"===t.name?t.meta.keepAlive=!0:t.meta.keepAlive=!1,i()},methods:{getItem:function(){var t=this;this.$loading(),Object(n["d"])(this.$route.query.id).then((function(e){t.item=e.data.body,t.$loading().close()})).catch((function(){t.$loading().close()}))},getShipments:function(){var t=this;Object(o["d"])().then((function(e){t.shipments=e.data.body}))},cateDelete:function(t){this.item.categories.splice(t,1)},toSelect:function(){var t=this;this.item.categories.map((function(e){t.currentType.push(e.id)})),this.selectTypes=[],this.selectId=[],this.typeShow=!0,this.getTypes()},getTypes:function(){var t=this;this.t_loading=!0,Object(c["c"])().then((function(e){var i=e.data.body;t.types=i,t.t_loading=!1})).catch((function(){t.t_loading=!1}))},selectType:function(t){if(-1===this.currentType.indexOf(t.id)){var e=this.selectId.indexOf(t.id);-1===e&&(this.selectId.push(t.id),this.selectTypes.push(t))}},deleteType:function(t){var e=this.selectId.indexOf(t.id);-1!==e&&(this.selectId.splice(e,1),this.selectTypes.splice(e,1))},closeType:function(){this.typeShow=!1,this.types=[],this.currentType=[]},addType:function(){var t=this;0!==this.selectId.length?(this.selectTypes.map((function(e){t.item.categories.push(e)})),this.typeShow=!1,this.types=[],this.currentType=[]):this.$message.warning("请选择分类")},imgFront:function(t,e){if(0!==t.sort){var i=t.sort,s=t.sort-1;t.sort=s,this.item.images[e-1].sort=i,this.item.images[e]=this.item.images[e-1],this.item.images[e-1]=t}},imgBack:function(t,e){if(t.sort!==this.item.images.length-1){var i=t.sort,s=t.sort+1;t.sort=s,this.item.images[e+1].sort=i,this.item.images[e]=this.item.images[e+1],this.item.images[e+1]=t}},imgDelete:function(t){this.item.images.splice(t,1)},addImage:function(t){var e=this;this.imageShow=!1;var i=0!==this.item.images.length?this.item.images[this.item.images.length-1].sort:0;t.map((function(t,s){var a={url:t.url,id:t.id,sort:i+s+1};e.item.images.push(a)}))},addVariable:function(){var t={variant_title:null,variant_code:null,quantity:null,weight:null,price:null,ori_price:null};this.item.variants.push(t)},varDelete:function(t){this.item.variants.splice(t,1)},varCopy:function(t){var e={variant_title:t.variant_title,variant_code:t.variant_code,quantity:t.quantity,weight:t.weight,price:t.price,ori_price:t.ori_price};this.item.variants.push(e)},confirmChange:function(){var t=this;if(this.item.product.product_title)if(0!==this.item.variants.length){var e=this.item.variants.filter((function(t){return null===t.variant_title||null===t.price||null===t.quantity}));if(0===e.length){this.btnLoading=!0;var i=[];this.item.categories.map((function(t){i.push(t.id)})),this.item.categories=i;var s=[];this.item.images.map((function(t){s.push({image_id:void 0!==t.id?t.id:t.image_id,sort:t.sort})})),this.item.images=s,Object(n["c"])(this.item,this.$route.query.id).then((function(){t.$message.success("商品修改成功"),t.btnLoading=!1,t.getItem()})).catch((function(e){t.$message.warning(e.response.data.message),t.btnLoading=!1}))}else this.$message.warning("商品规格填写不完整")}else this.$message.warning("商品至少应有一个规格");else this.$message.warning("商品名称为必填")},toPreview:function(){var t=this;this.previewShow=!0,this.$nextTick((function(){p({link:location.origin+"/product/"+t.$route.query.id,height:200,width:200,id:"qrcode"})}))},toShare:function(){var t=this;this.shareShow=!0,this.$nextTick((function(){var e=document.getElementById("itemImage");if(e){var i=e.src.substr(e.src.lastIndexOf(".")+1);r({url:e.src}).then((function(s){e.src="data:image/"+i+";base64,"+s.data,e.setAttribute("crossOrigin","Anonymous"),p({link:location.origin+"/product/"+t.$route.query.id,height:180,width:180,id:"shareCode"}),_({box:"shareBox",image:"shareImage",that:t,link:"shareLink",title:t.item.product.product_title,show:["shareimg","sharebtn"]})}))}else p({link:location.origin+"/product/"+t.$route.query.id,height:180,width:180,id:"shareCode"}),_({box:"shareBox",image:"shareImage",that:t,link:"shareLink",title:t.item.product.product_title,show:["shareimg","sharebtn"]})}))},closeShare:function(){var t=this.$refs.shareImage;while(t.hasChildNodes())t.removeChild(t.firstChild);var e=this.$refs.sharebtn,i=this.$refs.shareimg;i.style.display="none",e.style.display="none";var s=document.getElementById("shareLink");while(s.hasChildNodes())s.removeChild(s.firstChild);this.shareShow=!1},closePreview:function(){var t=document.getElementById("qrcode");while(t.hasChildNodes())t.removeChild(t.firstChild);this.previewShow=!1}}},b=w,x=(i("2a7d"),i("b913"),i("2877")),C=Object(x["a"])(b,s,a,!1,null,"61a7bfc4",null);e["default"]=C.exports},"2a7d":function(t,e,i){"use strict";var s=i("87d2"),a=i.n(s);a.a},"87d2":function(t,e,i){},a58a:function(t,e,i){},b913:function(t,e,i){"use strict";var s=i("a58a"),a=i.n(s);a.a}}]);