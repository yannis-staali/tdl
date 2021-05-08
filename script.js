
// setInterval(request1, 3);
// setInterval(request2, 3);

request1();
request2();

// let taskname = getElementById('taches_done');

document.getElementById('form_add').addEventListener('submit', function(e) {
    e.preventDefault();
    var taskname = document.getElementById('new_taskname').value;
 
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
        console.log(this.responseText);
        request1();
        request2();
    }

    xhr.open("POST", "traitement.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("new_task="+taskname);

});


// ICI REQUETE 1 RECUPERATION DES TACHES EN COURS
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function request1() {

var xhr = new XMLHttpRequest();

xhr.onload = function () {
    const taches_afaire = document.getElementById("taches_afaire")
    var responseParse = JSON.parse(this.responseText);
    console.log(responseParse);

    var txt = '';

    for(var x in responseParse) 
    {

        txt += "<div class='each' >";
        txt += "<h3>" + responseParse[x].nom + "</h3>";
        txt += "<p>Ajoutée le : " + responseParse[x].date_ajout + "</p>";
        // txt += "<form id='form"+x+"' action='traitement.php' method='POST'>";
        txt += "<button id='done"+x+"' name='done' value=" + responseParse[x].id + ">Fait</button>";
        txt += "<button id='annuler"+x+"' type='submit' name='annuler'id='annulerid' value=" + responseParse[x].id + ">Effacer</button>";
        // txt += "</form>"
        txt += "</div>";

        //console.log(x);
        

    }
    taches_afaire.innerHTML = txt ;

    var toto =[];
    var bouttonAnnuler = [];
    // var valeur =[];
    // var launching =[];

    for(var x in responseParse) 
    {
        toto[x] = document.getElementById('done'+x);
    
       toto[x].addEventListener('click', function(e) {
        getit(this.value)
       });   
    } 

    for(var x in responseParse) 
    {
        bouttonAnnuler[x] = document.getElementById('annuler'+x);
    
        bouttonAnnuler[x].addEventListener('click', function(e) {
        deleteItem(this.value);
       });   
    } 
};

xhr.open("POST", "traitement.php", true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("task_encours=gogo");
}


// ICI REQUETE 2 RECUPERATION DES TACHES ACCOMPLIES
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function request2() {
    var xhr2 = new XMLHttpRequest();

xhr2.onload = function () {
    const taches_done = document.getElementById("taches_done")
    recup = JSON.parse(this.responseText);
    // console.log(recup);

    var block = '';

    for(var y in recup)
    {
        block += "<div class='each' >";
        block += "<h3>" + recup[y].nom + "</h3>";
        block += "<p>Ajoutée le : " + recup[y].date_ajout + "</p>";
        block += "<p>Terminée le : " + recup[y].date_fini + "</p>";
        block += "</div>";
    }

    taches_done.innerHTML = block ;
};

xhr2.open("POST", "traitement.php", true);
xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr2.send("task_done=lalalaa");
}

//ICI LA FONCTION QUI SE LANCE QUAND CLICK SUR FAIT
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function getit(ici) {

var id = ici;

var xhr = new XMLHttpRequest();

xhr.onload = function() {
    console.log(this.responseText);
    request1();
    request2();
}

xhr.open("POST", "traitement.php", true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("done="+id);



// setTimeout(request1(), 10);
// setTimeout(request2(), 1500);   

}

//ICI LA FONCTION QUI SE LANCE QUAND CLICK SUR EFFACER
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function deleteItem(ici) {
    //console.log(ici);

    var id = ici;

    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
        console.log(this.responseText);
    request1();
    request2();
}

xhr.open("POST", "traitement.php", true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("annuler="+id);


}

// function lancement(id) {
//             // var fix = getElementById(id);
//             console.log(id);
//         }


