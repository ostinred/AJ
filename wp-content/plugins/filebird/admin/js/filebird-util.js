"use strict";var ntWMC={filebird_begin_loading:function(){jQuery(".njt-filebird-loader").addClass("loading")},filebird_finish_loading:function(){jQuery(".njt-filebird-loader.loading").removeClass("loading").addClass("finish"),setTimeout(function(){jQuery(".njt-filebird-loader.finish").removeClass("finish")},400)},ntWMCgetBackboneOfMedia:function(e){var t,a,n=e.parents(".media-modal");return a=(t=n.length>0?n.find(".attachments-browser"):jQuery("#wpbody-content .attachments-browser")).data("backboneView"),{browser:t,view:a}},updateCount:function(e,t){if(-1==e&&jQuery(".menu-item.uncategory .jstree-anchor").addClass("need-refresh"),e!=t){if(e){var a=jQuery('.menu-item[data-id="'+e+'"]').attr("data-number");(a=Number(a)-1)?jQuery('.menu-item[data-id="'+e+'"]').attr("data-number",a):jQuery('.menu-item[data-id="'+e+'"]').removeAttr("data-number")}if(t){var n=jQuery('.menu-item[data-id="'+t+'"]').attr("data-number");n||(n=0),n=Number(n)+1,jQuery('.menu-item[data-id="'+t+'"]').attr("data-number",n)}}},updateCountAfternDeleteFolder:function(e){var t=jQuery(".menu-item.uncategory").attr("data-number");void 0===t&&(t=0),t=Number(t)+Number(e),jQuery(".menu-item.uncategory").attr("data-number",t),jQuery(".menu-item.uncategory .jstree-anchor").addClass("need-refresh")},dragFile:function(e){var t=filebird_translate.move_1_file;jQuery("body").append('<div id="njt-filebird-attachment" data-id="">'+t+"</div>");var a=jQuery("#njt-filebird-attachment");e.draggable({cursorAt:{top:0,left:0},helper:function(e){return jQuery("<span></span>")},start:function(e,n){var r=jQuery(".attachments li.selected:not(.selection,:hidden)");r.length>0&&(t=filebird_translate.Move+" "+r.length+" "+filebird_translate.files),a.html(t),jQuery("body").addClass("njt-draging"),a.show()},stop:function(e,t){a.hide(),jQuery("body").removeClass("njt-draging")},drag:function(e,t){var n=jQuery(this).data("id");a.data("id",n),a.css({top:e.clientY-15,left:e.clientX-15})}})},dropFile:function(){setTimeout(()=>{(jQuery(".menu-item-bar.jstree-anchor").length||jQuery(".item.jstree-anchor").length)&&jQuery(".jstree-anchor").droppable({drop:function(e,t){var a=jQuery(this).parent().attr("data-id"),n=ntWMC.njt_get_seleted_files();if(n.length){ntWMC.njt_move_multi_attachments(n,a,e);var r=jQuery("body.wp-admin.upload-php ul.attachments li.attachment").length;if(r&&r===n.length){var i=".wp-admin.upload-php .media-toolbar.wp-filter .media-toolbar-secondary";jQuery(i+" .media-button.delete-selected-button").hasClass("hidden")||jQuery(i+" .media-button.select-mode-toggle-button").trigger("click")}}else{t.draggable.hasClass("menu-item")||ntWMC.njt_move_1_attachment(e,a)}}})},300)},njt_get_seleted_files:function(){var e=jQuery(".attachments li.selected"),t=[];return!!e.length&&(e.each(function(e,a){t.push(jQuery(a).data("id"))}),t)},njt_move_multi_attachments:function(e,t,a){jQuery(a.target).addClass("need-refresh");var n={};n.ids=e,n.folder_id=t,n.nonce=window.njt_fb_nonce,n.action="filebird_save_multi_attachments",ntWMC.filebird_begin_loading(),jQuery.ajax({type:"POST",dataType:"json",data:n,url:ajaxurl,success:function(e){e.success&&(e.data.forEach(function(e){ntWMC.updateCount(e.from,e.to),jQuery('ul.attachments li[data-id="'+e.id+'"]').removeClass("selected details").hide()}),jQuery(".jstree-anchor").addClass("need-refresh")),ntWMC.filebird_finish_loading()}})},njt_move_1_attachment:function(e,t){var a=jQuery("#njt-filebird-attachment").data("id"),n=jQuery('.attachment[data-id="'+a+'"]'),r=jQuery(".wpmediacategory-filter").val();"all"!==t&&t!=r&&(ntWMC.filebird_begin_loading(),jQuery.ajax({type:"POST",dataType:"json",data:{id:a,action:"nt_wcm_get_terms_by_attachment",nonce:window.njt_fb_nonce},url:ajaxurl,success:function(i){if(jQuery.trim(i.data)){var d=Array.from(i.data,e=>e.term_id);if(d.includes(Number(t)))return void ntWMC.filebird_finish_loading();jQuery(e.target).addClass("need-refresh");var u={};u.id=a,u.attachments={},u.attachments[a]={menu_order:0},u.folder_id=t,u.action="filebird_save_attachment",u.nonce=window.njt_fb_nonce,jQuery.ajax({type:"POST",dataType:"json",data:u,url:ajaxurl,success:function(e){e.success&&(jQuery.each(d,function(e,a){ntWMC.updateCount(a,t)}),console.log(r,d.length),"all"!==r||d.length||ntWMC.updateCount(-1,t),-1==r&&ntWMC.updateCount(-1,t),"all"!=r&&n.detach()),ntWMC.filebird_finish_loading()}})}else console.log("filebird no data found"),ntWMC.filebird_finish_loading()}}))}};