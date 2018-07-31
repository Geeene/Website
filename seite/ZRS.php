    <div class="container-fluid">
        <input class="form-control" type="number" id="ratebox" value="1">
        <button class="btn" onclick="ratespiel()">Senden</button><br>
        <div id="dialog">Gib eine Zahl ein um das Spiel zu Starten!</div>
        <div id="dialog_popup" title="speichern">
            <p id="response">Bitte gib einen Namen ein um den Versuch zu speichern!</p><br>
            <input type="text" id="name" name="name">
            <button id="submit">Speichern!</button>
        </div>
        <button id="opener">Speichern</button>
    </div>
    <div class="container-fluid">
        <input type="text" class="form-control" id="buchstabenraten" value="">
        <button class="btn" onclick="galgenmaenchen()">Fragen</button>
        <div id="antwort">Gib einen Buchstaben ein um das Spiel zu Starten.</div>
        <p id="Regeln">
            1. Keine Umlaute<br>
            2. Es wird zwischen Groß- und Kleinschreibung unterschieden.
        </p>
        
    </div>
    <footer id="footer" class="panel-footer footer">&#169; Marvin Voß 2018 </footer>
    <script src="js/index.js"></script>
    <script src="Projekte/ZRS/javascript.js"></script><br>
