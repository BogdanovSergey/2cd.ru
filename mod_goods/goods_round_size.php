<?
	function GOO_round_size($size) {
		global $MY;
		global $WORDS;
		$etalon = $size;
		if($MY[round_all_sizes][0]) {
		    $size = round($size/$MY[round_all_sizes][0],$MY[round_all_sizes][1]);
		    if($size<1) {
			    $size = round($etalon/1024,1);
			    if($size==0) { $size=0;} else 
			    { $size = "$size $WORDS[size_KB]";}
		    } else {
			$size = "$size $WORDS[size_MB]";
		    }
		}
		return $size;
	}
	
	function GOO_round_product_size($size) {
		global $MY;
		global $WORDS;
		$etalon = $size;
		if($MY[round_all_goods_sizes][0]) {
		    $size = round($size/$MY[round_all_goods_sizes][0],$MY[round_all_goods_sizes][1]);
		    if($size<1) {
			    $size = round($etalon/1024,1);
			    if($size==0) { $size=0;} else 
			    { $size = "$size $WORDS[size_KB]";}
		    } else {
			$size = "$size $WORDS[size_MB]";
		    }
		}
		return $size;
	}

	function GOO_round_CD650($size) {
		global $MY;
		global $WORDS;
		$etalon = $size;
		if($MY[round_all_sizes][0]) {
		    #$size = round($size/(650*1048576),1);
		    $size = ceil($size/$MY[disk650_bytes]);
#		    if($size<1) {
#			    $size = round($etalon/1024,1);
#			    if($size==0) { $size=0;} else 
#			    { $size = "$size";}
#		    } else {
#			$size = "$size";
#		    }
		}
		return $size;
	}


?>