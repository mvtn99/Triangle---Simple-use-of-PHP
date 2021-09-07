<?php
require("admin-header.php");

if (isset($_GET["err"])) {
?>
    <div class="col text-center">
        <div class="alert alert-danger">
            <?php echo $_GET["err"] ?>
        </div>
    </div>
<?php
}

if (isset($_GET["id"])) {
    $post_id = $_GET["id"];

    $post = select_posts($post_id);

    $categories = select_category();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (trim($_POST["title"]) != "" && trim($_POST["author"]) != "" && trim($_POST["category"]) != "" && trim($_POST["body"]) != "") {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $category_id = $_POST["category"];
        $body = $_POST["body"];

        if (trim($_FILES["image"]["name"]) != "") {
            $img_name = $_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp_name, "./images/posts/$img_name");
            $post_insert = $db->prepare("UPDATE posts SET title=:title, body=:body, author=:author, image=:image, category_id=:category_id WHERE id=:id");
            $post_insert->execute(["title" => $title, "body" => $body, "author" => $author, "image" => $img_name, "category_id" => $category_id, "id" => $post_id]);
        } else {
            $post_insert = $db->prepare("UPDATE posts SET title=:title, body=:body, author=:author, category_id=:category_id WHERE id=:id");
            $post_insert->execute(["title" => $title, "body" => $body, "author" => $author, "category_id" => $category_id, "id" => $post_id]);
        }

        header("location: posts.php");
        exit;
    } else {
        header("location: editpost.php?err=Please fill all the forms&id=$_GET[id]");
        exit;
    }
}



require("admin-sidebar.php");
?>
<div class="col-9">
    <div class="container">
        <div class="my-4">
            <h2>Create New Post</h2>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="my-4">
                <label for="category" class="form-label">Title:</label>
                <input name="title" type="text" class="form-control" id="category" value="<?php echo $post["title"] ?>">
            </div>
            <div class="my-4">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $post["author"] ?>">
            </div>
            <div class="my-4">
                <label for="Select" class="form-label">Select Category:</label>
                <select id="Select" class="form-select" name="category">
                    <option disabled>Select a category</option>
                    <?php
                    foreach ($categories as $category) {
                    ?>
                        <option <?php echo $category["id"] == $post["category_id"] ? "selected" : "" ?> value="<?php echo $category["id"] ?>"><?php echo $category["id"] . "- " . $category["name"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="my-4">
                <label for="body" class="form-label">Write your post:</label>
                <textarea name="body" style="resize: none;" class="form-control h-100" id="body" rows="18"><?php echo $post["body"] ?></textarea>
            </div>
            <img class="img-fluid" src="./images/posts/<?php echo $post["image"] ?>" alt="">
            <div class="my-4">
                <label for="formFile" class="form-label">Upload Image:</label>
                <input name="image" class="form-control" type="file" id="formFile">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
</div>
<br><br>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>