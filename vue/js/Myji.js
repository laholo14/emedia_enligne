$(document).on('change','.up', function(){

  let names = [];
  let length = $(this).get(0).files.length;
      for (let i = 0; i < $(this).get(0).files.length; ++i) {
          names.push($(this).get(0).files[i].name);
      }
       $("input[name=file]").val(names);
      if(length>2){
        let fileName = names.join(',');
        $(this).closest('.form-group').find('.form-control').attr("value",length+" files selected");
      }
      else{
          $(this).closest('.form-group').find('.form-control').attr("value",names);
      }

});