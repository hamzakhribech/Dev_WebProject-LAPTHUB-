const allHoverImages = document.querySelectorAll(".hover-container div img");
const imgContainer = document.querySelector(".img-container");

window.addEventListener("DOMContentLoaded", () => {
  allHoverImages[0].parentElement.classList.add("active");
});

allHoverImages.forEach((image) => {
  image.addEventListener("mouseover", () => {
    imgContainer.querySelector("img").src = image.src;
    resetActiveImg();
    image.parentElement.classList.add("active");
  });
});

function resetActiveImg() {
  allHoverImages.forEach((img) => {
    img.parentElement.classList.remove("active");
  });
}
/////////////////////////////////////////////////////
let feild = document.querySelector("textarea");
let backUp = feild.getAttribute("placeholder");
let btn = document.querySelector(".btn");
let clear = document.getElementById("clear");
let ratingStars = document.querySelectorAll("#rating-stars .star");
let selectedRating = 0;
let commentDate = document.getElementById("comment-date");

feild.onfocus = function () {
  this.setAttribute("placeholder", "");
  this.style.borderColor = "#333";
  btn.style.display = "block";
  document.getElementById("rating-stars").style.display = "block"; // Show the star ratings
};

feild.onblur = function () {
  this.setAttribute("placeholder", backUp);
  this.style.borderColor = "#aaa";
};

clear.onclick = function () {
  event.preventDefault(); // Prevent form submission
  btn.style.display = "none";
  feild.value = "";
  document.getElementById("rating-stars").style.display = "none"; // Hide the star ratings
  selectedRating = 0; // Reset the selected rating to 0
  highlightSelectedRating(); // Update the star ratings display
};

ratingStars.forEach(function (star) {
  star.addEventListener("click", function () {
    selectedRating = parseInt(this.getAttribute("data-rating"));
    highlightSelectedRating();
  });
});

function highlightSelectedRating() {
  ratingStars.forEach(function (star) {
    let rating = parseInt(star.getAttribute("data-rating"));
    if (rating <= selectedRating) {
      star.classList.add("selected");
    } else {
      star.classList.remove("selected");
    }
  });
}
