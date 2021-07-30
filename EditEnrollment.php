<?php  include'header.php';  if( ($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="administrator")||($_SESSION['usertype']=="ADMIN" && $_SESSION['username']=="principal") ){?>
<title>Edit Enrollment | <?php echo $theader;?></title>
<style>::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* make scrollbar transparent */
}

.col_data{
    padding: 10px;
    margin: 5px;
}


</style>
<div class="col-sm">
<center>       <h4 class="tit"> Student Enrollment Search</h4> 

</center>
</div>
<div class="example-screen">

<div class="col-sm">
<center>       <h5 class="tit"> <span class=" text-danger ">This is still In Beta Stage</span> <br> Student ID / Enrollment No. / Student Name /Mobile No. :</h5> <input type="text" autocomplete="off" autofocus name="search_text" id="search_text" style="width:min-content;" value="<?php if(isset($_REQUEST['studentid'])==0){echo"";}elseif(isset($_REQUEST['studentid'])==1){echo $_REQUEST['studentid'];}?>" class="form-control" id="">
</center>
</div></div>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"process_data.php",
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
</script><br>
<div class="container" style="height: auto;overflow: scroll;">

  <div id="result">
  </div>


</div>
<?php } include'footer.php';?>