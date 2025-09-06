<?php
require_once __DIR__ . '/../src/api1.php';
require_once __DIR__ . '/../src/utils.php';

header('Content-Type: application/json');

// Action এবং ফোন নাম্বার request থেকে নেওয়া
$action  = $_GET['action'] ?? '';
$phone   = $_GET['phone'] ?? '';

if ($action === 'send' && $phone) {
    // ফোন নাম্বার validate
    if (!validatePhone($phone)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid phone number']);
        exit;
    }

    // API call
    echo json_encode(sendWithBikroyApi($phone));
    exit;
}

// Default response
echo json_encode([
    'info' => 'Bikroy phone verification API wrapper',
    'usage' => 'Send request like: /api/index.php?action=send&phone=YOUR_PHONE_NUMBER'
]);
