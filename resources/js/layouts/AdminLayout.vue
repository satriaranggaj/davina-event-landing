<template>
  <div class="flex min-h-screen bg-gray-50">
    <!-- Sidebar - Desktop -->
    <aside class="hidden md:flex md:w-64 flex-col bg-white border-r border-gray-200 shadow-sm">
      <!-- Logo Section -->
      <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3 mb-2">
          <img src="/favicon_io/apple-touch-icon.png" alt="Logo" class="w-10 h-10 rounded" />
          <div>
            <h2 class="text-lg font-bold text-black">{{ businessName }}</h2>
            <p class="text-xs text-gray-500">Admin Panel</p>
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex-1 mt-6">
        <Link
          href="/dashboard"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('dashboard') }"
        >
          <LayoutDashboard :size="20" />
          <span>Dashboard</span>
        </Link>

        <div class="mt-8 px-6">
          <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">Kelola Konten</h3>
        </div>

        <Link
          href="/admin/categories"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('admin.categories') }"
        >
          <Layers :size="20" />
          <span>Kategori</span>
        </Link>

        <Link
          href="/admin/products"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('admin.products') }"
        >
          <Package :size="20" />
          <span>Produk</span>
        </Link>

        <Link
          href="/admin/gallery"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('admin.gallery') }"
        >
          <Image :size="20" />
          <span>Galeri</span>
        </Link>

        <Link
          href="/admin/testimonials"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('admin.testimonials') }"
        >
          <MessageSquare :size="20" />
          <span>Testimoni</span>
        </Link>

        <Link
          href="/admin/faqs"
          class="flex items-center gap-3 px-6 py-3 text-gray-700 hover:text-black hover:bg-gray-100 transition"
          :class="{ 'bg-gray-100 text-black border-l-4 border-black': isActive('admin.faqs') }"
        >
          <HelpCircle :size="20" />
          <span>FAQ</span>
        </Link>

        <!-- Bottom Section -->
        <div class="mt-8 border-t border-gray-200 pt-4 px-6">
          <Link
            href="/admin/settings/business-info"
            class="flex items-center gap-3 py-3 text-gray-600 hover:text-black transition"
          >
            <Settings :size="20" />
            <span>Pengaturan Bisnis</span>
          </Link>

          <Link
            href="/"
            class="flex items-center gap-3 py-3 text-gray-600 hover:text-black transition"
          >
            <ExternalLink :size="20" />
            <span>Lihat Website</span>
          </Link>
        </div>
      </nav>

      <!-- Logout -->
      <div class="p-6 border-t border-gray-200">
        <Link
          href="/logout"
          method="post"
          class="flex items-center gap-3 w-full px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 rounded transition text-sm"
        >
          <LogOut :size="18" />
          <span>Keluar</span>
        </Link>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
      <!-- Top Bar -->
      <div class="sticky top-0 z-40 bg-white border-b border-gray-200 shadow-sm">
        <div class="px-4 md:px-6 py-3 flex justify-between items-center">
          <!-- Mobile Menu Button -->
          <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="md:hidden text-black hover:bg-gray-100 p-2 rounded transition"
          >
            <Menu v-if="!mobileMenuOpen" :size="24" />
            <X v-else :size="24" />
          </button>

          <!-- Page Title -->
          <div class="flex-1 md:flex-initial">
            <h1 class="text-xl md:text-2xl font-bold text-black">{{ pageTitle }}</h1>
          </div>

          <!-- Top Right Icons -->
          <div class="flex items-center gap-2 md:gap-4">
            <button class="text-gray-600 hover:text-black hover:bg-gray-100 p-2 rounded transition">
              <Bell :size="20" />
            </button>
            <Link href="/dashboard" class="text-gray-600 hover:text-black hover:bg-gray-100 p-2 rounded transition">
              <User :size="20" />
            </Link>
          </div>
        </div>
      </div>

      <!-- Mobile Sidebar -->
      <div
        v-if="mobileMenuOpen"
        class="md:hidden fixed inset-0 top-16 z-50 bg-white border-b border-gray-200 overflow-y-auto"
      >
        <nav class="py-2">
          <Link
            href="/dashboard"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <LayoutDashboard :size="18" />
            <span>Dashboard</span>
          </Link>

          <div class="mt-4 px-4">
            <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-2">Kelola Konten</h3>
          </div>

          <Link
            href="/admin/categories"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <Layers :size="18" />
            <span>Kategori</span>
          </Link>

          <Link
            href="/admin/products"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <Package :size="18" />
            <span>Produk</span>
          </Link>

          <Link
            href="/admin/gallery"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <Image :size="18" />
            <span>Galeri</span>
          </Link>

          <Link
            href="/admin/testimonials"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <MessageSquare :size="18" />
            <span>Testimoni</span>
          </Link>

          <Link
            href="/admin/faqs"
            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:text-black hover:bg-gray-100 transition"
            @click="mobileMenuOpen = false"
          >
            <HelpCircle :size="18" />
            <span>FAQ</span>
          </Link>

          <div class="mt-4 border-t border-gray-200 pt-2 px-4">
            <Link
              href="/admin/settings/business-info"
              class="flex items-center gap-3 py-2 text-gray-600 hover:text-black transition text-sm"
              @click="mobileMenuOpen = false"
            >
              <Settings :size="18" />
              <span>Pengaturan Bisnis</span>
            </Link>

            <Link
              href="/"
              class="flex items-center gap-3 py-2 text-gray-600 hover:text-black transition text-sm"
              @click="mobileMenuOpen = false"
            >
              <ExternalLink :size="18" />
              <span>Lihat Website</span>
            </Link>

            <Link
              href="/logout"
              method="post"
              class="flex items-center gap-3 mt-2 py-2 text-gray-600 hover:text-black transition text-sm"
              @click="mobileMenuOpen = false"
            >
              <LogOut :size="18" />
              <span>Keluar</span>
            </Link>
          </div>
        </nav>
      </div>

      <!-- Page Content -->
      <div class="flex-1 overflow-hidden flex flex-col">
        <div class="flex-1 overflow-auto">
          <div class="px-4 md:px-6 py-6 md:py-8">
            <!-- Flash Messages -->
            <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 font-medium">
              {{ $page.props.flash.success }}
            </div>
            <div v-if="$page.props.flash?.error" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 font-medium">
              {{ $page.props.flash.error }}
            </div>

            <!-- Content with horizontal scroll for tables on mobile -->
            <div class="overflow-x-auto">
              <slot />
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import {
  LayoutDashboard,
  Layers,
  Package,
  Image,
  MessageSquare,
  HelpCircle,
  ExternalLink,
  Bell,
  User,
  Menu,
  X,
  LogOut,
  Settings,
} from 'lucide-vue-next';

const page = usePage();
const mobileMenuOpen = ref(false);

interface Props {
  pageTitle?: string;
  businessName?: string;
}

const props = withDefaults(defineProps<Props>(), {
  pageTitle: 'Admin Dashboard',
  businessName: 'Davina Blower',
});

const currentRoute = computed(() => page.url);

function isActive(routeName: string): boolean {
  return page.component.startsWith(routeName.split('.')[0]);
}
</script>
