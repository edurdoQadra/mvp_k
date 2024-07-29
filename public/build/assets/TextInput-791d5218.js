import{o as a,c as s,t as n,r as l,j as c,v as i,b as m,h as p,e as _}from"./app-45ec4fab.js";const f={class:"block font-medium text-sm text-gray-700 dark:text-gray-300"},g={key:0},k={key:1},x={__name:"InputLabel",props:["value"],setup(e){return(o,t)=>(a(),s("label",f,[e.value?(a(),s("span",g,n(e.value),1)):(a(),s("span",k,[l(o.$slots,"default")]))]))}},v={class:"text-sm text-red-600 dark:text-red-400"},y={__name:"InputError",props:["message"],setup(e){return(o,t)=>c((a(),s("div",null,[m("p",v,n(e.message),1)],512)),[[i,e.message]])}},b=["value"],$={__name:"TextInput",props:["modelValue"],emits:["update:modelValue"],setup(e,{expose:o}){const t=p(null);return _(()=>{t.value.hasAttribute("autofocus")&&t.value.focus()}),o({focus:()=>t.value.focus()}),(u,r)=>(a(),s("input",{class:"border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm",value:e.modelValue,onInput:r[0]||(r[0]=d=>u.$emit("update:modelValue",d.target.value)),ref_key:"input",ref:t},null,40,b))}};export{x as _,$ as a,y as b};