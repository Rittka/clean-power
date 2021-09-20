@extends('layouts.master')
@section('title', 'add customer')
@section('content')

    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">أضف عميل جديد</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="box" method="post" >
                {{ csrf_field() }}
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <div>
                                <label> الاسم </label>
                                <div class="input-group input-group-solid input-group-lg  border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                   
                                        name="full_name" value="{{ old('full_name') }}" placeholder="الاسم " required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <div>
                                <label> النوع </label>
                                <div class="input-group input-group-solid input-group-lg  border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-link text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" name="status" id="status">
                                        <option value="{{ trans('main.single') }}">زبون</option>
                                        <option value="{{ trans('main.married') }}">مورد</option>
                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>العنوان</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        
                                        name="address" value="{{ old('address') }}"
                                        placeholder="العنوان" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: -17px">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الموبايل</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone fas text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="number"
                                       
                                        name="mobile" value="{{ old('mobile') }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit"
                        class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">{{ trans('main.save') }}</button>
                    <button type="reset"
                        class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">{{ trans('main.cancel') }}</button>
                </div>
            </form>
        </div>

    </div>

@endsection
