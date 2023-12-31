<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Eloquent;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Kullanicilar
 *
 * @property int $ID
 * @property string|null $APIKEY
 * @property string|null $KULLANICIADI
 * @property string|null $KULLANICISIFRE
 * @property string|null $AD
 * @property string|null $SOYAD
 * @property string|null $TELEFON
 * @property string|null $MAIL
 * @property string|null $TCNO
 * @property int|null $DURUM
 * @property int|null $KULLANICITIPI
 * @property Carbon|null $KAYITTARIHI
 * @property Carbon|null $TOKENTARIHI
 *
 * @package App\Models
 */
class Kullanicilar extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'kullanicilar';
    protected $primaryKey = 'ID';
    protected $rememberTokenName = false;
    public $timestamps = false;

    protected $casts = [
        'DURUM' => 'int',
        'KULLANICITIPI' => 'int'
    ];

    protected $dates = [
        'KAYITTARIHI',
        'TOKENTARIHI'
    ];

    protected $fillable = [
        'APIKEY',
        'KULLANICIADI',
        'KULLANICISIFRE',
        'AD',
        'SOYAD',
        'TELEFON',
        'MAIL',
        'TCNO',
        'DURUM',
        'KULLANICITIPI',
        'KAYITTARIHI',
        'TOKENTARIHI',
        'api_token',
        'selected_company_id'
    ];

    public function getId()
    {
        return $this->ID;
    }

    public function getApiToken()
    {
        return $this->api_token;
    }

    public function getSelectedCompanyId()
    {
        return $this->selected_company_id;
    }

    public function name()
    {
        return $this->AD;
    }

    public function email()
    {
        return $this->username;
    }

    public function getType()
    {
        return $this->KULLANICITIPI;
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id', 'ID', 'id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'user_id', 'ID');
    }

    public function companies()
    {
        return $this->belongsToMany(Firmalar::class, 'firmakullanicibaglanti', 'KULLANICIID', 'FIRMAID', 'ID', 'ID')->withPivot([
            'FIRMAUNVAN',
            'DURUM'
        ]);
    }

    public function directories()
    {
        return $this->hasMany(Directory::class, 'user_id', 'ID');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission', 'user_id', 'permission_id', 'ID', 'id');
    }
}
