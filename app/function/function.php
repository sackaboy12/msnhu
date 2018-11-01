<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
function remake_url_with_get($key='',$val=''){
	//return '';
	$arr = $_GET;
	
	if (in_array($val, $arr)){
		unset($arr[$key]);
	}elseif($key){
		$arr[$key]=$val;
	}
	if($arr){
		$get_str_data  = "";
		$arr=array_unique($arr);
		foreach($arr as $key => $value)
		{
			$get_str_data .= $key.'='.$value.'&';
		}
		return $get_str_data = substr($get_str_data,0,-1);
	}else{
		return '';
	}
}

function compactString($str,$len = 30){
	if(strlen($str) > 30){
		return substr($str,0,$len-ceil($len/4)).'....'.substr($str,-ceil($len/4));
	}
	return $str;
}
function paginations($t,$present=1,$url='')
{
	$r = '';
	$trc = $present - 1;
	$sau = $present + 1;
	$break = 0;
	if(!is_numeric($t) || !is_numeric($present))
		return $r;
	$r.='<ul class="pagination">';    
	    if($present == 1)
	    	$r.='<li class="page-item disabled"><span class="page-link">‹</span></li>';
	    else
	    	$r.='<li class="page-item"><a class="page-link" href="'.$url.'&amp;page='. $trc .'" rel="prev" >‹</a></li>';
	    if($present > 4){
	    	$r.= '<li class="page-item"><span class="page-link">...</span></li>';
	    	$i = $present-3;
	    }
	    else $i = 1;

	    for ($i; $i <= intval($t); $i++) { 
	    	if($break == 10)
	    		break;
	    	if($present==$i)
	    		$r.= '<li class="page-item active"><span class="page-link">'.$i.'</span></li>';
	    	else
	    		$r.= '<li class="page-item"><a class="page-link" href="'.$url.'&amp;page='.$i.'">'.$i.'</a></li>';	    	
	    	$break++;
	    }
	    if($t - $present > 5)
	    	$r.= '<li class="page-item"><span class="page-link">...</span></li>';


	    if($present == $t)
	    	$r.='<li class="page-item disabled"><span class="page-link">›</span></li>';
	    else
			$r.='<li class="page-item"><a class="page-link" href="'.$url.'&amp;page='. $sau .'" rel="next">›</a></li>';
    $r.='</ul>';
    return $r;
}
function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');   

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}

function resetNumber($int)
{
	return preg_replace('/\.|\,|\s/', '', $int);

}
function setRight($i) {
    if($i == 0)
    	return "Thực Tập";
    if($i == 1)
    	return "Thành Viên";
    if($i == 2)
    	return "Thành Viên C2";
    if($i == 3)
    	return "Thành Viên C3";
    if($i == 4)
    	return "Quản Lý";
    if($i == 5)
    	return "Admin";
} 
function domain() {
    return 'http://msnhu.com';
} 
function this_url() {
    $url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://';
    $url .= isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST');
    $url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
    $url = str_replace('%20',' ',$url);
    return $url;
} 


function url_array() {
    $web_url = domain();
    $web_url = str_replace('http://','',$web_url);
    $web_url = str_replace('https://','',$web_url);
    $web_url = str_replace('www.','',$web_url);
    $url = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : getenv('HTTP_HOST');
    $url .= isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : getenv('REQUEST_URI');
    $url = str_replace('www.','',$url);
    $url = str_replace('.html','/',$url);
    $url = str_replace($web_url,'',$url);

    $url = explode('/',$url);
    $url_array = array();
    foreach ($url as $array) {
        if ($array!='') $url_array[] = $array;
    }
    return $url_array;
}

function formatTime($time, $type = 1) {
    switch($type){
        case '1':
            $time = date('d/m/Y H:i',$time);
            break;
        case '2':
            $time = date('d/m/Y',$time);
            break;
        case '3':
            $time = gmstrftime('%d/%m',$time);
            break;
		case '4':
            $time = date('H:i:s - ',$time);
            break;
		case '5':
            $time = gmstrftime('Ngày %d tháng %m năm %Y',$time);
            break;
		case '6':
            $time = gmstrftime('%Y-%m-%d',$time);
            break;
		case '7':
            $time = gmstrftime('%d',$time);
            break;
		case '8':
            $time = gmstrftime('%m',$time);
            break;
		case '9':
            $time = date("w",$time); // số thứ tự cửa thứ trong tuần chủ nhât = 0
            break;
		case '10':
            $time = gmstrftime('%Y',$time);
            break;
		case '11':
            $time = gmstrftime('%m/%d/%Y',$time);
            break;
		case '12':
            $time = date('d/m/Y H:i:s',$time);
            break;
		case '13':
            $time = gmstrftime('%Y/%m/%d %H:%M:%S',$time);
            break;
        default :
            $time = gmstrftime('Ngày %d tháng %m năm %Y',$time);
            break;
    }
    return $time;
}

