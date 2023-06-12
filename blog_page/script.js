window.addEventListener("scroll", animatePosts);

function animatePosts() {
  var posts = document.querySelectorAll(".post");
  var blogs = document.querySelectorAll(".blogs");
  var windowHeight = window.innerHeight;

  posts.forEach(function (post) {
    var postPosition = post.getBoundingClientRect().top;

    if (postPosition < windowHeight) {
      post.classList.add("slide-in-right");
    }
  });

  blogs.forEach(function (blog) {
    var blogPosition = blog.getBoundingClientRect().top;

    if (blogPosition < windowHeight) {
      blog.classList.add("slide-in-right");
    }
  });

  // Remove the scroll event listener once all posts and blogs have been animated
  if (posts.length === 0 && blogs.length === 0) {
    window.removeEventListener("scroll", animatePosts);
  }
}
