@extends('layouts.master')

@section('title', trans('main.level'))

@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h1 style="font-size : 3rem">المشاريع</h1>
                </div>
                <div class="card-toolbar">
                    {{-- <a href="#" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>{{ trans('main.new_level') }}
                    </a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="بحث..."
                                            id="kt_datatable_search_query" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="some-form">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                    <!--end: Datatable-->
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>

    {{-- Show Section Modal --}}
    @include('settings.sectionsOflLevel')
    {{-- Show Subject Modal --}}
    @include('settings.subjectsOfLevel')


@endsection


@section('js')

    <script>
            // {{-- to show all level --}}
        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                // ajax: '{!!  route('getLevelDatatable.data') !!}',
                source: {
                    read: {
                        url: '{!!  route('getLevelDatatable.data') !!}',
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
                input: $('#kt_datatable_search_query'),
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
                field: 'name',
                title: 'رمز المشروع',
            }, {
                field: 'customer_name',
                title: 'اسم الزبون',
            }, 
            {
                field: 'customer_name',
                title: ' المنطقة',
            },
            {
                field: 'customer_name',
                title: ' تاريخ انتهاء الكفالة',
            }, 
            {
                field: 'customer_name',
                title: ' التكلفة الاجمالية',
            }, {
                field: 'Actions',
                title: 'خيارات',
                sortable: false,
                width: 125,
                overflow: 'visible',
                autoHide: false,
                template: function(data) {
                    return `
                        <a class="btn btn-sm btn-clean btn-icon open-subjects-modal" data-level-id="` + data.id +
                            `" data-level-name="` + data.name + `" title="عرض المواد">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                            <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                        </g>
                                    </svg>
                                <!--end::Svg Icon-->
                                </span>
                        </a>
                        <a class="btn btn-sm btn-clean btn-icon open-sections-modal" data-level-id="` + data.id +
                                                `" data-level-name="` + data.name + `" title="عرض الشعب">
                                <span class="svg-icon svg-icon-primary svg-icon-2x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Thumbtack.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                                            <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                                        </g>
                                        </svg>
                                    <!--end::Svg Icon-->
                                </span>
                        </a>
                        `;
                },
            }],

            translate: {
                records: {
                    processing: '{{ trans(' pagination.processing ') }}',
                    noRecords: '{{ trans(' pagination.no_records ') }}',
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '{{ trans('pagination.default_first ') }}',
                                prev: '{{ trans(' pagination.default_prev ') }}',
                                next: '{{ trans(' pagination.default_next ') }}',
                                last: '{{ trans('pagination.default_last ') }}',
                                more: '{{ trans('pagination.default_more ') }}',
                                input: '{{ trans('pagination.default_input ') }}',
                                select: '{{ trans(' pagination.default_select ') }}',
                            },
                            info: '{{ trans(' pagination.info ') }}',
                        },
                    },
                },
            },

        });

        datatable.on('datatable-on-ajax-done', function() {
            $(document).on('click', '.open-sections-modal', function() {
                var $this = $(this);
                var level_id = $this.data('level-id');
                var level_name = $this.data('level-name');
                var $sections_modal = $('#SectionsDatatable').modal();
                datatable_sections($sections_modal, level_id, level_name);
            });
            $(document).on('click', '.open-subjects-modal', function() {
                var $this = $(this);
                var level_id = $this.data('level-id');
                var level_name = $this.data('level-name');
                var $subject_modal = $('#SubjectsDatatable').modal();
                datatable_subjects($subject_modal, level_id, level_name);
            });

        });

        //---- to show sections of level


        function datatable_sections($cont, level_id, level_name) {
            var se_datatable;
            var el = $cont.find('#kt_datatable_sections');
            var hint = $cont.find('#hint_of_level_name');
            hint[0].innerText = hint[0].innerText + " " + level_name;
            se_datatable = el;
            var modal = se_datatable.closest('.modal');
            var modalContent;
            modal.on('shown.bs.modal', function() {
                    modalContent = $(this).find('.modal-content');

                })

                //hide modal
                .on('hidden.bs.modal', function() {
                    el.KTDatatable('destroy');
                    hint[0].innerText = "{{ trans('main.all_sections_for_this_level') }}";
                });

            se_datatable.on('datatable-on-layout-updated', function() {
                se_datatable.show();
                se_datatable.redraw();
            });

            // fix datatable layout after modal shown
            se_datatable.hide();
            $.ajax({
                url: '{!!  route('getSectionsOfLevelDatatable.data') !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                method: 'POST',

                data: {
                    "id": level_id
                },
                success: function(data) {
                    console.log("Response: " + data.data);

                    se_datatable.KTDatatable({
                        // datasource definition
                        data: {
                            type: 'local',
                            source: data,
                            pageSize: 10, // display 20 records per page
                            serverPaging: true,
                            serverFiltering: false,
                            serverSorting: true,
                        },

                        // layout definition
                        layout: {
                            theme: 'default',
                            scroll: false,
                            height: null,
                            footer: false,
                        },

                        // column sorting
                        sortable: true,

                        pagination: true,

                        search: {
                            input: el.find('#kt_datatable_sections_search_query'),
                            key: 'generalSearch'
                        },

                        // columns definition
                        columns: [{
                            field: 'RecordID',
                            title: '',
                            sortable: false,
                            width: 30,
                            textAlign: 'center',
                        }, {
                            field: 'name',
                            title: '\{{ trans('main.section') }}',
                            sortable: 'asc',
                        }, {
                            field: 'year',
                            title: '\{{ trans('main.year') }}',
                            sortable: 'asc',
                        },
                        {
                            field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
                            autoHide: false,
                            template: function(data) {
                                return '\
                                <a href="{{ url('section')}}/'+data.id+'/students" class="btn btn-sm btn-clean btn-icon mr-2" title="{{trans('main.show')}} {{trans('main.students')}}">\
                                    <i class="fas fa-user-graduate text-primary "></i>\
                                </a>\
                                <a href="{{ url('section')}}/'+data.id+'/teachers" class="btn btn-sm btn-clean btn-icon mr-2" title="{{trans('main.show')}} {{trans('main.teachers')}}">\
                                    <i class="fas fa-chalkboard-teacher text-primary"></i>\
                                </a>\
                                <a href="{{url('section')}}/'+data.id+'/edit" class="btn btn-sm btn-clean btn-icon " title="{{trans('main.edit')}}">\
                                    <i class="fas fa-edit text-primary"></i>\
                                    </a>\
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon " title="{{trans('main.delete')}}">\
                                        <i class="flaticon2-rubbish-bin  text-primary "></i>\
                                    </a>\
                                ';
                            },
                        }],
                    });

                }
            });


        }


    function datatable_subjects($cont, level_id, level_name) {
            var sub_datatable;
            var el = $cont.find('#kt_datatable_subjects');
            var hint = $cont.find('#hint_level');
            hint[0].innerText = hint[0].innerText + " " + level_name;
            sub_datatable = el;
            var modal = sub_datatable.closest('.modal');
            var modalContent;
            modal.on('shown.bs.modal', function() {
                    modalContent = $(this).find('.modal-content');

                })

                //hide modal
                .on('hidden.bs.modal', function() {
                    el.KTDatatable('destroy');
                    hint[0].innerText = "{{ trans('main.all_subjects_for_this_level') }}";
                });

            sub_datatable.on('datatable-on-layout-updated', function() {
                sub_datatable.show();
                sub_datatable.redraw();
            });

            // fix datatable layout after modal shown
            sub_datatable.hide();
            $.ajax({
                url: '{!!  route('getSubjectsOfLevelDatatable.data') !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                method: 'POST',

                data: {
                    "id": level_id
                },
                success: function(data) {
                    console.log("Response: " + data.data);

                    sub_datatable.KTDatatable({
                        // datasource definition
                        data: {
                            type: 'local',
                            source: data,
                            pageSize: 10, // display 20 records per page
                            serverPaging: true,
                            serverFiltering: false,
                            serverSorting: true,
                        },

                        // layout definition
                        layout: {
                            theme: 'default',
                            scroll: false,
                            height: null,
                            footer: false,
                        },

                        // column sorting
                        sortable: true,

                        pagination: true,

                        search: {
                            input: el.find('#kt_datatable_subjects_search_query'),
                            key: 'generalSearch'
                        },

                     // columns definition
                     columns: [{
                            field: 'RecordID',
                            title: '',
                            sortable: false,
                            width: 30,
                            textAlign: 'center',
                        }, {
                            field: 'name',
                            title: '\{{ trans('main.section') }}',
                            sortable: 'asc',
                        }, {
                            field: 'max_mark',
                            title: '\{{ trans('main.max_mark') }}',
                            sortable: 'asc',
                        },{
                            field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
                            autoHide: false,
                            template: function(data) {
                                return '\
                                <a href="{{ url('subject')}}/'+data.id+'/showPlans" class="btn btn-sm btn-clean btn-icon mr-2" title="{{trans('main.show')}} {{trans('main.plan')}}">\
                                    <i class="fas fa-sitemap text-primary "></i>\
                                </a>\
                                ';
                            },
                        }],
                    });

                }
            });


        }

        // function datatable_subjects($cont, level_id, level_name) {
        //     var su_datatable;
        //     var el = $cont.find('#kt_datatable_subjects');
        //     var hint = $cont.find('#hint_level');
        //     hint[0].innerText = hint[0].innerText + " " + level_name;
        //     su_datatable = el;
        //     var modal = su_datatable.closest('.modal');
        //     var modalContent;
        //     modal.on('shown.bs.modal', function() {
        //             modalContent = $(this).find('.modal-content');

        //         })

        //         //hide modal
        //         .on('hidden.bs.modal', function() {
        //             el.KTDatatable('destroy');
        //             hint[0].innerText = "{{ trans('main.all_sections_for_this_level') }}";
        //         });

        //     su_datatable.on('datatable-on-layout-updated', function() {
        //         su_datatable.show();
        //         su_datatable.redraw();
        //     });

        //     // fix datatable layout after modal shown
        //     su_datatable.hide();
        //     $.ajax({
        //         url: '{!!  route('getSubjectsOfLevelDatatable.data') !!}',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        //         },
        //         method: 'POST',

        //         data: {
        //             "id": level_id
        //         },
        //         success: function(data) {
        //             console.log("Response: " + data.data);

        //             su_datatable.KTDatatable({
        //                 // datasource definition
        //                 data: {
        //                     type: 'local',
        //                     source: data,
        //                     pageSize: 10, // display 20 records per page
        //                     serverPaging: true,
        //                     serverFiltering: false,
        //                     serverSorting: true,
        //                 },

        //                 // layout definition
        //                 layout: {
        //                     theme: 'default',
        //                     scroll: false,
        //                     height: null,
        //                     footer: false,
        //                 },

        //                 // column sorting
        //                 sortable: true,

        //                 pagination: true,

        //                 search: {
        //                     input: el.find('#kt_datatable_subjects_search_query'),
        //                     key: 'generalSearch'
        //                 },

        //                 // columns definition
        //                 columns: [{
        //                     field: 'RecordID',
        //                     title: '',
        //                     sortable: false,
        //                     width: 30,
        //                     textAlign: 'center',
        //                 }, {
        //                     field: 'name',
        //                     title: '\{{ trans('main.section') }}',
        //                     sortable: 'asc',
        //                 }, {
        //                     field: 'max_mark',
        //                     title: '\{{ trans('main.max_mark') }}',
        //                     sortable: 'asc',
        //                 },{
        //                     field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
        //                     autoHide: false,
        //                     template: function(data) {
        //                         return '\
        //                         <a href="{{ url('subject')}}/'+data.id+'/plans" class="btn btn-sm btn-clean btn-icon mr-2" title="{{trans('main.show')}} {{trans('main.plan')}}">\
        //                             <i class="fas fa-sitemap text-primary "></i>\
        //                         </a>\
        //                         ';
        //                     },
        //                 }],
        //             });

        //         }
        //     });


        // }

    </script>


@endsection
