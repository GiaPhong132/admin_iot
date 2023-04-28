<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<input id="amount_1" type="hidden" value=" <?php echo $amount[1]; ?>">
<input id="amount_2" type="hidden" value=" <?php echo $amount[2]; ?>">
<input id="amount_3" type="hidden" value=" <?php echo $amount[3]; ?>">
<input id="amount_4" type="hidden" value=" <?php echo $amount[4]; ?>">

<input id="month_1" type="hidden" value=" <?php echo $months[1]; ?>">
<input id="month_2" type="hidden" value=" <?php echo $months[2]; ?>">
<input id="month_3" type="hidden" value=" <?php echo $months[3]; ?>">
<input id="month_4" type="hidden" value=" <?php echo $months[4]; ?>">

<body>

    <div style="margin-left:0.3cm; margin-right: 0.3cm;">
        <canvas id="myBarChart" style="width:50%;max-width:600px; max-height:500px; float:left;"></canvas>
        <canvas id="myLineChart" style="width:50%;max-width:600px; max-height: 500px;float:right; "></canvas>
    </div>

    <div style="margin: 2cm 2cm">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Current Value</th>
                    <th scope="col">&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspChange From Previous Period</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i < 5; $i++) {
                    echo '<tr>';
                    echo '<td>' . $months[$i] . ' </td>';
                    echo '<td>&nbsp&nbsp&nbsp&nbsp' . $amount[$i] . ' &deg C</td>';
                    echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $amount[$i] - $amount[$i - 1] . ' &deg C</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="./views/admin/products/charts/tempChart.js"></script>
</body>

</html>