<template>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 v-if="isEdit" class="text-2xl font-bold text-slate-900 dark:text-white">تعديل الرخصة</h1>
            <h1 v-else class="text-2xl font-bold text-slate-900 dark:text-white">إضافة رخصة جديدة</h1>
            <RouterLink :to="{ name: 'licences' }" class="btn btn-secondary">← العودة</RouterLink>
        </div>

        <div class="card p-6">
            <form @submit.prevent="submitForm" class="space-y-6">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">اسم الرخصة
                        *</label>
                    <input v-model="form.title" type="text" class="input" placeholder="مثال: رخصة مزاولة مهنة"
                        required />
                    <p v-if="errors.title" class="text-red-500 text-sm mt-1">{{ errors.title[0] }}</p>
                </div>

                <!-- Licence Number -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">رقم الرخصة
                        *</label>
                    <input v-model="form.licence_number" dir="ltr" type="text" class="input" placeholder="12345678"
                        required />
                    <p v-if="errors.licence_number" class="text-red-500 text-sm mt-1">{{ errors.licence_number[0] }}</p>
                </div>

                <!-- Actions -->
                <div class="flex gap-3 pt-4 border-t">
                    <button type="submit" class="btn btn-primary" :disabled="store.loading">
                        {{ store.loading ? 'جاري الحفظ...' : (isEdit ? 'تحديث' : 'إنشاء') }}
                    </button>
                    <RouterLink :to="{ name: 'licences' }" class="btn btn-secondary">إلغاء</RouterLink>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useLicencesStore } from '../../stores/licences'

const route = useRoute()
const router = useRouter()
const store = useLicencesStore()

const isEdit = computed(() => !!route.params.id)

const form = ref({
    title: '',
    licence_number: '',
})
const errors = ref({})

async function submitForm() {
    errors.value = {}

    let result
    if (isEdit.value) {
        result = await store.updateLicence(route.params.id, form.value)
    } else {
        result = await store.createLicence(form.value)
    }

    if (result.success) {
        router.push({ name: 'licences' })
    } else if (result.errors) {
        errors.value = result.errors
    }
}

onMounted(async () => {
    if (isEdit.value) {
        const res = await store.fetchLicence(route.params.id)
        if (res.success) {
            form.value.title = res.data.title
            form.value.licence_number = res.data.licence_number
        }
    }
})
</script>
