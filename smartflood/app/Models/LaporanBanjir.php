<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanBanjir extends Model
{
    protected $fillable = [
 'user_id',
 'lokasi_sensor_id',
 'ketinggian_air',
 'status_risiko',
 'deskripsi',
 'file_bukti'
];

public function lokasi()
{
    return $this->belongsTo(LokasiSensor::class,'lokasi_sensor_id');
}

}
