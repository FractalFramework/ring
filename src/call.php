<?php

//called by ajax
require 'core.php';

//gets
$action=get('action');
$city_id=get('city_id');
$weather_id=get('weather_id');

//posts
$posts=$_POST??[]; //pr($posts);

if($action){
	switch($action){
		case('get_cities'):$res=city::get(); break;
		case('post_city'):$res=city::post($posts); break;
		case('del_city'):$res=city::del($city_id);break;
		case('get_weather'):$res=weather::get($city_id);break;
		case('post_weather'):$res=weather::post($city_id,$posts);break;
		case('del_weather'):$res=weather::del($weather_id);break;
	}
	if(is_array($res))echo json_encode($res);
	elseif($res=='ok')echo '<div class="valid">'.$action.' : ok</div>';
	else echo '<div class="error">'.$action.' : not ok</div>';
}

?>