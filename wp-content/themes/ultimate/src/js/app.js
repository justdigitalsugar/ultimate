
const menu = document.querySelector(".menu");
const menuMain = menu.querySelector(".menu-main");
const menuTrigger = document.querySelector(".mobile-menu-trigger");
const goBack = menu.querySelector(".go-back");
const closeMenu = menu.querySelector(".mobile-menu-close");

let subMenu;
menuMain.addEventListener("click", (e) => {
    if(e.target.closest(".menu-item-has-children")){
        const hasChildren = e.target.closest(".menu-item-has-children");
        showSubMenu(hasChildren)
    }
});

goBack.addEventListener("click", () => {
    hideSubMenu();
})

menuTrigger.addEventListener("click", () => {
    toggleMenu();
})

closeMenu.addEventListener("click", () => {
    toggleMenu();
})

document.querySelector(".menu-overlay").addEventListener("click", () => {
    toggleMenu();
})

function toggleMenu(){
    menu.classList.toggle("active");
    document.querySelector(".menu-overlay").classList.toggle("active");
}

function showSubMenu(hasChildren){
    subMenu = hasChildren.querySelector(".sub-menu");
    subMenu.classList.add("active");
    subMenu.style.animation = "slideLeft 0.5s ease forwards";
    //const menuTitle = hasChildren.querySelector("svg").parentNode.childNodes[0].textContent;
    //menu.querySelector(".current-menu-title").innerHTML = menuTitle;
    menu.querySelector(".mobile-menu-head").classList.add("active");
}

function hideSubMenu(){
    subMenu.style.animation= "slideRight 0.5s ease forwards";
    setTimeout(()=>{
        subMenu.classList.remove("active");
    },300);
    menu.querySelector(".current-menu-title").innerHTML = "";
    menu.querySelector(".mobile-menu-head").classList.remove("active");
}

window.onresize = function(){
    if(this.innerWidth > 991){
        if(menu.classList.containes("active")){
            toggleMenu();
        }
    }
}

const contactOpen = document.getElementById('email-slide');
const myBox = document.getElementById('contact-box');
const contactClose = document.getElementById('contact-close');

contactOpen.addEventListener('click', function() {
  myBox.classList.add('show');
});

contactClose.addEventListener('click', function() {
  myBox.classList.remove('show');
});



const toggleoverlay = document.querySelector("#toggle");
const showoverlay = document.querySelector("#searchoverlay");
const closetoggle = document.querySelector("#closetoggle");

if(toggleoverlay){
  closetoggle.addEventListener("click", () => {
  showoverlay.classList.remove("open");
});

toggleoverlay.addEventListener("click", () => {
  showoverlay.classList.toggle("open");
});
}


const togglefilter = document.querySelector("#filtertoggle");
const filterdisplay = document.querySelector("#filterdisplay");

if (document.querySelector("#filtertoggle")) {
  togglefilter.addEventListener("click", () => {
    filterdisplay.classList.toggle("hidden");
  });
}

import Glide from "@glidejs/glide";

const options = {
  type: "carousel",
  animationDuration: 600,
  gap: 0,
};

const carousels = document.querySelectorAll(".carousel");

Object.values(carousels).map((carousel) => {
  new Glide(carousel, {
    type: "carousel",
    animationDuration: "600",
    perView: 4,
    //focusAt: "center",
    breakpoints: {
      768: { perView: 2 },
      1024: { perView: 2 },
    },
  }).mount();
});

if (document.querySelector("#glide01")) {
  new Glide("#glide01", {
    type: "carousel",
    animationDuration: "600",
    perView: 4,
    //focusAt: "center",
    breakpoints: {
      768: { perView: 2 },
      1024: { perView: 2 },
    },
  }).mount();
}

if (document.querySelector("#single-posts")) {
  new Glide("#single-posts", {
    perPage: 3,
    type: "carousel",
    animationDuration: "600",
    perView: 4,
    //focusAt: "center",
    breakpoints: {
      768: { perView: 1 },
      1024: { perView: 2 },
    },
  }).mount();
}

// Popup

import { modalPopup } from "./modules/modal-popup";

modalPopup();

// cookie gallery
import { cookieconsent } from "./modules/cookieconsent";

cookieconsent();

