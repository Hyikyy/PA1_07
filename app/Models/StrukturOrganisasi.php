<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel database.
     * Opsional jika nama model adalah bentuk singular dari nama tabel (StrukturOrganisasi -> struktur_organisasi).
     */
    protected $table = 'struktur_organisasi';

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'link_twitter',
        'link_facebook',
        'link_instagram',
        'link_linkedin',
        'urutan', // Jika Anda menambahkannya di migration
    ];
}
