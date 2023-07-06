<template>
    <AppLayout title="Register Student">
        <template #content>
            <div class="row">
                <div class="col-lg-12 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">Register Student</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card  mb-4">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Student Name</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Type name..."
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Address</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type home address..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Contact Number</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" class="form-control"
                                                            placeholder="Type mobile number..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Email</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control"
                                                            placeholder="Type email address..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Gender</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Date of Birth</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="date" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">NIC</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type NIC number..." required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6 mt-2">
                                                    <div class="col-12">
                                                        <label class="form-control-label">Profile Image</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control dropify" type="file" name="images"
                                                            accept=" image/jpg, image/jpeg, image/png" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8 offset-2 col-lg-2 offset-lg-5 mt-4">
                                            <div class="row">
                                                <button type="button" class="btn bg-gradient-primary">Register</button>
                                            </div>
                                        </div>
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
            imageSrcLogo: "../../assets/img/logo-ct-dark.png",
            imageAlt: "Country flag",
            imageAltLogo: "main_logo",
        };
    }
}
</script>

<style lang="css" scoped>
.async-hide {
    opacity: 0 !important
}
</style>
