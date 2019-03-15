<?php
if(isset($_POST['search']))
{
$valueToSearch=$_POST['valueToSearch'];
$query="SELECT * FROM `water1` WHERE CONCAT(`id`, `Crops`, `Tmax`, `Tmin`, `Humidity`, `Wind speed`, `Rainfall`, `Solar radiation`, `Sand Type`, `Growth Stage`)LIKE '%".$valueToSearch."%'";
$search_result=filterTable($query);
}
else{
$query="SELECT * FROM `water1`";
$search_result=filterTable($query);
}

function filterTable($query)
{
$connect = mysqli_connect("localhost","root","","syrus1");
if(mysqli_connect_error())
{
	die("Error");
}
$filter_Result = mysqli_query($connect, $query);
return $filter_Result;
}
?>

<html>
<head>
<title>PHP table</title>
<style>
table,tr,th,td{
border: 1px solid black;
}
</style>
</head>
<body>
<form>
<input type="text" name="valueToSearch"  placeholder="Value to search">
<input type="submit" name="Search"  value="Filter"><br><br>
<table>
<tr>
<th>id</th>
<th>Crops</th>
<th>Tmax</th>
<th>Tmin</th>
<th>Humidity</th>
<th>Wind speed</th>
<th>Rainfall</th>
<th>Solar radiation</th>
<th>Sand Type</th>
<th>Growth Stage</th>
</tr>
<?php while($row=mysqli_fetch_array($search_result)):?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["Crops"];?></td>
<td><?php echo $row["Tmax"];?></td>
<td><?php echo $row["Tmin"];?></td>
<td><?php echo $row["Humidity"];?></td>
<td><?php echo $row["Wind speed"];?></td>
<td><?php echo $row["Rainfall"];?></td>
<td><?php echo $row["Solar radiation"];?></td>
<td><?php echo $row["Sand Type"];?></td>
<td><?php echo $row["Growth Stage"];?></td>
</tr>
<?php endwhile;?>
</table>
</form>
</body>
</html>