(function ($, Drupal) {

  // Using some JS function
  $.fn.myFunction = function(data) {
    console.log(data);
  };
  // Usig a CommandInterface
  Drupal.AjaxCommands.prototype.MyAjaxExample = function(ajax, response, status){

    var foo = response.foo ? response.foo : 'default';
    console.log(response.selector);
    $(response.selector).html(foo);

  }

  Drupal.behaviors.ajaxExample = {
    attach: function (context, settings) {

      $('#myButton').click(function() {
        $.ajax({
          type: "POST",
          url: '/admin/ajax_content',
          data: {"ajaxCall":true},
          success: function(response) {
            $('#myContent').html(response[0].foo);
          }
        });
      });

    }
  };
})(jQuery, Drupal);
