// Event listener for Profile link to open the modal
const profileLink = document.getElementById('profile-link');
const modal = document.getElementById('modal');
// const closeModalBtn = document.getElementById('close-btn');
// const closeModal = document.getElementById('close-modal-btn');
const btnAbout = document.getElementById('btn-about');
const btnLogout = document.getElementById('btn-logout');

profileLink.addEventListener('click', function() {
  modal.style.display = 'flex';
  setTimeout(function() {
    modal.querySelector('.modal-content').classList.add('show');
  }, 10);
});

// Event listener for closing the modal when clicked outside
window.addEventListener('click', function(event) {
  if (event.target === modal) {
    modal.querySelector('.modal-content').classList.remove('show');
    setTimeout(function() {
      modal.style.display = 'none';
    }, 200);
  }
});

// Event listener for "About Me" button
btnAbout.addEventListener('click', function() {
  // Handle "About Me" action here
  console.log('About Me button clicked!');
});

// Event listener for "Logout" button
btnLogout.addEventListener('click', function() {
  // Handle "Logout" action here
  console.log('Logout button clicked!');
});




