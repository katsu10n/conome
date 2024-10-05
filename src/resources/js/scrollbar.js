document.querySelectorAll('.scrollbar-wrapper').forEach((parent) => {
  parent.addEventListener('mouseenter', () => {
    parent.classList.add('scroll-hover');
  });

  parent.addEventListener('mouseleave', () => {
    parent.classList.remove('scroll-hover');
  });
});
