<?php 
function CallAPI($method, $endpoint, $data = [], $apiKey = "")
{
    $base_url = "https://restadmindev.utho.com/v2/";
    $url = $base_url . $endpoint;
    
    // exit($url);

    // If GET and has data → append query string
    if ($method == "GET" && !empty($data)) {
        $url .= "?" . http_build_query($data);
    }

    $curl = curl_init($url);

    // API Key Header
    $headers = [
        "Authorization: Bearer " . $apiKey,
        "Accept: application/json"
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    if ($method == "POST") {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

?>