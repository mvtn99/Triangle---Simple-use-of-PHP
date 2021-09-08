<?php
require("header.php");


if (isset($_GET["category"])) {
    $posts = select_posts("", $_GET["category"]);
} else if (isset($_GET["search"])) {
    $keyword = htmlspecialchars($_GET['search']);
    $posts = search($keyword);
} else {

    $posts = select_posts();
}
?>

<section id="page-breadcrumb">
    <div class="vertical-center sun">
        <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title">Blog</h1>
                        <p>Blog with right sidebar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#page-breadcrumb-->

<section id="blog" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-7">
                <div class="row">
                    <?php
                    if ($posts->rowCount() > 0) {
                        foreach ($posts as $post) {
                            $category = select_category($post["category_id"]);
                            $query2 = "SELECT * FROM comments WHERE post_id=$post[id] AND status=1";
                            $comment = $db->query($query2);
                    ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="single-blog single-column">
                                    <div class="post-thumb">
                                        <a href="blogdetails.php?post=<?php echo $post['id'] ?>"><img style="height: auto;" src="images/posts/<?php echo $post['image'] ?>" class="img-responsive" alt=""></a>
                                        <div class="post-overlay">
                                            <span class="uppercase"><a href="#"><?php echo date("d", strtotime($post["date"])) ?><br><small><?php echo substr(date("F", strtotime($post["date"])), 0, 3) ?></small></a></span>
                                        </div>
                                    </div>
                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="blogdetails.php?post=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
                                        <h3 class="post-author"><a href="#">Posted by <?php echo $post['author'] ?></a></h3>
                                        <p><?php echo substr($post['body'], 0, 200) ?> [...]</p>
                                        <a href="blogdetails.php?post=<?php echo $post['id'] ?>" class="read-more">View More</a>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li><a href="blog.php?category=<?php echo $category["id"] ?>"><i class="fa fa-tag"></i><?php echo $category['name'] ?></a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i><?php echo $comment->rowCount() ?> Comments</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col">
                            <div class="alert alert-danger">
                                Could't find anything!!
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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