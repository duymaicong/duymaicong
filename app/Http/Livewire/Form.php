<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];
    public $formSecond= [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];
    public function resetForm(){
        $this->reset();
        // $this->resetExcept('form');
    }
    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.name'     => 'required',
            'form.password' => 'required|confirmed',
        ]);
        }
    public function render()
    {
        return view('livewire.form');
    }
}
