<?php
$query = "SELECT * FROM categories";
$categories = $db->query($query);
$query = "SELECT * FROM comments";
$comments = $db->query($query);
?>
<div class="col-md-3 col-sm-5">
    <div class="sidebar blog-sidebar">
        <div class="sidebar-item  recent">
            <h3>Comments</h3>
            <div class="media">
                <div class="pull-left">
                    <a href="#"><img src="images/portfolio/project1.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                    <p>posted on 07 March 2014</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <a href="#"><img src="images/portfolio/project2.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                    <p>posted on 07 March 2014</p>
                </div>
            </div>
            <div class="media">
                <div class="pull-left">
                    <a href="#"><img src="images/portfolio/project3.jpg" alt=""></a>
                </div>
                <div class="media-body">
                    <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit,</a></h4>
                    <p>posted on 07 March 2014</p>
                </div>
            </div>
        </div>
        <div class="sidebar-item categories">
            <h3>Categories</h3>
            <ul class="nav navbar-stacked">
                <?php
                foreach ($categories as $category) {
                    $query = "SELECT * FROM posts WHERE category_id=$category[id]";
                    $sposts = $db->query($query);
                ?>
                    <li><a href="blog.php?category=<?php echo $category["id"] ?>"><?php echo $category["name"] ?><span class="pull-right">(<?php echo $sposts->rowCount() ?>)</span></a></li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="sidebar-item popular">
            <h3>Latest Photos</h3>
            <ul class="gallery">
                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
                <li><a href="#"><img src="images/portfolio/popular2.jpg" alt=""></a></li>
                <li><a href="#"><img src="images/portfolio/popular3.jpg" alt=""></a></li>
                <li><a href="#"><img src="images/portfolio/popular4.jpg" alt=""></a></li>
                <li><a href="#"><img src="images/portfolio/popular5.jpg" alt=""></a></li>
                <li><a href="#"><img src="images/portfolio/popular1.jpg" alt=""></a></li>
            </ul>
        </div>
    </div>
</div>