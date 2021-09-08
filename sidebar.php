<?php

$categories = select_category();

$query = "SELECT * FROM comments ORDER BY date DESC LIMIT 3";
$comments = $db->query($query);
?>
<div class="col-md-3 col-sm-5">
    <div class="sidebar blog-sidebar">
        <div class="sidebar-item  recent">
            <h3>Comments</h3>
            <?php
            foreach ($comments as $comment) {
            ?>
                <div class="media">
                    <div class="pull-left">
                        <a href="#"><img src="images/portfolio/project1.jpg" alt=""></a>
                    </div>
                    <div class="media-body">
                        <h4><a href="#"><?php echo $comment["text"] ?></a></h4>
                        <p>posted on <?php echo date("d F Y", strtotime($comment['date'])) ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="sidebar-item categories">
            <h3>Categories</h3>
            <ul class="nav navbar-stacked">
                <?php
                foreach ($categories as $category) {

                    $sposts = select_posts("", $category["id"]);
                ?>
                    <li><a href="blog.php?category=<?php echo $category["id"] ?>"><?php echo $category["name"] ?><span class="pull-right">(<?php echo $sposts->rowCount() ?>)</span></a></li>
                <?php
                }
                ?>
            </ul>
        </div>

    </div>
</div>