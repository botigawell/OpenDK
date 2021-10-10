<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanDetail extends Model
{
    protected $table     = 'das_pesan_detail';

    public function headerPesan()
    {
        return $this->hasOne(Pesan::class, 'pesan_id', 'id');
    }

    public function dataDesa()
    {
        return $this->hasOne(DataDesa::class, "id", "desa_id");
    }
}
