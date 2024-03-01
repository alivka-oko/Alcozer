addEventListener('load', function () {

    pageScrollActive();

    productTextChange();

    productGallery();
})

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
