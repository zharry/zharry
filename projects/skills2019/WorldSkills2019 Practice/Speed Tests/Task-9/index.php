<!DOCTYPE html>
<html>
<head>
	<title>PHP Array Comparing</title>
</head>
<body>

	<?php

    // return a new array containing the common elements of the given two arrays.
	function compareArrays($a1, $a2){
		//put your code here
        $ret = array();
        for ($i = 0; $i < sizeof($a1); $i++) {
            for ($j = 0; $j < sizeof($a2); $j++) {
                if ($a1[$i] == $a2[$j]) {
                    $ret[] = $a1[$i];
                }
            }
        }
        return json_encode($ret);
	}

	echo(compareArrays(['red', 'green', 'yellow'], ['red', 'green', 'black']));
	echo(compareArrays(['a', 'b', 'c', 'd', 'e'], ['a', 'b', 'c', 'd', 'e']));
	echo(compareArrays(['a'], ['a', 'b']));
	echo(compareArrays(['a'], ['a', 'c']));
	echo(compareArrays(['a', 'ac', 'eb'], ['a', 'ca', 'be']));
	echo(compareArrays(['a', 'b', 'c'], ['a', 'b', 'c']));

	?>

</body>
</html>
