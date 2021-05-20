<?php

namespace App\Exports;

use App\Http\Controllers\DataApi\GiftCodeApiController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RevenueExport implements FromCollection, WithHeadings
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
            $order[] = array(
                '0' => $row['code'],
                '1' => $row['name'],
                '2' => $row['role_pt'],
                '3' => $row['total'],
                '4' => $row['2021'],
                '5' => $row['coin'],
                '6' => $row['used'],
                '7' => $row['level'],
                '8' => $link,
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
