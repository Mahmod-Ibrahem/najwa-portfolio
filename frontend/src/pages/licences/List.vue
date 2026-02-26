<template>
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900 dark:text-white">إدارة الرخص</h1>
                <p class="text-slate-600 dark:text-slate-400 mt-1">إضافة وتعديل الرخص</p>
            </div>
            <RouterLink :to="{ name: 'licences.create' }" class="btn btn-primary">
                + إضافة رخصة جديدة
            </RouterLink>
        </div>

        <!-- Loading -->
        <div v-if="store.loading" class="flex items-center justify-center py-12">
            <div class="text-slate-500">جاري تحميل البيانات...</div>
        </div>

        <!-- Table -->
        <div v-else-if="store.licences.length" class="card overflow-hidden">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>العنوان</th>
                            <th>رقم الرخصة</th>
                            <th>تاريخ الإضافة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="licence in store.licences" :key="licence.id">
                            <td class="font-medium">{{ licence.title }}</td>
                            <td dir="ltr" class="text-right">{{ licence.licence_number }}</td>
                            <td>{{ new Date(licence.created_at).toLocaleDateString('ar-SA') }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <RouterLink :to="{ name: 'licences.edit', params: { id: licence.id } }"
                                        class="text-sky-600 hover:text-sky-800 dark:text-sky-400 transition-colors"
                                        title="تعديل">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </RouterLink>
                                    <button @click="openDeleteModal(licence)"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400 transition-colors"
                                        title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Empty State -->
        <div v-else class="card p-12 text-center">
            <div
                class="w-16 h-16 mx-auto mb-4 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h3 class="text-lg font-medium text-slate-900 dark:text-white mb-2">لا توجد رخص</h3>
            <p class="text-slate-600 dark:text-slate-400 mb-4">ابدأ بإضافة رخصة جديدة</p>
            <RouterLink :to="{ name: 'licences.create' }" class="btn btn-primary inline-block">
                + إضافة رخصة جديدة
            </RouterLink>
        </div>

        <!-- Delete Modal -->
        <div v-if="showDeleteModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
            <div class="card p-6 max-w-sm w-full">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">حذف الرخصة</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6">
                    هل أنت متأكد من حذف "{{ selectedItem?.title }}"؟ لا يمكن التراجع.
                </p>
                <div class="flex gap-3 justify-end">
                    <button @click="showDeleteModal = false" class="btn btn-secondary">إلغاء</button>
                    <button @click="confirmDelete" class="btn btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useLicencesStore } from '../../stores/licences'

const store = useLicencesStore()
const showDeleteModal = ref(false)
const selectedItem = ref(null)

function openDeleteModal(item) { selectedItem.value = item; showDeleteModal.value = true }
function confirmDelete() {
    if (selectedItem.value) {
        store.deleteLicence(selectedItem.value.id).then(res => {
            if (res.success) { showDeleteModal.value = false; selectedItem.value = null }
        })
    }
}

onMounted(() => {
    store.fetchLicences()
})
</script>
