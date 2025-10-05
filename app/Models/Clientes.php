<?php
namespace App\Models;
use CodeIgniter\Model;

class Clientes extends Model {
    protected $table = 'clientes';   // nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_clientes'; // llave primaria
    protected $allowedFields = [
        'nombre',
        'apellido',
        'correo_cliente',
        'telefono'
    ];
}
