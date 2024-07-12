<?php

echo "Hellow World!";

echo "<hr/>";

class DealEnum
{
    const EMPLOYEE_OF_VIOLATION = 'EMPLOYEE';
    const APPLICANT_OF_VIOLATION = 'APPLICANT';
}

$constants = (new \ReflectionClass(DealEnum::class))->getConstants();

print_r($constants);