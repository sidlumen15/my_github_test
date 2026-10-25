@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-page">

    {{-- Page Heading --}}
    <div class="dashboard-heading">
        <div>
            <h1>Dashboard</h1>
            <p>Welcome to your dashboard. Manage your employees in one place.</p>
        </div>

        <a href="{{ route('employees.index') }}" class="dashboard-primary-btn">
            <i class="bi bi-people"></i>
            View Employees
        </a>
    </div>

    {{-- Statistics Cards --}}
    <div class="dashboard-stats">

        <div class="stat-card">
            <div class="stat-icon stat-blue">
                <i class="bi bi-people-fill"></i>
            </div>
            <p>Total Employees</p>
            <h2>{{ $totalEmployees }}</h2>
            <span class="stat-caption">Employee records</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-green">
                <i class="bi bi-person-check-fill"></i>
            </div>
            <p>Departments</p>
            <h2>{{ $totalDepartments }}</h2>
            <span class="stat-caption">Unique departments</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-purple">
                <i class="bi bi-briefcase-fill"></i>
            </div>
            <p>Designations</p>
            <h2>{{ $totalDesignations }}</h2>
            <span class="stat-caption">Unique designations</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-orange">
                <i class="bi bi-currency-rupee"></i>
            </div>
            <p>Total Monthly Salary</p>
            <h2>₹{{ number_format($totalMonthlySalary, 2) }}</h2>
            <span class="stat-caption">Combined employee salary</span>
        </div>

    </div>

    {{-- Welcome Panel --}}
    <div class="dashboard-welcome">
        <div class="welcome-illustration">
            <i class="bi bi-people-fill"></i>
        </div>

        <div class="welcome-content">
            <h2>Welcome to INTERVIEW!</h2>
            <p>
                Manage employee records, review departments, and keep your
                team information organized — all in one place.
            </p>

            <a href="{{ route('employees.index') }}" class="dashboard-primary-btn">
                Manage Employees
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="quick-actions">
        <h2>Quick Actions</h2>

        <div class="quick-action-grid">
            <a href="{{ route('employee.create') }}" class="quick-action-card">
                <i class="bi bi-person-plus-fill"></i>
                <span>
                    <strong>Add Employee</strong>
                    <small>Create a new employee record</small>
                </span>
                <i class="bi bi-chevron-right action-arrow"></i>
            </a>

            <a href="{{ route('employees.index') }}" class="quick-action-card">
                <i class="bi bi-card-list"></i>
                <span>
                    <strong>Employee Directory</strong>
                    <small>View and manage employee records</small>
                </span>
                <i class="bi bi-chevron-right action-arrow"></i>
            </a>
        </div>
    </div>

</div>
@endsection