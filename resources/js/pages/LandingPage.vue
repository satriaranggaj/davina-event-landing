<template>
  <div class="min-h-screen bg-white">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
      <div class="container mx-auto flex items-center justify-between px-4 py-3">
        <div class="flex items-center gap-3">
          <img src="/favicon_io/apple-touch-icon.png" alt="Logo" class="w-full max-w-16" />
          <div>
            <h1 class="text-lg font-bold text-black md:text-2xl">{{ businessName }}</h1>
            <span class="text-xs text-gray-600">{{ service }}</span>
          </div>
        </div>
        <div class="hidden items-center gap-8 md:flex">
          <button
            @click="scrollToSection('hero')"
            :class="activeSection === 'hero' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            Beranda
          </button>
          <button
            @click="scrollToSection('catalog')"
            :class="activeSection === 'catalog' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            Katalog
          </button>
          <button
            @click="scrollToSection('gallery')"
            :class="activeSection === 'gallery' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            Galeri
          </button>
          <button
            @click="scrollToSection('tentang-kami')"
            :class="activeSection === 'tentang-kami' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            Tentang Kami
          </button>
          <button
            @click="scrollToSection('testimonial')"
            :class="activeSection === 'testimonial' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            Testimoni
          </button>
          <button
            @click="scrollToSection('faq')"
            :class="activeSection === 'faq' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="font-medium transition"
          >
            FAQ
          </button>
          <button
            @click="scrollToSection('contact')"
            class="rounded-lg bg-black px-6 py-2 text-white hover:bg-gray-800 font-medium transition"
          >
            Hubungi Kami
          </button>
        </div>
        <button
          @click="mobileMenuOpen = !mobileMenuOpen"
          class="md:hidden text-black"
        >
          <Menu :size="24" />
        </button>
      </div>

      <!-- Mobile Menu -->
      <div
        v-if="mobileMenuOpen"
        class="border-t border-gray-200 bg-white md:hidden"
      >
        <div class="container mx-auto flex flex-col gap-4 px-4 py-4">
          <button
            @click="scrollToSection('hero'); mobileMenuOpen = false"
            :class="activeSection === 'hero' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            Beranda
          </button>
          <button
            @click="scrollToSection('catalog'); mobileMenuOpen = false"
            :class="activeSection === 'catalog' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            Katalog
          </button>
          <button
            @click="scrollToSection('gallery'); mobileMenuOpen = false"
            :class="activeSection === 'gallery' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            Galeri
          </button>
          <button
            @click="scrollToSection('tentang-kami'); mobileMenuOpen = false"
            :class="activeSection === 'tentang-kami' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            Tentang Kami
          </button>
          <button
            @click="scrollToSection('testimonial'); mobileMenuOpen = false"
            :class="activeSection === 'testimonial' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            Testimoni
          </button>
          <button
            @click="scrollToSection('faq'); mobileMenuOpen = false"
            :class="activeSection === 'faq' ? 'text-black font-bold' : 'text-gray-700 hover:text-black'"
            class="text-left font-medium transition"
          >
            FAQ
          </button>
          <button
            @click="scrollToSection('contact'); mobileMenuOpen = false"
            class="rounded-lg bg-black px-6 py-2 text-white hover:bg-gray-800 font-medium transition"
          >
            Hubungi Kami
          </button>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section
      id="hero"
      class="relative bg-gradient-to-br from-white to-gray-50 py-20 md:py-32"
    >
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
          <div class="flex flex-col justify-center">
            <h2 class="mb-4 text-4xl font-bold md:text-5xl text-black">
              Sewa Peralatan Event Lengkap & Terpercaya
            </h2>
            <p class="mb-6 text-lg text-gray-700">
              {{ businessName }} menyediakan layanan sewa peralatan event profesional untuk berbagai jenis acara
              seperti pernikahan, ulang tahun, gathering, dan event kantor.
            </p>
            <div class="flex flex-col gap-4 sm:flex-row">
              <button
                @click="scrollToSection('catalog')"
                class="rounded-lg bg-black px-8 py-3 font-semibold text-white hover:bg-gray-800 transition"
              >
                Lihat Katalog
              </button>
              <button
                @click="openWhatsApp"
                class="flex items-center justify-center gap-2 rounded-lg border-2 border-black px-8 py-3 font-semibold text-black hover:bg-gray-100 transition"
              >
                <MessageCircle :size="20" />
                Konsultasi Gratis
              </button>
            </div>
          </div>
          <div class="flex items-center justify-center">
            <div v-if="featuredProducts.length > 0" class="relative w-full">
              <!-- Product Slider -->
              <div class="relative h-80 w-full bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center overflow-hidden group">
                <img 
                  v-if="featuredProducts[currentProductSlideIndex]?.image" 
                  :key="`product-image-${currentProductSlideIndex}`"
                  :src="featuredProducts[currentProductSlideIndex].image" 
                  :alt="featuredProducts[currentProductSlideIndex].name"
                  class="w-full h-full object-cover product-slider-image"
                />
                <div v-else class="text-gray-400">
                  <Image :size="80" />
                </div>

                <!-- Product Info Overlay -->
                <div 
                  :key="`product-overlay-${currentProductSlideIndex}`"
                  class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 product-slider-overlay"
                >
                  <h4 class="text-white font-bold text-lg mb-1">
                    {{ featuredProducts[currentProductSlideIndex]?.name }}
                  </h4>
                  <p class="text-gray-200 text-sm mb-3 line-clamp-2">
                    {{ featuredProducts[currentProductSlideIndex]?.description }}
                  </p>
                  <div class="flex items-center gap-3">
                    <span class="text-white font-bold">
                      Rp {{ formatPrice(featuredProducts[currentProductSlideIndex]?.price_per_unit) }}
                    </span>
                    <button
                      @click="selectedProduct = featuredProducts[currentProductSlideIndex]; showProductDetail = true"
                      class="bg-white text-black px-4 py-1 rounded text-sm font-semibold hover:bg-gray-200 transition"
                    >
                      Lihat Detail
                    </button>
                  </div>
                </div>

                <!-- Navigation Buttons -->
                <button
                  v-if="featuredProducts.length > 1"
                  @click="prevProductSlide"
                  class="absolute left-4 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full hover:bg-gray-200 transition opacity-0 group-hover:opacity-100 transition-opacity"
                >
                  <ChevronUp :size="24" class="-rotate-90" />
                </button>

                <button
                  v-if="featuredProducts.length > 1"
                  @click="nextProductSlide"
                  class="absolute right-4 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full hover:bg-gray-200 transition opacity-0 group-hover:opacity-100 transition-opacity"
                >
                  <ChevronUp :size="24" class="rotate-90" />
                </button>

                <!-- Slide Indicators -->
                <div v-if="featuredProducts.length > 1" class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2">
                  <button
                    v-for="(_, idx) in featuredProducts"
                    :key="idx"
                    @click="currentProductSlideIndex = idx"
                    :class="idx === currentProductSlideIndex ? 'bg-white' : 'bg-white/50 hover:bg-white/75'"
                    class="w-2 h-2 rounded-full transition"
                  />
                </div>
              </div>
            </div>

            <div v-else class="relative h-80 w-full bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center">
              <Sparkles :size="120" class="text-black opacity-50" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Services Preview -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-12 text-center text-3xl font-bold text-gray-900">
          Layanan Kami
        </h3>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
          <div
            v-for="(service, idx) in services"
            :key="idx"
            class="rounded-xl border border-gray-300 p-8 text-center hover:shadow-lg transition bg-white"
          >
            <component
              :is="getIconComponent(service.icon)"
              :size="48"
              class="mx-auto mb-4 text-black"
            />
            <h4 class="mb-2 text-xl font-semibold text-gray-900">
              {{ service.title }}
            </h4>
            <p class="text-gray-600">
              {{ service.description }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Catalog Section -->
    <section id="catalog" class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-4 text-center text-3xl font-bold text-gray-900">
          Katalog Produk
        </h3>
        <p class="mb-12 text-center text-gray-600">
          Pilih kategori untuk melihat produk yang tersedia
        </p>

        <!-- Category Filter -->
        <div class="mb-8 flex flex-wrap justify-center gap-3">
          <button
            @click="selectedCategory = null"
            :class="
              selectedCategory === null
                ? 'bg-black text-white'
                : 'bg-white text-black hover:bg-gray-200'
            "
            class="rounded-full px-6 py-2 font-medium transition border border-black"
          >
            Semua
          </button>
          <button
            v-for="category in categories"
            :key="category.id"
            @click="selectedCategory = category.id"
            :class="
              selectedCategory === category.id
                ? 'bg-black text-white'
                : 'bg-white text-black hover:bg-gray-200'
            "
            class="rounded-full px-6 py-2 font-medium transition border border-black"
          >
            {{ category.name }}
          </button>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
          <div
            v-for="product in filteredProducts"
            :key="product.id"
            class="overflow-hidden rounded-lg bg-white shadow-md hover:shadow-lg transition cursor-pointer"
          >
            <div
              class="relative h-48 bg-gray-200 flex items-center justify-center overflow-hidden"
              @click="selectedProduct = product; showProductDetail = true"
            >
              <img v-if="product.image" :src="product.image" :alt="product.name" class="w-full h-full object-cover" />
              <Image v-else :size="80" class="text-gray-400" />
              <span class="absolute top-3 right-3 bg-black text-white px-2 py-1 rounded text-xs font-semibold">
                Min: {{ product.minimum_order }} {{ product.price_unit }}
              </span>
            </div>
            <div class="p-4">
              <h4 class="mb-2 text-lg font-semibold text-gray-900">{{ product.name }}</h4>
              <p class="mb-4 text-sm text-gray-600">{{ product.description }}</p>
              <div class="mb-4 flex items-center justify-between">
                <span class="text-lg font-bold text-black">
                  Rp {{ formatPrice(product.price_per_unit) }} / {{ product.price_unit }}
                </span>
              </div>
              <div class="flex gap-2">
                <button
                  @click="addToCart(product, product.minimum_order)"
                  class="flex-1 rounded bg-black px-3 py-2 text-sm text-white hover:bg-gray-800 font-semibold transition flex items-center justify-center gap-1"
                >
                  <ShoppingCart :size="16" />
                  Keranjang
                </button>
                <button
                  @click="selectedProduct = product; showProductDetail = true"
                  class="rounded bg-gray-200 px-3 py-2 text-sm text-black hover:bg-gray-300 transition"
                >
                  <Eye :size="16" />
                </button>
              </div>
            </div>
          </div>
        </div>

        <div v-if="filteredProducts.length === 0" class="py-12 text-center text-gray-500">
          Pilih kategori untuk melihat produk
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="bg-white py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-4 text-center text-3xl font-bold text-gray-900">
          Galeri Kami
        </h3>
        <p class="mb-12 text-center text-gray-600">
          Koleksi dokumentasi instalasi dan event profesional
        </p>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
          <div
            v-for="(gallery, idx) in galleries"
            :key="gallery.id"
            class="overflow-hidden rounded-lg h-64 bg-gray-200 flex items-center justify-center group cursor-pointer"
            @click="openGalleryLightbox(idx)"
          >
            <img :src="gallery.image" :alt="gallery.title" class="w-full h-full object-cover group-hover:scale-105 transition" />
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Lightbox Modal -->
    <div
      v-if="showGalleryLightbox"
      class="fixed inset-0 z-50 bg-black bg-opacity-90 flex items-center justify-center"
      @click.self="closeGalleryLightbox"
    >
      <button
        @click="closeGalleryLightbox"
        class="absolute top-4 right-4 text-white hover:text-gray-300 transition z-10"
      >
        <X :size="32" />
      </button>

      <!-- Main Image -->
      <div class="relative w-full h-full flex items-center justify-center px-4 py-16">
        <img
          :src="currentGalleryImage.image"
          :alt="currentGalleryImage.title"
          class="max-w-full max-h-[70vh] object-contain rounded-lg"
        />

        <!-- Navigation Buttons -->
        <button
          v-if="galleries.length > 1"
          @click="prevGalleryImage"
          class="absolute left-4 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full hover:bg-gray-200 transition"
        >
          <ChevronUp :size="24" class="-rotate-90" />
        </button>

        <button
          v-if="galleries.length > 1"
          @click="nextGalleryImage"
          class="absolute right-4 top-1/2 -translate-y-1/2 bg-white text-black p-2 rounded-full hover:bg-gray-200 transition"
        >
          <ChevronUp :size="24" class="rotate-90" />
        </button>
      </div>

      <!-- Image Info & Counter -->
      <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-70 text-white px-4 py-4">
        <div class="container mx-auto flex items-center justify-between">
          <div>
            <h4 class="text-lg font-semibold">{{ currentGalleryImage.title }}</h4>
            <p v-if="currentGalleryImage.description" class="text-sm text-gray-300">
              {{ currentGalleryImage.description }}
            </p>
          </div>
          <div class="text-sm font-semibold">
            {{ currentGalleryIndex + 1 }} / {{ galleries.length }}
          </div>
        </div>
      </div>
    </div>

    <!-- About Section -->
    <section class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-12 text-center text-3xl font-bold text-gray-900">
          Tentang {{ businessName }}
        </h3>

        <div class="mb-12 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
          <div class="rounded-xl bg-white p-8 text-center shadow-md">
            <Zap :size="40" class="mx-auto mb-4 text-black" />
            <h4 class="mb-2 text-lg font-semibold text-gray-900">
              Respon Sangat Cepat
            </h4>
            <p class="text-gray-600">
              Penawaran diproses dalam hitungan menit. Siap melayani kebutuhan event mendadak.
            </p>
          </div>

          <div class="rounded-xl bg-white p-8 text-center shadow-md">
            <Gem :size="40" class="mx-auto mb-4 text-black" />
            <h4 class="mb-2 text-lg font-semibold text-gray-900">
              Peralatan Berkualitas
            </h4>
            <p class="text-gray-600">
              Semua unit terawat, bersih, dan dicek sebelum pengiriman agar performanya optimal.
            </p>
          </div>

          <div class="rounded-xl bg-white p-8 text-center shadow-md">
            <Users :size="40" class="mx-auto mb-4 text-black" />
            <h4 class="mb-2 text-lg font-semibold text-gray-900">
              Tim Profesional
            </h4>
            <p class="text-gray-600">
              Teknisi berpengalaman memastikan pemasangan rapi, aman, dan sesuai standar event.
            </p>
          </div>

          <div class="rounded-xl bg-white p-8 text-center shadow-md">
            <Truck :size="40" class="mx-auto mb-4 text-black" />
            <h4 class="mb-2 text-lg font-semibold text-gray-900">
              Pengiriman Tepat Waktu
            </h4>
            <p class="text-gray-600">
              Armada siap kirim ke area Jabodebek dengan ketepatan waktu tinggi.
            </p>
          </div>
        </div>

        <div id="tentang-kami" class="rounded-lg border-l-4 border-black bg-gray-50 p-8">
          <h4 class="mb-4 text-2xl font-bold text-black">
            Tentang Kami
          </h4>
          <p class="mb-4 text-gray-700 leading-relaxed">
            Kami menyediakan layanan sewa perlengkapan event lengkap dan terpercaya dengan harga yang
            terjangkau. Fokus utama kami adalah kecepatan, kerapian, dan profesionalitas dalam
            memberikan layanan terbaik untuk berbagai skala acara.
          </p>
          <p class="text-gray-700 leading-relaxed">
            Cocok untuk pernikahan, ulang tahun, sunatan, wisuda, gathering, konser, festival, hingga
            event kantor dengan layanan yang kami berikan selalu memastikan acara Anda berjalan lancar
            dan sukses.
          </p>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonial" class="bg-white py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-4 text-center text-3xl font-bold text-gray-900">
          Apa Kata Klien Kami
        </h3>
        <p class="mb-12 text-center text-gray-600">
          Klien kami percaya pada kualitas dan layanan profesional yang kami berikan
        </p>

        <!-- Testimonials Grid -->
        <div v-if="testimonials.length > 0">
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 mb-8">
            <div
              v-for="(testimonial, idx) in visibleTestimonials"
              :key="`${currentTestimonialIndex}-${testimonial.id}`"
              class="rounded-lg bg-gray-50 p-6 shadow-md transition-all duration-700 opacity-0 animate-fadeIn"
              :style="{ 
                animationDelay: `${idx * 100}ms`,
                animationFillMode: 'forwards'
              }"
            >
              <div class="mb-4 flex gap-1">
                <Star :size="16" class="fill-yellow-400 text-yellow-400" v-for="_ in testimonial.rating" :key="Math.random()" />
              </div>
              <p class="mb-4 italic text-gray-700 line-clamp-4">
                "{{ testimonial.content }}"
              </p>
              <p class="font-semibold text-gray-900">
                — {{ testimonial.client_name }}
              </p>
              <p class="text-sm text-gray-600">
                {{ testimonial.client_role }}
              </p>
            </div>
          </div>

          <!-- Navigation Controls (only show if more than 6 testimonials) -->
          <div v-if="testimonials.length > 6" class="flex items-center justify-center gap-4">
            <button
              @click="prevTestimonial()"
              class="p-2 rounded-full bg-black text-white hover:bg-gray-800 transition"
              aria-label="Previous testimonials"
            >
              <ChevronUp :size="24" class="-rotate-90" />
            </button>

            <div class="text-sm text-gray-600">
              {{ currentTestimonialIndex + 1 }} - {{ Math.min(currentTestimonialIndex + 6, testimonials.length) }} of {{ testimonials.length }}
            </div>

            <button
              @click="nextTestimonial()"
              class="p-2 rounded-full bg-black text-white hover:bg-gray-800 transition"
              aria-label="Next testimonials"
            >
              <ChevronUp :size="24" class="rotate-90" />
            </button>
          </div>
        </div>

        <div v-else class="text-center py-12 text-gray-500">
          Belum ada testimoni
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-4 text-center text-3xl font-bold text-gray-900">
          Pertanyaan yang Sering Diajukan
        </h3>
        <p class="mb-12 text-center text-gray-600">
          Temukan jawaban untuk pertanyaan umum Anda
        </p>

        <div class="max-w-3xl mx-auto space-y-4">
          <div
            v-for="(faq, idx) in faqs"
            :key="faq.id"
            class="rounded-lg bg-white shadow-md overflow-hidden"
          >
            <button
              @click="openFaqIdx = openFaqIdx === idx ? -1 : idx"
              class="w-full px-6 py-4 text-left font-semibold text-gray-900 hover:bg-gray-50 flex justify-between items-center"
            >
              {{ faq.question }}
              <ChevronUp
                v-if="openFaqIdx === idx"
                :size="20"
                class="text-black"
              />
              <ChevronDown v-else :size="20" class="text-gray-600" />
            </button>
            <div
              v-if="openFaqIdx === idx"
              class="px-6 py-4 bg-gray-50 text-gray-700"
            >
              {{ faq.answer }}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Maps Section -->
    <section v-if="mapEmbedCode" id="maps" class="bg-gray-50 py-16">
      <div class="container mx-auto px-4">
        <h3 class="mb-12 text-center text-3xl font-bold text-gray-900">
          Lokasi Kami
        </h3>
        <div class="rounded-lg overflow-hidden shadow-lg">
          <div v-html="mapEmbedCode" class="w-full" style="min-height: 500px;"></div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 py-16 text-gray-300">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 mb-12">
          <!-- Consultation Form -->
          <div>
            <h3 class="mb-6 text-2xl font-bold text-white">Konsultasi Gratis</h3>
            <form @submit.prevent="submitConsultation" class="space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap</label>
                <input
                  v-model="consultationForm.nama"
                  type="text"
                  required
                  class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500 transition"
                  placeholder="Masukkan nama Anda"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Pesan</label>
                <textarea
                  v-model="consultationForm.pesan"
                  required
                  rows="5"
                  class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500 transition resize-none"
                  placeholder="Tulis pesan Anda di sini..."
                />
              </div>
              <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition flex items-center justify-center gap-2"
              >
                <MessageCircle :size="18" />
                Kirim ke WhatsApp
              </button>
            </form>
          </div>

          <!-- Contact Information -->
          <div>
            <h3 class="mb-6 text-2xl font-bold text-white">Informasi Kontak</h3>
            <div class="space-y-4">
              <div v-if="props.phone" class="flex items-start gap-4">
                <Phone :size="24" class="text-blue-500 flex-shrink-0 mt-1" />
                <div>
                  <p class="text-sm font-medium text-gray-400">Telepon</p>
                  <a :href="`tel:${props.phone.replace(/\D/g, '')}`" class="text-white hover:text-blue-400 transition">
                    {{ props.phone }}
                  </a>
                </div>
              </div>
              
              <div v-if="props.whatsappNumber" class="flex items-start gap-4">
                <MessageCircle :size="24" class="text-green-500 flex-shrink-0 mt-1" />
                <div>
                  <p class="text-sm font-medium text-gray-400">WhatsApp</p>
                  <a :href="`https://wa.me/${props.whatsappNumber.replace(/\D/g, '')}`" target="_blank" class="text-white hover:text-green-400 transition">
                    +{{ props.whatsappNumber }}
                  </a>
                </div>
              </div>

              <div v-if="props.email" class="flex items-start gap-4">
                <Mail :size="24" class="text-red-500 flex-shrink-0 mt-1" />
                <div>
                  <p class="text-sm font-medium text-gray-400">Email</p>
                  <a :href="`mailto:${props.email}`" class="text-white hover:text-red-400 transition">
                    {{ props.email }}
                  </a>
                </div>
              </div>

              <div v-if="props.locationLink" class="flex items-start gap-4">
                <MapPin :size="24" class="text-orange-500 flex-shrink-0 mt-1" />
                <div>
                  <p class="text-sm font-medium text-gray-400">Lokasi</p>
                  <a :href="props.locationLink" target="_blank" class="text-white hover:text-orange-400 transition">
                    Lihat di Google Maps
                  </a>
                </div>
              </div>

              <!-- Social Media -->
              <div class="pt-6 border-t border-gray-700">
                <p class="text-sm font-medium text-gray-400 mb-4">Ikuti Kami</p>
                <div class="flex gap-4">
                  <a v-if="props.instagram" :href="props.instagram" target="_blank" class="hover:text-pink-400 transition">
                    Instagram
                  </a>
                  <a v-if="props.facebook" :href="props.facebook" target="_blank" class="hover:text-blue-400 transition">
                    Facebook
                  </a>
                  <a v-if="props.tiktok" :href="props.tiktok" target="_blank" class="hover:text-white transition">
                    TikTok
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="border-t border-gray-700 pt-8 text-center text-sm">
          <p>&copy; 2026 <a href="https://fixcreative.co.id/" target="_blank" class="hover:text-blue-400 transition">Fixcreative.co.id.</a> All rights reserved.</p>
        </div>
      </div>
    </footer>

    <!-- Product Detail Modal -->
    <div
      v-if="showProductDetail && selectedProduct"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
      @click.self="showProductDetail = false"
    >
      <div class="w-full max-w-2xl rounded-lg bg-white p-8 max-h-96 overflow-y-auto">
        <div class="mb-6 flex justify-between items-start">
          <h2 class="text-3xl font-bold text-gray-900">{{ selectedProduct.name }}</h2>
          <button
            @click="showProductDetail = false"
            class="text-gray-500 hover:text-gray-700"
          >
            <X :size="24" />
          </button>
        </div>

        <div class="mb-6 grid grid-cols-2 gap-6">
          <div class="h-48 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
            <img v-if="selectedProduct.image" :src="selectedProduct.image" :alt="selectedProduct.name" class="w-full h-full object-cover" />
            <Image v-else :size="80" class="text-gray-400" />
          </div>

          <div>
            <p class="mb-4 text-gray-700">
              {{ selectedProduct.description }}
            </p>

            <div class="mb-6 rounded-lg bg-gray-100 p-4">
              <h4 class="mb-2 font-semibold text-gray-900">
                Spesifikasi:
              </h4>
              <p class="whitespace-pre-line text-sm text-gray-700">
                {{ selectedProduct.specifications }}
              </p>
            </div>

            <div class="mb-6">
              <p class="text-gray-700">
                <strong>Minimal Pesanan:</strong> {{ selectedProduct.minimum_order }} {{ selectedProduct.price_unit }}
              </p>
              <p class="text-gray-700">
                <strong>Stok Tersedia:</strong> {{ selectedProduct.stock }} unit
              </p>
            </div>

            <div class="mb-4 text-2xl font-bold text-black">
              Rp {{ formatPrice(selectedProduct.price_per_unit) }} / {{ selectedProduct.price_unit }}
            </div>

            <button
              @click="addToCart(selectedProduct, selectedProduct.minimum_order); showProductDetail = false"
              class="w-full rounded-lg bg-black px-6 py-3 font-semibold text-white hover:bg-gray-800 transition flex items-center justify-center gap-2"
            >
              <ShoppingCart :size="20" />
              Tambah ke Keranjang
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Floating Cart Button -->
    <button
      @click="showCart = true"
      v-if="cartCount > 0"
      class="fixed bottom-8 right-8 z-40 bg-black text-white rounded-full p-4 shadow-lg hover:bg-gray-800 transition flex items-center justify-center"
    >
      <div class="relative">
        <ShoppingCart :size="24" />
        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">
          {{ cartCount }}
        </span>
      </div>
    </button>

    <!-- Cart Sidebar -->
    <div
      v-if="showCart"
      class="fixed inset-0 z-50 bg-black bg-opacity-50 transition"
      @click="showCart = false"
    />
    <div
      v-if="showCart"
      class="fixed left-[50%] top-0 bottom-0 z-50 w-full max-w-lg bg-white shadow-lg overflow-y-auto transition transform -translate-x-1/2"
    >
      <div class="sticky top-0 bg-white border-b border-gray-200 p-6 flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-900">Keranjang Belanja</h2>
        <button
          @click="showCart = false"
          class="text-gray-500 hover:text-gray-700"
        >
          <X :size="24" />
        </button>
      </div>

      <div class="p-6">
        <div v-if="cartItems.length === 0" class="text-center py-12 text-gray-500">
          <ShoppingCart :size="48" class="mx-auto mb-4 opacity-50" />
          <p>Keranjang belanja kosong</p>
        </div>

        <div v-else class="space-y-4 mb-6">
          <div
            v-for="item in cartItems"
            :key="item.id"
            class="border border-gray-200 rounded-lg p-4"
          >
            <div class="flex justify-between items-start mb-3">
              <div>
                <h4 class="font-semibold text-gray-900">{{ item.name }}</h4>
                <p class="text-sm text-gray-600">Rp {{ formatPrice(item.price_per_unit) }} / {{ item.price_unit }}</p>
              </div>
              <button
                @click="removeFromCart(item.id)"
                class="text-red-600 hover:text-red-700"
              >
                <Trash2 :size="18" />
              </button>
            </div>

            <div class="flex items-center gap-3 justify-between">
              <div class="flex items-center border border-gray-300 rounded-lg">
                <button
                  @click="updateQuantity(item.id, item.quantity - 1)"
                  class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                >
                  <Minus :size="16" />
                </button>
                <span class="px-4 py-1 font-semibold text-gray-900">{{ item.quantity }}</span>
                <button
                  @click="updateQuantity(item.id, item.quantity + 1)"
                  class="px-3 py-1 text-gray-600 hover:bg-gray-100"
                >
                  <Plus :size="16" />
                </button>
              </div>
              <span class="font-semibold text-black">
                Rp {{ formatPrice(item.price_per_unit * item.quantity) }}
              </span>
            </div>
          </div>
        </div>

        <div v-if="cartItems.length > 0" class="space-y-4 border-t border-gray-200 pt-4">
          <div class="flex justify-between text-lg font-bold text-gray-900">
            <span>Subtotal:</span>
            <span>Rp {{ formatPrice(cartTotal) }}</span>
          </div>
          <div class="flex justify-between text-lg font-bold text-red-600">
            <span>DP Minimal (30%):</span>
            <span>Rp {{ formatPrice(dpAmount) }}</span>
          </div>
          <button
            @click="showCheckoutForm = true; showCart = false"
            class="w-full rounded-lg bg-black text-white px-6 py-3 font-semibold hover:bg-gray-800 transition"
          >
            Lanjut ke Checkout
          </button>
          <button
            @click="clearCart(); showCart = false"
            class="w-full rounded-lg border-2 border-gray-300 text-gray-900 px-6 py-3 font-semibold hover:bg-gray-100 transition"
          >
            Kosongkan Keranjang
          </button>
        </div>
      </div>
    </div>

    <!-- Checkout Form Modal -->
    <div
      v-if="showCheckoutForm"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
      @click.self="showCheckoutForm = false"
    >
      <div class="w-full max-w-2xl rounded-lg bg-white p-8 max-h-[90vh] overflow-y-auto">
        <div class="mb-6 flex justify-between items-start">
          <h2 class="text-3xl font-bold text-gray-900">Form Checkout</h2>
          <button
            @click="showCheckoutForm = false"
            class="text-gray-500 hover:text-gray-700"
          >
            <X :size="24" />
          </button>
        </div>

        <form @submit.prevent="submitCheckout" class="space-y-4">
          <!-- Data Pemesan Section -->
          <div class="border-b border-gray-200 pb-4 mb-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Data Pemesan</h3>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
              <input
                v-model="checkoutForm.nama"
                type="text"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
                placeholder="Masukkan nama lengkap"
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP *</label>
              <input
                v-model="checkoutForm.nomorHp"
                type="tel"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
                placeholder="Contoh: 08123456789"
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Keperluan Acara *</label>
              <input
                v-model="checkoutForm.keperluan"
                type="text"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
                placeholder="Contoh: Pernikahan, Gathering, dll"
              />
            </div>
          </div>

          <!-- Detail Acara Section -->
          <div class="border-b border-gray-200 pb-4 mb-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Detail Acara</h3>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Acara *</label>
              <input
                v-model="checkoutForm.tanggalAcara"
                type="date"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Jam Acara *</label>
              <input
                v-model="checkoutForm.jamAcara"
                type="time"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Acara *</label>
              <textarea
                v-model="checkoutForm.alamatAcara"
                required
                rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black resize-none text-black bg-white"
                placeholder="Masukkan alamat lengkap acara"
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Link Lokasi Acara (Google Maps, dll)</label>
              <input
                v-model="checkoutForm.linkLokasi"
                type="url"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black text-black bg-white"
                placeholder="https://maps.google.com/..."
              />
            </div>

            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan (Opsional)</label>
              <textarea
                v-model="checkoutForm.catatan"
                rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-black resize-none text-black bg-white"
                placeholder="Catatan khusus untuk pesanan Anda"
              />
            </div>
          </div>

          <!-- Order Summary Section -->
          <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Ringkasan Pesanan</h3>
            <div class="space-y-2 mb-3 pb-3 border-b border-gray-200 max-h-32 overflow-y-auto">
              <div v-for="item in cartItems" :key="item.id" class="flex justify-between text-sm">
                <span class="text-gray-700">{{ item.name }} ({{ item.quantity }} {{ item.price_unit }})</span>
                <span class="font-semibold text-gray-900">Rp {{ formatPrice(item.price_per_unit * item.quantity) }}</span>
              </div>
            </div>
            <div class="flex justify-between mb-2">
              <span class="text-gray-700">Total Pesanan:</span>
              <span class="font-bold text-black">Rp {{ formatPrice(cartTotal) }}</span>
            </div>
            <div class="flex justify-between text-red-600 font-bold">
              <span>DP Minimal (30%):</span>
              <span>Rp {{ formatPrice(dpAmount) }}</span>
            </div>
          </div>

          <!-- Payment Info Section -->
          <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
            <h3 class="text-sm font-semibold text-blue-900 mb-2">Informasi Pembayaran</h3>
            <p class="text-sm text-blue-800">
              DP Minimal 30%. Transfer ke {{ props.ownerBankName }} <strong>{{ props.ownerBankAccount }}</strong> a/n <strong>{{ props.ownerName }}</strong>
            </p>
            <p class="text-xs text-blue-700 mt-2">
              Pesanan Anda akan diproses setelah kami menerima DP. Sisanya dapat dibayar sebelum pengiriman atau hari H acara.
            </p>
          </div>

          <!-- Action Buttons -->
          <div class="flex gap-3">
            <button
              type="button"
              @click="showCheckoutForm = false"
              class="flex-1 rounded-lg border-2 border-gray-300 text-gray-900 px-6 py-3 font-semibold hover:bg-gray-100 transition"
            >
              Batal
            </button>
            <button
              type="submit"
              class="flex-1 rounded-lg bg-green-600 text-white px-6 py-3 font-semibold hover:bg-green-700 transition flex items-center justify-center gap-2"
            >
              <MessageCircle :size="20" />
              Kirim ke WhatsApp
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import BlankLayout from '@/layouts/BlankLayout.vue';

