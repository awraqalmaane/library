<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Diwan;
use Illuminate\Http\Request;

class DiwanController extends Controller
{
    public function index()
    {
        $diwans = Diwan::latest()->paginate(10);
        return view('admin.diwans.index', compact('diwans'));
    }

    public function create()
    {
        return view('admin.diwans.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Diwan::create($data);

        return redirect()->route('admin.diwans.index')
            ->with('success', 'تمت إضافة الديوان بنجاح ✅');
    }

    public function edit(Diwan $diwan)
    {
        return view('admin.diwans.edit', compact('diwan'));
    }

    public function update(Request $request, Diwan $diwan)
    {
        $data = $this->validateData($request);

        $diwan->update($data);

        return redirect()->route('admin.diwans.index')
            ->with('success', 'تم تحديث الديوان بنجاح ✅');
    }

    public function destroy(Diwan $diwan)
    {
        $diwan->delete();

        return redirect()->route('admin.diwans.index')
            ->with('success', 'تم حذف الديوان بنجاح 🗑️');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'poet'        => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|url|max:500',
            'price'       => 'required|numeric|min:0',
        ]);
    }
}
