<?php

// sales-api-new.php

// -------------------------
// your existing helper
// -------------------------
function callApi($endpoint, $method = "GET", $body = null)
{
    $baseUrl = "https://restadmindev.utho.com/v2";
    $token = "roQblTLnJDWfSuKNMkaFOqGecRpEtBdIPZmwxXHvYzhAyisgjVUC";

    $url = $baseUrl . "/" . $endpoint;

    $ch = curl_init($url);

    $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer " . $token
    ];

    $options = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers
    ];

    if ($method !== "GET") {
        $options[CURLOPT_CUSTOMREQUEST] = $method;
        if (!empty($body)) {
            $options[CURLOPT_POSTFIELDS] = json_encode($body);
        }
    }

    curl_setopt_array($ch, $options);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return [
        "status" => $httpcode,
        "response" => json_decode($response, true)
    ];
}

// -------------------------
// If the file is called via HTTP, produce JSON output
// -------------------------
if (php_sapi_name() !== 'cli') {
    header('Content-Type: application/json');

    //  endpoint slugs
    $raw = [];
    $raw['followup'] = callApi("followup");
    $raw['report_followups'] = callApi("report_followups");


    $payload = [

        // 'kpis' => $raw['report_followups']['response']['followups'] ?? $raw['report_followups']['response'] ?? [],

        // // header cards, summary or list (example: followup endpoint used for header)
        'headerCard'   => $raw['report_followups']['response']['followups']['due'] ?? [],
        'headerList' => $raw['followup']['response']['followups'] ?? [],

        // // other UI data
        // 'recentActivity' => $raw['followup']['response']['recent_activity'] ?? [],
        // 'salesTargets' => $raw['followup']['response']['sales_targets'] ?? [],
        // 'total_funnel_value' => $raw['report_followups']['response']['total_funnel_value'] ?? 0,

        // include raw responses for debugging or later features
        // '_raw' => array_map(function ($v) {
        //     return $v['response'] ?? null; }, $raw),
    ];

    // Always return a JSON object (safe defaults where possible)
    echo json_encode($payload);
    exit;
}
