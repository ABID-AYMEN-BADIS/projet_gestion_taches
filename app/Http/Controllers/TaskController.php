<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Obtenir toutes les tâches
    public function index()
    {
        return response()->json(['tasks' => []]);
    }

    // Ajouter une tâche
    public function store(Request $request)
    {
        $task = [
            'id' => uniqid(), // Génère un identifiant unique
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
            'created_at' => now(),
        ];
        return response()->json($task);
    }

    // Mettre à jour une tâche
    public function update(Request $request, $id)
    {
        return response()->json([
            'id' => $id,
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
        ]);
    }

    // Supprimer une tâche
    public function destroy($id)
    {
        return response()->json(['message' => 'Task deleted', 'id' => $id]);
    }
}

