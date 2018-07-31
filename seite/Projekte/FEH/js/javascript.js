$(document).ready(function() {
    //-----------Initialisierung der Webseite-------------------------------------------
    tabelleAktuallisieren();
    getSkill("#hero", "Hero");
    getSkill("#Weapon", "Weapon");
    getSkill("#Assist", "Assist");
    getSkill("#Special", "Special");
    getSkill('#ASkill', 'ASkill');
    getSkill("#BSkill", "BSkill");
    getSkill("#CSkill", "CSkill");
    getSkill("#SS", "SS");
    $(".tabcontent").hide();
    $("#CH").show();
    //----------------------------------------------------------------------------------
    $(function() {
        //-----------Dialog Einstellungen---------------------------------------------------
        $("#dialog").dialog({
            autoOpen: false
        });

        $("#logindialog").dialog({
            autoOpen: false
        });
        $("#chdialog").dialog({
            autoOpen: false
        });

        $("#deldialog").dialog({
            autoOpen: false
        });
        //----------------------------------------------------------------------------------
        //-----------------------------Home-Tabs--------------------------------------------
        $("#tablinksEA").on("click", function() {
                $(".tablinks").removeClass("active");
                $("#tablinksEA").addClass("active");
                $("#EA").show();
                $("#EL").hide();
                $("#CH").hide();
            }

        );
        $("#tablinksEL").on("click", function() {
                $(".tablinks").removeClass("active");
                $("#tablinksEL").addClass("active");
                $("#EA").hide();
                $("#EL").show();
                $("#CH").hide();
            }

        );
        $("#tablinksCH").on("click", function() {
            $(".tablinks").removeClass("active");
            $("#tablinksCH").addClass("active");
            $("#EA").hide();
            $("#EL").hide();
            $("#CH").show();
        });
        //----------------------------------------------------------------------------------
        //-----------Liste Aktivieren/Deaktivieren------------------------------------------
        $("#listtoggle").on("click", function() {
            $("#list").toggle();
            if($("#list").is(":hidden"))
            {
                $("#listtogle").on("click",function(){
                    $("#listtogle").html('<i class="material-icons>arrow_downward</i>"');
                })
            }
            else{
                $("#listtogle").on("click",function(){
                    $("#listtogle").html('<i class="material-icons>arrow_upward</i>"');
                })
            }
        });
        //----------------------------------------------------------------------------------
        //-----------Tabellen-Tooltip-------------------------------------------------------        
        $(function() {
            $(document).tooltip({
                track: true
            });
        });
        //----------------------------------------------------------------------------------
        //-----------Submit Form neuer Eintrag in der Datenbank-----------------------------
        $("#INPUT_SUBMIT").on("click", function() {
            if ($("#hero").val() == "Hero") {
                $("#dialog").html("Bitte einen Helden Auswählen!!");
                $("#dialog").dialog("open");
            } else {
                $.post("Projekte/FEH/php/FEHInput.php", {
                    bez: $("#hero").val(),
                    Weapon: $("#Weapon").val(),
                    Assist: $("#Assist").val(),
                    Special: $("#Special").val(),
                    ASkill: $("#ASkill").val(),
                    BSkill: $("#BSkill").val(),
                    CSkill: $("#CSkill").val(),
                    SS: $("#SS").val(),
                    REF: $("#REF").val()
                }, function(data) {
                    tabelleAktuallisieren();
                });
            }
        });
        //----------------------------------------------------------------------------------
        //-----------Eintrag in der Datenbank ändern----------------------------------------
        $("#CH_SUBMIT").on("click", function() {
            if ($("#CH").val() == "Bitte Auswaehlen" || $("#CH_WERT").val() == "" || $("#CH_HERO").val() == "") {
                $("#chdialog").text("Fehler Bitte alle Felder füllen!");
                $("#chdialog").dialog("open");
            } else {
                $.post("Projekte/FEH/php/FEHUpdate.php", {
                    CH: $("#CH").val(),
                    CH_WERT: $("#CH_WERT").val(),
                    CH_HERO: $("#CH_HERO").val(),
                }, function(data) {
                    $("#chdialog").text(data);
                    $("#chdialog").dialog("open");
                    tabelleAktuallisieren();
                });
            }
        });
        //----------------------------------------------------------------------------------
        //-----------Lösch Anfrage----------------------------------------------------------
        $("#DEL_SUBMIT").on("click", function() {
            $.post("Projekte/FEH/php/FEHDelete.php", {
                DEL_HERO: $("#DEL_HERO").val(),
            }, function(data) {
                tabelleAktuallisieren();
            });
        });
        //----------------------------------------------------------------------------------


        //-----------Live-Suche-------------------------------------------------------------
        $("#SW").keyup(function() {
            if ($("#SW").val() != "" && $("#SK").val() != "Standard") {
                $.post("Projekte/FEH/php/FEHSuche.php", {
                    SK: $("#SK").val(),
                    SW: $("#SW").val()
                }, function(data) {
                    $("#tbody").html(data);
                })
            }
            if ($("#SW").val() == "") {
                tabelleAktuallisieren();
            }
        });

    });
});
//-----------Tabelle Aktualisieren--------------------------------------------------
function tabelleAktuallisieren() {
    $.post("Projekte/FEH/php/FEHListeaktualisieren.php", {}, function(data) {
        $("#tbody").html(data);
    })
};
//----------------------------------------------------------------------------------
//-----------Dropdown Werte Abfragen------------------------------------------------
function getSkill(ziel, zeile) {
    $.post("Projekte/FEH/php/FEHGetDropDownValues.php", {
        zeile: zeile
    }, function(data) {
        $(ziel).html(data);
    });
}
var zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
//----------------------------------------------------------------------------------
//-----------Tabelle Sortieren------------------------------------------------------
function sortTable(th, nr) {
    if (typeof(th) == "object") {
        if (zaehler[nr] == 0) {
            $.post("Projekte/FEH/php/FEHListeSortieren.php", {
                zeile: $(th).text(),
            }, function(data) {
                $("#tbody").html(data);
                zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                zaehler[nr] = 1;
            })
        } else if (zaehler[nr] == 1) {
            $.post("Projekte/FEH/php/FEHListeSortierenDESC.php", {
                    zeile: $(th).text()
                }, function(data) {
                    $("#tbody").html(data);
                    zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    zaehler[nr] = 2;
                }

            )
        } else if (zaehler[nr] == 2) {
            tabelleAktuallisieren();
            zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            zaehler[nr] = 0;
        }
    } else {
        if (zaehler[nr] == 0) {
            $.post("Projekte/FEH/php/FEHListeSortieren.php", {
                zeile: th,
            }, function(data) {
                $("#tbody").html(data);
                zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                zaehler[nr] = 1;
            })
        } else if (zaehler[nr] == 1) {
            $.post("Projekte/FEH/php/FEHListeSortierenDESC.php", {
                    zeile: th
                }, function(data) {
                    $("#tbody").html(data);
                    zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                    zaehler[nr] = 2;
                }

            )
        } else if (zaehler[nr] == 2) {
            tabelleAktuallisieren();
            zaehler = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
            zaehler[nr] = 0;
        }
    }
}
//----------------------------------------------------------------------------------