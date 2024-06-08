<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = [
            [
                'name' => 'Dr. Ahmad Fauzi',
                'specialty' => 'Dokter Umum',
                'description' => 'Dr. Ahmad Fauzi memiliki pengalaman lebih dari 10 tahun dalam menangani berbagai penyakit umum dan memberikan perawatan kesehatan dasar. Ia juga ahli dalam memberikan nasihat kesehatan preventif.'
            ],
            [
                'name' => 'Dr. Rini Santoso',
                'specialty' => 'Dokter Anak',
                'description' => 'Dr. Rini Santoso adalah spesialis anak yang berdedikasi dalam merawat kesehatan anak-anak dari bayi hingga remaja. Ia dikenal karena pendekatannya yang ramah dan penuh perhatian terhadap pasien muda dan orang tua mereka.'
            ],
            [
                'name' => 'Dr. Budi Hartanto',
                'specialty' => 'Dokter Bedah',
                'description' => 'Dr. Budi Hartanto adalah seorang ahli bedah dengan spesialisasi dalam operasi umum dan laparoskopi. Dengan pengalaman lebih dari 15 tahun, ia telah melakukan berbagai prosedur bedah dengan tingkat keberhasilan yang tinggi.'
            ],
            [
                'name' => 'Dr. Maria Dewi',
                'specialty' => 'Dokter Kandungan',
                'description' => 'Dr. Maria Dewi adalah spesialis obstetri dan ginekologi yang berpengalaman dalam menangani kehamilan, persalinan, dan masalah kesehatan reproduksi wanita. Ia juga aktif dalam memberikan pendidikan kesehatan wanita.'
            ],
            [
                'name' => 'Dr. Johan Setiawan',
                'specialty' => 'Dokter Gigi',
                'description' => 'Dr. Johan Setiawan adalah dokter gigi yang berpengalaman dalam memberikan perawatan gigi umum dan kosmetik. Ia dikenal karena keahliannya dalam melakukan prosedur perawatan gigi yang nyaman dan efektif.'
            ]
        ];

        return view('doctor', compact('doctors'));
    }
}
