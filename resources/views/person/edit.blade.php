@extends('layouts.master')
@section('title', 'edit person')
@section('content')


    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <h3 class="card-title">{{ trans('main.update_info_for_the_staff') }}</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="box" method="post" action="/person/{{ $person->id }}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الاسم</label>
                                <div class="input-group input-group-solid input-group-lg  border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors ?? ('')->has('fullname') ? 'is-danger' : ' ' }}"
                                        name="fullname" value="{{ $person->fullname }}" placeholder="الاسم" required />
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
                                        class="form-control {{ $errors ?? ('')->has('location') ? 'is-danger' : ' ' }}"
                                        name="location" value="{{ $person->location }}" placeholder="العنوان" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                        class="form-control {{ $errors ?? ('')->has('number') ? 'is-danger' : ' ' }}"
                                        name="number" value="{{ $person->number }}" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-3">
                            </div>
                            <div class="form-group">
                                <label for="status"> النوع</label>
                                <div class="input-group input-group-solid input-group-lg border border-primary">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-link text-primary icon-lg"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" name="type" id="status">
                                        <option value="1">زبون</option>
                                        <option value="2">مورد</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer row">
                        <div class="col-5"></div>
                        <button type="submit"
                            class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">حفظ التغييرات</button>
                        <button type="reset"
                            class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">إلغاء</button>
                    </div>
            </form>
        </div>

    </div>
    </form>
@endsection

@section('js')


@endsection
