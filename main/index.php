<?php
//Insert start php here
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group XX - Hospital Management</title>
    <!--Jquery Link-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <!--Bootstrap link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- external css link-->
    <link rel="stylesheet" href="../styles/styles.css">
    <!--fontawesome for icons-->
    <script src="https://kit.fontawesome.com/eb021599d5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <?php include('static/navbar.php'); ?>
    </div>
    <div class="title">
        <h1>Home</h1>
    </div>

    <img class="center" src="../images\pexels-andrea-piacquadio-3952126.jpg" alt="image1">
    

    <div class="div-index-button">
        <div>
        <a href="doctor.php">
            <button type="button" class="index-button btn btn-dark">
                Check/Manage Doctor 
            </button></a>

        <a href="room.php">
            <button type="button" class="index-button btn btn-dark">
                Check/Manage Room 
            </button></a>
        
        <a href="schedule.php">
            <button type="button" class="index-button btn btn-dark">
                Check/Manage Schedule
            </button></a>    
        </div>
    </div>
</body>
</html>