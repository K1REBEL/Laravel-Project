<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Define global variables
let currentIndex = 0;

// Function to display the popup with images and details
function displayPopup(mediaUrls) {
    const popupContainer = document.querySelector(".popup-container");
    const imagesContainer = popupContainer.querySelector(".popup-images");
    const popupCaption = document.querySelector(".popup-caption");
    const popupComments = document.querySelector(".popup-comments");
    const profileUserName = document.querySelector(".gallery-item").textContent;
    // const profileUserName = document.querySelector(".profile-user-name").textContent;

    // const popuptagimage = document.querySelector(".profile-tag").textContent;
    // const popuptagimage = document.querySelector(".profile-user-name").textContent;

    // Update imageUrls with the mediaUrls passed from the gallery item
    let imageUrls = mediaUrls.map(url => `{{ asset("storage") }}/${url}`);

    // Clear previous images
    imagesContainer.innerHTML = '';

    // Populate images
    imageUrls.forEach(function (imageUrl, index) {
        const img = document.createElement('img');
        img.src = imageUrl;
        img.alt = "Popup Image";
        img.classList.add('popup-image');
        if (index === currentIndex) {
            img.classList.add('active');
            popupContainer.style.width = '300px';
        }
        imagesContainer.appendChild(img);
    });

    // Update popup content
    // popupCaption.innerHTML = `<h1>${profileUserName}</h1><p>hiiiiii</p>`;

    // Clear previous comments and add new dummy comments
    popupComments.innerHTML = '';
    const dummyComments = [
        // { profilePic: 'path_to_profile_picture_1.jpg', username: 'User1', comment: 'Comment 1' },
        // { profilePic: 'path_to_profile_picture_2.jpg', username: 'User2', comment: 'Comment 2' },
    ];
    dummyComments.forEach(comment => {
        const userComment = document.createElement('div');
        userComment.classList.add('user-comment');
        userComment.innerHTML = `
            <img class="user-profile-picture" src="${comment.profilePic}" alt="User Profile Picture">
            <div class="user-details">
                <span class="user-name">${comment.username}</span>
                <p class="user-comment-text">${comment.comment}</p>
            </div>
        `;
        popupComments.appendChild(userComment);
    });

    // Update popup icons
    const popupIcons = document.querySelector(".popup-icons");
    popupIcons.innerHTML = `
        <i class="far fa-heart" onclick="toggleIconFill(this)"></i>
        <i class="far fa-comment" onclick="toggleIconFill(this)"></i>
        <i class="far fa-bookmark" onclick="toggleIconFill(this)"></i>
    `;

    popupContainer.style.display = "block"; // Display the popup container
}

// Function to hide the popup
function hidePopup() {
    const popupContainer = document.querySelector(".popup-container");
    popupContainer.style.display = "none";
}

// Function to change the image based on direction
function changeImage(direction) {
    const imagesContainer = document.querySelector('.popup-images');
    const totalImages = imagesContainer.children.length;

    // Remove active class from all images
    document.querySelectorAll('.popup-image').forEach(img => {
        img.classList.remove('active');
    });

    // Update currentIndex
    currentIndex += direction;

    // Handle wrapping around the images
    currentIndex = (currentIndex + totalImages) % totalImages;

    // Set active class to the current image
    imagesContainer.children[currentIndex].classList.add('active');
}

// Event listener for previous arrow click
document.querySelector('.prev-arrow').addEventListener('click', function() {
    changeImage(-1); // Change image to previous image
});

// Event listener for next arrow click
document.querySelector('.next-arrow').addEventListener('click', function() {
    changeImage(1); // Change image to next image
});

// Function to toggle icon fill
function toggleIconFill(icon) {
    if (icon.classList.contains('far')) {
        icon.classList.remove('far');
        icon.classList.add('fas');
    } else {
        icon.classList.remove('fas');
        icon.classList.add('far');
    }
}
</script>
