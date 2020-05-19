function show() {
    if (document.getElementById("animation").checked){
        document.getElementById("animationId").style.display = "block";
        document.getElementById("graphId").style.display = "none";
    }
    if (document.getElementById("animation").checked && document.getElementById("graph").checked){
        document.getElementById("animationId").style.display = "block";
        document.getElementById("graphId").style.display = "block";
    }
    if (document.getElementById("animation").checked && !document.getElementById("graph").checked){
        document.getElementById("animationId").style.display = "block";
        document.getElementById("graphId").style.display = "none";
    }
    if (!document.getElementById("animation").checked && document.getElementById("graph").checked){
        document.getElementById("animationId").style.display = "none";
        document.getElementById("graphId").style.display = "block";
    }
    if (!document.getElementById("animation").checked && !document.getElementById("graph").checked){
        document.getElementById("animationId").style.display = "none";
        document.getElementById("graphId").style.display = "none";
    }
    else {
        console.log("okokt");
    }
}
