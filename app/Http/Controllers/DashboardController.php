<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();

        $totalDepartments = Employee::query()
            ->distinct()
            ->count('department');

        $totalDesignations = Employee::query()
            ->distinct()
            ->count('designation');

        $totalMonthlySalary = Employee::sum('salary');

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'totalDesignations',
            'totalMonthlySalary'
        ));
    }
}
