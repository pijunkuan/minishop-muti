(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-f4c9e48e"],{2345:function(t,e,a){"use strict";var i=a("715c"),r=a.n(i);r.a},"2a0a":function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("div",{staticClass:"dashboard-contain"},[a("div",{staticClass:"dashboard-1"},[t._m(0),a("div",{staticClass:"dashboard-1-data"},[a("div",[a("div",{staticClass:"data-card-title-1"},[a("strong",{staticStyle:{color:"#E6A23C"}},[t._v(t._s(t.order.processing_count))])]),a("div",{staticClass:"data-card-title-2"},[t._v("待配送订单")]),a("div",{staticClass:"data-card-title-3",staticStyle:{height:"34px"}},[a("span",{staticStyle:{color:"#409EFF",cursor:"pointer"},on:{click:function(e){return t.toOrder("processing")}}},[t._v("查看")])])]),a("div",[a("div",{staticClass:"data-card-title-1"},[t._v("¥ "+t._s(t.order.day_new_order_suc_amount))]),a("div",{staticClass:"data-card-title-2"},[t._v("今日总金额")]),a("div",{staticClass:"data-card-title-3"},[a("div",[t._v("昨日总金额: ")]),a("div",[a("strong",[t._v(t._s(t.order.yesterday_order_suc_amount))])])])]),a("div",[a("div",{staticClass:"data-card-title-1"},[t._v(t._s(t.order.day_new_order_count))]),a("div",{staticClass:"data-card-title-2"},[t._v("今日订单数")]),a("div",{staticClass:"data-card-title-3"},[a("div",[t._v("昨日订单数: ")]),a("div",[a("strong",[t._v(t._s(t.order.yesterday_order_count))])])])]),a("div",[a("div",{staticClass:"data-card-title-1"},[t._v(t._s(t.customer.today_customer_count))]),a("div",{staticClass:"data-card-title-2"},[t._v("今日新顾客")]),a("div",{staticClass:"data-card-title-3"},[a("div",[t._v("昨日新顾客: ")]),a("div",[a("strong",[t._v(t._s(t.customer.yesterday_customer_count))])])])]),a("div",[a("div",{staticClass:"data-card-title-1"},[t._v(t._s(t.order.refunding_count))]),a("div",{staticClass:"data-card-title-2"},[t._v("退款中")]),a("div",{staticClass:"data-card-title-3",staticStyle:{height:"34px"}},[a("span",{staticStyle:{color:"#409EFF",cursor:"pointer"},on:{click:function(e){return t.toOrder("refunding")}}},[t._v("查看")])])])])]),a("div",{staticClass:"dashboard-2"},[a("div",{staticClass:"order-line"},[t._m(1),a("div",[a("muti-line",{attrs:{id:"orderLineCircle",className:"orderLineCircleClass",Show:t.lineShow,Height:300,Values:t.order_line}})],1)]),a("div",{staticClass:"image-info"},[t._m(2),a("div",{staticStyle:{"padding-left":"20px"}},[a("div",[a("water-liquid",{attrs:{id:"ImageCircle",className:"ImageCircleClass",Show:t.waterShow,Height:200,Value:t.image.bytes_percent}})],1),a("div",{staticStyle:{padding:"0 0 48px 10px"}},[a("div",{staticClass:"data-card-title-3"},[t._v(" 已使用："+t._s(t.image.bytes_value)+" ")]),a("div",{staticClass:"data-card-title-3"},[t._v(" 总大小："),a("span",[t._v(t._s(t.$store.getters.shop_img_limit))]),t._v(" GB ")]),a("div",{staticClass:"data-card-title-3"},[t._v(" 图片数量："+t._s(t.image.count)+" ")])])])])])]),a("div",{staticClass:"ad-contain"},[a("div",{staticClass:"web-title-container"},[a("div",{staticClass:"web-title"},[a("strong",[t._v(t._s(t.$store.getters.shop_name))])]),a("div",{staticClass:"web-url"},[t._v(t._s(t.$store.getters.shop_url+"."+t.$store.getters.shop_host))])]),a("div",[a("div",{staticClass:"web-item"},[a("div",[t._v("认证状况")]),a("div",[a("div",[t._v(t._s(t.certify_type)),a("span",{staticClass:"inline-button",on:{click:function(e){return t.$router.push({name:"Certify"})}}},[t._v("查看")])])])]),a("div",{staticClass:"web-item"},[a("div",[t._v("当前版本")]),a("div",{staticClass:"web-item__level"},[a("i",{staticClass:"iconfont iconhuiyuan"}),a("span",[t._v(t._s(t.$store.getters.shop_level))]),a("span",{staticClass:"inline-button",on:{click:function(e){return t.toUpgrade("upgrade")}}},[t._v("升级")])])]),a("div",{staticClass:"web-item"},[a("div",[t._v("有效期至")]),a("div",[t._v(t._s(t.$store.getters.shop_exp)),a("span",{staticClass:"inline-button",on:{click:function(e){return t.toUpgrade("long")}}},[t._v("续费")])])])]),a("div",{staticClass:"web-service"},[a("div",{staticClass:"service-title"},[t._v("联系客服")]),a("div",{staticClass:"service-info"},[a("div",[t.service.qrcode?a("img",{attrs:{src:t.service.qrcode}}):t._e()])])])]),a("el-dialog",{attrs:{visible:t.upVisible,title:t.upTitle[t.upType]},on:{close:t.closeOrder}},["upgrade"===t.upType?a("div",[a("div",{staticClass:"item-title"},[t._v("当前商城版本")]),a("div",{staticClass:"item-info"},[t._v(t._s(t.$store.getters.shop_level))]),a("div",{directives:[{name:"loading",rawName:"v-loading",value:t.upLoading,expression:"upLoading"}]},[t.toHighest?t._e():a("div",{staticClass:"item-title",staticStyle:{"margin-top":"30px"}},[t._v("选择商城版本")]),t.toHighest?t._e():a("div",[a("el-radio-group",{attrs:{size:"small"},model:{value:t.shop_order.level,callback:function(e){t.$set(t.shop_order,"level",e)},expression:"shop_order.level"}},t._l(t.shop_levels,(function(e,i){return a("el-radio",{key:i,attrs:{border:"",label:e,disabled:e.level_name===t.$store.getters.shop_level}},[t._v(t._s(e.level_name))])})),1),t.shop_order.level?a("div",{staticClass:"item-tip"},[t._v(t._s(t.shop_order.level.level_name)+"："),t._l(t.shop_order.level.level_content,(function(e,i){return a("span",{key:i},[t._v(t._s(e+(i===t.shop_order.level.level_content.length-1?"":"，")))])}))],2):t._e(),a("div",{staticClass:"item-title"},[t._v("购买时长")]),a("div",[a("el-select",{attrs:{size:"small"},model:{value:t.shop_order.variant,callback:function(e){t.$set(t.shop_order,"variant",e)},expression:"shop_order.variant"}},t._l(t.variants,(function(t,e){return a("el-option",{key:e,attrs:{label:t.time+"个月",value:t.variant_id}})})),1)],1),a("div",{staticClass:"item-title"},[t._v("支付方式")]),a("div",[a("el-radio-group",{attrs:{size:"small"},model:{value:t.shop_order.payment,callback:function(e){t.$set(t.shop_order,"payment",e)},expression:"shop_order.payment"}},t._l(t.payments,(function(e,i){return a("el-radio-button",{key:i,attrs:{label:e}},[t._v(t._s(e.method_title))])})),1)],1),t.upLoading?t._e():a("div",{staticClass:"item-total"},[a("span",[t._v("总计：")]),a("span",[t._v("¥ "),a("strong",[t._v(t._s(t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].price))])]),a("div",[a("span",[t._v("¥ "),a("strong",[t._v(t._s(t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].price/t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].time))]),t._v("/月")])])])],1),t.toHighest?a("div",[t._v("您已是最高版本，无需升级")]):t._e()])]):t._e(),"long"===t.upType?a("div",[a("div",{staticClass:"item-title"},[t._v("商城到期时间")]),a("div",{staticClass:"item-info"},[t._v(t._s(t.$store.getters.shop_exp))]),a("div",{directives:[{name:"loading",rawName:"v-loading",value:t.upLoading,expression:"upLoading"}]},[a("div",{staticClass:"item-title",staticStyle:{"margin-top":"30px"}},[t._v("购买时长")]),a("div",[a("el-select",{attrs:{size:"small"},model:{value:t.shop_order.variant,callback:function(e){t.$set(t.shop_order,"variant",e)},expression:"shop_order.variant"}},t._l(t.variants,(function(t,e){return a("el-option",{key:e,attrs:{label:t.time+"个月",value:t.variant_id}})})),1)],1),a("div",{staticClass:"item-title"},[t._v("支付方式")]),a("div",[a("el-radio-group",{attrs:{size:"small"},model:{value:t.shop_order.payment,callback:function(e){t.$set(t.shop_order,"payment",e)},expression:"shop_order.payment"}},t._l(t.payments,(function(e,i){return a("el-radio-button",{key:i,attrs:{label:e}},[t._v(t._s(e.method_title))])})),1)],1),t.upLoading?t._e():a("div",{staticClass:"item-total"},[a("span",[t._v("总计：")]),a("span",[t._v("¥ "),a("strong",[t._v(t._s(t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].price))])]),a("div",[a("span",[t._v("¥ "),a("strong",[t._v(t._s(t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].price/t.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].time))]),t._v("/月")])])])])]):t._e(),a("div",{attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{size:"small"},on:{click:t.closeOrder}},[t._v("关闭")]),t.toHighest?t._e():a("el-button",{attrs:{type:"primary",size:"small",loading:t.btnLoading},on:{click:t.confirmOrder}},[t._v(t._s("upgrade"===t.upType?"确认升级":"确认续费"))])],1)]),a("el-dialog",{attrs:{visible:t.tipShow,title:"提示","show-close":!1,"close-on-click-modal":!1,"close-on-press-escape":!1,center:""}},[a("div",{staticClass:"dialog-tip"},[a("div",[t._v("付款过程中请勿关闭当前页面，付款成功后请点击“付款成功”按钮，即可创建商城并设置商城基础信息")]),a("div",[t._v("付款失败或取消付款，请点击“取消付款”按钮，关闭弹窗")])]),a("div",{attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{size:"small"},on:{click:function(e){t.tipShow=!1}}},[t._v("取消付款")]),a("el-button",{attrs:{size:"small",type:"primary",loading:t.validLoading},on:{click:t.validPay}},[t._v("付款成功")])],1)])],1)},r=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"dashboard-title"},[a("strong",[t._v("经营数据")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"dashboard-title"},[a("strong",[t._v("实时概况")])])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"dashboard-title"},[a("strong",[t._v("图片空间")])])}],s=(a("4de4"),a("5e24")),o=a("9c1a"),n=a("6797"),l=a("825f"),d=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{class:t.className,staticStyle:{width:"100%"},style:{height:t.Height+"px"},attrs:{id:t.id}})},c=[],u=(a("a9e3"),a("313e")),_=a.n(u),v={props:{className:{type:String,default:"chart"},id:{type:String,default:"chart"},Show:Boolean,Height:Number,Value:{type:Number,default:0}},data:function(){return{chart:null,waterData:[.2,.2,.2],serieName:""}},mounted:function(){this.Show&&this.initChart()},methods:{initChart:function(){this.chart=_.a.init(this.$el),this.setOptions()},setOptions:function(){var t={normal:{label:{show:!1},labelLine:{show:!1},color:"rgba(0,0,0,0)",borderWidth:0},emphasis:{color:"rgba(0,0,0,0)",borderWidth:0}},e={normal:{formatter:"{c}%",position:"center",show:!0,textStyle:{fontSize:"20",fontWeight:"normal",color:"#34374E"}}};this.chart.setOption({title:[{text:"已使用",left:"48%",top:"70%",textAlign:"center",textStyle:{fontSize:15,fontFamily:"Microsoft Yahei",fontWeight:"normal",color:"#409EFF",textAlign:"center"}}],series:[{type:"pie",hoverAnimation:!1,radius:["100%","80%"],startAngle:225,labelLine:{normal:{show:!1}},label:{normal:{position:"center"}},data:[{value:100,itemStyle:{normal:{color:"#E1E8EE"}}},{value:35,itemStyle:t}]},{type:"pie",hoverAnimation:!1,radius:["100%","80%"],startAngle:225,labelLine:{normal:{show:!1}},label:{normal:{position:"center"}},data:[{value:this.Value,itemStyle:{normal:{color:"#E6A23C"}},label:e},{value:35,itemStyle:t}]}]})}},watch:{Show:{deep:!0,immediate:!0,handler:function(){this.Show&&this.initChart()}}}},h=v,p=a("2877"),m=Object(p["a"])(h,d,c,!1,null,null,null),y=m.exports,g=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{class:t.className,style:{height:t.Height+"px"},attrs:{id:t.id}})},f=[],b={props:{className:{type:String,default:"chart"},id:{type:String,default:"chart"},Show:Boolean,Height:Number,Values:Object},data:function(){return{chart:null}},mounted:function(){this.Show&&this.initChart()},methods:{initChart:function(){this.chart=_.a.init(this.$el),this.setOptions()},setOptions:function(){this.chart.setOption({tooltip:{trigger:"axis",axisPointer:{lineStyle:{color:"#ddd"}},backgroundColor:"rgba(255,255,255,1)",padding:[5,10],textStyle:{color:"#409EFF"},extraCssText:"box-shadow: 0 0 5px rgba(0,0,0,0.3)"},grid:{top:"12%",bottom:"19%",left:"6%",right:"4%"},legend:{data:["昨日","今日"],left:"left",top:"top"},xAxis:{type:"category",data:["0:00","1:00","2:00","3:00","4:00","5:00","6:00","7:00","8:00","9:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00","24:00"],boundaryGap:!1,axisTick:{show:!1},axisLine:{show:!1,lineStyle:{color:"#646464"}},axisLabel:{margin:5,textStyle:{fontSize:10}}},yAxis:{type:"value",splitLine:{show:!1},axisTick:{show:!1},axisLine:{show:!1},axisLabel:{margin:5,textStyle:{fontSize:10}}},series:[{name:"昨日",type:"line",smooth:!0,showSymbol:!1,symbol:"circle",symbolSize:6,data:this.Values.yesterday,itemStyle:{normal:{color:"rgba(64,158,255,0.4)"}},lineStyle:{normal:{width:2.5}}},{name:"今日",type:"line",smooth:!0,showSymbol:!1,symbol:"circle",symbolSize:6,data:this.Values.today,areaStyle:{normal:{color:new _.a.graphic.LinearGradient(0,0,0,1,[{offset:0,color:"rgba(64,158,255,0.2)"},{offset:1,color:"rgba(64,158,255,0.05)"}],!1)}},itemStyle:{normal:{color:"rgba(64,158,255,1)"}},lineStyle:{normal:{width:2.5}}}]})}},watch:{Show:{deep:!0,immediate:!0,handler:function(){this.Show&&this.initChart()}}}},w=b,C=Object(p["a"])(w,g,f,!1,null,null,null),S=C.exports,x={components:{WaterLiquid:y,MutiLine:S},data:function(){return{order:{processing_count:0,refunding_count:0,day_new_order_count:0,day_new_order_suc_amount:0,yesterday_order_count:0,yesterday_order_amount:0,yesterday_order_suc_amount:0,yesterday_order_rate:0},customer:{today_customer_count:0,yesterday_customer_count:0,week_customer_count:0},image:{bytes:0,bytes_value:"",count:0,bytes_percent:0},order_line:{today:[],yesterday:[]},waterShow:!1,lineShow:!1,certify_type:"-",service:{qrcode:""},upVisible:!1,upType:"",upTitle:{upgrade:"升级",long:"续费"},upLoading:!1,shop_levels:[],variants:[],payments:[],shop_order:{level:"",payment:"",variant:""},toHighest:!1,btnLoading:!1,tipShow:!1,order_no:"",validLoading:!1}},methods:{toOrder:function(t){this.$router.push({name:"OrderList",query:{status:t}})},getOrder:function(){var t=this;Object(s["a"])("order").then((function(e){var a=e.data.body;t.order={processing_count:1*a.processing_count,refunding_count:1*a.refunding_count,day_new_order_count:1*a.day_new_order_count,day_new_order_suc_amount:1*a.day_new_order_suc_amount,yesterday_order_count:1*a.yesterday_order_count,yesterday_order_amount:1*a.yesterday_order_amount,yesterday_order_suc_amount:1*a.yesterday_order_suc_amount,yesterday_order_rate:1*a.yesterday_order_rate}}))},getCustomer:function(){var t=this;Object(s["a"])("customer").then((function(e){var a=e.data.body;t.customer={today_customer_count:1*a.today_customer_count,yesterday_customer_count:1*a.yesterday_customer_count,week_customer_count:1*a.week_customer_count}}))},getImage:function(){var t=this;Object(s["a"])("image").then((function(e){var a=e.data.body;t.image={bytes:1*a.bytes,bytes_value:a.bytes_value,count:1*a.count,bytes_percent:1*a.bytes_percent},t.waterShow=!0}))},getOrderLine:function(){var t=this;Object(s["a"])("order_line").then((function(e){var a=e.data.body;t.order_line={today:a.today,yesterday:a.yesterday},t.lineShow=!0}))},getCertify:function(){var t=this;Object(o["b"])().then((function(e){var a=e.data.body;a?"failed"===a.status?t.certify_type="认证失败":t.certify_type=a.type_value:t.certify_type="未认证"}))},getService:function(){var t=this;Object(n["a"])().then((function(e){t.service.qrcode=e.data.service_qr_code}))},toUpgrade:function(t){var e=this;this.upType=t,this.upVisible=!0,this.upLoading=!0,Object(l["d"])().then((function(t){e.payments=t.data.body,e.shop_order.payment=e.payments[0]})),Object(l["e"])().then((function(a){e.shop_levels=a.data.body,"upgrade"===t&&e.$store.getters.shop_level===e.shop_levels[1].level_name?e.toHighest=!0:"long"===t?(e.shop_order.level="",e.variants=e.shop_levels.filter((function(t){return t.level_name===e.$store.getters.shop_level}))[0].variants,e.shop_order.variant=e.variants[0].variant_id,e.toHighest=!1):(e.shop_order.level=e.shop_levels[1],e.variants=e.shop_order.level.variants,e.shop_order.variant=e.variants[0].variant_id,e.toHighest=!1),e.upLoading=!1})).catch((function(){e.upLoading=!1}))},closeOrder:function(){this.upType="",this.upVisible=!1,this.toHighest=!1,this.shop_order={level:"",variant:"",payment:""}},confirmOrder:function(){var t=this;this.btnLoading=!0;var e={shop_id:this.$store.getters.shop_id,payment_method:this.shop_order.payment.method_code,item:{type:"level",item_id:this.shop_order.variant}},a=this.variants.filter((function(e){return e.variant_id===t.shop_order.variant}))[0].price;Object(l["a"])(e).then((function(e){1*a===0?(t.$message.success({message:t.upTitle[t.upType]+"成功",duration:2e3}),t.$store.dispatch("getShopInfo").then((function(){t.$router.go(0),t.closeOrder(),t.order_no=""}))):(t.order_no=e.data.body.no,t.$message.success({message:"正在跳转支付，请勿关闭当前页面",duration:2e3}),setTimeout((function(){window.open(e.data.body.payment.pay_url,"_blank"),t.tipShow=!0,t.btnLoading=!1,t.closeOrder()}),2e3))})).catch((function(){t.btnLoading=!1}))},validPay:function(){var t=this;this.validLoading=!0,Object(l["c"])(this.order_no).then((function(e){t.validLoading=!1,t.order_no="","paid"===e.data.body.status_code?(t.$message.success({message:"订单支付成功",duration:2e3}),t.$store.dispatch("getShopInfo").then((function(){t.$router.go(0)}))):t.$message.error({message:"未检测到成功的支付订单，请检查支付是否成功，如果确认支付成功，请联系客服核对并开通商城",duration:4e3})})).catch((function(){t.validLoading=!1}))}},created:function(){this.getOrder(),this.getImage(),this.getCustomer(),this.getOrderLine(),this.getCertify(),this.getService()}},O=x,k=(a("2345"),Object(p["a"])(O,i,r,!1,null,"5f6fe9c3",null));e["default"]=k.exports},"5e24":function(t,e,a){"use strict";a.d(e,"a",(function(){return r}));var i=a("b775");function r(t){return Object(i["a"])({url:"dashboard/"+t,method:"get"})}},"715c":function(t,e,a){},"825f":function(t,e,a){"use strict";a.d(e,"a",(function(){return h})),a.d(e,"c",(function(){return p})),a.d(e,"d",(function(){return m})),a.d(e,"f",(function(){return y})),a.d(e,"b",(function(){return g})),a.d(e,"e",(function(){return f}));a("d3b7"),a("ac1f"),a("1276");var i=a("d4ec"),r=a("bee2"),s=a("bc3a"),o=a.n(s),n=a("4360"),l=a("5f87"),d=a("5c96"),c=o.a.create({baseURL:location.origin+"/api"}),u=function(){function t(){Object(i["a"])(this,t)}return Object(r["a"])(t,[{key:"success",value:function(e){var a=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];this[t]("success",e,a)}},{key:"warning",value:function(e){var a=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];this[t]("warning",e,a)}},{key:"info",value:function(e){var a=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];this[t]("info",e,a)}},{key:"error",value:function(e){var a=!(arguments.length>1&&void 0!==arguments[1])||arguments[1];this[t]("error",e,a)}},{key:t,value:function(t,e,a){a?0===document.getElementsByClassName("el-message").length&&d["Message"][t](e):d["Message"][t](e)}}]),t}(),_=new u;c.interceptors.request.use((function(t){return n["a"].getters.token&&(t.headers["Authorization"]="Bearer "+Object(l["b"])()),t}),(function(t){return Promise.reject(t)})),c.interceptors.response.use((function(t){return t}),(function(t){if(401===t.response.status){_.error("登录超时，请重新登录");var e=location.origin.split("."),a="//account."+e[e.length-2]+"."+e[e.length-1]+"/login";n["a"].dispatch("logout"),setTimeout((function(){location.href=a}),500)}return Promise.reject(t)}));var v=c;function h(t){return v({url:"/shop/order",method:"post",data:t})}function p(t){return v({url:"/shop/order/"+t,method:"get"})}function m(){return v({url:"/shop/sys/payment_method",method:"get"})}function y(){return v({url:"/shop/sys/sms",method:"get"})}function g(){return v({url:"/account/contrast",method:"get"})}function f(){return v({url:"/shop/sys/level",method:"get"})}},"9c1a":function(t,e,a){"use strict";a.d(e,"b",(function(){return r})),a.d(e,"a",(function(){return s})),a.d(e,"c",(function(){return o}));var i=a("b775");function r(){return Object(i["a"])({url:"shop/authenticate",method:"get"})}function s(t){return Object(i["a"])({url:"shop/authenticate",method:"post",data:t})}function o(t){return Object(i["a"])({url:"shop/authenticate",method:"put",data:t})}}}]);