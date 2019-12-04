﻿CKEDITOR.plugins.add("ipsemoticon",{icons:"ipsemoticon",hidpi:!0,init:function(c){c.widgets.add("ipsemoji",{editables:{},upcast:function(a){if("span"==a.name&&a.hasClass("ipsEmoji"))return!0}});ips.getSetting("emoji_shortcodes")&&new CKEDITOR.plugins.ipsemoji(c);c.addCommand("ipsEmoticon",{allowedContent:"",exec:function(a){var b=$("."+a.id).find(".cke_button__ipsemoticon");$("#"+b.attr("id")+"_menu").length||($("body").append(ips.templates.render("core.editor.emoticons",{id:b.attr("id"),editor:a.name})),
$(document).trigger("contentChange",[$("#"+b.attr("id")+"_menu")]),b.ipsMenu({alignCenter:!0,closeOnClick:!1}))}});c.ui.addButton("ipsEmoticon",{label:ips.getString("emoji"),command:"ipsEmoticon",toolbar:"insert"})}});
CKEDITOR.plugins.ipsemoji=function(c){this.currentEmoji=this.listenForDestruct=this.listenWithinEmoji=this.listenForColonSymbolEvent=null;this.callsWithNoResults=0;this.emoji={};this.listenForColonSymbol=function(){CKEDITOR.tools.setTimeout(function(){var a=c.getSelection();if(a.getType()==CKEDITOR.SELECTION_TEXT)for(var a=a.getRanges(!0),b=0;b<a.length;b++)a[b].collapsed&&a[b].startOffset&&(a[b].setStart(a[b].startContainer,0),":"==a[b].cloneContents().$.textContent.substr(-1)&&this.respondToColonSymbol(a[b]))},
0,this)};this.respondToColonSymbol=function(a){var b=a.cloneContents().$.textContent;if(!(1<b.length)||b.substr(-2,1).match(/\s/)){this.listenForColonSymbolEvent&&!_.isUndefined(this.listenForColonSymbolEvent)&&c.removeListener("change",this.listenForColonSymbol);this.currentEmoji=new CKEDITOR.dom.element("span");this.currentEmoji.setText(":");if(a.endContainer instanceof CKEDITOR.dom.element){for(var d,g=a.endContainer.getChildren(),b=g.count();0<=b;b--){var k=g.getItem(b);if(k instanceof CKEDITOR.dom.text&&
":"==k.getText()){d=k;break}}if(!d)return}else d=a.endContainer.split(a.endOffset-1);d.split(1);this.currentEmoji.replace(d);d=c.createRange();d.moveToPosition(this.currentEmoji,CKEDITOR.POSITION_BEFORE_END);c.getSelection().selectRanges([d]);this.callsWithNoResults=0;this.results=$('\x3cul class\x3d"ipsMenu ipsMenu_auto cEmojiMenu" data-emojiMenu\x3e\x3c/ul\x3e').hide();this.results.append('\x3cli class\x3d"ipsLoading ipsLoading_small" style\x3d"height: 40px"\x3e\x26nbsp;\x3c/li\x3e');$("body").append(this.results);
this.positionResults(a);this.listenWithinEmoji=c.on("key",this.listenWithinEmojiEvent,this);this.listenForDestruct=c.on("resetOrDestroy",this.listenForDestructEvent,this)}};this.positionResults=function(a){a&&a.getNextEditableNode()&&a.getNextEditableNode().getSize("height");var b={trigger:$(this.currentEmoji.$),target:this.results,center:!0,above:!1,stemOffset:{left:25,top:0}};a=$(c.container.$);var b=ips.utils.position.positionElem(b),d=ips.utils.position.getElemPosition(a);this.results.css({position:b.fixed?
"fixed":"absolute",top:b.top+"px",left:d.absPos.left+"px",width:a.width()-30+"px"})};this.listenForDestructEvent=function(a){this.cancelEmoji();this.closeResults()};this.listenWithinEmojiEvent=function(a){if(27==a.data.keyCode)this.cancelEmoji(),this.closeResults();else if(40==a.data.keyCode||38==a.data.keyCode||39==a.data.keyCode||37==a.data.keyCode){var b=this.results.children("[data-selected]");b.length?(b.removeAttr("data-selected"),40==a.data.keyCode||39==a.data.keyCode?b.next().attr("data-selected",
!0):b.prev().attr("data-selected",!0)):40==a.data.keyCode||37==a.data.keyCode?this.results.children(":first-child").attr("data-selected",!0):this.results.children(":last-child").attr("data-selected",!0);a.cancel()}else 13==a.data.keyCode||9==a.data.keyCode?(b=this.results.children("[data-selected]"),b.length?(b.click(),a.cancel()):13==a.data.keyCode&&this.closeResults()):(8==a.data.keyCode&&(this.callsWithNoResults=0),CKEDITOR.tools.setTimeout(function(){if(_.isNull(this.currentEmoji)||!this.currentEmoji.getText().trim().length)this.closeResults();
else if(":"==this.currentEmoji.getText().substr(-1))this.closeResults();else if(!(3>this.currentEmoji.getText().trim().length)){for(var a=c.getSelection().getRanges(),b=0;b<a.length;b++)if(!a[b].getCommonAncestor(!0,!0).equals(this.currentEmoji)){this.cancelEmoji();this.closeResults();return}var k=this.currentEmoji.getText();this.results.show();this.positionResults();ips.utils.emoji.getEmoji(function(a,b){this.results.removeClass("ipsLoading").html("");var c=k.substr(1).replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g,
"\\$\x26"),d=[],f=new RegExp(c,"i"),g=0,e;for(e in a)for(var h=0;h<a[e].length;h++)for(var l=0;l<a[e][h].shortNames.length;l++)a[e][h].shortNames[l].match(f)&&d.push({shortName:a[e][h].shortNames[l],emoji:a[e][h]});d=_.sortBy(d,function(a){return a.shortName.indexOf(c)});for(f=0;f<d.length;f++)e=d[f].emoji.code,d[f].emoji.skinTone&&ips.utils.cookie.get("emojiSkinTone")&&(e=ips.utils.emoji.tonedCode(e,ips.utils.cookie.get("emojiSkinTone"))),this.results.append(ips.templates.render("core.editor.emojiResult",
{code:e,emoji:ips.utils.emoji.preview(e),name:ips.haveString("emoji-"+d[f].emoji.name)?ips.getString("emoji-"+d[f].emoji.name):d[f].emoji.name,short_code:":"+d[f].shortName+":"})),g++;g?(ips.utils.lazyLoad.observe(this.results),this.results.children().click($.proxy(this.selectEmoji,this))):(this.results.hide(),this.callsWithNoResults++,3<=this.callsWithNoResults&&(this.cancelEmoji(),this.closeResults()))}.bind(this))}},50,this))};this.selectEmoji=function(a){a.preventDefault();a=$(a.currentTarget);
var b=ips.utils.emoji.editorElement(a.attr("data-emoji"));if("img"==b.getName()&&75<=$("\x3cdiv\x3e"+c.getData()+"\x3c/div\x3e").find("img[data-emoticon]").length){var b=CKEDITOR.dom.element.createFromHtml("\x3cspan\x3e"+a.find("[data-role\x3d'shortCode']").text()+"\x3c/span\x3e"),d=$("."+c.id).closest("[data-ipsEditor]").find('[data-role\x3d"emoticonMessage"]');d.slideDown();setTimeout(function(){instance.once("key",function(){d.slideUp()});instance.once("setData",function(){d.slideUp()})},2500)}b.replace(this.currentEmoji);
"span"==b.getName()&&b.hasClass("ipsEmoji")&&c.widgets.initOn(b,"ipsemoji");c.focus();var g=c.createRange();g.moveToElementEditEnd(b);c.getSelection().selectRanges([g]);this.closeResults();ips.utils.emoji.logUse(a.attr("data-emoji"))};this.cancelEmoji=function(){this.currentEmoji&&this.currentEmoji.remove(!0)};this.closeResults=function(){this.currentEmoji=null;this.results&&this.results.remove();this.listenWithinEmoji&&!_.isUndefined(this.listenWithinEmoji)&&c.removeListener("key",this.listenWithinEmojiEvent);
this.listenForColonSymbolEvent=c.on("change",this.listenForColonSymbol,this)};document.createElement("canvas").getContext&&("function"==typeof document.createElement("canvas").getContext("2d").fillText&&ips.utils.emoji.getEmoji(function(a){this.emoji=a}.bind(this)),this.listenForColonSymbolEvent=c.on("change",this.listenForColonSymbol,this))};