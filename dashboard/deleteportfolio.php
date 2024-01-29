<?php
session_start();

include_once "lib/libportfolio.php";

$res = delete_portfolio($_GET["por_id"]);

header("Location:portfolios_management.php");