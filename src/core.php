<?php

/*
Davy Hoyau
The objective is to build the shortest Api system
*/

//lib
function pr($p){print_r($p);}
function get($k){return filter_input(INPUT_GET,$k);}
function post($k){return filter_input(INPUT_POST,$k);}
//function img($d,$p=''){return '<img src="'.$d.'" width="'.$p.'" />';}
//function get_json($f){$d=file_get_contents($f); return json_decode($d,true);}

//mysql
function sql(){
	return new PDO("mysql:dbname=ring;host=localhost",'root','dev',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND=>'SET CHARACTER SET UTF8']);}		

class city{

	static function get(){$pdo=sql();
		$stmt=$pdo->query('select city_id,city_label,country from city order by city_label');
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);}

	static function post(array $r){$pdo=sql();
		['city_label'=>$city_label,'country'=>$country]=$r;
		$sql="INSERT INTO city (country, city_label) VALUES (:country, :city_label)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':country',$country);
		$stmt->bindValue(':city_label',$city_label);
		$inserted=$stmt->execute();
		return $inserted?'ok':'ko';}

	static function del(int $id){$pdo=sql();
		$sql='DELETE FROM city WHERE city.city_id = ? ';
		$stmt=$pdo->prepare($sql);
		$deleted=$stmt->execute([$id]);
		return $deleted?'ok':'ko';}
}

class weather{

	static function get_all(){$pdo=sql();
		$stmt=$pdo->prepare('select weather_id,weather.city_id,city_label from weather inner join city on weather.city_id=city.city_id');
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);}

	static function get(int $id){$pdo=sql();
		$stmt=$pdo->prepare('select weather.city_id,temperature,weather,precipitation,humidity,wind,city_label from weather inner join city on weather.city_id=city.city_id where weather.city_id = ?');
		$stmt->execute([$id]);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);}

	static function post(int $city_id, array $r){$pdo=sql();
		$sql = "INSERT INTO weather (city_id, temperature, weather, precipitation, humidity, wind, date) VALUES (:city_id, :temperature, :weather, :precipitation, :humidity, :wind, :date)";
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':city_id',$city_id,PDO::PARAM_INT);
		$stmt->bindValue(':temperature',$r['temperature'],PDO::PARAM_INT);
		$stmt->bindValue(':weather',$r['weather'],PDO::PARAM_STR);
		$stmt->bindValue(':precipitation',$r['precipitation'],PDO::PARAM_INT);
		$stmt->bindValue(':humidity',$r['humidity'],PDO::PARAM_INT);
		$stmt->bindValue(':wind',$r['wind'],PDO::PARAM_INT);
		$stmt->bindValue(':date',date('Y-m-d H:i:s'),PDO::PARAM_STR);
		$inserted=$stmt->execute();
		return $inserted?'ok':'ko';}

	static function del(int $id){$pdo=sql(); echo $id;
		$sql='DELETE FROM weather WHERE weather_id = ? ';
		$stmt=$pdo->prepare($sql);
		$deleted=$stmt->execute([$id]);
		return $deleted?'ok':'ko';}
}

?>