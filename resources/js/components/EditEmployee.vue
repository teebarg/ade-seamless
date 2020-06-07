<template>
    <div>
        <div class="d-flex justify-content-end">
            <a href="/employee" class="btn btn-primary br">Back</a>
        </div>
        <EmployeeForm  :employee="employee" :type="'edit'"/>
    </div>
</template>

<script>
    import EmployeeForm from './EmployeeForm';
    export default {
        name: "EditEmployee",
        props: ['employee'],
        components: {
            EmployeeForm
        }
    }
</script>

<style scoped>

</style>
