
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="Projekte/FEH/css/tabs.css">
    <link rel="stylesheet" href="Projekte/FEH/css/inputs.css">
</head>
        <div id="tabs" class="container-fluid">
            <div class="tab">
                <button class="tablinks" id="tablinksCH">Character Hinzuf&uuml;gen</button>
                <button class="tablinks" id="tablinksEA">Eintrag ändern </button>
                <button class="tablinks" id="tablinksEL">Eintrag Löschen</button>
            </div><!--id="" class="tab"-->
            <div id="CH" class="tabcontent">

                <select class="form-control" id="hero" REQUIRED></select>
                <select class="form-control" id="Weapon" value=""></select>
                <select class="form-control" id="Assist" value=""></select>
                <select class="form-control" id="Special" value=""></select>
                <select class="form-control" id="ASkill" value=""></select>
                <select class="form-control" id="BSkill" value=""></select>
                <select class="form-control" id="CSkill" value=""></select>
                <select class="form-control" id="SS" value=""></select>
                <select class="form-control" id="REF" name="REF">
                    <option class="eingabe" value="Kein Refine" selected>Kein Refinement</option><br>
                    <option class="eingabe" value="ATK">+ATK</option><br>
                    <option class="eingabe" value="DEF">+DEF</option><br>
                    <option class="eingabe" value="RES">+RES</option><br>
                    <option class="eingabe" value="SPD">+SPD</option><br>
                    <option class="eingabe" value="EFF">+EFF</option><br>
                </select>
                <button class="btn" id="INPUT_SUBMIT">Senden
                    <div id="dialog" title="Antwort">
                        <p id="response"></p>
                    </div><!--id="dialog"-->

                    <p id="result"></p>

            </div><!--id="CH"-->

            <div id="EA" class="tabcontent">
                <div id="change">
                    <select class="form-control" id="CH" name="CH">
                        <option value="Standard" selected>Bitte Auswaehlen</option><br>
                        <option value="bez">Name</option><br>
                        <option value="Weapon">Weapon</option><br>
                        <option value="Assist">Assist</option><br>
                        <option value="Special">Special</option><br>
                        <option value="ASkill">A-Skill</option><br>
                        <option value="BSkill">B-Skill</option><br>
                        <option value="CSkill">C-Skill</option><br>
                        <option value="Sacred Seal">SS</option><br>
                        <option value="Refinement">REF</option><br>
                    </select>
                    <input class="form-control" name="CH_Wert" id="CH_WERT" Placeholder="Neuer Inhalt">
                    <input class="form-control" type="number" name="CH_HERO" id="CH_HERO" Placeholder="Nummer des Heroes">
                    <button class="btn" id="CH_SUBMIT">Senden!
                        <div id="chdialog" title="Antwort"></div><!--id="chdialog"-->
                </div><!--id="change"-->

            </div><!--id="EA"-->
            <div id="EL" class="tabcontent">
                <div id="del">
                    <input class="form-control" id="DEL_HERO" name="DEL_HERO" Placeholder="Nummer des Heroes">
                    <button class="btn" id="DEL_SUBMIT">Löschen
                </div><!--id="del"-->
                <div id="deldialog" title="Antwort"></div><!--id="deldialog"-->

            </div><!--id="EL"-->



        </div><!--id="tabs"-->
        <div id="trennlinie">
        </div><!--id="trennlinie"-->
        <div class="container-fluid bg-2 text-center">
            <select class="form-control text-center" id="SK" id="suche">
                <option value="Standard" selected>Bitte Auswaehlen</option>
                <option value="bez">Name</option>
                <option value="Weapon">Weapon</option>
                <option value="Assist">Assist</option>
                <option value="Special">Special</option>
                <option value="ASkill">A-Skill</option>
                <option value="BSkill">B-Skill</option>
                <option value="CSkill">C-Skill</option>
                <option value="SS">SS</option>
                <option value="REF">REF</option>
            </select>
            <input id="SW" class="form-control" type="text">
            <button id="listtoggle" class="btn">Tabelle Ein/Ausblenden</button>
            <table id="list" class="table">
                <thead>
                    <tr title="Drücke mit der maus auf einen Tabellen Kopf um nach diesem zu sortieren">
                        <th onclick="sortTable('nr',0)">#</th>
                        <th onclick="sortTable('bez',1)">Name</th>
                        <th onclick="sortTable(this,2)">Weapon</th>
                        <th onclick="sortTable(this,3)">Assist</th>
                        <th onclick="sortTable(this,4)">Special</th>
                        <th onclick="sortTable(this,5)">ASkill</th>
                        <th onclick="sortTable(this,6)">BSkill</th>
                        <th onclick="sortTable(this,7)">CSkill</th>
                        <th onclick="sortTable(this,8)">SS</th>
                        <th onclick="sortTable(this,9)">REF</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div><!--id="keine id, 1. kind von class="container-fluid bg-2 text-center"-->
    </div><!--id="content"-->

    <script src="Projekte/FEH/js/javascript.js"></script>
    <script src="js/index.js"></script>
