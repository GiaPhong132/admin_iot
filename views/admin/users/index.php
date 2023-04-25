<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Type</th>
                            <th>Payment</th>
                            <th>Concurrent Device</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Type</th>
                            <th>Payment</th>
                            <th>Concurrent Device</th>
                            <th>Action</th>
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
                            echo "<td> $row->concurrent_device  </td>";
                            echo '<td>
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal_' . $count . '">Update</button>

                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal_' . $count . '">Delete</button>

                            </td>';
                            echo  "</tr>";
                            $count += 1;
                        }

                        ?>

                    </tbody>
                </table>

                <div class="container">
                    <h2>Modal Example</h2>
                    <!-- Trigger the modal with a button -->


                    <!-- Modal -->
                    <form action="index.php?page=admin&controller=user&action=update" method="POST">
                        <?php
                        $count = 0;
                        $user_len = count($users);
                        foreach ($users as $row) {
                            echo '
                        <div class="modal fade" id="myModal_' . $count . '" role="dialog">
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
                                                <form action="index.php?page=admin&controller=user&action=update" method="POST">
                                                        <div class="left">
                                                            <div class="user-info">
                                                                <label for="">Concurrent Users</label><br>
                                                                <select name="" id="">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                            <div class="user-info">
                                                                <label>Payment Amount/Month</label><br>
                                                                <input class="form-control" placeholder="Search" type="number" name="payment-amount" id="">
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
                                                                <input class="form-control" placeholder="Search" type="text" name="gmail" value="' . $row->email . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Phone</label><br>
                                                                <input class="form-control" placeholder="Search" type="number" name="phone-number" value="' . $row->phone_number . '">
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Payment</label><br>
                                                                <select class="form-control" placeholder="Search" name="payment" id="">
                                                                    <option value="momo">Momo</option>
                                                                    <option value="ZaloPay">ZaloPay</option>
                                                                    <option value="VNPay">VNPay</option>
                                                                    <option value="Paypal">Paypal</option>
                                                                </select>
                                                            </div>
                                                            <div class="user-info">
                                                                <label for="">Account Type</label><br>
                                                                <select class="form-control" placeholder="Search" name="account-type" id="">
                                                                    <option value="vip-1">VIP 1</option>
                                                                    <option value="vip-2">VIP 2</option>
                                                                    <option value="vip-3">VIP 3</option>
                                                                    <option value="vip-4">VIP 4</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                        </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button name="user_update_' . $count . '" type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                        </form>
                            </div>
                        </div>
                </div>
                        ';
                            $count += 1;
                        }
                        ?>



                    </form>

                </div>

            </div>
        </div>
    </div>
    <!--  -->
</div>