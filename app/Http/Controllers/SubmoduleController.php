<?php

namespace App\Http\Controllers;

use App\Classes\Functionalities;
use App\Models\Module;
use App\Models\Submodule;
use Illuminate\Http\Request;

class SubmoduleController extends Controller
{

    private $functionalities;

    public function __construct()
    {
        $this->functionalities = new Functionalities();
    }

    /*
     * Mostra a lista de sub-módulos cadastrados.
     */
    public function index()
    {
        $data = [];
        $delete = session('delete');
        if(!empty($delete)){
            $data += ['delete' => $delete];
        }
        $submoduleList = Submodule::all();
        $data += ['submoduleList' => $submoduleList];
        return view('submodules.submodules-list',$data);
    }

    /*
     * Mostra o formulário para inclusão de sub-módulos.
     */
    public function create()
    {
        $modules = Module::orderBy("name")->get();
        return view('submodules.submodules-form',["modules" => $modules]);
    }

    /*
     * Grava os dados do sub-módulo no banco de dados.
     * Redireciona para a lista de sub-módulos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'module' => 'required'
        ],[
            'name.required' => 'O campo Sub-Módulo é Obrigatório.',
            'module.required' => 'O campo Módulo é Obrigatório.'
        ]);

        Submodule::create([
            'name' => $request->name,
            'moduleid' => $request->module
        ]);
        return redirect()->route('submoduleList');
    }

   /*
     * Mostra o formulário para alteração de um sub-módulo específico.
     */
    public function edit($id)
    {
        $modules = Module::orderBy("name")->get();
        $submodule = Submodule::find($this->functionalities->decript($id));
        return view("submodules.submodules-form",[
            "submodule" => $submodule,
            "modules" => $modules]);
    }

    /*
     * Grava a alteração dos dados do sub-módulo no banco de dados.
     * Redireciona para a lista de sub-módulos
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'module' => 'required'
        ],[
            'name.required' => 'O campo Nome é Obrigatório.',
            'module.required' => 'O campo Módulo é Obrigatório.'
        ]);

        Submodule::where('id',$request->id)->update([
            'name' => $request->name,
            'moduleid' => $request->module
        ]);
        return redirect()->route('submoduleList');
    }

    /*
     * Exibi uma modal perguntando se o usuário realmente deseja excluir esse registro.
     */
    public function delete($id)
    {
        session()->flash('delete', $id);
        return redirect()->route('submoduleList');

    }

    /*
     * Através do mecanismo de SoftDeletes - inutiliza o módulo no sistema.
     * Atualiza a lista de módulos.
     */
    public function destroy(Request $request)
    {
        Submodule::find($request->id)->delete();
        return redirect()->route('submoduleList');
    }
}
