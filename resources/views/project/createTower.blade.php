@extends('layouts.master')
@section('title', 'اضافة برج')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> اضافة برج </li>
@endsection
@section('content')
<style>   .select2-container--default .select2-selection--single {
    line-height: 32px;
    height: 40px;
    background-color: #F3F6F9;
    border: 1px solid #3699FF;
    border-radius: 4px
}</style>
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">إضافة برج جديد</h3>
        </div>
    </div>
    <div class="card-body px-0">
        <div style="background-color: white">
            <div class="tab-content pt-5">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                    <form class="form" method="post" action="/region">
                        @csrf

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-right">رمز البرج</label>
                            <div class="col-lg-9 col-xl-6">
                                <select style="width:100%; " class="Department"
                                id="tower_code">

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-right">اسم المعدة</label>
                            <div class="col-lg-9 col-xl-6">

                                <select style="width:100%; " class="Department"
                                id="equipment_name">

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-right"> العدد</label>
                            <div class="col-lg-9 col-xl-6">

                                <input type="text"
                                    class="form-control form-control-lg form-control-solid border border-primary"
                                    name="street" placeholder="الشارع " required />
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-right"> الشارع</label>
                            <div class="col-lg-9 col-xl-6">

                                <select style="width:100%; " class="Department"
                                id="street">

                                <option value="AL">طاهر</option>
                                <option value="fs">علي</option>
                                <option value="z">يوسف</option>
                                <option value="WY">سامر</option>
                            </select>
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
       <script>
        $(function() {
          $('#tower_code').select2();

      });
      $(function() {
          $('#equipment_name').select2({
             
          });

      });
      $(function() {
          $('#street').select2({
             
          });

      });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