export default {
  layout: BlankLayout,
};
</script>

<script setup lang="ts">
import { computed, ref, onMounted, onUnmounted, watch } from 'vue';
import { useCart } from '@/composables/useCart';
import { formatPrice } from '@/lib/formatters';
import {
  Menu,
  MessageCircle,
  Sparkles,
  Image,
  Eye,
  Star,
  ChevronUp,
  ChevronDown,
  Zap,
  Gem,
  Users,
  Truck,
  Package,
  MapPin,
  Clock,
  Phone,
  Mail,
  X,
  ShoppingCart,
  Trash2,
  Plus,
  Minus,
} from 'lucide-vue-next';

interface Category {
  id: number;
  name: string;
  slug: string;
}

interface Product {
  id: number;
  name: string;
  description: string;
  price_per_unit: number;
  price_unit: string;
  minimum_order: number;
  specifications: string;
  stock: number;
  category_id: number;
}

interface Testimonial {
  id: number;
  content: string;
  client_name: string;
  client_role?: string;
  rating: number;
}

interface Faq {
  id: number;
  question: string;
  answer: string;
  category?: string;
}

interface Gallery {
  id: number;
  title: string;
  image: string;
  description?: string;
  category?: string;
}

interface Service {
  id: number;
  title: string;
  description: string;
  icon?: string;
}

