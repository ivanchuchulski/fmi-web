<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ex-03</title>

		<style>
			th {
				color: black;
				font-size: 40px;
			}
			td {
				color: green;
				font-size: 20px;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<h1>Multiplication table</h1>
		<table border="1" style="height: 400px; width: 400px;">
		<?php
			for ($rows=1; $rows <= 9; $rows++) { 
				echo '<tr>';
				for ($cols=1; $cols <= 9; $cols++) { 
					if ($rows === 1) {
						echo "<th>"."$cols"."</th>";
					}

					else if ($cols === 1) {
						echo "<th>"."$rows"."</th>";
					}

					else {
						echo "<td>";
						echo $rows * $cols;
						echo"</td>";
					}
				}
				echo '</tr>';
			}
		?>
		</table>
	</body>
</html>