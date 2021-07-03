<?php include'header.php';?>
<title>Attendance entry | <?php echo $theader;?></title>
<form action="ViewStudents" method="POST" >
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
<center>				<h5 > Please Select Class & Section for Attendance Marking </h5>
<div class="col-sm">
Select Class:-
                        <select name="class" id=""  style="width: min-content;" class="form-control">
                            <option value="::NON::" selected></option>
                            <option value="LKG">LKG</option>
                        <option value="UKG">UKG</option>
                        <option value="1">1ST STD</option>
                        <option value="2">2ND STD</option>
                        <option value="3">3RD STD</option>
                        <option value="4">4TH STD</option>
                        <option value="5">5TH STD</option>
                        <option value="6">6TH STD</option>
                        <option value="7">7TH STD</option>
                        <option value="8">8TH STD</option>
                        <option value="9">9TH STD</option>
                        <option value="10">10TH STD</option>
                           
                        </select>
                    </div><br>
                   
                    <div class="col-sm">
Select Section:-
                        <select name="section" id="" style="width: 90px;" class="form-control">
                            <option value="::NON::" selected></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>

                        </select>
                    </div><br>
			
				
				<p class="lead">
								<button class="btn btn-warning" >Mark Attendance</button>
				</p>
                </center>
		</form>
        <?php include'footer.php';?>