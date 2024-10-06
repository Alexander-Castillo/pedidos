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
    protected $fillable = ['product', 'quantity', 'total_price','user_id'];
}
