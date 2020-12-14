<?php include('header.php');

include_once("../classes/dbconn.php");
include("../classes/product.php");
include_once("../classes/user.php");
$dbconn = new dbconn();
$product = new product();
$user = new user();

?>


<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Add product</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add product</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="col-lg-12 col-md-8">
                    <div class="card bg-secondary border-0 mt-4">

                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == 'added') {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text"><strong>Success!</strong> New Product is added
                                successfully!</span>
                            <?php
                            } elseif ($_GET['alert'] == 'addedFail') {
                                ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Failed!</strong> Product addition
                                    failed!</span>
                                <?php
                                }
                                    ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            } ?>

                            <div class="card-body px-lg-5 py-lg-4">
                                <div class="text-center text-muted mb-4">
                                    <h1 class="display-3 text-muted">Create New Product</h1>
                                </div>
                                <form action="adminMediater.php" method="POST" name="productform"
                                    onsubmit="return validateUpdateForm()">
                                    <h2 class="heading-large text-muted mb-4">Enter Product Details</h2>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Select Product
                                                        Category</label>
                                                    <!-- <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse"> -->
                                                    <select name="categoryid" id="" class="form-control cid">
                                                        <option selected disabled value="">-- Select
                                                            Category --</option>
                                                        <?php
                                                            $pid = 1;
                                                            $category = $product->showCategory($pid, $dbconn->conn);
                                                            if (isset($category)) {
                                                                while ($showcategory = $category->fetch_assoc()) {
                                                            ?>
                                                        <option value="<?php echo $showcategory['id'] ?>">
                                                            <?php echo $showcategory['prod_name'] ?>
                                                        </option>
                                                        <?php }
                                                            } ?>
                                                    </select>
                                                    <label class="form-control-label text-danger prodCategory" id="">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Enter Product
                                                        Name <span class="text-small text-muted">
                                                            (Ex-Linux Hosting-001)</span></label>
                                                    <input type="text" id="pname" class="form-control pname"
                                                        placeholder="Enter Product Name" name="">
                                                    <label class="form-control-label text-danger prodname" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Page
                                                        URL</label>
                                                    <input type="text" class="form-control url" placeholder="Page URL"
                                                        name="url" id="">
                                                    <label class="form-control-label text-danger urlid" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />

                                    <h2 class="heading-large text-muted mb-0">Product Description
                                        <h6 class="heading-small text-muted mb-4"> (Enter Product
                                            Description Below)</h6>
                                    </h2>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Enter Monthly
                                                        Price <span class="text-small text-muted">
                                                            (Ex-99.99)</span></label>
                                                    <input type="text" class="form-control mpriceid"
                                                        placeholder="ex: 23" name="mprice" id="mpric" maxlength="15">
                                                    <label class="form-control-label text-danger lablemprice" id="">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Enter Annual
                                                        Price <span class="text-small text-muted">
                                                            (Ex-99.99)</span></label>
                                                    <input type="text" class="form-control apriceid"
                                                        placeholder="ex: 230" name="aprice" id="" maxlength="15">
                                                    <label class="form-control-label text-danger lableaprice" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">SKU <span
                                                            class="text-small text-muted">
                                                            (Ex-#Li10)</span></label>
                                                    <input type="text" class="form-control skuid" placeholder="SKU"
                                                        name="sku" id="">
                                                    <label class="form-control-label text-danger lablesku" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />

                                    <h2 class="heading-large text-muted mb-4">Features</h2>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Web Space(in
                                                        GB) <span class="text-small text-muted">
                                                            (Ex-5.5)</span></label>
                                                    <input type="text" class="form-control webid"
                                                        placeholder="Web Space(in GB)" name="webspace" id=""
                                                        maxlength="5">
                                                    <h6 class="heading-small text-muted mb-4">Enter 0.5 for
                                                        512 MB</h6>
                                                    <label class="form-control-label text-danger lableweb" id="">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Bandwidth (in
                                                        GB) <span class="text-small text-muted">
                                                            (Ex-5.5)</span></label>
                                                    <input type="text" class="form-control bandid"
                                                        placeholder="Bandwidth (in GB)" name="bandwidth" id=""
                                                        maxlength="5">
                                                    <h6 class="heading-small text-muted mb-4">Enter 0.5 for
                                                        512 MB</h6>
                                                    <label class="form-control-label text-danger lableband" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Free
                                                        Domain <span class="text-small text-muted">
                                                            (Ex-5)</span></label>
                                                    <input type="text" class="form-control domainid"
                                                        placeholder="Free Domain" name="domain" id="">
                                                    <h6 class="heading-small text-muted mb-4">Enter 0 if no
                                                        domain available
                                                        in this service
                                                    </h6>
                                                    <label class="form-control-label text-danger labledomain" id="">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Language /
                                                        Technology
                                                        Support</label>
                                                    <input type="text" class="form-control langid"
                                                        placeholder="Language/Technology" name="lang" id="">
                                                    <h6 class="heading-small text-muted mb-4">Separate by
                                                        (,) Ex: PHP,
                                                        MySQL, MongoDB</h6>
                                                    <label class="form-control-label text-danger lablelang" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Mailbox <span
                                                            class="text-small text-muted">
                                                            (Ex-5)</span></label>
                                                    <input type="text" class="form-control mailid" placeholder="Mailbox"
                                                        name="mailbox" id="">
                                                    <h6 class="heading-small text-muted mb-4">Enter Number
                                                        of mailbox will
                                                        be provided, enter 0
                                                        if none</h6>
                                                    <label class="form-control-label text-danger lablemail" id="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-5">
                                            <input type="submit" value="Create New Product" class="btn btn-primary"
                                                name="newproduct">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="col-xl-12 order-xl-1">
        <div class="card-body">

        </div>
        <!-- Footer -->

        <?php include('footer.php'); ?>