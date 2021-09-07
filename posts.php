<?php
require("admin-header.php");
require("admin-sidebar.php");

$query = "SELECT * FROM posts";
$posts = $db->query($query);

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = $db->prepare("DELETE FROM posts WHERE id=:id");
    $query->execute(['id' => $id]);
    header("location: posts.php");
}
?>

<div class="col-9">
    <div class="container">
        <div class="d-flex justify-content-between my-4 me-5">
            <h2>Posts</h2>
            <a class="btn btn-outline-success" href="newpost.php">New Post</a>
        </div>
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($posts as $post) {
                ?>
                    <tr>
                        <td><?php echo $post["id"] ?></td>
                        <td><?php echo $post["title"] ?></td>
                        <td><?php echo $post["author"] ?></td>
                        <td>
                            <a class="btn btn-outline-info" href="editpost.php?id=<?php echo $post["id"] ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="posts.php?id=<?php echo $post["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>