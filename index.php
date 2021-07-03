<?php include "header.php"; ?>
<title>Sri Sathya Sai Vidyaniketan ERP |<?php echo $theader;?></title>


<center>
	<div class="app-card-body p-3 p-lg-4">
		<h4 class="mb-3">Welcome <?php echo $_SESSION['username'] ?>, to SSSVN ERP Protal !</h4>
		<div class="row gx-5 gy-3">
			<div class="">

				<div style="font-family: 'Mate SC', serif;">“The greatest spiritual practice is to transform love into service”, - <strong><small>SAI BABA</small></strong></div>
			</div>
			<!--//col-->
			<div class="col-12 col-lg-3">

			</div>
			<!--//col-->
		</div>
		<!--//row-->

	</div>
	<!--//app-card-body-->
</center>
<?php  if( $_SESSION['usertype']=="TEACHER" ) { ?>
				<center><h3>This Portal is Disabled for Teacher login <br> Please Login with the following Url :
				  <a href="https://teachers.sssvnbagepalli.in" target="_blank">teachers.sssvnbagepalli.in</a></h3></center>
					<?php } else{ ?>
<?php $year = date("Y");
    $ay = $year . "-" . ($year + 1);
    $sql = "SELECT sum(tution_fee_paid) as collected_tution, SUM(tution_balance_fee) as balance_tution, SUM(transport_fee_paid) as collected_transport, SUM(transport_balance) as balance_transport FROM balance_fee where academic_year='$ay'";
    $result=mysqli_query($conn, $sql);
    $fetch=mysqli_fetch_assoc($result);
    

    ?>

<div class="row g-4 mb-4">
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100 bg-primary">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1" style="color: white;">Tuition Fee Collected </h4>
				<div class="stats-figure"> <strong style="color: white;"><?php echo '₹' . number_format($fetch['collected_tution']); ?></strong></div>
				<div class="stats-meta text-success">
				</div>
			</div>
			<!--//app-card-body-->
			<a class="app-card-link-mask" href="#"></a>
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->


	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100 " style="background-color: #8E44AD;">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1" style="color: white;">Tuition Fee Balance</h4>
				<div class="stats-figure"> <strong style="color: white;"><?php echo '₹' . number_format($fetch['balance_tution']); ?></strong></div>
				<div class="stats-meta text-success">
				</div>
			</div>
			<!--//app-card-body-->
			<a class="app-card-link-mask" href="#"></a>
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100" style="background-color: #FF003E	;">
			<div class="app-card-body p-3 p-lg-4">
				<h4 class="stats-type mb-1" style="color: white;"> Transport Fee Collected </h4>
				<div class="stats-figure"><strong style="color: white;"><?php echo '₹' . number_format($fetch['collected_transport']);?></strong></div>
			</div>
			<!--//app-card-body-->
			<a class="app-card-link-mask" href="#"></a>
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->
	<div class="col-6 col-lg-3">
		<div class="app-card app-card-stat shadow-sm h-100 bg-warning" ">
						    <div class=" app-card-body p-3 p-lg-4">
			<h4 class="stats-type mb-1 text-dark">Transport Fee Balance</h4>
			<div class="stats-figure"><strong style="color: balck;"><?php echo '₹' . number_format($fetch['balance_transport']);?></strong></div>

		</div>
		<!--//app-card-body-->
		<a class="app-card-link-mask" href="#"></a>
	</div>
	<!--//app-card-->
</div>
<!--//col-->
</div>
</div>
<!--//row-->
<div class="row g-4 mb-4">
<!--//col-->
<div class="col-12 col-lg-6">
		<div class="app-card app-card-chart h-100 shadow-sm">
			<div class="app-card-header p-3 border-0">
				<h4 class="app-card-title"><center>Search Student</center></h4>
			</div>
			<!-- //app-card-header-->
			<div class="app-card-body p-4" >
				<div class="chart-container">
				<center>       <h5 class="tit">  Student ID / Student Name /Mobile No. :</h5> <input type="text" autocomplete="off" autofocus name="search_text" id="search_text" style="width:min-content;" value="<?php if (isset($_REQUEST['studentid'])==0) {
        echo"";
    } elseif (isset($_REQUEST['studentid'])==1) {
        echo $_REQUEST['studentid'];
    }?>" class="form-control" id="">
