<?php
include("header.php");
include("../classes/product.php");
include_once("../classes/dbconn.php");
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
                    <h6 class="h2 text-white d-inline-block mb-0">View Product</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Product</li>
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
<!-- Forms -->
<div class="container-fluid mt--6">


    <!--  table -->
    <div class="row">
        <div class="col">
            <div class="card ">
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == 'delete') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> Product is deleted
                        successfully!</span>
                    <?php
                    } elseif ($_GET['alert'] == 'update') {
                        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Success!</strong> Product is updated
                            successfully!</span>
                        <?php
                        } elseif ($_GET['alert'] == 'updateFail') {
                            ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text"><strong>Failed!</strong> Product updation
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
                        <div class="card-header border-0">
                            <h3 class="mb-0">View Product</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush ctable">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Product ID</th>
                                        <th scope="col" class="sort" data-sort="name">Product Name</th>
                                        <th scope="col" class="sort" data-sort="name">Product Category</th>
                                        <!-- <th scope="col" class="sort" data-sort="name">Link</th> -->
                                        <th scope="col" class="sort" data-sort="name">Status</th>
                                        <th scope="col" class="sort" data-sort="completion">Launch Date</th>
                                        <th scope="col" class="sort" data-sort="name">Webspace</th>
                                        <th scope="col" class="sort" data-sort="name">Bandwidth</th>
                                        <th scope="col" class="sort" data-sort="name">Free Domain</th>
                                        <th scope="col" class="sort" data-sort="name">Language/Technology
                                            Support</th>
                                        <th scope="col" class="sort" data-sort="name">No of Mailbox</th>
                                        <th scope="col" class="sort" data-sort="name">Monthly Price</th>
                                        <th scope="col" class="sort" data-sort="name">Annual Price</th>
                                        <th scope="col" class="sort" data-sort="name">SKU</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">

                                    <?php
                                        $pid = 1;
                                        $product = $product->showProduct($dbconn->conn);
                                        if (isset($product)) {
                                            while ($row = $product->fetch_assoc()) {
                                                $desc = json_decode($row['description']);
                                                $parentid =  $row['prod_parent_id'];
                                                $product1 = new product();
                                                $pname = $product1->detailCategory($parentid, $dbconn->conn);
                                                $parentName = $pname->fetch_assoc();
                                        ?>
                                    <tr>
                                        <td class="budget">
                                            <?php echo $row['prod_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['prod_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $parentName['prod_name']; ?>
                                        </td>
                                        <!-- <td>
                                            <?php echo $row['html']; ?>
                                        </td> -->
                                        <td>
                                            <?php if ($row['prod_available'] == 1) {
                                                            echo "Available";
                                                        } elseif ($row['prod_available'] == 0) {
                                                            echo "Not Available";
                                                        }
                                                        ?>
                                        </td>
                                        <td>
                                            <?php echo $row['prod_launch_date']; ?>
                                        </td>
                                        <td>
                                            <?php echo $desc->webspace; ?> GB
                                        </td>
                                        <td>
                                            <?php echo $desc->bandwidth; ?> GB
                                        </td>
                                        <td>
                                            <?php echo $desc->domain; ?>
                                        </td>
                                        <td>
                                            <?php echo $desc->lang;; ?>
                                        </td>
                                        <td>
                                            <?php echo $desc->mailbox; ?>
                                        </td>
                                        <td>$
                                            <?php echo $row['mon_price']; ?>
                                        </td>
                                        <td>$
                                            <?php echo $row['annual_price']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['sku']; ?>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <?php if ($row['prod_available'] == 1) { ?>
                                                    <a class="dropdown-item "
                                                        href="adminMediater.php?action=disableprod&id=<?php echo $row['prod_id']; ?>">Disable
                                                        Service</a>
                                                    <?php } elseif ($row['prod_available'] == 0) { ?>
                                                    <a class="dropdown-item "
                                                        href="adminMediater.php?action=enableprod&id=<?php echo $row['prod_id']; ?>">Enable
                                                        Service</a>
                                                    <?php     }
                                                                ?>

                                                    <a class="dropdown-item edit" href="#" data-toggle="modal"
                                                        data-target="#editform<?php echo $row['prod_id']; ?>">Edit</a>
                                                    <a class="dropdown-item " href="#" data-toggle="modal"
                                                        data-target="#deleteConfirm<?php echo $row['prod_id']; ?>">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteConfirm<?php echo $row['prod_id']; ?>"
                                        tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document">
                                            <div class="modal-content bg-gradient-danger">

                                                <div class="modal-body">

                                                    <div class="p-0 text-center">
                                                        <i class="ni ni-fat-remove ni-4x"></i>
                                                        <h2 class="heading mt-4">SURE! You want to delete ?</h2>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-white text-dark"
                                                        href="adminMediater.php?action=deleteprod&id=<?php echo $row['prod_id']; ?>">DELETE</a>
                                                    <button type="button" class="btn btn-link text-white ml-auto"
                                                        data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="editform<?php echo $row['prod_id']; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body p-5">
                                                    <div class="card-body px-lg-5 py-lg-4">
                                                        <div class="text-center text-muted mb-4">
                                                            <h1 class="display-3 text-muted">Update Product</h1>
                                                        </div>
                                                    </div>
                                                    <form action="adminMediater.php" method="POST"
                                                        onsubmit="return validateUpdateProdForm()">
                                                        <h2 class="heading-large text-muted mb-4">Enter Product Details
                                                        </h2>
                                                        <div class="pl-lg-4">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Select Product
                                                                            Category </label>
                                                                        <select name="categoryid"
                                                                            class="form-control cid">
                                                                            <option selected disabled value="">-- Select
                                                                                Category --</option>
                                                                            <?php
                                                                                        $pid = 1;
                                                                                        $product2 = new product();
                                                                                        $category = $product2->showCategory($pid, $dbconn->conn);
                                                                                        if (isset($category)) {
                                                                                            while ($showcategory = $category->fetch_assoc()) {
                                                                                        ?>
                                                                            <option
                                                                                value="<?php echo $showcategory['id'] ?>"
                                                                                <?php if ($showcategory['id'] == $parentName['id']) {
                                                                                                                                                        echo "selected";
                                                                                                                                                    }; ?>>
                                                                                <?php echo $showcategory['prod_name'] ?>
                                                                            </option>
                                                                            <?php }
                                                                                        } ?>
                                                                        </select>
                                                                        <label
                                                                            class="form-control-label text-danger prodCategory">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Enter Product
                                                                            Name </label>
                                                                        <input type="text" class="form-control pname"
                                                                            placeholder="Enter Product Name"
                                                                            name="pname"
                                                                            value="<?php echo $row['prod_name']; ?>">
                                                                        <input type="hidden" name="pid"
                                                                            value="<?php echo $row['prod_id']; ?>">
                                                                        <span
                                                                            class="form-control-label text-danger prodname">
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Page
                                                                            URL</label>
                                                                        <input type="text" id=""
                                                                            class="form-control url"
                                                                            placeholder="Page URL" name="url"
                                                                            value="<?php echo $row['html']; ?>">
                                                                        <label
                                                                            class="form-control-label text-danger urlid"
                                                                            id="">
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
                                                                            Price</label>
                                                                        <input type="text" class="form-control mpriceid"
                                                                            placeholder="ex: 23" name="mprice"
                                                                            value="<?php echo $row['mon_price']; ?>"
                                                                            id="" maxlength="15">
                                                                        <label
                                                                            class="form-control-label text-danger lablemprice"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Enter Annual
                                                                            Price</label>
                                                                        <input type="text" class="form-control apriceid"
                                                                            placeholder="ex: 230" name="aprice"
                                                                            value="<?php echo $row['annual_price']; ?>"
                                                                            id="" maxlength="15">
                                                                        <label
                                                                            class="form-control-label text-danger lableaprice"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">SKU</label>
                                                                        <input type="text" class="form-control skuid"
                                                                            placeholder="SKU" name="sku"
                                                                            value="<?php echo $row['sku']; ?>" id="">
                                                                        <label
                                                                            class="form-control-label text-danger lablesku"
                                                                            id="">
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
                                                                            GB)</label>
                                                                        <input type="text" class="form-control webid"
                                                                            placeholder="Web Space(in GB)"
                                                                            name="webspace"
                                                                            value="<?php echo $desc->webspace; ?>" id=""
                                                                            maxlength="5">
                                                                        <h6 class="heading-small text-muted mb-4">Enter
                                                                            0.5 for
                                                                            512 MB</h6>
                                                                        <label
                                                                            class="form-control-label text-danger lableweb"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Bandwidth (in
                                                                            GB)</label>
                                                                        <input type="text" class="form-control bandid"
                                                                            placeholder="Bandwidth (in GB)"
                                                                            name="bandwidth"
                                                                            value="<?php echo $desc->bandwidth; ?>"
                                                                            id="" maxlength="5">
                                                                        <h6 class="heading-small text-muted mb-4">Enter
                                                                            0.5 for
                                                                            512 MB</h6> <label
                                                                            class="form-control-label text-danger lableband"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Free
                                                                            Domain</label>
                                                                        <input type="text" class="form-control domainid"
                                                                            placeholder="Free Domain" name="domain"
                                                                            value="<?php echo $desc->domain; ?>" id="">
                                                                        <h6 class="heading-small text-muted mb-4">Enter
                                                                            0 if no
                                                                            domain available
                                                                            in this service
                                                                        </h6>
                                                                        <label
                                                                            class="form-control-label text-danger labledomain"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Language /
                                                                            Technology
                                                                            Support</label>
                                                                        <input type="text" class="form-control langid"
                                                                            placeholder="Language/Technology"
                                                                            name="lang"
                                                                            value="<?php echo $desc->lang; ?>" id="">
                                                                        <h6 class="heading-small text-muted mb-4">
                                                                            Separate by
                                                                            (,) Ex: PHP,
                                                                            MySQL, MongoDB</h6>
                                                                        <label
                                                                            class="form-control-label text-danger lablelang"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="form-control-label">Mailbox</label>
                                                                        <input type="text" class="form-control mailid"
                                                                            placeholder="Mailbox" name="mailbox"
                                                                            value="<?php echo $desc->mailbox; ?>" id="">
                                                                        <h6 class="heading-small text-muted mb-4">Enter
                                                                            Number
                                                                            of mailbox will
                                                                            be provided, enter 0
                                                                            if none</h6>
                                                                        <label
                                                                            class="form-control-label text-danger lablemail"
                                                                            id="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center mt-5">
                                                                <input type="submit" value="Update Product"
                                                                    class="btn btn-primary" name="updateproduct">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <?php
                                            }
                                        } ?>
                    </tbody>
                    </table>
                </div> <!-- Card footer -->

            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include("footer.php"); ?>