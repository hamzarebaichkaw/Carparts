jQuery(document).ready(function($) {
  "use strict";
    $(document).ajaxSuccess(function(e, xhr, settings) {
        $('.uploadeimage').on('click', function(){
            wp.media.editor.send.attachment = function(props, attachment){
                $('.uploadeimage').val(attachment.url);
            }
            wp.media.editor.open(this);

            return false;
        });

    });
	
      $('.uploadeimage').on('click', function(){
      wp.media.editor.send.attachment = function(props, attachment){
        $('.uploadeimage').val(attachment.url);
      }
      wp.media.editor.open(this);
      
      return false;
      });

   });