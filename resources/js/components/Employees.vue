<template>
    <div class="position-relative">
        <div class="d-flex justify-content-end mb-3">
            <a href="/employee/create" class="btn btn-primary br">add employee</a>
        </div>
            <div class="header_detail">
                <input type="checkbox" class="form-control" style="width: 15px">
                <p class="small font-weight-bold">EMPLOYEES<i class="fas fa-sort-amount-up ml-1"/></p>
                <p class="small font-weight-bold">SALARY<i class="fas fa-sort-amount-up ml-1"/></p>
                <p class="small font-weight-bold">STATUS<i class="fas fa-sort-amount-down-alt ml-1"/></p>
                <p class="small font-weight-bold">MANAGE</p>
            </div>
            <RowComponent v-for="(employee, key) in employees" :employee="employee" :key="key" @delete="del" />
    </div>
</template>

<script>
    import RowComponent from './RowComponent';
    import swal from 'sweetalert';
    export default {
        name: "Employees",
        components: {
            RowComponent
        },
        data () {
            return {
                employees: []
            }
        },
        mounted() {
            window.axios.get('/api/employees')
                .then(({data: {data}}) =>{
                    this.employees = data;
                })
                .catch( err => {
                    swal("An Error Occured!", "Please Contact Adminstrator" ,"error");
                })
        },
        methods: {
            del(e){
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(async (willDelete) => {
                    if (willDelete) {
                        try {
                            await window.axios.delete(`/api/employees/${e}`, this.form);
                            swal("Employee Successfully Deleted", {
                                icon: "success",
                            });
                            let index = this.employees.findIndex(item => item.id == e);
                            this.employees.splice(index, 1);
                        } catch (err) {
                            swal("An Error Occured!", "Please Contact Administrator", "error");
                        }
                    }
                });
            }
        }
    }
</script>

<style scoped>
    .header_detail{
        display: grid;
        grid-template-columns: auto 1fr 1fr 1fr auto;
        grid-gap: 10px;
        background: transparent;
        padding: 0 10px;
        margin: 0 10px;
        align-items: center;
    }
</style>
