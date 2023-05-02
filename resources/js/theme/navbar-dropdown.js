//
// navbar-dropdown.js
//

import { Dropdown } from 'bootstrap';

const selectors = '.navbar .dropup, .navbar .dropend, .navbar .dropdown, .navbar .dropstart';
const dropdowns = document.querySelectorAll(selectors);
const NAVBAR_BREAKPOINT = 767;

if (window.innerWidth > NAVBAR_BREAKPOINT) {
  dropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
    const instance = new Dropdown(toggle);

    dropdown.addEventListener('mouseenter', () => {
      instance.show();
    });

    dropdown.addEventListener('mouseleave', () => {
      instance.hide();
    });
  });
}
