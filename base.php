<?php
	$step = 1;
	$directionIndicator = 0;
	$currentpage = 19;
	$string = $currentpage;
	$lastPage = 20;
	$kayma = 0;
	$indicatorStopper = 0;
	// 0 negative direction
	// 1 pozitive direction
	while($step <= 10){ // totalde 7 buton olacaktır.
		$degisim = ($indicatorStopper == 0) ? ceil($step/2) : $step;
		if($directionIndicator == 0){
			$pageNum = $currentpage-$degisim+$kayma;
			if($indicatorStopper == 1 && $pageNum<1) break;
			if($pageNum<1){
				$indicatorStopper = 1;
				$directionIndicator = ($directionIndicator+1)%2;
				$kayma = (is_int($step/2) === false) ? (ceil($step/2)-1) : 0;
				continue;
			}
			$string = $pageNum." ".$string;
		}else{
			$pageNum = $currentpage+$degisim-$kayma;
			if($indicatorStopper == 1 && $pageNum>$lastPage) break;
			if($pageNum>$lastPage){
				$indicatorStopper = 1;
				$directionIndicator = ($directionIndicator+1)%2;
				$kayma = (is_int($step/2)) ? (ceil($step/2)-1) : 0;
				continue;
			}
			$string = $string." ".$pageNum;
		}
		if($indicatorStopper == 0) $directionIndicator = ($directionIndicator+1)%2;
		$step++;
	}
	echo $string;
?>
