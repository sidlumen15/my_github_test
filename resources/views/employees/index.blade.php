@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close"
            data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Page Header --}}
    <div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1">Employee Management</h2>
            <p class="text-muted mb-0">
                Manage your employee records
            </p>
        </div>

        <a href="{{ route('employee.create') }}"
            class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Add Employee
        </a>
    </div>

    {{-- Employee Table Card --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <div class="row g-3 align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0 fw-semibold">Employee List</h5>
                </div>

                <div class="col-md-6">
                    <input type="search"
                        id="employeeSearch"
                        class="form-control"
                        placeholder="Search employees...">
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped
                            align-middle mb-0"
                    id="employeeTable">

                    <thead class="table-dark">
                        <tr>
                            <th class="px-3">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Salary</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($employees as $employee)
                        <tr>
                            <td class="px-3">
                                {{ $employee->id }}
                            </td>

                            <td class="fw-semibold">
                                {{ $employee->name }}
                            </td>

                            <td>{{ $employee->email }}</td>

                            <td>
                                {{ $employee->phone ?? '—' }}
                            </td>

                            <td>
                                <span class="badge text-bg-info">
                                    {{ $employee->department }}
                                </span>
                            </td>

                            <td>{{ $employee->designation }}</td>

                            <td class="text-nowrap">
                                ₹{{ number_format($employee->salary, 2) }}
                            </td>

                            <td class="text-center text-nowrap">
                                <a href="{{ route('employee.show', $employee->id) }}"
                                    class="btn btn-sm btn-outline-info"
                                    title="View">
                                    View
                                </a>

                                <a href="{{ route('employee.edit', $employee->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Edit">
                                    Edit
                                </a>

                                <form action="{{ route('employee.delete', $employee->id) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8"
                                class="text-center text-muted py-5">
                                No employees found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        {{-- Footer --}}
        <div class="card-footer bg-white text-muted py-3">
            <small>
                Total employees: {{ $employees->count() }}
            </small>
        </div>

    </div>
</div>

{{-- Simple Client-Side Search --}}
<script>
    document.getElementById('employeeSearch')
        .addEventListener('input', function() {
            const search = this.value.toLowerCase();

            document.querySelectorAll('#employeeTable tbody tr')
                .forEach(function(row) {
                    row.style.display =
                        row.innerText.toLowerCase().includes(search) ?
                        '' :
                        'none';
                });
        });
</script>
@endsection