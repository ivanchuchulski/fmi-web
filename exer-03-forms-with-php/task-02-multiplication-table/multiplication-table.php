<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ex-03</title>
		<style>
			table {
				height: 400px;
				width: 400px;
				border: solid;
			}
			th {
				color: black;
				background-color: azure;
				font-size: 40px;
			}
			td {
				color: black;
				background-color: aquamarine;
				font-size: 20px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Multiplication table</h1>
		<table border="1">
		<?php
			for ($row=1; $row <= 9; $row++) { 
				echo '<tr>';
				for ($column=1; $column <= 9; $column++) { 
					if ($row === 1) {
						echo "<th>"."$column"."</th>";
					}

					else if ($column === 1) {
						echo "<th>"."$row"."</th>";
					}

					else {
						echo "<td>".$row * $column."</td>";
					}
				}
				echo '</tr>';
			}
		?>
		</table>
	</body>
</html>