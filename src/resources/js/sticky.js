document.addEventListener('DOMContentLoaded', function () {
  const header = document.getElementById('main-header');
  const sidebars = document.querySelectorAll('.sidebar');

  function updateSidebarPosition() {
    const headerHeight = header.offsetHeight;
    sidebars.forEach((sidebar) => {
      sidebar.style.top = `${headerHeight}px`;
      sidebar.style.height = `calc(100vh - ${headerHeight}px)`;
      sidebar.style.position = 'sticky';
    });
  }

  updateSidebarPosition();
  window.addEventListener('resize', updateSidebarPosition);
  window.addEventListener('scroll', updateSidebarPosition);
});
