<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 8 Google Pie Chart - Tutsmake.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
 
    <div class="container p-5">
        <h5>Laravel 8 Google Pie Chart | Tutsmake.com</h5>
 
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Registered User Count'],
 
                @php
                $a = 0;
                foreach($pieChart as $d) {
                    
                    echo "['".$product[0]."', ".$d->count."],";
                    $a += 1;
                }
                @endphp
        ]);
 
          var options = {
            title: 'Product',
            is3D: false,
          };
 
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
          chart.draw(data, options);
        }
      </script>
</body>
</html> 