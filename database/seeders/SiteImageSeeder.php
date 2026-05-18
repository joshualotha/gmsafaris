<?php

namespace Database\Seeders;

use App\Models\SiteImage;
use Illuminate\Database\Seeder;

class SiteImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // ==================== LOGO ====================
            ['key' => 'logo', 'filepath' => 'img/logo.webp', 'alt_text' => 'Golden Memories Safaris Logo', 'category' => 'logo'],
            ['key' => 'logo_png', 'filepath' => 'img/logo.png', 'alt_text' => 'Golden Memories Safaris Logo', 'category' => 'logo'],
            ['key' => 'logo_alt', 'filepath' => 'img/tanzania-safari-logo.webp', 'alt_text' => 'Tanzania Safari Logo', 'category' => 'logo'],

            // ==================== FAVICON ====================
            ['key' => 'favicon', 'filepath' => 'img/logo.webp', 'alt_text' => 'Golden Memories Safaris Favicon', 'category' => 'favicon'],

            // ==================== SOCIAL MEDIA DEFAULTS ====================
            ['key' => 'og_default', 'filepath' => 'img/hero-1.webp', 'alt_text' => 'Golden Memories Safaris - Tanzania Safari', 'category' => 'social'],

            // ==================== HOME PAGE HERO CAROUSEL ====================
            ['key' => 'home_hero_1', 'filepath' => 'img/serengeti-wildlife-safari.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'hero'],
            ['key' => 'home_hero_1_480w', 'filepath' => 'img/serengeti-wildlife-safari-480w.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'hero'],
            ['key' => 'home_hero_1_768w', 'filepath' => 'img/serengeti-wildlife-safari-768w.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'hero'],
            ['key' => 'home_hero_2', 'filepath' => 'img/maasai-people-tanzania.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'hero'],
            ['key' => 'home_hero_2_480w', 'filepath' => 'img/maasai-people-tanzania-480w.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'hero'],
            ['key' => 'home_hero_2_768w', 'filepath' => 'img/maasai-people-tanzania-768w.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'hero'],
            ['key' => 'home_hero_3', 'filepath' => 'img/serengeti-adventure-safari.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'hero'],
            ['key' => 'home_hero_3_480w', 'filepath' => 'img/serengeti-adventure-safari-480w.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'hero'],
            ['key' => 'home_hero_3_768w', 'filepath' => 'img/serengeti-adventure-safari-768w.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'hero'],
            ['key' => 'home_hero_4', 'filepath' => 'img/ngorongoro-crater-safari.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'hero'],
            ['key' => 'home_hero_4_480w', 'filepath' => 'img/ngorongoro-crater-safari-480w.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'hero'],
            ['key' => 'home_hero_4_768w', 'filepath' => 'img/ngorongoro-crater-safari-768w.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'hero'],

            // ==================== HOME PAGE SECTIONS ====================
            ['key' => 'about_section', 'filepath' => 'img/about.webp', 'alt_text' => 'About Golden Memories Safaris', 'category' => 'section'],
            ['key' => 'home_package_1', 'filepath' => 'img/Great-Migration-From-Serengeti.webp', 'alt_text' => 'Great Migration from Serengeti', 'category' => 'section'],
            ['key' => 'home_package_2', 'filepath' => 'img/Ngorongoro-Crater-in-Tanzania.webp', 'alt_text' => 'Ngorongoro Crater in Tanzania', 'category' => 'section'],
            ['key' => 'home_package_3', 'filepath' => 'img/zanzibar-flight.webp', 'alt_text' => 'Zanzibar flight experience', 'category' => 'section'],
            ['key' => 'home_package_4', 'filepath' => 'img/serval-lion.webp', 'alt_text' => 'Lion in Serengeti', 'category' => 'section'],
            ['key' => 'home_destination_serengeti', 'filepath' => 'img/home-serengeti.webp', 'alt_text' => 'Serengeti National Park', 'category' => 'section'],
            ['key' => 'home_destination_ngorongoro', 'filepath' => 'img/home-ngorongoro.webp', 'alt_text' => 'Ngorongoro Crater', 'category' => 'section'],
            ['key' => 'home_destination_tarangire', 'filepath' => 'img/home-tarangire.webp', 'alt_text' => 'Tarangire National Park', 'category' => 'section'],
            ['key' => 'home_destination_manyara', 'filepath' => 'img/home-manyara.webp', 'alt_text' => 'Lake Manyara National Park', 'category' => 'section'],
            ['key' => 'home_destination_kilimanjaro', 'filepath' => 'img/home-kilimanjaro.webp', 'alt_text' => 'Mount Kilimanjaro', 'category' => 'section'],
            ['key' => 'home_destination_zanzibar', 'filepath' => 'img/home-zanzibar.webp', 'alt_text' => 'Zanzibar Beach', 'category' => 'section'],
            ['key' => 'home_booking', 'filepath' => 'img/home-booking.webp', 'alt_text' => 'Book your Tanzania Safari', 'category' => 'section'],
            ['key' => 'home_blog_1', 'filepath' => 'img/home-blog-1.webp', 'alt_text' => 'Tanzania Safari Blog', 'category' => 'section'],
            ['key' => 'home_blog_2', 'filepath' => 'img/home-blog-2.webp', 'alt_text' => 'Tanzania Travel Blog', 'category' => 'section'],
            ['key' => 'home_blog_3', 'filepath' => 'img/home-blog-3.webp', 'alt_text' => 'Safari Adventure Blog', 'category' => 'section'],

            // ==================== PAGE HEADERS ====================
            ['key' => 'about_hero', 'filepath' => 'img/about-hero.webp', 'alt_text' => 'About Golden Memories Safaris', 'category' => 'page_header'],
            ['key' => 'safaris_hero', 'filepath' => 'img/top.webp', 'alt_text' => 'Tanzania Safaris', 'category' => 'page_header'],
            ['key' => 'destinations_hero', 'filepath' => 'img/destinations-hero.webp', 'alt_text' => 'Tanzania Destinations', 'category' => 'page_header'],
            ['key' => 'blog_hero', 'filepath' => 'img/blog-hero.webp', 'alt_text' => 'Tanzania Safari Blog', 'category' => 'page_header'],
            ['key' => 'gallery_hero', 'filepath' => 'img/gallery-hero.webp', 'alt_text' => 'Tanzania Safari Gallery', 'category' => 'page_header'],
            ['key' => 'contact_hero', 'filepath' => 'img/contact-hero.webp', 'alt_text' => 'Contact Golden Memories Safaris', 'category' => 'page_header'],
            ['key' => 'booking_hero', 'filepath' => 'img/booking-hero.webp', 'alt_text' => 'Book Your Tanzania Safari', 'category' => 'page_header'],
            ['key' => 'testimonial_hero', 'filepath' => 'img/testimonial-hero.webp', 'alt_text' => 'Safari Testimonials', 'category' => 'page_header'],
            ['key' => 'zanzibar_hero', 'filepath' => 'img/zanzibar-header.webp', 'alt_text' => 'Zanzibar Beach Holiday', 'category' => 'page_header'],
            ['key' => 'kilimanjaro_hero', 'filepath' => 'img/kilimanjaro-header.webp', 'alt_text' => 'Mount Kilimanjaro Climbing', 'category' => 'page_header'],
            ['key' => 'budget_safari_hero', 'filepath' => 'img/budget-safari-header.webp', 'alt_text' => 'Budget Tanzania Safaris', 'category' => 'page_header'],
            ['key' => 'group_safari_hero', 'filepath' => 'img/group-safari-header.webp', 'alt_text' => 'Group Joining Safaris', 'category' => 'page_header'],
            ['key' => 'luxury_safari_hero', 'filepath' => 'img/luxury-header.webp', 'alt_text' => 'Luxury Tanzania Safaris', 'category' => 'page_header'],
            ['key' => 'trekking_hero', 'filepath' => 'img/kilimanjaro-header.webp', 'alt_text' => 'Mountain Trekking Tanzania', 'category' => 'page_header'],
            ['key' => 'tailored_safari_hero', 'filepath' => 'img/service-tailored.webp', 'alt_text' => 'Tailor Made Safaris', 'category' => 'page_header'],
            ['key' => 'visa_hero', 'filepath' => 'img/visa-header.webp', 'alt_text' => 'Tanzania Visa Information', 'category' => 'page_header'],
            ['key' => 'health_hero', 'filepath' => 'img/health-header.webp', 'alt_text' => 'Health and Safety Tanzania', 'category' => 'page_header'],
            ['key' => 'insurance_hero', 'filepath' => 'img/premium_photo-1672759455710-70c879daf721.avif', 'alt_text' => 'Travel Insurance Tanzania', 'category' => 'page_header'],
            ['key' => 'customs_hero', 'filepath' => 'img/customs-header.webp', 'alt_text' => 'Local Customs Tanzania', 'category' => 'page_header'],
            ['key' => 'privacy_hero', 'filepath' => 'img/bhavani-privacy-policy-banner.webp', 'alt_text' => 'Privacy Policy', 'category' => 'page_header'],
            ['key' => 'terms_hero', 'filepath' => 'img/1659143707.webp', 'alt_text' => 'Terms and Conditions', 'category' => 'page_header'],

            // ==================== ABOUT PAGE CONTENT ====================
            ['key' => 'about_story', 'filepath' => 'img/about-1.webp', 'alt_text' => 'Founders or team members of Golden Memories Safaris in Tanzania', 'category' => 'content'],
            ['key' => 'team_erlend', 'filepath' => 'img/Erlend G.webp', 'alt_text' => 'Erlend G., Founder and Lead Safari Guide', 'category' => 'content'],
            ['key' => 'team_operations', 'filepath' => 'img/about-1.webp', 'alt_text' => 'Operations and Guest Relations Team', 'category' => 'content'],
            ['key' => 'team_driver_guides', 'filepath' => 'img/serval-eland.webp', 'alt_text' => 'Professional Safari Driver-Guides', 'category' => 'content'],

            // ==================== SERVICE PAGES CONTENT ====================
            ['key' => 'budget_safari_main', 'filepath' => 'img/budget-safari-main.webp', 'alt_text' => 'Travelers enjoying a budget safari in Tanzania', 'category' => 'content'],
            ['key' => 'budget_camping', 'filepath' => 'img/budget-camping.webp', 'alt_text' => 'Budget safari campsite setup in Tanzania', 'category' => 'content'],
            ['key' => 'group_safari_main', 'filepath' => 'img/group-safari-main.webp', 'alt_text' => 'Group joining safari in Tanzania', 'category' => 'content'],
            ['key' => 'group_safari_vehicle', 'filepath' => 'img/group-safari-vehicle.webp', 'alt_text' => 'Group safari vehicle', 'category' => 'content'],
            ['key' => 'luxury_main', 'filepath' => 'img/luxury-main.webp', 'alt_text' => 'Luxury safari experience', 'category' => 'content'],
            ['key' => 'luxury_experiences', 'filepath' => 'img/luxury-experiences.webp', 'alt_text' => 'Luxury safari experiences', 'category' => 'content'],
            ['key' => 'trekking_main', 'filepath' => 'img/trekking-main.webp', 'alt_text' => 'Mountain trekking in Tanzania', 'category' => 'content'],
            ['key' => 'trekking_routes', 'filepath' => 'img/trekking-routes.webp', 'alt_text' => 'Trekking routes', 'category' => 'content'],
            ['key' => 'tailored_main', 'filepath' => 'img/tailored-main.webp', 'alt_text' => 'Tailor made safari', 'category' => 'content'],
            ['key' => 'tailored_process', 'filepath' => 'img/tailored-process.webp', 'alt_text' => 'Safari planning process', 'category' => 'content'],
            ['key' => 'zanzibar_main', 'filepath' => 'img/zanzibar-main.webp', 'alt_text' => 'Zanzibar beach holiday', 'category' => 'content'],
            ['key' => 'zanzibar_scuba', 'filepath' => 'img/927136034.webp', 'alt_text' => 'Scuba diving in Zanzibar', 'category' => 'content'],
            ['key' => 'zanzibar_diving', 'filepath' => 'img/Scubadiving-in-Zanzibar3.webp', 'alt_text' => 'Scuba diving in Zanzibar', 'category' => 'content'],
            ['key' => 'health_safety', 'filepath' => 'img/Amani tavel clinic  Salmon Arm.webp', 'alt_text' => 'Travel clinic', 'category' => 'content'],
            ['key' => 'safari_safety', 'filepath' => 'img/safari-safety.webp', 'alt_text' => 'Safari safety', 'category' => 'content'],
            ['key' => 'insurance_doc', 'filepath' => 'img/insurance-doc.webp', 'alt_text' => 'Travel insurance documents', 'category' => 'content'],
            ['key' => 'insurance_plane', 'filepath' => 'img/amref-plane.webp', 'alt_text' => 'AMREF evacuation plane', 'category' => 'content'],
            ['key' => 'insurance_medical', 'filepath' => 'img/pexels-gustavo-fring-7155794-scaled.webp', 'alt_text' => 'Medical consultation', 'category' => 'content'],
            ['key' => 'customs_main', 'filepath' => 'img/pexels-photo-8069744.webp', 'alt_text' => 'Local customs Tanzania', 'category' => 'content'],
            ['key' => 'customs_culture', 'filepath' => 'img/photo-1687422808366-c5b2800c6e98.avif', 'alt_text' => 'Cultural experience Tanzania', 'category' => 'content'],

            // ==================== KILIMANJARO ROUTES ====================
            ['key' => 'route_machame', 'filepath' => 'img/kili-machame.webp', 'alt_text' => 'Machame Route Kilimanjaro', 'category' => 'content'],
            ['key' => 'route_lemosho', 'filepath' => 'img/kili-lemosho.webp', 'alt_text' => 'Lemosho Route Kilimanjaro', 'category' => 'content'],
            ['key' => 'route_marangu', 'filepath' => 'img/kili-marangu.webp', 'alt_text' => 'Marangu Route Kilimanjaro', 'category' => 'content'],
            ['key' => 'route_rongai', 'filepath' => 'img/kili-rongai.webp', 'alt_text' => 'Rongai Route Kilimanjaro', 'category' => 'content'],
            ['key' => 'route_northern', 'filepath' => 'img/kili-northern.webp', 'alt_text' => 'Northern Circuit Route Kilimanjaro', 'category' => 'content'],

            // ==================== VISA PAGE ====================
            ['key' => 'visa_requirements', 'filepath' => 'img/Tanzania-Visa-Requirements-for-Tourists.webp', 'alt_text' => 'Tanzania Visa Requirements for Tourists', 'category' => 'content'],
            ['key' => 'visa_process', 'filepath' => 'img/evisa-process.webp', 'alt_text' => 'Tanzania eVisa application process', 'category' => 'content'],

            // ==================== TESTIMONIALS ====================
            ['key' => 'testimonial_1', 'filepath' => 'img/testimonial-1.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_2', 'filepath' => 'img/testimonial-2.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_3', 'filepath' => 'img/testimonial-3.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_4', 'filepath' => 'img/testimonial-4.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_erlend', 'filepath' => 'img/Erlend G.webp', 'alt_text' => 'Erlend G. testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_sunshine', 'filepath' => 'img/misssunshine.webp', 'alt_text' => 'Misssunshine testimonial', 'category' => 'testimonial'],
            ['key' => 'testimonial_monika', 'filepath' => 'img/Monika U.webp', 'alt_text' => 'Monika U. testimonial', 'category' => 'testimonial'],

            // ==================== DESTINATIONS PAGE CONTENT ====================
            ['key' => 'destinations_ngorongoro_view', 'filepath' => 'img/ngorongoro-viewpoint.webp', 'alt_text' => 'Ngorongoro Crater viewpoint', 'category' => 'content'],

            // ==================== TRIPADVISOR BADGE ====================
            ['key' => 'tripadvisor_badge', 'filepath' => 'img/trip.webp', 'alt_text' => 'TripAdvisor', 'category' => 'content'],

            // ==================== FALLBACK IMAGES ====================
            ['key' => 'hero_fallback_1', 'filepath' => 'img/hero-1.webp', 'alt_text' => 'Safari hero fallback image', 'category' => 'fallback'],
            ['key' => 'hero_fallback_2', 'filepath' => 'img/hero-2.webp', 'alt_text' => 'Safari hero fallback image', 'category' => 'fallback'],
            ['key' => 'hero_fallback_3', 'filepath' => 'img/hero-3.webp', 'alt_text' => 'Destination hero fallback image', 'category' => 'fallback'],
            ['key' => 'hero_fallback_4', 'filepath' => 'img/hero-4.webp', 'alt_text' => 'Hero fallback image', 'category' => 'fallback'],
            ['key' => 'blog_hero_fallback', 'filepath' => 'img/blog-hero.webp', 'alt_text' => 'Blog hero fallback image', 'category' => 'fallback'],

            // ==================== PACKAGE DETAILS PAGE ====================
            ['key' => 'package_hero', 'filepath' => 'img/Great-Migration-From-Serengeti.webp', 'alt_text' => 'Great Migration from Serengeti', 'category' => 'content'],
            ['key' => 'package_gallery_1', 'filepath' => 'img/great-migration-1.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'content'],
            ['key' => 'package_gallery_2', 'filepath' => 'img/great-migration-2.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'content'],
            ['key' => 'package_gallery_3', 'filepath' => 'img/great-migration-3.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'content'],
            ['key' => 'package_gallery_4', 'filepath' => 'img/great-migration-4.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'content'],
        ];

        foreach ($images as $image) {
            SiteImage::create($image);
        }
    }
}
