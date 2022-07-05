<?php

namespace App\Exports;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Comment::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'body',
            'image',
            
        ];
    }
    public function map($bill): array
    {
        return [
           
            
        ];
    }
}
