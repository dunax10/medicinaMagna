
    // Selecciona todos los elementos del carrusel
    const carouselItems = document.querySelectorAll('.carousel-item');
    let currentIndex = 0;

    // Función para mostrar el siguiente elemento del carrusel
    function showNextItem() {
        // Oculta el elemento actual
        carouselItems[currentIndex].classList.remove('active');

        // Cambia al siguiente elemento (o vuelve al primero si es el último)
        currentIndex = (currentIndex + 1) % carouselItems.length;

        // Muestra el nuevo elemento
        carouselItems[currentIndex].classList.add('active');
    }

    // Cambia el elemento cada 3 segundos
    setInterval(showNextItem, 3000);

