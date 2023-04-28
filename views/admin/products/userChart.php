<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<body>
    <div id="myPlot" style="width:50%;max-width:600px; float: left;"></div>
    <input id="amount_0" type="hidden" value=" <?php echo $amount[0]; ?>">
    <input id="amount_1" type="hidden" value=" <?php echo $amount[1]; ?>">
    <input id="amount_2" type="hidden" value=" <?php echo $amount[2]; ?>">
    <input id="amount_3" type="hidden" value=" <?php echo $amount[3]; ?>">

    <input id="month_0" type="hidden" value=" <?php echo $months[0]; ?>">
    <input id="month_1" type="hidden" value=" <?php echo $months[1]; ?>">
    <input id="month_2" type="hidden" value=" <?php echo $months[2]; ?>">
    <input id="month_3" type="hidden" value=" <?php echo $months[3]; ?>">

    <canvas id="myChart" style="width:50%;max-width:600px; max-height: 450px;float: right; margin-right: 0.5cm;"></canvas>
    <script src="./views/admin/products/charts/userChart.js"> </script>
</body>

</html>