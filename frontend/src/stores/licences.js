import { defineStore } from 'pinia'
import api from '../services/api'

export const useLicencesStore = defineStore('licences', {
    state: () => ({
        licences: [],
        loading: false,
    }),
    actions: {
        async fetchLicences() {
            this.loading = true
            try {
                const response = await api.get('v1/licences')
                this.licences = response.data.data
            } catch (error) {
                console.error('Error fetching licences:', error)
            } finally {
                this.loading = false
            }
        },
        async fetchLicence(id) {
            try {
                const response = await api.get(`v1/licences/${id}`)
                return { success: true, data: response.data.data }
            } catch (error) {
                return { success: false, error: error.response?.data?.message || 'Error fetching licence' }
            }
        },
        async createLicence(data) {
            this.loading = true
            try {
                const response = await api.post('/licences', data)
                this.licences.unshift(response.data.data)
                return { success: true }
            } catch (error) {
                return { success: false, errors: error.response?.data?.errors }
            } finally {
                this.loading = false
            }
        },
        async updateLicence(id, data) {
            this.loading = true
            try {
                const response = await api.post(`/licences/${id}`, data)
                const index = this.licences.findIndex(l => l.id == id)
                if (index !== -1) {
                    this.licences[index] = response.data.data
                }
                return { success: true }
            } catch (error) {
                return { success: false, errors: error.response?.data?.errors }
            } finally {
                this.loading = false
            }
        },
        async deleteLicence(id) {
            try {
                await api.delete(`/licences/${id}`)
                this.licences = this.licences.filter(l => l.id !== id)
                return { success: true }
            } catch (error) {
                return { success: false, error: error.response?.data?.message || 'Error deleting licence' }
            }
        }
    }
})
