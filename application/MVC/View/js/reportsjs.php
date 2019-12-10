
<script>
    function init_echarts() {
        if ("undefined" != typeof echarts) {
//            console.log("init_echarts");
            var a = {
                color: ["#26B99A", "#BDC3C7", "#f71100", "#3498DB", "#9B59B6", "#8abb6f", "#759c6a", "#bfd3b7"],
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
                    startAngle: 255,
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
                    tooltip: {
                        trigger: "axis"
                    },
                    legend: {
                        data: ["Success", "Pending", "Failed"]
                    },
                    toolbox: {
                        show: !1
                    },
                    calculable: !1,
                    xAxis: [{
                            type: "category",
                            data: [
                                <?php for($i=1;$i<=$totalday;$i++){
                                    if($i==$totalday){
                                        echo $i;    
                                    }
                                    else{
                                    echo $i.',';
                                    }
                                } ?> ]
                        }],
                    yAxis: [{
                            type: "value"
                        }],
                    series: [
                        {
                            name: "Success",
                            type: "bar",
                            data: [
                                <?php for($i=0;$i<$totalday;$i++){
                                    if($i==($totalday-1)){                                        
                                        echo $dayArray[$i]['successYearly']['totalamount'];    
                                    }
                                    else{
                                        echo $dayArray[$i]['successYearly']['totalamount'].',';
                                    }
                                } ?> ]
                        }, {
                            name: "Pending",
                            data: [
                                <?php for($i=0;$i<$totalday;$i++){
                                   if($i==($totalday-1)){                                        
                                        echo $dayArray[$i]['pendingYearly']['totalamount'];    
                                    }
                                    else{
                                        echo $dayArray[$i]['pendingYearly']['totalamount'].',';
                                    }
                                } ?> ],
                            type: 'line',
                            symbol: 'triangle',
                            symbolSize: 20,
                            lineStyle: {
                                normal: {
                                    color: 'green',
                                    width: 4,
                                    type: 'dashed'
                                }
                            }
                        },
                        {
                            name: "Failed",
                            type: "line",
                            data: [
                                <?php for($i=0;$i<$totalday;$i++){
                                   if($i==($totalday-1)){                                         
                                        echo $dayArray[$i]['failedYearly']['totalamount'];
                                    }
                                    else{
                                        echo $dayArray[$i]['failedYearly']['totalamount'].',';
                                    }
                                } ?> ]
                        }

                    ]
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
                                    value: <?php echo $success['totalStatus']; ?>,
                                    name: "Success",
                                    label: {
                                        normal: {
                                            formatter: [
                                                '<?php echo 'Total Success : ' . $success['totalStatus']; ?>\n\n<?php echo 'Total Amount : Rs.' . $success['totalamount']; ?>'
                                            ].join('\n'),
                                            backgroundColor: '#eee',
                                            borderColor: '#777',
                                            borderWidth: 1,
                                            borderRadius: 4
                                        }
                                    }
                                }, {
                                    value: <?php echo $pending['totalStatus']; ?>,
                                    name: "Pending",
                                    label: {
                                        normal: {
                                            formatter: [
                                                '<?php echo 'Total Pending : ' . $pending['totalStatus']; ?>\n\n<?php echo 'Total Amount : Rs.' . $pending['totalamount']; ?>'
                                            ].join('\n'),
                                            backgroundColor: '#eee',
                                            borderColor: '#777',
                                            borderWidth: 1,
                                            borderRadius: 4
                                        }
                                    }
                                }, {
                                    value: <?php echo $failed['totalStatus']; ?>,
                                    name: "Failed",
                                    label: {
                                        normal: {
                                            formatter: [
                                                '<?php echo 'Total Failed : ' . $failed['totalStatus']; ?>\n\n<?php echo 'Total Amount : Rs.' . $failed['totalamount']; ?>'
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
var labelOption = {
    normal: {
        show: false,       
        align: 'left',
        verticalAlign: 'middle',
        position: 'insideBottom',
        distance: 15,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,      
        rich: {
            name: {
                textBorderColor: '#fff'
            }
        }
    }
};
            if ($("#echart_line").length) {
                var f = echarts.init(document.getElementById("echart_line"), a);
                f.setOption({
                    title: {
                        text: "Yearly Reports",
                        subtext: "3 year reports"
                    },
                    tooltip: {
                        trigger: "axis",
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ["Success", "Pending", "Failed"]
                    },
                    toolbox: {
                        show: true,                    
                        feature: {                            
                            mark: {show: true},
//                            dataView: {show: true, readOnly: false},
                            magicType: {show: !0, 
                            title: {
                                                    line: "Line",
                                                    bar: "Bar",
                                                    stack: "Stack",
                                                    tiled: "Tiled"
                                                },
                            type: ['line', 'bar', 'stack', 'tiled']
                        },
            restore: {show: false},
            saveAsImage: {show: true,title:'Save as image'}
        }
                    },
                    calculable: true,
                    xAxis: [{
                            type: 'category',
                            axisTick: {show: false},
                            data: ['Apr <?php echo $yearArray[3]; ?> - Mar <?php echo $yearArray[2]; ?>','Apr <?php echo $yearArray[2]; ?> - Mar <?php echo $yearArray[1]; ?>','Apr <?php echo $yearArray[1]; ?> - Mar <?php echo $yearArray[0]; ?>']
                        }],
                    yAxis: [{
                            type: "value"
                        }],
                    series: [
                                {
                                    name: 'Success',
                                    type: 'bar',
                                    barGap: 0,
                                    label: labelOption,
                                    data:   [   
                                                <?php echo $stsArray[2]['successYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[3]['successYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[4]['successYearly']['totalamount']; ?>
                                            ]
                                },
                                {
                                    name: 'Pending',
                                    type: 'bar',
                                    label: labelOption,
                                     data:   [  
                                                <?php echo $stsArray[2]['pendingYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[3]['pendingYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[4]['pendingYearly']['totalamount']; ?>
                                            ]
                                },
                                {
                                    name: 'Failed',
                                    type: 'bar',
                                    label: labelOption,
                                     data:   [ 
                                                <?php echo $stsArray[2]['failedYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[3]['failedYearly']['totalamount']; ?>,
                                                <?php echo $stsArray[4]['failedYearly']['totalamount']; ?>
                                            ]
                                }
                        ]
                })
            }  
             if ($("#monthlyReports").length) {
                var f = echarts.init(document.getElementById("monthlyReports"), a);
                f.setOption({
                    title: {
                        text: "Monthly Reports",
                        subtext: "Reports month wise"
                    },
                    tooltip: {
                        trigger: "axis",
                        axisPointer: {
                            type: 'shadow'
                        }
                    },
                    legend: {
                        data: ["Success", "Pending", "Failed"]
                    },
                    toolbox: {
                        show: true,                    
                        feature: {                            
                            mark: {show: true},
//                            dataView: {show: true, readOnly: false},
                            magicType: {show: !0, 
                            title: {
                                                    line: "Line",
                                                    bar: "Bar",
                                                    stack: "Stack",
                                                    tiled: "Tiled"
                                                },
                            type: ['line', 'bar', 'stack', 'tiled']
                        },
            restore: {show: false},
            saveAsImage: {show: true,title:'Save as image'}
        }
                    },
                    calculable: true,
                    xAxis: [{
                            type: 'category',
                            axisTick: {show: false},
                            data: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
                        }],
                    yAxis: [{
                            type: "value"
                        }],
                    series: [
                                {
                                    name: 'Success',
                                    type: 'bar',
                                    barGap: 0,
                                    label: labelOption,
                                    data:   [
                                        <?php echo $monthArray[0]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[1]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[2]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[3]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[4]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[5]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[6]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[7]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[8]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[9]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[10]['successYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[11]['successYearly']['totalamount']; ?>
                                    ]
                                },
                                {
                                    name: 'Pending',
                                    type: 'bar',
                                    label: labelOption,
                                    data:   [                                       
                                        <?php echo $monthArray[0]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[1]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[2]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[3]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[4]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[5]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[6]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[7]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[8]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[9]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[10]['pendingYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[11]['pendingYearly']['totalamount']; ?>
                                    ]
                                },
                                {
                                    name: 'Failed',
                                    type: 'bar',
                                    label: labelOption,
                                     data:   [                                        
                                        <?php echo $monthArray[0]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[1]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[2]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[3]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[4]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[5]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[6]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[7]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[8]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[9]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[10]['failedYearly']['totalamount']; ?>,
                                        <?php echo $monthArray[11]['failedYearly']['totalamount']; ?>                                         
                                     ]
                                }
                        ]
                })
            }  
        }
    }    
    $(document).ready(function () {
        init_echarts();
    });                     
</script>