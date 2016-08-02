<?php

function txt_a($d){
    echo '<textarea style="width:300px;height:300px;">'; print_r($d); echo '</textarea>';
}

function smarty_make_timestamp($string)
{
    if (empty($string)) {
        // use "now":
        return time();
    } elseif ($string instanceof DateTime) {
        return $string->getTimestamp();
    } elseif (strlen($string) == 14 && ctype_digit($string)) {
        // it is mysql timestamp format of YYYYMMDDHHMMSS?
        return mktime(substr($string, 8, 2), substr($string, 10, 2), substr($string, 12, 2),
                      substr($string, 4, 2), substr($string, 6, 2), substr($string, 0, 4));
    } elseif (is_numeric($string)) {
        // it is a numeric string, we handle it as timestamp
        return (int) $string;
    } else {
        // strtotime should handle it
        $time = strtotime($string);
        if ($time == - 1 || $time === false) {
            // strtotime() was not able to parse $string, use "now":
            return time();
        }

        return $time;
    }
}

function smarty_date_format($string, $format = null, $default_date = '', $formatter = 'auto')
{
    if ($format === null) {
        $format = '%b %e, %Y';
    }
    if ($string != '' && $string != '0000-00-00' && $string != '0000-00-00 00:00:00') {
        $timestamp = smarty_make_timestamp($string);
    } elseif ($default_date != '') {
        $timestamp = smarty_make_timestamp($default_date);
    } else {
        return;
    }
    if ($formatter == 'strftime' || ($formatter == 'auto' && strpos($format, '%') !== false)) {
        if (DIRECTORY_SEPARATOR == '\\') {
            $_win_from = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
            $_win_to = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');
            if (strpos($format, '%e') !== false) {
                $_win_from[] = '%e';
                $_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
            }
            if (strpos($format, '%l') !== false) {
                $_win_from[] = '%l';
                $_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
            }
            $format = str_replace($_win_from, $_win_to, $format);
        }

        return strftime($format, $timestamp);
    } else {
        return date($format, $timestamp);
    }
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

class tools {
    
    static $xVals = Array(
        0 => 0,
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 'a',
        11 => 'b',
        12 => 'c',
        13 => 'd',
        14 => 'e',
        15 => 'f',
        16 => 'g',
        17 => 'h',
        18 => 'i',
        19 => 'j',
        20 => 'k',
        21 => 'l',
        22 => 'm',
        23 => 'n',
        24 => 'o',
        25 => 'p',
        26 => 'r',
        27 => 's',
        28 => 't',
        29 => 'u',
        30 => 'v',
        31 => 'w',
        32 => 'x',
        33 => 'y',
        34 => 'z',
        35 => '$',
        36 => '@'
    );
    
    static function dec2x($dec) {
        $sign = ""; // suppress errors 
        
        if ($dec < 0) {
           $sign = "-";
           $dec = abs($dec);
        }

        $h = '';

        do {
            $h = self::$xVals[($dec % 36)] . $h;
            $dec /= 36;
        } while ($dec >= 1);

        return $sign.$h;
    }
    
    
    static function x2dec($x) {
        $hex=array_flip(self::$xVals);

        $decval = '0';
        $number = strrev($x);
        for($i = 0; $i < strlen($number); $i++) {
            $decval = bcadd(bcmul(bcpow('36',$i,0),$hex[$number{$i}]), $decval);
        }

        return $decval;
    }
    
}