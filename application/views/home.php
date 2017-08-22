<!-- Dashboard Panel -->
<!-- Product -->
<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_product; ?></h3>

        <p>Total Product</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="<?php echo base_url('Product') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <!-- Category -->
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_category; ?></h3>

        <p>Total Category</p>
      </div>
      <div class="icon">
        <i class="ion ion-wineglass"></i>
      </div>
      <a href="<?php echo base_url('Category') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <!-- Vip -->
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $jml_vip; ?></h3>

        <p>Total Vip</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="<?php echo base_url('Vip') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

<!-- Pie Chart -->
<!-- Product -->
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">Statistics <small>Data Product</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-category" style="height:250px"></canvas>
      </div>
    </div>
  </div>

<!-- Vip -->
<!--   <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-bar-chart"></i>
        <h3 class="box-title">Statistics <small>Data Vip</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-vip" style="height:250px"></canvas>
      </div>
    </div>
  </div>
</div> -->

<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>

  //data category
  var pieChartCanvas = $("#data-category").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_category; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);

  /*
  //data vip
  var pieChartCanvas = $("#data-vip").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_vip; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
  */
  
</script> 