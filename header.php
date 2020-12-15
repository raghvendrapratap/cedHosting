<?php
session_start();

if (isset($_SESSION['userInfo'])) {
    if ($_SESSION['userInfo']['is_admin'] == 1) {
        header('Location: admin/index.php');
    }
}
include_once("classes/dbconn.php");
include("classes/product.php");
include_once("classes/user.php");
$dbconn = new dbconn();
$product = new product();
$user = new user();

$filename = basename($_SERVER['REQUEST_URI']);
$file = explode('?', $filename);
$hostingmenu = array('linuxhosting.php', 'wordpresshosting.php', 'windowshosting.php', 'cmshosting.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Ced Hosting</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
     Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!---fonts-->
    <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!---fonts-->
    <!--script-->
    <script src="js/modernizr.custom.97074.js"></script>
    <script src="js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <!--lightboxfiles-->
    <script type="text/javascript">
    $(function() {
        $('.team a').Chocolat();
    });
    </script>

    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
    jQuery(function($) {
        $(".swipebox").swipebox();
    });
    </script>

    <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
    <script type="text/javascript">
    $(function() {

        $(' #da-thumbs > li ').each(function() {
            $(this).hoverdir();
        });

    });
    </script>
    <!--script-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/customstyle.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/custom.js"></script>
</head>

<body>
    <!---header--->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <i class="sr-only">Toggle navigation</i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </button>
                        <div class="navbar-brand">
                            <h1><a href="index.php">
                                    <p id="logop">Ced <span id="logospan">Hosting</span></p>
                                </a></h1>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="<?php if ($file[0] == "index.php") : ?> active<?php endif; ?>"><a
                                    href="index.php">Home <i class="sr-only">(current)</i></a></li>
                            <li class="<?php if ($file[0] == "about.php") : ?> active<?php endif; ?>"><a
                                    href="about.php">About</a></li>
                            <li class="<?php if ($file[0] == "services.php") : ?> active<?php endif; ?>"><a
                                    href="services.php">Services</a></li>
                            <li class="dropdown <?php if ($file[0] == "catpage.php") : ?> active<?php endif; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
                                <ul class="dropdown-menu">

                                    <?php
                                    $pid = 1;
                                    $category = $product->showCategory($pid, $dbconn->conn);
                                    if (isset($category)) {
                                        while ($scategory = $category->fetch_assoc()) {
                                    ?>
                                    <li class="<?php if ($_GET['id'] == $scategory['id']) : ?> active<?php endif; ?>"><a
                                            href="catpage.php?id=<?php echo $scategory['id']; ?>"><?php echo $scategory['prod_name'] ?></a>
                                    </li>
                                    <?php }
                                    } ?>

                                </ul>
                            </li>
                            <li class="<?php if ($file[0] == "pricing.php") : ?> active<?php endif; ?>"><a
                                    href="pricing.php">Pricing</a></li>
                            <li class="<?php if ($file[0] == "blog.php") : ?> active<?php endif; ?>"><a
                                    href="blog.php">Blog</a></li>
                            <li class="<?php if ($file[0] == "contact.php") : ?> active<?php endif; ?>"><a
                                    href="contact.php">Contact</a></li>

                            <?php
                            if (isset($_SESSION['userInfo'])) {
                                if ($_SESSION['userInfo']['is_admin'] == 0) { ?>
                            <li><a href="logout.php">Logout</a></li>
                            <?php }
                            } else { ?> <li class="<?php if ($file[0] == "login.php") : ?> active<?php endif; ?>"><a
                                    href="login.php">Login</a></li>
                            <?php }
                            ?>
                            <li class="<?php if ($file[0] == "cart.php") : ?> active<?php endif; ?>"><a id="icart"
                                    href="cart.php"><i class="fa fa-cart-plus"></i></a></li>
                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <!---header--->