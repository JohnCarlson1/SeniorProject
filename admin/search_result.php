<?php
   require('../config/functions.php');

   $space = ' ';
   
   $search_request = mysqli_real_escape_string($conn, $_GET['search_request']);
   
   $query_search_request = "
    SELECT first_name, last_name, active_status, tblclient.client_id, tblpet.name, tblpet.img_path, tblpet.pet_id
    FROM tblclient
    INNER JOIN tblpet
    ON tblclient.client_id = tblpet.client_id
    WHERE first_name LIKE '%".$search_request."%' OR last_name LIKE '%".$search_request."%' OR name LIKE '%".$search_request."%'
    ORDER BY last_name, first_name, name
";
$result = mysqli_query($conn, $query_search_request);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dog_profile.css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../error_picture.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
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

<div class="container-fluid h-100" style="height: 100vh;">
        <div class="row">
            <div class="col-md-2 border-right page-border" style="background-color: #fff;">
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
            




        <div class="row">
            <div class="col" style="text-align:center;">
                <h1><b>Clients</b></h1>
                <?php foreach($posts as $post): ?>
                <div class="test" style="display:flex;justify-content:center;">
                    <div class="card bg-light border-dark mb-3 text-center" style="width:9rem; padding:10px;">
                        <div class="card-body">
                            <h6 class="card-title"><b><?php echo $post['first_name']; ?>&nbsp;<?php echo $post['last_name']; ?></b></h6>
                            <p><b>Status:</b><br> <?php echo $post['active_status']; ?></p>
                            <a href="client.php?last_name=<?php echo $post['last_name']; ?>&client_id=<?php echo $post['client_id']; ?>" class="btn btn-outline-dark btn-sm d-block">Profile</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col" style="text-align:center;">
                <h1><b>Dogs</b></h1>
                <?php foreach($posts as $post) : ?>
                <div class="test" style="display:flex;justify-content:center;">
                    <div class="card bg-light border-dark mb-3 text-center" style="width: 9rem; padding:10px;">
                        <!-- <img class="card-img-top img-fluid" src="" onerror="this.style.display= 'none'" class="card-img-top img-fluid" style="height: 8vw; object-fit: scale-down;"> -->
                        <div class="card-body">
                            <h6 class="card-title"><b><?php echo $post['name'] ?></b></h6>
                            <p><b>Owner:</b><br> <?php echo $post['first_name']; ?>&nbsp;<?php echo $post['last_name']; ?></p>
                            <a href="dog.php?name=<?php echo $post['name']; ?>&pet_id=<?php echo $post['pet_id']; ?>" class="btn btn-outline-dark btn-sm d-block">Profile</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>        
            
            </div>
            <div class="col-md-2 border-left page-border" style="background-color:#fff;">
            </div>
</body>
</html>