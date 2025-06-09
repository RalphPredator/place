<script setup>
import TextInput from '@/Components/TextInput.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

</script>

<template>

    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-slate-900 dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                        <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                        </Link>

                        <template v-else>
                            <Link :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                            </Link>

                            <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main>
                    <section
                        class="flex flex-col md:flex-row items-center justify-center px-6 md:px-12 lg:px-24 gap-12 md:gap-24">
                        <!-- Text Content -->
                        <div class="md:w-1/2 space-y-6 text-center md:text-left animate__animated animate__fadeInLeft">

                            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                                <span
                                    class="bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">Event</span>
                            </h1>
                            <h2 class="text-xl md:text-2xl text-gray-300 font-light max-w-lg">
                                Transform your event experience with our all-in-one event management app.
                            </h2>
                            <p class="text-gray-400 max-w-md">
                                Discover real-time schedules, personalized agendas, live updates, and seamless
                                networking tools — all in
                                one place.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start pt-4">
                                <TextInput type="text" />
                                <button
                                    class="border border-gray-700 hover:bg-gray-900 text-white px-8 py-3 rounded-full font-medium transition duration-300">
                                    Search event <span class="text-blue-400">▶</span>
                                </button>
                            </div>
                        </div>

                        <!-- iPhone Image -->
                        <div class="md:w-1/2 flex justify-center animate__animated animate__fadeIn animate__delay-1s">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                    alt="iPhone 15 Pro in Titanium"
                                    class="w-full max-w-md xl:max-w-xl object-contain animate-subtlePulse"
                                    style="animation-duration: 8s;">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-40">
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="mt-[80px] py-12 dark:bg-gray-900 dark:text-gray-200 sm:py-12 lg:py-16">
                        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <div class="max-w-xl mx-auto text-center xl:max-w-2xl">
                                <h2
                                    class="text-3xl font-bold leading-tight text-gray-50 dark:text-gray-200 sm:text-4xl xl:text-5xl mb-6">
                                    The event experience starts here!
                                </h2>
                                <p class="mb-4">
                                    Join us for an inspiring day filled with discoveries, connections, and unique
                                    opportunities.
                                </p>
                            </div>

                            <div
                                class="grid max-w-4xl lg:max-w-6xl grid-cols-1 mx-auto mt-8 text-center gap-y-4 sm:gap-x-8 sm:grid-cols-2 lg:grid-cols-3 sm:mt-12 lg:mt-20 sm:text-left">

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Interactive
                                            Workshops
                                        </h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Take part in hands-on
                                            workshops to
                                            learn, create, and
                                            collaborate in small groups.</p>
                                    </div>
                                </div>

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Inspiring Talks
                                        </h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Renowned speakers
                                            will share their
                                            insights and
                                            expertise on key topics.</p>
                                    </div>
                                </div>

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Networking
                                            Sessions
                                        </h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Connect with other
                                            participants to
                                            exchange ideas and
                                            projects in a friendly atmosphere.</p>
                                    </div>
                                </div>

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Live Demos</h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Watch live
                                            demonstrations of
                                            innovative
                                            projects and
                                            engage directly with the creators.</p>
                                    </div>
                                </div>

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Relaxation &
                                            Entertainment Area</h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Enjoy relaxing
                                            moments between
                                            activities with games,
                                            music, and fun animations.</p>
                                    </div>
                                </div>

                                <div class="overflow-hidden bg-white dark:bg-slate-800 shadow-md rounded-xl">
                                    <div class="p-9">
                                        <h3 class="mt-6 text-2xl font-bold text-gray-900 dark:text-gray-300 sm:mt-10">
                                            Collaborative
                                            Roundtables</h3>
                                        <p class="mt-6 text-base text-gray-600 dark:text-gray-300">Discuss current
                                            themes with experts
                                            and
                                            attendees in an
                                            open and participatory format.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="mt-[80px] py-12 dark:bg-gray-900 dark:text-gray-200 sm:py-12 lg:py-16">
                        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <div class="max-w-xl mx-auto text-center xl:max-w-2xl">
                                <h2
                                    class="text-3xl font-bold leading-tight text-gray-50 dark:text-gray-200 sm:text-4xl xl:text-5xl mb-6">
                                    The last events upcoming
                                </h2>
                            </div>

                            <div
                                class="grid max-w-4xl lg:max-w-6xl grid-cols-1 mx-auto mt-8 text-center gap-y-4 sm:gap-x-8 sm:grid-cols-2 lg:grid-cols-3 sm:mt-12 lg:mt-20 sm:text-left">

                                <article v-for="i in 6" :key="i"
                                    class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg dark:shadow-gray-700/25">
                                    <img alt=""
                                        src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                        class="h-56 w-full object-cover" />

                                    <div class="bg-white p-4 sm:p-6 dark:bg-gray-900">
                                        <div class="flex justify-between">
                                            <time datetime="2022-10-10"
                                                class="block text-xs text-gray-500 dark:text-gray-400">
                                                <i class="bi bi-calendar"></i> 10th Oct 2022
                                            </time>
                                            <span class="block text-xs text-gray-500 dark:text-gray-400">
                                                <i class="bi bi-geo-alt"></i>Douala Fair Grounds
                                            </span>
                                        </div>

                                        <a href="#">
                                            <h3 class="mt-0.5 text-lg text-gray-900 dark:text-white">
                                                How to position your furniture for positivity
                                            </h3>
                                        </a>

                                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500 dark:text-gray-400">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae
                                            dolores, possimus
                                            pariatur animi temporibus nesciunt praesentium dolore sed nulla ipsum
                                            eveniet corporis
                                            quidem,
                                            mollitia itaque minus soluta, voluptates neque explicabo tempora nisi culpa
                                            eius atque
                                            dignissimos. Molestias explicabo corporis voluptatem?
                                        </p>
                                    </div>
                                </article>

                                <div class="">
                                    <button type="button"
                                        class="flex items-center rounded-full border border-gray-300 bg-secondary-50 dark:bg-slate-200 px-3 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100">
                                        <i class="mr-1 h-4 w-4 bi bi-chevron-down"></i>
                                        View More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </section>

                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">

                </footer>
            </div>
        </div>
    </div>
</template>
