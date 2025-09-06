<?php
function validatePhone(string $phone): bool {
    // Basic Bangladesh phone validation
    return preg_match('/^01[3-9][0-9]{8}$/', $phone);
}
