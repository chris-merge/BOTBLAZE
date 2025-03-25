<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModelo extends Model
{
    //
    use HasFactory;

    protected $table='productos';
    protected $primaryakey='id';
    protected $fillable =['nombre_producto','descripcion','Cantidad'];
    protected $guarded=[];
    public $timestamps=false;
}
