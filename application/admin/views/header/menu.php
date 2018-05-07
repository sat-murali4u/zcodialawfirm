
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title ">Menu Settings</h3>

            <div class="box-tools pull-right hide">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8"> 

                    <div class="form-group select2_mainmenu">
                        <label for="txtMainMenu">Menu</label>
                        <input type="hidden" class="hiddenMainMenu">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-lg-7 col-xs-7 ddMainMenuOuter">
                                <select class="form-control ddMainMenu" style="width: 100%;" onchange="get_menuDetails($(this));">
                                    <option selected="selected" value="0">Please Select...</option>
                                </select>
                            </div>
                            <div class="col-md-5  col-sm-5 col-lg-5 col-xs-5 menu_editbutton_col" style="padding-right:0px; padding-left:0px;">
                                <button onclick="addMainMenuDetails($(this));"  data-toggle="modal" data-target="#modal-addMenu" class="btnAddMainMenu btn"><i class="fa fa-plus"></i></button>
                                <button onclick="getMainMenuDetails($(this));" disabled class="btnEditMainMenu btn" data-toggle="modal" data-target="#modal-addMenu" ><i class="fa fa-pencil"></i></button>
                                <button class="btn open_popup_modal btnDelMainMenu" disabled data-toggle="modal" data-target="#modal-delete_menu" onclick1="delMainMenu($(this));"><i class="fa fa-trash-o"></i></button>
                            </div> 
                        </div>

                    </div>

                    <div class="form-group select2_submenu">
                        <label for="txtSubMenu">Sub Menu</label>
                        <input type="hidden" class="hiddenSubMenu"><div class="row">
                            <div class="col-md-7  col-sm-7 col-lg-7 col-xs-7 ddSubMenuOuter">
                                <select class="form-control ddSubMenu" style="width: 100%;" onchange="get_submenuDetails($(this))" disabled>
                                    <option selected="selected" value="0">Please Select...</option>
                                </select>
                            </div>
                            <div class="col-md-5  col-sm-5 col-lg-5 col-xs-5 menu_editbutton_col" style="padding-right:0px; padding-left:0px;">
                                <button onclick="addSubMenuDetails($(this));" disabled data-toggle="modal" data-target="#modal-addMenu"  class="btnAddSubMenu btn"><i class="fa fa-plus"></i></button>
                                <button onclick="getSubMenuDetails($(this));" disabled class="btnEditSubMenu btn" data-toggle="modal" data-target="#modal-addMenu"><i class="fa fa-pencil"></i></button>
                                <button class="btn open_popup_modal btnDelSubMenu" disabled data-toggle="modal" data-target="#modal-delete_submenu" onclick1="delSubMenu($(this));"><i class="fa fa-trash-o"></i></button>
                            </div> 
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btnUpdateMenu"  onclick="menu_submit($(this))" >Submit</button>
        </div>
    </div>
</section>


<section class="content menuDetailsDT hide">

    <div class="row">
        <div class="col-md-12 menu_list_dt">
            <div class="box box_border_top">
                <div class="box-header timeline_dt1">
                    <h3 class="box-title">Header Menu List</h3>
                </div>

                <div class="box-body no-padding timelineItems_list">
                    <table class="table table-striped menulist_dt" cellspacing="0" id="menulist_dt"  style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="dt_item_col timelineitems">Main Menu</th>
                                <th class="dt_item_col1 timelineitems">Sub Menu</th>
                                <th class="dt_content_col timelineitems">Url</th>
                                <th class="dt_status_col timelineitems">Show / Hide</th>
                                <th class="dt_action_col timelineitems">Action</th>
                            </tr>
                        </thead>

                    </table>
                </div> 
            </div>
        </div> 
    </div> 


</section>

<div class="menu_wrapper ">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav" id="menu"></ul></div>
    </nav>


</div>




<div class="modal fade" id="modal-addMenu">
    <div class="modal-dialog ">
        <div class="modal-content menuModalContent">
            <div class="modal-header">
                <h4 class="modal-title strong message" id="menuModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="menuModalLabel name"></label>
                    <input type="text" class="form-control menuModalText">
                </div>
                <div class="form-group">
                    <label class="menuModalLabel url">Url</label>
                    <input type="text" class="form-control menuModalUrl">
                </div>
            </div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="update_menu_modal btn btn-primary yes_popup_button" onclick="addMenu($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete_menu">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_menuItem btn btn-primary yes_popup_button " onclick="del_menuItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-delete_submenu">
    <div class="modal-dialog ">
        <div class="modal-content del_conf">
            <div class="modal-header">

                <h4 class="modal-title strong message" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body" id="modal-bodyku">Are you sure want to Delete?</div>
            <div class="modal-footer" >
                <button type="button"  id="yes_conform" class="confirm_delete_submenuItem btn btn-primary yes_popup_button " onclick="del_menuItem($(this));">Yes</button>
                <button type="button"class="btn btn btn-danger nobutton" data-dismiss="modal">No</button> 

            </div>
        </div>
    </div>
</div>