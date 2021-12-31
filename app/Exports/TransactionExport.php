<?php

namespace App\Exports;

use App\Models\Transactiondata;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;

class TransactionExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $dfrom, $dto;

    function __construct($dfrom, $dto)
    {
        $this->dfrom = $dfrom;
        $this->dto = $dto;
    }

    public function collection()
    {
        return collect(Transactiondata::getAllTransactionData($this->dfrom, $this->dto));
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

    // public function registerEvents(): array
    // {
    //     return [
    //         BeforeWriting::class => function(BeforeWriting $event) {
    //             $event->getWriter()
    //                         ->getDelegate()
    //                         ->getActiveSheet() 
    //                         ->getPageSetup()
    //                         ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
    //         }
    //     ];
    // }



    
}
