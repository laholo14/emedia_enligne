
    $(document).ready(function() {
        Bulletin();
        $("#semestre").change(function() {
            Bulletin();
            Repechage();
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

    Repechage();
    function Repechage() {
        let semestre = $("#semestre").val();
        $.ajax({
            url: "controller/contrAffichageRepechage.php",
            type: "post",
            data: {
                semestre: semestre
            },
            success: function (data) {
               $("#containerRepechage").html(data);
               //alert(data);
                
            }
        });
    };