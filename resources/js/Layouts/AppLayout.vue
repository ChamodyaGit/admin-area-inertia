<template>
    <div>

        <Head :title="title ? title : 'Home'">
            <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
            <slot name="meta_head" />
        </Head>

        <body class="g-sidenav-show bg-gray-100">

            <SideBar />

            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

                <NavBar />

                <div class="container-fluid py-4">

                    <slot name="content" />

                    <Footer />

                </div>
            </main>

        </body>
    </div>
</template>

<script>
import { Head } from '@inertiajs/vue3'
import NavBar from '@/Components/Main/NavBar.vue'
import SideBar from '@/Components/Main/SideBar.vue'
import Footer from '@/Components/Main/Footer.vue'

export default {
    components: {
        NavBar,
        SideBar,
        Footer,
    },
    props: {
        title: String,
    },
}

</script>

<style lang="css" scoped></style>
