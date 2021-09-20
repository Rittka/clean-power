@extends('layouts.master')
@section('title', 'show person')
@section('content')

    <form method="get" action="student/{{$student->id}}">

        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">معلومات العملاء</h3>
            </div>
        </div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bolder">الاسم</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="name" name="full_name" readonly />
                </div>


            </div>
            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bolder">النوع</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                        value="name" name="full_name" readonly />
                </div>


            </div>

            <div class="form-group row">
                <label class="col-xl-3 col-lg-3 col-form-label text-right font-weight-bolder">الموبايل</label>
                <div class="col-lg-9 col-xl-6">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                       name="mobile" readonly />
                </div>

            </div>
            <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">العنوان</label>
                <div class="col-lg-6 col-xl-3">
                    <input class="form-control form-control-lg form-control-solid border border-primary" type="text"
                       name="address" readonly />
                </div>

            </div>



        </div>
    </form>
    <form method="post" action="/student/{{ $student ?? ('')->id }}">
        <div class="card-footer row">
            <div class="col-5"></div>
            <button type="submit" class="btn btn- mr-2">
                <a href="/student/{{ $student ?? ('')->id }}/edit"
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

@endsection


@section('js')
    <script>
        function staff_delete($this) {
            var id = $this.data('id');
            var name = $this.data('name');
            _confirm('{{ trans('main.confirm') }}', '{{ trans('main.are_you_sure_to_delete') }} (' + name + ')', 'error',
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
