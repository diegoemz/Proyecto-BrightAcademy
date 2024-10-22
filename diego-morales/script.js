const toggleButton = document.getElementById('toggle-button');
const userType = document.getElementById('user-type');

toggleButton.addEventListener('click', () => {
    if (userType.textContent === 'Estudiante') {
        userType.textContent = 'Maestro';
        toggleButton.textContent = 'Cambiar a Estudiante';
    } else {
        userType.textContent = 'Estudiante';
        toggleButton.textContent = 'Cambiar a Maestro';
    }
});
