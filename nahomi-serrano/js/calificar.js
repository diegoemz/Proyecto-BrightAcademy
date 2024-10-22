document.getElementById('rating-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que la página se recargue al enviar

    const material = document.getElementById('material').value;
    const rating = document.getElementById('rating').value;
    const comment = document.getElementById('comment').value;

    console.log('Material:', material);
    console.log('Calificación:', rating);
    console.log('Comentarios:', comment);

    alert('Calificación guardada');
});
