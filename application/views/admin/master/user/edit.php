<style>
    .pre-posttest h3 {
        font-weight: 700;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .pre-posttest h4 {
        font-weight: 500;
        font-style: italic
    }

    .qna {
        margin-bottom: 20px
    }

    .qna label {
        font-weight: 500 !important;
    }

    .answer {
        margin-top: 10px
    }

    input {
        display: inline-block;
        vertical-align: middle;
        margin-top: 2px !important;
        margin-right: 8px !important;
    }

    .question {
        font-size: 17px;
        font-weight: 600
    }

    h3.sub-title {
        font-size: 20px;
        font-weight: 700;
        text-decoration: none;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 14px !important;
    }

    .box-att {
        background: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 10px
    }

    .divi-delayed-button-2 {
        text-align: center;
        padding: 15px;
        font-weight: 800;
        font-size: 18px;
        border: none;
        /* border-top-right-radius: 10px; */
        background: #007bff;
        color: #fff;
        border-radius: 8px;
        margin-bottom: 20px
    }

    .divi-delayed-button-2:hover {
        background: #58a9ff
    }

    .content-task {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        margin-bottom: 20px
    }

    .answer {
        margin-left: 25px;
        display: flex;
        justify-content: left;
        align-content: center;
    }

    [type="checkbox"],
    [type="radio"] {
        width: 15px !important;
    }

    @media(max-width: 600px) {
        .answer {
            margin-left: 0px
        }

        input {
            margin-right: 10px !important
        }

        [type="checkbox"],
        [type="radio"] {
            width: 30px !important;
        }

        .question {
            line-height: 25px;
            font-size: 18px
        }
    }
</style>

<style>
    table.dataTable th {
        position: relative;
        text-align: center
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:after {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }

    table.dataTable thead>tr>th.sorting_asc,
    table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting,
    table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc,
    table.dataTable thead>tr>td.sorting {
        padding: 10px 20px;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        vertical-align: middle;
    }

    select.input-sm {
        height: 40px;
        line-height: 30px;
        text-align: center;
    }

    .box-header {
        background: #3c8dbc;
        border: 4px solid #000;
        border-radius: 10px 10px 0px 0px;
        padding: 25px 0px;
    }

    .box.box-solid.box-primary {
        border-top: none;
        border: 0px solid transparent
    }

    .box-title {
        font-size: 24px;
        font-weight: 700;
        text-transform: uppercase;
        color: #fff;
    }

    .box.box-info {
        border-top-color: transparent;
    }

    .content {
        padding: 0px
    }

    .date-range {
        background-color: #000;
        color: #fff;
        text-align: center;
        width: 100%;
        padding: 8px 16px;
        border-radius: 0px 0px 10px 10px;
        border: 2px solid #000;
        font-weight: 600
    }

    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }

    .b-style {
        font-family: cjFont;
        font-size: 14px;
        color: #0f172a;
        margin-bottom: 0px;
        background: transparent;
        padding: 0px;
        padding-top: 5px
    }

    table.table-bordered.dataTable th, table.table-bordered.dataTable td {
        font-size: 10px !important
    }

    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
        bottom: 10px !important;
    }

    select.input-sm {
        height: 30px;
        line-height: 20px;
        margin: 0px 5px
    }

    div.dataTables_wrapper div.dataTables_length select {
        width: 50px;
    }
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 8px;
        white-space: nowrap;
        font-size: 10px !important;
    }
    .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
        font-size: 11px
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        font-size: 11px;
    }
    div.dataTables_wrapper div.dataTables_length label {
        font-size: 11px;
    }
    td {
        height: auto;
        padding: 10px !important
    }
    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        text-align: left;
        font-size: 11px;
        display: inline-block;
        vertical-align: middle;
    }
    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
        font-size: 11px;
    }
    .table-responsive {
        width: 100%
    }
    .table-w-message {
        width: 1330px;
    }
    .c-form {
        max-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cust-btn-back {
        color: red;
        border: 1px solid red;
        background: #fff;
    }
    .cust-btn-back:hover {
        background: red;
        color: #fff;
        border: 1px solid red;
    }

</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>Edit User</strong>
    </h3>
    <div class="row w-form">
        <div class="c-form">
            <form action="<?= admin_url('master/user/do_update') ?>" method="POST" enctype="multipart/form-data" style="margin-top: 20px">
                <?php $user_access = json_decode($model['MENU_ACCESS']); ?>
                <input type="hidden" name="employee_id" value="<?= $model['EMPLOYEE_ID'] ?>">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="plant" class="col-lg-12 col-sm-12 col-form-label">Plant</label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="plant" class="form-control" style="width: 100%;" name="plant">
                                    <option value="" selected>- PILIH PLANT -</option>
                                    <?php foreach ($plant as $field): ?>
                                        <option <?= $model['PLANT'] == $field['CODE'] ? 'selected' : '' ?> value="<?= $field['CODE'] ?>"><?= $field['CODE'] ?> - <?= $field['CODE_NAME'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group row">
                            <label for="region" class="col-lg-12 col-sm-12 col-form-label">Region</label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="region" class="form-control" style="width: 100%;" name="region">
                                    <option value="" selected>- PILIH REGION -</option>
                                <?php foreach ($region as $field): ?>
                                    <option <?= $model['REGION'] == $field['CODE'] ? 'selected' : '' ?> value="<?= $field['CODE'] ?>"><?= $field['CODE'] ?> - <?= $field['CODE_NAME'] ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="employee_id" class="col-lg-12 col-sm-12 col-form-label">Employee ID <span class="text-danger">*</span></label>
                    <div class="col-lg-12 col-sm-12">
                        <input type="text" class="form-control" autocomplete="off" value="<?= $model['EMPLOYEE_ID'] ?>" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="full_name" class="col-lg-12 col-sm-12 col-form-label">Full Name <span class="text-danger">*</span></label>
                    <div class="col-lg-12 col-sm-12">
                        <input type="text" name="full_name" class="form-control" autocomplete="off" value="<?= $model['FULL_NAME'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-lg-12 col-sm-12 col-form-label">Email</label>
                    <div class="col-lg-12 col-sm-12">
                        <input type="email" name="email" class="form-control" autocomplete="off" value="<?= $model['EMAIL'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group row">
                            <label for="role" class="col-lg-12 col-sm-12 col-form-label">Role</label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="role" class="form-control" style="width: 100%;" name="role" required>
                                    <option <?= $model['ROLE'] == 'SALES' ? 'selected' : '' ?> value="SALES">SALES</option>
                                    <option  <?= $model['ROLE'] == 'KOORDINATOR' ? 'selected' : '' ?> value="KOORDINATOR">KOORDINATOR</option>
                                    <option  <?= $model['ROLE'] == 'MANAGER' ? 'selected' : '' ?> value="MANAGER">MANAGER</option>
                                    <option  <?= $model['ROLE'] == 'HEAD' ? 'selected' : '' ?> value="HEAD">HEAD</option>
                                    <option  <?= $model['ROLE'] == 'DIREKTUR' ? 'selected' : '' ?> value="DIREKTUR">DIREKTUR</option>
                                    <option  <?= $model['ROLE'] == 'ADMIN HO' ? 'selected' : '' ?> value="ADMIN HO">ADMIN HO</option>
                                    <option  <?= $model['ROLE'] == 'SUPERADMIN' ? 'selected' : '' ?> value="SUPERADMIN">SUPERADMIN</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $model_arr = [];
                    if (!empty($model_area)) {
                        foreach ($model_area as $v) {
                            $model_arr[] = $v['CODE_AREA'];
                        }
                    }
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group row">
                            <label for="sales_area" class="col-lg-12 col-sm-12 col-form-label">Sales Area</label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="sales_area" class="form-control" style="width: 100%;" name="sales_area[]" multiple>
                                    <?php foreach ($area as $v): ?>
                                    <option <?= (!empty($model_arr) && in_array($v['CODE'], $model_arr)) ? 'selected' : '' ?> value="<?= $v['CODE'] ?>"><?= $v['CODE'].' - '.$v['CODE_NAME'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group row">
                            <label for="menu_access" class="col-lg-12 col-sm-12 col-form-label">Menu Access</label>
                            <div class="col-lg-12 col-sm-12">
                                <select id="menu_access" class="form-control" style="width: 100%;" name="menu_access[]" multiple>
                                    <?php foreach ($menu_access as $ma_code =>  $ma_name): ?>
                                    <option <?= (!empty($user_access) && in_array($ma_code, $user_access)) ? 'selected' : '' ?> value="<?= $ma_code ?>"><?= $ma_code.' - '.$ma_name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="password" class="col-lg-12 col-sm-12 col-form-label">New Password</label>
                    <div class="col-lg-12 col-sm-12">
                        <input type="password" class="form-control" name="NEW_PASSWORD">
                        <small style="color: red">* Fill this column to change user password</small>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col-lg-12 col-sm-12" style="display: flex;">
                        <a href="<?= admin_url('master/user') ?>" class="btn btn-primary cust-btn-back" style="width: 50%">Cancel</a>
                        <span style="margin: 5px;"></span>
                        <button type="submit" class="btn btn-primary cust-btn-save" style="width: 50%">Save</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>

<script>
    $(function () {
      $('#example1').DataTable(
        {"language": {"paginate": { "previous": "&lt","next": "&gt",}}}
      );
      $('#plant').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH PLANT -",
      }).on("change", function (e) {
            console.log('check');
      });
      $('#region').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH REGION -",
      }).on("change", function (e) {
            console.log('check');
      });
      $('#sales_area').select2({
            theme: 'bootstrap4',
            language: "en",
            placeholder: "- PILIH AREA -",
      }).on("change", function (e) {
            console.log('check');
      });
    });
</script>
