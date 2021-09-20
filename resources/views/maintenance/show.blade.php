@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('title', 'show person')
@section('content')

  

        
            <form  method="get" action="">
              
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">معلومات الصيانة</h3>
            </div>
        </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-5">
                            <label> اسم المشروع </label>
                            <div class="input-group input-group-solid input-group-lg  border border-primary">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                    </span>
                                </div>
                                <input type="text"
                                    class="form-control  {{ $errors ?? ('')->has('full_name') ? 'is-danger' : ' ' }}"
                                    name="full_name" value="{{ old('full_name') }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> اسم المعدة</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name"  value="{{ old('mobile') }}" readonly />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>تاريخ الصيانة</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <input type="date"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="date_of_maintenance" value="{{ old('mobile') }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> رمز البرج </label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name"  value="{{ old('mobile') }}" readonly />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5" style="margin-top:-15px">
                            <div class="form-group ">
                                <label class="col-form-label col-4 text-lg-right text-left" style="margin-right: -35px"> موظف الصيانة</label>
                                <div class="input-group input-group-lg input-group-solid border border-primary">
                                    <select name="staffs[]" class="Department" id="department" multiple
                                        style="width: 100%">
                                        <option value="1">خالد </option>
                                        <option value="2">طاهر</option>
                                        <option value="3">محمد</option>
                                        <option value="4">زيد</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label> العدد </label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="name" placeholder=" عدد المعدات " value="{{ old('mobile') }}" readonly />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label> الملاحظات</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('mobile') ? 'is-danger' : ' ' }}"
                                        name="note" value="{{ old('mobile') }}" readonly />
                                </div>
                            </div>
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
