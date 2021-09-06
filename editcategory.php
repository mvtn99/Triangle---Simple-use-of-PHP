<?php
require("admin-header.php");
require("admin-sidebar.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query_category = "SELECT * FROM categories WHERE id=$id";
    $category = $db->query($query_category)->fetch();
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
        $query = $db->prepare("UPDATE categories SET name= :name WHERE id= :id");
        $query->execute(["name" => $name, "id" => $id]);
        header("location: categories.php");
        exit;
    }
} else {
    exit;
}
?>
<div class="col-9">
    <div class="container">
        <div class="my-4">
            <h2>Edit Category</h2>
        </div>
        <form>
            <div class="mb-3">
                <label for="cat" class="form-label">Category Name</label>
                <input name="name" type="text" class="form-control" id="cat" aria-describedby="cat" value="<?php echo $category["name"] ?>">
                <input type="hidden" value="<?php echo $id ?>" name="id">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>