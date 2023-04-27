      var amount_0 = document.getElementById("fan_amount_0").value;
      var amount_1 = document.getElementById("fan_amount_1").value;
      var amount_2 = document.getElementById("fan_amount_2").value;
      var amount_3 = document.getElementById("fan_amount_3").value;
      const yValues = [amount_0, amount_1, amount_2, amount_3];

      var month_0 = document.getElementById("fan_month_0").value;
      var month_1 = document.getElementById("fan_month_1").value;
      var month_2 = document.getElementById("fan_month_2").value;
      var month_3 = document.getElementById("fan_month_3").value;

      const xValues = [month_0, month_1, month_2, month_3];
      //       var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
      // var yValues = [55, 49, 44, 24, 15];

      var barColors = ["crimson", "green", "blue", "orange", "brown"];

      new Chart("myChart", {
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