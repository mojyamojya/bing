<?php
const CONST_TRANSLATE_TOKEN_CLIENT_ID = 'gTranslatorv2';
const CONST_TRANSLATE_TOKEN_CLIENT_SECRET = 'xxxxxxxxxxxxxxxxxxxx';
const CONST_TRANSLATE_TOKEN_SCOPE = 'http://api.microsofttranslator.com';
const CONST_TRANSLATE_TOKEN_GRANT_TYPE = 'client_credentials';
const CONST_TRANSLATE_TOKEN_ORIGIN = 'https://datamarket.accesscontrol.windows.net';
const CONST_TRANSLATE_TOKEN_URL = 'https://datamarket.accesscontrol.windows.net/v2/OAuth2-13';

$data = array(
	'client_id' => CONST_TRANSLATE_TOKEN_CLIENT_ID,
	'client_secret' => CONST_TRANSLATE_TOKEN_CLIENT_SECRET,
	'scope' => CONST_TRANSLATE_TOKEN_SCOPE,
	'grant_type' => CONST_TRANSLATE_TOKEN_GRANT_TYPE
);

$header = array(
	'Content-Type: application/x-www-form-urlencoded',
	'Access-Control-Allow-Origin: ' . CONST_TRANSLATE_TOKEN_ORIGIN
);

$context = stream_context_create(array(
    "http" => array(
        "method"  => "POST",
        "header"  => implode("\r\n", $header),
        "content" => http_build_query($data, "", "&")
    )
));

$response = file_get_contents(
	CONST_TRANSLATE_TOKEN_URL,
	false,
	$context
);

echo $response;
