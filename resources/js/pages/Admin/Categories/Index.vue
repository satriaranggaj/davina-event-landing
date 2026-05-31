<template>
  <div>
    <!-- Header with Create Button -->
    <div class="mb-6 flex justify-between items-center">
      <h2 class="text-xl font-semibold text-gray-900">Daftar Kategori</h2>
      <Link
        href="/admin/categories/create"
        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
      >
        + Tambah Kategori
      </Link>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto max-w-[90vw] sm:max-w-full">
      <table class="w-full min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Urutan</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="category in categories"
            :key="category.id"
            class="border-b border-gray-200 hover:bg-gray-50 transition"
          >
            <td class="px-6 py-4 text-sm text-gray-900">{{ category.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ category.sort_order }}</td>
            <td class="px-6 py-4 text-sm">
              <Link
                :href="`/admin/categories/${category.id}/edit`"
                class="text-black hover:text-gray-700 font-medium mr-4"
              >
                Edit
              </Link>
              <button
                @click="deleteCategory(category.id)"
                class="text-red-600 hover:text-red-700 font-medium"
              >
                Hapus
              </button>
            </td>
          </tr>
          <tr v-if="categories.length === 0">
            <td colspan="3" class="px-6 py-8 text-center text-gray-500">
              Belum ada kategori. Mulai dengan menambahkan kategori baru.
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
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
  categories: Category[];
}

defineProps<Props>();

const deleteCategory = (id: number) => {
  if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
    router.delete(`/admin/categories/${id}`);
  }
};
</script>
