<div id="SectionsDatatable" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header py-5">
                <h5 class="modal-title">{{ trans('main.sections') }}
                    <span class="d-block text-muted font-size-sm" id="hint_of_level_name">{{ trans('main.all_sections_for_this_level') }}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder={{ trans('main.search') }}
                                            id="kt_datatable_sections_search_query_4" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">{{ trans('main.search') }}</a>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_sections"></div>
                <!--end: Datatable-->
            </div>
        </div>
    </div>
</div>
