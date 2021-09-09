/*Codigo Jquery*/

/*Primer ejercicio */
/*Button del primer ejercicio */
document.getElementById("ejer1").addEventListener("click",Buton1)
function Buton1() {

var contents = prompt("Que debes poner en al caja de Pandora", "Todo el mal");
console.log("putting "+contents+" a la caja de pandora");
$('#pandora').html(contents);
};



/*Button del  ejercicio 2*/
document.getElementById("ejer2"). addEventListener("click",Buton2)
function Buton2() {

var items = prompt("Horcruxes", "<li>El Diario</li><li>El Relicario</li>");
$('#horcruxes').html(items);
};


 /*Button del  ejercicio 3*/
document.getElementById("ejer3").addEventListener("click",Buton3)
function Buton3(){

$("#fig1").css("border","4px solid red");
$("#fig1").css("text-align","center");
$("#fig1").css("padding","30px");
$("#fig1 figcaption").css("background-color","gold");
};



/*Button del  ejercicio 4*/
document.getElementById("ejer4").addEventListener("click",Buton4)
function Buton4(){

$("#fig2 img").attr("src","Img/Rony.jpg");
$("#fig2 img").attr("alt","Ron Weasley");
$("#fig2 figcaption").html("Ron Weasley as played by Rupert Grint");

};



/*Button del  ejercicio 5*/
document.getElementById("ejer5").addEventListener("click",Buton5)
function Buton5(){

$("#fig3").hide();
};

document.getElementById("ejer5b").addEventListener("click",Buton5b)
function Buton5b(){
$("#fig3").show();
};


/*Button del  ejercicio 6*/
document.getElementById("ejer6").addEventListener("click",Buton6)
function Buton6(){

$("#characters1 li").css("font-size","18px");   // matches 10 elts
$("#characters1 .gryffindor").css("color","red");  // matches 5 elts
$("#characters1 .slytherin").hide();    // matches 3 elts
};



/*Button del  ejercicio 7*/
document.getElementById("ejer7").addEventListener("click",Buton7)
function Buton7() {
    $("#fig6")
    .css("border","3px solid blue")
    .css("text-align","center")
    .css("padding","10px");
};



/*Button del  ejercicio 8*/
document.getElementById("ejer8").addEventListener("click",Buton8)
function Buton8(){
    $("<li>")
    .html("Percy")
    .addClass("gryffindor")
    .css("text-decoration","line-through")
    .appendTo("#characters2");

};


/*Button del  ejercicio 9 */
document.getElementById("ejer9").addEventListener("click",Buton9)
function Buton9(){
    $("#fig2a").removeClass("gryffindor");
    $("#fig2a").addClass("slytherin");    
};

/*Button del  ejercicio 10 */
document.getElementById("ejer10").addEventListener("click",Buton10)
function Buton10(){
    var damis = new Date();
    $("h3").html("Noticias de "+ damis.toLocaleDateString());
};

/*Corrige ultimo error*/
