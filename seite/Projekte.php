<style>
    #PR2-link {
        text-align: center;
    }
    #PR1-link {
        text-align: center;
    }
</style>
    <div id="PR1" >
        <img src="pictures/FEH.png" id="PR1-img">
        <h4> FEH: Webseite um informationen in eine Datenbank Einzutragen, einen eintrag zu &Auml;ndern,zu L&ouml;schen oder Abzufragen.   </h4>    
        <h4 id="PR1-link"> >>hier klicken um zu FEH zu gelangen<<</h4>
    </div>
    <div id="PR2">
    <img src="pictures/ZRS.png" id="PR2-img"><br>
        <h4> ZRS: Webseite mit Einem Zahlenrate Spiel und einer abgespeckten Version von Galgenm&auml;nchen!</h4>
        <h4 id="PR2-link"> >>hier klicken um zum ZRS zu gelangen<<</h4>
    </div>
    <script>
    $("#PR2-link").on("click",function(){
        $.get("ZRS.php", {}, function(data) {
            $("#content").html(data); 
        })
    })
    $("#PR1-link").on("click",function(){
        $.get("FEH.php",{},function(data){
            $("#content").html(data)
        })
    })
    </script>

