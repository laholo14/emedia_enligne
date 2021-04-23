$(function () {
  let count = new Date();
  let durre = parseInt($("#durre").val()) + 15;
  count.setMinutes(count.getMinutes() + durre);
  let countDate = count.getTime();
  $('#clock-b').countdown(countDate).on('update.countdown', function (event) {
    let $this = $(this).html(event.strftime(''
      + '<div class="holder m-2"><span id="count_exam" class="h1 font-weight-bold">%H</span> Hr</div>'
      + '<div class="holder m-2"><span id="count_exam" class="h1 font-weight-bold">%M</span> Min</div>'
      + '<div class="holder m-2"><span id="count_exam" class="h1 font-weight-bold">%S</span> Sec</div>'));
  });
  $('#clock-b').countdown(countDate).on('finish.countdown', function (event) {
    $("#myform").submit();
  });


});
