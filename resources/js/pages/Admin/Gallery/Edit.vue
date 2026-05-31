<template>
  <div>
    <div class="mb-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-4">Edit Galeri</h2>
    </div>

    <form @submit.prevent="submitForm" class="max-w-2xl bg-white rounded-lg shadow p-6">
      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Judul</label>
        <input
          v-model="form.title"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
        />
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Gambar</label>
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
        <div v-if="form.errors.image || formErrors.image" class="text-red-600 text-sm mt-1">{{ form.errors.image || formErrors.image }}</div>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Deskripsi</label>
        <textarea
          v-model="form.description"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
          rows="4"
        ></textarea>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium text-gray-900 mb-2">Kategori</label>
        <input
          v-model="form.category"
          type="text"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-transparent text-gray-900"
        />
      </div>

      <div class="mb-6">
        <label class="flex items-center gap-2">
          <input v-model="form.active" type="checkbox" class="rounded" />
          <span class="text-sm font-medium text-gray-900">Aktif</span>
        </label>
      </div>

      <div class="flex gap-3">
        <button
          type="submit"
          class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition font-medium"
        >
          Perbarui
        </button>
        <Link
          href="/admin/gallery"
          class="bg-gray-300 text-gray-900 px-6 py-2 rounded-lg hover:bg-gray-400 transition font-medium"
        >
          Batal
        </Link>
      </div>
    </form>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/layouts/AdminLayout.vue';

defineOptions({
    layout: AdminLayout,
});

interface Gallery {
  id: number;
  title: string;
  image: string;
  description?: string;
  category?: string;
  active: boolean;
}

interface Props {
  gallery: Gallery;
}

const props = defineProps<Props>();

const currentImage = ref(props.gallery.image || '');
const imagePreview = ref<string>('');

interface FormData {
  title: string;
  description: string;
  category: string;
  active: boolean;
  sort_order: number;
  image: File | null;
}

const form = useForm<FormData>({
  title: props.gallery.title,
  description: props.gallery.description || '',
  category: props.gallery.category || '',
  active: props.gallery.active,
  sort_order: 0,
  image: null,
});

const formErrors = ref<Record<string, string>>({});

const handleImageChange = (event: Event) => {
  const input = event.target as HTMLInputElement;
  const file = input.files?.[0];

  if (file) {
    // Check file size (2MB)
    if (file.size > 2 * 1024 * 1024) {
      formErrors.value.image = 'Ukuran file tidak boleh lebih dari 2MB';
      return;
    }

    form.image = file;
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target?.result as string;
    };
    reader.readAsDataURL(file);
    delete formErrors.value.image;
  }
};

const clearImage = () => {
  form.image = null;
  imagePreview.value = '';
};

const submitForm = () => {
  form.put(`/admin/gallery/${props.gallery.id}`, {
    onError: () => {
      formErrors.value = form.errors;
    },
  });
};
</script>
