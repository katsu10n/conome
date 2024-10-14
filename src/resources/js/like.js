function toggleLike(button) {
  const postId = button.dataset.postId;
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  fetch(`/posts/${postId}/like`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': csrfToken,
      Accept: 'application/json',
    },
    body: JSON.stringify({}),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        button.dataset.liked = data.isLiked.toString();

        if (data.isLiked) {
          button.classList.remove('text-text-light', 'hover:text-red-500');
          button.classList.add('text-red-500', 'hover:text-red-600');
          button.querySelector('svg').classList.add('fill-current');
        } else {
          button.classList.remove('text-red-500', 'hover:text-red-600');
          button.classList.add('text-text-light', 'hover:text-red-500');
          button.querySelector('svg').classList.remove('fill-current');
        }

        const likeCount = document.querySelector(
          `.like-count[data-post-id="${postId}"]`,
        );
        likeCount.textContent = data.likesCount;
      }
    })
    .catch((error) => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.like-button').forEach((button) => {
    button.addEventListener('click', function (event) {
      event.preventDefault();
      toggleLike(this);
    });
  });
});
