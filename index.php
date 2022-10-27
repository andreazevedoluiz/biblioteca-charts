<?php
include 'conexao.php';
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Cidade", "População", { role: "style" } ],

        <?php
        $sql = "SELECT * FROM dados";
        $busca = mysqli_query($conexao, $sql);

        while($dados = mysqli_fetch_array($busca)){
           $cidade = $dados['cidade'];
           $populacao = $dados['populacao'];
        
        ?>

        ["<?php echo $cidade ?>", <?php echo $populacao ?>, "#0000FF"],

        <?php } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "População de cada Cidade",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>