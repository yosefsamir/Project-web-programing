<?php
function sanitizePhoneNumber($phoneNumber) {
    return preg_replace('/[^0-9]/', '', $phoneNumber);
}

