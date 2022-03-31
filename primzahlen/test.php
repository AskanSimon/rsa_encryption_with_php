<pre>
<?php


// Zahlen die nur durch sich selbst und eins teilbar sind

$p = [];

for ($i = 1; $i < 10000; $i++) {
	$p[$i] = 0;
}

foreach($p as $i => $v) {

	if ($i == 1) {
		continue;
	}

	foreach($p as $j => $w) {
		if ($j == 1) {
			continue;
		}
		if ($i == $j) {
			continue;
		}

		//print("if ($i % $j == ".($i % $j).")<br>");
		if ($i % $j == 0){
			unset($p[$i]);
		}
	}
}

print_r($p);