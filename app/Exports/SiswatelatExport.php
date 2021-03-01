<?php

namespace App\Exports;

use App\Siswa_telat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswatelatExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa_telat::where('created_at','=',date('Y-m-d'))->get();
    }

    public function map($siswa_telat): array
    {
        return [
            $siswa_telat->data_siswa->nama,
            $siswa_telat->data_siswa->kelas->nama_kelas,
            $siswa_telat->pukul_telat,
            $siswa_telat->ket_sanksi
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA SISWA',
            'KELAS',
            'PUKUL TELAT',
            'KET. SANKSI'
        ];
    }
}
