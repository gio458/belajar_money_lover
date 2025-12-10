<?php

namespace App\Exports;

use App\Models\Spay;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SpayExport implements FromCollection, WithHeadings
{
    protected $from;
    protected $to;
    protected $user_id;

    public function __construct($from, $to, $user_id)
    {
        $this->from = $from;
        $this->to   = $to;
        $this->user_id = $user_id;
    }

    public function collection()
    {
        return Spay::where('user_id', $this->user_id)
            ->whereBetween('date', [$this->from, $this->to])
            ->orderBy('date', 'asc')
            ->get([
                'date',
                'type',
                'category',
                'amount',
                'note'
            ]);
    }

    public function headings(): array
    {
        return [
            'Date',
            'Type',
            'Category',
            'Amount',
            'Note'
        ];
    }
}
