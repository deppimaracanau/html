      $(".reveal").mousedown(function() {
          $(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
          $("#gly_eye").replaceWith($('#gly_eye').clone().attr('class', 'far fa-eye'));
      })
      .mouseup(function() {
        $(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
        $("#gly_eye").replaceWith($('#gly_eye').clone().attr('class', 'far fa-eye-slash'));
      })
      .mouseout(function() {
        $(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
        $("#gly_eye").replaceWith($('#gly_eye').clone().attr('class', 'far fa-eye-slash'));
      });