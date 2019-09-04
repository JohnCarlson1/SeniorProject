<?php
  require('../config/config.php');
  require('../config/db.php');
  require('../config/functions.php');
  
    if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../security.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../security.php');
    }
    //get client_id
    $id = mysqli_real_escape_string($conn, $_GET['client_id']);

    if(isset($_POST['submit'])){
    //Dog data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $fixed = mysqli_real_escape_string($conn, $_POST['fixstatus']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $chip_status = mysqli_real_escape_string($conn, $_POST['chipstatus']);
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    $house_trained_status = mysqli_real_escape_string($conn, $_POST['house_trained_status']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $personality_notes = mysqli_real_escape_string($conn, $_POST['personality_notes']);
    $walking_instructions = mysqli_real_escape_string($conn, $_POST['walking_instructions']);
    $feeding_instructions = mysqli_real_escape_string($conn, $_POST['feeding_instructions']);
    $medical_notes = mysqli_real_escape_string($conn, $_POST['medical_notes']);
    $kennel_notes = mysqli_real_escape_string($conn, $_POST['kennel_notes']);
    $daily_routine = mysqli_real_escape_string($conn, $_POST['daily_routine']);

    $query_dog = " INSERT INTO tblpet (pet_id, name, breed, gender, micro_chip_status, house_trained_status, birthdate, fix_status, threshold, commands, img_path, personality_notes, kennel_notes, walking_instructions, leash_location, poop_bag_location, dog_towel_location, collar_location, feeding_instructions, medical_notes, daily_routine_notes, client_id) VALUES (NULL, '$name', '$breed', '$gender', '$chip_status', '$house_trained_status', '$birthdate', '$fixed', NULL, NULL, NULL, '$personality_notes', '$kennel_notes', '$walking_instructions', NULL, NULL, NULL, NULL, '$feeding_instructions', '$medical_notes', '$daily_routine', '$id')";

    $query_tblcare = "INSERT INTO tblcare(care_id, pet_id) VALUES (NULL, (SELECT pet_id from tblpet WHERE name = '$name' AND breed = '$breed' AND gender = '$gender'))";

    if(mysqli_query($conn, $query_dog)){
        echo 'successful';
    } else {
        echo 'Error: '.mysqli_error($conn);
    }
    if(mysqli_query($conn, $query_tblcare)){
        echo 'successful';
        header("Location: http://localhost/prodogmom/admin/client.php?client_id=$id");
    } else {
        echo 'Error: '.mysqli_error($conn);
    }
}
    
?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Professional Dog Mom</title>
    <meta name="description" content="Dog Mom">
    <meta name="author" content="IS495 Group One">
    <link rel="stylesheet" href="../create_client.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }
        .page-border {
            border-width: 6px !important;
            border-color: #ADADAD !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-2 border-right page-border" style="background-color:#474646">
            </div>
            <div class="col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="prodogmomlogoonly.jpg" alt="ProDogMom Logo" width="30" height="30"
                            class="d-inline-block align-top">
                        Pro Dog Mom
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto nav-fill w-100">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><i class="fas fa-home"></i>&nbsp;Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="client_list.php"><i class="fas fa-users"></i>&nbsp;Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dog_list.php"><i class="fas fa-dog"></i>&nbsp;Dogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="employee_list.php"><i class="far fa-user"></i>&nbsp;Employees</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add_dog.php"><i class="fas fa-user-plus"></i>&nbsp;Create Client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="create_user.php"><i class="far fa-plus-square"></i>&nbsp;Create Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class= "nav-link" href="../security.php?logout='1'" class="text-secondary">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>

<!-- WORKING SPACE -->
                        <small>
                        <main>
                        <!-- HEADER -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h1><b>Add New Dog</b></h1>
                            </div>
                            <div class="col-md-3"><div class="require"><small>* = Required</small></div></div>
                        </div>
                        <!-- END HEADER -->
                        <form method="POST" action="">
                            <div class="form-group">
                                <label class="font-weight-bold">* Name:</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Breed:</label>
                                        <input type="text" name="breed" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold">Birthdate:</label>
                                        <input type="date" name="birthdate" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col radio">
                                <div class="form-check form-check-inline ">
                                    <label class="font-weight-bold pt-1">Fixed:</label> <br>
                                    <input type="radio" name="fixstatus" value="yes" class="form-check-input ml-2"> Yes
                                    <br>
                                    <input type="radio" name="fixstatus" value="no" class="form-check-input ml-2"> No
                                </div> <br>
                                <div class="form-check form-check-inline">    
                                    <label class="font-weight-bold pt-1">Gender:</label> <br>
                                    <input type="radio" name="gender" value="Male" class="form-check-input ml-2 align-middle"> Male
                                    <br>
                                    <input type="radio" name="gender" value="Female" class="form-check-input ml-2 align-middle"> Female
                                </div> <br>
                                <div class="form-check form-check-inline ">
                                    <label class="pt-1 font-weight-bold">Chip Status:</label><br>
                                    <input type="radio" name="chipstatus" value="Yes" class="form-check-input ml-2 align-middle">Yes<br>
                                    <input type="radio" name="chipstatus" value="No" class="form-check-input ml-2 align-middle">No
                                </div> <br>
                                <div class="form-check form-check-inline ">
                                    <label class="pt-1 font-weight-bold">House Trained:</label><br>
                                    <input type="radio" name="house_trained_status" value="Yes" class="form-check-input ml-2 align-middle">Yes<br>
                                    <input type="radio" name="house_trained_status" value="No" class="form-check-input ml-2 align-middle">No
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Personality Notes:</label>
                                        <textarea name="personality_notes" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Walking Instructions:</label>
                                        <textarea name="walking_instructions" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Feeding Instructions:</label>
                                        <textarea name="feeding_instructions" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Medical Notes:</label>
                                        <textarea name="medical_notes" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Kennel Notes:&nbsp;&nbsp;&nbsp;</label>
                                        <textarea name="kennel_notes" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-5 special">
                                        <label class="font-weight-bold">Daily Routine:&nbsp;&nbsp;&nbsp;</label>
                                        <textarea name="daily_routine" cols="45" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn-submit mx-auto d-block">
                        </form>
                    </main>
                </small>



<!-- end working space -->


                </div>
            <div class="col-md-2 border-left page-border" style="background-color:#464747">
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
  </body>
  </html>