<template>
  <div>
    <div class="mb-6 flex justify-between items-center">
      <h2 class="text-xl font-semibold text-gray-900">Daftar Testimoni</h2>
      <Link
        href="/admin/testimonials/create"
        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
      >
        + Tambah Testimoni
      </Link>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto max-w-[90vw] sm:max-w-full">
      <table class="w-full min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Klien</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Rating</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="testimonial in testimonials"
            :key="testimonial.id"
            class="border-b border-gray-200 hover:bg-gray-50 transition"
          >
            <td class="px-6 py-4 text-sm text-gray-900">
              <div class="font-medium">{{ testimonial.client_name }}</div>
              <div class="text-xs text-gray-600">{{ testimonial.client_role }}</div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-600">
              <span class="text-yellow-500">★</span> {{ testimonial.rating }}/5
            </td>
            <td class="px-6 py-4 text-sm">
              <span
                :class="testimonial.active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                class="px-3 py-1 rounded-full text-xs font-medium"
              >
                {{ testimonial.active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm">
              <Link
                :href="`/admin/testimonials/${testimonial.id}/edit`"
                class="text-black hover:text-gray-700 font-medium mr-4"
              >
                Edit
              </Link>
              <button
                @click="deleteTestimonial(testimonial.id)"
                class="text-red-600 hover:text-red-700 font-medium"
              >
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

interface Testimonial {
  id: number;
  client_name: string;
  client_role?: string;
  rating: number;
  active: boolean;
}

defineProps<{ testimonials: Testimonial[] }>();

const deleteTestimonial = (id: number) => {
  if (confirm('Apakah Anda yakin?')) {
    router.delete(`/admin/testimonials/${id}`);
  }
};
</script>
