/**
 * コンタクト関連のAPI
 */

import { ApiBase } from './base.js';

export const ContactsApi = {
    async getContacts(params = {}) {
        return ApiBase.get('/contacts', params);
    },

    async getContact(id) {
        const response = await ApiBase.get(`/contacts/${id}`);
        return response.data || response;
    },

    async createContact(data) {
        return ApiBase.post('/contacts', data);
    },

    async deleteContact(id) {
        return ApiBase.delete(`/contacts/${id}`);
    },
};
