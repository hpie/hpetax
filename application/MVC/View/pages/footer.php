<!-- footer content -->
<footer>
    <div class="pull-right">
        <h4>Designe by <a href="http://www.codexives.com">Codexives.com</a></h4>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<div id="ApprovedstatusModal" class="modal main_popup fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close press_no" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                <h4 class="modal-title" id="myModalLabel" style="">Confirmation!</h4>
            </div>
            <div class="modal-body">
                <p style="">Are you sure you want to <strong id="modelboxstatus" style="color: #0c97fe;">Approved?</strong></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #0c97fe;"> <button type="button" class="btn btn-default press_no" data-dismiss="modal">No</button> <button type="button" class="btn btn-primary press_yes" data-id="0" data-value="none">Yes</button> </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?php echo BASE_URL ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/icheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL ?>assets/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo BASE_URL ?>assets/nprogress/nprogress.js"></script>

<!-- DateJS -->
<script src="<?php echo BASE_URL ?>assets/moment/min/moment.min.js"></script>
<!-- PNotify -->
<script src="<?php echo BASE_URL ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyadmin.js"></script>    
<!-- bootstrap-wysiwyg -->
<script src="<?php echo BASE_URL ?>assets/editor/jquery.hotkeys.js"></script>
<script src="<?php echo BASE_URL ?>assets/editor/prettify.js"></script>
<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<!--Slider--> 

