<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => 'Laptop', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx21.png?v=22135'],
            ['name' => 'PC', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx22.png?v=22135'],
            ['name' => 'Apple', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx21.png?v=22135'],
            ['name' => 'PC Văn Phòng', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx22.png?v=22135'],
            ['name' => 'Linh kiện PC', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx25.png?v=22135'],
            ['name' => 'Màn hình', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx26.png?v=22135'],
            ['name' => 'Bàn phím', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx27.png?v=22135'],
            ['name' => 'Chuột + Lót chuột', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx18.png?v=22135'],
            ['name' => 'Tai nghe Gaming', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx29.png?v=22135'],
            ['name' => 'Ghế Gaming', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx210.png?v=22135'],
            ['name' => 'Console', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx111.png?v=22135'],
            ['name' => 'Loa & Tai nghe', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx112.png?v=22135'],
            ['name' => 'Thiết bị văn phòng', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx213.png?v=22135'],
            ['name' => 'Thiết bị mạng', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx214.png?v=22135'],
            ['name' => 'Phụ kiện', 'icon' => 'https://theme.hstatic.net/1000026716/1000440777/14/xxx115.png?v=22135'],
        ]);
        Category::insert([
            ['name' => 'Laptop Gaming theo thương hiệu', 'parent_id' => 1],
            ['name' => 'Asus', 'parent_id' => 16],
            ['name' => 'Acer', 'parent_id' => 16],
            ['name' => 'MSI', 'parent_id' => 16],
            ['name' => 'Lenovo', 'parent_id' => 16],

            ['name' => 'Laptop học tập và làm việc theo thương hiệu', 'parent_id' => 1],
            ['name' => 'Asus', 'parent_id' => 21],
            ['name' => 'Acer', 'parent_id' => 21],
            ['name' => 'MSI', 'parent_id' => 21],
            ['name' => 'Lenovo', 'parent_id' => 21],

            ['name' => 'Laptop Gaming theo giá', 'parent_id' => 1],
            ['name' => 'Dưới 20 triệu', 'parent_id' => 26],
            ['name' => 'Từ 20 đến 25 triệu', 'parent_id' => 26],
            ['name' => 'Từ 25 đến 35 triệu', 'parent_id' => 26],
            ['name' => 'Trên 35 triệu', 'parent_id' => 26],

            ['name' => 'Laptop học tập và làm việc theo giá', 'parent_id' => 1],
            ['name' => 'Dưới 20 triệu', 'parent_id' => 31],
            ['name' => 'Từ 20 đến 25 triệu', 'parent_id' => 31],
            ['name' => 'Từ 25 đến 35 triệu', 'parent_id' => 31],
            ['name' => 'Trên 35 triệu', 'parent_id' => 31],

            ['name' => 'Laptop các hãng khác', 'parent_id'=> 1],
            ['name' => 'Laptop Lenovo', 'parent_id' => 36],
            ['name' => 'Laptop Dell', 'parent_id' => 36],
            ['name' => 'Laptop HP', 'parent_id' => 36],
            ['name' => 'Laptop Gigabyte', 'parent_id' => 36],

            ['name' => 'Laptop Acer', 'parent_id'=> 1],
            ['name' => 'Nitro Series', 'parent_id' => 41],
            ['name' => 'Aspire Series', 'parent_id' => 41],
            ['name' => 'Predator Series', 'parent_id' => 41],
            ['name' => 'Concept Series', 'parent_id' => 41],
        ]);

        // Category::insert([
        //     ['name' => 'Microphone', 'parent_id' => 15],
        //     ['name' => 'Razer', 'parent_id' => 31],
        //     ['name' => 'HyperX', 'parent_id' => 31],

        //     ['name' => 'Webcam', 'parent_id' => 15],
        //     ['name' => '720p', 'parent_id' => 34],
        //     ['name' => '1080p', 'parent_id' => 34],
        // ]);
    }
}
