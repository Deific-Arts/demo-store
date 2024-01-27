const closeBtn = document.querySelector('business-sidebar-header kemet-button');
const drawer = document.querySelector('kemet-drawer');

closeBtn.addEventListener('click', () => {
  drawer.opened = false;
});

