<?php

namespace App\Http\Controllers;

use App\Models\tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $tarefas = Tarefa::where('titulo', 'like', "%{$query}%")
                ->orWhere('materia', 'like', "%{$query}%")
                ->get();
        } else {
            $tarefas = Tarefa::all();
        }

        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'materia' => 'required|max:255',
            'vencimento' => 'required|date',
        ]);

        $tarefa = new Tarefa();
        $tarefa->titulo = $validated['titulo'];
        $tarefa->descricao = $validated['descricao'];
        $tarefa->materia = $validated['materia'];
        $tarefa->vencimento = $validated['vencimento'];

        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.show', compact('tarefa'));
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'materia' => 'required|max:255',
            'vencimento' => 'required|date',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->titulo = $validated['titulo'];
        $tarefa->descricao = $validated['descricao'];
        $tarefa->materia = $validated['materia'];
        $tarefa->vencimento = $validated['vencimento'];

        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }
}