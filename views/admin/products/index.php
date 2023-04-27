<div class="container-fluid">

    <!-- Page Heading -->
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
                            <th>Type</th>
                            <th>Origin</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Origin</th>
                            <th>Price</th>
                            <th>In Stock</th>
                            <th>Action</th>
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

                            <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal_' . $row->id . '">Delete</button>

                            </td>';
                            echo  "</tr>";
                            echo '
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
            </div>
        </div>
    </div>
    <!--  -->
</div>