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
  
  // get client ID
  $id = mysqli_real_escape_string($conn, $_GET['client_id']);
  // get client_id
  //$client_id = mysqli_real_escape_string($conn, $_GET['client_id']);


  //ADD NEW FIELD
  if(isset($_POST['add_new_field'])){
    //get form data
    $field_size = 500;
    $new_field = mysqli_real_escape_string($conn, $_POST['new_field']);
    $trimmed_new_field = trim($new_field);
    //QUERY UPDATE STATEMENT
    $query_add_field = "ALTER TABLE tbladditional ADD $trimmed_new_field VARCHAR(500) NULL AFTER House";
    if(mysqli_query($conn, $query_add_field)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }


  // EDIT FIELDS

  //EDIT FIELD first name
  if(isset($_POST['edit_first_name'])){
    //get form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    //QUERY UPDATE STATEMENT
    $query_update_first_name = "UPDATE tblclient SET first_name = '$first_name' WHERE client_id = '$id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_first_name)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
}

//EDIT FIELD last name
if(isset($_POST['edit_last_name'])){
  //get form data
  $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
  //QUERY UPDATE STATEMENT
  $query_update_last_name = "UPDATE tblclient SET last_name = '$last_name' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_last_name)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD phone name
if(isset($_POST['edit_phone'])){
  //get form data
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  //QUERY UPDATE STATEMENT
  $query_update_phone = "UPDATE tblclient SET phone = '$phone' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_phone)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD address name
if(isset($_POST['edit_address'])){
  //get form data
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  //QUERY UPDATE STATEMENT
  $query_update_address = "UPDATE tblclient SET address = '$address' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_address)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD city name
if(isset($_POST['edit_city'])){
  //get form data
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  //QUERY UPDATE STATEMENT
  $query_update_city = "UPDATE tblclient SET city = '$city' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_city)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD state 
if(isset($_POST['edit_state'])){
  //get form data
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  //QUERY UPDATE STATEMENT
  $query_update_state = "UPDATE tblclient SET state = '$state' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_state)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}


//EDIT FIELD zip 
if(isset($_POST['edit_zip'])){
  //get form data
  $zip = mysqli_real_escape_string($conn, $_POST['zip']);
  //QUERY UPDATE zipMENT
  $query_update_zip = "UPDATE tblclient SET zip = '$zip' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_zip)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

  //EDIT FIELD key_location 
if(isset($_POST['edit_key_location'])){
  //get form data
  $key_location = mysqli_real_escape_string($conn, $_POST['key_location']);
  //QUERY UPDATE key_locationMENT
  $query_update_key_location = "UPDATE tblclient SET key_location = '$key_location' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_key_location)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD house_code 
if(isset($_POST['edit_house_code'])){
  //get form data
  $house_code = mysqli_real_escape_string($conn, $_POST['house_code']);
  //QUERY UPDATE house_codeMENT
  $query_update_house_code = "UPDATE tblclient SET house_code = '$house_code' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_house_code)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD wifi_network 
if(isset($_POST['edit_wifi_network'])){
  //get form data
  $wifi_network = mysqli_real_escape_string($conn, $_POST['wifi_network']);
  //QUERY UPDATE wifi_networkMENT
  $query_update_wifi_network = "UPDATE tblclient SET wifi_network = '$wifi_network' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_wifi_network)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD wifi_password 
if(isset($_POST['edit_wifi_password'])){
  //get form data
  $wifi_password = mysqli_real_escape_string($conn, $_POST['wifi_password']);
  //QUERY UPDATE wifi_passwordMENT
  $query_update_wifi_password = "UPDATE tblclient SET wifi_password = '$wifi_password' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_wifi_password)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD email 
if(isset($_POST['edit_email'])){
  //get form data
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  //QUERY UPDATE emailMENT
  $query_update_email = "UPDATE tblclient SET email = '$email' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_email)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD emergency_contact_name 
if(isset($_POST['edit_emergency_contact_name'])){
  //get form data
  $emergency_contact_name = mysqli_real_escape_string($conn, $_POST['emergency_contact_name']);
  //QUERY UPDATE emergency_contact_nameMENT
  $query_update_emergency_contact_name = "UPDATE tblclient SET emergency_contact_name = '$emergency_contact_name' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_emergency_contact_name)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD emergency_contact_number 
if(isset($_POST['edit_emergency_contact_number'])){
  //get form data
  $emergency_contact_number = mysqli_real_escape_string($conn, $_POST['emergency_contact_number']);
  //QUERY UPDATE emergency_contact_numberMENT
  $query_update_emergency_contact_number = "UPDATE tblclient SET emergency_contact_number = '$emergency_contact_number' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_emergency_contact_number)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}

//EDIT FIELD valid_quote 
if(isset($_POST['edit_valid_quote'])){
  //get form data
  $valid_quote = mysqli_real_escape_string($conn, $_POST['valid_quote']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_valid_quote = "UPDATE tblclient SET valid_quote = '$valid_quote' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_valid_quote)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD Active Status 
if(isset($_POST['edit_active_status'])){
  //get form data
  $active_status = mysqli_real_escape_string($conn, $_POST['active_status']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_active_status = "UPDATE tblclient SET active_status = '$active_status' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_active_status)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD Client_type 
if(isset($_POST['edit_client_type'])){
  //get form data
  $client_type = mysqli_real_escape_string($conn, $_POST['client_type']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_client_type = "UPDATE tblclient SET client_type = '$client_type' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_client_type)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD garbage 
if(isset($_POST['edit_garbage'])){
  //get form data
  $garbage = mysqli_real_escape_string($conn, $_POST['garbage']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_garbage = "UPDATE tblclient SET garbage = '$garbage' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_garbage)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD plants 
if(isset($_POST['edit_plants'])){
  //get form data
  $plants = mysqli_real_escape_string($conn, $_POST['plants']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_plants = "UPDATE tblclient SET plants = '$plants' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_plants)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}
//EDIT FIELD mail 
if(isset($_POST['edit_mail'])){
  //get form data
  $mail = mysqli_real_escape_string($conn, $_POST['mail']);
  //QUERY UPDATE valid_quoteMENT
  $query_update_mail = "UPDATE tblclient SET mail = '$mail' WHERE client_id = '$id'";
  //SUBMIT QUERY AND REDIRECT TO PAGE
  if(mysqli_query($conn, $query_update_mail)){
} else {
    echo 'Error: '.mysqli_error($conn);
}
}


  //Get data from prodogmom

  //GET ADDITIONAL INFO QUERY
  //Get data from testpet
  $new_query = "SELECT * FROM tbladditional WHERE tbladditional.client_id = '$id'";
  $new_result = mysqli_query($conn, $new_query);


  //create dog name query
  $dog_query = "SELECT * FROM tblpet WHERE client_id = '$id'";
  $dog_result = mysqli_query($conn, $dog_query);
  $row = mysqli_fetch_all($dog_result, MYSQLI_ASSOC);
  mysqli_free_result($dog_result);

  //create query
  $client_query = "SELECT tblclient.client_id, first_name, last_name, client_type, phone, address, city, state, zip, key_location, plants, garbage, mail, house_code, wifi_network, wifi_password, email, emergency_contact_name, emergency_contact_number, valid_quote, active_status, tblpet.pet_id, tblpet.name, tblpet.breed
  FROM tblclient
  INNER JOIN tblpet
  ON tblclient.client_id = tblpet.client_id
  WHERE tblclient.client_id = '$id'";
  // Get result
  $result = mysqli_query($conn, $client_query);
  // Fetch Data
  //$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $post = mysqli_fetch_assoc($result);
  //var_dump($posts);
  // Free Result
  mysqli_free_result($result);

  //<?php foreach($posts as $post) :
   //<?php endforeach; 
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Page</title>
    <link rel="stylesheet" href="../clients.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
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

              <small>
              <main>
              <div class="container-fluid">
                <!-- Begin EDIT FIRST Name -->
                <div class="row h-100 name-display">
                  <div class="col-sm-2 hidden">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_first_name">Edit First Name</button>
                      <div class="modal" id="edit_first_name">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit First Name</h2>
                                <label>First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_first_name">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                  <!-- BEGIN DISPLAY NAME -->
                    <div class="col-md-8 align-self-center">
                      <h1><?php echo $post['first_name']; ?>&nbsp;<?php echo $post['last_name']; ?></h1>  
                    </div>
                  <!-- BEGIN DISPLAY EDIT LAST NAME -->
                  <div class="col-sm-2 hidden">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_last_name">Edit Last Name</button>
                      <div class="modal" id="edit_last_name">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Last Name</h2>
                                <label>Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_last_name">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                  
                  </div>
                <!-- END DISPLAY NAME ROW-->

                <!-- START DOGS -->
                <div class="row h-100">
                  <div class="col">
                    <div class="list-group-item dog-list">
                      <li><h4>Dogs</h4></li>
                      <?php foreach($row as $rows) : ?>
                          <ul class="list-group-item random"><h6><?php echo $rows['name']; ?></h6><img src="<?php echo $rows['img_path']; ?>" onerror="this.style.display='none'" style="border-radius: 50%; object-fit: cover;" height="70px" width="60px"><br><br><a href="dog.php?name=<?php echo $rows['name']; ?>&pet_id=<?php echo $rows['pet_id']; ?>" class="btn btn-secondary btn-sm" style="float:right;">Profile</a></ul>
                      <?php endforeach; ?>
                      </div>
                    </div>
                </div>

                <!-- END DOGS -->
                <!-- ADD NEW DOG -->
                <div class="row h-100">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                  <a href="plus_dog.php?client_id=<?php echo $id; ?>" class="btn btn-dark btn-sm btn-block"><i class="fas fa-plus-circle"></i> Add New Dog</a>
                </div>
                <div class="col-md-5"></div>
                </div>
                <!-- Start Client Type -->
                <div class="row h-100">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <li>Client Type</li>
                  <div class="row h-100">
                    <div class="col-sm-10">
                      <ul class="list-group-item"><?php echo $post['client_type']; ?></ul>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_client_type">Edit</button>
                        <div class="modal" id="edit_client_type">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                  <h2>Client Type</h2>
                                  <label>Client Type:</label>
                                    <select name="client_type" class="form-control">
                                      <option value="Customer">Customer</option>
                                      <option value="Client">Client</option>
                                      <option value="Advocate">Advocate</option>
                                    </select>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"class="btn btn-primary"  value="submit" name="edit_client_type">Submit</button>      
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4"></div>
                </div>
                <!-- START ADDRESS -->
                  <div class="row h-100">
                  <div class="col-md-2"></div>
                    <div class="col-md-4">


                      <li>Address</li>
                      <div class="row h-100">
                        <div class="col-sm-10">
                          <ul class="list-group-item"><?php echo $post['address']; ?></ul>
                        </div>
                        <div class="col-sm-2">
                          <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_address">Edit</button>
                            <div class="modal" id="edit_address">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                      <h2>Edit Address</h2>
                                      <label>Address:</label>
                                      <input type="text" class="form-control" id="address" name="address">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit"class="btn btn-primary"  value="submit" name="edit_address">Submit</button>      
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </div>
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>

                </div> 
                <div class="col-md-4">
                  <li>City</li>
                  <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['city']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_city">Edit</button>
                    <div class="modal" id="edit_city">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                              <h2>Edit City</h2>
                              <label>City:</label>
                              <input type="text" class="form-control" id="city" name="city">
                          </div>
                          <div class="modal-footer">
                            <button type="submit"class="btn btn-primary"  value="submit" name="edit_city">Submit</button>      
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-2"></div>


                  </div> <!-- END ADDRESS ROW -->

                  <!-- START STATE AND ZIP ROW -->
              <div class="row h-100">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                <li>State</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['state']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_state">Edit</button>
                      <div class="modal" id="edit_state">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit State</h2>
                                <label>State:</label>
                                <input type="text" class="form-control" id="state" name="state">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_state">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
                </div>

                <div class="col-md-3">
                <li>Zip</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['zip']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_zip">Edit</button>
                      <div class="modal" id="edit_zip">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Zip</h2>
                                <label>Zip:</label>
                                <input type="text" class="form-control" id="zip" name="zip">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_zip">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
                </div>
                <div class="col-md-3"></div>
              </div>
                 
                <!-- END STATE AND ZIP ROW -->
              <!-- START PHONE AND EMAIL -->
              <div class="row h-100">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                  <li>Phone</li>
                  <div class="row h-100">
                    <div class="col-sm-10">
                      <ul class="list-group-item"><?php echo $post['phone']; ?></ul>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_phone">Edit</button>
                        <div class="modal" id="edit_phone">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                  <h2>Edit Phone</h2>
                                  <label>Phone:</label>
                                  <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                  <span class="text-muted">Format: 555-555-555</span>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"class="btn btn-primary"  value="submit" name="edit_phone">Submit</button>      
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
                <div class="col-md-3">
                  <li>Email</li>
                  <div class="row h-100">
                    <div class="col-sm-10">
                      <ul class="list-group-item"><?php echo $post['email']; ?></ul>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_email">Edit</button>
                        <div class="modal" id="edit_email">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                  <h2>Edit Email</h2>
                                  <label>Email:</label>
                                  <input type="email" class="form-control" id="email" name="email">
                                  <span class="text-muted">Format: Example@prodogmom.com</span>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"class="btn btn-primary"  value="submit" name="edit_email">Submit</button>      
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
              <!-- END PHONE AND EMAIL -->

              <!-- START EMERGENCY CONTACT AND EMERGENCY NUMBER -->
              <div class="row h-100">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <li>Emergency Contact</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['emergency_contact_name']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_emergency_contact_name">Edit</button>
                      <div class="modal" id="edit_emergency_contact_name">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Emergency Contact Name</h2>
                                <label>Emergency Contact Name:</label>
                                <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_emergency_contact_name">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
              <li>Emergency Contact Number</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['emergency_contact_number']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_emergency_contact_number">Edit</button>
                      <div class="modal" id="edit_emergency_contact_number">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Emergency Contact Number</h2>
                                <label>Emergency Contact Number:</label>
                                <input type="tel" class="form-control" id="emergency_contact_number" name="emergency_contact_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                                  <span class="text-muted">Format: 555-555-555</span>
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_emergency_contact_number">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3"></div>
              </div>
              <!-- END EMERGENCY CONTACT AND EMERGENCY NUMBER -->

              <!-- START WIFI INFORMATION -->
              <div class="row h-100">
              <div class="col-md-3"></div>
              <div class="col-md-3">
              <li>Wifi Network</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['wifi_network']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_wifi_network">Edit</button>
                      <div class="modal" id="edit_wifi_network">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Wifi Network</h2>
                                <label>Wifi Network:</label>
                                <input type="text" class="form-control" id="wifi_network" name="wifi_network">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_wifi_network">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
              <li>Wifi Password</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['wifi_password']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_wifi_password">Edit</button>
                      <div class="modal" id="edit_wifi_password">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Wifi Password</h2>
                                <label>Wifi Password:</label>
                                <input type="text" class="form-control" id="wifi_password" name="wifi_password">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_wifi_password">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3"></div>
              </div>
              <!-- END WIFI INFORMATION -->

              <!-- START HOUSE CODE AND KEY LOCATION -->
              <div class="row h-100">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <li>House Code</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['house_code']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_house_code">Edit</button>
                      <div class="modal" id="edit_house_code">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit House Code</h2>
                                <label>House Code:</label>
                                <input type="text" class="form-control" id="house_code" name="house_code">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_house_code">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <li>Key</li>
                <div class="row h-100">
                <div class="col-sm-10">
                  <ul class="list-group-item"><?php echo $post['key_location']; ?></ul>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_key_location">Edit</button>
                    <div class="modal" id="edit_key_location">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                              <h2>Edit Key</h2>
                              <label>Key:</label>
                                <select name="key_location" class="form-control">
                                  <option value="Keep">Keep</option>
                                  <option value="Return">Return</option>
                                  <option value="Not Applicable">Not Applicable</option>
                                </select>
                          </div>
                          <div class="modal-footer">
                            <button type="submit"class="btn btn-primary"  value="submit" name="edit_key_location">Submit</button>      
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3"></div>
              </div>
              <!-- END HOUSE CODE AND KEY LOCATION -->
              <!-- START GARBAGE PLANTS AND MAIL/NEWSPAPERS -->
              <div class="row h-100">
                <div class="col-md-3"></div>
                <div class="col-md-2">
                <li>Garbage Pickup</li>
                <div class="row h-100">
                  <div class="col-sm-8">
                    <ul class="list-group-item"><?php echo $post['garbage']; ?></ul>
                  </div>
                  <div class="col-sm-4">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_garbage">Edit</button>
                      <div class="modal" id="edit_garbage">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Garbage</h2>
                                <label>Garbage:</label>
                                  <select name="garbage" class="form-control">
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                  </select>
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_garbage">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
                </div>
                <div class="col-md-2">
                  <li>Plants</li>
                  <div class="row h-100">
                    <div class="col-sm-8">
                      <ul class="list-group-item"><?php echo $post['plants']; ?></ul>
                    </div>
                    <div class="col-sm-4">
                      <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_plants">Edit</button>
                        <div class="modal" id="edit_plants">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                  <h2>Edit Plants</h2>
                                  <label>Plants:</label>
                                    <select name="plants" class="form-control">
                                      <option value="Yes">Yes</option>
                                      <option value="No">No</option>
                                    </select>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"class="btn btn-primary"  value="submit" name="edit_plants">Submit</button>      
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-2">
                <li>Mail/Newspaper</li>
                <div class="row h-100">
                  <div class="col-sm-8">
                    <ul class="list-group-item"><?php echo $post['mail']; ?></ul>
                  </div>
                  <div class="col-sm-4">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_mail">Edit</button>
                          <div class="modal" id="edit_mail">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                    <h2>Edit Mail</h2>
                                    <label>Mail:</label>
                                      <select name="mail" class="form-control">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                      </select>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit"class="btn btn-primary"  value="submit" name="edit_mail">Submit</button>      
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div> 
                            </div>
                          </div>
                  </div>
                </div>
                </div>
                <div class="col-md-3"></div>
              </div>
              <!-- END GARBAGE PLANTS AND MAIL/NEWSPAPERS -->
              <!-- BEGIN ACTIVE STATUS AND VALID QUOTE -->
              <div class="row h-100">
              <div class="col-md-3"></div>
              <div class="col-md-3">
                <li>Valid Quote</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['valid_quote']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_valid_quote">Edit</button>
                      <div class="modal" id="edit_valid_quote">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Valid Quote</h2>
                                <label>Valid Quote:</label>
                                <input type="text" class="form-control" id="valid_quote" name="valid_quote">
                            </div>
                            <div class="modal-footer">
                              <button type="submit"class="btn btn-primary"  value="submit" name="edit_valid_quote">Submit</button>      
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <li>Active Status</li>
                <div class="row h-100">
                  <div class="col-sm-10">
                    <ul class="list-group-item"><?php echo $post['active_status']; ?></ul>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_active_status">Edit</button>
                      <div class="modal" id="edit_active_status">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Edit Active Status</h2>
                                <label>Status:</label> <br>
                                <input type="radio" name="active_status" value="Active"> Active <br>
                                <input type="radio" name="active_status" value="Inactive"> Inactive
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" value="submit" name="edit_active_status">Submit</button>       
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3"></div>
              </div>
              <!-- END ACTIVE STATUS AND VALID QUOTE -->
              <h4>Additional Notes</h4>

              
              <div class="row h-100">
              <!-- LOOP ADDITIONAL INFORMATION TABLE -->
              <?php 
                while($new = mysqli_fetch_assoc($new_result)){
                  foreach($new as $col => $val) {
                    if($col != 'client_id' AND $col != 'add_id') {
                      echo
                      '
                      <div class="col-md-3"></div>
                      <div class="col-md-6">
                      <li>'.$col.'</li>
                      <div class="row h-100">
                        <div class="col-sm-10">
                          <ul class="list-group-item">'.$val.'</ul>
                        </div>
                        <div class="col-sm-2">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_'.$col.'">Edit</button>
                        <div class="modal" id="edit_'.$col.'">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="" class="form-group">
                              <h2>Edit '.$col.'</h2> 
                              <label>'.$col.'</label><br>
                              <textarea name="new_'.$col.'" id="new_'.$col.'" cols="45" rows="5"></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" value="submit" name="edit_'.$col.'">Submit</button>                 
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-3"></div>
                        
                      ';
                      if(isset($_POST['edit_'.$col])) {
                        //get data
                        $data = mysqli_real_escape_string($conn, $_POST['new_'.$col]);
                        //update statement
                        $query_update = "UPDATE tbladditional SET $col = '$data' WHERE tbladditional.client_id = '$id'";
                        //Submit Query
                        if(mysqli_query($conn, $query_update)) {
                          echo "<meta http-equiv='refresh' content='0'>";
                        } else {
                          echo 'Error: '.mysqli_error($conn);
                        }
                      }
                    }
                  }
                }
              ?>
              <!-- END LOOP -->
              </div>


              <!-- ADD NEW FIELD -->
              <div class="row h-100">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <button type="button" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#add_new_field"><i class="fas fa-pen"></i>&nbsp;Add New Field</button>
                      <div class="modal" id="add_new_field">
                        <div class="modal-dialog" id="add_new_field">
                          <div class="modal-content">
                            <div class="modal-body">
                              <form method="POST" action="client.php?client_id=<?php echo $post['client_id']; ?>" class="form-group">
                                <h2>Add New Field</h2> <br>
                                <label>Field Name: <div class="text-danger">Do Not Use Spaces</div></label> <br>
                                <input type="text" class="form-control" name="new_field" id="new_field">
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="add_new_field">Submit</button> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
              <div class="col-md-3"></div>
              </div>
              


                    <!-- END ADD NEW FIELD -->
              
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