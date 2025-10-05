<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Membresia extends Model {
        protected $table = 'Membresia';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_membresia'; // llave primaria
        protected $allowedFields = [
            'tipo',
            'precio',
            'beneficios'
            
            
        ];
    }
?>