<!DOCTYPE html>
<html>
<head>
    <title>TV Browse</title>



</head>
<body>
<input id='myInput' onkeyup='searchTable()' type='text'>

    <h1>TV Browse</h1>
	<table id="schedule" class="display">
	<thead>
	<tr>
	<th>Channel</th>
	<th>Time</th>
	<th>Title</th>
	</tr>
	</thead>
	<tfoot>
<?php

    // Load the XML file
    $xml = simplexml_load_file('/var/www/html/temp/tvquery/xmltv.xml');
	

  foreach ($xml->programme as $programme) {
    $title = (string) $programme->title;
    $start = (string) $programme['start'];
	$channel = (string) $programme['channel'];
	
    // List Show information
		echo "<TR>";
        
  
		echo "<td>".$channel."</td> ";
        echo "<td>" . date("D M d h:i:s",(strtotime($start)))." </td>";
	    echo "<td> " . $title . " </td>";
		echo "</TR>";
        
  
   }
echo "</tfoot></table>"; 
echo "Last time:".$start."<BR>";

?>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("schedule");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
</body>
</html>
