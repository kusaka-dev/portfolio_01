import { ViteEjsPlugin } from 'vite-plugin-ejs';
import sassGlobImports from 'vite-plugin-sass-glob-import';

import { HtmlValidationPlugin } from '../plugins/html-validation.js';
import { ImageValidationPlugin } from '../plugins/image-validation.js';

const IMAGE_SIZE_LIMIT = 1024;

export const plugins = [
    ViteEjsPlugin(),
    sassGlobImports(),
    ImageValidationPlugin(IMAGE_SIZE_LIMIT),
    HtmlValidationPlugin('dist/**/*.html'),
];