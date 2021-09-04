<!DOCTYPE html>
<html>

<?php

include("head.php");
include("connect.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
<?php
include_once("auth.php");
$r=$_SESSION['SESS_LAST_NAME'];

if($r =='lorry'){

header("location:sales_start.php");
}

include_once("sidebar.php");



?>


    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <small>Preview</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">



	<?php
		include('connect.php');
 date_default_timezone_set("Asia/Colombo");
 $cash=$_SESSION['SESS_FIRST_NAME'];

                  $date =  date("Y/m/d");

				$result = $db->prepare("SELECT sum(amount) FROM sales WHERE    date='$date' ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){

				  $amount=$row['sum(amount)'];
				}




                $result = $db->prepare("SELECT sum(amount) FROM sales WHERE    date='$date' AND cashier='$cash' ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){

				  $amount_cash=$row['sum(amount)'];
				}




				$result = $db->prepare("SELECT sum(amount) FROM sales WHERE    date='$date' AND cashier='Buddika' ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){

				  $bamount_cash=$row['sum(amount)'];
				}

				$result = $db->prepare("SELECT * FROM customer  ");
				$result->bindParam(':userid', $date);
				$result->execute();
				$tre = $result->rowcount();


				date_default_timezone_set("Asia/Colombo");
				$date=date("Y-m-d");
				$month=date("Y-M");




			?>


<div class="row">
        <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">


          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>


	 <div class="row">




	 <?php     $r=$_SESSION['SESS_LAST_NAME'];

 ?>





	        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red">
              <div class="widget-user-image">

              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Stores </h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
			   <?php
			   $result = $db->prepare("SELECT * FROM products WHERE product_id>=9  ");
				 $result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					?>
                <li><a href="#"><?php echo $row['gen_name']; ?> <span class="pull-right badge bg-red"><?php echo $row['qty']; ?></span></a></li>
                <?php } ?>
                </ul>
            </div>
          </div>
          <!-- /.widget-user -->
         </div>







	        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow" style="background: url('user_pic/laugh_gas_price_goes_up.jpg') center center;">



              <!-- /.widget-user-image -->
              <h2 class="widget-user-username">YARD</h2>
              <h4 class="widget-user-desc"></h4>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked"><?php
			    $result = $db->prepare("SELECT * FROM products WHERE product_name>=1  ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){


					?>
                <li><a href="#"><?php echo $row['gen_name']; ?> <span class="pull-right badge bg-red"><?php echo $row['qty']; ?></span></a></li>
                <?php } ?>
				  <?php
			    $result = $db->prepare("SELECT * FROM products WHERE product_name='' and product_id<9 ");
				  $result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
				  $pro_id=$row['product_id'];
				  $cha=0;
	        $result1 = $db->prepare("SELECT * FROM products WHERE product_name='$pro_id'  ");
				   $result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				 $cha=$row1['qty'];
				 }

					?>
                <li><a href="#"><?php echo $row['gen_name']; ?><span class="pull-right badge bg-"><?php echo $row['qty']-$cha; ?></span>
			   <span class="pull-right badge bg-green"><?php echo $row['qty']; ?></span>
				 </a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
         </div>







		      <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-purple">
              <div class="widget-user-image">

              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"> Buffer Stock Balance</h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">

				 <?php
			   $result = $db->prepare("SELECT * FROM products WHERE  product_id<9 ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){


					?>
                <li><a href="#"><?php echo $row['gen_name']; ?>
	              <span class="pull-right badge bg-red"><?php echo $row['qty']-$row['qty2']; ?></span>
	              <span class="pull-right badge bg-aqua"><?php echo $row['qty2']; ?></span>
					</a></li>

                <?php } ?>
                </ul>
            </div>
          </div>
          <!-- /.widget-user -->
          </div></div>

        <div class="row">

	 <!-- /----------------------------------------------------.Lorry-view --------------------------------------------------------------- -->

	 <?php
	 $result = $db->prepare("SELECT * FROM lorry WHERE action='load'  ");

					$result->bindParam(':userid', $date);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
					$no=$row['lorry_no'];
					$lo_id=$row['loading_id'];



			$result11 = $db->prepare("SELECT * FROM loading WHERE transaction_id='$lo_id' ");
			$result11->bindParam(':userid', $date);
            $result11->execute();
            for($i=0; $row11 = $result11->fetch(); $i++){
			$driver_id=$row11['driver'];
			$result1 = $db->prepare("SELECT * FROM employee WHERE  id='$driver_id'  ");
				$result1->bindParam(':userid', $date);
                $result1->execute();
                for($i=0; $row1 = $result1->fetch(); $i++){
				$driver=$row1['name'];
				$pic=$row1['pic'];
				} }

	 ?>

	 <div class="col-md-4">
          <!-- Widget: user widget style 1 -->

          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
		<a href="loading_view.php?id=<?php echo $lo_id; ?>" style="color: black">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('user_pic/images.jfif') center center;">
              <h2 class="widget-user-username" style="color: black" ><?php echo $no; ?></h2>
              <h3 class="widget-user-desc" style="color: darkred" ><?php echo $driver; ?></h3>
            </div></a>
            <div class="widget-user-image">
              <img class="img-circle" src="<?php echo $pic; ?>" alt="User Avatar">
            </div>

            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
			  <?php

			  $result1 = $db->prepare("SELECT * FROM loading_list WHERE loading_id='$lo_id' ");
			  $result1->bindParam(':userid', $date);
              $result1->execute();
              for($i=0; $row1 = $result1->fetch(); $i++){
			  if($row1['product_code']>4){
				  ?>	 <li  style="background: url('user_pic/download.jfif') center;"> <?php
				  } else{
				  echo ' <li >';
				  }

					?>
                <a ><span class="badge bg-black"><?php echo $row1['product_name']; ?></span> <span class="pull-right badge "><?php echo $row1['qty_sold']; ?></span>
				<span class="pull-right badge bg-red"><?php echo $row1['qty']; ?></span>
				</a></li>
                <?php } ?>

                </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
	 <?php
	 }
	 ?>


        <!-- ./col -->
        </div>




























		 </section>
</div>
    </div>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php
  include("dounbr.php");
?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../../plugins/morris/morris.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    "use strict";



    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });


    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>
