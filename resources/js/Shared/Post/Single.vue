<template>
    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

                <Link class="font-bold text-sm text-gray-600 flex gap-1 items-center hover:text-blue-600" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                    stroke="currentColor" class="w-4 h-4 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                </svg>

                Home</Link>

                <header class="my-6 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <!-- <img class="mr-4 w-10 h-10 rounded-full" :src="$page.props.app_url + 'logo/blog-logo.svg'"
                                alt="Jese Leos" /> -->
                            <div>
                                <a href="#" rel="author" class="text-sm font-bold text-gray-900 dark:text-white">{{
                                    $page.props.admin.name }}</a>
                                <!-- <p
                                    class="text-base font-light text-gray-500 dark:text-gray-400"
                                >
                                    Graphic Designer, educator & CEO Flowbite
                                </p> -->
                                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{
                                        days[
                                        new Date(
                                            post.created_at
                                        ).getDay()
                                        ] +
                                        ", " +
                                        new Date(
                                            post.created_at
                                        ).getDate() +
                                        " " +
                                        months[
                                        new Date(
                                            post.created_at
                                        ).getMonth()
                                        ]
                                    }}</time>
                                </p>
                            </div>
                        </div>
                    </address>
                    <h2 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900 lg:text-4xl underline">
                        {{ post.heading }}
                    </h2>
                    <p class="text-base font-light italic">
                        {{ post.sub_heading }}
                    </p>
                </header>

                <!-- <p>
                    Before going digital, you might benefit from scribbling down
                    some ideas in a sketchbook. This way, you can think things
                    through before committing to an actual design project.
                </p> -->

                <figure>
                    <img :src="post.thumbnail_url" class="rounded-xl mb-4" alt="" />
                    <figcaption>Digital art by Anonymous</figcaption>
                </figure>
                <p v-html="post.text_content">
                </p>
            </article>
        </div>
    </main>
</template>
<script>
export default {
    props: ["post"],
    data() {
        return {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        }
    },
};
</script>
