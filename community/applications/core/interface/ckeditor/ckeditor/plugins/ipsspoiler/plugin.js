﻿CKEDITOR.plugins.add("ipsspoiler",{requires:"widget",icons:"ipsspoiler",init:function(c){c.widgets.add("ipsspoiler",{button:ips.getString("editorSpoiler"),template:ips.templates.render("core.editor.spoiler"),editables:{content:{selector:".ipsSpoiler_contents"}},upcast:function(a){if("div"==a.name&&a.hasClass("ipsSpoiler")||"blockquote"==a.name&&a.hasClass("ipsStyle_spoiler"))return a.children[0]&&void 0!=a.children[0].hasClass&&a.children[0].hasClass("ipsSpoiler_header")?a.children[1].attributes["data-gramm"]=
"false":a.setHtml(ips.templates.render("core.editor.legacySpoilerUpcast",{contents:a.getHtml()})),!0},init:function(){var a=c.getSelectedHtml(!0),b=c.getSelection(),b=b?b.getSelectedElement():null;if(!b||!b.hasClass("cke_widget_wrapper"))this.once("focus",function(){if(a){"\x3cp\x3e"===a.substr(0,1)?this.editables.content.setHtml(a):this.editables.content.setHtml("\x3cp\x3e"+a+"\x3c/p\x3e");var b=c.createRange();b.moveToElementEditablePosition(this.wrapper.getNext())}else b=c.createRange(),b.moveToElementEditablePosition(this.editables.content);
b.select()},this)}})}});