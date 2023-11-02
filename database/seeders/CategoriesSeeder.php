<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'منظفات',
            'تسالي',
            'وجبات خفيفة',
            'أطعمة سريعة',
            'مشروبات غازية',
            'مطاعم',
            'أدوات العناية بالبشرة',
            'مستحضرات التجميل',
            'ملابس رجالية',
            'ملابس نسائية',
            'مستلزمات الأطفال',
            'ألعاب الفيديو',
            'أجهزة الكمبيوتر المحمولة',
            'هواتف ذكية',
            'أجهزة تلفزيون',
            'سيارات',
            'دراجات هوائية',
            'أدوات الحدائق',
            'صناديق أدوات',
            'كتب التطوير الشخصي',
            'الألعاب اللوحية',
            'أدوات المطبخ',
            'أجهزة التحكم عن بُعد',
            'الأثاث المنزلي',
            'أدوات الخياطة',
            'مستلزمات الحيوانات الأليفة',
            'أجهزة الصوت',
            'أجهزة التسجيل الصوتي',
            'الكاميرات الضوئية',
            'أجهزة اللابتوب',
            'الألعاب الرياضية',
            'مستلزمات الرياضة',
            'أجهزة اللياقة البدنية',
            'مواد تعليمية',
            'أدوات الرسم',
            'الأدوات الموسيقية',
            'مجوهرات',
            'العطور',
            'الساعات',
            'النظارات الشمسية',
            'مستلزمات الحمام',
            'مستلزمات السفر',
            'الحقائب',
            'أجهزة اللوحية',
            'ألعاب الأطفال',
            'ألعاب التعليم الإلكترونية',
            'الألعاب التعليمية',
            'الأجهزة اللوجستية',
            'الأدوات الكهربائية',
            'الأجهزة المنزلية الذكية',
            'أجهزة الأمان المنزلي',
            'الأجهزة الرياضية المنزلية',
            'مستلزمات الأنشطة الخارجية',
            'معدات التخييم',
            'معدات الصيد',
            'معدات الرحلات البرية',
            'المنتجات العضوية الطبيعية',
            'منتجات الصحة والعافية',
            'منتجات العناية الشخصية',
            'أجهزة قياس الصحة',
            'المنتجات البيئية',
            'الهدايا والتذكارات',
            'الأثاث المكتبي',
            'المستلزمات المكتبية',
            'الأجهزة الإلكترونية للمكتب',
            'الطابعات والماسحات الضوئية',
            'الألعاب التعليمية للمدارس',
            'مستلزمات الفنادق',
            'منتجات الأمان والحماية',
            'منتجات الطاقة المتجددة',
            'المنتجات الكهربائية المنزلية',
            'مستلزمات الحدائق والمسابح',
            'أدوات الشواء والشواء',
            'مستلزمات الشواء والتخييم',
            'الأجهزة الطبية',
            'معدات العلاج الطبيعي',
            'مستلزمات الطبخ والخبز',
            'أدوات الخبز والحلويات',
            'مستلزمات الحفلات والمناسبات',
            'أدوات تنظيف المنزل',
            'مستلزمات الحفاظ على الصحة النفسية',
            'الأدوات الرقمية والتكنولوجية',
            'معدات الرياضات المائية',
            'مستلزمات السباحة',
            'الأجهزة الكهربائية الصغيرة',
            'مستلزمات الحدائق العمودية والأعمال الزراعية',
            'معدات الإضاءة والديكور المنزلي',
            'المنتجات الورقية ومستلزمات الكتابة',
            'أدوات الكمبيوتر والإكسسوارات',
            'أدوات الحلاقة والعناية الشخصية للرجال',
            'مستلزمات الشواء والمشويات',
            'أدوات الطهي والمخبوزات',
            'مستلزمات الحياكة والصوف',
            'الألعاب الخشبية والألعاب التقليدية',
            'مستلزمات الكائنات الحية المائية والأحواض الزجاجية',
            'معدات الفنون والحرف اليدوية',
            'الأجهزة الإلكترونية الاستهلاكية',
            'مستلزمات الأمان والحماية الشخصية',
            'مستلزمات الطب البيطري',
            'مستلزمات الحدائق العمودية والزراعة المنزلية',
            'أدوات الرعاية الصحية المنزلية',
            'معدات التصوير الفوتوغرافي والفيديو',
            'أخرى',
        ];

        foreach ($categories as $category){
            Category::create(['category_name'=>$category]);
        }
    }
}
