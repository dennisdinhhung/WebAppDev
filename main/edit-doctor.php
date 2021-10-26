<?php
    session_start();
    error_reporting(0);
    include('static/config.php');

    $doc_id = intval($_GET['id']);
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $field = $_POST['field'];
        $email = $_POST['email'];

        mysqli_query($conn, "UPDATE doctors SET first_name='$first_name', last_name='$last_name', field='$field', email='$email' WHERE id='$doc_id';");
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
        <h1>Edit doctor info</h1>
    </div>
    <div class="app">
        <!--TITLE-->
        <div class="list-title margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>

        <!--BODY-->
        <div>
<?php
    $sql = mysqli_query($conn, "SELECT * FROM doctors WHERE id = '$doc_id'");
    while($data=mysqli_fetch_array($sql)){
?>
        <div>
            <form role="form" name="adddoc" method="post" onsubmit="return valid();">
                <div class="form-section">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" 
                        value="<?php echo htmlentities($data['first_name']);?>" >
                </div>

                <div class="form-section">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" 
                        value="<?php echo htmlentities($data['last_name']);?>" >
                </div>

                <div class="form-section">
                    <label for="last_name">Field</label>
                    <input type="text" name="field" class="form-control" 
                        value="<?php echo htmlentities($data['field']);?>" >
                </div>

                <div class="form-section">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" 
                        value="<?php echo htmlentities($data['email']);?>" >
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