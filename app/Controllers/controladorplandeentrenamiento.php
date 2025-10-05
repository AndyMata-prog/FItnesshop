<?php
namespace App\Controllers;

use App\Models\PlanEntrenamiento;
use CodeIgniter\Controller;

class ControladorPlanEntrenamiento extends BaseController{

    // Mostrar todos los planes
    public function verPlanes(){
        $db = \Config\Database::connect();
        $builder = $db->table('planentrenamiento');
        $builder->select('*');
        $query = $builder->get();
        $datosBD['datosBD'] = $query->getResultArray();
        return view('planes', $datosBD); // Vista planes.php
    }

    // Guardar nuevo plan
    public function guardarPlan(){
        $nombre      = $this->request->getVar('txt_nombre');
        $descripcion = $this->request->getVar('txt_descripcion');
        $duracion    = $this->request->getVar('txt_duracion');
        $precio      = $this->request->getVar('txt_precio');

        $plan = new PlanEntrenamiento();
        $datos = [
            'nombre'      => $nombre,
            'descripcion' => $descripcion,
            'duracion'    => $duracion,
            'precio'      => $precio
        ];
        $plan->insert($datos);

        return $this->verPlanes();
    }

    // Eliminar plan
    public function eliminarPlan($id=null){
        $plan = new PlanEntrenamiento();
        $plan->delete($id);
        return $this->verPlanes();
    }

    // Localizar plan por ID (para editar)
    public function localizarPlan($id=null){
        $plan = new PlanEntrenamiento();
        $datosPlan['datosPlan'] = $plan->where('id_plan', $id)->first();
        return view('frm_actualizarPlan', $datosPlan); // Vista para editar
    }

    // Modificar plan
    public function modificarPlan(){
        $id          = $this->request->getVar('txt_id');
        $nombre      = $this->request->getVar('txt_nombre');
        $descripcion = $this->request->getVar('txt_descripcion');
        $duracion    = $this->request->getVar('txt_duracion');
        $precio      = $this->request->getVar('txt_precio');

        $plan = new PlanEntrenamiento();
        $datos = [
            'nombre'      => $nombre,
            'descripcion' => $descripcion,
            'duracion'    => $duracion,
            'precio'      => $precio
        ];

        $plan->update($id, $datos);
        return $this->verPlanes();
    }
}
