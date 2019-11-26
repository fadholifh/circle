<?php
function ptop() {  settzone(); ?>
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="shortcut icon" href="images/icons.png">

            <title>The Circle</title>


            <!-- Bootstrap core CSS -->
            <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
            <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

            <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="../../assets/js/html5shiv.js"></script>
              <script src="../../assets/js/respond.min.js"></script>
            <![endif]-->
            <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
            <link rel="stylesheet" type="text/css" href="js/bootstrap.wysihtml5/dist/bootstrap3-wysihtml5.min.css">
            <link rel="stylesheet" type="text/css" href="js/bootstrap.summernote/dist/summernote.css" />
            <link rel="stylesheet" type="text/css" href="js/jasny.bootstrap/extend/css/jasny-bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="js/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
            <link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.min.css" />
            <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
            <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
            <link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
            <link rel="stylesheet" type="text/css" href="js/jquery.icheck/skins/flat/green.css">
            <link rel="stylesheet" type="text/css" href="js/bootstrap.daterangepicker/daterangepicker-bs3.css" />
            <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />


            <link href="css/style.css" rel="stylesheet" />
            <style>
            .status-available{color:#2FC332;}
            .status-not-available{color:#D60202;}
            </style>

        </head>
        <body class="animated">

            <div id="cl-wrapper">

                <div class="cl-sidebar">
                    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
                    <div class="cl-navblock">
                        <div class="menu-space">
                            <div class="content">
                                <div class="sidebar-logo">
                                    <div class="logo">
                                        <a href="#"></a>
                                    </div>
                                </div>
                                <ul class="cl-vnavigation">
                                    <li class="active"><a href="admin.php"><i class="fa fa-home"></i><span>Dashboard</span></a>
                                    </li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>Forum</span></a>
                                                <ul class="sub-menu">
                                                    <li><a href="admin.php?mod=forum&act=i"><span class="pull-right"></span>Tambah Forum</a></li>
                                                    <li><a href="admin.php?mod=forum&act=t"><span class="pull-right"></span>Tampil Forum</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="fa fa-sitemap"></i><span>Lowker</span></a>
                                                <ul class="sub-menu">
                                                    <li><a href="admin.php?mod=lowker&act=i"><span class="pull-right"></span>Tambah Lowker</a></li>
                                                    <li><a href="admin.php?mod=lowker&act=t"><span class="pull-right"></span>Tampil Lowker</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="fa fa-pencil-square-o"></i><span>Postingan</span></a>
                                                <ul class="sub-menu">
                                                    <li  ><a href="admin.php?mod=post&act=i"><span class="pull-right"></span>Tambah Postingan</a></li>
                                                    <li  ><a href="admin.php?mod=post&act=t"><span class="pull-right"></span>Tampil Postingan</a></li>
                                                </ul>
                                            </li>
                                        </li>
                                        <li><a href="#"><i class="fa fa-comment-o nav-icon"></i><span>Komentar</span></a>
                                            <ul class="sub-menu">
                                                <li  ><a href="admin.php?mod=komentar&act=t"><span class="pull-right"></span>Tampil Komentar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-bell-o nav-icon"></i><span>Notifikasi</span></a>
                                            <ul class="sub-menu">
                                                <li  ><a href="admin.php?mod=notifikasi&act=t"><span class="pull-right"></span>Tampil Notifikasi</a></li>
                                            </ul>
                                        </li>
                                        <li  ><a href="#"><i class="fa fa-envelope nav-icon"></i><span>Pesan</span></a>
                                            <ul class="sub-menu">
                                                <li  ><a href="admin.php?mod=pesan&act=t"><span class="pull-right"></span>Tampil Pesan</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-tags nav-icon"></i><span>Tag</span></a>
                                            <ul class="sub-menu">
                                                <li  ><a href="admin.php?mod=tag&act=i"><span class="pull-right"></span>Tambah Tag</a></li>
                                                <li  ><a href="admin.php?mod=tag&act=t"><span class="pull-right"></span>Tampil Tag</a></li>
                                            </ul>
                                        </li>
                                        <li  ><a href="#"><i class="fa fa-user nav-icon"></i><span>User</span></a>
                                            <ul class="sub-menu">
                                                <li  ><a href="admin.php?mod=user&act=i"><span class="pull-right"></span>Tambah User</a></li>
                                                <li  ><a href="admin.php?mod=user&act=t"><span class="pull-right"></span>Tampil User</a></li>
                                                <li  ><a href="admin.php?mod=user_group&act=t"><i class="fa fa-users nav-icon"></i><span>User Group</span></a></li>
                                            </ul>
                                        </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-right collapse-button" style="padding:7px 9px;">
                            <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="pcont">
                    <!-- TOP NAVBAR -->

                    <div id="head-nav" class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-collapse">
                                <ul class="nav navbar-nav navbar-right user-nav">
                                    <li class="dropdown profile_menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Profile</span> <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="../index.html" target="_blank">Frontend</a></li>
                                            <li><a href="admin.php?mod=profile">My Profile</a></li>
                                            <li class="divider"></li>
                                            <li><a href="logout.php">Sign Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!--/.nav-collapse animate-collapse -->
                        </div>
                    </div>
                    <!-- CONTEN -->
                <?php } ?>

<?php

function pbottom() { ?>
                    <!-- /CONTEN -->
                    <!-- footer -->
                    <script src="js/jquery.js"></script>
                    <script src="js/jquery.cookie/jquery.cookie.js"></script>
                    <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
                    <script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
                    <script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
                    <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
                    <script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
                    <script type="text/javascript" src="js/behaviour/core.js"></script>
                    <script type="text/javascript" src="js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
                    <script type="text/javascript" src="js/bootstrap.daterangepicker/moment.min.js"></script>
                    <script type="text/javascript" src="js/bootstrap.daterangepicker/daterangepicker.js"></script>
                    <script type="text/javascript" src="js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
                    <script type="text/javascript" src="js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
                    <script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.js"></script>
                    <script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
                    <script type="text/javascript" src="js/jquery.select2/select2.min.js" ></script>
                    <script type="text/javascript" src="js/bootstrap.slider/js/bootstrap-slider.js" ></script>
                    <script type="text/javascript" src="js/jquery.icheck/icheck.min.js"></script>
                    <script src="js/ckeditor/adapters/jquery.js"></script>
                    <script src="js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
                    <script type="text/javascript" src="js/bootstrap.summernote/dist/summernote.min.js"></script>
                    <script type="text/javascript" src="js/bootstrap.wysihtml5/dist/bootstrap3-wysihtml5.all.min.js"></script>
                    <script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
                    <script type="text/javascript" src="js/jquery.jeditable/jquery.jeditable.mini.js"></script>
                    <script type="text/javascript" src="js/jquery.datatables/jquery.datatables.min.js"></script>
                    <script type="text/javascript" src="js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
					<script src="js/jquery.niftymodals/js/jquery.modalEffects.js"></script>

                    <script type="text/javascript">
                    $(document).ready(function(){
                      $("#pilih").change(function () {
                         if($("#pilih").val()=='1'){
                           $("#loker").show(100);
                    		 } else {
                    		     $("#loker").hide(100);
                         }
                       });
                    });
                    $(document).ready(function(){
                      $('form').parsley();
                    });
                    $(document).ready(function(){
                      //initialize the javascript
                      $("[data-mask='nim']").mask("99.99.9999");
                    });
                        $(document).ready(function(){
                            //initialize the javascript
                            // $('textarea.ckeditor').ckeditor();
                            // CKEDITOR.disableAutoInline = true;
                            // $(".inline-editable").each(function(){
                            //     CKEDITOR.inline($(this)[0]);
                            // });

                            $('#some-textarea').wysihtml5();

                            $('#summernote').summernote({
                                onImageUpload: function(file, editor, editable){
                                    uploadMedia(file[0], editor, editable);
                                }
                            });

                            // function upload images to media
                            function uploadMedia(file, editor, editable){
                                data = new FormData();
                                data.append("image", file);
                                $.ajax({
                                    url: 'apps/media/media_i.php',
                                    data: data,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    type: 'POST',
                                    success: function(data){
                                        editor.insertImage(editable, data);
                                        console.log(data);
                                    }
                                })
                            }
                        });
                        $(document).ready(function(){
                            /*Date Range Picker*/
                            $('#reservation').daterangepicker();
                            $('#reservationtime').daterangepicker({
                                timePicker: true,
                                timePickerIncrement: 30,
                                format: 'MM/DD/YYYY h:mm A'
                            });
                            var cb = function(start, end) {
                                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                                alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + "]");
                            }

                            var optionSet1 = {
                                startDate: moment().subtract('days', 29),
                                endDate: moment(),
                                minDate: '01/01/2012',
                                maxDate: '12/31/2014',
                                dateLimit: { days: 60 },
                                showDropdowns: true,
                                showWeekNumbers: true,
                                timePicker: false,
                                timePickerIncrement: 1,
                                timePicker12Hour: true,
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                                },
                                opens: 'left',
                                buttonClasses: ['btn btn-default'],
                                applyClass: 'btn-small btn-primary',
                                cancelClass: 'btn-small',
                                format: 'MM/DD/YYYY',
                                separator: ' to ',
                                locale: {
                                    applyLabel: 'Submit',
                                    cancelLabel: 'Clear',
                                    fromLabel: 'From',
                                    toLabel: 'To',
                                    customRangeLabel: 'Custom',
                                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                    firstDay: 1
                                }
                            };

                            var optionSet2 = {
                                startDate: moment().subtract('days', 7),
                                endDate: moment(),
                                opens: 'left',
                                ranges: {
                                    'Today': [moment(), moment()],
                                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                                }
                            };

                            $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                            $('#reportrange').daterangepicker(optionSet1, cb);

                            $('#reportrange').on('show', function() { console.log("show event fired"); });
                            $('#reportrange').on('hide', function() { console.log("hide event fired"); });
                            $('#reportrange').on('apply', function(ev, picker) {
                                alert("mama mia");
                                console.log("apply event fired, start/end dates are "
                                    + picker.startDate.format('MMMM D, YYYY')
                                    + " to "
                                    + picker.endDate.format('MMMM D, YYYY')
                            );
                            });
                            $('#reportrange').on('cancel', function(ev, picker) { console.log("cancel event fired"); });
                            /*Switch*/
                            $('.switch').bootstrapSwitch();
                            /*DateTime Picker*/
                            $(".datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
                            $("#datetime1").datetimepicker({format: 'yyyy-mm-dd'});

                            /*Select2*/
                            $(".select2").select2({
                                width: '100%'
                            });

                            /*Tags*/
                            $(".tags").select2({tags: 0,width: '100%'});

                            /*Slider*/
                            $('.bslider').slider();

                            /*Input & Radio Buttons*/
                            $('.icheck').iCheck({
                                checkboxClass: 'icheckbox_flat-green',
                                radioClass: 'iradio_flat-green'
                            });
                            /*spinners*/
                            $("input[name='cleaninit']").TouchSpin();
                            $("input[name='demo1']").TouchSpin({
                                min: 0,
                                max: 100,
                                step: 0.1,
                                decimals: 2,
                                boostat: 5,
                                maxboostedstep: 10,
                                postfix: '%'
                            });
                            $("input[name='demo2']").TouchSpin({
                                min: -1000000000,
                                max: 1000000000,
                                stepinterval: 50,
                                maxboostedstep: 10000000,
                                prefix: '$'
                            });
                            $("input[name='demo4']").TouchSpin({
                                postfix: "a button",
                                postfix_extraclass: "btn btn-default"
                            });
                            /*End of spinners*/
                            /*Color Picker*/
                            $('.demo1').colorpicker({
                                format: 'hex', // force this format
                            });
                            $('.demo2').colorpicker({
                                format: 'hex', // force this format
                            });
                            $('.demo-auto').colorpicker();
                            // Disabled / enabled triggers
                            $(".disable-button").click(function(e) {
                                e.preventDefault();
                                $("#demo_endis").colorpicker('disable');
                            });

                            $(".enable-button").click(function(e) {
                                e.preventDefault();
                                $("#demo_endis").colorpicker('enable');
                            });

                            /*End of Color Picker*/
                        });
                        /*Add dataTable Functions
                        var functions = $('<div class="btn-group"><button class="btn btn-default btn-xs" type="button">Actions</button><button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul role="menu" class="dropdown-menu"><li><a href="#">Edit</a></li><li><a href="#">Copy</a></li><li><a href="#">Details</a></li><li class="divider"></li><li><a href="#">Remove</a></li></ul></div>');
                        $("#datatable tbody tr td:last-child").each(function(){
                          $(this).html("");
                          functions.clone().appendTo(this);
                        });
                         */
                        $(document).ready(function(){
                            //initialize the javascript
                            //Basic Instance
                            $("#datatable").dataTable();

                            //Search input style
                            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
                            $('.dataTables_length select').addClass('form-control');

                            /* Formating function for row details */
                            function fnFormatDetails ( oTable, nTr )
                            {
                                var aData = oTable.fnGetData( nTr );
                                var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                                sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
                                sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
                                sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
                                sOut += '</table>';

                                return sOut;
                            }

                            /*
                             * Insert a 'details' column to the table
                             */
                            var nCloneTh = document.createElement( 'th' );
                            var nCloneTd = document.createElement( 'td' );
                            nCloneTd.innerHTML = '<img class="toggle-details" src="images/plus.png" />';
                            nCloneTd.className = "center";

                            $('#datatable2 thead tr').each( function () {
                                this.insertBefore( nCloneTh, this.childNodes[0] );
                            } );

                            $('#datatable2 tbody tr').each( function () {
                                this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
                            } );

                            /*
                             * Initialse DataTables, with no sorting on the 'details' column
                             */
                            var oTable = $('#datatable2').dataTable( {
                                "aoColumnDefs": [
                                    { "bSortable": false, "aTargets": [ 0 ] }
                                ],
                                "aaSorting": [[1, 'asc']]
                            });

                            /* Add event listener for opening and closing details
                             * Note that the indicator for showing which row is open is not controlled by DataTables,
                             * rather it is done here
                             */
                            $('#datatable2').delegate('tbody td img','click', function () {
                                var nTr = $(this).parents('tr')[0];
                                if ( oTable.fnIsOpen(nTr) )
                                {
                                    /* This row is already open - close it */
                                    this.src = "images/plus.png";
                                    oTable.fnClose( nTr );
                                }
                                else
                                {
                                    /* Open this row */
                                    this.src = "images/minus.png";
                                    oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
                                }
                            });

                            $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
                            $('.dataTables_length select').addClass('form-control');

                            /* Init DataTables */
                            var aTable = $('#datatable3').dataTable();

                            /* Apply the jEditable handlers to the table */
                            aTable.$('td').editable( 'js/jquery.datatables/examples/examples_support/editable_ajax.html', {
                                "callback": function( sValue, y ) {
                                    var aPos = aTable.fnGetPosition( this );
                                    aTable.fnUpdate( sValue, aPos[0], aPos[1] );
                                },
                                "submitdata": function ( value, settings ) {
                                    return {
                                        "row_id": this.parentNode.getAttribute('id'),
                                        "column": aTable.fnGetPosition( this )[2]
                                    };
                                },
                                "height": "14px",
                            });
                        });
                    </script>

                    <!-- Bootstrap core JavaScript
                    ================================================== -->
                    <!-- Placed at the end of the document so the pages load faster -->
                    <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
                    <script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
                    <script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
                    <script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
                    <script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
                    </body>

                    </html>
                    <!-- /FOOTER -->
<?php } ?>
