<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminMessage.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <title>Document</title>
</head>

<body>
    <?php include("navadmin.php"); ?>
    <div class="container">
        <div class="table_message mt-5">

        </div>



        <!modal update>

            <div class="modal fade" id="Updata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title text-capitalize text-center" id="exampleModalLabel">Reponse</h5>
                        </div>
                        <div class="modal-body">
                            <div class="message_enciens overflow-auto">
 
                            </div>
                            <form method="post">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message</label>
                                    <textarea name="reponse" id="reponse" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <input type="hidden" id="update_ID">
                            <button type="button" class="btn btn-primary btn-sm" onclick="updateUser()">Envoyer</button>
                            <input type="hidden" name="" id="hiddenID">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        readMessage();
        setInterval(readMessage, 1000);
        GetUser(Upid,idEtudiant);

        readMessageEtudiant(id);
        setInterval(GetUser(Upid,idEtudiant), 1000);
    });


    /**Affiche Message */
function readMessage() {

        let messTous = "messTous";
        $.ajax({
            url: "../controller/Message.php",
            method: "POST",
            data: {
                messTous: messTous
            },
            success: function(data) {
                $('.table_message').html(data);
            }
        });
    }

         /**Affiche Message */
function readMessageEtudiant(id) {

let messTousEtudiant = "messTousEtudiant";
$.ajax({
    url: "../controller/Message.php",
    method: "POST",
    data: {
        messTousEtudiant: messTousEtudiant,
        id:id
    },
    success: function(data) {
        $('.message_enciens').html(data);
    }
});
}


    /**Recuperer l'id du message */
    function GetUser(Upid,idEtudiant) {
        $('#hiddenID').val(Upid);
        readMessageEtudiant(idEtudiant);
         $.post("../controller/Message.php", {
                Upid: Upid,
                 idEtudiant:idEtudiant
            },
             function(data) {
                 let message = JSON.parse(data);
                $('#update_ID').val(message.IDMESSAGE);
                readMessageEtudiant(idEtudiant);
             }

        );
    }

    /**Reponse Message */
    function updateUser() {
        let idM = $('#hiddenID').val();
        let reponse = $('#reponse').val();
        if(reponse==''){
            alert('Veuillez remplir le champ');
        }else{
            $.post("../controller/Message.php", {
            idM: idM,
            reponse: reponse,
        }, function(data) {
            alert(data);
            readMessage();
            $('#reponse').val("");
            $('#Updata').modal('hide');
        });
        }
     
    }
</script>