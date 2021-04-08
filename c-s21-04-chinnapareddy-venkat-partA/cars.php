<?php
	require_once "config.php";
	$result = mysqli_query($link, 'select * from p_usedcar');
?>

<html>
<body>
<center>
<h3>Used Cars</h3>

<table border="0" cellpadding="5" style="border-collapse: collapse; ">
  <tbody>
    <tr style="border-bottom: 1px solid">
 		<th>Id</th>
		<th>UsedCar</th>
		<th>Model</th>
		<th>Year</th>
        <th>Zipcode</th>
	</tr>
	<?php while($product = mysqli_fetch_object($result)) { ?>
		<tr style="border-bottom: 2px solid">
			<td><?php echo $product->id; ?></td>
			<td><?php echo $product->usedcar; ?></td>
            <td><?php echo $product->model; ?></td>
			<td><?php echo $product->year; ?></td>
            <td><?php echo $product->zipcode; ?></td>	
		</tr>
	<?php } ?>
</tbody>
</table>
<p>

</body>
</html>

