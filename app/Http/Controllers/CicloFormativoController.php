<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Ciclo;
use App\Models\CicloFormativo;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class CicloFormativoController extends Controller
{
    public function index()
    {
        $paginate = CicloFormativo::with ('user','ciclo')->first();
        if(!$paginate){
            $paginate= CicloFormativo::with ('user','ciclo')->paginate(5);
        }else{
            $pagination= CicloFormativo::with ('user','ciclo')->orderBy('created_at','desc')->paginate($paginate->pagination);
        }
        $ciclo= Ciclo::get();
        $ciclosformativos= CicloFormativo::with('ciclo')->get();

         return Inertia::render('Cicloformativos', [
            'pagination' => $pagination,
            'ciclosformativos' => $ciclosformativos,
            'ciclos' => $ciclo,
            
        ]);
    }

    
}
