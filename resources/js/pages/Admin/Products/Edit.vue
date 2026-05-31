<template>
  <div>
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Edit Produk</h2>
    </div>

    <form @submit.prevent="submitForm" class="max-w-2xl bg-white rounded-lg shadow p-6">
      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Kategori</label>
        <select
          v-model="form.category_id"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
        >
          <option value="">Pilih Kategori</option>
          <option v-for="cat in categories" :key="cat.id" :value="cat.id">
            {{ cat.name }}
          </option>
        </select>
        <div v-if="form.errors.category_id" class="text-red-600 text-sm mt-1">{{ form.errors.category_id }}</div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Gambar Produk</label>
        <input
          @change="handleImageChange"
          type="file"
          accept="image/*"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
        />
        <p class="text-gray-500 text-xs mt-1">Format: JPG, PNG. Ukuran maksimal: 2MB</p>
        <div v-if="imagePreview || currentImage" class="mt-3 relative">
          <img :src="imagePreview || currentImage" alt="Preview" class="h-32 w-32 object-cover rounded-lg" />
          <button
            v-if="imagePreview"
            type="button"
            @click="clearImage"
            class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full p-1 hover:bg-red-700"
          >
            ✕
          </button>
        </div>
        <div v-if="form.errors.image" class="text-red-600 text-sm mt-1">{{ form.errors.image }}</div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Nama Produk</label>
        <input
          v-model="form.name"
          @input="updateSlug"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="Masukkan nama produk"
        />
        <div v-if="form.errors.name" class="text-red-600 text-sm mt-1">{{ form.errors.name }}</div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Slug</label>
        <input
          v-model="form.slug"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          placeholder="nama-produk"
        />
        <p v-if="form.name" class="text-gray-500 text-xs mt-1">Auto-generate dari nama (bisa diedit)</p>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Deskripsi</label>
        <textarea
          v-model="form.description"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          rows="4"
          placeholder="Masukkan deskripsi produk"
        ></textarea>
      </div>

      <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
          <label class="block text-sm font-medium text-gray-900 mb-2">Harga Per Unit</label>
          <input
            v-model.number="form.price_per_unit"
            type="number"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
            placeholder="0"
          />
          <div v-if="form.errors.price_per_unit" class="text-red-600 text-sm mt-1">{{ form.errors.price_per_unit }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-900 mb-2">Satuan</label>
          <input
            v-model="form.price_unit"
            type="text"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
            placeholder="hari, pcs, etc."
          />
          <div v-if="form.errors.price_unit" class="text-red-600 text-sm mt-1">{{ form.errors.price_unit }}</div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-6 mb-6">
        <div>
          <label class="block text-sm font-medium text-gray-900 mb-2">Minimal Pemesanan</label>
          <input
            v-model.number="form.minimum_order"
            type="number"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
            placeholder="1"
          />
          <div v-if="form.errors.minimum_order" class="text-red-600 text-sm mt-1">{{ form.errors.minimum_order }}</div>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-900 mb-2">Stok</label>
          <input
            v-model.number="form.stock"
            type="number"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
            placeholder="0"
          />
          <div v-if="form.errors.stock" class="text-red-600 text-sm mt-1">{{ form.errors.stock }}</div>
        </div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Spesifikasi</label>
        <textarea
          v-model="form.specifications"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          rows="3"
          placeholder="Masukkan spesifikasi produk"
        ></textarea>
      </div>

      <div class="flex gap-3">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Perbarui
        </button>
        <Link
          href="/admin/products"
          class="bg-gray-300 text-gray-900 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-medium"
        >
          Batal
        </Link>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref, watch, computed } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

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
  slug: string;
  description?: string;
  price_per_unit: number;
  price_unit: string;
  minimum_order: number;
  category_id: number;
  specifications?: string;
  stock: number;
  image?: string;
}

interface FormData {
  name: string;
  slug: string;
  description: string;
  price_per_unit: number;
  price_unit: string;
  minimum_order: number;
  category_id: number;
  specifications: string;
  stock: number;
  image: File | null;
}

interface Props {
  product: Product;
  categories: Category[];
}

const props = defineProps<Props>();

const currentImage = ref(props.product.image || '');
const imagePreview = ref<string>('');

const form = useForm<FormData>({
  name: props.product.name,
  slug: props.product.slug,
  description: props.product.description || '',
  price_per_unit: props.product.price_per_unit,
  price_unit: props.product.price_unit,
  minimum_order: props.product.minimum_order,
  category_id: props.product.category_id,
  specifications: props.product.specifications || '',
  stock: props.product.stock,
  image: null,
});

// Generate slug from name with duplicate checking (excluding current product)
const generateSlug = async (name: string): Promise<string> => {
  // Convert to slug
  let slug = name
    .toLowerCase()
    .trim()
    .replace(/[^\w\s-]/g, '') // Remove special characters
    .replace(/\s+/g, '-') // Replace spaces with dashes
    .replace(/-+/g, '-'); // Replace multiple dashes with single dash

  // Check if slug already exists (excluding current product)
  const existingSlugs = await fetch('/check-slug', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement)?.content || '',
    },
    body: JSON.stringify({ slug, excludeId: props.product.id }),
  }).then(res => res.json());

  if (existingSlugs.exists) {
    // Generate unique code and append
    const uniqueCode = Math.random().toString(36).substring(2, 8);
    slug = `${slug}-${uniqueCode}`;
  }

  return slug;
};

// Update slug when name changes
const updateSlug = async () => {
  if (form.name.length > 0) {
    form.slug = await generateSlug(form.name);
  }
};

const handleImageChange = (event: Event) => {
  const input = event.target as HTMLInputElement;
  const file = input.files?.[0];

  if (file) {
    // Check file size (2MB)
    if (file.size > 2 * 1024 * 1024) {
      form.setError('image', 'Ukuran file tidak boleh lebih dari 2MB');
      return;
    }

    form.image = file;
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target?.result as string;
    };
    reader.readAsDataURL(file);
  }
};

const clearImage = () => {
  form.image = null;
  imagePreview.value = '';
};

const submitForm = () => {
  form.put(`/admin/products/${props.product.id}`, {
    onError: () => {
      // Errors are automatically handled by useForm
    },
  });
};
</script>
