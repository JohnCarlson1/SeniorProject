<?php 
    require('../config/functions.php');
    //require that the user is admin
    if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../security.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../security.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Employee</title>
    <!-- <link rel="stylesheet" href="../create_client.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
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
        <div class="col-md-2 border-right page-border" style="background-color:#474646"></div>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="far fa-plus-square"></i>&nbsp;Create Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class= "nav-link" href="../security.php?logout='1'" class="text-secondary">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
    <div class="container">
        <div class="form-group">
            <h2 class="pl-5">Create New Employee</h2>
        </div>
        <div class="container">
            <form class="form-group" method="POST" action="create_user.php">
                <?php echo display_error(); ?>
                <div class="form-group">
                    <label for="InputFirstName">First Name</label>
                    <input type="text" name="create_first_name" class="form-control" value="<?php echo $first_name; ?>" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="InputLastName">Last Name</label>
                    <input type="text" name="create_last_name" class="form-control" value="<?php echo $last_name; ?>" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="text" name="create_email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="InputPhone">Phone Number</label>
                    <input type="text" name="create_phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                    <label for="InputUsername">Username</label>
                    <input type="text" name="create_username" class="form-control" value="<?php echo $username; ?>" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="create_password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Employee Type: </label> <br>
                        <input type="radio" name="new_user_type" value="user"> Employee <br>
                        <input type="radio" name="new_user_type" value="admin"> Administrator
                </div>
                <button type="submit" class="btn-submit mx-auto d-block" name="new_user_submit" value="new_user_submit">Create New Employee</button>
        </div>
            </form>
    </div>
    </div>
    <div class="col-md-2 border-left page-border" style="background-color:#474646"></div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>