        // Bar Chart
        var amount_0 = document.getElementById("amount_0").value;
        var amount_1 = document.getElementById("amount_1").value;
        var amount_2 = document.getElementById("amount_2").value;
        var amount_3 = document.getElementById("amount_3").value;
        const xArray = [amount_0, amount_1, amount_2, amount_3];

        var month_0 = document.getElementById("month_0").value;
        var month_1 = document.getElementById("month_1").value;
        var month_2 = document.getElementById("month_2").value;
        var month_3 = document.getElementById("month_3").value;


        const yArray = [month_0, month_1, month_2, month_3];
        const data = [{
            x: xArray,
            y: yArray,
            type: "bar",
            orientation: "h",
            marker: {
                color: "rgba(255,0,0,0.6)"
            }
        }];

        const layout = {
            title: "Users"
        };

        Plotly.newPlot("myPlot", data, layout);


        // Line Chart

        // Define chart data
        var data_ = {
            labels: yArray,
            datasets: [{
                label: 'Users',
                data: xArray,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        // Define chart options
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            return value + ' $'; // Add the calculation unit to the ticks
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Sales by Month' // Add the axis label
                    }
                }]
            }
        };

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data_,
            options: options
        });