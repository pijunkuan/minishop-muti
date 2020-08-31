<?php

namespace App\Exports\Order;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderDownload implements FromCollection,WithHeadings,WithMapping
{
	public $data;

	public function __construct($data)
	{
		$this->data = $data;
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            "Order No.","Name","Mobile","Province","City","District","Address","Amount","Status","Item_Name","Item_Price","Item_Quantity"
        ];
    }

    public function map($row): array
    {
        // TODO: Implement map() method.
        $temp = array();
        foreach($row['items'] as $item){
        	$temp[]=[
        		$row->no,
        		$row->address['name'],
        		$row->address['mobile'],
        		$row->address['province'],
        		$row->address['city'],
        		$row->address['district'],
        		$row->address['detail'],
        		$row->amount,
        		$row->status,
        		$item->product_title . " " . $item->variant_title,
        		$item->price,
        		$item->quantity

        	];
        }
        return $temp;
    }
}
