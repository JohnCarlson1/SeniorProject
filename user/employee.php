<?php
    require('../config/config.php');
    require('../config/db.php');
    require('../config/function_picture.php');
    require('../config/functions.php');

    if (!isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../security.php');
      }
      if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: ../security.php');
      }

    //get user_id
    $id = mysqli_real_escape_string($conn, $_GET['user_id']);




    //Get data from tblemployee

    $query = "SELECT *
              FROM tblemployee
              WHERE tblemployee.user_id = '$id'";
    //result of query
    $result = mysqli_query($conn, $query);

    //turn result into associative array
    $new_query = "SELECT * FROM tblemployee WHERE tblemployee.user_id = '$id'";
    $new_result = mysqli_query($conn, $new_query);
    $post = mysqli_fetch_assoc($new_result);
    //Free the result
    mysqli_free_result($new_result);

    //close connection to database
    //mysqli_close($conn);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Employee LIst</title>
        <link rel="stylesheet" href="../employee.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
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
        <div class="col-md-1 border-right page-border" style="background-color:#474646"></div>
        
        <div class="col-md-10">
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
                              <a class= "nav-link" href="../security.php?logout='1'" class="text-secondary">Logout</a>
                          </li>
                      </ul>
                  </div>
              </nav>
        
        <small>
        <main>
        <!-- Begin EDIT FIRST Name -->
        <div class="row h-100 name-display">
                  <div class="col-sm-2 hidden">
                    
                  </div>
                  <!-- BEGIN DISPLAY NAME -->
                    <div class="col-md-8 align-self-center">
                      <h1><?php echo $post['first_name']; ?>&nbsp;<?php echo $post['last_name']; ?></h1>  
                    </div>
                  <!-- BEGIN DISPLAY EDIT LAST NAME -->
                  <div class="col-sm-2 hidden">
                    
                  </div>
                  
                  </div>
                <!-- END DISPLAY NAME ROW-->

        <!-- DISPLAY INFO -->
        <div class="row h-100">
          <?php
            while($post = mysqli_fetch_assoc($result)) {   
              foreach ($post as $col => $val) {
                  
                if($col != 'emp_id' AND $col != 'user_id' AND $col != 'first_name' AND $col != 'last_name') {
                  echo
                  '
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                  <li>'.$col.'</li>
                  <div class="row h-100">
                  <div class="col-sm-12">
                    <ul class="list-group-item">'.$val.'</ul>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-3"></div>
                  
                  ';
                  if(isset($_POST['edit_'.$col])){
                    //get data
                    $data = mysqli_real_escape_string($conn, $_POST['new_'.$col]);
                    //Update statement
                    $query_update = "UPDATE tblemployee SET $col = '$data' WHERE tblemployee.user_id = '$id'";
                    //Submit Query
                    if(mysqli_query($conn, $query_update)){
                      echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo 'Error: '.mysqli_error($conn);
                    }
                }
              }  
            }
          }


          ?>
        </div>
        
      </main>
      </small>
        </div>
        <div class="col-md-1 border-left page-border" style="background-color:#474646""></div>
        </div>
    </div>
  </div>
    </body>
    </html>