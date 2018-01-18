<?php $css = "../../design/customer/sensors_view_2.css"; ?>
<?php $title = "Rapport d'activité"; ?>

<script type="text/javascript" src="../../libs/Chart.js"></script>

<?php include("bloc_header_view.php")?>

<div class="center">
    <?php include("bloc_nav_view.php")?>
    
	<?php ob_start(); ?>

	<div class="content">
		
		<div class="sub_content">		
		
			<div>
				<h3>Température de la pièce Salon</h3>
				<canvas id="activity_line" width="800" height="450"></canvas>
			</div>
			
			<script type="text/javascript">
            <!--
            	var x_data = <?= $x_data; ?>;
            	var y_data = <?= $y_data; ?>;
            //-->
            </script>
			
			<script>
                var canvas = document.getElementById("activity_line");
                var data = {
                    labels: x_data,
                    datasets: [
                        {
                            label: "Température (°C)",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(0,0,129,0.4)",
                            borderColor: "rgba(0,0,129,1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(0,0,129,1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(0,0,129,1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            data: y_data,
                        }
                    ]
                };
                
                var option = {
                	showLines: true
                };
                var myLineChart = Chart.Line(canvas,
                {
                	data:data,
                  	options:option
                });
            </script>
			
        </div>

    </div>    
    <?php $content = ob_get_clean(); ?>

<?php
require("../../view/customer/template.php"); 
?>
</div>

<?php include("bloc_footer_view.php")?>



