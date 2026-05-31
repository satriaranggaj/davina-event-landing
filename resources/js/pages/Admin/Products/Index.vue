<template>
  <div>
    <!-- Header with Create Button -->
    <div class="mb-6 flex justify-between items-center">
      <h2 class="text-xl font-semibold text-gray-900">Daftar Produk</h2>
      <Link
        href="/admin/products/create"
        class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
      >
        + Tambah Produk
      </Link>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-x-auto max-w-[90vw] sm:max-w-full">
      <table class="w-full min-w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Gambar</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Nama</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Kategori</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Harga</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Stok</th>
            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="product in products"
            :key="product.id"
            class="border-b border-gray-200 hover:bg-gray-50 transition"
          >
            <td class="px-6 py-4 text-sm text-gray-900">
              <img v-if="product.image" :src="product.image" :alt="product.name" class="h-12 w-12 object-cover rounded" />
              <div v-else class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">
                No Image
              </div>
            </td>
            <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ product.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ product.category?.name }}</td>
            <td class="px-6 py-4 text-sm text-gray-600">
              Rp {{ formatPrice(product.price_per_unit) }} / {{ product.price_unit }}
            </td>
            <td class="px-6 py-4 text-sm text-gray-600">{{ product.stock }} unit</td>
            <td class="px-6 py-4 text-sm">
              <Link
                :href="`/admin/products/${product.id}/edit`"
                class="text-black hover:text-gray-700 font-medium mr-4"
              >
                Edit
              </Link>
              <button
                @click="deleteProduct(product.id)"
                class="text-red-600 hover:text-red-700 font-medium"
              >
                Hapus
              </button>
            </td>
          </tr>
          <tr v-if="products.length === 0">
            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
              Belum ada produk. Mulai dengan menambahkan produk baru.
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
import { formatPrice } from '@/lib/formatters';

defineOptions({
    layout: AdminLayout,
});

interface Category {
  id: number;
  name: string;
}

interface Product {
  id: number;
  name: string;
  price_per_unit: number;
  price_unit: string;
  stock: number;
  image?: string;
  category?: Category;
}

interface Props {
  products: Product[];
}

defineProps<Props>();

const deleteProduct = (id: number) => {
  if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
    router.delete(`/admin/products/${id}`);
  }
};
</script>
