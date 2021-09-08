<?php
require("admin-header.php");

if (isset($_GET["name"])) {
    $name = htmlspecialchars($_GET["name"]);
    $query = $db->prepare("INSERT INTO categories (name) VALUES (:name)");
    $query->execute(["name" => $name]);
    header("location: categories.php");
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
                <input name="name" type="text" class="form-control" id="cat" aria-describedby="cat" ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>