@extends('layouts.master')
@section('title', 'show invoice')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ url('report/reportOfinvoice') }}">  تقرير الفواتير</a></li>
<li class="breadcrumb-item active" aria-current="page"> تفاصيل فاتورة </li>
@endsection
@section('content')
    <form method="get">
        <div class="card-body">
            <h3 class="card-label font-weight-bolder text-dark">تفاصيل الفاتورة</h3>
            <br>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> المورد</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="first_name" readonly />
                </div>

               
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> التاريخ</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">إجمالي المبلغ </label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="last_name" readonly />
                </div>

            </div>
        </br>
    </br>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> المعدة</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
                <label class="col-xl-1 col-lg-1 col-form-label text-right font-weight-bolder">العدد</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-1 col-lg-1 col-form-label text-right font-weight-bolder"> الطاقة/القدرة</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>


        </div>
    </form>
    <form method="post">
        <div class="card-footer row">
            <div class="col-5"></div>
            {{-- <div class="col"> --}}
            <button type="submit" class="btn btn- mr-2">
                <a href="/project/edit" class="btn  btn-light-primary font-weight-bolder text-uppercase mr-2">تعديل</a>
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
