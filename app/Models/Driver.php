<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Driver extends Model
{
    use HasFactory, HasRoles;
    protected $table = "driver"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    public $timestamps = false;
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey
    protected $fillable = [
        'driver_name',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
