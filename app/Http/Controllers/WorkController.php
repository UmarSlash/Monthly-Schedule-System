<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();
        return view('works.index', compact('works'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        return redirect()->route('works.index')->with('success', 'work deleted successfully.');
    }
}
