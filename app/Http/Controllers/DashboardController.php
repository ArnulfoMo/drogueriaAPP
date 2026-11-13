<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
   public function index()
    {
        $totalMedicamentos = Medicamento::count();

        $totalProveedoresActivos = Proveedor::where('estado', 'Activo')->count();

        $totalEmpleados = Empleado::count();

        $valorInventario = Medicamento::selectRaw('SUM(inventario * precio) as total')
            ->value('total');

        $valorInventario = $valorInventario ?? 0;

        return view('dashboard.index', compact(
            'totalMedicamentos',
            'totalProveedoresActivos',
            'totalEmpleados',
            'valorInventario'
        ));
    }
}
