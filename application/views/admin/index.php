<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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
        td {
            display: block;
            flex-direction: row !important;
        }
        .d-flex {
            display: flex !important;
            flex-direction: column !important;
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
      color: #000 !important;
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
    #map{
        border: 2px solid #fff;
    }
    .information-box {
        background: #fff;
        padding: 20px;
        margin: 20px 0px;
        border-radius: 10px;
        border: 2px solid red;
        height: auto;
    }

    .information-box hr {
        margin: 5px 0px;
        height: 2px;
        color: red;
    }
    .information-box ul li {
        padding-top: 10px;
        margin-left: 20px;
        border-bottom : 1px solid #000;
        padding-bottom: 10px
    }
    .information-box ul li:last-child {
        border-bottom: none;
    }
    .information-box svg {
        font-size: 22px !important; 
        margin-top: -7px
    }
    .btn-order {
        border: 2px solid #000;
        border-radius: 8px;
        padding: 10px 50px;
        color: #000;
    }
    .btn-order:hover {
        background: #000;
        color: #fff
    }
    h1 {
        font-family: cjFont; 
        margin-bottom: 0px; 
        text-align: center; 
        line-height: 50px; 
        font-weight: 700; 
        color: #000; 
        letter-spacing: 1px; 
        margin-bottom: 40px
    }
    @media (max-width: 600px) {
        .information-box ul li {
            padding-bottom: 30px
        }
        .information-box svg {
            margin-top: 10px
        }
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
		font-style: italic;
	}

	.qna {
		margin-bottom: 20px;
	}

	.qna label {
		font-weight: 500 !important;
	}

	.answer {
		margin-top: 10px;
	}

	input {
		display: inline-block;
		vertical-align: middle;
		margin-top: 2px !important;
		margin-right: 8px !important;
	}

	.question {
		font-size: 17px;
		font-weight: 600;
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
		border-radius: 10px;
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
		margin-bottom: 20px;
	}

	.divi-delayed-button-2:hover {
		background: #58a9ff;
	}

	.content-task {
		border-top: 1px solid #000;
		border-bottom: 1px solid #000;
		margin-bottom: 20px;
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

	@media (max-width: 600px) {
		.answer {
			margin-left: 0px;
		}

		input {
			margin-right: 10px !important;
		}

		[type="checkbox"],
		[type="radio"] {
			width: 30px !important;
		}

		.question {
			line-height: 25px;
			font-size: 18px;
		}
	}
</style>

<style>
	table.dataTable th {
		position: relative;
		text-align: center;
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

	table.dataTable thead > tr > th.sorting_asc,
	table.dataTable thead > tr > th.sorting_desc,
	table.dataTable thead > tr > th.sorting,
	table.dataTable thead > tr > td.sorting_asc,
	table.dataTable thead > tr > td.sorting_desc,
	table.dataTable thead > tr > td.sorting {
		padding: 10px 20px;
	}

	.table > tbody > tr > td,
	.table > tbody > tr > th,
	.table > tfoot > tr > td,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > thead > tr > th {
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
		border: 0px solid transparent;
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
		padding: 0px;
	}

	.date-range {
		background-color: #000;
		color: #fff;
		text-align: center;
		width: 100%;
		padding: 8px 16px;
		border-radius: 0px 0px 10px 10px;
		border: 2px solid #000;
		font-weight: 600;
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
		padding-top: 5px;
	}

	table.table-bordered.dataTable th {
		font-size: 9px !important;
        text-transform: uppercase !important;
	}

	table.table-bordered.dataTable td {
		font-size: 8px !important;
        text-transform: uppercase !important;
	}

	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:after {
		bottom: 10px !important;
	}

	select.input-sm {
		height: 30px;
		line-height: 20px;
		margin: 0px 5px;
	}

	div.dataTables_wrapper div.dataTables_length select {
		width: 50px;
	}
	div.dataTables_wrapper div.dataTables_info {
		padding-top: 8px;
		white-space: nowrap;
		font-size: 10px !important;
	}
	.pagination > .disabled > a,
	.pagination > .disabled > a:focus,
	.pagination > .disabled > a:hover,
	.pagination > .disabled > span,
	.pagination > .disabled > span:focus,
	.pagination > .disabled > span:hover {
		font-size: 11px;
	}
	.pagination > .active > a,
	.pagination > .active > a:focus,
	.pagination > .active > a:hover,
	.pagination > .active > span,
	.pagination > .active > span:focus,
	.pagination > .active > span:hover {
		font-size: 11px;
	}
	div.dataTables_wrapper div.dataTables_length label {
		font-size: 11px;
	}
	td {
		height: auto;
		padding: 12px !important;
	}
	div.dataTables_wrapper div.dataTables_filter label {
		font-weight: normal;
		white-space: nowrap;
		text-align: left;
		font-size: 11px;
		display: inline-block;
		vertical-align: middle;
	}
	.pagination > li > a,
	.pagination > li > span {
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
	
	.table-w-message {
		width: 100%;
	}
	.maps-frame {
        border:2px solid #C1C1C1; 
        border-radius: 10px;
        width: 100%;
        height: 100px;
    }
	.dot {
		display: none;
	}
	td {
		text-align: center;
        text-transform: uppercase;
	}
	input, select {
		width: 65%;
		margin-left: 8px
	}
	span.label-span {
		width: 48%
	}
    h4 {
        text-align: left;
        padding-bottom: 10px;
        border-bottom: 2px solid #000;
        width: 100%;
        font-weight: 700
    }
    .btn-show-detail {
		width: 100%;
        color: #fff;
        background: #36e809;
        padding: 7px 10px;
        border: 2px solid #fff;
        border-radius: 8px
	}
    ul.message-warning {
        padding-left: 25px !important;
    }
    ul.message-warning li {
        margin: 5px 0px 0px 0px;
    }
	@media (max-width: 600px) {
		.table-responsive-new {
			width: 100%;
			overflow: auto;
		}
		.filter-style {
			flex-direction: column;
			align-content: flex-start;
			justify-content: center;
			align-items: flex-start;
		}
		.dot {
			display: block;
		}
		.filter-style .label-span {
			margin-bottom: 5px
		}
		.btn-filter {
			margin: 10px 0px
		}
		.table-container {
			width: 100%;
			overflow-x: auto;
			position: relative; /* Agar sticky header berfungsi */
		}

		input, select {
			width: 100%;
			margin-left: 0px
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		table thead {
            display: none;
        }
        table, table tbody, table tr, table td {
            display: flex;
            flex-direction: column;
            width: 100%;
        } 
		tr {
			padding: 15px;
			border-radius: 10px;
			margin: 10px 0px !important;
			background: #f5f5f5;
		}
        th, td {
            font-size: 12px !important;
            text-align: left !important;
			width: auto !important;
        }
		td {
            padding: 10px 12px !important;
            border: 2px solid #ffffff !important;
            border-bottom: 0px;
            text-transform: uppercase;
        }
        table tbody tr td {
            text-align: center;
            padding-left: 50%;
            position: relative;
            white-space: normal !important;
            font-size: 13px !important;
        }

		table td:before {
            content: attr(data-label);
            width: 35%;
            font-weight: 600;
            font-size: 13px;
            text-align: left;
            text-transform: uppercase;
			margin-right: 15px;
            margin-bottom: 5px
        }

		table.table-bordered.dataTable td {
			font-size: 13px !important;
			display: flex;
			flex-direction: row;
			align-items: center;
		}

		thead th {
			position: sticky;
			top: 0;
			background-color: white;
			z-index: 10; /* Z-index untuk header */
			box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4); /* Beri sedikit bayangan untuk efek header tetap */
		}

		thead th.fixed-column {
			position: sticky !important;
			top: 0;
			left: 0;
			z-index: 11; /* Lebih tinggi agar tetap di atas ketika di-scroll */
			background-color: white;
			box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan horizontal untuk kolom tetap */
		}

		tbody td.fixed-column {
			position: sticky;
			left: 0;
			background-color: white;
			z-index: 1; /* Lebih rendah dari header */
			box-shadow: 2px 0 2px -1px rgba(0, 0, 0, 0.4); /* Efek bayangan pada kolom */
		}
		.table-bordered {
			border: 0px solid #C1C1C1;
			font-size: 12px;
		}
		.table-responsive {
			border: 0px solid #ddd;
		}
		.btn-show-detail {
			width: 100%;
			font-size: 15px;
		}
		.btn-show-detail svg {
			font-size: 25px
		}
		table td:last-child:before {
			width: 0%;
		}
		.dataTables_length {
			display: none;
		}
		div.dataTables_wrapper div.dataTables_filter label {
			font-size: 14px !important;
			text-transform: uppercase;
		}
		div.dataTables_wrapper div.dataTables_filter input {
			font-size: 16px;
		}
        h1 {
            font-size: 25px;
            line-height: 40px;
            margin: 0px !important;
        }
        .page-wrapper .main-content {
            margin-top: 70px;
        }
        
	}

    /* Modal box */
    .modal-wrapper {
        display: none;
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .modal-punya {
      background: white;
      border-radius: 10px;
      padding: 20px;
      width: 90%;
      max-width: 90%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      top: 50%; margin: auto; position: absolute; left: 50%;
      transform: translate(-50%, -50%);
      animation: fadeIn 0.3s ease;
      max-height: 100vh;
      overflow: auto;
    }

    /* Close button */
    .modal-punya .close-btn {
        position: absolute;
        top: 0px;
        right: 15px;
        font-size: 40px;
        color: #888;
        cursor: pointer;
    }

    .modal-td {
        padding: 5px !important;
        margin: 0px !important;
    }
    .cust-btn-save {
        width: 50%;
        font-size: 14px
    }
    .cust-btn-danger {
        width: 50%
    }
    .cust-btn-save:hover {
        background: transparent;
        color: #3c8dbc;
        font-weight: 700;
    }

    .cust-btn-danger:hover {
        background: transparent;
        color: #dd4b39;
        font-weight: 700;
    }
    span.important {
        color: red;
        font-size: 14px
    }
    .tabs {
      display: flex;
      border-bottom: 2px solid #000;
      width: 100%;
      margin-bottom: 20px
    }

    .tab {
      padding: 10px 20px;
      cursor: pointer;
      border: none;
      background-color: #f1f1f1;
      border-radius: 15px 15px 0 0;
      transition: background-color 0.3s;
      
    }

    .tab.active {
      border-radius: 15px 15px 0 0;
      background-color: #ffffff;
      border: 2px solid #000;
      border-bottom: 0px solid transparent;
      font-weight: bold;
    }

    .tab-content {
      display: none;
      /* padding: 20px;
      border: 1px solid #ccc; */
      width: 100%;
      border-top: none;
    }

    .tab-content.active {
      display: block;
    }
    .approved {
        color: white;
        background: green;
        border-radius: 8px;
        padding: 5px;
        font-weight: 700
    }
    .rejected {
        color: white;
        background: red;
        border-radius: 8px;
        padding: 10px;
        font-weight: 700
    }
    .waiting-approval {
        color: white;
        background: blue;
        border-radius: 8px;
        padding: 10px;
        font-weight: 700
    }
    input, textarea {
        text-transform: uppercase !important;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
      .modal-punya {
        width: 100%;
        max-width: 100%;
      }
      .modal-punya td {
        display: block !important;
        margin-bottom: 5px
      }
      .modal-punya textarea, .modal-punya input {
        margin-top: 10px !important;
      }
      .modal-punya tr {
        border-radius: 10px;
        margin: 5px 0px !important;
      }
      h4 {
        font-size: 22px;
        font-weight: 700;
        line-height: 30px;
      }
      .cust-btn-save {
        width: 100%
      }
      .cust-btn-danger {
        width: 100%
      }
      .col-lg-12.col-sm-12 {
        flex-direction: column
      }
      .approved {
        color: white;
        background: green;
        border-radius: 8px;
        padding: 10px;
        font-weight: 700;
        margin-top: -15px;
        width: 100%;
        text-align: center;
    }
    }

    @media (max-width: 480px) {
      .modal-punya {
        padding: 15px;
      }
    }
</style>

<div class="main-content" style="min-height: 91.5vh; display: flex; flex-direction: column; align-items: center; justify-content: center">
    <div style="padding: 20px 10px; border-radius: 10px; flex-direction: column; display: flex; align-content: center; justify-content: center; align-items: center;">
        <h1>
            WELCOME, <br> <?= $user['full_name'] ?>
        </h1>
    </div>
</div>

<script src="<?= asset('vendor/select2/js/select2.min.js') ?>"></script>
<script src="<?= asset('vendor/select2/js/en.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>