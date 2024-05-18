<?php
/**
 * Created by PhpStorm.
 * User: damar
 * Date: 30/12/2018
 * Time: 21:41
 */

use Illuminate\Support\Facades\Storage;
use App\Models\ComCode;
use App\Models\His\InvUnit;
use App\Models\His\InvItemType;
use App\Models\His\TrxUnitMedis;
use App\User;
use Carbon\Carbon;
use App\Models\His\TrxMedical;
use App\Models\His\TrxMedicalUnit;
use App\Models\His\TrxRs;
use App\Models\His\InvPosInventory;
use App\Models\His\TrxKelas;
use App\Models\His\TrxInsurance;
use App\Models\His\ComAccount;
use App\Models\His\TrxMedicalResep;

if (!function_exists('file_name')) {
    function file_name($path, $extension)
    {
        $fileName = str_random(20);
        while (Storage::disk('public')->exists($path . $fileName . $extension)) {
            $fileName = str_random(20);
        }

        return $path . $fileName . '.' . $extension;
    }
}


if (!function_exists('gen_nota')) {
    function gen_nota()
    {
        $no = Date('y/m/') . str_pad(1, 4, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\Pemeliharaan::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = Date('y/m/') . str_pad((int) substr($terakhir->nota, -4) + 1, 4, 0, STR_PAD_LEFT);
        }
        return 'SIGAP/' . $no;
    }
}

if (!function_exists('get_code')) {
    function get_code($a)
    {
        $value = Cache::remember($a, config('app.cache_time'), function () use ($a) {
            return ComCode::where('code_group', $a)->get()->toArray();
        });

        return $value;
    }
}
if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal = '')
    {
        if ($tanggal == '') {
            return '-';
        }
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
}
if (!function_exists('file_url')) {
    function file_url($file = null, $default = 'http://placehold.it/400x400')
    {
        if ($file !== null) {
            if (is_array($file)) {
                $images = [];
                foreach ($file as $item) {
                    if ($item == 'http://placehold.it/400x400') {
                        array_push($images, 'http://placehold.it/400x400');
                    } else {
                        array_push($images, Storage::disk('public')->url($item));
                    }
                }
                return $images;

            } else {
                return Storage::disk('public')->url($file);
            }
        } else {
            return $default;
        }
    }
}

if (!function_exists('result')) {
    function result($result = '', $status = true, $messages = '', $kode = 200)
    {
        if (is_array($result)) {
            if (count($result) === 0) {
                $status = false;
            }
        }
        return response()->json(
            [
                'status' => $status,
                'messages' => $messages,
                'results' => $result,
                'code' => $kode

            ],
            $kode
        );
    }
}

if (!function_exists('format_price')) {
    function format_price($value, $default = 'Rp ')
    {
        $result = number_format($value, 0, ',', '.');

        return $default . $result;
    }
}

if (!function_exists('list_code')) {
    function list_code($a)
    {
        $value = Cache::remember($a, config('app.cache_time'), function () use ($a) {
            return ComCode::where('code_group', $a)->pluck('code_nm', 'com_cd');
        });

        return $value;
    }
}
if (!function_exists('list_bangsal')) {
    function list_bangsal()
    {
        $value = Cache::remember('list_bangsal', config('app.cache_time'), function () {
            return \App\Models\His\TrxBangsal::pluck('bangsal_nm', 'bangsal_cd');
        });

        return $value;
    }
}
if (!function_exists('list_kamar')) {
    function list_kamar()
    {
        $value = Cache::remember('list_kamar', config('app.cache_time'), function () {
            return \App\Models\His\TrxKamar::pluck('kamar_nm', 'kamar_cd');
        });

        return $value;
    }
}
if (!function_exists('list_gudang')) {
    function list_gudang()
    {
        $value = Cache::remember('list_gudang', config('app.cache_time'), function () {
            return InvPosInventory::pluck('pos_nm', 'pos_cd');
        });

        return $value;
    }
}
if (!function_exists('list_kelas')) {
    function list_kelas()
    {
        $value = Cache::remember('list_kelas', config('app.cache_time'), function () {
            return TrxKelas::pluck('kelas_nm', 'kelas_cd');
        });

        return $value;
    }
}
if (!function_exists('list_asuransi')) {
    function list_asuransi()
    {
        $value = Cache::remember('list_asuransi', config('app.cache_time'), function () {
            return TrxInsurance::pluck('insurance_nm', 'insurance_cd');
        });

        return $value;
    }
}
if (!function_exists('list_account')) {
    function list_account()
    {
        $value = Cache::remember('list_account', config('app.cache_time'), function () {
            return ComAccount::pluck('account_nm', 'account_cd');
        });

        return $value;
    }
}
if (!function_exists('list_referensi')) {
    function list_referensi()
    {
        return \App\Models\His\TrxReferensi::pluck('referensi_nm', 'referensi_cd');
    }
}
if (!function_exists('list_unit')) {
    function list_unit()
    {
        return InvUnit::pluck('unit_nm', 'unit_cd');
    }
}
if (!function_exists('list_unit_medis')) {
    function list_unit_medis()
    {
        return TrxUnitMedis::pluck('medunit_nm', 'medunit_cd');
    }
}


if (!function_exists('list_jenis_inventori')) {
    function list_jenis_inventori()
    {
        return InvItemType::pluck('type_nm', 'type_cd');
    }
}



