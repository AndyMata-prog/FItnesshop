<?php
namespace App\Controllers;

use App\Models\Pago;
use CodeIgniter\Controller;

class ControladorPago extends BaseController{

    // Mostrar todos los pagos
    public function verPagos(){
        $db = \Config\Database::connect();
        $builder = $db->table('pago');
        $builder->select('pago.*, cliente.nombre as nombre_cliente, membresia.tipo as tipo_membresia, plan.nombre as nombre_plan');
        $builder->join('cliente', 'cliente.id_clientes = pago.id_cliente', 'left');
        $builder->join('membresia', 'membresia.id_membresia = pago.id_membresia', 'left');
        $builder->join('plan', 'plan.id_plan = pago.id_plan', 'left');
        $query = $builder->get();
        $datosBD['datosBD'] = $query->getResultArray();
        return view('pagos', $datosBD); // Vista pagos.php
    }

    // Guardar nuevo pago
    public function guardarPago(){
        $fecha     = $this->request->getVar('txt_fecha');
        $monto     = $this->request->getVar('txt_monto');
        $idCliente = $this->request->getVar('txt_id_cliente');
        $idMembresia = $this->request->getVar('txt_id_membresia');
        $idPlan    = $this->request->getVar('txt_id_plan');

        $pago = new Pago();
        $datos = [
            'fecha'       => $fecha,
            'monto'       => $monto,
            'id_cliente'  => $idCliente,
            'id_membresia'=> $idMembresia,
            'id_plan'     => $idPlan
        ];
        $pago->insert($datos);

        return $this->verPagos();
    }

    // Eliminar pago
    public function eliminarPago($id=null){
        $pago = new Pago();
        $pago->delete($id);
        return $this->verPagos();
    }

    // Localizar pago por ID (para editar)
    public function localizarPago($id=null){
        $pago = new Pago();
        $datosPago['datosPago'] = $pago->where('id_pago', $id)->first();
        return view('frm_actualizarPago', $datosPago); // Vista para editar
    }

    // Modificar pago
    public function modificarPago(){
        $id        = $this->request->getVar('txt_id');
        $fecha     = $this->request->getVar('txt_fecha');
        $monto     = $this->request->getVar('txt_monto');
        $idCliente = $this->request->getVar('txt_id_cliente');
        $idMembresia = $this->request->getVar('txt_id_membresia');
        $idPlan    = $this->request->getVar('txt_id_plan');

        $pago = new Pago();
        $datos = [
            'fecha'       => $fecha,
            'monto'       => $monto,
            'id_cliente'  => $idCliente,
            'id_membresia'=> $idMembresia,
            'id_plan'     => $idPlan
        ];

        $pago->update($id, $datos);
        return $this->verPagos();
    }
}
