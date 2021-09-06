<?php
require("admin-header.php");
require("admin-sidebar.php");

$query_comments = "SELECT * FROM comments";
$comments = $db->query($query_comments);

if (isset($_GET["action"]) && isset($_GET["id"])) {
    $action = $_GET["action"];
    $id = $_GET["id"];
    if ($action == "approve") {
        $query = $db->prepare("UPDATE comments SET status='1' WHERE id=:id");
        $query->execute(["id" => $id]);
    } else {

        $query = $db->prepare("DELETE FROM comments WHERE id=:id");
        $query->execute(['id' => $id]);
    }
    header("location: comments.php");
}
?>

<div class="col-9">
    <div class="container">
        <div class="my-4">
            <h2>Comments</h2>
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
                            <?php
                            if ($comment['status']) {
                            ?>
                                <span class="badge bg-success mb-1 p-2" href="#">Approved</span>
                            <?php
                            } else {
                            ?>
                                <a class="btn btn-outline-success mb-1" href="comments.php?action=approve&id=<?php echo $comment["id"] ?>">Approve</a>
                            <?php
                            }
                            ?>
                            <a class="btn btn-outline-danger" href="comments.php?action=delete&id=<?php echo $comment["id"] ?>">Delete</a>
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