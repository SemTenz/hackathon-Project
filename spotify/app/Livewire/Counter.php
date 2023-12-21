<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $count = 0;

    public function increment()
    {
        $this->count++;
    }
    public function decrement()
    {
        $this->count--;
    }
    public function clear()
    {
        $this->count = 0;
    }
    public function random() {
        $this->count = rand(5, 15);
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
