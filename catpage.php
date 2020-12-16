<?php
if (isset($_GET['id'])) {
    if ($_GET['id'] != "" || $_GET['id'] != null) {
        $id = $_GET['id'];
    } else {
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>

<?php include("header.php"); ?>

<div class="content">
    <div class="linux-section">
        <div class="container">
            <?php
            // $productc = new product();
            $category = $product->detailCategory($id, $dbconn->conn);
            if (isset($category)) {
                $scategory = $category->fetch_assoc();
                echo $scategory['html'];
            } ?>

        </div>
    </div>

    <div class="tab-prices">
        <div class="container">
            <div id="plans" class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav left-tab" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab"
                            aria-controls="home" aria-expanded="true">IN Hosting</a></li>
                    <!-- <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                            aria-controls="profile">US Hosting</a></li> -->
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="linux-prices">

                            <?php
                            $productc = new product();
                            $category = $productc->showallProductofCategory($id, $dbconn->conn);
                            if (isset($category)) {
                                while ($row = $category->fetch_assoc()) {
                                    $desc = json_decode($row['description']);
                                    if ($row['prod_available'] == 1) {
                            ?>

                            <div class="col-md-4 linux-price">
                                <div class="linux-top">
                                    <h4><?php echo $row['prod_name']; ?></h4>
                                </div>
                                <div class="linux-bottom">
                                    <h5 class="">$<?php echo $row['mon_price']; ?> <span class="month">per
                                            month</span></h5>
                                    <h6>$<?php echo $row['annual_price']; ?> <span class="month">per
                                            annum</span></h6>
                                    <h5><?php echo $desc->domain; ?> Domain</h5>
                                    <ul>
                                        <li><strong><?php echo $desc->webspace; ?> GB</strong> Web Space</li>
                                        <li><strong><?php echo $desc->bandwidth; ?> GB</strong> Bandwidth</li>
                                        <li><strong><?php echo $desc->lang;; ?></strong> Supported Lang/Technology</li>
                                        <li><strong><?php echo $desc->mailbox; ?> </strong>Email accounts</li>
                                        <li><strong>location</strong> : <img src="images/india.png"></li>
                                    </ul>
                                </div>
                                <a href="mediater.php?idp=<?php echo $id; ?>&addcartid=<?php echo $row['id']; ?>">buy
                                    now</a>
                            </div>

                            <?php } else {
                                    }
                                }
                            } ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- clients -->
    <div class="clients">
        <div class="container">
            <h3>Some of our satisfied clients include...</h3>
            <ul>
                <li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
                <li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
                <li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
                <li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
                <li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
                <li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
            </ul>
        </div>
    </div>
    <!-- clients -->
    <div class="whatdo">
        <div class="container">
            <h3><?php echo $scategory['prod_name']; ?> Features</h3>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="what-grids">
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-move" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 what-grid">
                    <div class="what-left">
                        <i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
                    </div>
                    <div class="what-right">
                        <h4>Expert Web Design</h4>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore </p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>