<?php
require("admin-header.php");
require("admin-sidebar.php");

$query_categories = "SELECT * FROM categories";
$categories = $db->query($query_categories);
?>

<div class="col-md-9">
    <div class="container">
        <div class="d-flex justify-content-between my-4 me-5">
            <h2>Categories</h2>
            <a class="btn btn-outline-success" href="newcategory.php">New Category</a>
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
    </div>
</div>
</div>