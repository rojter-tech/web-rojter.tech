<?php
function isIPv6($ip)
{
	if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
		return true;
	}
	return false;
}
    $webAccessIP = 'rojter.tech';
    if($_SERVER['HTTPS'] && exec('/sbin/getcfg Stunnel Enable -d 1') == '1'){
		$protocol='https';
		$webAccessPort = '11443';
	}
	else
        $protocol='https';
        $webAccessPort = '11443';
    
	if(isIPv6($webAccessIP))
		$webAccessUrl = $protocol.'://['.$webAccessIP .']:'.$webAccessPort.'/';
	else
		$webAccessUrl = $protocol.'://'.$webAccessIP .':'.$webAccessPort.'/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta http-equiv="expires" content="0">
<script type='text/javascript'>
	location.href = '<?=$webAccessUrl?>';
</script>
	</head>
</html>

