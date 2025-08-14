<?php

function discord($message, $thumbnailUrl = null) {

    $url = "almostleakedlolucanputurwebhookurlhere";

    $dataArray = [ "content" => $message ];

    if ($thumbnailUrl) {
        $dataArray["embeds"] = [
            [
                "image" => [
                    "url" => $thumbnailUrl
                ]
            ]
        ];
    }

    $jsonData = json_encode($dataArray);

    $httpOptions = [
        "http" => [
            "header" => "Content-Type: application/json\r\n",
            "method" => "POST",
            "content" => $jsonData,
            "ignore_errors" => true  
        ]
    ];

    $context = stream_context_create($httpOptions);
    $result = @file_get_contents($url, false, $context);
}
?>