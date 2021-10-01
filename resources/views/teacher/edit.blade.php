@extends('layouts.master')
@section('title', 'edit teacher')
@section('content')
    <form method="post" action="/teacher/{{ $teacher->id }}/edit">
        @csrf
        @method('patch')

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">تعديل بيانات المنطقة</h3>
            </div>
        </div>
        <div class="card-body px-0">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-right">المنطقة</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control form-control-lg form-control-solid border border-primary"
                                name="position_ids[]">
                                <option>جديدة</option>
                                <option>سريان</option>
                                <option>محطة</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label>المكان</label>
                        <div class="input-group input-group-solid input-group-lg border border-primary">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone fas text-primary icon-lg"></i>
                                </span>
                            </div>
                            <input type="number" class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                name="area" value="{{ $staff->mobile }}" required />
                        </div>
                    </div>
                </div>

                <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit" class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ التغييرات</button>
                    <button type="reset" class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                </div>

            </div>
        </div>
        </div>

    </form>
@endsection
