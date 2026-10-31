      
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'مكتبة أوراق المعاني')
    </title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-100 text-gray-800">

    <!-- ================= HEADER ================= -->

    <header class="bg-blue-700 text-white shadow-lg">

        <div class="container mx-auto px-6 py-5">

            <!-- اسم المكتبة -->

            <div class="flex items-center justify-between">

                <h1 class="text-2xl font-bold">
                    مكتبة أوراق المعاني
                </h1>

                <!-- العربة -->

                <a href="{{ route('cart') }}"
                   class="bg-green-600 hover:bg-green-700
                          px-4 py-2 rounded-lg
                          transition">

                    <i class="fa-solid fa-cart-shopping"></i>

                    أضف إلى العربة

                </a>

            </div>


            <!-- ================= NAVBAR ================= -->

            <nav class="mt-5">

                <ul class="flex flex-wrap gap-4">

                    <!-- الرئيسية -->

                    <li>
                        <a href="{{ route('home') }}"
                           class="hover:text-yellow-300">
                            الصفحة الرئيسية
                        </a>
                    </li>


                    <!-- عن المكتبة -->

                    <li>
                        <a href="{{ route('about') }}"
                           class="hover:text-yellow-300">
                            عن المكتبة
                        </a>
                    </li>


                    <!-- الدواوين -->

                    <li>
                        <a href="{{ route('diwan') }}"
                           class="hover:text-yellow-300">
                            الدواوين
                        </a>
                    </li>


                    <!-- فيديو شخصية ملهمة -->

                    <li>
                        <a href="{{ route('inspiring.video') }}"
                           class="hover:text-yellow-300">
                            فيديو شخصية ملهمة
                        </a>
                    </li>


                    <!-- ألحان بالذكاء الاصطناعي -->

                    <li>
                        <a href="{{ route('ai.music') }}"
                           class="hover:text-yellow-300">
                            ألحان بالذكاء الاصطناعي
                        </a>
                    </li>


                    <!-- تواصل معنا -->

                    <li>
                        <a href="{{ route('contact') }}"
                           class="hover:text-yellow-300">
                            تواصل معنا
                        </a>
                    </li>

                </ul>

            </nav>

        </div>

    </header>


    <!-- ================= MAIN ================= -->

    <main class="container mx-auto px-6 py-10">

        @yield('content')

    </main>


    <!-- ================= FOOTER ================= -->

    <footer class="bg-blue-700 text-white mt-10">

        <div class="container mx-auto px-6 py-8">

            <div class="grid md:grid-cols-3 gap-8">


                <!-- معلومات المكتبة -->

                <div>

                    <h2 class="text-xl font-bold mb-3">
                        مكتبة أوراق المعاني
                    </h2>

                    <p>
                        عالم من الشعر والقصائد
                        والمعاني والألحان.
                    </p>

                </div>


                <!-- روابط سريعة -->

                <div>

                    <h2 class="text-xl font-bold mb-3">
                        روابط سريعة
                    </h2>

                    <div class="flex flex-col gap-2">

                        <a href="{{ route('home') }}"
                           class="hover:text-yellow-300">
                            الصفحة الرئيسية
                        </a>

                        <a href="{{ route('about') }}"
                           class="hover:text-yellow-300">
                            عن المكتبة
                        </a>

                        <a href="{{ route('diwan') }}"
                           class="hover:text-yellow-300">
                            الدواوين
                        </a>

                        <a href="{{ route('contact') }}"
                           class="hover:text-yellow-300">
                            تواصل معنا
                        </a>

                    </div>

                </div>


                <!-- العربة -->

                <div>

                    <h2 class="text-xl font-bold mb-3">
                        العربة
                    </h2>

                    <a href="{{ route('cart') }}"
                       class="inline-block
                              bg-green-600
                              hover:bg-green-700
                              px-5 py-2
                              rounded-lg">

                        <i class="fa-solid fa-cart-shopping"></i>

                        أضف إلى العربة

                    </a>

                </div>

            </div>


            <!-- حقوق النشر -->

            <div class="border-t border-blue-400
                        mt-8 pt-5 text-center">

                <p>
                    © {{ date('Y') }}
                    مكتبة أوراق المعاني
                    - جميع الحقوق محفوظة
                </p>

            </div>

        </div>

    </footer>

</body>

</html>