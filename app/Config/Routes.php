<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// ====================================================================
// RUTAS DE GESTIÓN DE CLIENTES (ControladorCliente)
// ====================================================================

// GET: Muestra la lista de todos los clientes (READ)
$routes->get('clientes', 'ControladorCliente::index');

// POST: Procesa el formulario para crear un nuevo cliente (CREATE)
$routes->post('clientes/crear', 'ControladorCliente::crear');

// POST: Procesa el formulario para actualizar un cliente específico (UPDATE)
$routes->post('clientes/actualizar/(:num)', 'ControladorCliente::actualizar/$1');

// GET/DELETE: Elimina un cliente específico (DELETE)
$routes->get('clientes/eliminar/(:num)', 'ControladorCliente::eliminar/$1');


// ====================================================================
// RUTAS DE GESTIÓN DE EMPLEADOS (ControladorEmpleados)
// ====================================================================

// GET: Muestra la lista de empleados (READ)
$routes->get('empleados', 'ControladorEmpleados::verEmpleados');

// POST: Procesa el formulario para guardar un nuevo empleado (CREATE)
$routes->post('empleados/guardar', 'ControladorEmpleados::guardarEmpleado');

// GET: Muestra el formulario para editar un empleado por ID (PRE-UPDATE)
$routes->get('empleados/localizar/(:num)', 'ControladorEmpleados::localizarEmpleado/$1');

// POST: Procesa la modificación de un empleado (UPDATE)
$routes->post('empleados/modificar', 'ControladorEmpleados::modificarEmpleado');

// GET/DELETE: Elimina un empleado específico (DELETE)
$routes->get('empleados/eliminar/(:num)', 'ControladorEmpleados::eliminarEmpleado/$1');


// ====================================================================
// RUTAS DE GESTIÓN DE MEMBRESÍAS (ControladorMembresia)
// ====================================================================

// GET: Muestra la lista de membresías (READ)
$routes->get('membresias', 'ControladorMembresia::verMembresias');

// POST: Procesa el formulario para guardar una nueva membresía (CREATE)
$routes->post('membresias/guardar', 'ControladorMembresia::guardarMembresia');

// GET: Muestra el formulario para editar una membresía por ID (PRE-UPDATE)
$routes->get('membresias/localizar/(:num)', 'ControladorMembresia::localizarMembresia/$1');

// POST: Procesa la modificación de una membresía (UPDATE)
$routes->post('membresias/modificar', 'ControladorMembresia::modificarMembresia');

// GET/DELETE: Elimina una membresía específica (DELETE)
$routes->get('membresias/eliminar/(:num)', 'ControladorMembresia::eliminarMembresia/$1');


// ====================================================================
// RUTAS DE GESTIÓN DE PAGOS (ControladorPago)
// ====================================================================

// GET: Muestra la lista de pagos (READ)
$routes->get('pagos', 'ControladorPago::verPagos');

// POST: Procesa el formulario para guardar un nuevo pago (CREATE)
$routes->post('pagos/guardar', 'ControladorPago::guardarPago');

// GET: Muestra el formulario para editar un pago por ID (PRE-UPDATE)
$routes->get('pagos/localizar/(:num)', 'ControladorPago::localizarPago/$1');

// POST: Procesa la modificación de un pago (UPDATE)
$routes->post('pagos/modificar', 'ControladorPago::modificarPago');

// GET/DELETE: Elimina un pago específico (DELETE)
$routes->get('pagos/eliminar/(:num)', 'ControladorPago::eliminarPago/$1');


// ====================================================================
// RUTAS DE GESTIÓN DE PLANES DE ENTRENAMIENTO (ControladorPlanEntrenamiento)
// ====================================================================

// GET: Muestra la lista de planes de entrenamiento (READ)
$routes->get('planes', 'ControladorPlanEntrenamiento::verPlanes');

// POST: Procesa el formulario para guardar un nuevo plan (CREATE)
$routes->post('planes/guardar', 'ControladorPlanEntrenamiento::guardarPlan');

// GET: Muestra el formulario para editar un plan por ID (PRE-UPDATE)
$routes->get('planes/localizar/(:num)', 'ControladorPlanEntrenamiento::localizarPlan/$1');

// POST: Procesa la modificación de un plan (UPDATE)
$routes->post('planes/modificar', 'ControladorPlanEntrenamiento::modificarPlan');

// GET/DELETE: Elimina un plan específico (DELETE)
$routes->get('planes/eliminar/(:num)', 'ControladorPlanEntrenamiento::eliminarPlan/$1');


// ====================================================================
// RUTAS DE GESTIÓN DE PRODUCTOS (ControladorProducto)
// ====================================================================

// GET: Muestra la lista de productos (READ)
$routes->get('productos', 'ControladorProducto::verProductos');

// POST: Procesa el formulario para guardar un nuevo producto (CREATE)
$routes->post('productos/guardar', 'ControladorProducto::guardarProducto');

// GET: Muestra el formulario para editar un producto por ID (PRE-UPDATE)
$routes->get('productos/localizar/(:num)', 'ControladorProducto::localizarProducto/$1');

// POST: Procesa la modificación de un producto (UPDATE)
$routes->post('productos/modificar', 'ControladorProducto::modificarProducto');

// GET/DELETE: Elimina un producto específico (DELETE)
$routes->get('productos/eliminar/(:num)', 'ControladorProducto::eliminarProducto/$1');
