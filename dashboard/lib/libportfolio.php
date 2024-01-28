<?php

function insert_portfdata($user_id, $img, $desc) {
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");
    
    $query = "INSERT INTO `portfolio` (user_id, image, description) VALUES ('$user_id', '$img', '$desc')";
    mysqli_query($db, $query);

    return (bool)mysqli_affected_rows($db);
}

function get_portfolios() {
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    $storage = [];
    $query = "SELECT * FROM `portfolio`";
    
    while ($data = mysqli_fetch_assoc(mysqli_query($db, $query))) {
        $storage[] = $data;
    }

    return $storage;
}