
    $(document).ready(function() {
        Bulletin();
        $("#semestre").change(function() {
            Bulletin();
        });
    });

    function Bulletin() {
        let semestre = $("#semestre").val();
        $.ajax({
            url: "controller/contrAffichageNote.php",
            type: "post",
            data: {
                semestre: semestre
            },
            success: function (data) {
               $("#tabnote").html(data);
                
            }
        });
    };