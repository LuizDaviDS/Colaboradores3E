<?php

namespace App\Http\Controllers;
use App\Models\Colaborador;
use Illuminate\Http\Request;


class ColaboradorController extends Controller
{
    public Colaborador $colaborador;

    public function __construct()
    {
        $this->colaborador = new Colaborador();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = $this->colaborador->all();
        return view('colaboradores', ['colaboradores' => $colaboradores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = [
            'Tecnologia',
            'Administrativo',
            'Projeto'
        ];
    
        $cidades = [
            'Rio Branco',
            'Maceio',
            'Macapa',
            'Manaus',
            'Salvador',
            'Fortaleza',
            'Brasilia',
            'Vitoria',
            'Goiania',
            'Sao Luis',
            'Cuiaba',
            'Campo Grande',
            'Belo Horizonte',
            'Belem',
            'Joao Pessoa',
            'Curitiba',
            'Recife',
            'Teresina',
            'Rio De Janeiro',
            'Natal',
            'Porto Alegre',
            'Porto Velho',
            'Boa Vista',
            'Florianopolis',
            'Sao Paulo',
            'Aracaju',
            'Palmas',
        ];
        return view('create', compact('setores', 'cidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:colaboradors',
            'setor' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'checkin' => 'required|date',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'setor.required' => 'O campo setor é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'checkin.required' => 'O campo checkin é obrigatório.',
            'email.unique' => 'O email já está cadastrado.',
            'checkin.date' => 'O campo checkin deve ser uma data válida.',
        ]);

        $created = $this->colaborador->create([
            'nome' => strtoupper(trim($request->input('nome'))),
            'email' => trim($request->input('email')),
            'setor' => $request->input('setor'),
            'cidade' => $request->input('cidade'),
            'checkin' => $request->input('checkin'),
        ]);

        if (!$created) {
            return redirect()->back()->with('error', 'Erro ao criar colaborador.');
        } else {
            return redirect()->back()->with('success', 'Colaborador criado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                $setores = [
                    'Tecnologia',
                    'Administrativo',
                    'Projeto'
                ];

                $cidades = [
                    'Rio Branco',
                    'Maceio',
                    'Macapa',
                    'Manaus',
                    'Salvador',
                    'Fortaleza',
                    'Brasilia',
                    'Vitoria',
                    'Goiania',
                    'Sao Luis',
                    'Cuiaba',
                    'Campo Grande',
                    'Belo Horizonte',
                    'Belem',
                    'Joao Pessoa',
                    'Curitiba',
                    'Recife',
                    'Teresina',
                    'Rio De Janeiro',
                    'Natal',
                    'Porto Alegre',
                    'Porto Velho',
                    'Boa Vista',
                    'Florianopolis',
                    'Sao Paulo',
                    'Aracaju',
                    'Palmas'
                ];

                return view('edit', [
                    'colaborador' => $this->colaborador->find($id),
                    'setores' => $setores,
                    'cidades' => $cidades
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:colaboradors,email,' . $id,
            'setor' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'checkin' => 'required|date',
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'setor.required' => 'O campo setor é obrigatório.',
            'cidade.required' => 'O campo cidade é obrigatório.',
            'checkin.required' => 'O campo checkin é obrigatório.',
            'email.unique' => 'O email já está cadastrado.',
            'checkin.date' => 'O campo checkin deve ser uma data válida.',
        ]);

        $updated = $this->colaborador->where('id', $id)->update([
            'nome' => strtoupper(trim($request->input('nome'))),
            'email' => trim($request->input('email')),
            'setor' => $request->input('setor'),
            'cidade' => $request->input('cidade'),
            'checkin' => $request->input('checkin'),
        ]);

        if (!$updated) {
            return redirect()->back()->with('error', 'Erro ao atualizar colaborador.');
        } else {
            return redirect()->back()->with('success', 'Colaborador atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->colaborador->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Colaborador deletado com sucesso!');
    }
}
