var apiResponse = null;
var apiKey = "d4e2ad09-b1c3-4d70-9a9a-0e6149302486";
$(document).ready(function() {
    var path = window.location.pathname;
    var page = path.split("/").pop().split('.')[0];
    if(page === 'airplane' || page === 'ball' || page == 'pendulum' || page == 'suspensionsys') {
        setDefaultGraph();
        incStatistics(page);
    } if(page === 'index') {
        getStat();
        $('#stat_div_pendulum').empty();
        $('#stat_div_pendulum').append(apiResponse.pendulum+'%');
        $('#stat_div_pendulum').css({'width':apiResponse.pendulum+'%'});
        $('#stat_div_car').empty();
        $('#stat_div_car').append(apiResponse.suspensionsys+'%');
        $('#stat_div_car').css({'width':apiResponse.suspensionsys+'%'});
        $('#stat_div_ball').empty();
        $('#stat_div_ball').append(apiResponse.ball+'%');
        $('#stat_div_ball').css({'width':apiResponse.ball+'%'});
        $('#stat_div_airplane').empty();
        $('#stat_div_airplane').append(apiResponse.airplane+'%');
        $('#stat_div_airplane').css({'width':apiResponse.airplane+'%'});
    }

    $("#model_checkbox").change(function () {
        if(this.checked) {
            $("#model_div").show("slow");
        } else {
            $("#model_div").hide("slow");
        }
    });
    $("#graph_checkbox").change(function () {
        if(this.checked) {
            $("#graph_div").show("slow");
        } else {
            $("#graph_div").hide("slow");
        }
    });
    $("#commandSubmit").click(function(){
        var command = $.trim($("#command").val());
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'cmd',
            command);
        document.getElementById("result").innerHTML = apiResponse;
        apiResponse = null;
    });

    $("#suspension_request").click(function(){
        var command = $.trim($("#const").val());
        if(validParam('suspension',command)) {
            sendRequest(
                'http://147.175.121.210:8177/WEB2-FINAL/api/',
                'GET',
                'suspension',
                JSON.stringify({r: command}));
            suspensionGraph(apiResponse);
            apiResponse = null;
        }
    });
    $("#airplane_request").click(function(){
        var command = $.trim($("#const").val());
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'airplane',
            JSON.stringify({r:command}));
        airplaneGraph(apiResponse);
        apiResponse = null;
    });


});

function sendRequest(apiHost, callType, apiFunctionName, apiFunctionParams) {
    $.ajax({
        url: apiHost,
        type: callType,
        encode: true,
        dataType: 'JSON',
        headers: {
            "auth-key":apiKey,
            "function":apiFunctionName,
            "functionParam":apiFunctionParams
        },
        async: false,
        success: function (response) {
            apiResponse = response;
        },
        error: function() {
            console.log("Error");
        }
    });
}

function incStatistics(page) {
    sendRequest(
        'http://147.175.121.210:8177/WEB2-FINAL/api/',
        'POST',
        'incStat',
        page
    );
}

function getStat() {
    sendRequest(
        'http://147.175.121.210:8177/WEB2-FINAL/api/',
        'GET',
        'getStat',
        ''
    );
}
function setDefaultGraph() {
    suspensionGraph({time:[0],data1:[0],data2:[0]});
    airplaneGraph({time:[0],data1:[0],data2:[0]});
}
function suspensionGraph(apiResponse) {
    var graphData = apiResponse;
    var trace1 = {
        x: graphData.time,
        y: graphData.data1,
        type: 'scatter',
        name: ''
    };
    var trace2 = {
        x: graphData.time,
        y: graphData.data2,
        type: 'scatter',
        name: ''
    };
    var data = [trace1,trace2];
    Plotly.newPlot('graph_div', data);
}
function airplaneGraph(apiResponse) {
    var graphData = apiResponse;
    var trace1 = {
        x: graphData.time,
        y: graphData.data1,
        type: 'scatter',
        name: ''
    };
    var trace2 = {
        x: graphData.time,
        y: graphData.data2,
        type: 'scatter',
        name: ''
    };
    var data = [trace1,trace2];
    Plotly.newPlot('graph_div', data);
}
function validParam(model,param) {
    if (model === 'suspension') {
        if (param >= -0.3 && param <= 0.3) {
            return true;
        }
    } if (model === 'airplane') {
        if (param) {
            return true;
        }
    } if (model === 'ball') {
        if (param) {

        }
    } if (model === 'pendulum') {
        if (param) {

        }
    }
    // $("#input_tooltip").css("visibility", "visible");
    // // setTimeout(function(){
    // //     $("#input_tooltip").css("visibility", "hidden");
    // // }, 5000);
    $("#input_tooltip").show("slow");
    setTimeout(function(){
        $('#input_tooltip').hide("slow");// or fade, css display however you'd like.
    }, 5000);
    return false;
}