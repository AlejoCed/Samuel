<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

     // Especificar la tabla asociada al modelo (opcional si sigue la convención Laravel)
     protected $table = 'projects';

     // Especificar los campos que son asignables en masa
     protected $fillable = [
         'nombre',
         'status',
         'budget',
         'quote_files',
         'plan_files',
         'notes',
     ];
 
     // Convertir los campos JSON a arrays automáticamente
     protected $casts = [
         'quote_files' => 'array',
         'plan_files' => 'array',
     ];
 
     // Si quieres manejar los campos `created_at` y `updated_at` de manera automática
     public $timestamps = true;
}
