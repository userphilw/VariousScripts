<?php
// Check if the form is submitted
if (isset($_POST['search'])) {
    // Get the search query from the form
    $searchQuery = $_POST['searchQuery'];

    // Load the XML file
    $xml = simplexml_load_file('/var/www/html/temp/tvquery/xmltv.xml');
	

  foreach ($xml->programme as $programme) {
    $title = (string) $programme->title;
    $start = (string) $programme['start'];
	$channel = (string) $programme['channel'];
	
    // Perform the search
    if (strpos($title, $searchQuery) !== false) {
        echo "Title: " . $title . " ,";
        echo "Start Time: " . $start." ,";
		echo "Channel:".$channel." ";
		echo "<BR>";
        
    }
	
   }
echo "Last time:".$start."<BR>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>TV Search</title>
</head>
<body>
    <h1>TV Search</h1>
    <form method="POST" action="">
        <label for="searchQuery">Search:</label>
        <input type="text" name="searchQuery" id="searchQuery" required>
        <button type="submit" name="search">Search</button>
    </form>
</body>
</html>
