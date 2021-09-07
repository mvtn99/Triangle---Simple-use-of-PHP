<?php
require("config.php");
function check_login()
{
    if (!isset($_SESSION["email"])) {
        header("location: login.php?err=You Must Login First");
        exit;
    }
}

function select_posts($id = 0, $category_id = 0)
{
    global $db;
    if ($id) {
        $query_post = "SELECT * FROM posts WHERE id=$id";
        $post = $db->query($query_post)->fetch();
    } else if ($category_id) {
        $query = "SELECT * FROM posts WHERE category_id=$category_id";
        $post = $db->query($query);
    } else {
        $query_post = "SELECT * FROM posts";
        $post = $db->query($query_post);
    }
    return $post;
}

function select_category($id = 0)
{
    global $db;
    if ($id) {
        $query_category = "SELECT * FROM categories WHERE id=$id";
        $category = $db->query($query_category)->fetch();
    } else {
        $query_category = "SELECT * FROM categories";
        $category = $db->query($query_category);
    }
    return $category;
}

function select_comment($id = 0, $post_id = 0)
{
    global $db;
    if ($id) {
        $query_comments = "SELECT * FROM comments WHERE id=$id";
        $comments = $db->query($query_comments)->fetch();
    } else if ($post_id) {
        $query_comments = "SELECT * FROM comments WHERE post_id=$post_id";
        $comments = $db->query($query_comments);
    } else {
        $query_comments = "SELECT * FROM comments";
        $comments = $db->query($query_comments);
    }
    return $comments;
}

function delete_item($id, $type)
{
    global $db;
    if ($type == "post") {
        $query = $db->prepare("DELETE FROM posts WHERE id= :id");
    } else if ($type == "category") {
        $query = $db->prepare("DELETE FROM categories WHERE id= :id");
    } else if ($type == "comment") {
        $query = $db->prepare("DELETE FROM comments WHERE id= :id");
    }
    $query->execute(['id' => $id]);
}


function search($keyword)
{
    global $db;
    $posts = $db->prepare("SELECT * FROM posts WHERE title LIKE :keyword");
    $posts->execute(['keyword' => "%$keyword%"]);
    return $posts;
}
