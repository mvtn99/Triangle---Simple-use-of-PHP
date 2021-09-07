<?php
require("config.php");

if (isset($_SESSION["email"])) {
    header("location: dashboard.php");
    exit;
}

$query_users = "SELECT * FROM admin";
$users = $db->query($query_users);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (trim($_POST["email"]) != "" && trim($_POST["password"]) != "") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user_select = $db->prepare("SELECT * FROM admin WHERE email= :email AND password= :password");
        $user_select->execute(["email" => $email, "password" => $password]);

        if ($user_select->rowCount() > 0) {
            $_SESSION["email"] = $email;
            header("location: dashboard.php");
            exit;
        } else {
            header("location: login.php?err=Wrong Email or Password");
            exit;
        }
    }
    header("location: login.php?err=Please Fill All The Forms");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="text-center">
    <nav class="navbar navbar-light bg-light fixed-md-nowrap shadow">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#"><b> </b></a>
            </li>
        </ul>
        <a class="navbar-brand col-sm-3 col-md-2 me-2" href="home.php">
            <h1><img class="img-fluid" src="images/logo.png" alt="logo" style="height: 36px;"></h1>
        </a>
    </nav>
    <?php
    if (isset($_GET["err"])) {
    ?>
        <div class="col text-center">
            <div class="alert alert-danger">
                <?php echo $_GET["err"] ?>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <main class="form-signin">
            <form method="post">
                <img class="mb-4" src="./images/coming-soon4.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating mb-2">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </main>
    </div>
</body>