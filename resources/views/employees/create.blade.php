@extends('layouts.app')

@section('title', 'Create Employee')

@section('content')
<div class="container py-4">
    <h1>Create Employee</h1>

    <form action="{{ route('employee.store') }}" method="POST">
        @include('employees.partials.form', [
        'employee' => null,
        'submitLabel' => 'Create Employee',
        ])
    </form>
</div>
@endsection