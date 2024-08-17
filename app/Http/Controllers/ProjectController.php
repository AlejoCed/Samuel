<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    
    public function create()
    {
        return view('projects.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:5|max:255',
            'status' => 'required|in:no iniciado,en curso,terminado',
            'budget' => 'required|integer|min:0',
            // 'quote_files' => 'nullable|array',
            // 'quote_files.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
            // 'plan_files' => 'nullable|array',
            // 'plan_files.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
            'notes' => 'nullable|string',
        ]);

        

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Proyecto creado correctamente');
    }

   
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        $projects = Project::findOrFail($id);
        return view('projects.edit', compact('projects'));
    }

    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'nombre' => 'required|string|min:5|max:255',
        //     'status' => 'required|in:no iniciado,en curso,terminado',
        //     'budget' => 'required|integer|min:0',
        //     // 'quote_files' => 'nullable|array',
        //     // 'quote_files.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        //     // 'plan_files' => 'nullable|array',
        //     // 'plan_files.*' => 'file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        //     'notes' => 'nullable|string',
        // ]);

        

        $project = Project::findOrFail($id);

        $project->update($request->all());
        
        return redirect()->route('projects.index')->with('success', 'Proyecto editado correctamente');
    }

    
    public function destroy(string $id)
    {
       $project = Project::findOrFail($id);
       $project->delete();
       return redirect()->route('projects.index');
    }
}
