@csrf

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input
        type="text"
        id="name"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $employee?->name) }}"
        required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $employee?->email) }}"
        required>
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input
        type="text"
        id="phone"
        name="phone"
        class="form-control @error('phone') is-invalid @enderror"
        value="{{ old('phone', $employee?->phone) }}">
    @error('phone')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="department" class="form-label">Department</label>
    <input
        type="text"
        id="department"
        name="department"
        class="form-control @error('department') is-invalid @enderror"
        value="{{ old('department', $employee?->department) }}"
        required>
    @error('department')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="designation" class="form-label">Designation</label>
    <input
        type="text"
        id="designation"
        name="designation"
        class="form-control @error('designation') is-invalid @enderror"
        value="{{ old('designation', $employee?->designation) }}"
        required>
    @error('designation')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="salary" class="form-label">Salary</label>
    <input
        type="number"
        id="salary"
        name="salary"
        step="0.01"
        min="0"
        class="form-control @error('salary') is-invalid @enderror"
        value="{{ old('salary', $employee?->salary) }}"
        required>
    @error('salary')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    {{ $submitLabel }}
</button>

<a href="{{ route('employees.index') }}" class="btn btn-secondary">
    Cancel
</a>