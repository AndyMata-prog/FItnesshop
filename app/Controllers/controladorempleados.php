<?php
namespace App\Controllers;

use App\Models\Empleados;
use CodeIgniter\Controller;

class ControladorEmpleados extends BaseController{

    // Mostrar todos los empleados
    public function verEmpleados(){
        $db = \Config\Database::connect();
        $builder = $db->table('Empleados');
        $builder->select('Empleados.*, correos.correo as correo_empleado');
        $builder->join('correos', 'correos.id_correo = Empleados.id_correo', 'left'); // Ajusta si tu tabla de correos tiene otro nombre
        $query = $builder->get();
        $datosBD['datosBD'] = $query->getResultArray();
        return view('empleados', $datosBD); // Vista empleados.php
    }

    // Guardar nuevo empleado
    public function guardarEmpleado(){
        $nombre     = $this->request->getVar('txt_nombre');
        $apellido   = $this->request->getVar('txt_apellido');
        $direccion  = $this->request->getVar('txt_direccion');
        $telefono   = $this->request->getVar('txt_telefono');
        $correo     = $this->request->getVar('txt_id_correo');
        $pass       = $this->request->getVar('txt_contra');

        $empleado = new Empleados();
        $datos = [
            'nombre'     => $nombre,
            'apellido'   => $apellido,
            'direccion'  => $direccion,
            'telefono'   => $telefono,
            'id_correo'  => $correo,
            'contraseña' => $pass
        ];
        $empleado->insert($datos);

        return $this->verEmpleados();
    }

    // Eliminar empleado
    public function eliminarEmpleado($id=null){
        $empleado = new Empleados();
        $empleado->delete($id);
        return $this->verEmpleados();
    }

    // Localizar empleado por ID (para editar)
    public function localizarEmpleado($id=null){
        $empleado = new Empleados();
        $datosEmpleado['datosEmpleado'] = $empleado->where('id_empleado', $id)->first();
        return view('frm_actualizarEmpleado', $datosEmpleado); // Vista de edición
    }

    // Modificar empleado
    public function modificarEmpleado(){
        $id        = $this->request->getVar('txt_id');
        $nombre    = $this->request->getVar('txt_nombre');
        $apellido  = $this->request->getVar('txt_apellido');
        $direccion = $this->request->getVar('txt_direccion');
        $telefono  = $this->request->getVar('txt_telefono');
        $correo    = $this->request->getVar('txt_id_correo');
        $pass      = $this->request->getVar('txt_contra');

        $empleado = new Empleados();
        $datos = [
            'nombre'     => $nombre,
            'apellido'   => $apellido,
            'direccion'  => $direccion,
            'telefono'   => $telefono,
            'id_correo'  => $correo,
            'contraseña' => $pass
        ];

        $empleado->update($id, $datos);
        return $this->verEmpleados();
    }
}
