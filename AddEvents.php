<?php include'header.php';?>
<title>Add Events | <?php echo $theader;?></title>
<style>
            .col-sm{
                padding: 5px;
                margin: 5px;
            }
</style>
<form id="form1" class="" method="post" action="EventsAdd">
                    <legend class="text-center text-muted alert header "> ADD EVENTS </legend>
            <div class="row">
                <div class="col-sm"><label for="event_name">Event Name :  </label><input type="text" class="form-control" name="event_name" id="event_name" /></div>
                <div class="col-sm"><label for="event_discription">Event Discription :  </label><textarea type="text" class="form-control" name="event_discription" rows="15" cols="45" maxlength="150" style="height: 100px;" id="event_discription" /> </textarea></div>
                <div class="col-sm"><label for="event_date">Event Date :  </label><input type="date" class="form-control" name="event_date" id="event_date" /></div>
            </div>
                    
                <div class="row">
                    <div class="col-sm"><label for="even_added_by">Even Added By :  </label><input type="text" class="form-control" readonly name="even_added_by" value="<?php echo $_SESSION['username']?>" id="even_added_by" /></div>
                    <div class="col-sm"><label for="academic_year">Academic Year :  </label><select name="academic_year" id="academic_year" class="form-control">

<option value="2021-2022">2021-2022</option>
<option value="2022-2023">2022-2023</option>
<option value="2023-2024">2023-2024</option>
<option value="2024-2025">2024-2025</option> 
<option value="2025-2026">2025-2026</option>          
</select></div>
                </div>
                        <div class="text-center pt-2">
                                    <button class="btn btn-success" type="submit">Add Event</button>
                        </div>

</form>

<?php include'footer.php';?>