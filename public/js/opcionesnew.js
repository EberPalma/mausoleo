var seccionesPagina = new fullpage('#fullpage',{
	// ──────────────────────────────────────────────────
	//   :::::: Opciones Basicas
	// ──────────────────────────────────────────────────
		 autoScrolling: false, // Se activa el scroll.
		 loopBottom: true, // Regresa a la primera seccion siempre y cuando se ya haya llegado a la ultima sección y el ususario siga scrolleando.
	// ──────────────────────────────────────────────────
	//   :::::: Barra de navegación
	// ──────────────────────────────────────────────────
		//  navigation: true, // Muesta la barra de navegación.
		//  menu: '#menu', // Menu de navegación.
		//  anchors: ['inicio', 'productos', 'contacto'], // Anclas, las usamos para identificar cada seccion y poder acceder a ellas con el menu.
		//  navigationTooltips: ['Inicio', 'Productos', 'Contacto'], // Tooltips que mostrara por cada boton.
		//  showActiveTooltip: false, // Mostrar tooltip activa.
	// ──────────────────────────────────────────────────
	//   :::::: Secciones
	// ──────────────────────────────────────────────────
		// sectionsColor : ['#c2c2c2'], // Color de fondo de cada seccion.
		 verticalCentered: true, // Si alineara de forma vertical los contenidos de cada seccion.
	// ──────────────────────────────────────────────────
	//   :::::: Slides
	// ──────────────────────────────────────────────────


	// ──────────────────────────────────────────────────
	//   :::::: Animaciones (Callbacks de FullPage.js)
	// ──────────────────────────────────────────────────
});
document.addEventListener("DOMContentLoaded", function(event) {
    //Cada 15 segundos (15000 milisegundos) se ejecutará la función refrescar
    setInterval(pageScroll, 15000);
  });
    function pageScroll() {
        window.scrollBy(0, 1000); // horizontal and vertical scroll increments
}
