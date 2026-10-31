<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Category;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::with('category')->latest()->paginate(10);
        return view('admin.papers.index', compact('papers'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.papers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Paper::create($data);

        return redirect()->route('admin.papers.index')
            ->with('success', 'تمت إضافة الورقة بنجاح ✅');
    }

    public function edit(Paper $paper)
    {
        $categories = Category::all();
        return view('admin.papers.edit', compact('paper', 'categories'));
    }

    public function update(Request $request, Paper $paper)
    {
        $data = $this->validateData($request);

        $paper->update($data);

        return redirect()->route('admin.papers.index')
            ->with('success', 'تم تحديث الورقة بنجاح ✅');
    }

    public function destroy(Paper $paper)
    {
        $paper->delete();

        return redirect()->route('admin.papers.index')
            ->with('success', 'تم حذف الورقة بنجاح 🗑️');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'nullable|string|max:255',
            'content'      => 'required|string',
            'meaning_type' => 'required|string|max:100',
            'status'       => 'required|in:verified,unverified',
            'category_id'  => 'required|exists:categories,id',
        ]);
    }
}
