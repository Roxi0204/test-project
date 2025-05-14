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
            $pagination= CicloFormativo::with ('user','ciclo')->paginate(5);
        }else{
            $pagination= CicloFormativo::with ('user','ciclo')->orderBy('created_at','desc')->paginate($paginate->pagination);
        }
        $ciclo= Ciclo::get();
        $ciclosformativos= CicloFormativo::with('ciclo')->get();

         return Inertia::render('CicloFormativo', [
            'pagination' => $pagination,
            'ciclosformativos' => $ciclosformativos,
            'ciclos' => $ciclo,
            
        ]);
    }

    public function create()
    {
        $ciclos = Ciclo::all();
        return Inertia::render('CicloFormativoFormulari', [
            'ciclos' => $ciclos,
        ]);
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'valuation' => 'required|string|max:255',
            'personalopinion' => 'required|string|max:255',
            'cicle' => 'required|exists:ciclos,id',
            'email' => 'required|email|max:255',
        ]);

        CicloFormativo::create([
            'name' => $request->name,
            'level' => $request->level,
            'description' => $request->description,
            'valuation' => $request->valuation,
            'personalopinion' => $request->personalopinion,
            'email_contact' => $request->email,
            'ciclos_id' => $request->cicle,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('cicloformativos.index');
    }
    
    public function getByCicle(Request $request)
    {
        $cicleId = $request->input('ciclos_id');
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 5);

        $query = CicloFormativo::with('user', 'ciclo')
            ->orderBy('created_at', 'desc');

        if ($cicleId && $cicleId !== 'all') {
            $query->where('ciclos_id', $cicleId);
        }

        $cicloformativo = $query->paginate($perPage, ['*'], 'page', $page);

        return $cicloformativo;
    }

   public function show($id)
    {
        $authenticatedUser = Auth::user();

        $cicloformativo = CicloFormativo::with('user', 'ciclo')->where('id',$id)->first();
        return Inertia::render('CicloFormativoShow', [
            'cicloformativo' => $cicloformativo,
            'authenticatedUser' => $authenticatedUser,
        ]);
    }
    public function edit($id)
    {
        $cicloformativo = CicloFormativo::with('user', 'ciclo')->findOrFail($id);
        $ciclos = Ciclo::all();
        return Inertia::render('CicloFormativoEdit', [
            'cicloformativo' => $cicloformativo,
            'ciclos' => $ciclos,
        ]);
    }
    public function update(Request $request, $id)
    {
        $cicloformativo = CicloFormativo::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'valuation' => 'required|string|max:255',
            'personalopinion' => 'required|string|max:255',
            'cicle' => 'required|exists:ciclos,id',
            'email_contact' => 'required|email|max:255',
        ]);

        $cicloformativo->update([
            'name' => $request->name,
            'level' => $request->level,
            'description' => $request->description,
            'valuation' => $request->valuation,
            'personalopinion' => $request->personalopinion,
            'ciclos_id' => $request->cicle,
            'email_contact' => $request->email_contact,
        ]);

        return redirect()->route('cicloformativos.show', $id);
    }
    public function destroy($id)
    {
        $cicloformativo = CicloFormativo::findOrFail($id);
        $cicloformativo->delete();

        return $cicloformativo;
    }
    
}