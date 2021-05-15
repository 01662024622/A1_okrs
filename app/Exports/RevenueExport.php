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
                '1' => $row['role_pt'],
                '2' => $row['total'],
                '3' => $row['2021'],
                '4' => $row['coin'],
                '5' => $row['used'],
                '6' => $row['level'],
                '7' => $link,
            );
        }

        return (collect($order));

    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Mã khách hàng',
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
