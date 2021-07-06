<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SiswasExport implements FromCollection, WithMapping,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //$siswa=Siswa::All();
        return Siswa::All();
    }
    public function map($siswa): array
    {
        return [
            $siswa->nama_lengkap(),
            $siswa->jenis_kelamin,
            $siswa->agama,
            $siswa->rerata()
        ];
    }
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Jenis Kelamin',
            'Agama',
            'Nilai rata-rata'
        ];
    }
}
