@extends('layouts.master')
@section('title', 'إضافة أقساط طلاب')
@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <span class="d-block  font-size-lx"> إضافة أقساط طلاب صف {{ $section->level->name }}</span>


                </div>
                <div class="card-toolbar">
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="/section/{{ $section->id }}/add-payment">
                    @csrf
                    <div class="mb-7">
                        <div class="row align-items-center mb-5">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary px-10">حفظ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_payments">
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        var section_id = {{$section->id}};
        var datatable = $('#kt_datatable_payments').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                // ajax: '{!!  route('getLevelDatatable.data') !!}',
                source: {
                    read: {
                        url: '{!!  route('getAddStudentPaymentsDatatable.data') !!}',
                        data: {
                            'id': section_id
                        },
                        method: 'POST',
                        // sample custom headers
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_payments_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                    field: 'id',
                    title: '#',
                    sortable: 'asc',
                    width: 30,
                    type: 'number',
                    selector: false,
                    textAlign: 'center',
                }, {
                    field: 'first_name',
                    title: ' الاسم',
                },
                {
                    field: 'last_name',
                    title: 'الكنية',
                },
                {
                    field: 'month',
                    title: 'الشهر',
                    template: function(data) {
                        return `
                            <input calss="form-control"  name="month[`+data.id+`]" value=`+data.month+` style="width:100%;">
                        `
                    }

                },
                {
                    field: 'amount',
                    title: 'المبلغ',
                    template: function(data) {
                        return `
                            <input calss="form-control"  name="amount[`+data.id+`]" value=`+data.amount+` style="width:100%;">
                        `
                    }

                },
                {field: 'receiver',
                    title: 'اسم المستلم',
                    template: function(data) {
                        return `
                            <input calss="form-control"  name="receiver[`+data.id+`]" value=`+data.receiver+` style="width:100%;">
                        `
                    }

                }],
            translate: {
                records: {
                    processing: '{{ trans('pagination.processing') }}',
                    noRecords: '{{ trans('pagination.no_records') }}',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '{{ trans('pagination.default_first') }}',
                                prev: '{{ trans('pagination.default_prev') }}',
                                next: '{{ trans('pagination.default_next') }}',
                                last: '{{ trans('pagination.default_last') }}',
                                more: '{{ trans('pagination.default_more') }}',
                                input: '{{ trans('pagination.default_input') }}',
                                select: '{{ trans('pagination.default_select') }}',
                            },
                            info: '{{ trans('pagination.info') }}',
                        },
                    },
                },
            },

        });






    </script>
@endsection
