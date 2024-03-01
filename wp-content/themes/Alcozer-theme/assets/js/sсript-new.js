addEventListener('load', function () {

    pageScrollActive();

    productTextChange();

    productGallery();
})

const filters = document.querySelectorAll(".portfolio-menu button");

filters.forEach((filter) => {
    filter.addEventListener("click", function () {
        // ==== Filter btn toggle
        let filterBtn = filters[0];
        while (filterBtn) {
            if (filterBtn.tagName === "BUTTON") {
                filterBtn.classList.remove("active");
            }
            filterBtn = filterBtn.nextSibling;
        }
        this.classList.add("active");

        // === filter
        let selectedFilter = filter.getAttribute("data-filter");
        let itemsToHide = document.querySelectorAll(
            `.grid .col-lg-4:not([data-filter='${selectedFilter}'])`
        );
        let itemsToShow = document.querySelectorAll(
            `.grid [data-filter='${selectedFilter}']`
        );

        if (selectedFilter == "all") {
            itemsToHide = [];
            itemsToShow = document.querySelectorAll(".grid [data-filter]");
        }

        itemsToHide.forEach((el) => {
            el.classList.add("hide");
            el.classList.remove("show");
        });

        itemsToShow.forEach((el) => {
            el.classList.remove("hide");
            el.classList.add("show");
        });
    });
});

//========= glightbox
const myGallery = GLightbox({
    selector: ".glightbox",
    type: "image",
    width: 900,
});

//===== close navbar-collapse when a  clicked
let navbarTogglerNine = document.querySelector(
    ".navbar-nine .navbar-toggler"
);
navbarTogglerNine.addEventListener("click", function () {
    navbarTogglerNine.classList.toggle("active");
});

// ==== left sidebar toggle
let sidebarLeft = document.querySelector(".sidebar-left");
let overlayLeft = document.querySelector(".overlay-left");
let sidebarClose = document.querySelector(".sidebar-close .close");

overlayLeft.addEventListener("click", function () {
    sidebarLeft.classList.toggle("open");
    overlayLeft.classList.toggle("open");
});
sidebarClose.addEventListener("click", function () {
    sidebarLeft.classList.remove("open");
    overlayLeft.classList.remove("open");
});

// ===== navbar nine sideMenu
let sideMenuLeftNine = document.querySelector(".navbar-nine .menu-bar");

sideMenuLeftNine.addEventListener("click", function () {
    sidebarLeft.classList.add("open");
    overlayLeft.classList.add("open");
});


function pageScrollActive() {
    // Добавляем класс "page-scroll active" к меню, которые имеют подменю
    let menu_elements = navbarNine.querySelectorAll('.menu-item-has-children');

    for (let menu_element of menu_elements) {
        let linkElement = menu_element.querySelector('a');
        linkElement.classList.add('page-scroll', 'active');
        linkElement.dataset.bsToggle = 'collapse';
        linkElement.setAttribute('aria-label', 'Toggle navigation');
        linkElement.setAttribute('aria-expanded', 'false');
        linkElement.setAttribute('aria-controls', `${menu_element.id}-sub`)
        linkElement.dataset.bsTarget = `#${menu_element.id}-sub`;
        let subMenu = menu_element.querySelector('.sub-menu');
        subMenu.classList.add('collapse');
        subMenu.setAttribute('id', `${menu_element.id}-sub`)
    }

    let sidebar = document.querySelector('.sidebar-menu-list');
    sidebar_elements = sidebar.querySelectorAll('.sub-nav-toggler');
    for (let sidebar_element of sidebar_elements) {
        sidebar_element.remove();
    }
}

function productTextChange() {
    //Добавляем класс для текста товаров
    let portfolioArea = document.querySelector('section.portfolio-area.portfolio-one');
    if (!portfolioArea) return //Если нет объекта с каталогом то выходи 
    let cards_text = portfolioArea.querySelectorAll('.portfolio-text p');
    for (let card_text of cards_text) {
        if (card_text.className != 'text') card_text.classList.add('text');
    }
}

function productGallery() {
    // КАРТОЧКА ТОВАРА
    // Сделать карточку активной при нажатии
    let gallery_btns = document.querySelectorAll('.product-thumb-image > div');
    if (gallery_btns.length == 0) {
        return
    }
    else {
        gallery_btns[0].classList.add('active');
        let img = document.querySelector('.product-image-active > .single-image img');
        img.setAttribute('src', `${gallery_btns[0].querySelector('img').getAttribute('src')}`)
        for (let gallery_btn of gallery_btns) {
            gallery_btn.onclick = function () {
                document.querySelector('.product-thumb-image > div.active').classList.remove('active');
                this.classList.add('active');
                console.log()
                img.setAttribute('src', `${this.querySelector('img').getAttribute('src')}`)
            }
        }
    }
    // Вывод выбранного изображения в галерее
    // let gallery = document.querySelector('.product-details-image');

}