function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}

function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae'=>'ǽ',
		'AE'=>'Ǽ',
		'c'=>'ć|ç|ĉ|ċ|č',
		'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'=>'đ|ď',
		'D'=>'Đ|Ď',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'=>'ƒ',
		'F'=>'',
		'g'=>'ĝ|ğ|ġ|ģ',
		'G'=>'Ĝ|Ğ|Ġ|Ģ',
		'h'=>'ĥ|ħ',
		'H'=>'Ĥ|Ħ',
		'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij'=>'ĳ',	  
		'IJ'=>'Ĳ',
		'j'=>'ĵ',	  
		'J'=>'Ĵ',
		'k'=>'ķ',	  
		'K'=>'Ķ',
		'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
		'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe'=>'œ',
		'OE'=>'Œ',
		'n'=>'ñ|ń|ņ|ň|ŉ',
		'N'=>'Ñ|Ń|Ņ|Ň',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'=>'ŕ|ŗ|ř',
		'R'=>'Ŕ|Ŗ|Ř',
		's'=>'ß|ſ|ś|ŝ|ş|š',
		'S'=>'Ś|Ŝ|Ş|Š',
		't'=>'ţ|ť|ŧ',
		'T'=>'Ţ|Ť|Ŧ',
		'w'=>'ŵ',
		'W'=>'Ŵ',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'=>'ź|ż|ž',
		'Z'=>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}
function convert_number_to_words( $number )
{
	$hyphen = ' ';
	$conjunction = '  ';
	$separator = ' ';
	$negative = 'âm ';
	$decimal = ' phẩy ';
	$dictionary = array(
		0 => 'Không',
		1 => 'Một',
		2 => 'Hai',
		3 => 'Ba',
		4 => 'Bốn',
		5 => 'Năm',
		6 => 'Sáu',
		7 => 'Bảy',
		8 => 'Tám',
		9 => 'Chín',
		10 => 'Mười',
		11 => 'Mười một',
		12 => 'Mười hai',
		13 => 'Mười ba',
		14 => 'Mười bốn',
		15 => 'Mười năm',
		16 => 'Mười sáu',
		17 => 'Mười bảy',
		18 => 'Mười tám',
		19 => 'Mười chín',
		20 => 'Hai mươi',
		30 => 'Ba mươi',
		40 => 'Bốn mươi',
		50 => 'Năm mươi',
		60 => 'Sáu mươi',
		70 => 'Bảy mươi',
		80 => 'Tám mươi',
		90 => 'Chín mươi',
		100 => 'trăm',
		1000 => 'ngàn',
		1000000 => 'triệu',
		1000000000 => 'tỷ',
		1000000000000 => 'nghìn tỷ',
		1000000000000000 => 'ngàn triệu triệu',
		1000000000000000000 => 'tỷ tỷ'
	);

	if( !is_numeric( $number ) )
	{
		return false;
	}

	if( ($number >= 0 && (int)$number < 0) || (int)$number < 0 - PHP_INT_MAX )
	{
		// overflow
		trigger_error( 'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING );
		return false;
	}

	if( $number < 0 )
	{
		return $negative . convert_number_to_words( abs( $number ) );
	}

	$string = $fraction = null;

	if( strpos( $number, '.' ) !== false )
	{
		list( $number, $fraction ) = explode( '.', $number );
	}

	switch (true)
	{
		case $number < 21:
			$string = $dictionary[$number];
			break;
		case $number < 100:
			$tens = ((int)($number / 10)) * 10;
			$units = $number % 10;
			$string = $dictionary[$tens];
			if( $units )
			{
				$string .= $hyphen . $dictionary[$units];
			}
			break;
		case $number < 1000:
			$hundreds = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if( $remainder )
			{
				$string .= $conjunction . convert_number_to_words( $remainder );
			}
			break;
		default:
			$baseUnit = pow( 1000, floor( log( $number, 1000 ) ) );
			$numBaseUnits = (int)($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = convert_number_to_words( $numBaseUnits ) . ' ' . $dictionary[$baseUnit];
			if( $remainder )
			{
				$string .= $remainder < 100 ? $conjunction : $separator;
				$string .= convert_number_to_words( $remainder );
			}
			break;
	}

	if( null !== $fraction && is_numeric( $fraction ) )
	{
		$string .= $decimal;
		$words = array( );
		foreach( str_split((string) $fraction) as $number )
		{
			$words[] = $dictionary[$number];
		}
		$string .= implode( ' ', $words );
	}

	return $string;
}


?>