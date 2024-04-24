var btn = document.querySelectorAll(".unsubscribe");


for (let i = 0; i < btn.length; i++) {
	btn[i].addEventListener("mouseover", function() {
		this.value = "Se désinscrire";
	})
	btn[i].addEventListener("mouseout", function() {
		this.value = "Inscrit.e";
	})
}


