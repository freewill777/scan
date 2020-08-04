<?php
	require 'vendor/autoload.php';
	use GuzzleHttp\Client;
	
	$client = new GuzzleHttp\Client();
	$res = $client->post('https://api.remove.bg/v1.0/removebg', [
		'multipart' => [
        [
            'name'     => 'image_file',
            'contents' => fopen($argv[1], 'r')
        ],
        [
            'name'     => 'size',
            'contents' => 'auto'
        ]
	],
		'headers' => [
			'X-Api-Key' => 'zaXA7uovYmgRVkS3carQeHFB'
		]
	]);

	$fp = fopen("no-bg.png", "wb");
	fwrite($fp, $res->getBody());
	fclose($fp);
 ?>
