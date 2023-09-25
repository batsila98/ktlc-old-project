/**
 * Header
 */
function headerScrollHandler() {
    let header = document.querySelector('#ktlcPage > .header');
    let headerTop = header.querySelector('.header__top');
    let headerNav = header.querySelector('.header__nav');
    let primaryMenuItems = header.querySelectorAll('.header__menuItemLink');
    let anotherConferenceLink = header.querySelector('.header__anotherConferenceLink');

    document.addEventListener("DOMContentLoaded", function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            header.classList.add('header_scrolling');
            headerTop.style.display = 'none';

            if (window.innerWidth > 1200 && !headerNav.classList.contains('header__nav_opened')) {
                primaryMenuItems.forEach(item => {
                    let svgArrow = item.nextElementSibling ? item.nextElementSibling.querySelector('svg path') : false;
                    if (svgArrow) {
                        svgArrow.style.fill = '#555';
                    }

                    item.style.color = '#555';
                });

                anotherConferenceLink.style.color = '#e91e63';
            }
        }
    });

    window.onscroll = function () {
        if (
            document.body.scrollTop > 200 ||
            document.documentElement.scrollTop > 200
        ) {
            header.classList.add('header_scrolling');
            headerTop.style.display = 'none';

            if (window.innerWidth > 1200 && !headerNav.classList.contains('header__nav_opened')) {
                primaryMenuItems.forEach(item => {
                    let svgArrow = item.nextElementSibling ? item.nextElementSibling.querySelector('svg path') : false;
                    if (svgArrow) {
                        svgArrow.style.fill = '#555';
                    }

                    item.style.color = '#555';
                });

                anotherConferenceLink.style.color = '#e91e63';
            }
        } else {
            header.classList.remove('header_scrolling');
            headerTop.style.display = 'block';

            primaryMenuItems.forEach(item => {
                let svgArrow = item.nextElementSibling ? item.nextElementSibling.querySelector('svg path') : false;
                if (svgArrow) {
                    svgArrow.style.fill = '#fff';
                }

                item.style.color = '#fff';
            });

            anotherConferenceLink.style.color = '#fff';
        }
    };
}
headerScrollHandler();

/**
 * Primary Menu
 */
function primaryMenuHandler() {
    // handle menu items / level 1
    let menuItems = document.querySelectorAll('.header__menuItem');

    // handle menu items / level 2
    let subMenuItems = document.querySelectorAll('.header__submenuItem');

    primaryMenuMobileHandler(menuItems, subMenuItems);
}
primaryMenuHandler();

/**
 * Primary Menu Mobile
 */
function primaryMenuMobileHandler(menuItems, subMenuItems) {
    menuItems.forEach(item => {
        let submenu = item.querySelector('.header__submenu');
        let itemButton = item.querySelector('.header__menuItemButton');
        if (!submenu || !itemButton) {
            return;
        }

        let submenuOpenedFlag = false;
        let submenuOpenedCSS = 'display: flex; opacity: 1; visibility: visible;';
        let arrowRotatedCSS = 'transform: rotate(180deg);';

        let submenuClosedCSS = 'display: none; opacity: 0; visibility: hidden;';
        let arrowDefaultCSS = 'transform: rotate(0deg);';

        itemButton.addEventListener('pointerdown', event => {
            submenuOpenedFlag = !submenuOpenedFlag;
            if (submenuOpenedFlag) {
                submenu.style.cssText = submenuOpenedCSS;
                itemButton.querySelector('.header__menuItemArrow').style.cssText = arrowRotatedCSS;
            } else {
                submenu.style.cssText = submenuClosedCSS;
                itemButton.querySelector('.header__menuItemArrow').style.cssText = arrowDefaultCSS;
            }
        });
    });
}

/**
 * Primary Menu Button Open
 */
function primaryMenuButtonOpenHandler() {
    let primaryMenuButtonOpen = document.getElementById('primaryMenuButton');
    if (!primaryMenuButtonOpen) {
        return;
    }

    primaryMenuButtonOpen.addEventListener('pointerdown', function () {
        document.querySelector('.header .header__bottom .header__nav').classList.add('header__nav_opened');
    });
}
primaryMenuButtonOpenHandler();

/**
 * Primary Menu Button close
 */
