

// Initialize ScrollReveal and set options
ScrollReveal().reveal('.content', {
    distance: '50px',      // Distance the element moves
    origin: 'bottom',      // Start position of the element
    opacity: 0,            // Initial opacity
    duration: 800,         // Duration of the animation in milliseconds
    easing: 'ease-in-out', // Type of easing function
    reset: true            // Animation resets each time it scrolls into view
});