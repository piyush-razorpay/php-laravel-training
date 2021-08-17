<?php declare(strict_types=1);

$phoneNumber = "9876543210";

$maskedPhoneNumber = substr_replace($phoneNumber, "******", 2, 6);

print($maskedPhoneNumber);