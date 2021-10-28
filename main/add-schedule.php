<?php
    session_start();
    error_reporting(0);
    include ('static/config.php');

    $new_doc_id_sql = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM schedule;");
    $new_doc_id = mysqli_fetch_array($new_doc_id_sql);
    $id = $new_doc_id['max_id']+1;

    if(isset($_POST['add'])){
        $id_room = $_POST['id_room'];
        $id_doctor = $_POST['id_doctor'];
        $date = $_POST['date'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $hour = $_POST['hour'];
        $minute = $_POST['minute'];

        $query = "INSERT INTO schedule (id, id_room, id_doctor, date, month, year, hour, minute)
        VALUES ('$id', '$id_room', '$id_doctor', '$date', '$month', '$year', '$hour', '$minute');";

        $insert = mysqli_query($conn, $query);

        if($insert){
            echo "<script>alert('Schedule info added Successfully');</script>";
            echo "<script>window.location.href ='schedule.php'</script>";
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
        <h1>Add schedule</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Schedule</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add schedule</li>
                </ol>
            </nav>
        </div>

        <!--BODY-->
        <div class="div-body">
            <div>
                <form autocomplete="off" role="form" name="add-doc" method="post">
                    <!--Reserve of option input (room)-->
                    <div class="form-section">
                        <label for="id_room">Room</label>
                        <input type="text" name="id_room" class="form-control" 
                            placeholder="Enter room id">
                    </div>

                    <!--Reserve of option input (doctor)-->
                    <div class="form-section">
                        <label for="id_doctor">Doctor</label>
                        <input type="text" name="id_doctor" class="form-control" 
                            placeholder="Enter doctor id">
                    </div>

                    <div class="form-section">
                        <label for="date">Date</label>
                        <input type="text" name="date" class="form-control" 
                            placeholder="Enter date">
                    </div>

                    <div class="form-section">
                        <label for="month">Month</label>
                        <input type="text" name="month" class="form-control" 
                            placeholder="Enter month">
                    </div>

                    <div class="form-section">
                        <label for="year">Year</label>
                        <input type="text" name="year" class="form-control" 
                            placeholder="Enter year">
                    </div>

                    <div class="form-section">
                        <label for="hour">Hour</label>
                        <input type="text" name="hour" class="form-control" 
                            placeholder="Enter hour">
                    </div>

                    <div class="form-section">
                        <label for="minute">Minute</label>
                        <input type="text" name="minute" class="form-control" 
                            placeholder="Enter minute">
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