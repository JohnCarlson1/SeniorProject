<?php
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


  // get name
  //$id = mysqli_real_escape_string($conn, $_GET['name']);
  // get PET_ID
  $pet_id = mysqli_real_escape_string($conn, $_GET['pet_id']);

  // Submit picture of pet 
  if(isset($_POST['submit_picture'])){
    $name = $_FILES['img_dog']['name'];  
    $temp_name = $_FILES['img_dog']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = 'C:/xampp/htdocs/prodogmom/MyUploadImages/';
            $db_location = '../MyUploadImages/';
            if(move_uploaded_file($temp_name, $location.$name)){
                //echo 'File uploaded successfully';
                //echo $location.$name;
                $target_path = $db_location.$name;
                correctImageOrientation($target_path);
                $queryInsertImgFile = "UPDATE tblpet SET img_path = '$target_path' WHERE pet_id = '$pet_id'";
                if(mysqli_query($conn, $queryInsertImgFile)){  
                } else {
                    echo 'Error: '.mysqli_error($conn);
                }
            }
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
  }

  
  //ADD NEW FIELD
  if(isset($_POST['add_new_field'])){
    //get form data
    $field_size = 500;
    $new_field = mysqli_real_escape_string($conn, $_POST['new_field']);
    $trimmed_new_field = trim($new_field);
    //QUERY UPDATE STATEMENT
    $query_add_field = "ALTER TABLE tblcare ADD $trimmed_new_field VARCHAR(500) NULL AFTER Additional";
    if(mysqli_query($conn, $query_add_field)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }






  // EDIT FIELDS



  //EDIT FIELD BREED
  if(isset($_POST['edit_breed'])){
    //get form data
    $breed = mysqli_real_escape_string($conn, $_POST['breed']);
    //QUERY UPDATE STATEMENT
    $query_update_breed = "UPDATE tblpet SET breed = '$breed' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_breed)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD GENDER
  if(isset($_POST['edit_gender'])){
    //get form data
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    //QUERY UPDATE STATEMENT
    $query_update_gender = "UPDATE tblpet SET gender= '$gender' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_gender)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD AGE
  if(isset($_POST['edit_birthdate'])){
    //get form data
    $age = mysqli_real_escape_string($conn, $_POST['birthdate']);
    //QUERY UPDATE STATEMENT
    $query_update_age = "UPDATE tblpet SET birthdate= '$age' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_age)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD FIX STATUS
  if(isset($_POST['edit_fix_status'])){
    //get form data
    $fix_status = mysqli_real_escape_string($conn, $_POST['fix_status']);
    //QUERY UPDATE STATEMENT
    $query_update_fix_status = "UPDATE tblpet SET fix_status= '$fix_status' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_fix_status)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD MICROCHIP STATUS
  if(isset($_POST['edit_microchip'])){
    //get form data
    $micro_chip_status = mysqli_real_escape_string($conn, $_POST['micro_chip_status']);
    //QUERY UPDATE STATEMENT
    $query_update_micro_chip_status = "UPDATE tblpet SET micro_chip_status= '$micro_chip_status' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_micro_chip_status)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD MICROCHIP STATUS
  if(isset($_POST['edit_house_trained_status'])){
    //get form data
    $house_trained_status = mysqli_real_escape_string($conn, $_POST['house_trained_status']);
    //QUERY UPDATE STATEMENT
    $query_update_house_trained_status = "UPDATE tblpet SET house_trained_status= '$house_trained_status' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_house_trained_status)){
  } else {
      echo 'Error: '.mysqli_error($conn);
  }
  }
  //EDIT FIELD PERSONALITY NOTES
  if(isset($_POST['edit_personality_notes'])){
    //get form data
    $personality_notes = mysqli_real_escape_string($conn, $_POST['personality']);
    //QUERY UPDATE STATEMENT
    $query_update_personality = "UPDATE tblpet SET personality_notes= '$personality_notes' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_personality)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD KENNEL NOTES
  if(isset($_POST['edit_kennel_notes'])){
    //get form data
    $kennel_notes = mysqli_real_escape_string($conn, $_POST['kennel']);
    //QUERY UPDATE STATEMENT
    $query_update_kennel = "UPDATE tblpet SET kennel_notes= '$kennel_notes' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_kennel)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD DAILY ROUTINE NOTES
  if(isset($_POST['edit_daily_routine_notes'])){
    //get form data
    $daily_routine_notes = mysqli_real_escape_string($conn, $_POST['daily_routine']);
    //QUERY UPDATE STATEMENT
    $query_update_daily_routine = "UPDATE tblpet SET daily_routine_notes= '$daily_routine_notes' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_daily_routine)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD FEEDING INSTRUCTIONS
  if(isset($_POST['edit_feeding_instructions'])){
    //get form data
    $feeding_instructions = mysqli_real_escape_string($conn, $_POST['feeding_instructions']);
    //QUERY UPDATE STATEMENT
    $query_update_feeding_instructions = "UPDATE tblpet SET feeding_instructions= '$feeding_instructions' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_feeding_instructions)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD MEDICAL NOTES
  if(isset($_POST['edit_medical_notes'])){
    //get form data
    $medical_notes = mysqli_real_escape_string($conn, $_POST['medical']);
    //QUERY UPDATE STATEMENT
    $query_update_medical = "UPDATE tblpet SET medical_notes= '$medical_notes' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_medical)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD WALKING INSTRUCTIONS
  if(isset($_POST['edit_walking_instructions'])){
    //get form data
    $walking_instructions = mysqli_real_escape_string($conn, $_POST['walking_instructions']);
    //QUERY UPDATE STATEMENT
    $query_update_walking_instructions = "UPDATE tblpet SET walking_instructions= '$walking_instructions' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_walking_instructions)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD LEASH LOCATION
  if(isset($_POST['edit_leash_location'])){
    //get form data
    $leash_location = mysqli_real_escape_string($conn, $_POST['leash_location']);
    //QUERY UPDATE STATEMENT
    $query_update_leash_location = "UPDATE tblpet SET leash_location= '$leash_location' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_leash_location)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD POOP BAG LOCATION
  if(isset($_POST['edit_poop_bag_location'])){
    //get form data
    $poop_bag_location = mysqli_real_escape_string($conn, $_POST['poop_bag_location']);
    //QUERY UPDATE STATEMENT
    $query_update_poop_bag_location = "UPDATE tblpet SET poop_bag_location= '$poop_bag_location' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_poop_bag_location)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD DOG TOWEL LOCATION
  if(isset($_POST['edit_dog_towel_location'])){
    //get form data
    $dog_towel_location = mysqli_real_escape_string($conn, $_POST['dog_towel_location']);
    //QUERY UPDATE STATEMENT
    $query_update_dog_towel_location = "UPDATE tblpet SET dog_towel_location= '$dog_towel_location' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_dog_towel_location)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD COLLAR LOCATION
  if(isset($_POST['edit_collar_location'])){
    //get form data
    $collar_location = mysqli_real_escape_string($conn, $_POST['collar_location']);
    //QUERY UPDATE STATEMENT
    $query_update_collar_location = "UPDATE tblpet SET collar_location= '$collar_location' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_collar_location)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD name
  if(isset($_POST['edit_name'])){
    //get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    //QUERY UPDATE STATEMENT
    $query_update_name = "UPDATE tblpet SET name= '$name' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_name)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD threshold
  if(isset($_POST['edit_threshold'])){
    //get form data
    $threshold = mysqli_real_escape_string($conn, $_POST['threshold']);
    //QUERY UPDATE STATEMENT
    $query_update_threshold = "UPDATE tblpet SET threshold= '$threshold' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_threshold)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }
  //EDIT FIELD name
  if(isset($_POST['edit_commands'])){
    //get form data
    $command = $_POST['command'];
    $command = json_encode($command);
    //QUERY UPDATE STATEMENT
    $query_update_commands = "UPDATE tblpet SET commands= '$command' WHERE pet_id = '$pet_id'";
    //SUBMIT QUERY AND REDIRECT TO PAGE
    if(mysqli_query($conn, $query_update_commands)){
    } else {
      echo 'Error: '.mysqli_error($conn);
    }
  }




  //Get data from testpet
  $new_query = "SELECT * FROM tblcare WHERE tblcare.pet_id = '$pet_id'";
  $new_result = mysqli_query($conn, $new_query);

  //Commands Query
  $command_query = "SELECT commands FROM tblpet WHERE pet_id = '$pet_id'";
  $command_result = mysqli_query($conn, $command_query);
  $row = mysqli_fetch_all($command_result, MYSQLI_ASSOC);
  mysqli_free_result($command_result);

  //create query
  $query = "SELECT first_name, last_name, tblpet.client_id, tblpet.pet_id, tblpet.name, tblpet.breed, tblpet.gender, tblpet.micro_chip_status, tblpet.house_trained_status, tblpet.birthdate, tblpet.fix_status, tblpet.threshold, tblpet.commands,  tblpet.img_path, tblpet.personality_notes, tblpet.kennel_notes, tblpet.walking_instructions, tblpet.leash_location, tblpet.poop_bag_location, tblpet.dog_towel_location, tblpet.collar_location, tblpet.feeding_instructions, tblpet.medical_notes, tblpet.daily_routine_notes, tblpet.pet_id
  FROM tblclient
  INNER JOIN tblpet
  ON tblclient.client_id = tblpet.client_id
  WHERE tblpet.pet_id = '$pet_id'";
  // Get result
  $result = mysqli_query($conn, $query);
  // Fetch Data
  //$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $post = mysqli_fetch_assoc($result);
  //var_dump($posts);
  // Free Result
  mysqli_free_result($result);
  // Close connection
  //<?php foreach($posts as $post) :
   //<?php endforeach; 
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dog Profile</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../dogs.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../dogs.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../config/error_picture.js"></script>
    <style>
        body,
        html {
            /* height: 100vh; */
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
                <!-- START DOG PICTURE AND UPLOAD -->

              <div class="row h1-100">
                <div class="col-md-3 align-self-start">
                  <div class="profile-border">
                    <h1><?php echo $post['name']; ?></h1>
                      <ul class="pet-img">
                        <img src="<?php echo $post['img_path']; ?>" onerror="this.style.display='none'" alt="Dog"  style="object-fit:cover;">
                      </ul>
                      <button type="button" class="btn btn-outline-dark btn-sm pro" id="random" data-toggle="modal" data-target="#edit_name">Edit Name</button>
                              <div class="modal" id="edit_name">
                              <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                                    <h2>Edit Name</h2>
                                    <label>Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="modal-footer">
                                  <button type="submit"class="btn btn-primary"  value="submit" name="edit_name">Submit</button>      
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div> 
                              </div>
                              </div>
                      <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" enctype="multipart/form-data">
                        <input type="file" class="form-control-file" name="img_dog" title="&nbsp;"/>
                        <button type="submit" value="submit" name="submit_picture" class="btn btn-outline-dark btn-sm pro" id="pic-submit">Submit Picture</button>
                      </form>                         
                    </div>


                </div>  
                

                <!-- START DOG INFO -->
                  <div class="col-md-9 align-self-center">



                    <div class="list-group" style="text-align-center">
                    <li>Owner</li>
                    <ul class="list-group-item owner"><?php echo $post['first_name']; ?>&nbsp;<?php echo $post['last_name']; ?>
                    <a href="client.php?last_name=<?php echo $post['last_name']; ?>&client_id=<?php echo $post['client_id']; ?>" class="btn btn-secondary btn-sm" style="float:right;">Go to Owner</a>
                    </ul>
                    
                    
                    <div class="row h-100 layers">
                      <div class="col">
                          <!-- START BREED -->
                                              
                                              
                                              
                          <li>Breed</li>
                                              <div class="row h-100">
                                              <div class="col-sm-8">
                                                <ul class="list-group-item"><?php echo $post['breed']; ?></ul>
                                              </div>
                                              <div class="col-sm-3 pro">
                                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_breed">Edit</button>
                                                <div class="modal" id="edit_breed">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body">
                                                    <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                                                      <h2>Edit Breed</h2>
                                                      <label>Breed:</label>
                                                      <input type="text" class="form-control" id="breed" name="breed">
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit"class="btn btn-primary"  value="submit" name="edit_breed">Submit</button>      
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                  </div>
                                                </div> 
                                                </div>
                                                </div>
                                                </div>
                                                </div>


                    <!-- END BREED -->
                      </div>
                      <div class="col">
                          <!-- START GENDER -->



                          <li>Gender</li>
                                              <div class="row h-100">
                                              <div class="col-sm-8">
                                                <ul class="list-group-item"><?php echo $post['gender']; ?></ul>
                                              </div>
                                              <div class="col-sm-3 pro">
                                                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_gender">Edit</button>
                                                <div class="modal" id="edit_gender">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body">
                                                    <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                                                      <h2>Edit Gender</h2>
                                                      <label>Gender:</label> <br>
                                                      <input type="radio" name="gender" value="Male"> Male <br>
                                                      <input type="radio" name="gender" value="Female"> Female
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" value="submit" name="edit_gender">Submit</button>       
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                  </div>
                                              </div>
                                              </div> 
                                              </div>
                                              </div>
                                              </div>


                  <!-- END GENDER -->
                      </div>
                      <div class="col">
                        <!-- STAR BIRTHDATE -->


                        <li>Birthdate</li>
                                            <div class="row h-100">
                                              <div class="col-sm-8">
                                                <ul class="list-group-item"><?php echo $post['birthdate']; ?></ul>
                                              </div>
                                              <div class="col-sm-3 pro">
                                                  <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_age">Edit</button>
                                                  <div class="modal" id="edit_age">
                                                  <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-body">
                                                      <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                                                        <h2>Edit Birthdate</h2>
                                                        <label>Birthdate:</label>
                                                        <input type="date" class="form-control" id="age" name="birthdate">
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="submit"class="btn btn-primary"  value="submit" name="edit_birthdate">Submit</button>    
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div> 
                                                  </div>
                                                  </div>
                                              </div>
                                            </div>
                    
                    
                    
                    


                    <!-- END BIRTHDATE -->
                      </div>
                    </div>
                    
                    



                    <div class="row h-100 layers">
                      <div class="col">
                        <!-- START SPAYED/NEUTERED -->


                    <li>Spayed/Neutered</li>
                    <div class="row h-100">
                      <div class="col-sm-8">
                        <ul class="list-group-item"><?php echo $post['fix_status']; ?></ul>
                      </div>
                      <div class="col-sm-3 pro">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_fix_status">Edit</button>
                        <div class="modal" id="edit_fix_status">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Fix Status</h2>
                              <label>Spayed/Neutered:</label> <br>
                              <input type="radio" name="fix_status" value="Yes"> Yes <br>
                              <input type="radio" name="fix_status" value="No"> No
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_fix_status">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    


                    <!-- END SPAYED/NEUTERED -->
                      </div>
                      <div class="col">
                        <!-- START MICRO-CHIP -->

                    <li>Micro-chip</li>
                    <div class="row h-100">
                      <div class="col-sm-8">
                        <ul class="list-group-item"><?php echo $post['micro_chip_status']; ?></ul>    
                      </div>
                      <div class="col-sm-3 pro">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_microchip">Edit</button>
                        <div class="modal" id="edit_microchip">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Micro-Chip Status</h2>
                              <label>Micro-Chip:</label> <br>
                              <input type="radio" name="micro_chip_status" value="Yes"> Yes <br>
                              <input type="radio" name="micro_chip_status" value="No"> No
                          </div>
                          <div class="modal-footer">
                            <button type="submit"class="btn btn-primary"  value="submit" name="edit_microchip">Submit</button>          
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    <!-- END MICROCHIP -->
                      </div>
                      </div>

                      <div class="row h-100">
                      <div class="col">
                        <!-- START HOUSE TRAINED -->


                    <li>House Trained</li>
                    <div class="row h-100">
                      <div class="col-sm-8">
                        <ul class="list-group-item"><?php echo $post['house_trained_status']; ?></ul>
                      </div>
                      <div class="col-sm-3 pro">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_house_trained_status">Edit</button>
                        <div class="modal" id="edit_house_trained_status">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit House Trained Status</h2>
                              <label>House-Trained:</label> <br>
                              <input type="radio" name="house_trained_status" value="Yes"> Yes <br>
                              <input type="radio" name="house_trained_status" value="No"> No
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_house_trained_status">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                                        


                    <!-- END HOUSETRAINED -->
                      </div>
                      <div class="col">
                        <!-- START Threshold -->


                    <li>Threshold(hrs)</li>
                    <div class="row h-100">
                      <div class="col-sm-8">
                        <ul class="list-group-item"><?php echo $post['threshold']; ?></ul>
                      </div>
                      <div class="col-sm-3 pro">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_threshold">Edit</button>
                        <div class="modal" id="edit_threshold">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Threshold(hrs)</h2>
                              <label>Threshold:</label> <br>
                              <select name="threshold" class="form-control">
                                <option value="1">1 hour</option>
                                <option value="2">2 hours</option>
                                <option value="3">3 hours</option>
                                <option value="4">4 hours</option>
                                <option value="5">5 hours</option>
                                <option value="6">6 hours</option>
                                <option value="7">7 hours</option>
                                <option value="8">8 hours</option>
                                <option value="9">9 hours</option>
                                <option value="10">10+ hours</option>
                              </select>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_threshold">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                                        


                    <!-- END Threshold -->
                      </div>
                    </div>
                    
                     



                    <!--START COMMANDS  -->
                      <li>Commands</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                      
                      
                            
                                <ul class="list-group-item random"><b><?php echo $post['commands']; ?></b></ul>
                            
                          


                      </div>
                      <div class="col-sm-1">
                          <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_commands">Edit</button>
                            <div class="modal" id="edit_commands">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                                <div class="center">
                                  <h2>Edit Commands</h2>
                                  <label>Commands:</label> <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Sit"> Sit <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Down"> Down <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Stay"> Stay <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Heel"> Heel <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Wait"> Wait <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Come"> Come <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Off"> Off <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Take It/Drop It"> Take It/Drop It <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="Leave it"> Leave it <br>
                                  <input class="form-check-input" type="checkbox" name="command[]" id="command" value="No"> No <br>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" value="submit" name="edit_commands">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </div> 
                            </div>
                            </div>
                        </div>
                        </div>
                     <!-- FINISH COMMANDS -->
                    <!-- START PERSONALITY NOTES -->

                    <li>Personality Notes</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['personality_notes']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_personality_notes">Edit</button>
                        <div class="modal" id="edit_personality_notes">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Personality Notes</h2>
                              <label>Personality:</label> <br>
                              <textarea name="personality" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_personality_notes">Submit</button>                  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    

                        
                    
                    <!-- END PERSONALITY NOTES -->
                    

                    <!-- START KENNEL NOTES -->
                    
                  
                    <li>Kennel Notes</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['kennel_notes']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_kennel_notes">Edit</button>
                        <div class="modal" id="edit_kennel_notes">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Kennel Notes</h2>
                              <label>Kennel Notes:</label> <br>
                              <textarea name="kennel" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_kennel_notes">Submit</button>             
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                   
                    
                    
                    <!-- END MODAL -->


                    <!-- END KENNEL NOTES -->

                    <!-- START DAILY ROUTINE -->


                    <li>Daily Routine</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['daily_routine_notes']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_daily_routine_notes">Edit</button>
                        <div class="modal" id="edit_daily_routine_notes">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Daily Routine Notes</h2>
                              <label>Daily Routine:</label> <br>
                              <textarea name="daily_routine" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_daily_routine_notes">Submit</button>                   
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END DAILY ROUTINE -->


                    <!-- START FEEDING INSTRUCTIONS -->
                    <li>Feeding Instructions</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['feeding_instructions']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_feeding_instructions">Edit</button>
                        <div class="modal" id="edit_feeding_instructions">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Feeding Instructions</h2>
                              <label>Feeding Instructions:</label> <br>
                              <textarea name="feeding_instructions" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_feeding_instructions">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                   
                    
                    <!-- END FEEDING INSTRUCTION -->


                    <!-- START MEDICAL -->
                    <li>Medical Notes</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['medical_notes']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_medical_notes">Edit</button>
                        <div class="modal" id="edit_medical_notes">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Medical Notes</h2>
                              <label>Medical:</label> <br>
                              <textarea name="medical" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit"class="btn btn-primary"  value="submit" name="edit_medical_notes">Submit</button>              
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END MEDICAL -->


                    <!-- START WALKING -->

                    <li>Walking Instructions</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['walking_instructions']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_walking_instructions">Edit</button>
                        <div class="modal" id="edit_walking_instructions">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Walking Instructions</h2>
                              <label>Walking Instructions:</label> <br>
                              <textarea name="walking_instructions" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_walking_instructions">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END WALKING -->



                    <!-- START LEASH -->

                    <li>Leash Location</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['leash_location']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_leash_location">Edit</button>
                        <div class="modal" id="edit_leash_location">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Leash Location</h2>
                              <label>Leash Location:</label> <br>
                              <textarea name="leash_location" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_leash_location">Submit</button>               
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END LEASH -->


                    <!-- START POOP -->

                    <li>Poop Bag Location</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['poop_bag_location']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_poop_bag_location">Edit</button>
                        <div class="modal" id="edit_poop_bag_location">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Poop Bag Location</h2>
                              <label>Poop Bag Location:</label> <br>
                              <textarea name="poop_bag_location" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_poop_bag_location">Submit</button>                  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END POOP -->


                    <!-- START DOG TOWEL -->
                    <li>Dog Towel Location</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['dog_towel_location']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_dog_towel_location">Edit</button>
                        <div class="modal" id="edit_dog_towel_location">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Dog Towel Location</h2>
                              <label>Dog Towel Location:</label> <br>
                              <textarea name="dog_towel_location" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_dog_towel_location">Submit</button>                   
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END DOG TOWEL -->



                    <!-- START COLLAR -->

                    <li>Collar Location</li>
                    <div class="row h-100">
                      <div class="col-sm-11">
                        <ul class="list-group-item"><?php echo $post['collar_location']; ?></ul>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#edit_collar_location">Edit</button>
                        <div class="modal" id="edit_collar_location">
                        <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
                              <h2>Edit Collar Location</h2>
                              <label>Collar Location:</label> <br>
                              <textarea name="collar_location" cols="45" rows="5"></textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit" name="edit_collar_location">Submit</button>                
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div> 
                        </div>
                        </div>
                      </div>
                    </div>
                    
                    
                    
                    
                    <!-- END COLLAR -->

                    <!-- START NEW FIELD LOOP -->
                    <?php
                      while($new = mysqli_fetch_assoc($new_result)){
                        foreach ($new as $col => $val) {
                          if($col != 'care_id' AND $col != 'pet_id') {
                            echo 
                            '
                            <li>'.$col.'</li>
                            <div class="row h-100">
                              <div class="col-sm-11">
                                <ul class="list-group-item">'.$val.'</ul>
                              </div>
                            <div class="col-sm-1">
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
                            ';
                            if(isset($_POST['edit_'.$col])){
                              //get data
                              $data = mysqli_real_escape_string($conn, $_POST['new_'.$col]);
                              //Update statement
                              $query_update = "UPDATE tblcare SET $col = '$data' WHERE tblcare.pet_id = '$pet_id'";
                              //SUBMIT QUERY
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

                    <!-- END NEW FIELD LOOP -->
                    
                    <!-- ADD NEW FIELD -->
                    
                    <button type="button" class="btn btn-dark btn-sm btn-block" data-toggle="modal" data-target="#add_new_field"><i class="fas fa-pen"></i>&nbsp;Add New Field</button>
                    <div class="modal" id="add_new_field">
                      <div class="modal-dialog" id="add_new_field">
                        <div class="modal-content">
                          <div class="modal-body">
                            <form method="POST" action="dog.php?pet_id=<?php echo $post['pet_id']; ?>" class="form-group">
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


                    <!-- END ADD NEW FIELD -->



                  </div>
                </div>
                
              </div>
              


                

        </div> </small>
        
        <div class="col-md-1 border-left page-border" style="background-color:#474646""></div>
      </div>
    </div>
    


      
    </div>

  </body>
  </html>