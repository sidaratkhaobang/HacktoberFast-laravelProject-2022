@extends('layouts.layout')
@section('page_title', 'จัดการโปรไฟล์ผู้ใช้งาน')

@section('content')
    <div class="block block-custom">
        <div class="block-header block-header-default">
            <h3 class="block-title">รายการทั้งหมด</h3>
            <div class="block-options">
                <div class="block-options-item">
                    {{-- <x-btns.add-new btn-text="{{ __('car_batteries.add_new') }}" route-create="{{ route('admin.car-batteries.create') }}" /> --}}
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="justify-content-between mb-4">
                {{-- @include('admin.components.forms.simple-search') --}}
            </div>
            <div class="table-wrap db-scroll">
                <table class="table table-striped table-vcenter">
                    <thead class="bg-body-dark">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width: 100px;" class="sticky-col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($list as $d)
                            <tr>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->version }}</td>
                                <td>{{ $d->detail }}</td>
                                <td>{{ number_format($d->price,2) }}</td>
                                <td class="sticky-col text-center">
                                    @include('admin.components.dropdown-action', [
                                        'view_route' => route('admin.car-batteries.show', ['car_battery' => $d]),
                                        'edit_route' => route('admin.car-batteries.edit', ['car_battery' => $d]),
                                        'delete_route' => route('admin.car-batteries.destroy', [
                                            'car_battery' => $d,
                                        ]),
                                    ])
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

