<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ResetDom extends Component
{
    public $name='';
    public $phone='';
    public $address='';



 
    public function mount()
    {
       
    }
    public function render()
    {
        return view('livewire.reset-dom');
    }
}
