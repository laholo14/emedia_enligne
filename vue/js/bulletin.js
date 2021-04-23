
    $(document).ready(function() {
        Bulletin();
        Repechage();
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