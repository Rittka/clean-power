<div id="StudentMoveModal" class="modal " role="dialog" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content" >
            <div class="modal-header py-5">
                <h5 class="modal-title">نقل الطالب
                    <span class="d-block text-muted font-size-sm" id="hint_of_name">name</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-5">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-lg-8">
                            <div class="row align-items-center">
                                <div class="col-md-4 my-2 my-md-0">
                                    <div class="input-icon">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->
               <!--end: Datatable-->
               <form class="box" method="post" action="move">
                    @csrf
                    @method('patch')
               <label for="status">الشعبة الحالية</label>
                            <div class="input-group input-group-solid input-group-lg border border-primary">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-link text-primary icon-lg"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="old_id"  id="old_section">
                                @foreach($sections_of_level as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                            </select>
                            </div>
                            <label for="status">الشعبة الجديدة</label>
                            <div class="input-group input-group-solid input-group-lg border border-primary">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-link text-primary icon-lg"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="new_id"  id="status">
                                @foreach($sections_of_level as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                            </select>
                            </div>
                        <input hidden  class="form-control" name="studnet_id" id="studnetid" value='0'/>
                        <div class="card-footer row">
                    <div class="col-5"></div>
                    <button type="submit" class="btn btn-primary font-weight-bolder px-9 py-4 mr-2">{{trans('main.save')}}</button>
                    <button type="reset" class="btn btn-secondary font-weight-bolder px-9 py-4 mr-2">{{trans('main.cancel')}}</button>
                </div>

          </form>
           </div>
        </div>
    </div>
</div>

