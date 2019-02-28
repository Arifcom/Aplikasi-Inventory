<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->active = 'Statistik';
$this->title = 'Statistik';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    '@web/public/bower_components/chart.js/Chart.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJs(
    '
            var areaChartData = {
              labels  : [\'Januari\',\'Februari\',\'Maret\',\'April\',\'Mei\',\'Juni\',\'Juli\',\'Agustus\',\'Sebtember\',\'Oktober\',\'November\',\'Desember\'],
              datasets: [
                {
                  label               : \'Pembelian\',
                  fillColor           : \'rgb(255, 0, 0)\',
                  strokeColor         : \'rgb(255, 0, 0)\',
                  pointColor          : \'rgb(255, 0, 0)\',
                  pointStrokeColor    : \'#c1c7d1\',
                  pointHighlightFill  : \'#fff\',
                  pointHighlightStroke: \'rgba(220,220,220,1)\',
                  data                : ['.$count_query_pembelian_januari.','.$count_query_pembelian_februari.','.$count_query_pembelian_maret.','.$count_query_pembelian_april.','.$count_query_pembelian_mei.','.$count_query_pembelian_juni.','.$count_query_pembelian_juli.','.$count_query_pembelian_agustus.','.$count_query_pembelian_september.','.$count_query_pembelian_oktober.','.$count_query_pembelian_november.','.$count_query_pembelian_desember.']
                },
                {
                  label               : \'Penjualan\',
                  fillColor           : \'rgb(255, 255, 0)\',
                  strokeColor         : \'rgb(255, 255, 0)\',
                  pointColor          : \'rgb(255, 255, 0)\',
                  pointStrokeColor    : \'#c1c7d1\',
                  pointHighlightFill  : \'#fff\',
                  pointHighlightStroke: \'rgba(60,141,188,1)\',
                  data                : ['.$count_query_penjualan_januari.','.$count_query_penjualan_februari.','.$count_query_penjualan_maret.','.$count_query_penjualan_april.','.$count_query_penjualan_mei.','.$count_query_penjualan_juni.','.$count_query_penjualan_juli.','.$count_query_penjualan_agustus.','.$count_query_penjualan_september.','.$count_query_penjualan_oktober.','.$count_query_penjualan_november.','.$count_query_penjualan_desember.']
                }
              ]
            }
            var barChartCanvas                   = $(\'#barChart\').get(0).getContext(\'2d\')
            var barChart                         = new Chart(barChartCanvas)
            var barChartData                     = areaChartData
            var barChartOptions                  = {
              //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
              scaleBeginAtZero        : true,
              //Boolean - Whether grid lines are shown across the chart
              scaleShowGridLines      : true,
              //String - Colour of the grid lines
              scaleGridLineColor      : \'rgba(0,0,0,.05)\',
              //Number - Width of the grid lines
              scaleGridLineWidth      : 1,
              //Boolean - Whether to show horizontal lines (except X axis)
              scaleShowHorizontalLines: true,
              //Boolean - Whether to show vertical lines (except Y axis)
              scaleShowVerticalLines  : true,
              //Boolean - If there is a stroke on each bar
              barShowStroke           : true,
              //Number - Pixel width of the bar stroke
              barStrokeWidth          : 2,
              //Number - Spacing between each of the X value sets
              barValueSpacing         : 5,
              //Number - Spacing between data sets within X values
              barDatasetSpacing       : 1,
              //String - A legend template
              legendTemplate          : \'<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>\',
              //Boolean - whether to make the chart responsive
              responsive              : true,
              maintainAspectRatio     : true
            }
        
            barChartOptions.datasetFill = false
            barChart.Bar(barChartData, barChartOptions)
	    '
);
?>
<div class="pembelian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Statistik Pembelian dan Penjualan</h3>
        </div>
        <div class="box-body">
            <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
            </div>
        </div>
    </div>

</div>
