<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FileEntry;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'files' => FileEntry::count(),
            'admins' => User::where('role', 'admin')->count(),
        ];

        $recentFiles = FileEntry::with('user')
            ->latest()
            ->take(5)
            ->get();

        $recentUsers = User::latest()
            ->take(5)
            ->get();

        return view('dashboard.admin', compact('stats', 'recentFiles', 'recentUsers'));
    }
}

