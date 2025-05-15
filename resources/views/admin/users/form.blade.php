<div class="mb-3">
    <label for="name" class="form-label">Tên</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $user->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        value="{{ old('email', $user->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
        {{ isset($user) ? '' : 'required' }}>
    <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
        {{ isset($user) ? '' : 'required' }}>
</div>

{{-- <div class="mb-3">
    <label for="role" class="form-label">Vai trò</label>
    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
        <option value="0" {{ old('role', $user->role ?? 0) == 0 ? 'selected' : '' }}>Normal</option>
        <option value="1" {{ old('role', $user->role ?? 0) == 1 ? 'selected' : '' }}>Admin</option>
        <option value="2" {{ old('role', $user->role ?? 0) == 2 ? 'selected' : '' }}>Editor</option>
    </select>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}

<div class="mb-3">
    <label for="role" class="form-label">Vai trò</label>
    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
        <option value="">-- Chọn vai trò --</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" {{ old('role', $user->role ?? '') == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
        @endforeach
    </select>
    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="avatar" class="form-label">Avatar</label>
    <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
    @if (isset($user) && $user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="mt-2 rounded-circle"
            style="width: 80px; height: 80px; object-fit: cover;">
    @endif
    @error('avatar')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="phone_number" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
        name="phone_number" value="{{ old('phone_number', $user->phone_number ?? '') }}">
    @error('phone_number')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="address" class="form-label">Địa chỉ</label>
    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $user->address ?? '') }}</textarea>
    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="status" name="status"
        {{ old('status', $user->status ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="status">Hoạt động</label>
</div>
