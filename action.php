<?php

include( 'config.php' );

$action = $_GET['action']; /* getfood | subscribe */

if($action == 'getfood'){

	$breed  = $_GET['breed']; /* */
	$age  = $_GET['age']; /* to1 | 15 | 610 | 1115 | more15 */
	$weight  = $_GET['weight']; /* to10 | 1125 | 2590 */
	$activity  = $_GET['activity']; /* scaut | veryactive | active | noactive */
	$allergies  = $_GET['allergies']; /* yes | no */
	$overweight  = $_GET['overweight']; /* yes | no */

	$food_info['scaut'] = array(
		'other' => 'false',
		'name' => 'SCOUT створено для вашого собаки!',
		'img' => 'scout-paks-1.png',
		'info' => "Вашому улюбленцю потрібен HIGH ENERGY раціон. Співвідношення білків (32%) і жирів (21%) допоможе бути витривалим, хондроїтин та глюкозамін підтримувати здоров'я суглобів, а комплекс вітамінів та мінералів — мати здорову шкіру та блискучу шерсть.<br><br> Перш ніж змінювати раціон, радимо проконсультуватись із ветеринаром. ",		
	);
	$food_info['active'] = array(
		'other' => 'active',
		'name' => 'Для вашого собаки достатньо раціону АКТИВ',
		'img' => 'active-pack-1.png',
		'info' => "Вашому улюбленцю SCOUT не зовсім підходить. Рекомендуємо спробувати інший раціон КЛУБ 4 ЛАПИ Актив для задоволення високої енергетичної потреби собак усіх порад.<br><br> Перш ніж змінювати раціон, радимо проконсультуватись із ветеринаром. ",
	);
	$food_info['other'] = array(
		'other' => 'true',
		'name' => 'Не рекомендуємо SCOUT для вашого собаки',
		'img' => 'test-OTHER.png',
		'info' => "Ваш собака потребує менш енергетичного раціону. Рекомендуємо порадитись із ветеринаром. Наш спеціаліст залюбки проконсультує вас. Для цього зателефонуйте за номером 0800503603.<br><br> Зверніть увагу, що ветеринар приймає дзвінки з понеділка по п’ятницю з 9:00 до 18:00. В інший час ви можете залишити голосове повідомлення.",
	);

	$result = get_food($age, $weight, $activity, $allergies, $overweight);
	if($result and $result != 'error'){
		$id = save_result($breed, $age, $weight, $activity, $allergies, $overweight, $result);
		$return_array = array(
			'id' => $id,
			'food' => $food_info[$result],
		);
		echo json_encode($return_array);
	}
	else{
		echo 'error';
	}
}

elseif($action == 'subscribe'){

	$id = $_GET['id'];
	$mail = $_GET['email'];

	$saveEmail = save_email($id, $mail);
	$subscribeEmail = subscribe_email($mail);

	if($saveEmail and $subscribeEmail){
		echo json_encode(array('status' => 'Відправлено'));
	}
	else{
		echo json_encode(array('status' => 'Спробуйте ще раз'));
	}

}

else{}

function get_food($age, $weight, $activity, $allergies, $overweight){
	if( $age == 'to1' OR $age == 'more15' OR $activity == 'noactive' OR $allergies == 'yes' OR $overweight == 'yes' or ( $weight == 'to10' AND $activity != 'veryactive' ) ){
		$result = 'other';
	}
	elseif($activity == 'scaut'){
		$result = 'scaut';
	}
	elseif($activity == 'active'){
		$result = 'active';
	}
	elseif($activity == 'veryactive'){
		if($weight == 'to10'){
			$result = 'active';
		}
		elseif($weight == '1125' OR $weight == '2590'){
			$result = 'scaut';
		}
		else{
			$result = 'error';
		}
	}
	else{
		$result = 'error';
	}
	return $result;
}

function save_result($breed, $age, $weight, $activity, $allergies, $overweight, $result){

	$base_names = array(
		'to1' => 'Менше року',
		'15' => '1-5 років',
		'610' => '6-10 років',
		'1115' => '11-15 років',
		'more15' => 'Більше 15 років',
		'to10' => 'Менше 10 кг',
		'1125' => '11-25 кг',
		'2590' => '25-90 кг',
		'scaut' => 'Собака-скаут',
		'veryactive' => 'Дуже активна',
		'active' => 'Помірно активна',
		'noactive' => 'Малоактивна',
		'yes' => 'Так',
		'no' => 'Ні',
	);

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset(DB_CHARSET);

    $sql = "INSERT INTO `results` (`breed`, `age`, `weight`, `activity`, `allergies`, `overweight`, `result`, `email`) VALUES ('$breed', '$base_names[$age]', '$base_names[$weight]', '$base_names[$activity]', '$base_names[$allergies]', '$base_names[$overweight]', '$result',  NULL)";
    if ($mysqli->query($sql) === TRUE){
    	return $mysqli->insert_id;
    }

    $result->free();
    $mysqli->close();
    
}

function save_email($id, $mail){

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset(DB_CHARSET);

    $sql = "UPDATE results SET email='$mail' WHERE id = $id";

    if ($mysqli->query($sql) === TRUE){
    	return 1;
    }

    $result->free();
    $mysqli->close();

}

function subscribe_email($mail){

	$html = 'https://api.sendpulse.com/oauth/access_token';
	$data = array(
		'grant_type' => 'client_credentials', 
		'client_id' => SENDPULSE_API,
		'client_secret' => SENDPULSE_SECRET,
	);

	if($curl = curl_init()) {
		curl_setopt($curl, CURLOPT_URL, $html);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($curl);
		$res = json_decode($res, true);
		curl_close($curl);
	}

	$opt = array(
	"emails" => array($mail),
	);

	$opt = json_encode($opt);

	if($res) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.sendpulse.com/addressbooks/".SENDPULSE_ADDRESSBOOKS."/emails");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: " . $res['token_type'] . ' ' . $res['access_token'],
			"Content-Type:application/json",
		));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $opt);
		$xml = curl_exec($ch);
		curl_close($ch);
	}

	$xml = json_decode($xml);
	return $xml->result;

}

?>