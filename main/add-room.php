<?php
    session_start();
    error_reporting(0);
    include ('static/config.php');

    $new_doc_id_sql = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM room;");
    $new_doc_id = mysqli_fetch_array($new_doc_id_sql);
    $id = $new_doc_id['max_id']+1;

    if(isset($_POST['add'])){
        $room_no = $_POST['room_no'];
        $room_floor = $_POST['room_floor'];
        $room_type = $_POST['room_type'];

        $query = "INSERT INTO room (id,room_no,room_floor,room_type)
        VALUES ('$id','$room_no','$room_floor','$room_type');";

        $insert = mysqli_query($conn, $query);

        if($insert){
            echo "<script>alert('Room info added Successfully');</script>";
            echo "<script>window.location.href ='room.php'</script>";
        }
    }
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
        <h1>Add room</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Room</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add room</li>
                </ol>
            </nav>
        </div>

        <!--BODY-->
        <div class="div-body">
            <div>
                <form autocomplete="off" role="form" name="add-doc" method="post">
                <div class="form-section">
                    <label for="room_no">Room Number</label>
                    <input type="text" name="room_no" class="form-control"
                        placeholder="Enter room number">
                </div>

                <div class="form-section">
                    <label for="room_floor">Floor</label>
                    <input type="text" name="room_floor" class="form-control"
                    placeholder="Enter room floor">
                </div>

                <div class="form-section">
                    <label for="room_type">Type</label>
                    <input type="text" name="room_type" class="form-control"
                    placeholder="Enter room type">
                </div>

                <button type="submit" name="add" class="btn btn-primary">
                    Add
                </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>