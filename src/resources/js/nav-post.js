document.addEventListener('DOMContentLoaded', function () {
  document.body.addEventListener('click', function (event) {
    const postContainer = event.target.closest('.post-container');
    if (!postContainer) return;

    const postUrl = postContainer.dataset.postUrl;
    if (!postUrl) return;

    if (event.target.closest('.user-link, .like-button, .post-dropdown')) {
      return;
    }

    window.location.href = postUrl;
  });
});
