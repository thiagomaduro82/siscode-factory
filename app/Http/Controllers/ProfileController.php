<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Functionalities;
use App\Models\Profile;

class ProfileController extends Controller
{
    private $functionalities;

    public function __construct()
    {
        $this->functionalities = new Functionalities();
    }

    /*
     * Mostra a lista de perfis cadastrados.
     */
    public function index()
    {
        $data = [];
        $delete = session('delete');
        if(!empty($delete)){
            $data += ['delete' => $delete];
        }
        $profileList = Profile::all();
        $data += ['profileList' => $profileList];
        return view('profile.profile-list',$data);
    }

    /*
     * Mostra o formulário para inclusão de perfis.
     */
    public function create()
    {
        return view("profile.profile-form");
    }

    /*
     * Grava os dados do perfil no banco de dados.
     * Redireciona para a lista de perfis.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'O campo Nome é Obrigatório.'
        ]);

        Profile::create([
            'name' => $request->name
        ]);
        return redirect()->route('profileList');
    }

    /*
     * Mostra o formulário para alteração de um perfil específico.
     */
    public function edit($id)
    {
        $profile = Profile::find($this->functionalities->decript($id));
        return view("profile.profile-form",["profile" => $profile]);
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

        Profile::where('id',$request->id)->update(['name' => $request->name]);
        return redirect()->route('profileList');
    }

    /*
     * Exibi uma modal perguntando se o usuário realmente deseja excluir esse registro.
     */
    public function delete($id)
    {
        session()->flash('delete', $id);
        return redirect()->route('profileList');

    }

    /*
     * Através do mecanismo de SoftDeletes - inutiliza o módulo no sistema.
     * Atualiza a lista de módulos.
     */
    public function destroy(Request $request)
    {
        Profile::find($request->id)->delete();
        return redirect()->route('profileList');
    }
}
