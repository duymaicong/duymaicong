<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{ 
    public $count =1;
 
    public function increment()
    {
        // dd('abc');

        $this->count++;
    }
    public function decrement()
    {+
        // dd('decreament');
        $this->count--;
    }
    public function render()
    {
        return view('livewire.counter',['counter'=>$this->count]);
    }
}

?>
