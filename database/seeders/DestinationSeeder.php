<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            // ============================================================
            // 1. ARUSHA NATIONAL PARK
            // ============================================================
            [
                'name' => 'Arusha National Park',
                'slug' => 'arushanationalpark',
                'subtitle' => 'Explore Diverse Arusha National Park',
                'badge_text' => "Tanzania's Scenic Microcosm",
                'short_description' => 'Home to Mount Meru, diverse landscapes, black-and-white colobus monkeys, and offers walking/canoeing safaris.',
                'description' => '<p>Arusha National Park, a hidden gem in northern Tanzania, offers a remarkable diversity of landscapes within a relatively small area. From the towering peak of Mount Meru to the tranquil Momella Lakes and the lush montane forests, this park is a microcosm of Tanzania\'s natural beauty. Located just a short drive from Arusha town, it is the perfect destination for a day trip or a multi-day adventure.</p><p>The park is dominated by Mount Meru (4,566m), Tanzania\'s second-highest mountain, which provides a stunning backdrop for game drives and walking safaris. The Momella Lakes, a series of seven alkaline lakes, are a haven for birdlife, including seasonal flamingos. The Ngurdoto Crater, often called "Little Ngorongoro," offers a unique caldera experience. With its diverse habitats, Arusha National Park is a paradise for nature lovers, hikers, and photographers.</p>',
                'hero_image' => 'img/arusha-np-header.jpg',
                'thumbnail_image' => 'img/dest-arusha.jpg',
                'gallery_images' => [
                    ['full' => 'img/arusha-np-header.jpg', 'thumb' => 'img/arusha-np-header.jpg', 'caption' => 'Arusha National Park Landscape', 'alt' => 'Arusha National Park landscape with Mount Meru'],
                    ['full' => 'img/arusha-np-main.jpg', 'thumb' => 'img/arusha-np-main.jpg', 'caption' => 'Momella Lakes', 'alt' => 'Momella Lakes in Arusha National Park'],
                    ['full' => 'img/arusha-colobus.jpg', 'thumb' => 'img/arusha-colobus.jpg', 'caption' => 'Colobus Monkey', 'alt' => 'Black-and-white colobus monkey in Arusha National Park'],
                    ['full' => 'img/arusha-momella.jpg', 'thumb' => 'img/arusha-momella.jpg', 'caption' => 'Momella Lakes View', 'alt' => 'Scenic view of Momella Lakes'],
                    ['full' => 'img/arusha-walking.jpg', 'thumb' => 'img/arusha-walking.jpg', 'caption' => 'Walking Safari', 'alt' => 'Walking safari in Arusha National Park'],
                ],
                'highlights' => [
                    ['title' => 'Colobus Monkey Haven', 'description' => 'Spot the striking black-and-white colobus monkeys leaping through the canopy.'],
                    ['title' => 'Walking Safaris', 'description' => 'One of the few parks in Tanzania where guided walking safaris are permitted.'],
                    ['title' => 'Mount Meru Backdrop', 'description' => 'Tanzania\'s second-highest peak provides a dramatic and scenic backdrop.'],
                    ['title' => 'Momella Lakes', 'description' => 'Seven alkaline lakes offering stunning scenery and excellent birdwatching.'],
                    ['title' => 'Rich Birdlife', 'description' => 'Over 400 species of birds, including flamingos, turacos, and trogons.'],
                    ['title' => 'Easy Accessibility', 'description' => 'Just a 45-minute drive from Arusha, perfect for day trips.'],
                ],
                'features' => [
                    ['title' => 'Colobus Monkey Haven', 'description' => 'Spot the striking black-and-white colobus monkeys leaping through the canopy.', 'icon' => 'fa-monkey'],
                    ['title' => 'Walking Safaris', 'description' => 'One of the few parks in Tanzania where guided walking safaris are permitted.', 'icon' => 'fa-hiking'],
                    ['title' => 'Mount Meru Backdrop', 'description' => 'Tanzania\'s second-highest peak provides a dramatic and scenic backdrop.', 'icon' => 'fa-mountain'],
                    ['title' => 'Momella Lakes', 'description' => 'Seven alkaline lakes offering stunning scenery and excellent birdwatching.', 'icon' => 'fa-water'],
                    ['title' => 'Rich Birdlife', 'description' => 'Over 400 species of birds, including flamingos, turacos, and trogons.', 'icon' => 'fa-dove'],
                    ['title' => 'Easy Accessibility', 'description' => 'Just a 45-minute drive from Arusha, perfect for day trips.', 'icon' => 'fa-car'],
                ],
                'quick_facts' => [
                    ['label' => 'Size', 'value' => '552 sq km (137 sq mi)'],
                    ['label' => 'Established', 'value' => '1960'],
                    ['label' => 'Location', 'value' => 'Arusha Region, Northern Tanzania'],
                    ['label' => 'Highest Point', 'value' => 'Mount Meru (4,566m)'],
                    ['label' => 'Main Attractions', 'value' => 'Mount Meru, Momella Lakes, Ngurdoto Crater'],
                    ['label' => 'Best Time', 'value' => 'June to October (dry season)'],
                ],
                'location' => 'Arusha Region, Northern Tanzania',
                'category' => 'National Parks',
                'best_time_to_visit' => [
                    ['season' => 'Dry Season (June-October)', 'description' => 'Peak wildlife viewing season. Clear skies and optimal hiking conditions for Mount Meru climbs.'],
                    ['season' => 'Wet/Green Season (November-May)', 'description' => 'Lush green landscapes, abundant birdlife, and fewer crowds. The park is at its most beautiful.'],
                ],
                'key_attractions' => 'Mount Meru, Momella Lakes, Ngurdoto Crater, Montane Forest, Fig Tree Arch',
                'wildlife_highlights' => '<p>Arusha National Park is home to a variety of wildlife, including:</p><ul><li><strong>Primates:</strong> Black-and-white colobus monkeys, blue monkeys, and olive baboons.</li><li><strong>Mammals:</strong> Giraffes, buffaloes, zebras, warthogs, bushbucks, waterbucks, and duikers.</li><li><strong>Birds:</strong> Over 400 species, including flamingos (seasonal), turacos, trogons, bee-eaters, and fish eagles.</li><li><strong>Predators:</strong> Leopards (rarely seen), hyenas, and jackals.</li></ul>',
                'activities' => [
                    ['title' => 'Walking Safaris', 'description' => 'Guided walking safaris through the forest and along the lakeshores.'],
                    ['title' => 'Canoeing on Momella Lakes', 'description' => 'Paddle across the serene Momella Lakes with views of Mount Meru.'],
                    ['title' => 'Game Drives', 'description' => 'Explore the park\'s diverse habitats on a game drive.'],
                    ['title' => 'Picnicking', 'description' => 'Enjoy a picnic at designated spots with stunning views.'],
                    ['title' => 'Mount Meru Climb', 'description' => 'Multi-day trek to the summit of Tanzania\'s second-highest peak.'],
                ],
                'faq' => [
                    ['question' => 'How far is Arusha National Park from Arusha?', 'answer' => 'The park is approximately 45 minutes to 1 hour drive from Arusha town center.'],
                    ['question' => 'Can I do a walking safari in Arusha National Park?', 'answer' => 'Yes, Arusha National Park is one of the few parks in Tanzania where guided walking safaris are permitted.'],
                    ['question' => 'What is the best time to visit Arusha National Park?', 'answer' => 'The dry season (June to October) is ideal for wildlife viewing and hiking. The green season (November to May) offers lush landscapes and excellent birdwatching.'],
                    ['question' => 'Can I see Mount Kilimanjaro from Arusha National Park?', 'answer' => 'Yes, on clear days you can see Mount Kilimanjaro in the distance, especially from higher elevations.'],
                ],
                'cta_text' => 'Plan Your Arusha National Park Visit',
                'cta_url' => '/booking',
                'map_embed_url' => '',
                'video_url' => '',
                'related_destinations' => ['mtmeru', 'ngorongoro', 'tarangire'],
                'is_active' => true,
                'sort_order' => 5,
                'seo_title' => 'Arusha National Park Safari & Tours - Tanzania',
                'seo_description' => 'Explore Arusha National Park with Golden Memories Safaris. Discover Mount Meru, Momella Lakes, colobus monkeys, walking safaris, and diverse landscapes near Arusha.',
                'seo_keywords' => 'arusha national park, mount meru, momella lakes, colobus monkey, walking safari, canoeing safari',
            ],

            // ============================================================
            // 2. SERENGETI NATIONAL PARK
            // ============================================================
            [
                'name' => 'Serengeti National Park',
                'slug' => 'serengeti',
                'subtitle' => 'Discover the Endless Plains',
                'badge_text' => "Africa's Iconic Wilderness",
                'short_description' => 'World-famous for the Great Migration, endless plains, and exceptional Big Cat sightings.',
                'description' => '<p>The Serengeti National Park is a UNESCO World Heritage Site and one of the most iconic safari destinations on Earth. Its name, derived from the Maasai word "Siringet," meaning "the place where the land runs on forever," perfectly captures the essence of these vast, endless plains. The Serengeti is synonymous with the Great Migration, the largest overland wildlife migration on the planet, where over 1.5 million wildebeest, 200,000 zebras, and thousands of gazelles traverse the plains in search of fresh grazing.</p><p>Beyond the migration, the Serengeti offers exceptional year-round wildlife viewing. The park is home to the Big Five (lion, leopard, elephant, rhino, buffalo) and an astonishing density of predators. The Seronera Valley, in the central Serengeti, is particularly famous for its high concentration of big cats. Whether you are witnessing a river crossing, watching a lioness stalk her prey, or simply taking in the vastness of the plains, the Serengeti is an experience that will stay with you forever.</p>',
                'hero_image' => 'img/serengeti-header.jpg',
                'thumbnail_image' => 'img/dest-serengeti.jpg',
                'gallery_images' => [
                    ['full' => 'img/serengeti-header.jpg', 'thumb' => 'img/serengeti-header.jpg', 'caption' => 'Serengeti Plains', 'alt' => 'Vast plains of Serengeti National Park'],
                    ['full' => 'img/serengeti-main.jpg', 'thumb' => 'img/serengeti-main.jpg', 'caption' => 'Serengeti Landscape', 'alt' => 'Serengeti landscape with acacia trees'],
                    ['full' => 'img/second.jpg', 'thumb' => 'img/second.jpg', 'caption' => 'Great Migration', 'alt' => 'Wildebeest crossing river in Serengeti'],
                ],
                'highlights' => [
                    ['title' => 'The Great Migration', 'description' => 'Witness over 1.5 million wildebeest and thousands of zebras on their annual journey.'],
                    ['title' => 'Big Five Destination', 'description' => 'Home to lion, leopard, elephant, rhino, and buffalo.'],
                    ['title' => 'Superb Wildlife Viewing', 'description' => 'Exceptional year-round game viewing with high predator density.'],
                ],
                'features' => [
                    ['title' => 'The Great Migration', 'description' => 'Witness over 1.5 million wildebeest and thousands of zebras on their annual journey.', 'icon' => 'fa-horse-head'],
                    ['title' => 'Big Five Destination', 'description' => 'Home to lion, leopard, elephant, rhino, and buffalo.', 'icon' => 'fa-paw'],
                    ['title' => 'Superb Wildlife Viewing', 'description' => 'Exceptional year-round game viewing with high predator density.', 'icon' => 'fa-binoculars'],
                ],
                'quick_facts' => [
                    ['label' => 'Size', 'value' => '14,763 sq km (5,700 sq mi)'],
                    ['label' => 'Established', 'value' => '1951'],
                    ['label' => 'Location', 'value' => 'Northern Tanzania, extending to Kenya'],
                    ['label' => 'UNESCO Status', 'value' => 'World Heritage Site (1981)'],
                    ['label' => 'Main Attractions', 'value' => 'Great Migration, Seronera Valley, Grumeti River, Mara River'],
                    ['label' => 'Best Time', 'value' => 'Year-round, depending on migration location'],
                ],
                'location' => 'Northern Tanzania, extending to Kenya border',
                'category' => 'National Parks',
                'best_time_to_visit' => [
                    ['season' => 'Dry Season (June-October)', 'description' => 'Peak season for wildlife viewing. The migration is in the northern Serengeti, with dramatic Mara River crossings.'],
                    ['season' => 'Wet/Green Season (November-May)', 'description' => 'Calving season (Jan-Feb) in the southern Serengeti (Ndutu area). Lush landscapes, lower rates, and excellent predator action.'],
                ],
                'key_attractions' => 'Great Migration, Seronera Valley, Grumeti River, Mara River, Olduvai Gorge (nearby)',
                'wildlife_highlights' => '<p>The Serengeti boasts an extraordinary concentration of wildlife:</p><ul><li><strong>The Big Five:</strong> Lion, leopard, African elephant, black rhino, and Cape buffalo.</li><li><strong>Predators:</strong> Cheetah, hyena, jackal, wild dog, serval.</li><li><strong>Herbivores:</strong> Wildebeest, zebra, giraffe, impala, topi, eland, gazelle, waterbuck.</li><li><strong>Birds:</strong> Over 500 species including ostriches, secretary birds, and numerous raptors.</li></ul>',
                'activities' => [
                    ['title' => 'Game Drives', 'description' => 'Morning, afternoon, and full-day game drives across the vast plains.'],
                    ['title' => 'Hot Air Balloon Safaris', 'description' => 'Float over the Serengeti at sunrise followed by a champagne breakfast.'],
                    ['title' => 'Walking Safaris', 'description' => 'Guided walking safaris in designated areas with an armed ranger.'],
                    ['title' => 'Cultural Visits', 'description' => 'Visit a Maasai boma to learn about traditional Maasai culture.'],
                    ['title' => 'Photography', 'description' => 'Endless opportunities for stunning wildlife and landscape photography.'],
                ],
                'faq' => [
                    ['question' => 'What is the best time to see the Great Migration?', 'answer' => 'The migration is a year-round cycle. Calving season is Jan-Feb in the south (Ndutu). River crossings occur Jun-Oct in the north (Mara River).'],
                    ['question' => 'How do I get to Serengeti National Park?', 'answer' => 'You can fly into Seronera Airstrip from Arusha or drive from Arusha (approx. 5-6 hours). Most safaris include transfers.'],
                    ['question' => 'Can I see the Big Five in Serengeti?', 'answer' => 'Yes, the Serengeti is one of the best places in Africa to see all members of the Big Five.'],
                    ['question' => 'Is Serengeti safe for tourists?', 'answer' => 'Yes, Serengeti is very safe for tourists. All game drives are conducted by experienced guides, and camps have security measures in place.'],
                ],
                'cta_text' => 'Book Your Serengeti Safari',
                'cta_url' => '/booking',
                'map_embed_url' => '',
                'video_url' => '',
                'related_destinations' => ['ngorongoro', 'tarangire', 'manyara'],
                'is_active' => true,
                'sort_order' => 1,
                'seo_title' => 'Serengeti National Park Safari - Tanzania - Golden Memories Safaris',
                'seo_description' => 'Explore the legendary Serengeti National Park with Golden Memories Safaris. Witness the Great Migration, spot the Big Five, and experience vast plains teeming with wildlife.',
                'seo_keywords' => 'serengeti national park, serengeti safari, tanzania safari, great migration serengeti, big five serengeti, seronera, kogatende, ndutu, serengeti tours',
            ],

            // ============================================================
            // 3. NGORONGORO CONSERVATION AREA
            // ============================================================
            [
                'name' => 'Ngorongoro Conservation Area',
                'slug' => 'ngorongoro',
                'subtitle' => 'The Ngorongoro Crater & Beyond',
                'badge_text' => 'A Natural & Cultural Jewel',
                'short_description' => 'Home to the stunning Ngorongoro Crater, a unique caldera teeming with wildlife, including the rare black rhino.',
                'description' => '<p>The Ngorongoro Conservation Area is a UNESCO World Heritage Site and one of Africa\'s most remarkable natural wonders. At its heart lies the Ngorongoro Crater, the world\'s largest intact volcanic caldera, often referred to as "Africa\'s Garden of Eden." This natural amphitheater, spanning 260 square kilometers, is home to an estimated 25,000 large animals, creating one of the highest wildlife densities in Africa.</p><p>Beyond the crater, the conservation area encompasses vast highland plains, forests, and lakes. It is also a unique multi-use area where Maasai pastoralists live alongside wildlife. The nearby Olduvai Gorge, often called the "Cradle of Mankind," is one of the most important paleoanthropological sites in the world, where some of the earliest human remains have been discovered.</p>',
                'hero_image' => 'img/ngorongoro-header.JPG',
                'thumbnail_image' => 'img/dest-ngorongoro.jpg',
                'gallery_images' => [
                    ['full' => 'img/ngorongoro-header.JPG', 'thumb' => 'img/ngorongoro-header.JPG', 'caption' => 'Ngorongoro Crater', 'alt' => 'Ngorongoro Crater floor with wildlife'],
                    ['full' => 'img/ngorongoro-crater-main.JPG', 'thumb' => 'img/ngorongoro-crater-main.JPG', 'caption' => 'Crater Floor', 'alt' => 'Wildlife on the Ngorongoro Crater floor'],
                ],
                'highlights' => [
                    ['title' => 'The Ngorongoro Crater', 'description' => 'The world\'s largest intact volcanic caldera, teeming with wildlife.'],
                    ['title' => 'Incredible Wildlife Density', 'description' => 'Home to approximately 25,000 large animals within the crater.'],
                    ['title' => 'Big Five Sightings', 'description' => 'Excellent chance to see all Big Five, including the endangered black rhino.'],
                ],
                'features' => [
                    ['title' => 'The Ngorongoro Crater', 'description' => 'The world\'s largest intact volcanic caldera, teeming with wildlife.', 'icon' => 'fa-mountain'],
                    ['title' => 'Incredible Wildlife Density', 'description' => 'Home to approximately 25,000 large animals within the crater.', 'icon' => 'fa-paw'],
                    ['title' => 'Big Five Sightings', 'description' => 'Excellent chance to see all Big Five, including the endangered black rhino.', 'icon' => 'fa-eye'],
                ],
                'quick_facts' => [
                    ['label' => 'Size', 'value' => '8,292 sq km (3,202 sq mi)'],
                    ['label' => 'Crater Size', 'value' => '260 sq km (100 sq mi)'],
                    ['label' => 'Crater Depth', 'value' => '610 meters (2,000 ft)'],
                    ['label' => 'UNESCO Status', 'value' => 'World Heritage Site (1979)'],
                    ['label' => 'Location', 'value' => 'Ngorongoro District, Arusha Region'],
                    ['label' => 'Best Time', 'value' => 'Year-round, dry season (Jun-Oct) ideal'],
                ],
                'location' => 'Ngorongoro District, Arusha Region, Tanzania',
                'category' => 'National Parks',
                'best_time_to_visit' => [
                    ['season' => 'Dry Season (June-October)', 'description' => 'Excellent wildlife viewing as animals congregate around water sources. Clear skies and pleasant temperatures.'],
                    ['season' => 'Wet/Green Season (November-May)', 'description' => 'Lush green scenery, fewer crowds, and lower rates. Good for birdwatching and photography.'],
                ],
                'key_attractions' => 'Ngorongoro Crater, Olduvai Gorge, Empakaai Crater, Olmoti Crater, Shifting Sands, Maasai villages',
                'wildlife_highlights' => '<p>The Ngorongoro Crater offers exceptional wildlife viewing:</p><ul><li><strong>The Big Five:</strong> Lion, leopard, African elephant, black rhino, and Cape buffalo.</li><li><strong>Herbivores:</strong> Zebra, wildebeest, gazelle, hippo, warthog, eland, waterbuck.</li><li><strong>Predators:</strong> Spotted hyena, cheetah, jackal, serval.</li><li><strong>Birds:</strong> Flamingos (seasonal), ostriches, crowned cranes, and many waterbirds.</li></ul>',
                'activities' => [
                    ['title' => 'Crater Game Drive', 'description' => 'Descend into the crater for a half-day game drive on the crater floor.'],
                    ['title' => 'Olduvai Gorge Visit', 'description' => 'Explore the "Cradle of Mankind" and visit the museum.'],
                    ['title' => 'Maasai Village Visit', 'description' => 'Experience traditional Maasai culture and way of life.'],
                    ['title' => 'Empakaai Crater Hike', 'description' => 'Hike to the rim of Empakaai Crater for stunning views.'],
                    ['title' => 'Photography', 'description' => 'Capture stunning landscapes and abundant wildlife.'],
                ],
                'faq' => [
                    ['question' => 'Can I stay overnight in the Ngorongoro Crater?', 'answer' => 'No, overnight stays are not permitted on the crater floor. Accommodation is available on the crater rim.'],
                    ['question' => 'What is the best time to visit Ngorongoro?', 'answer' => 'The crater offers excellent wildlife viewing year-round. The dry season (June-October) is ideal for game viewing.'],
                    ['question' => 'How do I get to Ngorongoro from Arusha?', 'answer' => 'The drive from Arusha to Ngorongoro takes approximately 3-4 hours. Most safaris include transportation.'],
                    ['question' => 'Can I see black rhinos in Ngorongoro?', 'answer' => 'Yes, the Ngorongoro Crater is one of the best places in Tanzania to see the endangered black rhino.'],
                ],
                'cta_text' => 'Plan Your Ngorongoro Safari',
                'cta_url' => '/booking',
                'map_embed_url' => '',
                'video_url' => '',
                'related_destinations' => ['serengeti', 'tarangire', 'manyara'],
                'is_active' => true,
                'sort_order' => 2,
                'seo_title' => 'Ngorongoro Conservation Area & Crater Safari - Tanzania - Golden Memories Safaris',
                'seo_description' => 'Explore the breathtaking Ngorongoro Crater and Conservation Area with Golden Memories Safaris. Witness the Big Five, black rhinos, and stunning landscapes.',
                'seo_keywords' => 'ngorongoro crater safari, ngorongoro conservation area, tanzania safari, big five ngorongoro, black rhino tanzania, olduvai gorge, maasai tanzania',
            ],

            // ============================================================
            // 4. TARANGIRE NATIONAL PARK
            // ============================================================
            [
                'name' => 'Tarangire National Park',
                'slug' => 'tarangire',
                'subtitle' => 'Tarangire: Elephants & Baobabs',
                'badge_text' => 'Land of Giants',
                'short_description' => 'Famous for its massive elephant herds, ancient baobab trees, and diverse birdlife along the Tarangire River.',
                'description' => '<p>Tarangire National Park is a hidden gem in northern Tanzania, often described as the "Land of Giants" for its massive elephant herds and iconic baobab trees. Spanning 2,850 square kilometers, the park is named after the Tarangire River, which serves as the lifeline for wildlife during the dry season. During this time, the park hosts one of the highest concentrations of wildlife outside the Serengeti.</p><p>The park is particularly famous for its elephant population, with herds of up to 300 individuals. The ancient baobab trees, some over 1,000 years old, create a surreal and photogenic landscape. Tarangire is also a birdwatcher\'s paradise, with over 550 species recorded, including the rare yellow-collared lovebird. With fewer crowds than the Serengeti, Tarangire offers a more intimate and exclusive safari experience.</p>',
                'hero_image' => 'img/tarangire-header.jpg',
                'thumbnail_image' => 'img/dest-tarangire.jpg',
                'gallery_images' => [
                    ['full' => 'img/tarangire-header.jpg', 'thumb' => 'img/tarangire-header.jpg', 'caption' => 'Tarangire Landscape', 'alt' => 'Elephants near Baobab trees in Tarangire'],
                    ['full' => 'img/tarangire-main.jpg', 'thumb' => 'img/tarangire-main.jpg', 'caption' => 'Tarangire River', 'alt' => 'Tarangire River with wildlife'],
                    ['full' => 'img/tarangire-river.jpg', 'thumb' => 'img/tarangire-river.jpg', 'caption' => 'River Scene', 'alt' => 'Scenic view of Tarangire River'],
                    ['full' => 'img/dest-tarangire.jpg', 'thumb' => 'img/dest-tarangire.jpg', 'caption' => 'Baobab Trees', 'alt' => 'Ancient baobab trees in Tarangire'],
                ],
                'highlights' => [
                    ['title' => 'Huge Elephant Herds', 'description' => 'Home to some of the largest elephant herds in East Africa, with groups of up to 300.'],
                    ['title' => 'Iconic Baobab Trees', 'description' => 'Ancient baobab trees create a surreal and photogenic landscape.'],
                    ['title' => 'Superb Bird Watching', 'description' => 'Over 550 species, including the rare yellow-collared lovebird.'],
                    ['title' => 'Big Cat Sightings', 'description' => 'Lions, leopards, and cheetahs are frequently spotted.'],
                    ['title' => 'Less Crowded', 'description' => 'Offers a more intimate and exclusive safari experience.'],
                    ['title' => 'Diverse Landscapes', 'description' => 'Riverine forests, swamps, and baobab-studded savannah.'],
                ],
                'features' => [
                    ['title' => 'Huge Elephant Herds', 'description' => 'Home to some of the largest elephant herds in East Africa, with groups of up to 300.', 'icon' => 'fa-elephant'],
                    ['title' => 'Iconic Baobab Trees', 'description' => 'Ancient baobab trees create a surreal and photogenic landscape.', 'icon' => 'fa-tree'],
                    ['title' => 'Superb Bird Watching', 'description' => 'Over 550 species, including the rare yellow-collared lovebird.', 'icon' => 'fa-dove'],
                    ['title' => 'Big Cat Sightings', 'description' => 'Lions, leopards, and cheetahs are frequently spotted.', 'icon' => 'fa-paw'],
                    ['title' => 'Less Crowded', 'description' => 'Offers a more intimate and exclusive safari experience.', 'icon' => 'fa-user-friends'],
                    ['title' => 'Diverse Landscapes', 'description' => 'Riverine forests, swamps, and baobab-studded savannah.', 'icon' => 'fa-mountain'],
                ],
                'quick_facts' => [
                    ['label' => 'Size', 'value' => '2,850 sq km (1,100 sq mi)'],
                    ['label' => 'Established', 'value' => '1970'],
                    ['label' => 'Location', 'value' => 'Manyara Region, Northern Tanzania'],
                    ['label' => 'Main Attractions', 'value' => 'Elephant herds, baobab trees, Tarangire River'],
                    ['label' => 'Bird Species', 'value' => 'Over 550 species'],
                    ['label' => 'Best Time', 'value' => 'June to October (dry season)'],
                ],
                'location' => 'Manyara Region, Northern Tanzania',
                'category' => 'National Parks',
                'best_time_to_visit' => [
                    ['season' => 'Dry Season (June-October)', 'description' => 'Peak wildlife viewing season. Animals congregate along the Tarangire River, offering exceptional game viewing.'],
                    ['season' => 'Green Season (November-May)', 'description' => 'Lush landscapes, excellent bird watching, and fewer crowds. Some lodges offer reduced rates.'],
                ],
                'key_attractions' => 'Tarangire River, Baobab trees, Silale Swamp, Matete Woodlands, Kitibong Hill viewpoint',
                'wildlife_highlights' => '<p>Tarangire is renowned for its wildlife diversity:</p><ul><li><strong>Elephants:</strong> Some of the largest herds in East Africa, with groups of up to 300 individuals.</li><li><strong>Predators:</strong> Lions, leopards, cheetahs, spotted hyenas, and wild dogs.</li><li><strong>Birdlife:</strong> Over 550 species including yellow-collared lovebird, ashy starling, and kori bustard.</li><li><strong>Other Wildlife:</strong> Giraffes, zebras, wildebeests, greater kudu, eland, and oryx.</li></ul>',
                'activities' => [
                    ['title' => 'Game Drives', 'description' => 'Morning, afternoon, and full-day game drives along the river and across the park.'],
                    ['title' => 'Walking Safaris', 'description' => 'Guided walking safaris in designated areas with experienced rangers.'],
                    ['title' => 'Bird Watching', 'description' => 'Excellent birding opportunities with over 550 species.'],
                    ['title' => 'Photography', 'description' => 'Stunning landscapes with baobab trees and abundant wildlife.'],
                    ['title' => 'Cultural Visits', 'description' => 'Visit Maasai and Barabaig communities near the park.'],
                ],
                'faq' => [
                    ['question' => 'How far is Tarangire from Arusha?', 'answer' => 'Tarangire National Park is approximately a 2-hour drive from Arusha, making it easily accessible for day trips.'],
                    ['question' => 'What is Tarangire best known for?', 'answer' => 'Tarangire is best known for its massive elephant herds, iconic baobab trees, and excellent bird watching.'],
                    ['question' => 'Is Tarangire less crowded than Serengeti?', 'answer' => 'Yes, Tarangire receives far fewer visitors than Serengeti, offering a more intimate safari experience.'],
                    ['question' => 'What is the best time to visit Tarangire?', 'answer' => 'The dry season (June to October) is the best time for wildlife viewing as animals gather around the Tarangire River.'],
                ],
                'cta_text' => 'Explore Tarangire',
                'cta_url' => '/booking',
                'map_embed_url' => '',
                'video_url' => '',
                'related_destinations' => ['manyara', 'ngorongoro', 'serengeti'],
                'is_active' => true,
                'sort_order' => 4,
                'seo_title' => 'Tarangire National Park Safari - Tanzania - Golden Memories Safaris',
                'seo_description' => 'Discover Tarangire National Park, home to vast elephant herds, iconic baobab trees, and rich birdlife. Book your Tarangire safari with Golden Memories Safaris.',
                'seo_keywords' => 'tarangire national park, tarangire safari, tanzania elephant safari, baobab trees tanzania, tanzania bird watching',
            ],

            // ============================================================
            // LAKE MANYARA NATIONAL PARK
            // ============================================================
            [
                "name" => 'Lake Manyara National Park',
                "slug" => 'manyara',
                "subtitle" => 'Lake Manyara: Lions in Trees & Pink Hues',
                "badge_text" => 'Rift Valley Gem',
                "short_description" => 'Known for its tree-climbing lions, large troops of baboons, flamingos, and stunning Rift Valley scenery.',
                "description" => '<p>Lake Manyara National Park is a compact gem nestled at the base of the Great Rift Valley escarpment. Despite its small size, the park boasts incredible biodiversity and is famous for its tree-climbing lions, vast flocks of flamingos, and lush groundwater forests. The park\\\\s centerpiece is the shallow, alkaline Lake Manyara, which covers much of the park\\\\s area and attracts thousands of birds.</p><p>The park is particularly renowned for its tree-climbing lions, a unique behavior rarely seen elsewhere in Africa.</p>',
                "hero_image" => 'img/manyara-header.jpg',
                "thumbnail_image" => 'img/dest-manyara.jpg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Manyara Region, Northern Tanzania',
                "category" => 'National Parks',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Lake Manyara, Rift Valley escarpment',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Visit Lake Manyara',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'tarangire',
                  1 => 'ngorongoro',
                  2 => 'serengeti',
                ),
                "is_active" => true,
                "sort_order" => 6,
                "seo_title" => 'Lake Manyara National Park Safari - Tanzania',
                "seo_description" => 'Explore Lake Manyara National Park with Golden Memories Safaris.',
                "seo_keywords" => 'lake manyara, manyara safari, tree climbing lions',
            ],

            // ============================================================
            // MOUNT KILIMANJARO
            // ============================================================
            [
                "name" => 'Mount Kilimanjaro',
                "slug" => 'mtkilimanjaro',
                "subtitle" => 'The Ultimate Kilimanjaro Trek',
                "badge_text" => 'Conquer the Legend',
                "short_description" => 'Africa\\\\s highest peak and the world\\\\s tallest free-standing mountain.',
                "description" => '<p>Mount Kilimanjaro, standing at 5,895 meters (19,341 feet), is Africa\\\\s highest peak.</p>',
                "hero_image" => 'img/kilimanjaro-header.jpg',
                "thumbnail_image" => 'img/dest-kilimanjaro.jpg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Kilimanjaro Region, Tanzania',
                "category" => 'Mountains & Highlands',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Uhuru Peak, glaciers',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Start Your Kilimanjaro Adventure',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'mtmeru',
                  1 => 'materuni',
                  2 => 'arushanationalpark',
                ),
                "is_active" => true,
                "sort_order" => 7,
                "seo_title" => 'Mount Kilimanjaro Climb - Trek Africa\\\\s Highest Peak',
                "seo_description" => 'Climb Mount Kilimanjaro with Golden Memories Safaris.',
                "seo_keywords" => 'mount kilimanjaro, climb kilimanjaro',
            ],

            // ============================================================
            // MOUNT MERU
            // ============================================================
            [
                "name" => 'Mount Meru',
                "slug" => 'mtmeru',
                "subtitle" => 'Climb Mount Meru (4,566m)',
                "badge_text" => 'Kilimanjaro\\\\s Majestic Neighbor',
                "short_description" => 'Tanzania\\\\s second-highest peak, located within Arusha National Park.',
                "description" => '<p>Mount Meru, standing at 4,566 meters, is Tanzania\\\\s second-highest peak.</p>',
                "hero_image" => 'img/meru-header.jpg',
                "thumbnail_image" => 'img/dest-meru.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Arusha National Park, Tanzania',
                "category" => 'Mountains & Highlands',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Socialist Peak, Little Meru',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Climb Mount Meru',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'mtkilimanjaro',
                  1 => 'arushanationalpark',
                  2 => 'materuni',
                ),
                "is_active" => true,
                "sort_order" => 8,
                "seo_title" => 'Mount Meru Trek - Climb Tanzania\\\\s Second Highest Peak',
                "seo_description" => 'Climb Mount Meru with Golden Memories Safaris.',
                "seo_keywords" => 'mount meru climb, mount meru trek',
            ],

            // ============================================================
            // USAMBARA MOUNTAINS
            // ============================================================
            [
                "name" => 'Usambara Mountains',
                "slug" => 'mtusambara',
                "subtitle" => 'The Lush Usambara Mountains',
                "badge_text" => 'Tanzania\\\\s Verdant Highlands',
                "short_description" => 'Biodiversity hotspot offering lush forests, cool air, hiking trails.',
                "description" => '<p>The Usambara Mountains are one of Tanzania\\\\s most biodiverse regions.</p>',
                "hero_image" => 'img/usambara-main.jpg',
                "thumbnail_image" => 'img/dest-usambara.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Tanga Region, Northeastern Tanzania',
                "category" => 'Mountains & Highlands',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Lushoto, Irente Viewpoint',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Explore the Usambaras',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'mtkilimanjaro',
                  1 => 'materuni',
                  2 => 'arushanationalpark',
                ),
                "is_active" => true,
                "sort_order" => 9,
                "seo_title" => 'Usambara Mountains Hiking & Tours',
                "seo_description" => 'Discover the lush Usambara Mountains.',
                "seo_keywords" => 'usambara mountains, tanzania hiking',
            ],

            // ============================================================
            // LAKE NATRON
            // ============================================================
            [
                "name" => 'Lake Natron',
                "slug" => 'lakenatron',
                "subtitle" => 'Explore Dramatic Lake Natron',
                "badge_text" => 'A Landscape Like No Other',
                "short_description" => 'A surreal soda lake, primary breeding ground for Lesser Flamingos.',
                "description" => '<p>Lake Natron is one of Tanzania\\\\s most surreal landscapes.</p>',
                "hero_image" => 'img/natron-header.jpg',
                "thumbnail_image" => 'img/dest-natron.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Gregory Rift Valley, Arusha Region',
                "category" => 'Lakes',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Lake Natron, Ol Doinyo Lengai',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Visit Lake Natron',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'lakeeyasi',
                  1 => 'ngorongoro',
                  2 => 'serengeti',
                ),
                "is_active" => true,
                "sort_order" => 10,
                "seo_title" => 'Lake Natron & Ol Doinyo Lengai Tours',
                "seo_description" => 'Explore Lake Natron with Golden Memories Safaris.',
                "seo_keywords" => 'lake natron, ol doinyo lengai, flamingo',
            ],

            // ============================================================
            // LAKE EYASI
            // ============================================================
            [
                "name" => 'Lake Eyasi',
                "slug" => 'lakeeyasi',
                "subtitle" => 'Lake Eyasi Cultural Adventure',
                "badge_text" => 'Off the Beaten Track',
                "short_description" => 'A seasonal shallow salt lake, home to Hadzabe hunter-gatherers and Datoga pastoralists.',
                "description" => '<p>Lake Eyasi offers an authentic cultural experience with the Hadzabe and Datoga tribes.</p>',
                "hero_image" => 'img/eyasi-header.jpg',
                "thumbnail_image" => 'img/dest-eyasi.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Manyara Region, Northern Tanzania',
                "category" => 'Lakes',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Hadzabe tribe, Datoga tribe',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Experience Lake Eyasi',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'lakenatron',
                  1 => 'ngorongoro',
                  2 => 'manyara',
                ),
                "is_active" => true,
                "sort_order" => 11,
                "seo_title" => 'Lake Eyasi & Hadzabe Cultural Experience',
                "seo_description" => 'Experience authentic tribal culture at Lake Eyasi.',
                "seo_keywords" => 'lake eyasi, hadzabe tribe, datoga tribe',
            ],

            // ============================================================
            // LAKE VICTORIA
            // ============================================================
            [
                "name" => 'Lake Victoria',
                "slug" => 'lakevictoria',
                "subtitle" => 'Explore Majestic Lake Victoria',
                "badge_text" => 'Africa\\\\s Great Lake',
                "short_description" => 'Africa\\\\s largest lake, offering fishing, bird watching, and island exploration.',
                "description" => '<p>Lake Victoria is Africa\\\\s largest lake, shared by Tanzania, Uganda, and Kenya.</p>',
                "hero_image" => 'img/victoria-header.jpg',
                "thumbnail_image" => 'img/dest-victoria.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Mwanza Region, Northern Tanzania',
                "category" => 'Lakes',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Rubondo Island NP, Saanane Island NP, Mwanza',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Explore Lake Victoria',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'serengeti',
                  1 => 'ngorongoro',
                  2 => 'rubondo',
                ),
                "is_active" => true,
                "sort_order" => 12,
                "seo_title" => 'Lake Victoria Tours & Safaris',
                "seo_description" => 'Explore Africa\\\\s largest lake with Golden Memories Safaris.',
                "seo_keywords" => 'lake victoria, mwanza, rubondo island',
            ],

            // ============================================================
            // MATERUNI WATERFALL & COFFEE TOUR
            // ============================================================
            [
                "name" => 'Materuni Waterfall & Coffee Tour',
                "slug" => 'materuni',
                "subtitle" => 'Discover Materuni Village',
                "badge_text" => 'Kilimanjaro\\\\s Foothills Experience',
                "short_description" => 'Hike to a beautiful waterfall near Moshi, enjoy a hands-on coffee tour, and experience Chagga culture.',
                "description" => '<p>Materuni village in the foothills of Mount Kilimanjaro offers a stunning waterfall hike and authentic Chagga coffee experience.</p>',
                "hero_image" => 'img/materuni-waterfall.jpg',
                "thumbnail_image" => 'img/dest-materuni.jpg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Moshi, Kilimanjaro Region, Tanzania',
                "category" => 'Other Attractions & Experiences',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Materuni Waterfall, Coffee Tour, Chagga Culture',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Visit Materuni Village',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'mtkilimanjaro',
                  1 => 'mtmeru',
                  2 => 'arushanationalpark',
                ),
                "is_active" => true,
                "sort_order" => 13,
                "seo_title" => 'Materuni Waterfall & Coffee Tour - Moshi',
                "seo_description" => 'Visit Materuni village near Moshi with Golden Memories Safaris.',
                "seo_keywords" => 'materuni waterfall, coffee tour, chagga culture',
            ],

            // ============================================================
            // GOMBE STREAM NATIONAL PARK
            // ============================================================
            [
                "name" => 'Gombe Stream National Park',
                "slug" => 'gombenationalpark',
                "subtitle" => 'Gombe: Jane Goodall\\\\s Legacy',
                "badge_text" => 'Where Chimpanzees Roam',
                "short_description" => 'Famous for Jane Goodall\\\\s chimpanzee research; trek to see habituated chimps by Lake Tanganyika.',
                "description" => '<p>Gombe Stream National Park is Tanzania\\\\s smallest national park, famous for Jane Goodall\\\\s chimpanzee research.</p>',
                "hero_image" => 'img/gombe-header.jpg',
                "thumbnail_image" => 'img/dest-gombe.jpg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Kigoma Region, Western Tanzania',
                "category" => 'National Parks',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Chimpanzee trekking, Lake Tanganyika',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Visit Gombe Stream',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'lakevictoria',
                  1 => 'serengeti',
                  2 => 'ngorongoro',
                ),
                "is_active" => true,
                "sort_order" => 14,
                "seo_title" => 'Gombe Stream National Park - Chimpanzee Trekking',
                "seo_description" => 'Trek to see wild chimpanzees in Gombe Stream National Park.',
                "seo_keywords" => 'gombe stream, chimpanzee trekking, jane goodall',
            ],

            // ============================================================
            // SERVAL WILDLIFE EXPERIENCE
            // ============================================================
            [
                "name" => 'Serval Wildlife Experience',
                "slug" => 'serval',
                "subtitle" => 'Serval Wildlife Sanctuary',
                "badge_text" => 'Wildlife Up Close',
                "short_description" => 'Get up close with habituated servals, caracals, cheetahs, and more at this unique sanctuary.',
                "description" => '<p>The Serval Wildlife Experience offers a unique opportunity to interact with rescued wildlife near Kilimanjaro.</p>',
                "hero_image" => 'img/serval-main.jpg',
                "thumbnail_image" => 'img/dest-serval.jpg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Kilimanjaro Region, Tanzania',
                "category" => 'Other Attractions & Experiences',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Servals, Caracals, Cheetahs, Wildlife Sanctuary',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Visit Serval Wildlife',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'mtkilimanjaro',
                  1 => 'materuni',
                  2 => 'arushanationalpark',
                ),
                "is_active" => true,
                "sort_order" => 15,
                "seo_title" => 'Serval Wildlife Experience - Tanzania',
                "seo_description" => 'Get up close with habituated wildlife at Serval Wildlife Experience.',
                "seo_keywords" => 'serval wildlife, caracal, cheetah sanctuary',
            ],

            // ============================================================
            // ZANZIBAR ARCHIPELAGO
            // ============================================================
            [
                "name" => 'Zanzibar Archipelago',
                "slug" => 'ZanzibarArchipelago',
                "subtitle" => 'Zanzibar: Spice Islands & Beach Paradise',
                "badge_text" => 'Islands of Spice & Splendor',
                "short_description" => 'Famous for stunning beaches, turquoise waters, historic Stone Town, spice farms, and rich culture.',
                "description" => '<p>Zanzibar Archipelago offers pristine beaches, turquoise waters, historic Stone Town, and rich Swahili culture.</p>',
                "hero_image" => 'img/zanzibar-main-beach.jpg',
                "thumbnail_image" => 'img/dest-zanzibar.jpeg',
                "gallery_images" => array (
                ),
                "highlights" => array (
                ),
                "features" => array (
                ),
                "quick_facts" => array (
                ),
                "location" => 'Zanzibar, Tanzania',
                "category" => 'Other Attractions & Experiences',
                "best_time_to_visit" => array (
                ),
                "key_attractions" => 'Stone Town, beaches, spice farms',
                "wildlife_highlights" => '',
                "activities" => array (
                ),
                "faq" => array (
                ),
                "cta_text" => 'Explore Zanzibar',
                "cta_url" => '/booking',
                "map_embed_url" => '',
                "video_url" => '',
                "related_destinations" => array (
                  0 => 'serengeti',
                  1 => 'ngorongoro',
                  2 => 'tarangire',
                ),
                "is_active" => true,
                "sort_order" => 16,
                "seo_title" => 'Zanzibar Archipelago Tours - Tanzania',
                "seo_description" => 'Explore Zanzibar with Golden Memories Safaris.',
                "seo_keywords" => 'zanzibar, stone town, spice islands, beach holiday',
            ],];

        foreach ($destinations as $data) {
            Destination::create($data);
        }

        $this->command->info('Seeded ' . count($destinations) . ' destinations successfully.');
    }
}
