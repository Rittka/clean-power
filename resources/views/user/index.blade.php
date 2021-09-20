@extends('layouts.master')
@section('title','حسابات المستخدمين')
@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <h1 style="font-size : 3rem">حسابات المستخدمين</h1>
        </div>
        <div class="card-body">
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="{{trans('main.search')}}..." id="kt_datatable_search_query" />
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

                         url: '{!! route('getUserDatatable.data') !!}',
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
            columns: [{
                field: 'id', title: '#', sortable: 'asc', width: 30, type: 'number', selector: false, textAlign: 'center',
            }, {
                field: 'email', title: 'البريد الالكتروني ',
            }, {
                field: 'password', title: 'كلمة المرور ',

            },{
                field: 'role_name', title: 'الدور الوظيفي  ',
            },
            {
                field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return '\
                    <a href="{{url('user')}}/'+data.id+'/edit" class="btn btn-sm btn-clean btn-icon " title="{{trans('main.edit')}}">\
                        <i class="fas fa-edit text-primary"></i>\
                        </a>\
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon " onclick="user_delete($(this))" title="{{trans('main.delete')}}">\
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

        function user_delete($this){
            var id = $this.data('id');
            var name = $this.data('name');
            _confirm('{{ trans('main.confirm') }}', '{{ trans('main.are_you_sure_to_delete')}} ('+name+')', 'error', '{{ trans('main.delete') }}', '{{ trans('main.cancel') }}', function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'DELETE',
                    url: 'teacher/'+id,
                }).done(function (res) {
                    window.location.reload();
                });
            });

        }
    </script>
@endsection
