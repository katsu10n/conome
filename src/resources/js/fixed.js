document.addEventListener('DOMContentLoaded', function () {
  const container = document.getElementById('container');
  const modalContainer = document.getElementById('modal-container');

  function updateModalPosition() {
    const containerRect = container.getBoundingClientRect();
    const rightOffset = window.innerWidth - containerRect.right;
    modalContainer.style.right = `${rightOffset + 16}px`;
  }

  updateModalPosition();

  window.addEventListener('resize', updateModalPosition);
});
