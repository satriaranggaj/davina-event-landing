<template>
  <div>
    <div class="mb-6 flex justify-between items-center">
      <h2 class="text-xl font-semibold text-gray-900">Daftar Galeri</h2>
      <Link
        href="/admin/gallery/create"
        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
      >
        + Tambah Galeri
      </Link>
    </div>

    <div class="bg-white rounded-lg shadow overflow-x-auto max-w-[90vw] sm:max-w-full">
      <table class="w-full min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Gambar</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Judul</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kategori</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Status</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="gallery in galleries"
            :key="gallery.id"
            class="border-b border-gray-200 hover:bg-gray-50 transition"
          >
            <td class="px-6 py-4 text-sm text-gray-900">
              <img v-if="gallery.image" :src="gallery.image" :alt="gallery.title" class="h-12 w-12 object-cover rounded" />
              <div v-else class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">
                No Image
              </div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-900">{{ gallery.title }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ gallery.category }}</td>
            <td class="px-6 py-4 text-sm">
              <span
                :class="gallery.active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                class="px-3 py-1 rounded-full text-xs font-medium"
              >
                {{ gallery.active ? 'Aktif' : 'Nonaktif' }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm">
              <Link
                :href="`/admin/gallery/${gallery.id}/edit`"
                class="text-black hover:text-gray-700 font-medium mr-4"
              >
                Edit
              </Link>
              <button @click="deleteGallery(gallery.id)" class="text-red-600 hover:text-red-700 font-medium">
                Hapus
              </button>
            </td>
          </tr>
          <tr v-if="galleries.length === 0">
            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
              Belum ada galeri.
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

interface Gallery {
  id: number;
  title: string;
  image?: string;
  category?: string;
  active: boolean;
}

defineProps<{ galleries: Gallery[] }>();

const deleteGallery = (id: number) => {
  if (confirm('Apakah Anda yakin?')) {
    router.delete(`/admin/gallery/${id}`);
  }
};
</script>
