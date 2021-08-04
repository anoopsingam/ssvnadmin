<?php include'header.php'; ?>
<title>Add Notice | <?php echo $theader;?></title>

                <form action="" method="post">
                      <div class="form-group">
                      <div class="row">
                          <div class="col-sm">
                              <label for="title">Title :</label>
                              <input type="text" name="notice_header" id="notice_header" value="" class="form-control">
                          </div>
                            <div class="col-sm">
                            <label for="notice_data">Notice Details :</label>
                                    <textarea name="notice_data"  class="form-control" id="notice_data" style="height: fit-content;width:100%;" maxlength="250"></textarea>



                            </div>
                            <div class="col-sm">
                            <label for="notice_date">Notice Date</label><input class="form-control" type="date" name="notice_date" id="notice_date" />

                            </div>
                            <div class="col-sm">
                            <label for="notice_end_date">Notice End Date</label><input class="form-control" type="date" name="notice_end_date" id="notice_end_date" />

                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="row custom-control custom-checkbox">
                            <div class="col-sm">

                                        <div class="row pt-3">
                                            <div class="col-sm">
                                            <label for="notice_gen">Notice Gen</label> : <input class="custom-control-input" type="checkbox" name="notice_gen" id="notice_gen" />
                                            </div>
                                            <div class="col-sm">
                                            <label for="notice_emp">Notice Emp</label> : <input class="custom-control-input" type="checkbox" name="notice_emp" id="notice_emp" />

                                            </div>
                                            <div class="col-sm">
                                            <label for="notice_std">Notice Std</label> : <input class="custom-control-input" type="checkbox" name="notice_std" id="notice_std" />

                                                        </div>
                                        </div>


                         

                            </div>
                            <div class="col-sm">
                            <label for="notice_type">Notice Type</label>
                                            <select  class="form-control" required name="notice_type" id="notice_type">
                                                <option value="">Select Notice type</option>
                                                <option value="ACADEMICS">ACADEMICS</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="FEE">FEE</option>
                                                <option value="EXAM">EXAM</option>
                                                <option value="OTHER">OTHER</option>
                                            </select>
                            
                            </div>
                        </div>
                      </div>
                      <center>
                      <a href="#!"onclick="Add()" class="btn btn-danger">Send Notice</a> </center>
                </form>
                        <script >
                           //add()
                           function Add(){
                                 //get all variables
                            var notice_header = document.getElementById("notice_header").value;
                            var notice_data = document.getElementById("notice_data").value;
                            var notice_date = document.getElementById("notice_date").value;
                            var notice_end_date = document.getElementById("notice_end_date").value;
                            var notice_gen = document.getElementById("notice_gen").checked;
                            var notice_emp = document.getElementById("notice_emp").checked;
                            var notice_std = document.getElementById("notice_std").checked;
                            var notice_type = document.getElementById("notice_type").value;
                            var login_id = "<?php echo $username; ?>";
                             //create data in json
                                    var Data = {
                                        notice_header : notice_header,
                                        notice_data : notice_data,
                                        notice_date : notice_date,
                                        notice_end_date : notice_end_date,
                                        notice_gen : notice_gen,
                                        notice_emp : notice_emp,
                                        notice_std : notice_std,
                                        notice_type : notice_type,
                                        login_id : login_id
                                    };

                                            $.ajax({
                                type: "POST",
                                url: "UploadNotice",
                                data: Data,
                                success: function(result) {
                            var data=JSON.parse(result);
                            
                              if(data.status=="success" ){
                                Swal.fire(
                                    'Success',
                                    data.NoticeHeader+' '+data.message+'  ID-'+data.Noticeid,
                                    'success'
                                    )
                                  //Nullify all fields
                                  document.getElementById("notice_header").value = "";
                                  document.getElementById("notice_data").value = "";
                                  document.getElementById("notice_date").value = "";
                                  document.getElementById("notice_end_date").value = "";
                                  document.getElementById("notice_gen").checked = false;
                                  document.getElementById("notice_emp").checked = false;
                                  document.getElementById("notice_std").checked = false;
                                  document.getElementById("notice_type").value = "";
                                  

                                  
                              }else if(data.status=="error"){
                                Swal.fire(
                                    'Error',
                                    data.NoticeHeader+' '+data.message,
                                    'error'
                                    )
                                 //Nullify all fields
                                 document.getElementById("notice_header").value = "";
                                 document.getElementById("notice_data").value = "";
                                 document.getElementById("notice_date").value = "";
                                 document.getElementById("notice_end_date").value = "";
                                 document.getElementById("notice_gen").checked = false;
                                 document.getElementById("notice_emp").checked = false;
                                 document.getElementById("notice_std").checked = false;
                                 document.getElementById("notice_type").value = "";

                                 
                              }
                              
                                  
                          }
                            });
                            }

                        </script>

<?php include'footer.php'; ?>