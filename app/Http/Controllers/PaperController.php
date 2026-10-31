<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Category;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    // عرض الصفحة الرئيسية مع جميع أوراق المعاني
    public function index()
    {
        $papers = Paper::with('category')->latest()->paginate(9);
        $categories = Category::all();
        return view('papers.index', compact('papers', 'categories'));
    }

    // عرض ورقة معينة بالتفصيل
    public function show($id)
    {
        $paper = Paper::with('category')->findOrFail($id);
        return view('papers.show', compact('paper'));
    }

    // صفحة إنشاء ورقة جديدة
    public function create()
    {
        $categories = Category::all();
        return view('papers.create', compact('categories'));
    }

    // حفظ الورقة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'nullable|max:100',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required',
        ]);

        Paper::create($request->all());

        return redirect()->route('papers.index')->with('success', 'تم إضافة ورقة المعاني بنجاح!');
    }
}