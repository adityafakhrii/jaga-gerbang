<?php

namespace App\Exports;

use DB;
use App\Data_siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatasiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_siswa::select(DB::raw("data_siswa.nama,kelas.nama_kelas,count(siswa_telat.siswa_id) as total"))
                  ->join('siswa_telat','data_siswa.id','=','siswa_telat.siswa_id')
                  ->join('kelas','data_siswa.kelas_id','=','kelas.id')
                  ->groupBy('data_siswa.nama','data_siswa.kelas_id')
                  ->get();
    }

    public function map($data_siswa): array
    {
        return [
            $data_siswa->nama,
            $data_siswa->nama_kelas,
            $data_siswa->total
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA SISWA',
            'KELAS',
            'TOTAL TELAT'
        ];
    }
}
