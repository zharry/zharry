<?php

	require("connection.php");
	$query = "SELECT * FROM `projects`";
	$res = mysqli_query($conn, $query);
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Websites</title>
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
						$page = "";
						if ($row["category"] == 0) {
							$page = "website.php";
						} else if ($row["category"] == 1) {
							$page = "software.php";
						} else {
							$page = "publishments.php";
						}
						echo "<a class=\"hookLink\"href=\"{$DIR}{$page}#content{$row["id"]}\">Featured Project: {$row["title"]}</a>";
						break;
					}
					$i++;
				}
					
			?>
		</div>
		<div id="aboutMe" class="anchor"></div>
		<div id="aboutMeText" class="body">
			<div class="bodyElem">
				<div class="contentTitle">
					About Me
				</div>
				<div class="contentBody">
					<div class="bodyImagesIndex">
						<img class="bodyImage" src="<?=$DIR ?>images/profile.png" width="100%" height="auto"/>
					</div>
					<div class="bodyTextIndex">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris metus metus, fringilla sit amet commodo ut, varius nec nisi. Cras in sagittis dui, et scelerisque nisl. Fusce at pellentesque erat. Integer luctus mauris augue, ut fringilla leo vehicula id. Fusce luctus nibh mi, vitae placerat neque luctus sit amet. Integer diam arcu, scelerisque vitae nunc eu, molestie faucibus nisi. Ut et diam ut ligula eleifend condimentum eleifend ornare tellus. Proin tristique scelerisque erat. Sed lorem tortor, interdum sed luctus eu, malesuada at nisl. Integer nunc lacus, ultricies vel nunc eu, condimentum placerat sapien. In non commodo augue. In hac habitasse platea dictumst. Fusce faucibus aliquam arcu, ut lacinia est dapibus vitae. Integer tincidunt ligula vitae dui dictum, ut cursus diam volutpat. Vestibulum ligula justo, adipiscing vestibulum turpis id, elementum viverra mi. Praesent auctor elit vel sapien mollis posuere.

In cursus, nisi et suscipit auctor, dolor nulla interdum mauris, a lacinia libero augue id lacus. Ut eget sapien lectus. In at mattis turpis. Nam nec sem in ipsum molestie facilisis quis vel nulla. Fusce elementum augue in mattis gravida. Suspendisse potenti. Vestibulum sodales nibh lectus, eu tincidunt purus elementum quis. Nullam non cursus elit. Phasellus eu tortor eget sem pharetra sagittis vel ac justo. Phasellus eget ultrices dolor. Proin convallis tellus non arcu faucibus eleifend. Morbi nec tempus arcu. Nullam tempor, metus quis convallis venenatis, nisl enim lobortis ipsum, id convallis quam sapien quis est. Phasellus sagittis, sem a pretium bibendum, eros ipsum varius magna, sed luctus felis erat ac nulla. Integer quis turpis eu dolor venenatis tincidunt eu nec mi. Aenean tempus, mauris sed blandit euismod, nibh turpis tristique nulla, in venenatis libero nibh at neque.
					</div>
				</div>
			</div>
		</div><hr/>		
		
		<div id="footer">
		&copy; James Johnson 2017
		</div>
		
		<script src="<?=$DIR ?>src/script.js"></script>
		
	</body>
</html>