interface Props {
  businessName: string;
  service: string;
  categories: Category[];
  featuredProducts: Product[];
  services: Service[];
  galleries: Gallery[];
  testimonials: Testimonial[];
  faqs: Faq[];
  whatsappNumber: string;
  ownerName: string;
  ownerBankAccount: string;
  ownerBankName: string;
  email?: string;
  phone?: string;
  instagram?: string;
  tiktok?: string;
  facebook?: string;
  locationLink?: string;
  mapEmbedCode?: string;
}

const props = defineProps<Props>();

const { cartItems, cartCount, cartTotal, dpAmount, addToCart, removeFromCart, updateQuantity, clearCart } = useCart();

const mobileMenuOpen = ref(false);
const selectedCategory = ref<number | null>(null);
const selectedProduct = ref<Product | null>(null);
const showProductDetail = ref(false);
const openFaqIdx = ref(-1);
const activeSection = ref('hero');
const showCart = ref(false);
const showCheckoutForm = ref(false);
const showGalleryLightbox = ref(false);
const currentGalleryIndex = ref(0);
const currentTestimonialIndex = ref(0);
const currentProductSlideIndex = ref(0);
let autoSlideInterval: ReturnType<typeof setInterval> | null = null;

// Form data for checkout
const checkoutForm = ref({
  nama: '',
  nomorHp: '',
  keperluan: '',
  tanggalAcara: '',
  jamAcara: '',
  alamatAcara: '',
  linkLokasi: '',
  catatan: '',
});

