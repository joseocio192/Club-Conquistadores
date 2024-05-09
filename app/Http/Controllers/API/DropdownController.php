<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class DropdownController extends Controller
{

    public function getPaisList(Request $request)
    {
        $paises = DB::table("Pais")
            ->pluck("nombre", "id");
        return response()->json($paises);
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("Estados")
            ->where("pais_id", $request->pais_id)
            ->pluck("nombre", "id");
        return response()->json($states);
    }
    public function getMunicipalityList(Request $request)
    {
        $municipios = DB::table("Municipios")
            ->where("estado_id", $request->estado_id)
            ->pluck("nombre", "id");
        return response()->json($municipios);
    }

    public function getCityList(Request $request)
    {
        try {
            $ciudades = DB::table("Ciudad")
                ->where("municipio_id", $request->municipio_id)
                ->pluck("nombre", "id");
            return response()->json($ciudades);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function getClubList(Request $request)
    {

        try {
            $clubs = DB::table("Clubs")
                ->where("ciudad_Id", $request->ciudad_id)
                ->pluck("nombre", "id");
            return response()->json($clubs);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
