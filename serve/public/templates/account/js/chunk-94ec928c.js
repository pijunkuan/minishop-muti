(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-94ec928c"],{9103:function(t,s,a){},a144:function(t,s,a){"use strict";a.r(s);var e=function(){var t=this,s=t.$createElement,a=t._self._c||s;return a("div",{directives:[{name:"loading",rawName:"v-loading",value:t.loading,expression:"loading"}],staticClass:"back-content"},[a("div",{staticClass:"user-form"},[a("div",{staticClass:"user-item"},[a("div",[t._v("手机号")]),a("div",[t._v(t._s(t.$store.getters.mobile?t.$store.getters.mobile:"/"))])]),a("div",{staticClass:"user-item"},[a("div",[t._v("注册时间")]),a("div",[t._v(t._s(t.$store.getters.created_at?t.$store.getters.created_at:"/"))])]),a("div",{staticClass:"user-button"},[a("el-button",{attrs:{type:"primary",size:"mini"},on:{click:function(s){t.editShow=!t.editShow}}},[t._v(t._s(t.editShow?"取消修改":"修改密码"))])],1),a("transition",{attrs:{name:"pass"}},[a("el-form",{directives:[{name:"show",rawName:"v-show",value:t.editShow,expression:"editShow"}],ref:"data",staticClass:"user-edit-form",attrs:{model:t.data,rules:t.rules,"label-width":"70px"}},[a("el-form-item",{attrs:{label:"新密码",prop:"password"}},[a("el-input",{attrs:{type:"password"},model:{value:t.data.password,callback:function(s){t.$set(t.data,"password",s)},expression:"data.password"}})],1),a("div",[a("el-button",{staticStyle:{width:"100%"},attrs:{loading:t.btnLoading,type:"primary",size:"mini"},on:{click:t.confirmEdit}},[t._v("确 定")])],1)],1)],1)],1)])},i=[],o=a("7ded"),r={data:function(){return{loading:!1,editShow:!1,data:{password:""},rules:{password:[{required:!0,message:"请输入新密码",trigger:"blur"},{min:6,message:"密码至少为6位",trigger:"blur"}]},btnLoading:!1}},methods:{confirmEdit:function(){var t=this;this.$refs.data.validate((function(s){s&&t.confirm()}))},confirm:function(){var t=this;this.btnLoading=!0,Object(o["a"])({password:this.data.password,password_confirmation:this.data.password}).then((function(){t.$message.success({message:"已成功修改密码，将自动重新登录",duration:2e3}),t.$store.dispatch("login",{mobile:t.$store.getters.mobile,password:t.data.password}).then((function(){t.$router.go(0),t.btnLoading=!1})).catch((function(){t.btnLoading=!1}))})).catch((function(){t.btnLoading=!1}))}},watch:{editShow:{immediate:!0,handler:function(){this.editShow||(this.data.password="",void 0!==this.$refs.data&&this.$refs.data.clearValidate())}}}},n=r,d=(a("b617"),a("2877")),c=Object(d["a"])(n,e,i,!1,null,"267009fd",null);s["default"]=c.exports},b617:function(t,s,a){"use strict";var e=a("9103"),i=a.n(e);i.a}}]);