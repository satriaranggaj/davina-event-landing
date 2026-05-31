<template>
  <div>
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Tambah Kategori Baru</h2>
    </div>

    <form @submit.prevent="submitForm" class="max-w-2xl bg-white rounded-lg shadow p-6">
      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Nama Kategori</label>
        <input
          v-model="form.name"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="Masukkan nama kategori"
        />
        <div v-if="errors.name" class="text-red-600 text-sm mt-1">{{ errors.name }}</div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Urutan</label>
        <div class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 flex items-center">
          #{{ nextSortOrder() }}
        </div>
        <p class="text-gray-500 text-xs mt-1">Urutan akan diisi otomatis</p>
      </div>

      <div class="flex gap-3">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Simpan
        </button>
        <Link
          href="/admin/categories"
          class="bg-gray-300 text-gray-900 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-medium"
        >
          Batal
        </Link>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { reactive, ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineOptions({
    layout: AdminLayout,
});

interface Props {
  categories: Array<{ id: number; name: string; sort_order: number }>;
}

const props = defineProps<Props>();

const form = reactive({
  name: '',
});

const errors = ref<Record<string, string>>({});

// Auto-generate next sort_order for display
const nextSortOrder = () => {
  if (props.categories && props.categories.length > 0) {
    return Math.max(...props.categories.map(c => c.sort_order)) + 1;
  }
  return 1;
};

const submitForm = () => {
  router.post('/admin/categories', form, {
    onError: (err) => {
      errors.value = err;
    },
  });
};
</script>
