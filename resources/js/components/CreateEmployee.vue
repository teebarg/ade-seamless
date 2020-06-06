<template>
    <div>
        <div class="d-flex justify-content-end">
            <a href="/employee" class="btn btn-primary br">Back</a>
        </div>
        <EmployeeForm />
    </div>
</template>

<script>
    import EmployeeForm from './EmployeeForm';
    export default {
        name: "CreateEmployee",
        components: {
            EmployeeForm
        }
    }
</script>

<style scoped>

</style>
