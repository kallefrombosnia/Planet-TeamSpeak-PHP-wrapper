<?php 

/*
	 Name: Planet TeamSpeak Simple PHP REST API 
	 Author: kalle
	 Version: v0.1
	 Website: esb.rs
	 GitHub: https://github.com/kallefrombosnia/
*/

function serverStatus($ip, $info){
	global $ip;

	$api = file_get_contents("https://api.planetteamspeak.com/serverstatus/".$ip."/");
	$data = json_decode($api);

	if($data->status != "success")
	{
		return 'Server not found !';
		die();
	}

	switch ($info) {
		case 'name':
				return $data->result->name;
			break;
	
		case 'country':
				return $data->result->country;
		break;
	
	
		case 'users':
				return $data->result->users;
		break;
	

		case 'slots':
				return $data->result->slots;
		break;
	

		case 'online':
				if($data->result->online)
					return "true";
				else
					return "false";
		break;

		case 'password':
				if($data->result->password)
					return "true";
				else
					return "false";
		break;

		case 'createchannels':
				if($data->result->createchannels)
					return "true";
				else
					return "false";
		break;

		case 'premium':
				if($data->result->premium)
					return "true";
				else
					return "false";
		break;

		case 'hidden':
				if($data->result->hidden)
					return "true";
				else
					return "false";
		break;

		case 'serverquery':
				if($data->result->serverquery)
					return "true";
				else
					return "false";
		break;

	}	
}


function updateCheck($info){
	
	$api = file_get_contents("https://api.planetteamspeak.com/updatecheck/");
	$data = json_decode($api);

	if($data->status != "success")
	{
		return 'Server not found !';
		die();
	}

	switch ($info) {
		case 'clientver':
			return $data->result->clientver;
		break;
		
		case 'clientrev':
			return $data->result->clientrev;
		break;

		case 'serverver':
			return $data->result->serverver;
		break;

		case 'serverrev':
			return $data->result->serverrev;
		break;
		
	}
}

function serverHistory($ip, $duration){
	global $ip;

	$api = file_get_contents("https://api.planetteamspeak.com/serverhistory/".$ip."/?duration=".$duration."");
	$data = json_decode($api, true);

	if($data['status'] != "success")
	{
		return 'Server not found !';
		die();
	}

	$history = array();
	
	foreach ($data['result']['data'] as $value) {
		$history[] = $value;
		return $data;		
	}		
}

?>
