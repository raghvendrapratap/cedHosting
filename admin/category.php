<?php
include("header.php");
include("../classes/product.php");
include_once("../classes/user.php");
$dbconn = new dbconn();
$product = new product();

include_once("../classes/dbconn.php");
$user = new user();
?>



<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Create Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card bg-secondary border-0 mt-4">
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == 'added') {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-text"><strong>Success!</strong> New Category is added
                                    successfully!</span>
                                <?php
                                } elseif ($_GET['alert'] == 'addedFail') {
                                    ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                    <span class="alert-text"><strong>Failed!</strong> New Category addition
                                        failed!</span>
                                    <?php
                                    } elseif ($_GET['alert'] == 'delete') {
                                        ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                        <span class="alert-text"><strong>Success!</strong> Category is deleted
                                            successfully!</span>
                                        <?php
                                        } elseif ($_GET['alert'] == 'update') {
                                            ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                            <span class="alert-text"><strong>Success!</strong> Category is updated
                                                successfully!</span>
                                            <?php
                                            } elseif ($_GET['alert'] == 'updateFail') {
                                                ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                                <span class="alert-text"><strong>Failed!</strong> Category updation
                                                    failed!</span>
                                                <?php
                                                }
                                                    ?>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <?php
                                            }
                                                ?>
                                            <div class="card-body px-lg-5 py-lg-4">
                                                <div class="text-center text-muted mb-4">
                                                    <strong>Add Category</strong>
                                                </div>
                                                <form role="form" action="adminMediater.php" method="POST">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Parent
                                                            Category</label>
                                                        <div
                                                            class="input-group input-group-merge input-group-alternative mb-3">
                                                            <!-- <input class="form-control" placeholder="Parent Category" type="text"> -->
                                                            <select class="form-control" name="parentId">
                                                                <option selected disabled value="" required>-- Parent
                                                                    Category
                                                                    --
                                                                </option>
                                                                <?php
                                                                    $parentCategory = $product->allParentCategory($dbconn->conn);
                                                                    if (isset($parentCategory)) {
                                                                        while ($row = $parentCategory->fetch_assoc()) {
                                                                    ?>
                                                                <option value="<?php echo $row['id']; ?>">
                                                                    <?php echo $row['prod_name']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">
                                                            Category</label>
                                                        <div
                                                            class="input-group input-group-merge input-group-alternative mb-3">
                                                            <input class="form-control" placeholder="Category"
                                                                type="text" name="category">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label">
                                                            Link</label>
                                                        <div
                                                            class="input-group input-group-merge input-group-alternative mb-3">

                                                            <input class="form-control" placeholder="Link" type="text"
                                                                name="link">
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-primary mt-3"
                                                            value="Add Category" name="addCategory">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  table -->
                    <div class="row">
                        <div class="col">
                            <div class="card ">
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Category</h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush ctable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">Category ID</th>
                                                <th scope="col" class="sort" data-sort="name">Category Name</th>
                                                <th scope="col" class="sort" data-sort="name">Parent Category</th>
                                                <th scope="col" class="sort" data-sort="name">Link</th>
                                                <th scope="col" class="sort" data-sort="name">Status</th>
                                                <th scope="col" class="sort" data-sort="completion">Launch Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list">

                                            <?php
                                            $pid = 1;
                                            $category = $product->showCategory($pid, $dbconn->conn);
                                            if (isset($category)) {
                                                while ($row = $category->fetch_assoc()) {
                                                    $pid =  $row['prod_parent_id'];
                                                    $pname = $product->detailCategory($pid, $dbconn->conn);
                                                    $parentName = $pname->fetch_assoc();
                                            ?>
                                            <tr>
                                                <td class="budget">
                                                    <?php echo $row['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['prod_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $parentName['prod_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['link']; ?>
                                                </td>
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
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            <?php if ($row['prod_available'] == 1) { ?>
                                                            <a class="dropdown-item "
                                                                href="adminMediater.php?action=disable&id=<?php echo $row['id']; ?>">Disable
                                                                Service</a>
                                                            <?php } elseif ($row['prod_available'] == 0) { ?>
                                                            <a class="dropdown-item "
                                                                href="adminMediater.php?action=enable&id=<?php echo $row['id']; ?>">Enable
                                                                Service</a>
                                                            <?php     }
                                                                    ?>

                                                            <a class="dropdown-item " href="#" data-toggle="modal"
                                                                data-target="#editform<?php echo $row['id']; ?>">Edit</a>
                                                            <a class="dropdown-item " href="#" data-toggle="modal"
                                                                data-target="#deleteConfirm<?php echo $row['id']; ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="deleteConfirm<?php echo $row['id']; ?>"
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
                                                                href="adminMediater.php?action=delete&id=<?php echo $row['id']; ?>">DELETE</a>
                                                            <button type="button"
                                                                class="btn btn-link text-white ml-auto"
                                                                data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade" id="editform<?php echo $row['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-sm"
                                                    role="document">
                                                    <div class="modal-content">

                                                        <div class="modal-body p-0">


                                                            <div class="card bg-secondary shadow border-0">

                                                                <div class="card-body px-lg-5 py-lg-5">
                                                                    <div class="text-center text-muted mb-4">
                                                                        <strong>Update Category</strong>
                                                                    </div>
                                                                    <form role="form" action="adminMediater.php"
                                                                        method="POST">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">Parent
                                                                                Category</label>
                                                                            <div
                                                                                class="input-group input-group-merge input-group-alternative mb-3">

                                                                                <label class="form-control">
                                                                                    <?php echo $parentName['prod_name']; ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">
                                                                                Category</label>
                                                                            <div
                                                                                class="input-group input-group-merge input-group-alternative mb-3">
                                                                                <input class="form-control"
                                                                                    placeholder="Category" type="text"
                                                                                    name="category"
                                                                                    value="<?php echo $row['prod_name']; ?>">
                                                                                <input type="hidden" name="cid"
                                                                                    value="<?php echo $row['id']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label">
                                                                                Link</label>
                                                                            <div
                                                                                class="input-group input-group-merge input-group-alternative mb-3">

                                                                                <input class="form-control"
                                                                                    placeholder="Link" type="text"
                                                                                    name="link"
                                                                                    value="<?php echo $row['link']; ?>">
                                                                            </div>
                                                                        </div>

                                                                        <div class="text-center">
                                                                            <input type="submit"
                                                                                class="btn btn-primary mt-3"
                                                                                value="Update Category"
                                                                                name="updateCategory">
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