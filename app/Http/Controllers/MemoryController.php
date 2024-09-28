<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemoryController extends Controller
{
    // Add memory
    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        $memory = new Memory();
        $memory->user_id = $user->id;
        $memory->title = $request->title;
        $memory->description = $request->description;
        $memory->media = json_encode($request->media);
        $memory->is_fav = $request->is_fav ?? false;
        $memory->save();

        return response()->json(['success' => true, 'memory' => $memory]);
    }

    // Get all memories for logged-in user
    public function index($userId)
    {
        $memories = Memory::where('user_id', $userId)->get();
        return response()->json($memories);
    }

    // Get all memories from the database
    public function getAllMemories()
    {
        $memories = Memory::all(); // Fetch all memories
        return response()->json($memories);
    }

    // Update memory
    public function update(Request $request, $id)
    {
        $memory = Memory::find($id);
        $memory->title = $request->title ?? $memory->title;
        $memory->description = $request->description ?? $memory->description;
        $memory->media = json_encode($request->media ?? $memory->media);
        $memory->is_fav = $request->is_fav ?? $memory->is_fav;
        $memory->save();

        return response()->json(['success' => true, 'memory' => $memory]);
    }

    // Delete memory
    public function destroy($id)
    {
        $memory = Memory::find($id);
        if ($memory) {
            $memory->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Memory not found']);
    }
}
