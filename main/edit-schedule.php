<?php
    session_start();
    error_reporting(0);
    include('static/config.php');

    $sched_id = intval($_GET['id']);
    if(isset($_POST['submit'])){
        $id_room = $_POST['id_room'];
        $id_doctor = $_POST['id_doctor'];
        $date = $_POST['date'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $hour = $_POST['hour'];
        $minute = $_POST['minute'];
        
        mysqli_query($conn, "UPDATE schedule SET 
            id_room=$id_room, 
            id_doctor=$id_doctor, 
            date=$date, 
            month=$month, 
            year=$year, 
            hour=$hour, 
            minute=$minute
            WHERE id=$sched_id;");
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
        <h1>Edit schedule info</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="schedule.php">Schedule</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <!--BODY-->
        <div class="div-body">
<?php
    $sql = mysqli_query($conn, "SELECT * FROM schedule 
        JOIN doctors ON schedule.id_doctor = doctors.id 
        JOIN room ON schedule.id_room = room.id WHERE schedule.id = '$sched_id';");
    while($data=mysqli_fetch_array($sql)){
?>
        <div>
            <form autocomplete="off" role="form" name="adddoc" method="post" onsubmit="return valid();">

                <!--Reserve of option input (room)-->
                <div class="form-section">
                        <label for="id_room"> Select Room</label>
                            <select name="id_room" class="form-control" required="required">
                            <option value="<?php echo htmlentities($data['id_room']);?>">
                                <?php   echo htmlentities($data['room_no']);
                                        echo " - ";
                                        echo htmlentities($data['room_type']);?>
                            </option>
                            
<?php $room = mysqli_query($conn, "SELECT * FROM room;");
while($row_room = mysqli_fetch_array($room)){
?>
                            <option value="<?php echo htmlentities($row_room['id']);?>">
                                <?php   echo htmlentities($row_room['room_no']);
                                        echo " - ";
                                        echo htmlentities($row_room['room_type']);?>
                            </option>
                            
<?php } ?>
                            </select>
                    </div>

                    <!--Reserve of option input (doctor)-->
                    <div class="form-section">
                        <label for="id_doctor">Select Doctor</label>
                            <select name="id_doctor" class="form-control" required="required">
                            <option value="<?php echo htmlentities($data['id_doctor']);?>">
                                <?php   echo htmlentities($data['first_name']);
                                        echo " ";
                                        echo htmlentities($data['last_name']);
                                        echo " - ";
                                        echo htmlentities($data['field']);?>
                            </option>
<?php $doctor = mysqli_query($conn, "SELECT * FROM doctors;");
while($row_doctor = mysqli_fetch_array($doctor)){
?>
                            <option value="<?php echo htmlentities($row_doctor['id']);?>">
                                <?php   echo htmlentities($row_doctor['first_name']);
                                        echo " ";
                                        echo htmlentities($row_doctor['last_name']);
                                        echo " - ";
                                        echo htmlentities($row_doctor['field']);?>
                            </option>
<?php } ?>
                            </select>
                    </div>

                <div class="form-section">
                    <label for="date">Date</label>
                    <input type="text" name="date" class="form-control" 
                        value="<?php echo htmlentities($data['date']);?>" >
                </div>

                <div class="form-section">
                    <label for="month">Month</label>
                    <input type="text" name="month" class="form-control" 
                        value="<?php echo htmlentities($data['month']);?>" >
                </div>

                <div class="form-section">
                    <label for="year">Year</label>
                    <input type="text" name="year" class="form-control" 
                        value="<?php echo htmlentities($data['year']);?>" >
                </div>

                <div class="form-section">
                    <label for="hour">Hour</label>
                    <input type="text" name="hour" class="form-control" 
                        value="<?php echo htmlentities($data['hour']);?>" >
                </div>

                <div class="form-section">
                    <label for="minute">Minute</label>
                    <input type="text" name="minute" class="form-control" 
                        value="<?php echo htmlentities($data['minute']);?>" >
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
        </div>
<?php }?>
        </div>
    </div>
</body>
</html>