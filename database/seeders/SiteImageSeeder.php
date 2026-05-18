<?php

namespace Database\Seeders;

use App\Models\SiteImage;
use Illuminate\Database\Seeder;

class SiteImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            // ==================== GLOBAL (All Pages) ====================
            ['key' => 'logo', 'filepath' => 'img/logo.webp', 'alt_text' => 'Golden Memories Safaris Logo', 'category' => 'global'],
            ['key' => 'logo_png', 'filepath' => 'img/logo.png', 'alt_text' => 'Golden Memories Safaris Logo', 'category' => 'global'],
            ['key' => 'logo_alt', 'filepath' => 'img/tanzania-safari-logo.webp', 'alt_text' => 'Tanzania Safari Logo', 'category' => 'global'],
            ['key' => 'favicon', 'filepath' => 'img/logo.webp', 'alt_text' => 'Golden Memories Safaris Favicon', 'category' => 'global'],
            ['key' => 'og_default', 'filepath' => 'img/hero-1.webp', 'alt_text' => 'Golden Memories Safaris - Tanzania Safari', 'category' => 'global'],
            ['key' => 'hero_fallback_1', 'filepath' => 'img/hero-1.webp', 'alt_text' => 'Safari hero fallback image', 'category' => 'global'],
            ['key' => 'hero_fallback_2', 'filepath' => 'img/hero-2.webp', 'alt_text' => 'Safari hero fallback image', 'category' => 'global'],
            ['key' => 'hero_fallback_3', 'filepath' => 'img/hero-3.webp', 'alt_text' => 'Destination hero fallback image', 'category' => 'global'],
            ['key' => 'hero_fallback_4', 'filepath' => 'img/hero-4.webp', 'alt_text' => 'Hero fallback image', 'category' => 'global'],
            ['key' => 'blog_hero_fallback', 'filepath' => 'img/blog-hero.webp', 'alt_text' => 'Blog hero fallback image', 'category' => 'global'],

            // ==================== HOME PAGE ====================
            ['key' => 'home_hero_1', 'filepath' => 'img/serengeti-wildlife-safari.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'home'],
            ['key' => 'home_hero_1_480w', 'filepath' => 'img/serengeti-wildlife-safari-480w.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'home'],
            ['key' => 'home_hero_1_768w', 'filepath' => 'img/serengeti-wildlife-safari-768w.webp', 'alt_text' => 'Tanzania Wildlife Safari Encounter in Serengeti National Park', 'category' => 'home'],
            ['key' => 'home_hero_2', 'filepath' => 'img/maasai-people-tanzania.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'home'],
            ['key' => 'home_hero_2_480w', 'filepath' => 'img/maasai-people-tanzania-480w.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'home'],
            ['key' => 'home_hero_2_768w', 'filepath' => 'img/maasai-people-tanzania-768w.webp', 'alt_text' => 'Maasai People Tanzania Cultural Experience', 'category' => 'home'],
            ['key' => 'home_hero_3', 'filepath' => 'img/serengeti-adventure-safari.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'home'],
            ['key' => 'home_hero_3_480w', 'filepath' => 'img/serengeti-adventure-safari-480w.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'home'],
            ['key' => 'home_hero_3_768w', 'filepath' => 'img/serengeti-adventure-safari-768w.webp', 'alt_text' => 'Serengeti Safari Adventure Wildlife Viewing', 'category' => 'home'],
            ['key' => 'home_hero_4', 'filepath' => 'img/ngorongoro-crater-safari.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'home'],
            ['key' => 'home_hero_4_480w', 'filepath' => 'img/ngorongoro-crater-safari-480w.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'home'],
            ['key' => 'home_hero_4_768w', 'filepath' => 'img/ngorongoro-crater-safari-768w.webp', 'alt_text' => 'Ngorongoro Crater Safari Vehicle Wildlife Viewing', 'category' => 'home'],
            ['key' => 'about_section', 'filepath' => 'img/about.webp', 'alt_text' => 'About Golden Memories Safaris', 'category' => 'home'],
            ['key' => 'home_package_1', 'filepath' => 'img/Great-Migration-From-Serengeti.webp', 'alt_text' => 'Great Migration from Serengeti', 'category' => 'home'],
            ['key' => 'home_package_2', 'filepath' => 'img/Ngorongoro-Crater-in-Tanzania.webp', 'alt_text' => 'Ngorongoro Crater in Tanzania', 'category' => 'home'],
            ['key' => 'home_package_3', 'filepath' => 'img/zanzibar-flight.webp', 'alt_text' => 'Zanzibar flight experience', 'category' => 'home'],
            ['key' => 'home_package_4', 'filepath' => 'img/serval-lion.webp', 'alt_text' => 'Lion in Serengeti', 'category' => 'home'],
            ['key' => 'home_destination_serengeti', 'filepath' => 'img/home-serengeti.webp', 'alt_text' => 'Serengeti National Park', 'category' => 'home'],
            ['key' => 'home_destination_ngorongoro', 'filepath' => 'img/home-ngorongoro.webp', 'alt_text' => 'Ngorongoro Crater', 'category' => 'home'],
            ['key' => 'home_destination_tarangire', 'filepath' => 'img/home-tarangire.webp', 'alt_text' => 'Tarangire National Park', 'category' => 'home'],
            ['key' => 'home_destination_manyara', 'filepath' => 'img/home-manyara.webp', 'alt_text' => 'Lake Manyara National Park', 'category' => 'home'],
            ['key' => 'home_destination_kilimanjaro', 'filepath' => 'img/home-kilimanjaro.webp', 'alt_text' => 'Mount Kilimanjaro', 'category' => 'home'],
            ['key' => 'home_destination_zanzibar', 'filepath' => 'img/home-zanzibar.webp', 'alt_text' => 'Zanzibar Beach', 'category' => 'home'],
            ['key' => 'home_booking', 'filepath' => 'img/home-booking.webp', 'alt_text' => 'Book your Tanzania Safari', 'category' => 'home'],
            ['key' => 'home_blog_1', 'filepath' => 'img/home-blog-1.webp', 'alt_text' => 'Tanzania Safari Blog', 'category' => 'home'],
            ['key' => 'home_blog_2', 'filepath' => 'img/home-blog-2.webp', 'alt_text' => 'Tanzania Travel Blog', 'category' => 'home'],
            ['key' => 'home_blog_3', 'filepath' => 'img/home-blog-3.webp', 'alt_text' => 'Safari Adventure Blog', 'category' => 'home'],

            // ==================== ABOUT PAGE ====================
            ['key' => 'about_hero', 'filepath' => 'img/about-hero.webp', 'alt_text' => 'About Golden Memories Safaris', 'category' => 'about'],
            ['key' => 'about_story', 'filepath' => 'img/about-1.webp', 'alt_text' => 'Founders or team members of Golden Memories Safaris in Tanzania', 'category' => 'about'],
            ['key' => 'team_erlend', 'filepath' => 'img/Erlend G.webp', 'alt_text' => 'Erlend G., Founder and Lead Safari Guide', 'category' => 'about'],
            ['key' => 'team_operations', 'filepath' => 'img/about-1.webp', 'alt_text' => 'Operations and Guest Relations Team', 'category' => 'about'],
            ['key' => 'team_driver_guides', 'filepath' => 'img/serval-eland.webp', 'alt_text' => 'Professional Safari Driver-Guides', 'category' => 'about'],

            // ==================== SAFARIS PAGE ====================
            ['key' => 'safaris_hero', 'filepath' => 'img/top.webp', 'alt_text' => 'Tanzania Safaris', 'category' => 'safaris'],

            // ==================== DESTINATIONS PAGE ====================
            ['key' => 'destinations_hero', 'filepath' => 'img/destinations-hero.webp', 'alt_text' => 'Tanzania Destinations', 'category' => 'destinations'],
            ['key' => 'destinations_ngorongoro_view', 'filepath' => 'img/ngorongoro-viewpoint.webp', 'alt_text' => 'Ngorongoro Crater viewpoint', 'category' => 'destinations'],

            // ==================== GALLERY PAGE ====================
            ['key' => 'gallery_hero', 'filepath' => 'img/gallery-hero.webp', 'alt_text' => 'Tanzania Safari Gallery', 'category' => 'gallery'],

            // ==================== BLOG PAGES ====================
            ['key' => 'blog_hero', 'filepath' => 'img/blog-hero.webp', 'alt_text' => 'Tanzania Safari Blog', 'category' => 'blog'],

            // ==================== CONTACT PAGE ====================
            ['key' => 'contact_hero', 'filepath' => 'img/contact-hero.webp', 'alt_text' => 'Contact Golden Memories Safaris', 'category' => 'contact'],

            // ==================== BOOKING PAGES ====================
            ['key' => 'booking_hero', 'filepath' => 'img/booking-hero.webp', 'alt_text' => 'Book Your Tanzania Safari', 'category' => 'booking'],

            // ==================== TESTIMONIALS PAGE ====================
            ['key' => 'testimonial_hero', 'filepath' => 'img/testimonial-hero.webp', 'alt_text' => 'Safari Testimonials', 'category' => 'testimonials'],
            ['key' => 'testimonial_1', 'filepath' => 'img/testimonial-1.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_2', 'filepath' => 'img/testimonial-2.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_3', 'filepath' => 'img/testimonial-3.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_4', 'filepath' => 'img/testimonial-4.webp', 'alt_text' => 'Safari testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_erlend', 'filepath' => 'img/Erlend G.webp', 'alt_text' => 'Erlend G. testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_sunshine', 'filepath' => 'img/misssunshine.webp', 'alt_text' => 'Misssunshine testimonial', 'category' => 'testimonials'],
            ['key' => 'testimonial_monika', 'filepath' => 'img/Monika U.webp', 'alt_text' => 'Monika U. testimonial', 'category' => 'testimonials'],
            ['key' => 'tripadvisor_badge', 'filepath' => 'img/trip.webp', 'alt_text' => 'TripAdvisor', 'category' => 'testimonials'],

            // ==================== SERVICE: ZANZIBAR ====================
            ['key' => 'zanzibar_hero', 'filepath' => 'img/zanzibar-header.webp', 'alt_text' => 'Zanzibar Beach Holiday', 'category' => 'zanzibar'],
            ['key' => 'zanzibar_main', 'filepath' => 'img/zanzibar-main.webp', 'alt_text' => 'Zanzibar beach holiday', 'category' => 'zanzibar'],
            ['key' => 'zanzibar_scuba', 'filepath' => 'img/927136034.webp', 'alt_text' => 'Scuba diving in Zanzibar', 'category' => 'zanzibar'],
            ['key' => 'zanzibar_diving', 'filepath' => 'img/Scubadiving-in-Zanzibar3.webp', 'alt_text' => 'Scuba diving in Zanzibar', 'category' => 'zanzibar'],

            // ==================== SERVICE: KILIMANJARO ====================
            ['key' => 'kilimanjaro_hero', 'filepath' => 'img/kilimanjaro-header.webp', 'alt_text' => 'Mount Kilimanjaro Climbing', 'category' => 'kilimanjaro'],
            ['key' => 'route_machame', 'filepath' => 'img/kili-machame.webp', 'alt_text' => 'Machame Route Kilimanjaro', 'category' => 'kilimanjaro'],
            ['key' => 'route_lemosho', 'filepath' => 'img/kili-lemosho.webp', 'alt_text' => 'Lemosho Route Kilimanjaro', 'category' => 'kilimanjaro'],
            ['key' => 'route_marangu', 'filepath' => 'img/kili-marangu.webp', 'alt_text' => 'Marangu Route Kilimanjaro', 'category' => 'kilimanjaro'],
            ['key' => 'route_rongai', 'filepath' => 'img/kili-rongai.webp', 'alt_text' => 'Rongai Route Kilimanjaro', 'category' => 'kilimanjaro'],
            ['key' => 'route_northern', 'filepath' => 'img/kili-northern.webp', 'alt_text' => 'Northern Circuit Route Kilimanjaro', 'category' => 'kilimanjaro'],

            // ==================== SERVICE: BUDGET SAFARI ====================
            ['key' => 'budget_safari_hero', 'filepath' => 'img/budget-safari-header.webp', 'alt_text' => 'Budget Tanzania Safaris', 'category' => 'budget_safari'],
            ['key' => 'budget_safari_main', 'filepath' => 'img/budget-safari-main.webp', 'alt_text' => 'Travelers enjoying a budget safari in Tanzania', 'category' => 'budget_safari'],
            ['key' => 'budget_camping', 'filepath' => 'img/budget-camping.webp', 'alt_text' => 'Budget safari campsite setup in Tanzania', 'category' => 'budget_safari'],

            // ==================== SERVICE: GROUP SAFARI ====================
            ['key' => 'group_safari_hero', 'filepath' => 'img/group-safari-header.webp', 'alt_text' => 'Group Joining Safaris', 'category' => 'group_safari'],
            ['key' => 'group_safari_main', 'filepath' => 'img/group-safari-main.webp', 'alt_text' => 'Group joining safari in Tanzania', 'category' => 'group_safari'],
            ['key' => 'group_safari_vehicle', 'filepath' => 'img/group-safari-vehicle.webp', 'alt_text' => 'Group safari vehicle', 'category' => 'group_safari'],

            // ==================== SERVICE: LUXURY SAFARI ====================
            ['key' => 'luxury_safari_hero', 'filepath' => 'img/luxury-header.webp', 'alt_text' => 'Luxury Tanzania Safaris', 'category' => 'luxury_safari'],
            ['key' => 'luxury_main', 'filepath' => 'img/luxury-main.webp', 'alt_text' => 'Luxury safari experience', 'category' => 'luxury_safari'],
            ['key' => 'luxury_experiences', 'filepath' => 'img/luxury-experiences.webp', 'alt_text' => 'Luxury safari experiences', 'category' => 'luxury_safari'],

            // ==================== SERVICE: TREKKING ====================
            ['key' => 'trekking_hero', 'filepath' => 'img/kilimanjaro-header.webp', 'alt_text' => 'Mountain Trekking Tanzania', 'category' => 'trekking'],
            ['key' => 'trekking_main', 'filepath' => 'img/trekking-main.webp', 'alt_text' => 'Mountain trekking in Tanzania', 'category' => 'trekking'],
            ['key' => 'trekking_routes', 'filepath' => 'img/trekking-routes.webp', 'alt_text' => 'Trekking routes', 'category' => 'trekking'],

            // ==================== SERVICE: TAILORED SAFARI ====================
            ['key' => 'tailored_safari_hero', 'filepath' => 'img/service-tailored.webp', 'alt_text' => 'Tailor Made Safaris', 'category' => 'tailored_safari'],
            ['key' => 'tailored_main', 'filepath' => 'img/tailored-main.webp', 'alt_text' => 'Tailor made safari', 'category' => 'tailored_safari'],
            ['key' => 'tailored_process', 'filepath' => 'img/tailored-process.webp', 'alt_text' => 'Safari planning process', 'category' => 'tailored_safari'],

            // ==================== VISA PAGE ====================
            ['key' => 'visa_hero', 'filepath' => 'img/visa-header.webp', 'alt_text' => 'Tanzania Visa Information', 'category' => 'visa'],
            ['key' => 'visa_requirements', 'filepath' => 'img/Tanzania-Visa-Requirements-for-Tourists.webp', 'alt_text' => 'Tanzania Visa Requirements for Tourists', 'category' => 'visa'],
            ['key' => 'visa_process', 'filepath' => 'img/evisa-process.webp', 'alt_text' => 'Tanzania eVisa application process', 'category' => 'visa'],

            // ==================== HEALTH & SAFETY PAGE ====================
            ['key' => 'health_hero', 'filepath' => 'img/health-header.webp', 'alt_text' => 'Health and Safety Tanzania', 'category' => 'health_safety'],
            ['key' => 'health_safety', 'filepath' => 'img/Amani tavel clinic  Salmon Arm.webp', 'alt_text' => 'Travel clinic', 'category' => 'health_safety'],
            ['key' => 'safari_safety', 'filepath' => 'img/safari-safety.webp', 'alt_text' => 'Safari safety', 'category' => 'health_safety'],

            // ==================== INSURANCE PAGE ====================
            ['key' => 'insurance_hero', 'filepath' => 'img/premium_photo-1672759455710-70c879daf721.avif', 'alt_text' => 'Travel Insurance Tanzania', 'category' => 'insurance'],
            ['key' => 'insurance_doc', 'filepath' => 'img/insurance-doc.webp', 'alt_text' => 'Travel insurance documents', 'category' => 'insurance'],
            ['key' => 'insurance_plane', 'filepath' => 'img/amref-plane.webp', 'alt_text' => 'AMREF evacuation plane', 'category' => 'insurance'],
            ['key' => 'insurance_medical', 'filepath' => 'img/pexels-gustavo-fring-7155794-scaled.webp', 'alt_text' => 'Medical consultation', 'category' => 'insurance'],

            // ==================== LOCAL CUSTOMS PAGE ====================
            ['key' => 'customs_hero', 'filepath' => 'img/customs-header.webp', 'alt_text' => 'Local Customs Tanzania', 'category' => 'local_customs'],
            ['key' => 'customs_main', 'filepath' => 'img/pexels-photo-8069744.webp', 'alt_text' => 'Local customs Tanzania', 'category' => 'local_customs'],
            ['key' => 'customs_culture', 'filepath' => 'img/photo-1687422808366-c5b2800c6e98.avif', 'alt_text' => 'Cultural experience Tanzania', 'category' => 'local_customs'],

            // ==================== PRIVACY POLICY ====================
            ['key' => 'privacy_hero', 'filepath' => 'img/bhavani-privacy-policy-banner.webp', 'alt_text' => 'Privacy Policy', 'category' => 'privacy'],

            // ==================== TERMS & CONDITIONS ====================
            ['key' => 'terms_hero', 'filepath' => 'img/1659143707.webp', 'alt_text' => 'Terms and Conditions', 'category' => 'terms'],

            // ==================== PACKAGE DETAILS ====================
            ['key' => 'package_hero', 'filepath' => 'img/Great-Migration-From-Serengeti.webp', 'alt_text' => 'Great Migration from Serengeti', 'category' => 'package_details'],
            ['key' => 'package_gallery_1', 'filepath' => 'img/great-migration-1.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'package_details'],
            ['key' => 'package_gallery_2', 'filepath' => 'img/great-migration-2.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'package_details'],
            ['key' => 'package_gallery_3', 'filepath' => 'img/great-migration-3.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'package_details'],
            ['key' => 'package_gallery_4', 'filepath' => 'img/great-migration-4.webp', 'alt_text' => 'Great Migration gallery', 'category' => 'package_details'],


        ];

        foreach ($images as $image) {
            SiteImage::create($image);
        }
    }
}
