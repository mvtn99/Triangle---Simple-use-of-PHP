<?php
require("admin-header.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $category = select_category($id);
    if (isset($_GET["name"])) {
        $name = htmlspecialchars($_GET["name"]);
        $query = $db->prepare("UPDATE categories SET name= :name WHERE id= :id");
        $query->execute(["name" => $name, "id" => $id]);
        header("location: categories.php");
        exit;
    }
} else {
    exit;
}
require("admin-sidebar.php");
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