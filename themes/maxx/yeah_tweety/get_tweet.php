<?php header('Access-Control-Allow-Origin: *');
$callback = !empty($_GET['callback']) ? $_GET['callback'] : 'twitterCallback2';

if($callback == "none"){
  $callback = '';
}
header('Content-Type: ' . ($callback ? 'application/javascript' : 'application/json') . ';charset=UTF-8');
$url = !empty($_GET['url']) ? $_GET['url'] : 'statuses/user_timeline.json?screen_name=Yeahthemes&count=2';
?>
<?php
require_once("twitteroauth/twitteroauth/twitteroauth.php");
$consumerkey = "tX4whV4R54o6hQxN9IB6w";
$consumersecret = "IioHcE47vKpIFmwPFxY9BW6L6NP0IhMPxF15HiBblI";
$accesstoken = "256872626-1ZSZZXDGdlLXALzaot3a7RiJdsqRwtaHtlBEnx8o";
$accesstokensecret = "eJF9BWQOPJB2SgTSvI3OqQq6OIFz51HNegxoHmw5TY";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/".$url);

if(!empty($tweets)){
	echo ($callback ? $callback . '(' : '') . json_encode($tweets) . ($callback ? ')' : '');
}