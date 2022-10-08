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
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width: 100px;" class="sticky-col"></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
