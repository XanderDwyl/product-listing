(function($) {
  $(document).ready(function() {

    $('.btn-insert-list').on('click', function() {
      var id = $(this).attr("data-id");
      if(window.parent.tinyMCE || window.parent.tinyMCE.activeEditor)
      {
        window.parent.send_to_editor('[list_group id="'+ id + '"]');
      }
    });
  });
})( jQuery );
