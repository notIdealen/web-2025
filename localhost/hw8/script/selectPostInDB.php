<?php
require 'scripts/connectDatabase.php';
// echo '<h1>Select in DB</h1>';
// phpinfo();
$con = connectDB();

function findPostInDB(PDO $con, int $id) : ?array {
	$query = <<<SQL
		SELECT
			*
		FROM post;
		-- WHERE created_by = 1
		SQL; 
	$statement = $con->query($query);
	
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	// $row = $statement->fetch(PDO::FETCH_ASSOC); 

	return $rows ?: null;
}

$contents = findPostInDB($con, 1);
// var_dump( $contents[1]);
// echo $contents->num_rows;

?>