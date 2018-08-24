<?php

	require("connection.php");
	$query = "SELECT * FROM `projects` WHERE category=1";
	$res = mysqli_query($conn, $query);
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Software</title>
		<link href="<?=$DIR ?>src/style.css" rel="stylesheet" type="text/css">
		<script src="<?=$DIR ?>src/jquery.js"></script>
	</head>
	<body>
		<div id="background" style="background-image: url('<?php
			$index = rand(0, mysqli_num_rows($res) - 1);
			$i = 0;
			$res = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($res)) {
				if ($i == $index) {
					echo $DIR.explode(",", $row["images"])[0];
					break;
				}
				$i++;
			}
				
		?>');">
		</div>
		<div id="header">
			<div id="title">
				<a href="<?=$DIR ?>index.php" class="menuLink"><?=$NAME;?></a>
			</div>
			<div id="menu">
				<a href="<?=$DIR ?>website.php" class="menuLink">Websites</a> |
				<a href="<?=$DIR ?>software.php" class="menuLink">Software</a> |
				<a href="<?=$DIR ?>publishments.php" class="menuLink">Publishments</a> |
				<a href="<?=$DIR ?>login.php" class="menuLink">Admin</a>
			</div>
			<div id="hamburger" onclick="toggleMenu()">
			&#9776;
			</div>
			<div id="mobileMenu">
				<a href="<?=$DIR ?>website.php" class="menuLink mobileMenuLink">Websites</a>
				<a href="<?=$DIR ?>software.php" class="menuLink mobileMenuLink">Software</a>
				<a href="<?=$DIR ?>publishments.php" class="menuLink mobileMenuLink">Publishments</a>
				<a href="<?=$DIR ?>login.php" class="menuLink mobileMenuLink">Admin</a>
			</div>
		</div>
		<div id="hook">
			<?php
				$i = 0;
				$res = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($res)) {
					if ($i == $index) {
						echo "<a class=\"hookLink\"href=\"#content{$row["id"]}\">Featured: {$row["title"]}</a>";
						break;
					}
					$i++;
				}
					
			?>
		</div>
		<?php
			$res = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($res)) {
				?>
				<div id="content<?=$row["id"]?>" class="anchor"></div>
				<div id="content<?=$row["id"]?>Text" class="body">
					<div class="bodyElem">
						<div class="contentTitle">
							<?=$row["title"]?>
						</div>
						<div class="contentBody">
							<div class="bodyImages">
								<?php
									$images = explode(",", $row["images"]);
									for($i = 0; $i < sizeof($images); $i++) {
										echo "<img class=\"bodyImage\" src=\"{$DIR}{$images[$i]}\" width=\"100%\" height=\"auto\" alt=\"\"/>";
									}
								?>
							</div>
							<div class="bodyText">
								<?=$row["content"]?>
							</div>
						</div>
					</div>
				</div><hr/>
			<?php } ?>
		
		
		<div id="footer">
		&copy; James Johnson 2017
		</div>
		
		<script src="<?=$DIR ?>src/script.js"></script>
		
	</body>
</html>