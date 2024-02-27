<!DOCTYPE html>
<html lang="en">

<head>
    <title>profile</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <style>
        :root {
            font-size: 10px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: "Open Sans", Arial, sans-serif;
            min-height: 100vh;
            background-color: #fafafa;
            color: #262626;
            padding-bottom: 3rem;
        }

        img {
            display: block;
        }

        .container {
            max-width: 93.5rem;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .btn {
            display: inline-block;
            font: inherit;
            background: none;
            border: none;
            color: inherit;
            padding: 0;
            cursor: pointer;
        }

        .btn:focus {
            outline: 0.5rem auto #4d90fe;
        }

        .visually-hidden {
            position: absolute !important;
            height: 1px;
            width: 1px;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
        }

/* Profile Section */
.profile {
    padding: 3rem 0;
}

.profile::after {
    content: "";
    display: block;
    clear: both;
}

.profile-image {
    float: left;
    width: calc(33.333% - 1rem);
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 3rem;
}

.profile-image img {
    border-radius: 50%;
}

.profile-user-settings,
.profile-stats,
.profile-bio,
.profile-name,
.profile-website {
    float: left;
    width: calc(66.666% - 2rem);
    margin-top: 2rem; /* Adjust the top margin to add space */
}

.profile-user-settings {
    margin-top: 7rem; /* Increase the top margin */
}

.profile-user-name {
    display: inline-block;
    font-size: 3.2rem;
    font-weight: 300;
}

.profile-stats li {
    display: inline-block;
    font-size: 1.6rem;
    line-height: 2;
    margin-right: 4rem;
    cursor: pointer;
}

.profile-stats li:last-of-type {
    margin-right: 0;
}

.profile-name {
    margin-top: 4rem; 
    font-size: 1.6rem;
    font-weight: 200;
    line-height: 1.5;
}

.profile-bio {
    font-size: 1.6rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 2rem; 
}

.profile-website {
    margin-top: 2rem;
    font-size: 1.3rem;
    font-weight: 200;
    line-height: 1.5;
}

.profile-real-name,
.profile-stat-count {
    font-weight: 600;
}

.add-new-image {
    margin-top: 10px;
    display: block;
}

.profile-real-name {
    margin-bottom: 10px;
}

.website {
    color: blue;
}
        /* Gallery Section */

        .gallery {
            display: flex;
            flex-wrap: wrap;
            margin: -1rem -1rem;
            padding-bottom: 3rem;
        }

        .gallery-item {
            position: relative;
            flex: 1 0 22rem;
            margin: 1rem;
            color: #fff;
            cursor: pointer;
        }

        .gallery-item:hover .gallery-item-info,
        .gallery-item:focus .gallery-item-info {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .gallery-item-info {
            display: none;
        }

        .gallery-item-info li {
            display: inline-block;
            font-size: 1.7rem;
            font-weight: 600;
        }

        .gallery-item-likes {
            margin-right: 2.2rem;
        }

        .gallery-item-save {
            margin-left: 2.2rem;
        }


        .gallery-item-type {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2.5rem;
            text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1);
        }


        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Popup Container */
        .popup-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            width: 100%;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: none;
            padding: 20px;
        }

        .exit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .popup-content {
            padding: 16px;
        }

        .popup-image {
            width: 100%;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .popup-caption,
        .popup-icons {
            font-size:1.7rem;
            margin-top: 8px;
            font-weight: bold;
        }

        .popup-icons{
            display: flex;
            justify-content: center;
            align-items: ;
        }

        .popup-comments {
            font-size:1.5rem;
            margin-top: 8px;
        }

        .user-comment {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .user-profile-picture {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 8px;
        }

        .user-name {
            font-weight: bold;
        }

        .user-comment-text {
            margin: 0;
        }

        .popup-saved-items {
            font-size:1.5rem;
            margin-top: 8px;
        }

        .exit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Media Query */

        @media screen and (max-width: 40rem) {

            .profile {
                display: flex;
                flex-wrap: wrap;
                padding: 4rem 0;
            }

            .profile::after {
                display: none;
            }

            .profile-image,
            .profile-user-settings,
            .profile-bio,
            .profile-stats,
            .profile-name,
            .profile-website {
                float: none;
                width: auto;
            }

            .profile-image img {
                width: 7.7rem;
            }

            .profile-user-settings {
                flex-basis: calc(100% - 10.7rem);
                display: flex;
                flex-wrap: wrap;
                margin-top: 1rem;
            }

            .profile-user-name {
                font-size: 2.2rem;
            }

            .profile-bio {
                font-size: 1.4rem;
                margin-top: 1.5rem;
            }

            .profile-bio,
            .profile-stats,
            .profile-name,
            .profile-website {
                flex-basis: 100%;
            }

            .profile-stats {
                order: 1;
                margin-top: 1.5rem;
            }

            .profile-stats ul {
                display: flex;
                text-align: center;
                padding: 1.2rem 0;
                border-top: 0.1rem solid #dadada;
                border-bottom: 0.1rem solid #dadada;
            }

            .profile-stats li {
                font-size: 1.4rem;
                flex: 1;
                margin: 0;
            }

            .profile-stat-count {
                display: block;
            }
        }

        @supports (display: grid) {

            .profile {
                display: grid;
                grid-template-columns: 1fr 2fr;
                grid-template-rows: repeat(5, auto);
                grid-column-gap: 3rem;
                align-items: center;
            }

            .profile-image {
                grid-row: 1 / -1;
            }

            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr));
                grid-gap: 2rem;
            }

            .profile-image,
            .profile-user-settings,
            .profile-stats,
            .profile-bio,
            .profile-name,
            .profile-website,
            .gallery-item,
            .gallery {
                width: auto;
                margin:0.5rem;
            }

            @media (max-width: 40rem) {
                .profile {
                    grid-template-columns: auto 1fr;
                    grid-row-gap: 1.5rem;
                }

                .profile-image {
                    grid-row: 1 / 2;
                }

                .profile-user-settings {
                    display: grid;
                    grid-template-columns: auto 1fr;
                    grid-gap: 1rem;
                }

                .profile-stats,
                .profile-bio,
                .profile-name,
                .profile-website {
                    grid-column: 1 / -1;
                }

                .profile-user-settings,
                .profile-bio,
                .profile-website,
                .profile-stats,
                .profile-name{
                    margin: 0;
                }
            }
        }

        .btn.profile-edit-btn {
            text-decoration: none; 
        }

        /* //////////////////buttons/////////////// */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 0rem;
            margin-left: 30%;
            margin-right: 20%;
        }
        .follow-btn,
        .block-btn {
            text-align: center;
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 10px 70px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px; 
            margin-right: 20px; 
        }

        .follow-btn:hover {
            background-color: #047049;
        }

        .block-btn {
            background-color: gray;
        }

        .block-btn:hover {
            background-color: #CD5C5C;
        }
    </style>
