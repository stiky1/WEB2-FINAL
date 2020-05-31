var apiResponse = null;
var inputData = null;
var inputData2 = null;
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
            $("#graph_info_div").show("slow");
        } else {
            $("#graph_div").hide("slow");
            $("#graph_info_div").hide("slow");
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
        if(validParam('airplane',command)){
            sendRequest(
                'http://147.175.121.210:8177/WEB2-FINAL/api/',
                'GET',
                'airplane',
                JSON.stringify({r:command}));
            airplaneGraph(apiResponse);
            apiResponse = null;
        }
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
            // console.log(apiResponse);
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
function appendData(json1,json2) {
    var json = {
        time: json1.time.concat(json2.time),
        data1: json1.data1.concat(json2.data1),
        data2: json1.data2.concat(json2.data2)
    };
    return json;
}
function airplaneGraph(apiResponse) {
    // console.log(apiResponse);
    // if(inputData !== null) {
    //     console.log('asdada');
    //     inputData2 = apiResponse.data3;
    //     var graphData = appendData(inputData,apiResponse);;
    // } else {
    //     console.log('sadad');
    //     graphData = apiResponse;
    // }
    // inputData = graphData;
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
        if (param >= -1.0 && param <= 1.0) {
            return true;
        }
    } if (model === 'ball') {
        if (param) {

        }
    } if (model === 'pendulum') {
        if (param) {

        }
    }
    $("#input_tooltip").show("slow");
    setTimeout(function(){
        $('#input_tooltip').hide("slow");// or fade, css display however you'd like.
    }, 5000);
    return false;
}
//
// function sendMail() {
//     var link = "mailto:" + escape(document.getElementById('email').value)
//         + "&subject=" + escape("Stats")
//     ;
//
//     window.location.href = link;
// }