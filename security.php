<?php 
    require('config/functions.php');

?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Professional Dog Mom</title>
    <meta name="description" content="Dog Mom">
    <meta name="author" content="IS495 Group One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <style>
        body,
        html {
            height: 100%;
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
                <img src="ProDogMom.jpg" alt="ProDogMom Logo" class="img-fluid mx-auto d-block border-bottom">
                <div class="row d-flex justify-content-center mt-5">
                    <form method="POST" class="form-inline">
                    <?php echo display_error(); ?>
                        <div class="form-group mr-2">
                            <label for="exampleInputEmail1" class="mr-2">Username: </label>
                            <input type="username" class="form-control mr-2" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                            <label for="exampleInputPassword1" class="mr-2">Password: </label>
                            <input type="password" class="form-control mr-2" id="password" name="password" placeholder="Enter Password">
                            <button type="submit" class="btn btn-dark mx-auto d-block" name="login_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2 border-left page-border" style="background-color:#474646">
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