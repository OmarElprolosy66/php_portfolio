<?php

function add_user($name, $email, $password) {
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");
    
    $query = "INSERT INTO `user` (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($db, $query);

    return (bool)mysqli_affected_rows($db);
}

function login($email, $password) {
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    $query = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    
    $result = mysqli_fetch_assoc(mysqli_query($db, $query));
    
    return $result;
}