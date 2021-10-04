@extends('layouts.master')

@section('title', 'المشاريع')

@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                <h1 style="font-size : 3rem">المشاريع</h1>
                </div>
                <div class="card-toolbar" style="position: absolute; left:350px;top:22px">
                    <a href="{{url('project/create')}}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon  svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero"/>
                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>  </span>
                    إضافة طلبية
                    </a>
                </div>
                <div class="card-toolbar" style="position: absolute; left:180px;top:22px">
                    <a href="{{url('region/create')}}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon  svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero"/>
                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>  </span>
                    إضافة منطقة
                    </a>
                </div>
                <div class="card-toolbar">
                    <a href="{{url('person/create')}}" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon  svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero"/>
                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>  </span>
                    إضافة زبون
                    </a>
                </div>
            </div>

            <div class="card-body">

            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="بحث..." id="kt_students_datatable_search_query" />
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
            <div class="datatable datatable-bordered datatable-head-custom kt_students_datatable" id="kt_students_datatable"></div>
            <!--end: Datatable-->
        </div>
        </div>
        <!--end::Card-->
    </div>
@endsection


@section('js')
    <script>
          var datatable = $('#kt_students_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {

                         url: '{!! route('getprojectDatatable.data') !!}',
                         data:{'id':0},

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
                input: $('#kt_students_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
              columns: [{
                field: 'id', title: '#', sortable: 'asc', width: 30, type: 'number', selector: false, textAlign: 'center',
                },  {
                    field: 'name', title: 'رمز المشروع',
                }, {
                    field: 'customer_name', title: ' الزبون',
                },  {
                    field: 'location', title: 'المنطقة',
                },
                {
                    field: 'type', title: 'النوع',
                },
                {
                    field: 'num_tower', title: 'عدد الابراج',
                },
               {
                field: 'Actions', title: 'خيارات', sortable: false, width: 200, overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return '\
                    <a href="{{ url('project')}}/'+data.id+'/" class="btn btn-sm btn-clean btn-icon mr-2" title="Show details">\
                        <i class="far fa-eye text-primary"></i>\
                  </a>\
                        <a href="{{url('project')}}/'+data.id+'/edit" class="btn btn-sm btn-clean btn-icon " title="تعديل">\
                            <i class="fas fa-edit text-primary"></i>\
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
