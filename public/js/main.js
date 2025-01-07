import { initializeCarousels } from './modules/carousel.js';
import { lazyLoadImages } from './modules/lazyLoad.js';
import { setupNavigation } from './modules/navigation.js';

$(document).ready(() => {
    initializeCarousels();
    lazyLoadImages();
    setupNavigation();
});
