<?php
function sendWithBikroyApi(string $phone): array {
    $url = "https://bikroy.com/data/phone_number_login/verifications/phone_login?phone={$phone}";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        'Accept: application/json'
    ]);

    $resp = curl_exec($ch);
    $err  = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($err) {
        return ['ok' => false, 'error' => $err];
    }

    if ($httpCode >= 400) {
        return ['ok' => false, 'error' => "HTTP $httpCode", 'response' => $resp];
    }

    return ['ok' => true, 'response' => json_decode($resp, true)];
}
