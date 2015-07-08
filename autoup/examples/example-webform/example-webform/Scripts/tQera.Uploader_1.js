﻿/**
 * HTML5 Pure Uploader 1.1
 * http://www.tqera.com/
 *
 * Copyright 2013, Lyzerk
 *
 * Date: 12-04-2013
 */
function printLog(n){console.log("------Log Report------"),console.log(new Date),console.log(n),console.log("------##########------")}function printError(n){typeof n=="object"?(n.message&&(console.log("------Error Message------"),console.log("\nMessage: "+n.message)),n.stack&&console.log(n.stack),console.log("------#############------")):console.log("printError :: argument is not an object")}function contains(n,t){for(var i in t)if(n.match(t[i]))return!0;return!1}function isPlainObject(n){if(!n||typeof n!="object"||n.nodeType||n=="window")return!1;try{if(n.constructor&&!core_hasOwn.call(n,"constructor")&&!core_hasOwn.call(n.constructor.prototype,"isPrototypeOf"))return!1}catch(i){return!1}var t;for(t in n);return t===undefined||core_hasOwn.call(n,t)}function extend(n,t){for(name in t)n[name]==undefined||n[name]==null?n[name]=typeof t[name]=="object"&&isPlainObject(t[name])?extend(n[name],t[name]):t[name]:t[name]!==undefined&&typeof n[name]=="object"&&isPlainObject(t[name])&&(n[name]=extend(n[name],t[name]));return n}function tQEraUploader(n){function p(n){return n.drop?n.dropPlace?(n.dropPlace.ondragover=function(){return this.className.match(n.dragHoverClass)||(this.className+=" "+n.dragHoverClass),!1},n.dropPlace.ondragleave=function(){return this.className.match(n.dragHoverClass)&&(this.className=this.className.replace(n.dragHoverClass,"")),!1},n.dropPlace.ondrop=function(n){return this.className.match(t.dragHoverClass)&&(this.className=this.className.replace(t.dragHoverClass,"")),l(n.dataTransfer.files),!1},!0):!1:!0}function it(n){return n.imageHolder?!0:!1}function w(n){return n.file_input&&n.file_input.tagName=="INPUT"&&n.file_input.type=="file"?(n.file_input.addEventListener("change",d,!1),!0):!1}function tt(n){if(n.file_filter){var t=n.file_filter.split("|");return t.length<1?!1:(s=t,!0)}return!0}function nt(n){return n.image_thumb?n.image_thumb_width&&n.image_thumb_height?n.image_thumb_width>10&&n.image_thumb_height>10?!0:(t.error("Thumbnail must be higher than 10x10"),!1):!1:!0}function g(n){return parseInt(n.file_size)?!0:(t.error("File size must be integer"),!1)}function ut(n){return n.form?!0:!1}function rt(n){var r,i;try{r=document.createElement("div"),r.id=n,r.className=t.file_class,i=document.createElement("a"),i.className=t.file_closebutton_class,i.href="javascript:void(0)",i.textContent="×",i.addEventListener("click",h,!1),r.appendChild(i),r.appendChild(c),t.imageHolder.appendChild(r),t.imageHolder.appendChild(c)}catch(u){t.error("Create image problem")}}function l(n){for(var r in n)typeof n[r]=="object"&&(s?contains(n[r].type,s)?n[r].size<t.file_size?t.limit==0?e.push(n[r]):i.length<=t.limit?e.push(n[r]):t.error("Upload limit is "+t.limit):t.error("File size to bigger"):t.error("File doesn't support"):n[r].size<t.file_size?t.limit==0?e.push(n[r]):i.length<=t.limit?e.push(n[r]):t.error("Upload limit is "+t.limit):t.error("File size to bigger"));o()}function d(n){l(n.target.files)}function o(){var r=e.shift(),n;if(r!=null){if(t.limit!=0&&i.length+1>t.limit)return t.error("Limit are "+t.limit),!1;n="temp_"+ +new Date,rt(n),v.push(n),y(n,r)}}function y(n,r){var f=new FileReader,u=document.getElementById(n);f.onload=function(n){var h,l,c;if(n.preventDefault(),isCanvasText&&r.type.match("image")){var s=document.createElement("canvas"),v=s.getContext("2d"),e=document.createElement("canvas"),a=e.getContext("2d"),f=new Image;f.onload=function(){var w=1,h,c,l,k,p;if(f.width>t.image_thumb_width?w=t.image_thumb_width/f.width:f.height>t.image_thumb_height&&(w=t.image_thumb_height/f.height),e.width=t.image_resize_width==0?f.width:t.image_resize_width,e.height=t.image_resize_height==0?f.height:t.image_resize_height,a.drawImage(f,0,0,f.width,f.height,0,0,e.width,e.height),f.height=e.height,f.width=e.width,t.watermark.text){h=document.createElement("canvas"),c=h.getContext("2d"),h.width=f.width,h.height=f.height,c.fillStyle=t.watermark.color,c.font=t.watermark.font_size+" "+t.watermark.font,c.globalAlpha=t.watermark.alpha;var g=c.measureText(t.watermark.text),b=t.watermark.font_size.match("px")?t.watermark.font_size.replace("px",""):t.watermark.font_size,y=0,d=b;t.watermark.position.match("bottom")?d=f.height-b*.3:t.watermark.position.match("top")?y=0+b*.3:t.watermark.position.match("center")&&(d=(f.height-b)/2),t.watermark.position.match("left")?y=0:t.watermark.position.match("mid")?y=(f.width-g.width)/2:t.watermark.position.match("right")&&(y=f.width-g.width),c.translate(y,d),c.fillText(t.watermark.text,0,0),a.drawImage(h,0,0,h.width,h.height,0,0,h.width,h.height)}s.width=f.width*w,s.height=f.height*w,v.drawImage(e,0,0,e.width,e.height,0,0,s.width,s.height),i.push({data:e.toDataURL(r.type),name:r.name,id:u.id}),t.image_thumb?(s.style.cursor="pointer",s.onclick=function(){var n=window.open(e.toDataURL(r.type),"_blank");n.focus()},u.appendChild(s)):(l=document.createElement("img"),l.width=t.image_thumb_width,l.height=t.image_thumb_height,l.src="http://"+location.host+t.icon_path+r.name.split(".")[1]+".png",l.onerror=function(){this.src=t.icon_default},u.appendChild(l)),k=document.createElement("span"),p="",p=r.size>1e6?Math.round(r.size/1048576)+" MB":Math.round(r.size/1024)+" KB",k.textContent=r.name+" "+p,u.appendChild(k),o(),delete e,delete a},f.src=this.result}else h=document.createElement("img"),h.width=t.image_thumb_width,h.height=t.image_thumb_height,h.src="http://"+location.host+t.icon_path+r.name.split(".")[1]+".png",h.onerror=function(){this.src=t.icon_default},u.appendChild(h),l=document.createElement("span"),c="",c=r.size>1e6?Math.round(r.size/1048576)+" MB":Math.round(r.size/1024)+" KB",l.textContent=r.name+" "+c,u.appendChild(l),i.push({data:this.result,name:r.name,id:u.id}),o()},f.readAsDataURL(r)}function h(n){var r,u;if(typeof n=="object")h(n.toElement.parentNode.id);else for(r in i)i[r].id==n&&(i.splice(r,1),u=document.getElementById(n),t.imageHolder.removeChild(u))}function k(n){var u,r;n.preventDefault();for(u in i)r=new XMLHttpRequest,r.open("POST",t.ajax.url,!0),r.setRequestHeader("Content-type",i[u].data.split(",")[0]),r.upload.template_id=i[u].id,r.onreadystatechange=a,r.upload.addEventListener("load",a,!1),r.upload.addEventListener("progress",b,!1),r.setRequestHeader("Uploader-Name",i[u].name),r.setRequestHeader("Uploader-Thumb",t.image_thumb),r.setRequestHeader("Uploader-ThumbHeight",t.image_thumb_height),r.setRequestHeader("Uploader-ThumbWidth",t.image_thumb_width),r.send(i[u].data);return!1}function b(n){if(t.progress){var i=n.position*100/n.totalSize;t.progress({percent:i,template:n.target.template_id})}}function a(n){n.target.readyState==4&&n.target.status==200&&(t.ajax.clearAfterUpload&&setTimeout(h,1500,n.target.upload.template_id),t.success&&(t.debug&&printLog({percent:100,template:n.target.upload.template_id}),t.progress({percent:100,template:n.target.upload.template_id}),t.success(n)))}var f,r,u;n=extend(n,defaultSettings);var s,t=n,c=document.createElement("div"),e=[],i=[],v=[];if(this.settings=t,!isHTML5()){f=document.createElement("input"),f.type="hidden",f.name="ThumbWidth",f.id="ThumbWidth",f.value=t.image_thumb_width,r=document.createElement("input"),r.type="hidden",r.name="ThumbHeight",r.id="ThumbHeight",r.value=t.image_thumb_height,u=document.createElement("input"),u.type="hidden",u.name="Thumb",u.id="Thumb",u.value=t.image_thumb,t.form.appendChild(u),t.form.appendChild(f),t.form.appendChild(r),n.html5Error(this);return}if(!p(t))return printLog("Drop Place can't initialize")&&!1;if(!it(t))return printLog("Image Holder can't initialize")&&!1;if(!w(t))return printLog("File Input can't initialize")&&!1;if(!tt(t))return printLog("File Filter can't initialize")&&!1;if(!nt(t))return printLog("Image Properties (thumb, width, height) can't initialize")&&!1;if(!g(t))return printLog("File Size can't initialize")&&!1;if(!ut(t))return printLog("File Form can't initialize")&&!1;n.dropPlace.onclick=function(){t.file_input.click()},t.form.addEventListener("submit",k,!1),c.style.clear="both"}var defaultSettings={drop:!0,dropPlace:document.getElementById("dropPlace"),dragHoverClass:"hover",imageHolder:document.getElementById("imageHolder"),image_thumb:!0,image_thumb_width:200,image_thumb_height:200,image_resize_width:0,image_resize_height:0,file_input:document.getElementById("fileInput"),file_filter:"",file_size:15e7,file_class:"file",file_closebutton_class:"close",icon_path:"/images/icons/",icon_default:"/images/icons/_blank.png",limit:0,ajax:{url:"",clearAfterUpload:!0},form:document.getElementById("imageForm"),watermark:{text:"www.yourweb.com",color:"grey",alpha:1,font_size:"55px",font:"bold sans-serif",position:"top mid"},html5Error:function(){printLog("Not Html5 Support")},success:function(){printLog("Pictures sended.")},progress:function(n){printLog("Picture "+n)},error:function(){},debug:!1},isLocalStorage=function(){try{return localStorage.setItem(mod,mod),localStorage.removeItem(mod),!0}catch(n){return!1}},isCanvas=function(){var n=document.createElement("canvas");return!!(n.getContext&&n.getContext("2d"))},isCanvasText=function(){return!!(isCanvas()&&is(document.createElement("canvas").getContext("2d").fillText,"function"))},isHTML5=function(){return isCanvasText&&isLocalStorage&&window.File&&window.FileReader&&window.FileList&&window.Blob&&window.FormData},core_hasOwn;class2type={},core_hasOwn=class2type.hasOwnProperty