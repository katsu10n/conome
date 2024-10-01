function toggleFavorite(button) {
  const categoryId = button.dataset.categoryId;
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  fetch(`/categories/${categoryId}/favorite`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
    },
  })
    .then((response) => response.json())
    .then((data) => {
      button.dataset.isFavorited = data.isFavorited;
      const starIcon = button.querySelector('svg');
      const polygonPath = starIcon.querySelector('polygon');

      if (data.isFavorited) {
        starIcon.classList.remove('opacity-0', 'group-hover:opacity-100');
        starIcon.classList.add('text-yellow-400');
        polygonPath.setAttribute('fill', 'currentColor');
      } else {
        starIcon.classList.add('opacity-0', 'group-hover:opacity-100');
        starIcon.classList.remove('text-yellow-400');
        polygonPath.setAttribute('fill', 'none');
      }
    });
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.favorite-btn').forEach((button) => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      toggleFavorite(this);
    });
  });
});
