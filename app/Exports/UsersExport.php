<?php
namespace App\Exports;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromCollection, WithHeadings
{

    use Exportable;

    protected $columns;

    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    public function collection()
    {
        return User::select($this->columns)->get();
    }


    public function headings(): array
    {
        $columnMappings = [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'phone_number' => 'Telephone Number',
            'email' => 'Email Address',
        ];

        $headings = [];
        foreach ($this->columns as $column) {
            $headings[] = $columnMappings[$column];
        }

        return $headings;
    }
    
}