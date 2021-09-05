<?php
require("admin-header.php");
require("admin-sidebar.php");

$query_comments = "SELECT * FROM comments";
$comments = $db->query($query_comments);
?>

<div class="col-md-9">
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
</div>