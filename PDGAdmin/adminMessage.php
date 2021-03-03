<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vue/css/adminMessage.css" type="text/css" />
    <link rel="stylesheet" href="../vue/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-5.6.3-web/css/all.min.css" type="text/css">
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
                            <form method="post">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message</label>
                                    <textarea name="reponse" id="reponse" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="update_ID">
                            <button type="button" class="btn btn-primary btn-sm" onclick="updateUser()">Envoyer</button>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <input type="hidden" name="" id="hiddenID">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="../vue/js/jquery.min.js"></script>
    <script src="../vue/js/popper.js"></script>
    <script src="../vue/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        readMessage();
        setInterval(readMessage, 1000);


    });


    /**Affiche Message */
    function readMessage() {

        let messTous = "messTous";
        $.ajax({
            url: "Message.php",
            method: "POST",
            data: {
                messTous: messTous
            },
            success: function(data) {
                $('.table_message').html(data);
            }
        });
    }


    /**Recuperer l'id du message */
    function GetUser(Upid) {
        $('#hiddenID').val(Upid);
        $.post("Message.php", {
                Upid: Upid
            },
            function(data) {
                let message = JSON.parse(data);
                $('#update_ID').val(message.IDMESSAGE);
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
            $.post("Message.php", {
            idM: idM,
            reponse: reponse,
        }, function(data) {
            alert(data);
            readMessage();
            $('#reponse').val("");
        });
        }
     
    }
</script>