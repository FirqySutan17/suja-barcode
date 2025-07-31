<style>
    .db-box h4 {
        font-weight: 700;
        font-style: italic;
        color: #fff
    }

  ul.calendar-dashboard {
    display: grid;
    grid-template-columns: repeat(16, 1fr);
    flex-wrap: wrap;
    list-style: none;
  }

  ul.calendar-dashboard li.calendar-item {
    display: flex;
    width: 100%;
    height: 100%;
    flex-flow: column;
    /* border-radius: 0.2rem; */
    font-weight: 300;
    font-size: 0.8rem;
    box-sizing: border-box;
    /* background: rgba(255, 255, 255, 0.25); */
    /* box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37); */
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border-radius: 0px;
    border: 1px solid rgba(255, 255, 255, 0.6);
    grid-column: span 2;
  }

  ul.calendar-dashboard li.calendar-item time {
    font-size: 20px;
    margin: 0 0 1rem 0;
    font-weight: 500;
  }

  ul.calendar-dashboard li.calendar-item.today {
    background: #a12a2f;
    color: #fff !important;
  }

  ul.calendar-dashboard li.calendar-item.today a{
    color: #fff;
  }

  ul.calendar-dashboard .today time {
    font-weight: 800;
  }
  .date-flow{
    display: flex;
    flex-direction: column
  }
  .db-table {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    column-gap: 10px;
  }
  .db-table .db-box {
    grid-column: span 4;
    text-align: center;
    width: 100%;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.5);
    padding: 20px 10px;
    border-radius: 10px;
    margin-bottom: 10px
  }
  .date-item {
    text-align: center;
    font-size: 14px;
    background-color: rgba(255,255,255,0.1);
    color: #fff;
    padding: 5px;
    /* border-radius: 5px; */
    margin-bottom: 0.5px;
    height: 26px;
  }
  .sum-report {
    font-size: 11px;
    color: #000;
    text-align: right;
    width: 100%;
    font-family: "Poppins", sans-serif;
    font-weight: 700;
    padding: 5px;
    background-color: rgba(255,255,255,0.3);
    /* border: 1px solid rgba(255, 255, 255, 0.6); */
    /* margin: 0.5px 0px; */
    /* color: #f00; */
    color": #000;
  }
  .title-box {
    width: 20%
  }
  .date-item.active {
    background: red;
    color: #fff;
  }
  .sum-report.active {
    background: #ff7f7f;
    color: #fff;
  }
  .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 25px;
  }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    height: auto !important;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 5px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>

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
        .db-table .db-box {
          grid-column: span 8
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
        padding: 10px !important;
        font-size: 10px !important;
        background: #edecec !important;
        border: 1.5px solid #fff !important;
    }
    th {
      font-size: 11px !important;
      color: #fff !important;
      border: 1.5px solid #fff !important;
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
        width: 100%;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        font-size: 12px
    }
    .label-span {
        font-size: 12px
    }
    .btn-primary {
        font-size: 12px;
    }
    .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
        line-height: calc(1.9em + .75rem) !important;
    }
</style>


