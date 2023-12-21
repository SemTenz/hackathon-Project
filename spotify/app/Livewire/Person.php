<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NameSwap;

class Person extends Component
{
    public $nameSwap;

    public function mount()
    {
        $this->nameSwap = (object)[
            'firstName' => 'Joe',
            'middleName' => 'de',
            'lastName' => 'Doe',
            'gender' => 'male',
        ];
    }

    public function toggleNameOrder()
    {
        // Swap first and last name
        $tempFirstName = $this->nameSwap->firstName;
        $this->nameSwap->firstName = $this->nameSwap->lastName;
        $this->nameSwap->lastName = $tempFirstName;
    }

    public function render()
    {
        return view('livewire.person');
    }
}
