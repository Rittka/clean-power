@extends('layouts.master')

@section('title', 'إضافة علامات طلاب')
@section('content')
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <span class="d-block  font-size-lx"> إضافة علامات طلاب صف {{ $section->level->name }}</span>
                    </h5>

                </div>
                <div class="card-toolbar">
                   </div>
                </div>

            <div class="card-body">
               <form method="post" action="/section/{{ $section->id }}/add-mark">
                    @csrf
                    <div class="mb-7">
                        <div class="row align-items-center mb-5">
                                <div class="row align-items-center">

                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0  d-md-block">المادة</label>
                                        <select class="form-control" name="subject_id">
                                            <option value="null"> </option>
                                            @foreach ($section->level->subjects as $subject)
                                                <option name="subject_id" value="{{ $subject->id }}">{{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0  d-md-block">الفصل</label>
                                        <select class="form-control" name="semester">
                                            <option value="null"> </option>
                                            <option value="1">الأول</option>
                                            <option value="2">الثاني</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0  d-md-block">العنوان</label>
                                        <input class="form-control" name="caption" placeholder="مذاكرة 1">
                                    </div>
                                </div>
                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary px-10">حفظ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



        <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_marks"></div>

            </div>
        </div>
    </div>

</div>

    <!--end::Card-->



@endsection
@section('js')
    <script>
        var section_id = {{$section->id}};
        var datatable = $('#kt_datatable_marks').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',

                // ajax: '{!!  route('getLevelDatatable.data') !!}',
                source: {
                    read: {
                        url: '{!!  route('getAddStudentMarksDatatable.data') !!}',
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
                input: $('#kt_datatable_marks_search_query'),
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
                    field: 'mark',
                    title: 'العلامة',
                    template: function(data) {
                        return `
                            <input calss="form-control"  name="mark[` + data.id + `]" value=` + data.mark + `>
                        `
                    }

                }
            ],
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




        function datatable_student_marks($cont, student_id, student_first_name ,student_last_name) {
            var student_marks_datatable;
            var el_student_mark = $cont.find('#StudentMarksModal');
            var hint = $cont.find('#hint_of_name');
            hint[0].innerText = hint[0].innerText + " " + student_first_name + " " + student_last_name ;
            student_marks_datatable = el_student_mark;
            var modal = student_marks_datatable.closest('.modal');
            var modalContent;
            modal.on('shown.bs.modal', function() {
                    modalContent = $(this).find('.modal-content');

                })

                //hide modal
                .on('hidden.bs.modal', function() {
                    el_student_mark.KTDatatable('destroy');
                    hint[0].innerText = " ";
                });

            student_marks_datatable.on('datatable-on-layout-updated', function() {
                student_marks_datatable.show();
                student_marks_datatable.redraw();
            });

            // fix datatable layout after modal shown
            student_marks_datatable.hide();
            $.ajax({
                url: '{!!  route('getStudentMarksDatatable.data') !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                method: 'POST',

                data: {
                    "id": student_id
                },
                success: function(data) {
                    console.log("Response: " + data.data);

                    student_marks_datatable.KTDatatable({
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
                            input: el_student_mark.find('#kt_datatable_student_marks_search_query'),
                            key: 'generalSearch'
                        },

                         // columns definition
                         columns:
                        [{
                                field: 'id',
                                title: '',
                                sortable: false,
                                width: 30,
                                textAlign: 'center',
                            }, {
                                field: 'subject_name',
                                title: 'المادة',
                                sortable: 'asc',
                            }, {
                                field: 'mark',
                                title: 'العلامة',
                                sortable: 'asc',
                            },
                            {
                                field: 'semester',
                                title: 'الفصل',
                                sortable: 'asc',
                            },
                            {
                                field: 'caption',
                                title: 'العنوان',
                                sortable: 'asc',
                            },
                            {
                                field: 'Actions', title: '{{trans('main.actions')}}', sortable: false, width: 200, overflow: 'visible',
                                autoHide: false,
                                template: function(data) {
                                    return '\
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon " title="{{trans('main.delete')}}">\
                                            <i class="flaticon2-rubbish-bin  text-primary "></i>\
                                        </a>\
                                    ';
                                }
                        }],
                    });

                }
            });


        }

    </script>
@endsection


