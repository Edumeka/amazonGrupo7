<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;  // Importa la clase Hash

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Cambiar el nombre de la tabla
    protected $table = 'usuarios';

    // Definir la clave primaria
   // protected $primaryKey = 'CODIGO_USUARIO';

    // Indicar que no usas timestamps si no tienes `created_at` y `updated_at`
    public $timestamps = false;
        /**
     * Indicar que la clave primaria no es de tipo autoincrementable BigInteger.
     */
    public $incrementing = true;
    protected $keyType = 'int';

    /**
     * Los atributos que pueden ser asignados masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NOMBRE',
        'APELLIDO',
        'email',  // Cambiado de CORREO a email
        'password',  // Cambiado de CONTRASENIA a password
        'TELEFONO',       
        'TELEFONO',
        'FECHA_CREACION',
       
        'FECHA_NACIMIENTO',
        'CODIGO_ESTADO',
        'CODIGO_GENERO',
        'CODIGO_ROL',
        'CODIGO_DIRECCION',
    ];
    
    protected $hidden = [
        'password',  // Laravel usa 'password' por defecto
        'remember_token',
    ];
    
    /**
     * Definir los atributos con conversiones de datos.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    
}
