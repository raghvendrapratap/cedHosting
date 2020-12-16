<?php include("header.php"); ?>
<!---header--->

<div class="content">
    <div class="contact">
        <div class="container">

            <?php if (isset($_SESSION['cartArray'])) { ?>

            <h2 class="pt-5">Your Cart </h2>
            <hr>

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
                                }
                                    ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                            } ?>

                        <div class="table-responsive">
                            <table class="table align-items-center table-flush ctable">
                                <thead class="thead-light">

                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">S. No.</th>
                                        <th scope="col" class="sort" data-sort="name">Product Name</th>
                                        <!-- <th scope="col" class="sort" data-sort="name">Product Category</th> -->


                                        <!-- <th scope="col" class="sort" data-sort="completion">Launch Date</th> -->
                                        <!-- <th scope="col" class="sort" data-sort="name">Webspace</th>
                                        <th scope="col" class="sort" data-sort="name">Bandwidth</th>
                                        <th scope="col" class="sort" data-sort="name">Free Domain</th>
                                        <th scope="col" class="sort" data-sort="name">Language/Technology
                                            Support</th>
                                        <th scope="col" class="sort" data-sort="name">No of Mailbox</th> -->
                                        <th scope="col" class="sort" data-sort="name">Plan
                                        </th>
                                        <th scope="col" class="sort" data-sort="name"> Price</th>
                                        <!-- <th scope="col" class="sort" data-sort="name">SKU</th> -->
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">

                                    <?php

                                            $sNo = 0;
                                            foreach ($_SESSION['cartArray'] as $val) {
                                                $idprod =   $val['id'];


                                                $productDetail = $product->showProductDetail($idprod, $dbconn->conn);
                                                if (isset($productDetail)) {
                                                    $row = $productDetail->fetch_assoc();
                                                    $sNo += 1;
                                                    $desc = json_decode($row['description']);
                                                    $parentid =  $row['prod_parent_id'];
                                                    $product1 = new product();
                                                    $pname = $product1->detailCategory($parentid, $dbconn->conn);
                                                    $parentName = $pname->fetch_assoc();
                                            ?>
                                    <tr>
                                        <td class="budget">
                                            <!-- <?php echo $row['prod_id']; ?> -->
                                            <?php echo $sNo; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['prod_name']; ?>
                                        </td>
                                        <td>$
                                            <?php echo $row['mon_price']; ?>
                                        </td>
                                        <td>$
                                            <?php echo $row['annual_price']; ?>
                                        </td>

                                        <td class="">

                                            <div class="">
                                                <a class="d " href="#" data-toggle="modal"
                                                    data-target="#deleteConfirm<?php echo $row['prod_id']; ?>">Delete</a>
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
                                                        <h3 class="heading mt-4">SURE! You want to remove
                                                            <h4 class="m-3"><?php echo $row['prod_name']; ?></h4> ?
                                                        </h3>
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

                        </div>
                    </div>

                    <?php
                                                }
                                            }
                ?>
                    </tbody>
                    </table>
                </div>
            </div>
            <?php } else {
                echo "<h2>Your Cart is empty</h2>";
            }
            ?>




        </div>
    </div>













    <div class="clearfix"> </div>
</div>
</div>
<!-- //contact -->

</div>

<!---footer--->
<?php include("footer.php"); ?>