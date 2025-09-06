<?php
// প্রয়োজনীয় ফাইল include
require_once __DIR__ . '/../src/api1.php';
require_once __DIR__ . '/../src/utils.php';

// JSON response হেডার
header('Content-Type: application/json');

// Request থেকে action এবং phone number নাও
$action = isset($_GET['action']) ? trim($_GET['action']) : '';
$phone  = isset($_GET['phone']) ? trim($_GET['phone']) : '';

// Action চেক
if ($action === 'send') {

    // ফোন নাম্বার validate
    if (empty($phone) || !validatePhone($phone)) {
        http_response_code(400);
        echo json_encode([
            'error' => 'Invalid phone number',
            'usage' => '/api/index.php?action=send&phone=YOUR_PHONE_NUMBER'
        ]);
        exit;
    }

    // API কল
    $response = sendWithBikroyApi($phone);

    // Response send
    echo json_encode($response);
    exit;
}

// Default response
echo json_encode([
    'info'  => 'Bikroy phone verification API wrapper',
    'usage' => '/api/index.php?action=send&phone=YOUR_PHONE_NUMBER'
]);
