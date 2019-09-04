<?php
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
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client List</title>
    <link rel="stylesheet" href="../dog_profile.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
    <script src="../error_picture.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        .card {
            box-shadow: -1px 2px 5px 2px rgba(0,0,0,0.2);
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="far fa-user"></i>&nbsp;Employees</a>
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


          <div class="container-fluid">
            <main>
              <div class="form-group">
              <div class="row">
                <div class="input-group col-md-4 text-center">
                  <!-- <span class="input-group-addon">Search</span> -->
                  <input type="text" name="search_text" id="search_text" placeholder="Search All Employees" class="form-control py-2">
                    <span class="input-group-append">
                        <span class="btn btn-outline-secondary" type="">
                            <i class="fa fa-search"></i>
                        </span>
                    </span>
                </div>
                <div class="col-sm-3"></div>

                </div>
              </div>
                <div class="container-fluid text-center">  
                    <h1>Employees</h1>
                    <div class="row text-center">
                        <div id="result"></div>
                </div>
            </div>
            </main>
          </div>
      </div>
      <div class="col-md-2 border-left page-border" style="background-color:#474646"></div>
    </div>
  </body>
  </html>

  <script>

    
  $(document).ready(function(){
    load_data();

    function load_data(employee_search_test) {
        var viewport_width = $(window).width();
        if (viewport_width < 500) {
        $.ajax({
            url:"../fetch_data/mobile_fetch_employee.php",
            method:"POST",
            data:{employee_search_test:employee_search_test}, //corresponds to the query on fetch_test.php
            success:function(data)
            {
                $('#result').html(data);
            }
        });
        } else {
        
        $.ajax({
            url:"../fetch_data/fetch_employee.php",
            method:"POST",
            data:{employee_search_test:employee_search_test}, //corresponds to the query on fetch_test.php
            success:function(data)
            {
                $('#result').html(data);
            }
        });
        }
    }

  $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != ''){
          load_data(search);
      } else {
          load_data();
      }
  });
 });
</script>