<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class RowPrice extends Component
{
    public Article $article;
    public $rowprice = 0;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->rowprice = $this->calculateRowPrice();
    }

    public function render()
    {
        return view('livewire.row-price');
    }

    public function calculateRowPrice()
    {
        return $this->article->price * $this->article->amount;
    }

    public function increaseAmount()
    {
        $this->article->amount++;
        $this->updateRowPrice();
    }

    public function decreaseAmount()
    {
        if ($this->article->amount > 1) {
            $this->article->amount--;
            $this->updateRowPrice();
        }
    }

    private function updateRowPrice()
    {
        $this->rowprice = $this->calculateRowPrice();
    }
}
