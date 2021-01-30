let boutonfile=document.querySelectorAll(".boutton_file");
let inputfile=document.querySelectorAll(".file_book");
let filename=document.querySelectorAll(".file_name");
for (let index = 0; index < boutonfile.length; index++) {
    boutonfile[index].addEventListener("click",function(event){
       inputfile[index].click();     
    },true)
    inputfile[index].addEventListener("change",function(event){
        filename[index].textContent=inputfile[index].value;
    },false)
    
}
/*$(document).ready(function () {

    function ajoutUE() {
        if ($("#text_ue").val() != "") {
            $.ajax({
                url: "../controller/controllerAjoutUE.php",
                type: "POST",
                data: {
                    text_ue: $("#text_ue").val()
                },
                success: function (data) {
                    alert(data);
                }
            })
        } else {
            alert("fenoy aloha");
        }
    }

    $("#btn_ajout_ue").click(function (e) {

        e.preventDefault();
        ajoutUE();

    });


    

});

*/



