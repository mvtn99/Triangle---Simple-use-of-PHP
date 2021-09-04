<?php
require("header.php");
$query = "SELECT * FROM posts";
$posts = $db->query($query);
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
            <div class="col-md-9 col-sm-7 pr-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="single-blog single-column">
                            <div class="post-thumb">
                                <a href="blogdetails.html"><img src="images/blog/7.jpg" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards design</a></h2>
                                <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber [...]</p>
                                <a href="#" class="read-more">View More</a>
                                <div class="post-bottom overflow">
                                    <ul class="nav navbar-nav post-nav">
                                        <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="single-blog single-column">
                            <div class="post-thumb">
                                <a href="blogdetails.html"><img src="images/blog/8.jpg" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards design</a></h2>
                                <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber [...]</p>
                                <a href="#" class="read-more">View More</a>
                                <div class="post-bottom overflow">
                                    <ul class="nav navbar-nav post-nav">
                                        <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="single-blog single-column">
                            <div class="post-thumb">
                                <a href="blogdetails.html"><img src="images/blog/9.jpg" class="img-responsive" alt=""></a>
                                <div class="post-overlay">
                                    <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                </div>
                            </div>
                            <div class="post-content overflow">
                                <h2 class="post-title bold"><a href="blogdetails.html">Advanced business cards design</a></h2>
                                <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber [...]</p>
                                <a href="#" class="read-more">View More</a>
                                <div class="post-bottom overflow">
                                    <ul class="nav navbar-nav post-nav">
                                        <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                        <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                    </ul>
                                </div>
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