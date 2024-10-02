document.addEventListener('DOMContentLoaded', function () {
  document.body.addEventListener('click', function (event) {
    const postContainer = event.target.closest('.post-container');
    if (!postContainer) return;

    const postUrl = postContainer.dataset.postUrl;
    if (!postUrl) return;

    if (event.target.closest('.user-link, .like-button, .delete-form')) {
      return;
    }

    window.location.href = postUrl;
  });

  document.body.addEventListener('submit', function (event) {
    if (event.target.closest('.delete-form')) {
      if (!confirm('本当に削除しますか？')) {
        event.preventDefault();
      }
    }
  });
});
