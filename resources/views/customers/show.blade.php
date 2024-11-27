@extends('layouts.app')
@section('title', 'Mijoz - ' . $customer->full_name . ' | Niyat Savdo')
@section('main-content')
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-black fw-bolder mb-0">{{ $customer->full_name }}</h2>
            <h5>Kelish sanasi: <span class="badge badge-phoenix badge-phoenix-primary">
                    {{ $customer->created_at->format('H:i d-m-Y') }}
                    <span class="ms-1 uil uil-stopwatch"></span>
                </span>
            </h5>
        </div>
    </div>

    <div class="row">
        <!-- Customer Profile Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <!-- Profile Image -->
                    <div class="col-xl-3">
                        <div class="profile-image">
                            @if ($customer->photo_path)
                                <img src="{{ Storage::url($customer->photo_path) }}" alt="Photo"
                                    class="img-fluid rounded shadow-sm">
                            @else
                                <img src="{{ asset('img/team/avatar.webp') }}" alt="No Photo"
                                    class="img-fluid rounded shadow-sm">
                            @endif
                        </div>
                        <label for="phoneNumber" class="form-label">Asosiy telefon raqami</label>
                        <div class="input-group">
                            <input class="form-control form-control-sm" id="phoneNumber" type="text"
                                value="{{ $customer->phone_number }}" readonly />
                        </div>
                        <label for="additionalPhone" class="form-label">Qo'shimcha telefon raqami</label>
                        <div class="input-group">
                            <input class="form-control form-control-sm" id="additionalPhone" type="text"
                                value="{{ $customer->additional_phone_number }}" readonly />
                        </div>

                    </div>

                    <!-- Customer Info -->
                    <div class="col-xl-9">
                        <div class="row gx-3 gy-4">
                            <h4 class="fs-1 mb-0">Pasport ma'lumotlari</h4>
                            <div class="col-sm-6 col-md-4 mt-1">
                                <label for="passportNumber" class="form-label">Pasport raqami</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="passportNumber" type="text"
                                        value="{{ $customer->passport_or_jshshir }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-1">
                                <label for="jshshir" class="form-label">JSHSHIR</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="jshshir" type="text"
                                        value="{{ $customer->jshshir }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-1">
                                <label for="passportDate" class="form-label">Pasport berilgan sana</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="passportDate" type="text"
                                        value="{{ $customer->passport_given_date }}" readonly />
                                </div>
                            </div>

                            <h4 class="fs-1 mb-0">Yashash manzil</h4>
                            <div class="col-sm-6 col-md-6 mt-1">
                                <label for="region" class="form-label">Viloyat</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="region" type="text"
                                        value="{{ $customer->region }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-1">
                                <label for="cityOrTown" class="form-label">Shahar/Tuman</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="cityOrTown" type="text"
                                        value="{{ $customer->city_or_town }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-1">
                                <label for="mfy" class="form-label">MFY</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="mfy" type="text"
                                        value="{{ $customer->mfy }}" readonly />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mt-1">
                                <label for="address" class="form-label">Manzil</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="address" type="text"
                                        value="{{ $customer->address }}" readonly />
                                </div>
                            </div>
                            <h4 class="fs-1 mb-0">Qo'shimcha ma'lumotlar</h4>
                            <div class="col-6 mt-1">
                                <label for="mfy" class="form-label">Ish joyi</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="address" type="text"
                                        value="{{ $customer->workplace ?? 'N/A' }}" readonly />
                                </div>
                            </div>
                            <div class="col-6 mt-1">
                                <label for="mfy" class="form-label">Izoh</label>
                                <div class="input-group">
                                    <input class="form-control form-control-sm" id="address" type="text"
                                        value="{{ $customer->notes ?? 'N/A' }}" readonly />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    
                    <div class="col-12 col-xxl-8">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="mb-0">Shartnomalar <span class="text-700 fw-normal">(97)</span></h3>
                            <a href="{{ route('agreements.create', ['customer_id' => $customer->id]) }}" class="btn btn-primary">Shartnoma Qo'shish</a>
                        </div>
                        <div class="border-top border-bottom border-200" id="customerOrdersTable" 
                            data-list='{"valueNames":["order","total","payment_status","fulfilment_status","delivery_type","date"],"page":6,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-sm fs--1 mb-0">
                                    <thead>
                                        <tr>
                                            <th class="sort white-space-nowrap align-middle ps-0 pe-3" scope="col" style="width:10%;">Shartnoma raqami</th>
                                            <th class="sort align-middle text-end pe-7" scope="col" style="width:15%;">Shartnoma sanasi</th>
                                            <th class="sort align-middle pe-3" scope="col" style="width:10%;">Muddati (oy)</th>
                                            <th class="sort align-middle white-space-nowrap pe-3" scope="col" style="width:20%;">Shartnoma summasi</th>
                                            <th class="sort align-middle white-space-nowrap text-start" scope="col" style="width:15%;">Tugash sanasi</th>
                                            <th class="sort align-middle text-end pe-0" scope="col">Izoh</th>
                                            <th class="align-middle text-end pe-0 ps-5" scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @forelse ($agreements as $agreement)
                                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                                <td class="order align-middle white-space-nowrap ps-0">
                                                    <a class="fw-semi-bold" href="{{ route('agreements.show', $agreement->id) }}">
                                                        {{ $agreement->agreement_number }}
                                                    </a>
                                                </td>
                                                <td class="total align-middle text-end fw-semi-bold pe-7 text-1000">
                                                    {{ $agreement->agreement_date->format('d-m-Y') }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ $agreement->duration }}
                                                </td>
                                                <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-700">
                                                    {{ number_format($agreement->product_price_after_markup, 2) }} UZS
                                                </td>
                                                <td class="align-middle text-start">
                                                    {{ $agreement->end_date->format('d-m-Y') }}
                                                </td>
                                                <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-end">
                                                    {{ $agreement->notes }}
                                                </td>
                                                <td class="align-middle white-space-nowrap text-end pe-0 ps-5">
                                                    <div class="btn-group">
                                                        <a href="{{ route('agreements.edit', $agreement->id) }}" class="btn btn-sm btn-warning">Tahrirlash</a>
                                                        <form action="{{ route('agreements.destroy', $agreement->id) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">O'chirish</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Hozircha shartnoma mavjud emas.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                          
                        </div>
                    </div>
                </div>
        
                
                
            </div>
        </div>
        
    </div>
@endsection
