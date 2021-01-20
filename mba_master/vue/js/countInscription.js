$(document).ready(function () {
    setInterval(countInscription,1000);
    countInscription();
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
});