<div class="main-content pre-posttest" style="background: linear-gradient(0deg, rgba(227,27,35,0.9) 30%, rgba(248,151,29,0.9) 100%);">
    <h3 class="card-title" style="color: #fff; border-bottom: 2px solid #fff;">
        <strong>Report Summary</strong>
    </h3>
    <form id="form-filter" action="<?= admin_url('summary-report') ?>" method="GET">
      <div class="row"  style="padding: 0px 10px; border-bottom: 2px solid #fff; padding-bottom: 8px;margin: 0px 0px; margin-bottom: 10px; ">
          <div class="col-md-6 col-sm-12" style="display: flex;">
            <div class="form-group" style="display: flex; width: 100%; margin-bottom: 0px">
              
                <label class="switch">
                    <input type="checkbox" value="IN" id="includeOption" name="incl_internal" <?= $filter['incl_internal'] == 'IN' ? 'checked' : '' ?>>
                    <span class="slider round"></span>
                </label>
                <span style="display: inline-block; vertical-align: middle; margin-top: 3px; margin-left: 10px; color: #fff">INC. INTERNAL</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-12" style="display: flex;">
            <div class="form-group" style="display: flex; width: 100%;  margin-bottom: 0px">
                  <span class="label-span" style="width: 25%; display: inline-block; vertical-align: middle; margin-top: 5px; font-weight: 600; color: #fff">PLANT : </span> 
                  <select id="plant" class="form-control" name="plant" style="width: 75%">
                      <?php foreach ($plant as $field): ?>
                          <option <?= $filter['plant'] == $field['CODE'] ? 'selected' : '' ?> value="<?= $field['CODE'] ?>">
                              <?= $field['CODE'] == '*' ? '* - ALL PLANT' :  $field['CODE'].' - '.$field['CODE_NAME'] ?>
                          </option>
                      <?php endforeach ?>
                  </select>
              </div>
          </div>
      </div>
    </form>
    <div class="db-table">
        <div class="db-box">
        <h4 style="font-family: cjFont; margin-bottom: 0px; text-align: center; margin-bottom: 5px">DAILY COLLECTION</h4>
        <p style="font-weight: 500; color: #fff"><?= convMonth(date('m')).' '.date('Y') ?></p><p style="font-size: 10px; text-align: right; margin-bottom: 10px; margin-top: -25px; letter-spacing: 1px;font-weight: 500; color: #fff">*in million</p>
            <div class="table-responsive">  
            <ul class="calendar-dashboard" style="margin-bottom: 0px !important">
                    <li class="calendar-item" style="border-bottom: none">
                        <p class="date-item" style="background: transparent"></p>
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #e31b23">SUN</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #007dc3">MON</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #007dc3">TUE</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #007dc3">WED</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #007dc3">THU</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px; color: #007dc3">FRI</div> 
                    </li>
                    <li class="calendar-item">
                        <div class="sum-report" style="text-align: center; font-size: 14px;  color: #e31b23">SAT</div> 
                    </li>
                </ul>
                <ul class="calendar-dashboard">
                    <?php $no = 1; foreach ($daily_remainder as $v): ?>
                        <?php if ($no == 1): ?>
                            <li class="calendar-item">
                                <a class="date-flow" href="#">
                                    <p class="date-item" style="background: transparent"></p>
                                    <div class="sum-report" style="text-align: right;">COLL </div> 
                                    <div class="sum-report" style="text-align: right;">OD </div> 
                                    <div class="sum-report" style="text-align: right;">BD </div> 
                                </a>
                            </li>
                        <?php endif ?>
                        <li class="calendar-item">
                            <a class="date-flow" href="#">
                                <p class="date-item <?= $v['ACTIVE'] ?>"><?= $v['DAY'] ?></p>
                                <div class="sum-report  <?= $v['ACTIVE'] ?>"><?= ($v['COLL'] == '' && $v['COLL'] != '0') ? '-' : formatRupiah($v['COLL']) ?></div> 
                                <div class="sum-report  <?= $v['ACTIVE'] ?>"><?= ($v['OD'] == '' && $v['OD'] != '0') ? '-' : formatRupiah($v['OD']) ?></div> 
                                <div class="sum-report  <?= $v['ACTIVE'] ?>"><?= ($v['BD'] == '' && $v['BD'] != '0') ? '-' : formatRupiah($v['BD']) ?></div> 
                            </a>
                        </li>
                        <?php $no = $no == 7 ? 0 : $no; ?>
                    <?php $no++; endforeach ?>
                </ul>
            </div>
        </div>
        <div class="db-box" style="box-shadow: none; padding: 0px">
            <div style="padding: 20px 10px; border-radius: 10px; margin-bottom: 20px">
            <h4 style="font-family: cjFont; margin-bottom: 0px; text-align: center; margin-bottom: 5px;">MONTHLY COLLECTION</h4>
            <p style="font-weight: 500; color: #fff"><?= date('Y') ?></p><p style="font-size: 10px; text-align: right; margin-bottom: 10px; margin-top: -25px; letter-spacing: 1px; font-weight: 500; color: #fff">*in million</p>
                <ul class="calendar-dashboard" style="grid-template-columns: repeat(8, 1fr);">
                        <?php $no = 1; foreach ($monthly_remainder as $v): ?>
                            <?php if ($no == 1): ?>
                                <li class="calendar-item">
                                    <a class="date-flow" href="#">
                                        <p class="date-item" style="background: transparent"></p>
                                        <div class="sum-report" style="text-align: right;">COLL </div> 
                                        <div class="sum-report" style="text-align: right;">OD </div> 
                                        <div class="sum-report" style="text-align: right;">BD </div> 
                                    </a>
                                </li>
                            <?php endif ?>
                            <li class="calendar-item">
                                <a class="date-flow" href="#">
                                    <p class="date-item <?= $v['ACTIVE'] ?>"><?= $v['MN'] ?></p>
                                    <div class="sum-report <?= $v['ACTIVE'] ?>"><?= formatRupiah($v['COLL']) ?></div> 
                                    <div class="sum-report <?= $v['ACTIVE'] ?>"><?= formatRupiah($v['OD']) ?></div> 
                                    <div class="sum-report <?= $v['ACTIVE'] ?>"><?= formatRupiah($v['BD']) ?></div> 
                                </a>
                            </li>
                            <?php $no = $no == 3 ? 0 : $no; ?>
                        <?php $no++; endforeach ?>
                </ul>
            </div>            
        </div>
    </div>
        
</div>
<script type="text/javascript">
    $('#plant').select2({
        theme: 'bootstrap4',
        language: "en",
        placeholder: "- PILIH PLANT -",
    }).on('change', function() {
        $("#form-filter").submit();
    });
    $("#includeOption").on('change', function() {
        console.log('change');
        $("#form-filter").submit();
    });
</script>