window.addEventListener("load", function () {
  var cookieconsent = initCookieConsent();

  cookieconsent.run({
    gui_options: {
      consent_modal: {
        layout: "cloud", // box/cloud/bar
        position: "bottom center", // bottom/middle/top + left/right/center
        transition: "slide", // zoom/slide
      },
      settings_modal: {
        layout: "box", // box/bar
        // position : 'left',           // left/right
        transition: "slide", // zoom/slide
      },
    },
    current_lang: "en",
    cookie_name: "RJL Cookie",

    onAccept: function () {
      // do something ...
    },

    languages: {
      en: {
        consent_modal: {
          title: "Cookie policy",
          description:
            "Our website uses cookies. By using our website and agreeing to this policy, you consent to our use of cookies in accordance with the terms of this policy.",
          primary_btn: {
            text: "Accept",
            role: "accept_all", //'accept_selected' or 'accept_all'
          },
          secondary_btn: {
            text: "Reject",
            role: "accept_necessary", //'settings' or 'accept_necessary'
          },
        },
        settings_modal: {
          title: "Cookie settings",
          save_settings_btn: "Save settings",
          accept_all_btn: "Accept all",
          reject_all_btn: "Reject all", // optional, [v.2.5.0 +]
          close_btn_label: "Close",
          blocks: [
            {
              title: "Cookie usage",
              description: "Your cookie usage disclaimer",
            },
            {
              title: "Strictly necessary cookies",
              description: "Category description ... ",
              toggle: {
                value: "necessary",
                enabled: false,
                readonly: true,
              },
            },
            {
              title: "Analytics cookies",
              description: "Category description ... ",
              toggle: {
                value: "analytics",
                enabled: false,
                readonly: false,
              },
            },
          ],
        },
      },
    },
  });
});

// FAQs

var linkToggle = document.querySelectorAll(".js-toggle");

var i;

for (i = 0; i < linkToggle.length; i++) {
  linkToggle[i].addEventListener("click", function (event) {
    event.preventDefault();

    var container = this.nextElementSibling;
    var heading = this;

    if (!container.classList.contains("active")) {
      container.classList.add("active");
      container.style.height = "auto";
      heading.classList.add("active");

      var height = container.clientHeight + "px";

      container.style.height = "0px";

      setTimeout(function () {
        container.style.height = height;
      }, 0);
    } else {
      container.style.height = "0px";

      container.addEventListener(
        "transitionend",
        function () {
          container.classList.remove("active");
          heading.classList.remove("active");
        },
        {
          once: true,
        }
      );
    }
  });
}



///////////////////////
// Tab JS
///////////////////////

// Get all tab elements
var $tabButtons = Array.prototype.slice.call(document.querySelectorAll('.js-tab-title'), 0);
var $tabContent = Array.prototype.slice.call(document.querySelectorAll('.tab-content'), 0);

// Check if there are any tabs on the page
if ($tabButtons.length > 0) {

  // Add a click event on each of them
  $tabButtons.forEach(function ($el) {
    $el.addEventListener('click', function () {

      $tabContent.forEach(function (e) {
        e.classList.remove("is-active");
      });

      //Remove active class from other tabs
      $tabButtons.forEach(function ($el) {
        $el.classList.remove("is-active");
      });

      // Get the target from the clicked tab
      var target = $el.dataset.target;
      var $target = document.getElementById(target);

      // Toggle the class on both the tab and the content targetted
      $el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

// typical import
import gsap from "gsap";

// or get other plugins:
import ScrollTrigger from "gsap/ScrollTrigger";
import Draggable from "gsap/Draggable";
import { ExpoScaleEase, RoughEase, SlowMo } from "gsap/EasePack";

gsap.registerPlugin(ScrollTrigger, ExpoScaleEase, RoughEase, SlowMo);

// REVEAL //
gsap.utils.toArray(".generic").forEach(function (elem) {
  ScrollTrigger.create({
    trigger: elem,
    start: "top 80%",
    end: "bottom 20%",
    //markers: true,
    onEnter: function () {
      gsap.fromTo(
        elem,
        { y: 100, autoAlpha: 0 },
        {
          duration: 1.25,
          y: 0,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeave: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    },
    onEnterBack: function () {
      gsap.fromTo(
        elem,
        { y: -100, autoAlpha: 0 },
        {
          duration: 1.25,
          y: 0,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeaveBack: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    }
  });
});

gsap.utils.toArray(".logobox").forEach(function (elem) {
  ScrollTrigger.create({
    trigger: elem,
    start: "top 90%",
    end: "bottom 20%",
    //markers: true,
    onEnter: function () {
      gsap.fromTo(
        elem,
        { x: -100, stagger: 0.2, autoAlpha: 0 },
        {
          duration: 1.25,
          x: 0,
          stagger: 0.2,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeave: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    },
    onEnterBack: function () {
      gsap.fromTo(
        elem,
        { x: -100, stagger: 0.2, autoAlpha: 0 },
        {
          duration: 1.25,
          x: 0,
          stagger: 0.2,
          autoAlpha: 1,
          ease: "back",
          overwrite: "auto"
        }
      );
    },
    onLeaveBack: function () {
      gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
    }
  });
});

// const boxes = gsap.utils.toArray(".logobox");

// boxes.forEach((logobox) => {
//   gsap.from(logobox, {
//     duration: 1,
//     x: "-100%",
//     autoAlpha: 0,
//     ease: "power4.out",
//     scrollTrigger: {
//       trigger: '.trustbox',
//       start: "top 80%",
//       end: "+=100%", // Add this line
//     },
//     stagger: 0.2, // Add this line
//   });
// });

window.addEventListener("scroll", function() {
  var userBanner = document.getElementById("user-banner");
  var scrollPosition = window.scrollY;

  if (scrollPosition > 100) {
    userBanner.style.opacity = "0";
  } else {
    userBanner.style.opacity = "1";
  }
});

