<template>
  <div>
    <div class="mb-6 flex justify-between items-center">
      <h2 class="text-xl font-semibold text-gray-900">Daftar FAQ</h2>
      <Link
        href="/admin/faqs/create"
        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
      >
        + Tambah FAQ
      </Link>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto max-w-[90vw] sm:max-w-full">
      <table class="w-full min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Pertanyaan</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kategori</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="faq in faqs"
            :key="faq.id"
            class="border-b border-gray-200 hover:bg-gray-50 transition"
          >
            <td class="px-6 py-4 text-sm text-gray-900">{{ faq.question }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ faq.category }}</td>
            <td class="px-6 py-4 text-sm">
              <span
                :class="faq.active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                class="px-3 py-1 rounded-full text-xs font-medium"
              >
                {{ faq.active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm">
              <Link
                :href="`/admin/faqs/${faq.id}/edit`"
                class="text-black hover:text-gray-700 font-medium mr-4"
              >
                Edit
              </Link>
              <button @click="deleteFaq(faq.id)" class="text-red-600 hover:text-red-700 font-medium">
                Hapus
              </button>
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

interface Faq {
  id: number;
  question: string;
  category?: string;
  active: boolean;
}

defineProps<{ faqs: Faq[] }>();

const deleteFaq = (id: number) => {
  if (confirm('Apakah Anda yakin?')) {
    router.delete(`/admin/faqs/${id}`);
  }
};
</script>
