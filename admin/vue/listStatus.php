
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css" type="text/css" />

    <title>Document</title>
</head>

<body>
<?php
    extract($_POST);
?>
    <form method="POST">
        <input type="hidden" id="dip" name="dip" value="<?php echo $dip; ?>">
        <input type="hidden" id="fil" name="fil" value="<?php echo $fil; ?>">
        <input type="hidden" id="vague" name="vague" value="<?php echo $vague; ?>"> 
    </form>
    
    <div id="status"></div>

<script>

    $(document).ready(function() {
        Status();
        setInterval(Status, 1000);
    });
Status();
    function Status() { 
        let dip = $('#dip').val();
        let fil = $('#fil').val();
        let vague = $('#vague').val();
            $.ajax({
                url:"../controller/contrFetchuser.php",
                method:"POST",
                data:{
                    dip : dip,
                    fil : fil,
                    vague : vague
                },
                success: function (data) {
                    $('#status').html(data);
                  /* if(data == 'ery'){
                       alert('ok');
                   }
                   else
                   {
                       alert('tsy ok');
                   }*/
                }
            });

    }
</script>

</body>

</html>



