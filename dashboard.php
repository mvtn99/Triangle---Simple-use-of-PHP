<?php
require("admin-header.php");
require("admin-sidebar.php");

if (isset($_GET["action"]) && isset($_GET["entity"]) && isset($_GET["id"])) {
    $entity = $_GET["entity"];
    $action = $_GET["action"];
    $id = $_GET["id"];
    if ($_GET["action"] == "delete") {
        if ($entity == "post") {
            $query = $db->prepare("DELETE FROM posts WHERE id= :id");
        } else if ($entity == "category") {
            $query = $db->prepare("DELETE FROM categories WHERE id= :id");
        } else {
            $query = $db->prepare("DELETE FROM comments WHERE id= :id");
        }
        $query->execute(['id' => $id]);
    } else {
        $query = $db->prepare("UPDATE comments SET status='1' WHERE id= :id");
        $query->execute(["id" => $id]);
    }
    header("location: dashboard.php");
    exit;
}
$query = "SELECT * FROM posts";
$posts = $db->query($query);
$query_comments = "SELECT * FROM comments WHERE status='0'";
$comments = $db->query($query_comments);
$query_categories = "SELECT * FROM categories";
$categories = $db->query($query_categories);

?>
<div class="col-md-9">
    <div class="container">
        <div class="my-5">
            <h1>Dashboard</h1>
        </div>
        <div class="my-4">
            <h2>Latest Posts</h2>
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
                            <a class="btn btn-outline-info" href="editpost.php?post=<?php echo $post["id"] ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="dashboard.php?action=delete&entity=post&id=<?php echo $post["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="my-4">
            <h2>Categories</h2>
        </div>
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $category) {
                ?>
                    <tr>
                        <td><?php echo $category["id"] ?></td>
                        <td><?php echo $category["name"] ?></td>
                        <td>
                            <a class="btn btn-outline-info" href="editcategory.php?post=<?php echo $category["id"] ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="dashboard.php?action=delete&entity=category&id=<?php echo $category["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="my-4">
            <h2>Latest Comments</h2>
        </div>
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($comments as $comment) {
                ?>
                    <tr>
                        <td><?php echo $comment["id"] ?></td>
                        <td><?php echo $comment["name"] ?></td>
                        <td><?php echo $comment["text"] ?></td>
                        <td>
                            <a class="btn btn-outline-info mb-1" href="dashboard.php?action=approve&entity=comment&id=<?php echo $comment["id"] ?>">Approve</a>
                            <a class="btn btn-outline-danger" href="dashboard.php?action=delete&entity=comment&id=<?php echo $comment["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div><br><br><br><br>
</body>

</html>