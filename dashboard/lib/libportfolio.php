<?php

function insert_portfdata($user_id, $img, $desc)
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    $query = "INSERT INTO `portfolio` (user_id, image, description) VALUES ('$user_id', '$img', '$desc')";
    mysqli_query($db, $query);

    return (bool) mysqli_affected_rows($db);
}

function get_portfolios()
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $storage = [];
    $query = "SELECT * FROM `portfolio`";

    // Execute the query
    $result = mysqli_query($db, $query);

    if ($result) {
        // Fetch the results
        while ($data = mysqli_fetch_assoc($result)) {
            $storage[] = $data;
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db);
    }

    // Close the connection
    mysqli_close($db);

    return $storage;
}

function get_portfolios_byname()
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $storage = [];
    $query = "SELECT * FROM `user_portfolio`";

    // Execute the query
    $result = mysqli_query($db, $query);

    if ($result) {
        // Fetch the results
        while ($data = mysqli_fetch_assoc($result)) {
            $storage[] = $data;
        }

        // Free the result set
        mysqli_free_result($result);
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db);
    }

    // Close the connection
    mysqli_close($db);

    return $storage;
}

function delete_portfolio($por_id)
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    $query = "DELETE FROM `portfolio` WHERE `id` = '$por_id'";
    mysqli_query($db, $query);

    return (bool) mysqli_affected_rows($db);
}

function get_portfolio_byid($por_id)
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM `portfolio` WHERE `id` = '$por_id'";

    // Execute the query
    $result = mysqli_query($db, $query);

    if ($result) {
        // Fetch the results
        $data = mysqli_fetch_assoc($result);
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($db);
    }

    // Close the connection
    mysqli_close($db);

    return $data;
}

function update_portfolio($id, $img, $desc)
{
    $db = mysqli_connect("127.0.0.1", "root", "", "proone");

    $query = "UPDATE `portfolio` SET  `description` = '$desc'";
    if (!empty($img))
        $query .= ", `image` = '$img'";
    $query .= " WHERE `id` = '$id'";

    mysqli_query($db, $query);

    return (bool) mysqli_affected_rows($db);
}