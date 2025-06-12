<?php
$token = '7710713273:AAGNque-8eNakp_Da8AIzl0fm08Zk6mjxhE';
// Your Telegram chat ID (you can find it by sending a message to your bot and visiting: https://api.telegram.org/bot<YOUR_BOT_API_TOKEN>/getUpdates)
$chat_id = '1815852467';
$message = 'Someone just visited your website! updated';
$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";

// Send the request to Telegram
file_get_contents($url);











// add new user to database
// $token = '7710713273:AAGNque-8eNakp_Da8AIzl0fm08Zk6mjxhE';
// $chat_id = '1815852467';
// $message = urlencode("👋 Someone just visited your InfinityFree site!");

// $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_exec($ch);
// curl_close($ch);

// // Return a 1x1 transparent pixel
// header("Content-Type: image/png");
// echo base64_decode("iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/wcAAn8BKpYXpNoAAAAASUVORK5CYII=");


// $token = '7710713273:AAGNque-8eNakp_Da8AIzl0fm08Zk6mjxhE';
// $chat_id = '1815852467';
// $message = 'Someone just visited your website!';
// $url = "https://api.telegram.org/bot$token/sendMessage";

// // Prepare data
// $data = [
//       'chat_id' => $chat_id,
//       'text' => $message,
// ];

// // Use cURL instead
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch);
// curl_close($ch);
