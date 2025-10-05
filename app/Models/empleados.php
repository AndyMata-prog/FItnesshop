<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Empleados extends Model {
        protected $table = 'Empleados';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_empleado'; // llave primaria
        protected $allowedFields = [
            'nombre',
            'apellido',
            'direccion',
            'telefono',
            'id_correo',
            'contraseña'
            
        ];
    }
?>
