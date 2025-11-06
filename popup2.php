    <style>
        .popup {
    position: fixed;
    top: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, .3);
    display: grid;
    place-content: center;
    opacity: 0;
    pointer-events: none;
    transition: 200ms ease-in-out opacity;
    z-index:1000;
}
.popup-content {
    width: clamp(500px, 90vw, 500px);
    background-color: #fff;
    padding: clamp(1.5rem, 100vw, 3rem);
    box-shadow: 0 0 .5em rgba(0, 0, 0, .5);
    border-radius: .5em;
    opacity: 0;
    transform: translateY(20%);
    transition: 200ms ease-in-out opacity,
                200ms ease-in-out transform;
    position: relative;
}
.popup h1 {
    position: absolute;
    top: 4rem;
    right: 2rem;
    line-height: 1;
    cursor: pointer;
    user-select: none;
}
.popup h1:active {
    transform: scale(.9);
}

.showPopup {
    opacity: 1;
    transform: translateY(0);
    pointer-events: all;
}
</style>
    <div class="popup">
        <div class="popup-content">
            <h1 style="color:red;">X</h1>
            
            <a href="offers.php"><img src="assets/img/hero/WEBSITE.jpg"></a>
        </div>
    </div>

    <script>
        const popup = document.querySelector('.popup');
        const x = document.querySelector('.popup-content h1')

        window.addEventListener('load', () => {
            popup.classList.add('showPopup');
            popup.childNodes[1].classList.add('showPopup');
        })
        x.addEventListener('click', () => {
            popup.classList.remove('showPopup');
            popup.childNodes[1].classList.remove('showPopup');
        })
    </script>