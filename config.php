<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$mysqli = new mysqli("localhost", "root", "", "store");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} ?>