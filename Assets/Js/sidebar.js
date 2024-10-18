document.addEventListener('DOMContentLoaded', function() {
    const dropBtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('.dropdown-menu');
     const dropdownArrow = document.querySelector('.dropdown');

    dropBtn.addEventListener('click', function() {
        // Toggles the display of the dropdown content
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
        dropdownArrow.classList.toggle('rotate');
    });

    
});