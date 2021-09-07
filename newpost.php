<?php
require("admin-header.php");


$query_categories = "SELECT * FROM categories";
$categories = $db->query($query_categories);
if (isset($_GET["err"])) {
?>
    <div class="col text-center">
        <div class="alert alert-danger">
            <?php echo $_GET["err"] ?>
        </div>
    </div>
    <?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (trim($_POST["title"]) != "" && trim($_POST["author"]) != "" && trim($_POST["category"]) != "" && trim($_POST["body"]) != "" && trim($_FILES["image"]["name"] != "")) {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $category_id = $_POST["category"];
        $body = $_POST["body"];
        $img_name = $_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        if (move_uploaded_file($tmp_name, "./images/posts/$img_name")) {

    ?>
            <div class="col">
                <div class="alert alert-success">
                    File Uploaded!!
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col">
                <div class="alert alert-danger">
                    Uplaod Failed!!
                </div>
            </div>
<?php
        }
        $post_insert = $db->prepare("INSERT INTO posts (title, body, author, image, category_id) VALUES (:title, :body, :author, :image, :category_id)");
        $result = $post_insert->execute(["title" => $title, "body" => $body, "author" => $author, "image" => $img_name, "category_id" => $category_id]);

        header("location: posts.php");
        exit;
    } else {
        header("location: newpost.php?err=Please fill all the forms");
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
                <input name="title" type="text" class="form-control" id="category">

            </div>
            <div class="my-4">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author">
            </div>
            <div class="my-4">
                <label for="Select" class="form-label">Select Category:</label>
                <select id="Select" class="form-select" name="category">
                    <option disabled selected>Select a category</option>
                    <?php
                    foreach ($categories as $category) {
                    ?>
                        <option value="<?php echo $category["id"] ?>"><?php echo $category["id"] . "- " . $category["name"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="my-4">
                <label for="body" class="form-label">Write your post:</label>
                <textarea name="body" style="resize: none;" class="form-control h-100" id="body" rows="18"></textarea>
            </div>

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