<?

	$BANNERS['rand']	=	rand(0,1000000);
	$BANNERS['rand2']	=	$BANNERS['rand']+1;
	$BANNERS['rand3']	=	$BANNERS['rand']+2;

	function get_time() {
		$date = localtime();
                if($date[3]<10){$date[3]="0$date[3]";}
                if($date[4]<10){$date[4]="0".$date[4];}
                $date[5]+=1900;
                if($date[0]<10){$date[0]="0$date[0]";}
                if($date[1]<10){$date[1]="0$date[1]";}
                if($date[2]<10){$date[2]="0$date[2]";}
		switch($date[4]) {
		case "00":	$date[4] = "������";	break;
		case "01":	$date[4] = "�������";	break;
		case "02":      $date[4] = "����";	break;
                case "03":      $date[4] = "������";    break;
                case "04":      $date[4] = "���";       break;
                case "05":      $date[4] = "����";      break;
                case "06":      $date[4] = "����";      break;
                case "07":      $date[4] = "������";    break;
                case "08":      $date[4] = "��������";  break;
                case "09":      $date[4] = "�������";   break;
                case "10":      $date[4] = "������";    break;
                case "11":      $date[4] = "�������";   break;
		}
		return $date[3].' '.$date[4].' '.$date[5].', '.$date[2].':'.$date[1].':'.$date[0];
	}

?>
