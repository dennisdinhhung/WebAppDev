<?php
    session_start();
    error_reporting(0);
    include('static/config.php');

    if(isset($_GET['del'])){
        mysqli_query($conn,"DELETE FROM doctors WHERE id = '".$_GET['id']."';");
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
        <h1>Doctor</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor</li>
                </ol>
            </nav>

            <div class="div-button-add">
                <a href="add-doctor.php">
                    <button type="button" class="btn btn-primary">
                        Add doctor
                    </button>
                </a>
            </div>
        </div>

        <!--BODY-->
        <div class="list-body margin">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Field</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
<?php
    $sql = mysqli_query($conn, "SELECT * FROM doctors;");
    $count = 1;
    while($row=mysqli_fetch_array($sql))
        {
?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['field'];?></td>
                        <td><?php echo $row['email'];?></td>

                        <!--Action collumn-->
                        <td>
                            <div class="action-cell">
                                    <a  href="edit-doctor.php?id=<?php echo $row['id'];?>"
                                        class="icon-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a  href="doctor.php?id=<?php echo $row['id']?>&del=delete"
                                        onClick="return confirm('Are you sure you want to delete?')"
                                        class="icon-edit">
                                        <i class="fas fa-trash"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>
<?php
    $count=$count+1;
       }?>
                </tbody>
            </table>
        </div>
        <?php
            
        ?>
    </div>
</body>
</html>