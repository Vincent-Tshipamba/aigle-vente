import{a as m}from"./axios-CCb-kr4I.js";import{E as g}from"./laravel-echo-Cd4fqn7m.js";import{P as f}from"./pusher-js-CKPruLDp.js";import"./flowbite-vlFJrmiF.js";/* empty css                    */import{S as h}from"./sweetalert2-D3pEHXw3.js";import{Editor as p}from"https://esm.sh/@tiptap/core@2.6.6";import E from"https://esm.sh/@tiptap/starter-kit@2.6.6";import w from"https://esm.sh/@tiptap/extension-highlight@2.6.6";import y from"https://esm.sh/@tiptap/extension-underline@2.6.6";import B from"https://esm.sh/@tiptap/extension-link@2.6.6";import L from"https://esm.sh/@tiptap/extension-text-align@2.6.6";import k from"https://esm.sh/@tiptap/extension-horizontal-rule@2.6.6";import v from"https://esm.sh/@tiptap/extension-image@2.6.6";import I from"https://esm.sh/@tiptap/extension-youtube@2.6.6";import i from"https://esm.sh/@tiptap/extension-text-style@2.6.6";import x from"https://esm.sh/@tiptap/extension-font-family@2.6.6";import{Color as S}from"https://esm.sh/@tiptap/extension-color@2.6.6";import A from"https://esm.sh/@tiptap/extension-bold@2.6.6";import{$ as b}from"./jquery-BIJjGqPl.js";import"./jquery-validation-BtZIcd1U.js";import"./apexcharts-Dq9I4BNx.js";import"./@popperjs-BQBsAJpH.js";import"./flowbite-datepicker-C9ywLsEL.js";window.Pusher=f;window.Echo=new g({broadcaster:"pusher",cluster:"mt1",key:"492581c9f07312c3dbab",wsHost:void 0,wsPort:80,wssPort:443,forceTLS:!0,enabledTransports:["ws","wss"]});window.axios=m;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";window.addEventListener("load",function(){if(document.getElementById("wysiwyg-example")){const c=i.extend({addAttributes(){return{fontSize:{default:null,parseHTML:t=>t.style.fontSize,renderHTML:t=>t.fontSize?{style:"font-size: "+t.fontSize}:{}}}}}),l=A.extend({renderHTML({mark:t,HTMLAttributes:o}){const{style:r,...a}=o,u="font-weight: bold;"+(r?" "+r:"");return["span",{...a,style:u.trim()},0]},addOptions(){var t;return{...(t=this.parent)==null?void 0:t.call(this),HTMLAttributes:{}}}}),e=new p({element:document.querySelector("#wysiwyg-example"),extensions:[E.configure({marks:{bold:!1}}),l,i,S,c,x,w,y,B.configure({openOnClick:!1,autolink:!0,defaultProtocol:"https"}),L.configure({types:["heading","paragraph"]}),k,v,I],editorProps:{attributes:{class:"format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none"}}});document.getElementById("toggleBoldButton").addEventListener("click",()=>e.chain().focus().toggleBold().run()),document.getElementById("toggleItalicButton").addEventListener("click",()=>e.chain().focus().toggleItalic().run()),document.getElementById("toggleUnderlineButton").addEventListener("click",()=>e.chain().focus().toggleUnderline().run()),document.getElementById("toggleStrikeButton").addEventListener("click",()=>e.chain().focus().toggleStrike().run()),document.getElementById("toggleHighlightButton").addEventListener("click",()=>{const t=e.isActive("highlight");e.chain().focus().toggleHighlight({color:t?void 0:"#ffc078"}).run()}),document.getElementById("toggleLinkButton").addEventListener("click",()=>{const t=window.prompt("Enter image URL:","https://flowbite.com");e.chain().focus().toggleLink({href:t}).run()}),document.getElementById("removeLinkButton").addEventListener("click",()=>{e.chain().focus().unsetLink().run()}),document.getElementById("toggleCodeButton").addEventListener("click",()=>{e.chain().focus().toggleCode().run()}),document.getElementById("toggleLeftAlignButton").addEventListener("click",()=>{e.chain().focus().setTextAlign("left").run()}),document.getElementById("toggleCenterAlignButton").addEventListener("click",()=>{e.chain().focus().setTextAlign("center").run()}),document.getElementById("toggleRightAlignButton").addEventListener("click",()=>{e.chain().focus().setTextAlign("right").run()}),document.getElementById("toggleListButton").addEventListener("click",()=>{e.chain().focus().toggleBulletList().run()}),document.getElementById("toggleOrderedListButton").addEventListener("click",()=>{e.chain().focus().toggleOrderedList().run()}),document.getElementById("toggleBlockquoteButton").addEventListener("click",()=>{e.chain().focus().toggleBlockquote().run()}),document.getElementById("toggleHRButton").addEventListener("click",()=>{e.chain().focus().setHorizontalRule().run()}),document.getElementById("addImageButton").addEventListener("click",()=>{const t=window.prompt("Enter image URL:","https://placehold.co/600x400");t&&e.chain().focus().setImage({src:t}).run()}),document.getElementById("addVideoButton").addEventListener("click",()=>{const t=window.prompt("Enter YouTube URL:","https://www.youtube.com/watch?v=KaLxCiilHns");t&&e.commands.setYoutubeVideo({src:t,width:640,height:480})});const n=FlowbiteInstances.getInstance("Dropdown","typographyDropdown");document.getElementById("toggleParagraphButton").addEventListener("click",()=>{e.chain().focus().setParagraph().run(),n.hide()}),document.querySelectorAll("[data-heading-level]").forEach(t=>{t.addEventListener("click",()=>{const o=t.getAttribute("data-heading-level");e.chain().focus().toggleHeading({level:parseInt(o)}).run(),n.hide()})});const d=FlowbiteInstances.getInstance("Dropdown","textSizeDropdown");document.querySelectorAll("[data-text-size]").forEach(t=>{t.addEventListener("click",()=>{const o=t.getAttribute("data-text-size");e.chain().focus().setMark("textStyle",{fontSize:o}).run(),d.hide()})}),document.getElementById("color").addEventListener("input",t=>{const o=t.target.value;e.chain().focus().setColor(o).run()}),document.querySelectorAll("[data-hex-color]").forEach(t=>{t.addEventListener("click",()=>{const o=t.getAttribute("data-hex-color");e.chain().focus().setColor(o).run()})}),document.getElementById("reset-color").addEventListener("click",()=>{e.commands.unsetColor()});const s=FlowbiteInstances.getInstance("Dropdown","fontFamilyDropdown");document.querySelectorAll("[data-font-family]").forEach(t=>{t.addEventListener("click",()=>{const o=t.getAttribute("data-font-family");e.chain().focus().setFontFamily(o).run(),s.hide()})})}});window.$=window.jQuery=b;window.Swal=h;