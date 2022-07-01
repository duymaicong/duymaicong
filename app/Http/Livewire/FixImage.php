<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Imagick;



class FixImage extends Component
{
    use WithFileUploads;
    public $photo;
    public function addProduct (){
       
        dd($this->photo);
    }
    public function render()
    {
        return view('livewire.fix-image');
    }
}
