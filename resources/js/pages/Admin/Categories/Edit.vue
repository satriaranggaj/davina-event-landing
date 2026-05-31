<template>
  <div>
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Edit Kategori</h2>
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
        <input
          v-model.number="form.sort_order"
          type="number"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="0"
        />
      </div>

      <div class="flex gap-3">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Perbarui
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
import { reactive, ref, watch } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineOptions({
    layout: AdminLayout,
});

interface Category {
  id: number;
  name: string;
  sort_order: number;
}

interface Props {
  category: Category;
}

const props = defineProps<Props>();

const form = reactive({
  name: props.category.name,
  sort_order: props.category.sort_order,
});

const errors = ref<Record<string, string>>({});

const submitForm = () => {
  router.put(`/admin/categories/${props.category.id}`, form, {
    onError: (err) => {
      errors.value = err;
    },
  });
};
</script>
