<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefinisikan kolom yang boleh diisi
    protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];

    /**
     * =====================================================
     * Laravel Relationship Method:
     * =====================================================
     * 1. one to one
     * - hasOne()   = tabel saat ini meminjamkan id/key ke tabel lain
     * - belongsTo()    = tabel saat ini MEMINJAM id /key dari tabel lain
     * 
     * 2. One to many / Many to one
     * - hasMany()  = tabel saat ini meminjamkan id/key ke tabel lain
     * - belongsToMany = tabel saat ini MEMINJAM id/key dari tabel lain
     */

    // mendefinisikan relasi ke model courses
    public function courses(){
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
