<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';

    protected $fillable = [
        'hero_badge',
        'hero_name',
        'hero_subtitle',
        'hero_quote',
        'hero_image',
        'hero_floating_text',
        'expertise_cards',
        'tip_banner',
        'achievements',
        'consultations_text',
        'volunteering_intro',
        'volunteering_bullets',
        'volunteering_closing',
        'phone',
        'email',
        'visit_count',
        'social_links',
        'skills',
        'languages',
        'certifications',
        'experiences',
        'media_appearances',
    ];

    protected $casts = [
        'expertise_cards' => 'array',
        'achievements' => 'array',
        'volunteering_bullets' => 'array',
        'social_links' => 'array',
        'skills' => 'array',
        'languages' => 'array',
        'certifications' => 'array',
        'experiences' => 'array',
        'media_appearances' => 'array',
    ];

    /**
     * Get the singleton instance, creating default data if none exists.
     */
    public static function singleton(): self
    {
        return static::firstOrCreate([], [
            'hero_badge' => 'مرحباً بكم في الموقع الرسمي',
            'hero_name' => 'د. نجوى بنت ذياب المطيري',
            'hero_subtitle' => "مستشارة تربوية بشؤون الأسرة والطفل وكبار السن\nرئيسة مبادرة عون التعليمية التربوية",
            'hero_quote' => 'مهتمة بتربية وتمكين جيل مسلم محصن فاهم واعي يخدم دينه ووطنه',
            'hero_image' => null,
            'hero_floating_text' => 'لتقديم استشارات تربوية وأسرية متخصصة في شؤون الأسرة والطفل والتعامل مع المراهقين وتمكين الأبناء',
            'expertise_cards' => [
                ['icon' => 'users', 'title' => 'الاستشارات التربوية', 'desc' => 'استشارات متخصصة في تربية الأطفال والتعامل مع المراهقين وحل المشكلات الأسرية.'],
                ['icon' => 'book-open', 'title' => 'التأليف والبحث العلمي', 'desc' => 'مؤلفة كتب تربوية متعددة وباحثة في المجال التربوي مع أبحاث منشورة محلياً ودولياً.'],
                ['icon' => 'academic-cap', 'title' => 'التدريب والتوعية', 'desc' => 'تقديم دورات تدريبية وورش عمل ولقاءات توعوية في المجالات التربوية والأسرية.'],
            ],
            'tip_banner' => 'حاصلة على درجة الدكتوراه في التربية، ماجستير في التربية، بكالوريوس في الأحياء، ودبلوم في الإرشاد الأسري. مستشارة تربوية معتمدة بشؤون الأسرة والطفل وكبار السن، ورئيسة مبادرة عون التعليمية التربوية.',
            'achievements' => [
                ['num' => '156', 'label' => 'مقالاً علمياً في الصحف والمجلات'],
                ['num' => '4', 'label' => 'كتب تعليمية وتربوية مؤلفة'],
                ['num' => '16', 'label' => 'بحثاً علمياً منشوراً'],
                ['num' => '132', 'label' => 'لقاءً تلفزيونياً وإذاعياً'],
                ['num' => '52', 'label' => 'عضوية في جهات معنية'],
                ['num' => '43', 'label' => 'مشاركة علمية في مؤتمرات محلية ودولية'],
            ],
            'consultations_text' => 'يسعدني تواصلكم لتقديم استشارات تربوية وأسرية متخصصة في: تربية الأطفال، التعامل مع المراهقين، الإرشاد الأسري، شؤون كبار السن، غرس القيم الإسلامية، الرقابة الذاتية عند الأطفال، والتعامل مع التنمر. ألتزم بتقديم حلول عملية مبنية على أسس تربوية وعلمية رصينة.',
            'volunteering_intro' => "رئيسة مبادرة عون التعليمية التربوية، إيماناً بأهمية التربية السليمة والتمكين المعرفي لبناء جيل واعٍ ومسؤول.\nأسعى للمساهمة في تمكين الأسر والمربين من خلال:",
            'volunteering_bullets' => [
                'تأليف كتب تعليمية وتربوية تعالج قضايا الطفولة والمراهقة.',
                'تقديم استشارات وورش عمل متخصصة للأسر والمؤسسات التعليمية.',
                'المشاركة في مؤتمرات محلية ودولية لنشر الوعي التربوي.',
            ],
            'volunteering_closing' => 'إيماني العميق بأن التربية الصحيحة هي أساس بناء المجتمعات، يدفعني دوماً للعطاء والمبادرة وصناعة أثر حقيقي في حياة الأسر …',
            'phone' => null,
            'email' => null,
            'social_links' => [
                ['platform' => 'x', 'url' => 'https://x.com/ange22228'],
                ['platform' => 'youtube', 'url' => 'https://www.youtube.com/@ange22228'],
                ['platform' => 'snapchat', 'url' => 'https://www.snapchat.com/add/ange222281'],
                ['platform' => 'tiktok', 'url' => 'https://www.tiktok.com/@ange222281'],
            ],
            'skills' => [
                'الاستشارات التربوية',
                'تربية الأطفال',
                'شؤون الأسرة والطفل',
                'الإرشاد الأسري',
                'شؤون كبار السن',
                'التعليم والتدريب',
                'البحث العلمي التربوي',
                'التوجيه والإرشاد النفسي',
                'التربية الإسلامية',
                'إدارة المبادرات التعليمية',
                'التأليف والنشر',
                'التحليل التربوي',
                'تنمية المهارات الوالدية',
                'التعامل مع المراهقين',
                'الرقابة الذاتية عند الأطفال',
            ],
            'languages' => [
                'اللغة العربية - متقدم',
                'اللغة الإنجليزية - جيد',
            ],
            'certifications' => [
                ['type' => 'شهادة', 'description' => 'دكتوراه في التربية'],
                ['type' => 'شهادة', 'description' => 'ماجستير في التربية'],
                ['type' => 'شهادة', 'description' => 'بكالوريوس في الأحياء'],
                ['type' => 'دبلوم', 'description' => 'دبلوم في الإرشاد الأسري'],
            ],
            'experiences' => [
                'رئيسة مبادرة عون التعليمية التربوية',
                'مستشارة تربوية بشؤون الأسرة والطفل وكبار السن',
                'عضو في عدة جهات معنية بالتربية والتعليم',
                'مؤلفة عدة كتب تعليمية وتربوية',
            ],
            'media_appearances' => [
                '132 لقاءً تلفزيونياً وإذاعياً في مجالات التربية والأسرة',
                '156 مقالاً علمياً في الصحف والمجلات المتخصصة',
                '16 بحثاً علمياً منشوراً في المجال التربوي',
                '43 مشاركة علمية في مؤتمرات محلية ودولية',
            ],
        ]);
    }
}
