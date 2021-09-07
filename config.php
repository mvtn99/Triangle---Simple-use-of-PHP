<?php
if (!isset($_SESSION)) {
    session_start();
}
$db = new PDO("mysql:host=localhost;dbname=triangle;charset=utf8", "root", "");
