@extends('layouts.master')
@section('title', 'اضافة منطقة')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">إضافة منطقة جديد</h3>
        </div>
    </div>
    <div class="card-body px-0">
        <div style="background-color: white">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                    <form class="form" method="post" action="/teacher">
                        @csrf

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">المنطقة</label>
                            <div class="col-lg-9 col-xl-6">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid border border-primary"
                                    name="full_name" value="{{ old('full_name') }}" placeholder="المنطقة " required />
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">المكان</label>
                            <div class="col-lg-9 col-xl-6">
                                
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid border border-primary"
                                    name="full_name" value="{{ old('full_name') }}" placeholder="المكان " required />
                            </div>
                        </div>


                        <div class="card-footer row">
                            <div class="col-5"></div>
                            <button type="submit"
                                class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ</button>
                            <button type="reset"
                                class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#level').change(function() {
            var value = $(this).val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                url: '/level/' + value + '/sections',
            }).done(function(res) {
                $('#section').html(res.html);
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                url: '/level/' + value + '/subjects',
            }).done(function(res) {
                $('#subject').html(res.html);
            });
        });
    </script>
@endsection
