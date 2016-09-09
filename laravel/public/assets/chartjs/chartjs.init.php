
/**
* Theme: Velonic Admin Template
* Author: Coderthemes
* Chart Js Page
*/

!function($) {
    "use strict";

    var ChartJs = function() {};

    ChartJs.prototype.respChart = function respChart(selector,type,data, options) {
        // get selector by context
        var ctx = selector.get(0).getContext("2d");
        // pointing parent container to make chart js inherit its width
        var container = $(selector).parent();

        // enable resizing matter
        $(window).resize( generateChart );

        // this function produce the responsive Chart JS
        function generateChart(){
            // make chart width fit with its container
            var ww = selector.attr('width', $(container).width() );
            switch(type){
                case 'Line':
                    new Chart(ctx).Line(data, options);
                    break;
                case 'Doughnut':
                    new Chart(ctx).Doughnut(data, options);
                    break;
                case 'Pie':
                    new Chart(ctx).Pie(data, options);
                    break;
                case 'Bar':
                    new Chart(ctx).Bar(data, options);
                    break;
                case 'Radar':
                    new Chart(ctx).Radar(data, options);
                    break;
                case 'PolarArea':
                    new Chart(ctx).PolarArea(data, options);
                    break;
            }
            // Initiate new chart or Redraw

        };
        // run function - render chart at first load
        generateChart();
    },
    //init
    ChartJs.prototype.init = function() {
        //creating lineChart
        if ($("#lineChart_before").length > 0) var result_before = $("#lineChart_before").attr('result');
        if ($("#lineChart_before").length > 0) var before = JSON.parse(result_before);
        if ($("#lineChart_before").length > 0) var data = {
            labels : ["<?php echo date("m月d日",time()-3600*24*7) ?>","<?php echo date("m月d日",time()-3600*24*6) ?>",
                "<?php echo date("m月d日",time()-3600*24*5) ?>","<?php echo date("m月d日",time()-3600*24*4) ?>",
                "<?php echo date("m月d日",time()-3600*24*3) ?>","<?php echo date("m月d日",time()-3600*24*2) ?>","<?php echo date("m月d日",time()-3600*24) ?>"],
            datasets : [
                {
                    fillColor : "rgba(235, 193, 66, 0.4)",
                    strokeColor : "rgba(235, 193, 66, 1)",
                    pointColor : "#ebc142",
                    pointStrokeColor : "#fff",
                    data : [before.result_before_1,before.result_before_2,before.result_before_3,before.result_before_4,
                    before.result_before_5,before.result_before_6,before.result_before_7]
                },
                {
                    fillColor : "rgba(3, 169, 244, 0.4)",
                    strokeColor : "rgba(3, 169, 244, 1)",
                    pointColor : "rgba(3, 169, 244, 1)",
                    pointStrokeColor : "#fff",
                    data : [before.result_before_error_1,before.result_before_error_2,before.result_before_error_3,before.result_before_error_4,
                    before.result_before_error_5,before.result_before_error_6,before.result_before_error_7]
                },
                /*{
                    fillColor : "rgba(0, 150, 136, 0.4)",
                    strokeColor : "rgba(0, 150, 136, 1)",
                    pointColor : "rgba(0, 150, 136, 1)",
                    pointStrokeColor : "#fff",
                    data : [14,16,12,5,32,9,33]
                }*/
            ]
        };

        if ($("#lineChart_after").length > 0) var result_after = $("#lineChart_after").attr('result');
        if ($("#lineChart_after").length > 0) var after = JSON.parse(result_after);
        if ($("#lineChart_after").length > 0) var data22 = {
            labels : ["<?php echo date("m月d日",time()-3600*24*7) ?>","<?php echo date("m月d日",time()-3600*24*6) ?>",
                "<?php echo date("m月d日",time()-3600*24*5) ?>","<?php echo date("m月d日",time()-3600*24*4) ?>",
                "<?php echo date("m月d日",time()-3600*24*3) ?>","<?php echo date("m月d日",time()-3600*24*2) ?>","<?php echo date("m月d日",time()-3600*24) ?>"],
            datasets : [
                {
                    fillColor : "rgba(235, 193, 66, 0.4)",
                    strokeColor : "rgba(235, 193, 66, 1)",
                    pointColor : "#ebc142",
                    pointStrokeColor : "#fff",
                    data : [after.result_after_1,after.result_after_2,after.result_after_3,after.result_after_4,
                    after.result_after_5,after.result_after_6,after.result_after_7]
                },
                {
                    fillColor : "rgba(3, 169, 244, 0.4)",
                    strokeColor : "rgba(3, 169, 244, 1)",
                    pointColor : "rgba(3, 169, 244, 1)",
                    pointStrokeColor : "#fff",
                    data : [after.result_after_error_1,after.result_after_error_2,after.result_after_error_3,after.result_after_error_4,
                    after.result_after_error_5,after.result_after_error_6,after.result_after_error_7]
                },
                /*{
                    fillColor : "rgba(0, 150, 136, 0.4)",
                    strokeColor : "rgba(0, 150, 136, 1)",
                    pointColor : "rgba(0, 150, 136, 1)",
                    pointStrokeColor : "#fff",
                    data : [14,16,12,5,32,9,33]
                }*/

            ]
        };
        
        if ($("#lineChart_before").length > 0) this.respChart($("#lineChart_before"),'Line',data);
        if ($("#lineChart_after").length > 0) this.respChart($("#lineChart_after"),'Line',data22);

        //donut chart
        var data1 = [
            {
                        value: 30,
                        color:"#ebc142"
                    },
                    {
                        value : 50,
                        color : "#03a9f4"
                    },
                    {
                        value : 100,
                        color : "#009688"
                    },
                    {
                        value : 40,
                        color : "#95D7BB"
                    },
                    {
                        value : 120,
                        color : "#4D5360"
                    }

        ]
        if ($("#doughnut").length > 0) this.respChart($("#doughnut"),'Doughnut',data1);


        //Pie chart
        var data2 = [
            {
                value: 40,
                color:"#ebc142"
            },
            {
                value : 80,
                color : "#03a9f4"
            },
            {
                value : 70,
                color : "#009688"
            }
        ]
         if ($("#pie").length > 0) this.respChart($("#pie"),'Pie',data2);


        //barchart
        var data3 = {
            labels : ["January","February","March","April","May","June","July"],
                    datasets : [
                        {
                            fillColor : "rgba(235, 193, 66, 0.4)",
                            strokeColor : "rgba(235, 193, 66, 0.4)",
                            data : [65,59,90,81,56,55,40]
                        },
                        {
                            fillColor : "rgba(0, 150, 136, 0.4)",
                            strokeColor : "rgba(0, 150, 136, 0.4)",
                            data : [28,48,40,19,96,27,100]
                        }
                    ]
        }
        if ($("#bar").length > 0) this.respChart($("#bar"),'Bar',data3);

        //radar chart
        var data4 = {
            labels : ["基本信息得分","账单信息得分","漫游状态得分","通信记录得分"],
            datasets : [
               
                {
                    fillColor : "rgba(0, 150, 136, 0.5)",
                    strokeColor : "rgba(0, 150, 136, 0.9)",
                    pointColor : "rgba(0, 150, 136, 1)",
                    pointStrokeColor : "#fff",
                    data : [$("#basicInfoScore").val(),$("#billScore").val(),$("#roamingStatusScore").val(),$("#communicationRecordScore").val()]
                }
            ]
        }
        if ($("#radarBefore").length > 0) this.respChart($("#radarBefore"),'Radar',data4);
		
		//radar chart
        var data5 = {
            labels : ["账单信息得分","漫游状态得分","通信记录得分"],
            datasets : [
               
                {
                    fillColor : "rgba(0, 150, 136, 0.5)",
                    strokeColor : "rgba(0, 150, 136, 0.9)",
                    pointColor : "rgba(0, 150, 136, 1)",
                    pointStrokeColor : "#fff",
                    data : [$("#billScore").val(),$("#roamingStatusScore").val(),$("#communicationRecordScore").val()]
                }
            ]
        }
        if ($("#radarAfter").length > 0) this.respChart($("#radarAfter"),'Radar',data5);

        //Polar area chart
        var data6 = [
            {
                value : 30,
                color: "#ebc142"
            },
            {
                value : 90,
                color: "#03a9f4"
            },
            {
                value : 24,
                color: "#009688"
            },
            {
                value : 58,
                color: "#f13c6e"
            },
            {
                value : 82,
                color: "#615ca8"
            },
            {
                value : 8,
                color: "#1ca8dd"
            }
        ]
        if ($("#polarArea").length > 0)this.respChart($("#polarArea"),'PolarArea',data6);
    },
    $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.ChartJs.init()
}(window.jQuery);