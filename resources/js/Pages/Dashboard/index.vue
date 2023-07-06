<template>
    <AppLayout title="Dashboard">
        <template #content>
            <div class="row">
                <div class="col-lg-7 position-relative z-index-2 body_content">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">Dashboard</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </template>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'

export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            imageSrc1: "../../public/assets/img/icons/flags/US.png",
            imageSrc2: "../../assets/img/icons/flags/DE.png",
            imageSrc3: "../../assets/img/icons/flags/GB.png",
            imageSrc4: "../../assets/img/icons/flags/BR.png",
            imageAlt: "Country flag"
        };
    }
}
</script>

<style lang="css" scoped>
.async-hide {
    opacity: 0 !important
}

.body_content{
    height: 75vh;
}
</style>
