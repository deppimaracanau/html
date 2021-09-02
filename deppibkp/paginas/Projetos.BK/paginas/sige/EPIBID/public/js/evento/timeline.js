var timeline = undefined;
var data = undefined;
var payload = [];

google.load("visualization", "1");

// Set callback to run when API is loaded
google.setOnLoadCallback(drawVisualization);

// Called when the Visualization API is loaded.
function drawVisualization() {
    // Create and populate a data table.
    data = new google.visualization.DataTable();
    data.addColumn('datetime', 'start');
    data.addColumn('datetime', 'end');
    data.addColumn('string', 'content');
    data.addColumn('string', 'group');
    data.addColumn('string', 'className');

    var now = new Date();
    payload = loadEventosJson();
    for (var i in payload) {
        var start = moment(payload[i].data + " " + payload[i].hora_inicial, "YYYY-MM-DD HH:mm").toDate();
        var end = moment(payload[i].data + " " + payload[i].hora_final, "YYYY-MM-DD HH:mm").toDate();
        var content = payload[i].titulo + ' (' + payload[i].palestrante + ")";
        var name = payload[i].local;
        var group = payload[i].tipo.toLowerCase();
        data.addRow([start, end, content, name, group]);
    }

    // specify options
    var options = {
        width: "100%",
//        height: "720px",
        height: "auto",
        layout: "box",
        axisOnTop: true,
        eventMargin: 10, // minimal margin between events
        eventMarginAxis: 0, // minimal margin beteen events and the axis
        editable: false,
        showNavigation: true,
        // TODO: trazer informações do encontro do banco de dados para 
        // as datas ficarem dinâmicas
        min: new Date(2014, 11, 16, 07, 00), // lower limit of visible range
        max: new Date(2014, 11, 19, 20, 00), // upper limit of visible range
        zoomMin: 1000 * 60 * 10, // ten minutes in milliseconds
//        zoomMax: 1000 * 60 * 60 * 24 * 7, // about one week in milliseconds
        locale: "pt_BR"
    };

    // Instantiate our timeline object.
    timeline = new links.Timeline(document.getElementById('mytimeline'), options);

    // Draw our timeline with the created data and options
    timeline.draw(data);

    // Set a customized visible range
    var start = new Date(now.getTime() - 30 * 60 * 1000);
    var end = new Date(now.getTime() + 3 * 60 * 60 * 1000);
    timeline.setVisibleChartRange(start, end);
}

function loadEventosJson() {
    var results = [];
    $.ajax({
        url: '/evento/ajax-programacao-timeline',
        type: 'POST',
        dataType: "json",
        async: false,
        success: function (json) {
            console.log('ajax success.');
//            console.log(json.results);
            results = json.results;
        },
        error: function () {
            console.log('ajax error.');
        },
        complete: function () {
            console.log('ajax complete.');
        }
    });
    return results;
}

