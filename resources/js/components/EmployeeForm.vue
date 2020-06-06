<template>
    <div>
        <h2 class="text-center">{{this.type == 'edit' ? 'Update' : 'Create'}} Employee</h2>
        <form id="employee-form" class="p-5" @submit.prevent="submit">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fname">First Name</label>
                    <input id="fname" type="text"
                           :class="{ 'hasError': $v.form.fname.$error }"
                           class="form-control"
                           placeholder="First name"
                           v-model="form.fname">
                </div>
                <div class="form-group col-md-6">
                    <label for="lname">Second Name</label>
                    <input id="lname" type="text"
                           :class="{ 'hasError': $v.form.lname.$error }"
                           class="form-control"
                           placeholder="Last name"
                           v-model="form.lname">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="title">Title</label>
                    <select id="title" class="form-control" v-model="form.title">
                        <option v-for="(item, key) in title" :key="key">{{item}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" v-model="form.status">
                        <option v-for="(item, key) in status" :key="key">{{item}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="salary">Salary</label>
                    <input id="salary" type="number"
                           :class="{ 'hasError': $v.form.salary.$error }"
                           class="form-control"
                           placeholder="Salary e.g 5000"
                           v-model="form.salary">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="employee_status">Employee Status</label>
                    <select id="employee_status" class="form-control" v-model="form.employee_status">
                        <option v-for="(item, key) in employee_status" :key="key">{{item}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="employment_date">Employment date</label>
                    <input id="employment_date" type="date"
                           :class="{ 'hasError': $v.form.employment_date.$error }"
                           class="form-control"
                           placeholder="Employee Date"
                           v-model="form.employment_date">
                </div>
                <div class="form-group col-md-4">
                    <label for="raise">Amount Raised</label>
                    <input id="raise" type="number"
                           class="form-control"
                           placeholder="Employee Date"
                           v-model="form.raise">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">{{this.type == 'edit' ? 'Update' : 'Create'}}</button>
        </form>
    </div>
</template>

<script>
    import { required } from "vuelidate/lib/validators";
    import swal from 'sweetalert';

    export default {
        name: "EmployeeForm",
        props: ['employee', 'type'],
        data() {
            return {
                form: {
                    fname: this.employee && this.employee.fname || '',
                    lname: this.employee && this.employee.lname || '',
                    raise: this.employee && this.employee.raise || '',
                    salary: this.employee && this.employee.salary || '',
                    status: this.employee && this.employee.status || 'worker',
                    title: this.employee && this.employee.title || 'Tester',
                    employee_status: this.employee && this.employee.employee_status || 'part time',
                    employment_date: this.employee && this.employee.employment_date || ''
                },
                type1: this.type,
                title: ['Product Manager', 'Tester', 'Business Analyst', 'Software Engineer'],
                status: ['test period', 'worker'],
                employee_status: ['full time', 'part time']
            };
        },
        validations: {
            form: {
                fname: { required },
                lname: { required },
                employment_date: { required },
                status: { required },
                salary: { required },
                title: { required },
                employee_status: { required }
            }
        },
        methods: {
            submit() {
                this.$v.form.$touch();
                if(this.$v.form.$error) return;
                if(this.type === 'edit'){
                    window.axios.put(`/api/employees/${this.employee.id}`, this.form)
                        .then(({data: {data}}) =>{
                        swal("Action Success!", "Employee Updated Successfully", "success");
                    })
                }else {
                    window.axios.post('/api/employees', this.form)
                        .then(({data: {data}}) =>{
                        swal("Action Success!", "Employee Created Successfully", "success");
                            window.location.href= `/employee`
                    }).catch(({response: {data}}) => {
                        swal("An Error Occured!", data.message ,"error");
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>
