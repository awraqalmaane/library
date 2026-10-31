<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use App\Models\Category;
use App\Models\Diwan;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'papers'     => Paper::count(),
            'categories' => Category::count(),
            'diwans'     => Diwan::count(),
            'messages'   => Message::count(),
            'unread'     => Message::where('is_read', false)->count(),
        ];

        $latestMessages = Message::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestMessages'));
    }
}
