<?php
require("header.php");


if (isset($_GET["category"])) {
    $posts = select_posts("", $_GET["category"]);
} else if (isset($_GET["search"])) {
    $keyword = $_GET['search'];
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

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="images/home/under.png" class="img-responsive inline" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                    <h2>Testimonial</h2>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img src="images/home/profile1.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Nisi commodo bresaola, leberkas venison eiusmod bacon occaecat labore tail.</blockquote>
                            <h3><a href="#">- Jhon Kalis</a></h3>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img src="images/home/profile2.png" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Capicola nisi flank sed minim sunt aliqua rump pancetta leberkas venison eiusmod.</blockquote>
                            <h3><a href="">- Abraham Josef</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <h2>Contacts</h2>
                    <address>
                        E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br>
                        Phone: +1 (123) 456 7890 <br>
                        Fax: +1 (123) 456 7891 <br>
                    </address>

                    <h2>Address</h2>
                    <address>
                        Unit C2, St.Vincent's Trading Est., <br>
                        Feeder Road, <br>
                        Bristol, BS2 0UY <br>
                        United Kingdom <br>
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; Your Company 2014. All Rights Reserved.</p>
                    <p>Designed by <a target="_blank" href="http://www.themeum.com">Themeum</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lightbox.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>

</html>