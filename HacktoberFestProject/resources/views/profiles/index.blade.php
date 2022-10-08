@extends('layouts.layout')
@section('page_title', 'จัดการโปรไฟล์ผู้ใช้งาน')

@section('content')
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">รายการทั้งหมด</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <a href="{{ route('profiles.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>เพิ่มข้อมูล
                    </a>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="justify-content-between mb-4">
            </div>
            <div class="table-wrap db-scroll">
                <table class="table table-striped table-vcenter">
                    <thead class="bg-body-dark">
                        <tr>
                            <th>#</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>E-mail</th>
                            <th>จังหวัด</th>
                            <th style="width: 100px;" class="sticky-col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $index => $d)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $d->name }}  {{$d->lastname}}</td>
                            <td>{{ $d->tel }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->province_name }}</td>
                            <td class="sticky-col text-center">
                                {{-- @include('admin.components.dropdown-action', [
                                    'view_route' => route('admin.customers.show', ['customer' => $d]),
                                    'edit_route' => route('admin.customers.edit', ['customer' => $d]),
                                    'delete_route' => route('admin.customers.destroy', ['customer' => $d]),
                                ]) --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! $list->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
