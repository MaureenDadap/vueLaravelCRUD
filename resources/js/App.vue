<template>
    <nav class="bg-white flex shadow-md">
        <div class="mx-auto">
            <div class="relative flex h-16 items-center flex-row">
                <a class="pr-10">
                    <router-link to="/">Home</router-link>
                </a>
            </div>
        </div>
    </nav>

    <div
        class="container pt-10 md:max-w-4xl px-4 lg:px-0 md:mx-auto"
    >
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
</script>
