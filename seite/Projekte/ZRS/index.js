$(document).ready(function() {
//-----------Initialisierung der Webseite-------------------------------------------

///-----------Navigation-------------------------------------------------------------
    $("#impressum").on("click", function() {
        $.get("impressum.php", {}, function(data) {
            $("#content").html(data);
        })
        $("#HOME").removeClass("active");
        $("#Projekte").removeClass("active");
        $("#impressum").addClass("active");
    });
    $("#HOME").on("click", function() {
        $.get("indexcontent.php", {}, function(data) {
            $("#content").html(data);
        })
        $("#HOME").addClass("active");
        $("#Projekte").removeClass("active");
        $("#impressum").removeClass("active");
    });
    $("#Projekte").on("click", function() {
        $.get("Projekte.php", {}, function(data) {
            $("#content").html(data); 
        })
        $("#HOME").removeClass("active");
        $("#Projekte").addClass("active");
        $("#impressum").removeClass("active");
    });
})