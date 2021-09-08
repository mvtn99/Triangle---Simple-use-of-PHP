<?php
require("header.php");


if (isset($_GET["post"])) {
    $post_id = $_GET["post"];
    if (!$post = select_posts($post_id)) {
        header("location: 404.html");
        exit();
    }
    $query_category = "SELECT * FROM categories WHERE id=$post[category_id]";
    $category = select_category($post["category_id"]);
    $query_comment = "SELECT * FROM comments WHERE post_id=$post_id AND status=1";
    $comments = $db->query($query_comment);
} else {
    header("location: 404.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (trim($_POST["name"]) != "" && trim($_POST["email"]) != "" && trim($_POST["text"]) != "") {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $text = htmlspecialchars($_POST["text"]);
            $query = $db->prepare("INSERT INTO comments (name, email, text, post_id) VALUES (:name, :email, :text, :post_id)");
            $query->execute(['name' => $name, 'email' => $email, 'text' => $text, 'post_id' => $post_id]);
?>
            <div class="col">
                <div class="alert alert-success">
                    Your comment is submited!!
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col">
                <div class="alert alert-warning">
                    Enter a valid email!!
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="col">
            <div class="alert alert-warning">
                Fill all the forms!!
            </div>
        </div>
<?php
    }
}
?>
<section id="page-breadcrumb">
    <div class="vertical-center sun">
        <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title">Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#page-breadcrumb-->

<section id="blog-details" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="single-blog blog-details two-column">
                            <div class="post-thumb">
                                <a href="#"><img src="images/posts/<?php echo $post["image"] ?>" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#"><?php echo date("d", strtotime($post["date"])) ?><br><small><?php echo substr(date("F", strtotime($post["date"])), 0, 3) ?></small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="#"><?php echo $post["title"] ?></a></h2>
                                <h3 class="post-author"><a href="#">Posted by <?php echo $post["author"] ?></a></h3>
                                <p>
                                    <?php echo $post["body"] ?>
                                </p>
                                <div class="post-bottom overflow">
                                    <ul class="nav navbar-nav post-nav">
                                        <li><a href="blog.php?category=<?php echo $category["id"] ?>"><i class="fa fa-tag"></i><?php echo $category["name"] ?></a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i><?php echo $comments->rowCount() ?> Comments</a></li>
                                    </ul>
                                </div>
                                <div class="author-profile padding">
                                </div>
                                <div class="response-area">
                                    <h2 class="bold">Write a comment</h2>
                                    <form id="comment-form" name="comment-form" method="post" action="blogdetails.php?post=<?php echo $post_id ?>">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" required placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="text" id="message" required class="form-control" rows="8" placeholder="Write your comment"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                                        </div>
                                    </form><br><br>
                                    <h2 class="bold">Comments</h2>
                                    <ul class="media-list">
                                        <?php
                                        foreach ($comments as $comment) {
                                        ?>
                                            <li class="media">
                                                <div class="post-comment">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/blogdetails/4.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <span><i class="fa fa-user"></i>Posted by <a href="#"><?php echo $comment["name"] ?></a></span>
                                                        <p><?php echo $comment["text"] ?></p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i><?php echo date("F d, Y", strtotime($comment['date'])) ?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!--/Response-area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("sidebar.php") ?>
        </div>
    </div>
</section>
<!--/#blog-->

<?php
include("footer.php");
?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>