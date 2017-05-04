

function verifieSyntax(n){
	var regex = new RegExp("^[0-9]+$");
	if(!(regex.test(n)))
		return true;//Syntax Incorrect 
	return false
}	




function crible(n){
	$('#entier2').val('');
	$('.res2').css('color','black');

	if(verifieSyntax(n)){
		$('.res2').show();
		$('.res2').text('Saisir un nombre entier');
		$('.res2').css('color','red');
	}
	else if(n==0 || n==1 || (n%2==0 && n!=2)){
		$('.res2').show();
		$('.res2').text('Le nombre '+n+' n\'est pas premier');
	}
	else{
		var racn=Math.sqrt(n);
		for(var i=3;i<=racn;i=i+2){
			if(n%i==0){
				$('.res2').show();
				$('.res2').text('Le nombre '+n+' n\'est pas premier');
				return 0;
			}
		}
		$('.res2').show();
		$('.res2').text('Le nombre '+n+' est premier');
	}
}


 function createTable(n) {
        // récupère une référence vers l'élément body
        var div = document.getElementById("div");

        // crée un élément <table> et un élément <tbody>
        table     = document.createElement("table");
		table.id="tableau";
        tablebody = document.createElement("tbody");

        // création des cellules
        for(var j = 0; j <= parseInt(n/10); j++) {
            // crée une ligne de tableau
            var row = document.createElement("tr");
            for(var i = 1; i <= 10 && 10*j+i<= n; i++) {
                // Crée un élément <td> et un nœud texte, place le nœud texte
                // comme contenu texte de l'élément <td> et le place à la fin
                // de la ligne du tableau
                cell = document.createElement("td");
				if(i==10)
					texte = document.createTextNode(String(j+1)+String(0));
				else
					texte = document.createTextNode(String(j)+String(i));
                cell.appendChild(texte);
				cell.style.backgroundColor="white";
                row.appendChild(cell);
            }
            // ajoute la ligne à la fin du corps du tableau
            tablebody.appendChild(row);
        }
        // place <tbody> dans l'élément <table>
        table.appendChild(tablebody);
        // ajoute <table> à l'élément <body>
        div.appendChild(table);
    }
function getRandomIntInclusive() {
	min = Math.ceil(222222);
	max = Math.floor(999999);
	return Math.floor(Math.random() * (max - min +1)) + min;
}

function eras(n){
	if(verifieSyntax(n) || n>9999){
		$('#interdit').show();
		$('#interdit').css('color','red');
	}
	else{
		$('#interdit').hide();
		if(document.getElementById("tableau")){
			var obj=document.getElementById("div");
			var old=document.getElementById("tableau");
		
			obj.removeChild(old);
		}
		createTable(n);
	
		var arrayLignes = document.getElementById("tableau").rows; //on récupère les lignes du tableau
		arrayLignes[0].cells[0].style.backgroundColor="red";
		var arrayColonnes = arrayLignes[0].cells;
		var taille=arrayColonnes.length-1;
		var colonne=0;
		var ligne=0;
		var nbpremier=2;
		var couleur="#"+getRandomIntInclusive();
		var racn=Math.sqrt(n);
		var nb=1;
		while(nb<=racn){
			if(arrayLignes[ligne].cells[colonne].style.backgroundColor=="white"){ //Nb premier croisé
				arrayLignes[ligne].cells[colonne].style.textDecoration="underline";
				arrayLignes[ligne].cells[colonne].style.color=couleur;
				nbpremier=arrayLignes[ligne].cells[colonne].innerHTML;
				var decalage=parseInt(nbpremier)*2-1;
				var i=Math.floor(decalage/10);										
				var j=decalage%10;
				while(i<arrayLignes.length-1 || i==0){//on peut directement définir la variable i dans la boucle	
					arrayColonnes = arrayLignes[i].cells;//on récupère les cellules de la ligne
					if( arrayColonnes[j].style.backgroundColor=="white")
							arrayColonnes[j].style.backgroundColor=couleur;
					decalage=decalage+parseInt(nbpremier)
					i=Math.floor(decalage/10);															/** Vérification de Erastostebe***/
					j=decalage%10;
				}
				
				couleur="#"+getRandomIntInclusive();
			}
			colonne=colonne+1;
			if(colonne>9){
				ligne=ligne+1;
				colonne=0;
			}
			nb=arrayLignes[ligne].cells[colonne].innerHTML;
		}
	}
}
	
$(document).ready(function(){	
	$('#eras').click(function(){
		var n=$('#taille').val();
		$('#taille').val('');
		

		eras(n);	
	});
	
	$('#test').click(function(){
		crible($('#entier2').val());

	});


	$('#nombre').click(function(){

		var n=$('#n').val();
	
		nombre(n);
		$('#container').removeClass('cacher');
	});

});