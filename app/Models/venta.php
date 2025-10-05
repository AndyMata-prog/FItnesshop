<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Clientes extends Model {
        protected $table = 'venta';   // nombre exacto de la tabla en MySQL
        protected $primaryKey = 'id_venta'; // llave primaria
        protected $allowedFields = [
            'fecha',
            'total',
            'id_cliente',
            'id_empleado'
         
        ];
    }
?>