// Consultation form data
const consultationForm = ref({
  nama: '',
  pesan: '',
});

// Computed properties from database (not hardcoded)
const services = computed(() => props.services || []);
const galleries = computed(() => props.galleries || []);
const testimonials = computed(() => props.testimonials || []);
const faqs = computed(() => props.faqs || []);
const featuredProducts = computed(() => props.featuredProducts || []);

const currentGalleryImage = computed(() => {
  return galleries.value[currentGalleryIndex.value] || galleries.value[0];
});

const currentTestimonial = computed(() => {
  return testimonials.value[currentTestimonialIndex.value] || testimonials.value[0];
});

const visibleTestimonials = computed(() => {
  const total = testimonials.value.length;
  if (total <= 6) {
    return testimonials.value;
  }
  
  // Show 6 testimonials at a time, sliding through all
  const startIdx = currentTestimonialIndex.value;
  const visibleCount = 6;
  const result = [];
  
  for (let i = 0; i < visibleCount; i++) {
    const idx = (startIdx + i) % total;
    result.push(testimonials.value[idx]);
  }
  
  return result;
});

const filteredProducts = computed(() => {
  if (selectedCategory.value === null) {
    return props.featuredProducts;
  }
  return (props.featuredProducts as Product[]).filter(
    (p: Product) => p.category_id === selectedCategory.value
  );
});

