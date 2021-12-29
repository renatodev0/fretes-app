<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class FreteController extends Controller
{
    public function index () {
        try{
            $fretes = Frete::all();

            return response()->json($fretes, 200);
        }catch (\Throwable $tr) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function create (Request $request) {
        try{
            $enum_status = ['iniciado', 'trânsito', 'concluido'];

            if(!in_array($request->status, $enum_status)){
                return response()->json(['error' => ['message' => 'O campo status precisa ter algum desses valores: [iniciado, trânsito, concluido]']], 422);
            }

            Frete::create([
                'placa' => $request->placa,
                'dono_veiculo' => $request->dono_veiculo,
                'valor' => $request->valor,
                'data_inicio' => $request->data_inicio,
                'data_fim' => $request->data_fim,
                'status' => $request->status
            ]);

            return response()->json(['message' => ['success']], 200);
        }catch (\Throwable $tr) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function update (Request $request, $id) {
        try{
            Frete::find($id)->update([
                'placa' => $request->placa,
                'dono_veiculo' => $request->dono_veiculo,
                'valor' => $request->valor,
                'data_inicio' => $request->data_inicio,
                'data_fim' => $request->data_fim,
                'status' => $request->status
            ]);

            return response()->json(['message' => ['success']], 200);
        } catch (\Throwable $tr) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function delete ($id) {
        try {
            Frete::find($id)->delete();

            return response()->json(['message' => ['success']], 200);
        } catch (\Throwable $tr) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }

    public function find ($id) {
        try {
            $frete = Frete::find($id);

            return response()->json($frete);
        } catch (\Throwable $tr) {
            return response()->json(['error' => ['message' => 'unexpected error']], 422);
        }
    }
}
