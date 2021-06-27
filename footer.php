</div>

<footer style="padding-top: 20px;">
    <div class="footer clearfix mb-0 text-muted">
    <small class="text-dark">
    <center>
    <i class="fa fa-copyright" aria-hidden="true"></i> Copyrights <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date("Y");?> Designed & Developed by <a target="_blank" style="text-decoration: none;" href="https://starktechlabs.in"><strong>Stark Tech Innovative Labs</strong></a> With <span class="text-danger"><i class="bi bi-heart"></i></span> <br>
        Device Info :[<span id="info"></span> <?php echo "Protocol :-".$_SERVER['SERVER_PROTOCOL']?>]
       <!-- <br><?php  print_r($_SESSION) ; echo session_id();?> -->

    </center>
</small>
<script>
document.getElementById("info").innerHTML = navigator.appVersion;
</script>
</footer>
</div>
</div>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>  var x = document.title;
  document.getElementById("demo").innerHTML = x;</script></h3>
<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="assets/js/pages/dashboard.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>