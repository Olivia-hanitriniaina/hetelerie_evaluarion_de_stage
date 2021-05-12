<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <script src="<?php echo base_url("assets/BO/core.js")?>"></script>
<script src="<?php echo base_url("assets/BO/charts.js")?>"></script>
<script src="<?php echo base_url("assets/BO/animated.js")?>"></script>

    <link rel="stylesheet" href="<?php echo base_url("assets/html2pdf/style.css")?>" media="all" />
  </head>
  <body>
  <style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>
</style>

<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingRight = 30;
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd HH:mm";

var colorSet = new am4core.ColorSet();
colorSet.saturation = 0.4;

chart.data = [<?php foreach($listeTache as $t){?> {
  "category": "<?php echo $t->NOMTACHE?>",
  "start": "<?php echo $t->DateDebut?>",
  "end": "<?php echo $t->DateFin?>",
  "color": colorSet.getIndex(0).brighten(0),
  "task": "<?php echo $t->ESTIMATION?>"
},<?php } ?>];

chart.dateFormatter.dateFormat = "yyyy-MM-dd";
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.inversed = true;

var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 70;
dateAxis.baseInterval = { count: 1, timeUnit: "day" };
// dateAxis.max = new Date(2018, 0, 1, 24, 0, 0, 0).getTime();
//dateAxis.strictMinMax = true;
dateAxis.renderer.tooltipLocation = 0;

var series1 = chart.series.push(new am4charts.ColumnSeries());
series1.columns.template.height = am4core.percent(70);
series1.columns.template.tooltipText = "{task}: [bold]{openDateX}[/] - [bold]{dateX}[/]";

series1.dataFields.openDateX = "start";
series1.dataFields.dateX = "end";
series1.dataFields.categoryY = "category";
series1.columns.template.propertyFields.fill = "color"; // get color from data
series1.columns.template.propertyFields.stroke = "color";
series1.columns.template.strokeOpacity = 1;

chart.scrollbarX = new am4core.Scrollbar();

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
<a href="javascript:window.print()">pdf</a>
</script>
  </body>
</html>