<?php
    include_once 'static/config.php'
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group XX - Hospital Management</title>
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- external css link-->
    <link rel="stylesheet" href="../styles/styles.css">
    <!--Jquery Link-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <div>
        <?php include('static/navbar.php'); ?>
    </div>
    <div class="title">
        <h1>Management</h1>
    </div>
    <div class="app">
        
        <!--TITLE-->
        <div class="list-title">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Management</li>
                </ol>
            </nav>

            <div class="div-button-add">
                <button>Add data</button>
                <button>Add schedules</button>
            </div>
        </div>

        <!--BODY-->
        <div class="list-body">
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
    $data = file_get_contents('../database/test.sql');
    $sql = mysqli_query($con, "SELECT * FROM doctors");
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
                            <div>
                                <a href=""><i class="fa fa-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
<?php   }?>
                </tbody>
            </table>
        </div>
        
        <!--Insert list of doctors here-->
        <?php
            
        ?>
    </div>
</body>
</html>