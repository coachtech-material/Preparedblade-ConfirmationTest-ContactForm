/**
 * 管理画面用のJavaScript（初期化と統合）
 */

import { getUrlParams, setFormValues } from './url-params-manager.js';
import { loadCategories } from './category-select-loader.js';
import { loadContacts, setDetailButtonCallback } from './contact-list-renderer.js';
import { setupDetailButtons, initModal } from './contact-detail-modal.js';
import { initSearchForm } from './search-form-handler.js';

document.addEventListener('DOMContentLoaded', function() {
    const currentParams = getUrlParams();
    setFormValues(currentParams);

    setDetailButtonCallback(setupDetailButtons);

    initModal();
    initSearchForm();

    loadCategories();
    loadContacts();
});
