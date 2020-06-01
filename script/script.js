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
        updateStat();
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
    $("#mail_request").click(function(){
        var mail_add = $.trim($("#email").val());
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'sendMail',
            mail_add);
        mailAnime(apiResponse);
        apiResponse = null;
    });
    $("#commandSubmit").click(function(){
        var command = $.trim($("#command").val());
        sendRequest(
            'http://147.175.121.210:8177/WEB2-FINAL/api/',
            'GET',
            'cmd',
            command);
        document.getElementById("console_result").innerHTML = apiResponse;
        apiResponse = null;
    });

    $("#ball_request").click(function(){
        var command = $.trim($("#const").val());
        if(validParam('ball',command)) {
            sendRequest(
                'http://147.175.121.210:8177/WEB2-FINAL/api/',
                'GET',
                'ball',
                JSON.stringify({r: command}));
            ballGraph(apiResponse);
            ballAnimation(apiResponse);
            apiResponse = null;
        }
    });
    $("#pendulum_request").click(function(){
        var command = $.trim($("#const").val());
        if(validParam('pendulum',command)) {
            sendRequest(
                'http://147.175.121.210:8177/WEB2-FINAL/api/',
                'GET',
                'pendulum',
                JSON.stringify({r: command}));
            pendulumGraph(apiResponse);
            pendulumAnimation(apiResponse);
            apiResponse = null;
        }
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
            suspensionAnimation(apiResponse);
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
            airplaneAnimation(apiResponse);
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
            console.log(apiResponse);
        },
        error: function() {
            console.log("Error");
        }
    });
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////DOPLNIT FUNKCIU//////////////////////////////////////////////////////
function ballGraph(apiResponse){

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////DOPLNIT FUNKCIU//////////////////////////////////////////////////////
function pendulumGraph(apiResponse){

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////DOPLNIT FUNKCIU//////////////////////////////////////////////////////
function ballAnimation(apiResponse) {

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////DOPLNIT FUNKCIU//////////////////////////////////////////////////////
function pendulumAnimation(apiResponse){

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////DOPLNIT PODMIENKY//////////////////////////////////////////////////////

function validParam(model,param) {
    if (model === 'suspension' && (param >= -0.4 && param <= 0.4)) {
        return true;
    } if (model === 'airplane' && (param >= -1.0 && param <= 1.0)) {
        return true;
    } if (model === 'ball' && (param)) {
        return true;
    } if (model === 'pendulum' && (param)) {
        return true;
    }
    $("#input_tooltip").show("slow");
    setTimeout(function(){
        $('#input_tooltip').hide("slow");// or fade, css display however you'd like.
    }, 5000);
    return false;
}

function radianToDegree(r) {
    return r * (180/4);
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
function suspensionAnimation(apiResponse) {
    var coordinates = apiResponse;
    coordinates.data1.forEach((el,index) => {
        coordinates.data1[index] = el * (-60);
    });
    coordinates.data2.forEach((el,index) => {
        coordinates.data2[index] = el * (-800);
    });
    let animation = anime({
        targets: '#carModel',
        translateY: coordinates.data2,
        direction: 'linear',
        easing: 'easeInOutQuad',
        duration: 13000,
    });

    let animation2 = anime({
        targets: '#frontWheel',
        translateY: coordinates.data1,
        direction: 'linear',
        easing: 'easeInOutQuad',
        duration: 13000,
    });

    let animation3 = anime({
        targets: '#backWheel',
        translateY: coordinates.data1,
        direction: 'linear',
        easing: 'easeInOutQuad',
        duration: 13000,
    });
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
function airplaneAnimation(apiResponse) {
    console.log(apiResponse);
    var animationData = airplaneAnimeData(apiResponse);
    console.log(animationData);

    let anim = anime({
        targets: '#model_div',
        rotate: animationData.data1,
        direction: 'linear',
        duration: 13000,
        easing: 'easeInOutQuad',
    });
    let aniem = anime({
        targets: '#flat_svg',
        rotate: animationData.data2,
        direction: 'linear',
        duration: 13000,
        easing: 'easeInOutQuad',
    });
}
function airplaneAnimeData(data) {
    data.data1.forEach((el,index) => {
        data.data1[index] = radianToDegree(el) * (-1);
    });
    data.data2.forEach((el,index) => {
        data.data2[index] = radianToDegree(el);
    });
    return data;
}
function mailAnime(response) {
    var color = (response ? 'green':'red')
    $('#mail_icon').css({'color':color});
    if(response) {
        let animation = anime({
            targets: '#mail_icon',
            translateY: [-30,0,-20,0,-10,0,-5,0,-2,0],
            duration: 1500,
            easing: 'easeInOutQuad',
            direction: 'linear'
        });
    } else {
        let animation = anime({
            targets: '#mail_icon',
            translateX: [-40,0,-30,0,-20,0,-10,0,-5,0],
            duration: 1500,
            easing: 'easeInOutQuad',
            direction: 'linear'
        });
    }
    setTimeout(function(){
        $('#mail_icon').css({'color':'black'});
    }, 1500);
}
function setDefaultGraph() {
    suspensionGraph({time:[0],data1:[0],data2:[0]});
    airplaneGraph({time:[0],data1:[0],data2:[0]});
}
function getStat() {
    sendRequest(
        'http://147.175.121.210:8177/WEB2-FINAL/api/',
        'GET',
        'getStat',
        ''
    );
    var res = apiResponse;
    return res;
}
function updateStat() {
    var stat = getStat();
    apiResponse = null;
    $('#stat_div_pendulum').empty();
    $('#stat_div_pendulum').append(stat.pendulum+'%');
    $('#stat_div_pendulum').css({'width':stat.pendulum+'%'});
    $('#stat_div_car').empty();
    $('#stat_div_car').append(stat.suspensionsys+'%');
    $('#stat_div_car').css({'width':stat.suspensionsys+'%'});
    $('#stat_div_ball').empty();
    $('#stat_div_ball').append(stat.ball+'%');
    $('#stat_div_ball').css({'width':stat.ball+'%'});
    $('#stat_div_airplane').empty();
    $('#stat_div_airplane').append(stat.airplane+'%');
    $('#stat_div_airplane').css({'width':stat.airplane+'%'});
}
function incStatistics(page) {
    sendRequest(
        'http://147.175.121.210:8177/WEB2-FINAL/api/',
        'POST',
        'incStat',
        page
    );
}
// function appendData(json1,json2) {
//     var json = {
//         time: json1.time.concat(json2.time),
//         data1: json1.data1.concat(json2.data1),
//         data2: json1.data2.concat(json2.data2)
//     };
//     return json;
// }