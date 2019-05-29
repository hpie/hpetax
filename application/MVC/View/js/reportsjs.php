<script>
    function init_echarts() {
        if ("undefined" != typeof echarts) {
            console.log("init_echarts");
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
                            data: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"]
                        }],
                    yAxis: [{
                            type: "value"
                        }],
                    series: [
                        {
                            name: "Success",
                            type: "bar",
                            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]
                        }, {
                            name: "Pending",
                            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
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
                            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]
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
                                    value: <?php echo $success; ?>,
                                    name: "Success",
                                    label: {
                                        normal: {
                                            formatter: [
                                                '<?php echo 'Success Transaction : ' . $success; ?>'
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
                                                '<?php echo 'Pendig Transaction : ' . $pending; ?>'
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
                                                '<?php echo 'Failed Transaction : ' . $failed; ?>'
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
    }
    !function (a, b) {
        var c = function (a, b, c) {
            var d;
            return function () {
                function h() {
                    c || a.apply(f, g), d = null
                }
                var f = this,
                        g = arguments;
                d ? clearTimeout(d) : c && a.apply(f, g), d = setTimeout(h, b || 100)
            }
        };
        jQuery.fn[b] = function (a) {
            return a ? this.bind("resize", c(a)) : this.trigger(b)
        }
    }(jQuery, "smartresize");
    $(document).ready(function () {
    init_echarts()
    });                     
</script>