</head>

<body>
<header>
    <div class="container">
        <div class="profile">
            <div class="profile-image">
                <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="Profile Image">
            </div>
            <div class="profile-user-settings">
                <h1 class="profile-user-name">@janedoe_</h1>
            </div>
            <div class="profile-stats">
                <ul>
                    <li><span class="profile-stat-count">164</span> posts</li>
                    <li><span class="profile-stat-count">188</span> followers</li>
                    <li><span class="profile-stat-count">206</span> following</li>
                </ul>
            </div>
            <div class="profile-name">
                <p class="profile-real-name">Jane Doe</p>
            </div>
            <div class="profile-bio">
                <p class="bio">Lorem ipsum dolor sit, amet consectetur adipisicing elit</p>
            </div>
            <div class="profile-website">
                <p class="website">example.com</p>
            </div>


        </div>
        <div class="button-container">
            <button class="follow-btn">Follow</button>
            <button class="block-btn">Block</button>
        </div>
    </div>
</header>


    <main>
        <div class="container">
            <div class="gallery">
                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="Gallery Image">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden"></span><i class="far fa-heart" aria-hidden="true"></i> 56</li>
                            <li class="gallery-item-comments"><span class="visually-hidden"></span><i class="far fa-comment" aria-hidden="true"></i> 2</li>
                            <li class="gallery-item-save"><span class="visually-hidden"></span><i class="far fa-bookmark" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="container" >
        <div class="popup-container">
            <div class="popup-content">
                <i class="fas fa-times exit-icon" onclick="hidePopup()"></i>
                <img class="popup-image" src="" alt="Popup Image">
                <div class="popup-icons"></div>
                <div class="popup-caption"></div>
                <div class="popup-comments"></div>
            </div>
        </div>
    </div>


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

        popupImage.src = imageUrl;

popupIcons.innerHTML = `
    <i class="far fa-heart"></i> 
    <i class="far fa-comment"></i>
    <i class="far fa-bookmark"></i>

`;

popupCaption.innerHTML=`
<p>hiiiiii</p>`;

        /////////comment////////
        popupComments.innerHTML = '';
        //dummy comments 
        const dummyComments = [
            { profilePic: 'path_to_profile_picture_1.jpg', username: 'User1', comment: 'Comment 1' },
            { profilePic: 'path_to_profile_picture_2.jpg', username: 'User2', comment: 'Comment 2' },
        ];
        // Append comments to popupComments
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
        // popupSavedItems.innerHTML = saveIcon;
    
        popupContainer.style.display = "block";
    }
});

function hidePopup() {
    const popupContainer = document.querySelector(".popup-container");
    popupContainer.style.display = "none";
}

    </script>
</body>
</html>