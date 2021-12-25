<?php

namespace App\Exports;

use App\Models\Transactiondata;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class TransactionExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Transactiondata::getAllTransactionData());
    }

    public function headings():array {
        return [
            'Id',
            'Name',
            'Phone',
            'E-Mail',
            'Product Name',
            'Quantity',
            'Address Location',
            'City',
            'Province',
            'Courier',
            'Total',
            'Status',
            'Date',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    
}
