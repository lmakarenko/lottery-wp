<?php

function txt_a($d){
    echo '<textarea style="width:300px;height:300px;">'; print_r($d); echo '</textarea>';
}

function wcBalance($params) {

	$params['number'] = (string) floor(floatval($params['number']));
	
	if (isset($params['diz']) && $params['diz']==2) {
	
		$out = "";
		for ($x=strlen($params['number'])-1;$x>-1;$x--) {
			$n = $params['number']{$x};
			$out .= "<span class=\"number\">{$n}<span class=\"mask\">&nbsp;</span></span>";
		}
		
	}else {
	
		$out="<div id='balance' class=\"balance-number\">";

		for ($x=0;$x<strlen($params['number']);$x++) {

			$n = $params['number']{$x};

			$out.="<span>$n</span>";
		}

		$out.="&nbsp;R </div>";
	}

	return $out;
}