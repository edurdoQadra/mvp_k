import{h as n,k as m,e as v,o as c,d as r,w as y,b as s,j as x,l as b,u as o,m as h,c as g,p as k,F as w,s as S,t as A,x as I,y as B}from"./app-45ec4fab.js";import{_ as M}from"./AdminLayout-4a32c7f5.js";import j from"./Index-9b062323.js";import C from"./Index-07bf588c.js";import D from"./Index-1166e1f7.js";import{_ as N}from"./_plugin-vue_export-helper-c27b6911.js";import"./sweetalert2.all-2a96c036.js";import"./dataTables.select-0eae1207.js";import"./vue3-datepicker-7c15d454.js";const p=l=>(I("data-v-86f857fb"),l=l(),B(),l),V={class:"flex justify-center items-center h-screen"},$={class:"w-full max-w-lg my-8"},F={class:"rounded-lg p-4 bg-gray-300"},L=p(()=>s("label",{for:"opciones",class:"text-gray-700 font-bold mb-2 block text-center"},"Selecciona una opción:",-1)),E=p(()=>s("option",{value:""},"Selecciona un Módulo",-1)),P=["value"],R={class:"flex justify-center mt-8"},U={class:"w-full max-w-lg"},q={__name:"Atc",props:{clientes:Array,locales:Array,personas:Array},setup(l){let i=n([]),d=n([]),_=n([]);const e=l,f=[{value:"1",text:"Clientes"},{value:"2",text:"Personas"},{value:"3",text:"Locales"}];let t=n("");return m(()=>{e.clientes&&e.locales&&e.personas?(i.value=e.clientes,d.value=e.personas,_.value=e.locales):console.error("No se recibieron datos válidos desde Inertia:",e.clientes)}),v(()=>{console.log("Datos recibidos desde Inertia:",e.clientes,e.locales,e.personas)}),(z,u)=>(c(),r(M,null,{default:y(()=>[s("div",V,[s("div",$,[s("div",F,[L,x(s("select",{"onUpdate:modelValue":u[0]||(u[0]=a=>h(t)?t.value=a:t=a),id:"opciones",class:"border border-gray-300 p-2 w-full"},[E,(c(),g(w,null,k(f,a=>s("option",{value:a.value,key:a.value},A(a.text),9,P)),64))],512),[[b,o(t)]])])])]),s("div",R,[s("div",U,[o(t)==="1"?(c(),r(j,{key:0,datos:o(i)},null,8,["datos"])):o(t)==="2"?(c(),r(C,{key:1,datos:o(d)},null,8,["datos"])):o(t)==="3"?(c(),r(D,{key:2,datos:o(_)},null,8,["datos"])):S("",!0)])])]),_:1}))}},Y=N(q,[["__scopeId","data-v-86f857fb"]]);export{Y as default};