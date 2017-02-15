function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

function	showArticles(tabRow){
	console.log("votre article a bien ete supprimer et vous afficher la nouvelle page");

	document.getElementById("tabArticle").deleteRow(tabRow);
}

function	suppArticle(idArticle, tabRow){

	var xhr = getXMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				showArticles(tabRow);
		}
	};

	xhr.open("GET", "supprimerArticle.php?articleId="+idArticle, true);
	xhr.send(null);
}