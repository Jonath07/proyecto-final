
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };
    
    //creates Stacked chart
    Dashboard1.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barColors: lineColors
        });
    },

    //creates area chart with dotted
    Dashboard1.prototype.createAreaChartDotted = function(element, pointSize, lineWidth, data, xkey, ykeys, labels, Pfillcolor, Pstockcolor, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 0,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            pointFillColors: Pfillcolor,
            pointStrokeColors: Pstockcolor,
            resize: true,
            gridLineColor: '#eef0f2',
            lineColors: lineColors
        });

   },
    
    Dashboard1.prototype.init = function() {

        //creating Stacked chart
        var $stckedData  = [
            { y: 'ENE', a: 0, b: 0, c: 0 },
            { y: 'FEB', a: 0,  b: 0, c: 0 },
            { y: 'MAR', a: 0, b: 0, c: 0 },
            { y: 'ABR', a: 0,  b: 0, c: 0 },
            { y: 'MAY', a: 0, b: 0, c: 0 },
            { y: 'JUN', a: 0,  b: 0, c: 0 },
            { y: 'JUL', a: 0,  b: 0, c: 0 },
            { y: 'AGO', a: 0,  b: 0, c: 0 },
            { y: 'SEP', a: 0,  b: 0, c: 0 },
            { y: 'OCT', a: 0,  b: 0, c: 0 },
            { y: 'NOV', a: 0, b: 0, c: 0 },
            { y: 'DIC', a: 0, b: 0, c: 0 }
        ];
        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b', 'c'], ['Garrafon', 'Bolsa', 'Otros'], ['#5fbeaa', '#5d9cec', '#ebeff2']);

        //creating area chart
        var $areaDotData = [
                { y: '2009', a: 10, b: 20, c:30 },
                { y: '2010', a: 75,  b: 65, c:30 },
                { y: '2011', a: 50,  b: 40, c:30 },
                { y: '2012', a: 75,  b: 65, c:30 },
                { y: '2013', a: 50,  b: 40, c:30 },
                { y: '2014', a: 75,  b: 65, c:30 },
                { y: '2015', a: 90, b: 60, c:30 }
            ];
        this.createAreaChartDotted('morris-area-with-dotted', 0, 0, $areaDotData, 'y', ['a', 'b', 'c'], ['Desktops ', 'Tablets ', 'Mobiles '],['#ffffff'],['#999999'], ['#5fbeaa', '#5d9cec','#ebeff2']);

    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);