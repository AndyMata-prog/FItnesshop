<?php

namespace App\Controllers;

use App\Models\Clientes;
use CodeIgniter\Controller;

class ControladorCliente extends BaseController {
    // Probar conexión a la base de datos
    public function probarConexion() {
        try {
            $db = \Config\Database::connect();
            $db->initialize();
            $estado = $db->connID ? 'Conexión exitosa a la base de datos.' : 'Error de conexión.';
        } catch (\Exception $e) {
            $estado = 'Error de conexión: ' . $e->getMessage();
        }
        return view('clientes', ['conexion' => $estado, 'clientes' => []]);
    }
    // Mostrar todos los clientes
    public function index() {
        $clienteModel = new Clientes();
        $datosBD = $clienteModel->findAll();
        return view('clientes', ['datosBD' => $datosBD]);
    }

    // Crear nuevo cliente
    public function crear() {
        $clienteModel = new Clientes();
        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $clienteModel->insert($data);
        return redirect()->to(base_url('controladorcliente'));
    }

    // Actualizar cliente
    public function actualizar($id) {
        $clienteModel = new Clientes();
        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $clienteModel->update($id, $data);
        return redirect()->to(base_url('controladorcliente'));
    }

    // Eliminar cliente
    public function eliminar($id) {
        $clienteModel = new Clientes();
        $clienteModel->delete($id);
        return redirect()->to(base_url('controladorcliente'));
    }
}
