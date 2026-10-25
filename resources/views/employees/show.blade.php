@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')
<div class="container py-4">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Employee Details</h2>
            <p class="text-muted mb-0">
                View employee information
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('employee.edit', $employee->id) }}"
                class="btn btn-primary">
                <i class="bi bi-pencil me-1"></i> Edit
            </a>

            <a href="{{ route('employees.index') }}"
                class="btn btn-outline-secondary">
                Back to List
            </a>
        </div>
    </div>

    {{-- Employee Details Card --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h5 class="fw-semibold mb-0">Employee Information</h5>
        </div>

        <div class="card-body p-4">
            <div class="row g-4">

                <div class="col-md-6">
                    <label class="text-muted small">Employee ID</label>
                    <div class="fw-semibold">{{ $employee->id }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Full Name</label>
                    <div class="fw-semibold">{{ $employee->name }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Email Address</label>
                    <div>{{ $employee->email }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Phone Number</label>
                    <div>{{ $employee->phone ?? '—' }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Department</label>
                    <div>
                        <span class="badge text-bg-info">
                            {{ $employee->department }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Designation</label>
                    <div>{{ $employee->designation }}</div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Salary</label>
                    <div class="fw-semibold">
                        ₹{{ number_format($employee->salary, 2) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Created At</label>
                    <div>
                        {{ $employee->created_at?->format('d M Y, h:i A') ?? '—' }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="text-muted small">Last Updated</label>
                    <div>
                        {{ $employee->updated_at?->format('d M Y, h:i A') ?? '—' }}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection