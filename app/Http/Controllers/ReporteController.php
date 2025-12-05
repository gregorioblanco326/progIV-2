<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReporteController extends Controller
{
    public function listar()
    {
        $reports = Report::all();
        return response()->json($reports);
    }

    public function exportarFallos()
    {
        $data = Report::all();

        if ($data->isEmpty()) {
            return response()->json(['error' => 'No hay reportes de fallos para exportar'], 404);
        }

        $fileName = 'reporte_fallos_' . now()->format('Ymd_His') . '.csv';

        $headers = [
            'ID',
            'Titulo Falla',
            'Equipo Afectado',
            'Prioridad',
            'Estado',
            'Fecha Reporte',
            'Creado En',
            'Actualizado En'
        ];

        $callback = function () use ($data, $headers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);

            foreach ($data as $reporte) {
                fputcsv($file, [
                    $reporte->id,
                    $reporte->titulo_falla,
                    $reporte->equipo_afectado,
                    $reporte->prioridad,
                    $reporte->estado,
                    $reporte->fecha_reporte,
                    $reporte->created_at,
                    $reporte->updated_at,
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '";',
        ]);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'titulo_falla' => 'required|string|max:255',
            'descripcion_falla' => 'required|string',
            'equipo_afectado' => 'required|string|max:255',
            'prioridad' => 'in:baja,media,alta',
            'estado' => 'in:abierto,en_proceso,cerrado',
            'fecha_reporte' => 'required|date',
        ]);
        $report = Report::create($request->all());
        return response()->json($report, 201);
    }

    public function ver(Report $report)
    {
        return response()->json($report);
    }

    public function actualizar(Request $request, Report $report)
    {
        $request->validate([
            'titulo_falla' => 'string|max:255',
            'descripcion_falla' => 'string',
            'equipo_afectado' => 'string|max:255',
            'prioridad' => 'in:baja,media,alta',
            'estado' => 'in:abierto,en_proceso,cerrado',
            'fecha_reporte' => 'date',
        ]);
        $report->update($request->all());
        return response()->json($report);
    }

    public function eliminar(Report $report)
    {
        $report->delete();
        return response()->json(null, 204);
    }
}
