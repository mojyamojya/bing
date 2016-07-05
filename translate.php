<?php
const CONST_TRANSLATE_ORIGIN = 'http://api.microsofttranslator.com';
const CONST_TRANSLATE_URL = 'https://api.microsofttranslator.com/v2/Http.svc/Translate';

$token = $_GET['token'];
$text = $_GET['text'];
$src = $_GET['src'];
$dst = $_GET['dst'];

$data = array(
	'text' => $text,
	'from' => $src,
	'to' => $dst
);

$header = array(
	'Authorization: Bearer ' . $token,
	'Content-Type: application/x-www-form-urlencoded',
	'Access-Control-Allow-Origin: ' . CONST_TRANSLATE_ORIGIN
);

$context = stream_context_create(array(
    "http" => array(
        "method"  => "GET",
        "header"  => implode("\r\n", $header),
    )
));

$response = file_get_contents(
	CONST_TRANSLATE_URL . '?' . http_build_query($data, "", "&"),
	false,
	$context
);

echo $response;
