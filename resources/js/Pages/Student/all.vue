<template>
    <AppLayout title="All Students">
        <template #content @load.prevent="getStudents()">
            <div class="row">
                <div class="col-lg-12 position-relative z-index-2">
                    <div class="card card-plain mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100">
                                        <h2 class="font-weight-bolder mb-0">All Students</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card mb-4 table-content">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="table-responsive">
                                                    <table class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    #</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Profile</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Status</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    DOB</th>
                                                                <th
                                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                    Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr v-for="(student, key) in student_list" :key="key">
                                                                <td>
                                                                    {{ key + 1 }}
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex px-2 py-1">
                                                                        <div>
                                                                            <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg"
                                                                                class="avatar avatar-sm me-3">
                                                                        </div>
                                                                        <div
                                                                            class="d-flex flex-column justify-content-center">
                                                                            <h6 class="mb-0 text-xs">{{ student.name }}</h6>
                                                                            <p class="text-xs text-secondary mb-0">
                                                                                {{ student.email }}</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center text-sm">
                                                                    <span v-if="student.status == 1"
                                                                        class="badge badge-sm badge-success">Active</span>
                                                                    <span v-else
                                                                        class="badge badge-sm badge-secondary">Inactive</span>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <span class="text-secondary text-xs font-weight-bold">{{
                                                                        student.date }}</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <button type="button" v-if="student.status == 0"
                                                                        @click="changeStatus(student.id)"
                                                                        class="btn bg-gradient-success ms-1"><i
                                                                            class="bi bi-check2"></i></button>
                                                                    <button type="button" v-else
                                                                        @click="changeStatus(student.id)"
                                                                        class="btn bg-gradient-warning ms-1"><i
                                                                            class="bi bi-slash-circle"></i></button>
                                                                    <button type="button"
                                                                        class="btn bg-gradient-info ms-1"><i
                                                                            class="bi bi-pencil-fill"></i></button>
                                                                    <button type="button"
                                                                        @click.prevent="deleteStudent(student.id)"
                                                                        class="btn bg-gradient-danger ms-1"><i
                                                                            class="bi bi-trash"></i></button>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
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
import axios from 'axios';

export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            student_list: []
        };
    },
    beforeMount() {
        this.getStudents();
    },
    methods: {
        async getStudents() {
            const students = (await axios.get(route('student.list'))).data
            this.student_list = students;
        },
        async changeStatus(id) {
            await axios.get(route('student.status', id))
            this.getStudents();
        },
        async deleteStudent(id) {
            await axios.delete(route('student.delete', id))
            this.getStudents();
        },
    }
}
</script>

<style lang="css" scoped>
.async-hide {
    opacity: 0 !important
}

.table-content {
    height: 60vh;
}
</style>
