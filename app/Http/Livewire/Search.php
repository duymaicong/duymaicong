<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public function parent(){
        dd('aa');
    }
    public function render()
    {
        $customer = Customer::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.search',['customers'=>$customer]);
    }
}
