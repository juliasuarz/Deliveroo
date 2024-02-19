<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CursoController extends Controller
{
    public function index() {
        $cursos=Curso::paginate(10);
        return view('cursos.index',compact('cursos'));
    }

    public function create() {
        return view('cursos.create');
    }

    public function show($id) {
        $curso = Curso::find($id);
        return view('cursos.show',compact('curso'));
    }

    public function store(Request $request) {
        $curso = new Curso;
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show',$curso->id);
    }

    public function edit($id) {
        $curso = Curso::find($id);
        return view('cursos.edit',compact('curso'));
    }

    public function update(Request $request, Curso $curso) {
        $curso->name = $request->name;
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();
        return redirect()->route('cursos.show',$curso->id);
    }

    public function destroy(Curso $curso) {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}
