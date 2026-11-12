<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicamentoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $medicamentos = Medicamento::when($buscar, function ($query) use ($buscar) {
            $query->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('codigo', 'like', "%{$buscar}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo'            => 'required|unique:medicamentos,codigo|max:255',
            'nombre'            => 'required|max:255',
            'categoria'         => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio'            => 'required|numeric|gt:0',
            'costo'             => 'required|numeric|min:0',
            'inventario'        => 'required|integer|min:0',
            'imagen'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio'       => 'required|max:255',
            'fecha_vencimiento' => 'required|date',
            'fecha_registro'    => 'required|date',
            'numero_lote'       => 'required|max:255',
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('uploads/medicamentos', 'public');
        }

        Medicamento::create($datos);

        return redirect()->route('medicamentos.index')
            ->with('success', '¡Medicamento registrado exitosamente en el inventario!');
    }

    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, Medicamento $medicamento)
    {
        $datos = $request->validate([
            'codigo'            => 'required|max:255|unique:medicamentos,codigo,' . $medicamento->id,
            'nombre'            => 'required|max:255',
            'categoria'         => 'required|in:Antibióticos,Analgésicos,Sueros,Material Quirúrgico,Vitaminas',
            'precio'            => 'required|numeric|gt:0',
            'costo'             => 'required|numeric|min:0',
            'inventario'        => 'required|integer|min:0',
            'imagen'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio'       => 'required|max:255',
            'fecha_vencimiento' => 'required|date',
            'fecha_registro'    => 'required|date',
            'numero_lote'       => 'required|max:255',
        ]);

        $imagenAnterior = $medicamento->imagen;

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('uploads/medicamentos', 'public');
        }

        $medicamento->update($datos);

        if ($request->hasFile('imagen') && $imagenAnterior) {
            Storage::disk('public')->delete($imagenAnterior);
        }

        return redirect()->route('medicamentos.index')
            ->with('success', '¡Medicamento actualizado exitosamente en el inventario!');
    }

    public function destroy(Medicamento $medicamento)
    {
        $imagen = $medicamento->imagen;

        $medicamento->delete();

        if ($imagen) {
            Storage::disk('public')->delete($imagen);
        }

        return redirect()->route('medicamentos.index')
            ->with('success', '¡Medicamento eliminado exitosamente del inventario!');
    }
}
