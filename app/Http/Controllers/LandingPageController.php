<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\BusinessInfo;
use Inertia\Inertia;
use Inertia\Response;

class LandingPageController extends Controller
{
    public function index(): Response
    {
        $categories = Category::where('active', true)
            ->orderBy('sort_order')
            ->with(['products' => function ($query) {
                $query->where('active', true)->orderBy('sort_order');
            }])
            ->get();

        $featuredProducts = Product::where('active', true)
            ->orderBy('sort_order')
            ->take(12)
            ->get();

        $services = Service::where('active', true)
            ->orderBy('sort_order')
            ->get();

        $galleries = Gallery::where('active', true)
            ->orderBy('sort_order')
            ->get();

        $testimonials = Testimonial::where('active', true)
            ->orderBy('sort_order')
            ->get();

        $faqs = Faq::where('active', true)
            ->orderBy('sort_order')
            ->get();

        // Get business info from database or use defaults
        $businessInfo = BusinessInfo::first() ?? new BusinessInfo();

        return Inertia::render('LandingPage', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'services' => $services,
            'galleries' => $galleries,
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'businessName' => $businessInfo->business_name ?? 'Davina Blower',
            'service' => $businessInfo->service ?? 'Sewa Blower, AC, Lighting, Catering Gear',
            'whatsappNumber' => $businessInfo->whatsapp_number ?? '6281234567890',
            'ownerName' => $businessInfo->owner_name ?? 'Davina Blower',
            'ownerBankAccount' => $businessInfo->owner_bank_account ?? '1234567890',
            'ownerBankName' => $businessInfo->owner_bank_name ?? 'BCA',
            'email' => $businessInfo->email,
            'phone' => $businessInfo->phone,
            'instagram' => $businessInfo->instagram,
            'tiktok' => $businessInfo->tiktok,
            'facebook' => $businessInfo->facebook,
            'locationLink' => $businessInfo->location_link,
            'mapEmbedCode' => $businessInfo->map_embed_code,
        ]);
    }
}
