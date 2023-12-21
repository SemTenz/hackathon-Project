<?php

// Inside SelectFeestdag.php
namespace App\Livewire;

use App\Models\Feestdag;
use Livewire\Component;

class SelectFeestdag extends Component
{
    public $feestdagen;

    public function mount()
    {
        $this->feestdagen = Feestdag::all();
    }

    public function render()
    {
        return view('livewire.select-feestdag');
    }
}

