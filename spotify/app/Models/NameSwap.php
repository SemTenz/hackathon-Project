<?php


namespace App\Models;

class NameSwap
{
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $gender;

    public function __construct($firstName = '', $middleName = '', $lastName = '', $gender = '')
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->gender = $gender;
    }
}

