<?php

namespace App\Http\Controllers\pmb;

use App\Http\Controllers\Controller;
use App\Models\pmb\Biodata as Model;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class BiodataController extends Controller
{
  

    public function __construct()
    {
      
        $this->connection = 'PUSTIKOM_PMB';
        $this->db_name    = env("DB_PUSTIKOM_PMB");
    }

    public function index()
    {
        $results = Model::with('maba')->latest()->get();
        
        return $this->res($this->db_name, $results, Response::HTTP_OK);
    }

    public function show($id)
    {
        $result = Model::with('maba')->findOrFail($id);

        return $this->res($this->db_name, $result, Response::HTTP_OK);
    }

    public function store()
    {
        try {
            $results = Model::create(request()->all());
            return $this->res($this->db_name, $results, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return $this->res_error($this->db_name, $e->errorInfo[2],  Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function update($id)
    {
        $query = Model::findOrFail($id);

        try {
            $results = $query->update(request()->all());
            return $this->res($this->db_name, $results, Response::HTTP_OK);
        } catch (QueryException $e) {
            return $this->res_error($this->db_name, $e->errorInfo[2],  Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    public function delete($id)
    {
        $query = Model::findOrFail($id);

        try {
            $results = $query->delete();
            return $this->res($this->db_name, $results, Response::HTTP_OK);
        } catch (QueryException $e) {
          
            return $this->res_error($this->db_name, $e->errorInfo[2], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