</center>
<div id="result" style="overflow: scroll;height:300px">
  </div>
				</div>
			</div>
			<!--//app-card-body -->
		</div>
		<!--//app-card-->
	</div>

	<div class="col-12 col-lg-6">
		<div class="app-card app-card-chart h-100 shadow-sm">
			<div class="app-card-header p-3 border-0">
				<h4 class="app-card-title">Fee Chart</h4>
			</div>
			<!--//app-card-header-->
			<div class="app-card-body p-4">
				<div class="chart-container">
					<canvas id="chart-pie" width="800" height="600"></canvas>
				</div>
			</div>
			<!--//app-card-body-->
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->
		<!--//col-->
		<div class="col-12 col-lg-6">
		<div class="app-card app-card-chart h-100 shadow-sm">
			<div class="app-card-header p-3 border-0">
				<h4 class="app-card-title text-center">Class wise Strength </h4>
			</div>
			<!--//app-card-header-->
			<div class="app-card-body p-4">
				<div class="chart-container">
					<canvas id="bar-chart"></canvas>
				</div>
			</div>
			<!--//app-card-body-->
		</div>
		<!--//app-card-->
	</div>
	
	<!--//col-->

	<div class="col-12 col-lg-6">
		<div class="app-card app-card-chart h-100 shadow-sm bg-primary ">
			<div class="app-card-header p-3 border-0">
				<h4 class="app-card-title text-center text-light">Fee Dues List of (<?php print $dt = date('Y-m-d'); ?>) </h4>
			</div>
			<!--//app-card-header-->
			<div class="app-card-body p-4">
				<div class="chart-container">


					<marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="scroll" scrollamount="2" direction="up">
						<table class="table table-responsive text-light">
							<thead>
								<td>Sl No.</td>
								<td>Name</td>
								<td>Class</td>
								<td>Balance Amount</td>
								<td>Bill No.</td>
							</thead>
							<?php

                            $sql = "SELECT * from student_tution_fee where   due_date='$dt' and  academic_year='$ay' order by created_on desc ";
                            $ask = mysqli_query($conn, $sql);


                            if (mysqli_num_rows($ask) > 0) {
                                $i = 1; ?><?php
                                while ($row = mysqli_fetch_assoc($ask)) {
                                    ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['student_name'] ?></td>
								<td><?php echo $row['student_class'] ?></td>
								<td><?php echo number_format($row['balance_amount']) ?></td>
								<td><?php echo $row['bill_no'] ?></td>


							</tr>

						<?php
                                }
                            } else { ?>
						<td></td>
						<td class="text-light">No Dues for Today <?php echo $dt ?></td>
					<?php }



                    ?>

						</table>
					</marquee>


				</div>
			</div>
			<!--//app-card-body-->
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->
	<div class="col-12 col-lg-6">
		<div class="app-card app-card-chart h-100 shadow-sm bg-warning text-dark ">
			<div class="app-card-header p-3 border-0">
				<h4 class="app-card-title text-center text-dark">Events List of (<?php print $dt = date('Y-m-d'); ?>) </h4>
			</div>
			<!--//app-card-header-->
			<div class="app-card-body p-4">
				<div class="chart-container">


					<marquee onMouseOver="this.stop()" onMouseOut="this.start()" behavior="scroll" scrollamount="2" direction="up">
						<table class="table table-responsive text-dark">
							<thead>
								<td>Sl No.</td>
								<td>Event Name</td>
								<td>Event Description</td>
								<td>Event Date</td>
							</thead>
							<?php
                            $year = date("Y");
                            $ay = $year . "-" . ($year + 1);
                            $sql = "SELECT * from events where event_date='$dt' and  academic_year='$ay' order by event_added_on asc ";
                            $ask = mysqli_query($conn, $sql);


                            if (mysqli_num_rows($ask) > 0) {
                                $i = 1; ?><?php
                                while ($row = mysqli_fetch_assoc($ask)) {
                                    ?>
							<tr class="text-dark">
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['event_name'] ?></td>
								<td><?php echo $row['event_discription'] ?></td>
								<td><?php echo $row['event_date'] ?></td>



							</tr>

						<?php
                                }
                            } else { ?>
						<td></td>
						<td class="text-dark text-center">No Events for Today <?php echo $dt ?></td>
					<?php }



                    ?>

						</table>
					</marquee>

				</div>
			</div>
			<!--//app-card-body-->
		</div>
		<!--//app-card-->
	</div>
	<!--//col-->

</div>

</div>

<script>
	$(function() {
		$('marquee').mouseover(function() {
			$(this).attr('scrollamount', 0);
		}).mouseout(function() {
			$(this).attr('scrollamount', 2);
		}); 
	});

	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
			labels: ["CALSS-1", "CLASS-2", "CLASS-3", "CLASS-4", "CLASS-5", "CALSS-6", "CLASS-7", "CLASS-8", "CLASS-9", "CLASS-10"],
			datasets: [{
				label: "Class Strength",
				backgroundColor: ["#FF022B", "#0296FF", "#FF8402", "#6302FF", "#02FFA1", "#FF022B", "#0296FF", "#FF8402", "#6302FF", "#02FFA1"],
				data: [78, 67, 34, 84, 43, 78, 67, 34, 84, 43]
			}]
		},
		options: {
			legend: {
				display: false
			},
			title: {
				display: true,

			}
		}
	});


	new Chart(document.getElementById("chart-pie"), {
		type: 'pie',
		data: {
			labels: ["Tuition Fee Collected", "Tuition Fee Balance", " Transport Fee Collected", " Transport Fee Balance"],
			datasets: [{
				label: "Amount (Rupees)",
				backgroundColor: ["#0296FF", "#8E44AD", "#FF022B", "#FFC300" ],
				data: [<?php echo $fetch['collected_tution']; ?>, <?php echo $fetch['balance_tution']; ?>, <?php echo $fetch['collected_transport']; ?>, <?php echo $fetch['balance_transport']; ?>]
			}]
		},
		options: {
			title: {
				display: true,

			}
		}
	});
</script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<!-- Charts JS -->



<?php } include "footer.php"; ?>