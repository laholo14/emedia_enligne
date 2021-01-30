$(function () { 
  $('#count_ecolage').countdown("2020/12/03").on('update.countdown', function (event) {
    let $this = $(this).html(event.strftime(''
      + '<div class="holder m-2"><span class="h1 font-weight-bold">%D</span> Jours</div>'
      + '<div class="holder m-2"><span class="h1 font-weight-bold">%H</span> Hr</div>'
      + '<div class="holder m-2"><span class="h1 font-weight-bold">%M</span> Min</div>'
      + '<div class="holder m-2"><span class="h1 font-weight-bold">%S</span> Sec</div>'));
  }); 

});