function primaryMenuButtonCloseHandler() {
    let primaryMenuButtonClose = document.getElementById('primaryMenuButtonClose');
    if (!primaryMenuButtonClose) {
        return;
    }

    primaryMenuButtonClose.addEventListener('pointerdown', function () {
        document.querySelector('.header .header__bottom .header__nav').classList.remove('header__nav_opened');
    });

    let heaaderNav = document.querySelector('.header__nav');

    heaaderNav.addEventListener('pointerdown', function (event) {
        if ((event.target !== event.currentTarget) || !this.classList.contains('header__nav_opened')) {
            return;
        }
        document.querySelector('.header .header__bottom .header__nav').classList.remove('header__nav_opened');
    });
}
primaryMenuButtonCloseHandler();

/**
 * Sponsors Carousel
 */
var swiper = new Swiper(".sponsorsCarousel__carousel", {
    autoplay: {
        delay: 1,
        disableOnInteraction: false,
    },
    direction: 'horizontal',
    loop: true,
    slidesPerView: 6,
    spaceBetween: 60,
    speed: 2000,
    breakpoints: {
        100: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        475: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        600: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 40,
        },
        1300: {
            slidesPerView: 5,
            spaceBetween: 50,
        },
        1600: {
            slidesPerView: 6,
            spaceBetween: 60,
        },
    },
});

/**
 * Section Blog
 */
function sectionBlogAnimations() {
    let blogPosts = document.querySelectorAll('.sectionBlog__post');

    blogPosts.forEach(item => {
        let itemButton = item.querySelector('.sectionBlog__postButton');

        item.addEventListener('pointerenter', event => {
            itemButton.classList.add('sectionBlog__postButton_visible');
        });

        item.addEventListener('pointerleave', event => {
            itemButton.classList.remove('sectionBlog__postButton_visible');
        });
    });
}
sectionBlogAnimations();

/**
 * Page Blog - contentExcerpt
 */
function contentExcerptAnimations() {
    let blogPosts = document.querySelectorAll('.contentExcerpt');

    blogPosts.forEach(item => {
        let itemButton = item.querySelector('.contentExcerpt__postButton');

        item.addEventListener('pointerenter', event => {
            itemButton.classList.add('contentExcerpt__postButton_visible');
        });

        item.addEventListener('pointerleave', event => {
            itemButton.classList.remove('contentExcerpt__postButton_visible');
        });
    });
}
contentExcerptAnimations();


/**
 * Speakers tabs
 */
function speakersTabsHandler() {
    let speakersTabs = document.querySelector('.pageSpeakers__tabs');

    if (!speakersTabs) {
        return;
    }

    let tabsNavButtons = speakersTabs.querySelectorAll('.pageSpeakers__tabsNavButton');

    tabsNavButtons.forEach(item => {
        item.addEventListener('pointerdown', event => {
            if (window.innerWidth > 992) {
                if (item.classList.contains('pageSpeakers__tabsNavButton_active')) {
                    return;
                }

                let prevActiveButton = speakersTabs.querySelector('.pageSpeakers__tabsNavButton_active');
                if (prevActiveButton) {
                    prevActiveButton.classList.remove('pageSpeakers__tabsNavButton_active');
                }

                let prevActiveTab = speakersTabs.querySelector('.pageSpeakers__tabsItem_visible');
                if (prevActiveTab) {
                    prevActiveTab.classList.remove('pageSpeakers__tabsItem_visible');
                }

                let target = item.dataset.target;

                document.getElementById(target).classList.add('pageSpeakers__tabsItem_visible');
                item.classList.add('pageSpeakers__tabsNavButton_active');
                return;
            }

            // Diff tabs and elements for window width less than 992px
            let target = item.dataset.targetmobile;

            if (item.classList.contains('pageSpeakers__tabsNavButton_active')) {
                document.getElementById(target).classList.remove('pageSpeakers__tabsItemMobile_visible');
                item.classList.remove('pageSpeakers__tabsNavButton_active');
                return;
            }

            let prevActiveButton = speakersTabs.querySelector('.pageSpeakers__tabsNavButton_active');
            if (prevActiveButton) {
                prevActiveButton.classList.remove('pageSpeakers__tabsNavButton_active');
            }

            let prevActiveTab = speakersTabs.querySelector('.pageSpeakers__tabsItemMobile_visible');
            if (prevActiveTab) {
                prevActiveTab.classList.remove('pageSpeakers__tabsItemMobile_visible');
            }

            document.getElementById(target).classList.add('pageSpeakers__tabsItemMobile_visible');
            item.classList.add('pageSpeakers__tabsNavButton_active');
        });
    });
}
speakersTabsHandler();

