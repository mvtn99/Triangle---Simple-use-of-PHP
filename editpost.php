<?php
require("admin-header.php");
require("admin-sidebar.php");

$query_post = "SELECT * FROM post WHERE id=$post_id";
$post = $db->query($query_comments)->fetch();