<!-- ECharts -->
<script src="<?php echo BASE_URL ?>assets/echarts/dist/echarts.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/echarts/map/js/world.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo BASE_URL ?>assets/build/js/custom.min.js"></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>    
    $(document).ready(function () {
        if (<?php if (isset($_SESSION['Error'])) { echo $_SESSION['Error']; } ?> == 1) {
            var d = new PNotify({
                title: 'Please try again you are not change any data',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['Error'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['existrecord1'])) { echo $_SESSION['existrecord1']; } ?> == 1) {
            var d = new PNotify({
                title: 'This Name is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['existrecord1'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['existrecord'])) { echo $_SESSION['existrecord']; } ?> == 1) {
            var d = new PNotify({
                title: 'This ID is allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['existrecord'] = 0; ?>;
        }
        
        if (<?php if (isset($_SESSION['adddata'])) { echo $_SESSION['adddata']; } ?> == 1) {
            var d = new PNotify({
                title: 'Record added successful',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['adddata'] = 0; ?>;
        }
         if (<?php if (isset($_SESSION['dataupdate'])) { echo $_SESSION['dataupdate']; } ?> == 1) {
            var d = new PNotify({
                title: 'Record updated successful',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['dataupdate'] = 0; ?>;
        }      
        
        if (<?php if (isset($_SESSION['tax_transaction_head_exisit'])) { echo $_SESSION['tax_transaction_head_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction head allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_head_exisit'] = 0; ?>;
        }   
          if (<?php if (isset($_SESSION['tax_transaction_dept_exisit'])) { echo $_SESSION['tax_transaction_dept_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction dept allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_dept_exisit'] = 0; ?>;
        }   
        if (<?php if (isset($_SESSION['tax_transaction_ddo_exisit'])) { echo $_SESSION['tax_transaction_ddo_exisit']; } ?> == 1) {
            var d = new PNotify({
                title: 'This transaction ddo allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_transaction_ddo_exisit'] = 0; ?>;
        }  
         if (<?php if (isset($_SESSION['tax_type_name_exist'])) { echo $_SESSION['tax_type_name_exist']; } ?> == 1) {
            var d = new PNotify({
                title: 'This tax type name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_type_name_exist'] = 0; ?>;
        }
           if (<?php if (isset($_SESSION['tax_commodity_name'])) { echo $_SESSION['tax_commodity_name']; } ?> == 1) {
            var d = new PNotify({
                title: 'This tax commodity name allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php echo $_SESSION['tax_commodity_name'] = 0; ?>;
        }
    });
</script>
<script>
    $(document).ready(function () {     
        $(".myTable").DataTable({
            dom: "Bfrtip",
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm"
                },
                {
                    extend: "csv",
                    className: "btn-sm"
                },
                {
                    extend: "excel",
                    className: "btn-sm"
                },
                {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                },
                {
                    extend: "print",
                    className: "btn-sm"
                },
            ],
            "ordering": false,
            "pageLength": 20,
            "orderable": false,
            "bLengthChange": false,
            "paging": true,
            "info": false,
            "bFilter": true,
            "bSort": false,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });
       
        $('.single_cal1').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_1",
            maxDate: new Date(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>
<script>
 <?php if($TITLE=='Tax Transaction Reports'){ ?>
     
function init_echarts() {
    if ("undefined" != typeof echarts) {
        console.log("init_echarts");
        var a = {
            color: ["#26B99A","#BDC3C7","#f71100", "#3498DB", "#9B59B6", "#8abb6f", "#759c6a", "#bfd3b7"],
            title: {
                itemGap: 8,
                textStyle: {
                    fontWeight: "normal",
                    color: "#408829"
                }
            },
            dataRange: {
                color: ["#1f610a", "#97b58d"]
            },
            toolbox: {
                color: ["#408829", "#408829", "#408829", "#408829"]
            },
            tooltip: {
                backgroundColor: "rgba(0,0,0,0.5)",
                axisPointer: {
                    type: "line",
                    lineStyle: {
                        color: "#408829",
                        type: "dashed"
                    },
                    crossStyle: {
                        color: "#408829"
                    },
                    shadowStyle: {
                        color: "rgba(200,200,200,0.3)"
                    }
                }
            },
            dataZoom: {
                dataBackgroundColor: "#eee",
                fillerColor: "rgba(64,136,41,0.2)",
                handleColor: "#408829"
            },
            grid: {
                borderWidth: 0
            },
            categoryAxis: {
                axisLine: {
                    lineStyle: {
                        color: "#408829"
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ["#eee"]
                    }
                }
            },
            valueAxis: {
                axisLine: {
                    lineStyle: {
                        color: "#408829"
                    }
                },
                splitArea: {
                    show: !0,
                    areaStyle: {
                        color: ["rgba(250,250,250,0.1)", "rgba(200,200,200,0.1)"]
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ["#eee"]
                    }
                }
            },
            timeline: {
                lineStyle: {
                    color: "#408829"
                },
                controlStyle: {
                    normal: {
                        color: "#408829"
                    },
                    emphasis: {
                        color: "#408829"
                    }
                }
            },
            k: {
                itemStyle: {
                    normal: {
                        color: "#68a54a",
                        color0: "#a9cba2",
                        lineStyle: {
                            width: 1,
                            color: "#408829",
                            color0: "#86b379"
                        }
                    }
                }
            },
            map: {
                itemStyle: {
                    normal: {
                        areaStyle: {
                            color: "#ddd"
                        },
                        label: {
                            textStyle: {
                                color: "#c12e34"
                            }
                        }
                    },
                    emphasis: {
                        areaStyle: {
                            color: "#99d2dd"
                        },
                        label: {
                            textStyle: {
                                color: "#c12e34"
                            }
                        }
                    }
                }
            },
            force: {
                itemStyle: {
                    normal: {
                        linkStyle: {
                            strokeColor: "#408829"
                        }
                    }
                }
            },
            chord: {
                padding: 4,
                itemStyle: {
                    normal: {
                        lineStyle: {
                            width: 1,
                            color: "rgba(128, 128, 128, 0.5)"
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: "rgba(128, 128, 128, 0.5)"
                            }
                        }
                    },
                    emphasis: {
                        lineStyle: {
                            width: 1,
                            color: "rgba(128, 128, 128, 0.5)"
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: "rgba(128, 128, 128, 0.5)"
                            }
                        }
                    }
                }
            },
            gauge: {
                startAngle: 225,
                endAngle: -45,
                axisLine: {
                    show: !0,
                    lineStyle: {
                        color: [
                            [.2, "#86b379"],
                            [.8, "#68a54a"],
                            [1, "#408829"]
                        ],
                        width: 8
                    }
                },
                axisTick: {
                    splitNumber: 10,
                    length: 12,
                    lineStyle: {
                        color: "auto"
                    }
                },
                axisLabel: {
                    textStyle: {
                        color: "auto"
                    }
                },
                splitLine: {
                    length: 18,
                    lineStyle: {
                        color: "auto"
                    }
                },
                pointer: {
                    length: "90%",
                    color: "auto"
                },
                title: {
                    textStyle: {
                        color: "#333"
                    }
                },
                detail: {
                    textStyle: {
                        color: "auto"
                    }
                }
            },
            textStyle: {
                fontFamily: "Arial, Verdana, sans-serif"
            }
        };
        if ($("#mainb").length) {
            var b = echarts.init(document.getElementById("mainb"), a);
            b.setOption({
                title: {
                    text: "Graph title",
                    subtext: "Graph Sub-text"
                },
                tooltip: {
                    trigger: "axis"
                },
                legend: {
                    data: ["sales", "purchases"]
                },
                toolbox: {
                    show: !1
                },
                calculable: !1,
                xAxis: [{
                    type: "category",
                    data: ["1?", "2?", "3?", "4?", "5?", "6?", "7?", "8?", "9?", "10?", "11?", "12?"]
                }],
                yAxis: [{
                    type: "value"
                }],
                series: [{
                    name: "sales",
                    type: "bar",
                    data: [2, 4.9, 7, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20, 6.4, 3.3],
                    markPoint: {
                        data: [{
                            type: "max",
                            name: "???"
                        }, {
                            type: "min",
                            name: "???"
                        }]
                    },
                    markLine: {
                        data: [{
                            type: "average",
                            name: "???"
                        }]
                    }
                }, {
                    name: "purchases",
                    type: "bar",
                    data: [2.6, 5.9, 9, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6, 2.3],
                    markPoint: {
                        data: [{
                            name: "sales",
                            value: 182.2,
                            xAxis: 7,
                            yAxis: 183
                        }, {
                            name: "purchases",
                            value: 2.3,
                            xAxis: 11,
                            yAxis: 3
                        }]
                    },
                    markLine: {
                        data: [{
                            type: "average",
                            name: "???"
                        }]
                    }
                }]
            })
        }
        if ($("#echart_pie").length) {
            var j = echarts.init(document.getElementById("echart_pie"), a);
            j.setOption({
                tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },                
                legend: {
                    x: "center",
                    y: "bottom",
                    data: ["Success", "Pending", "Failed"]                   
                },                
                toolbox: {
                    show: !0,
                    feature: {
                        magicType: {
                            show: !0,
                            type: ["pie", "funnel"],
                            option: {
                                funnel: {
                                    x: "25%",
                                    width: "50%",
                                    funnelAlign: "left",
                                    max: 1548
                                }
                            }
                        },                       
                        saveAsImage: {
                            show: !0,
                            title: "Save Image"
                        }
                    }
                },
                calculable: !0,
                series: [{
                    name: "Transaction Status",
                    type: "pie",
                    radius: "60%",
                    center: ["50%", "48%"],
                    data: [{
                        value: <?php echo $success; ?>,
                        name: "Success",
                        label: {
                            normal: {
                            formatter: [
                                '<?php echo 'Success Transaction : '.$success; ?>'
                            ].join('\n'),
                            backgroundColor: '#eee',
                            borderColor: '#777',
                            borderWidth: 1,
                            borderRadius: 4                            
                        }
                    }
                    }, {
                         value: <?php echo $pending; ?>,
                        name: "Pending",
                           label: {
                            normal: {
                            formatter: [
                                '<?php echo 'Pendig Transaction : '.$pending; ?>'
                            ].join('\n'),
                            backgroundColor: '#eee',
                            borderColor: '#777',
                            borderWidth: 1,
                            borderRadius: 4                            
                        }
                    }
                    }, {
                        value: <?php echo $failed; ?>,
                        name: "Failed",
                           label: {
                            normal: {
                            formatter: [
                                '<?php echo 'Failed Transaction : '.$failed; ?>'
                            ].join('\n'),
                            backgroundColor: '#eee',
                            borderColor: '#777',
                            borderWidth: 1,
                            borderRadius: 4                            
                        }
                    }
                    }]
                }]
            });
            var k = {
                    normal: {
                        label: {
                            show: !1
                        },
                        labelLine: {
                            show: !1
                        }
                    }
                },
                l = {
                    normal: {
                        color: "rgba(0,0,0,0)",
                        label: {
                            show: !1
                        },
                        labelLine: {
                            show: !1
                        }
                    },
                    emphasis: {
                        color: "rgba(0,0,0,0)"
                    }
                }
        }
        if ($("#echart_line").length) {
            var f = echarts.init(document.getElementById("echart_line"), a);
            f.setOption({
                title: {
                    text: "Line Graph",
                    subtext: "Subtitle"
                },
                tooltip: {
                    trigger: "axis"
                },
                legend: {
                    x: 220,
                    y: 40,
                    data: ["Intent", "Pre-order", "Deal"]
                },
                toolbox: {
                    show: !0,
                    feature: {
                        magicType: {
                            show: !0,
                            title: {
                                line: "Line",
                                bar: "Bar",
                                stack: "Stack",
                                tiled: "Tiled"
                            },
                            type: ["line", "bar", "stack", "tiled"]
                        },
                        restore: {
                            show: !0,
                            title: "Restore"
                        },
                        saveAsImage: {
                            show: !0,
                            title: "Save Image"
                        }
                    }
                },
                calculable: !0,
                xAxis: [{
                    type: "category",
                    boundaryGap: !1,
                    data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]
                }],
                yAxis: [{
                    type: "value"
                }],
                series: [{
                    name: "Deal",
                    type: "line",
                    smooth: !0,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: "default"
                            }
                        }
                    },
                    data: [10, 12, 21, 54, 260, 830, 710]
                }, {
                    name: "Pre-order",
                    type: "line",
                    smooth: !0,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: "default"
                            }
                        }
                    },
                    data: [30, 182, 434, 791, 390, 30, 10]
                }, {
                    name: "Intent",
                    type: "line",
                    smooth: !0,
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                type: "default"
                            }
                        }
                    },
                    data: [1320, 1132, 601, 234, 120, 90, 20]
                }]
            })
        }
    }
}! function(a, b) {
    var c = function(a, b, c) {
        var d;
        return function() {
            function h() {
                c || a.apply(f, g), d = null
            }
            var f = this,
                g = arguments;
            d ? clearTimeout(d) : c && a.apply(f, g), d = setTimeout(h, b || 100)
        }
    };
    jQuery.fn[b] = function(a) {
        return a ? this.bind("resize", c(a)) : this.trigger(b)
    }
}(jQuery, "smartresize"); 
 $(document).ready(function () {     
init_echarts()
 });
 <?php } ?>
</script>
<?php
    if(isset($_SESSION['data'])){
        unset($_SESSION['data']);
    }
?>
</body>
</html>