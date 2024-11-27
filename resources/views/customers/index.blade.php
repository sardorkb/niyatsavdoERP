@extends('layouts.app')
@section('title', 'Mijozlar ro\'yxati | Niyat Savdo')
@section('main-content')
<h2 class="text-bold text-body-emphasis mb-5">Mijozlar ro'yxati</h2>
    <div id="members"
        data-list='{"valueNames":["customer","phone_number","passport_or_jshshir","city","last_active","joined"],"page":10,"pagination":true}'>
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search members"
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">
                        <span class="fas fa-plus me-2"></span>Mijoz qo'shish
                    </button>
                </div>
            </div>
        </div>

        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-hover table-md fs--1 mb-0">
                    <thead>
                        <tr>
                            <th class="sort align-middle" scope="col" data-sort="customer"
                                style="width:15%; min-width:200px;">Mijoz F.I.Sh.</th>
                            <th class="sort align-middle" scope="col" data-sort="passport"
                                style="width:20%; min-width:200px;">Pasport raqami</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="phone_number"
                                style="width:20%; min-width:200px;">Telefon raqami</th>
                            <th class="sort align-middle" scope="col" data-sort="created_at" style="width:15%;">
                                Yaratilgan sana</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="members-table-body">
                        @foreach ($customers as $customer)
                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="customer align-middle white-space-nowrap">
                                    <a class="d-flex align-items-center text-900 text-hover-1000"
                                        href="{{ route('customers.show', $customer->id) }}">
                                        <h6 class="mb-0 ms-3 fw-semi-bold">{{ $customer->full_name }}</h6>
                                    </a>
                                </td>
                                <td class="passport_or_jshshir align-middle white-space-nowrap">
                                    {{ $customer->passport_or_jshshir }}</td>
                                <td class="phone_number align-middle white-space-nowrap">
                                    <a class="fw-bold text-1100"
                                        href="tel:{{ $customer->phone_number }}">{{ $customer->phone_number }}</a>
                                </td>
                                <td class="created_at align-middle white-space-nowrap text-700">
                                    {{ $customer->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                    <a class="fw-semi-bold" href="#!" data-list-view="*">Barchasini ko'rish<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    <a class="fw-semi-bold d-none" href="#!" data-list-view="less">Qisqacha ko'rish<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex">
                    <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                    <ul class="mb-0 pagination"></ul>
                    <button class="page-link pe-0" data-list-pagination="next"><span
                            class="fas fa-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Mijoz qo'shish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Group 1: Full Name and Date of Birth -->
                            <div class="col-12">
                                <h5 class="mt-3">Shaxsiy ma'lumotlar</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label">F.I.Sh.</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Tug'ilgan sana</label>
                                    <input type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Group 2: Passport, JSHSHIR, Passport Given Date -->
                            <div class="col-12">
                                <h5 class="mt-3">Pasport ma'lumotlar</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="passport_or_jshshir" class="form-label">Pasport raqami</label>
                                    <input type="text"
                                        class="form-control @error('passport_or_jshshir') is-invalid @enderror"
                                        id="passport_or_jshshir" name="passport_or_jshshir"
                                        value="{{ old('passport_or_jshshir') }}" required>
                                    @error('passport_or_jshshir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jshshir" class="form-label">JSHSHIR</label>
                                    <input type="text" class="form-control @error('jshshir') is-invalid @enderror"
                                        id="jshshir" name="jshshir" value="{{ old('jshshir') }}">
                                    @error('jshshir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="passport_given_date" class="form-label">Passport berilgan sana</label>
                                    <input type="date"
                                        class="form-control @error('passport_given_date') is-invalid @enderror"
                                        id="passport_given_date" name="passport_given_date"
                                        value="{{ old('passport_given_date') }}">
                                    @error('passport_given_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Rasm (Majburiy emas)</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        id="photo" name="photo">
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Group 3: Region, City, MFY, Address -->
                            <div class="col-12">
                                <h5 class="mt-3">Yashash manzil</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="region" class="form-label">Viloyat</label>
                                    <select class="form-select @error('region') is-invalid @enderror" id="region"
                                        name="region" required>
                                        <option value="">Viloyatni tanlang</option>
                                        <option value="Tashkent" {{ old('region') == 'Tashkent' ? 'selected' : '' }}>
                                            Tashkent</option>
                                        <option value="Samarkand" {{ old('region') == 'Samarkand' ? 'selected' : '' }}>
                                            Samarkand</option>
                                    </select>
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city_or_town" class="form-label">Shahar yoki Tuman</label>
                                    <select class="form-select @error('city_or_town') is-invalid @enderror"
                                        id="city_or_town" name="city_or_town" required>
                                        <option value="">Select City/Town</option>
                                        <option value="Tashkent City"
                                            {{ old('city_or_town') == 'Tashkent City' ? 'selected' : '' }}>Tashkent City
                                        </option>
                                        <option value="Samarkand City"
                                            {{ old('city_or_town') == 'Samarkand City' ? 'selected' : '' }}>Samarkand City
                                        </option>
                                    </select>
                                    @error('city_or_town')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mfy" class="form-label">MFY</label>
                                    <input type="text" class="form-control @error('mfy') is-invalid @enderror"
                                        id="mfy" name="mfy" value="{{ old('mfy') }}" required>
                                    @error('mfy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Yashash manzili</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Group 4: Phone Numbers and Workplace -->
                            <div class="col-12">
                                <h5 class="mt-3">Qo'shimcha ma'lumotlar</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Telefon raqami</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="additional_phone_number" class="form-label">Qo'shimcha telefon raqami</label>
                                    <input type="text"
                                        class="form-control @error('additional_phone_number') is-invalid @enderror"
                                        id="additional_phone_number" name="additional_phone_number"
                                        value="{{ old('additional_phone_number') }}">
                                    @error('additional_phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="workplace" class="form-label">Ish joyi</label>
                                    <input type="text" class="form-control @error('workplace') is-invalid @enderror"
                                        id="workplace" name="workplace" value="{{ old('workplace') }}">
                                    @error('workplace')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
    
                            <!-- Notes and Photo -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Izoh</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
    
                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Qo'shish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
