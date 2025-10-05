<?php
namespace App\Controllers;

use App\Models\Producto;
use CodeIgniter\Controller;

class ControladorProducto extends BaseController{

    // Mostrar todos los productos
    public function verProductos(){
        $db = \Config\Database::connect();
        $builder = $db->table('producto');
        $builder->select('*');
        $query = $builder->get();
        $datosBD['datosBD'] = $query->getResultArray();
        return view('productos', $datosBD); // Vista productos.php
    }

    // Guardar nuevo producto
    public function guardarProducto(){
        $nombre      = $this->request->getVar('txt_nombre');
        $descripcion = $this->request->getVar('txt_descripcion');
        $precio      = $this->request->getVar('txt_precio');
        $stock       = $this->request->getVar('txt_stock');

        $producto = new Producto();
        $datos = [
            'nombre'      => $nombre,
            'descripcion' => $descripcion,
            'precio'      => $precio,
            'stock'       => $stock
        ];
        $producto->insert($datos);

        return $this->verProductos();
    }

    // Eliminar producto
    public function eliminarProducto($id=null){
        $producto = new Producto();
        $producto->delete($id);
        return $this->verProductos();
    }

    // Localizar producto por ID (para editar)
    public function localizarProducto($id=null){
        $producto = new Producto();
        $datosProducto['datosProducto'] = $producto->where('id_producto', $id)->first();
        return view('frm_actualizarProducto', $datosProducto); // Vista de edición
    }

    // Modificar producto
    public function modificarProducto(){
        $id          = $this->request->getVar('txt_id');
        $nombre      = $this->request->getVar('txt_nombre');
        $descripcion = $this->request->getVar('txt_descripcion');
        $precio      = $this->request->getVar('txt_precio');
        $stock       = $this->request->getVar('txt_stock');

        $producto = new Producto();
        $datos = [
            'nombre'      => $nombre,
            'descripcion' => $descripcion,
            'precio'      => $precio,
            'stock'       => $stock
        ];

        $producto->update($id, $datos);
        return $this->verProductos();
    }
}
