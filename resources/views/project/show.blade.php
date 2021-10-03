@extends('layouts.master')
@section('title', 'show project')
@section('content')
    <form method="get">
        <div class="card-body">
            <h3 class="card-label font-weight-bolder text-dark">تفاصيل المشروع </h3>
            <br>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">رمز المشروع</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="first_name" readonly />
                </div>
    
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">اسم الزبون</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="last_name" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">المنطقة</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">عدد الابراج</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">النوع</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> تاريخ الطلبية</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">تاريخ التنفيذ</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">  تاريخ انتهاء الكفالة</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> مدة دورة الكشف</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">    إجمالي التكلفة</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> موظف  تركيب المشروع</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="staff_project" readonly />
            </div>
        </div>
    </form>
    <form method="post">
        <div class="card-footer row">
            <div class="col-5"></div>
            {{-- <div class="col"> --}}
            <button type="submit" class="btn btn- mr-2">
                <a href="/project/edit"
                    class="btn  btn-light-primary font-weight-bolder text-uppercase mr-2">تعديل</a>
            </button>
            @method('delete')
            @csrf
            <button type="submit" class="btn btn- mr-2">
                <a class="btn  btn-danger font-weight-bolder" onclick="project_delete($(this))" data-id="'+data.id+'"
                    data-name="'+data.full_name+'">حذف</a>
            </button>
        </div>
    </form>

@endsection
@section('js')
    <script>
        function project5_delete($this) {
            var id = $this.data('id');
            var name = $this.data('name');
            _confirm('{{ trans('main.confirm') }}', '{{ trans('main.are_you_sure_to_delete') }} (' + name + ')',
                'error',
                '{{ trans('main.delete') }}', '{{ trans('main.cancel') }}',
                function() {
                    $.ajax({
                        url: 'project/' + id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'DELETE',

                        success: function(data) {
                            console.log("Response: " + data.data);
                            window.location = "project"; //redirect section
                        },
                    });
                });

        }
    </script>
@endsection
