<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<input id="amount_0" type="hidden" value=" <?php echo $amount[0]; ?>">
<input id="amount_1" type="hidden" value=" <?php echo $amount[1]; ?>">
<input id="amount_2" type="hidden" value=" <?php echo $amount[2]; ?>">
<input id="amount_3" type="hidden" value=" <?php echo $amount[3]; ?>">

<input id="month_0" type="hidden" value=" <?php echo $months[0]; ?>">
<input id="month_1" type="hidden" value=" <?php echo $months[1]; ?>">
<input id="month_2" type="hidden" value=" <?php echo $months[2]; ?>">
<input id="month_3" type="hidden" value=" <?php echo $months[3]; ?>">

<body>

    <canvas id="myBarChart" style="width:50%;max-width:600px; max-height:500px; float:left;"></canvas>

    <canvas id="myLineChart" style="width:50%;max-width:600px; max-height: 500px;float:right; "></canvas>

    <script src="./views/admin/products/charts/servoChart.js"></script>
</body>

</html>