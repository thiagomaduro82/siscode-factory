<?php

namespace App\Http\Controllers;

use App\Classes\Functionalities;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    private $functionalities;

    public function __construct()
    {
        $this->functionalities = new Functionalities();
    }
    /*
     * Mostra a lista de módulos cadastrados.
     */
    public function index()
    {
        $data = [];
        $delete = session('delete');
        if(!empty($delete)){
            $data += ['delete' => $delete];
        }
        $moduleList = Module::all();
        $data += ['moduleList' => $moduleList];
        return view('module.module-list',$data);
    }

    /*
     * Mostra o formulário para inclusão de módulos.
     */
    public function create()
    {
        return view('module.module-form');
    }

    /*
     * Grava os dados do módulo no banco de dados.
     * Redireciona para a lista de módulos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'O campo Nome é Obrigatório.'
        ]);

        Module::create([
            'name' => $request->name
        ]);
        return redirect()->route('moduleList');
    }

    /*
     * Mostra o formulário para alteração de um módulo específico.
     */
    public function edit($id)
    {
        $module = Module::find($this->functionalities->decript($id));
        return view("module.module-form",["module" => $module]);
    }

    /*
     * Grava a alteração dos dados do módulo no banco de dados.
     * Redireciona para a lista de módulos
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'O campo Nome é Obrigatório.'
        ]);

        Module::where('id',$request->id)->update(['name' => $request->name]);
        return redirect()->route('moduleList');
    }

    /*
     * Exibi uma modal perguntando se o usuário realmente deseja excluir esse registro.
     */
    public function delete($id)
    {
        session()->flash('delete', $id);
        return redirect()->route('moduleList');

    }

    /*
     * Através do mecanismo de SoftDeletes - inutiliza o módulo no sistema.
     * Atualiza a lista de módulos.
     */
    public function destroy(Request $request)
    {
        Module::find($request->id)->delete();
        return redirect()->route('moduleList');
    }
}
