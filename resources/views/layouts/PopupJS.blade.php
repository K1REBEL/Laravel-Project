<script>
        document.addEventListener("DOMContentLoaded", function () {
            const galleryItems = document.querySelectorAll(".gallery-item");

            galleryItems.forEach(function (item) {
                item.addEventListener("click", function () {
                    displayPopup(item);
                });
            });

            function displayPopup(item) {
                const popupContainer = document.querySelector(".popup-container");
                const imageUrl = item.querySelector(".gallery-image").src;
                const popupImage = document.querySelector(".popup-image");
                const popupIcons = document.querySelector(".popup-icons");
                const popupCaption = document.querySelector(".popup-caption");
                const popupComments = document.querySelector(".popup-comments");
                const profileUserName = document.querySelector(".profile-user-name").textContent;


                popupImage.src = imageUrl;

                popupIcons.innerHTML = `
                    <i class="far fa-heart" onclick="toggleIconFill(this)"></i> 
                    <i class="far fa-comment" onclick="toggleIconFill(this)"></i>
                    <i class="far fa-bookmark" onclick="toggleIconFill(this)"></i>
                `;

                popupCaption.innerHTML = `<h1>${profileUserName}</h1><p>hiiiiii</p>`;

                popupComments.innerHTML = '';
                const dummyComments = [
                    { profilePic: 'path_to_profile_picture_1.jpg', username: 'User1', comment: 'Comment 1' },
                    { profilePic: 'path_to_profile_picture_2.jpg', username: 'User2', comment: 'Comment 2' },
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

                popupContainer.style.display = "block";
            }
        });

        function hidePopup() {
            const popupContainer = document.querySelector(".popup-container");
            popupContainer.style.display = "none";
        }

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