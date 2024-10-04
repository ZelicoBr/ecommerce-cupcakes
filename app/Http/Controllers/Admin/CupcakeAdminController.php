<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cupcake;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CupcakeAdminController extends Controller
{
    public function index() {
        $cupcakes = Cupcake::all();
        return view('admin.cupcakes.index', compact('cupcakes'));
    }

    public function create() {
        return view('admin.cupcakes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria' => 'required',
            'imagem' => 'required|image',
        ]);

        $path = $request->file('imagem')->store('imagens/cupcakes', 'public');

        Cupcake::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'imagem' => $path,
        ]);

        return redirect()->route('cupcakes.index')->with('success', 'Cupcake criado com sucesso.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id) {
        $cupcake = Cupcake::findOrFail($id);
        return view('admin.cupcakes.edit', compact('cupcake'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'categoria' => 'required',
            'imagem' => 'image|nullable', // Imagem é opcional no update
        ]);

        $cupcake = Cupcake::findOrFail($id);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens/cupcakes', 'public');
            $cupcake->imagem = $path; 
        }

        // Atualize os demais campos
        $cupcake->nome = $request->nome;
        $cupcake->descricao = $request->descricao;
        $cupcake->preco = $request->preco;
        $cupcake->categoria = $request->categoria;
        $cupcake->save();

        return redirect()->route('cupcakes.index')->with('success', 'Cupcake atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cupcake::where('id', $id)->delete();
        return redirect()->route('cupcakes.index')->with('success', 'Cupcake deletado com sucesso');
    }
}
