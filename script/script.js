var apiResponse = null;
var apiKey = "d4e2ad09-b1c3-4d70-9a9a-0e6149302486";

$(document).ready(function() {
    var path = window.location.pathname;
    var page = path.split("/").pop().split('.')[0];

    if(page === 'airplane' || page === 'ball' || page == 'pendulum' || page == 'suspensionsys') {
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
        console.log("dadad");
        var command = $.trim($("#command").val());
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'cmd',
            JSON.stringify({ex:command}));
        document.getElementById("result").innerHTML = apiResponse;
        apiResponse = null;
    });

    $("#kok").click(function(){
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'airplane',
            JSON.stringify({r:0.1}));
        console.log(apiResponse);
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
            //console.log(apiResponse);
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