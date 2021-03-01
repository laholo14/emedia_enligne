$(function () {
  
  let date;
  if($('#diplaoma').val()=='LICENCE'){
     date="2021/03/23";
  }else{
    date="2021/03/25";
  }
  $('#count_exam').countdown(date).on('update.countdown', function (event) {
    let $this = $(this).html(event.strftime(''
      + '<div class="date text-center"><div class="bloc1 d-flex justify-content-center align-items-center" id="jours">%D</div><div class="bloc2"><p>JOURS</p></div></div>'
      + '<div class="date text-center"><div class="bloc1 d-flex justify-content-center align-items-center" id="jours">%H</div><div class="bloc2"><p>HR</p></div></div>'
      + '<div class="date text-center"><div class="bloc1 d-flex justify-content-center align-items-center" id="jours">%M</div><div class="bloc2"><p>MIN</p></div></div>'
      + '<div class="date text-center"><div class="bloc1 d-flex justify-content-center align-items-center" id="jours">%S</div><div class="bloc2"><p>SEC</p></div></div>'
    ));
  });




});
