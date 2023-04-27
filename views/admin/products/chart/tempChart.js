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
                  text: "Temperature Values"
              }
          }
      });