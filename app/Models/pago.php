<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Empleados extends Model {
        protected $table = 'pago';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_pago'; // llave primaria
        protected $allowedFields = [
            'fecha',
            'monto',
            'id_cliente',
            'id_membreia',
            'id_plan'
        
            
        ];
    }
?>