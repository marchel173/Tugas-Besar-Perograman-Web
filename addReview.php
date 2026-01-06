<?php
session_start();
    if(isset($_POST['review']) && isset($_POST['rating'])){
        require_once "php/config.php";
        
        $name = $_POST['userName'];
        $comment = $_POST['review'];
        $rating = $_POST['rating'];
        $idUser = $_POST['idUser'];
        $idVilla = $_POST['idVilla'];
        $sqlInsert = "INSERT INTO review (villa_id, user_id, name, comment, rating) 
                VALUES ($idVilla, $idUser, '$name', '$comment', $rating)";
        mysqli_query($conn, $sqlInsert);

        //update overall rating villa
        $id = $_GET['id'];
        $sql="SELECT * FROM review WHERE villa_id = $id";
        $count=0;
        $tempRating=0;
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result)){
            $tempRating += $row['rating'];
            $count +=1;
        }
        $tempRating /= $count;

        $sqlUpdate="UPDATE villa SET rating=$tempRating WHERE villa_id=$id";
        mysqli_query($conn, $sqlUpdate);

        header("Location: showReview.php?id=$id");
        exit;
    }
?>