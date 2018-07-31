$(document).ready(function() {
  $("#opener").hide();
  $(function() {
      $("#dialog_popup").dialog({
          autoOpen: false,
          show: {
              effect: "blind",
              duration: 1000
          },
          hide: {
              effect: "blind",
              duration: 1000
          }
      });

      $("#opener").on("click", function() {
          $("#dialog_popup").dialog("open");

      });
      $("#submit").on("click", function() {
          $.post("js/submit.php", {
                  name: $("#name").val(),
                  versuche: versuche
              },
              function(data) {
                  $("#response").html("Erfolgreich eingetragen!")
              }
          );
          $("#dialog_popup").dialog("close");
          zahl = Math.floor((Math.random() * 100) + 1);
          anzahlVersuche = 1;
          $("#response").html("Bitte gib einen Namen ein um den Versuch zu speichern!");
      });
  });
});



var zahl = Math.floor((Math.random() * 100) + 1);
anzahlVersuche = 1;

function ratespiel() {
  tipp = Math.floor(parseInt(document.getElementById('ratebox').value));
  if (tipp <= 100 && tipp > 0) {
      if (anzahlVersuche < 11) {
          if (tipp == zahl) {
              $("#dialog").html('Gewonnen!!! ' + tipp + ' ist Korrekt - Du hast ' + anzahlVersuche + ' Versuche gebraucht<br> Um eine Neue Runde zu starten, gebe einen Neuen Versuch ein!<br>oder dr&uuml;cke den button speichern um deinen aktuellen Versuch zu speichern!');
              versuche = anzahlVersuche;
              anzahlVersuche = 1;
              zahl = Math.floor((Math.random() * 100) + 1); //https://stackoverflow.com/questions/4959975/generate-random-number-between-two-numbers-in-javascript
              $("#opener").show();
          } else {
              if (zahl > tipp) {
                  $("#dialog").html('Versuch: ' + anzahlVersuche + '. Dein Tipp (' + tipp + ') war leider zu niedrig.');
                  anzahlVersuche = anzahlVersuche + 1;
              }
              if (zahl < tipp) {
                  $("#dialog").html('Versuch: ' + anzahlVersuche + '. Dein Tipp (' + tipp + ') war leider zu hoch.');
                  anzahlVersuche = anzahlVersuche + 1;
              }
          }
      } else {
          $("#dialog").html('Verloren! zu Viele versuche! Gebe einen neuen Versuch ein um eine neue runde zu Starten!');
          anzahlVersuche = 1;
          zahl = Math.floor((Math.random() * 100) + 1);
      }
  } else {
      $("#dialog").html('Fehlgeschlagen! Bitte gib eine Zahl zwischen 1 und 100 ein!');
  }
};

var wort;
anzahlversucheGM = 1;
$.post("js/galgenmaenchen.php", {
  nummer: Math.floor((Math.random() * 10) + 1)
}, function(data) {
  wort = data;
});
wort = wort.toLowerCase();

function galgenmaenchen() {

  var vorhanden = 0;
  tippGM = $("#buchstabenraten").val();
  if (anzahlversucheGM < 13) {
      if (wort == tippGM) {
          $("#antwort").html("Glueckwunsch! du hast das Wort erraten! Du hast " + anzahlversucheGM + " Versuche gebraucht.");
          $.post("js/galgenmaenchen.php", {
              nummer: Math.floor((Math.random() * 10) + 1)
          }, function(data) {
              wort = data;
          });
          anzahlversucheGM = 1;
          wort = wort.toLowerCase();
      } else {
          if (tippGM == "") {
              $("#antwort").html("Bitte eine G&uuml;ltige antwort abgeben, es d$uuml;rfen nur Buchstaben geschrieben werden.");
          } else {
              var vorhanden;
              for (i = 0; i < wort.length; i++) {
                  if (tippGM == wort[i]) {
                      vorhanden = vorhanden + 1;
                      $("#antwort").html("Der Buchstabe " + tippGM + " ist " + vorhanden + " mal vorhanden");
                      anzahlversucheGM;
                  }
              }
              if (vorhanden == 0) {
                  $("#antwort").html("Der Buchstabe ist nicht Vorhanden")
                  anzahlversucheGM = anzahlversucheGM + 1;
              }

          }
      }
  }
  else {
    $("#antwort").html("Leider hast du zu viele Versuche Gebraucht. Das gesuchte Wort war: "+wort+"<br> Du kannst weiterspielen indem du einen neuen Tipp abgibst.");
    $.post("js/galgenmaenchen.php", {
      nummer: Math.floor((Math.random() * 10) + 1)
  }, function(data) {
      wort = data;
  });
  anzahlversucheGM = 1;
  }
  var strichliste = "|" * anzahlversucheGM;
  $("#strichliste").html(strichliste);
}