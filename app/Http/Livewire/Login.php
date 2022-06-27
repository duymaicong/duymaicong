<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class Login extends Component
{
    public $account;
    public $form = [
        'email'                 => '',
        'password'              => '',
    ];
    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email',
            'form.password' => 'required',
        ]);
        if (Auth::attempt(['email'=>$this->form['email'],'password'=>$this->form['password']])) {
            // dd(auth());
            session()->flash('message', 'Login account success' );
            return Redirect(route('home'));
        }else{
            return session()->flash('message', 'Login account fail' );
        }
        // dd($this->form);
        // $x= Auth::attempt($this->form);
        //     dd($x);
        // try {
        //   $CHECK=DB::select('select * from users where email=? and password =?', [$this->form['email'],$this->form['password']]);
        //    if (count($CHECK)) {
        //   $x= Auth::attempt(['email' =>$this->form['email'], 'password' => $this->form['password']]);
        //     dd($x);
        //     // session()->flash('message', 'Login account success' );
        //     // return Redirect(route('home'));
        //    }else{
        //     session()->flash('message', 'Login account failed' );
        //    }
           
        // } catch (\Throwable $e) {   
        //     session()->flash('message', 'Login account fail' . $e->getMessage());
        // }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