/**
 * Animations
 */
function ktlcGsapAnimateFrom(elem, direction) {
    direction = direction || 1;
    var x = direction * 100,
        y = direction * 100;

    elem.style.transform = "translate(" + x + "px, " + y + "px)";
    elem.style.opacity = "0";
    gsap.fromTo(elem, { x: x, y: y, autoAlpha: 0 }, {
        duration: 1,
        x: 0,
        y: 0,
        autoAlpha: 1,
        ease: "expo",
        overwrite: "auto"
    });
}

function ktlcGsapHide(elem) {
    gsap.set(elem, { autoAlpha: 0 });
}

document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray(".about__feature, .testimonials__item, .sectionAboutTeam__formWrapper, .contentExcerpt, .pageIndex__sidebar, .pageSponsors__sponsor, .pagePartners__partner").forEach(function (elem) {
        ktlcGsapHide(elem); // assure that the element is hidden when scrolled into view

        ScrollTrigger.create({
            trigger: elem,
            onEnter: function () { ktlcGsapAnimateFrom(elem) },
            onEnterBack: function () { ktlcGsapAnimateFrom(elem, -1) },
            onLeave: function () { ktlcGsapHide(elem) } // assure that the element is hidden when scrolled into view
        });
    });
});

/**
 * Handle comment form validation
 */
function commentFormValidation() {
    let commentForm = document.getElementById('commentform');
    if (!commentForm) {
        return;
    }

    commentForm.addEventListener('submit', function (event) {
        let fieldEmail = commentForm.querySelector('input#email');
        let fieldUrl = commentForm.querySelector('input#url');
        if (!fieldEmail && !fieldUrl) {
            return;
        }

        fieldEmail.addEventListener('focus', function () {
            document.getElementById('comment-form-email-not-valid-message').remove();
        });

        fieldUrl.addEventListener('focus', function () {
            document.getElementById('comment-form-url-not-valid-message').remove();
        });

        let isValidEmail = ktlcValidateEmail(fieldEmail.value);
        let isValidURL = ktlcValidateURL(fieldUrl.value);

        if (!isValidEmail) {
            event.preventDefault();

            const node = document.createElement("span");
            const textnode = document.createTextNode("Value is not valid.");
            node.appendChild(textnode);
            node.style.color = '#f00';
            node.id = 'comment-form-email-not-valid-message';
            fieldEmail.closest('.comment-form-email').appendChild(node);

            fieldEmail.style.borderColor = '#f00';
        }

        if (!isValidURL) {
            event.preventDefault();

            const node = document.createElement("span");
            const textnode = document.createTextNode("Value is not valid.");
            node.appendChild(textnode);
            node.style.color = '#f00';
            node.id = 'comment-form-url-not-valid-message';
            fieldUrl.closest('.comment-form-url').appendChild(node);

            fieldUrl.style.borderColor = '#f00';
        }


    });
}
commentFormValidation();

function ktlcValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return true;
    }

    return false;
}

function ktlcValidateURL(str) {
    let pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
    return !!pattern.test(str);
}

/**
 * Sponsors read more
 */
const ktlcSlideDown = element => element.style.height = `${element.scrollHeight}px`;

function sponsorReadMoreHandler() {
    let buttons = document.querySelectorAll('.pageSponsors__sponsorDescButton');
    if (buttons.length <= 0) {
        return;
    }

    buttons.forEach(item => {
        item.addEventListener('pointerdown', event => {
            ktlcSlideDown(item.closest('.pageSponsors__sponsorDescription'));
            item.style.display = 'none';
        });
    });
}
sponsorReadMoreHandler();

/**
 * Partners read more
 */

function partnerReadMoreHandler() {
    let buttons = document.querySelectorAll('.pagePartners__partnerDescButton');
    if (buttons.length <= 0) {
        return;
    }

    buttons.forEach(item => {
        item.addEventListener('pointerdown', event => {
            ktlcSlideDown(item.closest('.pagePartners__partnerDescription'));
            item.style.display = 'none';
        });
    });
}
partnerReadMoreHandler();