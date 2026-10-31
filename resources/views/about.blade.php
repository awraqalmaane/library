@extends('layouts.public')

@section('title', 'عن المكتبة - أوراق المعاني')

@section('content')

    <section class="py-4">
        <h2 class="fw-bold mb-4" style="font-family: 'Amiri', serif;">عن المكتبة</h2>

        {{-- مقدمة --}}
        <p class="fs-5 lh-lg">
            <strong>أوراق المعاني</strong> ليست مجرد مكتبةٍ إلكترونية، بل هي مساحةٌ أدبية تنبض بالكلمة الصادقة؛
            وُلدت من حُبِّ الشعر والخاطرة، لتكون بيتًا يجمع ما تناثر من المعاني بين دفّتَي القصيدة والتأمّل.
            هنا تتحوّل الكلمات إلى أوراقٍ تُزهر في عقول من يقرؤها، وتبقى صدًى يرافق القارئ بعد أن يُغلق الصفحة.
        </p>

        <p class="fs-5 lh-lg text-muted">
            نؤمن أن للمعنى سلطانًا يفوق الزخرفة، وأن الجملة الواحدة قد تحمل من الوجدان ما تعجز عنه الصفحات.
            لذلك حرصنا أن يكون كل نصٍّ هنا مختارًا بعناية، محفوظًا بلغته وروحه كما كُتب، بعيدًا عن الضجيج،
            قريبًا من القلب.
        </p>

        {{-- رسالتنا ورؤيتنا --}}
        <div class="row g-4 my-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="font-family: 'Amiri', serif;">🎯 رسالتنا</h5>
                        <p class="text-muted mb-0 lh-lg">
                            أن نُتيح للكلمة الجميلة منبرًا يليق بها، ونُقرّب الأدب العربي —
                            شعرَه ومترجَمه وخواطره — من كل باحثٍ عن معنى، في زمنٍ قلّ فيه التأمّل.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3" style="font-family: 'Amiri', serif;">🌱 رؤيتنا</h5>
                        <p class="text-muted mb-0 lh-lg">
                            أن تصبح <strong>أوراق المعاني</strong> مرجعًا أدبيًّا حيًّا يكبر يومًا بعد يوم،
                            تتلاقى فيه الأصوات الشعرية القديمة والحديثة، ويجد فيه كل قارئٍ ما يُشبه روحه.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ماذا تجد هنا --}}
        <h4 class="fw-bold mt-5 mb-4" style="font-family: 'Amiri', serif;">ماذا تجد في أوراق المعاني؟</h4>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-3 text-center">
                    <div class="fs-1">📝</div>
                    <h6 class="fw-bold mt-2">قصائد متنوّعة</h6>
                    <p class="text-muted small mb-0">
                        قصائد دينية ومترجمة ومتنوّعة، مُصنّفة لتصل إلى ما تبحث عنه بسهولة.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 text-center">
                    <div class="fs-1">📚</div>
                    <h6 class="fw-bold mt-2">دواوين مختارة</h6>
                    <p class="text-muted small mb-0">
                        مجموعاتٌ شعرية كاملة لشعراء تركوا بصمتهم في ذاكرة الأدب العربي.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 text-center">
                    <div class="fs-1">✨</div>
                    <h6 class="fw-bold mt-2">معانٍ وخواطر</h6>
                    <p class="text-muted small mb-0">
                        ومضاتٌ وتأمّلات تُلامس الوجدان، وتمنحك وقفةً صادقة مع الذات.
                    </p>
                </div>
            </div>
        </div>

        {{-- لمسة ختامية --}}
        <div class="text-center my-5">
            <blockquote class="fs-4 fst-italic" style="font-family: 'Amiri', serif;">
                "الكلمات أوراقٌ تُزهر في عقول من يفهمها"
            </blockquote>
            <a href="{{ route('poems') }}" class="btn btn-dark btn-lg mt-3">ابدأ رحلتك مع القصائد</a>
        </div>
    </section>

@endsection
