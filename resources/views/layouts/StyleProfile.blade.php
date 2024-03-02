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
        font: inherit;
        display: inline-block;
        border: none;
        background: none;
        padding: 0;
        color: inherit;
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

    /* -------------------------------------Profile Section---------------------------------------------- */
    .profile {
        padding: 3rem 0;
    }

    /* .profile-user-settings {
        margin-top: 1.1rem; 
    } */

    .profile-edit-btn {
        font-size: 1.4rem;
        line-height: 1.8;
        border: 0.1rem solid #dbdbdb;
        border-radius: 0.3rem;
        /* padding: 0;  */
        margin-left: 90px;  
        margin-bottom: 1rem; 
    }

    .profile::after {
        content: "";
        display: block;
        clear: both;
    }

    .profile-image,
    {
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
    .profile-website
     {
        float: left;
        width: calc(66.666% - 2rem);
        margin-top: 2rem;
    }
    .profile-real-name{
        font-size: 1.9rem;
    }

    .profile-user-name {
        display: inline-block;
        font-size: 3.2rem;
        font-weight: 300;
    }

    .profile-stats li {
        display: inline-block;
        font-size: 1.6rem;
        line-height: 1.5;
        margin-right: 4rem;
        cursor: pointer;
    }

    .profile-stats li:last-of-type {
        margin-right: 0;
    }

    .profile-bio {
        font-size: 1.6rem;
        font-weight: 400;
        line-height: 1.5;
        margin-top: 2.3rem;
    }
    
    .profile-website {
    margin-top: 0.rem;
    font-size: 1.3rem;
    font-weight: 200;
    line-height: 1.5;
    }

    .profile-real-name,
    .profile-stat-count,
    .profile-edit-btn {
        font-weight: 600;
    }

    /* -------------------------------------Gallery Section----------------------------------- */
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
        max-height:335px;
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

    /* -------------------------------------popup Section----------------------------------- */
    .popup-container {
        flex-direction:row;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        width: 100%;
        max-width: 600px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        display: none;
        padding: 20px;
        overflow: hidden;
        
    }

    .exit-icon {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }


    .popup-images {
    position: relative; 
    display: flex;
    justify-content: center;/* Center align images*/
    align-items: center; /* Center align images */
    overflow: hidden;

    }

    .popup-images img {
    height:300px;
    display: none; /* Hide all images by default */
}

.popup-images .active {
    display: block; /* Display only the active image */
}
.prev-arrow,
.next-arrow {
    background: rgba(255, 255, 255, 0.5);
    border: none;
    cursor: pointer;
    outline: none;
    padding: 10px;
    border-radius: 5px;
    position: absolute;
    top: 30%;
    transform: translateY(-50%);
}

.prev-arrow {
    left: 0;
}

.next-arrow {
    right: 0;
}

    .popup-content {
        padding: 16px;
        position: relative;
        height: 500px;
    }
  
    .popup-image  {
    width:100%; 
    height: 100%; 
    margin-right: 10px; 
    }

    .popup-caption h1,
    .popup-caption p {
        display: inline;
        margin-right: 10px; 
    }

    .popup-caption h1 {
        font-size: 24px;
    }

    .popup-caption p {
        font-size: 16px;
    }

    .popup-details {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    }

    .popup-icons {
        margin-bottom: 10px;
        font-size: 2.5rem;
        margin-top: 8px;
        font-weight: bold;
    }

    .popup-icons {
        display: flex;
        justify-content: flex-start;
        align-items: center; 
    }

    .popup-icons i {
        margin-right: 15px; 
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

    /* -------------------------------------media query----------------------------------- */
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
        .profile-stats {
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

        .profile-edit-btn,
        .profile-bio,
        .profile-stats {
            flex-basis: 100%;
        }

        .profile-edit-btn {
            order: 1;
            padding: 0;
            text-align: center;
            margin-top: 1rem;
            margin-left: 0;
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
            grid-template-rows: repeat(4, auto);
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
        .profile-user-settings ,
        .profile-stats,
        .profile-bio,
        .gallery-item,
        .gallery {
            width: auto;
            margin: 0;
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

            .profile-edit-btn,
            .profile-stats,
            .profile-bio,
            .profile-website {
                grid-column: 1 / -1;
            }

            .profile-user-settings,
            .profile-edit-btn,
            .profile-settings-btn,
            .profile-bio,
            .profile-stats,
            .profile-website {
                margin: 0;
            }
        }
    }

    .btn.profile-edit-btn {
        text-decoration: none;
    }
</style>       