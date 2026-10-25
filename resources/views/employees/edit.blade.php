@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="container py-4">
    <h1>Edit Employee</h1>

    <form
        action="{{ route('employee.update', $employee) }}"
        method="POST">
        @method('PUT')

        @include('employees.partials.form', [
        'employee' => $employee,
        'submitLabel' => 'Update Employee',
        ])
    </form>
</div>
@endsection