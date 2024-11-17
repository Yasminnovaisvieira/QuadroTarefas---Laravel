<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');

Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');

Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');

Route::get('/tarefas/{id}', [TarefaController::class, 'show'])->name('tarefas.show');

Route::get('/tarefas/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');

Route::put('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');

Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

Route::get('/tarefas/search', [TarefaController::class, 'search'])->name('tarefas.search');

Route::resource('tarefas', TarefaController::class)->except(['create', 'store']);
