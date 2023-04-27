      var amount_0 = document.getElementById("amount_0").value;
      var amount_1 = document.getElementById("amount_1").value;
      var amount_2 = document.getElementById("amount_2").value;
      var amount_3 = document.getElementById("amount_3").value;
      const yValues = [amount_0, amount_1, amount_2, amount_3];

      var month_0 = document.getElementById("month_0").value;
      var month_1 = document.getElementById("month_1").value;
      var month_2 = document.getElementById("month_2").value;
      var month_3 = document.getElementById("month_3").value;

      const xValues = [month_0, month_1, month_2, month_3];
      //       var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
      // var yValues = [55, 49, 44, 24, 15];

      var barColors = ["crimson", "green", "blue", "orange", "brown"];

      new Chart("myBarChart", {
          type: "bar",
          data: {
              labels: xValues,
              datasets: [{
                  backgroundColor: barColors,
                  data: yValues
              }]
          },
          options: {
              legend: {
                  display: false
              },
              title: {
                  display: true,
                  text: "Fan Values"
              }
          }
      });

      // Line Chart

      // Define chart data
      var data_ = {
          labels: xValues,
          datasets: [{
              label: 'Fan Values',
              data: yValues,
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
                          return value + ' %'; // Add the calculation unit to the ticks
                      }
                  },
                  scaleLabel: {
                      display: true,
                      labelString: 'Values' // Add the axis label
                  }
              }]
          }
      };

      // Create the chart
      var ctx = document.getElementById('myLineChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: data_,
          options: options
      });