// Helper function to convert icon string to component
const iconMap: Record<string, any> = {
  'Gem': Gem,
  'Users': Users,
  'Truck': Truck,
  'Zap': Zap,
  'Package': Package,
  'MapPin': MapPin,
  'Clock': Clock,
};

function getIconComponent(iconName?: string) {
  return iconName && iconMap[iconName] ? iconMap[iconName] : Package;
}

function scrollToSection(id: string): void {
  const element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

function openWhatsApp(): void {
  window.open(
    `https://wa.me/${props.whatsappNumber}?text=Halo, saya tertarik dengan layanan sewa peralatan event. Bisa minta informasi lebih lengkap?`,
    '_blank'
  );
}

function submitCheckout(): void {
  // Validate form
  if (!checkoutForm.value.nama || !checkoutForm.value.nomorHp || !checkoutForm.value.alamatAcara) {
    alert('Mohon lengkapi data pemesan (nama, nomor HP, alamat acara)');
    return;
  }

  if (cartItems.value.length === 0) {
    alert('Keranjang belanja kosong');
    return;
  }

  // Build order message
  const orderDetails = cartItems.value
    .map(item => `• ${item.name} - ${item.quantity} ${item.price_unit} - Rp ${(item.price_per_unit * item.quantity).toLocaleString('id-ID')}`)
    .join('\n');

  const message = `
*PESANAN BARU DARI LANDING PAGE*

*Data Pemesan:*
Nama: ${checkoutForm.value.nama}
Nomor HP: ${checkoutForm.value.nomorHp}
Keperluan: ${checkoutForm.value.keperluan}
Tanggal Acara: ${checkoutForm.value.tanggalAcara}
Jam Acara: ${checkoutForm.value.jamAcara}
Alamat: ${checkoutForm.value.alamatAcara}
Link Lokasi: ${checkoutForm.value.linkLokasi || '-'}
Catatan: ${checkoutForm.value.catatan || '-'}

*Detail Pesanan:*
${orderDetails}

*TOTAL: Rp ${cartTotal.value.toLocaleString('id-ID')}*
*DP (30%): Rp ${dpAmount.value.toLocaleString('id-ID')}*

Transfer ke ${props.ownerBankName} ${props.ownerBankAccount} a/n ${props.ownerName}
`;

  window.open(
    `https://wa.me/${props.whatsappNumber}?text=${encodeURIComponent(message.trim())}`,
    '_blank'
  );

  // Clear cart and form
  clearCart();
  checkoutForm.value = {
    nama: '',
    nomorHp: '',
    keperluan: '',
    tanggalAcara: '',
    jamAcara: '',
    alamatAcara: '',
    linkLokasi: '',
    catatan: '',
  };
  showCheckoutForm.value = false;
  showCart.value = false;
}

function submitConsultation(): void {
  // Validate form
  if (!consultationForm.value.nama || !consultationForm.value.pesan) {
    alert('Mohon lengkapi nama dan pesan');
    return;
  }

  const message = `
Nama: ${consultationForm.value.nama}
Pesan: ${consultationForm.value.pesan}
`;

  window.open(
    `https://wa.me/${props.whatsappNumber.replace(/\D/g, '')}?text=${encodeURIComponent(message.trim())}`,
    '_blank'
  );

  // Clear form
  consultationForm.value = {
    nama: '',
    pesan: '',
  };
}

// Gallery Lightbox Functions
function openGalleryLightbox(index: number): void {
  currentGalleryIndex.value = index;
  showGalleryLightbox.value = true;
}

function closeGalleryLightbox(): void {
  showGalleryLightbox.value = false;
}

function prevGalleryImage(): void {
  if (currentGalleryIndex.value === 0) {
    currentGalleryIndex.value = galleries.value.length - 1;
  } else {
    currentGalleryIndex.value--;
  }
}

function nextGalleryImage(): void {
  if (currentGalleryIndex.value === galleries.value.length - 1) {
    currentGalleryIndex.value = 0;
  } else {
    currentGalleryIndex.value++;
  }
}

// Product Slider Functions
function prevProductSlide(): void {
  if (currentProductSlideIndex.value === 0) {
    currentProductSlideIndex.value = featuredProducts.value.length - 1;
  } else {
    currentProductSlideIndex.value--;
  }
}

function nextProductSlide(): void {
  if (currentProductSlideIndex.value === featuredProducts.value.length - 1) {
    currentProductSlideIndex.value = 0;
  } else {
    currentProductSlideIndex.value++;
  }
}

function startProductAutoSlide(): void {
  autoSlideInterval = setInterval(() => {
    nextProductSlide();
  }, 5000);
}
function stopProductAutoSlide(): void {
  if (autoSlideInterval) {
    clearInterval(autoSlideInterval);
    autoSlideInterval = null;
  }
}


// Testimonial Slider Functions
function prevTestimonial(): void {
  const total = testimonials.value.length;
  if (total <= 6) return;
  
  if (currentTestimonialIndex.value === 0) {
    currentTestimonialIndex.value = total - 1;
  } else {
    currentTestimonialIndex.value--;
  }
}

function nextTestimonial(): void {
  const total = testimonials.value.length;
  if (total <= 6) return;
  
  if (currentTestimonialIndex.value === total - 1) {
    currentTestimonialIndex.value = 0;
  } else {
    currentTestimonialIndex.value++;
  }
}

function startTestimonialAutoSlide(): void {
  const total = testimonials.value.length;
  if (total <= 6) return;
  
  autoSlideInterval = setInterval(() => {
    nextTestimonial();
  }, 5000);
}

function stopTestimonialAutoSlide(): void {
  if (autoSlideInterval) {
    clearInterval(autoSlideInterval);
    autoSlideInterval = null;
  }
}

// Initialize with all products (null = show all)
selectedCategory.value = null;

onMounted(() => {
  const sections = ['hero', 'catalog', 'gallery', 'tentang-kami', 'testimonial', 'faq', 'contact'];

  // Intersection Observer
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          activeSection.value = entry.target.id;
        }
      });
    },
    {
      threshold: 0.3,
    }
  );

  sections.forEach((id) => {
    const el = document.getElementById(id);
    if (el) observer.observe(el);
  });

  // Scroll event sebagai fallback
  const handleScroll = () => {
    let currentSection = 'hero';
    
    for (const sectionId of sections) {
      const el = document.getElementById(sectionId);
      if (el && el.getBoundingClientRect().top < window.innerHeight / 2) {
        currentSection = sectionId;
      }
    }
    
    activeSection.value = currentSection;
  };

  // Keyboard navigation untuk gallery lightbox
  const handleKeyDown = (e: KeyboardEvent) => {
    if (!showGalleryLightbox.value) return;
    
    if (e.key === 'ArrowLeft') {
      prevGalleryImage();
    } else if (e.key === 'ArrowRight') {
      nextGalleryImage();
    } else if (e.key === 'Escape') {
      closeGalleryLightbox();
    }
  };

  window.addEventListener('scroll', handleScroll, { passive: true });
  window.addEventListener('keydown', handleKeyDown);

  return () => {
    window.removeEventListener('scroll', handleScroll);
    window.removeEventListener('keydown', handleKeyDown);
  };
});

