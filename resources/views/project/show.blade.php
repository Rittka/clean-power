@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'show equipment')
@section('content')




    <form method="get" action="">

        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">تفاصيل المعدة</h3>
            </div>
        </div>
        <div class="card-body">


            <div class="form-group row">

                <label class="col-xl-3 col-lg-3 col-form-label text-right">اسم المعدة</label>
                <div class="col-lg-9 col-xl-6">

                    <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                        name="full_name" value="{{ old('full_name') }}"  readonly />
                </div>
            </div>
            <div class="form-group row">

                <label class="col-xl-3 col-lg-3 col-form-label text-right"> الطاقة</label>
                <div class="col-lg-9 col-xl-6">

                    <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                        name="full_name" value="{{ old('full_name') }}" readonly />
                </div>
            </div>

            <div class="form-group row">

                <label class="col-xl-3 col-lg-3 col-form-label text-right"> المنشأ</label>
                <div class="col-lg-9 col-xl-6">

                    <input type="text" class="form-control form-control-lg form-control-solid border border-primary"
                        name="full_name" value="{{ old('full_name') }}"  readonly />
                </div>
            </div>

            <div class="form-group row">

                <label class="col-xl-3 col-lg-3 col-form-label text-right"> الكمية</label>
                <div class="col-lg-9 col-xl-6">

                    <input type="number" class="form-control form-control-lg form-control-solid border border-primary"
                        name="full_name" value="{{ old('full_name') }}"  readonly />
                </div>
            </div>
            <div class="form-group row">

                <label class="col-xl-3 col-lg-3 col-form-label text-right"> السعر</label>
                <div class="col-lg-9 col-xl-6">

                    <input type="number" class="form-control form-control-lg form-control-solid border border-primary"
                        name="full_name" value="{{ old('full_name') }}"  readonly />
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="">
        <div class="card-footer row">
            <div class="col-5"></div>
            <button type="submit" class="btn btn- mr-2">
                <a href="equipment/edit"
                    class="btn  btn-light-primary font-weight-bolder text-uppercase mr-2">تعديل</a>
            </button>
            @method('delete')
            @csrf
            <button type="submit" class="btn btn- mr-2">
                <a class="btn btn-danger font-weight-bolder" onclick="staff_delete($(this))" data-id="'+data.id+'"
                    data-name="'+data.full_name+'">{{ trans('main.delete') }}</a>
            </button>
        </div>
    </form>
  

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
