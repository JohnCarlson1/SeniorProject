<?php
    require('../config/db.php');


    
    $output = "";
    $for = "";
    $finalOutput = "";
    $numOfCols = 6;
    $rowCount = 0;
    $bootstrapColWidth = 12 / $numOfCols;
    $space = " ";

    if(isset($_POST['dog_search_test'])) {
        $search = mysqli_real_escape_string($conn, $_POST['dog_search_test']);
        $dog_search_query = "
            SELECT first_name, last_name, tblpet.name, tblpet.pet_id, tblpet.img_path
            FROM tblclient
            INNER JOIN tblpet
            ON tblclient.client_id = tblpet.client_id
            WHERE micro_chip_status = 'Yes' AND name LIKE '%".$search."%'
            ORDER BY tblpet.name
        ";
    } else {
        $dog_search_query = "
            SELECT first_name, last_name, tblpet.name, tblpet.pet_id, tblpet.img_path 
            FROM tblclient 
            INNER JOIN tblpet 
            ON tblclient.client_id = tblpet.client_id
            WHERE micro_chip_status = 'Yes' 
            ORDER BY tblpet.name
        ";
    }


    $dog_search_result = mysqli_query($conn, $dog_search_query);
    if(mysqli_num_rows($dog_search_result) > 0){
        while($row = mysqli_fetch_array($dog_search_result)){
        $output .=
        '
        <div class="col-md-'.$bootstrapColWidth.'">
        <div class="card bg-light border-dark mb-3 text-center" style="width:8rem;">
        <img src="'.$row['img_path'].'"onerror="this.style.display= \'none\'" class="card-img-top img-fluid" style="height: 8vw; object-fit: cover;">
        <div class="card-body" style="height: 10vw;">
          <h6 class="card-title"><b>'.$row['name'].'</b></h6>
          <p><b>Owner:</b> </br>'.$row['first_name'].$space.$row['last_name'].' </p>
          <a href="dog.php?name='.$row['name'].'&pet_id='.$row['pet_id'].'" class="btn btn-outline-dark btn-sm d-block">Profile</a>
        </div>
        </div>
        </div>
        ';
        $rowCount++;
        if($rowCount % $numOfCols == 0){ 
            echo '</div><div class="row">';}
        }
        echo $output;
        }
    else {
        echo 'Data Not Found';
    }
?>