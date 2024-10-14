function updateLikeButtonState(button, isLiked) {
  button.classList.toggle('text-red-500', isLiked);
  button.classList.toggle('hover:text-red-600', isLiked);
  button.classList.toggle('text-text-light', !isLiked);
  button.classList.toggle('hover:text-red-500', !isLiked);
  button.querySelector('svg').classList.toggle('fill-current', isLiked);
}

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
        updateLikeButtonState(button, data.isLiked);
        button.dataset.liked = data.isLiked.toString();

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
    updateLikeButtonState(button, button.dataset.liked === 'true');

    button.addEventListener('click', function (event) {
      event.preventDefault();
      toggleLike(this);
    });
  });
});
