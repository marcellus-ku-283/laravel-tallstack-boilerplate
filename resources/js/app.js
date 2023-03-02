import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Tooltip from "@ryangjchandler/alpine-tooltip";
Alpine.plugin(Tooltip);

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
