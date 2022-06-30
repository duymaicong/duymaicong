<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class SearchCustomer extends Component
{
    public $search;
    public $index = 0;
    public function testKey()
    {
        $this->search = 'sdasdasd';
    }
    public $postCount;

    public $listeners = ['test' => 'testKey1', 'test2' => 'testKey2','test3' => 'testKey3'];
    public $query;
    public $contacts;
    public function updateQuery(){
        // sleep(1);
        $this->contacts=Customer::where('name', 'like', '%' . $this->query . '%')->take(5)->get();
    }
    public function mount(){
        $this->query='';
        $this->contacts=[];
    }

    public function testKey1()
    {
     
        $this->index--;
        if ($this->index<=0) {
            $this->index=0;
          } 
      
    }
    public function testKey2()
    {
        
       $this->index++;
       if ($this->index>=1) {
        $this->index=1;
      } 
      
    }
    public function testKey3($test)
    {

     $this->search=$test;
     return;
    }
    public $highlightIndex=0;
    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }
    public function selectContact(){
        $contact= $this->contacts[$this->highlightIndex]??null;
        if ($contact) {
            $this->redirect( route('customer', $contact['id']));
        }
    }



    public function render()
    {
       $this->updateQuery();
        $customer = Customer::where('name', 'like', '%' . $this->search . '%')->paginate(5);
        return view('livewire.search-customer', ['customers' => $customer,'contacts'=>$this->contacts]);
    }
}
