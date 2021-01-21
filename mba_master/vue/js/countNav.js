$(document).ready(function () {
    setInterval(countInscription,1000);
    setInterval(countEtudiants,1000);
    countEtudiants();
    countInscription();
    
 //countinsription
    function countInscription() {
        $.ajax({
            url: "../controller/controllerCountInscription.php",
            type: "POST",
            data: {
                countInscri: ""
            },
            success: function (data) {
                $("#count-inscription").html(" "+data)
            }
        })
    }

    //coutnEtudiant
    function countEtudiants() {
        $.ajax({
            url: "../controller/controllercountEtudiants.php",
            type: "POST",
            data: {
                countInscri: ""
            },
            success: function (data) {
                $("#count-etudiants").html(" "+data)
            }
        })
    }
});