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
                                                                                <p class="text-xs text-secondary mb-0">
                                                                                {{ student.nic }}</p>
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
                                                                        @click.prevent="editStudent(student.id)"
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

        <template #modals>
            <div class="modal fade" id="studentEdit" tabindex="-1" role="dialog" aria-labelledby="studentEditLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentEditLabel">Update Student</h5>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="studentUpdate">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="col-12">
                                                    <label class="form-control-label">Student Name</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        v-model="student_update_form.name" placeholder="Type name..."
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="col-12">
                                                    <label class="form-control-label">Address</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        v-model="student_update_form.address"
                                                        placeholder="Type home address..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="col-12">
                                                    <label class="form-control-label">Contact Number</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control"
                                                        v-model="student_update_form.contact"
                                                        placeholder="Type mobile number..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="col-12">
                                                    <label class="form-control-label">Email</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control"
                                                        v-model="student_update_form.email"
                                                        placeholder="Type email address..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="col-12">
                                                    <label class="form-control-label">Gender</label>
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" v-model="student_update_form.gender">
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
                                                    <input class="form-control" type="date"
                                                        v-model="student_update_form.date" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 mt-2">
                                                <div class="col-12">
                                                    <label class="form-control-label">NIC</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        v-model="student_update_form.nic" placeholder="Type NIC number..."
                                                        required>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12 col-lg-6 mt-2">
                                                        <div class="col-12">
                                                            <label class="form-control-label">Profile Image</label>
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control dropify" type="file"
                                                                @input="student_update_form.pimage = $event.target.files[0]"
                                                                accept=" image/jpg, image/jpeg, image/png" required>
                                                        </div>
                                                    </div> -->
                                        </div>
                                    </div>
                                    <div class="col-8 offset-2 col-lg-2 offset-lg-5 mt-4">
                                        <div class="row">
                                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
            student_update_form: {
                name: '',
                address: '',
                contact: '',
                email: '',
                gender: '',
                date: '',
                nic: '',
                // pimage: null,
            },
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
        async editStudent(id) {
            const student = (await axios.get(route('student.get', id))).data
            this.student_update_form = student
            $('#studentEdit').modal('show')
        },
        async studentUpdate(){
            await axios.post(route('student.update', this.student_update_form.id), this.student_update_form)
            this.getStudents();
            $('#studentEdit').modal('hide')
        }
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
