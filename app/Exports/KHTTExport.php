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
        $query = 'ht50_information_customer_surveys.email as email,
                    ht50_information_customer_surveys.name_sale as name_sale,
                    ht50_information_customer_surveys.phone_sale as phone_sale,
                    ht50_information_customer_surveys.name_accountant as name_accountant,
                    ht50_information_customer_surveys.phone_accountant as phone_accountant,
                    ht50_information_customer_surveys.address as address,
                    ht50_information_customer_surveys.province as province,
                    ht50_information_customer_surveys.city as city,
                    ht50_information_customer_surveys.wb as wb,
                    ht50_information_customer_surveys.created_at as created_at,
                    ht50_information_customer_surveys.value as value,
                    ht50_information_customer_surveys.b_date as b_date,
                    ht50_information_customer_surveys.bg as bg,';
        if ($this->paramerter['status']) $data = GiftCodeApiController::managerGiftQuery($query,$this->paramerter['role_pt'])
            ->where('status',$this->paramerter['status'])->get();
        else
            $data = GiftCodeApiController::managerGiftQuery($query,$this->paramerter['role_pt'])->get();
        $order=[];
        foreach ($data as $row) {
            if ($row['wb'])
                $wb = Carbon::parse($row['wb'])->format('d/m/Y');
            else
                $wb = '';
            $bg='';
            if ($row['value']){
                $bg=$row['bg']."|".$row['value']."(".$row['b_date'].")";
            }
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
                '15' => $bg,
                '16' => $row['level'],
                '17' => $row['coin'],
                '18' => $row['created_at']
            );
        }

        return (collect($order));

    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'Mã Khách Hàng',
            'Tên Gara',
            'Người phụ trách phụ tùng',
            'Tên chủ',
            'Ngày sinh',
            'email',
            'số điện thoại chủ',
            'tên sale',
            'số điện thoại sale',
            'Tên kế toán',
            'SĐT kế toán',
            'Địa chỉ',
            'Huyện',
            'Thành Phố',
            'Quà tặng trào mừng',
            'Quà tặng sinh nhật',
            'Hạng thẻ',
            'Tổng điểm đạt được',
            'Ngày tham gia'
        ];
    }
}
