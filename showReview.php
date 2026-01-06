<?php
    require_once "php/config.php";
    $id = $_GET['id'];

    $sql="SELECT * FROM review
    JOIN user ON review.user_id = user.id
    WHERE review.villa_id = $id
    ORDER BY review.id DESC";

    $result = mysqli_query($conn,$sql);
    echo '<h4>Reviews : </h4>';
    while($row = mysqli_fetch_array($result)){
    echo '<div class="testimonial-item bg-light rounded p-3">
            <div class="bg-white border rounded p-4">
                <p>'.$row['comment'].'</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/'.$row['pic_profile'].'" style="width: 45px; height: 45px;">
                    <div class="ps-3">
                        <h6 class="fw-bold mb-1">'.$row['username'].'</h6>
                        <small> &#9733; '.$row['rating'].'</small>
                    </div>
                </div>
            </div>
        </div>';
    }
?>