<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transaction"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps = true;
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey
    protected $fillable = [
        'manajer_name',
        'car_name',
        'driver_name',
        'status',
    ];

    public function manajer_names()
    {
        return $this->belongsTo(User::class,'manajer_name');
    }
    public function driver_names()
    {
        return $this->belongsTo(User::class,'driver_name');
    }
    public function cars()
    {
        return $this->hasOne(Car::class,'id','car_name');
    }
}
