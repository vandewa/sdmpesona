<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $data = [
            [
                "name" => "Ilham Ardha Saputra S.Kom.i",
                "npwp" => "",
                "ktp" => "3307090908910003",
                "id_karyawan" => "DIR01UT2017",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "3",
                "nama_jabatan_id" => "1",
                "tingkat_pekerjaan_awal_id" => "2",
                "nama_jabatan_sekarang_id" => "1",
                "tingkat_pekerjaan_sekarang_id" => "2",
                "tgl_lahir" => "1991-08-09",
                "tgl_masuk" => null,
                "tgl_keluar" => null,
                "gapok_awal" => "3200000",
                "gapok_sekarang" => "3200000",
                "email" => "ilhamarda2021@gmail.com",
                "telpon" => "085729145241",
                "alamat" => "Singkir Rt 1 Rw 7 Kel.Jaraksari Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "-",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Amalia Fajarsari S.IKom",
                "npwp" => "",
                "ktp" => "3376034112880003",
                "id_karyawan" => "DIR03UM2023",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "3",
                "nama_jabatan_id" => "2",
                "tingkat_pekerjaan_awal_id" => "2",
                "nama_jabatan_sekarang_id" => "2",
                "tingkat_pekerjaan_sekarang_id" => "2",
                "tgl_lahir" => "1988-12-01",
                "tgl_masuk" => "2023-03-06",
                "tgl_keluar" => null,
                "gapok_awal" => "3000000",
                "gapok_sekarang" => "3000000",
                "email" => "pelangikarismakristi@gmail.com",
                "telpon" => "081317303543",
                "alamat" => "Perum Villa Asri Jlegong blok D8, Pagerkukuh, Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "-",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Pelangi Karismakristi S.IKom",
                "npwp" => "",
                "ktp" => "3307096201910004",
                "id_karyawan" => "DIR02PP2023",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "3",
                "nama_jabatan_id" => "3",
                "tingkat_pekerjaan_awal_id" => "2",
                "nama_jabatan_sekarang_id" => "3",
                "tingkat_pekerjaan_sekarang_id" => "2",
                "tgl_lahir" => "1991-01-22",
                "tgl_masuk" => "2023-03-06",
                "tgl_keluar" => null,
                "gapok_awal" => "3000000",
                "gapok_sekarang" => "3000000",
                "email" => "fajarsari.amalia@gmail.com",
                "telpon" => "085743712666",
                "alamat" => "Mulyosari rt 03 rw 011, Jaraksari, Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Desta Ariyani Astuti S.Sos",
                "npwp" => "",
                "ktp" => "3307044712870004",
                "id_karyawan" => "PDV01UM2011",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "7",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "7",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1988-12-07",
                "tgl_masuk" => "2011-06-04",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "destateta@gmail.com",
                "telpon" => "082240257717",
                "alamat" => "Kemukus 1/3 Kaliwiro Wonosobo",
                "kawin_tp" => "KAWIN_TP_02",
                "anak" => "-",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Eka Saputri S.M",
                "npwp" => "",
                "ktp" => "3307056911980002",
                "id_karyawan" => "PDV03PP2017",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "4",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "4",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1998-11-29",
                "tgl_masuk" => "2017-05-09",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "ekasaputriraharjo@gmail.com",
                "telpon" => "082146601300",
                "alamat" => "Sempor 6/3 Ds.Besani Kec.Leksono Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Faza Luthfia S.Pd",
                "npwp" => "",
                "ktp" => "3307086605970009",
                "id_karyawan" => "PDV04PP2022",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "5",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "5",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1997-05-26",
                "tgl_masuk" => "2022-08-02",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "fazaluthfia26@gmail.com",
                "telpon" => "085259049339",
                "alamat" => "Krajan rt 01 rw 02, Tieng Kejajar, Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Tito Suseno",
                "npwp" => "",
                "ktp" => "3307050411880006",
                "id_karyawan" => "PDV02UM2011",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "6",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "6",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1988-11-04",
                "tgl_masuk" => "2011-03-04",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "titojxtz@gmail.com",
                "telpon" => "085879064474",
                "alamat" => "Desa Bojanegara 7/1 Kec.Sigaluh Banjarnegara",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Nur Khasanah",
                "npwp" => "",
                "ktp" => "3307095211820008",
                "id_karyawan" => "PDV07PP2021",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "4",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "4",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1982-11-12",
                "tgl_masuk" => "2021-08-08",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "singkirnurkhasanah@gmail.com",
                "telpon" => "082221056311",
                "alamat" => "Singkir 1/12 Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "2",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Andhika Dede Sundawa",
                "npwp" => "913126207533.000",
                "ktp" => "3307090105940004",
                "id_karyawan" => "PDV01PP2021",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "5",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "5",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1994-05-01",
                "tgl_masuk" => "2021-08-08",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "andhika.dede3@gmail.com",
                "telpon" => "081393449381",
                "alamat" => "Jl. Kh Ahmad Dahlan, Gg Cemara Indah I,Kp. Ngepelan 6/11 Kel.Wonosobo Barat",
                "kawin_tp" => "KAWIN_TP_02",
                "anak" => "-",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Ikbal Santosa",
                "npwp" => "",
                "ktp" => "3304122706990003",
                "id_karyawan" => "PDV05PP2022",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "4",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "4",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1999-06-27",
                "tgl_masuk" => "2022-08-02",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "iqbalsentausa.27@gmail.com",
                "telpon" => "081215651839",
                "alamat" => "Petuguran rt 03 rw 01, Punggelan, Banjarnegara (KTP),Sarimulyo rt 01 rw 10 Kalibeber, Mojotengah, Wonosobo (domisili)",
                "kawin_tp" => "KAWIN_TP_02",
                "anak" => "-",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Mita Rosana S.Kom.I",
                "npwp" => "730360641533000",
                "ktp" => "3307097107910006",
                "id_karyawan" => "PTR06PP2008",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "10",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "10",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1991-07-31",
                "tgl_masuk" => "2008-09-17",
                "tgl_keluar" => null,
                "gapok_awal" => "550000",
                "gapok_sekarang" => "550000",
                "email" => "mitullatos@gmail.com",
                "telpon" => "082133412189",
                "alamat" => "Tosari Rt 1 Rw 3 Kel.Jaraksari Wonosobo",
                "kawin_tp" => "KAWIN_TP_03",
                "anak" => "1",
                "bank" => "BRI",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Tunjang Ari Suseno S.Ars",
                "npwp" => "935567503533000",
                "ktp" => "3307100507950004",
                "id_karyawan" => "PTR09PP 2018",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "10",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "10",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1994-07-05",
                "tgl_masuk" => "2018-02-16",
                "tgl_keluar" => null,
                "gapok_awal" => "550000",
                "gapok_sekarang" => "550000",
                "email" => "soeseno45@gmail.com",
                "telpon" => "085778883505",
                "alamat" => "Wonobungkah Rt 1 Rw 5 Kel.Jlamprang Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Bukhori",
                "npwp" => "",
                "ktp" => "3307100504790006",
                "id_karyawan" => "PTR02PP...",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "10",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "10",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1994-04-05",
                "tgl_masuk" => null,
                "tgl_keluar" => null,
                "gapok_awal" => "550000",
                "gapok_sekarang" => "550000",
                "email" => "bukhori@app.com",
                "telpon" => "082134990476",
                "alamat" => "Gondang 15/4 Kec.Watumalang, Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "2",
                "bank" => "BRI",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Pramono",
                "npwp" => "",
                "ktp" => "",
                "id_karyawan" => "PTR08PP.......",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "10",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "10",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1955-11-15",
                "tgl_masuk" => null,
                "tgl_keluar" => null,
                "gapok_awal" => "350000",
                "gapok_sekarang" => "500000",
                "email" => "pramono@app.com",
                "telpon" => "082138864309",
                "alamat" => "Kenteng 4/3 Kel.Kejiwan Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "2",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Urip Yulianto",
                "npwp" => "",
                "ktp" => "3307110407800004",
                "id_karyawan" => "PDV03UM2008",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "1",
                "nama_jabatan_id" => "6",
                "tingkat_pekerjaan_awal_id" => "3",
                "nama_jabatan_sekarang_id" => "6",
                "tingkat_pekerjaan_sekarang_id" => "3",
                "tgl_lahir" => "1980-07-04",
                "tgl_masuk" => "2008-07-01",
                "tgl_keluar" => null,
                "gapok_awal" => "2100000",
                "gapok_sekarang" => "2100000",
                "email" => "peleyuli2@gmail.com",
                "telpon" => "0882006131858",
                "alamat" => "Kebrengan 1/1 Mojotengah Wonosobo",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "1",
                "bank" => "Bank jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Nur Nofika Sari",
                "npwp" => "",
                "ktp" => "3307086408000002",
                "id_karyawan" => "PTR04UM2023",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "2",
                "nama_jabatan_id" => "9",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "9",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "2000-08-24",
                "tgl_masuk" => "2023-05-08",
                "tgl_keluar" => null,
                "gapok_awal" => "550000",
                "gapok_sekarang" => "550000",
                "email" => "fikanoflorist@gmail.com",
                "telpon" => "081387624925",
                "alamat" => "Binangun, Wringinanom,RT 08, RW 04, Kertek, Wonosobo",
                "kawin_tp" => "KAWIN_TP_02",
                "anak" => "-",
                "bank" => "BRI",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Miswanto S.IP",
                "npwp" => "",
                "ktp" => "3307060104820008",
                "id_karyawan" => "DWS02AGT2023",
                "jk" => "l",
                "status" => "1",
                "status_pekerjaan_id" => "4",
                "nama_jabatan_id" => "11",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "11",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1982-04-01",
                "tgl_masuk" => "2023-11-01",
                "tgl_keluar" => null,
                "gapok_awal" => "1000000",
                "gapok_sekarang" => "1000000",
                "email" => "miswantopodomoro@gmail.com",
                "telpon" => "089677773301",
                "alamat" => "Jalan Lingkar Selatan KM.5 dusun Kresek",
                "kawin_tp" => "KAWIN_TP_01",
                "anak" => "2",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ],
            [
                "name" => "Wening Tyas Suminar, S.Pd",
                "npwp" => "",
                "ktp" => "3307066907890005",
                "id_karyawan" => "DWS03AGT2023",
                "jk" => "p",
                "status" => "1",
                "status_pekerjaan_id" => "4",
                "nama_jabatan_id" => "11",
                "tingkat_pekerjaan_awal_id" => "4",
                "nama_jabatan_sekarang_id" => "11",
                "tingkat_pekerjaan_sekarang_id" => "4",
                "tgl_lahir" => "1989-07-29",
                "tgl_masuk" => "2023-11-01",
                "tgl_keluar" => null,
                "gapok_awal" => "1000000",
                "gapok_sekarang" => "1000000",
                "email" => "wening.tyas.suminar@gmail.com",
                "telpon" => "089518492231",
                "alamat" => "Jagalan RT 5 RW 8 Selomerto Wonosobo",
                "kawin_tp" => "KAWIN_TP_03",
                "anak" => "1",
                "bank" => "Bank Jateng",
                "password" => bcrypt('stasiuninformasiterbaikmu')
            ]
        ];

        foreach ($data as $datum) {
            User::create($datum);
        }
    }
}
