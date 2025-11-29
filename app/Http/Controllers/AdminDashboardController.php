<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'total_users' => 100, // Dummy data
            'portfolios' => 50,
            'companies' => 10
        ]);
    }

    public function portfolios() { return view('admin.portfolios'); }
    public function users() { return view('admin.users'); }
    public function companies() { return view('admin.companies'); }
    public function settings() { return view('admin.settings'); }
    public function reports() { return view('admin.reports'); }
    public function contents() { return view('admin.contents'); }
}