if (!function_exists('dow')) {
    function dow($a)
    {
        $tgl = Carbon::parse($a);
        return $tgl->localeDayOfWeek;
    }
}
if (!function_exists('list_provinsi')) {
    function list_provinsi($a)
    {
        $tgl = Carbon::parse($a);
        return $tgl->localeDayOfWeek;
    }
}
if (!function_exists('gen_pasien_cd')) {
    function gen_pasien_cd()
    {
        $no = Date('y') . str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\TrxPasien::orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = Date('y') . str_pad((int) substr($terakhir->pasien_cd, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return $no;
    }
}
if (!function_exists('gen_no_resep')) {
    function gen_no_resep()
    {
        $no = Date('y') . str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\TrxMedicalResep::orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = Date('y') . str_pad((int) substr($terakhir->resep_no, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return "RSP-" . $no;
    }
}

if (!function_exists('gen_no_rm')) {
    function gen_no_rm()
    {
        $no = str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\TrxPasien::orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = str_pad((int) substr($terakhir->no_rm, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return $no;
    }
}
if (!function_exists('gen_no_group')) {
    function gen_no_group()
    {
        $no = date('Y') . str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\TrxMedicalUnit::whereYear('created_at', date('Y'))->orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = date('Y') . str_pad((int) substr($terakhir->group_no, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return $no;
    }
}
if (!function_exists('gen_medical_cd')) {
    function gen_medical_cd()
    {
        $no = Date('y') . str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\TrxMedical::whereYear('created_at', date('Y'))->orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = Date('y') . str_pad((int) substr($terakhir->medical_cd, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return $no;
    }
}
if (!function_exists('get_dokter')) {
    function get_dokter()
    {
        $data = \App\Models\His\TrxDokter::pluck('dr_nm', 'dr_cd');
        return $data;
    }
}
if (!function_exists('get_paramedis')) {
    function get_paramedis()
    {
        $data = \App\Models\His\TrxParamedis::pluck('paramedis_nm', 'paramedis_cd');
        return $data;
    }
}
if (!function_exists('get_all_paramedis')) {
    function get_all_paramedis()
    {
        $data = \App\Models\His\TrxParamedis::pluck('paramedis_nm', 'paramedis_cd');
        $paramedis = get_dokter()->merge($data);
        return $paramedis;
    }
}
if (!function_exists('get_poli')) {
    function get_poli()
    {
        $data = TrxUnitMedis::whereMedicalunitTp('MEDICALUNIT_TP_1')->pluck('medunit_nm', 'medunit_cd');
        return $data;
    }
}
if (!function_exists('get_lab')) {
    function get_lab()
    {
        $data = TrxUnitMedis::where('medicalunit_tp', 'MEDICALUNIT_TP_2')->pluck('medunit_nm', 'medunit_cd');
        return $data;
    }
}
if (!function_exists('get_rad')) {
    function get_rad()
    {
        $data = TrxUnitMedis::where('medicalunit_tp', 'MEDICALUNIT_TP_3')->pluck('medunit_nm', 'medunit_cd');
        return $data;
    }
}
if (!function_exists('get_info_pasien')) {
    function get_info_pasien($a)
    {
        $data = TrxMedical::with('pasien', 'jenisKunjungan', 'jenisPasien', 'asuransi', 'status')->find($a);
        return $data;
    }
}
if (!function_exists('hitung_umur')) {
    function hitung_umur($tanggal_lahir)
    {
        $birthDt = new DateTime($tanggal_lahir);
        //tanggal hari ini
        $today = new DateTime('today');
        //tahun
        $y = $today->diff($birthDt)->y;
        //bulan
        $m = $today->diff($birthDt)->m;
        //hari
        $d = $today->diff($birthDt)->d;
        return $y . " tahun " . $m . " bulan " . $d . " hari";
    }
}

if (!function_exists('code_item_master')) {
    function code_item_master()
    {
        $no = str_pad(1, 8, '0', STR_PAD_LEFT);
        $terakhir = \App\Models\His\InvItemMaster::orderBy('created_at', 'desc')->first();
        if ($terakhir) {
            $no = str_pad((int) substr($terakhir->item_cd, -8) + 1, 8, 0, STR_PAD_LEFT);
        }
        return $no;
    }
}
if (!function_exists('instansi')) {
    function instansi()
    {
        $value = Cache::remember('rs', config('app.cache_time'), function () {
            return TrxRs::with(['provinsi', 'kabupaten', 'kecamatan', 'kelurahan'])->firstOrCreate(['rs_cd' => config('app.rs_code')]);
        });

        return $value;
    }
}


if (!function_exists('bulanIndonesia')) {
    function bulanIndonesia($angkaBulan)
    {
        // Array dengan nama-nama bulan dalam bahasa Indonesia
        $bulan = [
            "01" => "Januari",
            "02" => "Februari",
            "03" => "Maret",
            "04" => "April",
            "05" => "Mei",
            "06" => "Juni",
            "07" => "Juli",
            "08" => "Agustus",
            "09" => "September",
            "10" => "Oktober",
            "11" => "November",
            "12" => "Desember"
        ];

        // Mengembalikan nama bulan berdasarkan angka bulan
        return $bulan[$angkaBulan];
    }

}
