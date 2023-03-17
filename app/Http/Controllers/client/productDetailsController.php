<?php


namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class productDetailsController extends Controller
{
    public function getProductDetails()
    {
        return view('client.productDetails');
    }

    public function chooseColor(Request $req)
    {
        $data = $req->all();
        $color = [
            'blue' => [
                'price' => 1,
                'order' => 200,
                'revenue'   => 123,
                'images'=>0,
                'size'  => [
                    's' => [
                        'stock' => 10,
                        'price' => 2,
                    ],
                    'm' => [
                        'stock' => 12,
                        'price' => 3,
                    ],
                    'l' => [
                        'stock' => 16,
                        'price' => 4,
                    ]
                ]
            ],
            'green' => [
                'price' => 2,
                'order' => 210,
                'images'=>1,
                'revenue'   => 345,
                'size'  => [
                    's' => [
                        'stock' => 11,
                        'price' => 3,
                    ],
                    'm' => [
                        'stock' => 13,
                        'price' => 4,
                    ],
                    'l' => [
                        'stock' => 17,
                        'price' => 5,
                    ]
                ]
            ],
            'light-blue' => [
                'price' => 3,
                'order' => 220,
                'revenue'   => 321,
                'images'=>2,
                'size'  => [
                    's' => [
                        'stock' => 18,
                        'price' => 123,
                    ],
                    'm' => [
                        'stock' => 19,
                        'price' => 1324,
                    ],
                    'l' => [
                        'stock' => 1324,
                        'price' => 2364,
                    ]
                ]
            ]
        ];

        $response = array_merge([
            'price' => 0,
            'order' => 0,
            'revenue' => 0,
            'images' => 0,
            'stock' => 0
        ], $color[strtolower($data['color'])] ?? []);

        $size = !empty($color[strtolower($data['color'])]['size'][strtolower($data['size'])]) ? $color[strtolower($data['color'])]['size'][strtolower($data['size'])] : [];

        $response = array_merge($response, $size);
        unset($response['size']);
        return $response;
    }
}
