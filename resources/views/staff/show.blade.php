@extends('layouts.master')
@section('title','show staff')
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> <a href="{{ url('staff') }}">  جميع الموظفين</a></li>
<li class="breadcrumb-item active" aria-current="page"> تفاصيل الموظف </li>
@endsection
@section('content')

<form method ="get" action="staff/{{$staff->id}}">

	<div class="card-header py-3">
        <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">{{trans('main.personal_information')}}</h3>
        </div>
	</div>
    <div class="card-body">

	    <div class="form-group row">
		    <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">الاسم</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value="{{ $staff->fname }}" name="full_name" readonly />
		        </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">الكنية</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value="{{ $staff->lname }}" name="full_name" readonly />
		        </div>
	    </div>
		<div class="form-group row">
		    <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">سنة الميلاد</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text" value="{{$staff->date_of_birth}}" name="birth" readonly />
                </div>
            <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">الجنس</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=" @if($staff->gender == 0) ذكر @else أنثى @endif" name="gender" readonly/>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">الموبايل</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value="{{$staff->phone}}" name="mobile" readonly/>
                </div>
            <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">العنوان</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value="{{$staff->location}}" name="address" readonly/>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">الحالة الاجتماعية</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value=" @if($staff->material == 0) أعزب @else متزوج @endif" name="status" readonly/>
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">سنة التعيين</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text" value="{{$staff->date_of_appoint}}" name="birth" readonly />
                </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder">مكان الميلاد</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid border border-primary" type="text" value="{{$staff->place_of_birth}}" name="status" readonly/>
                </div>
                <label class="col-xl-2 col-lg-2 col-form-label text-right font-weight-bolder"> الراتب</label>
			    <div class="col-lg-6 col-xl-3">
				    <input class="form-control form-control-lg form-control-solid  border border-primary" type="text" value="{{$staff->salary}}" name="birth" readonly />
                </div>
        </div>

    </div>
</form>
<form method="post" action="/staff/{{$staff->id}}">
    <div class="card-footer row">
        <div class="col-5"></div>
        <button type="submit" class="btn btn- mr-2" >
            <a href="/staff/{{$staff->id}}/edit" class="btn  btn-light-primary font-weight-bolder text-uppercase mr-2">{{trans('main.edit')}}</a>
        </button>
            @method('delete')
            @csrf
        <button type="submit" class="btn btn- mr-2" >
            <a  class="btn btn-danger font-weight-bolder" onclick="staff_delete($(this))" data-id="'+data.id+'" data-name="'+data.full_name+'">{{trans('main.delete')}}</a>
        </button>
    </div>
</form>

@endsection


    @section('js')
<script>
    function staff_delete($this){
            var id = $this.data('id');
            var name = $this.data('fname');
            _confirm('{{ trans('main.confirm') }}', '{{ trans('main.are_you_sure_to_delete')}} ('+fname+')', 'error', '{{ trans('main.delete') }}', '{{ trans('main.cancel') }}', function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'DELETE',
                    url: 'staff/'+id,
                }).done(function (res) {
                    window.location.reload();
                });
            });

        }
</script>
@endsection
