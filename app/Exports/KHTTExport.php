<?php

namespace App\Exports;

use App\Http\Controllers\DataApi\GiftCodeApiController;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KHTTExport implements FromCollection, WithHeadings
{
    private $paramerter;

    function __construct($paramerter)
    {
        $this->paramerter = $paramerter;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // TODO: Implement collection() method.
        $data = GiftCodeApiController::dataQuery($this->paramerter);
        foreach ($data as $row) {
            if ($row['checks'])
                $link = '';
            else
                $link = 'https://cskh.htauto.vn/HT01/' . $row['code'];
            if ($row['wb']) $wb = '';
            else $wb = Carbon::parse($row['wb'])->format('d/m/Y');
            $order[] = array(
                '0' => $row['code'],
                '1' => $row['name_gara'],
                '2' => $row['role_pt'],
                '3' => $row['name'],
                '4' => $row['birthday'],
                '5' => $row['email'],
                '6' => $row['phone'],
                '7' => $row['name_sale'],
                '8' => $row['phone_sale'],
                '9' => $row['name_accountant'],
                '10' => $row['phone_accountant'],
                '11' => $row['address'],
                '12' => $row['province'],
                '13' => $row['city'],
                '14' => $wb,
                '15' => $row['bg'],
                '16' => $row['name_sale'],
                '17' => $link,
            );
        }

        return (collect($order));

    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Mã khách hàng',
            'Tên gara',
            'Người phụ trách',
            'Doanh thu thực tại (từ 01/01/2020 đến 31/03/2021)',
            'Doanh thu 2021 (đến hết ' . (date('n') - 1) . '/2021)',
            'Điểm',
            'Đã dùng',
            'Hạng',
            'Link gửi khách'
        ];
    }
}
