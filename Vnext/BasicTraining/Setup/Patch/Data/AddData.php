<?php

namespace Vnext\BasicTraining\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddData implements DataPatchInterface
{
    private $studentFactory;

    public function __construct(
        \Vnext\BasicTraining\Model\StudentFactory $studentFactory
    )
    {
        $this->studentFactory = $studentFactory;
    }

    public function apply()
    {
        $sampleData = [
            [
                'name' => 'Nguyen Thi My Hanh',
                'gender' => '0',
                'dob' => '1999-4-12',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-Thi-My-Hanh',
                'email' => 'hanhnguyen124@gmail.com'
            ],
            [
                'name' => 'Nguyen Viet Dan',
                'gender' => '1',
                'dob' => '1999-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-Viet-Dan',
                'email' => 'dannguyen22993@gmail.com'
            ],
            [
                'name' => 'Nguyen Viet Hai',
                'gender' => '1',
                'dob' => '1990-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-Viet-Hai',
                'email' => 'hainguyen22993@gmail.com'
            ],
            [
                'name' => 'Nguyen Van Vinh',
                'gender' => '1',
                'dob' => '2001-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-Van-Vinh',
                'email' => 'vinhnguyen93@gmail.com'
            ],
            [
                'name' => 'Pham Thai Hao',
                'gender' => '1',
                'dob' => '1999-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Pham-Thai-Hao',
                'email' => 'haopham293@gmail.com'
            ],
            [
                'name' => 'Bui Viet Viet',
                'gender' => '1',
                'dob' => '2006-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Bui-Viet-Viet',
                'email' => 'vietbui22993@gmail.com'
            ],
            [
                'name' => 'Le Van Tuyen',
                'gender' => '1',
                'dob' => '1995-3-22',
                'address' => 'Thai Binh',
                'slug' => 'Le-Van-Tuyen',
                'email' => 'tuyenle1995@gmail.com'
            ],
            [
                'name' => 'Nguyen Thi Phuong My',
                'gender' => '0',
                'dob' => '2009-4-12',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-Thi-Phuong-My',
                'email' => 'phuongmybui992@gmail.com'
            ],
            [
                'name' => 'Nguyen My Hanh',
                'gender' => '0',
                'dob' => '1998-4-12',
                'address' => 'Thai Binh',
                'slug' => 'Nguyen-My-Hanh',
                'email' => 'myhanh990@gmail.com'
            ],
            [
                'name' => 'Nguyen  My',
                'gender' => '0',
                'dob' => '1999-4-12',
                'address' => 'Nghe An ',
                'slug' => 'Nguyen-My',
                'email' => 'mynguyen9012@gmail.com'
            ], [
                'name' => 'Nguyen   Hanh',
                'gender' => '0',
                'dob' => '2003-4-12',
                'address' => 'Nam Dinh',
                'slug' => 'Nguyen-Hanh',
                'email' => 'hanhnguyen2003@gmail.com'
            ], [
                'name' => 'Nguyen Thi Huyen',
                'gender' => '0',
                'dob' => '2009-9-22',
                'address' => 'Ha Noi',
                'slug' => 'Nguyen-Thi-Huyen',
                'email' => 'huyennguyen21@gmail.com'
            ],
            [
                'name' => 'Ngo Viet Hoang',
                'gender' => '0',
                'dob' => '2020-9-22',
                'address' => 'Ha Noi',
                'slug' => 'Ngo-Viet-Hoang',
                'email' => 'hoangngo21@gmail.com'
            ],
            [
                'name' => 'Ngo Thi Thu',
                'gender' => '0',
                'dob' => '2021-9-22',
                'address' => 'Ha Noi',
                'slug' => 'Ngo-Thi-Thu',
                'email' => 'thungo21@gmail.com'
            ]
        ];
        foreach ($sampleData as $data) {
            $this->studentFactory->create()->setData($data)->save();
        }
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}
