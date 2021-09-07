<?php
require("config.php");
function check_login()
{
    if (!isset($_SESSION["email"])) {
        header("location: login.php?err=You Must Login First");
        exit;
    }
}

function select_posts($id = 0, $category = 0)
{
    if ($id) {
        $query_post = "SELECT * FROM posts WHERE id=$id";
        $post = $db->query($query_post)->fetch();
    } else if ($category) {
        $query = "SELECT * FROM posts WHERE category_id=$category";
        $post = $db->query($query);
    } else {
        $query_post = "SELECT * FROM posts";
        $post = $db->query($query_post);
    }
    return $post;
}
