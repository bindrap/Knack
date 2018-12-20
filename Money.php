<!DOCTYPE html>
<html>

<head>
	<title>Money PHP File</title>
	<link rel="stylesheet" href="money.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php // sectiona.php
  require_once 'login.php' ;
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  if (isset($_GET['Date'])   &&
      isset($_GET['Money_Spent'])    &&
      isset($_GET['Money_Made']) &&
      isset($_GET['Revenue'])     &&
      isset($_GET['User']))
  {
    $Date   = get_post($conn, 'Date');
    $Money_Spent    = get_post($conn, 'Money_Spent');
    $Money_Made = get_post($conn, 'Money_Made');
    $Revenue     = get_post($conn, 'Revenue');
    $User     = get_post($conn, 'User');
    $query    = "INSERT INTO Money VALUES" .
      "('$Date', '$Money_Spent', '$Money_Made', '$Revenue', '$User')";
    $result   = $conn->query($query);

  	if (!$result) echo "INSERT failed: $query<br>" .
      $conn->error . "<br><br>";
  }

  echo <<<_END
  <form action="Money.php" method="GET"><pre>    <font color="white">Date         </font><input type="text" name="Date">
     <font color="white">Money_Spent</font> <input type="text" name="Money_Spent">
  <font color="white">Money_Made    </font> <input type="text" name="Money_Made">
      <font color="white">Revenue   </font> <input type="text" name="Revenue">
     <font color="white">User       </font> <input type="text" name="User">
           <input type="submit" value="ADD RECORD">
  </pre>
  </form>
_END;
  
  $query  = "SELECT * FROM Money " ;
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
   echo <<<_END
  <table style="width:100%">
  <caption><font color="white">Table to store spending habits</font></caption>
  <tr>
    <th>Date</th>
    <th>Money Spent</th> 
    <th>Money Made</th> 
    <th>Revenue</th>
	<th>User</th>
	<th><input name="checkAll" value="1" type="checkbox" id="checkAll"></th>
  </tr>
_END;
  for ($j = 0 ; $j < $rows ; ++$j){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
 ?>
    <tr>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
					<td><?php echo $row[4]?></td>
					<td><input type="checkbox" name="chk[]" id="checkbox" value=<?php echo $row[4];?>/></td>				
    </tr>
   <?php
  }
  
  if(isset($_GET['submit'])){
		$checkbox = $_GET['checkbox'];
		echo $checkbox;
		for($i=0;$i<count($checkbox);$i++){
			$del_id = $checkbox[$i];
			echo $del_id;
			$sql = "DELETE FROM links WHERE User='$del_id'";
			$result = mysqli_query($db, $sql);
		}
		// if successful redirect to Money.php 
		if($result){
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=Money.php\">";
		}
	}
  $result->close();
  $conn->close();
  
  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_GET[$var]);
  }
?>

<body>
	<h1 style="color:white;" style="text-align:left;"> <font color="white">IN Progress </font></h1>
	<form><input type="submit" name="submit" value="delete"/></form>
	<script>
$("#checkAll").click(function(){
   $('input:checkbox').not(this).prop('checked', this.checked);
});
  
  </script>
</body>
</html>