<div class="row">
    <div class="col-md-3">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-my shadow fixed-top" style="width: 250px; height: 100%">
            <div href="#" class="d-flex my-2 justify-content-center">
                <span class="fs-4">Admin Panel</span>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="dashboard.php" class="nav-link link-dark <?php echo basename($_SERVER["PHP_SELF"]) == "dashboard.php" ? "active" : "" ?>">
                        <big><i class="fas fa-tasks me-1"></i></big>

                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="categories.php" class="nav-link link-dark <?php echo basename($_SERVER["PHP_SELF"]) == "categories.php" ? "active" : "" ?>">
                        <big><i class="fas fa-folder-open me-1"></i></big>
                        Category
                    </a>
                </li>
                <li>
                    <a href="posts.php" class="nav-link link-dark <?php echo basename($_SERVER["PHP_SELF"]) == "posts.php" ? "active" : "" ?>">
                        <big><i class="fas fa-file-image me-1"></i></big>
                        Post
                    </a>
                </li>
                <li>
                    <a href="comments.php" class="nav-link link-dark <?php echo basename($_SERVER["PHP_SELF"]) == "comments.php" ? "active" : "" ?>">
                        <big><i class="fas fa-comments me-1"></i></big>
                        Comment
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link link-danger">
                        <big><i class="fas fa-home me-1"></i></big>
                        Go To Website
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>