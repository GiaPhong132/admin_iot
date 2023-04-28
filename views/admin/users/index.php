<div class="container-fluid">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
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
                            <th>&nbsp&nbsp&nbspFirst Name</th>
                            <th>&nbsp&nbspLast Name</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE-mail</th>
                            <th>Type</th>
                            <th>Payment</th>
                            <th>Concurrent Device</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>&nbsp&nbsp&nbspFirst Name</th>
                            <th>&nbsp&nbspLast Name</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspE-mail</th>
                            <th>Type</th>
                            <th>Payment</th>
                            <th>Concurrent Device</th>
                            <th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAction</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($users as $row) {
                            echo   "<tr>";
                            echo '<td>' . $row->fname . '</td>';
                            echo "<td> $row->lname</td>";
                            echo "<td> $row->email</td>";
                            echo "<td> $row->type</td>";
                            echo "<td> $row->payment</td>";
                            echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $row->concurrent_device</td>";
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
                                                    <p>Are you sure to delete user <strong>' . $row->fname . ' ' . $row->lname . '</strong></p>
                                                </div>
                                                <form action="index.php?page=admin&controller=user&action=delete" method="POST">
                                                    <div class="modal-footer">
                                                        <button name="delete_user" value="' . $row->id . '" type="submit" class="btn btn-danger" >Delete</button>
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
                                                <form action="index.php?page=admin&controller=user&action=editInfo" method="POST">
                                            <input type="hidden" value="' . $row->id . '"        name="user_id">
                                                        <div class="left">
                                                            <div class="user-info">
                                                                <label for="">Concurrent Users</label><br>
                                                                <select name="concurrent_device">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>

                                                            <div class="user-info">
                                                                <label for="">Gender</label><br>
                                                                <select name="gender">
                                        ';

                            if ($row->gender == "Male") {
                                echo '
                                    <option value="Male" readonly>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>

                                    ';
                            } elseif ($row->gender == "Female") {
                                echo '
                                    <option value="Female" readonly>Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                       ';
                            } elseif ($row->gender == "Other") {
                                echo '
                                    <option value="Other" readonly>Other</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                       ';
                            }



                            echo '
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="right">
                                                            <div class="user-info">
                                                                <label for="">First Name</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="fname" value="' . $row->fname . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Last Name</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="lname" value="' . $row->lname . '">
                                                            </div>
                                                            <div class="user-info">

                                                            <div class="user-info">
                                                                <label for="">Email</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="email" value="' . $row->email . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Phone</label><br>
                                                                <input class="form-control" placeholder="Search" type="text" name="phone_number" value="' . $row->phone_number . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Payment</label><br>
                                                                <select class="form-control" placeholder="Search" name="payment">
                                                                    <option value="Momo">Momo</option>
                                                                    <option value="ZaloPay">ZaloPay</option>
                                                                    <option value="VNPay">VNPay</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                </select>
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Account Type</label><br>
                                                                <select class="form-control" placeholder="Search" name="type" id="">
                                                                    <option value="VIP1">VIP 1</option>
                                                                    <option value="VIP2">VIP 2</option>
                                                                    <option value="VIP3">VIP 3</option>
                                                                    <option value="VIP4">VIP 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        </div>
                                                        </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button name="user_updated" value="' . $row->id . '" type="submit" class="btn btn-success">Update</button>
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
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <!-- <li class="page-item"><a class="page-link" href="#">1</a></li> -->
                        <?php
                        $totalPage = ceil($_SESSION['totalPage'] / 10);
                        if ($totalPage > 1) {

                            $page_appear_max = 2;
                            if ($pageNum == 1) {
                                echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';

                                for ($page = $pageNum + 1; $page < $totalPage; $page++) {
                                    if ($page_appear_max) {
                                        echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=user&action=index&pageNum=' . $page . '">' . $page . '</a></li>';
                                        $page_appear_max -= 1;
                                    } else
                                        break;
                                }
                            } elseif ($pageNum == $totalPage) {
                                echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';
                                if ($totalPage == 2) {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=user&action=index&pageNum=' . $pageNum - 1 . '">' . $pageNum - 1 . '</a></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=user&action=index&pageNum=' . $pageNum - 2 . '">' . $pageNum - 2 . '</a></li>';
                                }
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=user&action=index&pageNum=' . $pageNum - 1 . '">' . $pageNum - 1 . '</a></li>';

                                echo '<li class="page-item"><a class="page-link" href="#">' . $pageNum . '</a></li>';


                                echo '<li class="page-item"><a class="page-link" href="index.php?page=admin&controller=user&action=index&pageNum=' . $pageNum + 1 . '">' . $pageNum + 1 . '</a></li>';
                            }
                        }


                        ?>
                        <!-- <li class="page-item"><a class="page-link" href="#">2</a></li> -->
                        <!-- <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!--  -->
</div>