/**
 * API呼び出し用の共通ユーティリティ
 */

import { ApiBase } from './api/base.js';
import { CategoriesApi } from './api/categories.js';
import { ContactsApi } from './api/contacts.js';

export const Api = {
    ...ApiBase,
    ...CategoriesApi,
    ...ContactsApi,
};

if (typeof window !== 'undefined') {
    window.Api = Api;
}
