<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rsakey extends Component
{
    public $text;
    public $retext;
    public function encryptText(){
       $this->retext= encrypt($this->text);

    }
    public function decryptText(){
        $this->retext= decrypt($this->text);
 
     }
    public function render()
    {
        return view('livewire.rsakey');
    }
}
