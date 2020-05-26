var apiResponse = null;
var apiKey = "d4e2ad09-b1c3-4d70-9a9a-0e6149302486";

$(document).ready(function() {
    var path = window.location.pathname;
    var page = path.split("/").pop().split('.')[0];
    
    if(page === 'airplane' || page === 'ball' || page == 'pendulum' || page == 'suspensionsys') {
        incStatistics(page);
    } if(page === 'index') {
        getStat();
        $('#statResult').empty();
        $('#statResult').append(apiResponse.airplane);
    }

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
});

function sendRequest(apiHost, callType, apiFunctionName, apiFunctionParams) {
    $.ajax({
        url: apiHost,
        type: callType,
        dataType: 'JSON',
        headers: {
            "auth-key":apiKey,
            "function":apiFunctionName,
            "functionParam":apiFunctionParams
        },
        async: false,
        encode: true,
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
