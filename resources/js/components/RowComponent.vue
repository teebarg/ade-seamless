<template>
    <div class="employee_detail">
        <input type="checkbox" class="form-control" style="width: 15px">
        <div style="display: flex">
            <div class="c-avatar">
                <img v-if="this.employee.id < 9" class="c-avatar-img" :src="'/img/avatars/' + this.employee.id +'.jpg'" :alt="this.employee.name">
                <div class="alt-icon" v-else>{{this.employee.fname[0].toUpperCase()}} {{this.employee.fname[1].toUpperCase()}}</div>
            </div>
            <div>
                <div class="font-weight-bold"><span>{{this.employee.fname}}</span> <span>{{this.employee.lname}}</span></div>
                <div class="small text-muted">{{this.employee.title}} </div>
            </div>
        </div>
        <div>
            <div class="font-weight-bold">{{this.employee.salary}} NOK <span style="border-radius: 25px" class="badge" :class="[this.employee.raise > 0 ? 'badge-success' : 'badge-danger' ]">
                {{this.employee.raise > 0 ? '+' : ''}}{{this.employee.raise}}</span>
            </div>
            <div class="small text-muted">{{this.employee.employee_status}}</div>
        </div>
        <div class="font-weight-bold">
            <div>{{this.employee.status}}</div>
            <div class="small text-muted">{{this.employee.employment_date | moment}}</div>
        </div>
        <div>
            <i @click="edit" class="fas fa-pen icon icon-edit"/>
            <i class="mx-2" style="border-right: 1px solid #c1b7c2"/>
            <i @click="handleDelete" class="far fa-trash-alt icon icon-delete"/>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        name: "RowComponent",
        props: ['employee'],
        methods: {
            edit() {
                window.location.href= `/employee/${this.employee.id}/edit`
            },
            handleDelete() {
                this.$emit('delete', this.employee.id)
            }
        },
        filters: {
            moment: function (date) {
                return moment(date, "YYYY-MM-DD").fromNow();
            }
        }
    }
</script>

<style scoped>
    .c-avatar {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        font-size: 14.4px;
        border-radius: 50em;
    }

    .c-avatar-img {
        width: 100%;
        height: auto;
        border-radius: 50em;
    }

    .employee_detail{
        display: grid;
        grid-template-columns: auto 1fr 1fr 1fr auto;
        grid-gap: 10px;
        background: #FFFFFF;
        padding: 10px;
        margin: 10px;
        align-items: center;
        border-radius: 5px;
        transform: scale(1);
        transition: all .2s ease-in;
    }

    .employee_detail:hover {
        transform: scale(1.02);
    }

    .icon {
        color: #c1b7c2;
    }

    .icon:hover {
        cursor: pointer;
    }

    .icon-edit:hover {
        color: green;
    }
    .icon-delete:hover {
        color: red;
    }
    .alt-icon {
        background: #c1b7c2;
    }
</style>
