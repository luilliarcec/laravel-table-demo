require('./bootstrap');

import Alpine from "alpinejs";
import Tooltip from "@ryangjchandler/alpine-tooltip";
import flatpickr from "flatpickr";
import es from "flatpickr/dist/l10n/es.js";
import tippy from 'tippy.js';
import {createPopper} from "@popperjs/core";

Alpine.plugin(Tooltip);
window.createPopper = createPopper;
window.flatpickr = flatpickr;
window.flatpickr.localize(es)
window.tippy = tippy;
window.Alpine = Alpine;
window.Alpine.start();

localStorage.theme = 'dark'

if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}
