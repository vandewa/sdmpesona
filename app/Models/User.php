<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;




class User extends Authenticatable implements LaratrustUser
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function jabatan()
    {
        return $this->belongsTo(NamaJabatan::class, 'nama_jabatan_id');
    }

    public function tingkat()
    {
        return $this->belongsTo(TingkatPekerjaan::class, 'tingkat_pekerjaan_awal_id');
    }

    public function statusnya()
    {
        return $this->belongsTo(StatusPekerjaan::class, 'status_pekerjaan_id');
    }
    public function tunjanganPendidikan()
    {
        return $this->belongsTo(TunjanganPendidikan::class, 'tunjangan_pendidikan_id');
    }
    public function tunjanganMasaKerja()
    {
        return $this->belongsTo(TunjanganMasaKerja::class, 'tunjangan_masa_kerja_id');
    }

    public function scopeCari($filter, $value)
    {
        if ($value) {
            return $this->where('name', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%");
        }

    }
}
