@extends('layouts.master')

@section('title', trans('main.section'))
@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page"> الكشف</li>
<li class="breadcrumb-item active" aria-current="page">جميع الكشوفات</li>



@endsection
@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                <h1 style="font-size : 3rem">الكشوف</h1>
                </div>
                <div class="card-toolbar">
                    <form method="GET" action="/check/create">
                    <button type="submit" class="btn btn-primary font-weight-bolder">
                        <i class="fas fa-plus"></i> كشف جديد
                    </button>
                </form>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="بحث..." id="kt_checks_datatable_search_query" />
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
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_checks_datatable"></div>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>

@endsection


@section('js')
    <script>
         var datatable = $('#kt_checks_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                // ajax: '{!! route('getSectionDatatable.data') !!}',
                source: {
                    read: {
                        url: '{!! route('getCheckDatatable.data') !!}',
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
                input: $('#kt_checks_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'id', title: '#', sortable: 'asc', width: 30, type: 'number', selector: false, textAlign: 'center',
            }, {
                field: 'project_name', title: 'اسم المشروع',
            },
            {
                field: 'location', title: 'المنطقة',
            },
            {
                field: 'remarks', title: 'ملاحظات',
            },
            {
                field: 'date_of_check', title: 'التاريخ',
            },
             {
                field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return `



                    <a href="{{ url('check')}}/`+data.id+`/edit" class="btn btn-sm btn-clean btn-icon mr-2"title="تعديل">
                        <i class="fas fa-edit text-primary"></i>
                        </a>
                            <a  data-id=`+data.id+` class="btn deleteBtn btn-sm btn-clean btn-icon" type ="submit" value="DELETE"  title="حذف">
                            <i class="flaticon2-rubbish-bin  text-primary "></i>
                        </a>
                    `;
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

        $(document).on('click','.deleteBtn', function() {
            var id =   $(this).data('id')

                  $.ajax({
                url: '/check/delete/'+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                method: 'GET',
                success: function(data) {
                    console.log("Response: " + data.data);
                    window.location = "check";//redirect section
                   },
                    });
                });

    </script>
@endsection
