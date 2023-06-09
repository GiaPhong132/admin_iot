<style>
    #message_update.hide {
        opacity: 0;
    }
</style>


<script>
    setTimeout(function() {
        document.getElementById("message_update").classList.add("hide");
    }, 4000);
</script>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type <button style="background: none; border:none;">
                                    <a href="index.php?page=admin&controller=products&action=sort&order=asd&pageNum=<?php echo $pageNum ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-up" viewBox="0 0 16 16">
                                            <path d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                                        </svg>
                                    </a>
                                    <a href="index.php?page=admin&controller=products&action=sort&order=des&pageNum=<?php echo $pageNum ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down-alt" viewBox="0 0 16 16">
                                            <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z" />
                                        </svg>
                                    </a>

                                </button></th>
                            <th>Origin</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Origin</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($products as $row) {
                            echo   "<tr>";
                            echo '<td>' . $row->name . '</td>';
                            echo "<td> $row->abstract_name</td>";
                            echo "<td> $row->origin</td>";
                            echo "<td> $row->price</td>";
                            echo "<td> $row->amount_in_stock</td>";
                            echo '<td>
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal_' . $row->id . '">Update</button>

                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteModal_' . $row->id . '">Delete</button>

                            </td>';
                            echo  "</tr>";
                            echo '

                                    <div class="modal fade" id="deleteModal_' . $row->id . '"           role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to delete this product <strong>' . $row->name . '</strong></p>
                                                </div>
                                                <form action="index.php?page=admin&controller=products&action=delete" method="POST">
                                                    <div class="modal-footer">
                                                        <button name="device_id" value="' . $row->id . '" type="submit" class="btn btn-danger" >Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>



                        <div class="modal fade" id="myModal_' . $row->id . '" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">

                            <div>
                                    <div class="total">

                                        <div class="total-0">
                                            <div class="vertical_bottom">
                                                <form action="index.php?page=admin&controller=products&action=editInfo" method="POST">
                                            <input type="hidden" value="' . $row->id . '"        name="device_id">
                                                        <div class="left">


                                                        </div>
                                                        <div class="right">
                                                            <div class="user-info">
                                                                <label for="">Name</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="name" value="' . $row->name . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Type</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="abstract_name" value="' . $row->abstract_name . '">
                                                            </div>
                                                            <div class="user-info">

                                                            <div class="user-info">
                                                                <label for="">Origin</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="origin" value="' . $row->origin . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Price</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="price" value="' . $row->price . '">
                                                            </div>
                                                                <label for="">In Stock</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="amount_in_stock" value="' . $row->amount_in_stock . '">
                                                            </div>

                                                             </div>
                                                                <label for="">Description</label><br>
                                                                <textarea row="5" col="10" class="form-control" placeholder="Search" type="text" name="description" value="' . $row->description . '">
                                                                ' . $row->description . '
                                                                </textarea>
                                                            </div>


                                                            </div>
                                                            </div>
                                                            </div>
                                                          </div>



                                                        <div class="modal-footer">
                                                        <button name="device_updated" value="' . $row->id . '" type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        ';

                            echo '</form>';
                        }

                        ?>

                    </tbody>
                </table>
                <nav aria-label="Page navigation example" style="float: right;">
                    <ul class="pagination">

                        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                        <?php
                        $totalPage = ceil($_SESSION['totalPage'] / 10);
                        if ($totalPage > 1) {
                            if ($pageNum == 1) {
                                if ($totalPage == 2) {

                                    echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';

                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 1 . '">' . $pageNum + 1 . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';

                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 1 . '">' . $pageNum + 1 . '</a></li>';

                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 2 . '">' . $pageNum + 2 . '</a></li>';
                                }
                                echo ' <li class="page-item">
                                                <a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 1 . '" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>';
                            } elseif ($pageNum == $totalPage) {
                                echo ' <li class="page-item">
                                                <a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 1 . '" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>';
                                if ($totalPage == 2) {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 1 . '">' . $pageNum - 1 . '</a></li>';
                                    echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 2 . '">' . $pageNum - 2 . '</a></li>';
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 1 . '">' . $pageNum - 1 . '</a></li>';
                                    echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';
                                }
                            } else {
                                echo ' <li class="page-item">
                                                <a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 1 . '" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>';
                                echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum - 1 . '">' . $pageNum - 1 . '</a></li>';

                                echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';


                                echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 1 . '">' . $pageNum + 1 . '</a></li>';

                                echo ' <li class="page-item">
                                                <a class="page-link" href="index.php?page=admin&controller=products&action=index&pageNum=' . $pageNum + 1 . '" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>';
                            }
                        }


                        ?>
                        <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                        <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--  -->
</div>