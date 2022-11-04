$(document).ready(function () {
    $("#upload").width($("#photo").width());
    /*$("#VKP").width($("#VKForm").width() - $('#VK').width() - ($("#CVK").outerWidth() - $("#CVK").width()))) ;
     $("#FBP").width($("#FBForm").width() - $('#FB').width());
     $("#DRP").width($("#DRForm").width() - $('#DR').width());*/

    $(window).resize(function () {
//      chart.resize({height:100, width:300})
        $("#upload").width($("#photo"));
        /*   $("#VKP").width($("#VKForm").width() - $('#VK').width() - 43);
         $("#FBP").width($("#FBForm").width() - $('#FB').width() - 43);
         $("#DRP").width($("#DRForm").width() - $('#DR').width() - 43);*/

        if ($(window).width() >415 && $(window).width() < 992) {
            $(".lineH").css('line-height','23px');
        }
        else if ( $(window).width() < 415)
            $(".lineH").css('line-height','normal');
    });
    if ($(window).width() > 415 && $(window).width() < 992) {
        $(".lineH").css('line-height','23px');


    }      else if ( $(window).width() < 415)
        $(".lineH").css('line-height','normal');

    //$(".MoreCreative").click(function(){
    //    location.href = 'creativeMore.html';
    //
    //});

    var a = 5000;
    var chart4 = c3.generate({
        bindto: "#chartStat",
        size: {
            height: 450,
            width: 1300
        },
        data: {
            x : 'x',
            columns: [
                ['x','1','2', '3', '4', '5', '6', '7', '8','9', '10', '11', '12', '13', '14', '15','16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
                ['Шаги', 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000 , 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000 , 3500, a, 1000, 4000, 10000]

            ],
            groups: [
                ['Шаги']
            ],
            type: 'bar',
            colors: {
                'Шаги': '#00965a'
            }


        },
        axis: {
            x: {
                type: 'category' // this needed to load string x value
            }
        }
    });



    var chart3 = c3.generate({
        size: {
            height: 250,
            width: 350
        },
        bindto:'#chart3',
        data: {

            columns: [
                ['Отправлено', 3000, 2000, 1000, 4000, 1500],
                ['Прочитано', 2220, 2200, 2100, 2400, 2150]
            ],
            colors: {
                Отправлено: '#74b843',
                Прочитано   : '#C21859'
            }
        },
        axis: {
            x: {
                type: 'category',
                categories: ['Июнь','Июль', 'Август', 'Сентябрь', 'Октябрь']
            }
        }
    });






    var chart2 = c3.generate({
        bindto: "#chart2",
        size: {
            height: 250,
            width: 353
        },
        data: {
            x : 'x',
            columns: [
                ['x','Июнь','Июль', 'Август', 'Сентябрь', 'Октябрь'],
                ['Шаги', 3500, 2000, 1000, 4000, 10000]

            ],
            groups: [
                ['Шаги']
            ],
            type: 'bar',
            colors: {
                'Шаги': '#0F54B9'
            }
        },
        axis: {
            x: {
                type: 'category' // this needed to load string x value
            }
        }
    });





    var chart = c3.generate({
        bindto: '#chart',
        data: {
            columns: [
                ['Активные пользователи', 91.4]
            ],
            type: 'gauge',
            onclick: function (d, i) { console.log("onclick", d, i); },
            onmouseover: function (d, i) { console.log("onmouseover", d, i); },
            onmouseout: function (d, i) { console.log("onmouseout", d, i); }
        },
        gauge: {
            label: {
                //   format: function(value, ratio) {
                //        return value;
                //    },
                show: true // to turn off the min/max labels.
            },
            min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
            max: 1236, // 100 is default
            //  units: ' %',
            width: 49 // for adjusting arc thickness
        },
        color: {
            pattern: ['#C21859', '#E6792B', '#EEA12D', '#74b843'], // the three color levels for the percentage values.
            threshold: {
                //           unit: 'value', // percentage is default
//            max: 1236, // 100 is default
                values: [250, 500, 750, 900]
            }
        },
        size: {
            height: 280,
            width: 353
        }
    });

    setTimeout(function () {
        chart.load({
            columns: [['Активные пользователи', 100]]
        });
    }, 1000);
    setTimeout(function () {
        chart.load({
            columns: [['Активные пользователи', 300]]
        });
    }, 2000);
    setTimeout(function () { chart.load({
        columns: [['Активные пользователи', 600]]
    });
    }, 3000);
    setTimeout(function () { chart.load({
        columns: [['Активные пользователи', 1236]]
    });
    }, 4000);
    setTimeout(function () { chart.load({
        columns: [['Активные пользователи', 426]]
    });
    }, 5000);

    if ($('#container').length) {
        var bar = new ProgressBar.Line(container, {
            strokeWidth: 4,
            easing: 'easeInOut',
            duration: 1400,
            color: '#74b943',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            text: {
                style: {
                    // Text color.
                    // Default: same as stroke color (options.color)
                    color: '#000',
                    position: 'absolute',
                    right: '45%',
                    top: '33%',
                    padding: 0,
                    margin: 0,
                    transform: null
                },
                autoStyleContainer: false
            },
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            step: (state, bar) => {
            bar.setText(Math.round(bar.value() * 100) + ' %');
    }
});
bar.animate(1.0);  // Number from 0.0 to 1.0
$(".progressbar-text").css("font-size"," 1.5rem");
$(".progressbar-text").css("font-family"," ProximaSB");
}

var chart4 = c3.generate({
    bindto: "#chartStat2",
    size: {
        height: 250,
        width: 900
    },
    data: {
        x : 'x',
        columns: [
            ['x','1','2', '3', '4', '5', '6', '7', '8','9', '10', '11', '12', '13', '14', '15','16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
            ['Шаги', 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000 , 3500, a, 1000, 4000, 10000, 3500, a, 1000, 4000, 10000 , 3500, a, 1000, 4000, 10000]

        ],
        groups: [
            ['Шаги']
        ],
        type: 'bar',
        colors: {
            'Шаги': '#00965a'
        }


    },
    axis: {
        x: {
            type: 'category' // this needed to load string x value
        }
    },
    grid: {
        x: {
            show: false
        },
        y: {
            show: true
        }
    }
});

var chart5 = c3.generate({
    bindto: "#donuter",
    size: {
        height: 320,
        width: 380
    },
    data: {
        columns: [
            ['Активность', 130],
            ['Тренировка', 20],
            ['Бездействие', 100],
            ['Сон', 200]
        ],
        type : 'donut',
        onclick: function (d, i) { console.log("onclick", d, i); },
        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
    },
    donut: {
        title: "Активность"
    },
    color: {
        pattern: ['#74b943', '#c21859', '#eea12d', '#0f54b9']
    }
});

if ($('#timeline').length) {
    google.charts.load("current", {packages:["timeline"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var fo3 = new google.visualization.DateFormat({pattern: "yyyy, MM, d, H,m,s"});
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Room' });
        dataTable.addColumn({ type: 'string', id: 'Name' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addRows([
            ['Фаза глубокого сна', 'Глубокий сон', new Date(2018, 17, 10, 4,10,0), new Date(2018, 17, 10, 6,10,0)],
            ['Фаза лёгкого сна', 'Лёгкий сон', new Date(2018, 17, 10, 3,10,0), new Date(2018, 17, 10, 4,10,0)],
            ['Фаза быстрого сна', 'Быстрый сон', new Date(2018, 17, 10, 0,10,0), new Date(2018, 17, 10, 3,10,0)],
            ['Фаза лёгкого сна', 'Лёгкий сон', new Date(2018, 17, 10, 6,10,0), new Date(2018, 17, 10, 7,40,0)],
            ['Фаза быстрого сна', 'Быстрый сон', new Date(2018, 17, 10, 7,40,0), new Date(2018, 17, 10, 8,10,0)],
            ['Активность', 'Бодорствование', new Date(2018, 17, 10, 8,10,0), new Date(2018, 17, 10, 23,10,0)],
            ['Активность', 'Бодорствование', new Date(2018, 17, 10, 0,0,0), new Date(2018, 17, 10, 0,10,0)]]);

        fo3.format(dataTable,2);
        fo3.format(dataTable,3);

        var options = { colors: [ '#0f54b9', '#74b943','#eea12d','#c21859'],
            timeline: { showBarLabels: false,
                showRowLabels: false
            }};

        chart.draw(dataTable, options);
    };
}

});