// Clean up on unmount
onUnmounted(() => {
  stopTestimonialAutoSlide();
});

// Watch testimonials length to start auto-slide when data loads
watch(
  () => props.testimonials?.length,
  (length) => {
    if (length && length > 6) {
      stopTestimonialAutoSlide();
      // Reset index jika melebihi range
      if (currentTestimonialIndex.value >= length) {
        currentTestimonialIndex.value = 0;
      }
      startTestimonialAutoSlide();
    } else if (length && length <= 6) {
      stopTestimonialAutoSlide();
    }
  },
  { immediate: true }
);
// Watch featured products length to start auto-slide when data loads
watch(
  () => props.featuredProducts?.length,
  (length) => {
    if (length && length > 0) {
      stopProductAutoSlide();
      // Reset index jika melebihi range
      if (currentProductSlideIndex.value >= length) {
        currentProductSlideIndex.value = 0;
      }
      startProductAutoSlide();
    } else {
      stopProductAutoSlide();
    }
  },
  { immediate: true }
);
</script>

<style scoped>
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(40px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-40px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes productSlideIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes productSlideOut {
  from {
    opacity: 1;
    transform: scale(1);
  }
  to {
    opacity: 0;
    transform: scale(0.95);
  }
}

.animate-fadeIn {
  animation: fadeInUp 0.6s ease-out forwards;
}

.product-slider-image {
  animation: productSlideIn 0.5s ease-in-out forwards;
}

.product-slider-overlay {
  animation: productSlideIn 0.5s ease-in-out forwards;
}

/* Hover effect untuk cards */
:deep(.bg-gray-50) {
  transition: all 0.3s ease;
}

:deep(.bg-gray-50:hover) {
  transform: translateY(-4px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
}
</style>
