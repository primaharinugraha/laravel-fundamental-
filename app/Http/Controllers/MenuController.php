<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getAllData(Request $request, $namaMenu = null, $harga = null)
    {
        // Data menu
        $menus = [
            [
                "id" => 0,
                "nama_menu" => "Soto Mie",
                "harga" => 15000,
            ],
            [
                "id" => 1,
                "nama_menu" => "Bakso Malang",
                "harga" => 10000,
            ],
            [
                "id" => 2,
                "nama_menu" => "Ketoprak",
                "harga" => 12000,
            ],
            // ...
        ];

        // untuk menampilkan semua data json, bila tidak ada parameter yang di berikan
        if ($namaMenu === null && $harga === null) {
            return response()->json([
                'info' => 'Data berhasil didapatkan',
                'data' => $menus
            ]);
        }

        foreach ($menus as $menu) {
            // Ubah ke huruf kecil untuk pencarian yang tidak bersifat case sensitive
            $lowercaseMenu = strtolower($menu['nama_menu']);
            $lowercaseSearchTerm = strtolower($namaMenu);

            // Periksa apakah kata kunci mirip dengan nama menu
            if (str_contains($lowercaseMenu, $lowercaseSearchTerm) && $menu['harga'] == $harga) {
                return "Anda memilih makanan {$menu['nama_menu']} berdasarkan harga {$menu['harga']}";
            }
        }
      return "Menu tidak ditemukan";
    }
}
