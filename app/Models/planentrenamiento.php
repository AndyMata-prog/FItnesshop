<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Empleados extends Model {
        protected $table = 'planentrenamiento';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_plan'; // llave primaria
        protected $allowedFields = [
            'nombre',
            'descripcion',
            'duracion',
            'precio'
            
            
        ];
    }
?>