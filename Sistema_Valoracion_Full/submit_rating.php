<?php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "24ef0a78");

if(isset($_POST["rating_data"])){
    $data = array(
        ':user_name' => $_POST["user_name"],
        ':user_rating' => $_POST["rating_data"],
        ':user_review' => $_POST["user_review"],
        ':datetime' => time()
    );

    $query = "INSERT INTO review_table
    (user_name, user_rating, user_review, datetime)
    VALUES (:user_name, :user_rating, :user_review, :datetime)";

    $stmt = $connect->prepare($query);

    $stmt->execute($data);

    echo "Tu Reseña ha sido publicada perfectamente";
}

?>