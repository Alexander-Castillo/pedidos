<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    /**  protected $fillable en Laravel sirve para proteger tu base de datos, permitiendo que solo ciertos campos
     *  se puedan llenar automáticamente cuando creas o actualizas un registro.
    */
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class); // Define la relación con la tabla users en la base de datos.
    }
}
