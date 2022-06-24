require('./bootstrap');

import Alpine from "alpinejs";
import Tooltip from "@ryangjchandler/alpine-tooltip";
import tippy from 'tippy.js';

Alpine.plugin(Tooltip);

window.tippy = tippy;
window.Alpine = Alpine;
window.Alpine.start();
