<?php
namespace App\Controllers;

use App\Models\Membresia;
use CodeIgniter\Controller;

class ControladorMembresia extends BaseController{

    // Mostrar todas las membresías
    public function verMembresias(){
        $db = \Config\Database::connect();
        $builder = $db->table('Membresia');
        $builder->select('*');
        $query = $builder->get();
        $datosBD['datosBD'] = $query->getResultArray();
        return view('membresias', $datosBD); // Vista membresias.php
    }

    // Guardar nueva membresía
    public function guardarMembresia(){
        $tipo       = $this->request->getVar('txt_tipo');
        $precio     = $this->request->getVar('txt_precio');
        $beneficios = $this->request->getVar('txt_beneficios');

        $membresia = new Membresia();
        $datos = [
            'tipo'       => $tipo,
            'precio'     => $precio,
            'beneficios' => $beneficios
        ];
        $membresia->insert($datos);

        return $this->verMembresias();
    }

    // Eliminar membresía
    public function eliminarMembresia($id=null){
        $membresia = new Membresia();
        $membresia->delete($id);
        return $this->verMembresias();
    }

    // Localizar membresía por ID (para editar)
    public function localizarMembresia($id=null){
        $membresia = new Membresia();
        $datosMembresia['datosMembresia'] = $membresia->where('id_membresia', $id)->first();
        return view('frm_actualizarMembresia', $datosMembresia); // Vista de edición
    }

    // Modificar membresía
    public function modificarMembresia(){
        $id         = $this->request->getVar('txt_id');
        $tipo       = $this->request->getVar('txt_tipo');
        $precio     = $this->request->getVar('txt_precio');
        $beneficios = $this->request->getVar('txt_beneficios');

        $membresia = new Membresia();
        $datos = [
            'tipo'       => $tipo,
            'precio'     => $precio,
            'beneficios' => $beneficios
        ];

        $membresia->update($id, $datos);
        return $this->verMembresias();
    }
}
