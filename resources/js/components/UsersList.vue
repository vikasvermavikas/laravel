<template>
    <div ref="userlist">

        <head>
            <title>User List</title>
        </head>
        <div class="adduser">
            <router-link class="btn btn-primary" to="/users/adduser">Add User</router-link>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="x in users">
                    <th scope="row">{{ x.id }}</th>
                    <td>{{ x.name }}</td>
                    <td>{{ x.email }}</td>
                    <td>{{ x.city }}</td>
                    <td> <router-link :class="primary" :to="`/users/edit/${x.id}`">Edit</router-link>
                        <button :class="danger" @click="deleteuser(x.id)">Delete </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
    
<script>
export default {
    name: 'userlist',
    data() {
        return {
            primary: 'btn btn-primary',
            danger: 'btn btn-danger',
            users: []
        }
    },
    mounted() {
        this.getuserdata();
    },
    watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = to.meta.title || 'Some Default Title';
            }
        }
    },
    methods: {
        getuserdata() {
            axios.get('/users/getusers').then(response => {
                this.users = response.data;
            });

        },
        deleteuser(id){
            axios.delete('/users/deleteuser/'+id).then(response => {
                this.getuserdata();
            });
        }
    }
}
</script>

<style scoped>
.adduser {
    float: right;
}
</style>