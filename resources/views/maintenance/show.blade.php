@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'show person')
@section('content')




    <form method="get" action="">

        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">معلومات الصيانة</h3>
            </div>
        </div>
        <div class="card-body">


            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> رمز المشروع</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="first_name" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> موظفي الصيانة </label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="last_name" readonly />
                </div>
               
            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> تاريخ الصيانة</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">  الملاحظات </label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=""
                        name="last_name" readonly />
                </div>

            </div>
        </br>
    </br>

            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> رمز البرج</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
                <label class="col-xl-1 col-lg-1 col-form-label text-right font-weight-bolder">المعدة</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text"
                        value="" name="birth" readonly />
                </div>
                <label class="col-xl-1 col-lg-1 col-form-label text-right font-weight-bolder"> العدد</label>
                <div class="col-lg-4 col-xl-2">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="" name="gender" readonly />
                </div>
            </div>
    </form>
    <form method="post" action="">
        <div class="card-footer row">
            <div class="col-5"></div>
            <button type="submit" class="btn btn- mr-2">
                <a href="maintenance/edit"
                    class="btn  btn-light-primary font-weight-bolder text-uppercase mr-2">{{ trans('main.edit') }}</a>
            </button>
            @method('delete')
            @csrf
            <button type="submit" class="btn btn- mr-2">
                <a class="btn btn-danger font-weight-bolder" onclick="staff_delete($(this))" data-id="'+data.id+'"
                    data-name="'+data.full_name+'">{{ trans('main.delete') }}</a>
            </button>
        </div>
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('#department').select2({
                placeholder: "اختر موظفي الكشف؟",
            });
        });
    </script>

@endsection


@section('js')
    <script>
        function staff_delete($this) {
            var id = $this.data('id');
            var name = $this.data('name');
            _confirm('{{ trans('main.confirm') }}', '{{ trans('main.are_you_sure_to_delete') }} (' + name + ')',
                'error',
                '{{ trans('main.delete') }}', '{{ trans('main.cancel') }}',
                function() {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'DELETE',
                        url: 'staff/' + id,
                    }).done(function(res) {
                        window.location.reload();
                    });
                });

        }
    </script>
@endsection
