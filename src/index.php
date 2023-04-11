<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css" src="style.css"></style>
    <script src="ajax.js"></script>
    <title>Weather Api</title>
</head>

<?php
require 'core.php';

//datas
$cities=city::get(); //pr($cities);
$weathers=weather::get_all(); //pr($weathers);
?>

<body>
    <div class="container">
        <h1>Weather Api</h1>
        
        <h2>Get cities</h2>
        <button onClick="ajax_call('cities_result','get_cities','')" data-action="get_cities">Get cities</button>
        <button onClick="getElementById('cities_result').innerHTML='';">reset</button>
        <div id="cities_result" class="render"></div>
        
        <h2>Get weather</h2>
        <form name="get_weather_form" action="javascript:return false;">
            <select id="url">
                <option value="" selected>Choose...</option>
        <?php
        foreach($cities as $k=>$v)
            echo '<option name="city_id" value="/:'.$v['city_id'].'/weather">'.$v['city_label'].'</option>'; ?>
            </select>
        </form>
        <button onClick="ajax_call('weather_results','get_weather','get_weather_form')">Get weather</button>
        <button onClick="getElementById('weather_results').innerHTML='', document.forms['get_weather_form'].reset()">reset</button>
        <div id="weather_results" class="render"></div>
        
        
        
        <h2>Create city</h2>
        
        <form name="create_city_form" action="javascript:return false;">
            <div><input type="text" id="city_label" name="city_label" value=""> <label for="city_label">City label</label></div>
            <div><input type="text" id="country" name="country" value=""> <label for="country">Country</label></div>
        </form>
        <button onClick="ajax_call('create_city_results','post_city','create_city_form')" data-action="post_city">Create city</button>
        <button onClick="getElementById('create_city_results').innerHTML='', document.forms['create_city_form'].reset()">reset</button>
		<div id="create_city_results" class="render"></div>
        
        <h2>Create weather</h2>
        
        <form name="create_weather_form" action="javascript:return false;">
            <select id="url">
                <option value="" selected>Choose...</option>
        <?php
        foreach($cities as $k=>$v)
            echo '<option name="city_id" value="/:'.$v['city_id'].'/weather">'.$v['city_label'].'</option>'; ?>
            </select>
        
            <div><input type="number" id="temperature" name="temperature" value=""> <label for="temperature">temperature</label></div>
            <div><select id="weather" name="weather">
                <option value="SUNNY">SUNNY</option>
                <option value="RAINY">RAINY</option>
                <option value="WINDY">WINDY</option>
                <option value="FOGGY">FOGGY</option>
                <option value="SNOW">SNOW</option>
                <option value="HAIL">HAIL</option>
                <option value="SHOWER">SHOWER</option>
                <option value="LIGHTNING">LIGHTNING</option>
                <option value="RAINDBOW">RAINDBOW</option>
                <option value="HURRICANE">HURRICANE</option>
            </select>
            <label for="weather">weather</label></div>
            <div><input type="number" id="precipitation" name="precipitation" value=""> <label for="precipitation">precipitation</label></div>
            <div><input type="number" id="humidity" name="humidity" value=""> <label for="humidity">humidity</label></div>
            <div><input type="number" id="wind" name="wind" value=""> <label for="wind">wind</label></div>
        </form>
        <button onClick="ajax_call('create_weather_results','post_weather','create_weather_form')" data-action="post_city">Create weather</button>
        <button onClick="getElementById('create_weather_results').innerHTML='', document.forms['create_weather_form'].reset()">reset</button>
		<div id="create_weather_results" class="render"></div>
    

        <h2>Del city</h2>
        <form name="del_cities_form" action="javascript:return false;">
            <select id="url">
                <option value="" selected>Choose...</option>
		<?php
        foreach($cities as $k=>$v)
			echo '<option name="city_id" value="/:'.$v['city_id'].'">'.$v['city_label'].'</option>'; ?>
            </select>
        </form>
        <button onClick="ajax_call('del_city_result','del_city','del_cities_form')">Del cities</button>
        <button onClick="getElementById('del_city_result').innerHTML='', document.forms['del_cities_form'].reset()">reset</button>
        <div id="del_city_result" class="render"></div>

        <h2>Del weather</h2>
        <form name="del_weather_form" action="javascript:return false;">
            <select id="url">
                <option value="" selected>Choose...</option>
		<?php
        foreach($weathers as $k=>$v)
			echo '<option name="weather_id" value="/:'.$v['city_id'].'/weather/:'.$v['weather_id'].'">'.$v['weather_id'].' ('.$v['city_label'].')'.'</option>'; ?>
            </select>
        </form>
        <button onClick="ajax_call('del_weather_result','del_weather','del_weather_form')">Del weather</button>
        <button onClick="getElementById('del_weather_result').innerHTML='', document.forms['del_weather_form'].reset()">reset</button>
        <div id="del_weather_result" class="render"></div>
            
	</div>
</body>
</html>