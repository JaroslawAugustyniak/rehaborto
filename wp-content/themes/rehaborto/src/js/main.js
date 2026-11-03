import '../styles/main.css';

import { initNav } from './nav.js';
import { initParallax } from './parallax.js';
import { initHelp } from './help.js';
import { initScrollTop } from './scrolltop.js';
import { initCookies } from './cookies.js';

document.addEventListener('DOMContentLoaded', () => {
  initNav();
  initParallax();
  initHelp();
  initScrollTop();
  initCookies();
});
