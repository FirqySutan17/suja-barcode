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

    .wrap-cc {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(8, 1fr);
        column-gap: 20px
    }
    
    .wrap-cc .cc-item:nth-child(1) {
        width: 100%;
        grid-column: span 2;
    }

    .wrap-cc .cc-item:nth-child(2) {
        width: 100%;
        grid-column: span 6;
    }

    .cc-item table {
        border-collapse: separate;
        border-spacing: 0;
    }
    .cc-item th {
        font-size: 11px !important;
        position: sticky;
        top: 0;
        border: 1px solid #000
    }

    .cc-item td {
        font-size: 10px !important
    }

    .cc-item {
        height: auto;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .active-row {
        background: #f8971d ;
        
    }

    .active-row td {
        color: #fff !important;
    }

    .table-hover > tbody > tr.active-row:hover {
        background: #f8971d ;
        
    }

    .table-hover > tbody > tr.active-row:hover td {
        color: #fff !important;
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
        font-size: 11px;
    }
</style>

<div class="main-content pre-posttest">
    <h3 class="card-title">
        <strong>MASTER DATA - COMMON CODE</strong>
    </h3>
    <!-- <form class="form-horizontal mb-5" action="#" method="POST">
        <div class="row"
            style="margin-top: 30px; border: 1px solid #000; border-right: 0px solid #000; border-left: 0px solid #000; padding: 20px 0px;">
            <div class="col-md-8 col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <input type="date" name="start_date" value="" class="form-control" placeholder="Start Date">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="date" name="end_date" value="" class="form-control" placeholder="End Date">
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <button type="submit" class="btn btn-primary btn-block" style="height: 40px">FILTER</button>
            </div>
        </div>
    </form> -->
    <div class="row" style="padding: 0px 10px; border-bottom: 2px solid #000; padding-bottom: 8px;margin: 0px 0px; margin-bottom: 10px; ">
        <div class="col-6"></div>
        <div class="col-4"></div>
        <div class="col-2">
            <a href="<?= admin_url('master/common_code/create') ?>" target="_blank" class="btn btn-primary btn-block">CREATE</a>
            <form id="form-headcode" action="<?= admin_url('master/common_code') ?>" method="POST"><input type="hidden" name="headcode" id="input-headcode"></form>
        </div>
    </div>
    <div class="wrap-cc">
        <div class="cc-item">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle">
                            Head
                        </th>
                        <th style="text-align: center; vertical-align: middle">
                            Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datatable_headcode as $v): ?>
                        <tr data-headcode="<?= $v['HEAD_CODE'] ?>" class="headcode_data <?= $v['HEAD_CODE'] == $headcode ? 'active-row' : '' ?>">
                            <td><?= $v['HEAD_CODE'] ?></td>
                            <td><?= $v['CODE_NAME'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="cc-item">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">Head Code</th>
                        <th style="text-align: center;">Code</th>
                        <th style="text-align: center;">Code Name</th>
                        <th style="text-align: center;">Use Y</th>
                        <th style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datatable as $i => $v): ?>
                        <tr>
                            <td style="text-align: center; vertical-align: middle"><?= $v['HEAD_CODE'] ?></td>
                            <td style="text-align: center; vertical-align: middle"><?= $v['CODE'] ?></td>
                            <td style="text-align: center; vertical-align: middle"><?= $v['CODE_NAME'] ?></td>
                            <td style="text-align: center; vertical-align: middle"><?= $v['USE_YN'] ?></td>
                            <td style="text-align: center; vertical-align: middle">
                                <a href="<?= admin_url('master/common_code/edit/'.$v['HEAD_CODE'].'_'.$v['CODE']) ?>" class="btn btn-sm"><i class="fas fa-pen text-warning"></i></a>
                                <a onclick="return confirm('Are you sure to delete data?')" href="<?= admin_url('master/common_code/delete/'.$v['HEAD_CODE'].'_'.$v['CODE']) ?>" class="btn btn-sm" title="Hapus"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div> 
    </div>
    
</div>

<script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
<script src="<?= asset('vendor/select2/js/en.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<script>
    $(function () {
      $('#example1').DataTable(
        {"language": {"paginate": { "previous": "&lt","next": "&gt",}}}
      );

      $('.headcode_data').on('click', function() {
        $('.headcode_data').removeClass('active-row');
        $(this).addClass('active-row');

        var headCode = $(this).data('headcode');
        $("#input-headcode").val(headCode);
        $("#form-headcode").submit();
      })
    })
</script>