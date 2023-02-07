<?php

require_once __DIR__ . '/vendor/autoload.php';
// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// 預設為空字串
$apiKey = '';

// 判斷環境變數是否存在
if (getenv('OPENAI_API_KEY')) {
    $apiKey = getenv('OPENAI_API_KEY');
}

// 如果環境變數不存在，則使用 .env 檔案
if (!$apiKey) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();
    $apiKey = $dotenv['OPENAI_API_KEY'];
}

// 如果還是不存在，則回傳錯誤訊息
if (!$apiKey) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "OPENAI_API_KEY not found";
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'||$_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the 'text' key exists in the POST data
    if (isset($_POST['text']) || isset($_GET['text'])) {
        $text = isset($_POST['text'])?$_POST['text']:$_GET['text'];

        // Connect to the OpenAI API using the URL endpoint
        $ch = curl_init('https://api.openai.com/v1/engines/text-davinci-003/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
            "prompt" => $text,
            "max_tokens" => 100,
            "temperature" => 0.7,

        )));
        $result = curl_exec($ch);
        $result = json_decode($result,true);
        $result = json_encode($result['choices'][0]);
        // Return the result as a JSON response
        header('Content-Type: application/json');
        echo $result;
        exit();
    } else {
        // Return an error message if the 'text' key does not exist
        header('Content-Type: application/json');
        echo json_encode(array(
            'error' => 'The "text" key is missing from the POST data.'
        ));
        exit();
    }
} else {
    // Return an error message if the request method is not POST
    header('Content-Type: application/json');
    echo json_encode(array(
        'error' => 'This endpoint only accepts POST requests.'
    ));
    exit();
}
