<?php
    session_start();

    // Create Connection
    $conn = mysqli_connect("localhost", "root", "Happybird11.", "prodogmom");
    //check connection
    if(mysqli_connect_errno()){
        //connection failed
        echo 'Failed to connect to MySql '. mysqli_connect_errno();
    }

    //Declare variables
    $username = "";
    $email = "";
    $user_type = "";
    $first_name = "";
    $last_name = "";
    $phone = "";
    $errors = array();

    //Call function if new_user_submit button is clicked
    if(isset($_POST['new_user_submit'])){
        register();
    }
    //Call login function is login button is clicked
    if(isset($_POST['login_btn'])){
        login();
    }
    //Login function
    function login(){
        global $conn, $username, $errors;

        //grab from values
        $username = e($_POST['username']);
        $password = e($_POST['password']);

        //validation
        if(empty($username)){
            array_push($errors, "Username is required");
        }
        if(empty($password)){
            array_push($errors, "Password is required");
        }

        // attempt login if no errors on form
        if(count($errors) == 0) {
            $password = md5($password);

            $login_query = "SELECT * FROM tblusers WHERE username='$username' AND password='$password' LIMIT 1";
            $results = mysqli_query($conn, $login_query);

            if (mysqli_num_rows($results) == 1) {//user found
                //Check if user is admin or user
                $logged_in_user = mysqli_fetch_assoc($results);
                if($logged_in_user['user_type'] == 'admin') {
                    session_start();
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: admin/index.php');
                } else {
                    session_start();
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success'] = "You are now logged in";
                    header('location: user/index.php');
                }
            } else {
                array_push($errors, "Wrong username/password combination");
            }
        }
    }

    function register(){
        //Call these variables with global keyword to make them available in function
        global $errors, $username, $email, $conn, $user_type, $first_name, $last_name, $phone;

        //Receive all input variable from the form
        //Call e function which is mysqli_real_escape_string (security)
        $username   =   e($_POST['create_username']);
        $password   =   e($_POST['create_password']);
        $user_type  =   e($_POST['new_user_type']);
        $first_name =   e($_POST['create_first_name']);
        $last_name  =   e($_POST['create_last_name']);
        $email      =   e($_POST['create_email']);
        $phone      =   e($_POST['create_phone']);

        //form validation
        if (empty($username)){
            array_push($errors, "Username is required");
        }
        if (empty($password)){
            array_push($errors, "Password is required");
        }
        if (empty($user_type)){
            array_push($errors, "Please select user type");
        }
        if (empty($first_name)){
            array_push($errors, "First name is required");
        }
        if (empty($last_name)){
            array_push($errors, "Last name is required");
        }

        //Register user if no errors in form
        if(count($errors)== 0) {
            $password = md5($password); //encrypt password

            if(isset($_POST['user_type'])){
                $user_type = e($_POST['user_type']);
                $create_new_user_query = "INSERT INTO tblusers (username, user_type, password) VALUES('$username', '$user_type', '$password')";
                $create_new_employee_query = "INSERT INTO tblemployee(first_name, last_name, email, phone, user_id) VALUES('$first_name', '$last_name', '$email', '$phone', (SELECT user_id FROM tblusers WHERE username = '$username'))";
                mysqli_query($conn, $create_new_user_query);
                mysqli_query($conn, $create_new_employee_query);
            } else {
                $create_new_user_query = "INSERT INTO tblusers (username, user_type, password) VALUES('$username', '$user_type', '$password')";
                $create_new_employee_query = "INSERT INTO tblemployee(first_name, last_name, email, phone, user_id) VALUES('$first_name', '$last_name', '$email', '$phone', (SELECT user_id FROM tblusers WHERE username = '$username'))";
                mysqli_query($conn, $create_new_user_query);
                mysqli_query($conn, $create_new_employee_query);
                echo('New User Created');
                header('location: employee_list.php');
            }
        }
    }
    //return user array from their ID
    function getUserById($user_id){
        global $conn;
        $id_query = "SELECT * FROM tblusers WHERE id=" . $user_id;
        $result = mysqli_query($conn, $id_query);
        
        $user = mysqli_fetch_assoc($result);
        return($user);
    }
    //escape string
    function e($val){
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
    }

    function display_error(){
        global $errors;
        
        if(count($errors) > 0){
            foreach ($errors as $error){
                echo $error .'<br>';
            }
        }
    }

    

    function isLoggedIn(){
        if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user') {
            return true;
        } else {
            return false;
        }
    }
    function isAdmin() {
        if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }
    //Logout user
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location: security.php');
    }
?>