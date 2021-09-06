<?php
require("admin-header.php");
require("admin-sidebar.php");

$query_categories = "SELECT * FROM categories";
$categories = $db->query($query_categories);

if (isset($_GET["id"]) && isset($_GET["action"])) {
    $id = $_GET["id"];
    $action = $_GET["action"];
    if ($action == "edit") {
        if (isset($_GET["name"])) {
            $name = $_GET["name"];
            $query = "UPDATE `categories` SET name=$name WHERE id=$id";
            $result = $db->query($query);
            echo $name . $id;
            var_dump($result);
        } else {
?>
            <div class="col">
                <div class="alert alert-success">
                    You must enter a name!!
                </div>
            </div>
<?php
        }
    } else {
        $query = "DELETE FROM categories WHERE id= $id";
        $result = $db->query($query);
        header("location: categories.php");
        exit;
    }
}
?>

<div class="col-9">
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
                    <th> </th>
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
                            <a class="btn btn-outline-info" href="editcategory.php?id=<?php echo $category["id"] ?>">Edit</a>
                            <a class="btn btn-outline-danger" href="categories.php?action=delete&id=<?php echo $category["id"] ?>">Delete</a>
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