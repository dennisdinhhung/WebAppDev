<?php
    session_start();
    error_reporting(0);
    include ('static/config.php');

    $new_doc_id_sql = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM doctors;");
    $new_doc_id = mysqli_fetch_array($new_doc_id_sql);
    $id = $new_doc_id['max_id']+1;
    echo $id;

    if(isset($_POST['add'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $field = $_POST['field'];
        $email = $_POST['email'];

        //$new_doc_id_sql = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM doctors;");
        //$new_doc_id = mysqli_fetch_array($new_doc_id_sql);
        //$id = $new_doc_id['max_id'];

        $query = "INSERT INTO doctors (id,first_name,last_name,field,email) VALUES ('$id','$first_name','$last_name','$field', '$email');";

        $insert = mysqli_query($conn, $query);

        if($insert){
            echo "<script>alert('Doctor info added Successfully');</script>";
            echo "<script>window.location.href ='doctor.php'</script>";
        }
    }
    else{
        echo "Error isset()";
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
        <h1>Add doctor</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add doctor</li>
                </ol>
            </nav>
        </div>

        <!--BODY-->
        <div class="div-body">
            <div>
                <form autocomplete="off" role="form" name="add-doc" method="post">
                    <div class="form-section">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" 
                            placeholder="Enter first name" >
                    </div>

                    <div class="form-section">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" 
                            placeholder="Enter last name" >
                    </div>

                    <div class="form-section">
                        <label for="last_name">Field</label>
                        <input type="text" name="field" class="form-control" 
                            placeholder="Enter field profession" >
                    </div>

                    <div class="form-section">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" 
                            placeholder="Enter email address" >
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