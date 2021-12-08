<!doctype html>
<html>
	<head>
	</head>
	<body>
		<?php
		$cfg['file_name'] = 'plik.log'; //plik na logi
		$tmp['date'] = date('Y-m-d H:i:s'); //format daty
		$tmp['data'] = "[".$tmp['date']."] Jakub Suchanowski port = 80 \r\n"; //informacjie do wypisania

		//obsluga pliku
		$tmp['handle']['file'] = fopen('./'.$cfg['file_name'], 'a');
		if($tmp['handle']['file'])
		{
 
		 flock($tmp['handle']['file'], 2);
		 fputs($tmp['handle']['file'], $tmp['data']);
		 flock($tmp['handle']['file'], 3);
		 fclose($tmp['handle']['file']);
		}
		else
		{
		 echo 'Cos poszlo nie tak';
		}

		$ip = $_SERVER['REMOTE_ADDR']; //pobiera ip

		echo "adres ip = ".$ip.""; // wypisanie na stronie adresu ip
		$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip); //api json
		$ipInfo = json_decode($ipInfo); //konwersja json
		$timezone = $ipInfo->timezone;
		date_default_timezone_set($timezone);//ustawia strefe czasowa
		
		echo "<br>".date('Y-m-d H:i:s'); //wypisanie daty
		?>
	</body>
</html>
