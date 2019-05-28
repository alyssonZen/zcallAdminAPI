<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\API\ApiError;

class ClienteController extends Controller
{
    private $cliente;
    public function __construct(Clientes $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Obtém todos clientes
     *
     * @return Object JSON
     * @author Alysson Melo
     */
    public function index()
    {
      return response()->json(["data" => $this->cliente->all()], 200);
    }
    /**
     * Obtém um cliente específico
     *
     * @return Object JSON
     * @author Alysson Melo
     */
    public function show(Clientes $id)
    {
    	return response()->json($id, 200);
    }
    /**
     * Cadastra um cliente
     *
     * @return Object JSON
     * @author Alysson Melo
     */
    public function store(Request $request)
    {
        try
        {
            $data = $request->all();
            $cliente = $this->cliente->create($data);
            return response()->json($cliente, 201);
        }
        catch (\Exception $e)
        {
            if(config('app.debug'))
            {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 409);
            }
            return response()->json(ApiError::errorMessage("Não foi posível inserir o registro.", 1010), 409);
        }
    }
    /**
	 * Edita um cliente específico
	 *
	 * @return Object JSON
	 * @author Alysson Melo
	 */
    public function update(Request $request, $id)
    {
    	try
    	{
	    	$data = $request->all();
	    	$cliente = $this->cliente->find($id);
	    	$cliente->update($data);
	    	return response()->json(["message" => "Cliente atualizado"], 201);
    	}
    	catch (\Exception $e)
    	{
    		if(config('app.debug'))
    		{
    			return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 409);
    		}
    		return response()->json(ApiError::errorMessage("Não foi posível alterar o registro.", 1011), 409);
    	}
    }
    /**
     * Apaga o registro de um cliente específico
     *
     * @return Object JSON
     * @author Alyson Melo
     */
    public function delete(Clientes $id)
    {
        try {
            $id->delete();
            return response()->json(["message" => "Cliente {$id->name} removido"], 200);
        } catch (\Exception $e) {
            if(config('app.debug'))
            {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 409);
            }
            return response()->json(ApiError::errorMessage("Não foi posível apagar o registro.", 1012), 409);
        }
    }
}
