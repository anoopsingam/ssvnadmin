<!DOCTYPE html>
<html>
<body>

<div id="demo">
<h2>The XMLHttpRequest Object</h2>
<input type="text" name="sid" id="sid" class="">
<button type="button" onclick="loadDoc()">Change Content</button>
</div>

<script>
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  const sid= document.getElementById("sid").value;
  xhttp.open("GET", "http://localhost/ssvnerp/api/get_api?sid="+sid, true);
  xhttp.send();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	const data = JSON.parse(this.responseText);
      document.getElementById("demo").innerHTML = data.result  + "<br>" + data.status+" <br>"+data.data[0].student_name;
    }
  };
}
</script>

</body>
</html>