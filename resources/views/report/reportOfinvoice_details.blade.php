@extends('layouts.master')

@section('title', 'تقرير الكشوفات ')

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <h1 style="font-size : 3rem">تقرير  الفواتير</h1>
        </div>
        <div class="card-body">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="بحث..." id="kt_datatable_search_query" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection
@section('js')
    <script>

         var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {

                         url: '{!! route('getreportOfStudentsDatatable.data') !!}',
                        //  method : 'GET'
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    },
                },
                // pageSize: 10,
                // serverPaging: true,
                // serverFiltering: true,
                // serverSorting: true,
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
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [ {
                field: 'customer_name', title: 'المورد  ',
            }, {
                field: 'project_name', title: 'تاريخ الفاتورة  ',

            },{
                field: 'region', title: 'إجمالي القيمة ',
            },
            {
                field: 'Actions', title: 'خيارات', sortable: false, width: 200, overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return '\
                    <a href="{{ url('invoice')}}/'+data.id+'/" class="btn btn-sm btn-clean btn-icon mr-2" title="تفاصيل">\
                        <i class="far fa-eye text-primary"></i>\
                  </a>\
                        <a href="{{url('invoice')}}/'+data.id+'/edit" class="btn btn-sm btn-clean btn-icon " title="تعديل">\
                            <i class="fas fa-edit text-primary"></i>\
                        </a>\
                        <a  class="btn btn-sm btn-clean btn-icon" onclick="invoice_delete($(this))" data-id="'+data.id+'" data-name="'+data.full_name+'" title="حذف">\
                            <i class="flaticon2-rubbish-bin  text-primary "></i>\
                        </a>\
                    ';
                },
         }],

            translate: {
                records: {
                    processing: '{{trans('pagination.processing')}}',
                    noRecords: '{{trans('pagination.no_records')}}',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '{{trans('pagination.default_first')}}',
                                prev: '{{trans('pagination.default_prev')}}',
                                next: '{{trans('pagination.default_next')}}',
                                last: '{{trans('pagination.default_last')}}',
                                more: '{{trans('pagination.default_more')}}',
                                input: '{{trans('pagination.default_input')}}',
                                select: '{{trans('pagination.default_select')}}',
                            },
                            info: '{{trans('pagination.info')}}',
                        },
                    },
                },
            },

        });
    </script>
@endsection
