<?php

namespace App\Http\Livewire;
use App\Exports\UsersExport;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\Component;
use Maatwebsite\Excel\Excel as ExcelExcel;

class ExportExcel extends Component
{
    // public function mount() {
        
    //     return Excel::download(new UsersExport,'users.xlsx');
    // }
    public function exportExcel(){
        
        return Excel::download(new UsersExport, 'excel.xlsx');
    }
    public function sendMail(){
        Mail::to('maicongduy300393@gmail.com')->send(new WellcomeMail());  
    }
    public function render()
    {
        Excel::download(new UsersExport,'users.xlsx');
        return view('livewire.export-excel');
    }
}
