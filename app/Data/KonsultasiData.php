<?php

namespace App\Data;

use Illuminate\Support\Facades\Session;

class KonsultasiData
{
    private static $defaultData = [
        [
            'id' => 1,
            'tanggal' => '2024-03-15',
            'pelanggan' => 'John Doe',
            'kategori' => 'Hardware',
            'subjek' => 'Layar smartphone retak',
            'pesan' => 'Smartphone saya terjatuh dan layarnya retak. Apakah bisa diperbaiki dan berapa biayanya?',
            'status' => 'Belum Dibalas'
        ],
        [
            'id' => 2,
            'tanggal' => '2024-03-14',
            'pelanggan' => 'Jane Smith',
            'kategori' => 'Software',
            'subjek' => 'Aplikasi force close',
            'pesan' => 'Beberapa aplikasi sering force close secara tiba-tiba. Bagaimana cara mengatasinya?',
            'status' => 'Sudah Dibalas',
            'balasan' => 'Coba clear cache aplikasi dan restart HP. Jika masih bermasalah, uninstall dan install ulang aplikasi tersebut.'
        ],
        [
            'id' => 3,
            'tanggal' => '2024-03-14',
            'pelanggan' => 'Mike Johnson',
            'kategori' => 'Hardware',
            'subjek' => 'Baterai cepat habis',
            'pesan' => 'Baterai HP saya cepat sekali habis, padahal baru 6 bulan pemakaian. Apa solusinya?',
            'status' => 'Belum Dibalas'
        ],
        [
            'id' => 4,
            'tanggal' => '2024-03-13',
            'pelanggan' => 'Sarah Wilson',
            'kategori' => 'Jaringan',
            'subjek' => 'Sinyal sering hilang',
            'pesan' => 'HP sering kehilangan sinyal di area yang seharusnya ada sinyal kuat. Apakah ada masalah dengan antena?',
            'status' => 'Sudah Dibalas',
            'balasan' => 'Mohon bawa HP Anda ke toko kami untuk pengecekan antena.'
        ],
        [
            'id' => 5,
            'tanggal' => '2024-03-13',
            'pelanggan' => 'David Brown',
            'kategori' => 'Software',
            'subjek' => 'WhatsApp error',
            'pesan' => 'WhatsApp tidak bisa mengirim pesan dan sering error. Sudah dicoba reinstall tapi masih sama.',
            'status' => 'Belum Dibalas'
        ],
        [
            'id' => 6,
            'tanggal' => '2024-03-12',
            'pelanggan' => 'Emma Davis',
            'kategori' => 'Hardware',
            'subjek' => 'Speaker tidak berfungsi',
            'pesan' => 'Speaker HP tidak mengeluarkan suara sama sekali. Headphone masih bisa.',
            'status' => 'Sudah Dibalas',
            'balasan' => 'Kemungkinan speaker rusak, silakan kunjungi toko kami untuk penggantian speaker.'
        ],
        [
            'id' => 7,
            'tanggal' => '2024-03-12',
            'pelanggan' => 'James Wilson',
            'kategori' => 'Lainnya',
            'subjek' => 'Konsultasi pembelian HP',
            'pesan' => 'Saya ingin membeli HP baru dengan budget 3 juta. Apa rekomendasi terbaik?',
            'status' => 'Belum Dibalas'
        ],
        [
            'id' => 8,
            'tanggal' => '2024-03-11',
            'pelanggan' => 'Linda Martinez',
            'kategori' => 'Hardware',
            'subjek' => 'Tombol power rusak',
            'pesan' => 'Tombol power susah ditekan dan terkadang macet. Bagaimana solusinya?',
            'status' => 'Sudah Dibalas',
            'balasan' => 'Perlu penggantian tombol power. Silakan kunjungi toko kami untuk perbaikan.'
        ],
        [
            'id' => 9,
            'tanggal' => '2024-03-11',
            'pelanggan' => 'Robert Taylor',
            'kategori' => 'Software',
            'subjek' => 'Sistem operasi lambat',
            'pesan' => 'HP sangat lambat setelah update sistem operasi terakhir. Bagaimana cara mengatasinya?',
            'status' => 'Belum Dibalas'
        ],
        [
            'id' => 10,
            'tanggal' => '2024-03-10',
            'pelanggan' => 'Maria Garcia',
            'kategori' => 'Jaringan',
            'subjek' => 'Tidak bisa koneksi WiFi',
            'pesan' => 'HP tidak bisa connect ke WiFi manapun. Mobile data masih berfungsi normal.',
            'status' => 'Sudah Dibalas',
            'balasan' => 'Coba reset network settings. Jika masih bermasalah, bawa ke toko kami untuk pengecekan WiFi module.'
        ]
        
    ];

    public static function getAllData()
    {
        return Session::get('consultations', self::$defaultData);
    }

    public static function getByStatus($status)
    {
        if ($status === 'Semua') {
            return self::getAllData();
        }
        return array_filter(self::getAllData(), function($item) use ($status) {
            return $item['status'] === $status;
        });
    }

    public static function getByKategori($kategori)
    {
        if ($kategori === 'Semua') {
            return self::getAllData();
        }
        return array_filter(self::getAllData(), function($item) use ($kategori) {
            return $item['kategori'] === $kategori;
        });
    }

    public static function getById($id)
    {
        $data = array_filter(self::getAllData(), function($item) use ($id) {
            return $item['id'] === $id;
        });
        return !empty($data) ? reset($data) : null;
    }
} 