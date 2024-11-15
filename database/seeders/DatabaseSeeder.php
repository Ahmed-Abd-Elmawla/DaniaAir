<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\SafetyItem;
use App\Models\SafetyCategory;
use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         if (!Admin::where('email', 'admin@mail.com')->exists()) {
//             Admin::create([
//                 'name' => 'Admin',
//                 'email' => 'admin@mail.com',
//                 'password' => '123456789@admin',
//                 'phone' => '0123456789',
//                 'is_active' => false,
//                 'image' => 'admin.jpg',
//             ]);
//         }

//         if (!Admin::where('email', 'admin@admin.com')->exists()) {
//             Admin::create([
//                 'name' => 'Admin',
//                 'email' => 'admin@admin.com',
//                 'password' => '123456789',
//                 'phone' => '0123456789',
//                 'is_active' => true,
//                 'image' => 'admin.jpg',
//             ]);
//         }

//         $cat_1 = SafetyCategory::create([
//             'name' => [
//                 'en' => 'General Work Environment',
//                 'ar' => 'بيئة العمل العامة',
//             ]
//         ]);

//         $cat_2 = SafetyCategory::create([
//             'name' => [
//                 'en' => 'Emergency Preparedness',
//                 'ar' => 'الإستعداد للطوارئ',
//             ]
//         ]);

//         $cat_3 = SafetyCategory::create([
//             'name' => [
//                 'en' => 'Personal Protective Equipment (PPE)',
//                 'ar' => 'معدات الحماية الشخصية',
//             ]
//         ]);

//         $cat_4 = SafetyCategory::create([
//             'name' => [
//                 'en' => 'Slips, Trips, and Falls',
//                 'ar' => 'الإنزلاقات والتعثرات والسقوط',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_1->id,
//             'item_desc' => [
//                 'en' => 'Are floors clean, dry, and free of spills or obstructions?',
//                 'ar' => 'هل الأرضيات نظيفة وجافة وخالية من الانسكابات أو العوائق؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_1->id,
//             'item_desc' => [
//                 'en' => 'Is there adequate lighting in all areas?',
//                 'ar' => 'هل الإضاءة كافية في جميع المناطق؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_1->id,
//             'item_desc' => [
//                 'en' => 'Are exits and emergency routes clearly markedand unobstructed?',
//                 'ar' => 'هل مخارج الطوارئ وطرق الطوارئ محددة بشكل واضح وغير مسدودة؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are fire extinguishers available, accessible, not expired and properly maintained?',
//                 'ar' => 'هل أجهزة إطفاء الحرائق متوفرة ويمكن الوصول إليها وغير منتهية الصلاحية ويتم صيانتها بشكل صحيح؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are employees trained in emergency procedures and fire drills?',
//                 'ar' => 'هل يتم تدريب الموظفين على إجراءات الطوارئ وتدريبات الحرائق؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are first aid kits stocked and accessible?',
//                 'ar' => 'هل تم تخزين معدات الإسعافات الأولية ويمكن الوصول إليها بسهولة؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are emergency contact numbers posted in visible areas?',
//                 'ar' => 'هل يتم نشر أرقام الاتصال في حالات الطوارئ في مناطق مرئية؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are smoke detectors and fire alarms functional?',
//                 'ar' => 'هل أجهزة كشف الدخان وأجهزة الإنذار بالحريق تعمل؟ ',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Is the sprinkler system maintained and operational?',
//                 'ar' => 'هل يتم صيانة نظام الرش وتشغيله؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are emergency evacuation plans posted?',
//                 'ar' => 'هل تم نشر خطط الإخلاء في حالات الطوارئ؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_2->id,
//             'item_desc' => [
//                 'en' => 'Are employees aware of the fire alarm and evacuation procedure?',
//                 'ar' => ' هل الموظفين على علم بإجراءات الإنذار من الحرائق والإخلاء؟ ',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_3->id,
//             'item_desc' => [
//                 'en' => 'Is the required PPE available for employees (e.g., gloves, safety goggles, helmets, hearing protection)?',
//                 'ar' => 'هل تتوفر معدات الحماية الشخصية المطلوبة للموظفين (على سبيل المثال، القفازات، نظارات السلامة، الخوذات، وسائل حماية السمع)؟ ',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_3->id,
//             'item_desc' => [
//                 'en' => 'Are employees trained on the proper use of PPE?',
//                 'ar' => 'هل يتم تدريب الموظفين على الاستخدام الصحيح لمعدات الحماية الشخصية؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_4->id,
//             'item_desc' => [
//                 'en' => 'Are floors and walkways free of tripping hazards (e.g., cords, boxes)?',
//                 'ar' => 'هل الأرضيات والممرات خالية من مخاطر التعثر (مثل الحبال والصناديق)؟',
//             ]
//         ]);

//         SafetyItem::create([
//             'category_id' => $cat_4->id,
//             'item_desc' => [
//                 'en' => 'Are the floors planned to identify safe passages and dedicated passages for the passage of machinery?',
//                 'ar' => 'هل تم تخطيط الارضيات لتحديد الممرات الامنه وممرات مخصصه لمرور الاليات؟',
//             ]
//         ]);
//     }
// }



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (!Admin::where('email', 'admin@mail.com')->exists()) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('123456789@admin'),
                'phone' => '0123456789',
                'is_active' => false,
                'image' => 'admin.jpg',
            ]);
        }

        if (!Admin::where('email', 'admin@admin.com')->exists()) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456789'),
                'phone' => '0123456789',
                'is_active' => true,
                'image' => 'admin.jpg',
            ]);
        }

        $cat_1 = SafetyCategory::firstOrCreate(
            ['name->en' => 'General Work Environment'],
            ['name' => ['en' => 'General Work Environment', 'ar' => 'بيئة العمل العامة']]
        );

        $cat_2 = SafetyCategory::firstOrCreate(
            ['name->en' => 'Emergency Preparedness'],
            ['name' => ['en' => 'Emergency Preparedness', 'ar' => 'الإستعداد للطوارئ']]
        );

        $cat_3 = SafetyCategory::firstOrCreate(
            ['name->en' => 'Personal Protective Equipment (PPE)'],
            ['name' => ['en' => 'Personal Protective Equipment (PPE)', 'ar' => 'معدات الحماية الشخصية']]
        );

        $cat_4 = SafetyCategory::firstOrCreate(
            ['name->en' => 'Slips, Trips, and Falls'],
            ['name' => ['en' => 'Slips, Trips, and Falls', 'ar' => 'الإنزلاقات والتعثرات والسقوط']]
        );

        $safetyItems = [
            [$cat_1->id, 'Are floors clean, dry, and free of spills or obstructions?', 'هل الأرضيات نظيفة وجافة وخالية من الانسكابات أو العوائق؟'],
            [$cat_1->id, 'Is there adequate lighting in all areas?', 'هل الإضاءة كافية في جميع المناطق؟'],
            [$cat_1->id, 'Are exits and emergency routes clearly marked and unobstructed?', 'هل مخارج الطوارئ وطرق الطوارئ محددة بشكل واضح وغير مسدودة؟'],
            [$cat_2->id, 'Are fire extinguishers available, accessible, not expired and properly maintained?', 'هل أجهزة إطفاء الحرائق متوفرة ويمكن الوصول إليها وغير منتهية الصلاحية ويتم صيانتها بشكل صحيح؟'],
            [$cat_2->id, 'Are employees trained in emergency procedures and fire drills?', 'هل يتم تدريب الموظفين على إجراءات الطوارئ وتدريبات الحرائق؟'],
            [$cat_2->id, 'Are first aid kits stocked and accessible?', 'هل تم تخزين معدات الإسعافات الأولية ويمكن الوصول إليها بسهولة؟'],
            [$cat_2->id, 'Are emergency contact numbers posted in visible areas?', 'هل يتم نشر أرقام الاتصال في حالات الطوارئ في مناطق مرئية؟'],
            [$cat_2->id, 'Are smoke detectors and fire alarms functional?', 'هل أجهزة كشف الدخان وأجهزة الإنذار بالحريق تعمل؟'],
            [$cat_2->id, 'Is the sprinkler system maintained and operational?', 'هل يتم صيانة نظام الرش وتشغيله؟'],
            [$cat_2->id, 'Are emergency evacuation plans posted?', 'هل تم نشر خطط الإخلاء في حالات الطوارئ؟'],
            [$cat_2->id, 'Are employees aware of the fire alarm and evacuation procedure?', 'هل الموظفين على علم بإجراءات الإنذار من الحرائق والإخلاء؟'],
            [$cat_3->id, 'Is the required PPE available for employees (e.g., gloves, safety goggles, helmets, hearing protection)?', 'هل تتوفر معدات الحماية الشخصية المطلوبة للموظفين (مثل القفازات، نظارات السلامة، الخوذات، وسائل حماية السمع)؟'],
            [$cat_3->id, 'Are employees trained on the proper use of PPE?', 'هل يتم تدريب الموظفين على الاستخدام الصحيح لمعدات الحماية الشخصية؟'],
            [$cat_4->id, 'Are floors and walkways free of tripping hazards (e.g., cords, boxes)?', 'هل الأرضيات والممرات خالية من مخاطر التعثر (مثل الحبال والصناديق)؟'],
            [$cat_4->id, 'Are the floors planned to identify safe passages and dedicated passages for the passage of machinery?', 'هل تم تخطيط الارضيات لتحديد الممرات الامنه وممرات مخصصه لمرور الاليات؟']
        ];

        foreach ($safetyItems as $item) {
            [$categoryId, $descEn, $descAr] = $item;
            SafetyItem::firstOrCreate(
                [
                    'category_id' => $categoryId,
                    'item_desc->en' => $descEn
                ],
                [
                    'item_desc' => [
                        'en' => $descEn,
                        'ar' => $descAr
                    ]
                ]
            );
        }
    }
}
