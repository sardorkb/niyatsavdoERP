@extends('layouts.app')

@section('title', 'Mijoz qo\'shish | Niyat Savdo')

@section('main-content')
    <!-- Button to trigger modal -->
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-4">Mijoz qo'shish</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                Mijoz qo'shish
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Mijoz qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Full Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">F.I.Sh. (Full Name)</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Passport or JSHSHIR -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="passport_or_jshshir" class="form-label">Pasport Raqami yoki JSHSHIR</label>
                                    <input type="text" class="form-control @error('passport_or_jshshir') is-invalid @enderror" id="passport_or_jshshir" name="passport_or_jshshir" value="{{ old('passport_or_jshshir') }}" required>
                                    @error('passport_or_jshshir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Yashash Manzili</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- MFY -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mfy" class="form-label">MFY</label>
                                    <input type="text" class="form-control @error('mfy') is-invalid @enderror" id="mfy" name="mfy" value="{{ old('mfy') }}" required>
                                    @error('mfy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Workplace -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="workplace" class="form-label">Ish Joyi</label>
                                    <input type="text" class="form-control @error('workplace') is-invalid @enderror" id="workplace" name="workplace" value="{{ old('workplace') }}">
                                    @error('workplace')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Telefon Raqami</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Phone Number -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="additional_phone_number" class="form-label">Qo'shimcha Telefon Raqami</label>
                                    <input type="text" class="form-control @error('additional_phone_number') is-invalid @enderror" id="additional_phone_number" name="additional_phone_number" value="{{ old('additional_phone_number') }}">
                                    @error('additional_phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Izoh</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Photo -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Rasm (Optional)</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- JSHSHIR -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jshshir" class="form-label">JSHSHIR</label>
                                    <input type="text" class="form-control @error('jshshir') is-invalid @enderror" id="jshshir" name="jshshir" value="{{ old('jshshir') }}">
                                    @error('jshshir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Passport Given Date -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="passport_given_date" class="form-label">Passport Berilgan Sana</label>
                                    <input type="date" class="form-control @error('passport_given_date') is-invalid @enderror" id="passport_given_date" name="passport_given_date" value="{{ old('passport_given_date') }}">
                                    @error('passport_given_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Tug'ilgan Sana</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Region -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="region" class="form-label">Viloyat</label>
                                    <select class="form-select @error('region') is-invalid @enderror" id="region" name="region" required>
                                        <option value="">Select Region</option>
                                        <option value="Tashkent" {{ old('region') == 'Tashkent' ? 'selected' : '' }}>Tashkent</option>
                                        <option value="Samarkand" {{ old('region') == 'Samarkand' ? 'selected' : '' }}>Samarkand</option>
                                    </select>
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- City or Town -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city_or_town" class="form-label">Shahar yoki Tuman</label>
                                    <select class="form-select @error('city_or_town') is-invalid @enderror" id="city_or_town" name="city_or_town" required>
                                        <option value="">Select City/Town</option>
                                        <option value="Tashkent City" {{ old('city_or_town') == 'Tashkent City' ? 'selected' : '' }}>Tashkent City</option>
                                        <option value="Samarkand City" {{ old('city_or_town') == 'Samarkand City' ? 'selected' : '' }}>Samarkand City</option>
                                    </select>
                                    @error('city_or_town')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Mijozni Saqlash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
