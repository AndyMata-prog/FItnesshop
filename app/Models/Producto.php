<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Empleados extends Model {
        protected $table = 'producto';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_producto'; // llave primaria
        protected $allowedFields = [
            'nombre',
            'descripcion',
            'precio',
            'stock',
            
        ];
    }
?>