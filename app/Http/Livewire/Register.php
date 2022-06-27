<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Register extends Component
{

    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];
    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.name'     => 'required',
            'form.password' => 'required|confirmed',
        ]);
        try {
            $CHECK = DB::select('select * from users where email=?', [$this->form['email']]);
            if (count($CHECK)) {
                session()->flash('message', 'Email already exists'); 
            }else{
                User::create($this->form);
                session()->flash('message', 'Register account successfully 😁');
                return redirect(route('login'));
            }
        } catch (\Throwable $e) {
            // dd($th);

            session()->flash('message', 'Register account fail' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.register');
    }
}
